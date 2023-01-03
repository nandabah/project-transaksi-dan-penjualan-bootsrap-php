<?php
session_start();
function tambah_pesanan($data){
//var_dump($_SESSION);
require'../../koneksi/conn.php';
$submit = $data['tambah_pesanan']; 

if (isset($submit)) {
    $id_menu = $data['id_menu'];
    $jumlah = $data['jumlah'];
    $harga = $data['harga'];
    $filtermenu = array_values(array_filter($id_menu));
    $filterjumlah = array_values(array_filter($jumlah));
    $filterharga = array_values(array_filter($harga));

    $id_transaksi = $data['id_transaksi'];

    $jml = count($filtermenu);
    for ($i=0; $i < $jml; $i++) { 
       $total_bayar[] = $filterjumlah[$i] * $filterharga[$i];
    };
    

    // $resultss = mysqli_query($koneksi,"SELECT * FROM `transaksi` left join karyawan on karyawan.id_karyawan = transaksi.id_karyawan where id_transaksi = $id_transaksi;");
    // $ecoo= mysqli_num_rows($resultss);


    $total =count($filtermenu);
for ($i=0; $i < $total ; $i++) { 

$resid = mysqli_query($koneksi, "SELECT * FROM `detail_transaksi` where id_transaksi=$id_transaksi and id_menu = $filtermenu[$i];");

if (mysqli_num_rows($resid) >= 1) {
    
   $cekmenu = mysqli_query($koneksi,"SELECT * FROM `detail_transaksi` where id_menu =$filtermenu[$i]  ");
// printf(mysqli_error($koneksi));
   
   while($rowz = mysqli_fetch_array($cekmenu)){ 

   
    $update_jumlah = $rowz['jumlah'] + $filterjumlah[$i];

    $result3 =  mysqli_query($koneksi,"UPDATE `detail_transaksi` SET `jumlah` = $update_jumlah WHERE id_menu = $filtermenu[$i] and id_transaksi=$id_transaksi;"); 
   
    if ($result3 === true) {
      $cekmenu = mysqli_query($koneksi,"SELECT * FROM `menu` where id_menu = $filtermenu[$i] ");
      while($rowmenu = mysqli_fetch_array($cekmenu)){ 
        $rm = $rowmenu['stok'] - $filterjumlah[$i];

      $resulttrigger1 =  mysqli_query($koneksi,"UPDATE `menu` SET `stok` = '$rm' WHERE `menu`.`id_menu` = '$filtermenu[$i]';"); 
    }

    }
    echo mysqli_error($koneksi);
   }




}else{

    $result3 =    mysqli_query($koneksi, "INSERT INTO `detail_transaksi` (`id_detail`, `id_menu`, `id_transaksi`, `jumlah`, `harga`) 
       VALUES (NULL, '$filtermenu[$i]', '$id_transaksi', '$filterjumlah[$i]', '$filterharga[$i]')");
    
    if ($result3 === true) {
      $cekmenu = mysqli_query($koneksi,"SELECT * FROM `menu` where id_menu = $filtermenu[$i] ");
      while($rowmenu = mysqli_fetch_array($cekmenu)){ 
        $rm = $rowmenu['stok'] - $filterjumlah[$i];

      $resulttrigger1 =  mysqli_query($koneksi,"UPDATE `menu` SET `stok` = '$rm' WHERE `menu`.`id_menu` = '$filtermenu[$i]';"); 
    }

    }
   //  var_dump($result3);
 }}
 if ( $result3 === true) {
    return true;
 }else{
    return false;
    exit;
 }
 return true;
}else{
    return false;
    exit;
}



}
?>