<?php if( isset( $_GET['edit'] ) && $_GET['edit'] > 0 ){
		$where =" where uid =".$_GET['edit']." limit 1";
		$editUser = $ketObj->runquery( "SELECT", "*", "nar_user",array(),$where);
		if( is_array( $editUser ) && count( $editUser ) == 1 ){
			$editUser =$editUser[0];
			$uid =$editUser['uid'];
			$uname =$editUser['uname'];
			$uemail =$editUser['uemail'];
			$umobile =$editUser['umobile'];
			$upassword =$editUser['upassword'];
			$urole =$editUser['urole'];
			$user_add =$editUser['user_add'];
			$user_list =$editUser['user_list'];
			$add_prop =$editUser['add_prop'];
			$list_prop =$editUser['list_prop'];
			$add_renter =$editUser['add_renter'];
			$list_renter =$editUser['list_renter'];
			$lend_money =$editUser['lend_money'];
			$lend_money_list =$editUser['lend_money_list'];
			$exp_add =$editUser['exp_add'];
			$exp_list =$editUser['exp_list'];
			$rent_add =$editUser['rent_add'];
			$rent_list =$editUser['rent_list'];
			$mrec =$editUser['mrec'];
			$chand =$editUser['chand'];
			$due_emi_list =$editUser['due_emi_list'];
			$due_rent_list =$editUser['due_rent_list'];
			$reml=$editUser['reml'];
		}
}else{
	$uid =0;
	$uname ="";
	$uemail ="";
	$umobile ="";
	$upassword ="";
	$urole ="";
	$user_add ="";
	$user_list ="";
	$add_prop ="";
	$list_prop ="";
	$add_renter ="";
	$list_renter ="";
	$lend_money ="";
	$lend_money_list ="";
	$exp_add ="";
	$exp_list ="";
	$rent_add ="";
	$rent_list ="";
	$mrec ="";
	$chand ="";
	$due_emi_list ="";
	$due_rent_list ="";
	$reml="";
}
if ($user_add > 0 && $user_list > 0 && $add_prop > 0 && $list_prop > 0 && $add_renter > 0 && $list_renter > 0 && $lend_money > 0 && $lend_money_list > 0 && $exp_add > 0 && $exp_list > 0 && $rent_add > 0 && $rent_list > 0 && $mrec > 0 && $chand>0 && $due_emi_list>0 && $due_rent_list>0 && $reml>0) {
	$check_all = 1;
}else {
	$check_all = 0;
}
?>
<!--<script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <link href="http://www.google.com/uds/modules/elements/transliteration/api.css"
      type="text/css" rel="stylesheet"/>
<script type="text/javascript">
      // Load the Google Transliteration API
      google.load("elements", "1", {
            packages: "transliteration"
          });
      function onLoad() {
        var options = {
            sourceLanguage:
                google.elements.transliteration.LanguageCode.ENGLISH,
            destinationLanguage:
                google.elements.transliteration.LanguageCode.HINDI,
            shortcutKey: 'ctrl+g',
            transliterationEnabled: true
        };

        // Create an instance on TransliterationControl with the required
        // options.
        var control =
            new google.elements.transliteration.TransliterationControl(options);

        // Enable transliteration in the textbox with id
        // 'transliterateTextarea'.
        control.makeTransliteratable(['transliterateTextarea']);
      }
      google.setOnLoadCallback(onLoad);
</script>-->
<script>
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
	//alert( msg );
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
</script>
<script>
$(document).ready(function(){ 
    $("#selectall").change(function(){
      $(".chkjq").prop('checked', $(this).prop("checked"));
      });
});
</script>
<form class="form-horizontal form-label-left" data-parsley-validate="" name="addedituser" id="addedituser" method="post" action="index.php" enctype="multipart/form-data">
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">

            <div class="title_left">

                <h3> Add /Edit User</h3>

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

                                    <input placeholder="User Name" type="text" class="form-control col-md-7 col-xs-12" required="required" id="uname" name="uname" data-parsley-id="3686" value="<?php echo $uname; ?>"/>

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
                               <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="required">*</span>
                               </label>


<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="User Email" type="email" class="form-control col-md-7 col-xs-12" required="required" id="uemail" name="uemail" data-parsley-id="3686" value="<?php echo $uemail; ?>"/>

</div>

</div>

<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Mobile<span class="required">*</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="User Mobile" type="number" class="form-control col-md-7 col-xs-12" required="required" id="umobile" name="umobile" data-parsley-id="3686" value="<?php echo $umobile; ?>" min="0"/>

</div>

</div>

<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required">*</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="User Password" type="text" class="form-control col-md-7 col-xs-12" required="required" id="upassword" name="upassword" data-parsley-id="3686" value="<?php echo $upassword; ?>"/>

</div>

</div>


<!--<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Role<span class="required">*</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">

<select class="select2_single form-control" tabindex="-1" name="urole">
	<option value="admin"<?php if( $urole == "admin") { echo 'selected = "selected"';} ?>>Admin</option>
	<option value="staff"<?php if( $urole == "staff") { echo 'selected = "selected"';} ?>>Staff</option>
