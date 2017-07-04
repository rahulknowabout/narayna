<?php if (isset( $_GET['edit'] ) && $_GET['edit'] > 0) {
		$where =" where fin_id =".$_GET['edit']." limit 1";
		$edit_fin = $ketObj->runquery( "SELECT", "*", "nar_finance",array(),$where);
		if (is_array( $edit_fin ) && count( $edit_fin ) == 1) {
			$edit_fin =$edit_fin[0];
			$fin_id =$edit_fin['fin_id'];
			$fin_name =$edit_fin['fin_cname'];
			$fin_address =$edit_fin['fin_caddress'];
			$fin_city =$edit_fin['fin_ccity'];
			$fin_mobile =$edit_fin['fin_cmobile'];
			$fin_email =$edit_fin['fin_cemail'];
			$fin_deal_person_id =$edit_fin['fin_deal_person_id'];
			$fin_est =$edit_fin['fin_est'];
			$fin_amount =$edit_fin['fin_amount'];
			$smdy =date("d/m/Y",strtotime("".$edit_fin['fin_start_date'].""));
			$fin_start_date =$smdy;
			$fin_end_date =$edit_fin['fin_end_date'];
			$fin_irate=$edit_fin['fin_irate'];
			$fin_doc_rec=$edit_fin['fin_doc_rec'];
			$fin_doc_chk=$edit_fin['fin_doc_chk'];
			$fin_del_mob=$edit_fin['fin_del_mob'];
			$fin_emi =$edit_fin['fin_emi'];
			$flag =1;
			
		}
}else {
			$fin_id =0;
			$fin_name ="";
			$fin_address ="";
			$fin_city ="";
			$fin_mobile ="";
			$fin_email ="";
			$fin_deal_person_id ="";
			$fin_est ="";
			$fin_amount ="";
			$fin_start_date ="";
			$fin_end_date ="";
			$fin_irate="";
			$fin_doc_rec="";
			$fin_doc_chk="";
			$fin_del_mob="";
			$fin_emi ="";
			$flag =0;
}
$allSet = $ketObj->runquery( "SELECT", "eday,irate", "nar_set", array(), ""  );
	if (is_array($allSet) && count($allSet)>0) {
		$eday=$allSet[0]['eday'];
		$irate=$allSet[0]['irate'];
	}
$userList = $ketObj->runquery( "SELECT", "*", "nar_user",array());
?>
<script>
var formSubmit="no";
function chkunique() {
fid	=document.getElementById('fid').value;
fmobile	=document.getElementById('cmobile').value;
sdate	=document.getElementById('single_cal2').value;
$.ajax( {  
	url: "index.php",
	type: 'POST',
	data: "aj=y&chk=finunique&fid="+fid+"&cmobile="+fmobile+"&sdate="+sdate,
	dataType: 'html',
	success: function( msg, textStatus, xhr ) {
	/*alert( msg );*/
		if( msg == "no" ) {
			formSubmit	="yes";
			$("#lend_money").submit();
			return true;
		}else {
			alert("Loan alloted already!" )
			document.getElementById('umobile').focus();
			return false;
		}
	}
 })
}

function cEmi() {
//alert("hello");
famount	= Number(document.getElementById('finamount').value);
frate =	 Number(document.getElementById('fin_irate').value);
emi =(famount*frate)/100;
document.getElementById('finemi').value =emi;
}
</script>
<form class="form-horizontal form-label-left" data-parsley-validate="" name="lend_money" id="lend_money" method="post" action="index.php" enctype="multipart/form-data">
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">

            <div class="title_left">

                <h3>Lend Money</h3>

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

                                    <input placeholder="Customer Name" type="text" class="form-control col-md-7 col-xs-12" required="required" id="cname" name="cname" data-parsley-id="3686" value="<?php  echo $fin_name; ?>"/>

                                </div>

                           </div>
						   <div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Photo</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="photo" type="file" class="form-control col-md-7 col-xs-12" id="cphoto" name="cphoto" data-parsley-id="3686" value="<?php ##echo $cphoto; ?>"/>

</div>

</div>
							<div class="form-group">
								<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Address<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input placeholder="Customer Address" type="text" class="form-control col-md-7 col-xs-12" required="required" id="caddress" name="caddress" data-parsley-id="3686" value="<?php echo $fin_address; ?>"/>
								</div>
							</div>
                           	<div class="form-group">
                               <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">City<span class="required">*</span>
                               </label>


<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="Customer City" type="text" class="form-control col-md-7 col-xs-12" required="required" id="ccity" name="ccity" data-parsley-id="3686" value="<?php echo $fin_city; ?>"/>

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

<input placeholder="Customer Mobile" type="number" class="form-control col-md-7 col-xs-12" required="required" id="cmobile" name="cmobile" data-parsley-id="3686" value="<?php  echo $fin_mobile; ?>" min="0"/>

</div>

</div>

