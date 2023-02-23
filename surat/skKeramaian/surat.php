<?php
if (isset($_POST['submit'])) { ?>
  <?php
  $tersimpan = saveSkKeramaian($_POST);
  if (
    $tersimpan[0] != "0" ||
    $tersimpan[0] != "00"
  ) {
    if ($tersimpan[0] == "1") { ?>
      <script>
        var x = "<?php echo $tersimpan[1] ?>";
        var z = "<?php echo $tersimpan[2] == '1.1' ?>" ? 'skKeramaian' : 'pengiriman';
        if (z != "pengiriman") {
          saveDone(x, z);
          // saveDoneA(x, z);
        } else {
          saveDoneA(x, z, 'skKeramaian');
        }
      </script>
    <?php } elseif ($tersimpan[0] == "11") { ?>
      <script>
        var x = "<?php echo $tersimpan[1] ?>";
        var z = "skKeramaian";
        updateDone(x, z)
      </script>
    <?php } ?>
  <?php } else { ?>
    <script>
      notChange();
    </script>
  <?php } ?>
<?php } ?>

<div id="modal-skKeramaianCreate" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">

    <form action="" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cetak Surat</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-2">
                <img class="img-fluid" src="assets/dist/img/logo-desa.png" alt="">
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
              <!-- ISI -->
              <?php include "surat/skKeramaian/template.php"; ?>
              <!-- END -->
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
          <button type="submit" name="submit" class="btn btn-success">Oke</button>
        </div>
      </div>
      <!-- input hidden untuk nomer Surat -->

      <!-- id Pejabat Kiri -->
      <input id="hide-idPejabatKiri" type="hidden" name="id-pejabatKiri" value="">
      <!-- id Pejabat Kanan -->
      <input id="hide-idPejabatTengah" type="hidden" name="id-pejabatTengah" value="">
      <!-- id Pejabat tengah -->
      <input id="hide-idPejabatKanan" type="hidden" name="id-pejabatKanan" value="">
      <!-- NIK -->
      <input id="hideNoNik" type="hidden" value="" name="no-nik">
      <!-- Kusus update -->
      <input id="hide-aksiSurat" type="hidden" name="aksi-surat">
      <input id="hide-idSurat" type="hidden" name="id-surat">
      <input id="hide-noSurat" type="hidden" name="no-surat">
      <!--  -->
      <input id="hide-idPermohonan" type="hidden" name="id-permohonan">
      <input id="hide-noWhatsapp" type="hidden" name="no-whatsapp">
    </form>
  </div>
</div>