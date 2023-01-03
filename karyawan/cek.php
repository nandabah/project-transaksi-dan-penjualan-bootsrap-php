<?php
require'setSession.php';

if (isset($_POST["submit"])) {

    //cek proses tambah
    if (setsession($_POST) > 0) {
  
        echo
"<script>
alert('Input berhasil');
        document.location.href ='index.php';
</script>";

    } else {
        echo "<script>
        alert('gagal input');
        // document.location.href ='index.php';
</script>";

    }
 
}



?>