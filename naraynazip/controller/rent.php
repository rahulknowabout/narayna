<?php function addEditProperty( $ketObj ) {
$ketech['title']    =	$_POST['title'];
$ketech['description'] =	    $_POST['description'];
$ketech['address'] =	$_POST['address'];
$ketech['city']=	$_POST['city'];
$ketech['state']	=	$_POST['state'];
	if( isset( $_POST['pid'] ) && $_POST['pid'] > 0 ) {
		$allSet = $ketObj->runquery( "UPDATE", "", "nar_property",$ketech, "WHERE pid=".$_POST['pid'] );
	}else {
		$allSet = $ketObj->runquery( "INSERT", "", "nar_property", $ketech );
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
function addEditRenter( $ketObj ) {
/*echo "<pre>";
print_r( $_POST );
die();*/
$ketech['rent_property_id']    =	$_POST['rent_property_id'];
$ketech['rent_name']    =	$_POST['renter_name'];
$ketech['rent_address'] =	    $_POST['renter_address'];
$ketech['rent_mobile'] =	$_POST['renter_mobile'];
$ketech['rent_deal_person_id']=	$_POST['deal_person'];
	if ( isset( $_POST['rent_id'] ) && $_POST['rent_id'] > 0 ) {
		$allSet = $ketObj->runquery( "UPDATE", "", "nar_rent",$ketech, "WHERE rent_id=".$_POST['rent_id'] );
	}else {
		$allSet = $ketObj->runquery( "INSERT", "", "nar_rent", $ketech );
	}
$qstring ="";
if (isset($_REQUEST['searchbyorder']) && $_REQUEST['searchbyorder']!="") {
	$qstring .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
}
if (isset($_REQUEST['rent_property_ids']) && $_REQUEST['rent_property_ids']!="") {
	$qstring .= '&rent_property_id='.$_REQUEST['rent_property_ids'].'';
}
if (isset($_REQUEST['vid']) && $_REQUEST['vid']!="") {
	$qstring .= '&vid='.$_REQUEST['vid'].'';
}	
header("Location: index.php?view=".$_POST['controller']."".$qstring."&file=".$_POST['file']."");
}
function rentRecieve($ketObj) {
	/*echo "<pre>";
	print_r( $_POST );
	die();*/
	$ketech['rec_property_id'] = $_POST['rec_property_id'];
	$ketech['rec_renter_id']    =$_POST['rec_renter_id'];
	$ketech['rec_rent']    =$_POST['rec_rent'];
	$ketech['rec_date'] =$_POST['rec_date'];
	$ketech['rec_person_id'] =$_POST['rec_person_id'];
	if ( isset( $_POST['rec_id'] ) && $_POST['rec_id'] > 0 ) {
		$allSet = $ketObj->runquery( "UPDATE", "", "nar_recrent",$ketech, "WHERE rec_id=".$_POST['rec_id'] );
	}else {
		$allSet = $ketObj->runquery("INSERT", "", "nar_recrent",$ketech);
	}
if (isset($_REQUEST['searchbyorder']) && $_REQUEST['searchbyorder']!="") {
	$qstring .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
}
if (isset($_REQUEST['rent_property_ids']) && $_REQUEST['rent_property_ids']!="") {
	$qstring .= '&rent_property_id='.$_REQUEST['rent_property_ids'].'';
}
if (isset($_REQUEST['ss_date']) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!="") {
	$qstring .= "&ss_date=".$_REQUEST['ss_date']."&es_date=".$_REQUEST['es_date']."";
}
if (isset($_REQUEST['vid']) && $_REQUEST['vid']!="") {
	$qstring .= '&vid='.$_REQUEST['vid'].'';
}	
header("Location: index.php?view=".$_POST['controller']."&file=".$_POST['file']."".$qstring."");
}
