<?php
if ($_SESSION['hak_akses'] == "user") {

    //Add one day to today
    $now = strtotime(date("Y-m-d"));
    $date = date('Y-m-j', strtotime('+3 day', $now));
?>
<div class="section group">
    <div class="cont-desc span_1_of_2">
        <ul class="back-links">
            <li><a href="#">Home</a> ::</li>
            <li>Detail Keranjang Belanja</li>
            <div class="clear"> </div>
        </ul>
    
        <div class="product_desc">  
            <div id="horizontalTab">
                <ul class="resp-tabs-list">
                    <li><i class="fa fa-shopping-cart"></i> Keranjang Belanja</li>
                    <div class="clear"></div>
                </ul>

                <div class="resp-tabs-container">
                    <div class="product-specifications">
                            <table>
                                <tr>
                                    <tbody style="color:#fff;">
                                    <td width="30%" style="background-color:#e44f2b;padding:10px;margin-bottom:5px;color:#fff;font-weight:bold;">Gambar</td>
                                    <td width="30%" style="background-color:#e44f2b;padding:10px;margin-bottom:5px;color:#fff;font-weight:bold;">Nama Barang</td>
                                    <td width="25%" style="background-color:#e44f2b;padding:10px;margin-bottom:5px;color:#fff;font-weight:bold;">Qty</td>
                                    <td width="30%" style="background-color:#e44f2b;padding:10px;margin-bottom:5px;color:#fff;font-weight:bold;">Harga</td>
                                    <td width="40%" style="background-color:#e44f2b;padding:10px;margin-bottom:5px;color:#fff;font-weight:bold;">Aksi</td>
                                    </tbody>
                                </tr>
                                <tr>
                                    <tbody>
                                    <?php
                                        $session_id = session_id();
                                        $qkeranjang = mysql_query("SELECT keranjang.*, barang.*, keranjang.qty * barang.harga_jual AS subtotal FROM keranjang, barang WHERE keranjang.session_id = '$session_id' AND barang.kd_barang = keranjang.kd_barang AND keranjang.id_registrasi = '$_SESSION[id_registrasi]' ORDER BY keranjang.kd_keranjang DESC");
                                        $nkeranjang = mysql_num_rows($qkeranjang);
                                        if ($nkeranjang !== 0 ) {
                                        while ($data = mysql_fetch_array($qkeranjang)) {
                                    ?>
                                <tr>
                                    <td><div class="img-trans"><img src="administrator/foto/barang/<?php echo $data['foto'];?>" width="50" height="50" alt=""></div></td>
                                    <td> <h4><?php echo $data['nama'];?></h4><p><?php echo $data['kd_barang'];?></p></td>
                                    <td>
                                        <form method="post" action="?p=add_cart">
                                        <input class="cart_quantity_input" type="hidden" name="kd_keranjang" value="<?php echo $data['kd_keranjang'];?>" size="2">
                                        <label><?php echo $data['qty']?></label> &nbsp;&nbsp;<input type="text" size="2" name="qty" onChange="this.form.submit()"> &nbsp;&nbsp;&nbsp;&nbsp;<a href="?p=page&m=det_cart&id=<?php echo $data['kd_keranjang']; ?>#popup" style="background:green;color:white;padding:3px;margin:2px;font-size:11px;border-radius:5px;">Tentukan Ongkir</a>       
                                        </form>
                                    </td>
                                    <td><p>Rp. <?php echo rupiah($data['subtotal']);?></p></td>
                                    <td>
                                        <a class="cart_quantity_delete" href="?p=add_cart&action=delete&id=<?php echo $data['kd_keranjang'];?>"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            <?php
                                }
                            } else {
                            ?>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="6"> <div class="alert alert-warning"><i class="fa fa-minus-circle"></i> Belum ada barang yang anda pilih untuk di pesan ! </div></td>
                                </tr>

                            <?php } ?>

                                <tr>
                                    <td colspan="2" style="background-color:#e44f2b;color:#fff;padding:10px;margin-bottom:5px;border-radius:5px 0px 0px 5px;;"> Estimasi Ongkos Kirim </td>
                                    <td colspan="3"  style="background-color:#e44f2b;"></td>
                                </tr>

                                <tr>
                                    <td colspan="3">&nbsp;</td>
                                </tr>

                                <tr>

                                    <td><label></label></td>
                                    <td><label></label></td>
                                    <td><label></label></td>
                                </tr>
                                <tr>
                                    <form action="?p=add_cart" method="POST">
                                        <td>
                                        
                                        </td>
                           
                                        <td> 
                                    
                                        </td>
                                        
                                        <td>
                                        
                                        </td>
            
                                        <td>
                                            <?php
                                                $session_id = session_id();
                                                $qcart = mysql_query("SELECT keranjang.*, barang.*, keranjang.qty * barang.harga_jual AS subtotal FROM keranjang, barang WHERE keranjang.session_id = '$session_id' AND barang.kd_barang = keranjang.kd_barang AND keranjang.id_registrasi='$_SESSION[id_registrasi]' ORDER BY keranjang.kd_keranjang DESC");
                                                while ($dkeranjang=mysql_fetch_assoc($qcart)) {
                                            ?>
                                            <input type="hidden" name="kd_keranjang" value="<?php echo $dkeranjang['kd_keranjang']; ?>">
                                            <input type="hidden" name="alamat" value="<?php echo $_SESSION['alamat']; ?>">
                                            <?php   
                                                }
                                            ?>
                                        </td>
                                    </form>
                                </tr>
                                <tr>
                                    <td colspan="5">&nbsp;</td>
                                </tr>   
        
                                <tr>
                                    <td colspan="3">&nbsp;</td>
                                    <td colspan="2">
                                        <table class="table table-condensed total-result">
                                        <tr>
                                            <?php
                                                $qtotal_ongkir = mysql_query("SELECT barang.berat_barang,keranjang.ongkos_kirim,session_id,qty, SUM((keranjang.ongkos_kirim * barang.berat_barang) * keranjang.qty) AS total_ongkir FROM barang,keranjang WHERE keranjang.session_id = '$session_id' AND keranjang.id_registrasi='$_SESSION[id_registrasi]' AND barang.kd_barang=keranjang.kd_barang");
                                                $rtotal_ongkir = mysql_fetch_assoc($qtotal_ongkir);
                                                echo "<td style='background-color:#f1f1f1;'> Ongkir  </td>";
                                                echo "<td style='background-color:#f1f1f1;'>";
                                                echo "Rp. ".rupiah($rtotal_ongkir['total_ongkir'])."";
                                                echo "</td>";
                                            ?>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td colspan="5"><hr></td>
                                        </tr>
                
                                        <tr>
                                            <?php
                                                $session_id = session_id();
                                                $qtotal = mysql_query("SELECT barang.kd_barang,harga_jual,berat_barang, keranjang.kd_barang,session_id,qty,ongkos_kirim, SUM((barang.harga_jual * keranjang.qty) + ((barang.berat_barang * keranjang.ongkos_kirim) * keranjang.qty)) AS total_bayar FROM barang, keranjang WHERE keranjang.session_id = '$session_id' AND keranjang.id_registrasi='$_SESSION[id_registrasi]' AND barang.kd_barang = keranjang.kd_barang");
                                                $rtotal = mysql_fetch_assoc($qtotal);
                                                    echo "<td style='font-weight:bold;background-color:#f1f1f1;'> Total Bayar &nbsp; </td>";
                                                    echo "<td style='font-weight:bold;background-color:#f1f1f1;'>";
                                                    echo "Rp. ".rupiah($rtotal['total_bayar'])."";
                                                    echo "</td>";
                                            ?>
                                        <tr>

                                        <tr>
                                            <td colspan="5"><br></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5"><br></td>
                                        </tr>

                                        <tr>
                                            <form action="?p=page&m=kirim" method="POST">
                                            <input type="hidden" name="ongkir" value="<?php echo $rtotal_ongkir['total_ongkir'];?>" id="input"/>
                                            <input type="hidden" name="tgl_expired" value="<?php echo $date; ?>">
                                            <td colspan="1"></td>
                                                <?php
                                                    if ($rtotal_ongkir['total_ongkir'] > 1) {
                                                ?>
                                            <td><button type="submit" name="bayar" id="submitBtn" class="mybutton"> KIRIM <i class="fa fa-toggle-right"></i></button></td>
                                                <?php
                                                    } else {
                                                        echo '<td colspan="1"><button type="submit" name="bayar" id="submitBtn" disabled style="background-color:#ddd;padding:10px;margin:10px;"> KIRIM <i class="fa fa-toggle-right"></i></button></td>';
                                                    }    
                                                ?>
                                            </td>
                                            </form>
                                        </tr>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            </table>
                            <div class="clear"></div>
                    </div>   
                </div>
            </div>
        </div>
    </div>

    <?php
    } else {
        echo "<script>window.location.href='?p=page&m=login';</script>";
    }

    echo '<div class="popup-wrapper" id="popup">';
    echo '<div class="popup-container">';
    echo '<form action="?p=add_cart" class="popup-form" method="post">';
    echo '<h3 style="background-color:#e44f2b;"><i class="fa fa-pencil"></i> Ubah Alamat Pengiriman Jika Memang Tujuan Pengiriman Berbeda</h3>';
    echo '<p><br/>';
    echo '<strong></strong></p>';
    echo '<div class="input-group">';
    echo '<table class="table table-responsive" border="1">';  
    echo '<form action="?p=add_cart" method="post">';
    echo '<thead style="text-align:left;font-weight:bold;">';
    echo '<tr>';
    echo '<th style="background-color:#B36C23;margin:3px 3px;padding:5px 5px;"> Masukkan Alamat </th>';
    echo '<th></th>';
    echo '<th></th>';
    echo '<th></th>';
    echo '<th></th>';
    echo '</tr>';
    echo '</thead>';

    echo '<tbody style="text-align:left;font-family:times new roman;">';
    echo '<tr>';

    $kd_keranjang = $_GET['id'];

    $qtampil = mysql_query("SELECT * FROM keranjang WHERE kd_keranjang='$kd_keranjang'");
    $ttampil = mysql_fetch_assoc($qtampil);
    
    $qpelanggan = mysql_query("SELECT * FROM registrasi WHERE id_registrasi='$_SESSION[id_registrasi]'");
    $tpelanggan = mysql_fetch_assoc($qpelanggan);
    echo '<td colspan="5" style="margin:3px 3px;padding:5px 5px;"><textarea name="alamat_kirim" rows="6" cols="60" placeholder="Masukkan Alamat Lengkap, Kota, dan Provinsi Yang berbeda. Jika Tujuan Pengiriman Berbeda dengan Alamat saat REGISTRASI. *Jika Sama Kosongkan Saja!">'.$ttampil['alamat_kirim'].'</textarea></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>&nbsp;</td>';
    echo '<td>&nbsp;</td>';
    echo '<td>&nbsp;</td>';
    echo '<td>&nbsp;</td>';
    echo '<td>&nbsp;</td>';
    echo '</tr>';


    echo '<tr>';
    echo '<td><hr></td>';
    echo '<td><hr></td>';
    echo '<td><hr></td>';
    echo '<td><hr></td>';
    echo '<td><hr></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th style="background-color:#B36C23;margin:3px 3px;padding:5px 5px;"> Pilih Provinsi dan Kota untuk Ongkos Kirim </th>';
    echo '<th></th>';
    echo '<th></th>';
    echo '<th></th>';
    echo '<th></th>';
    echo '</tr>';

    echo '<tr>';
    echo '<td><hr></td>';
    echo '<td><hr></td>';
    echo '<td><hr></td>';
    echo '<td><hr></td>';
    echo '<td><hr></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="2">Pilih Provinsi</td>';
    echo '<td colspan="2">Pilih Kota</td>';
    echo '<td></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="2">';
    ?>
            <select name="prop" onchange="pilih_kota(this.value);" class="ongkir">
                <option>Pilih Provinsi</option>
                <?php

                    $qprop = "SELECT * FROM provinsi ORDER BY kd_provinsi ASC";
                    $dprop = mysql_query ($qprop);
                    while ($hasil = mysql_fetch_array ($dprop)) {
                    $pilih = ($data['kd_provinsi']==$hasil['kd_provinsi'])?"selected" : "";
                    echo"<option value=\"$hasil[kd_provinsi]\" $pilih>$hasil[nama_provinsi]</option>";
                    }
                ?>
            </select>
    <?php
    echo '</td>';
    echo '<td colspan="2">';
    ?>

            <select name="ongkir" id="dom_kota" onChange="this.form.submit()" class="ongkir">
                <option value="#">Pilih Kota</option>
            </select>
    <?php
    echo '</td>';
    echo '<td> 
        <input type="hidden" name="jns_pengiriman" value="reguler" >
        <input type="hidden" name="kd_barang" value="'.$ttampil['kd_barang'].'">
    </td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>&nbsp;</td>';
    echo '<td>&nbsp;</td>';
    echo '<td>&nbsp;</td>';
    echo '<td>&nbsp;</td>';
    echo '<td>&nbsp;</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td colspan="2"></td>';
    echo '<td></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>&nbsp;</td>';
    echo '<td>&nbsp;</td>';
    echo '<td>&nbsp;</td>';
    echo '<td>&nbsp;</td>';
    echo '<td>&nbsp;</td>';
    echo '</tr>';

    
    echo '<tr>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<tr>';
    echo '</tr>';

    echo '</tbody>';
    echo '</form>';
    echo '</table>';
    echo '</div>';
    echo '</form>';
    echo '<a class="popup-close" href="#closed">X</a>';
    echo '</div>';
    echo '</div><div class="popup-wrapper" id="popup">';
    echo '<div class="popup-container">';
    echo '<form action="#" method="post" class="popup-form">';
    echo '<h2>Ikuti Update !!</h2>';
    echo '<div class="input-group">';
    
    echo '</div>';
    echo '</form>';
    echo '<a class="popup-close" href="#closed">X</a>';
    echo '</div>';
    echo '</div>';
?>