<?php
session_start();
include "administrator/app/conn.php";

if (isset($_POST['konfirmasi'])){
    if($_POST['captcha'] == $_SESSION['captcha']){
        $kd_transaksi	=trim(strip_tags($_POST['kd_transaksi'])); 
        $kd_bank		=trim(strip_tags($_POST['kd_bank']));
        $bukti          = $_FILES['bukti']['name'];
        $ekstensi_file  = $_FILES["bukti"]["type"];

        $qconfirm = mysql_query("SELECT * FROM konfirmasi WHERE kd_transaksi = '$kd_transaksi'");
        $tconfirm = mysql_num_rows($qconfirm);

        if ($_POST['id_registrasi']=="") {

        	echo "<script>alert('isikan data dengan lengkap!'); </script>";
        	echo '<script>window.location.href="?p=page&m=konfirmasi";</script>';

        } else if ($tconfirm === 1) {

        	echo '<script>window.alert("Pemesanan telah Anda konfirmasi, Konfirmasi hanya dapat dilakukan 1x saja.");</script>';
			echo '<script>window.location.href="?p=page&m=konfirmasi";</script>';

    	} else {
        	if(strlen($bukti)>0){
        		if($ekstensi_file == "image/png" or $ekstensi_file == "image/jpg" or $ekstensi_file == "image/jpeg"){
					// Proses upload gambar
            		if(is_uploaded_file($_FILES['bukti']['tmp_name'])){
                		move_uploaded_file($_FILES['bukti']['tmp_name'],"administrator/foto/bukti-transfer/".$bukti);
                	} 

				$qcek = mysql_query("SELECT trans_penjualan.*, registrasi.*, bank.*,barang.*, SUM((trans_penjualan.bayar * trans_penjualan.qty) + ((trans_penjualan.ongkos_kirim * barang.berat_barang ) * trans_penjualan.qty)) AS tot_bayar FROM trans_penjualan, registrasi, bank, barang WHERE trans_penjualan.kd_transaksi = '$_POST[kd_transaksi]' AND trans_penjualan.kd_barang = barang.kd_barang AND trans_penjualan.id_registrasi =registrasi.id_registrasi AND bank.kd_bank = '$_POST[kd_bank]'") or die(mysql_error());
				$ncek = mysql_num_rows($qcek);
				$rcek = mysql_fetch_assoc($qcek);

				if ($ncek == 0) {
					echo '<script>window.alert("Data yang anda masukan salah");</script>';
					echo '<script>window.location.href="?p=page&m=konfirmasi";</script>';	
				}
				elseif ($rcek['tot_bayar'] == $_POST['jml_bayar']) {
						mysql_query("INSERT INTO konfirmasi(kd_konfirmasi,kd_transaksi,id_registrasi,kd_bank,bukti_transfer,tgl_konfirmasi) VALUES('','$rcek[kd_transaksi]','$rcek[id_registrasi]','$rcek[kd_bank]','$bukti',now())");
						echo '<script>window.alert("Selamat Konfirmasi Berhasil");</script>';
						echo '<script>window.location.href="?p=page&m=konfirmasi";</script>';
				} elseif ($rcek['tot_bayar'] != $_POST['jml_bayar']) {
						echo '<script>window.alert("Konfirmasi Gagal, Jumlah transfer tidak sesuai, atau ada form yang belum terisi !");javascript:history.go(-1);</script>';
				} else {
					echo '<script>window.alert("Konfirmasi Gagal di Proses");</script>';
					echo '<script>window.location.href="?p=page&m=konfirmasi";</script>';
				}
			}
			else{
					echo '<script>window.alert("File yang di Unggah tidak valid, type Gambar harus .jpg .png dan .jpeg . Coba ulangi!");javascript:history.go(-1);</script>';
					} 
		  }
		}
				
	} else {
		echo '<script>window.alert("Kode Captcha tidak sesuai, Coba ulangi lagi !");javascript:history.go(-1);</script>';
	}
}
?>