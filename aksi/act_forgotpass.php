<?php
include "administrator/app/conn.php";

if(isset($_POST['kirim'])){
	$email=$_POST['email'];	
	$query = mysql_query("select * from registrasi where email='$email'")or die("Gagal Members"); 
	if (mysql_num_rows ($query)==1) {
		$message="You activation link is: http://putrapandansari.com/tk_mebel/web/page/reset_pass.php?email=$email";
		mail($email, "Toko Mebel Putra Pandansari ", $message);
		echo '<script>alert("Email telah terkirim, Tolong Cek Kotak Masuk di Email Anda.");window.location.href="?p=lupa_pass";</script>';
	} else{
		echo '<script>alert("Email tidak terdaftar, Ulangi lagi !");window.location.href="?p=page&m=fpass";</script>';

	}
} 

else {

	$acode = $_GET['email'];

	if(isset($_POST['pass1'])==isset($_POST['pass2']) && isset($_POST['simpan'])){
    	$pass1 = $_POST['pass1'];
    	$pass2 = $_POST['pass2'];

	if (mysqli_connect_errno()){
  		echo "Failed to connect to MySQL: " . mysql_connect_error();
  	}


	$query = mysql_query("select * from registrasi where email='$acode'") or die("Gagal Email"); 
	if (mysql_num_rows ($query)==1) {
		$query3 = mysql_query("update registrasi set password='$pass1' where email='$acode'") or die("Gagal Update password"); 
            if($query3){
                echo '<script>alert("Selamat Password Berhasil di Reset.");window.location.assign("?p=page&m=login");</script>';
            }
	} else {
		echo 'Wrong CODE';

		}
	}
}
?>