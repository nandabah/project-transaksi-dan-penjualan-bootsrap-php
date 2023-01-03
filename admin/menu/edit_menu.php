<?php
function edit_Menu( $update){
    require'../../koneksi/conn.php';

$nama_manakan = $update['nama_menu'];
$kategori = $update['kategori'];
$stok = $update['stok'];
$harga = $update['harga'];
$id_menu = $update['id_menu'];
$edit_pesanan = $update['edit_pesanan'];
if (isset($edit_pesanan)) {
   $result=  mysqli_query($koneksi,"UPDATE `menu` SET `nama_menu` = '$nama_manakan', `id_ketegori` = '$kategori', `stok` = '$stok', `harga` = '$harga' WHERE `menu`.`id_menu` = $id_menu;");
}else{
    false;
}
    echo mysqli_affected_rows($koneksi);

if ($result = true ){
    return true;
}else{
    return false;
}
    
}
?>