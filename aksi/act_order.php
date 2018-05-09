<?php
session_start();

$session_id = session_id();
include "administrator/app/conn.php";

if (isset($_POST['bayar'])){
	$ct_content = cart_content();
	$jml = count ($ct_content);
	$kd_transaksi = random(6);
    $tgl_expired=trim(strip_tags($_POST['tgl_expired']));
	$id_registrasi = $_SESSION['id_registrasi'];
	
	$qregistrasi = mysql_query("SELECT * FROM registrasi WHERE id_registrasi='$_SESSION[id_registrasi]'");
	$dregistrasi = mysql_num_rows($qregistrasi);
	$rregistrasi = mysql_fetch_assoc($qregistrasi);

	$qongkir = mysql_query("SELECT ongkos_kirim,session_id,id_registrasi FROM keranjang WHERE session_id = '$session_id' AND keranjang.id_registrasi='$_SESSION[id_registrasi]'");
	$dongkir = mysql_num_rows($qongkir);
	$rongkir = mysql_fetch_assoc($qongkir);

	$qqty = mysql_query("SELECT qty FROM trans_penjualan WHERE kd_barang = '{$ct_content[$i] ['kd_barang']}'");
	$rqty = mysql_fetch_assoc($qqty);

    $qperingatan = mysql_query("SELECT * FROM trans_penjualan WHERE trans_penjualan.tanggapan='menunggu' AND trans_penjualan.status_trans='pesan' AND trans_penjualan.id_registrasi='$id_registrasi'");
    $dperingatan = mysql_num_rows($qperingatan);

    if ($dperingatan > 0) {

        echo '<script>window.alert("Maaf Pemesanan tidak bisa dilanjutkan, Anda masih memiliki pemesanan yang belum terselesaikan. Cek Status Pemesanan Anda, segera lakukan konfirmasi pembayaran.");</script>';
        echo '<script>window.location.href="?p=page&m=konfirmasi";</script>';

    } else {

	if ($dregistrasi === 0) {	
		if ($rqty['qty'] <= 1 ) {
		for($i=0; $i<$jml; $i++){

			mysql_query("INSERT INTO trans_penjualan (qty,bayar,tgl_trans,tgl_expired,kd_transaksi,kd_barang,id_registrasi,ongkos_kirim,aksi_kirim,tampil_trans_penjualan,alamat_kirim) VALUES ('{$ct_content[$i] ['qty']}','{$ct_content[$i] ['bayar']}',now(),'$tgl_expired','$kd_transaksi','{$ct_content[$i]['kd_barang']}','$id_registrasi','{$ct_content[$i] ['ongkos_kirim']}','belum','tidak','{$ct_content[$i] ['alamat_kirim']}')") or die(mysql_error());
			mysql_query("DELETE FROM keranjang WHERE kd_keranjang = '{$ct_content[$i] ['kd_keranjang']}'") or die(mysql_error());
			mysql_query("UPDATE barang SET jumlah = jumlah - '{$ct_content[$i] ['qty']}' WHERE kd_barang = '{$ct_content[$i]['kd_barang']}'") or die(mysql_error());
			
			}
		} 
		else {
			for($i=0; $i<$jml; $i++){

			mysql_query("INSERT INTO trans_penjualan (qty,bayar,tgl_trans,tgl_expired,kd_transaksi,kd_barang,id_registrasi,ongkos_kirim,aksi_kirim,tampil_trans_penjualan,alamat_kirim) VALUES ('{$ct_content[$i] ['qty']}','{$ct_content[$i] ['bayar']}',now(),'$tgl_expired','$kd_transaksi','{$ct_content[$i]['kd_barang']}','$id_registrasi','{$ct_content[$i] ['ongkos_kirim']}','belum','tidak','{$ct_content[$i] ['alamat_kirim']}')") or die(mysql_error());
			mysql_query("DELETE FROM keranjang WHERE kd_keranjang = '{$ct_content[$i] ['kd_keranjang']}'") or die(mysql_error());
			mysql_query("UPDATE barang SET jumlah = jumlah - '{$ct_content[$i] ['qty']}' WHERE kd_barang = '{$ct_content[$i]['kd_barang']}'") or die(mysql_error());			
			mysql_query("UPDATE trans_penjualan SET ongkos_kirim = '$_POST[ongkir]' WHERE kd_barang = '{$ct_content[$i]['kd_barang']}'") or die(mysql_error());
		    }
		}
	} elseif ($dregistrasi === 1) {
		if ($rqty['qty'] <= 1 ) {
		for($i=0; $i<$jml; $i++){

			mysql_query("INSERT INTO trans_penjualan (qty,bayar,tgl_trans,tgl_expired,kd_transaksi,kd_barang,id_registrasi,ongkos_kirim,aksi_kirim,tampil_trans_penjualan,alamat_kirim) VALUES ('{$ct_content[$i] ['qty']}','{$ct_content[$i] ['bayar']}',now(),'$tgl_expired','$kd_transaksi','{$ct_content[$i]['kd_barang']}','$id_registrasi','{$ct_content[$i] ['ongkos_kirim']}','belum','tidak','{$ct_content[$i] ['alamat_kirim']}')") or die(mysql_error());
			mysql_query("DELETE FROM keranjang WHERE kd_keranjang = '{$ct_content[$i] ['kd_keranjang']}'") or die(mysql_error());
			mysql_query("UPDATE barang SET jumlah = jumlah - '{$ct_content[$i] ['qty']}' WHERE kd_barang = '{$ct_content[$i]['kd_barang']}'") or die(mysql_error());
			}
		} else {
			for($i=0; $i<$jml; $i++){

			mysql_query("INSERT INTO trans_penjualan (qty,bayar,tgl_trans,tgl_expired,kd_transaksi,kd_barang,id_registrasi,ongkos_kirim,aksi_kirim,tampil_trans_penjualan) VALUES ('{$ct_content[$i] ['qty']}','{$ct_content[$i] ['bayar']}',now(),'$tgl_expired','$kd_transaksi','{$ct_content[$i]['kd_barang']}','$id_registrasi','{$ct_content[$i] ['ongkos_kirim']}','belum','tidak','{$ct_content[$i] ['alamat_kirim']}')") or die(mysql_error());
			mysql_query("DELETE FROM keranjang WHERE kd_keranjang = '{$ct_content[$i] ['kd_keranjang']}'") or die(mysql_error());
			mysql_query("UPDATE barang SET jumlah = jumlah - '{$ct_content[$i] ['qty']}' WHERE kd_barang = '{$ct_content[$i]['kd_barang']}'") or die(mysql_error());
			mysql_query("UPDATE trans_penjualan SET ongkos_kirim = '$_POST[ongkir]' WHERE kd_barang = '{$ct_content[$i]['kd_barang']}'") or die(mysql_error());
			}		
		}
		mysql_query("UPDATE registrasi SET nama_depan='$rregistrasi[nama_depan]', nama_belakang='$rregistrasi[nama_belakang]', email='$rregistrasi[email]', no_telp='$rregistrasi[no_telp]', alamat='$rregistrasi[alamat]', hak_akses='$rregistrasi[hak_akses]' WHERE id_registrasi='$rregistrasi[id_registrasi]'");
	}  

    else {
		echo "<script> alert('Data gagal tersimpan'); </script>";
	}

    }

    $email = $rregistrasi['email'];

    $query = mysql_query("SELECT *
FROM trans_penjualan,
  registrasi
WHERE registrasi.email = '$email'
    AND trans_penjualan.kd_transaksi='$kd_transaksi' AND registrasi.id_registrasi='$id_registrasi'")or die("Gagal Members"); 
    
    if (mysql_num_rows($query)==1) {
        $message="Anda telah melakukan pemesanan barang dengan Kode Transaksi : ".$kd_transaksi.". Jika Anda telah melakukan Transfer Uang, Anda dapat melakukan Konfirmasi Pembayaran dengan meng-klik Link tersebut :  http://jualbajumurahonline.com/konfirmasi.php?id=$kd_transaksi";
        mail($email, "Putra Pandansari Your Order", $message);
    } else{
        echo '<script>alert("Maaf data tidak ditemukan. Ulangi, Masukkan Email Anda yang terdaftar");</script>';

    }
	
	$total = mysql_query("SELECT trans_penjualan.*,barang.*, SUM((trans_penjualan.bayar * trans_penjualan.qty) + (trans_penjualan.ongkos_kirim * barang.berat_barang) * trans_penjualan.qty) AS total FROM barang,trans_penjualan WHERE trans_penjualan.kd_barang=barang.kd_barang AND trans_penjualan.kd_transaksi = '$kd_transaksi'");
	$rtotal = mysql_fetch_assoc($total);


	echo '<div class="section group">';
    echo '<div class="cont-desc span_1_of_2">';
    echo '<ul class="back-links">';
    echo '<li><a href="#">Home</a> ::</li>';
    echo '<li>Info pemesanan</li>';
    echo '<div class="clear"> </div>';
    echo '</ul>';
    
    echo '<div class="product_desc">';
    echo '<div id="horizontalTab">';
    echo '<ul class="resp-tabs-list">';
    echo '<li><i class="fa fa-info"></i> Info Pemesanan Barang </li>';
    echo '<div class="clear"></div>';
    echo '</ul>';

    echo '<div class="resp-tabs-container">';
    echo '<div class="product-specifications">';
    echo '<div class="alert alert-success"> <center><i class="fa fa-check"></i>Selamat Pesanan Anda Berhasil Terkirim !</center></div>';
    echo '<table class="table table-responsive">';  
    echo '<tr>';
    echo '<td colspan="6" style="text-align:center;background-color:#B81D22;color:#fff;font-weight:bold;font-size:18px;"> Kode Transaksi </th>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="5">&nbsp;</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="6" style="color:green;font-size:35px;font-family:times new roman;text-align:center;font-weight:bold;border:1px solid #ddd;"> '.$kd_transaksi.' </td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="5">&nbsp;</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="4"></td>';
    echo '<td style="color:red;font-family:times;font-size:18px;font-weight:bold;"> PENTING ! </td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="4"></td>';
    echo '<td style="font-family:times;font-size:18px;color:#000;"> 
            <ul>
                <li>Simpan atau salin <b> Kode Transaksi </b> di atas guna untuk melakukan konfirmasi.</li>
                <li>Silahkan melakukan transfer uang secara offline (via ATM) untuk melakukan pembayaran sesuai jumlah yang tertera di bawah.</li>
                <li>Gunakan No Rekening tujuan sesuai dengan yang ada di halaman Website</li>
                <li>Foto struct bukti transfer</i>
                <li>Setelah melakukan transfer jangan lupa lakukan konfirmasi </li>
                <li>Pesanan akan diproses setelah melakukan konfirmasi. Sebagai catatan jika tidak melakukan konfirmasi selama >= 3 Hari pesanan dinyatakan BATAL dan pihak pembeli dinyatakan setuju untuk membatalkan pemesanan barang.</li>
			</ul>
		  </td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="5"><center><img src="asset/images/pengiriman.png"></center></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="5">&nbsp;</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td colspan=5">&nbsp;</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td colspan="4"></td>';
    echo '<td style="font-family:times;font-size:18px;font-weight:bold;"> Jumlah yang harus di transfer : <br><br> Rp. '.rupiah($rtotal['total']).'</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="5">&nbsp;</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td colspan=5">&nbsp;</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td colspan="4"></td>';
    echo '<td style="font-family:times;font-size:15px;"> Silahkan melakukan transfer melalui bank yang anda pilih. </td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan=5">&nbsp;</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan=5">Pengiriman melalui : </td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="5"><img src="asset/LOGO-JNE.jpg" width="100" height="80"></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan=5">&nbsp;</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="5"><a href="cet-bukti-pemesanan.php" class="btn btn-primary btn-block" target="_blank" style="float:right;"> <i class="fa fa-print"></i> Cetak Bukti Pemesanan </a></td>';
    echo '</tr>';

    echo '</table>';
                          
    echo '<div class="clear"></div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

	} else {
	echo '<script>window.alert("Kode Yang Anda Masukan Salah");</script>';
	echo '<script>window.location.href="?p=page&m=det_cart";</script>';	
}
?>