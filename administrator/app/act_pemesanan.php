<?php
session_start();
include "../administrator/app/conn.php";

$nama = $_POST['kd_barang'];
$query= mysql_query('select * from barang where kd_barang="'.$nama.'"');
while($data=mysql_fetch_array($query)){
	echo '<input type="text" name="nm_barang" class="form-control" value="'.$data['nama'].'" readonly="readonly">';
}
?>