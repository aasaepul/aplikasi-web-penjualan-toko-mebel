<?php

if ($_SESSION['level'] == "admin") {

$mod	= isset($_GET['mod']) ? $_GET['mod'] : "";

if ($mod=="del-ongkir") {
	$id		=$_GET['id'];
	$del	=mysql_query("DELETE FROM ongkir WHERE kd_ongkir='$id'") or die (mysql_error());
	
	if ($del) {
		echo "<script>alert('berhasil menghapus!'); </script>";
	} else {
		echo "<script>alert('gagal menghapus!'); </script>";
	}
	echo "<meta http-equiv='refresh' content='0; URL=?page=ongkir'>";
} else if ($mod=="e-ongkir") {
	include "ongkir_Fm.php";
} else if ($mod=="i-ongkir") {
	include "ongkir_Fm.php";
}
?>


<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading"> DATA TABEL ONGKIR </div>
                <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
				<tr>
					<th>No</th>
					<th>Kota</th>
					<th>Jenis Pengiriman</th>
					<th>Ongkir</th>
					<th>Opsi</th>                                        
				</tr>
			</thead>   

		  	<tbody>

			<?php

				$qry 	=mysql_query("SELECT A.`nama_kota`,B.`kd_ongkir`,B.`ongkos_kirim`,B.`jns_pengiriman` FROM kota A,ongkir B WHERE A.kd_kota=B.kd_kota ORDER BY B.`kd_ongkir` DESC", $conn);
				$no		= 0;

				while($data=mysql_fetch_array($qry)) { 
				$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data['nama_kota'] ?></td>
				<td><?php echo $data['jns_pengiriman'] ?></td>  
				<td><?php echo $data['ongkos_kirim'] ?></td>
				<td>
            		<a href="?page=ongkir&mod=e-ongkir&id=<?php echo $data['kd_ongkir'] ?>" class="btn btn-warning">
					<i class="fa fa-pencil"></i> Edit</a> 
					<a href="?page=ongkir&mod=del-ongkir&id=<?php echo  $data['kd_ongkir'] ?>" class="btn btn-danger" onClick="return confirm('Apakah Anda benar-benar yakin akan menghapusnya?')">
					<i class="fa fa-trash"></i> Hapus</a>
				</td>                                     		
			</tr>
			<?php
				}
			?>
			</tbody>
		</table>
		<div class="form-actions">
			 <a href="?page=ongkir&mod=i-ongkir" style="color:#fff;"><button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Ongkir </button></a>
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
