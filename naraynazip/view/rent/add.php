<?php if( isset( $_GET['edit'] ) && $_GET['edit'] > 0 ){
		$where =" where pid =".$_GET['edit']." limit 1";
		$editProperty = $ketObj->runquery( "SELECT", "*", "nar_property",array(),$where);
		if( is_array( $editProperty ) && count( $editProperty ) == 1 ){
			$editProperty =$editProperty[0];
			$pid =$editProperty['pid'];
			$title =$editProperty['title'];
			$description =$editProperty['description'];
			$address =$editProperty['address'];
			$city =$editProperty['city'];
			$state =$editProperty['state'];
		}
}else{
			$pid ="";
			$title ="";
			$description ="";
			$address ="";
			$city ="";
			$state ="";
}
?>
<?php //echo $description; ?>
<!--<script>alert('2')</script>-->
<script>
var formSubmit="no";
function chkunique() {
pid	=document.getElementById('pid').value;
title	=document.getElementById('title').value;
$.ajax( {  
	url: "index.php",
	type: 'POST',
	data: "aj=y&chk=propertyunique&pid="+pid+"&title="+title,
	dataType: 'html',
	success: function( msg, textStatus, xhr ) {
	//alert( msg );
		if( msg == "no" ) {
			formSubmit	="yes";
			$("#addeditproperty").submit();
			return true;
		}else {
			alert( "Property Title  already exists!" )
			document.getElementById('title').focus();
			return false;
		}
	}
 })
}
</script>
<form class="form-horizontal form-label-left" data-parsley-validate="" name="addeditproperty" id="addeditproperty" method="post" action="index.php" enctype="multipart/form-data">
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">

            <div class="title_left">

                <h3> Add /Edit Property</h3>

            </div>

        </div>

        <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="x_panel">

                        <div class="x_content">

                             <br/>

                            <div class="form-group">

                                <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Title<span class="required">*</span>

                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <input placeholder="Title" type="text" class="form-control col-md-7 col-xs-12" required="required" id="title" name="title" data-parsley-id="3686" value="<?php echo $title; ?>"/>

                                </div>

                           </div>
                           <div class="form-group">
                               <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Description<span class="required"></span>
                               </label>


<div class="col-md-6 col-sm-6 col-xs-12">

<textarea class="form-control col-md-7 col-xs-12" name="description"><?php echo $description; ?></textarea>

</div>

</div>

<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Address<span class="required">*</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="Address" type="text" class="form-control col-md-7 col-xs-12" required="required" id="address" name="address" data-parsley-id="3686" value="<?php echo $address; ?>"/>

</div>

</div>

<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">City<span class="required">*</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="City" type="text" class="form-control col-md-7 col-xs-12" required="required" id="city" name="city" data-parsley-id="3686" value="<?php echo $city; ?>"/>

</div>

</div>
<div class="form-group">
<!--<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">State<span class="required">*</span>
</label>-->
<div class="col-md-6 col-sm-6 col-xs-12">
<input placeholder="State" type="hidden" class="form-control col-md-7 col-xs-12" required="required" id="state" name="state" data-parsley-id="3686" value="<?php echo $state; ?>"/>
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
<input type="hidden" name="pid" id="pid" value="<?php echo $pid; ?>" />	
<input type="hidden" name="task" value="addEditProperty" />
<input type="hidden" name="controller" value="rent" />
<input type="hidden" name="file" value="tmpl" />
</form>
<script>
$("#addeditproperty").submit(function(e){
if(formSubmit=="yes") {}
else{
//alert("on submit");
e.preventDefault();
chkunique();
}
});
</script>