<?php
include('config.php');
$sql = "CREATE TABLE tb_pegawai (
id INT(11) AUTO_INCREMENT PRIMARY KEY,
nama_pegawai VARCHAR(100) NOT NULL)";

if ($conn->query($sql) === TRUE) {
    echo "Table Pegawai created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
