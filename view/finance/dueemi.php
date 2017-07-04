<?php  if( isset($_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder']!="" ){ 
	if (isset($_REQUEST['tilldate'])) {
		header('location:index.php?view=finance&tilldate='.$_REQUEST['searchbyorder']);
	}
/*echo "hello"; die();*/$searchorder =$_REQUEST['searchbyorder'];}
else {
$searchorder =date('d/m/Y');
}
$wherefin = " where fin_est ='".str_replace("0","",date("d",strtotime(str_replace("/","-","".$searchorder.""))))."'";
$recfinance=$ketObj->runquery( "SELECT","fin_id,fin_cname,fin_caddress,fin_cmobile,fin_emi", "nar_finance", array(),"".$wherefin."","");
$qstring="";
if( isset( $_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder'] != "" ){	
	$qstring .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
}
//echo "<pre>";print_r($recfinance);
?>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                           Due EMI List
                			</h3>
                        </div>
						
                        <div class="title_right">
                           <form name="searchorder" id = "searchorder" action="index.php" method="post" role ="search" class="navbar-form">
                            
							
							<div col-md-5 col-sm-5 col-xs-12 class="form-group row">
								<input type="text" id="single_calr1" style="line-height:30px;"  placeholder="Date  D/M/Y" name="searchbyorder" value="<?php if( isset($searchorder) && $searchorder!="" ){ echo $searchorder;} ?>" class="form-control"/><span id="inputSuccess2Status2" class="sr-only">(success)</span>
															<button class="btn btn-primary" type="submit" style="padding:5px;margin-top:7px;"  name="moneyr" value="moneyr">Result</button>
													<button class="btn btn-primary" type="submit" style="padding:5px;margin-top:7px;"  name="tilldate" value="tilldate">Till Due EMI </button>		
													</div>
							<input type="hidden" class="form-control" placeholder="Search for..." name = "view" value="finance" />
							<input type="hidden" class="form-control" placeholder="Search for..." name = "file" value="dueemi" />
							
						</form>
						
                        </div>
						
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Results </h2>
										<ul class="nav navbar-right panel_toolbox"></ul>
                                  <div class="clearfix"></div>
                                   
								</div>	
                               
                                <div class="x_content" id="all_row">
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>#</th>
													<!--<th>Case No.</th>-->
													<th>Customer</th>
													<th>Address</th>
													<th>Contact No.</th>
													<th>EMI Amt.</th>
													
												</tr>
											</thead>
											<tbody>
												<?php
													$counter = 1;
													if( isset( $recfinance ) && is_array( $recfinance ) && count( $recfinance ) > 0 )
													{
														foreach( $recfinance as $key=>$row ) {?>                     
															<tr>
																<th scope="row"><?php echo $counter; ?></th>
																<!--<td><?php echo $row['fin_id']; ?></td>-->
																<td><?php echo $row['fin_cname']; ?></td>
																<td><?php echo $row['fin_caddress']; ?></td>
																<td><?php echo $row['fin_cmobile']; ?></td>
																<td><?php echo $row['fin_emi']; ?></td>
														<?php $counter++; } }?>
														</tr>
												</tbody>
										</table>
										<input type="hidden" id="row_no" value="10">
									</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
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