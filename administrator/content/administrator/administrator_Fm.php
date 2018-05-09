<?php
session_start();
if (($_SESSION['level'] == "pemilik") || ($_SESSION['level'] == "admin")) {
//POSTKAN variabel yang akan diinputkan ke database, berasal dari form di bawah ini
$submit           = empty($_POST['submit']) ? "" : $_POST['submit'];
$username         = empty($_POST['username']) ? "" : $_POST['username']; 
$password         = empty($_POST['password']) ? "" : md5($_POST['password']);
$nama_lengkap     = empty($_POST['nama_lengkap']) ? "" : $_POST['nama_lengkap'];
$alamat           = empty($_POST['alamat']) ? "" : $_POST['alamat'];
$email            = empty($_POST['email']) ? "" : $_POST['email'];
$level            = empty($_POST['level']) ? "" : $_POST['level'];
$foto             = $_FILES['foto']['name'];

$mod            = isset($_GET['mod']) ? $_GET['mod'] : "";
$id             = isset($_GET['id']) ? $_GET['id'] : "";

//jika value dari tombol submit adalah "Tambah" maka diinsertkan data ke database dari form input.
if ($submit=="Tambah") {
    //validasi untuk menghindari data kosong terisi
    if ($username=="" || $password=="" || $nama_lengkap=="" || $level=="" || $email=="") {
        echo "<script>alert('isikan data dengan lengkap!'); </script>";
    } else {
            if(strlen($foto)>0){
                if(is_uploaded_file($_FILES['foto']['tmp_name'])){
                    move_uploaded_file($_FILES['foto']['tmp_name'],"../administrator/foto/administrator/".$foto);
                }
            }

        $tambah="INSERT INTO akun VALUES ('','$nama_lengkap','$email','$username','$password','$foto','$alamat','$level')";
        $q=mysql_query($tambah);
        //keterangan jika sudah berhasil menambah data (INSERT data)
        if ($q) {
            echo "<script>alert('data berhasil ditambahkan!'); </script>";
        } else {
            echo "<script>alert('data gagal ditambahkan!'); </script>";
        }
        echo "<meta http-equiv='refresh' content='0; URL=?page=administrator'>";
    }
    //jika value dari tombol submit adalah "Update", maka mengapdet data
} elseif ($submit=="Edit") {
        $cek = mysql_query("SELECT password FROM akun WHERE id_akun='$id'");
        $rcek = mysql_fetch_assoc($cek);

        if(strlen($foto)>0 && $_POST['password'] == $rcek['password']){
            if(is_uploaded_file($_FILES['foto']['tmp_name'])){ 
                  move_uploaded_file($_FILES['foto']['tmp_name'],"../administrator/foto/administrator/".$foto);
            }
            
            mysql_query("update akun set foto='$foto' where id_akun='$id'");
        }

            $update=mysql_query("UPDATE akun SET nama_lengkap='$nama_lengkap', email='$email', username='$username', alamat='$alamat', level='$level'  WHERE id_akun='$id'") or die (mysql_error());

            //keterangan jika sudah berhasil mengupdate data (UPDATE data)
            if ($update) {
                echo "<script>alert('data berhasil diupdate!'); </script>";
            } else {
                echo "<script>alert('data gagal diupdate!'); </script>";
            }
            echo "<meta http-equiv='refresh' content='0; URL=?page=administrator'>";
}


//jika variabel URL mod berisi : "edit_prestasi" maka form isinya dari database
if ($mod=="e-akun") {
    $isi_edit       = mysql_query("SELECT * FROM akun WHERE id_akun='$id'") or die (mysql_error());
    $data           = mysql_fetch_array($isi_edit);
    $e              = $data[2];
    $u              = $data[3];
    $p              = $data[4];

    $ket              ="Edit";
    $nama_lengkap     = $data[1];
    $foto             = $data[5];
    $email            = $e;
    $username         = $u;
    $password         = $p;
    $alamat           = $data[6];
    $level            = $data[7];
    $submit           ="Edit";
//jika variabel URL mod berisi : "input_prestasi" maka form isinya KOSONG (diisi user)
} else if ($mod=="i-akun") {
    $ket            ="Tambah";
    $nama_lengkap   ="";
    $email          ="";
    $username       ="";
    $password       ="";
    $nama           ="";
    $foto           ="";
    $level          ="";
    $submit         ="Tambah";
}

?>
<div class="row">
<div class="col-md-8">
<div class="content">
  <div class="tab-pane" id="formcontrols">
    <form id="administrator" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="control-group">
            <label class="control-label"> Nama Lengkap </label>
                <div class="controls">
                    <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $nama_lengkap; ?>" required>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label"> Email </label>
                <div class="controls">
                    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label"> Username </label>
                <div class="controls">
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" required>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label"> Password </label>
                <div class="controls">
                    <?php if ($mod =='e-akun') {
                    ?>
                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" readonly="readonly" required>
                    <?php } else if ($mod == 'i-akun') {
                    ?>
                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" required>
                    <?php
                    }
                    ?>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label"> Alamat </label>
                <div class="controls">
                    <textarea name="alamat" class="form-control" rows="5" cols="4" required><?php echo $alamat; ?></textarea>
                </div>
        </div>

                    
        <div class="control-group">                     
            <label class="control-label" for="foto">Gambar</label>
                <div class="controls">
                    <?php if($_GET['id']){
                        echo "<img src='../administrator/foto/administrator/$data[foto]' width=150 height=110> <br />";
                        } 
                    ?>
                    <br>
                    
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                </div> <!-- /controls -->       
        </div> <!-- /control-group -->

        <div class="control-group">
            <label class="control-label"> Level </label>
                <div class="controls">
                    <select name="level" class="form-control" required>
                        <?php
                        if ($mod=="e-akun") {
                        ?>
                            <option value="<?php echo $level; ?>"> <?php echo $level; ?></option>
                        <?php
                        } else if ($mod=="i-akun"){
                        ?>
                            <option value="">-- Pilih Hak Akses --</option> 
                            <option value="admin">Admin</option>
                            <option value="pemilik">Pemilik</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
        </div>
 
        <br>
        <div class="form-actions">
            <button name="submit" type="submit" class="btn btn-primary" value="<?php echo $submit; ?>"><i class="fa fa-save"></i> <?php echo $submit; ?></button>
            <button type="reset" class="btn btn-primary"><a href="?page=artikel" style="color:#fff;"><i class="fa fa-remove"></i> Batal </a></button>
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