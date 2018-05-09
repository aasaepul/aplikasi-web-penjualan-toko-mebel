<?php

if ($_SESSION['level'] == "admin") {

$mod	= isset($_GET['mod']) ? $_GET['mod'] : "";

if ($mod=="del-barang") {
	$id		=$_GET['id'];
	$del	=mysql_query("DELETE FROM barang WHERE kd_barang='$id'") or die (mysql_error());
	if ($del) {
		echo "<script>alert('berhasil menghapus!'); </script>";
	} else {
		echo "<script>alert('gagal menghapus!'); </script>";
	}
	echo "<meta http-equiv='refresh' content='0; URL=?page=barang'>";
} else if ($mod=="e-barang") {
	include "barang_Fm.php";
} else if ($mod=="i-barang") {
	include "barang_Fm.php";
}
?>


<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading"> DATA TABEL BARANG </div>
                <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
				<tr>
					<th> No </th>
					<th> Kode Barang </th>
					<th> Nama Barang </th>
					<th> Kategori </th>
					<th> Foto </th>
					<th> Jumlah </th>
					<th> Harga Jual </th>
					<th> Opsi </th>                                        
				</tr>
			</thead>   

		  	<tbody>

			<?php

				$qry 	=mysql_query("SELECT A.`kd_barang`,A.`nama`,A.`foto`,A.`jumlah`,A.`harga_jual`,B.`nama_kategori` FROM barang A,kategori B WHERE A.kd_kategori=B.kd_kategori ORDER BY A.`kd_barang` DESC", $conn);
				$no		= 0;

				while($data=mysql_fetch_array($qry)) { 
				$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data[0] ?></td>
				<td><?php echo $data[1] ?></td>
				<td><?php echo $data[nama_kategori] ?></td>
				<td class="center"><?php echo "<img src='../administrator/foto/barang/$data[foto]' width=50 height=50>"; ?></td>  
				<td><?php echo $data[jumlah] ?></td>
				<td><?php echo $data[harga_jual] ?></td>
				<td>
            		<a href="?page=barang&mod=e-barang&id=<?php echo $data['kd_barang'] ?>" class="btn btn-warning">
					<i class="fa fa-pencil"></i> Edit</a> 
					<a href="?page=barang&mod=del-barang&id=<?php echo  $data['kd_barang'] ?>" class="btn btn-danger" onClick="return confirm('Apakah Anda benar-benar yakin akan menghapusnya?')">
					<i class="fa fa-trash"></i> Hapus</a>
				</td>                                     		
			</tr>
			<?php
				}
			?>
			</tbody>
		</table>
		<div class="form-actions">
			 <a href="?page=barang&mod=i-barang" style="color:#fff;"><button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Barang</button></a>
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
