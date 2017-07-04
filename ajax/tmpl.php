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
}else if (isset($_POST['chk']) && $_POST['chk'] == "pagination" && isset($_POST['onlink']) && $_POST['onlink']=="user" && isset($_POST['getresult']) && $_POST['getresult']!="") {
	//echo "<pre>";print_r($_POST); die();
	if( isset($_REQUEST['where'] ) && $_REQUEST['where']!="" ) {
	$where = " where (uname like '%".$_REQUEST['where']."%' OR urole like '%".$_REQUEST['where']."%' OR umobile like '%".$_REQUEST['where']."%' OR uemail like '%".$_REQUEST['where']."%' )";
}else {
	$where = "";
}
	if (isset($_SESSION['user_add'])) {
		$linkadd =$_SESSION['user_add']>0 ?1:0;
	}else{
		$linkadd =2;
	}
	$counter =$_POST['getresult']+1;
	$data ="";
	$allUser = $ketObj->runquery( "SELECT", "*", "nar_user", array(), $where." limit ".$_POST['getresult'].",15"  );
		if (isset($allUser) && is_array($allUser) && count($allUser) > 0) {
			foreach( $allUser as $allUserK=>$allUserV ) {
				$data.="<tr><th scope='row'>".$counter."</th><td>".$allUserV['uname']."</td><td>".$allUserV['uemail']."</td><td>".$allUserV['umobile']."</td>"; if ($linkadd == 0){$data.="<td><a href='#' class=\"largeWarningBasic btn btn-info\" >Edit</a><a href='#' class =\"largeWarningBasic btn btn-danger\" >Delete</a></td></tr>";}if ($linkadd == 1){$data.="<td><a href ='index.php?view=user&file=add&edit=". $allUserV['uid']."' class='btn btn-info'>Edit</a><a href='index.php?controller=delete&delete='". $allUserV['uid']."'&chk=userdelete&view=user' class='btn btn-danger' onclick='return confirmdelete()'>Delete</a></td></tr>";}if ($linkadd == 2){$data.="<td><a href ='index.php?view=user&file=add&edit=". $allUserV['uid']."' class='btn btn-info'>Edit</a><a href='index.php?controller=delete&delete='". $allUserV['uid']."&chk=userdelete&view=user' class ='btn btn-danger' onclick='return confirmdelete()'>Delete</a></td></tr>";}
$counter++;}echo $data;}else{$data ="no";}
}elseif (isset($_POST['chk']) && $_POST['chk'] == "pagination" && isset($_POST['onlink']) && $_POST['onlink']=="plist" && isset($_POST['getresult']) && $_POST['getresult']!="") {
	//echo "<pre>";print_r($_POST); die();
	if( isset($_REQUEST['where'] ) && $_REQUEST['where']!="" ) {
	$where = " where (title like '%".$_REQUEST['where']."%' OR address like '%".$_REQUEST['where']."%' OR city like '%".$_REQUEST['where']."%')";
}else {
	$where = "";
}
	if (isset($_SESSION['add_prop'])) {
		$linkadd =$_SESSION['add_prop']>0 ?1:0;
	}else{
		$linkadd =2;
	}
	$counter =$_POST['getresult']+1;
	$data ="";
	$allP = $ketObj->runquery( "SELECT", "*", "nar_property", array(), $where." limit ".$_POST['getresult'].",15"  );
		if (isset($allP) && is_array($allP) && count($allP) > 0) {
			foreach( $allP as $allUserK=>$allUserV ) {
				$data.="<tr><th scope='row'>".$counter."</th><td>".$allUserV['title']."</td><td>".$allUserV['address']."</td><td>".$allUserV['city']."</td>"; if ($linkadd == 0){$data.="<td><a href='#' class=\"largeWarningBasic btn btn-info\" >Edit</a><a href='#' class =\"largeWarningBasic btn btn-danger\" >Delete</a></td></tr>";}if ($linkadd == 1){$data.="<td><a href ='index.php?view=rent&file=add&edit=". $allUserV['pid']."' class='btn btn-info'>Edit</a><a href='index.php?controller=delete&delete='". $allUserV['pid']."'&chk=propertydelete&view=rent' class='btn btn-danger' onclick='return confirmdelete()'>Delete</a></td></tr>";}if ($linkadd == 2){$data.="<td><a href ='index.php?view=rent&file=add&edit=". $allUserV['pid']."' class='btn btn-info'>Edit</a><a href='index.php?controller=delete&delete='". $allUserV['pid']."&chk=propertydelete&view=rent' class ='btn btn-danger' onclick='return confirmdelete()'>Delete</a></td></tr>";}
$counter++;}echo $data;}else{$data ="no";}
}elseif (isset($_POST['chk']) && $_POST['chk'] == "pagination" && isset($_POST['onlink']) && $_POST['onlink']=="lendmoney" && isset($_POST['getresult']) && $_POST['getresult']!="") {
	//echo "<pre>";print_r($_POST); die();
	if( isset($_REQUEST['where'] ) && $_REQUEST['where']!="" ) {
	$where =$_REQUEST['where'] ;
}else {
	$where = "";
}
	if (isset($_SESSION['lend_money'])) {
		$linkadd =$_SESSION['lend_money']>0 ?1:0;
	}else{
		$linkadd =2;
	}
	if (isset($_REQUEST['tilldate']) && $_REQUEST['tilldate']!="") {
	$counter =$_POST['counter'];
	}else {
		$counter =$_POST['getresult']+1;
	}
	$data ="";
	$all_lend_money = $ketObj->runquery( "SELECT", "nf.fin_id,nf.fin_cname,nf.fin_caddress,nf.fin_cmobile,nf.fin_amount,nf.fin_start_date,nf.fin_end_date,nf.fin_end_date,nf.fin_est,nf.fin_irate,nu.uname", "nar_finance nf INNER JOIN nar_user nu ON nu.uid = nf.fin_deal_person_id", array(),  $where." order by nf.fin_id asc limit ".$_POST['getresult'].",15 "  );
	//echo "<pre>";print_r($all_lend_money); die();
		if (isset($all_lend_money) && is_array($all_lend_money) && count($all_lend_money) > 0) {
			foreach( $all_lend_money as $Key=>$row ) {
				$refinance=lendMoneyViewC($row['fin_id'],$ketObj);
				if (isset($_REQUEST['tilldate']) && $_REQUEST['tilldate']!="") {
					if ($refinance['financeDueMonth']<=0) {
						continue;
					}
				}
			if ($row['fin_end_date']!=""){ $cuscss ='style="background-color:#AEFFAE"';}else{  $cuscss = $refinance['financeDueMonth']>2?'style="background-color:#FF9191"':"";}
				$refinance['dueEmiAmt'] =round($refinance['dueEmiAmt'],2);
				$recsec ="<a href ='index.php?view=finance&file=received_money&edit=".$row['fin_id']."' class ='btn btn-info'>Recieved Money</a>";
				$data.="<tr ".$cuscss."><th scope='row'>".$counter."</th><td>DDLC_".$row['fin_id']."</td><td><a href='index.php?file=lendMoneyView&controller=finance&task=lendMoneyView&esday=".$row['fin_est']."&sdate=".$row['fin_start_date']."&famount=".$row['fin_amount']."&frate=".$row['fin_irate']."&pid=".$row['fin_id']."' class='text-primary' target='_blank'>".$row['fin_cname']."</a></td><td><img src='document/ ".$row['fin_id']."/photo.jpg' width='100px' height='100px'/></td><td>".$row['fin_caddress']."</td><td>".$row['fin_cmobile']."</td><td>".$refinance['monthlyEmi']."</td><td>".$refinance['dueEmiAmt']."</td><td>".$refinance['financeDueMonth']."</td><td>".$row['uname']."</td><td>".$row['fin_end_date']."</td>"; if ($linkadd == 0){$data.="<td><a href='#' class=\"largeWarningBasic btn btn-info\" >Edit</a>".$recsec."<a href='#' class =\"largeWarningBasic btn btn-danger\" >Delete</a></td></tr>";}if ($linkadd == 1){$data.="<td><a href ='index.php?view=finance&file=lend_money&edit=".$row['fin_id']."' class='btn btn-info'>Edit</a>".$recsec."<a href='index.php?controller=delete&delete=".$row['fin_id']."&chk=findelete&view=finance' class='btn btn-danger' onclick='return confirmdelete()'>Delete</a></td></tr>";}if ($linkadd == 2){$data.="<td><a href ='index.php?view=finance&file=lend_money&edit=".$row['fin_id']."' class='btn btn-info'>Edit</a>".$recsec."<a href='index.php?controller=delete&delete=".$row['fin_id']."&chk=findelete&view=finance' class ='btn btn-danger' onclick='return confirmdelete()'>Delete</a></td></tr>";}
$counter++;}echo $data;die();}else{$data ="no";}
}elseif (isset($_POST['chk']) && $_POST['chk'] == "pagination" && isset($_POST['onlink']) && $_POST['onlink']=="Rlist" && isset($_POST['getresult']) && $_POST['getresult']!="") {
	//echo "<pre>";print_r($_POST); die();
	if( isset($_REQUEST['where'] ) && $_REQUEST['where']!="" ) {
	$where =$_REQUEST['where'];
}else {
	$where = "";
}
	if (isset($_SESSION['add_renter'])) {
		$linkadd =$_SESSION['add_renter']>0 ?1:0;
	}else{
		$linkadd =2;
	}
	if (isset($_REQUEST['tilldate']) && $_REQUEST['tilldate']!="") {
	$counter =$_POST['counter'];
	}else {
		$counter =$_POST['getresult']+1;
	}
	$data ="";
	$rent_info = $ketObj->runquery( "SELECT", "np.title,np.pid,nr.rent_id,nr.rent_name,nr.rent_address,nr.rent_mobile,nu.uname,nr.rent_date,nr.rent_amount", "nar_rent nr INNER JOIN nar_property np ON np.pid = nr.rent_property_id INNER JOIN nar_user nu ON nu.uid = nr.rent_deal_person_id", array(), $where." limit ".$_POST['getresult'].",15");
	//echo "<pre>";print_r($rent_info); die();
		if (isset($rent_info) && is_array($rent_info) && count($rent_info) > 0) {
			foreach( $rent_info as $Key=>$row ) {
				$recrent=propertyViewC($row['pid'],$ketObj,$row['rent_id']);
				if (isset($recrent['rentDueMonth']) && $recrent['rentDueMonth']>0) { $rentDueMonth=$recrent['rentDueMonth'];}else{$rentDueMonth=0;}
				if (isset($_REQUEST['tilldate']) && $_REQUEST['tilldate']!="") {
					if ($rentDueMonth<=0) {
						continue;
					}
				}
				$cuscss =$rentDueMonth>2?'style="background-color:#FF9191"':"";
				$dueRent =$rentDueMonth*$row['rent_amount'];
				$tagkey ="<a href='index.php?file=propertyView&controller=rent&task=propertyView&pid=".$row['pid']."&renter_name=".$row['rent_name']."&renter_address=".$row['rent_address']."&renter_mobile=".$row['rent_mobile']."&rent_date=".$row['rent_date']."&ptitle=".$row['title']."&rent_amount=".$row['rent_amount']."&rid=".$row['rent_id']."' target='_blank' class='text-primary'>".$row['title']."</a>";
				$data.="<tr ".$cuscss."><th scope='row'>".$counter."</th><td>".$tagkey."</td><td>".$row['rent_name']."</td><td>".$row['rent_address']."</td><td>".$row['rent_mobile']."</td><td>".$row['rent_amount']."</td><td>".$dueRent."</td><td>".$rentDueMonth."</td><td>".$row['uname']."</td>"; if ($linkadd == 0){$data.="<td><a href='#' class=\"largeWarningBasic btn btn-info\" >Edit</a><a href='#' class =\"largeWarningBasic btn btn-danger\" >Delete</a></td></tr>";}if ($linkadd == 1){$data.="<td><a href ='index.php?view=rent&file=rent&edit=".$row['rent_id']."' class='btn btn-info'>Edit</a><a href='index.php?controller=delete&delete=".$row['rent_id']."&chk=rentdelete&view=rent' class='btn btn-danger' onclick='return confirmdelete()'>Delete</a></td></tr>";}if ($linkadd == 2){$data.="<td><a href ='index.php?view=rent&file=rent&edit=".$row['rent_id']."' class='btn btn-info'>Edit</a><a href='index.php?controller=delete&delete=".$row['rent_id']."&chk=rentdelete&view=rent' class ='btn btn-danger' onclick='return confirmdelete()'>Delete</a></td></tr>";}
$counter++;}echo $data;}else{$data ="no";}
}// EXPANSION PAGINATION
elseif (isset($_POST['chk']) && $_POST['chk'] == "pagination" && isset($_POST['onlink']) && $_POST['onlink']=="expansion" && isset($_POST['getresult']) && $_POST['getresult']!="") {
	//echo "<pre>";print_r($_POST); die();
	if( isset($_REQUEST['where'] ) && $_REQUEST['where']!="" ) {
	$where =$_REQUEST['where'];
}else {
	$where = "";
}
	if (isset($_SESSION['exp_add'])) {
		$linkadd =$_SESSION['exp_add']>0 ?1:0;
	}else{
		$linkadd =2;
	}
	if (isset($_REQUEST['tilldate']) && $_REQUEST['tilldate']!="") {
	$counter =$_POST['counter'];
	}else {
		$counter =$_POST['getresult']+1;
	}
	$data ="";
$all_expansion = $ketObj->runquery( "SELECT", "ne.exp_id,ne.exp_date,ne.exp_amount,ne.otherp,ne.exp_desc,ne.hsta,ne.hstb,nu.uname", "nar_expansion ne LEFT OUTER JOIN nar_user nu ON nu.uid = ne.exp_user_id", array(), $where."limit ".$_POST['getresult'].",15"  );
	//echo "<pre>";print_r($rent_info); die();
		if (isset($all_expansion) && is_array($all_expansion) && count($all_expansion) > 0) {
			foreach( $all_expansion as $Key=>$row ) {
				
				$cuscss ='<div style="max-width:200px;max-height:200px;height:50%;width:80%;min-width:50px;min-height:50px;overflow: auto;">'.$row['exp_desc'].'</div>';
				$dealP =$row['uname']!=""?$row['uname']:$row['otherp'];
				$chkdisa =$row['hsta'] > 0 ? 'checked disabled=\'disabled\'':'';
				$chkdisb =$row['hstb'] > 0 ? 'checked disabled=\'disabled\'':'';
				$onchangea ="onchange=\"submitCheck('".$row['exp_id']."','hn')\"";
				$onchangeb ="onchange=\"submitCheck('".$row['exp_id']."','sn')\"";
				
			$fromEle =	 "<form name='checkboxboot_".$row['exp_id']."' id = 'checkboxboot_".$row['exp_id']."' action='index.php' method='post' class='form-horizontal form-label-left'>
		<div class='checkbox checkbox-success' id='hstfaimg_".$row['exp_id']."'>
        <label>
        <input type='checkbox' ".$chkdisa."  ".$onchangea." name='hsta'id='finhsta_".$row['exp_id']."'>
        </label>
      </div>
	  <div style='display:none' id='spinnerimgfa_".$row['exp_id']."'>
	  	<img src='spinner.gif' width='80px' height='80px;' />
	  </div>
	  </td>
	  <td>
	  <div class='checkbox checkbox-success' id='hstfbimg_".$row['exp_id']."'>
        <label>
           <input type='checkbox'  ".$chkdisb."  name='hstb' id='finhstb_".$row['exp_id']."' ".$onchangeb.">
		 
        </label>
      </div>
	  <div style='display:none' id='spinnerimgfb_".$row['exp_id']."'>
	  	<img src='spinner.gif' width='80px' height='80px;'/>
	  </div>
	  </form>"; 
	 /* echo $fromEle;
	  echo "<hr/>";
	  die();*/
				$data.="<tr ".$cuscss."><th scope='row'>".$counter."</th><td>".$row['exp_date']."</td><td>".$cuscss."</td><td>".$row['exp_amount']."</td><td>".$dealP."</td><td>".$fromEle."</td>"; if ($linkadd == 0){$data.="<td><a href='#' class=\"largeWarningBasic btn btn-info\" >Edit</a><a href='#' class =\"largeWarningBasic btn btn-danger\" >Delete</a></td></tr>";}if ($linkadd == 1){$data.="<td><a href ='index.php?view=expansion&file=add&edit=".$row['exp_id']."' class='btn btn-info'>Edit</a><a href='index.php?controller=delete&delete=".$row['exp_id']."&chk=expdelete&view=expansion' class='btn btn-danger' onclick='return confirmdelete()'>Delete</a></td></tr>";}if ($linkadd == 2){$data.="<td><a href ='index.php?view=expansion&file=add&edit=".$row['exp_id']."' class='btn btn-info'>Edit</a><a href='index.php?controller=delete&delete=".$row['exp_id']."&chk=expdelete&view=expansion' class ='btn btn-danger' onclick='return confirmdelete()'>Delete</a></td></tr>";}
$counter++;}echo $data;}else{$data ="no";}
}//Recieved Money Pagination
elseif (isset($_POST['chk']) && $_POST['chk'] == "pagination" && isset($_POST['onlink']) && $_POST['onlink']=="Remi" && isset($_POST['getresult']) && $_POST['getresult']!="") {
	//echo "<pre>";print_r($_POST); die();
	if( isset($_REQUEST['where'] ) && $_REQUEST['where']!="" ) {
	$where =$_REQUEST['where'];
}else {
	$where = "";
}
	if (isset($_SESSION['lend_money'])) {
		$linkadd =$_SESSION['lend_money']>0 ?1:0;
	}else{
		$linkadd =2;
	}
	if (isset($_REQUEST['tilldate']) && $_REQUEST['tilldate']!="") {
	$counter =$_POST['counter'];
	}else {
		$counter =$_POST['getresult']+1;
	}
	$data ="";
$all_lend_money = $ketObj->runquery( "SELECT", "nf.fin_id,nf.fin_cname,nf.fin_caddress,nf.fin_cmobile,nfr.	fin_rec_amount,nfr.fin_rec_id,nfr.hsta,nfr.hstb,nfr.rema,nfr.fin_rec_date,nfr.fin_del_mob,nu.uname,nu.uid", "nar_fin_rec nfr INNER JOIN nar_finance nf ON nfr.fin_rec_cus_id = nf.fin_id INNER JOIN nar_user nu ON nu.uid = nf.fin_deal_person_id", array(), $where."limit ".$_POST['getresult'].",15");
	//echo "<pre>";print_r($rent_info); die();
		if (isset($all_lend_money) && is_array($all_lend_money) && count($all_lend_money) > 0) {
			foreach( $all_lend_money as $Key=>$row ) {
				$row['fin_rec_date'] =date("d/m/Y",strtotime("".$row['fin_rec_date'].""));
				$chkdisa =$row['hsta'] > 0 ? 'checked disabled=\'disabled\'':'';
				$chkdisb =$row['hstb'] > 0 ? 'checked disabled=\'disabled\'':'';
				$onchangea ="onchange=\"submitCheck('".$row['fin_rec_id']."','hn','fin')\"";
				$onchangeb ="onchange=\"submitCheck('".$row['fin_rec_id']."','sn','fin')\"";
				
			$fromEle =	 "<form name='checkboxboot_".$row['fin_rec_id']."' id = 'checkboxboot_".$row['fin_rec_id']."' action='index.php' method='post' class='form-horizontal form-label-left'>
		<div class='checkbox checkbox-success' id='hstfaimg_".$row['fin_rec_id']."'>
        <label>
        <input type='checkbox' ".$chkdisa."  ".$onchangea." name='hsta' id='finhsta_".$row['fin_rec_id']."'>
        </label>
      </div>
	  <div style='display:none;' id='spinnerimgfa_".$row['fin_rec_id']."'>
	  	<img src='spinner.gif' width='50px' height='50px;' />
	  </div>
	  </td>
	  <td>
	  <div class='checkbox checkbox-success' id='hstfbimg_".$row['fin_rec_id']."'>
        <label>
           <input type='checkbox'  ".$chkdisb."  name='hstb' id='finhstb_".$row['fin_rec_id']."' ".$onchangeb.">
		 
        </label>
      </div>
	  <div style='display:none;' id='spinnerimgfb_".$row['fin_rec_id']."'>
	  	<img src='spinner.gif' width='50px' height='50px;'/>
	  </div>
	  </form>"; 
	 /* echo $fromEle;
	  echo "<hr/>";
	  die();*/
	  $editsubstr ="view=finance&file=received_money&edit=".$row['fin_id']."&uid=".$row['uid']."&fin_rec_date".$row['fin_rec_date']."&fin_rec_amount=".$row['fin_rec_amount']."&fin_rec_id=".$row['fin_rec_id']."&findm=".$row['fin_del_mob']."&rema=".$row['rema']."";
	  
				$data.="<tr><th scope='row'>".$counter."</th><td>".$row['fin_cname']."</td><td>".$row['fin_cmobile']."</td><td>".$row['fin_caddress']."</td><td>".$row['fin_rec_amount']."</td><td>".$row['rema']."</td><td>".$row['uname']."</td><td>".$row['fin_rec_date']."</td><td>".$fromEle."</td>"; if ($linkadd == 0){$data.="<td><a href='#' class=\"largeWarningBasic btn btn-info\" >Edit</a><a href='#' class =\"largeWarningBasic btn btn-danger\" >Delete</a></td></tr>";}if ($linkadd == 1){$data.="<td><a href ='index.php?".$editsubstr."' class='btn btn-info'>Edit</a><a href='index.php?controller=delete&delete=".$row['fin_rec_id']."&chk=finrecdelete&&view=finance&file=received_tmpl' class='btn btn-danger' onclick='return confirmdelete()'>Delete</a></td></tr>";}if ($linkadd == 2){$data.="<td><a href ='index.php?".$editsubstr."' class='btn btn-info'>Edit</a><a href='index.php?controller=delete&delete=".$row['fin_rec_id']."&chk=finrecdelete&&view=finance&file=received_tmpl' class ='btn btn-danger' onclick='return confirmdelete()'>Delete</a></td></tr>";}
$counter++;}echo $data;}else{$data ="no";}
}// Receive Rent Pagination
elseif (isset($_POST['chk']) && $_POST['chk'] == "pagination" && isset($_POST['onlink']) && $_POST['onlink']=="Rentrec" && isset($_POST['getresult']) && $_POST['getresult']!="") {
	//echo "<pre>";print_r($_POST); die();
	if( isset($_REQUEST['where'] ) && $_REQUEST['where']!="" ) {
	$where =$_REQUEST['where'];
}else {
	$where = "";
}
	if (isset($_SESSION['rent_add'])) {
		$linkadd =$_SESSION['rent_add']>0 ?1:0;
	}else{
		$linkadd =2;
	}
	if (isset($_REQUEST['tilldate']) && $_REQUEST['tilldate']!="") {
	$counter =$_POST['counter'];
	}else {
		$counter =$_POST['getresult']+1;
	}
	$data ="";
$rent_info = $ketObj->runquery( "SELECT", "np.title,nr.rec_id,nr.rec_rent,nr.rec_date,nr.rentd,nu.uname,nar.rent_name,nr.hsta,nr.hstb","nar_recrent nr INNER JOIN nar_property np ON np.pid = nr.rec_property_id INNER JOIN nar_user nu ON nu.uid = nr.	rec_person_id INNER JOIN nar_rent nar ON nar.rent_id = nr.rec_renter_id", array(), $where."limit ".$_POST['getresult'].",15" );
	//echo "<pre>";print_r($rent_info); die();
		if (isset($rent_info) && is_array($rent_info) && count($rent_info) > 0) {
			foreach( $rent_info as $Key=>$row ) {
				$row['rec_date'] = date("d/m/Y",strtotime("".$row['rec_date'].""));
				
				$chkdisa =$row['hsta'] > 0 ? 'checked disabled=\'disabled\'':'';
				$chkdisb =$row['hstb'] > 0 ? 'checked disabled=\'disabled\'':'';
				$onchangea ="onchange=\"submitCheck('".$row['rec_id']."','hn','rent')\"";
				$onchangeb ="onchange=\"submitCheck('".$row['rec_id']."','sn','rent')\"";
				
			$fromEle =  "<form name='checkboxbootr_".$row['rec_id']."' id = 'checkboxbootr_".$row['rec_id']."' action='index.php' method='post' class='form-horizontal form-label-left'>
			<div class='checkbox checkbox-success' id='hstraimg_".$row['rec_id']."'>
        <label>
        <input type='checkbox' ".$chkdisa."  ".$onchangea." name='hsta' id='renthsta_".$row['rec_id']."'>
        </label>
      </div>
	  <div style='display:none;' id='spinnerimgra_".$row['rec_id']."'>
	  	<img src='spinner.gif' width='80px' height='80px;' />
	  </div>
	  </td>
	  <td>
	  <div class='checkbox checkbox-success' id='hstrbimg_".$row['rec_id']."'>
        <label>
           <input type='checkbox'  ".$chkdisb."  name='hstb' id='renthstb_".$row['rec_id']."' ".$onchangeb.">
		 
        </label>
      </div>
	  <div style='display:none;' id='spinnerimgrb_".$row['rec_id']."'>
	  	<img src='spinner.gif' width='80px' height='80px;'/>
	  </div>
	   </form>"; 
	 /* echo $fromEle;
	  echo "<hr/>";
	  die();*/
	  
	   
	  $editsubstr ="index.php?view=rent&file=rent_add_rec&edit=".$row['rec_id']."";
	  
				$data.="<tr><th scope='row'>".$counter."</th><td>".$row['title']."</td><td>".$row['rent_name']."</td><td>".$row['rentd']."</td><td>".$row['rec_rent']."</td><td>".$row['rec_date']."</td><td>".$row['uname']."</td><td>".$fromEle."</td>"; if ($linkadd == 0){$data.="<td><a href='#' class=\"largeWarningBasic btn btn-info\" >Edit</a><a href='#' class =\"largeWarningBasic btn btn-danger\" >Delete</a></td></tr>";}if ($linkadd == 1){$data.="<td><a href ='index.php?".$editsubstr."' class='btn btn-info'>Edit</a><a href='index.php?controller=delete&delete=".$row['rec_id']."&chk=rentrecdelete&view=finance&file=received_tmpl' class='btn btn-danger' onclick='return confirmdelete()'>Delete</a></td></tr>";}if ($linkadd == 2){$data.="<td><a href ='index.php?".$editsubstr."' class='btn btn-info'>Edit</a><a href='index.php?controller=delete&delete=".$row['rec_id']."&chk=rentrecdelete&view=rent&file=rent_rec' class ='btn btn-danger' onclick='return confirmdelete()'>Delete</a></td></tr>";}
$counter++;}echo $data;}else{$data ="no";}
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