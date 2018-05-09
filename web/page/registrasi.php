<html>
<head>
    <script src="jquery-1.4.js"></script>
    <script type="text/javascript" src="jquery.validate.js"></script>

<script>
  $(document).ready(function()
  {
     $("#username").change(function()
     {  
        var username = $("#username").val();
        $("#pesan").html("<img src='loading.gif'>Cek username ...");

        if(username=='')
        {
          $("#pesan").html('<img src="salah.png"> username tidak boleh kosong');
          $("#username").css('border', '3px #C33 solid');
        }
        else
        $.ajax({type: "POST", url: "validation.php", data: "username="+username, success:function(data)
        { 
            if(data==0)
              {
                  $("#pesan").html('<img src="true.png"> Ok. username belum digunakan');
                $("#username").css('border', '3px #090 solid');
            }
              else
              {
                $("#pesan").html('<img src="salah.png"> Maaf username telah digunakan');
                $("#username").css('border', '3px #C33 solid');
              }
              
        } });
     })
  });
    
</script>

</head>
<body>

<div class="section group">
    <div class="cont-desc span_1_of_2">
        <ul class="back-links">
            <li><a href="#">Home</a> ::</li>
            <li>Form Registrasi</li>
            <div class="clear"> </div>
            </ul>
            <br />
            
            <div class="product-details">
                <div class="contact-form">
                    <center>
                        <form method="post" action="?p=act_registrasi">
                            <div>
                                <input name="nama_depan" type="text" class="textbox textbox1" placeholder="Nama Depan*..." required>
                                <input name="nama_belakang" type="text" class="textbox textbox1" placeholder="Nama Belakang*..." required>                            
                                <div class="clear"></div>
                            </div>

                            <div>
                                <input name="email" type="email" class="textbox textbox1" placeholder="Email*..." required>
                                <input name="no_telp" type="text" class="textbox textbox1" placeholder="No Telepon/Hp*..." required> 
                                <div class="clear"></div>
                            </div>

                            <div>
                                <textarea name="alamat" type="text" class="textbox textbox1" placeholder="Masukkan Alamat Lengkap* , Kota, dan Provinsi...." required></textarea>
                                <div class="clear"></div>
                            </div>

                            <div>
                                <input name="username" type="text" id="username" class="textbox textbox1" placeholder="Username*..." required>
                                <p id="pesan" style="text-align:left;margin-top:15px;margin-left:5px;"></p>
                                <div class="clear"></div>

                            </div>

                            <div>
                                <input name="password" type="password" class="textbox textbox1" placeholder="Password*..." required> 
                                <p style="float:left;margin:5px;padding:5px;color:red;"> *Min 6 Karakter</p>
                                <input type="hidden" name="hak_akses" value="user">
                                <div class="clear"></div>
                            </div>

                                <?php
                                    if($e){echo $e;}
                                    echo '<p style="float:left;"><img src="captcha/captcha.php" /></p>';
                                ?>
                                <div class="clear"></div>

                            <div>
                                <input name="captcha" type="text" class="textbox textbox1" placeholder="Masukkan Kode di Atas*..." required>
                                <div class="clear"></div>
                            </div>

                            <div>
                                <input type="submit" value="Daftar" name="register" class="mybutton-login">
                                <div class="clear"></div>
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
</body>
</html>