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
	$where .= " where (nf.fin_cname like '%".$_REQUEST['searchbyorder']."%' OR nu.uname like '%".$_REQUEST['searchbyorder']."%' OR nf.fin_id = '".$_REQUEST['searchbyorder']."')";
	if (isset($_REQUEST['cstatus'] ) && $_REQUEST['cstatus']!= "") {
		if ($_REQUEST['cstatus'] == "cu") {
			$where .= "AND nf.fin_end_date =''";
		}if ($_REQUEST['cstatus'] == "cl") {
			$where .= "AND nf.fin_end_date <>''";
		}
	}
}else {
if (isset($_REQUEST['cstatus'] ) && $_REQUEST['cstatus']!= "") {
		if ($_REQUEST['cstatus'] == "cu") {
			$where .= " where nf.fin_end_date =''";
		}if ($_REQUEST['cstatus'] == "cl") {
			$where .= " where nf.fin_end_date <>''";
		}
	}
}

$Count = $ketObj->runquery( "SELECT", "count(*)", "nar_finance nf INNER JOIN nar_user nu ON nu.uid = nf.fin_deal_person_id", array(), $where  );
$hold = $Count['0']['count(*)']; 
$counter = 1; 	
if(isset($_GET['vid']) && $_GET['vid']!="") {
	$vid1 = ($_GET['vid']-1)*10;
	$counter= $vid1+1;
	$vid1 = ($_GET['vid']-1)*10;
	$all_lend_money = $ketObj->runquery( "SELECT", "nf.fin_id,nf.fin_cname,nf.fin_caddress,nf.fin_cmobile,nf.fin_amount,nf.fin_start_date,nf.fin_end_date,nf.fin_end_date,nf.fin_est,nf.fin_irate,nu.uname", "nar_finance nf INNER JOIN nar_user nu ON nu.uid = nf.fin_deal_person_id", array(), $where." limit ".$vid1.",10"  );
	//$rowe = runquery("SELECT","*","artical","","".$where."limit ".$vid1.",10");
    //$count= $vid1+1;
	}
else {
	$all_lend_money = $ketObj->runquery( "SELECT", "nf.fin_id,nf.fin_cname,nf.fin_caddress,nf.fin_cmobile,nf.fin_amount,nf.fin_start_date,nf.fin_end_date,nf.fin_end_date,nf.fin_est,nf.fin_irate,nu.uname", "nar_finance nf INNER JOIN nar_user nu ON nu.uid = nf.fin_deal_person_id", array(), $where." limit 0,10"  );
}
$qstring="";
if( isset( $_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder'] != "" ){	
	$qstring .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
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
                              Lend Money List
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
                                   
								<select name="cstatus" id ="cstatus" class="form-control">
										<option value="">Choose Status</option>
										<option value="cu"<?php if( isset( $_REQUEST['cstatus'] ) && $_REQUEST['cstatus'] == "cu" ){ echo "selected='selected'";} ?>>Current A/c</option>
										<option value="cl"<?php if( isset( $_REQUEST['cstatus'] ) && $_REQUEST['cstatus'] == "cl" ){ echo "selected='selected'";} ?>>Close A/c</option>
				                </select>     
								<span class="input-group-btn">
								
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                            </div>
							</div>
                            
							<input type="hidden" class="form-control" placeholder="Search for..." name = "view" value="finance" />
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
													<th>Case No.</th>
													<th>Customer</th>
													<th>photo</th>
													<th>Address</th>
													<th>Contact No.</th>
													<th>EMI Amt.</th>
													<th>Due EMI</th>
													<th>Due Emi</th>
													<th>Deal Person</th>
													<th>A/c Closing Date</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$counter = 1;
													if( isset( $all_lend_money ) && is_array( $all_lend_money ) && count( $all_lend_money ) > 0 ){
														foreach( $all_lend_money as $Key=>$row ) {
														 $refinance=lendMoneyViewC($row['fin_id'],$ketObj);
														/* echo "<pre>";
														 print_r($refinance);
														 die(); */ 
												?>                  
															<tr <?php echo $refinance['financeDueMonth']>2?'style="background-color:#FF9191"':""; ?>>
																<th scope="row"><?php echo $counter; ?></th>
																<td><?php echo "DDLC_".$row['fin_id']; ?></td>
																<td><a href="index.php?file=lendMoneyView&controller=finance&task=lendMoneyView&esday=<?php echo $row['fin_est'];  ?>&sdate=<?php echo $row['fin_start_date'];  ?>&famount=<?php echo $row['fin_amount']; ?>&frate=<?php echo $row['fin_irate']; ?>&pid=<?php echo $row['fin_id']; ?>" class="text-primary" target="_blank"><?php echo $row['fin_cname']; ?></a></td>
																<td><img src="document/<?php echo $row['fin_id'];?>/photo.jpg" width="100px" height="100px"/></td>
																<td><?php echo $row['fin_caddress']; ?></td>
																<td><?php echo $row['fin_cmobile']; ?></td>
																<td><?php echo $refinance['monthlyEmi']; ?></td>
																<td><?php echo round($refinance['dueEmiAmt'],2);?></td>
																<td><?php echo $refinance['financeDueMonth']; ?></td>
																<td><?php echo $row['uname']; ?></td>
																<td><?php echo $row['fin_end_date']; ?></td>
																
																
												
													<td>
												<?php if (isset($_SESSION['lend_money'])) {
											echo $_SESSION['lend_money']>0 ? '<a href="index.php?view=finance&file=lend_money&edit='.$row['fin_id'].''.$qstring.'" class ="btn btn-info">Edit</a>':'<a href="#" class ="largeWarningBasic btn btn-info">Edit</a>';
										}else {
										?>
										 <a href ="index.php?view=finance&file=lend_money&edit=<?php echo $row['fin_id'];?><?php if( isset( $qstring ) && $qstring!=""){ echo $qstring;}?>" class ="btn btn-info">Edit</a>
									<?php
										}
									?>
									 <a href ="index.php?view=finance&file=received_money&edit=<?php echo $row['fin_id'];?><?php if( isset( $qstring ) && $qstring!=""){ echo $qstring;}?>" class ="btn btn-info">Recieved Money</a>
									<?php if (isset($_SESSION['lend_money'])) {
											echo $_SESSION['lend_money']>0 ? '<a href="index.php?controller=delete&delete='.$row['fin_id'].''.$qstring.'&chk=findelete&view=finance" class ="btn btn-danger" onclick="return confirmdelete()">Delete</a>':'<a href="#" class ="largeWarningBasic btn btn-danger">Delete</a>';
										}else {
										?>
										 <a href ="index.php?controller=delete&delete=<?php echo $row['fin_id']; ?>&chk=findelete&view=finance<?php if( isset( $qstring ) && $qstring!=""){ echo $qstring;}?>"class ="btn btn-danger" onclick="return confirmdelete()">Delete</a>
									<?php
										}
									?>
									
									</td>
														</tr>
												  <?php	
												  	$counter++;		
														}	
														
													 }	
													$path = 'index.php?view=finance';
													
													
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