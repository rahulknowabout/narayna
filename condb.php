<?php if( $_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == '192.168.0.100') {
	$con	=	mysql_connect("localhost","root","");
	mysql_select_db("narayna_finance",$con);
}
else {
		mysql_connect("localhost","neelneco_tech","Na82HAHOt~d5");
		mysql_query("SET NAMES utf8");
		mysql_select_db("kalyanet_nary");
}

/*if( $_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == '192.168.0.100') {
	$con	=	mysql_connect("localhost","root","");
	mysql_select_db("narlivetest",$con);
}
else {
		mysql_connect("localhost","neelneco_tech","Na82HAHOt~d5");
		mysql_query("SET NAMES utf8");
		mysql_select_db("kalyanet_nary");
}*/
?>