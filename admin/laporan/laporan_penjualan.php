<?php
    session_start();
    //var_dump($_SESSION);
    require'../../koneksi/conn.php';
    if (!empty($_POST)) {
        $first = $_POST['datefirst'];
        $second = $_POST['datesecond'];
        $nama_pega = $_POST['nama_pegawai'];
    }
 
    if (!empty($first) AND !empty($second) and !empty($nama_pega)) {
    

        $result = mysqli_query($koneksi,"SELECT * FROM `transaksi` left join karyawan on karyawan.id_karyawan = transaksi.id_karyawan where karyawan.nama_karyawan = '$nama_pega' and status = 'selesai' AND date BETWEEN '$first' AND '$second'  ORDER BY `transaksi`.`id_transaksi` DESC;;");

    }else if (!empty($first) AND !empty($second)) {
    

        $result = mysqli_query($koneksi,"SELECT * FROM `transaksi` left join karyawan on karyawan.id_karyawan = transaksi.id_karyawan where status = 'selesai' AND date BETWEEN '$first' AND '$second'  ORDER BY `transaksi`.`id_transaksi` DESC;;");

    }else if (!empty($first) && !empty($nama_pega)) {
        $result = mysqli_query($koneksi,"SELECT * FROM `transaksi` left join karyawan on karyawan.id_karyawan = transaksi.id_karyawan where status = 'selesai' and date = '$first' and karyawan.nama_karyawan = '$nama_pega'  ORDER BY `transaksi`.`id_transaksi` DESC;");
        
    }else if (!empty($second)&& !empty($nama_pega)) {
        $result = mysqli_query($koneksi,"SELECT * FROM `transaksi` left join karyawan on karyawan.id_karyawan = transaksi.id_karyawan where status = 'selesai' and date = '$second'  and karyawan.nama_karyawan = '$nama_pega' ORDER BY `transaksi`.`id_transaksi` DESC;");
        
    }else if (!empty($first)) {
        $result = mysqli_query($koneksi,"SELECT * FROM `transaksi` left join karyawan on karyawan.id_karyawan = transaksi.id_karyawan where status = 'selesai' and date = '$first'  ORDER BY `transaksi`.`id_transaksi` DESC;");
        
    }else if (!empty($second)) {
        $result = mysqli_query($koneksi,"SELECT * FROM `transaksi` left join karyawan on karyawan.id_karyawan = transaksi.id_karyawan where status = 'selesai' and date = '$second'  ORDER BY `transaksi`.`id_transaksi` DESC;");
        
    }else if (!empty($nama_pega)) {
        $result = mysqli_query($koneksi,"SELECT * FROM `transaksi` left join karyawan on karyawan.id_karyawan = transaksi.id_karyawan where status = 'selesai' and karyawan.nama_karyawan = '$nama_pega'  ORDER BY `transaksi`.`id_transaksi` DESC;");
        
    }else {
        $result = mysqli_query($koneksi,"SELECT * FROM `transaksi` left join karyawan on karyawan.id_karyawan = transaksi.id_karyawan where status = 'selesai'  ORDER BY `transaksi`.`id_transaksi` DESC;");

    }



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title class="noPrint">Sederek</title>
    <link rel="stylesheet" href="../cssadmin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<style>



    .nav{
    background-color: white;
    /* background-color: #49bc6c; */
    
    
    }
    .container-fluid img{
        width: 40px;
    }
    .navbar-toggler{
        background-color: #34ac54;
    }
 
    a{
        text-decoration: none;
        color: black;
    }
    .navbar-toggler{
        padding: 0px 5px 0px 5px;
    }
    
 
    /* STYLE PRINT */

    .Print{
        display: none;
    }
    .tablewidth{
        display: block;
        width: 65%;
        
    }
    .rowlaporan{
        min-height : 100vh;
        margin-top: 80px;
        margin-left: 0;
        margin-right: 0;
    }
  
@media print {
    *{
        margin: 0;
    }
   .rowlaporan{


        margin-top:0;
    }
  .noPrint{
    display:none;
  }
  .Print{
    display:block;
  }
  .table{
    margin: 0px;
    border-spacing: 0px;
  
  }
  .tablewidth{
    width: 100%;
  }
  .table   td{
    padding: 0px;
  }
  
}

.tables{
    font-size: medium;
}
@media only screen and (max-width:   767px) {

.tables{
    font-size: x-small;
}
}
</style>
<body>
    <div>
     
        <nav class="navbar  fixed-top shadow mb-5  nav noPrint">
            <div class="container-fluid">

                <button class="navbar-toggler " type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="iconburger"><img src="../gambar/menu3.png"  alt=""></span>
                </button>
                <h5 class="" id="offcanvasNavbarLabel">Sederek Kopi</h5>

                <?php 
                // // echo $tanngal;
                // // echo $jam;
                // // echo $detik;
                //  //echo $b;
                //  var_dump($_SESSION['jumlah']);
                //  var_dump($_SESSION['menu']);
                // var_dump($_SESSION['harga']);
