<?php
$isi_surat = getPermohonan("");
?>
<div id="table-surats">
  <div class="card-body">
    <div class="table-responsive">
      <table id="example" class="display table-bordered table-sm my-5" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>No. Nik</th>
            <th>Nama Pemohon</th>
            <th>Whatsaap</th>
            <th>Jenis Surat</th>
            <th>Tujuan</th>
            <th>Berkas</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($isi_surat as $key) { ?>
            <tr>
              <td><?= $no; ?></td>
              <td><?= $key['no_nik']; ?></td>
              <td class="text-capitalize"><?= $key['nama']; ?></td>
              <td class="text-capitalize"><?= $key['no_whatsaap']; ?></td>
              <td class="text-capitalize"><?= $key['jenis']; ?></td>
              <td class="text-capitalize"><?= $key['tujuan']; ?></td>
              <!-- Untuk melihat surat -->
              <td>
                <div class="d-flex justify-content-evenly">
                  <?php $isiSurat2 = getBerkas($key["id_permohonan"]);
                  foreach ($isiSurat2 as $k) {
                  ?>
                    <div class="col-2 text-center">
                      <a class="btn btn-success btn-sm" href="assets/berkas/<?= $k['poto']; ?>" target="_BLANK">
                        <i class="bx bx-file font-medium-5 fs-4"></i>
                      </a>
                      <p class="text-muted mb-0 text-truncate"><?php echo $k['jenis_berkas']; ?></p>
                    </div>
                  <?php } ?>
                </div>

              </td>
              <td>
                <a href="index.php?pages=prosesSurat&idp=<?= $key['id_permohonan'] ?>&jns=<?= str_replace(' ', '', $key['jenis']); ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-circle-plus"></i></a>
              </td>
            <?php $no++;
          } ?>

            </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>