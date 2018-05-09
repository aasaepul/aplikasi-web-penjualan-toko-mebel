<?php
session_start();
include "administrator/app/conn.php";

if (isset($_POST['u_user'])) {
	$nama_depan		=trim(strip_tags($_POST['nama_depan']));
	$nama_belakang	=trim(strip_tags($_POST['nama_belakang']));
	$email  		=trim(strip_tags($_POST['email']));
	$no_telp 		=trim(strip_tags($_POST['no_telp']));
	$alamat			=trim(strip_tags($_POST['alamat']));
  $username   =trim(strip_tags($_POST['username']));
	$id_registrasi 	=$_SESSION['id_registrasi'];

	$qprofil = mysql_query("UPDATE registrasi SET nama_depan='$nama_depan', nama_belakang='$nama_belakang',email='$email',no_telp='$no_telp',alamat='$alamat',username='$username' WHERE id_registrasi='$id_registrasi'");

	if ($qprofil){
		echo "<script>alert('Data berhasil diubah !'); window.location.href='?p=page&m=tab'</script>";
	} else{
		echo "<script>alert('Data gagal diubah !'); window.location.href='?p=page&m=tab'</script>";
	}

} elseif (isset($_POST['u_pass'])) {

    $pass_lama     = md5($_POST['pass_lama']);
  	$pass_baru 		 = md5($_POST['pass_baru']);
  	$kon_pass_baru = md5($_POST['kon_pass_baru']);
  	$id_registrasi = $_SESSION['id_registrasi'];

  	$qpass 		  = mysql_query("SELECT * FROM registrasi WHERE password='$pass_lama' AND id_registrasi = '$id_registrasi' ") or die (mysql_error()); 

        if (md5($_POST['pass_baru']) !== md5($_POST['kon_pass_baru'])){
            echo "<script>alert('Password baru tidak sesuai. Password baru harus sama dengan konfirmasi password baru'); window.open('?p=page&m=tab', '_self');</script>";
        }
        
      	elseif (mysql_num_rows($qpass) == 1) {

              $dpass = mysql_fetch_array($qpass_ubah);
              $uqpass = "update registrasi set password = '$pass_baru' where id_registrasi ='$id_registrasi'";
              $uqpass_ubah = mysql_query($uqpass);
  
            	  if ($uqpass_ubah) {
              		echo "<script>alert('Password berhasil diubah'); window.open('?p=page&m=tab', '_self');</script>"; 
            	  } else {
              		echo "<script>alert('Password gagal diubah'); window.open('?p=page&m=tab', '_self');</script>"; 
                }
        } else {
          echo "<script>alert('Password lama yang anda masukkan salah'); window.open('?p=page&m=tab', '_self');</script>";
        }

} elseif (isset($_POST['u_diterima'])){

    $kd_transaksi = trim(strip_tags($_POST['kd_transaksi']));

    $ubah = mysql_query("UPDATE trans_penjualan SET status_trans='terkirim' WHERE kd_transaksi = '$kd_transaksi'") or die(mysql_error());
    
    if ($ubah) {
      echo "<script>alert ('Terima Kasih telah membeli produk kami. Anda telah menerima barangnya dari kami.');</script>";
      echo "<script>window.location.href='?p=page&m=tab'</script>";
    } else {
      echo "<script>alert ('Proses barang telah diterima gagal, Coba Lagi.');</script>";
      echo "<script>window.location.href='?p=page&m=tab'</script>";
    }
}
else {
	echo "<script>alert ('Tidak ada yang anda pilih');</script>";
	echo "<script>window.location.href='?p=page&m=tab'</script>";
}

?>