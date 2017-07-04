<?php
/*echo "<pre>";
print_r( $_POST );
die();*/
function saveSetting($ketObj) {
	$nar_set['username']			=	$_POST['uname'];
	$nar_set['password']		=	$_POST['upassword'];
	$nar_set['address']			=	$_POST['address'];
	$nar_set['telephone']		=	$_POST['telephone'];
	$nar_set['email']		=	$_POST['email'];
	$nar_set['eday']		=	$_POST['eday'];
	$nar_set['irate']		=	$_POST['irate'];
	$allSet = $ketObj->runquery( "SELECT", "*", "nar_set", array(), "" );
	if(isset( $allSet ) && is_array( $allSet ) && count( $allSet ) > 0) {
		$allSet = $ketObj->runquery( "UPDATE", "*", "nar_set", $nar_set );
	}else {
		$allSet = $ketObj->runquery( "INSERT", "*", "nar_set", $nar_set );
	}
	header( "Location: index.php?view=".$_POST['controller']."&file=".$_POST['file'] );
}
?>