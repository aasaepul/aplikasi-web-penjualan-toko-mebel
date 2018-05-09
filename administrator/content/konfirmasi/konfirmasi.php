<?php

if ($_SESSION['level'] == "admin") {

$mod	= isset($_GET['mod']) ? $_GET['mod'] : "";

if ($mod=="del-konfirmasi") {
	$id		=$_GET['id'];
	$del	=mysql_query("DELETE FROM konfirmasi WHERE kd_konfirmasi='$id'") or die (mysql_error());
	if ($del) {
		echo "<script>alert('berhasil menghapus!'); </script>";
	} else {
		echo "<script>alert('gagal menghapus!'); </script>";
	}
	echo "<meta http-equiv='refresh' content='0; URL=?page=konfirmasi'>";
}

?>


<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading"> DATA TABEL KONFIRMASI </div>
                <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
				<tr>
					<th> No </th>
					<th> Kode Transaksi </th>
					<th> Nama Pelanggan </th>
					<th> Bank Tujuan </th>
					<th> No Rekening </th>
					<th> Bukti Transfer </th>
					<th> Jumlah Transfer </th>
					<th> Tgal Konfirmasi </th>
					<th> Opsi </th>                                        
				</tr>
			</thead>   

		  	<tbody style="font-size:12px;">

			<?php

				$qry 	=mysql_query("SELECT DISTINCT konfirmasi.*,registrasi.*,bank.* FROM konfirmasi,trans_penjualan,registrasi,bank WHERE  konfirmasi.id_registrasi=registrasi.id_registrasi AND konfirmasi.kd_bank=bank.kd_bank AND konfirmasi.tampil_konfirmasi='Y' ORDER BY konfirmasi.kd_konfirmasi DESC", $conn);
				$no		= 0;

				while($data=mysql_fetch_array($qry)) { 
				$no++;
			?>
			<tr>
				<td><?php echo $no;?></td>
                <td><?php echo $data['kd_transaksi'];?></td>
                <td><?php echo $data['nama_depan'];?></td>
                <td><?php echo $data['nama_bank'];?></td>
                <td><?php echo $data['no_rekening'];?></td>
                <td><a href="../administrator/foto/bukti-transfer/<?php echo $data['bukti_transfer'];?>" target="_blank"><img src="../administrator/foto/bukti-transfer/<?php echo $data['bukti_transfer'];?>" width="100" height="70" class="img-thumbnail"/></a></td>
                <td>
                	<?php
                		$qtot = mysql_query("SELECT trans_penjualan.*,barang.*, SUM((trans_penjualan.bayar * trans_penjualan.qty) + ((trans_penjualan.ongkos_kirim * barang.berat_barang) * trans_penjualan.qty)) AS tot_bayar FROM trans_penjualan,barang WHERE trans_penjualan.kd_barang=barang.kd_barang AND trans_penjualan.kd_transaksi='$data[kd_transaksi]'");
                        $rtot = mysql_fetch_assoc($qtot);

							echo 'Rp. '.rupiah($rtot['tot_bayar']);
					?>
                </td>
                <td><?php echo $data['tgl_konfirmasi'];?></td>
                <td>
                  	<a href="home.php?page=act-konfirmasi&konfirmasi=<?php echo $data['kd_transaksi'];?>"><i class="fa fa-check"></i></a>
                  	<a href="home.php?page=konfirmasi&mod=del-konfirmasi&id=<?php echo $data['kd_konfirmasi'];?>"><i class="fa fa-remove"></i></a>  	
                </td>                                     		
			</tr>
			<?php
				}
			?>
			</tbody>
		</table>
		</div>
    </div>
    </div>
    <!--End Advanced Tables -->
</div>
</div>

<?php
}
else
  {
    // jika levelnya bukan admin atau user, tampilkan pesan
    echo "<script>alert('Anda bukan Admin tidak berhak mengakses halaman ini ...!');javascript:history.go(-1);</script>";
  }
 ?>
