<?php
session_start();
//var_dump($_SESSION);
require'../../koneksi/conn.php';
if (!isset( $_SESSION["id_karyawan"] )) {
    echo "<script>
    alert('login dahulu');
    document.location.href ='../index.php';
    
</script>";
}
$result = mysqli_query($koneksi,"");

if (isset ($_GET['inputserch'])) {
    $inputserch = $_GET['inputserch'];
}


if(!empty ($inputserch)){
    $result = mysqli_query($koneksi,"SELECT * FROM `transaksi` where status ='belum' and nama_pelanggan like '$inputserch%' ORDER BY `transaksi`.`date` DESC");
  
    
}else{

    $result = mysqli_query($koneksi,"SELECT * FROM `transaksi` where status ='belum'  ORDER BY `transaksi`.`date` DESC");
    
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="../cssadmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- CSS only -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
        .navbar-toggler-icon{}
        a{
            text-decoration: none;
            color: black;
        }
        .navbar-toggler{
            padding: 0px 5px 0px 5px;
        }
        .transaksis {
                        background-color: darkgrey;
                        height: 303px;
                        width: 848px;
                        margin: auto;
                        border-radius: 5px;

                    }

                    .transaksis .row {

                        margin: 0;
                        height: 50px;

                    }
                    @media only screen and (max-width: 992px) {
                        .transaksis {
                            background-color: darkgrey;
                        height: 303px;
                        width: 500px;
                        margin: auto;
                        border-radius: 5px;

                    }
              
                    
        } 
        @media only screen and (max-width:   576px) {
                                .transaksis {
                                    background-color: darkgrey;
                                height: 403px;
                                width: 350px;
                                margin: auto;
                                border-radius: 5px;

                            }
                        }
                        .formserch {
                background-color: #30af56;
                width: 290px;
                height: 60px;
                border-radius: 10px;
                border: 1px solid ;
                margin: auto;   
                z-index: 1;

            }
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
                content: url("../gambar/search_FILL0_wght200_GRAD200_opsz20.svg");
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
</style>

<body>
    <div>

        <nav class="navbar  fixed-top shadow mb-5  nav">
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
                                <a class="nav-link active" aria-current="page" href="pesanan.php">Pesanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="laporan/laporan_penjualan.php">Laporan</a>
                            </li>
                       
                     
                          
                        </ul>
                        <div style="position: relative; bot:5px;">
                             <form action="../logout.php" >
                                 <button class="btn btn-outline-success " type="submit">Keluar</button>
                             </form>

                         </div>    
                    </div>
                </div>
            </div>
        </nav>
        <div class="row mt-5" style="margin:0; min-height: 100vh;">
        
        <div class="col-xxl-9 col-xl-12 pt-4  mt-5 mx-auto ">
                <!-- ?form serch -->
                <div class="col-12 formserch ">
                    <form class="row " action="#" method="get">
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
            <div class="col mt-2 mx-md-auto mx-0 " style="width:65%">
        


            <!-- Modal 1-->
<?php  while($row = mysqli_fetch_array($result)){ ?>

        <div class="modal fade" id="asw<?= $row['id_transaksi'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="Name">
                            <div class="modal-body overflow-auto" style="  height:300px;width:100% ">

                                <form action="editPesanan.php" method="POST">


                                    <table class="table" id="myTable" data-filter-control="true"
                                        data-show-search-clear-button="true">
                                        <input type="text" id="id_transaksi<?= $row['id_transaksi'];?>"
                                            name="id_transaksi" hidden value="">

                                        <tr>
                                            <th>Nama Menu</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>chack</th>

                                        </tr>

                                        <?php 
                $result2 = mysqli_query($koneksi,"SELECT * FROM menu");
                
                while( $row2 = mysqli_fetch_array($result2)){ ?>
                                        <script>
                                            function b<?= $row['id_transaksi']; ?> () {
                                                document.getElementById("id_transaksi<?= $row['id_transaksi'];?>")
                                                    .value =
                                                    "<?= $row['id_transaksi'];?>";
                                            }

                                            function a<?= $row2["id_menu"], $row['id_transaksi']; ?> () {
                                                var checkBox = document.getElementById(
                                                    "cek<?= $row2['id_menu'] ,$row['id_transaksi'] ;?>");

                                                if (checkBox.checked == true) {
                                                    document.getElementById("id_menu<?= $row2["id_menu"],$row['id_transaksi'];?>").value =
                                                        "<?= $row2["id_menu"] ;?>";
                                                    document.getElementById("harga<?= $row2["id_menu"],$row['id_transaksi'] ;?>").value =
                                                        "<?= $row2["harga"] ;?>";
                                                    document.getElementById("jumlah<?= $row2["id_menu"],$row['id_transaksi'] ;?>").value =
                                                        "1";
                                                    document.getElementById("jumlah<?= $row2["id_menu"],$row['id_transaksi'] ;?>").select()

                                                } else {
                                                    document.getElementById("id_menu<?= $row2["id_menu"],$row['id_transaksi'] ;?>").value =
                                                        "";
                                                    document.getElementById("harga<?= $row2["id_menu"] ,$row['id_transaksi'];?>").value =
                                                        "";
                                                    document.getElementById("jumlah<?= $row2["id_menu"],$row['id_transaksi'] ;?>").value =
                                                        "";
                                                }

                                            }
                                        </script>
                                        <tr>

                                            <td> <label for="<?= $row2['nama_menu'] ?>"><?= $row2['nama_menu'] ?>
                                                    <input hidden type="text"
                                                        id="id_menu<?= $row2["id_menu"],$row['id_transaksi'] ;?>"
                                                        name="id_menu[]" value="">
                                                    <input hidden type="text"
                                                        id="harga<?= $row2["id_menu"],$row['id_transaksi'] ;?>"
                                                        name="harga[]" value="">

                                                </label>
                                            </td>
                                            <td><input type="number" style="width: 50px;"
                                                    id="jumlah<?= $row2["id_menu"],$row['id_transaksi'] ;?>"
                                                    name="jumlah[]" id=""></td>
                                            <td>Rp.<?= number_format($row2['harga']   , 0, '', '.')  ?></td>

                                            <td> <input type="checkbox"
                                                    onclick="a<?= $row2['id_menu'] ,$row['id_transaksi'];?>()"
                                                    class=" form-check-input mt-0"
                                                    id="cek<?= $row2['id_menu'],$row['id_transaksi'] ;?>"></td>


                                        </tr>

                                        <?php }?>
                                    </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="tambah_pesanan" class="btn btn-primary">Save
                                    changes</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- Modal 1-->

                <form action="editPesanan.php" method="POST">
                    <div class="row transaksis my-4">
                        <div class="row ">

                    <div class=" m-auto text-center">

                                <span><?= $row['nama_pelanggan'] , $row['id_transaksi'] ;?></span>
                            </div>
                        </div>
            <div class="col-xxl-11 col-xl-11 col-md-10 col-sm-10  col-12 ps-4">

                            <div class="row "
                                style="height:213px; background-color: gainsboro ; border-radius: 5px;overflow:auto ;">
                                <div class="col " style="padding-left: 0px;padding-right: 0px;;">
                                    <table class="table">
                                        <thead style=" position: sticky;top:0px; background-color: aliceblue; ">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Jumlah</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Hapus</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                               $counter = 1;
                                           $where =  $row['id_transaksi'];
                                           
                                                $result2 = mysqli_query($koneksi,"SELECT * FROM `detail_transaksi` INNER JOIN menu on detail_transaksi.id_menu = menu.id_menu WHERE id_transaksi =  '$where'");
                                                $resultharga = mysqli_query($koneksi,"SELECT *, SUM((harga * jumlah )) as total FROM `detail_transaksi` WHERE id_transaksi = '$where';");
                                            
                                            ?>
                                            <?php while( $row1 = mysqli_fetch_array($result2)){  ?>
                                            <script>
                                                function myFunction<?= $row1["id_menu"], $row1['id_detail']; ?>() {
                                                    let text = "Press a button!\nEither OK or Cancel.";
                                                    if (confirm(text) == true) {
                                                        document.getElementById("jumlah<?= $row1["id_menu"], $row1['id_detail'] ;?>").value = <?= $row1['id_detail'] ;?>;

                                                    } else {
                                                        document.getElementById("jumlah<?= $row1["id_menu"], $row1['id_detail'] ;?>").value = 2;

                                                    }
                                                }
                                            </script>
                                            <tr>
                                                <th scope="row"><?= $counter ?></th>
                                                <td> <?= $row1['nama_menu'] ;?></td>
                                                <td><?= $row1['jumlah'] ;?></td>
                                                <td><?= number_format($row1['harga'] , 0, '', '.')   ;?></td>
                                                <td>
                                                    <button data-bs-toggle="tooltip" data-bs-placement="right"
                                                        title="Hapus Pesanan" type="submit" name="close"
                                                        class="btn btn-light" id="jumlah<?= $row1["id_menu"], $row1['id_detail'] ;?>"
                                                        onclick="myFunction<?= $row1['id_menu'], $row1['id_detail']; ?>()"
                                                        aria-label="Close">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                        </svg></button></td>


                                            </tr>

                                            <?php 
                         $counter++;
                                        } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
            </div>
            <div class="col-xxl-1 col-xl-1  col-md-2 col-sm-2  col-xs-1 col-0 ">
                            <!-- button modal -->
             <div class="row mb-4">
                
                <button type="button" class=" btn btn-success "
                                    onclick="b<?= $row['id_transaksi'] ;?>()" id="as<?= $row["id_transaksi"] ;?>"
                                    data-bs-toggle="modal" data-bs-target="#asw<?= $row['id_transaksi'] ?>">

                                    <svg data-bs-toggle="tooltip" data-bs-placement="right" title="Tambah Pesanan"
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-plus-square" viewBox="0 0 16 16">
                                        <path
                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                    </svg>
                                </button>




                                <!-- /button modal -->
                            
                                    <input hidden type="text" name="id_transaksi" id=""
                                        value="<?= $row['id_transaksi'] ;?>">
                                    <button class="btn btn-primary" name="selesai" type="submit"
                                        style="padding-bottom: 10px;">
                                        <svg data-bs-toggle="tooltip" data-bs-placement="right" title="Sesesai" width="16"
                                            height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                            <path
                                                d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
                                        </svg></button>
                                   
                           
            </div>


            </div>
                        <div class="row">
                            <div class="col">
                                <span>Total bayar</span>
                            </div>
                            <div class="col">
                                <span>Rp.</span>
                                <?php while( $total = mysqli_fetch_array($resultharga)){  ?>
                                <?= number_format($total['total'], 0, '', '.')  ;?>
                                <input type="number" hidden name="total_bayar" value="<?= $total['total'] ;?>">
                                <?php             } ?>

                            </div>
                        </div>
                    </div>
                </form>
<?php } ?>
            </div>


        </div>

        <script>
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        </script>
     
     <footer class="footer">
        &copy;Nanda Bahtiar Bashori 2022
        </footer>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
        </script>
        <script type="application/javascript">
            function tableSearch() {
                let input, filter, table, tr, td, txtValue;

                //Intialising Variables
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");

                for (let i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }

            }
        </script>

</body>

</html>