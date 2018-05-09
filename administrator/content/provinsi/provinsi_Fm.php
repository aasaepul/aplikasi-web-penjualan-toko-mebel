<?php
session_start();
include "assets/function_autonumber.php";

if ($_SESSION['level'] == "admin") {
//POSTKAN variabel yang akan diinputkan ke database, berasal dari form di bawah ini
$submit         = empty($_POST['submit']) ? "" : $_POST['submit'];
$kd_provinsi    = empty($_POST['kd_provinsi']) ? "" : $_POST['kd_provinsi'];
$nama_provinsi  = empty($_POST['nama_provinsi']) ? "" : $_POST['nama_provinsi'];

$mod            = isset($_GET['mod']) ? $_GET['mod'] : "";
$id             = isset($_GET['id']) ? $_GET['id'] : "";

//jika value dari tombol submit adalah "Tambah" maka diinsertkan data ke database dari form input.
if ($submit=="Tambah") {
    //validasi untuk menghindari data kosong terisi
    if ($kd_provinsi=="" || $nama_provinsi=="") {
        echo "<script>alert('isikan data dengan lengkap!'); </script>";
    } else {
    
        $tambah="INSERT INTO provinsi VALUES ('$kd_provinsi','$nama_provinsi')";
        $q=mysql_query($tambah);
        //keterangan jika sudah berhasil menambah data (INSERT data)
        if ($q) {
            echo "<script>alert('data berhasil ditambahkan!'); </script>";
        } else {
            echo "<script>alert('data gagal ditambahkan!'); </script>";
        }
        echo "<meta http-equiv='refresh' content='0; URL=?page=provinsi'>";
    }
    //jika value dari tombol submit adalah "Update", maka mengapdet data
} elseif ($submit=="Edit") {

    $update=mysql_query("UPDATE provinsi SET  kd_provinsi='$kd_provinsi',nama_provinsi='$nama_provinsi' WHERE kd_provinsi='$id'") or die (mysql_error());

    //keterangan jika sudah berhasil mengupdate data (UPDATE data)
    if ($update) {
        echo "<script>alert('data berhasil diupdate!'); </script>";
    } else {
        echo "<script>alert('data gagal diupdate!'); </script>";
    }
    echo "<meta http-equiv='refresh' content='0; URL=?page=provinsi'>";
}


//jika variabel URL mod berisi : "edit_prestasi" maka form isinya dari database
if ($mod=="e-provinsi") {
    $isi_edit       =mysql_query("SELECT * FROM provinsi WHERE kd_provinsi='$id'") or die (mysql_error());
    $data           =mysql_fetch_array($isi_edit);

    $ket              ="Edit";
    $kd_provinsi      = $data[0];
    $nama_provinsi    = $data[1];
    $submit           ="Edit";
//jika variabel URL mod berisi : "input_prestasi" maka form isinya KOSONG (diisi user)
} else if ($mod=="i-provinsi") {
    $ket            ="Tambah";
    $nama_provinsi  ="";
    $submit         ="Tambah";
}

?>
<div class="row">
<div class="col-md-8">
<div class="content">
  <div class="tab-pane" id="formcontrols">
    <form id="barang" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="control-group">
            <label class="control-label"> Kode Provinsi </label>
                <div class="controls">
                    <?php 
                      if ($mod=="e-provinsi") {
                    ?>
                    <input type="text" name="kd_provinsi" class="form-control" value="<?php echo $kd_provinsi; ?>" readonly="readonly" required>
                    <?php
                        } elseif ($mod=="i-provinsi") {
                    ?>
                    <input type="text" name="kd_provinsi" class="form-control" value="<?=autonumber("provinsi","kd_provinsi",3,"P")?>" readonly="readonly" required>        
                    <?php
                        }
                    ?>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label"> Nama Provinsi </label>
                <div class="controls">
                    <input type="text" name="nama_provinsi" class="form-control" value="<?php echo $nama_provinsi; ?>" required>
                </div>
        </div>

        <br>
        <div class="form-actions">
            <button name="submit" type="submit" class="btn btn-primary" value="<?php echo $submit; ?>"><i class="fa fa-save"></i> <?php echo $submit; ?></button>
            <button type="reset" class="btn btn-primary"><a href="?page=provinsi" style="color:#fff;"><i class="fa fa-remove"></i> Batal </a></button>
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