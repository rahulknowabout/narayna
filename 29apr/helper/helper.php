<?php function calulateMonthF($sdate,$edate,$emiday) {
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
/*echo $sdate;
die();*/
}else {
if ($sdateDe>$emiday) {
	$dayExtra =($dayM-$sdateDe)+($emiday);
	if ($sdateMe == 12) {
	$sdateMe = 1;
	$sdateYe++;
	}else {
	$sdateMe =$sdateMe+2;
	}
}else {
		$dayExtra =($emiday);
}	
$sdatetemp =$sdateMe."/".$emiday."/".$sdateYe; 
$sdate=date('m/d/Y',strtotime($sdatetemp));
}
/*echo $sdate;
echo "<hr/>";
echo $dayExtra;
die();*/

/*   Calulate Year Difference   */
$sdateY =date('Y',strtotime($sdate));
$edateY =date('Y',strtotime($edate));
$diffY =($edateY - $sdateY);

/*echo $sdateY;
echo "<hr/>";
echo $edateY;
echo "<hr/>";
echo $diffY;
echo "<hr/>";
die();*/
/*   Calulate Year Difference   */

/*   Calulate Month Difference   */
	$sdateM =date('m',strtotime($sdate));
	$edateM =date('m',strtotime($edate));
	
	
	if ($edateY == $sdateY) {
		$diffM =($edateM - $sdateM);
		//echo "sss";
	}else {
		$diffmc = 12-$sdateM;
		$diffM =$diffmc+$edateM;
		//echo "else";
	}
	
	
/*   Calulate Day Difference   */
$sdateD =date('d',strtotime($sdate));
$edateD =date('d',strtotime($edate));
/*echo "<hr/>";
	echo $sdateD;
	echo "<hr/>";
	echo $edateD;
	echo "<hr/>";
	die();*/
$diffD =($edateD - $sdateD);
/*   Calulate Day Difference   */
if ($edateD > $sdateD) {
	$diffM++;
}

