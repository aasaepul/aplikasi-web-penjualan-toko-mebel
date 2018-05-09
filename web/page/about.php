<?php
	$q = mysql_query("SELECT * FROM info WHERE kd_info=1");
	$data = mysql_fetch_array($q);
?>
   	<div class="section group">
		<div class="cont-desc span_1_of_2">
			<ul class="back-links">
				<li><a href="#" style="font-family:times new roman;font-size:18px;">Profil Toko</a></li>
					<div class="clear"> </div>
					</ul>
					<div class="product-details">	
						<div class="grid images_3_of_2">
							<ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="administrator/foto/info/<?php echo $data['foto']; ?>" width="400"/>
									<img class="etalage_source_image" src="administrator/foto/info/<?php echo $data['foto']; ?>" title="" />
								</a>
							</li>
							</ul>
				     	</div>
				   
				   		<div class="desc span_3_of_2">
							<h2><?php echo $data['judul']; ?></h2>
							<p style="text-indent:0.5in"><?php echo $data['isi']; ?></p>					
					</div>
					<div class="clear"></div>
		  		</div>
      		</div>