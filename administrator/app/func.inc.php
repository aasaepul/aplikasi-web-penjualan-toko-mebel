<?php
function ListCategory($tablename) {
    $result = mysql_query("SELECT * FROM category ORDER BY id_category DESC");
    $no = 1;
    while ($data = mysql_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'.$no.'</td>';
        echo '<td>'.$data['nama_category'].'</td>';
        echo '<td><a href="media.php?p=category&update='.$data['id_category'].'"><i class="glyphicon glyphicon-edit"></i></a>     '
                . '<a href="media.php?p=act-category&delete='.$data['id_category'].'"><i class="glyphicon glyphicon-remove"></i></a></td>';
        echo '</td>';
    $no++;    
    }
}

function ListBarang($tablename) {
    $result = mysql_query("SELECT barang.*,category.* FROM barang,category WHERE barang.id_category=category.id_category ORDER BY barang.id_barang DESC");
    $no = 1;
    while ($data = mysql_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'.$no.'</td>';
        echo '<td>'.$data['nama_barang'].'</td>';
        echo '<td>'.$data['nama_category'].'</td>';
        echo '<td>'.$data['deskripsi'].'</td>';
        echo '<td><a href="uploads/'.$data['foto'].'" target="_blank"><img src="uploads/'.$data['foto'].'" class="img-thumbnail" width="100" height="70"></a></td>';
        echo '<td>'.$data['jumlah_barang'].'</td>';
        echo '<td>Rp. '.rupiah($data['harga_jual']).'</td>';
        echo '<td>Rp. '.rupiah($data['harga_beli']).'</td>';
        echo '<td>
		<a href="media.php?p=barang&update='.$data['id_barang'].'"><i class="glyphicon glyphicon-edit"></i></a>
		<a href="media.php?p=act-barang&delete='.$data['id_barang'].'"><i class="glyphicon glyphicon-remove"></i></a></td>';
        echo '</tr>';
    $no++;    
    }
}

function rupiah($nilai, $pecahan = 0) {
    return number_format($nilai, $pecahan, ',', '.');
}
?>