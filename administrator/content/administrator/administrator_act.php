<?php


if (isset($_POST['submit'])) {

//Pem-Variabelan
$username         = empty($_POST['username']) ? "" : $_POST['username']; 
$password         = empty($_POST['password']) ? "" : md5($_POST['password']);
$nama_lengkap     = empty($_POST['nama_lengkap']) ? "" : $_POST['nama_lengkap'];
$alamat           = empty($_POST['alamat']) ? "" : $_POST['alamat'];
$email            = empty($_POST['email']) ? "" : $_POST['email'];
$level            = empty($_POST['level']) ? "" : $_POST['level'];
$foto             = $_FILES['foto']['name'];

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
            echo "<script>alert('Selamat Pendaftaran Administrator Anda berhasil ditambahkan!'); </script>";
        } else {
            echo "<script>alert('Data gagal ditambahkan!'); </script>";
        }
        echo "<meta http-equiv='refresh' content='0; URL=f_utama.php?page=login'>";
    }
}

$qpemilik = mysql_query("SELECT * FROM akun WHERE level = 'pemilik'");
$tpemilik = mysql_num_rows($qpemilik);

if ($tpemilik == 0) {
?>


<form id="administrator" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="control-group">
            <label class="control-label"> Nama Lengkap </label>
                <div class="controls">
                    <input type="text" name="nama_lengkap" class="form-control" required>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label"> Email </label>
                <div class="controls">
                    <input type="email" name="email" class="form-control" required>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label"> Username </label>
                <div class="controls">
                    <input type="text" name="username" class="form-control" required>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label"> Password </label>
                <div class="controls">
                    <input type="password" name="password" class="form-control" required>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label"> Alamat </label>
                <div class="controls">
                    <textarea name="alamat" class="form-control" rows="5" cols="4" required></textarea>
                </div>
        </div>

                    
        <div class="control-group">                     
            <label class="control-label" for="foto">Gambar</label>
                <div class="controls">
                    <br>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                </div> <!-- /controls -->       
        </div> <!-- /control-group -->

        <div class="control-group">
            <label class="control-label"> Level </label>
                <div class="controls">
                    <select name="level" class="form-control" required>
                        <option value="">-- Pilih Hak Akses --</option> 
                        <option value="admin">Admin</option>
                        <option value="pemilik">Pemilik</option>
                    </select>
                </div>
        </div>
 
        <br>
        <div class="form-actions">
            <button name="submit" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan </button>
            <button type="reset" class="btn btn-primary"><i class="fa fa-remove"></i> Batal </button>
        </div>
        </form>
<?php
} else {
    echo 'Maaf daftar akun ini hanya dapat menambahkan akun untuk Pemilik Toko saja.';
    echo '<br />';
    echo '<p style="font-weight:bold;color:red;"> Pemilik Toko sudah Terdaftar. </p>';
}