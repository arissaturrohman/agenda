<?php

session_start();
if(!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}

$id = $_GET['id'];
$sql = $conn->query("SELECT * FROM tb_agenda where id='$id'");
$result = $sql->fetch_assoc();
// $dispo = $result['dispo'];
$ceklist = explode(', ', $result['dispo']);
 ?>

<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h5 mb-2 text-gray-800">Edit Agenda</h1>

  <!-- DataTales Example -->
  <div class="card shadow">
    <div class="card-body">
      <form method="POST" >
        <div class="form-group">
          <label >Tanggal</label>
          <input type="date" class="form-control" name="tgl" value="<?php echo $result['tgl']; ?>">
        </div>
        <div class="form-group">
          <label >Jam</label>
          <input class="form-control" name="jam" value="<?php echo $result['jam']; ?>" placeholder="Tulis Jam">
        </div>
        <div class="form-group">
          <label >Acara</label>
          <input class="form-control" name="acara" value="<?php echo $result['acara']; ?>" placeholder="Masukkan Acara / Kegiatan">
        </div>
        <div class="form-group">
          <label>Tempat</label>
          <input class="form-control" name="tempat" value="<?php echo $result['tempat']; ?>" placeholder="Tempat">
        </div>
          <label>Disposisi :</label>
        <div class="row">

          <div class="col-6">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="dispo[]" value="Camat" <?php in_array ('Camat', $ceklist) ? print "checked" : ""; ?> > Camat<br>
              <input type="checkbox" class="form-check-input" name="dispo[]" value="Sekcam" <?php in_array ('Sekcam', $ceklist) ? print "checked" : ""; ?> > Sekcam<br>
              <input type="checkbox" class="form-check-input" name="dispo[]" value="Kasi Permas" <?php in_array ('Kasi Permas', $ceklist) ? print "checked" : ""; ?> > Kasi Permas<br>
              <input type="checkbox" class="form-check-input" name="dispo[]" value="Kasi Tapem" <?php in_array ('Kasi Tapem', $ceklist) ? print "checked" : ""; ?> > Kasi Tapem<br>
              <input type="checkbox" class="form-check-input" name="dispo[]" value="Kasi Kesra" <?php in_array ('Kasi Kesra', $ceklist) ? print "checked" : ""; ?> > Kasi Kesra<br>
              <input type="checkbox" class="form-check-input" name="dispo[]" value="Kasi Trantib" <?php in_array ('Kasi Trantib', $ceklist) ? print "checked" : ""; ?> > Kasi Trantib<br>
              <input type="checkbox" class="form-check-input" name="dispo[]" value="Kasubag Prog & Keu" <?php in_array ('Kasubag Prog & Keu', $ceklist) ? print "checked" : ""; ?> > Kasubag Prog & Keu<br>
              <input type="checkbox" class="form-check-input" name="dispo[]" value="Kasubag Umpeg" <?php in_array ('Kasubag Umpeg', $ceklist) ? print "checked" : ""; ?> > Kasubag Umpeg<br>
              <input type="checkbox" class="form-check-input" name="dispo[]" value="Hartini" <?php in_array ('Hartini', $ceklist) ? print "checked" : ""; ?> > Hartini<br>
            </div>
          </div>
          <div class="col-6">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="dispo[]" value="Nur Fatoni" <?php in_array ('Nur Fatoni', $ceklist) ? print "checked" : ""; ?> > Nur Fatoni<br>
              <input type="checkbox" class="form-check-input" name="dispo[]" value="Tri Murtopo" <?php in_array ('Tri Murtopo', $ceklist) ? print "checked" : ""; ?> > Tri Murtopo<br>
              <input type="checkbox" class="form-check-input" name="dispo[]" value="Sukahar" <?php in_array ('Sukahar', $ceklist) ? print "checked" : ""; ?> > Sukahar<br>
              <input type="checkbox" class="form-check-input" name="dispo[]" value="M. Ahsanu Amala" <?php in_array ('M. Ahsanu Amala', $ceklist) ? print "checked" : ""; ?> > M. Ahsanu Amala<br>
              <input type="checkbox" class="form-check-input" name="dispo[]" value="Arissatur Rohman" <?php in_array ('Arissatur Rohman', $ceklist) ? print "checked" : ""; ?> > Arissatur Rohman<br>
              <input type="checkbox" class="form-check-input" name="dispo[]" value="Koirul Umam" <?php in_array ('Koirul Umam', $ceklist) ? print "checked" : ""; ?> > Koirul Umam<br>
              <input type="checkbox" class="form-check-input" name="dispo[]" value="Adi Setiyo Baskoro" <?php in_array ('Adi Setiyo Baskoro', $ceklist) ? print "checked" : ""; ?> > Adi Setiyo Baskoro<br>
              <input type="checkbox" class="form-check-input" name="dispo[]" value="Lisnawati" <?php in_array ('Lisnawati', $ceklist) ? print "checked" : ""; ?> > Lisnawati<br>
              <input type="checkbox" class="form-check-input" name="dispo[]" value="Al Qomariyah" <?php in_array ('Al Qomariyah', $ceklist) ? print "checked" : ""; ?> > Al Qomariyah<br>
            </div>
          </div>
        </div>
        <br>
        <input type="submit" class="btn btn-success" name="simpan" value="Update">
        <a href="?page=agenda" class="btn btn-secondary">Batal</a>
      </form>

    </div>

  </div>
</div>


<?php

$tgl = $_POST['tgl'];
$jam = $_POST['jam'];
$acara = $_POST['acara'];
$tempat = $_POST['tempat'];
$dispo = implode(', ', $_POST['dispo']);

$simpan = $_POST['simpan'];

if ($simpan) {
  $sql = $conn->query("UPDATE tb_agenda set tgl='$tgl', jam='$jam', acara='$acara', tempat='$tempat', dispo='$dispo' where id='$id'");
    if ($sql) {
      ?>
      <script type="text/javascript">
        alert("Agenda berhasil diubah..!");
        window.location.href="?page=agenda";
      </script>
      <?php
    }
}

 ?>
