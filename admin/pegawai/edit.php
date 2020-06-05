<?php

$id = $_GET['id'];
$sql = $conn->query("SELECT * FROM tb_pegawai where id='$id'");
$result = $sql->fetch_assoc();

 ?>

<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h5 mb-2 text-gray-800">Edit Pegawai</h1>

  <!-- DataTales Example -->
  <div class="card shadow">
    <div class="card-body">
      <form method="POST" >
        <div class="form-group">

          <input class="form-control" name="nama_pegawai" value="<?php echo $result['nama_pegawai']; ?>">
        </div>
        <input type="submit" class="btn btn-primary" name="simpan" value="Update">
      </form>

    </div>

  </div>
</div>


<?php

$pegawai = $_POST['nama_pegawai'];

$simpan = $_POST['simpan'];

if ($simpan) {
  $sql = $conn->query("UPDATE  tb_pegawai set nama_pegawai='$pegawai' where id='$id'");
    if ($sql) {
      ?>
      <script type="text/javascript">
        alert("Pegawai berhasil diubah..!");
        window.location.href="?page=pegawai";
      </script>
      <?php
    }
}

 ?>