// var_dump($_POST);
              //  echo $kombinasi;
                // if(!$result){echo mysqli_error($result);}
                ?>
                <div class="navbar-brand">
                    <a class="" href="#"><?= $_SESSION['nama_karyawan'] ?></a>
                <img  src="../gambar/logo_Sk.PNG" alt="">
                </div>
           
                <div class="offcanvas offcanvas-start" tabindex="" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Sederek Kopi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../index.php">Transaksi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../pesanan/pesanan.php">Pesanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../menu/menu.php">Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../karyawan/karyawan.php">karyawan</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../laporan/laporan_penjualan.php">Laporan Penjualan</a>

                            </li>
                          
                       
                        </ul>
                        <div style="position: relative; ">
                        <form action="../logout.php" >
                                 <button class="btn btn-outline-success " type="submit">Keluar</button>
                             </form>

                         </div>
                    </div>
                </div>
            </div>
        </nav>
        
<h2 class="text print text-center  Print">Sederek Kopi</h2>

<h5 class="text print text-center   Print">Laporan Penjualan</h5>
<h5 class="text print text-center Print">

    <?php 
    if (!empty($_POST)) {
        $date=date_create($_POST['datefirst']);
        $date2=date_create($_POST['datesecond']);
    }
         

       if (!empty($_POST['datesecond']) && !empty($_POST['datefirst'])) {
            echo "Tanggal: ", date_format($date,"d-m-Y")," s/d ",  date_format($date2,"d-m-Y");
        }else if (!empty($_POST['datesecond']) && empty($_POST['datefirst'])) {
            echo "Tanggal: " ,date_format($date2,"d-m-Y");

             
        }else if (empty($_POST['datesecond']) && !empty($_POST['datefirst'])) {
                    echo  "Tanggal: ",date_format($date,"d-m-Y");
              
        }
    ?>
</h5>

        <div class="row  px-3 rowlaporan" >
            <div class="col mt-4 px-sm-5 px-0 mx-sm-auto  tablewidth" >
                
                <form action="#" method="POST"  class="noPrint">
                    <div class="row ">
                   <div class="col-12 col-md-2">

                       <div class="form-floating">
                           <input type="search" autocomplete="off" name="datefirst" class="datepicker_input form-control border-2" id="datepicker1" value="<?= $_POST['datefirst'] ?>" placeholder="DD/MM/YYYY" />
                           <label for="datepicker1">Tanggal pertama</label>
                        </div>
                    </div> 
                    <div class="col-12 col-md-2">

                    <div class="form-floating  ">
                    <input type="search" autocomplete="off" name="datesecond" class="datepicker_input form-control border-2" id="datepicker1" value="<?= $_POST['datesecond'] ?>" placeholder="DD/MM/YYYY" />
                    <label for="datepicker1">Tanggal kedua</label>
                    </div>
                    </div> 

                     <div class="col-12 col-md-2 ">
                        <div class="form-floating mb-4 ">
                            <input type="search" autocomplete="off"  name="nama_pegawai"  class=" form-control border-2" id="datepicker1"  placeholder="DD/MM/YYYY" />
                            <label for="datepicker1">Nama Karyawan</label>
                        </div> 
                    
                    </div>
                    <div class="col-12 col-md-2 mx-md-0 mx-auto">
                            <button type="submit" name="submit" class="btn btn-primary my-2">Serch</button>               
                    </div>
                    <!-- <div class="col-2">
                        <input type="submit" value="submit" name="submit">
                        
                    </div> 
                    
                </div> -->

                    <!-- <input type="date" id="myInput" name="datefirst">
                    <input type="text" class="input-grup"id="myInput" name="datesecond">
                    <input type="submit" value="submit" name="submit"> -->
                </div>
                </form>
                
       


