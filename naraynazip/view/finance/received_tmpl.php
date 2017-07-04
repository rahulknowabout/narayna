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
	$where = " where (nf.fin_cname like '%".$_REQUEST['searchbyorder']."%' OR nf.fin_cmobile like '%".$_REQUEST['searchbyorder']."%' OR nu.uname like '%".$_REQUEST['searchbyorder']."%')";
	if( isset( $_REQUEST['ss_date'] ) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!=""){
	$where .= " AND  nfr.fin_rec_date between '".$_REQUEST['ss_date']."' AND '".$_REQUEST['es_date']."'";
	
	}
}elseif( isset( $_REQUEST['ss_date'] ) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!=""){
	$where .= " where nfr.fin_rec_date between '".$_REQUEST['ss_date']."' AND '".$_REQUEST['es_date']."'";
}
$Count = $ketObj->runquery( "SELECT", "count(*)", "nar_fin_rec nfr INNER JOIN nar_finance nf ON nfr.fin_rec_cus_id = nf.fin_id INNER JOIN nar_user nu ON nu.uid = nf.fin_deal_person_id", array(), $where  );
$hold = $Count['0']['count(*)']; 
$counter = 1; 	
if(isset($_GET['vid']) && $_GET['vid']!="") {
	$vid1 = ($_GET['vid']-1)*10;
	$counter= $vid1+1;
	$vid1 = ($_GET['vid']-1)*10;
	$all_lend_money = $ketObj->runquery( "SELECT", "nf.fin_id,nf.fin_cname,nf.fin_caddress,nf.fin_cmobile,nfr.fin_rec_amount,nfr.fin_rec_id,nfr.fin_rec_date,nu.uname,nu.uid", "nar_fin_rec nfr INNER JOIN nar_finance nf ON nfr.fin_rec_cus_id = nf.fin_id INNER JOIN nar_user nu ON nu.uid = nf.fin_deal_person_id", array(), $where." limit ".$vid1.",10"  );
	//$rowe = runquery("SELECT","*","artical","","".$where."limit ".$vid1.",10");
    //$count= $vid1+1;
	}
