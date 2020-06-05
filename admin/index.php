<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}

include('../admin/config.php');
include('tgl_indo.php');
error_reporting(E_ALL ^(E_NOTICE | E_WARNING));

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Halaman Administrator</title>

  <!-- Custom fonts for this template-->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Favicon-->
  <link href="../img/favicon.ico" rel="shortcut icon">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-fw fa-calendar-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">e-Agenda</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        AGENDA
      </div>

      <li class="nav-item">
        <a class="nav-link" href="?page=agenda">
          <i class="fas fa-fw fa-calendar-alt"></i>
          <span>Data Agenda</span></a>
      </li>

      <!-- Divider -->
      <!-- <hr class="sidebar-divider">

      <div class="sidebar-heading">
        NEWS
      </div>

      <li class="nav-item">
        <a class="nav-link" href="?page=pegawai">
          <i class="fas fa-fw fa-users"></i>
          <span>Pegawai</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        SETTING
      </div>

      <li class="nav-item">
        <a class="nav-link" href="?page=setting">
          <i class="fas fa-fw fa-cog"></i>
          <span>Setting</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <?php
              $sql = $conn->query("SELECT * FROM tb_user");
              while ($data=$sql->fetch_assoc()){

              ?>
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $data['nama']; ?></span>
                <img class="img-profile rounded-circle" src="../img/logo.png">
              </a>
              <?php } ?>

              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="?page=setting">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <?php
            $page = $_GET['page'];
            $aksi = $_GET['aksi'];

            if ($page == "agenda") {
              if ($aksi == "") {
                include "../admin/agenda/agenda.php";
              }elseif ($aksi== "tambah") {
                include "../admin/agenda/tambah.php";
              }
              elseif ($aksi== "edit") {
                include "../admin/agenda/edit.php";
              }
              elseif ($aksi== "hapus") {
                include "../admin/agenda/hapus.php";
              }
            }
            elseif ($page == "pegawai") {
              if ($aksi == "") {
                include "../admin/pegawai/pegawai.php";
              }
              elseif ($aksi== "tambah") {
                include "../admin/pegawai/tambah.php";
              }
              elseif ($aksi== "edit") {
                include "../admin/pegawai/edit.php";
              }
              elseif ($aksi== "hapus") {
                include "../admin/pegawai/hapus.php";
              }
            }
            elseif ($page == "setting") {
              if ($aksi == "") {
                include "../admin/setting/setting.php";
              }
              elseif ($aksi== "edit") {
                include "../admin/setting/s_edit.php";
              }
            }
            elseif ($page == "instansi") {
              if ($aksi == "") {
                include "../admin/setting/profil.php";
              }
            }
              elseif ($page == "") {
                include "../admin/dashboard.php";
            }
            ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->

      <?php

      $sql = $conn->query("SELECT * FROM tb_user");
      while ($data=$sql->fetch_assoc()){


       ?>
       <?php $tahun = date('Y'); ?>
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyleft &copy; <?php echo $data['opd']; ?> <?php echo $tahun; ?></span>
          </div>
        </div>
      </footer>
    <?php } ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
      <!-- End of Main Content -->

      

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik "Logout" jika yakin dari sesi.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Profile Modal-->
  <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Profil OPD</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">




          <?php
          $sql = $conn->query("SELECT * FROM tb_user");
          while ($data=$sql->fetch_assoc()){

           ?>
           <div class="container">

           <div class="row">
             <div class="col-md-6 offset-md-3 text-center">
                <span><img src="../img/logo.png" width="80" height="100"></span><br>
                <span class="text-center"><strong><?php echo $data['opd']; ?></strong></span><br>
                <span class="text-center"> <small> <?php echo $data['alamat']; ?> </small> </span><br>
                <span class="text-center"> <small> <?php echo $data['telp']; ?> </small> </span><br>
              </div>
            </div>
            <div class="row">

            </div>
          </div>
          <?php } ?>



        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="button" data-dismiss="modal">OK</button>
          <!-- <a class="btn btn-primary" href="logout.php">Logout</a> -->
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
  $(document).ready( function () {
  $('#myTable').dataTable();
} );
  </script>

  

  <!-- Page level custom scripts -->
  <script src="../assets/js/demo/datatables-demo.js"></script>

</body>

</html>
