<?php
require "function.php";
require "dataArr.php";
$key = $_POST["key"];
$jenisSk = $_POST["jenisSk"];
switch ($jenisSk) {
  case 'skDesa':
    $surat = getSkDesa($key);
    $ttl = explode(",", $surat["ttl"]);
    $tempat = $ttl[0];
    $tanggal = $ttl[1];
    $tanggal = tglSistem($tanggal);
    unset($surat["ttl"]);
    $surat["tempat_lahir"] = $tempat;
    $surat["tanggal_lahir"] = $tanggal;
    $surat["jenis_sk"] = "sk desa";
    $surat["jabatan"] = cekJabatan($surat["jabatan"]);
    break;
  case 'sktmSekolah':
    $surat = getSktmSekolah($key);
    // TTL pemohon
    $ttlPemohon = explode(",", $surat['ttl_pemohon']);
    unset($surat["ttl_pemohon"]);
    $surat["tempat_lahir_pemohon"] = $ttlPemohon[0];
    $surat["tanggal_lahir_pemohon"] = tglSistem($ttlPemohon[1]);
    // 
    // Bangsa dan agama pemohon
    $bangsaAgamaPemohon = explode(",", $surat["bangsa_agama_pemohon"]);
    unset($surat["bangsa_agama_pemohon"]);
    $surat["bangsa_pemohon"] = $bangsaAgamaPemohon[0];
    $surat["agama_pemohon"] = $bangsaAgamaPemohon[1];
    // 
    // Pecahkan data orang tua
    $dataOrtu = explode(";", $surat['data_ortu']);
    unset($surat["data_ortu"]);
    // TTL ortu
    $ttlOrtu = explode(",", $dataOrtu[0]);
    $surat["tempat_lahir_ortu"] = $ttlOrtu[0];
    $surat["tanggal_lahir_ortu"] = tglSistem($ttlOrtu[1]);
    // 
    $surat["jenis_kelamin_ortu"] = $dataOrtu[1];
    // Bangsa dan agama ortu
    $bangsaAgamaOrtu = explode(",", $dataOrtu[2]);
    $surat["bangsa_ortu"] = $bangsaAgamaOrtu[0];
    $surat["agama_ortu"] = $bangsaAgamaOrtu[1];
    // 
    $surat["pekerjaan_ortu"] = $dataOrtu[3];
    $surat["tempat_tinggal_ortu"] = $dataOrtu[4];
    // ====================================================
    $surat["jenis_sk"] = "sktm sekolah";
    $surat["jabatan"] = cekJabatan($surat["jabatan"]);
    break;
  case 'skUsaha':
    $surat = getSkUsaha($key);
    $ttl = explode(",", $surat["ttl"]);
    $tempat = $ttl[0];
    $tanggal = $ttl[1];
    $tanggal = $tanggal;
    unset($surat["ttl"]);
    $surat["tempat_lahir"] = $tempat;
    $surat["tanggal_lahir"] = tglSistem($tanggal);
    $surat['jenis_sk'] = "sk usaha";
    break;
  case 'skKematian':
    $surat = getSkKematian($key);
    $surat["jabatan"] = cekJabatan($surat["jabatan"]);
    $ttlu = explode(",", $surat['ttlu_alm']);
    unset($surat["ttlu_alm"]);
    $surat['tempat_lahir'] = $ttlu[0];
    $lu = explode("/", $ttlu[1]);
    $surat['tanggal_lahir'] = tglSistem($lu[0]);
    $surat['umur_alm'] = substr(trim($lu[1]), 0, -6);
    // 
    $dataPelapor = explode(";", $surat["data_pelapor"]);
    unset($surat["data_pelapor"]);
    // 
    $surat["hari_kejadian"] = $dataPelapor[0];
    $surat["tanggal_kejadian"] = tglSistem(" " . $dataPelapor[1]);
    $surat["jam_kejadian"] = substr($dataPelapor[2], 0, -4);
    $surat["penyebab_kematian"] = $dataPelapor[3];
    $surat["umur_pelapor"] = $dataPelapor[4];
    $surat["pekerjaan_pelapor"] = $dataPelapor[5];
    $surat["alamat_pelapor"] = $dataPelapor[6];
    $surat["hubungan_pelapor"] = $dataPelapor[7];
    $surat['jenis_sk'] = "sk kematian";
    break;
  case 'skKeramaian':
    $surat = getSkKeramaian($key);
    $surat['jenis_sk'] = "sk keramaian";
    $ttl = explode(",", $surat["ttl"]);
    $tempat = $ttl[0];
    $tanggal = $ttl[1];
    $tanggal = $tanggal;
    unset($surat["ttl"]);
    $surat["tempat_lahir"] = $tempat;
    $surat["tanggal_lahir"] = tglSistem($tanggal);
    $surat["tanggal"] = tglSistem(" " . $surat["tanggal"]);
    break;
  default:
}
function tglSistem($tgl)
{
  $pecahkan = explode(" ", $tgl);
  $bulan = [
    'Januari' => "01",
    'Februari' => "02",
    'Maret' => "03",
    'April' => "04",
    'Mei' => "05",
    'Juni' => "06",
    'Juli' => "07",
    'Agustus' => "08",
    'September' => "09",
    'Oktober' => "10",
    'November' => "11",
    'Desember' => "12"
  ];
  return $pecahkan[3] . "-" . $bulan[$pecahkan[2]] . "-" . $pecahkan[1];
}
print_r(json_encode($surat));
