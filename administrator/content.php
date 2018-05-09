<?php
	
	/* Dashboard*/
	if(@$_GET['page'] == "dashboard") { include ("depan.php");}

	/* Profil */
	else if(@$_GET['page'] == "profil") { include ("content/profil/profil.php");}

	/* Profil */
	else if(@$_GET['page'] == "registrasi") { include ("content/registrasi/registrasi.php");}
	
	/* Artikel */
	else if(@$_GET['page'] == "info") { include ("content/info/info.php");}

	/* Bank */
	else if(@$_GET['page'] == "bank") { include ("content/bank/bank.php");}

	/* Kategori */
	else if(@$_GET['page'] == "kategori") { include ("content/kategori/kategori.php");}

	/* Kurir */
	else if(@$_GET['page'] == "kurir") { include ("content/kurir/kurir.php");}

	/* Kurir */
	else if(@$_GET['page'] == "ongkir") { include ("content/ongkir/ongkir.php");}

	/* Kota */
	else if(@$_GET['page'] == "kota") { include ("content/kota/kota.php");}

	/* Provinsi */
	else if(@$_GET['page'] == "provinsi") { include ("content/provinsi/provinsi.php");}

	/* Barang */
	else if(@$_GET['page'] == "barang") { include ("content/barang/barang.php");}

	/* Suplier */
	else if(@$_GET['page'] == "suplier") { include ("content/suplier/suplier.php");}

	/* Pelanggan */
	else if(@$_GET['page'] == "administrator") { include ("content/administrator/administrator.php");}

	/* Penjualan */
	else if(@$_GET['page'] == "trans_penjualan") { include ("content/trans_penjualan/trans_penjualan.php");}

	/* act Penjualan */
	else if(@$_GET['page'] == "act-penjualan") { include ("content/trans_penjualan/act-penjualan.php");}

	/* act Penjualan */
	else if(@$_GET['page'] == "detail-penjualan") { include ("content/trans_penjualan/detail-penjualan.php");}

	/* act Penjualan */
	else if(@$_GET['page'] == "trans_penjualan_masuk") { include ("content/trans_penjualan/trans_penjualan_masuk.php");}

	/* Pemesanan */
	else if(@$_GET['page'] == "trans_pemesanan") { include ("content/pemesanan/pemesanan.php");}

	/* Konfirmasi */
	else if(@$_GET['page'] == "konfirmasi") { include ("content/konfirmasi/konfirmasi.php");}

	/* act Konfirmasi */
	else if(@$_GET['page'] == "act-konfirmasi") { include ("content/konfirmasi/act_konfirmasi.php");}

	/* Proses Login */
	else if(@$_GET['page'] == "proses-login-admin") { include ("proses_login_administrator.php");}

	/* Cek Sok Barang */
	else if(@$_GET['page'] == "cek-stok-barang") { include ("content/stok_barang/stok-barang.php");}

	/* Cek Sok Barang */
	else if(@$_GET['page'] == "u-pass") { include ("ubah-pass.php");}

?>