<div class="row">
    <div class="col-md-12">
        <hr>
        
        <div class="panel panel-default">
            <div class="panel-heading"> PESANAN MASUK </div>
                <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Nama Barang</th>
                                    <th>Status</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qp = mysql_query("SELECT * FROM trans_penjualan,registrasi,barang WHERE trans_penjualan.id_registrasi=registrasi.id_registrasi AND trans_penjualan.tampil_trans_penjualan='tidak' AND trans_penjualan.kd_barang=barang.kd_barang ORDER BY trans_penjualan.kd_trans_penjualan DESC");
                                $no = 1;
								while ($rp = mysql_fetch_assoc($qp)) {

                                    if ($rp['status_trans']=='pesan') {
									echo '<tr>';
									echo '<td>'.$no.'</td>';
									echo '<td><a href="home.php?page=detail-penjualan&id='.$rp['kd_transaksi'].'" target="_blank">'.$rp['kd_transaksi'].'</a></td>';
									echo '<td>'.$rp['nama_depan'].'</td>';
                                    echo '<td>'.$rp['nama'].'</td>';
									echo '<td>'.$rp['status_trans'].'</td>';
									echo '<td>'.$rp['tgl_trans'].'</td>';
									echo '<td>
									<a href="home.php?page=act-penjualan&mdelete='.$rp['kd_transaksi'].'" data-toggle="tooltip" data-placement="top" title="Hapus hapus"><i class="fa fa-remove"></i></a>
									</td>';
									echo '</tr>';

                                    } elseif ($rp['status_trans']=='expired') {

                                    echo '<tr>';
                                    echo '<td style="background-color:pink;">'.$no.'</td>';
                                    echo '<td style="background-color:pink;"><a href="home.php?page=detail-penjualan&id='.$rp['kd_transaksi'].'" target="_blank">'.$rp['kd_transaksi'].'</a></td>';
                                    echo '<td style="background-color:pink;">'.$rp['nama_depan'].'</td>';
                                    echo '<td style="background-color:pink;">'.$rp['nama'].'</td>';
                                    echo '<td style="background-color:pink;">'.$rp['status_trans'].'</td>';
                                    echo '<td style="background-color:pink;">'.$rp['tgl_trans'].'</td>';
                                    echo '<td>
                                    <a href="home.php?page=act-penjualan&mdelete='.$rp['kd_transaksi'].'" data-toggle="tooltip" data-placement="top" title="Hapus hapus"><i class="fa fa-remove"></i></a>
                                    </td>';
                                    echo '</tr>';
                                    } else {
                                        echo '<td colspan="7"> Data Kosong</td>';
                                    }
								$no++;
								}
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>

<!--
<a href="home.php?page=act-penjualan&kirim='.$rp['kd_transaksi'].'" data-toggle="tooltip" data-placement="top" title="Kirim barang"><i class="fa fa-paper-plane-o"></i></a>
<a href="home.php?page=trans_penjualan&update='.$rp['kd_trans_penjualan'].'" data-toggle="tooltip" data-placement="top" title="Ubah data"><i class="fa fa-edit"></i></a>
-->