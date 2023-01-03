<?php

require'prosestambah.php';
if (isset($_POST["proses"])) {

    //cek proses tambah
    if (tambah($_POST) > 0) {
   
        echo
"<script>
alert('Input berhasil');
        document.location.href ='index.php';
    
</script>";

    } else {
        echo "<script>
        alert('gagal input');
        document.location.href ='index.php';
        
</script>";

    }
    exit;
 
}



if (isset($_POST["batalInput"])) {
    if ($_POST["batalInput"] === "321")  {
        $_SESSION['jumlah']= [];
        $_SESSION['menu']= [];
        $_SESSION['id_menu']= [];
        $_SESSION['harga']= [];
        $_SESSION['total']= [];
        $_SESSION['namapemesan']= [];

        $_SESSION['a']= 0;
        echo "<script>
    
        document.location.href ='index.php';
        
</script>";

    }else{
        echo "<script>
    
        document.location.href ='index.php';
        
</script>";
    }
 
}


?>