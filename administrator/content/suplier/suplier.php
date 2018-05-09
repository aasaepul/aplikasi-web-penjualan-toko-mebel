<?php

if ($_SESSION['level'] == "admin") {

$mod	= isset($_GET['mod']) ? $_GET['mod'] : "";

if ($mod=="del-suplier") {
	$id		=$_GET['id'];
	$del	=mysql_query("DELETE FROM suplier WHERE id_suplier='$id'") or die (mysql_error());
	if ($del) {
		echo "<script>alert('berhasil menghapus!'); </script>";
	} else {
		echo "<script>alert('gagal menghapus!'); </script>";
	}
		echo "<meta http-equiv='refresh' content='0; URL=?page=suplier'>";
} else if ($mod=="e-suplier") {
	include "suplier_Fm.php";
} else if ($mod=="i-suplier") {
	include "suplier_Fm.php";
}
?>


<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading"> DATA TABEL SUPLIER </div>
                <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
				<tr>
					<th> No </th>
					<th> Nama Suplier </th>
					<th> No Telepon </th>
					<th> Alamat </th>
					<th> Deskripsi </th>
					<th> Opsi </th>                                        
				</tr>
			</thead>   

		  	<tbody>

			<?php

				$qry 	=mysql_query("SELECT * FROM suplier", $conn);
				$no		= 0;

				while($data=mysql_fetch_array($qry)) { 
				$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data[1] ?></td>
				<td><?php echo $data[2] ?></td> 
				<td><?php echo $data[3] ?></td> 
				<td><?php echo $data[4] ?></td>
				<td>
            		<a href="?page=suplier&mod=e-suplier&id=<?php echo $data['id_suplier'] ?>" class="btn btn-warning">
					<i class="fa fa-pencil"></i> Edit</a> 
					<a href="?page=suplier&mod=del-suplier&id=<?php echo  $data['id_suplier'] ?>" class="btn btn-danger" onClick="return confirm('Apakah Anda benar-benar yakin akan menghapusnya?')">
					<i class="fa fa-trash"></i> Hapus</a>
				</td>                                     		
			</tr>
			<?php
				}
			?>
			</tbody>
		</table>
		<div class="form-actions">
			 <a href="?page=suplier&mod=i-suplier" style="color:#fff;"><button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Suplier</button></a>
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
