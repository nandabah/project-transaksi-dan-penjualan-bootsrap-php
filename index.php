<?php
require'login.php';

if (!empty( $_SESSION["id_karyawan"] )) {
  echo "<script>
  alert('Sudah Login');
  document.location.href ='admin/index.php';
  
</script>";
}else {

}


if (isset($_POST["masuk"])) {

  //cek proses tambah
  if (login($_POST) === "admin") {
 
      echo
"<script>
alert('Login berhasil');
      document.location.href ='admin/index.php';
  
</script>";

  }else if (login($_POST) === "pegawai") {
 
    echo
"<script>
alert('Login berhasil');
    document.location.href ='karyawan/index.php';

</script>";

}  else {
  
      echo "<script>
      alert('username atau password salahs');
     
      
</script>";

  }

}
// var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="logincss.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <section class="login py-3 backgroundlogin">
      <div class="container" style="margin-top: 50px">
        <div class="d-flex flex-row">
          <div class="container">
            <div class="row">
              <div class="col text-center inputlogin">
                <section class="login py-4">
                  <div class="container menu1">
                    <div class="kotak_login">
                        <h1>login</h1>
                      <form action="#" method="post">
                        <input class="form-control form-control-lg" type="text" placeholder="username" aria-label=".form-control-lg example" name="username" id="username" />
                        <input class="form-control mt-4 form-control-lg" type="password" placeholder="password" aria-label=".form-control-lg example" name="password" id="password" />
                        <button class="btn btn-primary btn-sm mt-4" name="masuk" type="submit">Masuk</button>
                      </form>
                    </div>
                  </div>
                </section>
              </div>
              <div class="col text-center gambarlogin"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
