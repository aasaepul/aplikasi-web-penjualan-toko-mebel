<?php

$m=$_GET['m'];


if(@$_GET['p']=="page" && $m=="profil") {
	include ("web/page/tab_profil.php");
	}

elseif(@$_GET['p']=="page" && $m=="artikel") {
	include ("web/page/news.php");
	}

elseif(@$_GET['p']=="page" && $m=="about") {
	include ("web/page/about.php");
	}

elseif(@$_GET['p']=="page" && $m=="detail") {
	include ("web/page/preview.php");
	}

elseif(@$_GET['p']=="page" && $m=="cara-pesan") {
	include ("web/page/cara-pesan.php");
	}

elseif(@$_GET['p']=="page" && $m=="det_news") {
	include ("web/page/det_news.php");
	}

elseif(@$_GET['p']=="page" && $m=="konfirmasi") {
	include ("web/page/konfirmasi.php");
	}

elseif(@$_GET['p']=="page" && $m=="register") {
	include ("web/page/registrasi.php");
	}

elseif(@$_GET['p']=="page" && $m=="category") {
	include ("web/page/kategori.php");
	}

elseif(@$_GET['p']=="page" && $m=="det_cart") {
	include ("web/page/det_cart.php");
	}

elseif(@$_GET['p']=="page" && $m=="u_profil") {
	include ("web/page/u_profil.php");
	}

elseif(@$_GET['p']=="page" && $m=="login") {
	include ("web/page/login.php");
	}

elseif(@$_GET['p']=="page" && $m=="tab") {
	include ("web/page/tab.php");
	}

elseif(@$_GET['p']=="page" && $m=="lupa_pass") {
	include ("web/page/lupa_pass.php");
	}

elseif(@$_GET['p']=="page" && $m=="fpass") {
	include ("web/page/reset_pass.php");
	}

elseif(@$_GET['p']=="page" && $m=="news") {
	include ("web/page/news.php");
	}

elseif(@$_GET['p']=="page" && $m=="kirim") {
	include ("aksi/act_order.php");
	}

else {
	include ("web/page/404.php");
}
?>