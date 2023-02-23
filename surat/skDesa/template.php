       <?php if (isset($_GET['id'])) {
          $surat = getSkDesa($_GET['id']);

        ?>
         <div class="container overflow-auto surat-content">
           <div class="my-3 border-bottom border-1 border-dark"></div>
           <div class="h5 text-center mb-2"><span class="border-bottom border-1 border-dark">SURAT KETERANGAN DESA</span></div>
           <div class="fs-6 text-center mv-2">Nomer : <?= $surat['no_surat']; ?></div>
           <div class="fs-6 text-justify lh-sm ms-4 mb-3">Yang bertandatangan dibawah ini :</div>
           <div class="ms-5">
             <table class="w-100 lh-base">
               <tr>
                 <td class="surat-col-1">Nama</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= $surat['nama_pejabat']; ?></td>
               </tr>
               <tr>
                 <td class="surat-col-1">Jabatan</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= cekJabatan($surat['jabatan']); ?></td>
               </tr>
             </table>
           </div>
           <div class="fs-6 text ms-4 my-2">Menerangkan dengan sebenarnya bahwa :</div>
           <div class="ms-5">
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
               <tr>
                 <td class="surat-col-1">Menerangkan</td>
                 <td class="surat-col-2">:</td>
                 <td align="justify" class="surat-col-3">
                   <?php if ($surat['jenis_sk_desa'] == "skd domisili mailing kades" || $surat['jenis_sk_desa'] == "skd domisili mailing sekdes") {
                      $PecahStr = explode("/", $surat['keterangan']);
                    ?>
                     <?= $PecahStr[0] . "/" . $PecahStr[1] . "/" . "<b>$PecahStr[2]</b>"; ?>
                   <?php } else { ?>
                     <?= $surat['keterangan']; ?>
                   <?php } ?>
                 </td>
               </tr>
             </table>
           </div>
           <div class="<?= $surat['jenis_sk_desa'] == 'skd domisili mailing kades' || 'skd domisili mailing sekdes'  ? 'mt-3' : 'mt-5'; ?> ">
             <div class="lh-sm ms-4 text-justify">
               <?php if ($surat['jenis_sk_desa'] == "skd domisili mailing kades" || $surat['jenis_sk_desa'] == "skd domisili mailing sekdes") { {
                  } ?>
                 <div class="fs-6">Surat Keterangan ini berlaku sampai dengan <?= tglIndo(date('Y-m-d', strtotime('+30 days'))); ?>
                 </div>
               <?php } ?>
               <div class="fs-6">
                 Demikian Surat Keterangan di buat dengan sebenarnya,untuk agar yang berkepentingan menjadi maklum.
               </div>
             </div>
           </div>
           <div class="<?= $surat['jenis_sk_desa'] == 'skd domisili mailing kades' || $surat['jenis_sk_desa'] ==  'skd domisili mailing sekdes' ? 'my-3' : 'my-5'; ?> lh-sm d-grid flex-column justify-content-end">
             <div class="fs-6 text-center">Karawang, <?= tglIndo(date('Y-m-d')); ?></div>
             <div class="fs-6 text-center"><?= cekJabatan($surat['jabatan']); ?></div>
             <div class="fs-6 text-center mt-6"><span class="border-bottom border-1 border-dark"><?= $surat['nama_pejabat']; ?></span></div>
           </div>
           <?php if ($surat['jenis_sk_desa'] == "skd domisili mailing kades" || $surat['jenis_sk_desa'] == "skd domisili mailing sekdes") { ?>
             <div class="fw-bold ms-4"><span class="border-bottom border-1 border-dark"> Catatan :</span></div>
             <div class="fs-6 text-justify lh-sm ms-4 mb-3">
               <ol>
                 <li>
                   Surat Keterangan bersifat sementara
                 </li>
                 <li>
                   Bukan sebagai pengganti Kartu Identitas Pribadi
                 </li>
                 <li>
                   Tidak diperkenankan umtuk digunakan sebagai pengganti alat Transaksi apapun
                 </li>
                 <li>
                   Tidak diperkenankan untuk penyalahgunaan tentang surat keterangan
                 </li>
               </ol>
             </div>
           <?php } ?>
         </div>
       <?php } else { ?>
         <div class="container overflow-auto surat-content">
           <div class="my-3 border-bottom border-1 border-dark"></div>
           <div class="h5 text-center mb-2"><span class="border-bottom border-1 border-dark">SURAT KETERANGAN DESA</span></div>
           <div class="fs-6 text-center mv-2">Nomer : 474/..../Ds/./...</div>
           <div class="fs-6 text-justify lh-sm ms-4 mb-3">Yang bertandatangan dibawah ini :</div>
           <div id="panandatangan" class="ms-5">
             <table class="w-100 lh-base">
               <tr id="nama">
                 <td class="surat-col-1">Nama</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"></td>
               </tr>
               <tr id="jabatan">
                 <td class="surat-col-1">Jabatan</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"></td>
               </tr>
             </table>
           </div>
           <div class="fs-6 text-justify lh-sm ms-4 my-2">Menerangkan dengan sebenarnya bahwa :</div>
           <div class="ms-5">
             <table id="content-skDesa" class="w-100 lh-base">
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
                 <td class="surat-col-1">Bangsa/Agama</td>
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
               <tr id="keterangan">
                 <td class="surat-col-1">Menerangkan</td>
                 <td class="surat-col-2">:</td>
                 <td align="justify" class="surat-col-3"></td>
                 <td><input type="hidden" value="" name="keterangan"></td>
               </tr>
             </table>
           </div>
           <div class="mt-4">
             <div class="lh-sm ms-4 text-justify">
               <div id="berlaku-skDesa" class="fs-6">Surat Keterangan ini berlaku sampai dengan <?= tglIndo(date('Y-m-d', strtotime('+30 days'))); ?>
               </div>
               <div class="fs-6">
                 Demikian Surat Keterangan ini dibuat dengan sebenarnya,untuk dapat dipergunakan sesuai dengan keperluannya serta agar yang berkepentingan menjadi maklum
               </div>
             </div>
           </div>
           <div id="ttd" class="lh-sm my-3 d-grid flex-column justify-content-end">
             <div class="fs-6 text-center">Karawang, <?= tglIndo(date('Y-m-d')); ?></div>
             <div class="fs-6 text-center"></div>
             <div class="fs-6 text-center mt-6"><span class="border-bottom border-1 border-dark"></span></div>
           </div>
           <div id="title-catatanSkDesa" class="fw-bold ms-4"><span class="border-bottom border-1 border-dark"> Catatan :</span></div>
           <div id="catatan-skDesa" class="fs-6 text-justify lh-sm ms-4 mb-3">
             <ol>
               <li>
                 Surat Keterangan bersifat sementara.
               </li>
               <li>
                 Bukan sebagai pengganti Kartu Identitas Pribadi.
               </li>
               <li>
                 Tidak diperkenankan umtuk digunakan sebagai pengganti alat Transaksi apapun.
               </li>
               <li>
                 Tidak diperkenankan untuk penyalahgunaan tentang surat keterangan.
               </li>
             </ol>
           </div>
         </div>
       <?php } ?>