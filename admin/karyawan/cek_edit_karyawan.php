<?php

require'edit_karyawan.php';
require'../../koneksi/conn.php';
 if (isset($_POST["edit_karyawan"])) {
   
    if (edit_karyawan($_POST) > 0) {
        echo
"<script>
alert('Input berhasil');
        document.location.href ='karyawan.php';
</script>";
    } else {
        echo "<script>
        alert('gagal input');
        document.location.href ='karyawan.php'; 
</script>";
    }
}
if (isset($_POST["hapus"])) {
    if ($_POST["hapus"] === "1") {
        // var_dump($_POST);
     $id_karyawan = $_POST["id_karyawan"];
     mysqli_query($koneksi,"DELETE FROM `karyawan` WHERE `karyawan`.`id_karyawan` = $id_karyawan;");
    echo "<script>
alert('berhasil hapus');
        document.location.href ='karyawan.php';
</script>";
    }else{
        echo "<script>  
                document.location.href ='karyawan.php';
        </script>";
    }
 }else{
    echo "<script>
            document.location.href ='karyawan.php';
    </script>";

 }
?>


