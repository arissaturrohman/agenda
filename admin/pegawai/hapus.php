<?php

    $id = $_GET['id'];
    $sql = $conn->query("DELETE FROM tb_pegawai where id='$id'");

 ?>

 <script type="text/javascript">
     window.location.href="?page=pegawai";

 </script>