</select>
</div>
</div>-->
<div class="form-group row">
    <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Permissions</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
	 <div class="checkbox">
        <label>
          <input type="checkbox" name="selectall" id ="selectall" <?php echo $check_all > 0?"checked='checked'":""; ?>> Check All
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="user_add" <?php echo $user_add > 0?"checked='checked'":""; ?> class ="chkjq"> Add User
        </label>
      </div>
	  <div class="checkbox">
        <label>
          <input type="checkbox" name="user_list" <?php echo $user_list > 0?"checked='checked'":""; ?> class ="chkjq"> List User
        </label>
      </div>
	  <div class="checkbox">
        <label>
          <input type="checkbox" name="add_prop" <?php echo $add_prop > 0?"checked='checked'":""; ?> class ="chkjq"> Add Property
        </label>
      </div>
	  <div class="checkbox">
        <label>
          <input type="checkbox" name="list_prop" <?php echo $list_prop > 0?"checked='checked'":""; ?> class ="chkjq"> List Property
        </label>
      </div>
	  <div class="checkbox">
        <label>
          <input type="checkbox" name="add_renter" <?php echo $add_renter > 0?"checked='checked'":""; ?> class ="chkjq"> Add Renter
        </label>
      </div>
	  <div class="checkbox">
        <label>
          <input type="checkbox" name="list_renter" <?php echo $list_renter > 0?"checked='checked'":""; ?> class ="chkjq"> List Renter
        </label>
      </div>
	  
	  <div class="checkbox">
        <label>
          <input type="checkbox" name="rent_add" <?php echo $rent_add > 0?"checked='checked'":""; ?> class ="chkjq"> Add Rent
        </label>
      </div>
	  <div class="checkbox">
        <label>
          <input type="checkbox" name="rent_list" <?php echo $rent_list > 0?"checked='checked'":""; ?> class ="chkjq">Rent Received List 
        </label>
      </div>
	  <div class="checkbox">
        <label>
          <input type="checkbox" name="lend_money" <?php echo $lend_money > 0?"checked='checked'":""; ?> class ="chkjq"> Lend Money
        </label>
      </div>
	  <div class="checkbox">
        <label>
          <input type="checkbox" name="lend_money_list" <?php echo $lend_money_list > 0?"checked='checked'":""; ?> class ="chkjq"> Lend Money List
        </label>
      </div>
	  <div class="checkbox">
        <label>
          <input type="checkbox" name="reml" <?php echo $reml > 0?"checked='checked'":""; ?> class ="chkjq"> Received EMI Money List
        </label>
      </div>
	  <div class="checkbox">
        <label>
          <input type="checkbox" name="exp_add" <?php echo $exp_add > 0?"checked='checked'":""; ?> class ="chkjq"> Add Expansion
        </label>
      </div>
	  <div class="checkbox">
        <label>
          <input type="checkbox" name="exp_list" <?php echo $exp_list > 0?"checked='checked'":""; ?> class ="chkjq"> List Expansion
        </label>
      </div>
	  <div class="checkbox">
        <label>
          <input type="checkbox" name="mrec" <?php echo $mrec > 0?"checked='checked'":""; ?> class ="chkjq"> Money Received
        </label>
      </div>
	  <div class="checkbox">
        <label>
          <input type="checkbox" name="chand" <?php echo $chand > 0?"checked='checked'":""; ?> class ="chkjq"> Cash In Hand
        </label>
      </div>
	  <div class="checkbox">
        <label>
          <input type="checkbox" name="due_emi_list" <?php echo $due_emi_list > 0?"checked='checked'":""; ?> class ="chkjq"> Due EMI List
        </label>
      </div>
	  <div class="checkbox">
        <label>
          <input type="checkbox" name="due_rent_list" <?php echo $due_rent_list > 0?"checked='checked'":""; ?> class ="chkjq"> Due Rent List
        </label>
      </div>
    </div>
  </div>
  
<!--<div class="form-group">
<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Premissions<span class="required"></span>
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="checkbox">
 <label><input type="checkbox" class="form-control" value="">Add User</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" class="form-control" value="">List User</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" class="form-control"  value="">Add Property</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" class="form-control" value="">List Property</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" class="form-control"  value="">Add Renter</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" class="form-control" value="">List Renter</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" class="form-control" value="">Lend Money</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" class="form-control" value="">Lend Money List</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" class="form-control" value="">Add Expansion</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" class="form-control" value="">List Expansion</label>
</div>
</div>
</div>-->

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
<input type="hidden" name="uid" id="uid" value="<?php echo $uid; ?>" />	
<input type="hidden" name="task" value="addedituser" />
<input type="hidden" name="controller" value="user" />
<input type="hidden" name="file" value="tmpl" />
</form>
<script>
$("#addedituser").submit(function(e){
if(formSubmit=="yes") {}
else{
//alert("on submit");
e.preventDefault();
chkunique();
}
});
</script>