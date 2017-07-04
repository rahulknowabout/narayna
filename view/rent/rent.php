<?php if( isset( $_GET['edit'] ) && $_GET['edit'] > 0 ){
		$where =" where rent_id =".$_GET['edit']." limit 1";
		$editrent = $ketObj->runquery( "SELECT", "*", "nar_rent",array(),$where);
		if ( is_array( $editrent ) && count( $editrent ) == 1 ) {
			$editrent =$editrent[0];
			$rent_id =$editrent['rent_id'];
			$rent_property_id =$editrent['rent_property_id'];
			$rent_name =$editrent['rent_name'];
			$rent_address =$editrent['rent_address'];
			$rent_mobile =$editrent['rent_mobile'];
			$rent_deal_person_id =$editrent['rent_deal_person_id'];
			$rent_amount =$editrent['rent_amount'];
			$smdy =date("d/m/Y",strtotime("".$editrent['rent_date'].""));
			$rent_date =$smdy;
			$rent_del_mob =$editrent['rent_del_mob'];
		}
}else{
	$rent_id =0;
	$rent_property_id =0;
	$rent_name ="";
	$rent_address ="";
	$rent_mobile ="";
	$rent_deal_person_id =0;
	$rent_amount ="";
	$rent_date ="";
	$rent_del_mob ="";
	
}
$propertyList = $ketObj->runquery( "SELECT", "pid,title", "nar_property",array());
$userList = $ketObj->runquery( "SELECT", "*", "nar_user",array());
/*echo "<pre>";
print_r( $propertyList );
die();*/
?>
<!--<script>
var formSubmit="no";
function chkunique() {
rent_id	=document.getElementById('rent_id').value;
<!--rent_mobile	=document.getElementById('rent_mobile').value;
rent_property_id	=document.getElementById('rent_property_id').value;
$.ajax( {  
	url: "index.php",
	type: 'POST',
	data: "aj=y&chk=rentunique&rent_id="+rent_id+"&rent_property_id="+rent_property_id,
	dataType: 'html',
	success: function( msg, textStatus, xhr ) {
	//alert( msg );
		if( msg == "no" ) {
			formSubmit	="yes";
			$("#add_edit_rent").submit();
			return true;
		}else {
			alert( "This Property has Rented!" )
			document.getElementById('rent_property_id').focus();
			return false;
		}
	}
 })
}
</script>-->
<form class="form-horizontal form-label-left" data-parsley-validate="" name="add_edit_rent" id="add_edit_rent" method="post" action="index.php" enctype="multipart/form-data">
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">

            <div class="title_left">

                <h3> Add /Edit Renter</h3>

            </div>

        </div>

        <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="x_panel">

                        <div class="x_content">

                             <br/>

                            <div class="form-group">

                                <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Property<span class="required">*</span>

                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
									<select name="rent_property_id" id ="rent_property_id" class="form-control">
										<option value="0">Chosse Property</option>
									
				                <?php if( is_array( $propertyList ) && count( $propertyList ) > 0 ) {
										foreach( $propertyList as $valueP ) {
										
								?>
										<option value="<?php echo $valueP['pid']; ?>"<?php echo $rent_property_id > 0 ? $rent_property_id == $valueP['pid'] ? "selected='selected'" : "" : "";?>><?php echo $valueP['title'];?></option>
								<?php	
										}
								} 
								?>
                                 </select>   
                                </div>

                           </div>
						   
                           <div class="form-group">
                               <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Renter Name<span class="required">*</span>
                               </label>


<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="Renter Name" type="text" class="form-control col-md-7 col-xs-12" required="required" id="renter_name" name="renter_name" data-parsley-id="3686" value="<?php echo $rent_name; ?>"/>

</div>

</div>
<div class="form-group">

							<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Address<span class="required">*</span></label>
							
							<div class="col-md-6 col-sm-6 col-xs-12">
							
							<input placeholder="Renter Address" type="text" class="form-control col-md-7 col-xs-12" required="required" id="renter_address" name="renter_address" data-parsley-id="3686" value="<?php echo $rent_address; ?>"/>
							
							</div>

</div>

<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Mobile<span class="required">*</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="Renter Mobile" type="number" class="form-control col-md-7 col-xs-12" required="required" id="rentermobile" name="renter_mobile" data-parsley-id="3686" value="<?php echo $rent_mobile; ?>" min="0"/>

</div>

</div>
<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Rent Amount<span class="required">*</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">

<div class="input-group">
								  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-inr"></i></span>
								  <input  type="number" class="form-control col-md-7 col-xs-12" required="required" id="rent_amount" name="rent_amount" data-parsley-id="3686" value="<?php echo $rent_amount; ?>" min="0"/>
						   </div>

</div>

</div>
<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Date*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                      					<fieldset>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" id="single_cal2" placeholder="Date  D/M/Y" aria-describedby="inputSuccess2Status2" name="rent_date" value="<?php echo $rent_date; ?>" required/>
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
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
										<option value="<?php echo $valueP['uid']; ?>"<?php echo $rent_deal_person_id > 0 ? $rent_deal_person_id == $valueP['uid'] ? "selected='selected'":"":"";  ?>><?php echo $valueP['uname'];?></option>
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

<input placeholder="Deal Person Mobile" type="number" class="form-control col-md-7 col-xs-12" required="required" id="rent_del_mob" name="rent_del_mob" data-parsley-id="3686" value="<?php  echo $rent_del_mob; ?>" min="0"/>

</div>

</div>
<div class="ln_solid"></div>

<div class="form-group">

<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

<button class="btn btn-success" type="submit">Submit</button>
<button class="btn btn-default" type="reset"><a href ="index.php">Reset</a></button>

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
<?php if (isset($_REQUEST['rent_property_id']) && $_REQUEST['rent_property_id']!="") { ?>
<input type="hidden" name="rent_property_ids" id="rent_property_ids" value="<?php echo $_REQUEST['rent_property_id']; ?>" />	
<?php } ?>
<?php if (isset($_REQUEST['vid']) && $_REQUEST['vid']!="") { ?>
<input type="hidden" name="vid" id="vid" value="<?php echo $_REQUEST['vid']; ?>"/>	
<?php } ?>
<input type="hidden" name="rent_id" id="rent_id" value="<?php echo $rent_id; ?>" />	
<input type="hidden" name="task" value="addEditRenter" />
<input type="hidden" name="controller" value="rent" />
<input type="hidden" name="file" value="rent_tmpl" />
</form>
<!--<script>
$("#add_edit_rent").submit(function(e){
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