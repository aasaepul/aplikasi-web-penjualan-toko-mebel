<?php
include "plugins/fpdf.php";
include "app/fungsi.php";
include('administrator/app/conn.php');

$id_users     = $_SESSION['id_registrasi'];
$username     = $_SESSION['user'];

$qongkir = mysql_query("SELECT
                trans_penjualan.*,
                barang.*,
                registrasi.*,
                    SUM((barang.berat_barang * trans_penjualan.ongkos_kirim) * trans_penjualan.qty) AS ongkir
                    FROM trans_penjualan,
                        barang,
                        registrasi
                    WHERE trans_penjualan.`kd_barang` = barang.`kd_barang`
                    AND trans_penjualan.`id_registrasi` = '$id_users'
                    AND trans_penjualan.`aksi_kirim` = 'belum'
                    AND trans_penjualan.`tanggapan` = 'menunggu'
                    AND registrasi.`username`='$username'
                    ORDER BY trans_penjualan.kd_trans_penjualan DESC");
                $ongkir  = mysql_fetch_assoc($qongkir);

$tot_bayar = mysql_query("SELECT
                trans_penjualan.*,
                barang.*,registrasi.*,
                    SUM((trans_penjualan.bayar * trans_penjualan.qty) + ((trans_penjualan.ongkos_kirim * barang.berat_barang) * trans_penjualan.qty)) AS total_bayar
                    FROM trans_penjualan,
                        barang,registrasi
                    WHERE trans_penjualan.`kd_barang` = barang.`kd_barang`
                    AND trans_penjualan.`id_registrasi` = '$id_users'
                    AND registrasi.`username` = '$username'
                    AND trans_penjualan.`aksi_kirim` = 'belum'
                    AND trans_penjualan.`tanggapan` = 'menunggu'
                    ORDER BY trans_penjualan.`kd_trans_penjualan` DESC");
                $total_bayar = mysql_fetch_assoc($tot_bayar);

$qsubtotal = mysql_query("SELECT
                trans_penjualan.*,
                barang.*,registrasi.*,
                    (trans_penjualan.bayar * trans_penjualan.qty) AS subtotal
                    FROM trans_penjualan,
                        barang,registrasi
                    WHERE trans_penjualan.`kd_barang` = barang.`kd_barang`
                    AND trans_penjualan.`id_registrasi` = '$id_users'
                    AND registrasi.`username` = '$username'
                    AND trans_penjualan.`aksi_kirim` = 'belum'
                    AND trans_penjualan.`tanggapan` = 'menunggu'
                    ORDER BY trans_penjualan.`kd_trans_penjualan` DESC");
                $subtotal = mysql_fetch_assoc($qsubtotal);

$query ="SELECT * FROM trans_penjualan, barang, registrasi
            WHERE trans_penjualan.`kd_barang`  = barang.`kd_barang`
            AND trans_penjualan.`id_registrasi`= '$id_users'
            AND trans_penjualan.`tanggapan`    = 'menunggu'
            AND trans_penjualan.`aksi_kirim`   = 'belum'
            AND registrasi.`username` = '$username'
            GROUP BY trans_penjualan.kd_trans_penjualan";
    $db_query = mysql_query($query) or die("Query gagal");
    //Variabel untuk iterasi    //Variabel untuk iterasi
    $i = 0;
    //Mengambil nilai dari query database
    while($data=mysql_fetch_array($db_query))
    {
        $cell[$i][0]  = $data[0];
        $cell[$i][1]  = $data[1];
        $cell[$i][2]  = $data[2];
        $cell[$i][3]  = $data[3];
        $cell[$i][4]  = $data[4];
        $cell[$i][5]  = $data[5];
        $cell[$i][6]  = $data[6];
        $cell[$i][7]  = $data[7];
        $cell[$i][8]  = $data[8];
        $cell[$i][9]  = $data[9];
        $cell[$i][10] = $data[10];
        $cell[$i][11] = $data[11];
        $cell[$i][12] = $data[12];
        $cell[$i][13] = $data[13];
        $cell[$i][14] = $data[14];
        $cell[$i][15] = $data[15];
        $cell[$i][16] = $data[16];
        $cell[$i][17] = $data[17];
        $cell[$i][18] = $data[18];
        $cell[$i][19] = $data[19];
        $cell[$i][20] = $data[20];
        $cell[$i][21] = $data[21];
        $cell[$i][22] = $data[22];
        $cell[$i][23] = $data[23];
        $cell[$i][24] = $data[24];
        $cell[$i][25] = $data[25];
        $cell[$i][26] = $data[26];
        $cell[$i][27] = $data[27];
        $cell[$i][28] = $data[28];

        $i++;
    }
    
    //memulai pengaturan outpur PDF
    class PDF extends FPDF
    {
        //untuk pengaturan header halaman 
        function Header()
        {
            //$this->Image('admin/assets/images/logo.jpg',2,1,2,2);
            //Pengaturan Font Header
            $this->SetFont('Times','B','16');
            //Pengaturan warna background Header
            $this->SetFillColor(255,255,255);
            //Pengaturan warna text
            $this->SetTextColor(0,0,0);
            //Pengaturan tulisan di halaman
            $this->SetLeftMargin(4.3);
            $this->SetFont('Times','B',16);
            $this->MultiCell(19.5,0.5,'TOKO MEBEL PUTRA PANDANSARI',0,'P');
            $this->SetFont('Times','I',9);
            $this->MultiCell(19.5,0.5,'Menerima Pesanan Segala Macam Perabotan Rumah Tangga',0,'L');
            $this->SetFont('Times','',10);
            $this->MultiCell(19.5,0.5,'Jl. Magelang - Jogja Km.23 Jumoyo Salam Magelang ',0,'L');
            $this->MultiCell(19.5,0.5,'Tlp: 0856-4153-5485, Web: www.putrapandansari.com',0,'L');
            $this->SetLeftMargin(2);
            
            //garis bawah kop
            $this->Line(2,3.1,19,3.1);
            $this->SetLineWidth(0.1);
            $this->Line(2,3.2,19,3.2);
            $this->SetLineWidth(0);
            $this->Ln();
            $this->Ln();
        }
        
        function Footer(){
            //atur 1.5 cm dr bawah
            $this->SetY(-2);
            //Arial italic 9
            $this->SetFont('Times','',10);
            //kata halaman
            $this->SetLeftMargin(0);
            $this->Ln();
            $this->MultiCell(21,0.3,'Toko Mebel Putra Pandansari - Magelang',0,'C');
        }
    }
    //pengaturan ukuran kertas P = Portrait
    $pdf = new PDF('P','cm','A4');
    $pdf->AliasNbPages();
    $pdf->Open();
    $pdf->AddPage();
    
    for($k=0;$k<1;$k++){
        $pdf->SetFont('Times','B','16');
        $pdf->MultiCell(17,0.5,'BUKTI TRANSAKSI PEMESANAN',0,'C');
        $pdf->Ln();
        $pdf->SetFont('Times','B','16');
        $pdf->MultiCell(17,0.5,"",0,'C');
        $pdf->Image('asset/thank.jpg',10,4.7,0.8,0.8);
        $pdf->Image('asset/logo.jpg',2.1,1,2,2);
        $pdf->SetFont('Times','','8');
        $pdf->SetTextColor(216,3,26);
        $pdf->MultiCell(17,0.5,'* Terima Kasih telah Melakukan Pemesanan Online',0,'C');
        $pdf->Ln();
    
        //detail pemesan
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Times','B',12);
        $pdf->MultiCell(19.5,0.5,'Pemesan',0,'L');
        $pdf->SetFont('Times','',12);
        $pdf->Cell(3, 0.5, "Tanggal Pesan", 0, 'L');
        $pdf->Cell(7, 0.5,":  ".$cell[$k][7], 0, 'L');
        $pdf->Cell(3, 0.5, "", 0, 'L');
        $pdf->MultiCell(15, 0.5,"  ", 0, 'L');
        
        $pdf->Cell(3, 0.5, "Nama", 0, 'L');
        $pdf->Cell(7, 0.5,":  ".$cell[$k][24], 0, 'L');
        $pdf->Cell(3, 0.5, "", 0, 'L');
        $pdf->MultiCell(8, 0.5,"  ", 0, 'L');
        
        $pdf->Cell(3, 0.5, "Tlp", 0, 'L');
        $pdf->Cell(7, 0.5,":  ".$cell[$k][27], 0, 'L');
        $pdf->Cell(3, 0.5, "", 0, 'L');
        $pdf->MultiCell(8, 0.5,"  ", 0, 'L');
        
        $pdf->Cell(3, 0.5, "Alamat", 0, 'L');
        $pdf->MultiCell(15, 0.5,":  ".$cell[$k][28], 0, 'L');
        $pdf->Cell(3, 0.5, "", 0, 'L');
        $pdf->MultiCell(15, 0.5,"", 0, 'L');
    }
    
    
    $pdf->Ln(1);    
    //tabel barang
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Times','B',12);
    $pdf->SetFillColor(15,9,7);
    $pdf->SetTextColor(255,255,255);
    $pdf->Rect(2,10.5,17,1,'FD');
    $pdf->SetDrawColor(255,255,255);
    $pdf->Cell(3,1,'Kode Transaksi','TB',0,'C');
    $pdf->Cell(4,1,'Nama Barang','TB',0,'C');
    $pdf->Cell(5,1,'Harga','TB',0,'C');
    $pdf->Cell(2.5,1,'Jumlah','TB',0,'C');
    $pdf->Cell(2.5,1,'Sub Total','TB',0,'C');
    $pdf->SetFont('Times',"",12);
    $pdf->SetTextColor(0,0,0);
    $pdf->Ln();
    $pdf->SetDrawColor(0,0,0);
    
    $total=0;
    for($j=0;$j<$i;$j++)
    {
        //menampilkan data dari hasil query database
        $pdf->Cell(2,1,$cell[$j][10],'B',0,'C');
        $pdf->Cell(6,1,$cell[$j][16],'B',0,'C');
        $pdf->Cell(3,1,'Rp '.rupiah($cell[$j][21]),'B',0,'R');
        $pdf->Cell(4,1,$cell[$j][1],'B',0,'C');
        $pdf->Cell(2,1,'Rp '.rupiah($cell[$j][4] * $cell[$j][1]),'B',0,'R');
        $pdf->Ln();
        $total = ($total+(($cell[$j][4] * $cell[$j][1])));
    }
        
    $pdf->SetFont('Times',"B",12);
    
    for($o=0;$o<1;$o++)
    {
        $pdf->Cell(14,1,"Harga Total",'B',0,'L');
        $pdf->Cell(3,1,"Rp ".rupiah($total),'B',0,'R');
        $pdf->Ln();
    }
    
    
    for($m=0;$m<1;$m++)
    {
        $pdf->Cell(14,1,"Ongkos Kirim",'B',0,'L');
        $pdf->Cell(3,1,"Rp ".rupiah($ongkir['ongkir']),'B',0,'R');
        $pdf->Ln();
    }
    
    for($n=0;$n<1;$n++)
    {
        $semua=$total+($cell[$n][17]);
        $pdf->Cell(14,1,"Total Bayar",'B',0,'L');
        $pdf->Cell(3,1,"Rp ".rupiah($total_bayar['total_bayar']),'B',0,'R');
    }
    
    //Term and condition    
    $pdf->Ln(2);
    $pdf->SetFont('Times',"",14);
    $pdf->SetTextColor(0,0,0);
    $pdf->MultiCell(17,1,'PENTING',0,'C');
    $pdf->SetLeftMargin(2);
    $pdf->SetFont('Times',"",12);
    $pdf->MultiCell(17,0.5,'Dengan ini pembeli menyatakan bahwa pesanan tersebut benar dan disetujui oleh pihak pembeli.',0,'J');
    $pdf->Ln();
    $pdf->MultiCell(17,0.5,'',0,'J');
    $pdf->SetFont('Times',"B",12);
    $pdf->Ln();
    $pdf->Cell(17,0.5, "", 0, 'L');
    $pdf->Ln();
    $pdf->Cell(17,0.5, "", 0, 'L');
    $pdf->Ln();
    $pdf->Cell(17,0.5, "", 0, 'L');
    $pdf->Ln(1);
    $pdf->SetFont('Times',"",12);
    $pdf->MultiCell(17,0.5,'',0,'J');
    
    //menampilkan output berupa halaman PDF
    $pdf->Output();
    
?>