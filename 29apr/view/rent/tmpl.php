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
	$where = " where (title like '%".$_REQUEST['searchbyorder']."%' OR address like '%".$_REQUEST['searchbyorder']."%' OR city like '%".$_REQUEST['searchbyorder']."%')";
}
$Count = $ketObj->runquery( "SELECT", "count(*)", "nar_property", array(), $where  );
$hold = $Count['0']['count(*)']; 
$counter = 1; 	
if(isset($_GET['vid']) && $_GET['vid']!="") {
	$vid1 = ($_GET['vid']-1)*10;
	$counter= $vid1+1;
	$vid1 = ($_GET['vid']-1)*10;
	$allProperty = $ketObj->runquery( "SELECT", "*", "nar_property", array(), $where." limit ".$vid1.",10"  );
	//$rowe = runquery("SELECT","*","artical","","".$where."limit ".$vid1.",10");
    //$count= $vid1+1;
	}
else {
	$allProperty = $ketObj->runquery( "SELECT", "*", "nar_property", array(), $where." limit 0,10"  );
}
$qstring="";
if( isset( $_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder'] != "" ){	
	$qstring .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
}
if( isset( $_REQUEST['vid'] ) && $_REQUEST['vid'] >0 ){	
	$qstring .= '&vid='.$_REQUEST['vid'].'';
}
/*echo "<pre>";
	print_r( $allProperty );
	die();*/
?>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                              Property List
                			</h3>
                        </div>
						
                        <div class="title_right">
                           <form name="searchorder" id = "searchorder" action="index.php" method="post" role ="search" class="navbar-form">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                
									<div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for..." name = "searchbyorder" value="<?php if( isset( $_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder'] != "" ){ echo $_REQUEST['searchbyorder'];} ?>" />
									
                                    <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
							
                        </span>
								
                                </div>
                            </div>
							<input type="hidden" class="form-control" placeholder="Search for..." name = "view" value="rent" />
						</form>	
						
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Results </h2>
										<ul class="nav navbar-right panel_toolbox">
										<?php if (isset($_SESSION['add_prop'])) {
											echo $_SESSION['add_prop']>0 ? '<li><a href="index.php?view=rent&file=add">Add Property</a></li>':'<li><a href="#" class ="largeWarningBasic">Add Property</a></li>';
										}else {
										?>
										<li><a href="index.php?view=rent&file=add">Add Property</a>
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
													<th>Title</th>
													<th>Address</th>
													<th>City</th>
													<!--<th>State</th>-->
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$counter = 1;
													if( isset( $allProperty ) && is_array( $allProperty ) && count( $allProperty ) > 0 )
													{
														foreach( $allProperty as $allPropertyK=>$allPropertyV ) {
												?>                     
															<tr>
																<th scope="row"><?php echo $counter; ?></th>
																<td><?php echo $allPropertyV['title']; ?></td>
																<td><?php echo $allPropertyV['address']; ?></td>
																<td><?php echo $allPropertyV['city']; ?></td>
																<!--<td><?php echo $allPropertyV['state']; ?></td>-->
																<td>
										<?php if (isset($_SESSION['add_prop'])) {
											echo $_SESSION['add_prop']>0 ? '<a href="index.php?view=rent&file=add&edit='.$allPropertyV['pid'].''.$qstring.'" class ="btn btn-info">Edit</a>':'<a href="#" class ="largeWarningBasic btn btn-info">Edit</a>';
										}else {
										?>
										<a href ="index.php?view=rent&file=add&edit=<?php echo $allPropertyV['pid'];?><?php if( isset( $qstring ) && $qstring!=""){ echo $qstring;} ?>" class ="btn btn-info">Edit</a>
									<?php
										}
									?>
									<?php if (isset($_SESSION['add_prop'])) {
											echo $_SESSION['add_prop']>0 ? '<a href="index.php?controller=delete&delete='.$allPropertyV['pid'].'chk=propertydelete&view=rent'.$qstring.'"class ="btn btn-danger" onclick="return confirmdelete()">Delete</a>':'<a href="#" class ="largeWarningBasic btn btn-danger">Delete</a>';
										}else {
										?>
										 <a href ="index.php?controller=delete&delete=<?php echo $allPropertyV['pid']; ?>&chk=propertydelete&view=rent<?php if( isset( $qstring ) && $qstring!=""){ echo $qstring;} ?>"class ="btn btn-danger" onclick="return confirmdelete()">Delete</a>
									<?php
										}
									?>
                                     </td>
																
															
															</tr>
												<?php			
													$counter++;	}	
														
													 }	
													$path = 'index.php?view=rent';
													
													
													if( isset( $_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder'] != "" ){
														$path .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
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