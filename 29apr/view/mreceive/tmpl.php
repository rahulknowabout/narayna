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
<script>
function submitCheck(id,str,type) {
	if (type === "fin") {
		if (str === "hn") {
			document.getElementById('spinnerimgfa_'+id).style.display="block";
			document.getElementById('hstfaimg_'+id).style.display="none";
			
		}
		if (str === "sn") {
			document.getElementById('spinnerimgfb_'+id).style.display="block";
			document.getElementById('hstfbimg_'+id).style.display="none";
		}
	}
	if (type === "rent") {
		if (str === "hn") {
			document.getElementById('spinnerimgra_'+id).style.display="block";
			document.getElementById('hstraimg_'+id).style.display="none";
		}
		if (str === "sn") {
			document.getElementById('spinnerimgrb_'+id).style.display="block";
			document.getElementById('hstrbimg_'+id).style.display="none";
		}
	}
//alert(id);
//alert(str);
$.ajax( {  
	url: "index.php",
	type: 'POST',
	data: "aj=y&chk=mreceive&id="+id+"&str="+str+"&type="+type,
	dataType: 'html',
	success: function( msg, textStatus, xhr ) {
	//alert( msg );
	if (msg === "yes") {
	
		if (type === "fin") {
		if (str === "hn") {
			document.getElementById('spinnerimgfa_'+id).style.display="none";
			document.getElementById('hstfaimg_'+id).style.display="block";
			document.getElementById('finhsta_'+id).checked="checked";
			document.getElementById('finhsta_'+id).disabled="disabled";
		}
		if (str === "sn") {
			document.getElementById('spinnerimgfb_'+id).style.display="none";
			document.getElementById('hstfbimg_'+id).style.display="block";
			document.getElementById('finhstb_'+id).checked="checked";
			document.getElementById('finhstb_'+id).disabled="disabled";
		}
	}
	if (type === "rent") {
		if (str === "hn") {
			document.getElementById('spinnerimgra_'+id).style.display="none";
			document.getElementById('hstraimg_'+id).style.display="block";
			document.getElementById('renthsta_'+id).checked="checked";
			document.getElementById('renthsta_'+id).disabled="disabled";
		}
		if (str === "sn") {
			document.getElementById('spinnerimgrb_'+id).style.display="none";
			document.getElementById('hstrbimg_'+id).style.display="block";
			document.getElementById('renthstb_'+id).checked="checked";
			document.getElementById('renthstb_'+id).disabled="disabled";
		}
	}
		
	}		
	 }
 })
}
</script>
<?php $wherefin = "";
	  $whererent = "";
	  $recfinance =array();
	  $recrent=array();
	  $totalMoney =0;
	  $hold="";
