<?php
	if(isset($_GET['id'])){
?>

<div class="section group">
	<div class="cont-desc span_1_of_2">
		<ul class="back-links">
			<li><a href="#" style="font-family:times new roman;font-size:18px;">Detail Artikel</a></li>
			<div class="clear"> </div>
		</ul>
		<?php
			$sql=sql("select * from info where kd_info=".$_GET['id']."");
			$s=sql("update info set views=views+1 where kd_info=".$_GET['id']."");
			while($d=fObj($sql)){
		?>
		
		<div class="product-details">	
			<div class="grid images_3_of_2">
			<ul id="etalage">
				<li>
				<a href="optionallink.html">
					<img class="etalage_thumb_image" src="administrator/foto/info/<?php echo $d->foto; ?>" width="400"/>
					<img class="etalage_source_image" src="administrator/foto/info/<?php echo $d->foto; ?>" title="" />
				</a>
				</li>
			</ul>
			</div>
		   
			<div class="desc span_3_of_2">
				<h2><?php echo $d->judul; ?></h2>
				<p><i class="fa fa-calendar"></i> Diterbitkan pada tanggal <?php echo $d->tgl?></p>
				<p style="text-indent:0.5in"><?php echo $d->isi; ?></p>					
			</div>
			<div class="clear"></div>
      	<?php
		}
		?>
<?php
	} else {
		echo '<div class="alert alert-warning">';
		echo 'Halaman Tidak ditemukan';
		echo '</div>';
	}
?>
	</div>
</div>