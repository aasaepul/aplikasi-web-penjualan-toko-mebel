<?php
error_reporting(0);
session_start();
$session_id = session_id();

if (isset($_POST['add_cart_khusus'])) {

	$qtotqty = mysql_query("SELECT
  trans_penjualan.*,
  barang.*,
  kategori.*,
  SUM(trans_penjualan.qty) AS total_qty
FROM trans_penjualan,
  barang,
  kategori
WHERE barang.kd_barang = trans_penjualan.kd_barang
    AND trans_penjualan.aksi_kirim = 'belum'
    AND trans_penjualan.status_trans = 'pesan'
    AND trans_penjualan.kd_barang = barang.kd_barang
    AND barang.kd_kategori = kategori.kd_kategori
    AND kategori.nama_kategori = 'Katalog Khusus'");

    $tqtotqty = mysql_fetch_assoc($qtotqty);

	$qkatkhusus = mysql_query("SELECT * FROM trans_penjualan,barang,kategori WHERE barang.kd_barang=trans_penjualan.kd_barang AND trans_penjualan.aksi_kirim = 'belum' AND trans_penjualan.status_trans = 'pesan' AND trans_penjualan.kd_barang=barang.kd_barang AND barang.kd_kategori=kategori.kd_kategori AND kategori.nama_kategori = 'Katalog Khusus'");
	$tkatkhusus = mysql_num_rows($qkatkhusus);
	echo $tkatkhusus;

	if ($tqtotqty['total_qty'] == 5) { 

		echo '<script>window.alert("Maaf pemesanan untuk Barang ini tidak dapat dilanjutkan dikarenakan barang ini harus dalam proses pembuatan, untuk permintaan barang sudah penuh.");</script>';
		echo '<script>window.location.href="?p=home"</script>';

	} elseif ($tkatkhusus == 5) {

		echo '<script>window.alert("Maaf pemesanan untuk Barang ini tidak dapat dilanjutkan dikarenakan barang ini harus dalam proses pembuatan, untuk permintaan barang sudah penuh.");</script>';
		echo '<script>window.location.href="?p=home"</script>';

	} elseif ($num == 0){

		mysql_query("INSERT INTO keranjang(session_id, qty, kd_barang,id_registrasi) VALUES ('$session_id','$_POST[qty]','$_POST[kd_barang]','$_POST[id_registrasi]')");
		echo '<script>window.location.href="?p=home"</script>';
	} else {

		echo '<script>window.location.href="?p=home"</script>';
	}

} elseif (isset($_POST['add_cart'])) {

	$sql = mysql_query("SELECT kd_barang FROM keranjang WHERE kd_barang='$_POST[kd_barang]' AND session_id='$session_id'");
	$num = mysql_num_rows($sql);
	echo $num;

	if ($num == 0){

		mysql_query("INSERT INTO keranjang(session_id, qty, kd_barang,id_registrasi) VALUES ('$session_id','$_POST[qty]','$_POST[kd_barang]','$_POST[id_registrasi]')");
		echo '<script>window.location.href="?p=home"</script>';
	} else {

		echo '<script>window.location.href="?p=home"</script>';
	}
}	
elseif (isset($_GET['action']) == 'delete'){
	mysql_query("DELETE FROM keranjang WHERE kd_keranjang='$_GET[id]'");
	echo '<script>window.location.href="?p=page&m=det_cart"</script>';
}
elseif (isset($_POST['qty'])) {
	$cek = mysql_query("SELECT keranjang.*, barang.* FROM keranjang, barang WHERE keranjang.kd_keranjang = '$_POST[kd_keranjang]' AND barang.kd_barang = keranjang.kd_barang");
	$rcek = mysql_fetch_assoc($cek);
	if ($_POST['qty'] > $rcek['jumlah']) {
		echo '<script>window.alert("Stok barang tidak mencukupi");</script>';
		echo '<script>window.location.href="?p=page&m=det_cart";</script>';
	}
	else {
		mysql_query("UPDATE keranjang SET qty = '$_POST[qty]' WHERE kd_keranjang = '$_POST[kd_keranjang]'");
		echo '<script>window.location.href="?p=page&m=det_cart"</script>';
	}
}
elseif (isset($_POST['ongkir'])) {

	$qalamat = mysql_query("SELECT * FROM provinsi,kota WHERE kota.kd_kota = '$_POST[ongkir]' AND provinsi.kd_provinsi = '$_POST[prop]'");
	$talamat = mysql_fetch_assoc($qalamat);

	$cek_ongkir  = mysql_query("SELECT * FROM ongkir WHERE jns_pengiriman = '$_POST[jns_pengiriman]'");
	$rcek_ongkir = mysql_fetch_assoc($cek_ongkir);

	if ($rcek_ongkir['jns_pengiriman'] == 'reguler'){

		$cek_ongkir_reg  = mysql_query("SELECT * FROM ongkir WHERE kd_kota='$_POST[ongkir]' AND jns_pengiriman='reguler'");
		$rcek_ongkir_reg = mysql_fetch_assoc($cek_ongkir_reg);

		$kd_barang = $_POST['kd_barang'];
		$alamat_kirim = $_POST['alamat_kirim'];

			if ($_POST['ongkir'] == $rcek_ongkir_reg['kd_kota']) {

				if ($alamat_kirim=="") {

					mysql_query("UPDATE keranjang SET ongkos_kirim = '$rcek_ongkir_reg[ongkos_kirim]',alamat_kirim='$_SESSION[alamat]' WHERE session_id = '$session_id' AND id_registrasi = '$_SESSION[id_registrasi]' AND kd_barang='$kd_barang'");
        			echo '<script>window.location.href="?p=page&m=det_cart"</script>';
        		} else {
        			mysql_query("UPDATE keranjang SET ongkos_kirim = '$rcek_ongkir_reg[ongkos_kirim]',alamat_kirim='$alamat_kirim' WHERE session_id = '$session_id' AND id_registrasi = '$_SESSION[id_registrasi]' AND kd_barang='$kd_barang'");
        			echo '<script>window.location.href="?p=page&m=det_cart"</script>';
        		}
    		} else {
    			echo '<script>window.location.href="?p=page&m=det_cart"</script>';
    	}

    } else if ($rcek_ongkir['jns_pengiriman'] == 'yes'){
    	$cek_ongkir_yes  = mysql_query("SELECT * FROM ongkir WHERE kd_kota='$_POST[ongkir]' AND jns_pengiriman='yes'");
		$rcek_ongkir_yes = mysql_fetch_assoc($cek_ongkir_yes);

		if ($_POST['ongkir'] == $rcek_ongkir_yes['kd_kota']) {

			mysql_query("UPDATE keranjang SET ongkos_kirim = '$rcek_ongkir_yes[ongkos_kirim]' WHERE session_id = '$session_id' AND id_registrasi = '$_SESSION[id_registrasi]'");
        	echo '<script>window.location.href="?p=page&m=det_cart"</script>';
    		} else {
    			echo '<script>window.location.href="?p=page&m=det_cart"</script>';
    	}
    } else {
    	echo '<script>alert ("Tidak ada Jenis Pengiriman yang Anda Pilih !"); window.location.href="?p=page&m=det_cart"</script>';
    }

} // END Katalog Khusus

?>
