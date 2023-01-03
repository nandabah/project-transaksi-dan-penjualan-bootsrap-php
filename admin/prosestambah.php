<?php
session_start();
function tambah($_POSTs){
		require'../koneksi/conn.php';
	date_default_timezone_set("asia/jakarta");
	$jam = date("h");
	$tanggal = date ("d");
	$tes = 0;
	$res = mysqli_query($koneksi, "SELECT COUNT(id_transaksi) FROM transaksi");
	$id_karyawan = $_SESSION['id_karyawan'];
	$kombinasi = $tanggal . $jam .$tes ;
	$date = date("Y-m-d H:i:s");
	$submit = $_POSTs['proses'];
	$id_menu = $_POSTs['id_menu'];
	$harga = $_POSTs['harga'];
	$jumlah = $_POSTs['jumlah'];
	$pemesan = $_POSTs['namapemesan'];

	// $total_bayar = $_POSTs['total_bayar'];

	$total = count($id_menu);
	$row = mysqli_fetch_array($res);
	$intRow = (int) $row[0];
	$intkom = (int)$kombinasi;
	$kombin = $intkom +$intRow ;
	// var_dump($kombin);
	if (!empty($id_menu)) {
		
	
	if (empty($pemesan)) {
	$result =   mysqli_query($koneksi, "INSERT INTO `transaksi` (`id_transaksi`, `id_karyawan`, `nama_pelanggan`, `date`, `total_bayar`,`status`) 
	VALUES ('$kombin', '$id_karyawan', 'Pelanggan', '$date', '0','belum');");
	}else{
	
	$result =   mysqli_query($koneksi, "INSERT INTO `transaksi` (`id_transaksi`, `id_karyawan`, `nama_pelanggan`, `date`, `total_bayar`,`status`) 
	VALUES ('$kombin', '$id_karyawan', '$pemesan', '$date', '0','belum');");
	}
}else {
	return false;
}

// var_dump($result);
if ($result === true) {
	for ($i=0; $i < $total ; $i++) { 
		
		$cekresult = mysqli_query($koneksi,"SELECT * FROM `detail_transaksi` where id_transaksi = $kombin and id_menu = $id_menu[$i] ");
		if (mysqli_num_rows($cekresult) >= 1) {

			$cekmenu = mysqli_query($koneksi,"SELECT * FROM `detail_transaksi` where id_menu =$id_menu[$i]  and id_transaksi = $kombin ");
			while($row = mysqli_fetch_array($cekmenu)){ 
		
			$update_jumlah = $row['jumlah'] + $jumlah[$i];
		
		
			}
			$result2 =  mysqli_query($koneksi,"UPDATE `detail_transaksi` SET `jumlah` = $update_jumlah WHERE id_menu = $id_menu[$i] and id_transaksi=$kombin;"); 
			if ($result2 === true) {
			$cekmenu = mysqli_query($koneksi,"SELECT * FROM `menu` where id_menu = $id_menu[$i] ");
			while($rowmenu = mysqli_fetch_array($cekmenu)){ 
				$rm = $rowmenu['stok'] - $jumlah[$i];

			$resulttrigger1 =  mysqli_query($koneksi,"UPDATE `menu` SET `stok` = '$rm' WHERE `menu`.`id_menu` = '$id_menu[$i]';"); 
			}

			}

		}else{
			
			$result2 =    mysqli_query($koneksi, "INSERT INTO `detail_transaksi` (`id_detail`, `id_menu`, `id_transaksi`, `jumlah`, `harga`) 
			VALUES (NULL, '$id_menu[$i]', '$kombin', '$jumlah[$i]', '$harga[$i]')");
		

			if ($result2 === true) {
			$cekmenu = mysqli_query($koneksi,"SELECT * FROM `menu` where id_menu = $id_menu[$i] ");
			while($rowmenu = mysqli_fetch_array($cekmenu)){ 
				$rm = $rowmenu['stok'] - $jumlah[$i];

			$resulttrigger =  mysqli_query($koneksi,"UPDATE `menu` SET `stok` = '$rm' WHERE `menu`.`id_menu` = '$id_menu[$i]';"); 
			}

			}
		}

			


	
		
	}
	mysqli_error($koneksi);

	// var_dump($resulttrigger1);
}else{
	return false;
}




if ($result2 === true) {
	$_SESSION['jumlah']= [];
	$_SESSION['menu']= [];
	$_SESSION['id_menu']= [];
	$_SESSION['harga']= [];
	$_SESSION['total']= [];
	$_SESSION['namapemesan']= [];

	
	//set session jumlah
	$_SESSION['a']= 0;
	return true;
	
}


// var_dump($kombinasi);
// mysqli_query($koneksi, "INSERT INTO `detail_transaksi` (`id_detail`, `id_menu`, `id_transaksi`, `jumlah`, `harga`) 
//     VALUES (NULL, '77', '12312', '1', '30000')");





	

}

?>