else {
	$all_lend_money = $ketObj->runquery( "SELECT", "nf.fin_id,nf.fin_cname,nf.fin_caddress,nf.fin_cmobile,nfr.	fin_rec_amount,nfr.fin_rec_id,nfr.fin_rec_date,nu.uname,nu.uid", "nar_fin_rec nfr INNER JOIN nar_finance nf ON nfr.fin_rec_cus_id = nf.fin_id INNER JOIN nar_user nu ON nu.uid = nf.fin_deal_person_id", array(), $where." limit 0,10"  );
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
/*$all_lend_money = $ketObj->runquery( "SELECT", "nf.fin_id,nf.fin_cname,nf.fin_caddress,nf.fin_cmobile,nf.fin_amount,nf.fin_start_date,nf.fin_end_date,nu.uname", "nar_finance nf INNER JOIN nar_user nu ON nu.uid = nf.fin_deal_person_id");*/
/*echo "<pre>";
print_r( $all_lend_money );
die();*/
?>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                              Recieved Money List
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
							
							<div col-md-5 col-sm-5 col-xs-12 class="form-group row">
								<input type="text" id="single_calr1" style="line-height:30px;"  placeholder="Start Date  M/D/Y" name="ss_date" value="<?php if( isset($_REQUEST['ss_date']) && $_REQUEST['ss_date']!="" ){ echo $_REQUEST['ss_date'];} ?>" class="form-control"/><span id="inputSuccess2Status2" class="sr-only">(success)</span>
															
                                                   
												   <input type="text" id="single_calr2" style="line-height:30px;"  placeholder="End Date  M/D/Y"  name="es_date" value="<?php if( isset($_REQUEST['es_date']) && $_REQUEST['es_date']!="" ){ echo $_REQUEST['es_date'];}?>" class="form-control" /> <span id="inputSuccess2Status2" class="sr-only">(success)</span>
												    
												   	
								
                            <button class="btn btn-default" type="submit" name="search" value="search"><span class="glyphicon glyphicon-search"></button><button class="btn btn-primary" type="submit" style="padding:5px;" name="report" value="finance">Report</button>
													</div>
							<input type="hidden" class="form-control" placeholder="Search for..." name = "view" value="finance" />
							<input type="hidden" class="form-control" placeholder="Search for..." name = "file" value="received_tmpl" />
						</form>	
						
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Results </h2>
										<ul class="nav navbar-right panel_toolbox">
                                      
                                    </ul>
                                  <div class="clearfix"></div>
                                   
								</div>	
                               
                                <div class="x_content">
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Mobile</th>
													<th>Address</th>
													<th>Received Amount</th>
													<th>Received By</th>
													<th>Date</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
													##$counter = 1;
													if( isset( $all_lend_money ) && is_array( $all_lend_money ) && count( $all_lend_money ) > 0 )
													{
														foreach( $all_lend_money as $Key=>$row ) {
												?>                     
															<tr>
																<th scope="row"><?php echo $row['fin_rec_id']; ?></th>
																<td><?php echo $row['fin_cname']; ?></td>
																<td><?php echo $row['fin_cmobile']; ?></td>
																<td><?php echo $row['fin_caddress']; ?></td>
																<td><?php echo $row['fin_rec_amount']; ?></td>
																<td><?php echo $row['uname']; ?></td>
																<td><?php echo $row['fin_rec_date']; ?></td>
																
												
													<td>
												<?php if (isset($_SESSION['lend_money'])) {
											echo $_SESSION['lend_money']>0 ? '<a href="index.php?view=finance&file=received_money&edit='.$row['fin_id'].''.$qstring.'" class ="btn btn-info">Edit</a>':'<a href="#" class ="largeWarningBasic btn btn-info">Edit</a>';
										}else {
										?>
										 <a href ="index.php?view=finance&file=received_money&edit=<?php echo $row['fin_id'];?>&uid=<?php echo $row['uid']; ?>&fin_rec_date=<?php echo $row['fin_rec_date']; ?>&fin_rec_amount=<?php echo $row['fin_rec_amount']; ?>&fin_rec_id=<?php echo $row['fin_rec_id'];?><?php if( isset( $qstring ) && $qstring!=""){ echo $qstring;}?>" class ="btn btn-info">Edit</a>
									<?php
										}
									?>
									<!-- <a href ="index.php?view=finance&file=received_money&edit=<?php echo $row['fin_id'];?><?php if( isset( $qstring ) && $qstring!=""){ echo $qstring;}?>" class ="btn btn-info">Recieved Money</a>
									<?php if (isset($_SESSION['lend_money'])) {
											echo $_SESSION['lend_money']>0 ? '<a href="index.php?controller=delete&delete='.$row['fin_id'].''.$qstring.'&chk=findelete&view=finance" class ="btn btn-danger" onclick="return confirmdelete()">Delete</a>':'<a href="#" class ="largeWarningBasic btn btn-danger">Delete</a>';
										}else {
										?>
										 <a href ="index.php?controller=delete&delete=<?php echo $row['fin_id']; ?>&chk=findelete&view=finance<?php if( isset( $qstring ) && $qstring!=""){ echo $qstring;}?>"class ="btn btn-danger" onclick="return confirmdelete()">Delete</a>
									<?php
										}
									?>-->
									
									</td>
															</tr>
												  <?php			
														}	
														
													 }	
													$path = 'index.php?view=finance&file=received_tmpl';
													
													
													if( isset( $_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder'] != "" ){
														$path .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
													}
													if (isset( $_REQUEST['ss_date'] ) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!="") {
													$path .= "&ss_date=".$_REQUEST['ss_date']."&es_date=".$_REQUEST['es_date']."";
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