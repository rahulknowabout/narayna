<?php  /*echo "<pre>";
print_r( $_POST );
print_r( $_FILES );
die();*/
function lendMoney( $ketObj ) {
$smdy ="";
/*echo "<pre>";
print_r( $_POST );
print_r( $_FILES );*/
if (isset($_POST['start_date']) && $_POST['start_date']!="") {
	$smdy =date("m/d/Y",strtotime("".str_replace("/","-",$_POST['start_date']).""));
	/*echo "<hr/>";
	echo $smdy;
	echo "<hr/>";*/
}
$ketech['fin_cname'] = $_POST['cname'];
$ketech['fin_caddress'] = $_POST['caddress'];
$ketech['fin_ccity']  = $_POST['ccity'];
$ketech['fin_cemail'] = $_POST['cemail'];
$ketech['fin_cmobile'] = $_POST['cmobile'];
$ketech['fin_deal_person_id'] = $_POST['deal_person'];
$ketech['fin_est'] = $_POST['est'];
$ketech['fin_amount'] = $_POST['finamount'];
$ketech['fin_emi'] = $_POST['finemi'];
$ketech['fin_irate'] = $_POST['fin_irate'];
$ketech['fin_start_date'] =	$smdy;
if (isset($_POST['end_date']) && $_POST['end_date']!="") {
	$ketech['fin_end_date']	= $_POST['end_date'];
}
$ketech['fin_del_mob']	= $_POST['fin_del_mob'];
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
		if (!file_exists($filename)) {
			mkdir('document/'.$lastinsertid);
		}
		move_uploaded_file($_FILES['cdocument1']['tmp_name'],$filename.'/Document 1.'.$ext);
}
if (isset($_FILES['cdocument2']) && $_FILES['cdocument2']['name'] != "" && $_FILES['cdocument2']['error']<1) {

	/*echo "hello";
	die();*/
	$filename ='document/'.$lastinsertid;
		if (!file_exists($filename)) {
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
		if (!file_exists($filename)) {
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
$smdy ="";
if (isset($_POST['start_date']) && $_POST['start_date']!="") {
	$smdy =date("m/d/Y",strtotime("".str_replace("/","-",$_POST['start_date']).""));
	/*echo "<hr/>";
	echo $smdy;
	echo "<hr/>";*/
}
$ketech['fin_rec_cus_id'] = $_POST['fid'];
$ketech['fin_rec_person_id'] = $_POST['deal_person'];
$ketech['fin_rec_amount'] = $_POST['fin_rec_amount'];
$ketech['rema'] = $_POST['rema'];
$ketech['fin_rec_date'] =	$smdy;
$ketech['fin_del_mob']	= $_POST['fin_del_mob'];
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
function checkStatus($ketObj) {
/*echo "<pre>";
print_r($_POST);
die();*/$qstring ="";
	if (isset($_POST['fin_rec_id']) && $_POST['fin_rec_id']>0) {
		
		
		if (isset($_POST['hsta']) && isset($_POST['hstab']) && $_POST['hstab']<1) {
		
			$ketech['hsta'] =1;
		}
		if (isset($_POST['hstb']) && isset($_POST['hstbb']) && $_POST['hstbb']<1) {
			$ketech['hstb'] =1;
		}
		if (isset($_POST['qstring']) && $_POST['qstring']!="") {
			$qstring =$_POST['qstring'];
		}
		$Status = $ketObj->runquery("UPDATE", "", "nar_fin_rec",$ketech, "WHERE fin_rec_id=".$_POST['fin_rec_id']);
	}
	/*echo "Location: index.php?view=".$_POST['view']."".$qstring."";
	die();*/
header("Location: index.php?view=".$_POST['view']."".$qstring."");
}
/*function calulateMonth($sdate,$edate,$emiday) {
$dayExtra =0;
$sdateDe =date('d',strtotime($sdate));
$sdateMe =date('m',strtotime($sdate));
$sdateYe =date('Y',strtotime($sdate));
$dayM=cal_days_in_month(CAL_GREGORIAN,$sdateMe,$sdateYe);
if ($sdateDe == $emiday) {
	if ($sdateMe == 12) {
	$sdateMe = 1;
	$sdateYe++;
	}else {
	$sdateMe++;
}
$sdatetemp =$sdateMe."/".$emiday."/".$sdateYe; 
$sdate=date('m/d/Y',strtotime($sdatetemp));
}else {
$dayExtra =($dayM-$sdateDe)+($emiday+1);
if ($sdateMe == 12) {
$sdateMe = 1;
$sdateYe++;
}else {
$sdateMe =$sdateMe+2;
}
$sdatetemp =$sdateMe."/".$emiday."/".$sdateYe; 
$sdate=date('m/d/Y',strtotime($sdatetemp));
}
/*echo $sdate;
echo "<hr/>";
echo $dayExtra;
die();
  Calulate Year Difference   
$sdateY =date('Y',strtotime($sdate));
$edateY =date('Y',strtotime($edate));
$diffY =($edateY - $sdateY);
Calulate Year Difference   

  Calulate Month Difference   
	$sdateM =date('m',strtotime($sdate));
	$edateM =date('m',strtotime($edate));
	if ($edateY == $sdateY) {
		$diffM =($edateM - $sdateM);
	}else {
		$diffmc = 12-$sdateM;
		$diffM =$diffmc+$edateM;
	}
	
  Calulate Day Difference  
$sdateD =date('d',strtotime($sdate));
$edateD =date('d',strtotime($edate));
$diffD =($edateD - $sdateD);
/*   Calulate Day Difference  
if ($edateD > $sdateD) {
	$diffM++;
}
if ($diffM>=12) {
	$diffM>0?$diffM=$diffM-12:$diffM ;
}else{
	$diffY>0?$diffY--:$diffY;
}
$diffM =($diffY*12)+$diffM;
$return['diffY'] =$diffY;
$return['diffM'] =$diffM;
$return['diffD'] =$diffD;
$return['dayExtra'] =$dayExtra;
return $return;
}*/
/*function calulateTotalPayment($sdate,$edate,$emiday,$famount,$frate) {
	$extraMoney =0;
	$receive=calulateMonth($sdate,$edate,$emiday);
	//echo "<pre>";print_r($receive);
	$monthlyEmi =($famount*$frate)/100;
	 if($receive['dayExtra'] > 0) {
	 	$extraMoney =$monthlyEmi>0?($monthlyEmi/30)*$receive['dayExtra']:0;
	}  
	$totalPayment['totalPayment'] =round(($monthlyEmi*$receive['diffM'])+$extraMoney);
	$totalPayment['monthlyEmi'] =$monthlyEmi;
	$totalPayment['extraMoney'] =$extraMoney;
	return $totalPayment;
}*/
/*function lendMoneyViewC($pid,$ketObj){
if ($pid>0) {
	//echo "<pre>";print_r($_REQUEST);die();
	$finance['recfinance'] = recieveFinance($pid,$ketObj);
	$finance['lend_money_customer'] = lendMoneyCustomerDetail($pid,$ketObj);
	$lend_money_customer =$finance['lend_money_customer']['0'];
	/*echo "<pre>";
	print_r($lend_money_customer);
	die();
	$totalReceiveFinance =0;
	$financeDueMonth=0;
	$unadjustmentAmount=0;
	$emimonth =0;
	$emir=0;
		/* Calculate Total Receive Rent 
		if (is_array($finance['recfinance']) && count($finance['recfinance'])>0) {
			foreach ($finance['recfinance'] as $key => $row ) {
			$totalReceiveFinance +=$row['fin_rec_amount'];
		}
	}
/* Calculate Total Receive Rent 
}
$today_date =date('m/d/y');
$totalPayment =calulateTotalPayment($lend_money_customer['fin_start_date'],$today_date,$lend_money_customer['fin_est'],$lend_money_customer['fin_amount'],$lend_money_customer['fin_irate']);
$finance['totalPayment'] =$totalPayment['totalPayment'];
$finance['totalReceiveFinance'] =$totalReceiveFinance;
$finance['monthlyEmi'] =$totalPayment['monthlyEmi'];
	if ($totalPayment['extraMoney'] > 0) {
		$emimonth +=1;
		$totalPaymentC =$totalPayment['totalPayment']-$totalPayment['extraMoney'];
		$totalReceiveFinance =$totalReceiveFinance-$totalPayment['extraMoney'];
		$emir+=1;
	}
$emimonth+=floor($totalPaymentC/$finance['monthlyEmi']);
$emir+=floor($totalReceiveFinance/$finance['monthlyEmi']);
$unadjustmentAmount+=abs($totalReceiveFinance%$finance['monthlyEmi']);
$finance['financeDueMonth']= $emimonth-$emir;
$finance['unadjustmentAmount']= $unadjustmentAmount;
return $finance;
}*/ 
function lendMoneyView() {
header("Location: index.php?view=".$_REQUEST['controller']."&file=".$_REQUEST['file']."&pid=".$_REQUEST['pid']);	
}
function unlinkFile() {
	/*echo "<pre>";
	print_r($_REQUEST);
	die();*/
	if (isset($_REQUEST['ulink']) && $_REQUEST['ulink']!="" && isset($_REQUEST['docid']) && $_REQUEST['docid']>0) {
		unlink('document/'. $_REQUEST['docid'].'/'.$_REQUEST['ulink']);
	}
	header("Location: index.php?view=".$_REQUEST['controller']."&file=".$_REQUEST['file']."&task=lendMoneyViewC"."&pid=".$_REQUEST['docid']."");	
}