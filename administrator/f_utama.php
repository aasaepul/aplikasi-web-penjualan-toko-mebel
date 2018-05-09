<?php
include "app/conn.php";
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
    <title>Login Form | Toko Mebel Putera Pandansari</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="../administrator/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="../administrator/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="../administrator/assets/css/style.css" rel="stylesheet" />

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
                <div class="col-md-6">
                    <button data-toggle="modal" data-target="#contact" style="float:left;background-color:rgb(171, 30, 7);padding:5px;"><i class="glyphicon glyphicon-user"></i> DAFTAR</button> 
                </div>
                <div class="col-md-6">
                    <strong><i class="glyphicon glyphicon-envelope"></i> </strong>info@putrapandansari.com
                    &nbsp;&nbsp;
                    <strong><i class="glyphicon glyphicon-phone-alt"></i> </strong>(0267) 0987656
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <!-- Header Image-->
                <marquee behaviour="alternate"> <h2 style="color:#fff;text-shadow:2px #000;"> TOKO MEBEL PUTRA PANDANSARI </h2></marquee>
            </div>
        </div>
    </div>

    <?php
        include "content-f-index.php";
    ?>
        
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2015 Toko Mebel Putra Pandansari | Programmer By : <a href="http://www.facebook.com/sean.kakashi" target="_blank">Saepul Anwar</a>
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->

    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script type="text/javascript" src="../administrator/assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script type="text/javascript" src="../administrator/assets/js/bootstrap.js"></script>
</body>

<!-- Modal Dialog Contact -->
<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Daftar Administrator</h4>
      </div>
      <div class="modal-body">
      <div class="tab-pane" id="formcontrols">
        <?php include "../administrator/content/administrator/administrator_act.php"; ?>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


</html>
