<?php
session_start();
if ($_SESSION['level'] == "admin") {
//POSTKAN variabel yang akan diinputkan ke database, berasal dari form di bawah ini
$submit     = empty($_POST['submit']) ? "" : $_POST['submit'];
$nama      = empty($_POST['nama']) ? "" : $_POST['nama'];

$mod            = isset($_GET['mod']) ? $_GET['mod'] : "";
$id             = isset($_GET['id']) ? $_GET['id'] : "";

//jika value dari tombol submit adalah "Tambah" maka diinsertkan data ke database dari form input.
if ($submit=="Tambah") {
    //validasi untuk menghindari data kosong terisi
    if ($nama == "") {
        echo "<script>alert('isikan data dengan lengkap!'); </script>";
    } else {
            
        $tambah="INSERT INTO kategori VALUES ('','$nama')";
        $q=mysql_query($tambah);
        //keterangan jika sudah berhasil menambah data (INSERT data)
        if ($q) {
            echo "<script>alert('data berhasil ditambahkan!'); </script>";
        } else {
            echo "<script>alert('data gagal ditambahkan!'); </script>";
        }
        echo "<meta http-equiv='refresh' content='0; URL=?page=kategori'>";
    }
    //jika value dari tombol submit adalah "Update", maka mengapdet data
} elseif ($submit=="Edit") {

    $update=mysql_query("UPDATE kategori SET  nama_kategori='$nama' WHERE kd_kategori='$id'") or die (mysql_error());

    //keterangan jika sudah berhasil mengupdate data (UPDATE data)
    if ($update) {
        echo "<script>alert('data berhasil diupdate!'); </script>";
    } else {
        echo "<script>alert('data gagal diupdate!'); </script>";
    }
    echo "<meta http-equiv='refresh' content='0; URL=?page=kategori'>";
}


//jika variabel URL mod berisi : "edit_prestasi" maka form isinya dari database
if ($mod=="e-kategori") {
    $isi_edit       =mysql_query("SELECT * FROM kategori WHERE kd_kategori='$id'") or die (mysql_error());
    $data           =mysql_fetch_array($isi_edit);
    $n              =$data[1];

    $ket              ="Edit";
    $nama             = $n;
    $submit           ="Edit";
//jika variabel URL mod berisi : "input_prestasi" maka form isinya KOSONG (diisi user)
} else if ($mod=="i-kategori") {
    $ket              ="Tambah";
    $nama             ="";
    $submit           ="Tambah";
}

?>
<div class="row">
<div class="col-md-8">
<div class="content">
  <div class="tab-pane" id="formcontrols">
    <form id="edit-profile" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" class="form-control" value="<?php echo $_SESSION['id_administrator'];?>" name="id_administrator">
        <div class="control-group">
            <label class="control-label"> Nama Kategori </label>
                <div class="controls">
                    <input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>" required>
                </div>
        </div>
		
        <br>
        <div class="form-actions">
            <button name="submit" type="submit" class="btn btn-primary" value="<?php echo $submit; ?>"><i class="fa fa-save"></i> <?php echo $submit; ?></button>
            <button type="reset" class="btn btn-primary"><a href="?page=kategori" style="color:#fff;"><i class="fa fa-remove"></i> Batal </a></button>
        </div>
    </form>
  </div>
</div>
</div>
</div>
<br>
<hr>
<?php
}
else
  {
    // jika levelnya bukan admin atau user, tampilkan pesan
    echo "<script>alert('Anda bukan Admin tidak berhak mengakses halaman ini ...!');javascript:history.go(-1);</script>";
  }
 ?>