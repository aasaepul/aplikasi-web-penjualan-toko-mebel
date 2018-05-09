<?php
include "app/conn.php"; 

if ($_POST['act']=="ganti"){

  $pass_lama = $_POST['pass_lama'];
  $pass_baru = md5($_POST['pass_baru']);
  $pass_baru_confirm = md5($_POST['pass_baru_confirm']);
  $username = $_POST['username'];
  $id_akun = $_POST['id_akun'];

  $sql = "select * from akun where username = '$username' and password = '$pass_lama'";
  $qry = mysql_query($sql) or mysql_error();
  $num = mysql_num_rows($qry);

  if ($pass_baru !== $pass_baru_confirm) {

    echo "<script>alert('Password gagal diubah, Password baru dan Konfirmasi Password baru harus sama.'); window.open('?page=profil', '_self');</script>";
      
  } else {

    if ($num == 1) 
            $dataakun = mysql_fetch_array($qry);
            $updatesql = "update akun set password = '$pass_baru' where id_akun ='$id_akun'";
            $updateqry = mysql_query($updatesql);
  
            if ($updateqry) {
              echo "<script>alert('Password berhasil diubah'); window.open('?page=profil', '_self');</script>"; 
            } else {
              echo "<script>alert('Password gagal diubah'); window.open('?page=profil', '_self');</script>"; 
            }
  }
}
?>