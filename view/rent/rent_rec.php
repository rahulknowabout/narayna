<script>
function confirmdelete(){
var x = confirm("Are you sure  to delete ?");
	if(x)
	{
		return x;
	}else{
		return x;
	}	
}
</script>
<script>
function submitCheck(id,str,type) {

	if (type === "fin") {
		if (str === "hn") {
			document.getElementById('spinnerimgfa_'+id).style.display="block";
			document.getElementById('hstfaimg_'+id).style.display="none";
			
		}
		if (str === "sn") {
			document.getElementById('spinnerimgfb_'+id).style.display="block";
			document.getElementById('hstfbimg_'+id).style.display="none";
		}
	}
	if (type === "rent") {
	//alert(type);
		if (str === "hn") {
			alert('spinnerimgra_'+id);
			document.getElementById('spinnerimgra_'+id).style.display="block";
			document.getElementById('hstraimg_'+id).style.display="none";
		}
		if (str === "sn") {
			document.getElementById('spinnerimgrb_'+id).style.display="block";
			document.getElementById('hstrbimg_'+id).style.display="none";
		}
	}
//alert(id);
//alert(str);
$.ajax( {  
	url: "index.php",
	type: 'POST',
	data: "aj=y&chk=mreceive&id="+id+"&str="+str+"&type="+type,
	dataType: 'html',
	success: function( msg, textStatus, xhr ) {
	
	if (msg === "yes") {
	
		if (type === "fin") {
		if (str === "hn") {
			document.getElementById('spinnerimgfa_'+id).style.display="none";
			document.getElementById('hstfaimg_'+id).style.display="block";
			document.getElementById('finhsta_'+id).checked="checked";
			document.getElementById('finhsta_'+id).disabled="disabled";
		}
		if (str === "sn") {
			document.getElementById('spinnerimgfb_'+id).style.display="none";
			document.getElementById('hstfbimg_'+id).style.display="block";
			document.getElementById('finhstb_'+id).checked="checked";
			document.getElementById('finhstb_'+id).disabled="disabled";
		}
	}
	if (type === "rent") {
	
		if (str === "hn") {
		//alert( msg );
			document.getElementById('spinnerimgra_'+id).style.display="none";
			document.getElementById('hstraimg_'+id).style.display="block";
			document.getElementById('renthsta_'+id).checked="checked";
			document.getElementById('renthsta_'+id).disabled="disabled";
		}
		if (str === "sn") {
			document.getElementById('spinnerimgrb_'+id).style.display="none";
			document.getElementById('hstrbimg_'+id).style.display="block";
			document.getElementById('renthstb_'+id).checked="checked";
			document.getElementById('renthstb_'+id).disabled="disabled";
		}
	}
		
	}		
	 }
 })
}
</script>
<script>
$(document).ready(function(){
 $.fn.myFunction = function(){ 
      var val = document.getElementById("row_no").value;
	  where =document.getElementById('where').value;
	  document.getElementById("row_no").value = Number(val)+15;
	  //alert(val);
	  
      $.ajax({
      type: 'post',
      url: 'index.php',
     data: "aj=y&chk=pagination&onlink=Rentrec&getresult="+val+"&where="+where,
     beforeSend: function(){
			$('#loader-icon').show();
			},
	complete: function(){
			$('#loader-icon').hide();
			},
	success: function(data){
		//alert(data);
			if (data === "no") {
				$('#loader-icon').hide();
			}else {
				$("#faq-result").append(data);
			}	
			},

      // We increase the value by 10 because we limit the results by 10
     
    
});
}	
    $(window).scroll(function(){
        //alert(2);  
	if($(document).height() <= $(window).scrollTop() + $(window).height()){
	  	$.fn.myFunction();
		//loadmore();
	  } 
    })
})
</script>
<?php $where = "";
if( isset($_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder']!="" ) {
	$where = " where (np.title like '%".$_REQUEST['searchbyorder']."%' OR nar.rent_name like '%".$_REQUEST['searchbyorder']."%' OR nu.uname like '%".$_REQUEST['searchbyorder']."%')";
	if (isset($_REQUEST['rent_property_id']) && $_REQUEST['rent_property_id']>0) {
		$where .=" AND np.pid =".$_REQUEST['rent_property_id']."";
	}	
		if( isset( $_REQUEST['ss_date'] ) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!=""){
	$where .= " AND nr.rec_date between '".date("m/d/Y",strtotime(str_replace("/","-","".$_REQUEST['ss_date']."")))."' AND '".date("m/d/Y",strtotime(str_replace("/","-","".$_REQUEST['es_date']."")))."'";
	
	}
}else {
	if (isset($_REQUEST['rent_property_id']) && $_REQUEST['rent_property_id']>0) {
		$where .=" where np.pid =".$_REQUEST['rent_property_id']."";
	
	if( isset( $_REQUEST['ss_date'] ) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!=""){
	$where .= " AND nr.rec_date between '".date("m/d/Y",strtotime(str_replace("/","-","".$_REQUEST['ss_date']."")))."' AND '".date("m/d/Y",strtotime(str_replace("/","-","".$_REQUEST['es_date']."")))."'";
}
	
	}elseif( isset( $_REQUEST['ss_date'] ) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!=""){
	$where .= " where nr.rec_date between '".date("m/d/Y",strtotime(str_replace("/","-","".$_REQUEST['ss_date']."")))."' AND '".date("m/d/Y",strtotime(str_replace("/","-","".$_REQUEST['es_date']."")))."'";
	}
	
}
/*$Count = $ketObj->runquery("SELECT", "count(*)", "nar_recrent nr INNER JOIN nar_property np ON np.pid = nr.rec_property_id INNER JOIN nar_user nu ON nu.uid = nr.	rec_person_id INNER JOIN nar_rent nar ON nar.rent_id = nr.rec_renter_id",array(),$where);
$hold = $Count['0']['count(*)']; */
$counter = 1; 	
if(isset($_GET['vid']) && $_GET['vid']!="") {
	$vid1 = ($_GET['vid']-1)*10;
	$counter= $vid1+1;
	$vid1 = ($_GET['vid']-1)*10;
	$rent_info = $ketObj->runquery( "SELECT", "np.title,nr.rec_id,nr.rec_rent,nr.rec_date,nr.rentd,nu.uname,nar.rent_name,nr.hsta,nr.hstb", "nar_recrent nr INNER JOIN nar_property np ON np.pid = nr.rec_property_id INNER JOIN nar_user nu ON nu.uid = nr.	rec_person_id INNER JOIN nar_rent nar ON nar.rent_id = nr.rec_renter_id",array(), $where." limit ".$vid1.",10"  );
	//$rowe = runquery("SELECT","*","artical","","".$where."limit ".$vid1.",10");
    //$count= $vid1+1;
	}
else {
	$rent_info = $ketObj->runquery( "SELECT", "np.title,nr.rec_id,nr.rec_rent,nr.rec_date,nr.rentd,nu.uname,nar.rent_name,nr.hsta,nr.hstb","nar_recrent nr INNER JOIN nar_property np ON np.pid = nr.rec_property_id INNER JOIN nar_user nu ON nu.uid = nr.	rec_person_id INNER JOIN nar_rent nar ON nar.rent_id = nr.rec_renter_id", array(), $where." limit 0,15"  );
}
/*$rent_info = $ketObj->runquery("SELECT", "np.title,nr.rec_id,nr.rec_rent,nr.rec_date,nu.uname,nar.rent_name", "nar_recrent nr INNER JOIN nar_property np ON np.pid = nr.rec_property_id INNER JOIN nar_user nu ON nu.uid = nr.	rec_person_id INNER JOIN nar_rent nar ON nar.rent_id = nr.rec_renter_id");*/
/*echo "<pre>";
print_r( $rent_info );
die();*/
$qstring="";
if( isset( $_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder'] != "" ){	
	$qstring .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
}
if( isset( $_REQUEST['ss_date'] ) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!=""){
	$qstring .= "&ss_date=".$_REQUEST['ss_date']."&es_date=".$_REQUEST['es_date']."";
}
if( isset( $_REQUEST['rent_property_id'] ) && $_REQUEST['rent_property_id'] != "" ){	
	$qstring .= '&rent_property_id='.$_REQUEST['rent_property_id'].'';
}
if( isset( $_REQUEST['vid'] ) && $_REQUEST['vid'] >0 ){	
	$qstring .= '&vid='.$_REQUEST['vid'].'';
}
$propertyList = $ketObj->runquery( "SELECT", "pid,title", "nar_property", array());
?>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                              Recieved Rent List
                			</h3>
                        </div>
						
                        <div class="title_right">
                           <form name="searchorder" id = "searchorder" action="index.php" method="post" role ="search" class="navbar-form">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group  top_search">
                                
									<div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for..." name = "searchbyorder" value="<?php if( isset( $_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder'] != "" ){ echo $_REQUEST['searchbyorder'];} ?>" />
									
                                    <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
							
                        </span>
								
                                </div>
								</div>
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group  top_search">
							<div class="input-group">
                                   
								<select name="rent_property_id" id ="rent_property_id" class="form-control">
										<option value="0">Choose Property</option>
									
				                <?php if( is_array( $propertyList ) && count( $propertyList ) > 0 ) {
										foreach( $propertyList as $valueP ) {
										
								?>
										<option value="<?php echo $valueP['pid']; ?>"<?php if (isset($_REQUEST['rent_property_id'])) { echo $_REQUEST['rent_property_id'] > 0 ? $_REQUEST['rent_property_id'] == $valueP['pid'] ? "selected='selected'" : "" : "";}?>><?php echo $valueP['title'];?></option>
								<?php	
										}
								} 
								?>
                                 </select> 
								   <span class="input-group-btn">
								   
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button></span>
                            </div>
							</div>
							<div col-md-5 col-sm-5 col-xs-12 class="form-group row">
								<input type="text" id="single_calr1" style="line-height:30px;"  placeholder="Start Date  D/M/Y" name="ss_date" value="<?php if( isset($_REQUEST['ss_date']) && $_REQUEST['ss_date']!="" ){ echo $_REQUEST['ss_date'];} ?>" class="form-control"/><span id="inputSuccess2Status2" class="sr-only">(success)</span>
															
                                                   
												   <input type="text" id="single_calr2" style="line-height:30px;"  placeholder="End Date  D/M/Y"  name="es_date" value="<?php if( isset($_REQUEST['es_date']) && $_REQUEST['es_date']!="" ){ echo $_REQUEST['es_date'];}?>" class="form-control" /> <span id="inputSuccess2Status2" class="sr-only">(success)</span>
												    
												   	
								
                            <button class="btn btn-default" type="submit" name="search" value="search"><span class="glyphicon glyphicon-search"></button><button class="btn btn-primary" type="submit" style="padding:5px;" name="report" value="rent">Report</button>
													</div>
							<input type="hidden" class="form-control" placeholder="Search for..." name = "view" value="rent" />							<input type="hidden" class="form-control" placeholder="Search for..." name = "file" value="rent_rec" />
						</form>	
						
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Results </h2>
										<ul class="nav navbar-right panel_toolbox">
										<?php if (isset($_SESSION['rent_add'])) {
											echo $_SESSION['rent_add']>0 ? '<li><a href="index.php?view=rent&file=rent_add_rec">Add Rent</a></li>':'<li><a href="#" class ="largeWarningBasic">Add Rent</a></li>';
										}else {
										?>
										 <li><a href="index.php?view=rent&file=rent_add_rec">Add Rent</a>
                                        </li>
									<?php
										}
									?>
                                     
                                    </ul>
                                  <div class="clearfix"></div>
                                   
								</div>	
                               
                                <div class="x_content">
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Property Title</th>
													<th>Renter Name</th>
													<th>Rent Date</th>
													<th>Rent</th>
													<th>Payment Date</th>
													<th>Rec. Person</th>
													<th>HN</th>
													<th>SN</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody id="faq-result">
												<?php
													$counter = 1;
													if( isset( $rent_info ) && is_array( $rent_info ) && count( $rent_info ) > 0 )
													{
														foreach( $rent_info as $key=>$row ) {
																$row['rec_date'] = date("d/m/Y",strtotime("".$row['rec_date'].""));
												?>                     
															<tr>
																<th scope="row"><?php echo $counter; ?></th>
																<td><?php echo $row['title']; ?></td>
																<td><?php echo $row['rent_name']; ?></td>
																<td><?php echo $row['rentd']; ?></td>
																<td><?php echo $row['rec_rent']; ?></td>
																<td><?php echo $row['rec_date']; ?></td>
																<td><?php echo $row['uname']; ?></td>
																<td>  <form name="checkboxbootr_<?php echo $row['rec_id'];?>" id = "checkboxbootr_<?php echo $row['rec_id'];?>" action="index.php" method="post"  class="form-horizontal form-label-left">
		<div class="checkbox checkbox-success" id="hstraimg_<?php echo $row['rec_id'];?>">
        <label>
        <input type="checkbox"  <?php echo $row['hsta'] > 0 ? "checked disabled='disabled'":""; ?> onchange="submitCheck('<?php echo $row['rec_id'];?>','hn','rent')" name="hsta" id="renthsta_<?php echo $row['rec_id'];?>" >
        </label>
      </div>
	  <div style="display:none" id="spinnerimgra_<?php echo $row['rec_id'];?>">
	  	<img src="spinner.gif" width="80px" height="80px;" />
	  </div>
	  </td>
	  <td>
	  <div class="checkbox checkbox-success" id="hstrbimg_<?php echo $row['rec_id'];?>">
        <label>
           <input type="checkbox"  <?php echo $row['hstb'] > 0 ? "checked disabled='disabled'":""; ?>  name="hstb" id="renthstb_<?php echo $row['rec_id'];?>" onchange="submitCheck('<?php echo $row['rec_id'];?>','sn','rent')">
		 
        </label>
      </div>
	  <div style="display:none" id="spinnerimgrb_<?php echo $row['rec_id'];?>">
	  	<img src="spinner.gif" width="80px" height="80px;" />
	  </div>
	  <input type="hidden" name="task" value="checkStatus" />
			<input type="hidden" name="controller" value="rent" />
			<input type="hidden" name="view" value="mreceive" />
			<input type="hidden" name="hstab" value="<?php echo $row['hsta']; ?>" />
			<input type="hidden" name="hstbb" value="<?php echo $row['hstb']; ?>" />
			<input type="hidden" name="file" value="tmpl" />
			<input type="hidden" name="qstring" value="<?php echo $qstring; ?>" />
			<input type="hidden" name="rec_id" value="<?php echo $row['rec_id'];?>" />
	  </form></td>
																<td>
																<?php if (isset($_SESSION['rent_add'])) { echo $_SESSION['rent_add']>0 ? '<a href="index.php?view=rent&file=rent_add_rec&edit='.$row['rec_id'].''.$qstring.'" class ="btn btn-info">Edit</a>':'<a href="#" class ="largeWarningBasic btn btn-info">Edit</a>';
										}else {
										?>
										 <a href ="index.php?view=rent&file=rent_add_rec&edit=<?php echo $row['rec_id'];?><?php if( isset( $qstring ) && $qstring!=""){ echo $qstring;} ?>" class ="btn btn-info">Edit</a>
									<?php
										}
									?>
									<?php if (isset($_SESSION['lend_money'])) {
											echo $_SESSION['lend_money']>0 ? '<a href="index.php?controller=delete&delete='.$row['rec_id'].''.$qstring.'&chk=rentrecdelete&view=rent&file=rent_rec" class ="btn btn-danger" onclick="return confirmdelete()">Delete</a>':'<a href="#" class ="largeWarningBasic btn btn-danger">Delete</a>';
										}else {
										?>
										 <a href ="index.php?controller=delete&delete=<?php echo $row['rec_id']; ?>&chk=rentrecdelete&view=rent<?php if( isset( $qstring ) && $qstring!=""){ echo $qstring;}?>&file=rent_rec"class ="btn btn-danger" onclick="return confirmdelete()">Delete</a>
									<?php
										}
									?>
									
									</td>
																
															
															</tr>
												<?php			
														$counter++;}	
														
													 }	
													/*$path = 'index.php?view=rent&file=rent_rec';
													
													if( isset( $_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder'] != "" ){													$path .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
}
													if( isset( $_REQUEST['rent_property_id'] ) && $_REQUEST['rent_property_id']> 0 ){												$path .= '&rent_property_id='.$_REQUEST['rent_property_id'].'';
}
													if (isset( $_REQUEST['ss_date'] ) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!="") {
													$path .= "&ss_date=".$_REQUEST['ss_date']."&es_date=".$_REQUEST['es_date']."";
}
													
													echo '<tr><td align = "center" colspan = "15">'; 
													echo $ketObj->paginate($path,$hold);
													echo '</td></tr>';*/
												?>
											</tbody>
										</table>
										<input type="hidden" id="row_no" value="15">
										<input type="hidden" id="where" name="where" value="<?php if( isset( $where ) && $where != "" ){ echo $where;}else{ echo "";} ?>">
									</div>
									<div id="loader-icon" style ="display:none;" align="center"><img src="LoaderIcon.gif" /></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
<script type="text/javascript">
        $(document).ready(function () {
            $('#single_cal1').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_1"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_cal2').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_2"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
			$('#single_calr1').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_1"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_calr2').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_2"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
			$('#single_calod').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_2"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_cal3').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_3"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_cal4').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_4"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });
</script>	