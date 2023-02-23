<?php
if (isset($_POST['submit'])) { ?>
  <?php
  $tersimpan = saveSkKematian($_POST);
  if (
    $tersimpan[0] != "0" ||
    $tersimpan[0] != "00"
  ) {
    if ($tersimpan[0] == "1") { ?>
      <script>
        var x = "<?php echo $tersimpan[1] ?>";
        var z = "<?php echo $tersimpan[2] == '1.1' ?>" ? 'skKematian' : 'pengiriman';
        if (z != "pengiriman") {
          saveDone(x, z);
          // saveDoneA(x, z);
        } else {
          saveDoneA(x, z, 'skKematian');
        }
      </script>
    <?php } elseif ($tersimpan[0] == "11") { ?>
      <script>
        var x = "<?php echo $tersimpan[1] ?>";
        var z = "skKematian";
        updateDone(x, z)
      </script>
    <?php } ?>
  <?php } else { ?>
    <script>
      notChange();
    </script>
  <?php } ?>
<?php } ?>



<div id="modal-skKematianCreate" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <form action="" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cetak Surat</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div style="font-family: 'Times New Roman', Times, serif;" class="modal-body">
          <div class="container">
            <div class="fs-9 font-italic">
              NO»Kode : F-2.17
            </div>
            <table class="w-100 lh-1">
              <tr>
                <td class="surat-col-11 fs-9">Pemerintah Kab.Kota</td>
                <td class="surat-col-22 text-center fs-9">:</td>
                <td class="surat-col-33 text-capitalize fs-9">Karawang</td>
              </tr>
              <tr>
                <td class="surat-col-11 fs-9">Kecamatan</td>
                <td class="surat-col-22 text-center fs-9">:</td>
                <td class="surat-col-33 text-capitalize fs-9">Karawang Timur</td>
              </tr>
              <tr>
                <td class="surat-col-11 fs-9">Desa/Kelurahan</td>
                <td class="surat-col-22 text-center fs-9">:</td>
                <td class="surat-col-33 text-capitalize fs-9">Kondangjaya</td>
              </tr>
            </table>
            <?php include "surat/skKematian/template.php"; ?>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
          <button type="submit" name="submit" class="btn btn-success">Oke</button>
        </div>
      </div>
      <!-- id Pejabat -->
      <input id="hide-idPejabat" type="hidden" name="id-pejabat">
      <!-- Kusus update -->
      <input id="hide-aksiSurat" type="hidden" name="aksi-surat">
      <input id="hide-idSurat" type="hidden" name="id-surat">
      <input id="hide-noSurat" type="hidden" name="no-surat">
      <input id="hide-idPermohonan" type="hidden" name="id-permohonan">
      <input id="hide-noWhatsapp" type="hidden" name="no-whatsapp">
    </form>
  </div>
</div>