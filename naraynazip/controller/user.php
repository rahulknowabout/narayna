<?php session_start();
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
$ketechUser['uname']    =	$_POST['uname'];
$ketechUser['uemail'] =	    $_POST['uemail'];
$ketechUser['umobile'] =	$_POST['umobile'];
$ketechUser['upassword']=	$_POST['upassword'];
if (isset($_POST['urole']) && $_POST['urole']!="") {
$ketechUser['urole']	=	$_POST['urole'];
}
	if( isset( $_POST['uid'] ) && $_POST['uid'] > 0 ) {
		$allSet = $ketObj->runquery( "UPDATE", "", "nar_user",$ketechUser, "WHERE uid=".$_POST['uid'] );
	}else {
		$allSet = $ketObj->runquery( "INSERT", "", "nar_user", $ketechUser );
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

