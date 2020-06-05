<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Pegawai</h1>

  <!-- DataTales Example -->
  <div class="card shadow">
    <div class="card-body">
      <a href="?page=pegawai&aksi=tambah" class="btn btn-primary">Tambah Pegawai</a><br><br>
      <div class="table-responsive">
        <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center" style="width:20px;">No</th>
              <th class="text-center">Nama Pegawai</th>
              <th class="text-center" style="width:100px;">Aksi</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $no = 1;

            $sql = $conn->query("SELECT * FROM tb_pegawai");
            while ($data=$sql->fetch_assoc()){


             ?>
            <tr>
              <td class="text-center align-middle"><?php echo $no++; ?></td>
              <td class="align-middle"><?php echo $data['nama_pegawai']; ?></td>
              <td class="text-center">
                <a href="?page=pegawai&aksi=edit&id=<?php echo $data['id']; ?>" class="btn btn-success"><i class="fas fa-fw fa-user-edit"></i></a>
                <a onclick="return confirm('Anda Yakin akan menghapus data ini...?')" href="?page=pegawai&aksi=hapus&id=<?php echo $data['id']; ?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a>
              </td>
            </tr>

          <?php
             } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
