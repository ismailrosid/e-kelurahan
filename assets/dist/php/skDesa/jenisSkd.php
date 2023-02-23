<?php
require '../dataArr.php';
$jenis = $_POST['jenis'];
if ($jenis == "SKD MAILING") {
  echo '<textarea id="ket" rows="6" class="form-control" aria-label="With textarea">Bahwa benar berdasarkan Keterangan Ketua RT/RW nama tersebut diatas bertempat tinggal dialamat tersebut diatas dan Menerangkan «ISI_SKD»</textarea>';
} else if ($jenis == "FORM SKD") {
  echo '<textarea id="ket" rows="6" class="form-control" aria-label="With textarea">Bahwa benar berdasarkan Keterangan yang bersangkutan nama tersebut diatas bertempat tinggal dialamat tersebut diatas  dan yang bersangkutan Bahwa atas nama tersebut belum menerima Kartu BPJS</textarea>';
} else if ($jenis == "SKD DOMISILI MAILING") {
  echo '<textarea id="ket" rows="6" class="form-control" aria-label="With textarea">Bahwa benar berdasarkan Keterangan RT/RW dan yang  bersangkutan bertempat tinggal sementara / Mengontrak «KET»  Desa Kondangjaya Kecamatan Karawang Timur Kab.Karawang Jawa Barat.</textarea>';
} else {
  echo '<textarea id="ket" rows="6" class="form-control" aria-label="With textarea">' . $jenis . '</textarea>';
}
