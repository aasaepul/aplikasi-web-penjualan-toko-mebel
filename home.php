<!--A Design by Putrapandansari
Author: Putrapandansari
Author URL: http://putrapandansari.com
-->
<?php

	include "administrator/app/conn.php";
	include "app/config.php";
	include "app/detect.php";
	include "app/fungsi.php";
	include "pagging/lib.php";
	include 'app/conn.php';
	include 'app/func.inc.php';

	error_reporting(0);
?>
<!DOCTYPE HTML>
<head>
<title>Toko Mebel Putra Pandansari | Murah</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='asset/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
<link href="asset/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Favicon -->
<link rel="shortcut icon" href="asset/logo.jpg">

<script type="text/javascript" src="asset/js/jquery-1.9.0.min.js"></script> 
<script src="asset/js/jquery.openCarousel.js" type="text/javascript"></script>

<!-- JSSOR SLIDER -->
<script type="text/javascript" src="asset/js/jssor.js"></script>
<script type="text/javascript" src="asset/js/jssor.slider.js"></script>

<script type="text/javascript" src="asset/js/easing.js"></script>
<script type="text/javascript" src="asset/js/jquery.js"></script>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="asset/js/move-top.js"></script>
<script src="asset/js/easyResponsiveTabs.js" type="text/javascript"></script>
<link href="asset/css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
<style type="text/css">
	a.popup-link {
		padding:17px 0;
		text-align: center;
		margin:7% auto;
		position: relative;
		width: 300px;
		color: #fff;
		text-decoration: none;
		background-color: #FFBA00;
		border-radius: 3px;
		box-shadow: 0 5px 0px 0px #eea900;
		display: block;
	}
	a.popup-link:hover {
		background-color: #ff9900;
		box-shadow: 0 3px 0px 0px #eea900;
		-webkit-transition:all 1s;
		-moz-transition:all 1s;
		transition:all 1s;
	}
	/* end link popup*/

	/*style untuk popup */	
	#popup {
		visibility: hidden;
		opacity: 0;
		margin-top: -200px;
	}
	#popup:target {
		visibility:visible;
		opacity: 1;
		background-color: rgba(255,255,255,0.8);
		position: fixed;
		top:0;
		left:0;
		right:0;
		bottom:0;
		margin:0;
		z-index: 99999999999;
		-webkit-transition:all 1s;
		-moz-transition:all 1s;
		transition:all 1s;
	}

	@media (min-width: 768px){
		.popup-container {
			width:600px;
		}
	}
	@media (max-width: 767px){
		.popup-container {
			width:100%;
		}
	}
	.popup-container {
		position: relative;
		margin:7% auto;
		padding:30px 50px;
		background-color: #A7460E;
		color:#fff;
		border-radius: 3px;
	}

	a.popup-close {
		position: absolute;
		top:3px;
		right:3px;
		background-color: #fff;
		padding:7px 10px;
		font-size: 20px;
		text-decoration: none;
		line-height: 1;
		color:#333;
	}

	/* style untuk isi popup */


	.popup-form {
		margin:10px auto;
	}
		.popup-form h2 {
			margin-bottom: 5px;
			font-size: 37px;
			text-transform: uppercase;
		}
		.popup-form .input-group {
			margin:10px auto;
		}
			/*.popup-form .input-group input {
				padding:17px;
				text-align: center;
				margin-bottom: 10px;
				border-radius:3px;
				font-size: 16px; 
				display: block;
				width: 100%;
			}*/
			.popup-form .input-group input:focus {
				outline-color:#FB8833; 
			}
			.popup-form .input-group input[type="email"] {
				border:0px;
				position: relative;
			}
			.popup-form .input-group input[type="submit"] {
				background-color: #FB8833;
				color: #fff;
				border: 0;
				cursor: pointer;
			}
			.popup-form .input-group input[type="submit"]:focus {
				box-shadow: inset 0 3px 7px 3px #ea7722;
			}
</style>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
   </script>		
<link rel="stylesheet" href="asset/css/etalage.css">
<script src="asset/js/jquery.etalage.min.js"></script>
<script>
	jQuery(document).ready(function($){

	$('#etalage').etalage({
		thumb_image_width: 300,
		thumb_image_height: 400,
		source_image_width: 900,
		source_image_height: 1200,
		show_hint: true,
		click_callback: function(image_anchor, instance_id){
			alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
		}
		});

	});
</script>

<script type="text/javascript">
    function pilih_kota(prop) {
    $.ajax({
        url: 'http://localhost/ta/aksi/act_kota.php',
        data : 'prop='+prop,
        type: "post", 
        dataType: "html",
        timeout: 10000,
        success: function(response){
            $('#dom_kota').html(response);
        }
    });
}
</script>

<script>
    function formatCurrency(num) {
    num = num.toString().replace(/\$|\,/g,'');
    if(isNaN(num))
    num = "0";
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num*100+0.50000000001);
    cents = num%100;
    num = Math.floor(num/100).toString();
    if(cents<10)
    cents = "0" + cents;
    for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
    num = num.substring(0,num.length-(4*i+3))+'.'+
    num.substring(num.length-(4*i+3));
    return (((sign)?'':'-') + 'Rp. ' + num);
    }
</script>

	  <script src="asset/js/star-rating.js" type="text/javascript"></script>
</head>
<body>
	<!-- Start Header -->
	<div class="header">
  	  	<div class="wrap">
			<?php
				include 'menu-top.php';    
  		    
  		    	//Menu Navigasi
  		    	include 'menu.php' ?>

  		    <div class="header_bottom">
				<?php
					include 'slider.php';
				?>

				<div class="slider-text">
			   		<h2>Terima kasih telah mengunjungi Website Kami !!!</h2>
			   		<p>Terpercaya dan Berkualitas</p>
	  	      	</div>
	      	</div>
   		</div>
   	</div>

   	<!--End Header -->
  	<?php
    	include 'content.php';
    ?>

    <br>

   	<div class="footer">
   		<div class="wrap">	
			<div class="copy_right">
				<p>Copy rights (c). All rights Reseverd | 2015 <a href="localhost/ta/" target="_blank"></a> </p>
		   </div>	
		   
		   	<div class="footer-nav">
		   	<ul>
		   		<li><a href="?p=home">Home</a> : </li>
		   		<li><a href="?p=page&m=about">Profil</a> : </li>
		   		<li><a href="?p=page&m=cara-pesan">Cara Pemesanan</a> : </li>
		   	</ul>
		   </div>		
        </div>
    </div>

    <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>

    <a href="#" id="toTop"> </a>
    <script type="text/javascript" src="asset/js/navigation.js"></script>
</body>
</html>

