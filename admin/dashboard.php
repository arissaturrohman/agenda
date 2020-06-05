<?php
include('../admin/config.php');
 ?>




<div class="container">
  <div class="row">
   <div class="col-md-6 offset-md-3">
     <div class="card">
       <div class="card-body">

         <?php
         $sql = $conn->query("SELECT * FROM tb_user");
         while ($data=$sql->fetch_assoc()){

          ?>

         <div class="card-title">
           <p>Selamat datang : <strong> <?php echo ($data['nama']); ?> </strong> </p><hr>
           <p> <strong style="color:#1abc9c;">e-Agenda</strong> merupakan media yang disediakan Kecamatan Gajah untuk memberikan kemudahan kepada masyarakat untuk mendapatkan informasi mengenai jadwal kegiatan Camat setiap harinya .
            <br>
            <br><br><br>



           by : Kroco_gajah</p>
         </div>
       </div>
       <?php } ?>
     </div>
   </div>
 </div>
</div>