if( isset($_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder']!="" ){ $searchorder =$_REQUEST['searchbyorder'];}
else {
$searchorder =date('d/m/Y');
}
$wherefin = " where nfr.fin_rec_date ='".date("m/d/Y",strtotime(str_replace("/","-","".$searchorder."")))."'";
	$whererent = " where nrc.rec_date ='".date("m/d/Y",strtotime(str_replace("/","-","".$searchorder."")))."'";
$recfinance=$ketObj->runquery( "SELECT","nfr.fin_rec_id,nf.fin_cname,nfr.fin_rec_date,nfr.fin_rec_amount,nfr.hsta,nfr.hstb", "nar_fin_rec nfr INNER JOIN nar_finance nf on nfr.fin_rec_cus_id=nf.fin_id", array(),"".$wherefin."","");

$recrent=$ketObj->runquery( "SELECT","rec_id,nr.rent_name,rec_rent,rec_date,nrc.hsta,nrc.hstb", "nar_recrent nrc INNER JOIN nar_rent nr on nrc.rec_renter_id=nr.rent_id", array(),"".$whererent."","");

$qstring="";
if( isset( $_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder'] != "" ){	
	$qstring .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
}
?>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                            Money  Received
                			</h3>
                        </div>
						
                        <div class="title_right">
                           <form name="searchorder" id = "searchorder" action="index.php" method="post" role ="search" class="navbar-form">
                            
							
							<div col-md-5 col-sm-5 col-xs-12 class="form-group row">
								<input type="text" id="single_calr1" style="line-height:30px;"  placeholder="Date  D/M/Y" name="searchbyorder" value="<?php if( isset($searchorder) && $searchorder!="" ){ echo $searchorder;} ?>" class="form-control"/><span id="inputSuccess2Status2" class="sr-only">(success)</span>
															<button class="btn btn-primary" type="submit" style="padding:5px;margin-top:7px;"  name="moneyr" value="moneyr">Result</button>
													</div>
							<input type="hidden" class="form-control" placeholder="Search for..." name = "view" value="mreceive" />
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
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Amount</th>
													<th>Received From</th>
													<th>Description</th>
													<th>HN</th>
													<th>SN</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$counter = 1;
													if( isset( $recfinance ) && is_array( $recfinance ) && count( $recfinance ) > 0 )
													{
														foreach( $recfinance as $key=>$row ) {
															$totalMoney +=$row['fin_rec_amount'];
												?>                     
															<tr>
																<th scope="row"><?php echo $counter; ?></th>
																<td><?php echo $row['fin_rec_amount']; ?></td>
																<td><?php echo $row['fin_cname']; ?></td>
																<td><?php echo "Finance"; ?></td>
																<td> <form name="checkboxboot_<?php echo $row['fin_rec_id'];?>" id = "checkboxboot_<?php echo $row['fin_rec_id'];?>" action="index.php" method="post"  cclass="form-horizontal form-label-left">
		<div class="checkbox checkbox-success" id="hstfaimg_<?php echo $row['fin_rec_id'];?>">
        <label>
        <input type="checkbox"  <?php echo $row['hsta'] > 0 ? "checked disabled='disabled'":""; ?>  onchange="submitCheck('<?php echo $row['fin_rec_id'];?>','hn','fin')" name="hsta" id="finhsta_<?php echo $row['fin_rec_id'];?>">
        </label>
      </div>
	  <div style="display:none" id="spinnerimgfa_<?php echo $row['fin_rec_id'];?>">
	  	<img src="spinner.gif" width="80px" height="80px;" />
	  </div>
	  </td>
	  
	  <td>
	  <div class="checkbox checkbox-success" id="hstfbimg_<?php echo $row['fin_rec_id'];?>">
        <label>
           <input type="checkbox"  <?php echo $row['hstb'] > 0 ? "checked='checked' disabled='disabled'":""; ?>  name="hstb" id="finhstb_<?php echo $row['fin_rec_id'];?>" onchange="submitCheck('<?php echo $row['fin_rec_id'];?>','sn','fin')">
		 
        </label>
      </div>
	  <div style="display:none" id="spinnerimgfb_<?php echo $row['fin_rec_id'];?>">
	  	<img src="spinner.gif" width="80px" height="80px;" />
	  </div>
	  <input type="hidden" name="task" value="checkStatus" />
			<input type="hidden" name="controller" value="finance" />
			<input type="hidden" name="hstab" value="<?php echo $row['hsta']; ?>" />
			<input type="hidden" name="hstbb" value="<?php echo $row['hstb']; ?>" />
			<input type="hidden" name="view" value="mreceive" />
			<input type="hidden" name="file" value="tmpl" />
			<input type="hidden" name="qstring" value="<?php echo $qstring; ?>" />
		<input type="hidden" name="fin_rec_id" value="<?php echo $row['fin_rec_id'];?>" />
	  </form></td>
																
																
												
																
									<?php $counter++;
									
										}
									?>
									
										</tr>
												<?php			
														}
														if( isset( $recrent ) && is_array( $recrent ) && count( $recrent ) > 0 )
													{
														foreach( $recrent as $key=>$row ) {
														$totalMoney +=$row['rec_rent'];
												?>                     
															<tr>
																<th scope="row"><?php echo $counter; ?></th>
																<td><?php echo $row['rec_rent']; ?></td>
																<td><?php echo $row['rent_name']; ?></td>
																<td><?php echo "Rent"; ?></td>
																<td> <form name="checkboxbootr_<?php echo $row['rec_id'];?>" id = "checkboxbootr_<?php echo $row['rec_id'];?>" action="index.php" method="post"  class="form-horizontal form-label-left">
		<div class="checkbox checkbox-success" id="hstraimg_<?php echo $row['rec_id'];?>">
        <label>
        <input type="checkbox"  <?php echo $row['hsta'] > 0 ? "checked disabled='disabled'":""; ?> onchange="submitCheck('<?php echo $row['rec_id'];?>','hn','rent')" name="hsta" id="renthsta_<?php echo $row['rec_id'];?>" >
        </label>
      </div>
	  <div style="display:none" id="spinnerimgra_<?php echo $row['rec_id'];?>">
	  	<img src="spinner.gif" width="80px" height="80px;" />
	  </div>
	  </td>
	  <td>
	  <div class="checkbox checkbox-success" id="hstrbimg_<?php echo $row['rec_id'];?>">
        <label>
           <input type="checkbox"  <?php echo $row['hstb'] > 0 ? "checked disabled='disabled'":""; ?>  name="hstb" id="renthstb_<?php echo $row['rec_id'];?>" onchange="submitCheck('<?php echo $row['rec_id'];?>','sn','rent')">
		 
        </label>
      </div>
	  <div style="display:none" id="spinnerimgrb_<?php echo $row['rec_id'];?>">
	  	<img src="spinner.gif" width="80px" height="80px;" />
	  </div>
	  <input type="hidden" name="task" value="checkStatus" />
			<input type="hidden" name="controller" value="rent" />
			<input type="hidden" name="view" value="mreceive" />
			<input type="hidden" name="hstab" value="<?php echo $row['hsta']; ?>" />
			<input type="hidden" name="hstbb" value="<?php echo $row['hstb']; ?>" />
			<input type="hidden" name="file" value="tmpl" />
			<input type="hidden" name="qstring" value="<?php echo $qstring; ?>" />
			<input type="hidden" name="rec_id" value="<?php echo $row['rec_id'];?>" />
	  </form></td>
																
																
												
																
									<?php $counter++;
									
										}
									?>
									
										</tr>
												<?php			
														}		
														
													
													
											
												/*$path = 'index.php?view=user';
													
													
													if( isset( $_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder'] != "" ){
														$path .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
													}
													echo '<tr><td align = "center" colspan = "15">'; 
													echo $ketObj->paginate($path,$hold);
													echo '</td></tr>';*/
										if( isset($_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder']!="" ) {	?>
											<tr><th>Total</th><th colspan="4"><?php echo $totalMoney; ?></th></tr>	
									    <?php } ?>			 
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