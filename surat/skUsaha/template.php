       <?php if (isset($_GET['id'])) {
          $surat = getSkUsaha($_GET['id']);
        ?>
         <div class="container overflow-auto surat-content">
           <div class="my-3 border-bottom border-1 border-dark"></div>
           <div class="h5 text-center mb-2"><span class="border-bottom border-1 border-dark">SURAT KETERANGAN USAHA</span></div>
           <div class="fs-6 text-center my-2">Nomer : <?= $surat['no_surat']; ?></div>
           <div style="text-indent: 40px;" class="fs-6 text-justify lh-sm ms-4 mb-3">Kepala Desa Kondangjaya Kecamatan Karawang Timur, Kabupaten Karawang menerangkan dengan sebenarnya bahwa </div>
           <div class="ms-5">
             <div class="ms-3">
               <table id="content-skd-domisili" class="w-100 lh-base">
                 <tr>
                   <td class="surat-col-1">Nama</td>
                   <td class="surat-col-2">:</td>
                   <td class="surat-col-3 text-capitalize"><?= $surat['nama_pemohon']; ?></td>
                 </tr>
                 <tr>
                   <td class="surat-col-1">NIK</td>
                   <td class="surat-col-2">:</td>
                   <td class="surat-col-3 text-capitalize"><?= $surat['no_nik']; ?></td>
                 </tr>
                 <tr>
                   <td class="surat-col-1">Tempat/Tgl.Lahir</td>
                   <td class="surat-col-2">:</td>
                   <td class="surat-col-3 text-capitalize"><?= $surat['ttl']; ?></td>
                 </tr>
                 <tr>
                   <td class="surat-col-1">Jenis Kelamin</td>
                   <td class="surat-col-2">:</td>
                   <td class="surat-col-3 text-capitalize"><?= $surat['jenis_kelamin']; ?></td>
                 </tr>
                 <tr>
                   <td class="surat-col-1">Agama</td>
                   <td class="surat-col-2">:</td>
                   <td class="surat-col-3 text-capitalize"><?= $surat['agama']; ?></td>
                 </tr>
                 <tr>
                   <td class="surat-col-1">Pekerjaan</td>
                   <td class="surat-col-2">:</td>
                   <td class="surat-col-3 text-capitalize"><?= $surat['pekerjaan']; ?></td>
                 </tr>
                 <tr>
                   <td class="surat-col-1">Alamat</td>
                   <td class="surat-col-2">:</td>
                   <td class="surat-col-3 text-capitalize"><?= $surat['alamat']; ?></td>
                 </tr>
               </table>
             </div>
           </div>
           <div class="mt-4">
             <div class="lh-lg ms-4 text-justify">
               <div id="keterangan" class="fs-6"><?= $surat['keterangan']; ?>
               </div>
               <input id="keterangan-hide" type="hidden" value="" name="keterangan">
               <div id="berlaku-skDesa" class="fs-6 ms-5 fw-bold">Surat Keterangan Usaha ini berlaku sampai dengan tanggal <?= tglIndo(date('Y-m-d', strtotime('+30 days'))); ?>
               </div>
               <div class="fs-6">
                 Demikian Surat Keterangan ini dibuat dengan sebenarnya,untuk dapat dipergunakan sesuai dengan keperluannya serta agar yang berkepentingan menjadi maklum
               </div>
             </div>
           </div>
           <div id="ttd" class="lh-sm my-5 d-grid flex-column justify-content-end">
             <div class="fs-6 text-center">Karawang, <?= tglIndo(date('Y-m-d')); ?></div>
             <div class="fs-6 text-center"><?= cekJabatan($surat['jabatan']); ?></div>
             <div class="fs-6 text-center mt-6"><span class="border-bottom border-1 border-dark"><?= $surat['nama_pejabat']; ?></span></div>
           </div>

         </div>
       <?php } else { ?>
         <div class="container overflow-auto surat-content">
           <div class="my-3 border-bottom border-1 border-dark"></div>
           <div class="h5 text-center mb-2"><span class="border-bottom border-1 border-dark">SURAT KETERANGAN USAHA</span></div>
           <div class="fs-6 text-center mv-2">Nomer : 474/..../Ds/./...</div>
           <div style="text-indent: 45px;" class="fs-6 text-justify lh-lg ms-4 my-2">Kepala Desa Kondangjaya Kecamatan Karawang Timur, Kabupaten Karawang menerangkan dengan sebenarnya bahwa :</div>
           <div class="ms-5">
             <div class="ms-3">
               <table id="content-skUsaha" class="w-100 lh-lg">
                 <tr id="nama-pemohon">
                   <td class="surat-col-1">Nama</td>
                   <td class="surat-col-2">:</td>
                   <td class="surat-col-3 text-capitalize"></td>
                   <td><input type="hidden" value="" name="nama-pemohon"></td>
                 </tr>
                 <tr id="no-nik">
                   <td class="surat-col-1">NIK</td>
                   <td class="surat-col-2">:</td>
                   <td class="surat-col-3 text-capitalize"></td>
                   <td><input type="hidden" value="" name="no-nik"></td>
                 </tr>
                 <tr id="tempat-tglLahir">
                   <td class="surat-col-1">Tempat/Tgl.Lahir</td>
                   <td class="surat-col-2">:</td>
                   <td class="surat-col-3 text-capitalize"></td>
                   <td><input type="hidden" value="" name="tempat-tglLahir"></td>
                 </tr>
                 <tr id="jenis-kelamin">
                   <td class="surat-col-1">Jenis Kelamin</td>
                   <td class="surat-col-2">:</td>
                   <td class="surat-col-3 text-capitalize"></td>
                   <td><input type="hidden" value="" name="jenis-kelamin"></td>
                 </tr>
                 <tr id="agama">
                   <td class="surat-col-1">Agama</td>
                   <td class="surat-col-2">:</td>
                   <td class="surat-col-3 text-capitalize"></td>
                   <td><input type="hidden" value="" name="agama"></td>
                 </tr>
                 <tr id="pekerjaan">
                   <td class="surat-col-1">Pekerjaan</td>
                   <td class="surat-col-2">:</td>
                   <td class="surat-col-3 text-capitalize"></td>
                   <td><input type="hidden" value="" name="pekerjaan"></td>
                 </tr>
                 <tr id="alamat">
                   <td class="surat-col-1">Alamat</td>
                   <td class="surat-col-2">:</td>
                   <td class="surat-col-3 text-capitalize"></td>
                   <td><input type="hidden" value="" name="alamat"></td>
                 </tr>
               </table>
             </div>
           </div>
           <div class="mt-4">
             <div class="lh-lg ms-4 text-justify">
               <div id="keterangan" class="fs-6">
               </div>
               <input id="keterangan-hide" type="hidden" value="" name="keterangan">
               <div id="berlaku-skDesa" class="fs-6 ms-5 fw-bold">Surat Keterangan Usaha ini berlaku sampai dengan tanggal <?= tglIndo(date('Y-m-d', strtotime('+30 days'))); ?>
               </div>
               <div class="fs-6">
                 Demikian Surat Keterangan ini dibuat dengan sebenarnya,untuk dapat dipergunakan sesuai dengan keperluannya serta agar yang berkepentingan menjadi maklum
               </div>
             </div>
           </div>
           <div id="ttd" class="lh-sm my-5 d-grid flex-column justify-content-end">
             <div class="fs-6 text-center">Karawang, <?= tglIndo(date('Y-m-d')); ?></div>
             <div class="fs-6 text-center"></div>
             <div class="fs-6 text-center mt-6"><span class="border-bottom border-1 border-dark"></span></div>
           </div>
         </div>
       <?php } ?>