<?php
    if (isset($_GET['id'])){
?>

<?php
	$sql=sql("select A.`kd_barang`,A.`jumlah`,A.`nama`,A.`harga_jual`,A.`deskripsi`,A.`foto`,B.`kd_kategori`,B.`nama_kategori`,A.`berat_barang` from barang A, kategori B where A.kd_kategori=B.kd_kategori AND kd_barang=".$_GET['id']."");
    $s=sql("update barang set views=views+1 where kd_barang=".$_GET['id']."");
    while($d=fObj($sql)){

    $qkatkhusus = mysql_query("SELECT * FROM barang,kategori WHERE barang.kd_kategori=kategori.kd_kategori AND barang.kd_barang='$d->kd_barang'");
    $tkatkhusus = mysql_fetch_assoc($qkatkhusus);
?>

   	 	    <div class="section group">
				<div class="cont-desc span_1_of_2">
					<ul class="back-links">
						<li><a href="#" style="font-family:times new roman;font-size:18px;">Detail Produk</a></li>
						<div class="clear"> </div>
					</ul>
					<div class="product-details">	
						<div class="grid images_3_of_2">
							<ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="administrator/foto/barang/<?php echo $d->foto ?>" width="200"/>
									<img class="etalage_source_image" src="administrator/foto/barang/<?php echo $d->foto ?>" title="" />
								</a>
							</li>
							</ul>
				     	</div>
				   
				   		<div class="desc span_3_of_2">
							<h2 style="font-size:25px;"> <?php echo $d->nama ?> </h2>
							<p><?php echo $d->deskripsi ?></p>					
						
							<div class="share-desc">
							<form action="?p=add_cart" method="POST">
        					<?php 
        						if ($d->jumlah == 0) {
        					?>
        						<button type="submit" name="add_cart" disabled style="background-color:#ddd;padding:10px;margin:10px;float:left;"><i class="fa fa-shopping-cart"></i> Tambah Ke Keranjang</button>
        					<?php

        						} elseif ($tkatkhusus['nama_kategori'] == 'Katalog Khusus'){
        					?>
        						<button type="submit" class="mybutton" name="add_cart_khusus" style="float:left;"><i class="fa fa-shopping-cart"></i> Tambah Ke Keranjang </button>
        						<input type="hidden" name="qty" value="1">
        						<input type="hidden" name="id_registrasi" value="<?php echo $_SESSION['id_registrasi'];?>">
        						<input type="hidden" name="kd_barang" value="<?php echo $d->kd_barang ?>">

        					<?php
        						} else{
        					?>
        						<button type="submit" class="mybutton" name="add_cart" style="float:left;"><i class="fa fa-shopping-cart"></i> Tambah Ke Keranjang </button>
        						<input type="hidden" name="qty" value="1">
        						<input type="hidden" name="id_registrasi" value="<?php echo $_SESSION['id_registrasi'];?>">
        						<input type="hidden" name="kd_barang" value="<?php echo $d->kd_barang ?>">
        					</form>
        					<?php 
        						}
        					?>				
							<div class="clear"></div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
		  		</div>
		
				<!-- <div class="product_desc">	
					<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>Spesifikasi</li>
							<div class="clear"></div>
						</ul>
						<div class="resp-tabs-container">
							<div class="product-specifications">
								<?php // echo $d->deskripsi ?>
				 			</div>
				  	  		<script type="text/javascript">
								/* place inside document ready function */
								$(".rating").starRating({
									minus: true // step minus button
										});
								</script>	
						</div>
		    		</div>
	    		</div> -->
	    	</div>

      	<br>
      	<?php
    }	    	
}
?>
