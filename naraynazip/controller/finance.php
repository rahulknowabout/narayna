<?php  /*echo "<pre>";
print_r( $_POST );
print_r( $_FILES );
die();*/
function lendMoney( $ketObj ) {
/*echo "<pre>";
print_r( $_POST );
print_r( $_FILES );
die();*/
$ketech['fin_cname'] = $_POST['cname'];
$ketech['fin_caddress'] = $_POST['caddress'];
$ketech['fin_ccity']  = $_POST['ccity'];
$ketech['fin_cemail'] = $_POST['cemail'];
$ketech['fin_cmobile'] = $_POST['cmobile'];
$ketech['fin_deal_person_id'] = $_POST['deal_person'];
$ketech['fin_est'] = $_POST['est'];
$ketech['fin_amount'] = $_POST['finamount'];
$ketech['fin_irate'] = $_POST['fin_irate'];
$ketech['fin_start_date'] =	$_POST['start_date'];
$ketech['fin_end_date']	= $_POST['end_date'];
if (isset($_POST['fin_doc_rec'])) {
	$ketech['fin_doc_rec']	= 1;
}else {
	$ketech['fin_doc_rec']	= 0;
}
if (isset($_POST['fin_doc_chk'])) {
	$ketech['fin_doc_chk']	= 1;
}else {
	$ketech['fin_doc_chk']	= 0;
}
	if( isset( $_POST['fid'] ) && $_POST['fid'] > 0 ) {
		$allSet = $ketObj->runquery( "UPDATE", "", "nar_finance",$ketech, "WHERE fin_id=".$_POST['fid'] );
		$lastinsertid =$_POST['fid'];
	}else {
		$allSet = $ketObj->runquery( "INSERT", "", "nar_finance", $ketech );
		$lastinsertid =mysql_insert_id();
	}
if (isset($_FILES['cphoto']) && $_FILES['cphoto']['name'] != "" && $_FILES['cphoto']['error']<1) {

	/*echo "hello";
	die();*/
	$filename ='document/'.$lastinsertid;
		if (!file_exists($filename.'/'.$lastinsertid)) {
			mkdir('document/'.$lastinsertid);
		}
		move_uploaded_file($_FILES['cphoto']['tmp_name'],$filename.'/photo.jpg' );
}
if (isset($_FILES['cdocument1']) && $_FILES['cdocument1']['name'] != "" && $_FILES['cdocument1']['error']<1) {

	/*echo "hello";
	die();*/
	$ext =explode(".",$_FILES['cdocument1']['name']);
	$ext =$ext['1'];
	$filename ='document/'.$lastinsertid;
		if (!file_exists($filename.'/'.$lastinsertid)) {
			mkdir('document/'.$lastinsertid);
		}
		move_uploaded_file($_FILES['cdocument1']['tmp_name'],$filename.'/Document 1.'.$ext);
}
if (isset($_FILES['cdocument2']) && $_FILES['cdocument2']['name'] != "" && $_FILES['cdocument2']['error']<1) {

	/*echo "hello";
	die();*/
	$filename ='document/'.$lastinsertid;
		if (!file_exists($filename.'/'.$lastinsertid)) {
			mkdir('document/'.$lastinsertid);
		}
		$ext =explode(".",$_FILES['cdocument2']['name']);
		$ext =$ext['1'];
		move_uploaded_file($_FILES['cdocument2']['tmp_name'],$filename.'/Document 2.'.$ext );
}
if (isset($_FILES['cdocument3']) && $_FILES['cdocument3']['name'] != "" && $_FILES['cdocument3']['error']<1) {

	/*echo "hello";
	die();*/
	$ext =explode(".",$_FILES['cdocument3']['name']);
	$ext =$ext['1'];
	$filename ='document/'.$lastinsertid;
		if (!file_exists($filename.'/'.$lastinsertid)) {
			mkdir('document/'.$lastinsertid);
		}
		move_uploaded_file($_FILES['cdocument3']['tmp_name'],$filename.'/Document 3.'.$ext );
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
function receivedMoney( $ketObj ) {
/*echo "<pre>";
print_r($_POST);
die();*/
$ketech['fin_rec_cus_id'] = $_POST['fid'];
$ketech['fin_rec_person_id'] = $_POST['deal_person'];
$ketech['fin_rec_amount'] = $_POST['fin_rec_amount'];
$ketech['fin_rec_date'] =	$_POST['start_date'];
if (isset($_POST['fin_rec_id']) && $_POST['fin_rec_id']>0) {
	$allSet = $ketObj->runquery( "UPDATE", "", "nar_fin_rec",$ketech, "WHERE fin_rec_id=".$_POST['fin_rec_id'] );

}else {
	$allSet = $ketObj->runquery( "INSERT", "", "nar_fin_rec", $ketech );
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
header("Location: index.php?view=".$_POST['controller']."&file=".$_POST['file']."".$qstring."");
}
