<div class="col-sm-6">
	<div class="social-icons pull-left">
	<ul class="nav navbar-nav">
		<li><a href="#"><i class="fa fa-facebook"></i></a></li>
		<li><a href="#"><i class="fa fa-twitter"></i></a></li>
		<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
		<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
		<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
	</ul>
	</div>
</div>

<div class="col-sm-6">
	<div class="shop-menu pull-right">
			<ul class="nav navbar-nav">
				<?php
					if ($_SESSION['hak_akses'] == 'user'){
						$qtuser = mysql_query("SELECT * FROM registrasi WHERE id_registrasi = '$_SESSION[id_registrasi]' ");
                        $rtuser = mysql_fetch_assoc($qtuser);
                ?>
						<li><a href="?p=tab"><i class="fa fa-user"></i> <?php echo $rtuser['nama_depan']; ?></a></li>
						<li><a href="?p=logout" onClick="return confirm('Apakah Anda benar-benar yakin akan keluar?')"><i class="fa fa-power-off"></i> Logout</a></li>
				<?php
					$session_id = session_id();
					$qcart = mysql_query("SELECT * FROM keranjang, barang WHERE keranjang.session_id = '$session_id' AND keranjang.kd_barang = barang.kd_barang AND keranjang.id_registrasi = '$_SESSION[id_registrasi]' ORDER BY keranjang.kd_keranjang DESC");
					$ncart = mysql_num_rows($qcart);
				?>
				<li class="dropdown"><a href="#"><i class="fa fa-shopping-cart"></i>Keranjang : <?php echo $ncart;?> item <i class="fa fa-angle-down"></i></a>
					<ul role="menu" class="sub-menu">
						<?php
							while ($rcart = mysql_fetch_assoc($qcart)) {
						?>
				<li>
				<div class="back-cart">
					<div class="img-decor">
						<?php echo "<img src='administrator/foto/barang/$rcart[foto]' height=30 width=30 "; ?></td>
					</div>

					<div class="jml-decor">
						<?php echo $rcart['qty']; ?>
					</div>

					<div class="harga-decor">
						<?php echo rupiah($rcart['harga_jual']); ?>
					</div>

					<div class="harga-decor">
						<a href="?p=add_cart&action=delete&id=<?php echo $rcart['kd_keranjang']; ?>" style="color:#000;"> <i class="fa fa-times"></i> </a></td>
					</div>
				</div>
				<hr>
				<br>
				</li>

				<?php
				}
				?>

				<br>
				<br>
					<div class="total">
					<?php
						$qtotal = mysql_query("SELECT barang.kd_barang,harga_jual, keranjang.kd_barang,session_id,qty, SUM(barang.harga_jual * keranjang.qty) AS total FROM barang, keranjang WHERE keranjang.session_id = '$session_id' AND keranjang.id_registrasi = '$_SESSION[id_registrasi]' AND barang.kd_barang = keranjang.kd_barang");
						$rtotal = mysql_fetch_assoc($qtotal);
						echo "Total : Rp. ".rupiah($rtotal['total']);
					?>
					</div>
				
				<br><br>
				<p style="border:1px dotted #000;border-radius:5px 5px 5px 5px;padding:3px 3px;margin-top:20px;margin:3px 3px; ">
					<a href="?p=det_cart" style="margin-left:10px;margin-top:10px;font-size:15px;font-family:times new roman;color:#000"><i class="fa fa-sign-in"></i> Lanjut Belanja </a></p>
			</ul>
		</div></p>
		</ul>
		</li>

			<?php
                } else { 
            ?>
				<li><a href="?p=registrasi"><i class="fa fa-group"></i> Registrasi</a></li>
				<li><a href="?p=akun"><i class="fa fa-lock"></i> Login</a></li>
				<?php
					$session_id = session_id();
					$qcart = mysql_query("SELECT * FROM keranjang, barang WHERE keranjang.session_id = '$session_id' AND keranjang.kd_barang = barang.kd_barang ORDER BY keranjang.kd_keranjang DESC");
					$ncart = mysql_num_rows($qcart);
				?>
				<li class="dropdown"><a href="#"><i class="fa fa-shopping-cart"></i>Keranjang : <?php echo $ncart;?> item <i class="fa fa-angle-down"></i></a>
					<ul role="menu" class="sub-menu">
						<?php
							while ($rcart = mysql_fetch_assoc($qcart)) {
						?>
				<li>
				<div class="back-cart">
					<div class="img-decor">
						<?php echo "<img src='administrator/foto/barang/$rcart[foto]' height=30 width=30 "; ?></td>
					</div>

					<div class="jml-decor">
						<?php echo $rcart['qty']; ?>
					</div>

					<div class="harga-decor">
						<?php echo rupiah($rcart['harga_jual']); ?>
					</div>

					<div class="harga-decor">
						<a href="?p=add_cart&action=delete&id=<?php echo $rcart['kd_keranjang']; ?>" style="color:#000;"> <i class="fa fa-times"></i> </a></td>
					</div>
				</div>
				<hr>
				<br>
				</li>

				<?php
				}
				?>

				<br>
				<br>
					<div class="total">
					<?php
						$qtotal = mysql_query("SELECT barang.kd_barang,harga_jual, keranjang.kd_barang,session_id,qty, SUM(barang.harga_jual * keranjang.qty) AS total FROM barang, keranjang WHERE keranjang.session_id = '$session_id' AND barang.kd_barang = keranjang.kd_barang");
						$rtotal = mysql_fetch_assoc($qtotal);
						echo "Total : Rp. ".rupiah($rtotal['total']);
					?>
					</div>
				
				<br><br>
				<p style="border:1px dotted #000;border-radius:5px 5px 5px 5px;padding:3px 3px;margin-top:20px;margin:3px 3px; ">
					<a href="?p=det_cart" style="margin-left:10px;margin-top:10px;font-size:15px;font-family:times new roman;color:#000"><i class="fa fa-sign-in"></i> Lanjut Belanja </a></p>
			</ul>
		</div></p>
		</ul>
		</li>
			<?php
				}
			?>
	</ul>
</div>
</div>