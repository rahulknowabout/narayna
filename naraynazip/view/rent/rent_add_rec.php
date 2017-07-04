<?php if( isset( $_GET['edit'] ) && $_GET['edit'] > 0 ){
		$where =" where rec_id =".$_GET['edit']." limit 1";
		$editrent = $ketObj->runquery( "SELECT", "*", "nar_recrent",array(),$where);
		if ( is_array( $editrent ) && count( $editrent ) == 1 ) {
			$editrent =$editrent[0];
			$rec_id =$editrent['rec_id'];
			$rent_property_id =$editrent['rec_property_id'];
			$renter_id =$editrent['rec_renter_id'];
			$rec_date =$editrent['rec_date'];
			$rec_rent =$editrent['rec_rent'];
			$rent_deal_person_id =$editrent['rec_person_id'];
		}
}else{
	$rec_id =0;
	$rent_property_id =0;
	$renter_id ="";
	$rent_deal_person_id =0;
	$rec_date ="";
	$rec_rent ="";
	
}
$propertyList = $ketObj->runquery( "SELECT", "pid,title", "nar_property",array());
$userList = $ketObj->runquery( "SELECT", "*", "nar_user",array());
if ($renter_id > 0) {
	$renter = $ketObj->runquery( "SELECT", "rent_name", "nar_rent",array()," where rent_id =".$renter_id." limit 1");
	$rent_name = $renter['0']['rent_name'];
}else {
	$rent_name = "";
}
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
	alert( msg );
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
<script>
function renterName(rpid) {
$.ajax( {  
	url: "index.php",
	type: 'POST',
	data: "aj=y&chk=rentername&rent_property_id="+rpid,
	dataType: 'html',
	success: function( msg, textStatus, xhr ) {
	//alert( msg );
	if (msg === "no") {
	}else{
		 try {
               chkJson = JSON.parse( msg );
          } catch( exception ) {
                chkJson            =    null;
          }
		document.getElementById('rec_renter').value	=chkJson['rent_name'];
		document.getElementById('rec_renter_id').value =chkJson['rent_id'];
	}		
	 }
 })
}
</script>
<form class="form-horizontal form-label-left" data-parsley-validate="" name="add_edit_rent" id="add_edit_rent" method="post" action="index.php" enctype="multipart/form-data">
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">

            <div class="title_left">

                <h3> Add /Edit Rent</h3>

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
									<select name="rec_property_id" id ="rec_property_id" class="form-control" onchange="renterName(this.value)">
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

<input placeholder="Renter Name" type="text" class="form-control col-md-7 col-xs-12" required="required" id="rec_renter" name="rec_renter" data-parsley-id="3686" value="<?php echo $rent_name; ?>"/>
<input type="hidden" class="form-control col-md-7 col-xs-12" id="rec_renter_id" name="rec_renter_id" value=<?php echo $renter_id;?>/>

</div>

</div>
<div class="form-group">

							<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Rent<span class="required">*</span></label>
							
							<div class="col-md-6 col-sm-6 col-xs-12">
							
							<input placeholder="Rent" type="number" class="form-control col-md-7 col-xs-12" required="required" id="rec_rent" name="rec_rent" data-parsley-id="3686" value="<?php echo $rec_rent; ?>" min="0"/>
							
							</div>

</div>

<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Date*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                      					<fieldset>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" id="single_cal2" placeholder="Date  M/D/Y" aria-describedby="inputSuccess2Status2" name="rec_date" value="<?php echo $rec_date; ?>" required/>
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
							</div>
						</div>
<div class="form-group">
<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Recieved By<span class="required">*</span></label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
									<select name="rec_person_id" id ="rec_person_id" class="form-control">
										
									
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
<?php if (isset($_REQUEST['ss_date']) && $_REQUEST['ss_date']!="" && isset($_REQUEST['es_date']) && $_REQUEST['es_date']!="") { ?>
<input type="hidden" name="ss_date" id="ss_date" value="<?php echo $_REQUEST['ss_date']; ?>"/>	
<input type="hidden" name="es_date" id="es_date" value="<?php echo $_REQUEST['es_date']; ?>"/>
<?php } ?>
<input type="hidden" name="rec_id" id="rec_id" value="<?php echo $rec_id; ?>" />	
<input type="hidden" name="task" value="rentRecieve" />
<input type="hidden" name="controller" value="rent" />
<input type="hidden" name="file" value="rent_rec" />
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