<div style="  width: 100%;" class="tables"> 
  
  <table class="table" id="myTable" style=" size: 1px;">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Karyawan</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       $counter = 1;
                       while($row = mysqli_fetch_array($result)){ ?>

                        <tr>
                            <th scope="row"><?= $counter  ?></th>
                            <td><?= $row['date'] ?></td>
                            <td><?= $row['nama_karyawan'] ?></td>
                            <td>
                                <table >

                                    <?php 
                            $where = $row['id_transaksi'] ;
                            // echo $where;
                            $resultmenu = mysqli_query($koneksi,"SELECT * FROM `menu` LEFT join detail_transaksi on detail_transaksi.id_menu=menu.id_menu where detail_transaksi.id_transaksi = $where;");
                            while($rowmenu = mysqli_fetch_array($resultmenu)){ ?>
                                    <tr>
                                        <td>

                                            <?= $rowmenu['nama_menu'] ?>

                                        </td>

                                    </tr>

                                    <?php } ?>
                                </table>

                            </td>
                            <td>
                                <table >

                                    <?php 
                          $where = $row['id_transaksi'] ;
                          // echo $where;
                          $resultmenu = mysqli_query($koneksi,"SELECT * FROM `menu` LEFT join detail_transaksi on detail_transaksi.id_menu=menu.id_menu where detail_transaksi.id_transaksi = $where;");
                          while($rowmenu = mysqli_fetch_array($resultmenu)){ ?>
                                    <tr>
                                        <td>

                                            <?= $rowmenu['jumlah'] ?>

                                        </td>

                                    </tr>

                                    <?php } ?>
                                </table>
                            </td>
                            <td>
                                <table>

                                    <?php 
                          $where = $row['id_transaksi'] ;
                          // echo $where;
                          $resultmenu = mysqli_query($koneksi,"SELECT * FROM `menu` LEFT join detail_transaksi on detail_transaksi.id_menu=menu.id_menu where detail_transaksi.id_transaksi = $where;");
                          while($rowmenu = mysqli_fetch_array($resultmenu)){ ?>
                                    <tr>
                                        <td>

                                            <?= number_format($rowmenu['harga']      , 0, '', '.') ?>

                                        </td>

                                    </tr>

                                    <?php } ?>
                                </table>
                            </td>
                            <td> <?= number_format($row['total_bayar']    , 0, '', '.') ; ?></td>



                        </tr>

                        <?php
                    $counter++;
                } ?>
                        <tr>
                            <td colspan="5"></td>
                            
                            <td>Total</td>
                            <td>
                                <?php
               if (!empty($first) AND !empty($second) and !empty($nama_pega)) {

                $result_total_dapat = mysqli_query($koneksi,"SELECT SUM(total_bayar) as total FROM `transaksi`left join karyawan on karyawan.id_karyawan = transaksi.id_karyawan   WHERE karyawan.nama_karyawan = '$nama_pega' and status = 'selesai' AND date BETWEEN '$first' AND '$second';");

            }else if (!empty($_POST['datefirst']) AND !empty($_POST['datesecond'])) {

                $result_total_dapat = mysqli_query($koneksi,"SELECT SUM(total_bayar) as total FROM `transaksi`   WHERE status = 'selesai' AND date BETWEEN '$first' AND '$second' ;");
            }else if (!empty($first) && !empty($nama_pega)) {
                $result_total_dapat = mysqli_query($koneksi,"SELECT SUM(total_bayar) as total FROM `transaksi` left join karyawan on karyawan.id_karyawan = transaksi.id_karyawan where status = 'selesai' and date = '$first' and karyawan.nama_karyawan = '$nama_pega'  ORDER BY `transaksi`.`id_transaksi` DESC;");
                    
                }else if (!empty($second)&& !empty($nama_pega)) {
                    $result_total_dapat = mysqli_query($koneksi,"SELECT SUM(total_bayar) as total FROM `transaksi` left join karyawan on karyawan.id_karyawan = transaksi.id_karyawan where status = 'selesai' and date = '$second'  and karyawan.nama_karyawan = '$nama_pega' ORDER BY `transaksi`.`id_transaksi` DESC;");
                    
                }else if (!empty($first)) {
                    $result_total_dapat = mysqli_query($koneksi,"SELECT SUM(total_bayar) as total FROM `transaksi` left join karyawan on karyawan.id_karyawan = transaksi.id_karyawan where status = 'selesai' and date = '$first'  ORDER BY `transaksi`.`id_transaksi` DESC;");
                    
                }else if (!empty($second)) {
                    $result_total_dapat = mysqli_query($koneksi,"SELECT SUM(total_bayar) as total FROM `transaksi` left join karyawan on karyawan.id_karyawan = transaksi.id_karyawan where status = 'selesai' and date = '$second'  ORDER BY `transaksi`.`id_transaksi` DESC;");
                    
                }else if (!empty($nama_pega)) {
                    $result_total_dapat = mysqli_query($koneksi,"SELECT SUM(total_bayar) as total FROM `transaksi` left join karyawan on karyawan.id_karyawan = transaksi.id_karyawan where status = 'selesai' and karyawan.nama_karyawan = '$nama_pega' ORDER BY `transaksi`.`id_transaksi` DESC;");
                    
                }else{
                    $result_total_dapat = mysqli_query($koneksi,"SELECT SUM(total_bayar) as total FROM `transaksi`   WHERE status = 'selesai' ;");

                }

                while ($rowtotal = mysqli_fetch_array($result_total_dapat)) {?>

                                <?=   number_format($rowtotal['total']   , 0, '', '.') ?>

                                <?php } ?>



                            </td>
                        </tr>


                    </tbody>
                </table>


</div>
              
            </div>
            <div class="row my-3">
                <div class="col ">
                    <button type="button" class="btn btn-success noPrint float-end" onclick="window.print();">Cetak/Print</button>
                </div>
            </div>
        </div>


        <footer class="footer noPrint">
        &copy;Nanda Bahtiar Bashori 2022
        </footer>




        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker-full.min.js"></script>
    <script src="./script.js"></script>


</body>

</html>