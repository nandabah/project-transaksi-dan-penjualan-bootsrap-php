<?php 

function selesai_transaksi( $data_selesai){
    require'../../koneksi/conn.php';
$total = $data_selesai['total_bayar'];
$id_tran = $data_selesai['id_transaksi'];
// var_dump($data_selesai);

$resupdate = 0;
if( $data_selesai['selesai'] === "52132134" ){
$resupdate = mysqli_query($koneksi,"UPDATE `transaksi` SET `total_bayar` = '$total', `status` = 'selesai' WHERE `transaksi`.`id_transaksi` = $id_tran;");
}

if($resupdate == true){
    return true;

}else{
    return false;
}


}
?>