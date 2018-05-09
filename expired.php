<?php
include "administrator/app/conn.php";
	$konf  = mysql_query("select trans_penjualan.tgl_expired,trans_penjualan.tanggapan,konfirmasi.tampil_konfirmasi FROM trans_penjualan,konfirmasi WHERE konfirmasi.tampil_konfirmasi='N' AND trans_penjualan.tgl_expired < now() AND trans_penjualan.tanggapan='menunggu'");
        $nkonf = mysql_num_rows($konf);
        $tkonf = mysql_fetch_assoc($konf);

        if ($nkonf > 0 ) {
            
            mysql_query("UPDATE trans_penjualan SET status_trans='expired' WHERE tanggapan='menunggu' AND tgl_expired < now()");
        }
?>