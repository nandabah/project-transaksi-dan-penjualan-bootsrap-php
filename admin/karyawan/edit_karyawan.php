<?php
function edit_karyawan( $update){
    require'../../koneksi/conn.php';

$nama_karyawan = $update['nama_karyawan'];
$jabatan = $update['jabatan'];
$alamat = $update['alamat'];
$username = $update['username'];
$password = $update['passwords'];
$id_karyawan =  $update['id_karyawan'];
$edit_karyawan = $update['edit_karyawan'];
if (isset($edit_karyawan)) {
  
   $result_update_karyawan = mysqli_query($koneksi,"UPDATE `karyawan` SET `nama_karyawan` = '$nama_karyawan', `jabatan` = '$jabatan',`alamat` = '$alamat', `username` = '$username', `passwords` = '$password' WHERE `karyawan`.`id_karyawan` = $id_karyawan;");
}else{
   return false;
}
if($result_update_karyawan === true){
    return true;
}
}
?>