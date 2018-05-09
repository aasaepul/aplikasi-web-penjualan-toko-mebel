<?php
    $q = mysql_query("SELECT * FROM info WHERE kd_info=2");
    $data = mysql_fetch_array($q);
?>
<div class="section group">
    <div class="cont-desc span_1_of_2">
        <ul class="back-links">
            <li><a href="#" style="font-family:times new roman;font-size:18px;"><?php echo $data['judul']?></a></li>
            <div class="clear"> </div>
        </ul>

        <div class="product-articles">  
            <div class="article">
                <div class="alert alert-success">
                    <h2 style="font-size:20px;">Bagaimana cara pesan ?</h2>
                    <p style="color:#000;"><?php echo $data['isi']; ?> </p>
                </div>  
                <img src="administrator/foto/info/<?php echo $data['foto']; ?>">                  
            </div>
        </div>
    
        <div class="clear"></div>
    </div>

