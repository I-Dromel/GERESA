<?php

	include("../../conf/conf.php");

/*
	$DBHOST = '127.0.0.1';
	$DBUSER = 'root';
	$DBPASS = '';
	$DBNAME = 'geresa5';*/

	
	
	$dbmySQL= mysql_connect($dolibarr_main_db_host,$dolibarr_main_db_user,$dolibarr_main_db_pass);
	mysql_select_db($dolibarr_main_db_name,$dbmySQL);




?>