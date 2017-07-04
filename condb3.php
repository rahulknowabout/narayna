<?php

if( $_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == '192.168.0.103') {

	/*$con	=	mysql_connect("localhost","root","");

	mysql_select_db("mychiraag",$con);*/

	$con	=	mysql_connect("localhost","kalyanet_nary","qTqQM(UGp5Jn");

		mysql_select_db("kalyanet_nary",$con);

}

else {

		mysql_connect("localhost","kalyanet_nary","qTqQM(UGp5Jn");

		mysql_query("SET NAMES utf8");

		mysql_select_db("kalyanet_nary");

}

?>