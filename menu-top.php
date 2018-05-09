<div class="header_top">
	<div class="logo">
		<a href="index.html"><img src="asset/images/logo-toko.gif" alt="" /></a>
	</div>
				
	<div class="header_top_right">
		<?php
			if ($_SESSION['hak_akses'] == 'user'){
				$qtuser = mysql_query("SELECT * FROM registrasi WHERE id_registrasi = '$_SESSION[id_registrasi]' ");
                $rtuser = mysql_fetch_assoc($qtuser);
        ?>
		<a href="?p=page&m=tab"><button class="btn-header" style="cursor:auto;"><i class="fa fa-user"></i> Info <?php echo $rtuser['nama_depan']; ?> </button></a> <i style="color:#fff;"> | </i> 
		<a href="?p=logout"><button class="btn-header" onClick="return confirm('Apakah Anda benar-benar yakin akan keluar?')" style="cursor:auto;"><i class="fa fa-sign-out"></i> Logout </button></a> <i style="color:#fff;"> | </i> 
		<?php
			$session_id = session_id();
			$qcart = mysql_query("SELECT * FROM keranjang, barang WHERE keranjang.session_id = '$session_id' AND keranjang.kd_barang = barang.kd_barang AND keranjang.id_registrasi = '$_SESSION[id_registrasi]' ORDER BY keranjang.kd_keranjang DESC");
			$ncart = mysql_num_rows($qcart);
		?>
		<section class="demo clearfix">
		<ul class="clearfix">
			<?php
				$session_id = session_id();
				$qcart = mysql_query("SELECT * FROM keranjang, barang WHERE keranjang.session_id = '$session_id' AND keranjang.kd_barang = barang.kd_barang AND keranjang.id_registrasi = '$_SESSION[id_registrasi]' ORDER BY keranjang.kd_keranjang DESC");
				$ncart = mysql_num_rows($qcart);
			?>
			<li>
				<a href="?p=page&m=det_cart">
					<button class="btn-header"><i class="fa fa-shopping-cart"></i> Keranjang : (<?php echo $ncart;?>) item <i class="fa fa-caret-down"></i></button>
				</a> 
				<div>
					<ul>
						<table style="margin-left:10px;">
						<?php
							while ($rcart = mysql_fetch_assoc($qcart)) {
						?>
						<li>
							<tr>
								<tbody>
								<td width="10%" style="text-align:center;font-size:12px;"><?php echo "<img src='administrator/foto/barang/$rcart[foto]' height=30 width=30 "; ?></td>
								<td width="5%" style="text-align:center;"><?php echo $rcart['qty']; ?></td>
								<td width="10%" style="text-align:center;font-size:12px;">Rp. <?php echo rupiah($rcart['harga_jual']); ?></td>
								<td width="10%" style="text-align:center;"><a href="?p=add_cart&action=delete&id=<?php echo $rcart['kd_keranjang']; ?>" style="color:#000;"> <i class="fa fa-times"></i> </a></td>
								</tbody>
							</tr>
						</li>
						<?php 
							} 
						?>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

						<?php
							$qtotal = mysql_query("SELECT barang.kd_barang,harga_jual, keranjang.kd_barang,session_id,qty, SUM(barang.harga_jual * keranjang.qty) AS total FROM barang, keranjang WHERE keranjang.session_id = '$session_id' AND barang.kd_barang = keranjang.kd_barang");
							$dtotal = mysql_num_rows($qtotal);
							$rtotal = mysql_fetch_assoc($qtotal);

							echo "<tr>";
							echo "<td colspan='2'></td>";
							echo "<td colspan='2' style='font-size:12px;'>Total : Rp. ".rupiah($rtotal['total'])."</td>";
							echo "</tr>";

							if ($rtotal['total'] > 1) {
							
							echo "<tr>";
							echo "<td colspan='1'></td>";
							echo '<td colspan="3"><p style="font-size:12px;border:1px dotted #000;border-radius:5px 5px 5px 5px;padding:1px 1px;margin-top:10px;margin:1px 1px; ">';
							echo '<button style="background-color:#DB3C15;"><a href="?p=page&m=det_cart"><i class="fa fa-sign-in"></i> Lanjutkan Belanja </a></button></td>';
							
							} else {
								echo '<p style="text-align:center;padding:2px 2px;margin:2px 2px;margin-top:10px;"><i class="fa fa-shopping-cart"></i> Keranjang Kosong </p>';
								}
						?>
						</table>
					</ul>
				</div>
			</li>
		</ul>
		<div class="clear"></div>

		<?php
			} else {
		?>

		<a href="?p=page&m=register"><button class="btn-header" style="cursor:auto;"><i class="fa fa-user"></i> Registrasi </button></a><i style="color:#fff;"> | </i>
		<a href="?p=page&m=login"><button class="btn-header" style="cursor:auto;"><i class="fa fa-sign-in"></i> Login </button></a><i style="color:#fff;"> | </i>

		<?php
			$session_id = session_id();
			$qcart = mysql_query("SELECT * FROM keranjang, barang WHERE keranjang.session_id = '$session_id' AND keranjang.kd_barang = barang.kd_barang ORDER BY keranjang.kd_keranjang DESC");
			$ncart = mysql_num_rows($qcart);
		?>
		<section class="demo clearfix">
			<?php
				$session_id = session_id();
				$qcart = mysql_query("SELECT * FROM keranjang, barang WHERE keranjang.session_id = '$session_id' AND keranjang.kd_barang = barang.kd_barang ORDER BY keranjang.kd_keranjang DESC");
				$ncart = mysql_num_rows($qcart);
			?>
		<ul class="clearfix">
			<li>
				<a href="?p=page&m=det_cart"><button class="btn-header"><i class="fa fa-shopping-cart"></i> Keranjang : (<?php echo $ncart;?>) item <i class="fa fa-caret-down"></i></button></a>
				<div>
					<ul>
						<table style="margin-left:10px;">
						<?php
							while ($rcart = mysql_fetch_assoc($qcart)) {
						?>
						<li>
							<tr>
								<tbody>
								<td width="10%" style="text-align:center;font-size:12px;"><?php echo "<img src='administrator/foto/barang/$rcart[foto]' height=30 width=30 "; ?></td>
								<td width="5%" style="text-align:center;"><?php echo $rcart['qty']; ?></td>
								<td width="10%" style="text-align:center;font-size:12px;">Rp. <?php echo rupiah($rcart['harga_jual']); ?></td>
								<td width="10%" style="text-align:center;"><a href="?p=add_cart&action=delete&id=<?php echo $rcart['kd_keranjang']; ?>" style="color:#000;"> <i class="fa fa-times"></i> </a></td>
								</tbody>
							</tr>
						</li>
						<?php 
							} 
						?>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

						<?php
							$qtotal = mysql_query("SELECT barang.kd_barang,harga_jual, keranjang.kd_barang,session_id,qty, SUM(barang.harga_jual * keranjang.qty) AS total FROM barang, keranjang WHERE keranjang.session_id = '$session_id' AND barang.kd_barang = keranjang.kd_barang");
							$dtotal = mysql_num_rows($qtotal);
							$rtotal = mysql_fetch_assoc($qtotal);

							echo "<tr>";
							echo "<td colspan='2'></td>";
							echo "<td colspan='2' style='font-size:12px;'>Total : Rp. ".rupiah($rtotal['total'])."</td>";
							echo "</tr>";

							if ($rtotal['total'] > 1) {
							
							echo "<tr>";
							echo "<td colspan='1'></td>";
							echo '<td colspan="3"><p style="font-size:12px;border:1px dotted #000;border-radius:5px 5px 5px 5px;padding:1px 1px;margin-top:10px;margin:1px 1px; ">';
							echo '<button style="background-color:#DB3C15;"><a href="?p=page&m=det_cart"><i class="fa fa-sign-in"></i> Lanjutkan Belanja </a></button></td>';
							
							} else {
								echo '<p style="text-align:center;padding:2px 2px;margin:2px 2px;margin-top:10px;"><i class="fa fa-shopping-cart"></i> Keranjang Kosong </p>';
								}
						?>
						</table>
					</ul>
				</div>
			</li>
		</ul>
		</section> 
		<div class="clear"></div>
		<?php
			}
		?>
	</div>
	<div class="clear"></div>
</div>