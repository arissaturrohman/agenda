<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}

 ?>

<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Identitas</h1>

  <!-- DataTales Example -->
  <div class="card shadow">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Username</th>
              <!-- <th class="text-center">Password</th> -->
              <th class="text-center">Nama</th>
              <th class="text-center">OPD</th>
              <th class="text-center">Alamat</th>
              <th class="text-center">No. Telp</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $no = 1;

            $sql = $conn->query("SELECT * FROM tb_user");
            while ($data=$sql->fetch_assoc()){


             ?>
            <tr>
              <td class="text-center align-middle"><?php echo $no++; ?></td>
              <td class="align-middle"><?php echo ($data['user']); ?></td>
              <!-- <td class="align-middle"><?php echo ($data['pass']); ?></td> -->
              <td class="align-middle"><?php echo ($data['nama']); ?></td>
              <td class="align-middle"><?php echo ($data['opd']); ?></td>
              <td class="align-middle"><?php echo $data['alamat'];; ?></td>
              <td class="align-middle"><?php echo ($data['telp']); ?></td>
              <td class="text-center">
                <a href="?page=setting&aksi=edit&id=<?php echo $data['id']; ?>" class="btn btn-success">Edit</a>

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
