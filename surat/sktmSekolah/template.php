       <?php if (isset($_GET['id'])) {
          $surat = getSktmSekolah($_GET['id']);
          $dataOrtu = explode(';', $surat['data_ortu']);
        ?>
         <div class="container overflow-auto surat-content">
           <div class="my-3 border-bottom border-1 border-dark"></div>
           <div class="h5 text-center"><span class="border-bottom border-1 border-dark">SURAT KETERANGAN TIDAK MAMPU</span></div>
           <div class="fs-6 text-center">Nomer : <?= $surat['no_surat']; ?></div>
           <div style="text-indent: 45px;" class="fs-6 my-4 text-justify lh-sm">Kepala Desa Kondangjaya Kecamatan Karawang Timur Kabupaten Karawang, menerangkan dengan sebenarnya bahwa : </div>
           <!-----------------------------A-------------------------------------->
           <div class="ms-5">
             <table class="w-100 lh-1">
               <tr>
                 <td class="surat-col-1">Nama Lengkap</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= $surat['nama_ortu']; ?></td>
               </tr>
               <tr>
                 <td class="surat-col-1">NIK</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= $surat['no_nik_ortu']; ?></td>
               </tr>
               <tr>
                 <td class="surat-col-1">Tempat/Tgl.Lahir</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= $dataOrtu[0]; ?></td>
               </tr>
               <tr>
                 <td class="surat-col-1">Jenis Kelamin</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= $dataOrtu[1]; ?></td>
               </tr>
               <tr>
                 <td class="surat-col-1">Bangsa/Agama</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= $dataOrtu[2]; ?></td>
               </tr>
               <tr>
                 <td class="surat-col-1">Pekerjaan</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= $dataOrtu[3]; ?></td>
               </tr>
               <tr>
                 <td class="surat-col-1">Tempat Tinggal</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= $dataOrtu[4]; ?></td>
               </tr>
             </table>
           </div>
           <!-----------------------------END A-------------------------------------->
           <!-- Pembatas -->
           <div class="fs-6 my-4">Merupakan Bapak/Ibu Kandung dari <span class="ms-2">:</span></div>
           <!-----------------------------B-------------------------------------->
           <div class="ms-5">
             <table class="w-100 lh-1">
               <tr>
                 <td class="surat-col-1">Nama Lengkap</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= $surat['nama_pemohon']; ?></td>
               </tr>
               <tr>
                 <td class="surat-col-1">NIK</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= $surat['no_nik_pemohon']; ?></td>
               </tr>
               <tr>
                 <td class="surat-col-1">Tempat/Tgl.Lahir</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= $surat['ttl_pemohon']; ?></td>
               </tr>
               <tr>
                 <td class="surat-col-1">Jenis Kelamin</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= $surat['jenis_kelamin_pemohon']; ?></td>
               </tr>
               <tr>
                 <td class="surat-col-1">Bangsa/Agama</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= $surat['bangsa_agama_pemohon']; ?></td>
               </tr>
               <tr>
                 <td class="surat-col-1">Pekerjaan</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= $surat['pekerjaan_pemohon']; ?></td>
               </tr>
               <tr>
                 <td class="surat-col-1">Tempat Tinggal</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= $surat['tempat_tinggal_pemohon']; ?></td>
               </tr>
             </table>
           </div>
           <!-----------------------------END B-------------------------------------->
           <div class="lh-sm text-justify">
             <div style="text-indent: 45px;" class="fs-6 my-4">Orang tersebut adalah benar penduduk Desa Kondangjaya dan benar-benar keadaan tidak mampu / miskin / berpenghasilan rendah.</div>
             <div style="text-indent: 45px;" class="fs-6 my-4">Demikian Surat Keterangan ini dibuat dengan sebenarnya dan kepada pihak yang bersangkutan agar menjadi tahu dan maklum adanya.</div>
           </div>
           <div class="lh-sm my-3 d-grid flex-column justify-content-end">
             <div class="fs-6 text-center">Karawang, <?= tglIndo(date('Y-m-d')); ?></div>
             <div class="fs-6 text-center"><?= cekJabatan($surat['jabatan']); ?></div>
             <div class="fs-6 text-center text-decoration-underline mt-6"><?= $surat['nama_pejabat']; ?></div>
           </div>
         </div>

       <?php } else { ?>
         <div class="container overflow-auto surat-content">
           <div class="my-3 border-bottom border-1 border-dark"></div>
           <div class="h5 text-center"><span class="border-bottom border-1 border-dark">SURAT KETERANGAN TIDAK MAMPU</span></div>
           <div class="fs-6 text-center">Nomer : 461/..../Ds/./...</div>
           <div style="text-indent: 45px;" class="fs-6 my-4 text-justify lh-sm">Kepala Desa Kondangjaya Kecamatan Karawang Timur Kabupaten Karawang, menerangkan dengan sebenarnya bahwa:</div>
           <!-----------------------------A-------------------------------------->
           <div class="ms-5">
             <table id="content-sktm-sklhA" class="w-100 lh-1">
               <tr id="nama-lengkap">
                 <td class="surat-col-1">Nama Lengkap</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"></td>
                 <td><input type="hidden" value="" name="nama-lengkapOrtu"></td>
               </tr>
               <tr id="no-nik">
                 <td class="surat-col-1">NIK</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"></td>
                 <td><input type="hidden" value="" name="no-nikOrtu"></td>
               </tr>
               <tr id="tempat-tglLahir">
                 <td class="surat-col-1">Tempat/Tgl.Lahir</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"></td>
                 <td><input type="hidden" value="" name="tempat-tglLahirOrtu"></td>
               </tr>
               <tr id="jenis-kelamin">
                 <td class="surat-col-1">Jenis Kelamin</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"></td>
                 <td><input type="hidden" value="" name="jenis-kelaminOrtu"></td>
               </tr>
               <tr id="bangsa-agama">
                 <td class="surat-col-1">Bangsa/Agama</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"></td>
                 <td><input type="hidden" value="" name="bangsa-agamaOrtu"></td>
               </tr>
               <tr id="pekerjaan">
                 <td class="surat-col-1">Pekerjaan</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"></td>
                 <td><input type="hidden" value="" name="pekerjaanOrtu"></td>
               </tr>
               <tr id="tempat-tinggal">
                 <td class="surat-col-1">Tempat Tinggal</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"></td>
                 <td><input type="hidden" value="" name="tempat-tinggalOrtu"></td>
               </tr>
             </table>
           </div>
           <!-----------------------------END A-------------------------------------->
           <!-- Pembatas -->
           <div class=" fs-6 my-4">Merupakan Bapak/Ibu Kandung dari <span class="ms-2">:</span>
           </div>
           <!----------------------------- B -------------------------------------->
           <div class="ms-5">
             <table id="content-sktmSklhPemohon" class="w-100 lh-1">
               <tr id="nama-lengkap">
                 <td class="surat-col-1">Nama Lengkap</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"></td>
                 <td><input type="hidden" value="" name="nama-lengkapPemohon"></td>
               </tr>
               <tr id="no-nik">
                 <td class="surat-col-1">NIK</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"></td>
                 <td><input type="hidden" value="" name="no-nikPemohon"></td>
               </tr>
               <tr id="tempat-tglLahir">
                 <td class="surat-col-1">Tempat/Tgl.Lahir</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"></td>
                 <td><input type="hidden" value="" name="tempat-tglLahirPemohon"></td>
               </tr>
               <tr id="jenis-kelamin">
                 <td class="surat-col-1">Jenis Kelamin</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"></td>
                 <td><input type="hidden" value="" name="jenis-kelaminPemohon"></td>
               </tr>
               <tr id="bangsa-agama">
                 <td class="surat-col-1">Bangsa/Agama</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"></td>
                 <td><input type="hidden" value="" name="bangsa-agamaPemohon"></td>
               </tr>
               <tr id="pekerjaan">
                 <td class="surat-col-1">Pekerjaan</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"></td>
                 <td><input type="hidden" value="" name="pekerjaanPemohon"></td>
               </tr>
               <tr id="tempat-tinggal">
                 <td class="surat-col-1">Tempat Tinggal</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"></td>
                 <td><input type="hidden" value="" name="tempat-tinggalPemohon"></td>
               </tr>
             </table>
           </div>
           <!-----------------------------END B-------------------------------------->
           <div class="lh-sm text-justify">
             <div style="text-indent: 45px;" class="fs-6 my-4">Orang tersebut adalah benar penduduk Desa Kondangjaya dan benar-benar keadaan tidak mampu / miskin / berpenghasilan rendah.</div>
             <div style="text-indent: 45px;" class="fs-6 my-4">Demikian Surat Keterangan ini dibuat dengan sebenarnya dan kepada pihak yang bersangkutan agar menjadi tahu dan maklum adanya.</div>
           </div>
           <div id="ttd" class="lh-sm my-3 d-grid flex-column justify-content-end">
             <div class="fs-6 text-center">Karawang, <?= tglIndo(date('Y-m-d')); ?></div>
             <div class="fs-6 text-center"></div>
             <div class="fs-6 text-center mt-6"><span class="border-bottom border-1 border-dark"></span></div>
           </div>
         </div>
       <?php } ?>