<?php function recieveRent($pid,$ketObj,$rid) {
$recrent =$ketObj->runquery( "SELECT","rec_id,rec_rent,rec_date", "nar_recrent", array()," where rec_property_id = ".$pid." AND rec_renter_id =".$rid." ORDER BY str_to_date(rec_date,'%m/%d/%Y') DESC","");
return $recrent;
}
function renterDetail($pid,$ketObj) {
$recrent =$ketObj->runquery( "SELECT", "np.title,np.pid,nr.rent_id,nr.rent_name,rent_address,rent_mobile,nu.uname,nr.rent_date,nr.rent_amount", "nar_rent nr INNER JOIN nar_property np ON np.pid = nr.rent_property_id INNER JOIN nar_user nu ON nu.uid = nr.rent_deal_person_id", array(), "where nr.rent_id =".$pid.""  );
return $recrent;
}
function recieveFinance($pid,$ketObj) {
$recfinance=$ketObj->runquery( "SELECT","fin_rec_id,fin_rec_date,fin_rec_amount", "nar_fin_rec", array()," where fin_rec_cus_id = ".$pid." ORDER BY str_to_date(fin_rec_date,'%m/%d/%Y') DESC","");
return $recfinance;
}
function lendMoneyCustomerDetail($pid,$ketObj) {
	$lend_money_customer = $ketObj->runquery( "SELECT", "nf.fin_id,nf.fin_cname,nf.fin_caddress,nf.fin_cmobile,nf.fin_amount,nf.fin_start_date,nf.fin_end_date,nf.fin_end_date,nf.fin_est,nf.fin_irate,nu.uname", "nar_finance nf INNER JOIN nar_user nu ON nu.uid = nf.fin_deal_person_id", array()," where nf.fin_id=".$pid."" );
return $lend_money_customer;
}