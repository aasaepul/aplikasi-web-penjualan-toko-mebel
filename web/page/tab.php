<?php
session_start();
	$ct_content = cart_content();
	$m = $_GET['m'];

	if ($_SESSION['hak_akses'] == "user") {

	$qtregistrasi = mysql_query("SELECT * FROM registrasi WHERE id_registrasi='$_SESSION[id_registrasi]'");
    $rtregistrasi = mysql_fetch_assoc($qtregistrasi);


	echo '<div class="section group">';
	echo '<div class="cont-desc span_1_of_2">';
	echo '<ul class="back-links">';
	echo '<li><a href="#">Home</a> ::</li>';
	echo '<li>Info Pelanggan</li>';
	echo '<div class="clear"> </div>';
	echo '</ul>';

	if (@$_GET['p'] == 'page' && $m == 'tab'){

	echo '<div class="product_desc">';	
	echo '<div id="horizontalTab">';
	echo '<ul class="resp-tabs-list">';
	echo '<li><i class="fa fa-user"></i> Profil </li>';
	echo '<li><i class="fa fa-pencil"></i> Status Pemesanan</li>';
	echo '<div class="clear"></div>';
	echo '</ul>';
		
	echo '<div class="resp-tabs-container">';

	if (isset($_POST['u-user'])) {
		echo '<div class="your-review">';
		echo '<form action="?p=act_profil" method="post">';
		echo '<div>';
		echo '<span><label>Nama Depan<span class="red">*</span></label></span>';
		echo '<span><input type="text" name ="nama_depan" value="'.$rtregistrasi['nama_depan'].'"></span>';
		echo '</div>';
		echo '<div><span><label>Nama Belakang<span class="red">*</span></label></span>';
		echo '<span><input type="text" name ="nama_belakang" value="'.$rtregistrasi['nama_belakang'].'"></span>';
		echo '</div>';
		echo '<div>';
		echo '<span><label>Email<span class="red">*</span></label></span>';
		echo '<span><input type="text" name ="email" value="'.$rtregistrasi['email'].'"></span>';
		echo '</div>';
		echo '<div><span><label>No Telepon/Hp<span class="red">*</span></label></span>';
		echo '<span><input type="text" name ="no_telp" value="'.$rtregistrasi['no_telp'].'"></span>';
		echo '</div>';						
		echo '<div>';
		echo '<span><label>Alamat<span class="red">*</span></label></span>';
		echo '<span><textarea name ="alamat"> '.$rtregistrasi['alamat'].' </textarea></span>';
		echo '</div>';
		echo '<div><span><label>Username<span class="red">*</span></label></span>';
		echo '<span><input type="text" name ="username" value="'.$rtregistrasi['username'].'"></span>';
		echo '</div>';
		echo '<div>';
		echo '<span><input type="submit" value="Ubah Data" name="u_user"></span>';
		echo '</div>';
		echo '</form>';

		echo '<span><a href="?p=page&m=tab"> <- Kembali</a></span>';
		echo '</div>';
	} else if (isset($_POST['u-pass'])){
		echo '<div class="your-review">';
		echo '<form action="?p=act_profil" method="post">';
		echo '<div>';
		echo '<span><label>Masukkan Password Lama<span class="red">*</span></label></span>';
		echo '<span><input type="password" class="textbox textbox1" name="pass_lama"></span>';
		echo '</div>';
		echo '<div><span><label>Masukkan Password Baru<span class="red">*</span></label></span>';
		echo '<span><input type="password" class="textbox textbox1" name="pass_baru"></span>';
		echo '</div>';
		echo '<div>';
		echo '<span><label>Ulangi Password Baru<span class="red">*</span></label></span>';
		echo '<span><input type="password" class="textbox textbox1" name="kon_pass_baru"></span>';
		echo '</div>';
		echo '<div>';
		echo '<span><input type="submit" value="Ubah Password" name="u_pass"></span>';
		echo '</div>';
		echo '</form>';

		echo '<span><a href="?p=page&m=tab"> <- Kembali</a></span>';
		echo '</div>';
	}

	else {
	echo '<div class="product-specifications">';
	echo '<ul>';
	echo '<li><span class="specification-heading">Nama Depan </span> <span>' .$rtregistrasi['nama_depan']. '</span><div class="clear"></div></li>';
	echo '<li><span class="specification-heading">Nama Belakang </span> <span>' .$rtregistrasi['nama_belakang']. '</span><div class="clear"></div></li>';
	echo '<li><span class="specification-heading">Email </span> <span>' .$rtregistrasi['email']. '</span><div class="clear"></div></li>';
	echo '<li><span class="specification-heading">No Telepon/Hp </span> <span>' .$rtregistrasi['no_telp']. '</span><div class="clear"></div></li>';
	echo '<li><span class="specification-heading">Username </span> <span>' .$rtregistrasi['username']. '</span><div class="clear"></div></li>';
	echo '<li><span class="specification-heading">Alamat </span> <span>' .$rtregistrasi['alamat']. '</span><div class="clear"></div></li>';
	echo '<li><span class="specification-heading"></span> <span>
	<form action="?p=page&m=tab" method="post">
	<button class="mybutton-fpass" name="u-user"><i class="fa fa-edit"></i> Ubah Data</button>
	<button class="mybutton" name="u-pass"><i class="fa fa-key"></i> Ubah Password</button>
	</form>
	</span><div class="clear"></div></li>';
	echo '</ul>';
	echo '</div>';

	}

	$tot_bayar = mysql_query("SELECT trans_penjualan.*,barang.*, SUM((trans_penjualan.bayar * trans_penjualan.qty) + ((trans_penjualan.ongkos_kirim * barang.berat_barang) * trans_penjualan.qty)) AS total_bayar FROM trans_penjualan,barang WHERE trans_penjualan.kd_barang=barang.kd_barang AND trans_penjualan.id_registrasi='$_SESSION[id_registrasi]' AND trans_penjualan.aksi_kirim='belum' AND status_trans='pesan' AND trans_penjualan.tanggapan='diterima' ORDER BY trans_penjualan.kd_transaksi='$qkd_transaksi[kd_transaksi]' DESC");
	$total_bayar = mysql_fetch_assoc($tot_bayar);	

	$tot_ongkir = mysql_query("SELECT trans_penjualan.*,barang.*, SUM((trans_penjualan.ongkos_kirim * barang.berat_barang) * trans_penjualan.qty) AS total_ongkir FROM trans_penjualan,barang WHERE trans_penjualan.kd_barang=barang.kd_barang AND trans_penjualan.id_registrasi='$_SESSION[id_registrasi]' AND trans_penjualan.aksi_kirim='belum' AND trans_penjualan.tanggapan='diterima' AND status_trans='pesan' ORDER BY trans_penjualan.kd_transaksi='$qkd_transaksi[kd_transaksi]' DESC");
	$total_ongkir = mysql_fetch_assoc($tot_ongkir);

	echo '<div class="category-tab shop-details-tab">';
	echo '<div class="col-sm-12">';
	echo '<ul class="nav nav-tabs">';
	echo '<li><a href="#" style="color:#fff;">INFO BARU : </a></li>';

	echo '</ul>';
	echo '</div>';
	echo '<div class="tab-content">';
	echo '<div class="tab-pane fade active in" id="details">';

	echo '<div class="col-sm-12">';
	echo '<div class="product-image-wrapper">';
	echo '<div class="single-products">';
	echo '<div class="text-center">';

	$qstatus = mysql_query("SELECT DISTINCT trans_penjualan.aksi_kirim,trans_penjualan.tanggapan,trans_penjualan.kd_transaksi,trans_penjualan.id_registrasi,barang.kd_barang FROM trans_penjualan,barang WHERE trans_penjualan.kd_barang=barang.kd_barang AND trans_penjualan.id_registrasi='$_SESSION[id_registrasi]' AND trans_penjualan.aksi_kirim='belum' AND status_trans='pesan' AND trans_penjualan.tanggapan='menunggu' ORDER BY trans_penjualan.kd_transaksi='$qkd_transaksi[kd_transaksi]' DESC");
    $rstatus = mysql_fetch_array($qstatus);
    $dstatus = mysql_num_rows($qstatus);
    	if ($rstatus['tanggapan'] == 'menunggu') {
    		echo '<div class="alert alert-warning"><center> Anda memiliki '.$dstatus.' Pemesanan berstatus Menunggu <br> Segera lakukan Konfirmasi Pembayaran sebelum <b>Jatuh Tempo (<i>Expired</i>)</b></center>';
    		echo '<br><br>';
    		echo '<center><a href="#popup" class="btn btn-primary"> <i class="fa fa-eye"></i> Klik disini untuk melihat Pemesanan Anda  </a>';
    		echo 'atau <a href="?p=page&m=konfirmasi" class="btn btn-primary" style="background:green;"> <i class="fa fa-eye"></i> Klik disini untuk konfirmasi pembayaran  </a></center>';
    		echo '</div>';
    	} else {
    		echo '<div class="alert alert-warning"><center>Tidak ada info baru untuk ditampilkan</center></div>';
    	}

    if ($total_bayar['total_bayar'] > 1) {

    echo '<table class="table table-responsive" border="1">';  
    echo '<form action="?p=act_profil" method="post"';
	echo '<thead style="text-align:left;font-weight:bold;">';
    echo '<tr>';
    echo '<th width="20%" style="background-color:#e44f2b;padding:10px;margin-bottom:5px;color:#fff;font-weight:bold;"> Kode Transaksi </th>';
    echo '<th width="30%" style="background-color:#e44f2b;padding:10px;margin-bottom:5px;color:#fff;font-weight:bold;"> Produk </th>';
	echo '<th width="20%" style="background-color:#e44f2b;padding:10px;margin-bottom:5px;color:#fff;font-weight:bold;"> Nama </th>';
    echo '<th width="18%" style="background-color:#e44f2b;padding:10px;margin-bottom:5px;color:#fff;font-weight:bold;"> Qty </th>';
    echo '<th width="32%" style="background-color:#e44f2b;padding:10px;margin-bottom:5px;color:#fff;font-weight:bold;"> Subtotal </th>';
    echo '</tr>';
	echo '</thead>';

	echo '<tbody style="text-align:left;font-family:times new roman;background-color:#fff;">';

	$qpemesanan = mysql_query("SELECT trans_penjualan.*,barang.*, trans_penjualan.bayar * trans_penjualan.qty AS subtotal FROM trans_penjualan,barang WHERE trans_penjualan.kd_barang=barang.kd_barang AND trans_penjualan.aksi_kirim='belum' AND status_trans='pesan' AND trans_penjualan.tanggapan='diterima' AND trans_penjualan.id_registrasi='$_SESSION[id_registrasi]' ORDER BY trans_penjualan.kd_transaksi='$qkd_transaksi[kd_transaksi]' DESC");
    
    while ($rpemesanan = mysql_fetch_array($qpemesanan)) {

	echo '<tr>';
	echo '<td style="text-align:center;">'.$rpemesanan['kd_transaksi'].'</td>';
	echo '<td style="text-align:center;"><img src="administrator/foto/barang/'.$rpemesanan[foto].'" width="50" height="50" style="margin-top:10px;"></td>';
	echo '<td style="text-align:center;">'.$rpemesanan['nama'].'</td>';
	echo '<td style="text-align:center;">'.$rpemesanan['qty'].'</td>';
	echo '<td style="text-align:left;">Rp. '.rupiah($rpemesanan['subtotal']).'</td>';
	echo '</tr>';
	}

	echo '<tr>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td><hr></td>';
	echo '<td><hr></td>';
	echo '</tr>';



	echo '<tr>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td>Ongkos Kirim</td>';
	echo '<td>Rp. '.rupiah($total_ongkir['total_ongkir']).'</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '</tr>';	

	echo '<tr>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td><b>Total Bayar</b></td>';
	echo '<td><b>Rp. '.rupiah($total_bayar['total_bayar']).'</b></td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '</tr>';	

	
	echo '<tr>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td><b>Status Pemesanan</b></td>';
	if ($total_bayar['tanggapan'] == 'menunggu') {
		echo '<td style="color:red;"><b><i class="fa fa-minus"></i> '.$total_bayar['tanggapan'].'</b></td>';
	} elseif ($total_bayar['tanggapan'] == 'diterima') {
		echo '<td style="color:green;"><b><i class="fa fa-check"></i> '.$total_bayar['tanggapan'].'</b></td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '</tr>';

	echo '<tr>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td colspan="3"><div class="alert alert-success"><i class="fa fa-info"></i> Pesanan sudah diterima, barang akan segera dikirim. Jika info status pemesanan ini tidak tampil, itu tandanya barang anda sedang dalam pengiriman Kurir.</div></td>';
	echo '</tr>';

	//echo '<tr>';
	//echo '<td></td>';
	//echo '<td></td>';
	//echo '<td></td>';
	//echo '<td colspan="2"><a href="cet-bukti-pemesanan.php" class="btn btn-primary btn-block" target="_blank"> <i class="fa fa-print"></i> Cetak Bukti Transaksi </a></td>';
	//echo '</tr>';
	}

	} else {
		echo '<div class="alert alert-warning"> 
		<h1><i class="fa fa-shopping-cart"></i> Belum ada data pemesanan untuk ditampilkan</h1>
		</div>';
	}

	echo '</tbody>';
    echo '</form>';
    echo '</table>';

	echo '<div class="popup-wrapper" id="popup">';
	echo '<div class="popup-container">';
	echo '<form action="#" class="popup-form">';
	echo '<h3 style="background-color:#e44f2b;"><i class="fa fa-pencil"></i> Info Pemesanan Anda</h3>';
	echo '<p><br/>';
	echo '<strong></strong></p>';
	echo '<div class="input-group">';
	echo '<table class="table table-responsive" border="1">';  
    echo '<form action="?p=act_profil" method="post"';
	echo '<thead style="text-align:left;font-weight:bold;">';
    echo '<tr>';
    echo '<th width="25%" style="background-color:#B36C23;margin:3px 3px;padding:5px 5px;"> Kode Transaksi </th>';
    echo '<th width="20%" style="background-color:#B36C23;margin:3px 3px;padding:5px 5px;"> Produk </th>';
	echo '<th width="20%" style="background-color:#B36C23;margin:3px 3px;padding:5px 5px;"> Nama </th>';
    echo '<th width="18%" style="background-color:#B36C23;margin:3px 3px;padding:5px 5px;"> Qty </t>';
    echo '<th width="35%" style="background-color:#B36C23;margin:3px 3px;padding:5px 5px;"> Subtotal </th>';
    echo '</tr>';
	echo '</thead>';

	echo '<tbody style="text-align:left;font-family:times new roman;">';
	$tot_bayar = mysql_query("SELECT trans_penjualan.*,barang.*, SUM((trans_penjualan.bayar * trans_penjualan.qty) + ((trans_penjualan.ongkos_kirim * barang.berat_barang) * trans_penjualan.qty)) AS total_bayar FROM trans_penjualan,barang WHERE trans_penjualan.kd_barang=barang.kd_barang AND trans_penjualan.id_registrasi='$_SESSION[id_registrasi]' AND trans_penjualan.aksi_kirim='belum' AND status_trans='pesan' AND trans_penjualan.tanggapan='menunggu' ORDER BY trans_penjualan.kd_transaksi='$qkd_transaksi[kd_transaksi]' DESC");
	$total_bayar = mysql_fetch_assoc($tot_bayar);

	$tot_ongkir = mysql_query("SELECT trans_penjualan.*,barang.*, SUM((barang.berat_barang * trans_penjualan.ongkos_kirim) * trans_penjualan.qty) AS total_ongkir FROM trans_penjualan,barang WHERE trans_penjualan.kd_barang=barang.kd_barang AND trans_penjualan.id_registrasi='$_SESSION[id_registrasi]' AND trans_penjualan.aksi_kirim='belum' AND status_trans='pesan' AND trans_penjualan.tanggapan='menunggu' ORDER BY trans_penjualan.kd_transaksi='$qkd_transaksi[kd_transaksi]' DESC");
	$total_ongkir = mysql_fetch_assoc($tot_ongkir);

	$qpemesanan = mysql_query("SELECT trans_penjualan.*,barang.*, trans_penjualan.bayar * trans_penjualan.qty AS subtotal FROM trans_penjualan,barang WHERE trans_penjualan.kd_barang=barang.kd_barang AND trans_penjualan.id_registrasi='$_SESSION[id_registrasi]' AND trans_penjualan.aksi_kirim='belum' AND status_trans='pesan' AND trans_penjualan.tanggapan='menunggu' ORDER BY trans_penjualan.kd_transaksi='$qkd_transaksi[kd_transaksi]' DESC");
    while ($rpemesanan = mysql_fetch_array($qpemesanan)) {

	echo '<tr>';
	echo '<td align="center">'.$rpemesanan['kd_transaksi'].'</td>';
	echo '<td align="center"><img src="administrator/foto/barang/'.$rpemesanan[foto].'" width="50" height="50" style="margin-top:10px;"></td>';
	echo '<td align="center">'.$rpemesanan['nama'].'</td>';
	echo '<td align="center">'.$rpemesanan['qty'].'</td>';
	echo '<td align="left">Rp. '.rupiah($rpemesanan['subtotal']).'</td>';
	echo '</tr>';
	}

	echo '<tr>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td><hr></td>';
	echo '<td><hr></td>';
	echo '<td><hr></td>';
	echo '<td><hr></td>';
	echo '<td><hr></td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td colspan="2">Ongkos Kirim</td>';
	echo '<td>Rp. '.rupiah($total_ongkir['total_ongkir']).'</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td colspan="2"><b>Total Bayar</b></td>';
	echo '<td><b>Rp. '.rupiah($total_bayar['total_bayar']).'</b></td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '<td>&nbsp;</td>';
	echo '</tr>';

	
	echo '<tr>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td colspan="2"><b>Status Pemesanan</b></td>';
	if ($total_bayar['tanggapan'] == 'menunggu') {
		echo '<td style="color:white;" colspan="2"><b><i class="fa fa-minus"></i> '.$total_bayar['tanggapan'].'</b></td>';
	} elseif ($total_bayar['tanggapan'] == 'diterima') {
		echo '<td style="color:green;"><b><i class="fa fa-check"></i> '.$total_bayar['tanggapan'].'</b></td>';
	echo '</tr>';
		echo '<td colspan="3"></td>';
		echo '<td colspan="3"><div class="alert alert-warning"> Pesanan sedang diproses dan dalam pengiriman kurir !</div></td>';
	echo '<tr>';
	echo '</tr>';

	//echo //'<tr>';
	//echo //'<td colspan="3"></td>';
	//echo //'<td colspan="3"><a href="cet-bukti-pemesanan.php" class="btn btn-primary btn-block" target="_blank"> <i class="fa fa-print"></i> Cetak Bukti Transaksi </a></td>';
	//echo //'</tr>';
	}

	echo '</tbody>';
    echo '</form>';
    echo '</table>';
	echo '</div>';
	echo '</form>';
	echo '<a class="popup-close" href="#closed">X</a>';
	echo '</div>';
	echo '</div><div class="popup-wrapper" id="popup">';
	echo '<div class="popup-container">';
	echo '<form action="#" method="post" class="popup-form">';
	echo '<h2>Ikuti Update !!</h2>';
	echo '<div class="input-group">';
	
	echo '</div>';
	echo '</form>';
	echo '<a class="popup-close" href="#closed">X</a>';
	echo '</div>';
	echo '</div>';

	} else {

		echo '<br></br>';
    	echo '<div class="alert alert-danger">';
        echo 'Maaf Halaman Yang Anda Minta Tidak Tersedia';
    	echo '</div>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '<br>';
} else {
	echo "<script> alert('Maaf Anda tidak berhak menuju halaman ini ! Login terlebih dahulu'); window.location.href='?p=page&m=login';</script>";
}

?>
