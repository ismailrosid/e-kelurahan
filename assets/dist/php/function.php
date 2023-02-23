<?php

require "connection.php";

function getAdmin()
{
  global $conn;
  $query = "SELECT * FROM tb_admin";
  $data = mysqli_query($conn, $query);
  $result = mysqli_fetch_assoc($data);
  return $result;
}
function createAdmin($nama, $username, $password)
{
  global $conn;
  $password = password_hash($password, PASSWORD_DEFAULT);
  $query = "INSERT INTO tb_admin VALUES(NULL,'$nama','$username','$password')";
  mysqli_query($conn, $query);
  $result = mysqli_affected_rows($conn);
  if ($result == 1) {
    $_SESSION["info-sukses"] = "Anda telah kami berikan akses sebagai admin utama Username = admin dan Password = 12345678";
  } else {
    $_SESSION['info-gagal'] = "Sistem belum basa menerima permintaan pengguna";
  }
}

function tglIndo($tgl)
{
  $tanggal = $tgl;
  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  return str_replace('  ', ' ', $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0]);
}

function cekJabatan($jabatan)
{
  if ($jabatan == "kades") {
    $jabatan = "Kepala Desa kondangjaya";
  } elseif ($jabatan == "sekdes") {
    $jabatan = "Sekretaris Desa Kondangjaya";
  } elseif ($jabatan == "Kepala Desa kondangjaya") {
    $jabatan = "kades";
  } elseif ($jabatan == "Sekretaris Desa Kondangjaya") {
    $jabatan = "sekdes";
  } elseif ($jabatan == "babinsa") {
    $jabatan = "Babinsa AD Kondangjaya";
  } elseif ($jabatan == "babinmas") {
    $jabatan = "Babinmas POLRI Kondangjaya";
  } elseif ($jabatan = "Babinsa AD Kondangjaya") {
    $jabatan = "babinsa";
  } elseif ($jabatan = "Babinmas POLRI Kondangjaya") {
    $jabatan = "babinmas";
  }
  return $jabatan;
}

function noSurat($kdSurat, $tableDb)
{
  global $conn;
  $bulan = getRomawi(date('n'));
  $tahun = date('Y');
  $query = "SELECT MAX(no_surat) FROM $tableDb WHERE no_surat LIKE '$kdSurat%' ORDER BY id_surat DESC LIMIT 1";
  $last_regis = mysqli_fetch_assoc(mysqli_query($conn, $query));

  if (empty($last_regis)) {
    $no_surat = $kdSurat . '/' . '001' . '/' . 'Ds' . '/'  . $bulan . '/'  . $tahun;
  } else {
    $get_noRegis = intval(substr(implode('', $last_regis), 4, 4));
    $num_length = strlen($get_noRegis);
    $number = $get_noRegis + 1;

    if ($num_length == 1) {
      if ($get_noRegis == 9) {
        $no_surat = $kdSurat . '/' . '0' . $number . '/' . 'Ds' . '/'  . $bulan . '/'  . $tahun;
      } else {
        $no_surat = $kdSurat . '/' . '00' . $number  . '/' . 'Ds' . '/'  . $bulan . '/'  . $tahun;
      }
    } elseif ($num_length == 2) {
      if ($get_noRegis == 99) {
        $no_surat = $kdSurat . '/'  . $number . '/' . 'Ds' . '/'  . $bulan . '/'  . $tahun;
      } else {
        $no_surat = $kdSurat . '/' . '0' . $number . '/' . 'Ds' . '/'  . $bulan . '/'  . $tahun;
      }
    } else {
      $no_surat = $kdSurat . '/'  . $number . '/' . 'Ds' . '/'  . $bulan . '/'  . $tahun;
    }
  }
  return $no_surat;
}

