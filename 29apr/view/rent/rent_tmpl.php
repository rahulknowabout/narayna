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
<?php $where = "";
if( isset($_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder']!="" ) {
	$where = " where (np.title like '%".$_REQUEST['searchbyorder']."%' OR nr.rent_name like '%".$_REQUEST['searchbyorder']."%' OR nu.uname like '%".$_REQUEST['searchbyorder']."%' OR nr.rent_mobile like '%".$_REQUEST['searchbyorder']."%' OR nr.rent_address like '%".$_REQUEST['searchbyorder']."%')";
	if (isset($_REQUEST['rent_property_id']) && $_REQUEST['rent_property_id']>0) {
		$where .=" AND np.pid =".$_REQUEST['rent_property_id']."";
	}
}else {
	if (isset($_REQUEST['rent_property_id']) && $_REQUEST['rent_property_id']>0) {
		$where .=" where np.pid =".$_REQUEST['rent_property_id']."";
	}
}
$Count = $ketObj->runquery("SELECT", "count(*)", "nar_rent nr INNER JOIN nar_property np ON np.pid = nr.rent_property_id INNER JOIN nar_user nu ON nu.uid = nr.rent_deal_person_id",array(),$where);
$hold = $Count['0']['count(*)']; 
$counter = 1; 	
if(isset($_GET['vid']) && $_GET['vid']!="") {
	$vid1 = ($_GET['vid']-1)*10;
	$counter= $vid1+1;
	$vid1 = ($_GET['vid']-1)*10;
	$rent_info = $ketObj->runquery( "SELECT", "np.title,np.pid,nr.rent_id,nr.rent_name,rent_address,rent_mobile,nu.uname,nr.rent_date,nr.rent_amount", "nar_rent nr INNER JOIN nar_property np ON np.pid = nr.rent_property_id INNER JOIN nar_user nu ON nu.uid = nr.rent_deal_person_id", array(), $where." limit ".$vid1.",10"  );
	//$rowe = runquery("SELECT","*","artical","","".$where."limit ".$vid1.",10");
    //$count= $vid1+1;
	}
else {
	$rent_info = $ketObj->runquery( "SELECT", "np.title,np.pid,nr.rent_id,nr.rent_name,nr.rent_address,nr.rent_mobile,nu.uname,nr.rent_date,nr.rent_amount", "nar_rent nr INNER JOIN nar_property np ON np.pid = nr.rent_property_id INNER JOIN nar_user nu ON nu.uid = nr.rent_deal_person_id", array(), $where." limit 0,10"  );
}
$qstring="";
if( isset( $_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder'] != "" ){	
	$qstring .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
}
if( isset( $_REQUEST['rent_property_id'] ) && $_REQUEST['rent_property_id'] > 0 ){	
	$qstring .= '&rent_property_id='.$_REQUEST['rent_property_id'].'';
}
if( isset( $_REQUEST['vid'] ) && $_REQUEST['vid'] >0 ){	
	$qstring .= '&vid='.$_REQUEST['vid'].'';
}
$propertyList = $ketObj->runquery( "SELECT", "pid,title", "nar_property", array());
/*echo "<pre>";
print_r( $rent_info );
die();
*/
?>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                              Renter List
                			</h3>
                        </div>
						
                        <div class="title_right">
                           <form name="searchorder" id = "searchorder" action="index.php" method="post" role ="search" class="navbar-form">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group  top_search">
                                
									<div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for..." name = "searchbyorder" value="<?php if( isset( $_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder'] != "" ){ echo $_REQUEST['searchbyorder'];} ?>"/>
									
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
								
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                            </div>
							</div>
							<!--<div col-md-5 col-sm-5 col-xs-12 class="form-group row top_search">
							 <input type="text" id="single_calr1" style="line-height:30px;"  placeholder="Start Date  M/D/Y" name="s_datep" value="<?php if( isset($_REQUEST['s_datep']) && $_REQUEST['s_datep']!="" ){ echo $_REQUEST['s_datep'];} ?>" class="form-control"/>
                                                          
                                                            <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                                   <div class="input-group">
												   <input type="text" id="single_calr2" style="line-height:30px;"  placeholder="End Date  M/D/Y"  name="e_datep" value="<?php if( isset($_REQUEST['e_datep']) && $_REQUEST['e_datep']!="" ){ echo $_REQUEST['e_datep'];}?>" class="form-control" /> <span id="inputSuccess2Status2" class="sr-only">(success)</span>
												    
												   	<span class="input-group-btn">
								
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button></div><button class="btn btn-primary" type="submit" style="padding:5px;">Report</button>
													</div>-->
													
							<input type="hidden" class="form-control" placeholder="Search for..." name = "view" value="rent" />							<input type="hidden" class="form-control" placeholder="Search for..." name = "file" value="rent_tmpl" />
						</form>	
						
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Results </h2>
										<ul class="nav navbar-right panel_toolbox">
                                      <?php if (isset($_SESSION['add_renter'])) {
											echo $_SESSION['add_renter']>0 ? '<li><a href="index.php?view=rent&file=rent">Add Renter</a> </li>':'<li><a href="#" class ="largeWarningBasic">Rent Property</a></li>';
										}else {
										?>
										<li><a href="index.php?view=rent&file=rent">Add Renter</a>
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
												<tr >
													<th>#</th>
													<th>Property Title</th>
													<th>Renter Name</th>
													<th>Address</th>
													<th>Contact No.</th>
													<th>Rent</th>
													<th>Due Rent</th>
													<th>Due Rent Month</th>
													<th>Deal Person</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$counter = 1;
													if( isset( $rent_info ) && is_array( $rent_info ) && count( $rent_info ) > 0 )
													{
														foreach( $rent_info as $key=>$row ) {
															$recrent=propertyViewC($row['pid'],$ketObj,$row['rent_id']);
															if (isset($recrent['rentDueMonth']) && $recrent['rentDueMonth']>0) { $rentDueMonth=$recrent['rentDueMonth'];}else{$rentDueMonth=0;}
												?>                     
															<tr <?php echo $rentDueMonth>2?'style="background-color:#FF9191"':""; ?>>
																<th scope="row"><?php echo $counter; ?></th>
																<td><a href="index.php?file=propertyView&controller=rent&task=propertyView&pid=<?php echo $row['pid']; ?>&renter_name=<?php echo $row['rent_name'];?>&renter_address=<?php echo $row['rent_address'];?>&renter_mobile=<?php echo $row['rent_mobile'];?>&rent_date=<?php echo $row['rent_date'];?>&ptitle=<?php echo $row['title'];?>&rent_amount=<?php echo $row['rent_amount'];?>&rid=<?php echo $row['rent_id']; ?>" target="_blank" class="text-primary"><?php echo $row['title']; ?></a><!--</td>											<td><?php echo $row['rent_date']; ?></td>-->
																
																<td><?php echo $row['rent_name']; ?></td>
																<td><?php echo $row['rent_address']; ?></td>
																<td><?php echo $row['rent_mobile']; ?></td>
																<td><?php echo $row['rent_amount']; ?></td>
																<td><?php echo $rentDueMonth*$row['rent_amount']; ?></td>
																<td><?php echo $rentDueMonth; ?></td>
																<td><?php echo $row['uname']; ?></td>
																<td><?php if (isset($_SESSION['add_renter'])) {
											echo $_SESSION['add_renter']>0 ? '<a href="index.php?view=rent&file=rent&edit='.$row['rent_id'].''.$qstring.'" class ="btn btn-info">Edit</a>':'<a href="#" class ="largeWarningBasic btn btn-info">Edit</a>';
										}else {
										?>
										<a href ="index.php?view=rent&file=rent&edit=<?php echo $row['rent_id'];?><?php if( isset( $qstring ) && $qstring!=""){ echo $qstring;} ?>" class ="btn btn-info">Edit</a>
									<?php
										}
									?><?php if (isset($_SESSION['add_renter'])) {
											echo $_SESSION['add_renter']>0 ? '<a href="index.php?controller=delete&delete='.$row['rent_id'].'chk=rentdelete'.$qstring.'" class ="btn btn-danger" onclick="return confirmdelete()">Delete</a>':'<a href="#" class ="largeWarningBasic btn btn-danger">Delete</a>';
										}else {
										?>
										<a href ="index.php?controller=delete&delete=<?php echo $row['rent_id']; ?>&chk=rentdelete<?php if( isset( $qstring ) && $qstring!=""){ echo $qstring;} ?>"class ="btn btn-danger" onclick="return confirmdelete()">Delete</a>
									<?php
										}
									?>
									</td>
																
															
															</tr>
												<?php			
													$counter++;	}	
														
													 }	
												$path = 'index.php?view=rent&file=rent_rec';
													
													
													if( isset( $_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder'] != "" ){
														$path .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
													}
													if( isset( $_REQUEST['rent_property_id'] ) && $_REQUEST['rent_property_id'] > 0 ){												$path .= '&rent_property_id='.$_REQUEST['rent_property_id'].'';
}
													echo '<tr><td align = "center" colspan = "15">'; 
													echo $ketObj->paginate($path,$hold);
													echo '</td></tr>';	
												?>
											</tbody>
										</table>
									</div>
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