<div class="main">
   <div class="content">
        <div class="content_top">
    	   	<div class="wrap">
		       	<h3>Produk Lainnya</h3>
		    </div>
		          	
		    <div class="line"> </div>
		        <div class="wrap">
		          	<div class="ocarousel_slider">  
	      				<div class="ocarousel example_photos" data-ocarousel-perscroll="3">
			                <div class="ocarousel_window">
			                	<?php
			                		$qLatesP = "SELECT * FROM barang ORDER BY kd_barang LIMIT 10";
			                		$qtLatesP = mysql_query($qLatesP);
			                		while($data=mysql_fetch_assoc($qtLatesP)) {
			                	?>
			                   	<a href="?p=page&m=detail&id=<?php echo "'".$data['kd_barang']."'"?>" title="img1"> <img src="administrator/foto/barang/<?php echo $data['foto'] ?>" alt="" width="100" height="100"/><p style="margin-top:15px;color:orange;"><?php echo "".substr($data['nama'],0,10).""; ?>...</p></a>
			                	<?php
			                		}
			                	?>
			                </div>
			                <span>           
			                <a href="#" data-ocarousel-link="left" style="float: left;" class="prev"> </a>
			                <a href="#" data-ocarousel-link="right" style="float: right;" class="next"> </a>
			               </span>
					    </div>
				    </div>  
				</div>    		
    	    </div>
    	  	
    	  	<div class="content_bottom">
    	    	<div class="wrap">
					<?php
   						include 'sidebar-left.php';
					?>
   					<div class="content-bottom-right">
    					<h3>Produk</h3>
	       					<div class="section group">
	       						<?php
        							$qProduk="SELECT * FROM barang ORDER BY kd_barang DESC";
        							$dataP=paggingproduct($qProduk,12,$_GET[hal]);
        
        							// print_r($dataP);
        							while($d=fObj($dataP[query])){
    							?>
								<div class="grid_1_of_4 images_1_of_4">
		  							<a href="#"><img src="administrator/foto/barang/<?php echo $d->foto ?>" alt="" width="150" height="150"/></a>
				  					<div class="price-details">
			       						<div class="price-number">
											<p><span class="rupees">Rp. <?php echo rupiah($d->harga_jual);?> </span></p>
				    					</div>
				    					<p style="font-size:15px;font-family:cursive;color:orange;">Berat : <?php echo $d->berat_barang?> kg</p>
										<p style="font-size:15px;font-family:cursive;color:orange;">Stok  : <?php echo $d->jumlah?></p>
				       					<div class="add-cart">								
											<h4><a href="?p=page&m=detail&id=<?php echo "'".$d->kd_barang."'"?>">Lihat Detail</a></h4>
					    				</div>
					 					<div class="clear"></div>
									</div>					 
								</div>
								<?php
									}
								?>
							</div>
			    
   							<div class="product-articles">
   								<h3>Artikel</h3>
      							<ul>
     								<?php
										$qArtikel="SELECT * FROM info WHERE kd_info<>1 AND kd_info<>2 ORDER BY kd_info LIMIT 3";
										$qtArtikel= mysql_query($qArtikel);
										
										// print_r($dataP);
										while($data=mysql_fetch_assoc($qtArtikel)){ 
									?>
	   								<li>
	   									<div class="article">
	   										<p><span><?php echo $data['judul']; ?></span></p>
	   										<p>Diterbitkan pada tanggal <?php echo $data['tgl']?></p>
	   										<p><?php echo "".substr($data['isi'],0,400).""; ?></p>
	   										<p><a href="?p=page&m=det_news&id=<?php echo $data['kd_info']; ?>">+ Baca Selengkapnya ...</a></p>
	   									</div>
	   								</li>
	   								<?php
	   									}
	   								?>
	   							</ul>
							</div>
				    </div>
		      	</div>
		      	<div class="clear"></div>
		   	</div>
        </div>
    </div>
</div>