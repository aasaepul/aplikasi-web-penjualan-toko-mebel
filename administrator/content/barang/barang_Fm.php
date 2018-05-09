<?php
session_start();
include "assets/function_autonumber.php";

if ($_SESSION['level'] == "admin") {
//POSTKAN variabel yang akan diinputkan ke database, berasal dari form di bawah ini
$submit       = empty($_POST['submit']) ? "" : $_POST['submit'];
$kd_barang    = empty($_POST['kd_barang']) ? "" : $_POST['kd_barang'];
$nama         = empty($_POST['nama']) ? "" : $_POST['nama']; 
$deskripsi    = empty($_POST['deskripsi']) ? "" : $_POST['deskripsi'];
$foto         = $_FILES['foto']['name'];
$jumlah       = empty($_POST['jumlah']) ? "" : $_POST['jumlah'];
$harga_jual   = empty($_POST['harga_jual']) ? "" : $_POST['harga_jual'];
$kd_kategori  = empty($_POST['kd_kategori']) ? "" : $_POST['kd_kategori'];
$berat_barang = empty($_POST['berat_barang']) ? "" : $_POST['berat_barang'];


$mod            = isset($_GET['mod']) ? $_GET['mod'] : "";
$id             = isset($_GET['id']) ? $_GET['id'] : "";

//jika value dari tombol submit adalah "Tambah" maka diinsertkan data ke database dari form input.
if ($submit=="Tambah") {
    //validasi untuk menghindari data kosong terisi
    if ($nama=="" || $deskripsi=="" || $foto=="" || $jumlah=="" || $harga_jual=="") {
        echo "<script>alert('isikan data dengan lengkap!'); </script>";
    } else {
            if(strlen($foto)>0){
                if(is_uploaded_file($_FILES['foto']['tmp_name'])){
                    move_uploaded_file($_FILES['foto']['tmp_name'],"../administrator/foto/barang/".$foto);
                }
            }

        $tambah="INSERT INTO barang VALUES ('$kd_barang','$nama','$deskripsi','$foto','$berat_barang','$jumlah','$harga_jual','$kd_kategori')";
        $q=mysql_query($tambah);
        //keterangan jika sudah berhasil menambah data (INSERT data)
        if ($q) {
            echo "<script>alert('data berhasil ditambahkan!'); </script>";
        } else {
            echo "<script>alert('data gagal ditambahkan!'); </script>";
        }
        echo "<meta http-equiv='refresh' content='0; URL=?page=barang'>";
    }
    //jika value dari tombol submit adalah "Update", maka mengapdet data
} elseif ($submit=="Edit") {

        if(strlen($foto)>0){
            if(is_uploaded_file($_FILES['foto']['tmp_name'])){
                  move_uploaded_file($_FILES['foto']['tmp_name'],"../administrator/foto/barang/".$foto);
            }
            
            mysql_query("update barang set foto='$foto' where kd_barang='$id'");
        }
    $update=mysql_query("UPDATE barang SET  kd_barang='$kd_barang',nama='$nama',deskripsi='$deskripsi',berat_barang='$berat_barang',jumlah='$jumlah',harga_jual='$harga_jual',kd_kategori='$kd_kategori' WHERE kd_barang='$id'") or die (mysql_error());

    //keterangan jika sudah berhasil mengupdate data (UPDATE data)
    if ($update) {
        echo "<script>alert('data berhasil diupdate!'); </script>";
    } else {
        echo "<script>alert('data gagal diupdate!'); </script>";
    }
    echo "<meta http-equiv='refresh' content='0; URL=?page=barang'>";
}


//jika variabel URL mod berisi : "edit_prestasi" maka form isinya dari database
if ($mod=="e-barang") {
    $isi_edit       =mysql_query("SELECT * FROM barang WHERE kd_barang='$id'") or die (mysql_error());
    $data           =mysql_fetch_array($isi_edit);
    $kd             =$data[0];
    $n              =$data[1];
    $d              =$data[2];

    $ket              ="Edit";
    $kd_barang        = $kd;
    $foto             = $data[3];
    $berat_barang     = $data[4];
    $jumlah           = $data[5];
    $harga_jual       = $data[6];
    $kd_kategori      = $data[7];
    $nama             = $n;
    $deskripsi        = $d;
    $submit           ="Edit";
//jika variabel URL mod berisi : "input_prestasi" maka form isinya KOSONG (diisi user)
} else if ($mod=="i-barang") {
    $ket            ="Tambah";
    $nama           ="";
    $deskripsi      ="";
    $foto           ="";
    $jumlah         ="";
    $harga_jual     ="";
    $berat_barang   ="";
    $submit         ="Tambah";
}

?>
<div class="row">
<div class="col-md-8">
<div class="content">
  <div class="tab-pane" id="formcontrols">
    <form id="barang" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="control-group">
            <label class="control-label"> Kode Barang </label>
                <div class="controls">
                    <?php 
                      if ($mod=="e-barang") {
                    ?>
                    <input type="text" name="kd_barang" class="form-control" value="<?php echo $kd_barang; ?>" readonly="readonly" required>
                    <?php
                        } elseif ($mod=="i-barang") {
                    ?>
                    <input type="text" name="kd_barang" class="form-control" value="<?=autonumber("barang","kd_barang",8,"KB")?>" readonly="readonly" required>        
                    <?php
                        }
                    ?>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label"> Nama Barang </label>
                <div class="controls">
                    <input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>" required>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label"> Kategori </label>
                <div class="controls">
                    <select name="kd_kategori" class="form-control" required>
                        <option> -- Pilih Kategori Barang -- </option>
                        <?php
                            $query = "SELECT * FROM kategori";
                            $sql = mysql_query ($query);
                            while ($hasil = mysql_fetch_array ($sql)) {
                                $pilih = ($data['kd_kategori']==$hasil['kd_kategori'])?"selected" : "";
                                    echo"<option value=\"$hasil[kd_kategori]\" $pilih>$hasil[nama_kategori]</option>";
                            }
                        ?>
                    </select>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="deskripsi"> Deskripsi </label>
                <div class="controls">
                    <textarea name="deskripsi" class="ckeditor" rows="7" cols="10" required><?php echo $deskripsi ?></textarea>
                </div>
        </div>
                    
        <div class="control-group">                     
            <label class="control-label" for="foto">Gambar</label>
                <div class="controls">
                    <?php if($_GET['id']){
                        echo "<img src='../administrator/foto/barang/$data[foto]' width=150 height=110> <br />";
                        } 
                    ?>
                    <br>
                    
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                </div> <!-- /controls -->       
        </div> <!-- /control-group -->

        <div class="control-group">
            <label class="control-label"> Berat Barang (Kg)</label>
                <div class="controls">
                    <input type="text" name="berat_barang" class="form-control" value="<?php echo $berat_barang; ?>" required>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label"> Jumlah </label>
                <div class="controls">
                    <input type="text" name="jumlah" class="form-control" value="<?php echo $jumlah; ?>" required>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label"> Harga Jual </label>
            <p id="harga_jual" style="font-weight:bold;color:red;"></p>
                <div class="controls">
                    <input type="text" name="harga_jual" id="harga_jual" class="form-control" value="<?php echo $harga_jual; ?>" onkeyup="document.getElementById('harga_jual').innerHTML = formatCurrency(this.value);" required>
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
}
else
  {
    // jika levelnya bukan admin atau user, tampilkan pesan
    echo "<script>alert('Anda bukan Admin tidak berhak mengakses halaman ini ...!');javascript:history.go(-1);</script>";
  }
 ?>