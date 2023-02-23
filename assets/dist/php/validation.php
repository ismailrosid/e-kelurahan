<?php
require "connection.php";
require "function.php";
global $conn;
$type = intval($_POST['type']);

if ($type == 1) {
  $tableDb = $_POST['tableDb'];
  $field = $_POST['field1'];
  $value = $_POST['value1'];
  $query = "SELECT * FROM $tableDb WHERE $field = '$value'";
  $surat = mysqli_fetch_assoc(mysqli_query($conn, $query));
  if (empty($surat)) {
    echo 0;
  } else {
    echo 1;
  }
} else if ($type == 2) {
  $tableDb = $_POST['tableDb'];
  $value1 = $_POST['value1'];
  $field1 = $_POST['field1'];
  $value2 = $_POST['value2'];
  $field2 = $_POST['field2'];
  $query = "SELECT * FROM $tableDb WHERE $field1 = '$value1' AND $field2 = '$value2'";
  $surat = mysqli_fetch_assoc(mysqli_query($conn, $query));
  if (empty($surat)) {
    echo 0;
  } else {
    echo 1;
  }
} else {
  $value = $_POST['value'];
  $arrJenisSkDesa = explode(",", $_POST['jenisSkDesa']);
  $jenisSkDesa = strtolower($arrJenisSkDesa[0] . ' ' . cekJabatan($arrJenisSkDesa[1]));
  $query = "SELECT * FROM tb_sk_desa WHERE no_nik = '$value' AND jenis_sk_desa = '$jenisSkDesa'";
  $surat = mysqli_fetch_assoc(mysqli_query($conn, $query));
  if (empty($surat)) {
    echo 0;
  } else {
    echo 1;
  }
}
