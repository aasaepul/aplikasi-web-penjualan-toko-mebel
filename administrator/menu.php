<?php
    if ($_SESSION['level'] == "admin") {
?>
<!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <nav>
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a class="menu-top-active" href="?page=dashboard"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-book"></i> &nbsp;Master Data</a>
                                <ul>
                                    <li><a href="?page=administrator"><i class="glyphicon glyphicon-user"></i> &nbsp;Akun</a></li>
                                    <li>
                                        <ul>
                                            <!-- <li><a href="?page=kurir"><i class="glyphicon glyphicon-send"></i> &nbsp;Kurir</a></li>-->
                                            <li><a href="?page=provinsi"><i class="glyphicon glyphicon-th-large"></i> &nbsp;Provinsi</a></li>
                                            <li><a href="?page=kota"><i class="glyphicon glyphicon-th"></i> &nbsp;Kota</a>
                                                <ul>
                                                    <li><a href="?page=info"><i class="glyphicon glyphicon-blackboard"></i> &nbsp;Info</a></li>
                                                    <li><a href="?page=kategori"><i class="glyphicon glyphicon-th-list"></i> &nbsp;Kategori</a></li>
                                                    <li><a href="?page=barang"><i class="glyphicon glyphicon-bed"></i> &nbsp;Barang</a></li>
                                                    <li><a href="?page=registrasi"><i class="glyphicon glyphicon-user"></i> &nbsp;Registrasi</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="?page=ongkir"><i class="glyphicon glyphicon-usd"></i> &nbsp;Ongkir</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="?page=suplier"><i class="glyphicon glyphicon-log-in"></i> &nbsp;Suplier</a></li>
                                    <li><a href="?page=bank"><i class="glyphicon glyphicon-piggy-bank"></i> &nbsp;Bank</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="glyphicon glyphicon-pencil"></i> &nbsp;Transaksi</a>
                                <ul>
                                    <li><a href="?page=trans_penjualan"><i class="glyphicon glyphicon-list-alt"></i> &nbsp;Penjualan</a></li>
                                    <li><a href="?page=trans_pemesanan"><i class="glyphicon glyphicon-list-alt"></i> &nbsp;Pemesanan</a></li>
                                    <li><a href="?page=konfirmasi"><i class="glyphicon glyphicon-list-alt"></i> &nbsp;Konfirmasi</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="glyphicon glyphicon-file"></i> &nbsp;Laporan</a>
                                <ul>
                                    <li><a href="content/laporan/lap-penjualan.php" target="_blank"><i class="glyphicon glyphicon-print"></i> &nbsp;Laporan Penjualan</a></li>
                                    <li><a href="content/laporan/lap-pemesanan.php" target="_blank"><i class="glyphicon glyphicon-print"></i> &nbsp;Laporan Pemesanan</a></li>
                                </ul>
                            </li>
                            <li><a href="home.php?page=profil"><i  class="fa fa-cogs" ></i> &nbsp; Pengaturan </a>
                        </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php
}
    else if ($_SESSION['level'] == "pemilik") {
?>
<!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <nav>
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a class="menu-top-active" href="?page=dashboard"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                            <li><a href="?page=administrator"><i class="glyphicon glyphicon-user"></i> &nbsp;Akun</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-file"></i> &nbsp;Laporan</a>
                                <ul>
                                    <li><a href="content/laporan/lap-penjualan.php" target="_blank"><i class="glyphicon glyphicon-print"></i> &nbsp;Laporan Penjualan</a></li>
                                    <li><a href="content/laporan/lap-pemesanan.php" target="_blank"><i class="glyphicon glyphicon-print"></i> &nbsp;Laporan Pemesanan</a></li>
                                </ul>
                            </li>
                            <li><a href="home.php?page=profil"><i  class="fa fa-cogs" ></i> &nbsp; Pengaturan </a>
                        </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php
    }
?>
