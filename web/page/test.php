<?php
    echo '<div class="section group">';
    echo '<div class="cont-desc span_1_of_2">';
    echo '<ul class="back-links">';
    echo '<li><a href="#">Home</a> ::</li>';
    echo '<li>Info pemesanan</li>';
    echo '<div class="clear"> </div>';
    echo '</ul>';
    
    echo '<div class="product_desc">';
    echo '<div id="horizontalTab">';
    echo '<ul class="resp-tabs-list">';
    echo '<li><i class="fa fa-info"></i> Info Pemesanan Barang </li>';
    echo '<div class="clear"></div>';
    echo '</ul>';

    echo '<div class="resp-tabs-container">';
    echo '<div class="product-specifications">';
    echo '<div class="alert alert-success"> <center><i class="fa fa-check"></i>Selamat Pesanan Anda Berhasil Terkirim !</center></div>';
    echo '<table class="table table-responsive">';  
    echo '<tr>';
    echo '<td colspan="6" style="text-align:center;background-color:#B81D22;color:#fff;font-weight:bold;font-size:18px;"> Kode Transaksi </th>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="5">&nbsp;</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="6" style="color:green;font-size:35px;font-family:times new roman;text-align:center;font-weight:bold;border:1px solid #ddd;"> '.$kd_transaksi.' </td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="5">&nbsp;</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="4"></td>';
    echo '<td style="color:red;font-family:times;font-size:18px;font-weight:bold;"> PENTING ! </td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="4"></td>';
    echo '<td style="font-family:times;font-size:18px;color:#000;"> 
            <ul>
                <li>Simpan atau salin <b> Kode Transaksi </b> di atas guna untuk melakukan konfirmasi.</li>
                <li>Silahkan melakukan transfer uang secara offline (via ATM) untuk melakukan pembayaran sesuai jumlah yang tertera di bawah.</li>
                <li>Gunakan No Rekening tujuan sesuai dengan yang ada di halaman Website</li>
                <li>Foto struct bukti transfer</i>
                <li>Setelah melakukan transfer jangan lupa lakukan konfirmasi </li>
                <li>Pesanan akan diproses setelah melakukan konfirmasi. Sebagai catatan jika tidak melakukan konfirmasi selama >= 3 Hari pesanan dinyatakan BATAL dan pihak pembeli dinyatakan setuju untuk membatalkan pemesanan barang.</li>
			</ul>
		  </td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="5"><center><img src="asset/images/pengiriman.png"></center></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="5">&nbsp;</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td colspan=5">&nbsp;</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td colspan="4"></td>';
    echo '<td style="font-family:times;font-size:18px;font-weight:bold;"> Jumlah yang harus di transfer : <br><br> Rp. '.rupiah($rtotal['total']).'</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="5">&nbsp;</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td colspan=5">&nbsp;</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td colspan="4"></td>';
    echo '<td style="font-family:times;font-size:15px;"> Silahkan melakukan transfer melalui bank yang anda pilih. </td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan=5">&nbsp;</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan=5">Pengiriman melalui : </td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="5"><img src="asset/LOGO-JNE.jpg" width="100" height="80"></td>';
    echo '</tr>';

    echo '</table>';
                          
    echo '<div class="clear"></div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
?>