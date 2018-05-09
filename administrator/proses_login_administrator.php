<?php
include('app/conn.php');

$username = $_POST['username'];
$password = md5($_POST['password']);
$op = $_GET['op'];

$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

if($op=="in"){
    /*$cek1 = mysql_query("SELECT * FROM anggota, topik WHERE anggota.`topik`=topik.`id_topik`");
    $tampil=mysql_num_rows($cek1);
    $tampil2=mysql_fetch_array($cek1);*/

    $cek = mysql_query("SELECT * FROM akun WHERE username='$username' AND password='$password'");
    if(mysql_num_rows($cek)==1){//jika berhasil akan bernilai 1
        $c = mysql_fetch_array($cek);
        $_SESSION['username']         = $c['username'];
        $_SESSION['level']            = $c['level'];
        $_SESSION['nama_lengkap']     = $c['nama_lengkap'];
        $_SESSION['foto']             = $c['foto'];
        $_SESSION['id_akun']          = $c['id_akun'];
        $_SESSION['password']         = $c['password'];

        if($c['level']=="admin"){
            echo "<script language='javascript'>alert('Selamat Anda berhasil Login sebagai ADMIN !'); document.location='home.php?page=dashboard';</script>";
        }else if($c['level']=="pemilik"){
            echo "<script language='javascript'>alert('Selamat Anda berhasil Login sebagai PEMILIK !');document.location='home.php?page=dashboard';</script>";
        }else{
            echo "<script language='javascript'>alert('Username atau Password yang anda masukan masih salah tuh !'); document.location='index.php';</script>";
        }
    }else{
         ?>

    <script type="text/javascript">
              alert("Username atau Password yang anda masukan masih salah tuh !");
              top.location="index.php";
        </script>
    <?php
    }
} 
?>



