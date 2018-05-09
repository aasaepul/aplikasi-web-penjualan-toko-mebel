<?php
	if(!isset($_SESSION['username'])) {
		echo "<script>alert('Untuk Masuk Kehalaman Dashboard Anda Harus Login !'); window.open('index.php','_self');</script>";
	}
	elseif($_SESSION['level'] == "petugas") {
		echo "<script>alert('Mohon Maaf Anda Bukan Petugas'); window.open('index.php','_self'); </script>";
	}
	elseif($_SESSION['level' == "pemilik"]) {
		echo "<script>alert('Mohon Maaf Anda Bukan Owner !'); window.open('index.php','_self'); </script>";
	}
?>