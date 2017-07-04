<?php ## User
if (isset( $_REQUEST['chk'] ) && $_REQUEST['chk'] == 'userdelete') {
	  	if (isset( $_REQUEST['delete'] ) && $_REQUEST['delete'] > 0) {
		    $where = " where uid = ".$_REQUEST['delete']."";
		    $deleteUser = $ketObj->runquery( "DELETE", "", "nar_user",array(),$where);
			$qstring ="";
			if (isset($_REQUEST['searchbyorder']) && $_REQUEST['searchbyorder']!="") {
				$qstring .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
			}
			if (isset($_REQUEST['vid']) && $_REQUEST['vid']!="") {
				$qstring .= '&vid='.$_REQUEST['vid'].'';
			}	
		    header("Location: index.php?view=".$_REQUEST['view']."".$qstring."");
		}
}## Property
elseif (isset( $_REQUEST['chk'] ) && $_REQUEST['chk'] == 'propertydelete') {
	  	if (isset( $_REQUEST['delete'] ) && $_REQUEST['delete'] > 0) {
		    $where = " where pid = ".$_REQUEST['delete']."";
		    $deleteUser = $ketObj->runquery( "DELETE", "", "nar_property",array(),$where);
			$qstring ="";
		    if (isset($_REQUEST['searchbyorder']) && $_REQUEST['searchbyorder']!="") {
				$qstring .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
			}
			if (isset($_REQUEST['vid']) && $_REQUEST['vid']!="") {
				$qstring .= '&vid='.$_REQUEST['vid'].'';
			}	
		    header("Location: index.php?view=".$_REQUEST['view']."".$qstring."");
		}
}## Renter
elseif (isset( $_REQUEST['chk'] ) && $_REQUEST['chk'] == 'rentdelete') {
  if (isset( $_REQUEST['delete'] ) && $_REQUEST['delete'] > 0) {
		    $where = " where rent_id = ".$_REQUEST['delete']."";
		    $deleteUser = $ketObj->runquery( "DELETE", "", "nar_rent",array(),$where);
			$qstring ="";
			if (isset($_REQUEST['searchbyorder']) && $_REQUEST['searchbyorder']!="") {
				$qstring .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
			}
			if (isset($_REQUEST['vid']) && $_REQUEST['vid']!="") {
				$qstring .= '&vid='.$_REQUEST['vid'].'';
			}	
		    header("Location: index.php?view=rent&file=rent_tmpl".$qstring."");
		} 
}## Finance Delete
elseif (isset( $_REQUEST['chk'] ) && $_REQUEST['chk'] == 'findelete') {
  if (isset( $_REQUEST['delete'] ) && $_REQUEST['delete'] > 0) {
		    $where = " where fin_id = ".$_REQUEST['delete']."";
		    $deleteUser = $ketObj->runquery( "DELETE", "", "nar_finance",array(),$where);
			$qstring ="";
			if (isset($_REQUEST['searchbyorder']) && $_REQUEST['searchbyorder']!="") {
				$qstring .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
			}
			if (isset($_REQUEST['vid']) && $_REQUEST['vid']!="") {
				$qstring .= '&vid='.$_REQUEST['vid'].'';
			}
		    header("Location: index.php?view=finance".$qstring."");
		} 
}## Expansion Delete
elseif (isset( $_REQUEST['chk'] ) && $_REQUEST['chk'] == 'expdelete') {
  if (isset( $_REQUEST['delete'] ) && $_REQUEST['delete'] > 0) {
		    $where = " where exp_id = ".$_REQUEST['delete']."";
		    $deleteUser = $ketObj->runquery( "DELETE", "", "nar_expansion",array(),$where);
			$qstring ="";
			if (isset($_REQUEST['searchbyorder']) && $_REQUEST['searchbyorder']!="") {
				$qstring .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
			}
			if (isset($_REQUEST['vid']) && $_REQUEST['vid']!="") {
				$qstring .= '&vid='.$_REQUEST['vid'].'';
			}
		    header("Location: index.php?view=expansion".$qstring."");
		} 
}