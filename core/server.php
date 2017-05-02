<?php

	include("../../conf/conf.php");

/*
	$DBHOST = '127.0.0.1';
	$DBUSER = 'root';
	$DBPASS = '';
	$DBNAME = 'geresa5';*/

	global $db,$dbmySQL;
	$db = mysqli_connect($dolibarr_main_db_host,$dolibarr_main_db_user,$dolibarr_main_db_pass, $dolibarr_main_db_name);
	
	




?>