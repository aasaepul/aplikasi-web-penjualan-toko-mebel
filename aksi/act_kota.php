<?php
session_start();
include "../administrator/app/conn.php";

$prop = $_POST['prop'];
$query= mysql_query('select * from kota where kd_provinsi="'.$prop.'"');
echo "<option> Pilih Kota </option>";
while($data=mysql_fetch_array($query)){
	echo '<option value="'.$data['kd_kota'].'">'.$data['nama_kota'].'</option>';
}
?>