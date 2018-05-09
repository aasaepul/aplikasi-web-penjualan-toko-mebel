<?php
session_start();
if ($_SESSION['level'] == "admin") {
//POSTKAN variabel yang akan diinputkan ke database, berasal dari form di bawah ini
$submit     = empty($_POST['submit']) ? "" : $_POST['submit'];
$judul      = empty($_POST['judul']) ? "" : $_POST['judul']; 
$isi        = empty($_POST['isi']) ? "" : $_POST['isi'];
$foto       = $_FILES['foto']['name'];

$mod            = isset($_GET['mod']) ? $_GET['mod'] : "";
$id             = isset($_GET['id']) ? $_GET['id'] : "";

//jika value dari tombol submit adalah "Tambah" maka diinsertkan data ke database dari form input.
if ($submit=="Tambah") {
    //validasi untuk menghindari data kosong terisi
    if ($judul=="" || $isi=="") {
        echo "<script>alert('isikan data dengan lengkap!'); </script>";
    } else {
            if(strlen($foto)>0){
                if(is_uploaded_file($_FILES['foto']['tmp_name'])){
                    move_uploaded_file($_FILES['foto']['tmp_name'],"../administrator/foto/info/".$foto);
                }
            }

        $tambah="INSERT INTO info VALUES ('','$judul','$isi','$foto',now())";
        $q=mysql_query($tambah);
        //keterangan jika sudah berhasil menambah data (INSERT data)
        if ($q) {
            echo "<script>alert('data berhasil ditambahkan!'); </script>";
        } else {
            echo "<script>alert('data gagal ditambahkan!'); </script>";
        }
        echo "<meta http-equiv='refresh' content='0; URL=?page=info'>";
    }
    //jika value dari tombol submit adalah "Update", maka mengapdet data
} elseif ($submit=="Edit") {

        if(strlen($foto)>0){
            if(is_uploaded_file($_FILES['foto']['tmp_name'])){
                  move_uploaded_file($_FILES['foto']['tmp_name'],"../administrator/foto/info/".$foto);
            }
            
            mysql_query("update info set foto='$foto' where kd_info='$id'");
        }
    $update=mysql_query("UPDATE info SET  judul='$judul', isi='$isi',tgl=now() WHERE kd_info='$id'") or die (mysql_error());

    //keterangan jika sudah berhasil mengupdate data (UPDATE data)
    if ($update) {
        echo "<script>alert('data berhasil diupdate!'); </script>";
    } else {
        echo "<script>alert('data gagal diupdate!'); </script>";
    }
    echo "<meta http-equiv='refresh' content='0; URL=?page=info'>";
}


//jika variabel URL mod berisi : "edit_prestasi" maka form isinya dari database
if ($mod=="e-info") {
    $isi_edit       =mysql_query("SELECT * FROM info WHERE kd_info='$id'") or die (mysql_error());
    $data           =mysql_fetch_array($isi_edit);
    $j              =$data[1];
    $i              =$data[2];

    $ket            ="Edit";
    $foto           =$data[3];
    $isi            =$i;
    $judul          =$j;
    $submit         ="Edit";
//jika variabel URL mod berisi : "input_prestasi" maka form isinya KOSONG (diisi user)
} else if ($mod=="i-info") {
    $ket              ="Tambah";
    $judul            ="";
    $isi              ="";
    $foto             ="";
    $submit           ="Tambah";
}

?>
<div class="row">
<div class="col-md-8">
<div class="content">
  <div class="tab-pane" id="formcontrols">
    <form id="edit-profile" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        
        <div class="control-group">
            <label class="control-label"> Judul </label>
                <div class="controls">
                    <input type="text" name="judul" class="form-control" value="<?php echo $judul; ?>" required>
                </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="deskripsi"> Isi Info</label>
                <div class="controls">
                    <textarea name="isi" class="ckeditor" id="deskripsi" rows="7" cols="10" OnFocus="Count();" 
                        OnClick="Count();" onKeydown="Count();" OnChange="Count();" 
                        onKeyup="Count();" required><?php echo $isi ?></textarea>
                </div>
        </div>
                    
        <div class="control-group">                     
            <label class="control-label" for="foto">Gambar</label>
                <div class="controls">
                    <?php if($_GET['id']){
                        echo "<img src='../administrator/foto/info/$data[foto]' width=150 height=110> <br />";
                        } 
                    ?>
                    <br>
                    
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                </div> <!-- /controls -->       
        </div> <!-- /control-group -->
        <br>
        <div class="form-actions">
            <button name="submit" type="submit" class="btn btn-primary" value="<?php echo $submit; ?>"><i class="fa fa-save"></i> <?php echo $submit; ?></button>
            <button type="reset" class="btn btn-primary"><a href="?page=info" style="color:#fff;"><i class="fa fa-remove"></i> Batal </a></button>
        </div>
    </form>
  </div>
</div>
</div>
</div>
<br>
<hr>
<?php
}
else
  {
    // jika levelnya bukan admin atau user, tampilkan pesan
    echo "<script>alert('Anda bukan Admin tidak berhak mengakses halaman ini ...!');javascript:history.go(-1);</script>";
  }
 ?>