<div class="rightsidebar span_3_of_1 sidebar">
	<h3>Kontak Kami</h3>
	<div class="kontak-kami">
		<div class="price-number">
		<center><img src="asset/images/cus.png" width="135" height="150"></center>
		<div class="price-details">
			<div class="price-number">
				<br>
				<p style="text-align:center;"><span class="rupees" style="font-size:14px;color:blue;"> Phone : </span></p>
				<p style="font-size:14px;color:red;text-align:center;">(0264) 881-008</p>
				<p style="text-align:center;"><span class="rupees" style="font-size:14px;color:blue;"> Mobile : </span></p>
				<p style="font-size:14px;color:red;text-align:center;">0818 0409 9777</p>
				<p style="font-size:14px;color:red;text-align:center;">0852 2888 5666</p>
				<p style="font-size:14px;color:red;text-align:center;">0857 2588 8800</p>
				<p style="text-align:center;"><span class="rupees" style="font-size:14px;color:blue;"> Whatsapp : </span></p>
				<p style="font-size:14px;color:red;text-align:center;">0852 2888 5666</p>
				<p style="text-align:center;"><span class="rupees" style="font-size:14px;color:blue;"> BBM : </span></p>
				<p style="font-size:14px;color:red;text-align:center;">GG09PP</p>
			</div>
			<div class="clear"></div>
		</div>
		</div>
	</div>
</div>

<div class="rightsidebar span_3_of_1 sidebar">
	<h3>Produk Lainnya</h3>
		<ul class="popular-products">
			<?php
        		$qProduk="SELECT * FROM barang ORDER BY kd_barang DESC";
        		$dataP=paggingproduct($qProduk,4,$_GET[hal]);
        
        		// print_r($dataP);
        		while($d=fObj($dataP[query])){
    		?>
			<li>
				<a href="#"><img src="administrator/foto/barang/<?php echo $d->foto ?>" alt="" /></a>
				<div class="price-details">
					<div class="price-number">
						<p><span class="rupees">Rp. <?php echo rupiah($d->harga_jual);?>  </span></p>
					</div>
							
					<div class="add-cart">								
						<h4><a href="?p=page&m=detail&id=<?php echo "'".$d->kd_barang."'"?>">Lihat detail</a></h4>
					</div>
							
					<div class="clear"></div>
				</div>					 
			</li>
			<?php
				}
			?>
		</ul>
</div>