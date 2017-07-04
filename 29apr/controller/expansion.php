<?php /* echo "<pre>";
print_r( $_POST );
print_r( $_FILES );
die();*/
function addEditExp($ketObj) {
$ketech['exp_date'] = $_POST['exp_date'];
$ketech['exp_desc'] = addslashes($_POST['exp_desc']);
$ketech['exp_amount']  = $_POST['exp_amount'];
	if ($_POST['radio'] == "user") {
		$ketech['exp_user_id'] = $_POST['exp_user_id'];
	}else {
		$ketech['exp_user_id'] = 0;
	}
	if ($_POST['radio'] == "other") {
		$ketech['otherp'] = $_POST['otherp'];
	}else {
		$ketech['otherp'] = "";
	}
$ketech['exp_mob']  = $_POST['exp_mob'];
	if (isset( $_POST['exp_id']) && $_POST['exp_id'] > 0) {
		$allSet = $ketObj->runquery("UPDATE", "", "nar_expansion",$ketech, "WHERE exp_id=".$_POST['exp_id']);
		
	}else {
		$allSet = $ketObj->runquery("INSERT", "", "nar_expansion", $ketech);
		}
	
$qstring ="";
if (isset($_REQUEST['searchbyorder']) && $_REQUEST['searchbyorder']!="") {
	$qstring .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
}
if (isset($_REQUEST['vid']) && $_REQUEST['vid']!="") {
	$qstring .= '&vid='.$_REQUEST['vid'].'';
}
if (isset($_REQUEST['ss_date']) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!="") {
	$qstring .= "&ss_date=".$_REQUEST['ss_date']."&es_date=".$_REQUEST['es_date']."";
}
if( isset($_REQUEST['exp_user_ids']) && $_REQUEST['exp_user_ids']>0){
		$qstring .= "&exp_user_id=".$_REQUEST['exp_user_ids']."";		
}
header("Location: index.php?view=".$_POST['controller']."".$qstring."");
}
function checkStatus($ketObj) {
	if (isset($_POST['exp_id']) && $_POST['exp_id']>0) {
		
		$qsrting ="";
		if (isset($_POST['hsta']) && isset($_POST['hstab']) && $_POST['hstab']<1) {
			$ketech['hsta'] =1;
		}
		if (isset($_POST['hstb']) && isset($_POST['hstbb']) && $_POST['hstbb']<1) {
			$ketech['hstb'] =1;
		}
		if (isset($_POST['qstring']) && $_POST['qstring']!="") {
			$qsrting =$_POST['qstring'];
		}
		$Status = $ketObj->runquery("UPDATE", "", "nar_expansion",$ketech, "WHERE exp_id=".$_POST['exp_id']);
	}
header("Location: index.php?view=".$_POST['controller']."".$qstring."");
}