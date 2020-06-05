<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h5 mb-2 text-gray-800">Tambah Pegawai</h1>

  <!-- DataTales Example -->
  <div class="card shadow">
    <div class="card-body">
      <form method="POST" >
        <div class="form-group">

          <input class="form-control" name="nama_pegawai" placeholder="Nama Pegawai" autofocus>
        </div>
        <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
        <a href="?page=pegawai" class="btn btn-secondary">Batal</a>
      </form>

    </div>

  </div>
</div>

<?php

$pegawai = $_POST['nama_pegawai'];

$simpan = $_POST['simpan'];

if ($simpan) {
  $sql = $conn->query("INSERT into tb_pegawai (nama_pegawai)
                      values('$pegawai')");
    if ($sql) {
      ?>
      <script type="text/javascript">
        alert("Pegawai berhasil ditambahkan..!");
        window.location.href="?page=pegawai";
      </script>
      <?php
    }
}

 ?>
