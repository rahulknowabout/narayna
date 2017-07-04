<?php if (isset( $_GET['edit'] ) && $_GET['edit'] > 0) {
		$where =" where fin_id =".$_GET['edit']." limit 1";
		$edit_fin = $ketObj->runquery( "SELECT", "fin_id,fin_cname,fin_caddress,fin_ccity,fin_cmobile,fin_del_mob,fin_emi", "nar_finance",array(),$where);
		if (is_array( $edit_fin ) && count( $edit_fin ) == 1) {
			$edit_fin =$edit_fin[0];
			$fin_id =$edit_fin['fin_id'];
			$fin_name =$edit_fin['fin_cname'];
			$fin_address =$edit_fin['fin_caddress'];
			$fin_city =$edit_fin['fin_ccity'];
			$fin_mobile =$edit_fin['fin_cmobile'];
			$fin_emi =$edit_fin['fin_emi'];
		}
}else {
			$fin_id =0;
			$fin_name ="";
			$fin_address ="";
			$fin_city ="";
			$fin_mobile ="";
			$fin_emi ="";
}
$userList = $ketObj->runquery( "SELECT", "*", "nar_user",array());
?>
<script>
function remaEmi() {
femi= Number(document.getElementById('femi').value);
//alert(femi);
fin_rec_amount =	 Number(document.getElementById('fin_rec_amount').value);
rema =femi-fin_rec_amount;
	if (rema >0) {
		document.getElementById('rema').value =rema;
	}else {
		document.getElementById('rema').value =0;
	}

}
</script>
<form class="form-horizontal form-label-left" data-parsley-validate="" name="lend_money" id="lend_money" method="post" action="index.php" enctype="multipart/form-data">
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">

            <div class="title_left">

                <h3>Received Money</h3>

            </div>

        </div>

        <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="x_panel">

                        <div class="x_content">

                             <br/>

                            <div class="form-group">

                                <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Name<span class="required">*</span>

                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <input placeholder="Customer Name" type="text" class="form-control col-md-7 col-xs-12" required="required" id="cnamed" name="cnamed" data-parsley-id="3686" value="<?php  echo $fin_name; ?>" disabled="disabled"/>
								</div>

                           </div>
							<div class="form-group">
								<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Address<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input placeholder="Customer Address" type="text" class="form-control col-md-7 col-xs-12" required="required" id="caddressd" name="caddressd" data-parsley-id="3686" value="<?php echo $fin_address; ?>" disabled="disabled"/>
								
								</div>
							</div>
                           	<div class="form-group">
                               <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">City<span class="required">*</span>
                               </label>


<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="Customer City" type="text" class="form-control col-md-7 col-xs-12" required="required" id="ccityd" name="ccityd" data-parsley-id="3686" value="<?php echo $fin_city; ?>" disabled="disabled"/>


</div>

</div>
<!--<div class="form-group">
                               <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">State<span class="required">*</span>
                               </label>


<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="Customer State" type="text" class="form-control col-md-7 col-xs-12" required="required" id="cstate" name="cstate" data-parsley-id="3686" value="<?php ##echo $cstate; ?>"/>

</div>

</div>-->
<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Mobile<span class="required">*</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="Customer Mobile" type="number" class="form-control col-md-7 col-xs-12" required="required" id="cmobiled" name="cmobiled" data-parsley-id="3686" value="<?php  echo $fin_mobile; ?>" min="0" disabled="disabled"/>


</div>

</div>
<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">EMI<span class="required">*</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="EMI" type="number" class="form-control col-md-7 col-xs-12" required="required" id="femi" name="femi" data-parsley-id="3686" value="<?php  echo $fin_emi; ?>" min="0" disabled="disabled"/>


</div>

</div>




<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Recieved Amount<span class="required">*</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-inr"></i></span>
  <input placeholder="Recieved Amount" type="number" class="form-control col-md-7 col-xs-12" required="required" id="fin_rec_amount" name="fin_rec_amount" data-parsley-id="3686" value="<?php  if (isset($_GET['fin_rec_amount']) && $_GET['fin_rec_amount']>0){echo $_GET['fin_rec_amount'];} ?>" min="0" onblur="remaEmi()"/>
