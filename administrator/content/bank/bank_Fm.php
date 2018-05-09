<?php
session_start();
if ($_SESSION['level'] == "admin"){
//POSTKAN variabel yang akan diinputkan ke database, berasal dari form di bawah ini
$submit           = empty($_POST['submit']) ? "" : $_POST['submit'];
$nama_bank        = empty($_POST['nama_bank']) ? "" : $_POST['nama_bank']; 
$no_rekening      = empty($_POST['no_rekening']) ? "" : $_POST['no_rekening'];
$atas_nama        = empty($_POST['atas_nama']) ? "" : $_POST['atas_nama'];
$logo_bank        = $_FILES['logo_bank']['name'];

$mod            = isset($_GET['mod']) ? $_GET['mod'] : "";
$id             = isset($_GET['id']) ? $_GET['id'] : "";

//jika value dari tombol submit adalah "Tambah" maka diinsertkan data ke database dari form input.
if ($submit=="Tambah") {
    //validasi untuk menghindari data kosong terisi
    if ($nama_bank=="" || $no_rekening=="" || $atas_nama=="") {
        echo "<script>alert('isikan data dengan lengkap!'); </script>";
    } else {
        if(strlen($logo_bank)>0){
            if(is_uploaded_file($_FILES['logo_bank']['tmp_name'])){
                move_uploaded_file($_FILES['logo_bank']['tmp_name'],"../administrator/foto/bank/".$logo_bank);
            }
        }
    
        $tambah="INSERT INTO bank VALUES ('','$nama_bank','$no_rekening','$atas_nama','$logo_bank')";
        $q=mysql_query($tambah);
        //keterangan jika sudah berhasil menambah data (INSERT data)
        if ($q) {
            echo "<script>alert('data berhasil ditambahkan!'); </script>";
        } else {
            echo "<script>alert('data gagal ditambahkan!'); </script>";
        }
        echo "<meta http-equiv='refresh' content='0; URL=?page=bank'>";
    }
    //jika value dari tombol submit adalah "Update", maka mengapdet data
} elseif ($submit=="Edit") {
        if(strlen($logo_bank)>0){
            if(is_uploaded_file($_FILES['logo_bank']['tmp_name'])){
                  move_uploaded_file($_FILES['logo_bank']['tmp_name'],"../administrator/foto/bank/".$logo_bank);
            }
            
            mysql_query("update bank set logo_bank='$logo_bank' where kd_bank='$id'");
        }

            $update=mysql_query("UPDATE bank SET nama_bank='$nama_bank', no_rekening='$no_rekening', atas_nama='$atas_nama' WHERE kd_bank='$id'") or die (mysql_error());

            //keterangan jika sudah berhasil mengupdate data (UPDATE data)
            if ($update) {
                echo "<script>alert('data berhasil diupdate!'); </script>";
            } else {
                echo "<script>alert('data gagal diupdate!'); </script>";
            }
            echo "<meta http-equiv='refresh' content='0; URL=?page=bank'>";
}


//jika variabel URL mod berisi : "edit_prestasi" maka form isinya dari database
if ($mod=="e-bank") {
    $isi_edit        = mysql_query("SELECT * FROM bank WHERE kd_bank='$id'") or die (mysql_error());
    $data            = mysql_fetch_array($isi_edit);
    $n               = $data[1];
    $no              = $data[2];

    $ket              ="Edit";
    $atas_nama        = $data[3];
    $nama_bank        = $n;
    $no_rekening      = $no;
    $logo_bank        = $data[4];
    $submit           ="Edit";
//jika variabel URL mod berisi : "input_prestasi" maka form isinya KOSONG (diisi user)
} else if ($mod=="i-bank") {
    $ket            ="Tambah";
    $nama_bank      ="";
    $no_rekening    ="";
    $atas_nama      ="";
    $logo_bank      ="";
    $submit         ="Tambah";
}

?>
<div class="row">
<div class="col-md-8">
<div class="content">
  <div class="tab-pane" id="formcontrols">
    <form id="administrator" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="control-group">
            <label class="control-label"> Nama Bank </label>
                <div class="controls">
                    <input type="text" name="nama_bank" class="form-control" value="<?php echo $nama_bank; ?>" required>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label"> No Rekening </label>
                <div class="controls">
                    <input type="text" name="no_rekening" class="form-control" value="<?php echo $no_rekening; ?>" required>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label"> Atas Nama </label>
                <div class="controls">
                    <input type="text" name="atas_nama" class="form-control" value="<?php echo $atas_nama; ?>" required>
                </div>
        </div>

        <div class="control-group">                     
            <label class="control-label" for="foto">Logo Bank</label>
                <div class="controls">
                    <?php if($_GET['id']){
                        echo "<img src='../administrator/foto/bank/$data[logo_bank]' width=150 height=110> <br />";
                        } 
                    ?>
                    <br>
                    
                    <input type="file" class="form-control" id="logo_bank" name="logo_bank" accept="image/*">
                </div> <!-- /controls -->       
        </div> <!-- /control-group -->

        <br>
        <div class="form-actions">
            <button name="submit" type="submit" class="btn btn-primary" value="<?php echo $submit; ?>"><i class="fa fa-save"></i> <?php echo $submit; ?></button>
            <button type="reset" class="btn btn-primary"><a href="?page=info" style="color:#fff;"><i class="fa fa-remove"></i> Batal </a></button>
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