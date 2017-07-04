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
<?php $opbalnce=0;
	  $receivedm=0;
	  $exps=0;
if( isset($_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder']!="" ) { $searchbyorder = date("m/d/Y",strtotime(str_replace("/","-","".$_REQUEST['searchbyorder']."")));}else{$searchbyorder =date('m/d/Y');}	  
if( isset($searchbyorder ) && $searchbyorder!="" ) {
	$pred =date('m/d/Y', strtotime('-1 day', strtotime($searchbyorder)));
	$wherefinp =" where fin_rec_date ='".$pred."'";
	$wherefin = " where fin_rec_date ='".$searchbyorder."'";
	$whererent = " where rec_date ='".$searchbyorder."'";
	$whererentp = " where rec_date ='".$pred."'";
	$whereexp= " where exp_date ='".date("d/m/Y",strtotime("".$searchbyorder.""))."'";
$opbalancef =$ketObj->runquery( "SELECT","sum(fin_rec_amount) as amt", "nar_fin_rec", array(),"".$wherefinp."","")['0']['amt'];
$opbalancer =$ketObj->runquery( "SELECT","sum(rec_rent) as amt", "nar_recrent", array(),"".$whererentp."","")['0']['amt'];	
$recfinance=$ketObj->runquery( "SELECT","sum(fin_rec_amount) as amt", "nar_fin_rec", array(),"".$wherefin."","")['0']['amt'];
$recrent=$ketObj->runquery( "SELECT","sum(rec_rent) as amt", "nar_recrent", array(),"".$whererent."","")['0']['amt'];
$exps=$ketObj->runquery( "SELECT","sum(exp_amount) as amt", "nar_expansion", array(),"".$whereexp."","")['0']['amt'];
$exps =$exps==""?0:$exps;
$recrent =$recrent==""?0:$recrent;
$opbalancer =$opbalancer==""?0:$opbalancer;
$opbalancef =$opbalancef==""?0:$opbalancef;
$opbalnce =$opbalancef+$opbalancer;
$receivedm =$recfinance+$recrent;
if ($opbalnce+$receivedm-$exps>=0) {
	$flag =1;
}else {
	$flag =0;
}	
}
?>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                            Cash In Hand
                			</h3>
                        </div>
						
                        <div class="title_right">
                           <form name="searchorder" id = "searchorder" action="index.php" method="post" role ="search" class="navbar-form">
                            
							
							<div col-md-5 col-sm-5 col-xs-12 class="form-group row">
							
								<input type="text" id="single_calr1" style="line-height:30px;"  placeholder="Date  M/D/Y" name="searchbyorder" value="<?php if( isset($searchbyorder) && $searchbyorder!="" ){ echo date("d/m/Y",strtotime("".$searchbyorder.""));} ?>" class="form-control"/>
															<button class="btn btn-primary" type="submit" style="padding:5px;margin-top:7px;"  name="chandr" value="chandr">Result</button>
													</div>
							<input type="hidden" class="form-control" placeholder="Search for..." name = "view" value="chand" />
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
                               
                                <div class="x_content" id="all_row">
									<div class="jumbotron">
  										<ul class="list-group">
											  <li class="list-group-item list-group-item-success">Opening Balance<span class="badge"><?php echo $opbalnce; ?></span></li>
											  <li class="list-group-item list-group-item-info">Expenses<span class="badge"><?php echo $exps; ?></span></li>
											  <li class="list-group-item list-group-item-warning">Money Received<span class="badge"><?php echo $receivedm; ?></span></li>
										</ul>
										<?php if ($flag)  {?>
										<button type="button" class="btn btn-success btn-lg">
  											<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Plus
										</button>
									<?php }else { ?>	
										<button type="button" class="btn btn-danger btn-lg">
										  <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Minus
										</button>
									<?php } ?>
  										<!--<p>...</p>
  										<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>-->
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

