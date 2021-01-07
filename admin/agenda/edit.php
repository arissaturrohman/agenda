<?php

session_start();
if (!isset($_SESSION["login"])) {
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
      <form method="POST">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label>Nomor Surat</label>
            <input type="text" class="form-control" name="no_surat" value="<?php echo $result['no_surat']; ?>" placeholder="Nomor Surat">
          </div>
          <div class="form-group col-md-4">
            <label>Tanggal Surat</label>
            <input type="date" class="form-control" name="tanggal_surat" value="<?php echo $result['tanggal_surat']; ?>">
          </div>
          <div class="form-group col-md-4">
            <label>Asal Surat</label>
            <input type="text" class="form-control" name="asal_surat" value="<?php echo $result['asal_surat']; ?>" placeholder="Asal Surat">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label>Tanggal Kegiatan</label>
            <input type="date" class="form-control" name="tgl" value="<?php echo $result['tgl']; ?>">
          </div>
          <div class="form-group col-md-4">
            <label>Jam</label>
            <input class="form-control" name="jam" value="<?php echo $result['jam']; ?>" placeholder="Tulis Jam">
          </div>
          <div class="form-group col-md-4">
            <label>Tempat</label>
            <input class="form-control" name="tempat" value="<?php echo $result['tempat']; ?>" placeholder="Tempat">
          </div>
        </div>
        <div class="form-group">
          <label>Acara</label>
          <textarea name="acara" class="form-control" rows="5" placeholder="Masukkan Acara / Kegiatan" required><?php echo $result['acara']; ?></textarea>
        </div>
        <label>Disposisi :</label>
        <div class="row">
          <div class="col-6">
            <div class="form-check">
              <?php
              $sqlPeg = $conn->query("SELECT * FROM tb_pegawai");
              if (mysqli_num_rows($sqlPeg) > 0) {
                $count = 2;
                while ($dataPeg = $sqlPeg->fetch_assoc()) {
                  $nmPeg = $dataPeg['nama_pegawai'];
                  $count = $count + 1;
                  if (($count % 2) == 1) {
                    $nama = array(
                      'nama' => $dataPeg['nama_pegawai']
                    );
                    foreach ($nama as $value) {
                      if (in_array($value, $ceklist)) {
                        $cek = "checked";
                      } else {
                        $cek = "";
                      }
              ?>

                      <label><input type="checkbox" <?= $cek; ?> class="form-check-input" name="dispo[]" value="<?= $nmPeg; ?>" /> <?= $nmPeg; ?></label><br>
              <?php
                    }
                  }
                }
              }
              ?>

            </div>
          </div>
          <div class="col-6">
            <div class="form-check">

              <?php
              $sqlPeg = $conn->query("SELECT * FROM tb_pegawai");
              if (mysqli_num_rows($sqlPeg) > 0) {
                $count = 2;
                while ($dataPeg = $sqlPeg->fetch_assoc()) {
                  $nmPeg = $dataPeg['nama_pegawai'];
                  $count = $count + 1;
                  if (($count % 2) == 0) {
                    $nama = array(
                      'nama' => $dataPeg['nama_pegawai']
                    );
                    foreach ($nama as $value) {
                      if (in_array($value, $ceklist)) {
                        $cek = "checked";
                      } else {
                        $cek = "";
                      }
              ?>

                      <label><input type="checkbox" <?= $cek; ?> class="form-check-input" name="dispo[]" value="<?= $nmPeg; ?>" /> <?= $nmPeg; ?></label><br>
              <?php
                    }
                  }
                }
              }
              ?>

            </div>
          </div>
        </div>
        <br>
        <input type="submit" class="btn btn-sm btn-success" name="simpan" value="Update">
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
$tanggal_surat = $_POST['tanggal_surat'];
$asal_surat = $_POST['asal_surat'];
$dispo = implode(', ', $_POST['dispo']);
$no_surat = $_POST['no_surat'];
$tahun = date('Y');

$simpan = $_POST['simpan'];

if ($simpan) {
  $sql = $conn->query("UPDATE tb_agenda set tgl='$tgl', jam='$jam', acara='$acara', tempat='$tempat', dispo='$dispo', no_surat='$no_surat', asal_surat='$asal_surat', tanggal_surat='$tanggal_surat', tahun='$tahun' where id='$id'");
  if ($sql) {
?>
    <script type="text/javascript">
      alert("Agenda berhasil diubah..!");
      window.location.href = "?page=agenda";
    </script>
<?php
  }
}

?>