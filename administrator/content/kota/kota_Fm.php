<?php
session_start();
include "assets/function_autonumber.php";

if ($_SESSION['level'] == "admin") {
//POSTKAN variabel yang akan diinputkan ke database, berasal dari form di bawah ini
$submit       = empty($_POST['submit']) ? "" : $_POST['submit'];
$kd_kota    = empty($_POST['kd_kota']) ? "" : $_POST['kd_kota'];
$nama_kota         = empty($_POST['nama_kota']) ? "" : $_POST['nama_kota']; 
$kd_provinsi    = empty($_POST['kd_provinsi']) ? "" : $_POST['kd_provinsi'];

$mod            = isset($_GET['mod']) ? $_GET['mod'] : "";
$id             = isset($_GET['id']) ? $_GET['id'] : "";

//jika value dari tombol submit adalah "Tambah" maka diinsertkan data ke database dari form input.
if ($submit=="Tambah") {
    //validasi untuk menghindari data kosong terisi
    if ($kd_kota=="" || $nama_kota=="" || $kd_provinsi=="") {
        echo "<script>alert('isikan data dengan lengkap!'); </script>";
    } else {
    
        $tambah="INSERT INTO kota VALUES ('$kd_kota','$nama_kota','$kd_provinsi')";
        $q=mysql_query($tambah);
        //keterangan jika sudah berhasil menambah data (INSERT data)
        if ($q) {
            echo "<script>alert('data berhasil ditambahkan!'); </script>";
        } else {
            echo "<script>alert('data gagal ditambahkan!'); </script>";
        }
        echo "<meta http-equiv='refresh' content='0; URL=?page=kota'>";
    }
    //jika value dari tombol submit adalah "Update", maka mengapdet data
} elseif ($submit=="Edit") {

    $update=mysql_query("UPDATE kota SET  kd_kota='$kd_kota',nama_kota='$nama_kota',kd_provinsi='$kd_provinsi' WHERE kd_kota='$id'") or die (mysql_error());

    //keterangan jika sudah berhasil mengupdate data (UPDATE data)
    if ($update) {
        echo "<script>alert('data berhasil diupdate!'); </script>";
    } else {
        echo "<script>alert('data gagal diupdate!'); </script>";
    }
    echo "<meta http-equiv='refresh' content='0; URL=?page=kota'>";
}


//jika variabel URL mod berisi : "edit_prestasi" maka form isinya dari database
if ($mod=="e-kota") {
    $isi_edit       =mysql_query("SELECT * FROM kota WHERE kd_kota='$id'") or die (mysql_error());
    $data           =mysql_fetch_array($isi_edit);

    $ket              ="Edit";
    $kd_kota          = $data[0];
    $nama_kota        = $data[1];
    $kd_provinsi      = $data[2];
    $submit           ="Edit";
//jika variabel URL mod berisi : "input_prestasi" maka form isinya KOSONG (diisi user)
} else if ($mod=="i-kota") {
    $ket            ="Tambah";
    $nama_kota      ="";
    $kd_provinsi    ="";
    $submit         ="Tambah";
}

?>
<div class="row">
<div class="col-md-8">
<div class="content">
  <div class="tab-pane" id="formcontrols">
    <form id="barang" class="form-horizontal" action="" method="POST">
        <div class="control-group">
            <label class="control-label"> Kode Kota </label>
                <div class="controls">
                    <?php 
                      if ($mod=="e-kota") {
                    ?>
                    <input type="text" name="kd_kota" class="form-control" value="<?php echo $kd_kota; ?>" readonly="readonly" required>
                    <?php
                        } elseif ($mod=="i-kota") {
                    ?>
                    <input type="text" name="kd_kota" class="form-control" value="<?=autonumber("kota","kd_kota",3,"K")?>" readonly="readonly" required>        
                    <?php
                        }
                    ?>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label"> Nama Kota </label>
                <div class="controls">
                    <input type="text" name="nama_kota" class="form-control" value="<?php echo $nama_kota; ?>" required>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label"> Provinsi </label>
                <div class="controls">
                    <select name="kd_provinsi" class="form-control">
                        <?php
                            $query = "SELECT * FROM provinsi";
                            $sql = mysql_query ($query);
                            while ($hasil = mysql_fetch_array ($sql)) {
                                $pilih = ($data['kd_provinsi']==$hasil['kd_provinsi'])?"selected" : "";
                                    echo"<option value=\"$hasil[kd_provinsi]\" $pilih>$hasil[nama_provinsi]</option>";
                            }
                        ?>
                    </select>
                </div>
        </div>

        <br>
        <div class="form-actions">
            <button name="submit" type="submit" class="btn btn-primary" value="<?php echo $submit; ?>"><i class="fa fa-save"></i> <?php echo $submit; ?></button>
            <button type="reset" class="btn btn-primary"><a href="?page=kota" style="color:#fff;"><i class="fa fa-remove"></i> Batal </a></button>
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