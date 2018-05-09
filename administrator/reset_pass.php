<?php
$acode = $_GET['email'];
if(isset($_POST['pass1'])==isset($_POST['pass2']) && isset($_POST['simpan'])){
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysql_connect_error();
    }
    $query = mysql_query("select * from akun where email='$acode'") or die("Gagal Email"); 
    if (mysql_num_rows ($query)==1) {
        $query3 = mysql_query("update akun set password='$pass1' where email='$acode'") or die("Gagal Update password"); 
        echo 'Password Berhasil Diubah, silahkan Login Sekarang.';
                if($query3){
                    echo "<script>window.location.assign('index.php');</script>";
                }
    } else {
        echo 'Maaf ada yang salah.';

    }
}
?>

<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Reset <i>Password</i> </h4>
            </div>

            </div>
            <form method="POST" action="">
            <div class="row">
                <div class="col-md-6">
                    <h4> Lupa <strong><b>Password Anda ? </b></strong></h4>
                        <br />
                            <label><i class="glyphicon glyphicon-mail"></i> Masukkan Password Baru : </label>
                            <input type="email" class="form-control" name="pass1"/>
                            <label><i class="glyphicon glyphicon-mail"></i> Konfirmasi Password Baru : </label>
                            <input type="email" class="form-control" name="pass2"/>
                            <hr />
                            <input type="submit" class="btn btn-info" name="simpan" Value="Kirim">  
                </div>
            </div>
            </form>
            </div>
    </div>
</div>
    <!-- CONTENT-WRAPPER SECTION END-->