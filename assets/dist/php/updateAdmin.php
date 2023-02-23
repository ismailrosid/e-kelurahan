<?php
require "connection.php";
require "function.php";
global $conn;
$aksi = $_POST['aksi'];
$idAdmin = $_POST['idadmin'];
// 
if ($aksi == "update-profile") {
  $nama = htmlspecialchars($_POST['nama']);
  $username = htmlspecialchars(strtolower(stripslashes($_POST['username'])));
  if ($nama != "" && $username != "") {
    if (strlen($username) >= 5) {
      $query = "UPDATE tb_admin SET nama = '$nama', username = '$username' WHERE tb_admin.id = '$idAdmin'";
      mysqli_query($conn, $query);
      $result = mysqli_affected_rows($conn);
      if ($result == 1) {
        $data = ["sukses" => 1, "pesan" => "Anda Telah Berhasil Merubah Profile, Login kembali ?"];
        print_r(json_encode($data));
      } else {
        $data = ["sukses" => 0, "pesan" => "Anda Tidak Melakukan Perubahan"];
        print_r(json_encode($data));
      }
    } else {
      $data = ["sukses" => 0, "pesan" => "Minimal Username 5 Karakter"];
      print_r(json_encode($data));
    }
  } else {
    $data = ["sukses" => 0, "pesan" => "Data Tidak Boleh Kosong"];
    print_r(json_encode($data));
  }
} else {
  $passwordl = mysqli_real_escape_string($conn, $_POST['passwordl']);
  $passworda = $_POST['passworda'];
  // 
  $passwordb = $_POST['passwordb'];
  $password = $_POST['password'];
  if ($passwordl != "" && $passwordb != "" && $password != "") {
    if (strlen($passwordb) >= 8 && strlen($password) >= 8) {
      if (password_verify($passwordl, $passworda)) {
        $passwordb = mysqli_real_escape_string($conn, $passwordb);
        $password = mysqli_real_escape_string($conn, htmlspecialchars($password));
        if ($passwordb == $password) {
          $password = password_hash($password, PASSWORD_DEFAULT);
          $query = "UPDATE tb_admin SET password = '$password' WHERE tb_admin.id = '$idAdmin'";
          mysqli_query($conn, $query);
          $result = mysqli_affected_rows($conn);
          if ($result == 1) {
            $data = ["sukses" => 1, "pesan" => "Anda Telah Berhasil Merubah Profile, Login kembali ?"];
            print_r(json_encode($data));
          } else {
            $data = ["sukses" => 0, "pesan" => "Anda Telah gagal Merubah password"];
            print_r(json_encode($data));
          }
        } else {
          $data = ["sukses" => 0, "pesan" => "Password Baru dan Ulangi Password Tidak Sesuai"];
          print_r(json_encode($data));
        }
      } else {
        $data = ["sukses" => 0, "pesan" => "Password Lama Tidak Sesuai"];
        print_r(json_encode($data));
      }
    } else {
      $data = ["sukses" => 0, "pesan" => "Minimal Password 8 Karakter bebas"];
      print_r(json_encode($data));
    }
  } else {
    $data = ["sukses" => 0, "pesan" => "Data Tidak Boleh Kosong"];
    print_r(json_encode($data));
  }
}
