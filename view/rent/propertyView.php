<?php //echo "<pre>";print_r($_REQUEST);die();

$recrent=array();
		if (isset($_REQUEST['pid']) &&  isset($_REQUEST['rid']))	{
			$recrent=propertyViewC($_REQUEST['pid'],$ketObj,$_REQUEST['rid']);
		}
//echo "<pre>";print_r($recrent); die();
if (isset($recrent) && is_array($recrent) && count($recrent)>0) {
$lastRent =$recrent['recrent']['0']['rec_rent'];
$lastRentDate =date("d/m/Y",strtotime("".$recrent['recrent']['0']['rec_date'].""));
$totalReceiveRent =$recrent['totalReceiveRent'];
$totalRent =$recrent['totalRent'];
$rentDueMonth=$recrent['rentDueMonth'];
$unadjustmentAmount=$recrent['unadjustmentAmount'];
}else {
$lastRent ="";
$lastRentDate ="";
$totalReceiveRent ="";
$totalRent ="";
$rentDueMonth="";
$unadjustmentAmount="";
$recrent['rentinfo']['ptitle']="";
$recrent['rentinfo']['date']="";
$recrent['rentinfo']['amount']="";
$recrent['rentinfo']['name']="";
$recrent['rentinfo']['address']="";
$recrent['rentinfo']['mobile']="";
}
?><div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                              Property Report
                			</h3>
                        </div>
						
                        <div class="title_right">
                           	
						
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Results </h2>
										<!--<ul class="nav navbar-right panel_toolbox">
                                      <?php if (isset($_SESSION['add_renter'])) {
											echo $_SESSION['add_renter']>0 ? '<li><a href="index.php?view=rent&file=rent">Add Renter</a> </li>':'<li><a href="#" class ="largeWarningBasic">Rent Property</a></li>';
										}else {
										?>
										<li><a href="index.php?view=rent&file=rent">Add Renter</a>
                                        </li>
									<?php
										}
									?>
                                    </ul>-->
                                  <div class="clearfix"></div>
                                   
								</div>	
                               
                                <div class="x_content">
									<div class="table-responsive">
										<table class="table table-bordered">
											<tbody>
												<tr>
													<th>Property Title</th>
													<td><?php echo $recrent['rentinfo']['ptitle']; ?></td>
												</tr>
												<tr>
													<th>Property Rent On</th>
													<td><?php echo date("d/m/Y",strtotime("".$recrent['rentinfo']['date']."")); ?></td>
												</tr>
												<tr>
													<th>Rent</th>
													<td><?php echo $recrent['rentinfo']['amount']; ?></td>
												</tr>
												<tr>
													<th>Renter Name</th>
													<td><?php echo $recrent['rentinfo']['name']; ?></td>
												</tr>
												<tr>
													<th>Renter Address</th>
													<td><?php echo $recrent['rentinfo']['address']; ?></td>
												</tr>
												<tr>
													<th>Renter Mobile</th>
													<td><?php echo $recrent['rentinfo']['mobile']; ?></td>
												</tr>
											</tbody>
											
										</table>
									</div>
									<div class="well"><div class="row"><p><span class="text-danger col-md-6 col-sm-12 col-xs-12">Last Rent On: <?php echo $lastRentDate; ?></span><span class="text-primary col-md-6 col-sm-12 col-xs-12">Total Receive Rent:  <?php echo $totalReceiveRent; ?></span></p><p><span class="text-danger col-md-6 col-sm-12 col-xs-12">Last Rent Amount: <?php echo $lastRent; ?></span><span class="text-primary col-md-6 col-sm-12 col-xs-12">Total Rent:  <?php echo $totalRent; ?></span></p><p><span class="text-danger col-md-6 col-sm-12 col-xs-12">Due Month: <?php echo $rentDueMonth; ?></span><span class="text-primary col-md-6 col-sm-12 col-xs-12">Unadjustment Amount:  <?php echo $unadjustmentAmount; ?></span></p></div>
									</div>
									<h2>Recieved Rent</h2>
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Date</th>
													<th>Rent</th>
												</tr>
											</thead>
											<tbody>
												<?php
													
													if( isset( $recrent['recrent'] ) && is_array( $recrent['recrent'] ) && count( $recrent['recrent'] ) > 0 ) { $counter = 1;
														foreach( $recrent['recrent'] as $key=>$row ) {
															 $row['rec_date'] = date("d/m/Y",strtotime("".$row['rec_date'].""));
												?>                     
															<tr>
																<th scope="row"><?php echo $counter; ?></th>
																<td><?php echo $row['rec_date']; ?></td>
																<td><?php echo $row['rec_rent']; ?></td>
															</tr>	
														<?php  $counter++;
														} 
												 } ?>
											</tbody>
										</table>	
										</div>	
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>