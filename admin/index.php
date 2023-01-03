<?php
session_start();
// var_dump($_SESSION);

require'../koneksi/conn.php';

if (!isset( $_SESSION["id_karyawan"] )) {
    echo "<script>
    alert('login dahulu');
    document.location.href ='../index.php';
    
</script>";
}
if (isset ($_POST['inputserch'])) {
    $inputserch = $_POST['inputserch'];
}


if(!empty ($inputserch)){
    $result = mysqli_query($koneksi,"SELECT * FROM `menu`where id_ketegori = 1 and nama_menu like '$inputserch%';");
    $result = mysqli_query($koneksi,"SELECT * FROM `menu`");
    
   
}else{

    $result = mysqli_query($koneksi,"SELECT * FROM `menu` ");
    
}

$_SESSION['total'] = 0;

if ($_SESSION['total'] === [] || !isset($_SESSION['total'])) {
   $total = 0;
}else{
    $total = $_SESSION['total'];
}
 
if(!isset ($_SESSION['a'])){
    $a = 0;
    $b = 0;

    
}else{
    $a = $_SESSION['a'];
   
}



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sederek Kopi</title>
    <link rel="stylesheet" href="cssadmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<style>
    /* From uiverse.io */

    /* From uiverse.io by @cuatrofender */
    .btnsrc {
        border: none;
        font-family: sans-serif;
        font-size: 17px;
        background: transparent;
        color: black;
        border: solid 1px rgba(0, 107, 179, 0.2);
        padding: 5px;
        border-radius: 5px;
        transition-duration: 0s;
        height: 40px;
        background-color: white;


    }

    .btnsrc:after {
        content: url("gambar/search_FILL0_wght200_GRAD200_opsz20.svg");
        position: relative;
        top: 5px;
        opacity: 0;
        margin-left: -20px;
        transition-duration: 0.2s;
    }

    .btnsrc:hover:after {
        margin-left: -40px;
        opacity: 1;
        padding-left: 10PX;
        padding-right: 10PX;

    }



    .btnsrc:hover {

        color: #ffffff00;
        background-color: white;

        border: solid 1px gainsboro;

    }

    .formserch {
        background-color: #30af56;
        width: 290px;
        height: 60px;
        border-radius: 10px;
        border: 1px solid ;

    }



    .nav {
        background-color: white;
        /* background-color: #49bc6c; */


    }

    .container-fluid img {
        width: 40px;
    }

    .navbar-toggler {
        background-color: #34ac54;
    }

    .navbar-toggler-icon {}

    a {
        text-decoration: none;
        color: black;
    }

    .navbar-toggler {
        padding: 0px 5px 0px 5px;
    }

    .cardpesanan {
        background-color: white;
  ;
    }

    p {
        margin: 0;
    }

    h4 {
        text-align: center;
    }

    .overflow-auto {
        background-color: #d1edda;
        }
    .btnkran{
        position:sticky;
        top: 100px;
        left: 90%;
        display: none;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: white;
        z-index: 1;
    }
        @media only screen and (max-width: 1399px) {
    .btnkran {display: block;}
    } 

    .bodycontent h3{
        color: black;
    }

    .card-button button{
        border: none;
        height: 40px;
    }
    .card-button .submit{
        background-color: #52ad52;
        border-radius: 0px 0px 0px 5px;
    }
    .card-button .batal {
        background-color: Crimson;
        border-radius: 0px 0px 5px 0px;

    }
    hr{
        border-top: solid ;
    }
</style>

