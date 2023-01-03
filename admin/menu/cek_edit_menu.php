<?php

require'edit_menu.php';
require'../../koneksi/conn.php';

if (isset($_POST["hapus"])) {
   if ($_POST["hapus"] === "1") {
    $id_menu = $_POST["id_menu"];
    $res = mysqli_query($koneksi,"DELETE FROM `menu` WHERE `menu`.`id_menu` = $id_menu");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
   }else{
 header('Location: ' . $_SERVER['HTTP_REFERER']);

   }
}

if (isset($_POST["edit_pesanan"])) {

    //cek proses tambah
    if (edit_Menu($_POST) > 0) {
   
        echo
"<script>
alert('Input berhasil');
        document.location.href ='menu.php';
</script>";

    } else {
        echo "<script>
        alert('gagal input');
        document.location.href ='menu.php';
</script>";
    }
}



?>