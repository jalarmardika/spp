<?php 
session_start();
if (isset($_SESSION['level'])) {
  if ($_SESSION['level'] != "") {
    header("location:dashboard/index.php?pesan=sudahLogin");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login-SPP</title>
  <link href="assets/startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="assets/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <?php
  if(isset($_GET['pesan'])){
    if($_GET['pesan']=="logout"){
      echo '
      <script>
      alert("Anda berhasil logout");
      </script>
      ';

    }else if($_GET['pesan']=="belumLogin"){
      echo '
      <script>
      alert("Anda harus login terlebih dahulu");
      </script>
      ';

    }else if($_GET['pesan']=="gagal"){
      echo '
      <script>
      alert("Login gagal, username dan password tidak sesuai !");
      </script>
      ';

    }
  }
  ?>

  <section class="section">
    <div class="bg-success " style="padding: 7rem"></div>
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-6 col-10">
            <div class="card shadow-lg mb-3" style="margin-top: -120px;">
              <div class="card-body">
                <center>
                  <img width="70" src="assets/img/smk.jpg"><br><br>
                  <b style="font-size:15px;">APLIKASI PEMBAYARAN SPP</b><br>
                  <b style="font-size:12px;">SMK NU 05 KALIWUNGU SELATAN</b>
                  <p class="text-muted" style="font-size: 10px;">Jl. Soponyono No.99 Ds. Kedungsuren Kec. Kaliwungu Selatan Kab. Kendal</p>
                </center>
                <form action="aksi_login.php" method="post">
                  <div class="form-group">
                    <label>Username</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                      </div>
                      <input type="text" name="username" class="form-control" placeholder="Masukkan Nama/Username" autocomplete="off" autofocus required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                      </div>
                      <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-success btn-lg btn-block" >
                      Login
                    </button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
</body>
</html>
