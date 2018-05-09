<?php
session_start();
include "admin/config/koneksi.php";
if (isset($_POST['kirim'])) {
		if($_POST['captcha'] == $_SESSION['captcha']){
			$pengirim=trim(strip_tags($_POST['pengirim'])); 
			$email=trim(strip_tags($_POST['email'])); 
			$komentar=trim(strip_tags($_POST['komentar'])); 
			$tgl=date("d-m-Y"); 
			$wkt=date("h:i:s"); 
			$query=mysql_query("INSERT INTO bktamu VALUES ('','$judul','$nama','$email','$pesan',$tgl','$wkt')");
			echo 'Kode yang anda masukkan benar, yaiut <font size="5">'.$_SESSION['captcha'].'</font>';
		
		}
		else{
			echo 'Kode yang anda masukkan salah, seharusnya <font size="5">'.$_SESSION['captcha'].'</font><br />
	      	Bukan <font size="5">'.$_POST['captcha'].'</font>';
		}
?>

<?php 
session_start(); 
include "koneksi.php"; 
if(isset($_POST['kirim'])){ 
if($_POST['ccek'] == $_SESSION['capcay']){ 
$pengirim=trim(strip_tags($_POST['pengirim'])); 
$email=trim(strip_tags($_POST['email'])); 
$komentar=trim(strip_tags($_POST['komentar'])); 
$tgl=date("d-m-Y"); 
$wkt=date("h:i:s"); 
$input=mysql_query("INSERT INTO bktamu VALUES ('','$judul','$nama','$email','$pesan',$tgl','$wkt')");
echo "input bukutamu berhasil"; 
} else { 
echo "Maaf Kode Chapcha yang anda masukkan Salah"; 
} 
} 
?> 