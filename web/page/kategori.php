<?php
if (isset($_GET['id'])) {
?>
<div class="main">
   <div class="content">
        <div class="content_top">
            <div class="wrap">
                <h3>Produk Lainnya</h3>
            </div>
                    
            <div class="line"> </div>
                <div class="wrap">
                    <div class="ocarousel_slider">  
                        <div class="ocarousel example_photos" data-ocarousel-perscroll="3">
                            <div class="ocarousel_window">
                                <?php
                                    $qLatesP = "SELECT * FROM barang ORDER BY kd_barang LIMIT 10";
                                    $qtLatesP = mysql_query($qLatesP);
                                    while($data=mysql_fetch_assoc($qtLatesP)) {
                                ?>
                                <a href="?p=page&m=detail&id=<?php echo "'".$data['kd_barang']."'"?>" title="img1"> <img src="administrator/foto/barang/<?php echo $data['foto'] ?>" alt="" width="100" height="100"/><p style="margin-top:15px;color:orange;"><?php echo "".substr($data['nama'],0,10).""; ?>...</p></a>
                                <?php
                                    }
                                ?>
                            </div>
                            <span>           
                            <a href="#" data-ocarousel-link="left" style="float: left;" class="prev"> </a>
                            <a href="#" data-ocarousel-link="right" style="float: right;" class="next"> </a>
                           </span>
                        </div>
                    </div>  
                </div>          
            </div>
            
            <div class="content_bottom">
                <div class="wrap">
                    <?php
                        include 'sidebar-left.php';
                    ?>
                    <div class="content-bottom-right">
                         <?php
                            $qkat = mysql_query("SELECT A.`nama_kategori`,A.`kd_kategori`,B.`kd_barang`,B.`kd_kategori` FROM kategori A,barang B WHERE A.kd_kategori = B.kd_kategori AND B.kd_kategori='$_GET[id]'");
                            $nkat = mysql_num_rows($qkat);
                            $rkat = mysql_fetch_assoc($qkat);
                        ?>
                        <h3>Produk <i class="fa fa-thumbnail"></i> <?php echo $rkat['nama_kategori']; ?></h3>
                            <div class="section group">
                                <?php
                                    if ($nkat !== 0) {

                                        $sql="SELECT * FROM barang WHERE kd_kategori='$_GET[id]' ORDER BY kd_barang DESC";
                                        $dataP=paggingproduct($sql,9,$_GET[hal]);
        
                                        // print_r($dataP);
                                        while($d=fObj($dataP[query])){
                                ?>
                                <div class="grid_1_of_4 images_1_of_4">
                                    <a href="preview.html"><img src="administrator/foto/barang/<?php echo $d->foto ?>" alt="" width="150" height="150"/></a>
                                    <div class="price-details">
                                        <div class="price-number">
                                            <p><span class="rupees">Rp. <?php echo rupiah($d->harga_jual);?> </span></p>
                                        </div>
                                        <p style="font-size:15px;font-family:cursive;color:orange;">Berat : <?php echo $d->berat_barang?> kg</p>
                                        <p style="font-size:15px;font-family:cursive;color:orange;">Stok  : <?php echo $d->jumlah?></p>
                                        <div class="add-cart">                              
                                            <h4><a href="?p=page&m=detail&id=<?php echo "'".$d->kd_barang."'"?>">Lihat Detail</a></h4>
                                        </div>
                                        <div class="clear"></div>
                                    </div>                   
                                </div>
                                <?php
                                }
                                    } else {
                                        echo '<div class="alert alert-danger">';
                                        echo '<h2 style="color:red;"> Maaf </h2> ';
                                        echo 'Barang Berdasarkan Kategori Yang Anda Pilih Belum Tersedia';
                                        echo '</div>';
                                    }
                                ?>
                            </div>
                            <?php
                                numb_page("?p=produk",$_GET[hal],$dataP[jum]);
                            ?>
                    </div>
                </div>

                <div class="clear"></div>

            </div>

        </div>
    </div>
</div>
<?php
    } else {
        echo "<script> alert('Mohon maaf, halaman yang anda minta tidak tersedia ');</script>";
    }
?>

