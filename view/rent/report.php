<?php ini_set("memory_limit","256M");
$where = "";
if( isset($_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder']!="" ) {
	$where = " where (np.title like '%".$_REQUEST['searchbyorder']."%' OR nar.rent_name like '%".$_REQUEST['searchbyorder']."%' OR nu.uname like '%".$_REQUEST['searchbyorder']."%')";
	if (isset($_REQUEST['rent_property_id']) && $_REQUEST['rent_property_id']>0) {
		$where .=" AND np.pid =".$_REQUEST['rent_property_id']."";
	}	
		if( isset( $_REQUEST['ss_date'] ) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!=""){
	$where .= " AND nr.rec_date between '".date("m/d/Y",strtotime(str_replace("/","-","".$_REQUEST['ss_date']."")))."' AND '".date("m/d/Y",strtotime(str_replace("/","-","".$_REQUEST['es_date']."")))."'";
	
	}
}else {
	if (isset($_REQUEST['rent_property_id']) && $_REQUEST['rent_property_id']>0) {
		$where .=" where np.pid =".$_REQUEST['rent_property_id']."";
	
	if( isset( $_REQUEST['ss_date'] ) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!=""){
	$where .= " AND nr.rec_date between '".date("m/d/Y",strtotime(str_replace("/","-","".$_REQUEST['ss_date']."")))."' AND '".date("m/d/Y",strtotime(str_replace("/","-","".$_REQUEST['es_date']."")))."'";
}
	
	}elseif( isset( $_REQUEST['ss_date'] ) && $_REQUEST['ss_date']!="" && isset( $_REQUEST['es_date'] ) && $_REQUEST['es_date']!=""){
	$where .= " where nr.rec_date between '".date("m/d/Y",strtotime(str_replace("/","-","".$_REQUEST['ss_date']."")))."' AND '".date("m/d/Y",strtotime(str_replace("/","-","".$_REQUEST['es_date']."")))."'";
	}
	
}
$rent_info = $ketObj->runquery( "SELECT", "np.title,nr.rec_id,nr.rec_rent,nr.rec_date,nu.uname,nar.rent_name", "nar_recrent nr INNER JOIN nar_property np ON np.pid = nr.rec_property_id INNER JOIN nar_user nu ON nu.uid = nr.	rec_person_id INNER JOIN nar_rent nar ON nar.rent_id = nr.rec_renter_id", array(), $where." limit 0,10", array(), $where  );
/*echo "<pre>";
print_r($_POST);echo "<br/>";print_r($all_expansion);die();*/
$objPHPExcel = new PHPExcel;
$objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(8);
$objSheet = $objPHPExcel->getActiveSheet();
$objSheet->setTitle('Report');
$objSheet->getStyle('A1:E1')->getFont()->setBold(true)->setSize(8);
$objSheet->getCell('A1')->setValue('Property Title');
$objSheet->getCell('B1')->setValue('Renter Name');
$objSheet->getCell('C1')->setValue('Rent');
$objSheet->getCell('D1')->setValue('Date');
$objSheet->getCell('E1')->setValue('Received Person');
if( isset( $rent_info ) && is_array( $rent_info ) && count( $rent_info ) > 0 ){
	$sub =1; 
	foreach( $rent_info as $Key=>$row ){
		$sub++;
		$objSheet->getCell('A'.$sub)->setValue($row['title']);
		$objSheet->getCell('B'.$sub)->setValue($row['rent_name']);
		$objSheet->getCell('C'.$sub)->setValue($row['rec_rent']);
		$objSheet->getCell('D'.$sub)->setValue($row['rec_date']);
		$objSheet->getCell('E'.$sub)->setValue($row['uname']);
		}
}
header('Content-Disposition: attachment; filename=Report.xls');
header('Content-Type: application/vnd.ms-excel');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel5");
$objWriter->save('php://output');
?>