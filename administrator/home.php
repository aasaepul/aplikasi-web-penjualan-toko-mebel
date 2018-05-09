<?php

session_start();

include "app/conn.php";
include "app/func.inc.php";
include "../app/config.php";
include "../app/detect.php";
include "../cek-login.php";


if (isset($_SESSION['level']) && isset($_SESSION['username'])) {
    if (($_SESSION['level'] == "admin") || ($_SESSION['level'] == "pemilik")){
        
        $konf  = mysql_query("select trans_penjualan.tgl_expired,trans_penjualan.tanggapan,konfirmasi.tampil_konfirmasi FROM trans_penjualan,konfirmasi WHERE konfirmasi.tampil_konfirmasi='N' AND trans_penjualan.tgl_expired < now() AND trans_penjualan.tanggapan='menunggu'");
        $nkonf = mysql_num_rows($konf);
        $tkonf = mysql_fetch_assoc($konf);

        if ($nkonf > 0 ) {
            
            mysql_query("UPDATE trans_penjualan SET status_trans='expired' WHERE tanggapan='menunggu' AND tgl_expired < now()");
        }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Administrator | Toko Mebel Putra Pandansari</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="../administrator/assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <!-- FONT AWESOME ICONS  -->
    <link href="../administrator/assets/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <!-- CUSTOM STYLE  -->
    <link href="../administrator/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <!-- DATA TABLES -->
    <link href="../administrator/assets/css/dataTables-bootstrap.css" rel="stylesheet" type="text/css"/>

    <link rel="shortcut icon" href="../asset/logo.jpg">
    <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong><i class="glyphicon glyphicon-envelope"></i> </strong>info@putrapandansari.com
                    &nbsp;&nbsp;
                    <strong><i class="glyphicon glyphicon-phone-alt"></i> </strong>+90-897-678-44
                    &nbsp;&nbsp;
                    <strong><a href="logout.php" OnClick="return confirm('Apakah anda yakin akan keluar ?')";><button class="btn bnt-default"> <i class="fa fa-power-off"></i></button></a></strong>
                </div>

            </div>
        </div>
    </header>

    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Header Image-->
                <marquee behaviour="alternate"> <h2 style="color:#fff;text-shadow:2px #000;"> TOKO MEBEL PUTRA PANDANSARI </h2></marquee>
            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <!-- Image Header -->
                </div>
            </div>
        </div>
    </div>

    <?php
        include ("menu.php");
    ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line"><b style="color:#000">Dashboard</b> <i>Control Panel</i></h4>

                </div>
                <?php

                    if ($page_name=='') {
                        include $browser_t.'/../depan.php';
                    }        
                    else
                    {
                        include $browser_t.'/../content.php';
                    }

                ?>

            </div>
        </div>
    </div>

    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2015 Toko Mebel Putra Pandansari | Programmer By : <a href="http://www.facebook.com/sean.kakashi" target="_blank"> Saepul Anwar </a>
                </div>

            </div>
        </div>
    </footer>

    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script type="text/javascript" src="../administrator/assets/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../administrator/assets/js/jquery.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS  --> 
    <script type="text/javascript" src="../administrator/assets/js/bootstrap.js"></script>   
    <script type="text/javascript" src="../administrator/assets/js/bootstrap.min.js"></script>
    <!-- CKEditor JS-->
    <script type="text/javascript" src="../administrator/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="../administrator/ckeditor/style.js"></script>
    <!-- Data Tables Plugin Scripts-->
    <script type="text/javascript" src="../administrator/assets/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../administrator/assets/js/dataTables.bootstrap.js"></script>
    
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
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
</body>
</html>

<?php

} 

}else {
    echo "<script> alert ('Maaf anda tidak berhak mengakses halaman ini, karena bukan Admin !'); document.location='index.php';</script>";
}
