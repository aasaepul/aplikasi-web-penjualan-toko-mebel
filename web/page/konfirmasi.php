<?php

if ($_SESSION['hak_akses'] == "user") {

echo '<div class="section group">';
echo '<div class="cont-desc span_1_of_2">';
echo '<ul class="back-links">';
echo '<li><a href="#">Home</a> ::</li>';
echo '<li> Konfirmasi pembayaran</li>';
echo '<div class="clear"> </div>';
echo '</ul>';

echo '<p><br></p>';

    echo '<div class="alert alert-warning">';
    echo '<label style="font-weight:bold;"> Catatan : </label>';
    echo '<p>&nbsp;</p>';
    echo '<ul style="text-align:justify;">';
    echo '<li> 1. Isilah <b style="color:red;">Kode Transaksi</b> dengan kode transaksi yang anda dapatkan ketika melakukan pemesanan.</li>';
    echo '<li> 2. <b style="color:red;">Unggah</b>-lah gambar struk atau  bukti transfer anda.</li>';
    echo '<li> 3. Isilah jumlah transfer sesuai dengan nominal yang memang sudah anda transfer atau sesuai dengan pembayaran yang telah ditentukan.</li>';
    echo '</ul>';

echo '</div>';

echo '<div class="product-details">';
echo '<div class="contact-form">';
echo '<form method="post" action="?p=act_confirm" enctype="multipart/form-data">';
echo '<div>';
echo '<input name="kd_transaksi" type="text" class="textbox textbox1" placeholder="Kode Transaksi..." required>';
echo '<select name="kd_bank" class="textbox textbox1" required>';
    echo '<option>Pilih Bank Tujuan</option>';
    $qkat_barang = "SELECT * FROM bank";
    $dkat_barang = mysql_query ($qkat_barang);
        while ($hasil = mysql_fetch_array ($dkat_barang)) {
        $pilih = ($data['kd_bank']==$hasil['kd_bank'])?"selected" : "";
        echo "<option value=\"$hasil[kd_bank]\" $pilih style='color:orange;font-weight:bold;'>$hasil[nama_bank]</option>";
    }
    echo '</select><br>';                            
echo '<div class="clear"></div>';
echo '</div>';

echo '<div>';
echo '<label id="jml_bayar" style="float:left;margin-left:5px;color:red;font-weight:bold;"></label>';
echo '<div class="clear"></div>';
echo '</div>';

echo '<div>';
?>

<input type="text" class="textbox textbox1" placeholder="Jumlah Bayar..." name="jml_bayar" id="jml_bayar" onkeyup="document.getElementById('jml_bayar').innerHTML = formatCurrency(this.value);" required>

<?php
echo '<input name="bukti" type="file" class="textbox textbox1" placeholder="Unggah File..." accept="image/*" required> ';
echo '<div class="clear"></div>';
echo '</div>';

echo '<div>';
echo '<input type="hidden" name="id_registrasi" value="'.$_SESSION[id_registrasi].'">';
echo '<div class="clear"></div>';
echo '</div>';

if($e){echo $e;}
echo '<p style="float:left;"><img src="captcha/captcha.php" /></p>';

echo '<div class="clear"></div>';
echo '<div>';
echo '<input name="captcha" type="text" class="textbox textbox1" placeholder="Masukkan Kode di Atas..." required>';
echo '<div class="clear"></div>';
echo '</div>';

echo '<div>';
echo '<div class="alert alert-warning"> Pastikan data anda lengkap dan benar sebelum anda kirim ! </div>';
echo '<br>';
echo '<input type="submit" value="Kirim"  onclick="totbayar()" name="konfirmasi" class="mybutton-login">';
echo '<div class="clear"></div>';
echo '</div>';

echo '<div>';
echo '<div class="clear"></div>';
echo '</div>';
echo '</div>';
echo '</form>';
echo '<div class="clear"></div>';
echo '</div>';
echo '</div>';

} else {
        echo "<script> alert('Untuk melakukan Konfirmasi Anda harus Registrasi terlebih dahulu atau Login (jika telah melakukan registrasi) !'); window.location.href='?p=page&m=login';</script>";
    }
?>