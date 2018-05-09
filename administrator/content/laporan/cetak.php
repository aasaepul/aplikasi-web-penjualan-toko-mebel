<?php
include '../../app/conn.php';
include '../../app/func.inc.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Pemesanan</title>
<link rel="stylesheet" href="../../assets/css/bootstrap.css" />
</head>
<body>
	<div class="container-fluid">
    	<div class="col-md-12">
        	<table class="table table-bordered table-responsive">
            	<thead>
                	<tr>
                        <th colspan="8" class="text-center bg-primary">
                           	<h3>Data Transaksi Pemesanan<br>
                           	Periode <?php echo $_POST['tgl1'];?> s/d <?php echo $_POST['tgl2'];?></h3>
                        </th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Suplier</th>
                        <th>Kode Barang</th>
                        <th>Barang</th>
                        <th>Jumlah Beli</th>
                        <th>Harga Beli Per Barang</th>
                        <th>Subtotal</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                	<?php
					$qtampil = mysql_query("SELECT trans_pemesanan.*,suplier.*,barang.*, jumlah_pesan * harga_beli AS subtotal FROM trans_pemesanan, suplier, barang WHERE trans_pemesanan.id_suplier=suplier.id_suplier AND trans_pemesanan.kd_barang=barang.kd_barang AND tgl BETWEEN '$_POST[tgl1]' AND '$_POST[tgl2]'") or die (mysql_error());
					$no=1;
					while ($rtampil = mysql_fetch_assoc($qtampil)) {
					?>
						<tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $rtampil['nama_suplier'];?></td>
                            <td><?php echo $rtampil['kd_barang'];?></td>
                            <td><?php echo $rtampil['nama'];?></td>
                            <td><?php echo $rtampil['jumlah_pesan'];?></td>
                            <td>Rp. <?php echo rupiah($rtampil['harga_beli']); ?></td>
                            <td>Rp. <?php echo rupiah($rtampil['subtotal']);?></td>
                            <td><?php echo $rtampil['tgl'];?></td>
                        </tr>
					<?php
						$no++;		
						}	
                        $qjml = mysql_query("SELECT SUM(jumlah_pesan) AS total FROM trans_pemesanan WHERE tgl BETWEEN '$_POST[tgl1]' AND '$_POST[tgl2]'");
                        $rjml = mysql_fetch_assoc($qjml);

                        $qtotal = mysql_query("SELECT SUM(jumlah_pesan * harga_beli) AS tot_harga FROM trans_pemesanan WHERE tgl BETWEEN '$_POST[tgl1]' AND '$_POST[tgl2]'");
                        $rtotal = mysql_fetch_assoc($qtotal);
					?>
                        <tr>
                            <td colspan="4" class="text-right"><strong>Jumlah Barang</strong></td>
                            <td><?php echo $rjml['total'];?></td>
                            <td class="text-right"><strong>Jumlah Total</strong></td>
                            <td>Rp. <?php echo rupiah($rtotal['tot_harga']); ?></td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>