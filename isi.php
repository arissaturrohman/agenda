<?php

include('config.php');
include('admin/tgl_indo.php');


 ?>


<!--jumbotron-->
<div id="div">

<?php
$sql = $conn->query("SELECT * FROM tb_user");
while ($data=$sql->fetch_assoc()){

 ?>

<div class="jumbotron" style="background-color:#1abc9c;"> 
<div class="container"> 
    <div class="row text-center">
    <img src="img/logo.png" width="80" height="100">
    <h2 class="judul">e-Agenda</h2>
    <h2> <?php echo $data['opd']; ?></h2>
    <h4><?php echo $data['alamat']; ?></h4>
  </div>
</div>
</div>



<!--Table Agenda-->


<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-1 text-gray-800 text-center">Daftar Agenda Kegiatan <?php echo $data['opd']; ?></h1>
  <br>





  <?php } ?>
  <!-- DataTales Example -->
  <div class="card shadow">
    <div class="card-body">
      <div class="h4 table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead class="thead-dark">
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Hari / Tanggal</th>
              <th class="text-center">Jam</th>
              <th class="text-center">Acara</th>
              <th class="text-center">Tempat</th>
              <th class="text-center">Keterangan</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $no = 1;

            $sql = $conn->query("SELECT * FROM tb_agenda order by tgl desc LIMIT 10");
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
              <td class="align-middle"><?php echo $data['jam'];; ?></span></td>
              <td class="align-middle"><?php echo $data['acara']; ?></td>
              <td class="align-middle"><?php echo $data['tempat']; ?></td>
              <td class="align-middle"><?php echo $data['dispo']; ?></td>
            </tr>

          <?php
             } ?>

          </tbody>
        </table>
      </div>
    </div>
</div>
</div>
</div>
