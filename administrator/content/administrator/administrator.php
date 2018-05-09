<?php

if (($_SESSION['level'] == "admin") || ($_SESSION['level'] == "pemilik")) {

$mod	= isset($_GET['mod']) ? $_GET['mod'] : "";

if ($mod=="del-akun") {
	$id		=$_GET['id'];
	$del	=mysql_query("DELETE FROM akun WHERE id_akun='$id'") or die (mysql_error());
	if ($del) {
		echo "<script>alert('berhasil menghapus!'); </script>";
	} else {
		echo "<script>alert('gagal menghapus!'); </script>";
	}
	echo "<meta http-equiv='refresh' content='0; URL=?page=administrator'>";
} else if ($mod=="e-akun") {
	include "administrator_Fm.php";
} else if ($mod=="i-akun") {
	include "administrator_Fm.php";
}
?>


<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading"> DATA TABEL ADMINISTRATOR </div>
                <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Foto</th>
					<th>Level</th>
					<th>Opsi</th>                                        
				</tr>
			</thead>   

		  	<tbody>

			<?php

				$qry 	=mysql_query("SELECT * FROM akun", $conn);
				$no		= 0;

				while($data=mysql_fetch_array($qry)) { 
				$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data[1] ?></td>
				<td><?php echo $data[2] ?></td>
				<td class="center"><?php echo "<img src='../administrator/foto/administrator/$data[foto]' width=50 height=50>"; ?></td>  
				<td><?php echo $data[7] ?></td>
				<td>
            		<a href="?page=administrator&mod=e-akun&id=<?php echo $data['id_akun'] ?>" class="btn btn-warning">
					<i class="fa fa-pencil"></i> Edit</a> 
					<a href="?page=administrator&mod=del-akun&id=<?php echo  $data['id_akun'] ?>" class="btn btn-danger" onClick="return confirm('Apakah Anda benar-benar yakin akan menghapusnya?')">
					<i class="fa fa-trash"></i> Hapus</a>
				</td>                                     		
			</tr>
			<?php
				}
			?>
			</tbody>
		</table>
		<div class="form-actions">
			 <a href="?page=administrator&mod=i-akun" style="color:#fff;"><button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Akun </button></a>
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
