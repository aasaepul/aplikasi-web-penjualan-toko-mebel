<?php 
error_reporting(0);

if($_POST['kirim']){
	$email=$_POST['email'];	
	$query = mysql_query("select * from registrasi where email='$email'")or die("Gagal Members"); 
	if (mysql_num_rows ($query)==1) {
		$message="You activation link is: http://jualbajumurahonline.com/web/page/res_pass.php?email=$email";
		mail($email, "Putra Pandansari You Activation", $message);
		echo '<script>alert("Kami telah mengirimkan email untuk aktivasi reset password Anda, Silahkan cek email Anda.");</script>';
	} else{
		echo '<script>alert("Maaf data tidak ditemukan. Ulangi, Masukkan Email Anda yang terdaftar");</script>';

	}
}
?>

<div class="section group">
	<div class="cont-desc span_1_of_2">
		<ul class="back-links">
			<li><a href="#">Home</a> ::</li>
			<li>Lupa Password</li>
			<div class="clear"> </div>
			</ul>
			
			<div class="product-details">
				<div class="contact-form">
					<center>
					    <form method="post" action="">
					        <div>
						    	<input name="email" type="email" class="textbox textbox1" placeholder="Masukkan Email Terdaftar..." required>
						   		<div class="clear"></div>
						    </div>

						   	<div>
						   		<input type="submit" value="Kirim"  name="kirim" class="mybutton-login">
						  	</div>

						  	<div>
						   		<div class="clear"></div>
						  	</div>
					    </form>
					</center>
				</div>
				<div class="clear"></div>
		  	</div>
	</div>