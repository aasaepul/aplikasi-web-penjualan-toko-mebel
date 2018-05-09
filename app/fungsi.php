<?php
function rupiah($nilai, $pecahan = 0) {
    return number_format($nilai, $pecahan, ',', '.');
}

function random($panjang) {
   $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
   $string = '';
   for($i = 0; $i < $panjang; $i++) {
   $pos = rand(0, strlen($karakter)-1);
   $string .= $karakter{$pos};
   }
   return $string;
}

function cart_content(){
	$ct_content = array();
	$session_id = session_id();
	$sql = mysql_query("SELECT keranjang.*, barang.*, barang.harga_jual AS bayar FROM keranjang, barang WHERE session_id = '$session_id' AND barang.kd_barang = keranjang.kd_barang AND keranjang.id_registrasi='$_SESSION[id_registrasi]'");
	while ($r=mysql_fetch_array($sql)){
		$ct_content[] = $r;	
	}
	return $ct_content;
}

/*function cart_req(){
  $ctreq_content = array();
  $session_id_req = session_id();
  $qcart_req = mysql_query("SELECT keranjang_req.*, keranjang_req.bayar AS bayar FROM keranjang_req WHERE keranjang_req.session_id = '$session_id_req' AND keranjang_req.id_registrasi='$_SESSION[id_registrasi]'");
  while ($rqcart_req=mysql_fetch_array($qcart_req)){
    $ctreq_content[] = $rqcart_req; 
  }
  return $ctreq_content;
}*/
?>