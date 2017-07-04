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
<?php //echo "<pre>";print_r($_REQUEST);die();
$recrent=array();
if (isset($_REQUEST['pid']) && $_REQUEST['pid']>0)	{
			$refinance=lendMoneyViewC($_REQUEST['pid'],$ketObj);
}
 //echo "<pre>";print_r($refinance); die();
$lastDate ="";
$lastemi="";
 if (isset($refinance['recfinance']) && is_array($refinance['recfinance']) && count($refinance['recfinance'])>0) {
 		$lastDate =$refinance['recfinance']['0']['fin_rec_date'];
		$lastemi =$refinance['recfinance']['0']['fin_rec_amount'];
		foreach ($refinance['recfinance'] as $keyp => $rowp) {
			$lastDateStr =strtotime($lastDate);
			foreach ($refinance['recfinance'] as $keyc => $rowc) {
				if ($keyc > 0) {
					$date2 =strtotime($rowc['fin_rec_date']);
					if ($lastDateStr<$date2) {
						$lastDate =$rowc['fin_rec_date'];
						$lastemi =$rowc['fin_rec_amount'];
					}
				}
			}
		}
 }
if (isset($refinance) && is_array($refinance) && count($refinance)>0) {
$lend_money_customer =$refinance['lend_money_customer']['0'];
$monthEmi =$refinance['monthlyEmi'];
$dueEmi =$refinance['financeDueMonth'];
$unadjustmentAmount=$refinance['unadjustmentAmount'];
$totalReceiveFinance =$refinance['totalReceiveFinance'];
$totalPayment =$refinance['totalPayment'];
$dueEmiAmt=$refinance['dueEmiAmt'];
}else {
$lend_money_customer ="";
$monthEmi ="";
$dueEmi ="";
$unadjustmentAmount="";
$totalReceiveFinance ="";
$totalPayment ="";
$dueEmiAmt ="";
}
if ( isset($lend_money_customer) && is_array($lend_money_customer) && count($lend_money_customer) > 0) {
	$cusid =$lend_money_customer['fin_id'];
	$customerName =$lend_money_customer['fin_cname'];
	$customerAddress =$lend_money_customer['fin_caddress'];
	$customerMobile =$lend_money_customer['fin_cmobile'];
	$financeAmount=$lend_money_customer['fin_amount'];
	$smdy =date("d/m/Y",strtotime("".$lend_money_customer['fin_start_date'].""));
	$financeStartDate =$smdy;
	$acClosingDate =$lend_money_customer['fin_end_date'];
	$emiDay =$lend_money_customer['fin_est'];
	$dealPerson =$lend_money_customer['uname'];  
}else {
	$cusid ="";
	$customerName ="";
	$customerAddress ="";
	$customerMobile ="";
	$financeAmount="";
	$financeStartDate ="";
	$acClosingDate ="";
	$emiDay ="";
	$dealPerson =""; 
} 
$lastDate =date("d/m/Y",strtotime("".$lastDate.""));
 /*echo $lastDate;
 echo "<hr/>";
 echo $lastemi;
 echo "<hr/>";
 echo "<pre>";print_r($refinance); die();*/
 
/*if (isset($recrent) && is_array($recrent) && count($recrent)>0) {
$lastRent =$recrent['recrent']['0']['rec_rent'];
$lastRentDate =$recrent['recrent']['0']['rec_date'];
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
}*/
?><div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                              Lend Money Report
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
													<th>Customer</th>
													<td><?php echo $customerName; ?></td>
												</tr>
												<tr>
													<th>Photo</th>
													<td><img src="document/<?php echo $cusid;?>/photo.jpg" width="100px" height="100px"/></td>
												</tr>
												<tr>
													<th>Address</th>
													<td><?php echo $customerAddress; ?></td>
												</tr>
												<tr>
													<th>Contact No.</th>
													<td><?php echo $customerMobile; ?></td>
												</tr>
												<tr>
													<th>Finance Amount</th>
													<td><?php echo $financeAmount; ?></td>
												</tr>
												<tr>
													<th>Finance Start Date</th>
													<td><?php echo $financeStartDate; ?></td>
												</tr>
												<tr>
													<th>A/c Closing Date</th>
													<td><?php echo $acClosingDate; ?></td>
												</tr>
												<tr>
													<th>EMI Day</th>
													<td><?php echo $emiDay; ?></td>
												</tr>
												<tr>
													<th>Monthly EMI</th>
													<td><?php echo $monthEmi; ?></td>
												</tr>
												<tr>
													<th>Deal By</th>
													<td><?php echo $dealPerson; ?></td>
												</tr>
												<tr>
													<th>Document</th>
													<td><?php
																$dir = 'document/'.$cusid;
																if (is_dir($dir)){
									  								if ($dh = opendir($dir)){
																		while (($file = readdir($dh)) !== false){
																			if ($file == "." || $file == ".." || $file == "..." || $file == "photo.jpg") {}else {
										 									 	echo "<a href='index.php?view=finance&file=lendMoneyView&ulink=".$file."&docid=".$cusid."&controller=finance&task=unlinkFile' onclick='return confirmdelete()'><img src='images/ndelete.png'</a><a href='document/".$cusid."/".$file."' target ='_blank' style ='color: blue;'>".$file."</a><br/>";
																			}	
																		}
																		closedir($dh);
									  							}
															}
																
																?>
																</td>
												</tr>
											</tbody>
											
										</table>
									</div>
									<div class="well"><div class="row"><p><span class="text-danger col-md-6 col-sm-12 col-xs-12">Last EMI On: <?php echo $lastDate; ?></span><span class="text-primary col-md-6 col-sm-12 col-xs-12">Total Receive EMI:  <?php echo $totalReceiveFinance; ?></span></p><p><span class="text-danger col-md-6 col-sm-12 col-xs-12">Last EMI Amount: <?php echo $lastemi; ?></span><span class="text-primary col-md-6 col-sm-12 col-xs-12">Total EMI:  <?php echo $totalPayment; ?></span></p><p><span class="text-danger col-md-6 col-sm-12 col-xs-12">Due EMI: <?php echo $dueEmi; ?></span><span class="text-primary col-md-6 col-sm-12 col-xs-12">Unadjustment Amount:  <?php echo $unadjustmentAmount; ?></span></p><p><span class="text-danger col-md-6 col-sm-12 col-xs-12">Due EMI Amt.: <?php echo round($dueEmiAmt,2); ?></span></p></div>
									</div>
									<h2>Recieved EMI</h2>
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Date</th>
													<th>EMI</th>
												</tr>
											</thead>
											<tbody>
												<?php
													
													if( isset( $refinance['recfinance'] ) && is_array( $refinance['recfinance'] ) && count( $refinance['recfinance'] ) > 0 ) { $counter = 1;
														foreach( $refinance['recfinance'] as $key=>$row ) {
															$row['fin_rec_date'] =date("d/m/Y",strtotime("".$row['fin_rec_date'].""));
												?>                     
															<tr>
																<th scope="row"><?php echo $counter; ?></th>
																<td><?php echo $row['fin_rec_date']; ?></td>
																<td><?php echo $row['fin_rec_amount']; ?></td>
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