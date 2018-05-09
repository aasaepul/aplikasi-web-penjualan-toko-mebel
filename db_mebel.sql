-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2016 at 05:53 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_mebel`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `id_akun` int(5) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `level` enum('admin','pemilik') NOT NULL,
  PRIMARY KEY (`id_akun`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama_lengkap`, `email`, `username`, `password`, `foto`, `alamat`, `level`) VALUES
(4, 'Saepul Anwar', 'saepula002@gmail.com', 'pemilik', '58399557dae3c60e23c78606771dfa3d', 'saepul.jpg', 'Magelang', 'pemilik'),
(5, 'Anwar', 'seankakashi07@gmail.com', 'admin', 'e00cf25ad42683b3df678c61f42c6bda', 'c7b9a7c3ffbbd6d5bcbdb7403799b027.jpg', 'Jl.Warung Kandang Rt.12/03 Sindangsari,Plered,Purw', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `kd_bank` int(3) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(15) NOT NULL,
  `no_rekening` varchar(25) NOT NULL,
  `atas_nama` varchar(40) NOT NULL,
  `logo_bank` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_bank`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`kd_bank`, `nama_bank`, `no_rekening`, `atas_nama`, `logo_bank`) VALUES
(1, 'BCA', '123-456789-000', 'Putra Pandansari', 'bank-1bca.jpg'),
(2, 'BRI', '123-2345678-001', 'Putra Pandansari', 'bank-1bri.jpg'),
(3, 'Mandiri', '128-898766654-007', 'Putra Pandansari', 'bank-1mandiri.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kd_barang` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `berat_barang` int(3) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga_jual` varchar(70) NOT NULL,
  `kd_kategori` int(10) NOT NULL,
  PRIMARY KEY (`kd_barang`),
  KEY `FK_barang` (`kd_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `nama`, `deskripsi`, `foto`, `berat_barang`, `jumlah`, `harga_jual`, `kd_kategori`) VALUES