</div>

</div>

</div>
<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Remaining<span class="required">*</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="Remaining" type="number" class="form-control col-md-7 col-xs-12" required="required" id="rema" name="rema" data-parsley-id="3686" value="<?php  if (isset($_GET['rema']) && $_GET['rema']>0){echo $_GET['rema'];} ?>" min="0"/>


</div>

</div>
<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Date*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                      					<fieldset>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" id="single_cal2" placeholder="Recieved Date  D/M/Y" aria-describedby="inputSuccess2Status2" name="start_date" value="<?php if (isset($_GET['fin_rec_date']) && $_GET['fin_rec_date']!=""){echo $_GET['fin_rec_date'];} ?>" required/>
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
							</div>
						</div>
<div class="form-group">
<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Received By<span class="required">*</span></label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
									<select name="deal_person" id ="deal_person" class="form-control">
										<option value="">Choose</option>
									
				                <?php if( is_array( $userList ) && count( $userList ) > 0 ) {
										foreach( $userList as $valueP ) {
										
								?>
										<option value="<?php echo $valueP['uid']; ?>" <?php if (isset($_GET['uid']) && $_GET['uid']== $valueP['uid']){echo "selected='selected'";} ?> ?><?php echo $valueP['uname'];?></option>
								<?php	
										}
								} 
								?>
                                 </select>   
                                </div>
</div>
<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Recieved Person Mobile<span class="required">*</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="Recieved Person Mobile" type="number" class="form-control col-md-7 col-xs-12" required="required" id="fin_del_mob" name="fin_del_mob" data-parsley-id="3686" value="<?php if (isset($_GET['findm']) && $_GET['findm']!=""){echo $_GET['findm'];}?>" min="0"/>

</div>

</div>
<div class="ln_solid"></div>

<div class="form-group">

<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

<button class="btn btn-success" type="submit">Submit</button>
<button class="btn btn-default" type="reset">Reset</button>

</div>
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">



</div>

</div>

</div>



</div>

</div>

</div>

</div>

</div>

</div>
<?php if (isset($_REQUEST['searchbyorder']) && $_REQUEST['searchbyorder']!="") { ?>
<input type="hidden" name="searchbyorder" id="searchbyorder" value="<?php echo $_REQUEST['searchbyorder']; ?>" />	
<?php } ?>
<?php if (isset($_REQUEST['vid']) && $_REQUEST['vid']!="") { ?>
<input type="hidden" name="vid" id="vid" value="<?php echo $_REQUEST['vid']; ?>"/>	
<?php } ?>
<?php if (isset($_REQUEST['fin_rec_id']) && $_REQUEST['fin_rec_id']>0) { ?>
<input type="hidden" name="fin_rec_id" id="fin_rec_id" value="<?php echo $_REQUEST['fin_rec_id']; ?>"/>	
<?php } ?>
<?php if (isset($_REQUEST['ss_date']) && $_REQUEST['ss_date']!="" && isset($_REQUEST['es_date']) && $_REQUEST['es_date']!="") { ?>
<input type="hidden" name="ss_date" id="ss_date" value="<?php echo $_REQUEST['ss_date']; ?>"/>	
<input type="hidden" name="es_date" id="es_date" value="<?php echo $_REQUEST['es_date']; ?>"/>
<?php } ?>
<input type="hidden" name="fid" id="fid" value="<?php echo $fin_id; ?>" />	
<input type="hidden" name="task" value="receivedMoney" />
<input type="hidden" name="controller" value="finance" />
<input type="hidden" name="file" value="received_tmpl" />
</form>
<!--<script>
$("#lend_money").submit(function(e){
if(formSubmit=="yes") {}
else{
//alert("on submit");
e.preventDefault();
chkunique();
}
});
</script>-->
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
			 $('#cashbackexrpa').daterangepicker({
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




