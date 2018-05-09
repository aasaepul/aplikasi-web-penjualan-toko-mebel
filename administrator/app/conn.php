<?php

$host = "localhost";
$username = "root";
$password = "";
$db= "db_mebel";
	$conn = mysql_connect ($host, $username, $password);
	if ($conn) {
		$buka = mysql_select_db ($db);
			if (!$buka) {
				die ("Database tidak dapat dibuka");
			}
	} else {
		
		die ("Server MySQL tidak terhubung");
	}
?>