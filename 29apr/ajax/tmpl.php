<?php /*echo "<pre>";print_r( $_POST );die();*/
## UserUnique Case, Uniqueness Base On User Mobile Number
if( isset( $_POST['chk'] ) && $_POST['chk'] == "userunique" ) {	
$uid	 =$_POST['uid']>0?$_POST['uid']:0;
$umobile =$_POST['umobile'];
$User = $ketObj->runquery( "SELECT", "umobile", "nar_user", array(), " WHERE umobile='".$umobile."' AND uid<>".$uid."" );
	if( isset( $User ) && is_array( $User ) && count( $User ) > 0 ){ echo "yes";}else{ echo "no";}
}## Property Unique Case,Uniqueness Base On User Property Title 
elseif( isset( $_POST['chk'] ) && $_POST['chk'] == "propertyunique" ) {	
$pid	 =$_POST['pid']>0?$_POST['pid']:0;
$title =$_POST['title'];
$Property = $ketObj->runquery( "SELECT", "title", "nar_property", array(), " WHERE title='".$title."' AND pid<>".$pid."" );
	if( isset( $Property ) && is_array( $Property ) && count( $Property ) > 0 ){ echo "yes";}else{ echo "no";}
}## Check Duplicate In Renter Table 
elseif (isset( $_POST['chk'] ) && $_POST['chk'] == "rentunique") {
    $rent_property_id =$_POST['rent_property_id'];
	$rent_id =$_POST['rent_id'];
	$rent =$ketObj->runquery( "SELECT", "rent_property_id", "nar_rent", array(), " WHERE rent_property_id='".$rent_property_id."' AND rent_id<>".$rent_id."" );
	if (isset( $rent ) && is_array($rent) && count($rent) > 0) { 
	    echo "yes";
	}else { 
	    echo "no";
	}
}## Check Duplicae In Finance Table
elseif (isset( $_POST['chk'] ) && $_POST['chk'] == "finunique") {
	$fid =$_POST['fid'];
	$fmobile =$_POST['cmobile'];
	$fsdate =$_POST['sdate'];
	$fin =$ketObj->runquery( "SELECT", "fin_id", "nar_finance", array(), " WHERE fin_cmobile='".$fmobile."' AND fin_start_date ='".$fsdate."'  AND fin_id<>".$fid."" );
	if (isset( $fin ) && is_array($fin) && count($fin) > 0) { 
	    echo "yes";
	}else { 
	    echo "no";
	}
}## Renter Name
elseif (isset( $_POST['chk'] ) && $_POST['chk'] == "rentername") {
	/*echo "<pre>";
	print_r( $_POST );
	die();*/
	$rid =$_POST['rent_property_id'];
	
	$rent =$ketObj->runquery( "SELECT", "rent_id,rent_name,rent_date", "nar_rent", array(), " WHERE rent_property_id='".$rid."' limit 1");
	$rent['0']['rent_date'] =date("d/m/Y",strtotime("".$rent['0']['rent_date'].""));
	if (isset( $rent ) && is_array($rent) && count($rent) > 0) { 
	    echo json_encode($rent['0']);
	}else { 
	    echo "no";
	}
}else if (isset($_POST['chk']) && $_POST['chk'] == "pagination" && isset($_POST['onlink']) && $_POST['onlink']="user" && isset($_POST['getresult']) && $_POST['getresult']!="") {
	/*echo "<pre>";
	print_r($_POST);
	die();*/
}else if (isset($_POST['chk']) && $_POST['chk'] == "mreceive" && isset($_POST['id']) && $_POST['id']>0 && isset($_POST['str']) && $_POST['str']== "hn") {
//echo "<pre>";print_r( $_POST );die();
$ketech['hsta'] =1;
if ($_POST['type'] == "rent" ) {
	$Status = $ketObj->runquery("UPDATE", "", "nar_recrent",$ketech, "WHERE rec_id=".$_POST['id']);
	echo "yes";
}
if ($_POST['type'] == "fin" ) {
	$Status = $ketObj->runquery("UPDATE", "", "nar_fin_rec",$ketech, "WHERE fin_rec_id=".$_POST['id']);
	echo "yes";
}	
//echo "hn";
}elseif (isset($_POST['chk']) && $_POST['chk'] == "mreceive" && isset($_POST['id']) && $_POST['id']>0 && isset($_POST['str']) && $_POST['str']== "sn") {
//echo "<pre>";print_r( $_POST );die();
$ketech['hstb'] =1;
if ($_POST['type'] == "rent" ) {
	$Status = $ketObj->runquery("UPDATE", "", "nar_recrent",$ketech, "WHERE rec_id=".$_POST['id']);
	echo "yes";
}
if ($_POST['type'] == "fin" ) {
	$Status = $ketObj->runquery("UPDATE", "", "nar_fin_rec",$ketech, "WHERE fin_rec_id=".$_POST['id']);
	echo "yes";
}
}elseif	(isset($_POST['chk']) && $_POST['chk'] == "expens" && isset($_POST['id']) && $_POST['id']>0 && isset($_POST['str']) && $_POST['str']== "hn") {
	$ketech['hsta'] =1;
	$Status = $ketObj->runquery("UPDATE", "", "nar_expansion",$ketech, "WHERE exp_id=".$_POST['id']);
	echo "yes";
}elseif (isset($_POST['chk']) && $_POST['chk'] == "expens" && isset($_POST['id']) && $_POST['id']>0 && isset($_POST['str']) && $_POST['str']== "sn") {
	$ketech['hstb'] =1;
	$Status = $ketObj->runquery("UPDATE", "", "nar_expansion",$ketech, "WHERE exp_id=".$_POST['id']);
	echo "yes";
}