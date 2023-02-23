<?php
include "function.php";
$key = $_POST["key"];
$tableDb = $_POST["tableDb"];
if (deleteSurat($key, $tableDb) > 0) {
  session_start();
  $_SESSION["sukses"] = 'Data Berhasil Dihapus';
  // echo 1;
  switch ($tableDb) {
    case 'tb_sk_desa':
      $data = ["result" => 1, "page" => "skDesa"];
      print_r(json_encode($data));
      break;
    case 'tb_sktm_sekolah':
      $data = ["result" => 1, "page" => "sktmSekolah"];
      print_r(json_encode($data));
      break;
    case 'tb_sk_usaha':
      $data = ["result" => 1, "page" => "skUsaha"];
      print_r(json_encode($data));
      break;
    case 'tb_sk_kematian':
      $data = ["result" => 1, "page" => "skKematian"];
      print_r(json_encode($data));
      break;
    case 'tb_sk_keramaian':
      $data = ["result" => 1, "page" => "skKeramaian"];
      print_r(json_encode($data));
      break;
    default:
      // $data = ["result" => 1, "page" => "skKeramaian"];
      // print_r(json_encode($data));
      // break;
  }
} else {
  echo 0;
}
