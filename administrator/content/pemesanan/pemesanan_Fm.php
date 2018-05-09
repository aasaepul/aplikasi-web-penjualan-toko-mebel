<?php
session_start();

if ($_SESSION['level'] == "admin") {
//POSTKAN variabel yang akan diinputkan ke database, berasal dari form di bawah ini
$submit       = empty($_POST['submit']) ? "" : $_POST['submit'];
$nm_barang    = empty($_POST['nm_barang']) ? "" : $_POST['nm_barang'];
$id_suplier   = empty($_POST['id_suplier']) ? "" : $_POST['id_suplier']; 
$jumlah_pesan = empty($_POST['jumlah_pesan']) ? "" : $_POST['jumlah_pesan'];
$harga_beli   = empty($_POST['hrg_beli']) ? "" : $_POST['hrg_beli'];

$mod          = isset($_GET['mod']) ? $_GET['mod'] : "";
$id           = isset($_GET['id']) ? $_GET['id'] : "";

//jika value dari tombol submit adalah "Tambah" maka diinsertkan data ke database dari form input.
if ($submit=="Tambah") {
    //validasi untuk menghindari data kosong terisi
    if ($nm_barang=="" || $jumlah_pesan=="" || $harga_beli=="") {
        echo "<script>alert('isikan data dengan lengkap!'); </script>";
    } else {
        
        $tambah = mysql_query("INSERT INTO trans_pemesanan VALUES ('','$jumlah_pesan','$harga_beli',now(),'$id_suplier','$nm_barang')") or die (mysql_error());
        if ($tambah) {
            mysql_query("UPDATE barang SET jumlah = jumlah + $jumlah_pesan WHERE kd_barang='$nm_barang'") or die(mysql_error());
            echo "<script>alert('data berhasil ditambahkan!'); </script>";
        } else {
            echo "<script>alert('data gagal ditambahkan!'); </script>";
        }
        echo "<meta http-equiv='refresh' content='0; URL=?page=trans_pemesanan'>";
    }
    //jika value dari tombol submit adalah "Update", maka mengapdet data
} elseif ($submit=="Edit") {

        $ubah = mysql_query("UPDATE trans_pemesanan SET jumlah_pesan='$jumlah_pesan',harga_beli='$harga_beli',tgl=now(),id_suplier='$id_suplier',kd_barang='$nm_barang' WHERE kd_trans_pemesanan='$id'") or die(mysql_error());
        
        if ($ubah) {
            echo "<script>alert('data berhasil diubah!'); </script>";
        } else {
            echo "<script>alert('data gagal diubah!'); </script>"; 
        }
        echo "<meta http-equiv='refresh' content='0; URL=?page=trans_pemesanan'>";
}


//jika variabel URL mod berisi : "edit_pemesanan" maka form isinya dari database
if ($mod=="e-pemesanan") {
    $isi_edit       =mysql_query("SELECT * FROM trans_pemesanan WHERE kd_trans_pemesanan='$id'") or die (mysql_error());
    $data           =mysql_fetch_array($isi_edit);

    $ket              ="Edit";
    $jumlah_pesan     = $data[1];
    $harga_beli       = $data[2];
    $id_suplier       = $data[4];
    $nm_barang        = $data[5];
    $submit           ="Edit";
?>

<div class="row">
<div class="col-md-8">
<div class="content">
  <div class="tab-pane" id="formcontrols">
    <form id="barang" class="form-horizontal" action="" method="POST">

            <div class="control-group">
            <label class="control-label"> Nama Suplier </label>
              <div class="controls">
                <select name="id_suplier" class="form-control">
                    <option value=""> -- Pilih Nama Suplier --</option>
                  <?php
                    $qsuplier = "SELECT * FROM suplier";
                    $rsuplier = mysql_query ($qsuplier);
                      while ($hasil = mysql_fetch_array ($rsuplier)) {
                      $psuplier = ($data['id_suplier']==$hasil['id_suplier'])?"selected" : "";
                      echo"<option value=\"$hasil[id_suplier]\" $psuplier>$hasil[nama_suplier]</option>";
                    }
                  ?>
                </select>
              </div>
            </div>


            <div class="control-group">
            <label class="control-label"> Nama Barang </label>
                <div class="controls">
                <select name="nm_barang" class="form-control">
                    <option value=""> -- Pilih Nama Barang --</option>
                  <?php
                    $qbarang = "SELECT * FROM barang ORDER BY nama ASC";
                    $rbarang = mysql_query ($qbarang);
                      echo '<option>--Pilih Nama Barang--</option>';
                      while ($hasil = mysql_fetch_array ($rbarang)) {
                      $pbarang = ($data['kd_barang']==$hasil['kd_barang'])?"selected" : "";
                      echo"<option value=\"$hasil[kd_barang]\" $pbarang>$hasil[nama]</option>";
                    }
                  ?>
                </select>
                </div>
            </div>

            <div class="control-group">
            <label class="control-label"> Jumlah Pesan</label>
                <div class="controls">
                    <input type="text" name="jumlah_pesan" class="form-control" value="<?php echo $jumlah_pesan; ?>" required>
                </div>
            </div>

            <div class="control-group">
            <label class="control-label"> Harga Beli </label>
            <p id="hrg_beli" style="font-weight:bold;color:red;"></p>
                <div class="controls">
                    <input type="text" name="hrg_beli" id="hrg_beli" class="form-control" value="<?php echo $harga_beli; ?>" onkeyup="document.getElementById('hrg_beli').innerHTML = formatCurrency(this.value);" required>
                </div>
            </div>

        <br>
        <div class="form-actions">
            <button name="submit" type="submit" class="btn btn-primary" value="<?php echo $submit; ?>"><i class="fa fa-save"></i> <?php echo $submit; ?></button>
            <button type="reset" class="btn btn-primary"><a href="?page=barang" style="color:#fff;"><i class="fa fa-remove"></i> Batal </a></button>
        </div>
    </form>
  </div>
</div>
</div>
</div>
<br>
<hr>



<?php
//jika variabel URL mod berisi : "input_pemesanan" maka form isinya KOSONG (diisi user)
} else if ($mod=="i-pemesanan") {
    $ket            ="Tambah";
    $nm_barang      ="";
    $jumlah_pesan   ="";
    $harga_beli     ="";
    $submit         ="Tambah";

?>

<div class="row">
<div class="col-md-8">
<div class="content">
  <div class="tab-pane" id="formcontrols">
    <form id="barang" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

            <div class="control-group">
            <label class="control-label"> Nama Suplier </label>
              <div class="controls">
                <select name="id_suplier" class="form-control">
                    <option value=""> -- Pilih Nama Suplier --</option>
                  <?php
                    $qsuplier = "SELECT * FROM suplier";
                    $rsuplier = mysql_query ($qsuplier);
                      while ($hasil = mysql_fetch_array ($rsuplier)) {
                      $psuplier = ($data['id_suplier']==$hasil['id_suplier'])?"selected" : "";
                      echo"<option value=\"$hasil[id_suplier]\" $psuplier>$hasil[nama_suplier]</option>";
                    }
                  ?>
                </select>
              </div>
            </div>

            <div class="control-group">
            <label class="control-label"> Nama Barang </label>
                <div class="controls">
                <select name="nm_barang" class="form-control">
                    <option value=""> -- Pilih Nama Barang --</option>

                  <?php
                    $qbarang = "SELECT * FROM barang ORDER BY nama ASC";
                    $rbarang = mysql_query ($qbarang);
                      echo '<option>--Pilih Nama Barang--</option>';
                      while ($hasil = mysql_fetch_array ($rbarang)) {
                      $pbarang = ($data['kd_barang']==$hasil['kd_barang'])?"selected" : "";
                      echo"<option value=\"$hasil[kd_barang]\" $pbarang>$hasil[nama]</option>";
                    }
                  ?>
                </select>
                </div>
            </div>

            <div class="control-group">
            <label class="control-label"> Jumlah Pesan</label>
                <div class="controls">
                    <input type="text" name="jumlah_pesan" class="form-control" required>
                </div>
            </div>

            <div class="control-group">
            <label class="control-label"> Harga Beli </label>
            <p id="hrg_beli" style="font-weight:bold;color:red;"></p>
                <div class="controls">
                    <input type="text" name="hrg_beli" id="hrg_beli" class="form-control" onkeyup="document.getElementById('hrg_beli').innerHTML = formatCurrency(this.value);" required>
                </div>
            </div>

        <br>
        <div class="form-actions">
            <button name="submit" type="submit" class="btn btn-primary" value="<?php echo $submit; ?>"><i class="fa fa-save"></i> <?php echo $submit; ?></button>
            <button type="reset" class="btn btn-primary"><a href="?page=trans_pemesanan" style="color:#fff;"><i class="fa fa-remove"></i> Batal </a></button>
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
}
else
  {
    // jika levelnya bukan admin atau user, tampilkan pesan
    echo "<script>alert('Anda bukan Admin tidak berhak mengakses halaman ini ...!');javascript:history.go(-1);</script>";
  }
 ?>