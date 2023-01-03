<?php

require'../../koneksi/conn.php';
// var_dump($_POST);
$nama_karyawan = $_POST['nama_karyawan'];
$kategori = $_POST['kategori'];
$alamat = $_POST['alamat'];
$username = $_POST['username'];
$password = $_POST['password'];

$tambah_pesanan = $_POST['tambah_pesanan'];
if (isset($tambah_pesanan)) {
    if (!empty($nama_karyawan)&&!empty($kategori)&&!empty($alamat)&&!empty($username)&&!empty($password)) {
        $result = mysqli_query($koneksi,"INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `jabatan`, `alamat`, `username`, `password`)
    VALUES (NULL, '$nama_karyawan', '$kategori', '$alamat ', '$username', '$password ');");
    }else {
        $result =  false;
    }
}
if ($result === true) {
    echo
"<script>
alert('Berhasil Tambah');
    document.location.href ='karyawan.php';

</script>";

} else {
    echo "<script>
    alert('gagal Tambah ');
    document.location.href ='karyawan.php';
    
</script>";
}


?>