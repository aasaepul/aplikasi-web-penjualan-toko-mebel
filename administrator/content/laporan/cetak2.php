<?php
include '../../app/conn.php';
include '../../app/func.inc.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Penjualan</title>
<link rel="stylesheet" href="../../assets/css/bootstrap.css" />
</head>
<body>
	<div class="container-fluid">
    	<div class="col-md-12">
        	<table class="table table-bordered table-responsive">
            	<thead>
                	<tr>
                        <th colspan="7" class="text-center bg-primary">
                           	<h3>Data Transaksi Penjualan<br>
                           	Periode <?php echo $_POST['tgl1'];?> s/d <?php echo $_POST['tgl2'];?></h3>
                        </th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Pelanggan</th>
                        <th>Barang</th>
                        <th>Jumlah Beli</th>
                        <th>Sub Total</th>
                        <th>Tanggal Pesan</th>
                    </tr>
                </thead>
                <tbody>
                	<?php
					$qtampil = mysql_query("SELECT * FROM trans_penjualan,registrasi,barang WHERE trans_penjualan.id_registrasi=registrasi.id_registrasi AND trans_penjualan.kd_barang=barang.kd_barang AND trans_penjualan.tampil_trans_penjualan='ya' AND trans_penjualan.tgl_trans BETWEEN '$_POST[tgl1]' AND '$_POST[tgl2]' ORDER BY trans_penjualan.kd_trans_penjualan DESC") or die (mysql_error());
					$no=1;
					while ($rtampil = mysql_fetch_assoc($qtampil)) {
					?>
						<tr>
                        	<td><?php echo $no;?></td>
                            <td><?php echo $rtampil['kd_transaksi'];?></td>
                            <td><?php echo $rtampil['nama_depan'];?></td>
                            <td><?php echo $rtampil['nama'];?></td>
                            <td><?php echo $rtampil['qty'];?></td>
                            <td>Rp. <?php echo rupiah($rtampil['bayar']);?></td>
                            <td><?php echo $rtampil['tgl_trans'];?></td>
                        </tr>
					<?php
						$no++;		
						}	
                        $qjml = mysql_query("SELECT SUM(qty) AS totpesan, SUM(bayar * qty) AS totbayar FROM trans_penjualan WHERE  aksi_kirim='sudah' AND tgl_trans BETWEEN '$_POST[tgl1]' AND '$_POST[tgl2]'");
                        $rjml = mysql_fetch_assoc($qjml);
					?>

                    <tr>
                        <td colspan="4" class="text-right"><strong>Total</strong></td>
                        <td><?php echo $rjml['totpesan'];?></td>
                        <td>Rp. <?php echo rupiah($rjml['totbayar']);?></td>
                        <td></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</body>
</html>