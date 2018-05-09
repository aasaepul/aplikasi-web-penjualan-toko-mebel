<?php

if ($_SESSION['level'] == "admin") {

$mod	= isset($_GET['mod']) ? $_GET['mod'] : "";

if ($mod=="del-kota") {
	$id		=$_GET['id'];
	$del	=mysql_query("DELETE FROM kota WHERE kd_kota='$id'") or die (mysql_error());
	
	if ($del) {
		echo "<script>alert('berhasil menghapus!'); </script>";
	} else {
		echo "<script>alert('gagal menghapus!'); </script>";
	}
	echo "<meta http-equiv='refresh' content='0; URL=?page=kota'>";
} else if ($mod=="e-kota") {
	include "kota_Fm.php";
} else if ($mod=="i-kota") {
	include "kota_Fm.php";
}
?>


<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading"> DATA TABEL KOTA </div>
                <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
				<tr>
					<th>No</th>
					<th>Nama Kota</th>
					<th>Nama Provinsi</th>
					<th>Opsi</th>                                        
				</tr>
			</thead>   

		  	<tbody>

			<?php

				$qry 	=mysql_query("SELECT B.`nama_provinsi`, A.`kd_kota`, A.`nama_kota` FROM kota A, provinsi B WHERE B.`kd_provinsi` = A.`kd_provinsi` ORDER BY A.`kd_kota` DESC", $conn);
				$no		= 0;

				while($data=mysql_fetch_array($qry)) { 
				$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data['nama_kota'] ?></td>
				<td><?php echo $data['nama_provinsi'] ?></td> 
				<td>
            		<a href="?page=kota&mod=e-kota&id=<?php echo $data['kd_kota'] ?>" class="btn btn-warning">
					<i class="fa fa-pencil"></i> Edit</a> 
					<a href="?page=kota&mod=del-kota&id=<?php echo  $data['kd_kota'] ?>" class="btn btn-danger" onClick="return confirm('Apakah Anda benar-benar yakin akan menghapusnya?')">
					<i class="fa fa-trash"></i> Hapus</a>
				</td>                                     		
			</tr>
			<?php
				}
			?>
			</tbody>
		</table>
		<div class="form-actions">
			 <a href="?page=kota&mod=i-kota" style="color:#fff;"><button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Kota </button></a>
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
