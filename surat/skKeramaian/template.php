       <?php if (isset($_GET['id'])) {
          $surat = getSkKeramaian($_GET['id']);
        ?>
         <div class="container overflow-auto surat-content">
           <div class="my-3 border-bottom border-1 border-dark"></div>
           <div class="h5 text-center mb-2"><span class="border-bottom border-1 border-dark">SURAT KETERANGAN IZIN KERAMAIAN</span></div>
           <div class="fs-6 text-center mb-4">Nomer : <?= $surat['no_surat']; ?></div>
           <div class="ms-4">
             <table id="content-skKeramaian" class="w-100 lh-base">
               <tr id="nama-pemohon">
                 <td class="surat-col-1">Nama</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= $surat['nama_pemohon']; ?></td>
               </tr>
               <tr id="tempat-tglLahir">
                 <td class="surat-col-1">Tempat/Tgl.Lahir</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= $surat['ttl']; ?></td>
               </tr>
               <tr id="agama">
                 <td class="surat-col-1">Agama</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= $surat['agama']; ?></td>
               </tr>
               <tr id="pekerjaan">
                 <td class="surat-col-1">Pekerjaan</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= $surat['pekerjaan']; ?></td>
               </tr>
               <tr id="alamat">
                 <td class="surat-col-1">Alamat</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3"><?= $surat['alamat']; ?></td>
               </tr>
               <tr id="waktu">
                 <td style=" vertical-align: top;" class="surat-col-1">Waktu</td>
                 <td style=" vertical-align: top;" class="surat-col-2">:</td>
                 <td style=" vertical-align: top;" class=" surat-col-3 text-capitalize">
                   <table class="w-100 lh-base">
                     <tr id="hari">
                       <td style="width: 15%;">Hari
                       </td>
                       <td class="surat-col-2">:</td>
                       <td class="surat-col-3"><?= $surat['hari']; ?></td>
                     </tr>
                     <tr id="tanggal">
                       <td style="width: 15%;">Tanggal</td>
                       <td class="surat-col-2">:</td>
                       <td class="surat-col-3"><?= $surat['tanggal'] ?></td>
                     </tr>
                   </table>
                 </td>
               </tr>
               <tr id="tempat-pelaksanaan">
                 <td class="surat-col-1">Tempat Pelaksanaan</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= $surat['tempat_pelaksanaan']; ?></td>
               <tr id="hiburan">
                 <td class="surat-col-1">Hiburan</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"><?= $surat['hiburan']; ?></td>
               </tr>
             </table>
           </div>
           <div class="mt-2">
             <div class="lh-sm ms-4 text-justif mb-4">
               <div class="fs-6">
                 Adapun orang tersebut diatas telah memohon Izin Keramaian kepada kami bahwa pada prinsipnya tidak keberatan atas permohonan yang bersangkutan dengan ketentuan sebagai berikut :
               </div>
               <div class="fs-6 my-2">
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
               <div class="fs-6">
                 Demikian Surat izin ini dibuat agar pihak yang berwajib / berkepentingan agar hendaknya menjadi tahu dan maklum.
               </div>
             </div>
             <div class="fs-6 text-center mb-3">Mengetahui :</div>
             <div class=" ms-4 lh-sm my-3 d-flex justify-content-between">
               <div class="kiri">
                 <div style="visibility: hidden;" class="fs-6 text-center">Karawang, <?= tglIndo(date('Y-m-d')); ?></div>
                 <div class="fs-6 text-center mt-3 text-capitalize"><?= cekJabatan($surat['jabatan_kiri']) ?></div>
                 <div class="fs-6 text-center mt-6">(<?= $surat['nama_ttd_kiri']; ?>)</div>
               </div>
               <div>
                 <div style="visibility: hidden;" class="fs-6 text-center">Karawang, <?= tglIndo(date('Y-m-d')); ?></div>
                 <div class="fs-6 text-center mt-3 text-capitalize"><?= cekJabatan($surat['jabatan_tengah']) ?></div>
                 <div class="fs-6 text-center mt-6">(<?= $surat['nama_ttd_tengah']; ?>)</div>
               </div>
               <div>
                 <div class="fs-6 text-center">Karawang, <?= tglIndo(date('Y-m-d')); ?></div>
                 <div class="fs-6 text-center mt-3 text-capitalize"><?= cekJabatan($surat['jabatan_kanan']) ?></div>
                 <div class="fs-6 text-center mt-6">(<?= $surat['nama_ttd_kanan']; ?>)</div>
               </div>
             </div>
           </div>
         </div>
       <?php } else { ?>
         <div class="container overflow-auto surat-content">
           <div class="my-3 border-bottom border-1 border-dark"></div>
           <div class="h5 text-center mb-2"><span class="border-bottom border-1 border-dark">SURAT KETERANGAN IZIN KERAMAIAN</span></div>
           <div class="fs-6 text-center mb-4">Nomer : 474/..../Ds/./...</div>
           <div class="ms-4">
             <table id="content-skKeramaian" class="w-100 lh-base">
               <tr id="nama-pemohon">
                 <td class="surat-col-1">Nama</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"></td>
                 <td><input type="hidden" value="" name="nama-pemohon"></td>
               </tr>
               <tr id="tempat-tglLahir">
                 <td class="surat-col-1">Tempat/Tgl.Lahir</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"></td>
                 <td><input type="hidden" value="" name="tempat-tglLahir"></td>
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
               <tr id="waktu">
                 <td style=" vertical-align: top;" class="surat-col-1">Waktu</td>
                 <td style=" vertical-align: top;" class="surat-col-2">:</td>
                 <td style=" vertical-align: top;" class=" surat-col-3 text-capitalize">
                   <table class="w-100 lh-base">
                     <tr id="hari">
                       <td style="width: 15%;">Hari
                       </td>
                       <td class="surat-col-2">:</td>
                       <td class="surat-col-3"></td>
                       <td><input type="hidden" value="" name="hari"></td>
                     </tr>
                     <tr id="tanggal">
                       <td style="width: 15%;">Tanggal</td>
                       <td class="surat-col-2">:</td>
                       <td class="surat-col-3"></td>
                       <td><input type="hidden" value="" name="tanggal"></td>
                     </tr>
                   </table>
                 </td>
               </tr>
               <tr id="tempat-pelaksanaan">
                 <td class="surat-col-1">Tempat Pelaksanaan</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"></td>
                 <td><input type="hidden" value="" name="tempat-pelaksanaan"></td>
               <tr id="hiburan">
                 <td class="surat-col-1">Hiburan</td>
                 <td class="surat-col-2">:</td>
                 <td class="surat-col-3 text-capitalize"></td>
                 <td><input type="hidden" value="" name="hiburan"></td>
               </tr>
             </table>
           </div>
           <div class="mt-2">
             <div class="lh-sm ms-4 text-justif mb-4">
               <div class="fs-6">
                 Adapun orang tersebut diatas telah memohon Izin Keramaian kepada kami bahwa pada prinsipnya tidak keberatan atas permohonan yang bersangkutan dengan ketentuan sebagai berikut :
               </div>
               <div class="fs-6 my-2">
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
               <div class="fs-6">
                 Demikian Surat izin ini dibuat agar pihak yang berwajib / berkepentingan agar hendaknya menjadi tahu dan maklum.
               </div>
             </div>
             <div class="fs-6 text-center mb-3">Mengetahui :</div>
             <div id="ttd" class=" ms-4 lh-sm my-3 d-flex justify-content-between">
               <div class="kiri">
                 <div style="visibility: hidden;" class="fs-6 text-center">Karawang, <?= tglIndo(date('Y-m-d')); ?></div>
                 <div class="fs-6 text-center mt-3 text-capitalize"></div>
                 <div class="fs-6 text-center mt-6"></div>
               </div>
               <div class="tengah">
                 <div style="visibility: hidden;" class="fs-6 text-center">Karawang, <?= tglIndo(date('Y-m-d')); ?></div>
                 <div class="fs-6 text-center mt-3 text-capitalize"></div>
                 <div class="fs-6 text-center mt-6"></div>
               </div>
               <div class="kanan">
                 <div class="fs-6 text-center">Karawang, <?= tglIndo(date('Y-m-d')); ?></div>
                 <div class="fs-6 text-center mt-3 text-capitalize">Kepala Desa Kondangjaya</div>
                 <div class="fs-6 text-center mt-6">(ANJA SUGIANA,SE)</div>
               </div>
             </div>
           </div>
         </div>
       <?php } ?>