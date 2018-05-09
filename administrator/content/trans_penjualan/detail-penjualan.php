<?php
$detail = mysql_query("SELECT trans_penjualan.*,registrasi.*, barang.*, trans_penjualan.bayar * trans_penjualan.qty AS subtotal FROM trans_penjualan, registrasi, barang WHERE trans_penjualan.kd_transaksi='$_GET[id]' AND barang.kd_barang=trans_penjualan.kd_barang AND trans_penjualan.id_registrasi=registrasi.id_registrasi AND trans_penjualan.kd_trans_penjualan = '$_GET[kd]'");

$identitas = mysql_query("SELECT trans_penjualan.*,registrasi.*,barang.*, SUM((trans_penjualan.bayar * trans_penjualan.qty) + ((barang.berat_barang * trans_penjualan.ongkos_kirim) * trans_penjualan.qty)) AS total FROM trans_penjualan, registrasi, barang WHERE trans_penjualan.kd_transaksi = '$_GET[id]' AND trans_penjualan.kd_barang = barang.kd_barang AND registrasi.id_registrasi = trans_penjualan.id_registrasi AND trans_penjualan.kd_trans_penjualan = '$_GET[kd]'");
$d_identitas = mysql_fetch_assoc($identitas);
 
$ongkir     = mysql_query("SELECT trans_penjualan.*,registrasi.*,barang.*, SUM((barang.berat_barang * trans_penjualan.ongkos_kirim) * trans_penjualan.qty) AS tot_ongkir FROM trans_penjualan, registrasi, barang WHERE trans_penjualan.kd_transaksi = '$_GET[id]' AND trans_penjualan.kd_trans_penjualan = '$_GET[kd]' AND trans_penjualan.kd_barang = barang.kd_barang AND registrasi.id_registrasi = trans_penjualan.id_registrasi");
$d_ongkir   = mysql_fetch_assoc($ongkir);
?>

<center>
<div class="row">
	<div class="col-md-12">
    	<h2>Detail Transaksi Penjualan</h2>
        <hr />
        <table class="table table-responsive table-bordered">
        	<tr>
            	<td><strong>ID Transaksi</strong></td>
                <td colspan="2"><?php echo $d_identitas['kd_transaksi'];?></td>
            </tr>
            <tr>
            	<td><strong>Nama Pelanggan</strong></td>
                <td colspan="2"><?php echo $d_identitas['nama_depan'];?></td>
            </tr>
            <tr>
                <td><strong>Alamat Pelanggan</strong></td>
                <td colspan="2"><?php echo $d_identitas['alamat'];?></td>
            </tr>
            <tr>
            	<td><strong>Status Pengiriman</strong></td>
                <td colspan="2"><?php echo $d_identitas['aksi_kirim'];?></td>
            </tr>
            <tr>
                <td><strong>Alamat Pengiriman Barang</strong></td>
                <td colspan="2"><?php echo $d_ongkir['alamat_kirim'];?></td>
            </tr>
            <tr>
            	<td><strong>Tanggal Masuk</strong></td>
                <td colspan="2"><?php echo $d_identitas['tgl_trans'];?></td>
            </tr>
            <tr>
            	<td><strong>Tanggal Pengiriman</strong></td>
                <td colspan="2"><?php echo $d_identitas['tgl_kirim'];?></td>
            </tr>
            <tr>
            	<td><strong>Nama Barang</strong></td>
                <td><strong>Jumlah Beli</strong></td>
                <td><strong></strong></td>
            </tr>
            <?php
            while ($rdetail = mysql_fetch_assoc($detail)) {
				echo '<tr>';
				echo '<td>'.$rdetail['nama'].'</td>';
				echo '<td>'.$rdetail['qty'].'</td>';
				echo '<td>Rp. '.rupiah($rdetail['subtotal']).'</td>';
				echo '</tr>';
				}
			?>

            <tr>
                <td colspan="2" align="right"><strong>Ongkos Kirim</strong></td>
                <td>Rp. <?php echo rupiah($d_ongkir['tot_ongkir']);?></td>
            </tr>

            <tr>
            	<td colspan="2" align="right"><strong>Total Bayar</strong></td>
                <td>Rp. <?php echo rupiah($d_identitas['total']);?></td>
            </tr>
        </table>
        <a href="home.php?page=trans_penjualan" class="btn btn-danger btn-block">Kembali</a>
    </div>
</div>
</center>