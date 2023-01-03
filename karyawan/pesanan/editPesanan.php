<?php


if (isset($_POST["selesai"])) {
    require'Selesai.php';
    //cek proses tambah
    if (selesai_transaksi($_POST) > 0) {
   
        echo
"<script>
alert('Transaksi Selesai');
        document.location.href ='pesanan.php';
    
</script>";

    } else {
        echo "<script>
        alert('gagal ');
        // document.location.href ='pesanan.php';
        
</script>";
exit;
    }
 
}
if (isset($_POST["tambah_pesanan"])) {
    require'prosestambah_pesanan.php';
    //cek proses tambah
    if (tambah_pesanan($_POST) > 0) {
   
        echo
"<script>
alert('Berhasil Tambah');
history.go(-1)
    
</script>";

    } else {

        echo "<script>
        alert('gagal Tambah2 ');
        history.go(-1)
        
</script>";


    }
    exit;
 
}

if (isset($_POST['close'])) {
    
    require'../../koneksi/conn.php';
    $close = $_POST['close']; 
// var_dump($_POST);
    if ($close === "2" ) {
        $result = false;
    }else{
        $result = mysqli_query($koneksi,"DELETE FROM `detail_transaksi` WHERE `detail_transaksi`.`id_detail` = $close");

    }
 
}
echo mysqli_affected_rows($koneksi);
// var_dump($close );
if ($result === true) {
    echo
"<script>
alert('Berhasil Hapus');
history.go(-1)


</script>";

} else {
    echo "<script>
   
    history.go(-1)
    
</script>";
exit;
}

// $menu = $_GET['id_menu'];
// $harga = $_GET['harga'];
// $jumlah = $_GET['jumlah'];

// if (isset($_GET["tambah_pesanan"])) {
//     $filterIdMenu = array_values(array_filter($menu));
//     $filterHarga = array_values(array_filter($harga));
//     $filterjumlah = array_values(array_filter($jumlah));

//     var_dump($filterjumlah);
//     // require'Selesai.php';
//     //cek proses tambah
// //     if (selesai_transaksi($_POST) > 0) {
   
// //         echo
// // "<script>
// // alert('Transaksi Selesai');
// //         document.location.href ='pesanan.php';
    
// // </script>";

// //     } else {
// //         echo "<script>
// //         alert('gagal ');
// //         // document.location.href ='pesanan.php';
        
// // </script>";

// //     } 
 
// }





?>