<body class="">
    <div>
        <nav class="navbar  fixed-top shadow mb-5  nav">
            <div class="container-fluid">

                <button class="navbar-toggler " type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="iconburger"><img src="gambar/menu3.png" alt=""></span>
                </button>
                <h5 class="" id="offcanvasNavbarLabel">Sederek Kopi</h5>

                <?php 
                
                // // echo $tanngal;
                // // echo $jam;
                // // echo $detik;
                //  //echo $b;
                //  var_dump($_SESSION['jumlah']);
                //  var_dump($_SESSION['menu']);
            //  var_dump($_SESSION);

              //  echo $kombinasi;
                // if(!$result){echo mysqli_error($result);}
                ?>
                <div class="navbar-brand">
                    <a class="" href="#"><?= $_SESSION['nama_karyawan'] ?></a>
                    <img src="gambar/logo_Sk.PNG" alt="">
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
                                <a class="nav-link active" aria-current="page" href="index.php">Transaksi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="pesanan/pesanan.php">Pesanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="menu/menu.php">Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="karyawan/karyawan.php">karyawan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="laporan/laporan_penjualan.php">Laporan Penjualan</a>
                            </li>
                         


                        </ul>
                        <div style="position: relative; bot:5px;">
                            <form action="logout.php">
                                <button class="btn btn-outline-success " type="submit">Keluar</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <button class="btnkran  "><a href="#daftarpesanan"><img src="gambar/card.svg" alt=""></a></button>
        <div class=" row mt-3 px-3 " style="margin:0; min-height: 100vh; background-color: #ffff;">

            <div class="col-xxl-9 col-xl-12 pt-4  mt-5 mx-auto ">
                <!-- ?form serch -->
                <div class="col-12 formserch ">
                    <form class="row " action="#" method="post">
                        <div class="col-auto my-2">
                            <div class="group ms-2">
                                <svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
                                    <g>
                                        <path
                                            d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                                        </path>
                                    </g>
                                </svg>
                                <input placeholder="Search" type="search" name="inputserch" id="inputPassword2"
                                    class="input">
                            </div>
                        </div>
                        <div class="col my-2 ">
                            <div>

                                <button type="submit" name="serch" value="serch"
                                    class="btn btn-primary mb-3  btnsrc">serch</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- form -->
                <form action="cek.php" method="post">


        <div class="row m-auto bodycontent" >
                        <?php
                        if (isset ($_POST['inputserch'])) {
                            $inputserch = $_POST['inputserch'];
                        }
                        if(!empty ($inputserch)){
                            $results = mysqli_query($koneksi,"SELECT * FROM kategori where id_kategori <= 1;");    
                        }else{
                            $results = mysqli_query($koneksi,"SELECT * FROM `kategori` ORDER BY `kategori`.`id_kategori` ASC");
                        }
                                    while($rowKategori = mysqli_fetch_array($results)){ ?>
                        <!-- menu kopi -->
                        <div class="row mx-xxl-5 mx-md-5 mx-sm-0">
                            <div class="row ">
                                <?php 
                                                    if (!empty ($_POST['inputserch'])) {
                                                        $kategori="";
                                            }else{
                                           $kategori=  $rowKategori['nama_kategori'] ;
                                            }?>
                                <h3 class="mt-5" id="<?= $kategori ?>"><?= $kategori ?>
                                    <hr>
                                </h3>
                            </div>

                            <?php
                                        
                                        


                                            if(!empty ($inputserch)){
                                                 $resultskate = mysqli_query($koneksi,"SELECT * FROM kategori ");    
                                                
                                                while($katerow = mysqli_fetch_array($resultskate)){
                                                    if ($inputserch === $katerow['nama_kategori']) {
                                                        $asd= $katerow['nama_kategori']; 
                                                        echo "<script>
                                                        document.location.href =' http://localhost:8080/kp_sederek/admin/index.php?inputserch=#$asd';      
                                                        </script>";
                                                    }  else{
                                                        $resultt = mysqli_query($koneksi,"SELECT * FROM `menu` where  nama_menu like '$inputserch%';");
       
                                                       }
                                                }

                                           
                                          


                                            }else{

                                                $id_kategori = $rowKategori['id_kategori'];
                                                $resultt = mysqli_query($koneksi," SELECT * FROM `menu` WHERE id_ketegori = $id_kategori");
                    
                }
                                


                                        while($row = mysqli_fetch_array($resultt)){ ?>

                            <script>
                                function a<?= $row['id_menu'] ;?>(){
                                    var checkBox = document.getElementById("<?= $row['id_menu'] ;?>");


                                    if (checkBox.checked == true) {
                                        document.getElementById("nama<?= $row["id_menu"] ;?>").value ="<?= $row["nama_menu"] ;?>";
                                        document.getElementById("harga<?= $row["id_menu"] ;?>").value = "<?= $row["harga"] ;?>";
                                        document.getElementById("id_menu<?= $row["id_menu"] ;?>").value = "<?= $row["id_menu"] ;?>";



                                        document.getElementById("jumlah<?= $row["id_menu"] ;?>").value = 1;

                                        document.getElementById("jumlah<?= $row["id_menu"] ;?>").select();



                                    } else {
                                        document.getElementById("nama<?= $row["id_menu"] ;?>").value = "";
                                        document.getElementById("harga<?= $row["id_menu"] ;?>").value = "";
                                        document.getElementById("jumlah<?= $row["id_menu"] ;?>").value = "";

                                    }
                                }
                            </script>
                            <!-- card -->
                            <label class="mx-3 my-2" for="<?= $row["id_menu"] ;?>" style="width: 10rem; min-height: 100px;">
                                <div class="card" style="width: 10rem; ;">
                                    <img src="../gambar/272910919_467341784759850_468246659572643851_n.jpg"
                                        height="101rem" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <?= $row["nama_menu"];?></p>
                                        <h5 class="card-text " name="harga" value=" <?= $row["harga"];?>">Rp.
                                            <?= number_format($row['harga']   , 0, '', '.') ?></h5>

                                        <input class="form-control form-control-sm" type="number"
                                            id="jumlah<?= $row['id_menu'] ;?>" name="jmlh[]" placeholder="0"
                                            aria-label=".form-control-sm example">
                                        <input type="checkbox" onclick="a<?= $row['id_menu'] ;?>()"
                                            class=" form-check-input mt-0" id="<?= $row['id_menu'] ;?>">
                                        <input type="text" id="nama<?= $row["id_menu"] ;?>" name="menu[]" hidden
                                            value="">
                                        <input type="text" id="id_menu<?= $row["id_menu"] ;?>" name="id_menu[]" hidden
                                            value="">
                                        <input type="text" id="harga<?= $row["id_menu"] ;?>" name="harga[]" hidden
                                            value="">
                                    </div>
                                </div>
                            </label>
                            <!--/ card -->
                            <?php } ?>



                        </div>
                        <?php } ?>
                        <!-- end menu kopi -->

                        <button type="submit" name="submit" class="position-stiky btn btn-primary m-auto mb-3" style="position: sticky;
                bottom:2%; width: 200px;">Tambah</button>

                </form>

        </div>

        </div>
        <dic class="col-xxl-3 col-xl-0 col-xl-3 mt-5 ">
            <div class="row cardpesanan shadow border border-dark rounded-2" id="daftarpesanan" style="position: sticky;
                    top: 80px;">

                <div class="col ">
                    <h4 class="my-3">Daftar Pesanan</h4>
                    <div class="row overflow-auto  cardtable rounded-4 bg-light"  style="  height:300px;">
                        <form action="cekTambah.php" method="post">
                        <div class="group">
                        <input class="form-control form-control-sm" placeholder="Nama Pembeli" type="text" name="namapemesan" placeholder=".form-control-sm" aria-label=".form-control-sm example">
                                <!-- <input placeholder="Search" type="nama Pembeli" name="namapemesan"  id="inputPassword2"
                                    class="input  my-1 bg-success"> -->
                            </div>
                                <!-- <input type="text" name="namapemesan" class="input-grup" placeholder="nama pemesan"> -->
                            <table class="table table-striped table-light table-hover">
                                <thead style=" position: sticky;top:0" class="">
                                    <tr class="">

                                        <th scope="col" class="w-50">Nama Menu

                                        </th>
                                        <th scope="col" class="w-50">Harga

                                        </th>
                                        </th>


                                        <th scope="col" class="jumlah "><span class="mx-auto ">Jumlah</span>
                                            <a href="" class></a>
                                        </th>

                                    </tr>

                                </thead>
                                <tbody class="table inputproses image">
                                    <?php 
                                                for ($i=0; $i < $a ; $i++) {  ?>
                                    <tr>

                                        <td class="table-light">
                                            <input id="pText" class="form-control form-control-sm mx-auto" hidden
                                                name="id_menu[]" type="text"
                                                value="<?php echo $_SESSION['id_menu'][$i] ;?>">
                                            <!-- <input id="pText "disabled readonly class="form-control form-control-sm mx-auto"  type="text" value="<?php echo $_SESSION['menu'][$i] ;?>"  > -->
                                            <p><?php echo $_SESSION['menu'][$i] ;?></p>
                                        </td>
                                        <td class="table-light">

                                            <!-- <input id="pText"disabled readonly class="form-control form-control-sm mx-auto" type="text" value="<?php echo  number_format($_SESSION['harga'][$i], 0, '', '.');?>" >         -->
                                            <input id="pText" class="col-sm-2 col-form-label" hidden name="harga[]"
                                                type="text" value="<?= $_SESSION['harga'][$i];?>">
                                            <p><?php echo $_SESSION['harga'][$i] ;?></p>

                                        </td>
                                        <td class="table-light">

                                            <input type="number" name="jumlah[]"
                                                class=" jumlah form-control form-control-sm mx-auto"
                                                value="<?=$_SESSION['jumlah'][$i]?>"></td>
                                    </tr>

                                    <?php } ?>
                                </tbody>
                            </table>

                    </div>

                    <?php
                                            if (isset($_SESSION['a'])) {
                                                $c=  $_SESSION['jumlah'];
                                                $d= $_SESSION['harga'];
                                                $e= $_SESSION['a'];


                                                for ($i=0; $i < $e ; $i++) {  
                                                    $tess[]= $d[$i] * $c[$i];


                                                }
                                            }    


                                        
                                                    ?>
                    <p class="py-3">Total Bayar Rp.<b><?php 
                                            if (isset($tess)) {
                                                
                                            echo  number_format(array_sum($tess)   , 0, '', '.') ;
                                            } ?></b></p>
                    <script>
                        function myFunction() {
                            let text = "Batal Pesan?";
                            if (confirm(text) == true) {
                                document.getElementById("batal").value = 321;

                            } else {
                                document.getElementById("batal").value = 123;


                            }
                        }
                    </script>
                    <!-- button card -->
                    <div class="row card-button">
                    <button type="submit" name="proses" class="w-50 submit m-auto ">Simpan</button>
                    <button data-bs-toggle="tooltip" data-bs-placement="right" title="Hapus Pesanan" type="submit"
                        name="batalInput" class=" w-50 batal" id="batal" onclick="myFunction()" aria-label="Close">
                      Batal
                    </button>
                    </div>
                

                    </form>
                </div>
            </div>

        </dic>
    </div>


    <footer class="footer">
        &copy;Nanda Bahtiar Bashori 2022
        </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>