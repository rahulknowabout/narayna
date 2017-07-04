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
<?php 

 $where = "";
if( isset($_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder']!="" ) {
	$where = " where (nu.uname like '%".$_REQUEST['searchbyorder']."%' OR ne.exp_date = '".$_REQUEST['searchbyorder']."')";
	if( isset( $_REQUEST['ss_date'] ) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!=""){
	$where .= " AND ne.exp_date between '".$_REQUEST['ss_date']."' AND'".$_REQUEST['es_date']."'";
	
	}
}else {
if( isset( $_REQUEST['ss_date'] ) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!=""){
	$where .= " where ne.exp_date between '".$_REQUEST['ss_date']."' AND'".$_REQUEST['es_date']."'";
	
	}
}
$Count = $ketObj->runquery( "SELECT", "count(*)", "nar_expansion ne INNER JOIN nar_user nu ON nu.uid = ne.exp_user_id", array(), $where  );
$hold = $Count['0']['count(*)']; 
$counter = 1; 	
if(isset($_GET['vid']) && $_GET['vid']!="") {
	$vid1 = ($_GET['vid']-1)*10;
	$counter= $vid1+1;
	$vid1 = ($_GET['vid']-1)*10;
	$all_expansion = $ketObj->runquery( "SELECT", "ne.exp_id,ne.exp_date,ne.exp_amount,nu.uname", "nar_expansion ne INNER JOIN nar_user nu ON nu.uid = ne.exp_user_id", array(), $where." limit ".$vid1.",10"  );
	//$rowe = runquery("SELECT","*","artical","","".$where."limit ".$vid1.",10");
    //$count= $vid1+1;
	}
else {
	$all_expansion = $ketObj->runquery( "SELECT", "ne.exp_id,ne.exp_date,ne.exp_amount,nu.uname", "nar_expansion ne INNER JOIN nar_user nu ON nu.uid = ne.exp_user_id", array(), $where." limit 0,10"  );
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
}/* echo "<pre>";
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
													<th>Amount</th>
													<th>Expenses By</th>
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
																<td><?php echo $row['exp_amount']; ?></td>
																<td><?php echo $row['uname']; ?></td>
																<td>
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
												<?php			
														$counter++;}	
														
													 }	
													$path = 'index.php?view=expansion';
													
													
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