<?php /* $user_all = $ketObj->runquery( "SELECT", "count(*) as user_all", "nar_user", array(),"");
if ($user_all['0']['user_all']>0) {
	$user_all = $user_all['0']['user_all'];
}else {
	$user_all = 0;
}
$property_all = $ketObj->runquery( "SELECT", "count(*) as property_all", "nar_property", array(),"");
if ($property_all['0']['property_all']>0) {
	$property_all = $property_all['0']['property_all'];
}else {
	$property_all = 0;
}
$lsum = $ketObj->runquery( "SELECT", "sum(fin_amount) as lsum", "nar_finance", array(),"limit 1");
if ($lsum['0']['lsum']>0) {
	$lsum = $lsum['0']['lsum'];
}else {
	$lsum = 0;
}
$esum = $ketObj->runquery( "SELECT", "sum(exp_amount) as esum", "nar_expansion", array(),"limit 1");
if ($esum['0']['esum']>0) {
	$esum = $esum['0']['esum'];
}else {
	$esum = 0;
}
$property_rent = $ketObj->runquery( "SELECT", " DISTINCT rent_property_id as property_rent", "nar_rent", array(),"","num_rows");
if ($property_rent>0) {
	$property_rent = $property_rent;
}else {
	$property_rent = 0;
}*/
##$max_borrow =$ketObj->runquery( "SELECT", "fin_id,fin_cname,fin_caddress,fin_amount,fin_cmobile", "nar_finance", array()," order by fin_amount DESC limit 5");
/*$last_exp =$ketObj->runquery( "SELECT", "exp_id,exp_date,exp_desc,exp_amount", "nar_expansion", array()," order by exp_date DESC limit 5");
$last_rent =$ketObj->runquery( "SELECT", "nrec.rec_rent,nrec.rec_date,np.title,nr.rent_name", "nar_recrent nrec INNER JOIN nar_property np ON nrec.rec_property_id =np.pid INNER JOIN nar_rent nr ON nrec.rec_renter_id = nr.rent_id", array()," order by rec_date DESC limit 5");
$last_lend =$ketObj->runquery( "SELECT", "fin_id,fin_cname,fin_caddress,fin_ccity,fin_amount,fin_cmobile,fin_start_date", "nar_finance", array()," order by fin_start_date DESC limit 5");*/
/*echo "<pre>";
print_r($last_lend);
die();*/
?>
<div class="right_col" role="main">

                <!--<br />-->
                <div class="">

                    <!--<div class="row tile_count">
                    <div class="animated flipInY col-md-2 col-sm-6 col-xs-6 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><!--<i class="fa fa-user"></i>Total Users</span>
                            <div class="count"><?php echo $user_all; ?></div>
                           <!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span>
                        </div>
                    </div>-->
                    <!--<div class="animated flipInY col-md-2 col-sm-6 col-xs-6 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><!--<i class="fa fa-clock-o"></i>Total Properties</span>
                            <div class="count"><?php echo $property_all; ?></div>
                            <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
                        </div>
                    </div>-->
                   <!-- <div class="animated flipInY col-md-2 col-sm-6 col-xs-6 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><!--<i class="fa fa-user"></i>Rent Properties</span>
                            <div class="count green"><?php echo $property_rent; ?></div>
                            <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                        </div>
                    </div>-->
                    <!--<div class="animated flipInY col-md-3 col-sm-6 col-xs-6 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><!--<i class="fa fa-user"></i> Total Lend Money</span>
                            <div class="count"><?php echo $lsum; ?></div>
                            <!--<span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
                        </div>
                    </div>-->
                    <!--<div class="animated flipInY col-md-3 col-sm-6 col-xs-6 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><!--<i class="fa fa-user"></i>Total Expansion</span>
                            <div class="count"><?php echo $esum; ?></div>
                            <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                        </div>
                    </div>
 <div class="clearfix"></div>-->
 <br/>
                    <div class="row">
                        <!--<div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Finance | Rent</h2>
                                    <div class="filter">
                                        <!--<div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
								<div class="col-md-5 col-sm-12 col-xs-12">
                                       
                                            <!--<div id="placeholder33x" class="demo-placeholder"></div>
											<img src="finance.jpg"/>
											<img src="finance8.jpg"/>
											<img src="finance9.jpg" width ="100px"/>
                                  </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                       
                                            <!--<div id="placeholder33x" class="demo-placeholder"></div>
											<img src="rent.jpg"/>
											<img src="finance2.jpg"/>
                                        </div>
										
                                        <!--<div class="tiles">
                                            <div class="col-md-4 tile">
                                                <span>Total Sessions</span>
                                                <h2>231,659</h2>
                                                <span class="sparkline11 graph" style="height: 165px;">
                                        <canvas width="200" height="65" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                    </span>
                                            </div>
                                            <div class="col-md-4 tile">
                                                <span>Total Revenue</span>
                                                <h2>$231,659</h2>
                                                <span class="sparkline22 graph" style="height: 165px;">
                                        <canvas width="200" height="65" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                    </span>
                                            </div>
                                            <div class="col-md-4 tile">
                                                <span>Total Sessions</span>
                                                <h2>231,659</h2>
                                                <span class="sparkline11 graph" style="height: 165px;">
                                        <canvas width="200" height="65" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                    </span>
                                            </div>
                                        </div>


                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div>
                                            <div class="x_title">
                                                
											<h2>Max Borrowing Customer</h2>
                                                <!--<ul class="nav navbar-right panel_toolbox">
                                                    <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="#">Settings 1</a>
                                                            </li>
                                                            <li><a href="#">Settings 2</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#"><i class="fa fa-close"></i></a>
                                                    </li>
                                                </ul>
                                                <div class="clearfix"></div>
                                            </div>
                                            <ul class="list-unstyled top_profiles scroll-view">
											<?php if (isset($max_borrow) && is_array($max_borrow) && count($max_borrow)>0) {
												foreach ($max_borrow as $key => $row) {
											?>		<li class="media event">
                                                    <a class="pull-left border-aero profile_thumb">
                                                        <i class="fa fa-user aero"></i>
                                                    </a>
                                                    <div class="media-body">
                                                        <a class="title" href="#"><?php echo $row['fin_cname']; ?></a>
                                                        <p><strong><?php echo $row['fin_amount']; ?></strong>,Address:-<?php echo $row['fin_caddress']; ?></p>
                                                        <p>Mobile:-<small><?php echo $row['fin_cmobile']; ?></small>
                                                        </p>
                                                    </div>
                                                </li>
											<?php		
												}
											} ?>
                                               
                                                
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>-->
<div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel tile fixed_height_320">
                            <div class="x_title">
                                <h2><?php if (isset($_SESSION['lend_money_list'])) {
											echo $_SESSION['lend_money_list']>0 ? '<a href="index.php?view=finance">Bank</a>':'<a href="#" class ="largeWarningBasic">Bank</a>';
										}else {
										?>
										<a href="index.php?view=finance">Bank</a>
									<?php
										}
									?></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <!--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>-->
                                    <!--<li class="dropdown">
                                        <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-wrench"></i></a>
                                        <ul role="menu" class="dropdown-menu">
                                            <?php if (isset($_SESSION['lend_money'])) {
											echo $_SESSION['lend_money']>0 ? '<li><a href="index.php?view=finance&file=lend_money">Lend Money</a></li>':'<li><a href="#" class ="largeWarningBasic">Lend Money</a></li>';
										}else {
										?>
										 <li><a href="index.php?view=finance&file=lend_money">Lend Money</a>
                                        </li>
									<?php
										}
									?><?php if (isset($_SESSION['lend_money_list'])) {
											echo $_SESSION['lend_money_list']>0 ? '<li><a href="index.php?view=finance">List</a></li>':'<li><a href="#" class ="largeWarningBasic">List</a></li>';
										}else {
										?>
										 <li><a href="index.php?view=finance">List</a>
                                        </li>
									<?php
										}
									?>  </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>-->
                                      
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
								
                                <h4><?php if (isset($_SESSION['lend_money_list'])) {
											echo $_SESSION['lend_money_list']>0 ? '<a href="index.php?view=finance">Finance Detail</a>':'<a href="#" class ="largeWarningBasic">Finance Detail</a>';
										}else {
										?>
										 <a href="index.php?view=finance">Finance Detail</a>
                                      
									<?php
										}
									?></h4>
                                <div class="widget_summary">
                                    <?php if (isset($_SESSION['lend_money_list'])) {
											echo $_SESSION['lend_money_list']>0 ? '<a href="index.php?view=finance"><img src ="icons/bank.png" width="65%" height="65%"/></a>':'<a href="#" class ="largeWarningBasic"><img src ="icons/bank.png" width="65%" height="65%"/></a>';
										}else {
										?>
										<a href ="index.php?view=finance"><img src ="icons/bank.png" width="60%" height="60%"/></a>									<?php
										}
										?>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="widget_summary">
                                    <div class="w_left w_55">
                                       <span aria-hidden="true" class="glyphicon glyphicon-arrow-right"></span>
                                   
                                        <!--<div class="progress">
                                            <div style="width: 45%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="65" role="progressbar" class="progress-bar bg-green">
                                                <span class="sr-only">65% Complete</span>
                                            </div>
                                        </div>-->
										<?php if (isset($_SESSION['lend_money'])) {
											echo $_SESSION['lend_money']>0 ? '<a href="index.php?view=finance&file=lend_money">Lend Money</a>':'<a href="#" class ="largeWarningBasic">Lend Money</a>';
										}else {
										?>
										 <a href="index.php?view=finance&file=lend_money">Lend Money</a>
                                      
									<?php
										}
									?>
                                    </div>
									<div class="w_right w_55">
                                       <span aria-hidden="true" class="glyphicon glyphicon-arrow-right" style="font-size:12px;"></span>
									   <?php if (isset($_SESSION['due_emi_list'])) {
											echo $_SESSION['due_emi_list']>0 ? '<a href="index.php?view=finance&file=dueemi">Due EMI List</a>':'<a href="#" class ="largeWarningBasic">Due EMI List</a>';
										}else {
										?>
										<a href="index.php?view=finance&file=dueemi">Due EMI List</a>
                                       
									<?php
										}
									?>
                                    </div>
                                   <!-- <div class="w_right w_20">
                                        <span>53k</span>
                                    </div>-->
                                    <div class="clearfix"></div>
                                </div>
                                <div class="widget_summary">
                                    <div class="w_left w_55">
                                       <span aria-hidden="true" class="glyphicon glyphicon-arrow-right"></span>
                                   
                                        <!--<div class="progress">
                                            <div style="width: 25%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="65" role="progressbar" class="progress-bar bg-green">
                                                <span class="sr-only">65% Complete</span>
                                            </div>
                                        </div>-->
										<?php if (isset($_SESSION['lend_money_list'])) {
											echo $_SESSION['lend_money_list']>0 ? '<a href="index.php?view=finance">List</a>':'<a href="#" class ="largeWarningBasic">List</a>';
										}else {
										?>
										 <a href="index.php?view=finance">List</a>
									<?php
										}
									?>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>
					<div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel tile fixed_height_320">
                            <div class="x_title">
                                <h2><a href="index.php?view=rent&file=rent_tmpl">Rent</a></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <!--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>-->
                                   <!-- <li class="dropdown">
                                        <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-wrench"></i></a>
                                        <ul role="menu" class="dropdown-menu">
                                            <li><a href="index.php?view=rent&file=rent">Rent</a>
                                            </li>
                                            <li><a href="index.php?view=rent&file=rent_tmpl">List</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>-->
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
								
                                <h4><?php if (isset($_SESSION['list_renter'])) {
											echo $_SESSION['list_renter']>0 ? '<a href="index.php?view=rent&file=rent_tmpl">Rent Property</a>':'<a href="#" class ="largeWarningBasic">Rent Property</a>';
										}else {
										?>
										<a href="index.php?view=rent&file=rent_tmpl">Rent Property</a>
                                       
									<?php
										}
									?></h4>
                                <div class="widget_summary">
									 <div class="w_center w_30">
                                    <?php if (isset($_SESSION['list_renter'])) {
											echo $_SESSION['list_renter']>0 ? '<a href="index.php?view=rent&file=rent_tmpl"><img src ="icons/rent.png" width="65%" height="65%"/></a>':'<a href="#" class ="largeWarningBasic"><img src ="icons/rent.png" width="65%" height="65%"/></a>';
										}else {
										?>
										<a href="index.php?view=rent&file=rent_tmpl"><img src ="icons/rent.png" width="60%" height="60%"/></a>
									<?php
										}
									?>
									</div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="widget_summary">
                                    <div class="w_left w_55">
                                       <span aria-hidden="true" class="glyphicon glyphicon-arrow-right"></span>
                                    
                                    
                                        <!--<div class="progress">
                                            <div style="width: 45%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="65" role="progressbar" class="progress-bar bg-green">
                                                <span class="sr-only">65% Complete</span>
                                            </div>
                                        </div>-->
										<?php if (isset($_SESSION['add_renter'])) {
											echo $_SESSION['add_renter']>0 ? '<a href="index.php?view=rent&file=rent_rec">Rent Received</a>':'<a href="#" class ="largeWarningBasic">Rent Received</a>';
										}else {
										?>
										<a href="index.php?view=rent&file=rent_rec">Rent Received</a>
                                       
									<?php
										}
									?>
									</div>
									<div class="w_right w_55">
                                       <span aria-hidden="true" class="glyphicon glyphicon-arrow-right" style="font-size:12px;"></span>
									   <?php if (isset($_SESSION['due_rent_list'])) {
											echo $_SESSION['due_rent_list']>0 ? '<a href="index.php?view=rent&file=duerent">Due Rent List</a>':'<a href="#" class ="largeWarningBasic">Due Rent List</a>';
										}else {
										?>
										<a href="index.php?view=rent&file=duerent">Due Rent List</a>
                                       
									<?php
										}
									?>
                                    </div>
                                   <!-- <div class="w_right w_20">
                                        <span>53k</span>
                                    </div>-->
                                    <div class="clearfix"></div>
                                </div>
                               <div class="widget_summary">
                                    <div class="w_left w_10">
                                       <span aria-hidden="true" class="glyphicon glyphicon-arrow-right"></span>
                                    </div>
                                    <div class="w_center w_25">
                                       <!-- <div class="progress">
                                            <div style="width: 25%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="65" role="progressbar" class="progress-bar bg-green">
                                                <span class="sr-only">65% Complete</span>
                                            </div>
                                        </div>-->
										<?php if (isset($_SESSION['list_renter'])) {
											echo $_SESSION['list_renter']>0 ? '<a href="index.php?view=rent&file=rent_tmpl">List</a>':'<a href="#" class ="largeWarningBasic">List</a>';
										}else {
										?>
										<a href="index.php?view=rent&file=rent_tmpl">List</a>
                                       
									<?php
										}
									?>
										
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>
					<div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel tile fixed_height_320">
                            <div class="x_title">
                                <h2><?php if (isset($_SESSION['chand'])) {
											echo $_SESSION['chand']>0 ? '<a href="index.php?view=chand">Cash In Hand</a>':'<a href="#" class ="largeWarningBasic">Cash In Hand</a>';
										}else {
										?>
										 <a href="index.php?view=chand">Cash In Hand</a>
                                      
									<?php
										}
									?></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <!--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>-->
                                    <!--<li class="dropdown">
                                        <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-wrench"></i></a>
                                        <ul role="menu" class="dropdown-menu">
                                            <!--<li><a href="#">Cash Amount</a>
                                            </li>-->
                                            <!--<li><a href="#">List</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>-->
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
								
                                <h4><?php if (isset($_SESSION['chand'])) {
											echo $_SESSION['chand']>0 ? '<a href="index.php?view=chand">Cash Detail</a>':'<a href="#" class ="largeWarningBasic">Cash Detail</a>';
										}else {
										?>
										 <a href="index.php?view=chand">Cash Detail</a>
                                      
									<?php
										}
									?></h4>
                                <div class="widget_summary">
								<?php if (isset($_SESSION['chand'])) {
											echo $_SESSION['chand']>0 ? '<a href="index.php?view=chand"><img src ="icons/cash_in_hand.png" width="65%" height="65%"/></a>':'<a href="#" class ="largeWarningBasic"><img src ="icons/cash_in_hand.png" width="65%" height="65%"/></a>';
										}else {
										?>
										 <a href="index.php?view=chand"><img src ="icons/cash_in_hand.png" width="60%" height="60%"/></a>
                                      
									<?php
										}
									?>
                                    
                                    <div class="clearfix"></div>
                                </div>

                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                       <!--<span aria-hidden="true" class="glyphicon glyphicon-arrow-right"></span>-->
                                    </div>
                                    <div class="w_center w_55">
                                        <!--<div class="progress">
                                            <div style="width: 45%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="65" role="progressbar" class="progress-bar bg-green">
                                                <span class="sr-only">65% Complete</span>
                                            </div>
                                        </div>-->
										<!--<a href="#">Cash Amount</a>-->
                                    </div>
                                   <!-- <div class="w_right w_20">
                                        <span>53k</span>
                                    </div>-->
                                    <div class="clearfix"></div>
                                </div>
                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                     <span></span>
                                    </div>
                                    <div class="w_center w_55">
                                        <!--<div class="progress">
                                            <div style="width: 25%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="65" role="progressbar" class="progress-bar bg-green">
                                                <span class="sr-only">65% Complete</span>
                                            </div>
                                        </div>-->
										<!--<a href="#">List</a>-->
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>
					<div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel tile fixed_height_320">
                            <div class="x_title">
                                <h2><?php if (isset($_SESSION['mrec'])) {
											echo $_SESSION['mrec']>0 ? '<a href="index.php?view=mreceive">Money Received</a>':'<a href="#" class ="largeWarningBasic">Money Received</a>';
										}else {
										?>
										 <a href="index.php?view=mreceive">Money Received</a>
                                      
									<?php
										}
									?>
								</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <!--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>-->
                                    <!--<li class="dropdown">
                                        <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-wrench"></i></a>
                                        <ul role="menu" class="dropdown-menu">
                                           <!-- <li><a href="#">Money</a>
                                            </li>-->
                                            <!--<li><a href="#">From </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>-->
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
								
                                <h4><?php if (isset($_SESSION['mrec'])) {
											echo $_SESSION['mrec']>0 ? '<a href="index.php?view=mreceive">Money Received Detail</a>':'<a href="#" class ="largeWarningBasic">Money Received Detail</a>';
										}else {
										?>
										 <a href="index.php?view=mreceive">Money Received Detail</a>
                                      
									<?php
										}
									?></h4>
                                <div class="widget_summary">
								<?php if (isset($_SESSION['mrec'])) {
											echo $_SESSION['mrec']>0 ? '<a href="index.php?view=mreceive"><img src ="icons/money_received.png" width="65%" height="65%"/></a>':'<a href="#" class ="largeWarningBasic"><img src ="icons/money_received.png" width="65%" height="65%"/></a>';
										}else {
										?>
										<a href="index.php?view=mreceive"><img src ="icons/money_received.png" width="60%" height="60%"/></a>
									<?php
										}
									?>
                                   
                                    <div class="clearfix"></div>
                                </div>

                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                       <!--<span aria-hidden="true" class="glyphicon glyphicon-arrow-right"></span>-->
                                    </div>
                                    <div class="w_center w_55">
                                        <!--<div class="progress">
                                            <div style="width: 45%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="65" role="progressbar" class="progress-bar bg-green">
                                                <span class="sr-only">65% Complete</span>
                                            </div>
                                        </div>-->
										<!--<a href="#">Money</a>-->
                                    </div>
                                   <!-- <div class="w_right w_20">
                                        <span>53k</span>
                                    </div>-->
                                    <div class="clearfix"></div>
                                </div>
                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                      <!-- <span aria-hidden="true" class="glyphicon glyphicon-arrow-right"></span>-->
                                    </div>
                                    <div class="w_center w_55">
                                        <!--<div class="progress">
                                            <div style="width: 25%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="65" role="progressbar" class="progress-bar bg-green">
                                                <span class="sr-only">65% Complete</span>
                                            </div>
                                        </div>-->
										<!--<a href="#">List</a>-->
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>
					<div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel tile fixed_height_320">
                            <div class="x_title">
                                <h2><?php if (isset($_SESSION['exp_list'])) {
											echo $_SESSION['exp_list']>0 ? '<a href="index.php?view=expansion">Expenses Detail</a>':'<a href="#" class ="largeWarningBasic">Expenses Detail</a>';
										}else {
										?>
										<a href="index.php?view=expansion">Expenses</a>
                                        
									<?php
										}
									?></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                   <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>-->
                                    <!--<li class="dropdown">
                                        <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-wrench"></i></a>
                                        <ul role="menu" class="dropdown-menu">
                                            <li><a href="index.php?view=expansion&file=add">Add</a>
                                            </li>
                                            <li><a href="index.php?view=expansion">List</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>-->
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
								
                                <h4><?php if (isset($_SESSION['exp_list'])) {
											echo $_SESSION['exp_list']>0 ? '<a href="index.php?view=expansion">Expenses Detail</a>':'<a href="#" class ="largeWarningBasic">Expenses Detail</a>';
										}else {
										?>
										<a href="index.php?view=expansion">Expenses Detail</a>
                                        
									<?php
										}
									?>
									</h4>
                                <div class="widget_summary">
								<?php if (isset($_SESSION['exp_list'])) {
											echo $_SESSION['exp_list']>0 ? '<a href="index.php?view=expansion"><img src ="icons/expenses.png" width="65%" height="65%"/></a>':'<a href="#" class ="largeWarningBasic"><img src ="icons/expenses.png" width="65%" height="65%"/></a>';
										}else {
										?>
										<a href="index.php?view=expansion"><img src ="icons/expenses.png" width="60%" height="60%"/></a>
                                        
									<?php
										}
									?>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                       <span aria-hidden="true" class="glyphicon glyphicon-arrow-right"></span>
                                    </div>
                                    <div class="w_center w_55">
                                        <!--<div class="progress">
                                            <div style="width: 45%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="65" role="progressbar" class="progress-bar bg-green">
                                                <span class="sr-only">65% Complete</span>
                                            </div>
                                        </div>-->
										 <?php if (isset($_SESSION['exp_add'])) {
											echo $_SESSION['exp_add']>0 ? '<a href="index.php?view=expansion&file=add">Add Expenses</a>':'<a href="#" class ="largeWarningBasic">Add Expenses</a>';
										}else {
										?>
										<a href="index.php?view=expansion&file=add">Add Expenses</a>
									<?php
										}
									?>
                                    </div>
                                   <!-- <div class="w_right w_20">
                                        <span>53k</span>
                                    </div>-->
                                    <div class="clearfix"></div>
                                </div>
                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                       <span aria-hidden="true" class="glyphicon glyphicon-arrow-right"></span>
                                    </div>
                                    <div class="w_center w_55">
                                        <!--<div class="progress">
                                            <div style="width: 25%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="65" role="progressbar" class="progress-bar bg-green">
                                                <span class="sr-only">65% Complete</span>
                                            </div>
                                        </div>-->
										<?php if (isset($_SESSION['exp_list'])) {
											echo $_SESSION['exp_list']>0 ? '<a href="index.php?view=expansion">See Expenses</a>':'<a href="#" class ="largeWarningBasic">See Expenses</a>';
										}else {
										?>
										<a href="index.php?view=expansion">See Expenses</a>
                                        
									<?php
										}
									?>
									 </div>
                                    
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>
					<div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel tile fixed_height_320">
                            <div class="x_title">
                                <h2><?php if (isset($_SESSION['user_list'])) {
											echo $_SESSION['user_list']>0 ? '<a href="index.php?view=user">User</a>':'<a href="#" class ="largeWarningBasic">User</a>';
										}else {
										?>
										<a href="index.php?view=user">Add User</a>
									<?php
										}
									?></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <!--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>-->
                                    <!--<li class="dropdown">
                                        <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-wrench"></i></a>
                                        <ul role="menu" class="dropdown-menu">
                                            <li><a href="index.php?view=user&file=add">Add</a>
                                            </li>
                                            <li><a href="index.php?view=user">List</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>-->
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
								
                                <h4><?php if (isset($_SESSION['user_list'])) {
											echo $_SESSION['user_list']>0 ? '<a href="index.php?view=user">User Detail</a>':'<a href="#" class ="largeWarningBasic">User Detail</a>';
										}else {
										?>
										<a href="index.php?view=user">User Detail</a>
									<?php
										}
									?></h4>
                                <div class="widget_summary">
								<?php if (isset($_SESSION['user_list'])) {
											echo $_SESSION['user_list']>0 ? '<a href="index.php?view=user"><img src ="icons/user.png" width="65%" height="65%"/></a>':'<a href="#" class ="largeWarningBasic"><img src ="icons/user.png" width="65%" height="65%"/></a>';
										}else {
										?>
										<a href="index.php?view=user"><img src ="icons/user.png" width="60%" height="60%"/></a>
									<?php
										}
									?>
                                    
                                    <div class="clearfix"></div>
                                </div>

                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                       <span aria-hidden="true" class="glyphicon glyphicon-arrow-right"></span>
                                    </div>
                                    <div class="w_center w_55">
                                        <!--<div class="progress">
                                            <div style="width: 45%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="65" role="progressbar" class="progress-bar bg-green">
                                                <span class="sr-only">67% Complete</span>
                                            </div>
                                        </div>-->
										<?php if (isset($_SESSION['user_add'])) {
											echo $_SESSION['user_add']>0 ? '<a href="index.php?view=user&file=add">Add User</a>':'<a href="#" class ="largeWarningBasic">Add User</a>';
										}else {
										?>
										<a href="index.php?view=user&file=add">Add User</a>
                                        
									<?php
										}
									?>
										
                                    </div>
                                   <!-- <div class="w_right w_20">
                                        <span>53k</span>
                                    </div>-->
                                    <div class="clearfix"></div>
                                </div>
                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                       <span aria-hidden="true" class="glyphicon glyphicon-arrow-right"></span>
                                    </div>
                                    <div class="w_center w_55">
                                        <!--<div class="progress">
                                            <div style="width: 25%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="67" role="progressbar" class="progress-bar bg-green">
                                                <span class="sr-only">67% Complete</span>
                                            </div>
                                        </div>-->
										<?php if (isset($_SESSION['user_list'])) {
											echo $_SESSION['user_list']>0 ? '<a href="index.php?view=user">See User</a>':'<a href="#" class ="largeWarningBasic">See User</a>';
										}else {
										?>
										<a href="index.php?view=user">See User</a>
									<?php
										}
									?>
										
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <!--<div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Weekly Summary <small>Activity shares</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
                                        <div class="col-md-7" style="overflow:hidden;">
                                            <span class="sparkline_one" style="height: 167px; padding: 10px 25px;">
                                    <canvas width="200" height="67" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                </span>
                                            <h4 style="margin:18px">Weekly sales progress</h4>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="row" style="text-align: center;">
                                                <div class="col-md-4">
                                                    <canvas id="canvas1i" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                                                    <h4 style="margin:0">Bounce Rates</h4>
                                                </div>
                                                <div class="col-md-4">
                                                    <canvas id="canvas1i2" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                                                    <h4 style="margin:0">New Traffic</h4>
                                                </div>
                                                <div class="col-md-4">
                                                    <canvas id="canvas1i3" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                                                    <h4 style="margin:0">Device Share</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->



                    <!--<div class="row">
                        <div class="col-md-4">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Last 5 Expansion</h2>
                                    <!--<ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
								<?php if (isset($last_exp) && is_array($last_exp) && count($last_exp)>0) {
										foreach ($last_exp as $key => $row) {
											?>	
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month"><?php echo date('M',strtotime($row['exp_date']));?></p>
                                            <p class="day"><?php echo date('d',strtotime($row['exp_date']));?></p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#"><?php echo $row['exp_amount']; ?></a>
                                            <p><?php echo $row['exp_desc'];?></p>
                                        </div>
                                    </article>
                                    
                                <?php		
									}
										} ?>
                                                   
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Last 5 Received Rent</h2>
                                    <!--<ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php if (isset($last_rent) && is_array($last_rent) && count($last_rent)>0) {
										foreach ($last_rent as $key => $row) {
											?>	
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month"><?php echo date('M',strtotime($row['rec_date']));?></p>
                                            <p class="day"><?php echo date('d',strtotime($row['rec_date']));?></p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#"><?php echo $row['title']; ?></a>
                                            <p><?php echo $row['rec_rent'];?></p>
                                        </div>
                                    </article>
                                    
                                <?php		
									}
										} ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Last 5 Lend Money</h2>
                                    <!--<ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php if (isset($last_lend) && is_array($last_lend) && count($last_lend)>0) {
										foreach ($last_lend as $key => $row) {
											?>	
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month"><?php echo date('M',strtotime($row['fin_start_date']));?></p>
                                            <p class="day"><?php echo date('d',strtotime($row['fin_start_date']));?></p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#"><?php echo $row['fin_amount']; ?></a>
                                            <p>customer Name:-<?php echo $row['fin_cname'];?></p>
											<p>City:-<?php echo $row['fin_ccity'];?></p>
                                        </div>
                                    </article>
                                    
                                <?php		
									}
										} ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- footer content -->
				</div>
                <footer>
                    <div class="">
                        <p class="pull-right">DDLC Company|
                         <?php if ($_SESSION['secure_ddlc'] == 'admin') { ?><span class="lead"> <i class="fa fa-bullseye"></i>Admin!</span><?php }else { ?><span class="lead"> <i class="fa fa-bullseye"></i>User!</span><?php } ?>   
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->

            </div>