<?php ini_set("memory_limit","256M");
$where = "";
if( isset($_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder']!="" ) {
	$where = " where (nu.uname like '%".$_REQUEST['searchbyorder']."%' OR ne.exp_date = '".$_REQUEST['searchbyorder']."')";
	if( isset( $_REQUEST['ss_date'] ) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!=""){
	$where .= " AND  str_to_date(ne.exp_date,'%d/%m/%Y')  between  str_to_date('".$_REQUEST['ss_date']."','%d/%m/%Y') AND  str_to_date('".$_REQUEST['es_date']."','%d/%m/%Y')";
	
	}
	if( isset($_REQUEST['exp_user_id']) && $_REQUEST['exp_user_id']>0){
		$where .= " AND ne.exp_user_id = ".$_REQUEST['exp_user_id']."";
	}
}else {
if( isset( $_REQUEST['ss_date'] ) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!=""){
	$where .= " where str_to_date(ne.exp_date,'%d/%m/%Y')  between  str_to_date('".$_REQUEST['ss_date']."','%d/%m/%Y') AND  str_to_date('".$_REQUEST['es_date']."','%d/%m/%Y')";
	if( isset($_REQUEST['exp_user_id']) && $_REQUEST['exp_user_id']>0){
		$where .= " AND ne.exp_user_id = ".$_REQUEST['exp_user_id']."";
	}
}else {
	if( isset($_REQUEST['exp_user_id']) && $_REQUEST['exp_user_id']>0){
		$where .= " where ne.exp_user_id = ".$_REQUEST['exp_user_id']."";
	}

}
	
}
$all_expansion = $ketObj->runquery( "SELECT", "ne.exp_id,ne.exp_date,ne.exp_amount,ne.exp_desc,nu.uname", "nar_expansion ne INNER JOIN nar_user nu ON nu.uid = ne.exp_user_id", array(), $where,"" );
/*echo "<pre>";
print_r($_POST);echo "<br/>";print_r($all_expansion);die();*/
$objPHPExcel = new PHPExcel;
$objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(8);
$objSheet = $objPHPExcel->getActiveSheet();
$objSheet->setTitle('Report');
$objSheet->getStyle('A1:D1')->getFont()->setBold(true)->setSize(8);
$objSheet->getCell('A1')->setValue('Date');
$objSheet->getCell('B1')->setValue('Description');
$objSheet->getCell('C1')->setValue('Amount');
$objSheet->getCell('D1')->setValue('Expenses By');
if( isset( $all_expansion ) && is_array( $all_expansion ) && count( $all_expansion ) > 0 ){
	$sub =1; 
	foreach( $all_expansion as $Key=>$row ){
		$sub++;
		$objSheet->getCell('A'.$sub)->setValue($row['exp_date']);
		$objSheet->getCell('B'.$sub)->setValue($row['exp_desc']);
		$objSheet->getCell('C'.$sub)->setValue($row['exp_amount']);
		$objSheet->getCell('D'.$sub)->setValue($row['uname']);
		}
}
header('Content-Disposition: attachment; filename=Report');
header('Content-Type: application/vnd.ms-excel');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel5");
$objWriter->save('php://output');
?>