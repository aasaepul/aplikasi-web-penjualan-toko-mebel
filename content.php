<?php

if(@$_GET['p']=="home") {
	include ("web/page/depan.php");
	}

elseif(@$_GET['p']=="produk") {
	include ("web/page/product.php");
	}

elseif(@$_GET['p']=="kategori") {
	include ("web/page/kategori.php");
	}

elseif(@$_GET['p']=="page") {
	include ("home-2.php");
	}

elseif(@$_GET['p']=="act_registrasi") {
	include ("aksi/act_registrasi.php");
	}

elseif(@$_GET['p']=="act_login") {
	include ("aksi/act_login.php");
	}

elseif(@$_GET['p']=="logout") {
	include ("aksi/act_logout.php");
	}

elseif(@$_GET['p']=="add_cart") {
	include ("aksi/act_cart.php");
	}

elseif(@$_GET['p']=="act_profil") {
	include ("aksi/act_profil.php");
	}

elseif(@$_GET['p']=="act_confirm") {
	include ("aksi/act_confirm.php");
	}

elseif(@$_GET['p']=="act_forgotpass") {
	include ("aksi/act_forgotpass.php");
	}


else {
	include 'web/page/404.php';
	}


/*
	if ($page_name=='') {
		include $browser_t.'/depan.php';
		}
	elseif ($page_name=='index') {
		include $browser_t.'/depan.php';
		}
	elseif ($page_name=='preview') {
		include $browser_t.'/preview.php';
		}
	elseif ($page_name=='about') {
		include $browser_t.'/about.php';
		}
	elseif ($page_name=='delivery') {
		include $browser_t.'/delivery.php';
		}
	elseif ($page_name=='news') {
		include $browser_t.'/news.php';
		}
	elseif ($page_name=='produk') {
		include $browser_t.'/produk.php';
		}
	elseif ($page_name=='contact') {
		include $browser_t.'/contact.php';
		}
	elseif ($page_name=='contact-post') {
		include 'app/contact.php';
		}
	else
		{
		include $browser_t.'/404.php';
		}
*/

	?>