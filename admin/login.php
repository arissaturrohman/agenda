<?php
session_start();

if(isset($_SESSION["login"])){
  header("Location: index.php");
}
include('../admin/config.php');

if(isset($_POST["login"])){
  $user = $_POST['user'];
  $pass = $_POST['pass'];
    $sql = $conn->query("SELECT * FROM tb_user where user='$user'");

      //cek username
      if(mysqli_num_rows($sql) === 1 ) {

        //cek password
        $row = mysqli_fetch_assoc($sql);
	       if(password_verify($pass, $row["pass"])){

           //cek session
           $_SESSION["login"] = true;

			header('location:index.php');
      exit;
		  }
		}

    $error = true;
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

  <title>Login e-Agenda</title>

  <!-- Custom fonts for this template-->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../assets/css/style1.css" rel="stylesheet">

  <!-- Favicon-->
  <link href="../img/favicon.ico" rel="shortcut icon">

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
                    <h1 class="h4 text-gray-900 mb-4">Login e-Agenda</h1>
                  </div>

                  <?php if(isset($error)): ?>
                  <p style="color:red; font-style:italic; text-align:center;">Username / Password salah</p>
                  <?php endif; ?>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="user" placeholder="Masukkan Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="pass" placeholder="Masukkan Password">
                    </div>
                    <input value="Login" type="submit" name="login" class="btn btn-primary btn-user btn-block">
                    <!-- <a href="registrasi.php" class="btn btn-info btn-user btn-block">Registrasi</a> -->
                    </div>
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

  $sql = $conn->query("SELECT * FROM tb_user");
  while ($data=$sql->fetch_assoc()){

     ?>
    <?php $tahun = date('Y'); ?>
    <div class="footer text-center">
      <span>Copyleft &copy; <?php echo $data['opd']; ?> <?php echo $tahun; ?> </span>
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
