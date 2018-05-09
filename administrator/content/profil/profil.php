<?php
  session_start();
  if (($_SESSION['level'] == "admin") || ($_SESSION['level'] == "pemilik")){
  $query = mysql_query("SELECT * FROM akun WHERE id_akun='$_SESSION[id_akun]'");
  $data  = mysql_fetch_assoc($query);
?> 
<style type="text/css">
  img {
    border:5px dotted #ddd;
  }
</style>

<div class="row">
    <div class="col-md-12">
    	<div class="col-md-6 col-sm-3 col-xs-6">
		      <div class="panel panel-danger">
  			     <div class="panel-heading">Profil Akun</div>
  				      <div class="panel-body">
                <div class="table-responsive">
                <table border="0">
                <thead> 
        <tr>
          <td><center><img src="foto/administrator/<?php echo $data['foto'];?>" alt="" width="150" height="150"></center>
</td> 
          <td width="20%"></td>
          <td></td>                                     
        </tr>

        <tr>
          <td width="40%">&nbsp;</td> 
          <td width="5%">&nbsp;</td>
          <td>&nbsp;</td>                                     
        </tr>

        <tr>
          <td width="50%"><b>Nama Lengkap</b></td> 
          <td width="10%">:</td>
          <td><?php echo $data['nama_lengkap']?></td>                                     
        </tr>

        <tr>
          <td width="40%">&nbsp;</td> 
          <td width="5%">&nbsp;</td>
          <td>&nbsp;</td>                                     
        </tr>

        <tr>
          <td width="40%"><b>Username</b></td> 
          <td width="5%">:</td>
          <td><?php echo $data['username']?></td>                                     
        </tr>

        <tr>
          <td width="40%">&nbsp;</td> 
          <td width="5%">&nbsp;</td>
          <td>&nbsp;</td>                                     
        </tr>

        <tr>
          <td width="40%"><b>Alamat</b></td> 
          <td width="5%">:</td>
          <td><?php echo $data['alamat']?></td>                                     
        </tr>

        <tr>
          <td width="40%">&nbsp;</td> 
          <td width="5%">&nbsp;</td>
          <td>&nbsp;</td>                                     
        </tr>

        <tr>
          <td width="40%"><b>Level</b></td> 
          <td width="5%">:</td>
          <td><?php echo $data['level']?></td>                                     
        </tr>

        <tr>
          <td width="40%">&nbsp;</td> 
          <td width="5%">&nbsp;</td>
          <td>&nbsp;</td>                                     
        </tr>
</tbody>

</table>
		      </div>
		  </div>
    </div>
  </div>

		  <div class="col-md-6 col-sm-3 col-xs-6">
		    <div class="panel panel-danger">
  			   <div class="panel-heading"> Ubah Password </div>
  				    <div class="panel-body">
                <form class="form-horizontal" action="?page=u-pass" method="POST">
                  <input type="hidden" name="id_akun" class="form-control" value="<?php echo $_SESSION['id_akun']; ?>">
                  <input type="hidden" name="username" class="form-control" value="<?php echo $_SESSION['username']; ?>">
                  <input type="hidden" name="pass_lama" class="form-control" value="<?php echo $_SESSION['password']; ?>">
                  <div class="control-group">
                      <label class="control-label"> <i>Password Baru</i> </label>
                          <div class="controls">
                              <input type="password" name="pass_baru" class="form-control">
                          </div>
                  </div>

                  <div class="control-group">
                      <label class="control-label"> <i>Ulangi Password Baru</i> </label>
                          <div class="controls">
                              <input type="password" name="pass_baru_confirm" class="form-control">
                          </div>
                  </div>

                  <br>
                  <div class="form-actions">
                      <input type="submit" class="btn btn-success" value="Ubah Password">
                      <input type="hidden" name="act" class="btn btn-danger" value="ganti">
                  </div>
  				    </div>
            </form>
		    </div>
		  </div>
	</div>
</div>
<?php
}

else
  {
    // jika levelnya bukan admin atau user, tampilkan pesan
    echo "<script>alert('Anda bukan Admin tidak berhak mengakses halaman ini ...!');javascript:history.go(-1);</script>";
  }
 ?>
