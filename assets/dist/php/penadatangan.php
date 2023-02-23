<?php
require "connection.php";
require "function.php";
global $conn;
$id = $_POST['id'];
$query = "SELECT * FROM tb_pejabat WHERE id_pejabat = '$id'";
$result = mysqli_query($conn, $query);
$pejabat = mysqli_fetch_assoc($result);
$jabatan = cekJabatan($pejabat['jabatan']);
echo $jabatan;
