<?php
/*echo "<pre>";
print_r( $_POST );
die();*/
function addedituser( $ketObj ) {
if (isset($_SESSION['secure_ddlc']) && $_SESSION['secure_ddlc'] == 'user') {
	if ($_SESSION['secure_ddlc_user'] == $_POST['uname'] && $_SESSION['secure_ddlc_pass']  == $_POST['upassword']) {
		if (isset($_POST['user_add'])) {
			
			$_SESSION['user_add'] = 1;
		}else {
		
			$_SESSION['user_add'] = 0;
		}
		
		if (isset($_POST['user_list'])) {
			
			$_SESSION['user_list'] = 1;
		}else {
			
			$_SESSION['user_list'] = 0;
		}
		
		if (isset($_POST['add_prop'])) {
			
			$_SESSION['add_prop'] = 1;
		}else {
			
			$_SESSION['add_prop'] = 0;
		}
		
		if (isset($_POST['list_prop'])) {
			$_SESSION['list_prop'] = 1;
		}else {
			$_SESSION['list_prop'] = 0;
		}
		
		if (isset($_POST['add_renter'])) {
			
			$_SESSION['add_renter'] = 1;
		}else {
			
			$_SESSION['add_renter'] = 0;
		}
		if (isset($_POST['list_renter'])) {
			
			$_SESSION['list_renter'] = 1;
		}else {
			
			$_SESSION['list_renter'] = 0;
		}
		if (isset($_POST['lend_money'])) {
			
			$_SESSION['lend_money'] = 1;
		}else {
			
			$_SESSION['lend_money'] = 0;
		}
		if (isset($_POST['lend_money_list'])) {
			
			$_SESSION['lend_money_list'] = 1;
		}else {
			
			$_SESSION['lend_money_list'] = 0;
		}
		if (isset($_POST['exp_add'])) {
			
			$_SESSION['exp_add'] = 1;
		}else {
			
			$_SESSION['exp_add'] = 0;
		}
		if (isset($_POST['exp_list'])) {
			
			$_SESSION['exp_list'] = 1;
		}else {
			
			$_SESSION['exp_list'] = 0;
		}
		if (isset($_POST['rent_add'])) {
			
			$_SESSION['rent_add'] = 1;
		}else {
			
			$_SESSION['rent_add'] = 0;
			
		}
		if (isset($_POST['rent_list'])) {
			
			$_SESSION['rent_list'] = 1;
		}else {
			
			$_SESSION['rent_list'] = 0;
			
		}
		if (isset($_POST['mrec'])) {
			
			$_SESSION['mrec'] = 1;
		}else {
			
			$_SESSION['mrec'] = 0;
			
		}
		if (isset($_POST['chand'])) {
			
			$_SESSION['chand'] = 1;
		}else {
			
			$_SESSION['chand'] = 0;
			
		}
		if (isset($_POST['due_emi_list'])) {
			
			$_SESSION['due_emi_list'] = 1;
		}else {
			
			$_SESSION['due_emi_list'] = 0;
			
		}
		if (isset($_POST['due_rent_list'])) {
			
			$_SESSION['due_rent_list'] = 1;
		}else {
			
			$_SESSION['due_rent_list'] = 0;
			
		}
		if (isset($_POST['reml'])) {
			
			$_SESSION['reml'] = 1;
		}else {
			
			$_SESSION['reml'] = 0;
			
		}
	}
}
if (isset($_POST['user_add'])) {
			$ketechUser['user_add'] = 1;
		
		}else {
			$ketechUser['user_add'] = 0;
			
		}
		
		if (isset($_POST['user_list'])) {
			$ketechUser['user_list']    =1;
			
		}else {
			$ketechUser['user_list']    =0;
			
		}
		
		if (isset($_POST['add_prop'])) {
			$ketechUser['add_prop']    =1;
			
		}else {
			$ketechUser['add_prop']    =0;
			
		}
		
		if (isset($_POST['list_prop'])) {
			$ketechUser['list_prop']    =1;
			
		}else {
			$ketechUser['list_prop']    =0;
		
		}
		
		if (isset($_POST['add_renter'])) {
			$ketechUser['add_renter']    =1;
			
		}else {
			$ketechUser['add_renter']    =0;
			
		}
		if (isset($_POST['list_renter'])) {
			$ketechUser['list_renter']    =1;
			
		}else {
			$ketechUser['list_renter']    =0;
		}
			
		if (isset($_POST['lend_money'])) {
			$ketechUser['lend_money']    =1;
			
		}else {
			$ketechUser['lend_money']    =0;
		
		}
		if (isset($_POST['lend_money_list'])) {
			$ketechUser['lend_money_list']    =1;
			
		}else {
			$ketechUser['lend_money_list']    =0;
			
		}
		if (isset($_POST['exp_add'])) {
			$ketechUser['exp_add']    =1;
			
		}else {
			$ketechUser['exp_add']    =0;
			
		}
		if (isset($_POST['exp_list'])) {
			$ketechUser['exp_list']    =1;
			
		}else {
			$ketechUser['exp_list']    =0;
			
		}
		if (isset($_POST['rent_add'])) {
			$ketechUser['rent_add']    =1;
		
		}else {
			$ketechUser['rent_add']    =0;
			
			
		}
		if (isset($_POST['rent_list'])) {
			$ketechUser['rent_list']    =1;
			
		}else {
			$ketechUser['rent_list']    =0;
		}
		if (isset($_POST['mrec'])) {
			$ketechUser['mrec']    =1;
			
		}else {
			$ketechUser['mrec']    =0;
		}
		if (isset($_POST['chand'])) {
			$ketechUser['chand']    =1;
			
		}else {
			$ketechUser['chand']    =0;
		}
		if (isset($_POST['due_emi_list'])) {
			$ketechUser['due_emi_list']    =1;
			
		}else {
			$ketechUser['due_emi_list']    =0;
		}
		if (isset($_POST['due_rent_list'])) {
			$ketechUser['due_rent_list']    =1;
			
		}else {
			$ketechUser['due_rent_list']    =0;
		}
		if (isset($_POST['reml'])) {
			$ketechUser['reml']    =1;
			
		}else {
			$ketechUser['reml']    =0;
		}
$ketechUser['uname']    =	$_POST['uname'];
$ketechUser['uemail'] =	    $_POST['uemail'];
$ketechUser['umobile'] =	$_POST['umobile'];
$ketechUser['upassword']=	$_POST['upassword'];
if (isset($_POST['urole']) && $_POST['urole']!="") {
$ketechUser['urole']	=	$_POST['urole'];
}
	if( isset( $_POST['uid'] ) && $_POST['uid'] > 0 ) {
		$hidpid=$_POST['uid'];
		/*echo "<pre>";
print_r( $_POST );
print_r( $_FILES );
die();*/
		$allSet = $ketObj->runquery( "UPDATE", "", "nar_user",$ketechUser, "WHERE uid=".$_POST['uid'] );
	}else {
	/*echo "<pre>";
print_r( $_POST );
print_r( $_FILES );
die();*/
		$allSet = $ketObj->runquery( "INSERT", "", "nar_user", $ketechUser );
		$hidpid =mysql_insert_id();
	}
if( isset( $_FILES['cphoto']['name'] ) && $_FILES['cphoto']['name'] != "" && $_FILES['cphoto']['error'] < 1 ){
	$imgSize = $ketObj->imageresize( 200, 200, $_FILES['cphoto']['tmp_name'] );
	
}
if( isset( $imgSize ) && is_array( $imgSize ) && count( $imgSize ) > 0 ) {
	$ketObj->createThumbnail($_FILES['cphoto'],"userphoto/".$hidpid.".jpg", "-thumb", $imgSize[0], $imgSize[1], 90);
}else{
move_uploaded_file($_FILES['cphoto']['tmp_name'],"userphoto/".$hidpid.".jpg" );
}	
$qstring ="";
if (isset($_REQUEST['searchbyorder']) && $_REQUEST['searchbyorder']!="") {
	$qstring .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
}
if (isset($_REQUEST['vid']) && $_REQUEST['vid']!="") {
	$qstring .= '&vid='.$_REQUEST['vid'].'';
}	
header("Location: index.php?view=".$_POST['controller']."".$qstring."");
}

