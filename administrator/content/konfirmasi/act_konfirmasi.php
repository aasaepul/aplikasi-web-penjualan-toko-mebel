<?php
if (isset($_GET['konfirmasi'])) {
	$qck = mysql_query("SELECT * FROM trans_penjualan WHERE kd_transaksi = '$_GET[konfirmasi]'");
	$tck = mysql_num_rows($qck);

	if ($tck > 0) {
		
		mysql_query("UPDATE trans_penjualan SET tampil_trans_penjualan = 'ya', tanggapan='diterima' WHERE kd_transaksi = '$_GET[konfirmasi]'") or die(mysql_error());
		mysql_query("UPDATE konfirmasi SET tampil_konfirmasi='N' WHERE kd_transaksi='$_GET[konfirmasi]'");
		
		echo '<script>window.alert("Data berhasil dikonfirmasi");</script>';
		echo '<script>window.location.href="home.php?page=konfirmasi";</script>';	
	} else {
		echo '<script>window.alert("Data gagal dikonfirmasi");</script>';
		echo '<script>window.location.href="home.php?page=konfirmasi";</script>';	
	}	
}
?>