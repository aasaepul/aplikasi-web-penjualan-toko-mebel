<?php
require '../../app/conn.php';
require '../../app/func.inc.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../assets/css/jquery-ui.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
	<script src="../../assets/js/jquery-1.11.1.js"></script>
	<script src="../../assets/js/jquery-ui.js"></script>
	<script>
		$(function() {
			$( "#tgl1" ).datepicker({
				showAnim: "drop",
				dateFormat: "yy-mm-dd",
			});
		});
		$(function() {
			$( "#tgl2" ).datepicker({
            showAnim: "drop",
            dateFormat: "yy-mm-dd",
            //minDate: "-0D",
            beforeShow: function () {
                var a = jQuery("#tgl1").datepicker('getDate');
                if (a) return {
                    minDate: a
                }
            }
        	});
		});
	</script>
</head>
<body>
    <div class="container-fluid">
    	<div class="row" style="margin-top:10px;">
        	<div class="col-md-12">
      			<form method="post" action="" class="form-inline">
                    <fieldset>
                    <legend>Cetak Laporan Penjualan</legend>
                    <div class="form-group">
                        <label>Lihat dari tanggal </label>
                        <input type="text" id="tgl1" name="tgl1" class="form-control" placeholder="thn-bln-tgl" required>
                    </div>
                    <div class="form-group">
                        <label>sampai </label>
                        <input type="text" id="tgl2" name="tgl2" class="form-control" placeholder="thn-bln-tgl" required>
                    </div>
                        <input type="submit" name="penjualan" value="Proses" class="btn btn-primary">
                    </fieldset>
                </form>
                <hr>      	
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
        	<div class="col-md-12">
                    <?php
					if (isset($_POST['penjualan'])) {
						$qtampil = mysql_query("SELECT  trans_penjualan.*,registrasi.*,barang.*, trans_penjualan.bayar * trans_penjualan.qty AS subtotal FROM trans_penjualan,registrasi,barang WHERE trans_penjualan.id_registrasi=registrasi.id_registrasi AND trans_penjualan.kd_barang=barang.kd_barang AND trans_penjualan.tampil_trans_penjualan='ya' AND trans_penjualan.tgl_trans BETWEEN '$_POST[tgl1]' AND '$_POST[tgl2]' ORDER BY trans_penjualan.kd_trans_penjualan DESC") or die (mysql_error());
						$no=1;
					?>
                    <form method="post" action="cetak2.php">
                    	<input type="hidden" name="tgl1" value="<?php echo $_POST['tgl1'];?>">
                        <input type="hidden" name="tgl2" value="<?php echo $_POST['tgl2'];?>">
                        <button type="submit" name="cetak_penjualan" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Cetak Laporan</button>
                    </form>
                    <table class="table table-responsive table-bordered" style="margin-top:5px;">
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
						while ($rtampil = mysql_fetch_assoc($qtampil)) {
					?>
						<tr>
                        	<td><?php echo $no;?></td>
                            <td><?php echo $rtampil['kd_transaksi'];?></td>
                            <td><?php echo $rtampil['nama_depan'];?></td>
                            <td><?php echo $rtampil['nama'];?></td>
                            <td><?php echo $rtampil['qty'];?></td>
                            <td>Rp. <?php echo rupiah($rtampil['subtotal']);?></td>
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
                    <?php
					}
					?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>