function getRomawi($bln)
{
  switch ($bln) {
    case 1:
      return "I";
      break;
    case 2:
      return "II";
      break;
    case 3:
      return "III";
      break;
    case 4:
      return "IV";
      break;
    case 5:
      return "V";
      break;
    case 6:
      return "VI";
      break;
    case 7:
      return "VII";
      break;
    case 8:
      return "VIII";
      break;
    case 9:
      return "IX";
      break;
    case 10:
      return "X";
      break;
    case 11:
      return "XI";
      break;
    case 12:
      return "XII";
      break;
  }
}
function getPejabat()
{
  global $conn;
  $query = "SELECT * FROM tb_pejabat";
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function cekJenisSurat($jenisSurat)
{
  switch ($jenisSurat) {
    case 'skd mailing kades':
      $jenisSurat = "MK";
      break;
    case 'skd mailing sekdes':
      $jenisSurat = "MS";
    case 'form skd kades':
      $jenisSurat = "SK";
    case 'form skd sekdes':
      $jenisSurat = "SS";
    case 'form skd sekdes':
      $jenisSurat = "SS";
    case 'skd domisili mailing kades':
      $jenisSurat = "DK";
    case 'skd domisili mailing sekdes':
      $jenisSurat = "DS";
    default:
      $jenisSurat = "DS";
      break;
  }
  return $jenisSurat;
}
// CRUD 
// ==================== SKD
function getSkUsaha($keyword)
{
  global $conn;
  if (empty($keyword)) {
    $query = "SELECT * FROM tb_sk_usaha tu INNER JOIN tb_pejabat tp ON tu.id_pejabat = tp.id_pejabat";
    $result = mysqli_query($conn, $query);
    $surat = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $surat[] = $row;
    }
  } else {
    $query = "SELECT * FROM tb_sk_usaha tu INNER JOIN tb_pejabat tp ON tu.id_pejabat = tp.id_pejabat WHERE tu.id_surat = '$keyword'";
    $result = mysqli_query($conn, $query);
    $surat = mysqli_fetch_assoc($result);
  }
  return $surat;
}
function saveSkUsaha($data)
{
  global $conn;
  $idPajabatan = $data["id-pejabat"];
  $namaPemohon = htmlspecialchars($data["nama-pemohon"]);
  $noNik = htmlspecialchars($data["no-nik"]);
  // Membuat tempat tanggal lahir
  $tempatTgl = explode(",", htmlspecialchars($data["tempat-tglLahir"]));
  $tempat = $tempatTgl[0];
  $tanggal = tglIndo($tempatTgl[1]);
  $tempatTglLahir = $tempat . ", " .  $tanggal;
  // End
  $jenisKelamin = $data["jenis-kelamin"];
  $agama = $data["agama"];
  $pekerjaan = htmlspecialchars($data["pekerjaan"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $keterangan = htmlspecialchars($data["keterangan"]);
  $aksi = $data["aksi-surat"];
  if ($aksi != "update") {
    $noSurat = noSurat("503", "tb_sk_usaha");
    $idSurat = createIdSurat("SKU", "US", "tb_sk_usaha");
    $query = "INSERT INTO tb_sk_usaha VALUES ('$idSurat', '$idPajabatan ', '$noSurat', '$namaPemohon', '$noNik', '$tempatTglLahir', '$jenisKelamin', '$agama', ' $pekerjaan', '$alamat', '$keterangan')";
    mysqli_query($conn, $query);
    $tersimpan = mysqli_affected_rows($conn);
    if (empty($data['id-permohonan']) && empty($data['no-whatsapp'])) {
      if ($tersimpan) {
        $data = ["1", $idSurat, "1.1"];
        return $data;
      } else {
        $data = ["0", ""];
        return $data;
      }
    } else {
      $idPermohonan = $data['id-permohonan'];
      $noWhatsapp = $data['no-whatsapp'];
      savePengiriman($idSurat, $namaPemohon, $noWhatsapp);
      $tersimpan = mysqli_affected_rows($conn);
      if ($tersimpan) {
        $berkas = getBerkas($idPermohonan);
        foreach ($berkas as $key) {
          deleteBerkas($key["poto"]);
        }
        $tersimpan = deletePermohonan($idPermohonan);
        if ($tersimpan) {
          $data = ["1", $idSurat, "1.2"];
          return $data;
        } else {
          $data = ["0", ""];
          return $data;
        }
      } else {
        $data = ["0", ""];
        return $data;
      }
    }
  } else {
    $idSurat = $data["id-surat"];
    $query = "UPDATE tb_sk_usaha SET id_pejabat = '$idPajabatan', nama_pemohon = '$namaPemohon', no_nik = '$noNik', ttl = '$tempatTglLahir', jenis_kelamin = '$jenisKelamin', agama = '$agama', pekerjaan = '$pekerjaan', alamat = '$alamat', keterangan = '$keterangan' WHERE tb_sk_usaha.id_surat = '$idSurat'";
    mysqli_query($conn, $query);
    $tersimpan = mysqli_affected_rows($conn);
    if ($tersimpan) {
      $data = ["11", $idSurat];
      return $data;
    } else {
      $data = ["00", ""];
      return $data;
    }
  }
}
function getSkKeramaian($keyword)
{
  global $conn;
  if (empty($keyword)) {
    $query = "SELECT * FROM tb_sk_keramaian";
    $result = mysqli_query($conn, $query);
    $surat = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $surat[] = $row;
    }
  } else {
    $query = "SELECT * FROM tb_sk_keramaian WHERE id_surat = '$keyword'";
    $result = mysqli_query($conn, $query);
    $surat = mysqli_fetch_assoc($result);
  }
  return $surat;
}
function saveSkKeramaian($data)
{
  global $conn;
  $noSurat = $data["no-surat"];
  $namaPemohon = htmlspecialchars($data["nama-pemohon"]);
  $noNik = htmlspecialchars($data["no-nik"]);
  // Membuat tempat tanggal lahir
  $tempatTgl = explode(",", $data['tempat-tglLahir']);
  $tempatL = htmlspecialchars($tempatTgl[0]);
  $tanggalL = tglIndo($tempatTgl[1]);
  $tempatTglLahir = $tempatL . ", " . $tanggalL;
  // End
  $agama = $data["agama"];
  $pekerjaan = htmlspecialchars($data["pekerjaan"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $hari = $data["hari"];
  $tanggal = tglIndo($data["tanggal"]);
  $tempatPelaksanaan = htmlspecialchars($data["tempat-pelaksanaan"]);
  $hiburan = htmlspecialchars($data["hiburan"]);
  // TTD
  $ttd = getPenandaTangan($data["id-pejabatKiri"], $data["id-pejabatTengah"], $data["id-pejabatKanan"]);
  $ttdKiri = $ttd[0];
  $ttdTengah = $ttd[1];
  $ttdKanan = $ttd[2];
  $aksi = $data["aksi-surat"];
  if ($aksi != "update") {
    // ==================================
    // ==  ASETS PEMBUATAN NO SURAT  ====
    // Memanggil function setnosurat untuk Mendapatkan nomer surat
    $noSurat = noSurat("000", "tb_sk_keramaian");
    // ==================================
    // ===================================
    // ===  ASETS PEMBUATAN id SURAT  ====
    // Memanggil function create id surat untuk mendapatkan id surat
    $idSurat = createIdSurat('SKK', "KM", "tb_sk_keramaian");
    // ===  ASETS PEMBUATAN PENANDATANGAN  ====
    // Memanggil function get penandatngan untuk mendapatkan id ttd
    // ==================================
    // Masukan nilai ====================
    $query = "INSERT INTO tb_sk_keramaian VALUES ('$idSurat', '$ttdKiri', '$ttdTengah', '$ttdKanan', '$noSurat', '$namaPemohon', '$noNik', '$tempatTglLahir', '$agama', '$pekerjaan','$alamat', '$hari', '$tanggal', '$tempatPelaksanaan', '$hiburan')";
    mysqli_query($conn, $query);
    $tersimpan = mysqli_affected_rows($conn);
    if (empty($data['id-permohonan']) && empty($data['no-whatsapp'])) {
      if ($tersimpan) {
        $data = ["1", $idSurat, "1.1"];
        return $data;
      } else {
        $data = ["0", ""];
        return $data;
      }
    } else {
      $idPermohonan = $data['id-permohonan'];
      $noWhatsapp = $data['no-whatsapp'];
      savePengiriman($idSurat, $namaPemohon, $noWhatsapp);

      $tersimpan = mysqli_affected_rows($conn);
      if ($tersimpan) {
        $berkas = getBerkas($idPermohonan);
        foreach ($berkas as $key) {
          deleteBerkas($key["poto"]);
        }
        $tersimpan = deletePermohonan($idPermohonan);
        if ($tersimpan) {
          $data = ["1", $idSurat, "1.2"];
          return $data;
        } else {
          $data = ["0", ""];
          return $data;
        }
      } else {
        $data = ["0", ""];
        return $data;
      }
    }
  } else {
    $idSurat = $data["id-surat"];
    // $query = "UPDATE tb_sk_keramaian SET nama_pemohon = '$namaPemohon', no_nik = '$noNik', ttl = '$tempatTgl', agama = '$agama', pekerjaan = '$pekerjaan', alamat = '$alamat', tanggal = '$tanggal', tempat_pelaksanaan = '$tempatPelaksanaan', hiburan = '$hiburan' WHERE tb_sk_keramaian.id_surat = '$idSurat'";
    $query = "UPDATE tb_sk_keramaian SET nama_pemohon = '$namaPemohon', no_nik = '$noNik', ttl = '$tempatTglLahir', agama = '$agama', pekerjaan = '$pekerjaan', alamat = '$alamat', hari = '$hari', tanggal = '$tanggal', tempat_pelaksanaan = '$tempatPelaksanaan', hiburan = '$hiburan' WHERE tb_sk_keramaian.id_surat = '$idSurat'";
    mysqli_query($conn, $query);
    $tersimpan = mysqli_affected_rows($conn);
    if ($tersimpan) {
      $data = ["11", $idSurat];
      return $data;
    } else {
      $data = ["00", ""];
      return $data;
    }
  }
}
function getPenandaTangan($tddKiri, $tddTengah, $ttdKanan)
{
  global $conn;
  $ttdKiriResult = mysqli_fetch_assoc(mysqli_query($conn, "SELECT no_ttd_kiri FROM tb_ttd_kiri WHERE id_pejabat = '$tddKiri'"));
  $ttdTengahResult = mysqli_fetch_assoc(mysqli_query($conn, "SELECT no_ttd_tengah FROM tb_ttd_tengah WHERE id_pejabat = '$tddTengah'"));
  $ttdKananResult = mysqli_fetch_assoc(mysqli_query($conn, "SELECT no_ttd_kanan FROM tb_ttd_kanan WHERE id_pejabat = '$ttdKanan'"));
  $result = [implode($ttdKiriResult), implode($ttdTengahResult), implode($ttdKananResult)];
  return $result;
}
function saveSkDesa($data)
{
  // Untuk create
  global $conn;
  $idPejabat = $data["id-pejabat"];
  $namaPemohon = htmlspecialchars($data["nama-pemohon"]);
  $noNik = htmlspecialchars($data["no-nik"]);
  // Membuat tempat tanggal lahir
  $tempatTgl = explode(",", $data["tempat-tglLahir"]);
  $tempat = htmlspecialchars($tempatTgl[0]);
  $tanggal = tglIndo($tempatTgl[1]);
  $tempatTgl = $tempat . ", " . $tanggal;
  // End
  $jenisKelamin = $data["jenis-kelamin"];
  $agama = $data["agama"];
  $pekerjaan = htmlspecialchars($data["pekerjaan"]);
  $alamat = htmlspecialchars($data["alamat"]);
  // Jenis skd
  $arrJenisSkDesa = explode(",", $data["jenis-skd"]);

  $keterangan = $data["keterangan"];
  $aksi = $data["aksi-surat"];
  if ($aksi != "update") {
    $jenisSkDesa = strtolower($arrJenisSkDesa[0] . " " . cekJabatan($arrJenisSkDesa[1]));
    // ==================================
    // ==  ASETS PEMBUATAN NO SURAT  ====
    // Memanggil function setnosurat untuk Mendapatkan nomer surat
    $noSurat = noSurat("474", "tb_sk_desa");
    // ==================================
    // ===================================
    // ===  ASETS PEMBUATAN id SURAT  ====
    //  Memanggil jenis surat untuk endapatkan jenis surat

    // Memanggil function creat id surat untuk mendapatkan id surat
    $idSurat = createIdSurat("SKD", cekJenisSurat($jenisSkDesa), "tb_sk_desa");
    // ==================================
    // Masukan nilai ====================
    $query = "INSERT INTO tb_sk_desa VALUES ('$idSurat', '$idPejabat', '$noSurat','$namaPemohon', '$noNik', '$tempatTgl', '$jenisKelamin', '$agama', '$pekerjaan', '$alamat', '$jenisSkDesa','$keterangan')";
    mysqli_query(
      $conn,
      $query
    );
    $tersimpan = mysqli_affected_rows($conn);
    if (empty($data['id-permohonan']) && empty($data['no-whatsapp'])) {
      if ($tersimpan) {
        $data = ["1", $idSurat, "1.1"];
        return $data;
      } else {
        $data = ["0", ""];
        return $data;
      }
    } else {
      $idPermohonan = $data['id-permohonan'];
      $noWhatsapp = $data['no-whatsapp'];
      savePengiriman($idSurat, $namaPemohon, $noWhatsapp);

      $tersimpan = mysqli_affected_rows($conn);
      if ($tersimpan) {
        $berkas = getBerkas($idPermohonan);
        foreach ($berkas as $key) {
          deleteBerkas($key["poto"]);
        }
        $tersimpan = deletePermohonan($idPermohonan);
        if ($tersimpan) {
          $data = ["1", $idSurat, "1.2"];
          return $data;
        } else {
          $data = ["0", ""];
          return $data;
        }
      } else {
        $data = ["0", ""];
        return $data;
      }
    }
  } else {
    $idSurat = $data["id-surat"];
    $noSurat = $data["no-surat"];
    $jenisSkDesa = strtolower($arrJenisSkDesa[0] . " " . cekJabatan($arrJenisSkDesa[1]));
    $query = "UPDATE tb_sk_desa SET nama_pemohon = '$namaPemohon', no_nik = '$noNik', ttl = '$tempatTgl', jenis_kelamin = '$jenisKelamin', agama = '$agama', pekerjaan = '$pekerjaan', alamat = '$alamat', jenis_sk_desa = '$jenisSkDesa', keterangan = '$keterangan' WHERE tb_sk_desa.id_surat = '$idSurat'";
    mysqli_query(
      $conn,
      $query
    );
    $tersimpan = mysqli_affected_rows($conn);
    if ($tersimpan) {
      $data = ["11", $idSurat];
      return $data;
    } else {
      $data = ["00", ""];
      return $data;
    }
  }
}

function getSkDesa($keyword)
{
  global $conn;
  if (empty($keyword)) {
    $query = "SELECT * FROM tb_sk_desa";
    $result = mysqli_query($conn, $query);
    $surat = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $surat[] = $row;
    }
  } else {
    $query = "SELECT * FROM tb_sk_desa INNER JOIN tb_pejabat ON tb_sk_desa.id_pejabat = tb_sk_desa.id_pejabat WHERE tb_sk_desa.id_surat = '$keyword'";
    $result = mysqli_query($conn, $query);
    $surat = mysqli_fetch_assoc($result);
  }
  return $surat;
}
// =================Sk kematian
function getSkKematian($keyword)
{
  global $conn;
  if (empty($keyword)) {
    $query = "SELECT * FROM tb_sk_kematian sk INNER JOIN tb_pejabat tp ON sk.id_pejabat = tp.id_pejabat";
    $result = mysqli_query($conn, $query);
    $surat = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $surat[] = $row;
    }
  } else {
    $query = "SELECT * FROM tb_sk_kematian sk INNER JOIN tb_pejabat tp ON sk.id_pejabat = tp.id_pejabat WHERE sk.id_surat = '$keyword'";
    $result = mysqli_query($conn, $query);
    $surat = mysqli_fetch_assoc($result);
  }
  return $surat;
}
function saveSkKematian($data)
{
  global $conn;
  // id jabatan
  $idPejabat = $data['id-pejabat'];
  // 
  $namaAlm = htmlspecialchars($data['nama-alm']);
  $noNikAlm  = htmlspecialchars($data['no-nikAlm']);
  $tempatTanggalLahirUmur = explode(",", $data['tempat-tglLahirUmur']);
  $tempat = htmlspecialchars($tempatTanggalLahirUmur[0]);
  $tanggalLahirUmur = explode("/", $tempatTanggalLahirUmur[1]);
  $tgl = tglIndo($tanggalLahirUmur[0]);
  $umur = htmlspecialchars($tanggalLahirUmur[1]);
  $tempatTanggalLahirUmur = $tempat . ", " . $tgl . " / " . $umur;

  $pekerjaanAlm =  htmlspecialchars($data['pekerjaan-alm']);
  $alamatAlm =  htmlspecialchars($data['alamat-alm']);
  // 
  $hari =  $data['hari'];
  $tanggal =  tglIndo($data['tanggal']);
  $pukul =  $data['pukul'];
  $penyebabKematian =  htmlspecialchars($data['penyebab-kematian']);
  // 
  $namaPelapor = htmlspecialchars($data['nama-pelapor']);
  $noNikPelapor  = htmlspecialchars($data['no-nikPelapor']);
  $umurPelapor = htmlspecialchars($data['umur-pelapor']);
  $pekerjaanPelapor = htmlspecialchars($data['pekerjaan-pelapor']);
  $alamatPelapor = htmlspecialchars($data['alamat-pelapor']);
  $relasi = htmlspecialchars($data['relasi']);
  // Data orang tua
  // Pembuatan nomer surat
  // $dataOrtu =   $tempatTanggalLahirOrtu . ';' .   $jenisKelaminOrtu . ';' .  $bangsaAgamaOrtu . ';' .  $pekerjaanOrtu . ';' .  $tempatTinggalOrtu;
  $datapelapor = $hari . ';' . $tanggal . ';' . $pukul . ';' . $penyebabKematian . ';' . $umurPelapor . ';' . $pekerjaanPelapor . ';' . $alamatPelapor . ';' . $relasi;

  $aksi = $data["aksi-surat"];
  if ($aksi != "update") {
    $noSurat = noSurat("474.3", "tb_sk_kematian");
    // Pembuatan id surat
    $idSurat = createIdSurat('SKK', "KT", "tb_sk_kematian");
    // ==========================================================================================
    $query = "INSERT INTO tb_sk_kematian VALUES ('$idSurat', '$idPejabat', '$noSurat', '$namaAlm', '$noNikAlm', '$tempatTanggalLahirUmur', '$pekerjaanAlm', '$alamatAlm', '$namaPelapor', '$noNikPelapor', '$datapelapor');";
    mysqli_query($conn, $query);
    $tersimpan = mysqli_affected_rows($conn);
    if (empty($data['id-permohonan']) && empty($data['no-whatsapp'])) {
      if ($tersimpan) {
        $data = ["1", $idSurat, "1.1"];
        return $data;
      } else {
        $data = ["0", ""];
        return $data;
      }
    } else {
      $idPermohonan = $data['id-permohonan'];
      $noWhatsapp = $data['no-whatsapp'];
      savePengiriman($idSurat, $namaPelapor, $noWhatsapp);
      $tersimpan = mysqli_affected_rows($conn);
      if ($tersimpan) {
        $berkas = getBerkas($idPermohonan);
        foreach ($berkas as $key) {
          deleteBerkas($key["poto"]);
        }
        $tersimpan = deletePermohonan($idPermohonan);
        if ($tersimpan) {

          $data = ["1", $idSurat, "1.2"];
          return $data;
        } else {
          $data = ["0", ""];
          return $data;
        }
      } else {
        $data = ["0", ""];
        return $data;
      }
    }
  } else {
    $idSurat = $data["id-surat"];
    $noSurat = $data["no-surat"];


    $query = "UPDATE tb_sk_kematian SET id_pejabat = '$idPejabat', nama_alm = '$namaAlm', no_nik_alm = '$noNikAlm', ttlu_alm = '$tempatTanggalLahirUmur', pekerjaan_alm = '$pekerjaanAlm', alamat_alm = '$alamatAlm', nama_pelapor = '$namaPelapor', no_nik_pelapor = '$noNikPelapor', data_pelapor = '$datapelapor' WHERE tb_sk_kematian.id_surat = '$idSurat'";
    mysqli_query(
      $conn,
      $query
    );
    $tersimpan = mysqli_affected_rows($conn);

    if ($tersimpan) {
      $data = ["11", $idSurat];
      return $data;
    } else {
      $data = ["00", ""];
      return $data;
    }
  }
}
// 
function getSktmSekolah($keyword)
{
  global $conn;
  if (empty($keyword)) {
    $query = "SELECT * FROM tb_sktm_sekolah";
    $result = mysqli_query($conn, $query);
    $surat = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $surat[] = $row;
    }
  } else {
    $query = "SELECT * FROM tb_sktm_sekolah ts INNER JOIN tb_pejabat tp ON ts.id_pejabat = tp.id_pejabat WHERE ts.id_surat = '$keyword'";
    $result = mysqli_query($conn, $query);
    $surat = mysqli_fetch_assoc($result);
  }
  return $surat;
}

