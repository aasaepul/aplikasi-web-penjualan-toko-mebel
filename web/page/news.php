<div class="section group">
	<div class="cont-desc span_1_of_2">
		<ul class="back-links">
			<li><a href="#" style="font-family:times new roman;font-size:18px;">Artikel</a></li>
			<div class="clear"> </div>
			</ul>
				<?php
					$sql="SELECT * FROM info WHERE kd_info<>1 AND kd_info<>2 ORDER BY kd_info DESC";
					$dataP=paggingberita($sql,6,$_GET[hal]);
					// print_r($dataP);
					while($d=fObj($dataP[query])){ 
				?>

				<div class="product-articles">	
			   		<div class="article">
						<h2 style="font-size:20px;"><?php echo $d->judul ?></h2>
						<p><i class="fa fa-calendar"></i> Diterbitkan pada tanggal <?php echo $d->tgl?></p>

						<p style="text-indent:0.5in"><?php echo "".substr($d->isi,0,500).""; ?></p>					
						<p><a href="?p=page&m=det_news&id=<?php echo $d->kd_info ?>">+ Baca Selengkapnya ...</a></p>
					</div>
					<hr style="border:2px solid #e44f2b;">
					<?php
						}
						num_page("?p=page&m=artikel",$_GET[hal],$dataP[jum]);
					?>
				</div>
		<div class="clear"></div>
	</div>
</div>
</div>
	