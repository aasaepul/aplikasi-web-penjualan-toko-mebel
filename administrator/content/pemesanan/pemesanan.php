<?php

if ($_SESSION['level'] == "admin") {

$mod	= isset($_GET['mod']) ? $_GET['mod'] : "";

if ($mod=="del-pemesanan") {
	$id		=$_GET['id'];

	$del	=mysql_query("DELETE barang,trans_pemesanan FROM trans_pemesanan LEFT JOIN barang ON trans_pemesanan.`kd_barang`=barang.`kd_barang` WHERE trans_pemesanan.kd_trans_pemesanan='$id'") or die (mysql_error());
	if ($del) {
		echo "<script>alert('berhasil menghapus!'); </script>";
	} else {
		echo "<script>alert('gagal menghapus!'); </script>";
	}
	echo "<meta http-equiv='refresh' content='0; URL=?page=trans_pemesanan'>";
} else if ($mod=="e-pemesanan") {
	include "pemesanan_Fm.php";
} else if ($mod=="i-pemesanan") {
	include "pemesanan_Fm.php";
}
?>


<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading"> DATA TABEL TRANSAKSI PEMESANAN </div>
                <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
				<tr>
					<th> No </th>
					<th> Nama Suplier </th>
					<th> Nama Barang </th>
					<th> Jumlah Pesan</th>
					<th> Harga Beli </th>
					<th> Opsi </th>                                        
				</tr>
			</thead>   

		  	<tbody>

			<?php

				$qry 	=mysql_query("SELECT A.`kd_barang`,A.`nama`,A.`foto`,A.`jumlah`,A.`harga_jual`,B.`nama_kategori`,C.*,D.* FROM barang A,kategori B,trans_pemesanan C, suplier D WHERE A.kd_kategori=B.kd_kategori AND A.kd_barang = C.kd_barang AND C.id_suplier = D.id_suplier ORDER BY C.`kd_trans_pemesanan` DESC", $conn);
				$no		= 0;

				while($data=mysql_fetch_array($qry)) { 
				$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data[nama_suplier] ?></td>  
				<td><?php echo $data[nama] ?></td>
				<td><?php echo $data[jumlah_pesan] ?></td>
				<td><?php echo $data[harga_beli] ?></td>
				<td>
            		<a href="?page=trans_pemesanan&mod=e-pemesanan&id=<?php echo $data['kd_trans_pemesanan'] ?>" class="btn btn-warning">
					<i class="fa fa-pencil"></i> Edit</a> 
					<a href="?page=trans_pemesanan&mod=del-pemesanan&id=<?php echo  $data['kd_trans_pemesanan'] ?>" class="btn btn-danger" onClick="return confirm('Apakah Anda benar-benar yakin akan menghapusnya?')">
					<i class="fa fa-trash"></i> Hapus</a>
				</td>                                     		
			</tr>
			<?php
				}
			?>
			</tbody>
		</table>
		<div class="form-actions">
			 <a href="?page=trans_pemesanan&mod=i-pemesanan" style="color:#fff;"><button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Pemesanan</button></a>
		</div>
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
