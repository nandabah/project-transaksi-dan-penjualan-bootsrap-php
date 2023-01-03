<?php

$koneksi = mysqli_connect("localhost", "root", "", "db_sederek");

if (mysqli_connect_errno()) {
    echo "Gagal Koneksi" . mysqli_connect_error();
}else{
   //echo " Koneksi" ;
}
if (!$koneksi) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}
?>