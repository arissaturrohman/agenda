<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}

 ?>

<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Agenda</h1>

  <!-- DataTales Example -->
  <div class="card shadow">
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <a href="?page=agenda&aksi=tambah" class="btn btn-primary">Tambah Agenda</a>
        </div>
        <div class="col-md-6 text-right">
          <a href="export.php" class="btn btn-info" target="_blank">Export to Excel</a>
        </div>
      </div><br>
      <div class="table-responsive">
        <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Hari / Tanggal</th>
              <th class="text-center">Jam</th>
              <th class="text-center">Acara</th>
              <th class="text-center">Tempat</th>
              <th class="text-center">Disposisi</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>


            <?php
            $no = 1;

            $sql = $conn->query("SELECT * FROM tb_agenda order by tgl desc");
            while ($data=$sql->fetch_assoc()){

              $date   = $data['tgl'];
              $dhari = array(
               'Sunday' => 'Minggu',
               'Monday' => 'Senin',
               'Tuesday' => 'Selasa',
               'Wednesday' => 'Rabu',
               'Thursday' => 'Kamis',
               'Friday' => 'Jumat',
               'Saturday' => 'Sabtu'
              );
              $hari   = date('l', strtotime($date));


             ?>
            <tr>
              <td class="text-center align-middle"><?php echo $no++; ?></td>
              <td class="align-middle"><?php echo $dhari[$hari].','.' '. TanggalIndo($data['tgl']); ?></td>
              <td class="align-middle"><?php echo $data['jam'];; ?></td>
              <td class="align-middle"><?php echo $data['acara']; ?></td>
              <td class="align-middle"><?php echo $data['tempat']; ?></td>
              <td class="align-middle"><?php echo $data['dispo']; ?></td>
              <td class="text-center">

                <a href="?page=agenda&aksi=edit&id=<?php echo $data['id']; ?>" class="btn btn-success">Edit</a>
                <a onclick="return confirm('Anda Yakin akan menghapus data ini...?')" href="?page=agenda&aksi=hapus&id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
              </td>
            </tr>

          <?php
             } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br>
  
</div>
