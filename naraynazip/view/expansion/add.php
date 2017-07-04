<script src="ckeditor/ckeditor.js"></script>

<script src="ckeditor/samples/js/sample.js"></script>

<link rel="stylesheet" href="ckeditor/samples/css/samples.css">

<link rel="stylesheet" href="ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">

<style>

	#cke_1_contents

	{

		height:200px !important;

	}

</style>
<?php if (isset( $_GET['edit'] ) && $_GET['edit'] > 0) {
		$where =" where exp_id =".$_GET['edit']." limit 1";
		$edit_expansion = $ketObj->runquery( "SELECT", "*", "nar_expansion",array(),$where);
		if (is_array($edit_expansion) && count($edit_expansion) == 1) {
			$edit_expansion =$edit_expansion[0];
			$exp_id =$edit_expansion['exp_id'];
			$exp_date =$edit_expansion['exp_date'];
			$exp_desc =$edit_expansion['exp_desc'];
			$exp_amount =$edit_expansion['exp_amount'];
			$exp_user_id =$edit_expansion['exp_user_id'];
		}
}else {
	$exp_id =0;
	$exp_date ="";
	$exp_desc ="";
	$exp_amount ="";
	$exp_user_id ="";
}
$userList = $ketObj->runquery( "SELECT", "*", "nar_user",array());
?>
<!--<script>
var formSubmit="no";
function chkunique() {
uid	=document.getElementById('uid').value;
umobile	=document.getElementById('umobile').value;
$.ajax( {  
	url: "index.php",
	type: 'POST',
	data: "aj=y&chk=userunique&uid="+uid+"&umobile="+umobile,
	dataType: 'html',
	success: function( msg, textStatus, xhr ) {
	alert( msg );
		if( msg == "no" ) {
			formSubmit	="yes";
			$("#addedituser").submit();
			return true;
		}else {
			alert( "This Mobile Number User already exists!" )
			document.getElementById('umobile').focus();
			return false;
		}
	}
 })
}
</script>-->
<form class="form-horizontal form-label-left" data-parsley-validate="" name="addeditexp" id="addeditexp" method="post" action="index.php">
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">

            <div class="title_left">

                <h3> Add /Edit Expenses</h3>

            </div>

        </div>

        <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="x_panel">

                        <div class="x_content">

                             <br/>

                            <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Date*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                      					<fieldset>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" id="single_cal2" placeholder="Date  M/D/Y" aria-describedby="inputSuccess2Status2" name="exp_date" value="<?php echo $exp_date; ?>" required/>
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
							</div>
						</div>
                           
										<div class="form-group">

                                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Description</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<textarea class="form-control" id="exp_desc" name="exp_desc" data-parsley-id="3686"><?php  echo $exp_desc; ?></textarea>
</div>
</div>
<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Amount<span class="required">*</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="Expansion Amount" type="number" class="form-control col-md-7 col-xs-12" required="required" id="exp_amount" name="exp_amount" data-parsley-id="3686" value="<?php echo $exp_amount; ?>" min="0"/>

</div>

</div>
<div class="form-group">
<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Expenses By<span class="required">*</span></label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
									<select name="exp_user_id" id ="exp_user_id" class="form-control">
										
									
				                <?php if( is_array( $userList ) && count( $userList ) > 0 ) {
										foreach( $userList as $valueP ) {
										
								?>
										<option value="<?php echo $valueP['uid']; ?>"<?php  echo $exp_user_id > 0 ? $exp_user_id == $valueP['uid'] ? "selected='selected'":"":"";  ?>><?php echo $valueP['uname'];?></option>
								<?php	
										}
								} 
								?>
                                 </select>   
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
<?php if (isset($_REQUEST['ss_date']) && $_REQUEST['ss_date']!="" && isset($_REQUEST['es_date']) && $_REQUEST['es_date']!="") { ?>
<input type="hidden" name="ss_date" id="ss_date" value="<?php echo $_REQUEST['ss_date']; ?>"/>	
<input type="hidden" name="es_date" id="es_date" value="<?php echo $_REQUEST['es_date']; ?>"/>
<?php } ?>
<input type="hidden" name="exp_id" id="exp_id" value="<?php echo $exp_id; ?>" />	
<input type="hidden" name="task" value="addEditExp" />
<input type="hidden" name="controller" value="expansion" />
<input type="hidden" name="file" value="tmpl" />
</form>
<script>
$("#addeditexp").submit(function(e){
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