('KB00000001', 'Sketsel Klasik Ukiran Mawar', '<p><span style="font-size: small;"><strong>Sketsel Klasik Ukiran</strong></span></p>\r\n<p><span style="font-size: small;">Sketsel Klasik Ukiran dari jepara dengan corak ukiran yang khas jepara, baik untuk anda yang menggemari corak ukiran.</span></p>\r\n<p><strong><span style="font-size: small;">Sketsel Ukiran Jati</span></strong></p>\r\n<p><span style="font-size: small;">Sketsel ukiran dari material kayu jati dengan finishing melamine dapat anda pesan dengan selera anda. dengan ukuran standart sketsel/penyekat ruangan. Sketsel ini kami jual dengan harga yang cukup terjangkau untuk anda miliki.</span></p>\r\n<p><strong><span style="font-size: small;">Sketsel Penyekat Ruangan Mewah&nbsp;</span></strong></p>\r\n<p><span style="font-size: small;">Sketsel penyekat ruangan yang cukup eleghant untuk melengkapi interior rumah anda. dengan corak ukiran bunga mawar yang indah akan memberi keindahan ruangan anda.</span></p>', 'Sketsel-Ukir-3000000.jpg', 9, 15, '3000000', 15),
('KB00000002', 'Almari Pakaian Minimalis Jati', '<p>Jika Anda memesan produk ini diperlukan waktu untuk proses pembuatan atau&nbsp;<em>finishing</em>nya.</p>\r\n\r\n<p><strong>Almari Pajangan Pakaian Minimalis Jati</strong></p>\r\n\r\n<p>Almari pakaian minimalis dari material kayu jati pilihan dengan finishing melamine natural yang memberi tampilan natural serat kayu asli. Dilengkapi dengan 2 pintu dan 4 laci pada bagian bawah yang memberikan banyak ruang untuk menaruh barang&nbsp;anda dalam almari pakaian minimalis ini.</p>\r\n\r\n<p>Size : 112 cm x 67 cm x 205 cm<br />\r\nMaterial : Kayu jati&nbsp;</p>\r\n', 'almari pakaian minimalis jati.png', 8, 10, '1500000', 6),
('KB00000003', 'Bangku Minimalis Modern', '<p style="text-align: justify;"><strong>Bangku Minimalis Modern</strong><br />\r\nBangku jati minimalis dilengkapi dengan 3 laci pada bagian bawah dan bantalan yang empuk untuk kenyamanan anda menempati&nbsp;dan bersantai dengan keluarga. Dari material kayu jati pilihan dengan ukuran standar bangku minimalis.</p>\r\n\r\n<p style="text-align: justify;"><strong>Bangku Teras Rumah Minimalis</strong><br />\r\nBangku minimalis dengan desain minimalis yang terlihat tradisional, produk ini akan nyaman dan indah untuk teras rumah anda.&nbsp;</p>\r\n\r\n<p style="text-align: justify;">Size : 180 cm x 70 cm x 80 cm<br />\r\nMaterial : Kayu jati</p>\r\n', 'bangku minimalis modern.png', 5, 10, '2600000', 11),
('KB00000004', 'Buffet Minimalis Modern', '<p>Jika Anda memesan produk ini diperlukan waktu untuk proses pembuatan atau&nbsp;<em>finishing</em>nya.</p>\r\n\r\n<p><strong>Buffet TV Minimalis Modern</strong><br />\r\nBuffet tv dengan desain furniture minimalis dari material kayu jati. buffet tv dengan model buffet terbaru yang up to date&nbsp;yang akan memberikan kenyamanan untuk anda dalam menikmati acara televisi. Buffet tv yang dilengkapi dengan 2 laci da raak terbuka pada&nbsp;bagian atas dan bawah yang memberikan banyak ruang untuk menaruh benda perlengkapan televisi. Dengan ukuran standart meja televisi, finishing cat warna&nbsp;natural jati yang memperlihatkan serat kayu alami, memperlihatkan kwalitas kayu jati yang baik yang tanpa proses pengobatan.</p>\r\n\r\n<p>Size : 150 cm x 48 cm x 70 cm<br />\r\nMaterial : Kayu jati</p>\r\n', 'bufet minimalis modern.jpg', 15, 10, '3000000', 5),
('KB00000005', 'Buffet Palembang', '<p>Jika Anda memesan produk ini diperlukan waktu untuk proses pembuatan atau&nbsp;<em>finishing</em>nya.</p>\r\n\r\n<p><strong>Buffet Palembang</strong><br />\r\nBuffet klasik ukiran jepara yang menghiasi mebel jepara ini memberi corak ukiran yang indah. Sentuhan ukiran yang kecil&nbsp;dan rapi nampak apik menghias buffet ini. Dari material kayu jati yang baik, memberikan kwalitas yang bai untuk anda miliki.Difinishing natural semi gloss yang menawan dan memberikan tampilan ukiran yang lebih berwarna.</p>\r\n\r\n<p>Size : 20 cm x 45 cm x 75 cm<br />\r\nMaterial : Kayu jati</p>\r\n', 'bufet palembang.jpg', 17, 10, '3600000', 5),
('KB00000006', 'Buffet TV Klasik Duco', '<p style="text-align: justify;">Buffet TV Modern Model Klasik<br />\r\nBuffet tv klasik dengan model french style yang cukup menggelitik untuk dimiliki. Desain klasik yang indah dan menawan&nbsp;akan menghias ruangan rumah anda. Buffet tv ini di finishing duco krem yang menampilkan kesan antik, dan pada bagian daun meja difinishing walnut untuk memberi&nbsp;kombinasi warna yang indah. Bufet ini juga akan menjadi pelengkap rumah anda yang sempurna denga tampilan mewahnya. Dari material kayu mahoni memberikan hasil finishing duco yang sempurna.</p>\r\n\r\n<p style="text-align: justify;">Size : 60 cm x 120 cm x 70 cm<br />\r\nMaterial : Kayu mahoni</p>\r\n', 'bufet tv clasik duco.jpg', 13, 10, '4000000', 5),
('KB00000007', 'Buffet TV Hias Modern Minimali', '<p>Jika Anda memesan produk ini diperlukan waktu untuk proses pembuatan atau&nbsp;<em>finishing</em>nya.</p>\r\n\r\n<p><strong>Buffet TV Hias Modern Model Terbaru</strong><br />\r\nSet buffet TV hias untuk tempat TV dan perlengkapan hias tV dengan desain konsep furniture minimalis modern tampil&nbsp;eleghant dan mewah di dalam livingroom rumah anda. Memilih set bufet TV hias yang akan selaras untuk memadukan ruangan&nbsp;yang bergaya minimalis modern, menjadikan produk mebel jepara ini sangat cocok untuk dipadukan. Finishing warna natural yang terlihat&nbsp;antik menambahkan kesempurnaan set buffet tv hias ini untuk anda miliki. Dibuat dengan material kayu jati dengan kontruksi pembuatan Set buffet TV hias&nbsp;yang baik, furniture minimalis ini akan awet untuk mengisi perabotan rumah anda. Set buffet tv yang tampil dengan ukuran yang cukup&nbsp;besar dan memperlihatkan tampilan antik.</p>\r\n\r\n<p>Size : 300 cm x 50 cm x 200 cm.<br />\r\nMaterial : Kayu jati</p>\r\n', 'bufet tv hias modern minimalis.jpg', 25, 10, '4500000', 5),
('KB00000008', 'Pintu Gebyok Ukiran', '<p>Jika Anda memesan produk ini diperlukan waktu untuk proses pembuatan atau&nbsp;<em>finishing</em>nya.</p>\r\n\r\n<p><strong>Pintu Gebyok Ukiran</strong></p>\r\n\r\n<p>Pintu gebyok ukiran khas jepara yang eleghant dengan penampakan corak ukiran yang menghiasi pintu dan kusen&nbsp;rumah. Dari material kayu jati pilihan dan diukir tenaga ahli ukir yang berpengalaman dari jepara menghasilkan produk&nbsp;mebel jepara klasik yang sangat cantik untuk mengisi interior rumah anda.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'gebyok ukir pintu.jpg', 30, 10, '5000000', 16),
('KB00000009', 'Kursi Malas Rotan', '<p style="text-align: justify;"><strong>Kursi Malas Rotan</strong><br />\r\ndengan desain klasik yang dinamis untuk perlengkapan kursi bersantai dalam ruang anda. Dari material kayu jati&nbsp;dengan kombinasi rotan alam pada dudukan memperlihatkan tampila furniture jepara yang natural dan antik. Dengan kualitas yag baik kami tawarkan dengan harga yang kompetitif.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'kursi malas rotan.jpg', 12, 9, '1700000', 11),
('KB00000010', 'Kursi Sofa Klasik Gold', '<p style="text-align: justify;"><strong>Kursi Sofa Klasik Gold</strong><br />\r\nKursi sofa dengan model untuk dudukan dua orang yang terlihat estetis. Kursi sofa yang tampil klasik dengan sentuhan&nbsp;ukiran yang memberi nilai seni akan memperindah ruangan anda. Kursi sofa modern yang difinishing dengan warna gold/emas dan dikombinasikan dengan&nbsp;warna kain sofa warna merah dengan corak emas terlihat matching dengan warna finishing gold.</p>\r\n\r\n<p style="text-align: justify;">Material : Kayu Mahoni</p>\r\n', 'kursi sofa klasik gold.jpg', 15, 10, '1200000', 11),
('KB00000011', 'Kursi Sofa Rococo Gold', '<p style="text-align: justify;"><strong>Kursi Sofa Rococo Gold</strong><br />\r\nSet kursi teras untuk tempat bersantai dalam dan di luar ruang yang tampil impresif. Set kursi sofa yang banyak disukai&nbsp;semua orang, set kursi sofa ini merupakan produk kami yang cukup laris dipasaran. Kursi sofa dengan dudukan standart untuk&nbsp;tempat duduk. Dengan model yang dinamis biasa untuk mengisi kursi makan, kursi teras, kursi santai, kursi pelaminan, dan kursi lainnya.&nbsp;Finishing warna cat gold/emas menambahkan nilai seni pada set kursi teras rococo ini.</p>\r\n\r\n<p style="text-align: justify;">Dimensi : Kursi 1,1 dengan meja teras 1<br />\r\nMaterial : Kayu Mahoni</p>\r\n', 'kursi sofa rococo gold.jpg', 15, 10, '2000000', 11),
('KB00000012', 'Kursi Tamu Minimalis Jati', '<p>Jika Anda memesan produk ini diperlukan waktu untuk proses pembuatan atau&nbsp;<em>finishing</em>nya.</p>\r\n\r\n<p><strong>Kursi Tamu Minimalis</strong>&nbsp;<br />\r\nKursi tamu minimalis dengan desain mebel minimalis model cekung pada sisi kursi memberikan kesan yang eleghant.&nbsp;Finishing natural menampilkan warna kayu jati baik untuk anda yang menyukai warna natural menampilkan warna kayu jati&nbsp;baik untuk anda yang menyukai warna natural. Terbuat dari material kayu jati, dengan bentuk dan finishingnya yang mewah.</p>\r\n\r\n<p>Dimensi : Kursi tamu 2,1,1 + Meja tamu 1<br />\r\nMaterial : Kayu jati&nbsp;</p>\r\n', 'kursi tamu minimalis jari.jpg', 25, 10, '3100000', 11),
('KB00000013', 'Kursi Tiffany Gold Jepara', '<p style="text-align: justify;"><strong>Kursi Tiffany Gold Jepara</strong><br />\r\nKursi tiffany jepara tampil dengan finishing warna gold/emas yang memberi kesan eleghant. Kursi jepara yang biasa untuk&nbsp;kursi perlengkapan dekorasi kami jual dengan harga murah dan kualitas yang baik untuk kebutuhan anda.</p>\r\n', 'kursi tiffany jepara.jpg', 7, 9, '800000', 11),
('KB00000014', 'Lemari Pajangan Jati', '<p>Jika Anda memesan produk ini diperlukan waktu untuk proses pembuatan atau&nbsp;<em>finishing</em>nya.</p>\r\n\r\n<p><strong>Lemari Pajangan Murah 2 Pintu</strong><br />\r\nLemari Hias/Pajangan Murah Jepara model freshstyle dengan 2 pintu. Desain &nbsp;Furnitur Klasik dengan sentuhan ukiran&nbsp;dari jepara.&nbsp;Lemari pajangan 2 pintu dari material kayu jati dan kayu mahoni, dilengkapi 2 pintu dan 2 laci dan finishing warna&nbsp;antik yang menambah keantikan pada almari pajangan ukiran 2 pintu ini.</p>\r\n\r\n<p>Material : Kayu jati<br />\r\nSize : 110 cm x 40 cm x 205 cm</p>\r\n', 'lemari pajangan jati.jpg', 28, 9, '3800000', 6),
('KB00000015', 'Lemari Pakaian 3 Pintu Jati', '<p>Jika Anda memesan produk ini diperlukan waktu untuk proses pembuatan atau&nbsp;<em>finishing</em>nya.</p>\r\n\r\n<p><strong>Almari Pakaian 3 Pintu</strong><br />\r\nLemari pakaian jepara yang hadir dengan penuh kemewahan dengan warna finishing gold. Darimaterial kayu yang baik&nbsp;yang akan aman dan awet untuk anda memiliki lemari pakaian klasik ini. Lemari pakaian dengan model 3 pintu yang&nbsp;dinamis.&nbsp;Almari pakaian jepara yang mempunyai niai estetika tinggi yang mempunyai fungsi utama untuk tempat pakaian juga untuk&nbsp;sarana menghias <em>bedroom</em> anda.</p>\r\n\r\n<p>Ukuran : 150 cm x 60cm x 200cm<br />\r\nMaterial : Kayu Mahoni &nbsp;</p>\r\n', 'lemari pakaian 3 pintu jati.jpg', 35, 10, '4000000', 6),
('KB00000016', 'Rak Buku Duco', '<p style="text-align: justify;"><strong>Rak Buku Duco Minimalis</strong>&nbsp;<br />\r\nRak buku dengan tampilan furniture minimalis yang akan kompatible di segala ruangan anda. Desain yang modern&nbsp;minimalis terkesan eleghant untuk interior ruangan. Rak buku yang biasa kita jumpai dalam ruang buku, ruang belajar, ruang library, ruang kantor&nbsp;dan ruang untuk tempat buku lainnya. Rak buku duco ini dengan tampilan yang cantik juga biasa untuk tempat <em>CD/DVD</em> dan aksesoris lainnya.</p>\r\n\r\n<p style="text-align: justify;"><br />\r\nSize : 110 cm x 40 cm x 200 cm<br />\r\nMaterial : Kayu Mahoni</p>\r\n', 'rak buku duco.jpg', 26, 9, '2800000', 4),
('KB00000017', 'Set Bufet Minimalis', '<p>Jika Anda memesan produk ini diperlukan waktu untuk proses pembuatan atau&nbsp;<em>finishing</em>nya.</p>\r\n\r\n<p><strong>Set Buffet TV Minimalis</strong><br />\r\nBuffet tv dengan desain furniture minimalis dari material kayu jati. buffet tv dengan model buffet terbaru yang up to date&nbsp;yang akan memberikan kenyamanan untuk anda dalam menikmati acara televisi. Buffet tv yang dilengkapi dengan 2 laci da raak terbuka pada&nbsp;bagian atas dan bawah yang memberikan banyak ruang untuk menaruh benda perlengkapan televisi. Dengan ukuran standart meja televisi, finishing cat warna&nbsp;natural jati yang memperlihatkan serat kayu alami, memperlihatkan kwalitas kayu jati yang baik yang tanpa proses pengobatan.</p>\r\n\r\n<p>Size : 150 cm x 48 cm x 70 cm<br />\r\nMaterial : Kayu jati</p>\r\n', 'set bufet minimalis.jpg', 25, 10, '2850000', 5),
('KB00000018', 'Set Kursi Makan Jati', '<p>Jika Anda memesan produk ini diperlukan waktu untuk proses pembuatan atau <em>finishing</em>nya.</p>\r\n\r\n<p><strong>S</strong><strong style="line-height:1.6">et Kursi Makan Murah</strong></p>\r\n\r\n<p>Kursi makan murah dari material kayu jati model klasik ukiran yang indah menjadikan ruang makan lebih berwarna&nbsp;dan nyaman untuk anda menikmati hidangan makanan. Set kursi makan dengan model dudukan blok kayu dan meja gembol.&nbsp;</p>\r\n\r\n<p>Material : Kayu Jati</p>\r\n', 'set kursi makan jati.jpg', 45, 10, '7550000', 11),
('KB00000019', 'Set Kursi Taman Banana', '<p style="text-align: justify;"><strong>Set Kursi Taman Banana + Bantalan</strong><br />\r\nSet kursi taman/garden banana yang nyaman dengan perlengkapan cushion yang nyaman untuk perlengkapan kursi taman&nbsp;ini. Kursi garden/taman dari jepara yang tersedia dengan ukuran dudukan satu dan dua dan berbagai variatif meja untuk&nbsp;perlengkapan set kursi banana ini. Dengan material kayu jati dilengkapi bantalan dan difinishing natural yang menampilkan&nbsp;kesan natural. Desain yang dinamis, set kursi garden ini juga baik untuk anda tempatkan di ruang tamu, ruang tunggu, dan ruang publik area lainnya.</p>\r\n\r\n<p style="text-align: justify;">Dimensi : Bangku Taman 1 + Kursi Taman 1,1 + Meja 1<br />\r\nMaterial : Kayu Jati</p>\r\n', 'set kursi taman banana dengan bantalan.jpg', 38, 10, '8100000', 11),
('KB00000020', 'Set Kursi Tamu Sofa', '<p>Jika anda memesan produk ini diperlukan waktu untuk proses pembuatan atau finishingnya.</p>\r\n\r\n<p><strong>Set Kursi Tamu Sofa&nbsp;</strong><br />\r\nSet kursi tamu dengan desain Furniture klasik dari material kayu jati, finishing warna natural melamine bisa anda pesan sekarang juga.&nbsp;Kursi sofa dengan dudukan 3,2,1,1 + Meja tamu + Meja stool.&nbsp;</p>\r\n\r\n<p>Size : Kursi 3,2,1,1 + Meja tamu 1 dengan kaca 8.mm + meja stool 2 dengan kaca<br />\r\nMaterial : Kayu Jati.</p>\r\n', 'set kursi tamu jati.jpg', 48, 10, '12250000', 11),
('KB00000021', 'Sketsel Dekorasi pelaminan Kla', '<p style="text-align: justify;"><strong>Sketsel Dekorasi Pelaminan Klasik</strong><br />\r\nSketsel dekorasi pelaminan klasik yang terbuat dari material kayu jati, corak ukiran yang indah melengkapi kreasi seni dalam sketsel ini. Dengan&nbsp;sentuhan ukirannya menghiasi seluruh sketsel dan menjadikan produk ini tampil mewah.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'sketsel klasik.jpg', 48, 10, '6700000', 15),
('KB00000022', 'Sketsel Minimalis', '<p style="text-align: justify;"><strong>Sketsel Minimalis Jati</strong><br />\r\nSketsel minimalis dari jepara untuk melengkapi penyekat ruangan anda. dari material kayu jati dan ukuran standart untuk&nbsp;sketsel penyekat ruangan, selain yang fungsinya untuk penyekat ruangan, juga untuk mempercantik ruangan anda&nbsp;mebel minimalis jepara ini kami jual dengan harga yang terjangkau.</p>\r\n\r\n<p style="text-align: justify;">Size : 160cm x 180cm<br />\r\nMaterial : Kayu jati</p>\r\n', 'sketsel minimalis.jpg', 30, 3, '2500000', 15),
('KB00000023', 'Rak Buku Anak', '<p style="text-align: justify;"><strong>Rak Buku Anak Minimalis</strong><br />\r\nRak buku minimalis untuk anak - anak dengan model kartun kesayangan mereka kami hadirkan untuk mengisi interior kamar&nbsp;anak. Dengan melengkapi furniture anak yang sesuai dengan model kartun kesayangan mereka, mereka akan lebih menyukai dan betah di dalam kamar mereka.</p>\r\n\r\n<p style="text-align: justify;">Size : 94 cm x 37 cm x 108cm<br />\r\nMaterial : Kayu mahoni</p>\r\n', 'tempat buku anak.jpg', 6, 11, '1000000', 4);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `kd_info` int(10) NOT NULL AUTO_INCREMENT,
  `judul` varchar(70) NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `tgl` datetime NOT NULL,
  PRIMARY KEY (`kd_info`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`kd_info`, `judul`, `isi`, `foto`, `tgl`) VALUES
(1, 'Profil Toko Putra Pandansari', '<p style="text-align:justify">Toko Mebel Putra Pandansari merupakan perusahaan yang bergerak di bidang produksi dan distribusi mebel. Pada toko Mebel Putra Pandansari sebagai toko pusat tempat produksi, pengolahan segala keuangan dan juga melayani permintaan pelanggan (proses jual &ndash; beli).</p>\r\n\r\n<p style="text-align:justify">Pemberian nama toko Mebel Putra Pandansari didasarkan pada daerah asal pemilik toko yaitu Pandansari. Saat ini toko Mebel Putra Pandansari memiliki 28 karyawan, 1 sekretaris, 2 karyawan sebagai <em>delivery man, </em>25 karyawan bekerja di bagian produksi.</p>\r\n\r\n<p style="text-align:justify">Toko Mebel Putra Pandansari terletak di Jl.Magelang-Jogja Km 3 Tegalsari Jumoyo, dan berdiri pada tahun 2003.</p>\r\n', 'IMG_20150519_131335.jpg', '2016-02-12 07:04:43'),
(2, 'Cara Pemesanan', '<p>Anda dapat melihat cara pemesanan sesuai urutan nomor pada gambar berikut :</p>\r\n', 'cara-pesan.png', '2016-01-19 11:17:08'),
(3, 'Kayu Berkualitas', '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut &nbsp;abore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '11429529_1679837852236433_1920935676_n.jpg', '2015-07-31 07:22:31'),
(4, 'Kayu Jati', '<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'risbang-3.jpg', '2015-07-31 07:23:25'),
(5, 'Kayu Mahoni', '<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'kursi-6.jpg', '2015-07-31 07:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kd_kategori` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `nama_kategori`) VALUES
(3, 'Meja'),
(4, 'Rak'),
(5, 'Bufet'),
(6, 'Almari'),
(7, 'Nakas'),
(8, 'Garden'),
(9, 'Gebyok'),
(10, 'Kitchen Set'),
(11, 'Kursi'),
(14, 'Tempat Tidur'),
(15, 'Sketsel'),
(16, 'Katalog Khusus');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE IF NOT EXISTS `keranjang` (
  `kd_keranjang` int(10) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(50) NOT NULL,
  `qty` int(5) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `id_registrasi` int(10) NOT NULL,
  `ongkos_kirim` varchar(50) NOT NULL,
  `alamat_kirim` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_keranjang`),
  KEY `FK_keranjang` (`kd_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`kd_keranjang`, `session_id`, `qty`, `kd_barang`, `id_registrasi`, `ongkos_kirim`, `alamat_kirim`) VALUES
(15, 'qmu4b1g3mieefa34su30891rg7', 1, 'KB00000023', 16, '35000', 'Jl.Warung Boto Rt.16/07 Srigetuk,Kasongan (REJANG LEBONG - BENGKULU)');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE IF NOT EXISTS `konfirmasi` (
  `kd_konfirmasi` int(10) NOT NULL AUTO_INCREMENT,
  `tgl_konfirmasi` datetime NOT NULL,
  `tampil_konfirmasi` enum('Y','N') NOT NULL,
  `bukti_transfer` varchar(100) NOT NULL,
  `kd_bank` int(3) NOT NULL,
  `id_registrasi` int(10) NOT NULL,
  `kd_transaksi` varchar(10) NOT NULL,
  PRIMARY KEY (`kd_konfirmasi`),
  KEY `FK_konfirmasi` (`kd_bank`),
  KEY `FK_registrasi` (`id_registrasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`kd_konfirmasi`, `tgl_konfirmasi`, `tampil_konfirmasi`, `bukti_transfer`, `kd_bank`, `id_registrasi`, `kd_transaksi`) VALUES
(11, '2016-03-20 06:24:46', 'N', '19253779-Illustration-of-Stock-Illustration-muslim-cartoon-kids.jpg', 1, 16, '96QZEX'),
(12, '2016-03-20 06:29:19', 'N', 'BBM-logo.png', 2, 12, 'AMIUV3'),
(13, '2016-03-20 06:32:32', 'N', 'icon_guide_head_contact.png', 3, 13, 'AUF6Z5'),
(14, '2016-03-20 06:42:04', 'N', 'home.jpeg', 1, 15, '006QD4'),
(15, '2016-03-20 06:45:36', 'N', 'master-header.jpg', 1, 14, 'QJSMHI'),
(16, '2016-03-23 16:27:16', 'N', 'download (1).jpg', 1, 15, 'D6M249');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `kd_kota` varchar(8) NOT NULL,
  `nama_kota` varchar(30) NOT NULL,
  `kd_provinsi` varchar(8) NOT NULL,
  PRIMARY KEY (`kd_kota`),
  KEY `FK_kota` (`kd_provinsi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`kd_kota`, `nama_kota`, `kd_provinsi`) VALUES
('K001', 'ACEH SELATAN', 'P001'),
('K002', 'ACEH TENGGARA', 'P001'),
('K003', 'ACEH TIMUR', 'P001'),
('K004', 'ACEH TENGAH', 'P001'),
('K005', 'ACEH BARAT', 'P001'),
('K006', 'ACEH BESAR', 'P001'),
('K007', 'PIDIE', 'P001'),
('K008', 'ACEH UTARA', 'P001'),
('K009', 'SIMEULUE', 'P001'),
('K010', 'ACEH SINGKIL', 'P001'),
('K011', 'BIREUEN', 'P001'),
('K012', 'ACEH BARAT DAYA', 'P001'),
('K013', 'GAYO LUES', 'P001'),
('K014', 'ACEH JAYA', 'P001'),
('K015', 'NAGAN RAYA', 'P001'),
('K016', 'ACEH TAMIANG', 'P001'),
('K017', 'BENER MERIAH', 'P001'),
('K018', 'PIDIE JAYA', 'P001'),
('K019', 'KOTA BANDA ACEH', 'P001'),
('K020', 'KOTA SABANG', 'P001'),
('K021', 'KOTA LHOKSEUMAWE', 'P001'),
('K022', 'KOTA LANGSA', 'P001'),
('K023', 'KOTA SUBULUSSALAM', 'P001'),
('K024', 'LABUHANBATU SELATAN', 'P002'),
('K025', 'LABUHANBATU SELATAN', 'P002'),
('K026', 'NIAS UTARA', 'P002'),
('K027', 'NIAS BARAT', 'P002'),
('K028', 'KOTA GUNUNGSITOLI', 'P002'),
('K029', 'TAPANULI TENGAH', 'P002'),
('K030', 'TAPANULI UTARA', 'P002'),
('K031', 'TAPANULI SELATAN', 'P002'),
('K032', 'NIAS', 'P002'),
('K033', 'LANGKAT', 'P002'),
('K034', 'KARO', 'P002'),
('K035', 'DELI SERDANG', 'P002'),
('K036', 'SIMALUNGUN', 'P002'),
('K037', 'ASAHAN', 'P002'),
('K038', 'LABUHANBATU', 'P002'),
('K039', 'DAIRI', 'P002'),
('K040', 'TOBA SAMOSIR', 'P002'),
('K041', 'MANDAILING NATAL', 'P002'),
('K042', 'NIAS SELATAN', 'P002'),
('K043', 'PAKPAK BHARAT', 'P002'),
('K044', 'HUMBANG HASUNDUTAN', 'P002'),
('K045', 'SAMOSIR', 'P002'),
('K046', 'SERDANG BEDAGAI', 'P002'),
('K047', 'BATU BARA ', 'P002'),
('K048', 'KOTA MEDAN', 'P002'),
('K049', 'KOTA PEMATANGSIANTAR', 'P002'),
('K050', 'KOTA SIBOLGA', 'P002'),
('K051', 'KOTA TANJUNG BALAI', 'P002'),
('K052', 'KOTA BINJAI', 'P002'),
('K053', 'KOTA TEBING TINGGI', 'P002'),
('K054', 'KOTA PADANG SIDIMPUAN', 'P002'),
('K055', 'PADANG LAWAS UTARA', 'P002'),
('K056', 'PADANG LAWAS', 'P002'),
('K057', 'PESISIR SELATAN', 'P003'),
('K058', 'SOLOK', 'P003'),
('K059', 'SIJUNJUNG', 'P003'),
('K060', 'TANAH DATAR', 'P003'),
('K061', 'PADANG PARIAMAN', 'P003'),
('K062', 'AGAM', 'P003'),
('K063', 'LIMA PULUH KOTA', 'P003'),
('K064', 'PASAMAN', 'P003'),
('K065', 'KEPULAUAN MENTAWAI', 'P003'),
('K066', 'DHARMASRAYA', 'P003'),
('K067', 'SOLOK SELATAN', 'P003'),
('K068', 'PASAMAN BARAT', 'P003'),
('K069', 'KOTA PADANG', 'P003'),
('K070', 'KOTA SOLOK', 'P003'),
('K071', 'KOTA SAWAH LUNTO', 'P003'),
('K072', 'KOTA PADANG PANJANG', 'P003'),
('K073', 'KOTA BUKITTINGGI', 'P003'),
('K074', 'KOTA PAYAKUMBUH', 'P003'),
('K075', 'KOTA PARIAMAN', 'P003'),
('K076', 'KEPULAUAN MERANTI', 'P004'),
('K077', 'KAMPAR', 'P004'),
('K078', 'INDRAGIRI HULU', 'P004'),
('K079', 'BENGKALIS', 'P004'),
('K080', 'INDRAGIRI HILIR', 'P004'),
('K081', 'PELALAWAN', 'P004'),
('K082', 'ROKAN HULU', 'P004'),
('K083', 'ROKAN HILIR', 'P004'),
('K084', 'SIAK', 'P004'),
('K085', 'KUANTAN SINGINGI', 'P004'),
('K086', 'KOTA PEKANBARU', 'P004'),
('K087', 'KOTA DUMAI', 'P004'),
('K088', 'KOTA SUNGAI PENUH', 'P005'),
('K089', 'KERINCI', 'P005'),
('K090', 'MERANGIN', 'P005'),
('K091', 'SAROLANGUN', 'P005'),
('K092', 'BATANGHARI', 'P005'),
('K093', 'MUARO JAMBI', 'P005'),
('K094', 'TANJUNG JABUNG BARAT', 'P005'),
('K095', 'TANJUNG JABUNG TIMUR', 'P005'),
('K096', 'BUNGO', 'P005'),
('K097', 'TEBO', 'P005'),
('K098', 'KOTA JAMBI', 'P005'),
('K099', 'OGAN KOMERING ULU', 'P006'),
('K100', 'OGAN KOMERING ILIR', 'P006'),
('K101', 'MUARA ENIM', 'P006'),
('K102', 'LAHAT', 'P006'),
('K103', 'MUSI RAWAS', 'P006'),
('K104', 'MUSI BANYUASIN', 'P006'),
('K105', 'BANYUASIN', 'P006'),
('K106', 'OGAN KOMERING ULU TIMUR', 'P006'),
('K107', 'OGAN KOMERING ULU SELATAN', 'P006'),
('K108', 'OGAN ILIR', 'P006'),
('K109', 'EMPAT LAWANG', 'P006'),
('K110', 'KOTA PALEMBANG', 'P006'),
('K111', 'KOTA PAGAR ALAM', 'P006'),
('K112', 'KOTA LUBUK LINGGAU', 'P006'),
('K113', 'KOTA PRABUMULIH', 'P006'),
('K114', 'BENGKULU TENGAH', 'P007'),
('K115', 'BENGKULU SELATAN', 'P007'),
('K116', 'REJANG LEBONG', 'P007'),
('K117', 'BENGKULU UTARA', 'P007'),
('K118', 'KAUR', 'P007'),
('K119', 'SELUMA', 'P007'),
('K120', 'MUKOMUKO', 'P007'),
('K121', 'LEBONG', 'P007'),
('K122', 'KEPAHIANG', 'P007'),
('K123', 'KOTA BENGKULU', 'P007'),
('K124', 'PRINGSEWU', 'P008'),
('K125', 'MESUJI', 'P008'),
('K126', 'TULANG BAWANG BARAT', 'P008'),
('K127', 'LAMPUNG SELATAN', 'P008'),
('K128', 'LAMPUNG TENGAH', 'P008'),
('K129', 'LAMPUNG UTARA', 'P008'),
('K130', 'LAMPUNG BARAT', 'P008'),
('K131', 'TULANG BAWANG', 'P008'),
('K132', 'TANGGAMUS', 'P008'),
('K133', 'LAMPUNG TIMUR', 'P008'),
('K134', 'WAY KANAN', 'P008'),
('K135', 'KOTA BANDAR LAMPUNG', 'P008'),
('K136', 'KOTA METRO', 'P008'),
('K137', 'PESAWARAN', 'P008'),
('K138', 'BANGKA', 'P009'),
('K139', 'BELITUNG', 'P009'),
('K140', 'BANGKA SELATAN', 'P009'),
('K141', 'BANGKA TENGAH', 'P009'),
('K142', 'BANGKA BARAT', 'P009'),
('K143', 'BANGKA TIMUR', 'P009'),
('K144', 'KOTA PANGKALPINANG', 'P009'),
('K145', 'KOTA TANJUNGPINANG', 'P010'),
('K146', 'KEPULAUAN ANAMBAS', 'P010'),
('K147', 'BINTAN', 'P010'),
('K148', 'KARIMUN', 'P010'),
('K149', 'NATUNA ', 'P010'),
('K150', 'LINGGA', 'P010'),
('K151', 'KOTA BATAM', 'P010'),
('K152', 'KEPULAUAN SERIBU', 'P011'),
('K153', 'JAKARTA PUSAT', 'P011'),
('K154', 'JAKARTA UTARA', 'P011'),
('K155', 'JAKARTA BARAT', 'P011'),
('K156', 'JAKARTA SELATAN', 'P011'),
('K157', 'JAKARTA TIMUR', 'P011'),
('K158', 'BOGOR', 'P012'),
('K159', 'SUKABUMI', 'P012'),
('K160', 'CIANJUR', 'P012'),
('K161', 'BANDUNG', 'P012'),
('K162', 'GARUT', 'P012'),
('K163', 'TASIKMALAYA', 'P012'),
('K164', 'CIAMIS', 'P012'),
('K165', 'KUNINGAN', 'P012'),
('K166', 'CIREBON', 'P012'),
('K167', 'MAJALENGKA', 'P012'),
('K168', 'SUMEDANG', 'P012'),
('K169', 'INDRAMAYU', 'P012'),
('K170', 'SUBANG', 'P012'),
('K171', 'PURWAKARTA', 'P012'),
('K172', 'KARAWANG', 'P012'),
('K173', 'BEKASI', 'P012'),
('K174', 'BANDUNG BARAT', 'P012'),
('K175', 'KOTA BOGOR', 'P012'),
('K176', 'KOTA SUKABUMI', 'P012'),
('K177', 'KOTA BANDUNG', 'P012'),
('K178', 'KOTA CIREBON', 'P012'),
('K179', 'KOTA BEKASI', 'P012'),
('K180', 'KOTA DEPOK', 'P012'),
('K181', 'KOTA CIMAHI', 'P012'),
('K182', 'KOTA TASIKMALAYA', 'P012'),
('K183', 'KOTA BANJAR', 'P012'),
('K184', 'CILACAP', 'P013'),
('K185', 'BANYUMAS', 'P013'),
('K186', 'PURBALINGGA', 'P013'),
('K187', 'BANJARNEGARA', 'P013'),
('K188', 'KEBUMEN', 'P013'),
('K189', 'PURWOREJO', 'P013'),
('K190', 'WONOSOBO', 'P013'),
('K191', 'MAGELANG', 'P013'),
('K192', 'BOYOLALI', 'P013'),
('K193', 'KLATEN', 'P013'),
('K194', 'SUKOHARJO', 'P013'),
('K195', 'WONOGIRI', 'P013'),
('K196', 'KARANGANYAR', 'P013'),
('K197', 'SRAGEN', 'P013'),
('K198', 'GROBOGAN', 'P013'),
('K199', 'BLORA', 'P013'),
('K200', 'REMBANG', 'P013'),
('K201', 'PATI', 'P013'),
('K202', 'KUDUS', 'P013'),
('K203', 'JEPARA', 'P013'),
('K204', 'DEMAK', 'P013'),
('K205', 'SEMARANG', 'P013'),
('K206', 'TEMANGGUNG', 'P013'),
('K207', 'KENDAL', 'P013'),
('K208', 'BATANG', 'P013'),
('K209', 'PEKALONGAN', 'P013'),
('K210', 'PEMALANG', 'P013'),
('K211', 'TEGAL', 'P013'),
('K212', 'BREBES', 'P013'),
('K213', 'KOTA MAGELANG', 'P013'),
('K214', 'KOTA SURAKARTA', 'P013'),
('K215', 'KOTA SALATIGA', 'P013'),
('K216', 'KULON PROGO', 'P014'),
('K217', 'BANTUL', 'P014'),
('K218', 'GUNUNG KIDUL', 'P014'),
('K219', 'SLEMAN', 'P014'),
('K220', 'KOTA YOGYAKARTA', 'P014'),
('K221', 'PACITAN', 'P015'),
('K222', 'PONOROGO', 'P015'),
('K223', 'TRENGGALEK', 'P015'),
('K224', 'TULUNGAGUNG', 'P015'),
('K225', 'BLITAR', 'P015'),
('K226', 'KEDIRI', 'P015'),
('K227', 'MALANG', 'P015'),
('K228', 'LUMAJANG', 'P015'),
('K229', 'JEMBER', 'P015'),
('K230', 'BANYUWANGI', 'P015'),
('K231', 'BONDOWOSO', 'P015'),
('K232', 'SITUBONDO', 'P015'),
('K233', 'PROBOLINGGO', 'P015'),
('K234', 'PASURUAN', 'P015'),
('K235', 'SIDOARJO', 'P015'),
('K236', 'MOJOKERTO', 'P015'),
('K237', 'JOMBANG', 'P015'),
('K238', 'NGANJUK', 'P015'),
('K239', 'MADIUN', 'P015'),
('K240', 'MAGETAN', 'P015'),
('K241', 'NGAWI', 'P015'),
('K242', 'BOJONEGORO', 'P015'),
('K243', 'TUBAN', 'P015'),
('K244', 'LAMONGAN', 'P015'),
('K245', 'GRESIK', 'P015'),
('K246', 'BANGKALAN', 'P015'),
('K247', 'SAMPANG', 'P015'),
('K248', 'PAMEKASAN', 'P015'),
('K249', 'SUMENEP', 'P015'),
('K250', 'KOTA KEDIRI', 'P015'),
('K251', 'KOTA BLITAR', 'P015'),
('K252', 'PROBOLINGGO', 'P015'),
('K253', 'SURABAYA', 'P015'),
('K254', 'KOTA BATU', 'P015'),
('K255', 'PANDEGLANG', 'P016'),
('K256', 'LEBAK', 'P016'),
('K257', 'TANGERANG', 'P016'),
('K258', 'KOTA SERANG', 'P016'),
('K259', 'KOTA CILEGON', 'P016'),
('K260', 'KOTA TANGERANG SELATAN', 'P016'),
('K261', 'JEMBRANA', 'P017'),
('K262', 'TABANAN', 'P017'),
('K263', 'BADUNG', 'P017'),
('K264', 'GIANYAR', 'P017'),
('K265', 'KLUNGKUNG', 'P017'),
('K266', 'BANGLI', 'P017'),
('K267', 'KARANGASEM', 'P017'),
('K268', 'BULELENG', 'P017'),
('K269', 'KOTA DENPASAR', 'P017'),
('K270', 'LOMBOK BARAT', 'P018'),
('K271', 'LOMBOK TENGAH', 'P018'),
('K272', 'LOMBOK TIMUR', 'P018'),
('K273', 'SUBAWA', 'P018'),
('K274', 'DOMPU', 'P018'),
('K275', 'BIMA', 'P018'),
('K276', 'SUMBAWA BARAT', 'P018'),
('K277', 'KOTA MATARAM', 'P018'),
('K278', 'KOTA BIMA', 'P018'),
('K279', 'LOMBOK UTARA', 'P018'),
('K280', 'KUPANG', 'P019'),
('K281', 'TIMOR TENGAH SELATAN', 'P019'),
('K282', 'TIMOR TENGAH UTARA', 'P019'),
('K283', 'BELU', 'P019'),
('K284', 'ALOR', 'P019'),
('K285', 'FLORES TIMUR', 'P019'),
('K286', 'SIKKA', 'P019'),
('K287', 'ENDE', 'P019'),
('K288', 'NGADA', 'P019'),
('K289', 'MANGGARAI', 'P019'),
('K290', 'SUMBA TIMUR', 'P019'),
('K291', 'SUMBA BARAT', 'P019'),
('K292', 'LEMBATA', 'P019'),
('K293', 'ROTE NDAO', 'P019'),
('K294', 'MANGGARAI BARAT', 'P019'),
('K295', 'NAGEKEO', 'P019'),
('K296', 'SUMBA TENGAH', 'P019'),
('K297', 'SUMBA BARAT DAYA', 'P019'),
('K298', 'KOTA KUPANG', 'P019'),
('K299', 'MANGGARAI TIMUR', 'P019'),
('K300', 'SABU RAIJUA', 'P019'),
('K301', 'SAMBAS', 'P020'),
('K302', 'PONTIANAK', 'P020'),
('K303', 'SANGGAU', 'P020'),
('K304', 'KETAPANG', 'P020'),
('K305', 'SINTANG', 'P020'),
('K306', 'KAPUAS HULU', 'P020'),
('K307', 'BENGKAYANG', 'P020'),
('K308', 'LANDAK', 'P020'),
('K309', 'SEKADAU', 'P020'),
('K310', 'MELAWI', 'P020'),
('K311', 'KAYONG UTARA', 'P020'),
('K312', 'SINGKAWANG', 'P020'),
('K313', 'KUBU RAYA', 'P020'),
('K314', 'KOTAWARINGIN BARAT', 'P021'),
('K315', 'KOTAWARINGIN TIMUR', 'P021'),
('K316', 'KAPUAS', 'P021'),
('K317', 'BARITO SELATAN', 'P021'),
('K318', 'BARITO UTARA', 'P021'),
('K319', 'KATINGAN', 'P021'),
('K320', 'SERUYAN', 'P021'),
('K321', 'SUKAMANA', 'P021'),
('K322', 'LAMANDAU', 'P021'),
('K323', 'GUNUNG MAS', 'P021'),
('K324', 'PULANG PISAU', 'P021'),
('K325', 'MURUNG RAYA', 'P021'),
('K326', 'BARITO TIMUR', 'P021'),
('K327', 'KOTA PALANGKARAYA', 'P021'),
('K328', 'TANAH LAUT', 'P022'),
('K329', 'KOTABARU', 'P022'),
('K330', 'BANJAR', 'P022'),
('K331', 'BARITO KUALA', 'P022'),
('K332', 'TAPIN', 'P022'),
('K333', 'HULU SUNGAI SELATAN', 'P022'),
('K334', 'HULU SUNGAI TENGAH', 'P022'),
('K335', 'HULU SUNGAI UTARA', 'P022'),
('K336', 'TABALONG', 'P022'),
('K337', 'TANAH BUMBU', 'P022'),
('K338', 'BALANGAN', 'P022'),
('K339', 'KOTA BANJARMASIN', 'P022'),
('K340', 'KOTA BANJARBARU', 'P022'),
('K341', 'PASER', 'P023'),
('K342', 'KUTAI KARTANEGARA', 'P023'),
('K343', 'BERAU', 'P023'),
('K344', 'BULUNGAN', 'P023'),
('K345', 'NUNUKAN', 'P023'),
('K346', 'MALINAU', 'P023'),
('K347', 'KUTAI BARAT', 'P023'),
('K348', 'KUTAI TIMUR', 'P023'),
('K349', 'PENAJAM PASER UTARA', 'P023'),
('K350', 'KOTA BALIKPAPAN', 'P023'),
('K351', 'KOTA SAMARINDA', 'P023'),
('K352', 'KOTA TARAKAN', 'P023'),
('K353', 'KOTA BONTANG', 'P023'),
('K354', 'TANA TIDUNG', 'P023'),
('K355', 'BOLAANG MONGONDOW TIMUR', 'P024'),
('K356', 'BOLAANG MONGONDOW SELATAN', 'P024'),
('K357', 'BOLAANG MONGONDOW', 'P024'),
('K358', 'MINAHASA', 'P024'),
('K359', 'KEPULAUAN SANGIHE', 'P024'),
('K360', 'KEPULAUAN TALAUD', 'P024'),
('K361', 'MINAHASA SELATAN', 'P024'),
('K362', 'MINAHASA UTARA', 'P024'),
('K363', 'MINAHASA TENGGARA', 'P024'),
('K364', 'BOLAANG MONGONDOW UTARA', 'P024'),
('K365', 'KEP.SIAU TAGULANDANG BIARO', 'P024'),
('K366', 'KOTA MANADO', 'P024'),
('K367', 'KOTA BITUNG', 'P024'),
('K368', 'KOTA TOMOHON', 'P024'),
('K369', 'KOTA MOBAGU', 'P024'),
('K370', 'SIGI', 'P025'),
('K371', 'BANGGAI', 'P025'),
('K372', 'POSO', 'P025'),
('K373', 'DONGGALA', 'P025'),
('K374', 'TOLITOLI', 'P025'),
('K375', 'BUOL', 'P025'),
('K376', 'MOROWALI', 'P025'),
('K377', 'BANGGAI KEPULAUAN', 'P025'),
('K378', 'PAIGI MOUTONG', 'P025'),
('K379', 'TOJO UNA-UNA', 'P025'),
('K380', 'KOTA PALU', 'P025'),
('K381', 'TORAJA UTARA', 'P026'),
('K382', 'KEPULAUAN SELAYAR', 'P026'),
('K383', 'BULUKUMBA', 'P026'),
('K384', 'BANTENG', 'P026'),
('K385', 'JENEPONTO', 'P026'),
('K386', 'TAKALAR', 'P026'),
('K387', 'GOWA', 'P026'),
('K388', 'SINJAI', 'P026'),
('K389', 'BONE', 'P026'),
('K390', 'MAROS', 'P026'),
('K391', 'PANGKAJENE', 'P026'),
('K392', 'BARRU', 'P026'),
('K393', 'SOPPENG', 'P026'),
('K394', 'WAJO', 'P026'),
('K395', 'SIDENRENG RAPPANG', 'P026'),
('K396', 'PINRANG', 'P026'),
('K397', 'ENREKANG', 'P026'),
('K398', 'LUWU', 'P026'),
('K399', 'TANA TORAJA', 'P026'),
('K400', 'LUWU UTARA', 'P026'),
('K401', 'LUWU TIMUR', 'P026'),
('K402', 'KOTA MAKASSAR', 'P026'),
('K403', 'KOTA PARE-PARE', 'P026'),
('K404', 'KOTA PALOPO', 'P026'),
('K405', 'KOLAKA', 'P027'),
('K406', 'KONAWE', 'P027'),
('K407', 'MUNA', 'P027'),
('K408', 'BUTON', 'P027'),
('K409', 'KONAWE SELATAN', 'P027'),
('K410', 'BOMBANA', 'P027'),
('K411', 'WAKATOBI', 'P027'),
('K412', 'KOLAKA UTARA', 'P027'),
('K413', 'KONAWE UTARA', 'P027'),
('K414', 'BUTON UTARA', 'P027'),
('K415', 'KOTA KENDARI', 'P027'),
('K416', 'KOTA BAU-BAU', 'P027'),
('K417', 'KOTA GORONTALO', 'P028'),
('K418', 'BOALEMO', 'P028'),
('K419', 'BONE BOLANGO', 'P028'),
('K420', 'PAHUWATO', 'P028'),
('K421', 'GORONTALO UTARA', 'P028'),
('K422', 'MAMUJU UTARA', 'P029'),
('K423', 'MAMUJU', 'P029'),
('K424', 'MAMASA', 'P029'),
('K425', 'POLEWALI MANDAR', 'P029'),
('K426', 'MAJENE', 'P029'),
('K427', 'MALUKU BARAT DAYA', 'P030'),
('K428', 'BURU SELATAN', 'P030'),
('K429', 'SERAM BAGIAN TIMUR', 'P030'),
('K430', 'SERAM BAGIAN BARAT', 'P030'),
('K431', 'KEPULAUAN ARU', 'P030'),
('K432', 'KOTA AMBON', 'P030'),
('K433', 'KOTA TUAL', 'P030'),
('K434', 'PULAU MOROTAI', 'P031'),
('K435', 'HALMAHERA BARAT', 'P031'),
('K436', 'HALMAHERA TENGAH', 'P031'),
('K437', 'HALMAHERA UTARA', 'P031'),
('K438', 'HALMAHERA SELATAN', 'P031'),
('K439', 'HALMAHERA TIMUR', 'P031'),
('K440', 'KEPULAUAN SULA', 'P031'),
('K441', 'KOTA TERNATE', 'P031'),
('K442', 'KOTA TIDORE', 'P031'),
('K443', 'INTAN JAYA', 'P032'),
('K444', 'DEIYAI', 'P032'),
('K445', 'TOLIKARA', 'P032'),
('K446', 'WAROPEN', 'P032'),
('K447', 'BOVEN DIGOEL', 'P032'),
('K448', 'MAPPI', 'P032'),
('K449', 'ASMAT', 'P032'),
('K450', 'SUPIORI', 'P032'),
('K451', 'MEMBERAMO RAYA', 'P032'),
('K452', 'KOTA JAYAPURA', 'P032'),
('K453', 'MEMBERAMO TENGAH', 'P032'),
('K454', 'YALIMO', 'P032'),
('K455', 'LANNY JAYA', 'P032'),
('K456', 'NDUGA', 'P032'),
('K457', 'PUNCAK', 'P032'),
('K458', 'DOGIYAI', 'P032'),
('K459', 'MERAUKE', 'P032'),
('K460', 'JAYAWIJAYA', 'P032'),
('K461', 'JAYAPURA', 'P032'),
('K462', 'NABIRE', 'P032'),
('K463', 'KEPULAUAN YAPEN', 'P032'),
('K464', 'BIAK NUMFOR', 'P032'),
('K465', 'PUNCAK JAYA', 'P032'),
('K466', 'PANIAI', 'P032'),
('K467', 'MIMIKA', 'P032'),
('K468', 'SARIMI', 'P032'),
('K469', 'KEEROM', 'P032'),
('K470', 'PEGUNUNGAN BINTANG', 'P032'),
('K471', 'YAHUKIMO', 'P032'),
('K472', 'MAYBRAT', 'P033'),
('K473', 'TAMBRAUW', 'P033'),
('K474', 'SORONG', 'P033'),
('K475', 'MANOKWARI', 'P033'),
('K476', 'FAKFAK', 'P033'),
('K477', 'SORONG SELATAN', 'P033'),
('K478', 'RAJA AMPAT', 'P033'),
('K479', 'TELUK BINTUNI', 'P033'),
('K480', 'TELUK WONDAMA', 'P033'),
('K481', 'KAIMANA', 'P033'),
('K482', 'KOTA SORONG', 'P033');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE IF NOT EXISTS `ongkir` (
  `kd_ongkir` int(10) NOT NULL AUTO_INCREMENT,
  `ongkos_kirim` varchar(30) NOT NULL,
  `jns_pengiriman` enum('reguler','yes') NOT NULL,
  `kd_kota` varchar(8) NOT NULL,
  PRIMARY KEY (`kd_ongkir`),
  KEY `FK_id_kota` (`kd_kota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=202 ;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`kd_ongkir`, `ongkos_kirim`, `jns_pengiriman`, `kd_kota`) VALUES
(2, '97000', 'reguler', 'K001'),
(3, '77000', 'reguler', 'K002'),
(4, '97000', 'reguler', 'K003'),
(5, '97000', 'reguler', 'K004'),
(6, '97000', 'reguler', 'K006'),
(7, '97000', 'reguler', 'K005'),
(9, '35000', 'reguler', 'K171'),
(11, '97000', 'reguler', 'K001'),
(12, '97000', 'reguler', 'K014'),
(13, '97000', 'reguler', 'K016'),
(14, '97000', 'reguler', 'K010'),
(15, '97000', 'reguler', 'K006'),
(16, '97000', 'reguler', 'K012'),
(17, '97000', 'reguler', 'K007'),
(18, '77000', 'reguler', 'K025'),
(19, '97000', 'reguler', 'K011'),
(20, '77000', 'reguler', 'K020'),
(21, '77000', 'reguler', 'K021'),
(22, '77000', 'reguler', 'K001'),
(23, '77000', 'reguler', 'K023'),
(24, '77000', 'reguler', 'K024'),
(25, '116000', 'reguler', 'K042'),
(26, '116000', 'reguler', 'K032'),
(27, '116000', 'reguler', 'K026'),
(28, '116000', 'reguler', 'K027'),
(29, '77000', 'reguler', 'K028'),
(30, '77000', 'reguler', 'K029'),
(31, '77000', 'reguler', 'K030'),
(32, '77000', 'reguler', 'K031'),
(33, '61000', 'reguler', 'K033'),
(34, '77000', 'reguler', 'K034'),
(35, '77000', 'reguler', 'K035'),
(36, '77000', 'reguler', 'K036'),
(37, '77000', 'reguler', 'K037'),
(38, '77000', 'reguler', 'K038'),
(39, '77000', 'reguler', 'K039'),
(40, '61000', 'reguler', 'K040'),
(41, '77000', 'reguler', 'K041'),
(42, '77000', 'reguler', 'K043'),
(43, '77000', 'reguler', 'K044'),
(44, '61000', 'reguler', 'K045'),
(45, '77000', 'reguler', 'K046'),
(46, '77000', 'reguler', 'K047'),
(47, '33000', 'reguler', 'K048'),
(48, '61000', 'reguler', 'K049'),
(49, '61000', 'reguler', 'K050'),
(50, '61000', 'reguler', 'K051'),
(51, '61000', 'reguler', 'K052'),
(52, '77000', 'reguler', 'K053'),
(53, '77000', 'reguler', 'K054'),
(54, '77000', 'reguler', 'K055'),
(55, '77000', 'reguler', 'K056'),
(56, '68000', 'reguler', 'K057'),
(57, '54000', 'reguler', 'K058'),
(58, '68000', 'reguler', 'K059'),
(59, '68000', 'reguler', 'K060'),
(60, '68000', 'reguler', 'K061'),
(61, '68000', 'reguler', 'K062'),
(62, '68000', 'reguler', 'K063'),
(63, '68000', 'reguler', 'K064'),
(64, '54000', 'reguler', 'K065'),
(65, '68000', 'reguler', 'K066'),
(66, '68000', 'reguler', 'K067'),
(67, '68000', 'reguler', 'K068'),
(68, '31000', 'reguler', 'K069'),
(69, '68000', 'reguler', 'K070'),
(70, '54000', 'reguler', 'K071'),
(71, '54000', 'reguler', 'K072'),
(72, '54000', 'reguler', 'K073'),
(73, '54000', 'reguler', 'K074'),
(74, '54000', 'reguler', 'K075'),
(75, '58000', 'reguler', 'K076'),
(76, '58000', 'reguler', 'K077'),
(77, '73000', 'reguler', 'K078'),
(78, '73000', 'reguler', 'K079'),
(79, '73000', 'reguler', 'K080'),
(80, '73000', 'reguler', 'K081'),
(81, '73000', 'reguler', 'K082'),
(82, '73000', 'reguler', 'K083'),
(83, '73000', 'reguler', 'K084'),
(84, '73000', 'reguler', 'K085'),
(85, '31000', 'reguler', 'K086'),
(86, '73000', 'reguler', 'K087'),
(87, '67000', 'reguler', 'K089'),
(88, '53000', 'reguler', 'K090'),
(89, '101000', 'reguler', 'K091'),
(90, '67000', 'reguler', 'K092'),
(91, '67000', 'reguler', 'K093'),
(92, '67000', 'reguler', 'K094'),
(93, '67000', 'reguler', 'K095'),
(94, '101000', 'reguler', 'K096'),
(95, '53000', 'reguler', 'K097'),
(96, '31000', 'reguler', 'K098'),
(97, '52000', 'reguler', 'K099'),
(98, '65000', 'reguler', 'K100'),
(99, '65000', 'reguler', 'K101'),
(100, '65000', 'reguler', 'K102'),
(101, '65000', 'reguler', 'K103'),
(102, '65000', 'reguler', 'K104'),
(103, '65000', 'reguler', 'K105'),
(104, '65000', 'reguler', 'K106'),
(105, '65000', 'reguler', 'K107'),
(106, '52000', 'reguler', 'K108'),
(107, '65000', 'reguler', 'K109'),
(108, '31000', 'reguler', 'K110'),
(109, '52000', 'reguler', 'K111'),
(110, '52000', 'reguler', 'K112'),
(111, '65000', 'reguler', 'K113'),
(112, '31000', 'reguler', 'K114'),
(113, '73000', 'reguler', 'K115'),
(114, '73000', 'reguler', 'K116'),
(115, '73000', 'reguler', 'K117'),
(116, '73000', 'reguler', 'K118'),
(117, '73000', 'reguler', 'K119'),
(118, '73000', 'reguler', 'K120'),
(119, '58000', 'reguler', 'K121'),
(120, '58000', 'reguler', 'K122'),
(121, '31000', 'reguler', 'K123'),
(122, '65000', 'reguler', 'K126'),
(123, '52000', 'reguler', 'K127'),
(124, '65000', 'reguler', 'K128'),
(125, '65000', 'reguler', 'K129'),
(126, '65000', 'reguler', 'K130'),
(127, '65000', 'reguler', 'K131'),
(128, '65000', 'reguler', 'K132'),
(129, '65000', 'reguler', 'K133'),
(130, '65000', 'reguler', 'K134'),
(131, '31000', 'reguler', 'K135'),
(132, '52000', 'reguler', 'K136'),
(133, '52000', 'reguler', 'K137'),
(134, '68000', 'reguler', 'K138'),
(135, '78000', 'reguler', 'K139'),
(136, '68000', 'reguler', 'K140'),
(137, '54000', 'reguler', 'K141'),
(138, '54000', 'reguler', 'K142'),
(139, '68000', 'reguler', 'K143'),
(140, '34000', 'reguler', 'K144'),
(141, '41000', 'reguler', 'K145'),
(142, '78000', 'reguler', 'K147'),
(143, '93000', 'reguler', 'K148'),
(144, '140000', 'reguler', 'K149'),
(145, '74000', 'reguler', 'K150'),
(146, '35000', 'reguler', 'K151'),
(147, '18000', 'reguler', 'K152'),
(148, '18000', 'reguler', 'K153'),
(149, '18000', 'reguler', 'K154'),
(150, '18000', 'reguler', 'K155'),
(151, '18000', 'reguler', 'K156'),
(152, '18000', 'reguler', 'K157'),
(153, '21000', 'reguler', 'K158'),
(154, '42000', 'reguler', 'K159'),
(155, '42000', 'reguler', 'K160'),
(156, '19000', 'reguler', 'K161'),
(157, '35000', 'reguler', 'K162'),
(158, '35000', 'reguler', 'K163'),
(159, '35000', 'reguler', 'K164'),
(160, '50000', 'reguler', 'K165'),
(161, '50000', 'reguler', 'K166'),
(162, '50000', 'reguler', 'K167'),
(163, '35000', 'reguler', 'K168'),
(164, '50000', 'reguler', 'K169'),
(165, '35000', 'reguler', 'K170'),
(166, '27000', 'reguler', 'K172'),
(167, '21000', 'reguler', 'K173'),
(168, '19000', 'reguler', 'K174'),
(169, '21000', 'reguler', 'K175'),
(170, '42000', 'reguler', 'K176'),
(171, '19000', 'reguler', 'K177'),
(172, '50000', 'reguler', 'K178'),
(173, '21000', 'reguler', 'K179'),
(174, '21000', 'reguler', 'K180'),
(175, '23000', 'reguler', 'K181'),
(176, '28000', 'reguler', 'K182'),
(177, '75000', 'reguler', 'K183'),
(178, '34000', 'reguler', 'K184'),
(179, '15000', 'reguler', 'K185'),
(180, '19000', 'reguler', 'K186'),
(181, '19000', 'reguler', 'K187'),
(182, '24000', 'reguler', 'K188'),
(183, '24000', 'reguler', 'K189'),
(184, '24000', 'reguler', 'K190'),
(185, '9000', 'reguler', 'K191'),
(186, '19000', 'reguler', 'K192'),
(187, '19000', 'reguler', 'K193'),
(188, '19000', 'reguler', 'K194'),
(189, '19000', 'reguler', 'K195'),
(190, '19000', 'reguler', 'K196'),
(191, '19000', 'reguler', 'K197'),
(192, '19000', 'reguler', 'K198'),
(193, '15000', 'reguler', 'K199'),
(194, '19000', 'reguler', 'K200'),
(195, '19000', 'reguler', 'K201'),
(196, '19000', 'reguler', 'K202'),
(197, '19000', 'reguler', 'K203'),
(198, '19000', 'reguler', 'K204'),
(199, '19000', 'reguler', 'K205'),
(200, '24000', 'reguler', 'K206'),
(201, '19000', 'reguler', 'K207');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `kd_provinsi` varchar(8) NOT NULL,
  `nama_provinsi` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_provinsi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`kd_provinsi`, `nama_provinsi`) VALUES
('P001', 'ACEH'),
('P002', 'SUMATERA UTARA'),
('P003', 'SUMATERA BARAT'),
('P004', 'RIAU'),
('P005', 'JAMBI'),
('P006', 'SUMATERA SELATAN'),
('P007', 'BENGKULU'),
('P008', 'LAMPUNG'),
('P009', 'KEPULAUAN BANGKA BELITUNG'),
('P010', 'KEPULAUAN RIAU'),
('P011', 'DKI JAKARTA'),
('P012', 'JAWA BARAT'),
('P013', 'JAWA TENGAH'),
('P014', 'DAERAH ISTIMEWA YOGYAKARTA'),
('P015', 'JAWA TIMUR'),
('P016', 'BANTEN'),
('P017', 'BALI'),
('P018', 'NUSA TENGGARA BARAT'),
('P019', 'NUSA TENGGARA TIMUR'),
('P020', 'KALIMANTAN BARAT'),
('P021', 'KALIMANTAN TENGAH'),
('P022', 'KALIMANTAN SELATAN'),
('P023', 'KALIMANTAN TIMUR'),
('P024', 'SULAWESI UTARA'),
('P025', 'SULAWESI TENGAH'),
('P026', 'SULAWESI SELATAN'),
('P027', 'SULAWESI TENGGARA'),
('P028', 'GORONTALO'),
('P029', 'SULAWESI BARAT'),
('P030', 'MALUKU'),
('P031', 'MALUKU UTARA'),
('P032', 'PAPUA'),
('P033', 'PAPUA BARAT');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE IF NOT EXISTS `registrasi` (
  `id_registrasi` int(10) NOT NULL AUTO_INCREMENT,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` varchar(5) NOT NULL,
  PRIMARY KEY (`id_registrasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`id_registrasi`, `nama_depan`, `nama_belakang`, `email`, `no_telp`, `alamat`, `username`, `password`, `hak_akses`) VALUES
(12, 'Asep', 'Lili Rukmansyah', 'wirawirawiri@gmail.com', '082325242564', 'Jl.Warung Kandang Rt.12/03 Sindangsari,Plered (PURWAKARTA - JAWA BARAT)', 'asep', '44cbc5a7223c5976632fb458a47eba6f', 'user'),
(13, 'Rudi', 'Firmansyah', 'wirawirawiri@gmail.com', '082325242564', 'Jl. Beo Rt.14/02 Sukatani,Arcamani (BANYUASIN - SUMATERA SELATAN)', 'rudi', 'f73c3d855247bffda3cd739ff6ceea18', 'user'),
(14, 'Mamat', 'Ruhimat', 'wirawirawiri@gmail.com', '082325242564', 'Jl.Kapten Juanda Rt.15/06 Tawangsari, Munggul (TANGGAMUS - LAMPUNG)', 'mamat', '56a1285cfbb841b8b568899ff212dd84', 'user'),
(15, 'Fajar', 'Basuki', 'wirawirawiri@gmail.com', '082325242564', 'Jl. Simanjuntak Rt.12/04 Kejaten,Mangunan (BIREUEN - ACEH)', 'fajar', '9a9536397d62b117cca2b85e703e965d', 'user'),
(16, 'Saepul', 'Anwar', 'wirawirawiri@gmail.com', '082325242564', 'Jl.Warung Boto Rt.16/07 Srigetuk,Kasongan (REJANG LEBONG - BENGKULU)', 'saepul', '69bdff04d7ab1e09252bffad8a58b3b4', 'user'),
(17, 'Aden', 'uden', 'dd@yahoo.com', '098678876678', 'pwk', 'aden', '7578hjhh8y8', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE IF NOT EXISTS `suplier` (
  `id_suplier` int(5) NOT NULL AUTO_INCREMENT,
  `nama_suplier` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  PRIMARY KEY (`id_suplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`, `no_telp`, `alamat`, `deskripsi`) VALUES
(1, 'UD Makmur Jaya', '082325242564', 'Jogja', '<p>UD Makmur Jaya</p>\r\n'),
(3, 'PT Tandi Tirta Mas', '082325242564', 'Jepara', '<p>PT Tandi Tirta Mas</p>\r\n'),
(4, 'Putra Nasyiah Jati', '082325242564', 'Jl. Muntilan No.07 ', '<p>Putra Nasyiah Jati merupakan distribusi pembuatan mebel dari kayu jati.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `trans_pemesanan`
--

CREATE TABLE IF NOT EXISTS `trans_pemesanan` (
  `kd_trans_pemesanan` int(10) NOT NULL AUTO_INCREMENT,
  `jumlah_pesan` varchar(5) NOT NULL,
  `harga_beli` varchar(50) NOT NULL,
  `tgl` datetime NOT NULL,
  `id_suplier` int(5) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  PRIMARY KEY (`kd_trans_pemesanan`),
  KEY `FK_trans_pemesanan` (`kd_barang`),
  KEY `FK_id_suplier` (`id_suplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `trans_pemesanan`
--

INSERT INTO `trans_pemesanan` (`kd_trans_pemesanan`, `jumlah_pesan`, `harga_beli`, `tgl`, `id_suplier`, `kd_barang`) VALUES
(1, '10', '500000', '2016-03-20 07:21:27', 1, 'KB00000009'),
(2, '5', '2500000', '2016-03-20 07:34:25', 3, 'KB00000001'),
(3, '6', '700000', '2016-03-20 07:35:58', 4, 'KB00000023');

-- --------------------------------------------------------

--
-- Table structure for table `trans_penjualan`
--

CREATE TABLE IF NOT EXISTS `trans_penjualan` (
  `kd_trans_penjualan` int(10) NOT NULL AUTO_INCREMENT,
  `qty` int(5) NOT NULL,
  `aksi_kirim` enum('sudah','belum') NOT NULL,
  `tanggapan` enum('menunggu','diterima') NOT NULL,
  `bayar` varchar(50) NOT NULL,
  `ongkos_kirim` varchar(50) NOT NULL,
  `tampil_trans_penjualan` enum('ya','tidak') NOT NULL,
  `tgl_trans` datetime NOT NULL,
  `tgl_expired` date NOT NULL,
  `tgl_kirim` datetime NOT NULL,
  `kd_transaksi` varchar(10) NOT NULL,
  `status_trans` enum('pesan','expired','terkirim') NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `id_registrasi` int(10) NOT NULL,
  `alamat_kirim` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_trans_penjualan`),
  KEY `FK_trans_penjualan` (`kd_barang`),
  KEY `FK_id_registrasi` (`id_registrasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `trans_penjualan`
--

INSERT INTO `trans_penjualan` (`kd_trans_penjualan`, `qty`, `aksi_kirim`, `tanggapan`, `bayar`, `ongkos_kirim`, `tampil_trans_penjualan`, `tgl_trans`, `tgl_expired`, `tgl_kirim`, `kd_transaksi`, `status_trans`, `kd_barang`, `id_registrasi`, `alamat_kirim`) VALUES
(2, 2, 'sudah', 'diterima', '2500000', '73000', 'ya', '2016-03-20 06:22:03', '2016-03-23', '2016-03-20 07:09:38', '96QZEX', 'terkirim', 'KB00000022', 16, ''),
(3, 1, 'sudah', 'diterima', '2800000', '35000', 'ya', '2016-03-20 06:26:22', '2016-03-23', '2016-03-20 07:09:31', 'AMIUV3', 'terkirim', 'KB00000016', 12, ''),
(4, 1, 'sudah', 'diterima', '800000', '65000', 'ya', '2016-03-20 06:31:30', '2016-03-23', '2016-03-20 07:09:22', 'AUF6Z5', 'terkirim', 'KB00000013', 13, ''),
(5, 1, 'sudah', 'diterima', '3800000', '97000', 'ya', '2016-03-10 06:40:54', '2016-03-13', '2016-03-20 07:07:02', '006QD4', 'terkirim', 'KB00000014', 15, ''),
(6, 1, 'sudah', 'diterima', '1700000', '65000', 'ya', '2016-03-17 06:43:56', '2016-03-20', '2016-03-20 07:06:53', 'QJSMHI', 'terkirim', 'KB00000009', 14, ''),
(15, 1, 'belum', 'diterima', '1000000', '35000', 'ya', '2016-03-23 16:03:19', '2016-03-26', '0000-00-00 00:00:00', 'D6M249', 'pesan', 'KB00000023', 15, 'Jl. Simanjuntak Rt.12/04 Kejaten,Mangunan (BIREUEN - ACEH)'),
(16, 1, 'belum', 'diterima', '2500000', '65000', 'ya', '2016-03-23 16:03:19', '2016-03-26', '0000-00-00 00:00:00', 'D6M249', 'pesan', 'KB00000022', 15, 'Lampung');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `FK_barang` FOREIGN KEY (`kd_kategori`) REFERENCES `kategori` (`kd_kategori`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `FK_keranjang` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`);

--
-- Constraints for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `FK_konfirmasi` FOREIGN KEY (`kd_bank`) REFERENCES `bank` (`kd_bank`),
  ADD CONSTRAINT `konfirmasi_ibfk_1` FOREIGN KEY (`id_registrasi`) REFERENCES `registrasi` (`id_registrasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `kota_ibfk_1` FOREIGN KEY (`kd_provinsi`) REFERENCES `provinsi` (`kd_provinsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD CONSTRAINT `ongkir_ibfk_1` FOREIGN KEY (`kd_kota`) REFERENCES `kota` (`kd_kota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trans_pemesanan`
--
ALTER TABLE `trans_pemesanan`
  ADD CONSTRAINT `FK_trans_pemesanan` FOREIGN KEY (`id_suplier`) REFERENCES `suplier` (`id_suplier`),
  ADD CONSTRAINT `trans_pemesanan_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trans_penjualan`
--
ALTER TABLE `trans_penjualan`
  ADD CONSTRAINT `FK_trans_penjualan` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`),
  ADD CONSTRAINT `trans_penjualan_ibfk_1` FOREIGN KEY (`id_registrasi`) REFERENCES `registrasi` (`id_registrasi`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
