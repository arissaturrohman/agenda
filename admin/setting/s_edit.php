<?php

session_start();
if(!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}

$id = $_GET['id'];
$sql = $conn->query("SELECT * FROM tb_user where id='$id'");
$result = $sql->fetch_assoc();

 ?>

<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h5 mb-2 text-gray-800">Edit Identitas</h1>

  <!-- DataTales Example -->
  <div class="card shadow">
    <div class="card-body">
      <form method="POST">
        <div class="form-group">
          <label >Username</label>
          <input class="form-control" name="user" value="<?php echo $result['user']; ?>" required>
        </div>
        <div class="form-group">
          <label >Password</label>
          <input type="password" class="form-control" name="pass" required>
        </div>
        <div class="form-group">
          <label >Nama</label>
          <input class="form-control" name="nama" value="<?php echo $result['nama']; ?>" required>
        </div>
        <div class="form-group">
          <label >OPD</label>
          <input class="form-control" name="opd" value="<?php echo $result['opd']; ?>" required>
        </div>
        <div class="form-group">
          <label >Alamat</label>
          <input class="form-control" name="alamat" value="<?php echo $result['alamat']; ?>" required>
        </div>
        <div class="form-group">
          <label >No. Telp</label>
          <input class="form-control" name="telp" value="<?php echo $result['telp']; ?>" required>
        </div>


        <input type="submit" class="btn btn-success" name="simpan" value="Update">
      </form>

    </div>

  </div>
</div>


<?php

$user = $_POST['user'];
$pass = $_POST['pass'];
$nama = $_POST['nama'];
$opd = $_POST['opd'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];

$simpan = $_POST['simpan'];

if ($simpan) {
  //enkripsi Password
  $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
  $sql = $conn->query("UPDATE  tb_user set user='$user', pass='$pass', nama='$nama', opd='$opd', alamat='$alamat' where id='$id'");
    if ($sql) {
      ?>
      <script type="text/javascript">
        alert("Agenda berhasil diubah..!");
        window.location.href="?page=setting";
      </script>
      <?php
    }
}


 ?>
