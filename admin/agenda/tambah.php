<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h5 mb-2 text-gray-800">Tambah Agenda</h1>

  <!-- DataTales Example -->
  <div class="card shadow">
    <div class="card-body">
      <form method="POST" >
        <div class="form-group">
          <label >Tanggal</label>
          <input type="date" class="form-control" name="tgl">
        </div>
        <div class="form-group">
          <label >Jam</label>
          <input class="form-control" name="jam" placeholder="Tulis Jam">
        </div>
        <div class="form-group">
          <label >Acara</label>
          <input class="form-control" name="acara" placeholder="Masukkan Acara / Kegiatan">
        </div>
        <div class="form-group">
          <label>Tempat</label>
          <input class="form-control" name="tempat" placeholder="Tempat">
        </div>
        <label>Disposisi :</label><hr class="mt-2">
        <div class="row">
          <div class="col-6">
            <div class="form-check">
              <input type="checkbox" name="dispo[]" class="form-check-input" value="Camat">Camat <br>
              <input type="checkbox" name="dispo[]" class="form-check-input" value="Sekcam">Sekcam <br>
              <input type="checkbox" name="dispo[]" class="form-check-input" value="Kasi Permas">Kasi Permas <br>
              <input type="checkbox" name="dispo[]" class="form-check-input" value="Kasi Tapem">Kasi Tapem <br>
              <input type="checkbox" name="dispo[]" class="form-check-input" value="Kasi Kesra">Kasi Kesra <br>
              <input type="checkbox" name="dispo[]" class="form-check-input" value="Kasi Trantib">Kasi Trantib <br>
              <input type="checkbox" name="dispo[]" class="form-check-input" value="Kasubag Prog & Keu">Kasubag Prog & Keu <br>
              <input type="checkbox" name="dispo[]" class="form-check-input" value="Kasubag Umpeg">Kasubag Umpeg <br>
              <input type="checkbox" name="dispo[]" class="form-check-input" value="Hartini">Hartini <br>
            </div>
          </div>
          <div class="col-6">
            <input type="checkbox" name="dispo[]" class="form-check-input" value="Nur Fatoni">Nur Fatoni <br>
            <input type="checkbox" name="dispo[]" class="form-check-input" value="Tri Murtopo">Tri Murtopo <br>
            <input type="checkbox" name="dispo[]" class="form-check-input" value="Sukahar">Sukahar <br>
            <input type="checkbox" name="dispo[]" class="form-check-input" value="M. Ahsanu Amala">M. Ahsanu Amala <br>
            <input type="checkbox" name="dispo[]" class="form-check-input" value="Arissatur Rohman">Arissatur Rohman <br>
            <input type="checkbox" name="dispo[]" class="form-check-input" value="Koirul Umam">Koirul Umam <br>
            <input type="checkbox" name="dispo[]" class="form-check-input" value="Adi Setiyo Baskoro">Adi Setiyo Baskoro <br>
            <input type="checkbox" name="dispo[]" class="form-check-input" value="Lisnawati">Lisnawati <br>
            <input type="checkbox" name="dispo[]" class="form-check-input" value="Al Qomariyah">Al Qomariyah <br>
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
$dispo = implode($_POST['dispo'], ', ');

$simpan = $_POST['simpan'];

if ($simpan) {
  $sql = $conn->query("INSERT into tb_agenda (tgl, jam, acara, tempat, dispo)
                      values('$tgl',
                              '$jam',
                              '$acara',
                              '$tempat',
                              '$dispo'
                            )");
    if ($sql) {
      ?>
      <script type="text/javascript">
        alert("Agenda berhasil ditambahkan..!");
        window.location.href="?page=agenda";
      </script>
      <?php
    }
}

 ?>
