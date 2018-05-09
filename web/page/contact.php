<?php
	echo '<h2 class="title text-center"> Kode Transaksi </h2>';
    echo '<div class="alert alert-success"> <i class="fa fa-check"></i> Selamat Transaksi Berhasil !</div>';
    echo '<table class="table table-responsive">';  
    echo '<tr>';
    echo '<td colspan="6" style="text-align:center;background-color:#B81D22;color:#fff;font-weight:bold;font-size:18px;"> Kode Transaksi </th>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="6" style="color:green;font-size:35px;font-family:times new roman;text-align:center;font-weight:bold;"> '.$kd_transaksi.' </td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="4"></td>';
    echo '<td style="color:red;font-family:times;font-size:18px;font-weight:bold;"> WARNING ! </td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="4"></td>';
    echo '<td style="font-family:times;font-size:15px;color:#000;"> 
            <ul>
                <li>Simpan atau salin <b> Kode Transaksi </b> di atas guna untuk melakukan konfirmasi.</li>
                <li>Silahkan melakukan transfer uang secara offline (via ATM) untuk melakukan pembayaran sesuai jumlah yang tertera di bawah.</li>
                <li>Foto struct bukti transfer</i>
                <li>Setelah melakukan transfer jangan lupa lakukan konfirmasi </li>
			</ul>
		  </td>';
    echo '</tr>';


    echo '<tr>';
    echo '<td colspan="4"></td>';
    echo '<td style="font-family:times;font-size:18px;font-weight:bold;"> Jumlah yang harus di transfer : <br><br> Rp. '.rupiah($rtotal['total']).'</td>';
    echo '</tr>';

    echo '</table>';

    echo '<table>';
    echo '<form action="cet-bukti-pemesanan" method="POST"';
    echo '<tr>';
    echo '<td colspan="4"><input type="hidden" name="kd_transaksi" value="'.$kd_transaksi.'"></td>';
    echo '<td><input type="submit" class="btn btn-primary btn-block" name="cetak" value="Cetak Bukti Pemesanan"></td>';
    echo '</tr>';
    echo '</form>';
    echo '</table>';

    ?>