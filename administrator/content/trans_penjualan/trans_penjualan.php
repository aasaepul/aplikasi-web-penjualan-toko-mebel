<div class="row">
    <div class="col-md-12">
        <hr>
        
        <div class="row">
        <?php
        if (isset($_GET['update'])) {
			$qupdate = mysql_query("SELECT
  trans_penjualan.*,
  registrasi.*,
  barang.*,
  (trans_penjualan.bayar * trans_penjualan.qty) AS tot_bayar
FROM trans_penjualan,
  registrasi,
  barang
WHERE trans_penjualan.kd_trans_penjualan = '$_GET[update]'
AND registrasi.id_registrasi=trans_penjualan.id_registrasi
AND trans_penjualan.kd_barang=barang.kd_barang");
			while ($rupdate = mysql_fetch_assoc($qupdate)) {
		?>
        	<div class="col-md-6">
            	<div class="panel panel-primary">
                	<div class="panel-body">
                    	<form method="post" action="home.php?page=act-penjualan">
                        	<fieldset>
                            	<div class="form-group">
                                	<label class="control-label">Kode Transaksi</label>
                                    <input type="text" name="kd_transaksi" value="<?php echo $rupdate['kd_transaksi'];?>" readonly="readonly" class="form-control" required/>
                                </div>
                            	<div class="form-group">
                                	<label class="control-label">Nama Pelanggan</label>
                                    <input type="text" name="nama_depan" value="<?php echo $rupdate['nama_depan'];?>" readonly="readonly" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                	<label class="control-label">Nama Barang</label>
                                    <select name="kd_barang" class="form-control">
                                    	<option value="<?php echo $rupdate['kd_barang'];?>"><?php echo $rupdate['nama'];?></option>
                                    	<?php
                                        $qbarang = mysql_query("SELECT * FROM barang ORDER BY nama ASC");
										while ($rbarang = mysql_fetch_assoc($qbarang)) {
											echo '<option value="'.$rbarang['kd_barang'].'">'.$rbarang['nama'].'</option>';
										}
										?>
                                    </select>
                                </div>
                                <div class="form-group">
                                	<label class="control-label">Jumlah Beli</label>
                                    <input type="text" name="qty" value="<?php echo $rupdate['qty'];?>" class="form-control" required="required" />
                                </div>
                                <div class="form-group">
                                	<label class="control-label">Sub Total</label>
                                    <input type="text" name="bayar" value="<?php echo $rupdate['tot_bayar'];?>" class="form-control" required="required" readonly="readonly" />
                                </div>
                                <input type="hidden" name="kd_trans_penjualan" value="<?php echo $rupdate['kd_trans_penjualan'];?>" />
                                <input type="submit" name="update" value="Ubah Data" class="btn btn-primary btn-block" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        
        <?php
			}	
		}
		?>
        </div>
        
        <div class="panel panel-default">
            <div class="panel-heading"> DATA TABEL TRANSAKSI PENJUALAN </div>
                <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Nama Barang</th>
                                    <th>Status Pengiriman</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Tanggal Kirim</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qp = mysql_query("SELECT * FROM trans_penjualan,registrasi,barang WHERE trans_penjualan.id_registrasi=registrasi.id_registrasi AND trans_penjualan.tampil_trans_penjualan='ya' AND trans_penjualan.kd_barang=barang.kd_barang ORDER BY trans_penjualan.kd_trans_penjualan DESC");
								$no = 1;
								while ($rp = mysql_fetch_assoc($qp)) {
									echo '<tr>';
									echo '<td>'.$no.'</td>';
									echo '<td><a href="home.php?page=detail-penjualan&id='.$rp['kd_transaksi'].'&kd='.$rp['kd_trans_penjualan'].'" target="_blank">'.$rp['kd_transaksi'].'</a></td>';
									echo '<td>'.$rp['nama_depan'].'</td>';
                                    echo '<td>'.$rp['nama'].'</td>';
									echo '<td>'.$rp['aksi_kirim'].'</td>';
									echo '<td>'.$rp['tgl_trans'].'</td>';
									echo '<td>'.$rp['tgl_kirim'].'</td>';
									echo '<td>
									<a href="home.php?page=act-penjualan&kirim='.$rp['kd_transaksi'].'" data-toggle="tooltip" data-placement="top" title="Kirim barang"><i class="fa fa-paper-plane-o"></i></a>
									<a href="home.php?page=trans_penjualan&update='.$rp['kd_trans_penjualan'].'" data-toggle="tooltip" data-placement="top" title="Ubah data"><i class="fa fa-edit"></i></a>
									<a href="home.php?page=act-penjualan&delete='.$rp['kd_transaksi'].'" data-toggle="tooltip" data-placement="top" title="Hapus hapus"><i class="fa fa-remove"></i></a>
									</td>';
									echo '</tr>';
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