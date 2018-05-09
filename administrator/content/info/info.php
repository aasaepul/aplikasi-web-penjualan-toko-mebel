<?php

if ($_SESSION['level'] == "admin") {

$mod	= isset($_GET['mod']) ? $_GET['mod'] : "";

if ($mod=="del-info") {
	$id		=$_GET['id'];
	$del	=mysql_query("DELETE FROM info WHERE kd_info='$id'") or die (mysql_error());
	if ($del) {
		echo "<script>alert('berhasil menghapus!'); </script>";
	} else {
		echo "<script>alert('gagal menghapus!'); </script>";
	}
	echo "<meta http-equiv='refresh' content='0; URL=?page=info'>";
} else if ($mod=="e-info") {
	include "info_Fm.php";
} else if ($mod=="i-info") {
	include "info_Fm.php";
}
?>


<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading"> DATA TABEL INFO </div>
                <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
				<tr>
					<th>No</th>
					<th>Judul</th>
					<th>Foto</th>
					<th>Opsi</th>                                        
				</tr>
			</thead>   

		  	<tbody>
		  	<?php
                  $sql="select * from info where kd_info=1";
                  $query=mysql_query($sql);
                  $data=mysql_fetch_array($query);
            ?>
            <tr>
				<td>1</td>
				<td><?php echo $data[1] ?></td>
				<td class="center"><?php echo "<img src='../administrator/foto/info/$data[foto]' width=50 height=50>"; ?></td>  
				<td>
            		<a href="?page=info&mod=e-info&id=<?php echo $data['kd_info'] ?>" class="btn btn-warning">
					<i class="fa fa-pencil"></i> Edit</a> 
				</td>                                     		
			</tr>

			<?php
                  $sql="select * from info where kd_info=2";
                  $query=mysql_query($sql);
                  $data=mysql_fetch_array($query);
            ?>
            <tr>
				<td>2</td>
				<td><?php echo $data[1] ?></td>
				<td class="center"><?php echo "<img src='../administrator/foto/info/$data[foto]' width=50 height=50>"; ?></td>  
				<td>
            		<a href="?page=info&mod=e-info&id=<?php echo $data['kd_info'] ?>" class="btn btn-warning">
					<i class="fa fa-pencil"></i> Edit</a> 
				</td>                                     		
			</tr>

			<?php

				$qry 	=mysql_query("SELECT * FROM info WHERE kd_info<>1 AND kd_info<>2 ORDER BY kd_info", $conn);
				$no		= 2;

				while($data=mysql_fetch_array($qry)) { 
				$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data[1] ?></td>
				<td class="center"><?php echo "<img src='../administrator/foto/info/$data[foto]' width=50 height=50>"; ?></td>  
				<td>
            		<a href="?page=info&mod=e-info&id=<?php echo $data['kd_info'] ?>" class="btn btn-warning">
					<i class="fa fa-pencil"></i> Edit</a> 
					<a href="?page=info&mod=del-info&id=<?php echo  $data['kd_info'] ?>" class="btn btn-danger" onClick="return confirm('Apakah Anda benar-benar yakin akan menghapusnya?')">
					<i class="fa fa-trash"></i> Hapus</a>
				</td>                                     		
			</tr>
			<?php
				}
			?>
			</tbody>
		</table>
		<div class="form-actions">
			 <a href="?page=info&mod=i-info" style="color:#fff;"><button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Info</button></a>
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
