<?php
$key = $_GET['key'];
if (deleteInventaris($key) > 0) {
  $_SESSION["sukses"] = "Data Berhasil Di Hapus";
  echo  "<script>
        window.location = 'index.php?pages=inventaris';
        </script>";
}
