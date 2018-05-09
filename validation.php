<?php
include "administrator/app/conn.php";

$sql = mysql_query("select * from registrasi where username = '$_POST[username]';");
$cocok = mysql_num_rows($sql);

echo $cocok;
?>