<?php

include('config.php');
include('admin/tgl_indo.php');

 ?>

<?php


$sql = $conn->query("SELECT * FROM tb_identitas");
while ($data=$sql->fetch_assoc()){
   ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>e-Agenda <?php echo $data['nama']; ?></title>
      <?php } ?>
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="img/favicon.ico" rel="shortcut icon">
    <link href="assets/css/jquery.simpleTicker.css" rel="stylesheet">
    <script src="breaking-news-ticker.min.js"></script>
    <script type="text/javascript">

        var otomatis = setInterval(

        function ()

        {

        $('#div').load('isi.php').fadeIn("slow");

        }, 1000);

        </script>


  </head>
  <body>


    <?php
    $sql = $conn->query("SELECT * FROM tb_user");
    while ($data=$sql->fetch_assoc()){

     ?>
    <div class="jumbotron" style="background-color:#1abc9c;">
      <div class="container">
        <div class="row text-center">
          
            <img style="text-align:right;" src="img/logo.png" width="80" height="100">
          
            <h2 class="judul">e-Agenda</h2>
            <h2 class="opd"> <?php echo $data['opd']; ?></h2>
            <h4 class="almt"><?php echo $data['alamat']; ?></h4>
          
      </div>
    </div>
    </div>


    <!--Table Agenda-->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="h3 mb-1 text-gray-800 text-center">Daftar Agenda Kegiatan <?php echo $data['opd']; ?></h1>
      <br>
      <?php } ?>
      <div class="row">
        <form action="" method="GET">
        <div class="form-group col-sm-2">
        <select id="inputState" class="form-control" name="dispo">
            <option value="">-- Pilih Pegawai--</option>
            <option value="Camat">Camat</option>
            <option value="Sekcam">Sekcam</option>
            <option value="Kasi Tapem">Kasi Tapem</option>
            <option value="Kasi Permas">Kasi Permas</option>
            <option value="Kasi Kesra">Kasi Kesra</option>
            <option value="Kasi Trantib">Kasi Trantib</option>
            <option value="Kasubag Umpeg">Kasubag Umpeg</option>
            <option value="Kasubag Prog & Keu">Kasubag Prog & Keu</option>
            <option value="Nur Fatoni">Fatoni</option>
            <option value="Hartini">Hartini</option>
            <option value="Tri Murtopo">Tri Murtopo</option>
            <option value="Sukahar">Sukahar</option>
            <option value="Al Qomariyah">Al Qomariyah</option>
            <option value="Koirul Umam">Koirul Umam</option>
            <option value="Arissatur Rohman">Arissatur Rohman</option>
            <option value="Lisnawati">Lisnawati</option>
        </select>

        </div>
	<div class="form-group col-sm-2">
        <input type="text" name="tgl_awal" class="form-control" placeholder="Pilih Tanggal" onfocus="(this.type='date')">
        </div>
        <div class="form-group col-sm-2">
          <input type="submit" name="cari" value="Filter" class="btn btn-info">
          <a href="index.php" class="btn btn-warning">Reset</a>
        </div>
        
        <!-- <div class="form-group col-sm-2">
        <input type="date" name="tgl_akhir" class="form-control">
        </div> -->
    </div>
      </form>


      <!-- DataTales Example -->
      <div class="card">
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
                $tgl = date("Y-m-d");
                if(isset($_GET['cari'])){
                  $dispo = $_GET['dispo'];
                  // $tgl = date("Y-m-d");
                  $tgl_awal  = $_GET['tgl_awal'];
                  // $tgl_akhir = $_GET['tgl_akhir'];

                  if(!empty($dispo) ==0){
                    ?>
                     <script language="JavaScript">
                        alert('Dipilih dulu guys, jangan buru-buru..!!');
                        document.location='index.php';
                    </script>
                  <?php }?>
                   <?php
                $sql = $conn->query("SELECT * FROM tb_agenda WHERE dispo like '%$dispo%' and tgl like'%$tgl_awal%'");
              }else {
                $sql = $conn->query("SELECT * FROM tb_agenda order by tgl desc LIMIT 10");
              } if($sql->num_rows > 0){
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
                  <td class="align-middle"><?php echo $data['jam']; ?></td>
                  <td class="align-middle"><?php echo $data['acara']; ?></td>
                  <td class="align-middle"><?php echo $data['tempat']; ?></td>
                  <td class="align-middle"><?php echo $data['dispo']; ?></td>
                </tr>
              <?php }} else {?>
                 <tr>
                   <td colspan='6' style="color:red;">
                   <?php
                     echo "Maaf Bpk/Ibu. <b>$dispo</b> untuk tanggal : <b>";?><?php echo TanggalIndo($tgl_awal); ?><?php echo"</b> belum ada agenda..!";
                   }?>
                   </td>
                 </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>

        <div class="row">
          <div class="col-md-2 text-center news">
            Agenda hari ini :
          </div>

          <div class="col-md-10 text-left berita">
            <div id="slider">

            <?php

            $taggal_hari_ini = date("Y-m-d");
            $hasil = '';

            $sql = $conn->query("SELECT * FROM tb_agenda");


            $agenda_hari_ini = array();
            while ($data=$sql->fetch_assoc()){


              if($taggal_hari_ini == $data['tgl']) {
              $agenda_hari_ini[] = array(
                'jam'     => $data['jam'],
                'acara'   => $data['acara'],
                'tempat'  => $data['tempat'],
                'dispo'   => $data['dispo'],
              );
            $hasil = 'ada';
            }
          }
            ?>

            <?php if ('ada' == $hasil) { ?>
            <ul>
              <?php
                foreach ($agenda_hari_ini as $agenda) {

                  ?>
                  <li>
                    <?php echo ' Kegiatan' . ' ' .
                    $agenda['acara'] . ' ' . 'Jam' . ' ' .
                    $agenda['jam'] . ' ' . 'di' . ' ' .
                    $agenda['tempat'] . ' ' . 'Disposisi' . ' ' .
                    $agenda['dispo']; ?>
                  </li>
                <?php
              } ?>

            </ul>
          <?php } else { ?>
            <ul>
              <li>
                <?php echo " Belum ada agenda"; ?>
              </li>
            </ul>
          <?php } ?>
          </div>
        </div>
        </div>
      </div>

      <!-- <p class="text-center">e-Agenda Kecamatan Gajah <a href="#">V.1.2</a></p> -->

      <!-- Footer -->

      <!-- <?php

      $sql = $conn->query("SELECT * FROM tb_user");
      while ($data=$sql->fetch_assoc()){

         ?>
        <?php $tahun = date('Y'); ?>
        <div class="footer text-center">
          <span>Copyleft &copy; <?php echo $data['opd']; ?> <?php echo $tahun; ?> </span>
        </div>
        <?php } ?> -->



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/breaking-news-ticker.min.js"></script>
    <script src="assets/js/jquery.simpleTicker.js"></script>
    <script>
    $.simpleTicker($("#slider"),{
      speed : '500',
      delay : 5000,
      easing : 'swing',
      effectType : 'slide'
    });
    </script>



    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
