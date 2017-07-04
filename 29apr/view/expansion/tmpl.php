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
function submitCheck(id,str) {
	//alert(str);
		if (str === "hn") {
			document.getElementById('spinnerimgfa_'+id).style.display="block";
			document.getElementById('hstfaimg_'+id).style.display="none";
			
		}
		if (str === "sn") {
			document.getElementById('spinnerimgfb_'+id).style.display="block";
			document.getElementById('hstfbimg_'+id).style.display="none";
		}

	
//alert(id);
//alert(str);
$.ajax( {  
	url: "index.php",
	type: 'POST',
	data: "aj=y&chk=expens&id="+id+"&str="+str,
	dataType: 'html',
	success: function( msg, textStatus, xhr ) {
	//alert( msg );
	if (msg === "yes") {
	
		
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
	 }
 })
}
</script>
<!--<style>
.modal-body {
    max-height: calc(100vh - 210px);
    overflow-y: hidden;
}
</style>-->
<?php 
/*echo "<pre>";
print_r($_REQUEST);
die();*/
$where = "";
if( isset($_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder']!="" ) {
	$where = " where (nu.uname like '%".$_REQUEST['searchbyorder']."%' OR ne.exp_date = '".$_REQUEST['searchbyorder']."')";
	if( isset( $_REQUEST['ss_date'] ) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!=""){
	$where .= " AND  str_to_date(ne.exp_date,'%d/%m/%Y')  between  str_to_date('".$_REQUEST['ss_date']."','%d/%m/%Y') AND  str_to_date('".$_REQUEST['es_date']."','%d/%m/%Y')";
	
	}
	if( isset($_REQUEST['exp_user_id']) && $_REQUEST['exp_user_id']>0){
		$where .= " AND ne.exp_user_id = ".$_REQUEST['exp_user_id']."";
	}
}else {
if( isset( $_REQUEST['ss_date'] ) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!=""){
	$where .= " where str_to_date(ne.exp_date,'%d/%m/%Y')  between  str_to_date('".$_REQUEST['ss_date']."','%d/%m/%Y') AND  str_to_date('".$_REQUEST['es_date']."','%d/%m/%Y')";
	if( isset($_REQUEST['exp_user_id']) && $_REQUEST['exp_user_id']>0){
		$where .= " AND ne.exp_user_id = ".$_REQUEST['exp_user_id']."";
	}
}else {
	if( isset($_REQUEST['exp_user_id']) && $_REQUEST['exp_user_id']>0){
		$where .= " where ne.exp_user_id = ".$_REQUEST['exp_user_id']."";
	}

}
	
}
$Count = $ketObj->runquery( "SELECT", "count(*)", "nar_expansion ne INNER JOIN nar_user nu ON nu.uid = ne.exp_user_id", array(), $where  );
$hold = $Count['0']['count(*)']; 
$counter = 1; 	
if(isset($_GET['vid']) && $_GET['vid']!="") {
	$vid1 = ($_GET['vid']-1)*10;
	$counter= $vid1+1;
	$vid1 = ($_GET['vid']-1)*10;
	$all_expansion = $ketObj->runquery( "SELECT", "ne.exp_id,ne.exp_date,ne.exp_amount,ne.otherp,ne.exp_desc,ne.hsta,ne.hstb,nu.uname", "nar_expansion ne LEFT OUTER JOIN nar_user nu ON nu.uid = ne.exp_user_id", array(), $where." limit ".$vid1.",10"  );
	//$rowe = runquery("SELECT","*","artical","","".$where."limit ".$vid1.",10");
    //$count= $vid1+1;
	}
else {
	$all_expansion = $ketObj->runquery( "SELECT", "ne.exp_id,ne.exp_date,ne.exp_amount,ne.otherp,ne.exp_desc,ne.hsta,ne.hstb,nu.uname", "nar_expansion ne LEFT OUTER JOIN nar_user nu ON nu.uid = ne.exp_user_id", array(), $where." limit 0,10"  );
}
$qstring="";
if( isset( $_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder'] != "" ){	
	$qstring .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
}
if( isset( $_REQUEST['ss_date'] ) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!=""){
	$qstring .= "&ss_date=".$_REQUEST['ss_date']."&es_date=".$_REQUEST['es_date']."";
}
if( isset( $_REQUEST['vid'] ) && $_REQUEST['vid'] >0 ){	
	$qstring .= '&vid='.$_REQUEST['vid'].'';
}
if( isset($_REQUEST['exp_user_id']) && $_REQUEST['exp_user_id']>0){
		$qstring .= "&exp_user_id=".$_REQUEST['exp_user_id']."";
		$exp_user_id =$_REQUEST['exp_user_id'];
}else {
	$exp_user_id ="";
}
$userList = $ketObj->runquery( "SELECT", "*", "nar_user",array());
/*echo "<pre>";
print_r( $all_expansion );
die();*/
?>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                              Expenses List
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
                                    <select name="exp_user_id" id ="exp_user_id" class="form-control">
										<option value="">Choose</option>
									
				                <?php if( is_array( $userList ) && count( $userList ) > 0 ) {
										foreach( $userList as $valueP ) {
										
								?>
										<option value="<?php echo $valueP['uid']; ?>"<?php  echo $exp_user_id > 0 ? $exp_user_id == $valueP['uid'] ? "selected='selected'":"":"";  ?>><?php echo $valueP['uname'];?></option>
								<?php	
										}
								} 
								?>
                                 </select>   
									
                                    <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
							
                        </span>
								
                                </div>
                            </div>
							<div col-md-5 col-sm-5 col-xs-12 class="form-group row">
								<input type="text" id="single_calr1" style="line-height:30px;"  placeholder="Start Date  D/M/Y" name="ss_date" value="<?php if( isset($_REQUEST['ss_date']) && $_REQUEST['ss_date']!="" ){ echo $_REQUEST['ss_date'];} ?>" class="form-control"/><span id="inputSuccess2Status2" class="sr-only">(success)</span>
															
                                                   
												   <input type="text" id="single_calr2" style="line-height:30px;"  placeholder="End Date  D/M/Y"  name="es_date" value="<?php if( isset($_REQUEST['es_date']) && $_REQUEST['es_date']!="" ){ echo $_REQUEST['es_date'];}?>" class="form-control" /> <span id="inputSuccess2Status2" class="sr-only">(success)</span>
												    
												   	
								
                            <button class="btn btn-default" type="submit" value="search" name="search"><span class="glyphicon glyphicon-search"></button><button class="btn btn-primary" type="submit" style="padding:5px;"  name="report" value="expenses">Report</button>
													</div>
							<input type="hidden" class="form-control" placeholder="Search for..." name = "view" value="expansion" />
						</form>
						
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Results </h2>
										<ul class="nav navbar-right panel_toolbox">
                                      <a href="index.php?view=expansion&file=add" class="text-primary">Add Expenses</a>
                                    </ul>
                                  <div class="clearfix"></div>
                                   
								</div>	
                               
                                <div class="x_content">
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Date</th>
													<th>Desc</th>
													<th>Amount</th>
													<th>Expenses By</th>
													<th>HN</th>
													<th>SN</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$counter = 1;
													if( isset( $all_expansion ) && is_array( $all_expansion ) && count( $all_expansion ) > 0 )
													{
														foreach( $all_expansion as $Key=>$row ) {
												?>                     
															<tr>
																<th scope="row"><?php echo $counter; ?></th>
																<td><?php echo $row['exp_date']; ?></td>
																<td><div style="max-width:200px;max-height:200px;height:50%;width:80%;min-width:50px;min-height:50px;overflow: auto; "><?php echo $row['exp_desc']; ?></div></td>
																<td><?php echo $row['exp_amount']; ?></td>
																<td><?php echo $row['uname']!=""?$row['uname']:$row['otherp']; ?></td> <td> <form name="checkboxboot_<?php echo $row['exp_id'];?>" id = "checkboxboot_<?php echo $row['exp_id'];?>" action="index.php" method="post"  cclass="form-horizontal form-label-left">
		<div class="checkbox checkbox-success" id="hstfaimg_<?php echo $row['exp_id'];?>">
        <label>
        <input type="checkbox"  <?php echo $row['hsta'] > 0 ? "checked disabled='disabled'":""; ?>  onchange="submitCheck('<?php echo $row['exp_id'];?>','hn')" name="hsta" id="finhsta_<?php echo $row['exp_id'];?>">
        </label>
      </div>
	  <div style="display:none" id="spinnerimgfa_<?php echo $row['exp_id'];?>">
	  	<img src="spinner.gif" width="80px" height="80px;" />
	  </div>
	  </td>
	  
	  <td>
	  <div class="checkbox checkbox-success" id="hstfbimg_<?php echo $row['exp_id'];?>">
        <label>
           <input type="checkbox"  <?php echo $row['hstb'] > 0 ? "checked='checked' disabled='disabled'":""; ?>  name="hstb" id="finhstb_<?php echo $row['exp_id'];?>" onchange="submitCheck('<?php echo $row['exp_id'];?>','sn')">
		 
        </label>
      </div>
	  <div style="display:none" id="spinnerimgfb_<?php echo $row['exp_id'];?>">
	  	<img src="spinner.gif" width="80px" height="80px;" />
	  </div>
	  <input type="hidden" name="task" value="checkStatus" />
			<input type="hidden" name="controller" value="finance" />
			<input type="hidden" name="hstab" value="<?php echo $row['hsta']; ?>" />
			<input type="hidden" name="hstbb" value="<?php echo $row['hstb']; ?>" />
			<input type="hidden" name="view" value="mreceive" />
			<input type="hidden" name="file" value="tmpl" />
			<input type="hidden" name="qstring" value="<?php echo $qstring; ?>" />
		<input type="hidden" name="fin_rec_id" value="<?php echo $row['fin_rec_id'];?>" />
	  </form> </td>
																<td>
																<!--<a data-toggle="modal" href="#myModal" class="btn btn-primary"  data-target="#exampleModal" data-whatever="<?php echo $row['exp_desc']; ?>">Desc</a>-->
																<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-whatever="<?php echo $row['exp_desc']; ?>" name="mydesc">Desc</button>-->
																
																 <?php if (isset($_SESSION['exp_add'])) {
											echo $_SESSION['exp_add']>0 ? '<a href="index.php?view=expansion&file=add&edit='.$row['exp_id'].''.$qstring.'" class ="btn btn-info">Edit</a>':'<a href="#" class ="largeWarningBasic btn btn-info">Edit</a>';
										}else {
										?>
										<a href ="index.php?view=expansion&file=add&edit=<?php echo $row['exp_id'];?><?php if( isset( $qstring ) && $qstring!=""){ echo $qstring;} ?>" class ="btn btn-info">Edit</a>
									<?php
										}
									?>
									<?php if (isset($_SESSION['exp_add'])) {
											echo $_SESSION['exp_add']>0 ? '<a href="index.php?controller=delete&delete='.$row['exp_id'].''.$qstring.'&chk=expdelete&view=expansion" class ="btn btn-danger" onclick="return confirmdelete()">Delete</a>':'<a href="#" class ="largeWarningBasic btn btn-danger">Delete</a>';
										}else {
										?>
										<a href ="index.php?controller=delete&delete=<?php echo $row['exp_id']; ?>&chk=expdelete&view=expansion<?php if( isset( $qstring ) && $qstring!=""){ echo $qstring;} ?>"class ="btn btn-danger" onclick="return confirmdelete()">Delete</a>
									<?php
										}
									?>
										</td>
																
															
															</tr>
															
	<div class="modal" id="myModal">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Expenses Description</h4>
        </div>
        <div class="modal-body">
         
         </div>
        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn btn-default">Close</a>
         </div>
      </div>
    </div>
</div>
												<?php			
														$counter++;}	
														
													 }	
													$path = 'index.php?view=expansion';
													
													
													if( isset( $_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder'] != "" ){
														$path .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
													}
													if (isset( $_REQUEST['ss_date'] ) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!="") {
													$path .= "&ss_date=".$_REQUEST['ss_date']."&es_date=".$_REQUEST['es_date']."";
}													if( isset($_REQUEST['exp_user_id']) && $_REQUEST['exp_user_id']>0){
														$path .= "&exp_user_id = ".$_REQUEST['exp_user_id']."";
													}
													echo '<tr><td align = "center" colspan = "15">'; 
													echo $ketObj->paginate($path,$hold);
													echo '</td></tr>';
												?>
												<tr>
													<td>
													
							
													</td>
												</tr>
												
											</tbody>
										</table>
										




									</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
<script>

$('#myModal').on('show.bs.modal', function (event) {
//alert("hello");
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body').text(recipient)
})
</script>			
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