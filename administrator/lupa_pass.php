<?php 
error_reporting(0);

if(isset($_POST['kirim'])){
    $email=trim(strip_tags($_POST['email'])); 

    $query = mysql_query("select * from akun where email='$email'")or die("Gagal Members"); 
    if (mysql_num_rows ($query)==1) {
        $message="Klik link untuk aktivasi reset password Anda link is: http://putrapandansari.esy.es/administrator/reset_pass.php?email=$email";
        mail($email, "Putra Pandansari You Activation", $message);
        echo '<script>alert("Kami telah mengirimkan link untuk aktivasi reset password Anda, Cek inbox/spam Email Anda.");</script>';
    } else{
        echo '<script>alert("Maaf akun tidak ditemukan. Ulangi, Masukkan Email Anda yang terdaftar");</script>';

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
            <form method="POST" action="proses_forgotpass.php">
            <div class="row">
                <div class="col-md-6">
                    <h4> Lupa <strong><b>Password Anda ? </b></strong></h4>
                        <br />
                        <label><i class="glyphicon glyphicon-mail"></i> Masukkan Email Terdaftar: </label>
                        <input type="email" class="form-control" name="email" required/>
                        <hr />
                        <input type="submit" class="btn btn-info" name="kirim" Value="Kirim"> 
                        <button type="reset" class="btn btn-info"><a href="index.php" style="color:#fff;">Kembali</a></button>
                </div>
                
                <!--<div class="col-md-6">
                    <div class="alert alert-info">
                         Selamat datang <b> Administrator </b> TOKO MEBEL PUTRA PANDANSARI.
                        <br />
                         <strong> Peringatan :</strong>
                        <ul>
                            <li>
                                Benar
                            </li>
                            <li>
                                Adil
                            </li>
                            <li>
                                Amanah
                            </li>
                            <li>
                                Jujur.
                            </li>
                        </ul>
                       
                    </div>
                    <div class="alert alert-success">
                         <strong> Syarat dan Ketentuan:</strong>
                        <ul>
                            <li>
                               Masuklah sebagai administrator terdaftar
                            </li>
                            <li>
                               Kelola data konten sebaik - baiknya
                            </li>
                            <li>
                               Ikuti perintah sesuai aturan
                            </li>
                            <li>
                               Jangan merusak konten
                            </li>
                        </ul>
                       
                    </div>
                -->
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->