<?php
include 'database/database.php';
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: ./");
    exit();
}
 
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($db_conn, $_POST['username']);
    $password = MD5($_POST['password']); // Hash the input password using SHA-256
 
    $sql = "SELECT * FROM data_admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db_conn, $sql);
 
    date_default_timezone_set('Asia/Jakarta');
    $date = date("H:i:s");
    $login = date("Y-m-d H:i:s");
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['nisn'] = $row['nisn'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
        $_SESSION['pesan'] = 'Selamat Datang';
        $_SESSION['role'] = $row['role'];

        mysqli_query($db_conn, "UPDATE data_admin SET status_login = '1', sesi_login = '$date', waktu_login='$login'  WHERE username = '$username'");
        $_SESSION['status_login'] = $row['status_login'];
        $_SESSION['waktu_login'] = $row['waktu_login'];
        
        $_SESSION['sesi_login'] = $row['sesi_login'];
        if($_SESSION['role'] == 'admin'){
        header("Location: admin/");
        } else if($_SESSION['role'] == 'wali'){
          header("Location: admin/");
        }else if($_SESSION['role'] == 'user'){
          header("Location: user/");
        } 
        exit();
    } else {
        echo "<script>alert('Email atau password Anda salah. Silakan coba lagi!')</script>";
    }
}
?>

<!doctype html>
<html lang="zxx">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Axoma">
    <meta name="keywords" content="Axoma">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>Aplikasi Rapor SMP Advent Surakarta</title>
    <link rel="icon" href="assets/images/SMKN7.png">
    <link href="assets/Axoma/static\plugin\bootstrap\css\bootstrap.min.css" rel="stylesheet">
    <link href="assets/Axoma/static\plugin\font-awesome\css\fontawesome-all.min.css" rel="stylesheet">
    <link href="assets/Axoma/static\plugin\et-line\style.css" rel="stylesheet">
    <link href="assets/Axoma/static\plugin\themify-icons\themify-icons.css" rel="stylesheet">
    <link href="assets/Axoma/static\plugin\owl-carousel\css\owl.carousel.min.css" rel="stylesheet">
    <link href="assets/Axoma/static\plugin\magnific\magnific-popup.css" rel="stylesheet">
    <link href="assets/Axoma/static\css\style.css" rel="stylesheet">
    <link href="assets/Axoma/static\css\color\default.css" rel="stylesheet" id="color_theme">
  </head>

  <body data-spy="scroll" data-target="#navbar" data-offset="98">
    <script type="text/javascript" src="assets/Axoma/md5.js"></script>
    <script type="text/javascript">
        function doLogin() {
      document.sendin.username.value = document.login.username.value;
      document.sendin.password.value = hexMD5('$(chap-id)' + document.login.password.value + '$(chap-challenge)');
      document.sendin.submit();
      return false;
        }
    //-->
    </script>


    <div id="loading">
      <div class="load-circle"><span class="one"></span></div>
    </div>
    <header>
      <nav class="navbar header-nav navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img class="light-logo" src="assets/Axoma/static\img\logo-light.svg" title="" alt="">
            <img class="dark-logo" src="assets/Axoma/static\img\logo.svg" title="" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
              <span></span>
              <span></span>
              <span></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbar">
            <ul class="navbar-nav ml-auto align-items-center">
              <li><a class="nav-link" href="#home">Home</a></li>
              <li><a class="nav-link" href="#service"></a></li>
              <li><a class="nav-link" href="#price"></a></li>
              <li><a class="nav-link" href="#contact"></a></li>
            </ul>
          </div>
        </div>
      </nav> 
    </header>
    <main>
      <section id="home" class="home-banner-03 theme-bg bg-effect-box">
        <div class="bg-effect bg-cover" style="background-image: url(assets/Axoma/static/img/banner-effect-6.svg);"></div>
        <div id="particles_effect" class="particles-effect"></div>
        <div class="container">
          <div class="row align-items-center justify-content-center p-100px-tb sm-p-60px-b">
            <div class="col-lg-5 md-p-30px-tb">
              <h5 class="white-color">RMY</h5>
              <h1 class="font-alt white-color">Login Page</h1>
              <p class="white-color-light">Login to Aplikasi Rapor Advent</p>
              <div class="subscribe-block">
                  <div class="card-block py-lg px-md">

                    <form id="loginForm" class="md-form form-light" role="form" action="index.php" method="post">
                        <input type="hidden" name="dst" value="$(link-orig)"/>
                        <input type="hidden" name="popup" value="true"/>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="inputUser" class="form-label">Username</label>
                            <div class="md-form-line-wrap">
                              <input id="username" type="text" name="username" placeholder="Username" class="form-control" autofocus required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="inputPassword" class="form-label">Password</label>
                            <div class="md-form-line-wrap">
                              <input id="password" type="password" name="password" placeholder="Password" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                          </div>
                        </div></br>
                        <div class="col-md-12">
                            <button type="submit" name="submit" class="btn btn-block btn-light"><span class="btn-elem-wrap"><span class="text" style="color: darkblue">LOGIN</span></span></button>
                        </div>
                      </div>
                    </form>
                  </div>
                <label>Developed by <strong>R</strong><small>icho</small> <strong>M</strong><small>aylano</small> <strong>Y</strong><small>ozienanda</small></label>
              </div>
            </div> 
            <div class="col-lg-7 text-center p-50px-l">
              <img src="assets/Axoma/static\img\home-banner-7.svg" title="" alt="">
            </div>
          </div> 
        </div>
      </section>

      
    </main>
    
    <script src="assets/Axoma/static\js\jquery-3.2.1.min.js"></script>
    <script src="assets/Axoma/static\js\jquery-migrate-3.0.0.min.js"></script>
    <script src="assets/Axoma/static\plugin\appear\jquery.appear.js"></script>
    <script src="assets/Axoma/static\plugin\bootstrap\js\popper.min.js"></script>
    <script src="assets/Axoma/static\plugin\bootstrap\js\bootstrap.js"></script>
    <script src="assets/Axoma/static\plugin\particles\particles.min.js"></script>
    <script src="assets/Axoma/static\plugin\particles\particles-app.js"></script>
    <script src="assets/Axoma/static\js\jquery.parallax-scroll.js"></script>
    <script src="assets/Axoma/static\js\custom.js"></script>

    <script type="text/javascript" src="assets/Axoma/md5.js"></script>
    <script type="text/javascript">
        $('#loginForm').submit(function () {
            var password = $('#inputPassword');
            password.val(hexMD5('$(chap-id)' + password.val() + '$(chap-challenge)'));
        });
    </script>
    <script>
      $("#menu-toggle").click(function (e) {
          e.preventDefault();
      $("#wrapper").toggleClass("toggled");
      });
    </script>
    <script type="text/javascript">
    <!--
      document.login.username.focus();
    //-->
    </script>

  </body>
</html>