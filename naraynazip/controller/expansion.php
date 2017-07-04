<?php /*echo "<pre>";
print_r( $_POST );
print_r( $_FILES );
die();*/
function addEditExp($ketObj) {
	$ketech['exp_date'] = $_POST['exp_date'];
	$ketech['exp_desc'] = $_POST['exp_desc'];
	$ketech['exp_amount']  = $_POST['exp_amount'];
	$ketech['exp_user_id'] = $_POST['exp_user_id'];
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
header("Location: index.php?view=".$_POST['controller']."".$qstring."");
}