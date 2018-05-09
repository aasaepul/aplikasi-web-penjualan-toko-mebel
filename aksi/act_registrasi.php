<?php
session_start();
$session_id = session_id();
include "administrator/app/conn.php";

if (isset($_POST['register'])){
    if($_POST['captcha'] == $_SESSION['captcha']){
        $nama_depan=trim(strip_tags($_POST['nama_depan'])); 
        $nama_belakang=trim(strip_tags($_POST['nama_belakang']));  
        $email=trim(strip_tags($_POST['email']));
        $no_telp=trim(strip_tags($_POST['no_telp']));
        $alamat=trim(strip_tags($_POST['alamat']));
        $username=trim(strip_tags($_POST['username']));
        $password=md5($_POST['password']);
        $hak_akses=trim(strip_tags($_POST['hak_akses']));
                
        $cek_username=mysql_num_rows(mysql_query("SELECT username FROM registrasi WHERE username='$_POST[username]'"));
  
        if(strlen($_POST['password']) <= 5  ){
             echo "<script>alert('Maaf Password minimal 6 karakter');javascript:history.go(-1);</script>";
        } 

        elseif (!is_numeric($no_telp)){
             echo "<script>alert('Maaf No Telepon/HP Harus berupa ANGKA'); javascript:history.go(-1);</script>";
        }

        // Kalau username sudah ada yang pakai
        elseif ($cek_username > 0){
              echo "<script>alert('Maaf Username telah digunakan ! Ulangi lagi.');javascript:history.go(-1);</script>"; 
        
        } else{

        mysql_query("INSERT INTO registrasi VALUES ('','$nama_depan','$nama_belakang','$email', '$no_telp', '$alamat', '$username', '$password','$hak_akses')") or die(mysql_error());  

        $user = mysql_real_escape_string(htmlentities($_POST['username']));
        $pass = mysql_real_escape_string(htmlentities(md5($_POST['password'])));

        $sql = mysql_query("SELECT * FROM registrasi WHERE username='$user' AND password='$pass'") or die(mysql_error());      
        
        if ($row = mysql_fetch_assoc($sql)){
            $_SESSION['user']=$user;
            $_SESSION['id_registrasi']=$row['id_registrasi'];
            $_SESSION['pass']=$pass;
            $_SESSION['hak_akses']=$row['hak_akses'];
            $_SESSION['nama_depan']=$row['nama_depan'];
            $_SESSION['nama_belakang']=$row['nama_belakang'];
            $_SESSION['alamat']=$row['alamat'];
            $_SESSION['email']=$row['email'];
            $_SESSION['no_telp']=$row['no_telp'];

            $ukeranjang = mysql_query("UPDATE keranjang SET id_registrasi = '$_SESSION[id_registrasi]' WHERE session_id = '$session_id'"); 
            $dkeranjang = mysql_num_rows($ukeranjang);
            if ($dkeranjang > 1) {
                echo '<script language="javascript">document.location="?p=page&m=det_cart";</script>';
            } else {
                echo '<script language="javascript">document.location="?p=page&m=tab";</script>';
            }
        }else{
            echo '<script language="javascript">alert("Maaf Registrasi Anda gagal !"); document.location="?p=page&m=register";</script>';
        }
        }
    } else {
        echo '<script language="javascript">alert("Maaf Registrasi Anda gagal, Lengkapi data dan tidak boleh ada yang kosong !"); document.location="?p=page&m=register";</script>';
    }
  }
?>