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
$smdy ="";
if (isset($_POST['rent_date']) && $_POST['rent_date']!="") {
	$smdy =date("m/d/Y",strtotime("".str_replace("/","-",$_POST['rent_date']).""));
	/*echo "<hr/>";
	echo $smdy;
	echo "<hr/>";
	die();*/
}
$ketech['rent_property_id']    =	$_POST['rent_property_id'];
$ketech['rent_name']    =	$_POST['renter_name'];
$ketech['rent_address'] =	    $_POST['renter_address'];
$ketech['rent_mobile'] =	$_POST['renter_mobile'];
$ketech['rent_deal_person_id']=	$_POST['deal_person'];
$ketech['rent_amount']=	$_POST['rent_amount'];
$ketech['rent_date']=	$smdy;
$ketech['rent_del_mob']=	$_POST['rent_del_mob'];
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
$smdy ="";
if (isset($_POST['rec_date']) && $_POST['rec_date']!="") {
	$smdy =date("m/d/Y",strtotime("".str_replace("/","-",$_POST['rec_date']).""));
	/*echo "<hr/>";
	echo $smdy;
	echo "<hr/>";
	die();*/
}
	$ketech['rec_property_id'] = $_POST['rec_property_id'];
	$ketech['rec_renter_id']    =$_POST['rec_renter_id'];
	$ketech['rec_rent']    =$_POST['rec_rent'];
	$ketech['rentd']    =$_POST['rentd'];
	$ketech['rec_date'] =$smdy;
	$ketech['rec_person_id'] =$_POST['rec_person_id'];
	$ketech['rent_del_mob']=	$_POST['rent_del_mob'];
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
function checkStatus($ketObj) {
/*echo "<pre>";
print_r($_POST);
die();*/$qstring ="";
	if (isset($_POST['rec_id']) && $_POST['rec_id']>0) {
		
		
		if (isset($_POST['hsta']) && isset($_POST['hstab']) && $_POST['hstab']<1) {
			$ketech['hsta'] =1;
		}
		if (isset($_POST['hstb']) && isset($_POST['hstbb']) && $_POST['hstbb']<1) {
			$ketech['hstb'] =1;
		}
		if (isset($_POST['qstring']) && $_POST['qstring']!="") {
			$qstring =$_POST['qstring'];
		}
		$Status = $ketObj->runquery("UPDATE", "", "nar_recrent",$ketech, "WHERE rec_id=".$_POST['rec_id']);
	}
	/*echo "Location: index.php?view=".$_POST['view']."".$qstring."";
	die();*/
header("Location: index.php?view=".$_POST['view']."".$qstring."");
}

/*function calulateMonthR($sdate,$edate) {
/*   Calulate Year Difference   
$sdateY =date('Y',strtotime($sdate));
$edateY =date('Y',strtotime($edate));
$diffY =($edateY - $sdateY);
/*   Calulate Year Difference   */

/*   Calulate Month Difference   
	$sdateM =date('m',strtotime($sdate));
	$edateM =date('m',strtotime($edate));
	if ($edateY == $sdateY) {
		$diffM =($edateM - $sdateM);
	}else {
		$diffmc = 12-$sdateM;
		$diffM =$diffmc+$edateM;
	}
	
/*   Calulate Day Difference   
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
return $return;
}
function calulateTotalRent($sdate,$edate,$ramount) {
	$receive=calulateMonthR($sdate,$edate);
	//echo "<pre>";print_r($receive);die();
	$totalRent =$ramount*$receive['diffM'];
	return $totalRent;
}
function propertyViewC($pid,$ketObj) {
//echo "<pre>";print_r($_REQUEST);die();
	if ($pid>0) {
	$recrent['recrent'] = recieveRent($pid,$ketObj);
	$recrentinfo = renterDetail($pid,$ketObj);
	$recrentinfo = $recrentinfo['0'];
	$totalReceiveRent =0;
	$rentDueMonth=0;
	$tRentMonth =0;
	$rRentMonth =0;
	$unadjustmentAmount=0;
		/* Calculate Total Receive Rent 
		if (is_array($recrent['recrent']) && count($recrent['recrent'])>0) {
			foreach ($recrent['recrent'] as $key => $row ) {
			$totalReceiveRent +=$row['rec_rent'];
		}
		}
		/* Calculate Total Receive Rent 
		$recrent['totalReceiveRent'] =$totalReceiveRent;
	}

	
	$recrent['rentinfo']['name'] = $recrentinfo['rent_name'];
	$recrent['rentinfo']['address'] = $recrentinfo['rent_address'];
	$recrent['rentinfo']['mobile'] = $recrentinfo['rent_mobile'];
	$recrent['rentinfo']['date'] = $recrentinfo['rent_date'];
	$recrent['rentinfo']['amount'] = $recrentinfo['rent_amount'];
	$recrent['rentinfo']['ptitle'] = $recrentinfo['title'];
	//echo "<pre>";print_r($recrent);die();
	$today_date =date('m/d/y');
	$recrent['totalRent'] =calulateTotalRent($recrentinfo['rent_date'],$today_date,$recrentinfo['rent_amount']);
	$tRentMonth =floor($recrent['totalRent']/$recrentinfo['rent_amount']);
	$rRentMonth =floor($recrent['totalReceiveRent']/$recrentinfo['rent_amount']);
	$unadjustmentAmount+=abs($recrent['totalReceiveRent']%$recrentinfo['rent_amount']);
	$recrent['rentDueMonth']= $tRentMonth-$rRentMonth;
	$recrent['unadjustmentAmount']= $unadjustmentAmount;
	$recrent['tRentMonth']= $tRentMonth;
	$recrent['rRentMonth']= $rRentMonth;
	return $recrent;
}*/
function propertyView($ketObj) {
//echo "<pre>";print_r($_REQUEST);die();
header("Location: index.php?view=".$_REQUEST['controller']."&file=".$_REQUEST['file']."&rid=".$_REQUEST['rid']."&pid=".$_REQUEST['pid']."&renter_name=".$_REQUEST['renter_name']."&renter_address=".$_REQUEST['renter_address']."&renter_mobile=".$_REQUEST['renter_mobile']."&rent_date=".$_REQUEST['rent_date']."&ptitle=".$_REQUEST['ptitle']."&rent_amount=".$_REQUEST['rent_amount']."");
}