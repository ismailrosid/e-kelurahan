<?php
$isi_surat = getPengiriman();
?>
<div id="table-surats">
  <div class="card-body">
    <div class="d-flex mt-2 mb-4">
      <!-- <div class="h4">Surat Keterangan Desa</div> -->
    </div>
    <table id="example" class="display table-bordered table-sm my-5" style="width:100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Id Surat</th>
          <th>Nama Pemohon</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($isi_surat as $key) { ?>
          <tr>
            <td><?= $no; ?></td>
            <td class="text-capitalize"><?= $key['id_surat']; ?></td>
            <td class="text-capitalize"><?= $key['nama']; ?></td>
            <!-- Untuk melihat surat -->
            <td>
              <div class="d-grid">
                <a target="_BLANK" href="https://api.whatsapp.com/send?phone=<?= "62" . $key["no_whatsapp"]; ?>&text=Terima%20kasih,%20permohonan%20surat%20saudara.%20Telah%20kami%20buat%20dan%20akan%20kami%20kirim%20secepatnya" class="btn btn-success btn-sm">Kirim</a>
              </div>
            </td>
            <!-- Untuk mengupdate -->
          </tr>
        <?php $no++;
        } ?>
      </tbody>
    </table>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>