<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="required">*</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="Customer Email" type="email" class="form-control col-md-7 col-xs-12" required="required" id="cemail" name="cemail" data-parsley-id="3686" value="<?php echo $fin_email; ?>"/>

</div>

</div>
<div class="form-group">
<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Deal By<span class="required">*</span></label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
									<select name="deal_person" id ="deal_person" class="form-control">
										<option value="0">Deal By</option>
									
				                <?php if( is_array( $userList ) && count( $userList ) > 0 ) {
										foreach( $userList as $valueP ) {
										
								?>
										<option value="<?php echo $valueP['uid']; ?>"<?php echo $fin_deal_person_id > 0 ? $fin_deal_person_id == $valueP['uid'] ? "selected='selected'":"":"";  ?>><?php echo $valueP['uname'];?></option>
								<?php	
										}
								} 
								?>
                                 </select>   
                                </div>
</div>
<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Deal Person Mobile<span class="required">*</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="Deal Person Mobile" type="number" class="form-control col-md-7 col-xs-12" required="required" id="fin_del_mob" name="fin_del_mob" data-parsley-id="3686" value="<?php  echo $fin_del_mob; ?>" min="0"/>

</div>

</div>
<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">EMI Day<span class="required">*</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="EMI Start Date" type="text" class="form-control col-md-7 col-xs-12" required="required" id="est" name="est" data-parsley-id="3686" value="<?php echo $fin_est ==""  ? "$eday":$fin_est; ?>"/>

</div>

</div>
<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Finance Amount<span class="required">*</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-inr"></i></span>
  <input placeholder="Finance Amount" type="text" class="form-control col-md-7 col-xs-12" required="required" id="finamount" name="finamount" data-parsley-id="3686" value="<?php echo $fin_amount; ?>" onblur="cEmi()"/>
</div>


</div>

</div>
<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">EMI<span class="required">*</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-inr"></i></span>
  <input placeholder="EMI" type="text" class="form-control col-md-7 col-xs-12" required="required" id="finemi" name="finemi" data-parsley-id="3686" value="<?php echo $fin_emi; ?>"/>
</div>


</div>

</div>
<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Start Date*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                      					<fieldset>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" id="single_cal2" placeholder="Start Date  D/M/Y" aria-describedby="inputSuccess2Status2" name="start_date" value="<?php echo $fin_start_date; ?>" required/>
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
							</div>
						</div>
<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Interest Rate<span class="required">*</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="Finance Amount" type="text" class="form-control col-md-7 col-xs-12" required="required" id="fin_irated" name="fin_irated" data-parsley-id="3686" value="<?php echo $irate; ?>" disabled="disabled"/>
<input placeholder="Finance Amount" type="hidden" class="form-control col-md-7 col-xs-12" required="required" id="fin_irate" name="fin_irate" data-parsley-id="3686" value="<?php echo $irate; ?>"/>
<?php ##echo $fin_irate ==""?$irate:$fin_irate; ?>
</div>

</div>

<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">A/c Closing Date*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                      					<fieldset>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" id="single_cal1" placeholder="A/c Closing Date  D/M/Y" aria-describedby="inputSuccess2Status2" name="end_date" value="<?php echo $fin_end_date; ?>" <?php echo $flag > 0 ? "":"disabled"; ?>/>
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
							</div>
						</div>

</div>
<div class="form-group row">
    <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Document</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
	 
      <div class="checkbox">
        <label>
          <input type="checkbox" name="fin_doc_rec" <?php echo $fin_doc_rec > 0?"checked='checked'":""; ?> class ="chkjq"> Document Receive
        </label>
      </div>
	  <div class="checkbox">
        <label>
          <input type="checkbox" name="fin_doc_chk" <?php echo $fin_doc_chk > 0?"checked='checked'":""; ?> class ="chkjq"> Document Checked
        </label>
      </div>
</div>
  </div>

<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Document 1</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="photo" type="file" class="form-control col-md-7 col-xs-12"  id="cdocument1" name="cdocument1" data-parsley-id="3686" value="<?php ##echo $cphoto; ?>"/>

</div>

</div>
<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Document 2</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="photo" type="file" class="form-control col-md-7 col-xs-12"  id="cdocument2" name="cdocument2" data-parsley-id="3686" value="<?php ##echo $cphoto; ?>"/>

</div>

</div>
<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Document 3</span></label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input placeholder="photo" type="file" class="form-control col-md-7 col-xs-12"  id="cdocument3" name="cdocument3" data-parsley-id="3686" value="<?php ##echo $cphoto; ?>"/>
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
<input type="hidden" name="fid" id="fid" value="<?php echo $fin_id; ?>" />	
<input type="hidden" name="task" value="lendMoney" />
<input type="hidden" name="controller" value="finance" />
<input type="hidden" name="file" value="tmpl" />
</form>
<script>
$("#lend_money").submit(function(e){
if(formSubmit=="yes") {}
else{
//alert("on submit");
e.preventDefault();
chkunique();
}
});
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