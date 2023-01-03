<?php

require'../../koneksi/conn.php';
// var_dump($_POST);
$nama_manakan = $_POST['nama_menu'];
$kategori = $_POST['kategori'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];
$tambah_pesanan = $_POST['tambah_pesanan'];
if (isset($tambah_pesanan)) {
    if (!empty($nama_manakan)&&!empty($kategori)&&!empty($stok)&&!empty($harga)) {
  
    $result = mysqli_query($koneksi,"INSERT INTO `menu` (`id_menu`, `nama_menu`, `id_ketegori`, `stok`, `harga`) VALUES (NULL, '$nama_manakan', $kategori, $stok, $harga);");
    }else {
        $result =  false;
    }
}
if ($result === true) {
   
    echo
"<script>
alert('Berhasil Tambah');
    document.location.href ='menu.php';
</script>";

} else {
    echo "<script>
    alert('gagal Tambah ');
    document.location.href ='menu.php';
    
</script>";
}
    // echo mysqli_affected_rows($koneksi);
?>