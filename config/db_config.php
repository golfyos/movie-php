<?php
    define('DB_USER', "root"); 
	define('DB_PASSWORD', ""); 
	define('DB_SERVER', "localhost");
	define('DB_DATABASE', "movie"); 
	
	//$con = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD);
	
	$con = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE);
	mysqli_set_charset($con, "utf8");
	if($con->connect_error){
		die("Connect Failed : ".$con->connect_error);
	}

	
	//echo 'Connected successfully';
?>