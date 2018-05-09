<?php
include "administrator/app/conn.php";

$id = $_GET['id'];

$qconfirm = mysql_query("SELECT * FROM konfirmasi WHERE kd_transaksi = '$id'");
$tconfirm = mysql_num_rows($qconfirm);

$qkonfirmasi = mysql_query("SELECT *
  FROM  trans_penjualan,registrasi
WHERE trans_penjualan.id_registrasi=registrasi.id_registrasi AND trans_penjualan.kd_transaksi = '$id'");

$tkonfirmasi = mysql_fetch_assoc($qkonfirmasi);

if ($tconfirm === 1) {

	echo '<script>window.alert("Pemesanan telah Anda konfirmasi, Konfirmasi hanya dapat dilakukan 1x saja.");</script>';
	echo '<script>window.location.href="http://putrapandansari.esy.es/selesai.php";</script>';

} else if ($qkonfirmasi > 0) {

	mysql_query("INSERT INTO konfirmasi(kd_konfirmasi,kd_transaksi,id_registrasi,kd_bank,bukti_transfer,tgl_konfirmasi) VALUES ('','$id','$tkonfirmasi[id_registrasi]','1','Y',now())") or die(mysql_error());
	echo '<script>window.alert("Selamat Konfirmasi Berhasil");</script>';
	echo '<script>window.location.href="http://putrapandansari.esy.es/sukses.php";</script>';

} else {
	echo '<script>window.alert("Konfirmasi Gagal di Proses, Coba menggunakan Form Konfirmasi manual!");</script>';
	echo '<script>window.location.href="http://putrapandansari.esy.es/home.php?p=page&m=konfirmasi";</script>';
}

?>