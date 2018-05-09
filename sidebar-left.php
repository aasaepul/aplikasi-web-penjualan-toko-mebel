<div class="content-bottom-left">
    <div class="categories">
		<ul> <h3>Kategori Produk</h3>
			<?php
       			$qKategori = "select * from kategori WHERE kd_kategori";
        		$qtKategori=mysql_query($qKategori);
        		while($data=mysql_fetch_assoc($qtKategori)) {
    		?>
				<li><a href="?p=kategori&id=<?php echo $data['kd_kategori']; ?>"><?php echo $data['nama_kategori']; ?></a></li>
			<?php
			}
			?>							   
		</ul>
	</div>		
	
	<div class="buters-guide">
		<h3>Bank Pembayaran</h3>
		<p><span>Anda dapat melakukan pembayaran ke No.Rekening di bawah ini :</span></p>	
	</div>	
	
	<?php
		$qBank = mysql_query("SELECT * FROM bank");
		while($data = mysql_fetch_assoc($qBank)){
	?>		
	<div class="grid_4_of_4 images_4_of_4">
		<center><a href="preview.html"><img src="administrator/foto/bank/<?php echo $data['logo_bank']; ?>" alt="" width="150" height="50"/></a></center>
		<div class="price-details">
			<div class="price-number">
				<br>
				<p style="text-align:center;text-align:center;"><span class="rupees" style="font-size:14px;color:blue;"> No. Rekening : </span></p>
				<p style="font-size:14px;color:red;text-align:center;"><?php echo $data['no_rekening']; ?></p>
				<p style="text-align:center;"><span class="rupees" style="font-size:14px;color:blue;"> Atas Nama : </span></p>
				<p style="font-size:14px;color:red;text-align:center;"><?php echo $data['atas_nama']; ?></p>
				<br>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<?php
		}
	?>		

	<div class="buters-guide">
		<h3>Kontak Kami</h3>	
	</div>

	<div class="grid_4_of_4 images_4_of_4">
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
    	    	