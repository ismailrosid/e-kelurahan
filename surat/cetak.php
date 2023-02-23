<?php
require "../assets/dist/php/function.php";
require "../assets/dist/php/dataArr.php";
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title style="display: none;">''</title>
  <link rel="stylesheet" href="../assets/plugins/bootstrap-5.0.2/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/dist/css/style.css">
  <link rel="stylesheet" href="../assets/dist/css/surat.css">
</head>

<body>
  <div class="container">
    <div class="row <?= $_GET['surat'] == 'skKematian' ? 'd-none' : '' ?>">
      <div class="col-2">
        <img class="img-fluid" src="../assets/dist/img/logo-desa.png" alt="">
      </div>
      <div class="col-10 text-center surat-header">
        <div class="h5 lh-1">PEMERINTAH KABUPATEN KARAWANG <br> KECAMATAN KARAWANG TIMUR <br>
          <div class="h4">PEMERINTAH DESA KONDANGJAYA</div>
        </div>
        <div class="fs-header-3">
          <div>
            Jln. Desa Kondangjaya No. 08 Desa Kondangjaya Kecamatan Karawang Timur – Karawang
          </div>
          <div>
            Email : <?= $dataDesa['email']; ?> – Telp. <?= $dataDesa['telp']; ?> Kode Pos 41371
          </div>
        </div>
      </div>
    </div>
    <?php if (isset($_GET['surat'])) {
      $surat = $_GET['surat'];
      switch ($surat) {
        case 'skDesa':
          include "skDesa/template.php";
          break;
        case 'sktmSekolah':
          include "sktmSekolah/template.php";
          break;
        case 'skUsaha':
          include "skUsaha/template.php";
          break;
        default:
        case 'skKeramaian':
          include "skKeramaian/template.php";
          break;
        case 'skKematian':
          include "skKematian/template.php";
          break;
          # code...
          break;
      }
    } ?>
  </div>
  <script>
    window.print();
  </script>
</body>

</html>