if ($diffM>=12) {

	$diffM>0?$diffM=$diffM-12:$diffM=$diffM ;
	//echo "12";
}else{
	$diffY>0?$diffY--:$diffY;
	//echo "<12";
}
/*echo "<hr/>";
echo $diffM;
echo "<hr/>";
echo $diffY;
echo "<hr/>";
die();*/
$diffM =($diffY*12)+$diffM;
$return['diffY'] =$diffY;
$return['diffM'] =$diffM;
$return['diffD'] =$diffD;
$return['dayExtra'] =$dayExtra;
/*echo "<pre>";
print_r($return);
echo "<hr/>";
die();*/
return $return;
}
function calulateTotalPayment($sdate,$edate,$emiday,$famount,$frate) {
	$extraMoney =0;
	$receive=calulateMonthF($sdate,$edate,$emiday);
	//echo "<pre>";print_r($receive);
	$monthlyEmi =($famount*$frate)/100;
	 if($receive['dayExtra'] > 0) {
	 	$extraMoney =$monthlyEmi>0?($monthlyEmi/30)*$receive['dayExtra']:0;
	}  
	$totalPayment['totalPayment'] =round(($monthlyEmi*$receive['diffM'])+$extraMoney);
	$totalPayment['monthlyEmi'] =$monthlyEmi;
	$totalPayment['extraMoney'] =$extraMoney;
	/*echo "<pre>";
	print_r($totalPayment);
	echo "<hr/>";*/
	return $totalPayment;
}
function lendMoneyViewC($pid,$ketObj){
if ($pid>0) {
	//echo "<pre>";print_r($_REQUEST);die();
	$finance['recfinance'] = recieveFinance($pid,$ketObj);
	$finance['lend_money_customer'] = lendMoneyCustomerDetail($pid,$ketObj);
	$lend_money_customer =$finance['lend_money_customer']['0'];
	/*echo "<pre>";
	print_r($lend_money_customer);
	die();*/
	$totalReceiveFinance =0;
	$financeDueMonth=0;
	$unadjustmentAmount=0;
	$emimonth =0;
	$emir=0;
	$flage=2;
		/* Calculate Total Receive Rent */	
		if (is_array($finance['recfinance']) && count($finance['recfinance'])>0) {
			foreach ($finance['recfinance'] as $key => $row ) {
			$totalReceiveFinance +=$row['fin_rec_amount'];
		}
	}
/* Calculate Total Receive Rent */
}
$today_date =date('m/d/Y');
$totalPayment =calulateTotalPayment($lend_money_customer['fin_start_date'],$today_date,$lend_money_customer['fin_est'],$lend_money_customer['fin_amount'],$lend_money_customer['fin_irate']);
/*echo "<pre>";
print_r($totalPayment);
die();*/
$finance['totalPayment'] =$totalPayment['totalPayment'];
//$totalPaymentC =0;
$finance['totalReceiveFinance'] =$totalReceiveFinance;
$finance['monthlyEmi'] =$totalPayment['monthlyEmi'];
	if ($totalPayment['extraMoney'] > 0) {
		$emimonth +=1;
		$totalPayment['totalPayment'] =$totalPayment['totalPayment']-$totalPayment['extraMoney'];
			if ($totalReceiveFinance>=$totalPayment['extraMoney']){
				$totalReceiveFinance =$totalReceiveFinance-$totalPayment['extraMoney'];
				$emir+=1;
				$flage =0;
			}else {
				$flage =1; 
			}	
	}
$emimonth+=floor($totalPayment['totalPayment']/$finance['monthlyEmi']);
$emir+=floor($totalReceiveFinance/$finance['monthlyEmi']);
/*echo $emimonth;
echo "<hr/>";
echo "<pre>";
print_r($totalPayment);

echo "<hr/>";
echo $emir;
echo "<hr/>";*/
$unadjustmentAmount+=abs($totalReceiveFinance%$finance['monthlyEmi']);
$finance['financeDueMonth']= $emimonth-$emir;
$finance['dueEmiAmt']= $flage==1 ? (($finance['financeDueMonth']-1)*$finance['monthlyEmi'])+$totalPayment['extraMoney']:$finance['financeDueMonth']*$finance['monthlyEmi'];
$finance['unadjustmentAmount']= $unadjustmentAmount;
/*echo "<pre>";
print_r($finance);
die();*/
return $finance;
}
function calulateMonthR($sdate,$edate) {
/*   Calulate Year Difference   */
$sdateY =date('Y',strtotime($sdate));
$edateY =date('Y',strtotime($edate));
$diffY =($edateY - $sdateY);
/*   Calulate Year Difference   */

/*   Calulate Month Difference   */
	$sdateM =date('m',strtotime($sdate));
	$edateM =date('m',strtotime($edate));
	if ($edateY == $sdateY) {
		$diffM =($edateM - $sdateM);
	}else {
		$diffmc = 12-$sdateM;
		$diffM =$diffmc+$edateM;
	}
	
/*   Calulate Day Difference   */
$sdateD =date('d',strtotime($sdate));
$edateD =date('d',strtotime($edate));
$diffD =($edateD - $sdateD);
/*   Calulate Day Difference   */
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
function propertyViewC($pid,$ketObj,$rid) {
//echo "<pre>";print_r($_REQUEST);die();
	if ($pid>0 && $rid > 0) {
	$recrent['recrent'] = recieveRent($pid,$ketObj,$rid);
	$recrentinfo = renterDetail($rid,$ketObj);
	/*echo "<pre>";
	print_r($recrentinfo);
	die();*/
	$recrentinfo = $recrentinfo['0'];
	$totalReceiveRent =0;
	$rentDueMonth=0;
	$tRentMonth =0;
	$rRentMonth =0;
	$unadjustmentAmount=0;
		/* Calculate Total Receive Rent */	
		if (is_array($recrent['recrent']) && count($recrent['recrent'])>0) {
			foreach ($recrent['recrent'] as $key => $row ) {
			$totalReceiveRent +=$row['rec_rent'];
		}
		}
		/* Calculate Total Receive Rent */
		$recrent['totalReceiveRent'] =$totalReceiveRent;
	}

	
	$recrent['rentinfo']['name'] = $recrentinfo['rent_name'];
	$recrent['rentinfo']['address'] = $recrentinfo['rent_address'];
	$recrent['rentinfo']['mobile'] = $recrentinfo['rent_mobile'];
	$recrent['rentinfo']['date'] = $recrentinfo['rent_date'];
	$recrent['rentinfo']['amount'] = $recrentinfo['rent_amount'];
	$recrent['rentinfo']['ptitle'] = $recrentinfo['title'];
	//echo "<pre>";print_r($recrent);die();
	$today_date =date('m/d/Y');
	
	$recrent['totalRent'] =calulateTotalRent($recrentinfo['rent_date'],$today_date,$recrentinfo['rent_amount']);
	$tRentMonth =floor($recrent['totalRent']/$recrentinfo['rent_amount']);
	$rRentMonth =floor($recrent['totalReceiveRent']/$recrentinfo['rent_amount']);
	$unadjustmentAmount+=abs($recrent['totalReceiveRent']%$recrentinfo['rent_amount']);
	if ($tRentMonth>=$rRentMonth) {
		$recrent['rentDueMonth']= $tRentMonth-$rRentMonth;
	}else {
		$recrent['rentDueMonth']= 0;
	}
	$recrent['unadjustmentAmount']= $unadjustmentAmount;
	$recrent['tRentMonth']= $tRentMonth;
	$recrent['rRentMonth']= $rRentMonth;

	return $recrent;
} 