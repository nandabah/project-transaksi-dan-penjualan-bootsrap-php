<?php
session_start();
function login( $login){

require'koneksi/conn.php';
$username = $login['username'] ;
$password = $login['password'];

$result = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE username='$username'");

// var_dump($login);
if (mysqli_num_rows($result)=== 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['passwords'] === $password){
        $_SESSION["login"] = true;
        $_SESSION["id_karyawan"] = $row['id_karyawan'];
        $_SESSION["nama_karyawan"] = $row['nama_karyawan'];
        $_SESSION["jabatan"] = $row['jabatan'];
 
        return $row['jabatan'];
    }


}else{
    return false;
}
}

?>