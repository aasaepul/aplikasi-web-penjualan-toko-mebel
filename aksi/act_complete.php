<?php
	// require connection.php
	require('app/conn.php');

	$q = strtolower($_GET['term']);
	$query = "select * from barang where nama like '%$q%' order by kd_barang asc";
	$query = mysql_query($query);
	$num = mysql_num_rows($query);
   	if($num > 0){
		while ($row = mysql_fetch_array($query)){
			$row_set[] = htmlentities(stripslashes($row[1]));
		}
		echo json_encode($row_set);
	}
?>