<?php
session_start();
$session_id=session_id();
include "administrator/app/conn.php";

if(isset($_POST['login'])){
	$user = mysql_real_escape_string(htmlentities($_POST['username']));
	$pass = mysql_real_escape_string(htmlentities(md5($_POST['password'])));
 
	$sql = mysql_query("SELECT * FROM registrasi WHERE username='$user' AND password='$pass'") or die(mysql_error());
	if(mysql_num_rows($sql) == 0){
			echo '<script language="javascript">alert("Username atau Password tidak ditemukan !, Mungkin anda belum terdaftar."); document.location="?p=page&m=login";</script>';
	}else{
		if ($row = mysql_fetch_assoc($sql)){
			$_SESSION['user']=$user;
			$_SESSION['id_registrasi']=$row['id_registrasi'];
			$_SESSION['pass']=$pass;
			$_SESSION['hak_akses']=$row['hak_akses'];
			$_SESSION['nama_depan']=$row['nama_depan'];
			$_SESSION['nama_belakang']=$row['nama_belakang'];
			$_SESSION['alamat']=$row['alamat'];
			$_SESSION['email']=$row['email'];
			$_SESSION['no_telp']=$row['no_telp'];

			$ukeranjang = mysql_query("UPDATE keranjang SET id_registrasi = '$_SESSION[id_registrasi]' WHERE session_id = '$session_id'");
			$dkeranjang = mysql_num_rows($ukeranjang);

			$qkeranjang = mysql_query("SELECT * FROM keranjang WHERE id_registrasi = '$_SESSION[id_registrasi]' AND session_id = '$session_id'");
			$nkeranjang = mysql_num_rows($qkeranjang);
            if ($nkeranjang !== 0) {
				echo '<script language="javascript">document.location="?p=page&m=det_cart";</script>';
			} else {
				echo '<script language="javascript">document.location="?p=page&m=tab";</script>';
			}
		}else{
			echo '<script language="javascript">alert("Anda gagal login, kemungkinan username dan password salah !"); document.location="?p=akun";</script>';
		}
	}
}
?>