function saveSktmSekolah($data)
{
  global $conn;
  // id jabatan
  $idPejabat = $data["id-pejabat"];

  $namaLengkapPemohon = htmlspecialchars($data["nama-lengkapPemohon"]);
  $noNikPemohon  = htmlspecialchars($data["no-nikPemohon"]);
  $tempatTanggalLahirPemohon = explode(",", $data["tempat-tglLahirPemohon"]);
  $tempatPemohon = htmlspecialchars($tempatTanggalLahirPemohon[0]);
  $tanggalPemohon = tglIndo($tempatTanggalLahirPemohon[1]);
  $tempatTanggalLahirPemohon = $tempatPemohon . ", " . $tanggalPemohon;
  $jenisKelaminPemohon =  $data["jenis-kelaminPemohon"];
  $bangsaAgamaPemohon =  $data["bangsa-agamaPemohon"];
  $pekerjaanPemohon =  htmlspecialchars($data["pekerjaanPemohon"]);
  $tempatTinggalPemohon = htmlspecialchars($data["tempat-tinggalPemohon"]);
  // Data orang tua
  $namaLengkapOrtu = htmlspecialchars($data["nama-lengkapOrtu"]);
  $noNikOrtu  = htmlspecialchars($data["no-nikOrtu"]);
  $tempatTanggalLahirOrtu = explode(",", $data["tempat-tglLahirOrtu"]);
  $tempatOrtu = htmlspecialchars($tempatTanggalLahirOrtu[0]);
  $tanggalOrtu = tglIndo($tempatTanggalLahirOrtu[1]);
  $tempatTanggalLahirOrtu = $tempatOrtu . ", " . $tanggalOrtu;
  $jenisKelaminOrtu =  $data["jenis-kelaminOrtu"];
  $bangsaAgamaOrtu =  $data["bangsa-agamaOrtu"];
  $pekerjaanOrtu =  htmlspecialchars($data["pekerjaanOrtu"]);
  $tempatTinggalOrtu =  htmlspecialchars($data["tempat-tinggalOrtu"]);
  // Pembuatan nomer surat
  $aksi = $data["aksi-surat"];
  $dataOrtu =   $tempatTanggalLahirOrtu . ";" .   $jenisKelaminOrtu . ";" .  $bangsaAgamaOrtu . ";" .  $pekerjaanOrtu . ";" .  $tempatTinggalOrtu;
  if ($aksi != "update") {
    $noSurat = noSurat("474", "tb_sktm_sekolah");
    // Pembuatan id surat
    $idSurat = createIdSurat("SKT", "SH", "tb_sktm_sekolah");
    $query = "INSERT INTO tb_sktm_sekolah VALUES ('$idSurat','$idPejabat','$noSurat','$namaLengkapPemohon','$noNikPemohon','$tempatTanggalLahirPemohon','$jenisKelaminPemohon','$bangsaAgamaPemohon','$pekerjaanPemohon','$tempatTinggalPemohon','$namaLengkapOrtu','$noNikOrtu','$dataOrtu')";
    mysqli_query($conn, $query);
    $tersimpan = mysqli_affected_rows($conn);
    if (empty($data['id-permohonan']) && empty($data['no-whatsapp'])) {
      if ($tersimpan) {
        $data = ["1", $idSurat, "1.1"];
        return $data;
      } else {
        $data = ["0", ""];
        return $data;
      }
    } else {
      $idPermohonan = $data['id-permohonan'];
      $noWhatsapp = $data['no-whatsapp'];
      savePengiriman($idSurat, $namaLengkapPemohon, $noWhatsapp);
      $tersimpan = mysqli_affected_rows($conn);
      if ($tersimpan) {
        $berkas = getBerkas($idPermohonan);
        foreach ($berkas as $key) {
          deleteBerkas($key["poto"]);
        }
        $tersimpan = deletePermohonan($idPermohonan);
        if ($tersimpan) {
          $data = ["1", $idSurat, "1.2"];
          return $data;
        } else {
          $data = ["0", ""];
          return $data;
        }
      } else {
        $data = ["0", ""];
        return $data;
      }
    }
  } else {
    $idSurat = $data["id-surat"];
    $noSurat = $data["no-surat"];
    $query = "UPDATE tb_sktm_sekolah SET id_surat ='$idSurat', id_pejabat='$idPejabat', no_surat='$noSurat', nama_pemohon = '$namaLengkapPemohon', no_nik_pemohon = '$noNikPemohon', ttl_pemohon = '$tempatTanggalLahirPemohon', jenis_kelamin_pemohon = '$jenisKelaminPemohon', bangsa_agama_pemohon = '$bangsaAgamaPemohon', pekerjaan_pemohon = '$pekerjaanPemohon', tempat_tinggal_pemohon = '$tempatTinggalPemohon', nama_ortu = '$namaLengkapOrtu', no_nik_ortu = '$noNikOrtu', data_ortu = '$dataOrtu' WHERE tb_sktm_sekolah.id_surat = '$idSurat'";
    mysqli_query(
      $conn,
      $query
    );
    $tersimpan = mysqli_affected_rows($conn);

    if ($tersimpan) {
      $data = ["11", $idSurat];
      return $data;
    } else {
      $data = ["00", ""];
      return $data;
    }
  }
}
// Ini berlaku untuk semua surat
function deleteSurat($key, $tableDb)
{
  global $conn;
  $query = "DELETE FROM $tableDb WHERE id_surat = '$key'";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
function createIdSurat($surat, $jenis, $tableDb)
{
  global $conn;
  $query = "SELECT id_surat FROM $tableDb WHERE id_surat LIKE '%$jenis' ORDER BY id_surat DESC LIMIT 1";
  $last_id = mysqli_fetch_assoc(mysqli_query($conn, $query));
  if (empty($last_id)) {
    $idSurat = $surat . "001" . $jenis;
  } else {
    $get_num =  intval(substr(implode('', $last_id), 4, 4));
    $num_length = strlen($get_num);
    $number = $get_num + 1;
    if ($num_length == 1) {
      if ($get_num == 9) {
        $idSurat = $surat . "0" . $number . $jenis;
      } else {
        $idSurat = $surat . "00" . $number . $jenis;
      }
    } elseif ($num_length == 2) {
      if ($get_num == 99) {
        $idSurat = $surat . $number . $jenis;
      } else {
        $idSurat = $surat . "0" . $number . $jenis;
      }
    } else {
      $idSurat = $surat . $number . $jenis;
    }
  }
  return $idSurat;
}

function savePermohonanSkdesa($data, $berkas)
{
  global $conn;
  $nik = htmlspecialchars($data["no-nik"]);
  $nama = htmlspecialchars($data["nama"]);
  $noWa = htmlspecialchars($data["wa"]);
  $jenis = htmlspecialchars($data["jenis"]);
  $tujuan = htmlspecialchars($data["tujuan"]);
  $query = "INSERT INTO tb_permohonan VALUES (NULL, '$nik', '$nama', '$noWa', '$jenis', '$tujuan')";
  mysqli_query($conn, $query);
  $tersimpan = mysqli_affected_rows($conn);
  if ($tersimpan) {
    $query = "SELECT MAX(id_permohonan) AS id FROM tb_permohonan;";
    $data = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($data);
    $id = $result["id"];
    $targetfolder = "assets/berkas/";
    if ($berkas['ktp']) {
      $temp = explode(".", $berkas["ktp"]["name"]); //untuk mengambil nama file gambarnya saja 
      $nama_baru = "sd-kt-" . round(microtime(true)) . '.' . end($temp); //fungsi untuk membuat nama acak
      move_uploaded_file($berkas['ktp']['tmp_name'], $targetfolder . $nama_baru);
      $query = "INSERT INTO tb_berkas VALUES (NULL, '$id', 'ktp', '$nama_baru')";
      mysqli_query($conn, $query);
    }
    if ($berkas['s-pengantar']) {
      $temp = explode(".", $berkas["s-pengantar"]["name"]); //untuk mengambil nama file gambarnya saja 
      $nama_baru = "sd-sp-" . round(microtime(true)) . '.' . end($temp); //fungsi untuk membuat nama acak
      move_uploaded_file($berkas['s-pengantar']['tmp_name'], $targetfolder . $nama_baru);
      $query = "INSERT INTO tb_berkas VALUES (NULL, '$id', 'surat pengantar rt / rw', '$nama_baru');";
      mysqli_query($conn, $query);
    }
  }
}
// 
function savePermohonanSktmSekolah($data, $berkas)
{
  global $conn;
  $nik = htmlspecialchars($data["no-nik"]);
  $nama = htmlspecialchars($data["nama"]);
  $noWa = htmlspecialchars($data["wa"]);
  $jenis = htmlspecialchars($data["jenis"]);
  $tujuan = htmlspecialchars($data["tujuan"]);
  $query = "INSERT INTO tb_permohonan VALUES (NULL, '$nik', '$nama', '$noWa', '$jenis', '$tujuan')";
  mysqli_query($conn, $query);
  $tersimpan = mysqli_affected_rows($conn);
  if ($tersimpan) {
    $query = "SELECT MAX(id_permohonan) AS id FROM tb_permohonan;";
    $data = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($data);
    $id = $result["id"];
    $targetfolder = "assets/berkas/";
    if ($berkas['ktp']) {
      $temp = explode(".", $berkas["ktp"]["name"]); //untuk mengambil nama file gambarnya saja 
      $nama_baru = "sm-kt-" . round(microtime(true)) . '.' . end($temp); //fungsi untuk membuat nama acak
      move_uploaded_file($berkas['ktp']['tmp_name'], $targetfolder . $nama_baru);
      $query = "INSERT INTO tb_berkas VALUES (NULL, '$id', 'ktp', '$nama_baru')";
      mysqli_query($conn, $query);
    }
    if ($berkas['kk']) {
      $temp = explode(".", $berkas["kk"]["name"]); //untuk mengambil nama file gambarnya saja 
      $nama_baru = "sm-kk-" . round(microtime(true)) . '.' . end($temp); //fungsi untuk membuat nama acak
      move_uploaded_file($berkas['kk']['tmp_name'], $targetfolder . $nama_baru);
      $query = "INSERT INTO tb_berkas VALUES (NULL, '$id', 'kk', '$nama_baru')";
      mysqli_query($conn, $query);
    }
    if ($berkas['s-pengantar']) {
      $temp = explode(".", $berkas["s-pengantar"]["name"]); //untuk mengambil nama file gambarnya saja 
      $nama_baru = "sm-sp-" . round(microtime(true)) . '.' . end($temp); //fungsi untuk membuat nama acak
      move_uploaded_file($berkas['s-pengantar']['tmp_name'], $targetfolder . $nama_baru);
      $query = "INSERT INTO tb_berkas VALUES (NULL, '$id', 'surat pengantar rt / rw', '$nama_baru');";
      mysqli_query($conn, $query);
    }
  }
}
// 
function savePermohonanSkUsaha($data, $berkas)
{
  global $conn;
  $nik = htmlspecialchars($data["no-nik"]);
  $nama = htmlspecialchars($data["nama"]);
  $noWa = htmlspecialchars($data["wa"]);
  $jenis = htmlspecialchars($data["jenis"]);
  $tujuan = htmlspecialchars($data["tujuan"]);
  $query = "INSERT INTO tb_permohonan VALUES (NULL, '$nik', '$nama', '$noWa', '$jenis', '$tujuan')";
  mysqli_query($conn, $query);
  $tersimpan = mysqli_affected_rows($conn);
  if ($tersimpan) {
    $query = "SELECT MAX(id_permohonan) AS id FROM tb_permohonan;";
    $data = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($data);
    $id = $result["id"];
    $targetfolder = "assets/berkas/";
    if ($berkas['ktp']) {
      $temp = explode(".", $berkas["ktp"]["name"]); //untuk mengambil nama file gambarnya saja 
      $nama_baru = "su-kt-" . round(microtime(true)) . '.' . end($temp); //fungsi untuk membuat nama acak
      move_uploaded_file($berkas['ktp']['tmp_name'], $targetfolder . $nama_baru);
      $query = "INSERT INTO tb_berkas VALUES (NULL, '$id', 'ktp', '$nama_baru')";
      mysqli_query($conn, $query);
    }
    if ($berkas['s-pengantar']) {
      $temp = explode(".", $berkas["s-pengantar"]["name"]); //untuk mengambil nama file gambarnya saja 
      $nama_baru = "su-sp-" . round(microtime(true)) . '.' . end($temp); //fungsi untuk membuat nama acak
      move_uploaded_file($berkas['s-pengantar']['tmp_name'], $targetfolder . $nama_baru);
      $query = "INSERT INTO tb_berkas VALUES (NULL, '$id', 'surat pengantar rt / rw', '$nama_baru');";
      mysqli_query($conn, $query);
    }
  }
}
// 
function savePermohonanSkKematian($data, $berkas)
{
  global $conn;
  $nik = htmlspecialchars($data["no-nik"]);
  $nama = htmlspecialchars($data["nama"]);
  $noWa = htmlspecialchars($data["wa"]);
  $jenis = htmlspecialchars($data["jenis"]);
  $tujuan = htmlspecialchars($data["tujuan"]);
  $query = "INSERT INTO tb_permohonan VALUES (NULL, '$nik', '$nama', '$noWa', '$jenis', '$tujuan')";
  mysqli_query($conn, $query);
  $tersimpan = mysqli_affected_rows($conn);
  if ($tersimpan) {
    $query = "SELECT MAX(id_permohonan) AS id FROM tb_permohonan;";
    $data = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($data);
    $id = $result["id"];
    $targetfolder = "assets/berkas/";
    if ($berkas['ktp-alm']) {
      $temp = explode(".", $berkas["ktp-alm"]["name"]); //untuk mengambil nama file gambarnya saja 
      $nama_baru = "sk-kt-" . round(microtime(true)) . '.' . end($temp); //fungsi untuk membuat nama acak
      move_uploaded_file($berkas['ktp-alm']['tmp_name'], $targetfolder . $nama_baru);
      $query = "INSERT INTO tb_berkas VALUES (NULL, '$id', 'ktp-alm', '$nama_baru')";
      mysqli_query($conn, $query);
    }
    if ($berkas['ktp-saksi-1']) {
      $temp = explode(".", $berkas["ktp-saksi-1"]["name"]); //untuk mengambil nama file gambarnya saja 
      $nama_baru = "sk-k1-" . round(microtime(true)) . '.' . end($temp); //fungsi untuk membuat nama acak
      move_uploaded_file($berkas['ktp-saksi-1']['tmp_name'], $targetfolder . $nama_baru);
      $query = "INSERT INTO tb_berkas VALUES (NULL, '$id', 'ktp-saksi-1', '$nama_baru')";
      mysqli_query($conn, $query);
    }
    if ($berkas['ktp-saksi-2']) {
      $temp = explode(".", $berkas["ktp-saksi-2"]["name"]); //untuk mengambil nama file gambarnya saja 
      $nama_baru = "sk-k2-" . round(microtime(true)) . '.' . end($temp); //fungsi untuk membuat nama acak
      move_uploaded_file($berkas['ktp-saksi-2']['tmp_name'], $targetfolder . $nama_baru);
      $query = "INSERT INTO tb_berkas VALUES (NULL, '$id', 'ktp-saksi-2', '$nama_baru')";
      mysqli_query($conn, $query);
    }
    if ($berkas['sk-rs']) {
      $temp = explode(".", $berkas["sk-rs"]["name"]); //untuk mengambil nama file gambarnya saja 
      $nama_baru = "sk-sr-" . round(microtime(true)) . '.' . end($temp); //fungsi untuk membuat nama acak
      move_uploaded_file($berkas['sk-rs']['tmp_name'], $targetfolder . $nama_baru);
      $query = "INSERT INTO tb_berkas VALUES (NULL, '$id', 'sk-rs', '$nama_baru')";
      mysqli_query($conn, $query);
    }
    if ($berkas['s-pengantar']) {
      $temp = explode(".", $berkas["s-pengantar"]["name"]); //untuk mengambil nama file gambarnya saja 
      $nama_baru = "sk-sp-" . round(microtime(true)) . '.' . end($temp); //fungsi untuk membuat nama acak
      move_uploaded_file($berkas['s-pengantar']['tmp_name'], $targetfolder . $nama_baru);
      $query = "INSERT INTO tb_berkas VALUES (NULL, '$id', 's-pengantar', '$nama_baru')";
      mysqli_query($conn, $query);
    }
  }
}
// 
function savePermohonanSkKeramaian($data, $berkas)
{
  global $conn;
  $nik = htmlspecialchars($data["no-nik"]);
  $nama = htmlspecialchars($data["nama"]);
  $noWa = htmlspecialchars($data["wa"]);
  $jenis = htmlspecialchars($data["jenis"]);
  $tujuan = htmlspecialchars($data["tujuan"]);
  $query = "INSERT INTO tb_permohonan VALUES (NULL, '$nik', '$nama', '$noWa', '$jenis', '$tujuan')";
  mysqli_query($conn, $query);
  $tersimpan = mysqli_affected_rows($conn);
  if ($tersimpan) {
    $query = "SELECT MAX(id_permohonan) AS id FROM tb_permohonan;";
    $data = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($data);
    $id = $result["id"];
    $targetfolder = "assets/berkas/";
    if ($berkas['ktp']) {
      $temp = explode(".", $berkas["ktp"]["name"]); //untuk mengambil nama file gambarnya saja 
      $nama_baru = "sr-kt-" . round(microtime(true)) . '.' . end($temp); //fungsi untuk membuat nama acak
      move_uploaded_file($berkas['ktp']['tmp_name'], $targetfolder . $nama_baru);
      $query = "INSERT INTO tb_berkas VALUES (NULL, '$id', 'ktp', '$nama_baru')";
      mysqli_query($conn, $query);
    }
    if ($berkas['kk']) {
      $temp = explode(".", $berkas["kk"]["name"]); //untuk mengambil nama file gambarnya saja 
      $nama_baru = "sr-kk-" . round(microtime(true)) . '.' . end($temp); //fungsi untuk membuat nama acak
      move_uploaded_file($berkas['kk']['tmp_name'], $targetfolder . $nama_baru);
      $query = "INSERT INTO tb_berkas VALUES (NULL, '$id', 'kk', '$nama_baru')";
      mysqli_query($conn, $query);
    }
    if ($berkas['s-pengantar']) {
      $temp = explode(".", $berkas["s-pengantar"]["name"]); //untuk mengambil nama file gambarnya saja 
      $nama_baru = "sr-sp-" . round(microtime(true)) . '.' . end($temp); //fungsi untuk membuat nama acak
      move_uploaded_file($berkas['s-pengantar']['tmp_name'], $targetfolder . $nama_baru);
      $query = "INSERT INTO tb_berkas VALUES (NULL, '$id', 'surat pengantar rt / rw', '$nama_baru');";
      mysqli_query($conn, $query);
    }
  }
}
// 
function auth($data)
{
  global $conn;
  $username = $data["username"];
  $password =  mysqli_real_escape_string($conn, $data["password"]);
  $query = ("SELECT * FROM tb_admin WHERE username = '$username'");
  $data = mysqli_query($conn, $query);
  $result = mysqli_fetch_assoc($data);
  if (password_verify($password, $result["password"])) {
    $_SESSION["nama"] = $result["nama"];
    $_SESSION["username"] = $result["username"];
    $_SESSION["password"] = $result["password"];
    $_SESSION["sukses"] = "Login Berhasil";
  } else {
    $_SESSION['gagal'] = "Login Gagal";
  }
  header("location:index.php");
}

function getCountPermohonan()
{
  global $conn;
  $query = "SELECT * FROM tb_permohonan";
  $data = mysqli_query($conn, $query);
  $jumlahPermohonan = mysqli_num_rows($data);
  return $jumlahPermohonan;
}

function getPermohonan($keyword)
{
  global $conn;
  if (empty($keyword)) {
    $query = "SELECT * FROM tb_permohonan";
    $data = mysqli_query($conn, $query);
    $surat = [];
    while ($row = mysqli_fetch_assoc($data)) {
      $surat[] = $row;
    }
    return $surat;
  } else {
    $query = "SELECT * FROM tb_permohonan WHERE id_permohonan = '$keyword'";
    $data = mysqli_query($conn, $query);
    $surat = mysqli_fetch_assoc($data);
    return $surat;
  }
}
function getBerkas($id)
{
  global $conn;
  $query = "SELECT * FROM tb_berkas WHERE id_permohonan = '$id'";
  $data = mysqli_query($conn, $query);
  $surat = [];
  while ($row = mysqli_fetch_assoc($data)) {
    $surat[] = $row;
  }
  return $surat;
}
function deleteBerkas($file)
{
  if (file_exists("assets/berkas/$file")) {
    unlink("assets/berkas/$file");
  }
}

function savePengiriman($idSurat, $namaPemohon, $noWhatsapp)
{
  global $conn;
  $query = "INSERT INTO tb_pengiriman VALUES  (NULL, '$idSurat', '$namaPemohon', '$noWhatsapp')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
function deletePermohonan($idPermohonan)
{
  global $conn;
  $query = "DELETE FROM tb_permohonan WHERE id_permohonan = '$idPermohonan'";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
function getPengiriman()
{
  global $conn;
  $query = "SELECT * FROM tb_pengiriman";
  $data = mysqli_query($conn, $query);
  $surat = [];
  while ($row = mysqli_fetch_assoc($data)) {
    $surat[] = $row;
  }
  return $surat;
}

function getInventaris($keyword)
{
  global $conn;
  if (empty($keyword)) {
    $query = "SELECT * FROM tb_inventaris";
    $data = mysqli_query($conn, $query);
    $surat = [];
    while ($row = mysqli_fetch_assoc($data)) {
      $surat[] = $row;
    }
    return $surat;
  } else {
    $query = "SELECT * FROM tb_inventaris WHERE id_inventaris = '$keyword'";
    $data = mysqli_query($conn, $query);
    $surat = mysqli_fetch_assoc($data);
    return $surat;
  }
}
function saveInventaris($data)
{
  global $conn;
  $jenisbb = $data['jenis_bb'];
  $asalBb = $data['asal_bb'];
  $keadAw = $data['keadaan_bb_awal_t'];
  $tglP = $data['tgl_pengesahan'];
  $keadAk = $data['keadan_bb_Akhir_t'];
  $ket = $data['keterangan'];

  $query = "INSERT INTO tb_inventaris VALUES (NULL, '$jenisbb', '$asalBb', '$keadAw', '$tglP', '$keadAk', '$ket')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
function updateInventaris($data)
{
  global $conn;
  $key = $_GET['key'];
  $jenisbb = $data['jenis_bb'];
  $asalBb = $data['asal_bb'];
  $keadAw = $data['keadaan_bb_awal_t'];
  $tglP = $data['tgl_pengesahan'];
  $keadAk = $data['keadan_bb_Akhir_t'];
  $ket = $data['keterangan'];
  $query = "UPDATE tb_inventaris SET jenis_bb = '$jenisbb', asal_bb = '$asalBb', keadaan_bb_awal_t = '$keadAw', tgl_pengesahan = '$tglP', keadaan_bb_akhir_t = '$keadAk', keterangan = '$ket' WHERE tb_inventaris.id_inventaris = '$key'";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
function deleteInventaris($key)
{
  global $conn;
  $query = "DELETE FROM tb_inventaris WHERE id_inventaris = '$key'";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
