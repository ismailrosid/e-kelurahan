<?php
include "function.php";
require "dataArr.php";
$jenisSk = $_POST['jenisSk'];
$key = $_POST['key'];
if ($jenisSk == "skUsaha") {
  $surat = getSkUsaha($key);
  echo "       <div class='modal-body'>";
  echo "        <div class='container'>";
  echo "          <div class='row'>";
  echo "         <div class='col-2'>";
  echo "              <img class='img-fluid' src='assets/dist/img/logo-desa.png' alt=''>";
  echo "               </div>";
  echo "           <div class=' col-10 text-center surat-header'>";
  echo "                <div class='h5 lh-1'>PEMERINTAH KABUPATEN KARAWANG <br> KECAMATAN KARAWANG TIMUR <br>
                  <div class='h4'>PEMERINTAH DESA KONDANGJAYA</div>
                </div>";
  echo "                <div class='fs-header-3'>";
  echo "                <div>
                    Email : " . $dataDesa['email'] . " – Telp. " . $dataDesa['telp'] . " Kode Pos 41371
       </div>";
  echo "              <div>
                    Email :  Kode Pos 41371
                  </div>";
  echo "                 </div>";
  echo "               </div>";
  // 
  echo "  <div class='container overflow-auto surat-content'>";
  echo "         <div class='my-3 border-bottom border-1 border-dark'></div>";
  echo "        <div class='h5 text-center mb-2'><span class='border-bottom border-1 border-dark'>SURAT KETERANGAN USAHA</span></div>";
  echo "      <div class='fs-6 text-center my-2'>Nomer : " . $surat['no_surat'] . "</div>";
  echo "     <div style='text-indent: 40px;' class='fs-6 text-justify lh-sm ms-4 mb-3'>Kepala Desa Kondangjaya Kecamatan Karawang Timur, Kabupaten Karawang menerangkan dengan sebenarnya bahwa </div>";
  // Disini K1
  echo " <div class='ms-5'>";
  echo " <div class='ms-3'>";
  echo " <table id='content-skd-domisili' class='w-100 lh-base'>";
  echo " <tr>";
  echo " <td class='surat-col-1'>Nama</td>";
  echo " <td class='surat-col-2'>:</td>";
  echo " <td class='surat-col-3 text-capitalize'>" . $surat['nama_pemohon'] . "</td>";
  echo " </tr>";
  echo " <tr> ";
  echo "     <td class='surat-col-1'>NIK</td>";
  echo "     <td class='surat-col-2'>:</td>";
  echo "     <td class='surat-col-3 text-capitalize'>" . $surat['no_nik'] . "</td> ";
  echo " </tr> ";
  echo "  <tr>";
  echo "      <td class='surat-col-1'>Tempat/Tgl.Lahir</td>";
  echo "      <td class='surat-col-2'>:</td>";
  echo "      <td class='surat-col-3 text-capitalize'> " . $surat['ttl'] . "</td> ";
  echo "    </tr> ";
  echo "     <tr> ";
  echo "       <td class='surat-col-1'>Jenis Kelamin</td>";
  echo "      <td class='surat-col-2'>:</td>";
  echo "      <td class='surat-col-3 text-capitalize'> " . $surat['jenis_kelamin'] . " </td> ";
  echo "   </tr>";
  echo "    <tr>";
  echo "     <td class='surat-col-1'>Agama</td>";
  echo "     <td class='surat-col-2'>:</td>";
  echo "     <td class='surat-col-3 text-capitalize'> " . $surat['agama'] . "</td> ";
  echo "    </tr> ";
  echo "    <tr>";
  echo "      <td class='surat-col-1'>Pekerjaan</td>";
  echo "      <td class='surat-col-2'>:</td>";
  echo "      <td class='surat-col-3 text-capitalize'>" . $surat['pekerjaan'] . "</td>";
  echo "    </tr>";
  echo "    <tr>";
  echo "      <td class='surat-col-1'>Alamat</td> ";
  echo "     <td class='surat-col-2'>:</td> ";
  echo "     <td class='surat-col-3 text-capitalize'>" . $surat['alamat'] . "</td> ";
  echo "    </tr> ";
  echo "  </table> ";
  echo "</div> ";
  echo "</div>";
  echo "<div class='mt-4'>";
  echo " <div class='lh-lg ms-4 text-justify'>";
  echo " <div id='keterangan' class='fs-6'>" . $surat['keterangan'] . "</div> ";
  echo " <div id='berlaku-skDesa' class='fs-6 ms-5 fw-bold'>
      Surat Keterangan Usaha ini berlaku sampai dengan tanggal
      " . tglIndo(date('Y-m-d', strtotime('+30 days'))) . " </div>";
  echo " <div class='fs-6'>
      Demikian Surat Keterangan ini dibuat dengan sebenarnya,untuk dapat
      dipergunakan sesuai dengan keperluannya serta agar yang berkepentingan
      menjadi maklum </div>";
  echo " </div> ";
  echo "</div>";
  echo "<div id='ttd' class='lh-sm my-5 d-grid flex-column justify-content-end'>";
  echo " <div class='fs-6 text-center'>
    Karawang, " . tglIndo(date('Y-m-d')) . " </div>";
  echo "<div class='fs-6 text-center'>" . cekJabatan($surat['jabatan']) . "</div>";
  echo "<div class='fs-6 text-center mt-6'>";
  echo "  <span class='border-bottom border-1 border-dark'>" . $surat['nama_pejabat'] . " </span> </div> ";
  echo "</div>";
  echo "   </div> ";
  echo "   </div> ";
  // footer
  echo "    </div>";
  echo "  </div>";
  echo "   <div class='modal-footer'>";
  echo "        <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Batal</button>";
  echo "          <a target='_blank' href='surat/cetak.php?surat=skUsaha&id=" . $surat['id_surat'] . "' class='btn btn-success'>Cetak</a>
        </div>";
} elseif ($jenisSk == "sktmSekolah") {
  $surat = getSktmSekolah($_POST['key']);
  $dataOrtu = explode(';', $surat['data_ortu']);
  echo "       <div class='modal-body'>";
  echo "        <div class='container'>";
  echo "          <div class='row'>";
  echo "         <div class='col-2'>";
  echo "              <img class='img-fluid' src='assets/dist/img/logo-desa.png' alt=''>";
  echo "               </div>";
  echo "           <div class=' col-10 text-center surat-header'>";
  echo "                <div class='h5 lh-1'>PEMERINTAH KABUPATEN KARAWANG <br> KECAMATAN KARAWANG TIMUR <br>
                  <div class='h4'>PEMERINTAH DESA KONDANGJAYA</div>
                </div>";
  echo "                <div class='fs-header-3'>";
  echo "                <div>
                    Email : " . $dataDesa['email'] . " – Telp. " . $dataDesa['telp'] . " Kode Pos 41371
       </div>";
  echo "              <div>
                    Email :  Kode Pos 41371
                  </div>";
  echo "                 </div>";
  echo "               </div>";
  // 
  echo "<div class='container overflow-auto surat-content'>";
  echo "        <div class='my-3 border-bottom border-1 border-dark'></div>";
  echo "      <div class='h5 text-center'><span class='border-bottom border-1 border-dark'>SURAT KETERANGAN TIDAK MAMPU</span></div>";
  echo "        <div class='fs-6 text-center'>Nomer : " . $surat['no_surat'] . "</div>";
  echo "       <div style='text-indent: 45px;' class='fs-6 my-4 text-justify lh-sm'>Kepala Desa Kondangjaya Kecamatan Karawang Timur Kabupaten Karawang, menerangkan dengan sebenarnya bahwa : </div>";

  // DISINI K2
  echo "<div class='ms-5'>";
  echo "<table class='w-100 lh-1'>";
  echo " <tr> ";
  echo "   <td class='surat-col-1'>Nama Lengkap</td>";
  echo "   <td class='surat-col-2'>:</td>";
  echo "  <td class='surat-col-3 text-capitalize'>" . $surat['nama_ortu'] . "</td>";
  echo "  </tr>";
  echo "  <tr>";
  echo "   <td class='surat-col-1'>NIK</td>";
  echo " <td class='surat-col-2'>:</td>";
  echo "  <td class='surat-col-3 text-capitalize'>" . $surat['no_nik_ortu'] . "</td>";
  echo "  </tr>";
  echo " <tr>";
  echo "   <td class='surat-col-1'>Tempat/Tgl.Lahir</td>";
  echo "  <td class='surat-col-2'>:</td>";
  echo "  <td class='surat-col-3 text-capitalize'>" . $dataOrtu[0] . "</td>";
  echo " </tr>";
  echo "<tr>";
  echo " <td class='surat-col-1'>Jenis Kelamin</td>";
  echo " <td class='surat-col-2'>:</td>";
  echo " <td class='surat-col-3 text-capitalize'>" . $dataOrtu[1] . "</td>";
  echo " </tr>";
  echo "  <tr>";
  echo "   <td class='surat-col-1'>Bangsa/Agama</td>";
  echo "   <td class='surat-col-2'>:</td>";
  echo "   <td class='surat-col-3 text-capitalize'> " . $dataOrtu[2] . " </td>";
  echo " </tr>";
  echo "  <tr>";
  echo "  <td class='surat-col-1'>Pekerjaan</td>";
  echo "  <td class='surat-col-2'>:</td>";
  echo "    <td class='surat-col-3 text-capitalize'>" . $dataOrtu[3] . "</td>";
  echo "  </tr>";
  echo "   <tr>";
  echo "    <td class='surat-col-1'>Tempat Tinggal</td>";
  echo "    <td class='surat-col-2'>:</td> ";
  echo "    <td class='surat-col-3 text-capitalize'>" . $dataOrtu[4] . "</td> ";
  echo "    </tr>";
  echo " </table>";
  echo "</div>";
  // <!-----------------------------END A-------------------------------------->
  // <!-- Pembatas -->
  echo "<div class='fs-6 my-4'>
    Merupakan Bapak/Ibu Kandung dari <span class='ms-2'>:</span>";
  echo "</div>";
  // <!-----------------------------B-------------------------------------->
  echo "<div class='ms-5'>";
  echo " <table class='w-100 lh-1'>";
  echo "  <tr>";
  echo " <td class='surat-col-1'>Nama Lengkap</td>";
  echo "  <td class='surat-col-2'>:</td>";
  echo "  <td class='surat-col-3 text-capitalize'>" . $surat['nama_pemohon'] . "   </td> ";
  echo " </tr>";
  echo " <tr>";
  echo "     <td class='surat-col-1'>NIK</td>";
  echo "  <td class='surat-col-2'>:</td>";
  echo "   <td class='surat-col-3 text-capitalize'> " . $surat['no_nik_pemohon'] . " </td>";
  echo "  </tr>";
  echo "  <tr>";
  echo "    <td class='surat-col-1'>Tempat/Tgl.Lahir</td>";
  echo "    <td class='surat-col-2'>:</td>";
  echo "   <td class='surat-col-3 text-capitalize'>" . $surat['ttl_pemohon'] . "</td>";
  echo "</tr>";
  echo "   <tr>";
  echo "    <td class='surat-col-1'>Jenis Kelamin</td>";
  echo "    <td class='surat-col-2'>:</td>";
  echo "    <td class='surat-col-3 text-capitalize'>
        " . $surat['jenis_kelamin_pemohon'] . "</td> ";
  echo " </tr>";
  echo "   <tr> ";
  echo " <td class='surat-col-1'>Bangsa/Agama</td> ";
  echo "  <td class='surat-col-2'>:</td>";
  echo "  <td class='surat-col-3 text-capitalize'>
        " . $surat['bangsa_agama_pemohon'] . " </td>";
  echo " </tr>";
  echo "   <tr> ";
  echo " <td class='surat-col-1'>Pekerjaan</td> ";
  echo "  <td class='surat-col-2'>:</td>";
  echo "  <td class='surat-col-3 text-capitalize'>
        " . $surat['pekerjaan_pemohon'] . " </td>";
  echo " </tr>";

  echo "  <tr> ";
  echo "   <td class='surat-col-1'>Tempat Tinggal</td>";
  echo "   <td class='surat-col-2'>:</td>";
  echo "    <td class='surat-col-3 text-capitalize'>
        " . $surat['tempat_tinggal_pemohon'] . "
      </td>";
  echo "</tr>";
  echo "</table>";
  echo "</div>";
  // <!-----------------------------END B-------------------------------------->
  echo "<div class='lh-sm text-justify'>";
  echo " <div style='text-indent: 45px' class='fs-6 my-4'>
    Orang tersebut adalah benar penduduk Desa Kondangjaya dan benar-benar
    keadaan tidak mampu / miskin / berpenghasilan rendah.
    </div>";
  echo " <div style='text-indent: 45px' class='fs-6 my-4'>
    Demikian Surat Keterangan ini dibuat dengan sebenarnya dan kepada pihak yang
    bersangkutan agar menjadi tahu dan maklum adanya.
  </div>";
  echo "</div>";
  echo "<div class='lh-sm my-3 d-grid flex-column justify-content-end'>";
  echo "  <div class='fs-6 text-center'>
    Karawang,
    " . tglIndo(date('Y-m-d')) . " </div>";
  echo " <div class='fs-6 text-center'>" . cekJabatan($surat['jabatan']) . "</div>";
  echo "  <div class='fs-6 text-center text-decoration-underline mt-6'>" . $surat['nama_pejabat'] . "
  </div>";
  echo "</div>";
  echo "    </div>";
  echo " </div>";
  // footer
  echo "    </div>";
  echo "  </div>";
  echo "   <div class='modal-footer'>";
  echo "        <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Batal</button>";
  echo "          <a target='_blank' href='surat/cetak.php?surat=sktmSekolah&id=" . $surat['id_surat'] . "' class='btn btn-success'>Cetak</a>
        </div>";
} elseif ($jenisSk == "skDesa") {
  $data = explode(",", $key);
  $key = $data[0];
  $jenis = $data[1];
  $surat = getSkDesa($key);
  echo "       <div class='modal-body'>";
  echo "        <div class='container'>";
  echo "          <div class='row'>";
  echo "         <div class='col-2'>";
  echo "              <img class='img-fluid' src='assets/dist/img/logo-desa.png' alt=''>";
  echo "               </div>";
  echo "           <div class=' col-10 text-center surat-header'>";
  echo "                <div class='h5 lh-1'>PEMERINTAH KABUPATEN KARAWANG <br> KECAMATAN KARAWANG TIMUR <br>
                  <div class='h4'>PEMERINTAH DESA KONDANGJAYA</div>
                </div>";
  echo "                <div class='fs-header-3'>";
  echo "                <div>
                      Email : " . $dataDesa['email'] . " – Telp. " . $dataDesa['telp'] . " Kode Pos 41371
       </div>";
  echo "              <div>
                    Email :  Kode Pos 41371
                  </div>";
  echo "                 </div>";
  echo "               </div>";
  // 
  echo "<div class='container overflow-auto surat-content'>";
  echo "          <div class='my-3 border-bottom border-1 border-dark'></div>";
  echo "          <div class='h5 text-center mb-2'><span class='border-bottom border-1 border-dark'>SURAT KETERANGAN DESA</span></div>";

  echo "      <div class='fs-6 text-center mv-2'>Nomer : " . $surat['no_surat'] . "</div>";
  echo "       <div class='fs-6 text-justify lh-sm ms-4 mb-3'>Yang bertandatangan dibawah ini :</div>";
  echo "        <div class='ms-5'>";
  echo "          <table class='w-100 lh-base'>";
  echo "             <tr>";
  echo "               <td class='surat-col-1'>Nama</td>";
  echo "               <td class='surat-col-2'>:</td>";
  echo "                <td class='surat-col-3 text-capitalize'>" . $surat['nama_pejabat'] . "</td>";
  echo " </tr>";
  echo " <tr>";
  echo " <td class='surat-col-1'>Jabatan</td>";
  echo " <td class='surat-col-2'>:</td>";
  echo " <td class='surat-col-3 text-capitalize'>" . cekJabatan($surat['jabatan']) . "</td>";
  echo " </tr>";
  echo " </table>";
  echo " </div>";
  echo " <div class='fs-6 text-justify lh-sm ms-4 my-2'>Menerangkan dengan sebenarnya bahwa :</div>";
  echo " <div class='ms-5'>";
  echo " <table id='content-skd-domisili' class='w-100 lh-base'>";
  echo " <tr>";
  echo " <td class='surat-col-1'>Nama</td>";
  echo " <td class='surat-col-2'>:</td>";
  echo " <td class='surat-col-3 text-capitalize'>" . $surat['nama_pemohon'] . "</td>";
  echo " </tr>";
  echo " <tr>";
  echo " <td class='surat-col-1'>NIK</td>";
  echo " <td class='surat-col-2'>:</td>";
  echo " <td class='surat-col-3 text-capitalize'>" . $surat['no_nik'] . "</td>";
  echo " </tr>";
  echo " <tr>";
  echo " <td class='surat-col-1'>Tempat/Tgl.Lahir</td>";
  echo " <td class='surat-col-2'>:</td>";
  echo " <td class='surat-col-3 text-capitalize'>" . $surat['ttl'] . "</td>";
  echo " </tr>";
  echo " <tr>";
  echo " <td class='surat-col-1'>Jenis Kelamin</td>";
  echo " <td class='surat-col-2'>:</td>";
  echo " <td class='surat-col-3 text-capitalize'>" . $surat['jenis_kelamin'] . " </td>";
  echo " </tr>";
  echo " <tr>";
  echo " <td class='surat-col-1'>Agama</td>";
  echo " <td class='surat-col-2'>:</td>";
  echo " <td class='surat-col-3 text-capitalize'>" . $surat['agama'] . "</td>";
  echo " </tr>";
  echo " <tr>";
  echo " <td class='surat-col-1'>Pekerjaan</td>";
  echo " <td class='surat-col-2'>:</td>";
  echo " <td class='surat-col-3 text-capitalize'>" . $surat['pekerjaan'] . "</td>";
  echo " </tr>";
  echo " <tr>";
  echo " <td class='surat-col-1'>Alamat</td>";
  echo " <td class='surat-col-2'>:</td>";
  echo " <td class='surat-col-3 text-capitalize'>" . $surat['alamat'] . "</td>";
  echo " </tr>";
  echo " <tr>";
  echo " <td class='surat-col-1'>Menerangkan</td>";
  echo " <td class='surat-col-2'>:</td>";
  echo " <td align='justify' class='surat-col-3'>";
  if ($surat['jenis_sk_desa'] == 'skd domisili mailing kades' || $surat['jenis_sk_desa'] == 'skd domisili mailing sekdes') {
    $PecahStr = explode('/', $surat['keterangan']);
    echo  $PecahStr[0] . '/' . $PecahStr[1] . '/' . $PecahStr[2];
  } else {
    echo  $surat['keterangan'];
  }
  echo " </td>";
  echo " </tr>";
  echo " </table>";
  echo " </div>";
  echo " <div class='mt-3'>";
  echo " <div class='lh-sm ms-4 text-justify'>";
  if ($surat['jenis_sk_desa'] == 'skd domisili mailing kades' || $surat['jenis_sk_desa'] == 'skd domisili mailing sekdes') { {
    }
    echo " <div class='fs-6'>Surat Keterangan ini berlaku sampai dengan " . tglIndo(date('Y-m-d', strtotime('+30 days'))) . "";
    echo " </div>";
  }
  echo " <div class='fs-6 my-3'>
      Demikian Surat Keterangan di buat dengan sebenarnya,untuk agar yang berkepentingan menjadi </div>";
  echo " </div>";
  echo " </div>";
  echo " <div class='my-3 lh-sm d-grid flex-column justify-content-end'>";
  echo " <div class='fs-6 text-center surat-content'>Karawang, " . tglIndo(date('Y-m-d')) . "</div>";
  echo " <div class='fs-6 text-center surat-content'>". cekJabatan($surat['jabatan']) . "</div>";
  echo " <div class='fs-6 text-center mt-6'><span class='border-bottom border-1 border-dark surat-content'>" . $surat['nama_pejabat'] . "</span></div>";
  echo " </div>";
  if ($surat['jenis_sk_desa'] == 'skd domisili mailing kades' || $surat['jenis_sk_desa'] == 'skd domisili mailing sekdes') {
    echo " <div class='fw-bold ms-4'><span class='border-bottom border-1 border-dark'> Catatan :</span></div>";
    echo " <div class='fs-6 text-justify lh-sm ms-4 mb-3'>";
    echo " <ol>";
    echo " <li>
      Surat Keterangan bersifat sementara
    </li>";
    echo " <li>
      Bukan sebagai pengganti Kartu Identitas Pribadi
    </li>";
    echo " <li>
      Tidak diperkenankan umtuk digunakan sebagai pengganti alat Transaksi apapun
    </li>";
    echo " <li>
      Tidak diperkenankan untuk penyalahgunaan tentang surat keterangan
    </li>";
    echo " </ol>";
    echo " </div>";
  }
  echo "    </div>";
  echo " </div>";

  echo "    </div>";
  echo "  </div>";
  echo "   <div class='modal-footer'>";
  echo "        <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Batal</button>";
  echo "          <a target='_blank' href='surat/cetak.php?surat=skDesa&id=" . $surat['id_surat'] . "' class='btn btn-success'>Cetak</a>
        </div>";
} elseif ($jenisSk == "skKeramaian") {
  $surat = getSkKeramaian($key);
  echo "       <div class='modal-body'>";
  echo "        <div class='container'>";
  echo "          <div class='row'>";
  echo "         <div class='col-2'>";
  echo "              <img class='img-fluid' src='assets/dist/img/logo-desa.png' alt=''>";
  echo "               </div>";
  echo "           <div class=' col-10 text-center surat-header'>";
  echo "                <div class='h5 lh-1'>PEMERINTAH KABUPATEN KARAWANG <br> KECAMATAN KARAWANG TIMUR <br>
                  <div class='h4'>PEMERINTAH DESA KONDANGJAYA</div>
                </div>";
  echo "                <div class='fs-header-3'>";
  echo "                <div>
                    Email : " . $dataDesa['email'] . " – Telp. " . $dataDesa['telp'] . " Kode Pos 41371
       </div>";
  echo "              <div>
                    Email :  Kode Pos 41371
                  </div>";
  echo "                 </div>";
  echo "               </div>";
  echo "          <div class='container overflow-auto surat-content'>";
  echo "        <div class='my-3 border-bottom border-1 border-dark'></div>";
  echo "        <div class='h5 text-center mb-2'><span class='border-bottom border-1 border-dark'>SURAT KETERANGAN IZIN KERAMAIAN</span></div>";
  echo "            <div class='fs-6 text-center mb-4'>Nomer : " . $surat['no_surat'] . "</div>";
  echo "          <div class='ms-4'>";
  echo "               <table id='content-skDesa' class='w-100 lh-base'>";
  echo "              <tr id='nama-pemohon'>";
  echo "                 <td class='surat-col-1'>Nama</td>";
  echo "                <td class='surat-col-2'>:</td>";
  echo "               <td class='surat-col-3 text-capitalize'>" . $surat['nama_pemohon'] . "</td>";
  echo "                </tr>";
  echo "            <tr id='tempat-tglLahir'>";
  echo "                 <td class='surat-col-1'>Tempat/Tgl.Lahir</td>";
  echo "             <td class='surat-col-2'>:</td>";
  echo "                 <td class='surat-col-3 text-capitalize'>" . $surat['ttl'] . "</td>";
  echo "            </tr>";
  echo "               <tr id='agama'>";
  echo "                <td class='surat-col-1'>Agama</td>";
  echo "                 <td class='surat-col-2'>:</td>";
  echo "                 <td class='surat-col-3 text-capitalize'>" . $surat['agama'] . "</td>";
  echo "                 </tr>";
  echo "               <tr id='pekerjaan'>";
  echo "              <td class='surat-col-1'>Pekerjaan</td>";
  echo "            <td class='surat-col-2'>:</td>";
  echo "                  <td class='surat-col-3 text-capitalize'>" . $surat['pekerjaan'] . "</td>";
  echo "               </tr>";
  echo "              <tr id='alamat'>";
  echo "                 <td class='surat-col-1'>Alamat</td>";
  echo "                <td class='surat-col-2'>:</td>";
  echo "                 <td class='surat-col-3'>" . $surat['alamat'] . "</td>";
  echo "               </tr>";
  echo "               <tr id='waktu'>";
  echo "               <td style=' vertical-align: top;' class='surat-col-1'>Waktu</td>";
  echo "              <td style=' vertical-align: top;' class='surat-col-2'>:</td>";
  echo "              <td style=' vertical-align: top;' class=' surat-col-3 text-capitalize'>";
  echo "                <table class='w-100 lh-base'>";
  echo "                 <tr id='hari'>";
  echo "                  <td style='width: 15%;'>Hari </td>";
  echo "                    <td class='surat-col-2'>:</td>";
  echo "                      <td class='surat-col-3'>" . $surat['hari'] . "</td>";
  echo "                   </tr>";
  echo "                   <tr id='tanggal'>";
  echo "                   <td style='width: 15%;'>Tanggal</td>";
  echo "                   <td class='surat-col-2'>:</td>";
  echo "                 <td class='surat-col-3'>" . $surat['tanggal'] . "</td>";
  echo "               </tr>";
  echo "                </table>";
  echo "               </td>";
  echo "            </tr>";
  echo "           <tr id='tempat-pelaksanaan'>";
  echo "           <td class='surat-col-1'>Tempat Pelaksanaan</td>";
  echo "            <td class='surat-col-2'>:</td>";
  echo "           <td class='surat-col-3 text-capitalize'>" . $surat['tempat_pelaksanaan'] . "</td>";
  echo "        <tr id='hiburan'>";
  echo "          <td class='surat-col-1'>Hiburan</td>";
  echo "          <td class='surat-col-2'>:</td>";
  echo "         <td class='surat-col-3 text-capitalize'>" . $surat['hiburan'] . "</td>";
  echo "       </tr>";
  echo "     </table>";
  echo "      </div>";
  echo "      <div class='mt-2'>";
  echo "        <div class='lh-sm ms-4 text-justif mb-4'>";
  echo "         <div class='fs-6'>
                 Adapun orang tersebut diatas telah memohon Izin Keramaian kepada kami bahwa pada prinsipnya tidak keberatan atas permohonan yang bersangkutan dengan ketentuan sebagai berikut :
           </div>";
  echo "       <div class='fs-6 my-2'>";
  echo "         <ol>";
  echo "          <li>
                     Surat Keterangan bersifat sementara
               </li>";
  echo "          <li>
                     Bukan sebagai pengganti Kartu Identitas Pribadi
               </li>";
  echo "      <li>
                     Tidak diperkenankan umtuk digunakan sebagai pengganti alat Transaksi apapun
                </li>";
  echo "         <li>
                     Tidak diperkenankan untuk penyalahgunaan tentang surat keterangan
               </li>";
  echo "       </ol>";
  echo "     </div>";
  echo "     <div class='fs-6'>
                 Demikian Surat izin ini dibuat agar pihak yang berwajib / berkepentingan agar hendaknya menjadi tahu dan maklum.
             </div>";
  echo "     </div>";
  echo "     <div class='fs-6 text-center mb-3'>Mengetahui :</div>";
  echo "     <div class='ms-4 lh-sm my-3 d-flex justify-content-between'>";
  echo "       <div class='kiri'>";
  echo "          <div style='visibility: hidden;' class='fs-6 text-center'>Karawang, " . tglIndo(date('Y-m-d')) . "</div>";
  echo "         <div class='fs-6 text-center mt-3 text-capitalize'>" . cekJabatan($surat['jabatan_kiri']) . "</div>";
  echo "        <div class='fs-6 text-center mt-6'>(" . $surat['nama_ttd_kiri'] . ")</div>";
  echo "   </div>";
  echo "     <div>";
  echo "       <div style='visibility: hidden;' class='fs-6 text-center'>Karawang, " . tglIndo(date('Y-m-d')) . "</div>";
  echo "       <div class='fs-6 text-center mt-3 text-capitalize'>" . cekJabatan($surat['jabatan_tengah']) . "</div>";
  echo "       <div class='fs-6 text-center mt-6'>(" . $surat['nama_ttd_tengah'] . ")</div>";
  echo "     </div>";
  echo "     <div>";
  echo "        <div class='fs-6 text-center'>Karawang, " . tglIndo(date('Y-m-d')) . "</div>";
  echo "      <div class='fs-6 text-center mt-3 text-capitalize'>" . cekJabatan($surat['jabatan_kanan']) . "</div>";
  echo "       <div class='fs-6 text-center mt-6'>(" . $surat['nama_ttd_kanan'] . ")</div>";
  echo "     </div>";
  echo "    </div>";
  echo "     </div>";
  echo "    </div>";
  echo "          </div>";
  echo "            </div>";
  echo "         </div>";
  echo "        <div class='modal-footer'>";
  echo "         <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Batal</button>";
  echo "          <a target='_blank' href='surat/cetak.php?surat=skKeramaian&id=" . $surat['id_surat'] . "' class='btn btn-success'>Cetak</a>
        </div>";
  echo "       </div>";
} elseif ($jenisSk = "skKematian") {
  $surat = getSkKematian($key);
  $dataPelapor = explode(';', $surat['data_pelapor']);
  echo "<div style='font-family: 'Times New Roman', Times, serif;' class='modal-body'>
          <div class='container'>
 <div class='surat-content'>
           <div class='row'>
             <div class='col-12'>
               <div class='lh-sm my-3'>
                 <div class='fs-10 text-center'>
                   ARSIP UNTUK YANG BERSANGKUTAN
                 </div>
                 <div class='fs-7 text-center'>
                   SURAT KETERANGAN KEMATIAN
                 </div>
                 <div class='fs-9 text-center'>Nomer : " . $surat['no_surat'] . "</div>
               </div>
               <div style='text-indent: 35px;' class='fs-9 text-justify lh-sm mb-3'>Yang bertandatangan dibawah ini, menerangkan bahwa :</div>
               <div id='content-skKematian'>
                 <table class='w-100 lh-1 fs-9'>
                   <tr id='nama-alm'>
                     <td class='surat-col-11'>Nama</td>
                     <td class='surat-col-22'>:</td>
                     <td class='surat-col-33 text-capitalize'>" . $surat['nama_alm'] . "</td>
                   </tr>
                   <tr id='no-nikAlm'>
                     <td class='surat-col-11'>NIK</td>
                     <td class='surat-col-22'>:</td>
                     <td class='surat-col-33 text-capitalize'>" . $surat['no_nik_alm'] . "</td>
                   </tr>
                   <tr id='tempat-tglLahirUmur'>
                     <td class='surat-col-11'>Tempat.Tgl.Lahir/Umur</td>
                     <td class='surat-col-22'>:</td>
                     <td class='surat-col-33 text-capitalize'>" . $surat['ttlu_alm'] . "</td>
                   </tr>
                   <tr id='pekerjaan-alm'>
                     <td class='surat-col-11'>Pekerjaan</td>
                     <td class='surat-col-22'>:</td>
                     <td class='surat-col-33 text-capitalize'>" . $surat['pekerjaan_alm'] . "</td>
                   </tr>
                   <tr id='alamat-alm'>
                     <td style=' vertical-align: top;' class='surat-col-11'>Alamat</td>
                     <td style=' vertical-align: top;' class='surat-col-22'>:</td>
                     <td style=' vertical-align: top;' class='surat-col-33 text-capitalize'>
                       <div>" . $surat['alamat_alm'] . "</div>
                       <div>Desa Kondangjaya Kec. Karawang Timur </div>
                     </td>
                     <td><input name='alamat-alm' type='hidden'></td>
                   </tr>
                 </table>
                 <div class='fs-9 text-justify lh-sm my-3'>Telah meninggal dunia pada :</div>
                 <table class='w-100 lh-1 fs-9'>
                   <tr id='hari'>
                     <td class='surat-col-11'>Hari</td>
                     <td class='surat-col-22'>:</td>
                     <td class='surat-col-33'>" . $dataPelapor[0] . "</td>
                   </tr>
                   <tr id='tanggal'>
                     <td class='surat-col-11'>Tanggal</td>
                     <td class='surat-col-22'>:</td>
                     <td class='surat-col-33'>" . $dataPelapor[1] . "</td>
                   </tr>
                   <tr id='pukul'>
                     <td class='surat-col-11'>Pukul</td>
                     <td class='surat-col-22'>:</td>
                     <td class='surat-col-33'>" . $dataPelapor[2] . "</td>
                   </tr>
                   <tr id='penyebab-kematian'>
                     <td class='surat-col-11'>Penyebab Kematian</td>
                     <td class='surat-col-22'>:</td>
                     <td class='surat-col-33 text-capitalize'>" . $dataPelapor[3] . "</td>
                   </tr>
                 </table>
                 <div style='text-indent: 35px;' class='fs-9 text-justify lh-sm mb-3 my-3'>Surat keterangan ini dibuat berdasarkan
                   Keterangan pelapor </div>
                 <table class='w-100 lh-1 fs-9'>
                   <tr id='nama-pelapor'>
                     <td class='surat-col-11'>Nama</td>
                     <td class='surat-col-22'>:</td>
                     <td class='surat-col-33 text-capitalize'>" . $surat['nama_pelapor'] . "</td>
                   </tr>
                   <tr id='no-nikPelapor'>
                     <td class='surat-col-11'>NIK</td>
                     <td class='surat-col-22'>:</td>
                     <td class='surat-col-33 text-capitalize'>" . $surat['no_nik_pelapor'] . "</td>
                   </tr>
                   <tr id='umur-pelapor'>
                     <td class='surat-col-11'>Umur</td>
                     <td class='surat-col-22'>:</td>
                     <td class='surat-col-33 text-capitalize'>" . $dataPelapor[4] . "</td>
                   </tr>
                   <tr id='pekerjaan-pelapor'>
                     <td class='surat-col-11'>Pekerjaan</td>
                     <td class='surat-col-22'>:</td>
                     <td class='surat-col-33 text-capitalize'>" . $dataPelapor[5] . "</td>
                   </tr>
                   <tr id='alamat-pelapor'>
                     <td style=' vertical-align: top;' class='surat-col-11'>Alamat</td>
                     <td style=' vertical-align: top;' class='surat-col-22'>:</td>
                     <td style=' vertical-align: top;' class='surat-col-33 text-capitalize'>
                       <div>" . $dataPelapor[6] . "</div>
                       <div>Desa Kondangjaya Kec. Karawang Timur </div>
                     </td>
                     <td><input name='alamat-pelapor' type='hidden'></td>
                   </tr>
                   <tr id='relasi'>
                     <td class='surat-col-11'>Hubungan Pelapor dengan yang meninggal dunia</td>
                     <td class='surat-col-22'>:</td>
                     <td class='surat-col-33 text-capitalize'>" . $dataPelapor[7] . "</td>
                   </tr>
                 </table>
               </div>
               <div id='ttd' class='lh-sm my-3 d-grid flex-column justify-content-end'>
                 <div class='fs-6 fs-9 text-center'>Karawang, " . tglIndo(date('Y-m-d')) . "</div>
                 <div class='fs-6 fs-9 text-center'>" . cekJabatan($surat['jabatan']) . "</div>
                 <div class='fs-6 fs-9 fw-bold text-center mt-6'><span class='border-bottom border-1 border-dark'>" . $surat['nama_pejabat'] . "</span></div>
               </div>
             </div>
           </div>
         </div>
        
          </div>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Batal</button>
          <a target='_blank' href='surat/cetak.php?surat=skKematian&id=" . $surat['id_surat'] . "' type='submit' name='submit' class='btn btn-success'>Cetak</a>
        </div>";
}
