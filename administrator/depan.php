  <div class="row">
    <div class="col-md-12">
        <div class="alert alert-success">
            <i class="glyphicon glyphicon-user"></i> Selamat datang <b> <?php echo $_SESSION['nama_lengkap'];?> </b>, Anda masuk sebagai <b><?php echo $_SESSION['level'];?> !!!</b>
        </div>
    </div>
  </div>


  <div class="row">
  <?php
    if ($_SESSION['level'] == "admin") {
  ?>

    <div class="col-md-3 col-sm-3 col-xs-6">
      <a href="home.php?page=profil">
        <div class="dashboard-div-wrapper bk-clr-one">
                  <div class="user-section-inner">
                  <?php
                    $qfoto = mysql_query("SELECT foto FROM akun WHERE id_akun='$_SESSION[id_akun]'");
                    $rfoto = mysql_fetch_assoc($qfoto);
                  ?>
                
                <img src="../administrator/foto/administrator/<?php echo $rfoto['foto']; ?>" alt="">
                </div>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"></div>
                </div>
                
                <h5> Profil </h5>
        </div>
      </a>
    </div>
                  
    <div class="col-md-3 col-sm-3 col-xs-6">
      <a href="home.php?page=trans_penjualan_masuk">
        <div class="dashboard-div-wrapper bk-clr-two">
            <i  class="fa fa-money dashboard-div-icon" ></i>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%"></div>
                </div>

                <?php
                  $q_pesan = mysql_query("SELECT DISTINCT kd_trans_penjualan FROM trans_penjualan WHERE tanggapan = 'menunggu' ");
                  $n_pesan = mysql_num_rows($q_pesan);
                ?>
                
                <h5> Pesanan Masuk [ <?php echo $n_pesan; ?> ] </h5>
        </div>
      </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
      <a href="home.php?page=konfirmasi"> 
        <div class="dashboard-div-wrapper bk-clr-four">
            <i  class="fa fa-check dashboard-div-icon" ></i>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
                </div>
                         
                <?php
                    $q_konfirmasi = mysql_query("SELECT DISTINCT kd_konfirmasi FROM konfirmasi WHERE tampil_konfirmasi='Y'");
                    $n_konfirmasi = mysql_num_rows($q_konfirmasi);
                ?>
                <h5> Konfirmasi Masuk [ <?php echo $n_konfirmasi; ?> ]</h5>
        </div>
      </a>
    </div>
  
    <div class="col-md-3 col-sm-3 col-xs-6">
      <a href="home.php?page=cek-stok-barang">
        <div class="dashboard-div-wrapper bk-clr-two">
            <i  class="fa fa-bed dashboard-div-icon" ></i>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                </div>
                     
                <?php
                    $q_stokbarang = mysql_query("SELECT A.`kd_barang`,A.`nama`,A.`foto`,A.`jumlah`,A.`harga_jual`,B.`nama_kategori` FROM barang A,kategori B WHERE A.kd_kategori=B.kd_kategori AND A.jumlah <='3' AND B.nama_kategori<> 'Katalog Khusus' ORDER BY A.`kd_barang` DESC");
                    $n_stokbarang = mysql_num_rows($q_stokbarang);
                ?>    
                <h5> Cek Stok Barang [ <?php echo $n_stokbarang; ?> ] </h5>
        </div>
      </a>
    </div>
    
    <?php
    } else if ($_SESSION['level'] == "pemilik") {
    ?>

      <div class="col-md-3 col-sm-3 col-xs-3"></div>

      <div class="col-md-3 col-sm-3 col-xs-3">
      <a href="home.php?page=profil">
        <div class="dashboard-div-wrapper bk-clr-one">
                  <div class="user-section-inner">
                  <?php
                    $qfoto = mysql_query("SELECT foto FROM akun WHERE id_akun='$_SESSION[id_akun]'");
                    $rfoto = mysql_fetch_assoc($qfoto);
                  ?>
                
                <img src="../administrator/foto/administrator/<?php echo $rfoto['foto']; ?>" alt="">
                </div>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"></div>
                </div>
                
                <h5> Profil </h5>
        </div>
      </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-3">
      <a href="home.php?page=cek-stok-barang">
        <div class="dashboard-div-wrapper bk-clr-two">
            <i  class="fa fa-bed dashboard-div-icon" ></i>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                </div>
                     
                <?php
                    $q_stokbarang = mysql_query("SELECT A.`kd_barang`,A.`nama`,A.`foto`,A.`jumlah`,A.`harga_jual`,B.`nama_kategori` FROM barang A,kategori B WHERE A.kd_kategori=B.kd_kategori AND A.jumlah <='3' AND B.nama_kategori<> 'Katalog Khusus' ORDER BY A.`kd_barang` DESC");
                    $n_stokbarang = mysql_num_rows($q_stokbarang);
                ?>    
                <h5> Cek Stok Barang [ <?php echo $n_stokbarang; ?> ] </h5>
        </div>
      </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-3"></div>
    <?php
    }
    ?>
  </div>
