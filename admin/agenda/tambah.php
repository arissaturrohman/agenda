<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h5 mb-2 text-gray-800">Tambah Agenda</h1>

  <!-- DataTales Example -->
  <div class="card shadow">
    <div class="card-body">
      <form method="POST">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label>Nomor Surat</label>
            <input type="text" class="form-control" name="no_surat" placeholder="Nomor Surat">
          </div>
          <div class="form-group col-md-4">
            <label>Tanggal Surat</label>
            <input type="date" class="form-control" name="tanggal_surat">
          </div>
          <div class="form-group col-md-4">
            <label>Asal Surat</label>
            <input type="text" class="form-control" name="asal_surat" placeholder="Asal Surat">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label>Tanggal Kegiatan</label>
            <input type="date" class="form-control" name="tgl">
          </div>
          <div class="form-group col-md-4">
            <label>Jam</label>
            <input class="form-control" name="jam" placeholder="Tulis Jam">
          </div>
          <div class="form-group col-md-4">
            <label>Tempat</label>
            <input class="form-control" name="tempat" placeholder="Tempat Kegiatan">
          </div>
        </div>
        <div class="form-group">
          <label>Acara</label>
          <textarea name="acara" class="form-control" rows="5" placeholder="Masukkan Acara / Kegiatan" required></textarea>
        </div>
        <label>Disposisi :</label>
        <hr class="mt-2">
        <div class="row">
          <div class="col-6">
            <div class="form-check">
              <?php
              $pegawai = $conn->query("SELECT * FROM tb_pegawai");
              if (mysqli_num_rows($pegawai) > 0) {
                $count = 2;
                while ($dataPeg = $pegawai->fetch_assoc()) {
                  $nama_pegawai = $dataPeg['nama_pegawai'];
                  $count = $count + 1;
                  if (($count % 2) == 1) {
              ?>
                    <label><input type="checkbox" name="dispo[]" class="form-check-input" value="<?= $nama_pegawai; ?>"> <?= $nama_pegawai; ?></label> <br>
              <?php
                  }
                }
              }
              ?>
            </div>
          </div>
          <div class="col-6">
            <div class="form-check">
              <?php
              $pegawai = $conn->query("SELECT * FROM tb_pegawai");
              if (mysqli_num_rows($pegawai) > 0) {
                $count = 2;
                while ($dataPeg = $pegawai->fetch_assoc()) {
                  $nama_pegawai = $dataPeg['nama_pegawai'];
                  $count = $count + 1;
                  if (($count % 2) == 0) {
              ?>
                    <label><input type="checkbox" name="dispo[]" class="form-check-input" value="<?= $nama_pegawai; ?>"> <?= $nama_pegawai; ?></label> <br>
              <?php
                  }
                }
              }
              ?>
            </div>
          </div>
        </div>
        <br>
        <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
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
$dispo = implode($_POST['dispo'], ', ');
$no_surat = $_POST['no_surat'];
$tahun = date("Y");

$simpan = $_POST['simpan'];

if ($simpan) {
  $sql = $conn->query("INSERT into tb_agenda (tgl, jam, acara, tempat, dispo, no_surat, asal_surat, tanggal_surat, tahun)
                      values('$tgl',
                              '$jam',
                              '$acara',
                              '$tempat',
                              '$dispo',
			      '$no_surat',
			      '$asal_surat',
			      '$tanggal_surat',
			      '$tahun'
                            )");
  if ($sql) {
?>
    <script type="text/javascript">
      alert("Agenda berhasil ditambahkan..!");
      window.location.href = "?page=agenda";
    </script>
<?php
  }
}

?>