       <style>
         .fs-7 {
           font-size: 0.91rem !important;
         }

         .fs-8 {
           font-size: 0.86rem !important;
         }

         .fs-9 {
           font-size: 0.84rem !important;
         }

         .fs-10 {
           font-size: 0.79rem !important;
         }

         .surat-col-11 {
           width: 35%;
         }

         .surat-col-22 {
           width: 3%;
         }

         .surat-col-33 {
           width: 57%;
         }
       </style>
       <?php if (isset($_GET['id'])) {
          $surat = getSkKematian($_GET['id']);
          $dataPelapor = explode(';', $surat['data_pelapor']);
        ?>
         <div class="surat-content">
           <div class="row">
             <div class="col-6">
               <div class="lh-sm my-3">
                 <div class="fs-10 text-center">
                   ARSIP UNTUK YANG BERSANGKUTAN
                 </div>
                 <div class="fs-7 text-center">
                   SURAT KETERANGAN KEMATIAN
                 </div>
                 <div class="fs-9 text-center">Nomer : <?= $surat['no_surat']; ?></div>
               </div>
               <div style="text-indent: 35px;" class="fs-9 text-justify lh-sm mb-3">Yang bertandatangan dibawah ini, menerangkan bahwa :</div>
               <div id="content-skKematian">
                 <table class="w-100 lh-1 fs-9">
                   <tr id="nama-alm">
                     <td class="surat-col-11">Nama</td>
                     <td class="surat-col-22">:</td>
                     <td class="surat-col-33 text-capitalize"><?= $surat['nama_alm']; ?></td>
                   </tr>
                   <tr id="no-nikAlm">
                     <td class="surat-col-11">NIK</td>
                     <td class="surat-col-22">:</td>
                     <td class="surat-col-33 text-capitalize"><?= $surat['no_nik_alm']; ?></td>
                   </tr>
                   <tr id="tempat-tglLahirUmur">
                     <td class="surat-col-11">Tempat.Tgl.Lahir/Umur</td>
                     <td class="surat-col-22">:</td>
                     <td class="surat-col-33 text-capitalize"><?= $surat['ttlu_alm']; ?></td>
                   </tr>
                   <tr id="pekerjaan-alm">
                     <td class="surat-col-11">Pekerjaan</td>
                     <td class="surat-col-22">:</td>
                     <td class="surat-col-33 text-capitalize"><?= $surat['pekerjaan_alm']; ?></td>
                   </tr>
                   <tr id="alamat-alm">
                     <td style=" vertical-align: top;" class="surat-col-11">Alamat</td>
                     <td style=" vertical-align: top;" class="surat-col-22">:</td>
                     <td style=" vertical-align: top;" class="surat-col-33 text-capitalize">
                       <div><?= $surat['alamat_alm']; ?></div>
                       <div>Desa Kondangjaya Kec. Karawang Timur </div>
                     </td>
                     <td><input name="alamat-alm" type="hidden"></td>
                   </tr>
                 </table>
                 <div class="fs-9 text-justify lh-sm my-3">Telah meninggal dunia pada :</div>
                 <table class="w-100 lh-1 fs-9">
                   <tr id="hari">
                     <td class="surat-col-11">Hari</td>
                     <td class="surat-col-22">:</td>
                     <td class="surat-col-33"><?= $dataPelapor[0]; ?></td>
                   </tr>
                   <tr id="tanggal">
                     <td class="surat-col-11">Tanggal</td>
                     <td class="surat-col-22">:</td>
                     <td class="surat-col-33"><?= $dataPelapor[1]; ?></td>
                   </tr>
                   <tr id="pukul">
                     <td class="surat-col-11">Pukul</td>
                     <td class="surat-col-22">:</td>
                     <td class="surat-col-33"><?= $dataPelapor[2]; ?></td>
                   </tr>
                   <tr id="penyebab-kematian">
                     <td class="surat-col-11">Penyebab Kematian</td>
                     <td class="surat-col-22">:</td>
                     <td class="surat-col-33"><?= $dataPelapor[3]; ?></td>
                   </tr>
                 </table>
                 <div style="text-indent: 35px;" class="fs-9 text-justify lh-sm mb-3 my-3">Surat keterangan ini dibuat berdasarkan
                   Keterangan pelapor </div>
                 <table class="w-100 lh-1 fs-9">
                   <tr id="nama-pelapor">
                     <td class="surat-col-11">Nama</td>
                     <td class="surat-col-22">:</td>
                     <td class="surat-col-33 text-capitalize"><?= $surat['nama_pelapor']; ?></td>
                   </tr>
                   <tr id="no-nikPelapor">
                     <td class="surat-col-11">NIK</td>
                     <td class="surat-col-22">:</td>
                     <td class="surat-col-33 text-capitalize"><?= $surat['no_nik_pelapor']; ?></td>
                   </tr>
                   <tr id="umur-pelapor">
                     <td class="surat-col-11">Umur</td>
                     <td class="surat-col-22">:</td>
                     <td class="surat-col-33"><?= $dataPelapor[4]; ?></td>
                   </tr>
                   <tr id="pekerjaan-pelapor">
                     <td class="surat-col-11">Pekerjaan</td>
                     <td class="surat-col-22">:</td>
                     <td class="surat-col-33"><?= $dataPelapor[5]; ?></td>
                   </tr>
                   <tr id="alamat-pelapor">
                     <td style=" vertical-align: top;" class="surat-col-11">Alamat</td>
                     <td style=" vertical-align: top;" class="surat-col-22">:</td>
                     <td style=" vertical-align: top;" class="surat-col-33 text-capitalize">
                       <div><?= $dataPelapor[6]; ?></div>
                       <div>Desa Kondangjaya Kec. Karawang Timur </div>
                     </td>
                     <td><input name="alamat-pelapor" type="hidden"></td>
                   </tr>
                   <tr id="relasi">
                     <td class="surat-col-11">Hubungan Pelapor dengan yang meninggal dunia</td>
                     <td class="surat-col-22">:</td>
                     <td class="surat-col-33"><?= $dataPelapor[7]; ?></td>
                   </tr>
                 </table>
               </div>
               <div id="ttd" class="lh-sm my-3 d-grid flex-column justify-content-end">
                 <div class="fs-6 fs-9 text-center">Karawang, <?= tglIndo(date('Y-m-d')); ?></div>
                 <div class="fs-6 fs-9 text-center"><?= cekJabatan($surat['jabatan']); ?></div>
                 <div class="fs-6 fs-9 fw-bold text-center mt-6"><span class="border-bottom border-1 border-dark"><?= $surat['nama_pejabat']; ?></span></div>
               </div>
             </div>
           </div>
         </div>
       <?php } else { ?>
         <div class="overflow-auto surat-content">
           <div class="lh-sm my-3">
             <div class="fs-10 text-center">
               ARSIP UNTUK YANG BERSANGKUTAN
             </div>
             <div class="fs-7 text-center">
               SURAT KETERANGAN KEMATIAN
             </div>
             <div class="fs-9 text-center">Nomer : 474/..../Ds/./...</div>
           </div>
           <div style="text-indent: 35px;" class="fs-9 text-justify lh-sm mb-3">Yang bertandatangan dibawah ini, menerangkan bahwa :</div>
           <div id="content-skKematian">
             <table class="w-100 lh-1 fs-9">
               <tr id="nama-alm">
                 <td class="surat-col-11">Nama</td>
                 <td class="surat-col-22">:</td>
                 <td class="surat-col-33 text-capitalize"></td>
                 <td><input name="nama-alm" type="hidden"></td>
               </tr>
               <tr id="no-nikAlm">
                 <td class="surat-col-11">NIK</td>
                 <td class="surat-col-22">:</td>
                 <td class="surat-col-33 text-capitalize"></td>
                 <td><input name="no-nikAlm" type="hidden"></td>
               </tr>
               <tr id="tempat-tglLahirUmur">
                 <td class="surat-col-11">Tempat.Tgl.Lahir/Umur</td>
                 <td class="surat-col-22">:</td>
                 <td class="surat-col-33 text-capitalize"></td>
                 <td><input name="tempat-tglLahirUmur" type="hidden"></td>
               </tr>
               <tr id="pekerjaan-alm">
                 <td class="surat-col-11">Pekerjaan</td>
                 <td class="surat-col-22">:</td>
                 <td class="surat-col-33 text-capitalize"></td>
                 <td><input name="pekerjaan-alm" type="hidden"></td>
               </tr>
               <tr id="alamat-alm">
                 <td style=" vertical-align: top;" class="surat-col-11">Alamat</td>
                 <td style=" vertical-align: top;" class="surat-col-22">:</td>
                 <td style=" vertical-align: top;" class="surat-col-33 text-capitalize">
                   <div></div>
                   <div>Desa Kondangjaya Kec. Karawang Timur </div>
                 </td>
                 <td><input name="alamat-alm" type="hidden"></td>
               </tr>
             </table>
             <div class="fs-9 text-justify lh-sm my-3">Telah meninggal dunia pada :</div>
             <table class="w-100 lh-1 fs-9">
               <tr id="hari">
                 <td class="surat-col-11">Hari</td>
                 <td class="surat-col-22">:</td>
                 <td class="surat-col-33"></td>
                 <td><input name="hari" type="hidden"></td>
               </tr>
               <tr id="tanggal">
                 <td class="surat-col-11">Tanggal</td>
                 <td class="surat-col-22">:</td>
                 <td class="surat-col-33 text-capitalize"></td>
                 <td><input name="tanggal" type="hidden"></td>
               </tr>
               <tr id="pukul">
                 <td class="surat-col-11">Pukul</td>
                 <td class="surat-col-22">:</td>
                 <td class="surat-col-33 text-capitalize"></td>
                 <td><input name="pukul" type="hidden"></td>
               </tr>
               <tr id="penyebab-kematian">
                 <td class="surat-col-11">Penyebab Kematian</td>
                 <td class="surat-col-22">:</td>
                 <td class="surat-col-33 text-capitalize"></td>
                 <td><input name="penyebab-kematian" type="hidden"></td>
               </tr>
             </table>
             <div style="text-indent: 35px;" class="fs-9 text-justify lh-sm mb-3 my-3">Surat keterangan ini dibuat berdasarkan
               Keterangan pelapor </div>
             <table class="w-100 lh-1 fs-9">
               <tr id="nama-pelapor">
                 <td class="surat-col-11">Nama</td>
                 <td class="surat-col-22">:</td>
                 <td class="surat-col-33"></td>
                 <td><input name="nama-pelapor" type="hidden"></td>
               </tr>
               <tr id="no-nikPelapor">
                 <td class="surat-col-11">NIK</td>
                 <td class="surat-col-22">:</td>
                 <td class="surat-col-33 text-capitalize"></td>
                 <td><input name="no-nikPelapor" type="hidden"></td>
               </tr>
               <tr id="umur-pelapor">
                 <td class="surat-col-11">Umur</td>
                 <td class="surat-col-22">:</td>
                 <td class="surat-col-33 text-capitalize"></td>
                 <td><input name="umur-pelapor" type="hidden"></td>
               </tr>
               <tr id="pekerjaan-pelapor">
                 <td class="surat-col-11">Pekerjaan</td>
                 <td class="surat-col-22">:</td>
                 <td class="surat-col-33 text-capitalize"></td>
                 <td><input name="pekerjaan-pelapor" type="hidden"></td>
               </tr>
               <tr id="alamat-pelapor">
                 <td style=" vertical-align: top;" class="surat-col-11">Alamat</td>
                 <td style=" vertical-align: top;" class="surat-col-22">:</td>
                 <td style=" vertical-align: top;" class="surat-col-33 text-capitalize">
                   <div></div>
                   <div>Desa Kondangjaya Kec. Karawang Timur </div>
                 </td>
                 <td><input name="alamat-pelapor" type="hidden"></td>
               </tr>
               <tr id="relasi">
                 <td class="surat-col-11">Hubungan Pelapor dengan yang meninggal dunia</td>
                 <td class="surat-col-22">:</td>
                 <td class="surat-col-33 text-capitalize"></td>
                 <td><input name="relasi" type="hidden"></td>
               </tr>
             </table>
           </div>
           <div id="ttd" class="lh-sm my-3 d-grid flex-column justify-content-end">
             <div class="fs-6 text-center">Karawang, <?= tglIndo(date('Y-m-d')); ?></div>
             <div class="fs-6 text-center"></div>
             <div class="fs-6 text-center mt-6"><span class="border-bottom border-1 border-dark"></span></div>
           </div>
         </div>
       <?php } ?>