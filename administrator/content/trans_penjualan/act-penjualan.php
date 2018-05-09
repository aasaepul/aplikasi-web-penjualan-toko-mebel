<?php
if (isset($_POST['update'])) {
	$qcek = mysql_query("SELECT * FROM trans_penjualan,barang WHERE trans_penjualan.kd_trans_penjualan='$_POST[kd_trans_penjualan]' AND barang.kd_barang=trans_penjualan.kd_barang");
	$rcek = mysql_fetch_assoc($qcek);
	
	if (empty($_POST['kd_barang']) || !isset($_POST['kd_barang'])) {
		echo '<script>window.alert("Nama barang tidak boleh kosong");</script>';
		echo '<script>history.go(-1)</script>';
	}
	elseif ($_POST['kd_barang'] == $rcek['kd_barang']) {
		if ($_POST['qty'] == 0) {
			echo '<script>window.alert("Jumlah beli tidak boleh kosong");</script>';
			echo '<script>history.go(-1)</script>';
			}
		elseif ($rcek['jumlah'] < $_POST['qty']) {
			echo '<script>window.alert("Jumlah barang yang anda masukan terlalu banyak");</script>';
			echo '<script>history.go(-1)</script>';	
		}
		elseif ($rcek['jumlah'] >= $_POST['qty']) {
			if ($_POST['qty'] > $rcek['qty']) {
				$selisih = $_POST['qty'] - $rcek['qty'];
				mysql_query("UPDATE barang SET jumlah = jumlah - '$selisih' WHERE kd_barang = '$_POST[kd_barang]'");
				mysql_query("UPDATE trans_penjualan SET qty = '$_POST[qty]' WHERE kd_trans_penjualan = '$_POST[kd_trans_penjualan]'");
				echo '<script>window.alert("Data berhasil dirubah");</script>';
				echo '<script>window.location.href="home.php?page=trans_penjualan";</script>';	
			}
			elseif ($_POST['qty'] < $rcek['qty']) {
				$selisih = $rcek['qty'] - $_POST['qty'];
				mysql_query("UPDATE barang SET jumlah = jumlah + '$selisih' WHERE kd_barang = '$_POST[kd_barang]'");
				mysql_query("UPDATE trans_penjualan SET qty = '$_POST[qty]' WHERE kd_trans_penjualan = '$_POST[kd_trans_penjualan]'");
				echo '<script>window.alert("Data berhasil dirubah");</script>';
				echo '<script>window.location.href="home.php?page=trans_penjualan";</script>';	
			}
			elseif ($_POST['qty'] == $rcek['qty']) {
				echo '<script>window.alert("Data tidak dirubah");</script>';
				echo '<script>window.location.href="home.php?page=trans_penjualan";</script>';	
			} 	
		}	
	}
	elseif ($_POST['kd_barang'] !== $rcek['kd_barang']) {
		if ($_POST['qty'] == 0) {
			echo '<script>window.alert("Jumlah beli tidak boleh kosong");</script>';
			echo '<script>history.go(-1)</script>';
			}
		elseif ($rcek['jumlah'] < $_POST['qty']) {
			echo '<script>window.alert("Jumlah barang yang anda masukan terlalu banyak");</script>';
			echo '<script>history.go(-1)</script>';	
		}
		else {
			mysql_query("UPDATE barang SET jumlah = jumlah + '$rcek[qty]' WHERE kd_barang = '$rcek[kd_barang]'");
			mysql_query("UPDATE barang SET jumlah = jumlah - '$_POST[qty]' WHERE kd_barang = '$_POST[kd_barang]'");
			mysql_query("UPDATE trans_penjualan SET kd_barang = '$_POST[kd_barang]', qty = '$_POST[qty]' WHERE kd_trans_penjualan = '$_POST[kd_trans_penjualan]'");
			echo '<script>window.alert("Data berhasil dirubah");</script>';
			echo '<script>window.location.href="home.php?page=trans_penjualan";</script>';	
		}	
	}	
}

elseif (isset($_GET['kirim'])) {
	
	mysql_query("UPDATE trans_penjualan SET status_trans='terkirim',aksi_kirim='sudah', tgl_kirim=now() WHERE kd_transaksi='$_GET[kirim]'");
	
	$qpelanggan = mysql_query("SELECT *
  FROM  trans_penjualan,registrasi
WHERE trans_penjualan.id_registrasi=registrasi.id_registrasi AND trans_penjualan.kd_transaksi = '$_GET[kirim]'");
	$tpelanggan = mysql_fetch_assoc($qpelanggan);

	$email = $tpelanggan['email'];
	$id_registrasi = $tpelanggan['id_registrasi'];
	$kd_transaksi = $_GET['kirim'];

	$query = mysql_query("SELECT *
FROM trans_penjualan,
  registrasi
WHERE registrasi.email = '$email'
    AND trans_penjualan.kd_transaksi='$_GET[kirim]' AND registrasi.id_registrasi='$id_registrasi'")or die("Gagal Members"); 
    
    if (mysql_num_rows ($query)==1) {
        $message = "Pemesanan Anda Telah Kami Kirim dengan Kode Transaksi : ".$kd_transaksi.".";
        $headers = "Toko Mebel Putra Pandansari";
        $headers = "Jalan Magelang Km. 23 Tegalsari,Jumoyo,Salam,Magelang";
        $headers = "Admin Toko";
        mail($email, "Putra Pandansari Info", $message,$headers);
    } else{
        echo '<script>alert("Maaf data tidak ditemukan. Ulangi, Masukkan Email Anda yang terdaftar");</script>';

    }

	echo '<script>window.alert("Barang berhasil dikirim");</script>';
	echo '<script>window.location.href="home.php?page=trans_penjualan";</script>';	


}

elseif (isset($_GET['delete'])) {
	mysql_query("DELETE FROM trans_penjualan WHERE kd_transaksi='$_GET[delete]'") or die(mysql_error());
	echo '<script>window.alert("Data berhasil dihapus");</script>';
	echo '<script>window.location.href="home.php?page=trans_penjualan";</script>';	
} 
elseif (isset($_GET['mdelete'])) {
	mysql_query("DELETE FROM trans_penjualan WHERE kd_transaksi='$_GET[mdelete]'") or die(mysql_error());
	echo '<script>window.alert("Data berhasil dihapus");</script>';
	echo '<script>window.location.href="home.php?page=trans_penjualan_masuk";</script>';	
} 
?>