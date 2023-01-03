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
$result = mysqli_query($koneksi,"SELECT menu.id_menu, menu.nama_menu,kategori.nama_kategori,menu.stok,menu.harga FROM `menu` INNER JOIN kategori on menu.id_ketegori = kategori.id_kategori  ORDER BY kategori.nama_kategori ASC;;");
$result2 = mysqli_query($koneksi,"SELECT id_kategori,menu.id_menu,menu.nama_menu,kategori.nama_kategori,menu.stok,menu.harga FROM `menu` INNER JOIN kategori on menu.id_ketegori = kategori.id_kategori  ORDER BY kategori.nama_kategori ASC;;");


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="../cssadmin.css">
    <link rel="stylesheet" href="../nav.css">

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
.navbar-toggler-icon{}
a{
    text-decoration: none;
    color: black;
}
.navbar-toggler{
    padding: 0px 5px 0px 5px;
}
@media only screen and (max-width: 1399px) {
  .btnkran {display: block;}
}
@media only screen and (max-width: 575px) {
    tbody {
    display: block;

}
thead {
    display: block;

}
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
                                <a class="nav-link active" aria-current="page" href="../pesanan/pesanan.php">Pesanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="menu.php">Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../karyawan/karyawan.php">karyawan</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../laporan/laporan_penjualan.php">Laporan Penjualan</a>
                            </li>
                       
                       
                        </ul>
                        <div style="position: relative; bot:5px;">
                             <form   form action="../logout.php" >
                                 <button class="btn btn-outline-success " type="submit">Keluar</button>
                             </form>

                         </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="row mt-5 px-3" style="margin:0;min-height: 100vh;">

            <div class="col-9 mt-5 mx-lg-auto mx-0 mx-sm-auto px-0" style="width:65%">
            <!-- modal kategori -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
                <!--modal   tambah menu-->
                <div class="modal fade" id="asw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>


                            <div class="modal-body overflow-auto" style="  height:300px;width:100% ">

                                <form action="tambah_menu.php" method="POST">

                                    <table class="table">
                                        <tr>
                                            <td> <label for="nama_menu">Nama Menu</label></td>
                                            <td><input class="form-control" type="text" name="nama_menu" id="nama_menu"
                                                    aria-label="default input example"></td>
                                        </tr>
                                        <tr>
                                            <td> <label for="kategori">Kategori</label></td>
                                            <td>
                                            <div class="input-group mb-3">
                                            <select class="form-select" name="kategori"
                                                                                                                            aria-label="Default select example">
                                                                                                                            <option selected>Open this select menu</option>
                                                                                                                            <?php $resultKategori = mysqli_query($koneksi,"SELECT * FROM `kategori`");
                                                                                                while($rowkategori = mysqli_fetch_array($resultKategori))
                                                                                                { ?>

                                                                                                                            <option value="<?= $rowkategori['id_kategori'] ?>">
                                                                                                                                <?= $rowkategori['nama_kategori'] ?></option>

                                                                                                                            <?php }?>
                                            </select>
                                              

                                            </div>

                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> <label for="Stok">Stok</label></td>
                                            <td><input class="form-control" type="number" name="stok" id="Stok"
                                                    aria-label="default input example"></td>
                                        </tr>
                                        <tr>
                                            <td> <label for="Harga">Harga</label></td>
                                            <td><input class="form-control" type="number" name="harga" id="Harga"
                                                    aria-label="default input example"></td>
                                        </tr>

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
                <!-- Modal /-->
                
                <!--modal   edit menu-->
                <?php while($rows = mysqli_fetch_array($result2)){ ?>
                    <div class="modal fade" id="asws<?= $rows['id_menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            
                    <div class="modal-dialog  modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>


                            <div class="modal-body overflow-auto" style="  height:300px;width:100% ">

                                <form action="cek_edit_menu.php" method="POST">

                                    <table class="table">
                                        <tr>
                                            <input hidden type="text" name="id_menu" value="<?= $rows['id_menu'] ?>">
                                            <td> <label for="nama_menu">Nama Menu</label></td>
                                            <td><input class="form-control" type="text" name="nama_menu" id="nama_menu"
                                                    aria-label="default input example" value="<?= $rows['nama_menu'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td> <label for="kategori">Kategori</label></td>
                                            <td>
                                                <select class="form-select" name="kategori"
                                                    aria-label="Default select example">
                                                    <option value="<?= $rows['id_kategori'] ?>">Open this select menu</option>
                                                    <?php $resultKategori = mysqli_query($koneksi,"SELECT * FROM `kategori`");
                                                         while($rowkategori = mysqli_fetch_array($resultKategori))
                                                         { ?>

                                                    <option value="<?= $rowkategori['id_kategori'] ?>">
                                                        <?= $rowkategori['nama_kategori'] ?></option>

                                                    <?php }?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> <label for="Stok">Stok</label></td>
                                            <td><input class="form-control" type="number" name="stok" id="Stok"
                                                    aria-label="default input example" value="<?= $rows['stok'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td> <label for="Harga">Harga</label></td>
                                            <td><input class="form-control" type="number" name="harga" id="Harga"
                                                    aria-label="default input example" value="<?= $rows['harga'] ?>"></td>
                                        </tr>

                                    </table>

                            </div>
                            <div class="modal-footer">
                                    <script>
                                        function myFunction<?= $rows["id_menu"] ;?>() {
                                    let text = "Hapus menu?";
                                    if (confirm(text) == true) {
                                        document.getElementById("jumlah<?= $rows["id_menu"] ;?>").value=1;

                                    } else {
                                        document.getElementById("jumlah<?= $rows["id_menu"] ;?>").value=2;



                                    }


                                    }

                                    </script>

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="edit_pesanan" class="btn btn-primary">Save changes</button>
                                    <button type="submit" name="hapus" id="jumlah<?= $rows["id_menu"] ;?>" onclick=" myFunction<?= $rows['id_menu'] ;?>()"class="btn btn-primary">hapus</button>
                                 
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
                <?php
              
                } ?>
                <!-- Modal /-->
    <!-- Modal /-->
                 <div class="row">
                    <div class="col-xl-2 col-10">
                    <!-- button modal -->
                    <button type="button" class="btn btn-success w-100 mb-2" id="asw " data-bs-toggle="modal" data-bs-target="#asw">
                        Tambah menu
                    </button>
    
                    <!-- /button modal -->
                    </div>
                    <div class="col-xl-10 col-10 w-50">
                    <input type="text" id="myInput"  class="form-control " onkeyup='tableSearch()' placeholder="Cari Menu">
                    </div>
                </div>  
               
                <table class="table" id="myTable">
                    <thead >
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Menu</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       $counter = 1;
                       while($row = mysqli_fetch_array($result)){ ?>
                              
                        <tr>
                            <th scope="row"><?= $counter  ?></th>
                            <td><?= $row['nama_menu'] ?></td>
                            <td><?= $row['nama_kategori'] ?></td>
                            <td><?= $row['stok'] ?></td>
                            <td>Rp.<?= $row['harga'] ?></td>
                            <td><button class="btn btn-primary"  id="<?= $row['id_menu'] ?> "
                                    data-bs-toggle="modal" data-bs-target="#asws<?= $row['id_menu'] ?>">Edit</button></td>
                        </tr>

                        <?php
                    $counter++;
                } ?>

                    </tbody>
                </table>

            </div>
        
        </div>

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