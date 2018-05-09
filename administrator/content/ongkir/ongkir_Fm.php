<?php
session_start();
if ($_SESSION['level'] == "admin"){
//POSTKAN variabel yang akan diinputkan ke database, berasal dari form di bawah ini
$submit           = empty($_POST['submit']) ? "" : $_POST['submit'];
$ongkir           = empty($_POST['ongkir']) ? "" : $_POST['ongkir']; 
$kota             = empty($_POST['kota']) ? "" : $_POST['kota'];
$jns_pengiriman       = empty($_POST['jns_pengiriman']) ? "" : $_POST['jns_pengiriman'];

$mod            = isset($_GET['mod']) ? $_GET['mod'] : "";
$id             = isset($_GET['id']) ? $_GET['id'] : "";

//jika value dari tombol submit adalah "Tambah" maka diinsertkan data ke database dari form input.
if ($submit=="Tambah") {
    //validasi untuk menghindari data kosong terisi
    if ($ongkir=="" || $kota=="") {
        echo "<script>alert('isikan data dengan lengkap!'); </script>";
    } else {
    
        $tambah="INSERT INTO ongkir VALUES ('','$ongkir','$jns_pengiriman','$kota')";
        $q=mysql_query($tambah);
        //keterangan jika sudah berhasil menambah data (INSERT data)
        if ($q) {
            echo "<script>alert('data berhasil ditambahkan!'); </script>";
        } else {
            echo "<script>alert('data gagal ditambahkan!'); </script>";
        }
        echo "<meta http-equiv='refresh' content='0; URL=?page=ongkir'>";
    }
    //jika value dari tombol submit adalah "Update", maka mengapdet data
} elseif ($submit=="Edit") {

            $update=mysql_query("UPDATE ongkir SET ongkos_kirim='$ongkir', jns_pengiriman='$jns_pengiriman', kd_kota='$kota' WHERE kd_ongkir='$id'") or die (mysql_error());

            //keterangan jika sudah berhasil mengupdate data (UPDATE data)
            if ($update) {
                echo "<script>alert('data berhasil diupdate!'); </script>";
            } else {
                echo "<script>alert('data gagal diupdate!'); </script>";
            }
            echo "<meta http-equiv='refresh' content='0; URL=?page=ongkir'>";
}


//jika variabel URL mod berisi : "edit_prestasi" maka form isinya dari database
if ($mod=="e-ongkir") {
    $isi_edit        = mysql_query("SELECT * FROM ongkir WHERE kd_ongkir='$id'") or die (mysql_error());
    $data            = mysql_fetch_array($isi_edit);

    $ket              ="Edit";
    $ongkir           = $data[1];
    $jns_pengiriman   = $data[2];
    $kota             = $data[4];
    $submit           ="Edit";
//jika variabel URL mod berisi : "input_prestasi" maka form isinya KOSONG (diisi user)
} else if ($mod=="i-ongkir") {
    $ket            ="Tambah";
    $ongkir         ="";
    $jns_pengiriman ="";
    $kota           ="";
    $submit         ="Tambah";
}

?>
<div class="row">
<div class="col-md-8">
<div class="content">
  <div class="tab-pane" id="formcontrols">
    <form id="administrator" class="form-horizontal" action="" method="POST">
        <div class="control-group">
            <label class="control-label"> Ongkos Kirim /Kg</label>
            <p id="ongkir" style="font-weight:bold;color:red;"></p>
                <div class="controls">
                    <input type="text" name="ongkir" id="ongkir" class="form-control" value="<?php echo $ongkir; ?>" onkeyup="document.getElementById('ongkir').innerHTML = formatCurrency(this.value);" required>
                </div>
        </div>

         <div class="control-group">
            <label class="control-label"> Kota </label>
                <div class="controls">
                    <select name="kota" class="form-control">
                        <?php
                            $query = "SELECT * FROM kota ORDER BY kd_kota ASC";
                            $sql = mysql_query ($query);
                            while ($hasil = mysql_fetch_array ($sql)) {
                                $pilih = ($data['kd_kota']==$hasil['kd_kota'])?"selected" : "";
                                    echo"<option value=\"$hasil[kd_kota]\" $pilih>$hasil[nama_kota]</option>";
                            }
                        ?>
                    </select>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label"> Jenis Pengiriman </label>
                <div class="controls">
                    <select name="jns_pengiriman" class="form-control" required>
                        <option value="reguler"> REGULER </option>
                    </select>
                </div>
        </div>

        <br>
        <div class="form-actions">
            <button name="submit" type="submit" class="btn btn-primary" value="<?php echo $submit; ?>"><i class="fa fa-save"></i> <?php echo $submit; ?></button>
            <button type="reset" class="btn btn-primary"><a href="?page=ongkir" style="color:#fff;"><i class="fa fa-remove"></i> Batal </a></button>
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