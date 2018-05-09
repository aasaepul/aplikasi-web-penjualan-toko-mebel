<?php
session_start();
if ($_SESSION['level'] == "admin") {
//POSTKAN variabel yang akan diinputkan ke database, berasal dari form di bawah ini
$submit     = empty($_POST['submit']) ? "" : $_POST['submit'];
$nama       = empty($_POST['nama']) ? "" : $_POST['nama']; 
$deskripsi  = empty($_POST['deskripsi']) ? "" : $_POST['deskripsi'];
$alamat     = empty($_POST['alamat']) ? "" : $_POST['alamat'];
$no_telp    = empty($_POST['no_telp']) ? "" : $_POST['no_telp'];

$mod            = isset($_GET['mod']) ? $_GET['mod'] : "";
$id             = isset($_GET['id']) ? $_GET['id'] : "";

//jika value dari tombol submit adalah "Tambah" maka diinsertkan data ke database dari form input.
if ($submit=="Tambah") {
    //validasi untuk menghindari data kosong terisi
    if ($nama=="" || $alamat=="" || $no_telp=="" || $deskripsi=="") {
        echo "<script>alert('isikan data dengan lengkap!'); </script>";
    } else {

        $tambah="INSERT INTO suplier VALUES ('','$nama','$no_telp','$alamat','$deskripsi')";
        $q=mysql_query($tambah);
        //keterangan jika sudah berhasil menambah data (INSERT data)
        if ($q) {
            echo "<script>alert('data berhasil ditambahkan!'); </script>";
        } else {
            echo "<script>alert('data gagal ditambahkan!'); </script>";
        }
        echo "<meta http-equiv='refresh' content='0; URL=?page=suplier'>";
    }
    //jika value dari tombol submit adalah "Update", maka mengapdet data
} elseif ($submit=="Edit") {

    $update=mysql_query("UPDATE suplier SET  nama_suplier='$nama', alamat='$alamat', no_telp='$no_telp', deskripsi='$deskripsi' WHERE id_suplier='$id'") or die (mysql_error());

    //keterangan jika sudah berhasil mengupdate data (UPDATE data)
    if ($update) {
        echo "<script>alert('data berhasil diupdate!'); </script>";
    } else {
        echo "<script>alert('data gagal diupdate!'); </script>";
    }
    echo "<meta http-equiv='refresh' content='0; URL=?page=suplier'>";
}


//jika variabel URL mod berisi : "edit_prestasi" maka form isinya dari database
if ($mod=="e-suplier") {
    $isi_edit       =mysql_query("SELECT * FROM suplier WHERE id_suplier='$id'") or die (mysql_error());
    $data           =mysql_fetch_array($isi_edit);
    $n              =$data[1];
    $a              =$data[3];

    $ket              ="Edit";
    $no_telp          = $data[2];
    $deskripsi        = $data[4];
    $nama             = $n;
    $alamat           = $a;
    $submit           ="Edit";
//jika variabel URL mod berisi : "input_prestasi" maka form isinya KOSONG (diisi user)
} else if ($mod=="i-suplier") {
    $ket            ="Tambah";
    $deskripsi      ="";
    $nama           ="";
    $alamat         ="";
    $no_telp        ="";
    $submit         ="Tambah";
}

?>
<div class="row">
<div class="col-md-8">
<div class="content">
  <div class="tab-pane" id="formcontrols">
    <form id="suplier" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="control-group">
            <label class="control-label"> Nama Suplier </label>
                <div class="controls">
                    <input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>" required>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="deskripsi"> Alamat </label>
                <div class="controls">
                    <textarea name="alamat" class="form-control" id="alamat" rows="7" cols="10" OnFocus="Count();" 
                        OnClick="Count();" onKeydown="Count();" OnChange="Count();" 
                        onKeyup="Count();" required><?php echo $alamat ?></textarea>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label"> Nomor Telepon </label>
                <div class="controls">
                    <input type="text" name="no_telp" class="form-control" value="<?php echo $no_telp; ?>" required>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="deskripsi"> Deskripsi </label>
                <div class="controls">
                    <textarea name="deskripsi" class="ckeditor" id="deskripsi" rows="7" cols="10" OnFocus="Count();" 
                        OnClick="Count();" onKeydown="Count();" OnChange="Count();" 
                        onKeyup="Count();" required><?php echo $deskripsi ?></textarea>
                </div>
        </div>

        <br>
        <div class="form-actions">
            <button name="submit" type="submit" class="btn btn-primary" value="<?php echo $submit; ?>"><i class="fa fa-save"></i> <?php echo $submit; ?></button>
            <button type="reset" class="btn btn-primary"><a href="?page=suplier" style="color:#fff;"><i class="fa fa-remove"></i> Batal </a></button>
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