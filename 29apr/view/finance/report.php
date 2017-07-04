<?php ini_set("memory_limit","256M");
$where = "";
if( isset($_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder']!="" ) {
	$where = " where (nf.fin_cname like '%".$_REQUEST['searchbyorder']."%' OR nf.fin_cmobile like '%".$_REQUEST['searchbyorder']."%' OR nu.uname like '%".$_REQUEST['searchbyorder']."%')";
	if( isset( $_REQUEST['ss_date'] ) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!=""){
	$where .= " AND  nfr.fin_rec_date between '".date("m/d/Y",strtotime(str_replace("/","-","".$_REQUEST['ss_date']."")))."' AND '".date("m/d/Y",strtotime(str_replace("/","-","".$_REQUEST['es_date']."")))."'";
	
	}
}elseif( isset( $_REQUEST['ss_date'] ) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!=""){
	$where .= " where nfr.fin_rec_date between '".date("m/d/Y",strtotime(str_replace("/","-","".$_REQUEST['ss_date']."")))."' AND '".date("m/d/Y",strtotime(str_replace("/","-","".$_REQUEST['es_date']."")))."'";
}
$all_lend_money = $ketObj->runquery( "SELECT", "nf.fin_id,nf.fin_cname,nf.fin_caddress,nf.fin_cmobile,nfr.fin_rec_amount,nfr.fin_rec_id,nfr.fin_rec_date,nu.uname,nu.uid", "nar_fin_rec nfr INNER JOIN nar_finance nf ON nfr.fin_rec_cus_id = nf.fin_id INNER JOIN nar_user nu ON nu.uid = nf.fin_deal_person_id", array(), $where  );
/*echo "<pre>";
print_r($_POST);echo "<br/>";print_r($all_expansion);die();*/
$objPHPExcel = new PHPExcel;
$objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(8);
$objSheet = $objPHPExcel->getActiveSheet();
$objSheet->setTitle('Report');
$objSheet->getStyle('A1:F1')->getFont()->setBold(true)->setSize(8);
$objSheet->getCell('A1')->setValue('Name');
$objSheet->getCell('B1')->setValue('Mobile');
$objSheet->getCell('C1')->setValue('Address');
$objSheet->getCell('D1')->setValue('Received Amount');
$objSheet->getCell('E1')->setValue('Received By');
$objSheet->getCell('F1')->setValue('Date');
if( isset( $all_lend_money ) && is_array( $all_lend_money ) && count( $all_lend_money ) > 0 ){
	$sub =1; 
	foreach( $all_lend_money as $Key=>$row ){
		$sub++;
		$objSheet->getCell('A'.$sub)->setValue($row['fin_cname']);
		$objSheet->getCell('B'.$sub)->setValue($row['fin_cmobile']);
		$objSheet->getCell('C'.$sub)->setValue($row['fin_caddress']);
		$objSheet->getCell('D'.$sub)->setValue($row['fin_rec_amount']);
		$objSheet->getCell('E'.$sub)->setValue($row['uname']);
		$objSheet->getCell('F'.$sub)->setValue($row['fin_rec_date']);
		}
}
header('Content-Disposition: attachment; filename=Report');
header('Content-Type: application/vnd.ms-excel');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel5");
$objWriter->save('php://output');
?>