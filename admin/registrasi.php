<?php
include('config.php');


if (isset($_POST["register"])) {

    $name = $_POST['nama'];
    $user = $_POST['user'];

    //enkripsi Password
    $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);

    $sql = $conn->query("INSERT INTO tb_user (user, pass, nama) values('$user', '$pass', '$name')");

    if ($sql) {
      ?>
      <script type="text/javascript">
        alert("User berhasil ditambahkan..!");
        window.location.href="login.php";
      </script>
      <?php
    }
  }

 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Registration Page</title>

  <!-- Custom fonts for this template-->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="mt-5 col-md-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <img src="../img/logo.png" width="80" height="100">
                    <br><br>
                    <h1 class="h4 text-gray-900 mb-4">Registration e-Agenda</h1>
                  </div>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="user" placeholder="Masukkan Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="pass" placeholder="Masukkan Password">
                    </div>
                    <input value="Register" type="submit" name="register" class="btn btn-primary btn-user btn-block">
                    <a href="login.php" class="btn btn-info btn-user btn-block">Login</a>
                    </div>

              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Footer -->
  <?php

  $sql = $conn->query("SELECT * FROM tb_identitas");
  while ($data=$sql->fetch_assoc()){

     ?>
    <?php $tahun = date('Y'); ?>
    <div class="footer text-center">
      <span>Copyleft &copy; <?php echo $data['nama']; ?> <?php echo $tahun; ?> </span>
    </div>
    <?php } ?>
  <!-- End of Footer -->

  <!-- Bootstrap core JavaScript-->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html>
