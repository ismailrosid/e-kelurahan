<?php
$inventaris = getInventaris("");
if (isset($_POST['submit'])) {
  if (saveInventaris($_POST) > 0) {
    $_SESSION["sukses"] = "Data Berhasil Di Simpan";
    echo  "<script>
          window.location = 'index.php?pages=inventaris';
        </script>";
  } else {
    $_SESSION["sukses"] = "Data Gagal Disimpan";
    echo  "<script>
       window.location = 'index.php?pages=inventaris';
        </script>";
  }
}
?>
<div id="table-surats">
  <div class="card-body">
    <div class="d-flex mt-2 mb-4">
      <!-- <div class="h4">Surat Keterangan Desa</div> -->
      <button id="insert_data" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <div class="ms-2">Tambah Data</div>
      </button>
    </div>
    <div class="table-responsive">
      <table id="example" class="display table-bordered table-sm my-5" style="width:100%">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Jenis Barang Bangunan</th>
            <th class="text-center">Asal Barang/Bangunan</th>
            <th class="text-center">Keadaan Barang/Bangunan Awal Tahun</th>
            <th class="text-center">Tanggal Pengesahan</th>
            <th class="text-center">Keadaan Barang/Bangunan Akhir Tahun </th>
            <th class="text-center">Keterangan</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($inventaris as $key) { ?>
            <tr>
              <td><?= $no; ?></td>
              <td><?= $key["jenis_bb"]; ?></td>
              <td><?= $key["asal_bb"]; ?></td>
              <td><?= $key["keadaan_bb_awal_t"]; ?></td>
              <td><?= tglIndo($key["tgl_pengesahan"]); ?></td>
              <td><?= $key["keadaan_bb_akhir_t"]; ?></td>
              <td><?= $key["keterangan"]; ?></td>
              <td>
                <div class="d-flex justify-content-evenly">
                  <a class="btn btn-warning btn-sm" href="index.php?pages=updateInventaris&key=<?= $key['id_inventaris']; ?>"><i class="fa-solid fa-pen text-white"></i></a>
                  <button name="delete-inventaris" value="<?= $key['id_inventaris']; ?>" class="btn btn-danger btn-sm ms-1"><i class=" fa-solid fa-circle-minus"></i></button>
                </div>
              </td>
            </tr>
          <?php $no++;
          } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Form Data Inventaris</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
            <div class="row">
              <div class="col-12">
                <div class="mx-3">
                  <table class="table border-top">
                    <tr>
                      <td>DATA ASSET</td>
                    </tr>
                  </table>
                  <!-- jenis bb -->
                  <div class="row mb-2">
                    <div class="col-3">
                      <label for="jenis_bb" class="form-label">Jenis Barang/Bangunan</label>
                    </div>
                    <div class="col-9">
                      <input autocomplete="off" required placeholder="Masukan jenis Barang / bangunan" type="text" name="jenis_bb" id="jenis_bb" class="form-control form-control-sm">
                    </div>
                  </div>
                  <!-- asal bb -->
                  <div class="row mb-2">
                    <div class="col-3">
                      <label for="asal_bb" class="form-label">Asal Barang/Bangunan</label>
                    </div>
                    <div class="col-9">
                      <input autocomplete="off" required placeholder="Masukan Asal Barang/Bangunan " type="text" name="asal_bb" id="asal_bb" class="form-control form-control-sm">
                    </div>
                  </div>
                  <!-- keadaan bb awal tahun -->
                  <div class="row mb-2">
                    <div class="col-3">
                      <label for="keadaan_bb_awal_t" class="form-label">Keadaan Barang/Bangunan Awal Tahun</label>
                    </div>
                    <div class="col-9">
                      <input autocomplete="off" required placeholder="Masukan Keadaan Barang/Bangunan Awal Tahun " type="text" name="keadaan_bb_awal_t" id="keadaan_bb_awal_t" class="form-control form-control-sm">
                    </div>
                  </div>
                  <!-- tgl pengesahan -->
                  <div class="row mb-2">
                    <div class="col-3">
                      <label for="tgl_pegesahan" class="form-label">Tanggal Pengesahan</label>
                    </div>
                    <div class="col-9">
                      <input autocomplete="off" required type="date" name="tgl_pengesahan" id="tgl_pegesahan" class="form-control form-control-sm">
                    </div>
                  </div>
                  <!-- keadaan bb akhir tahun -->
                  <div class="row mb-2">
                    <div class="col-3">
                      <label for="keadaan_bb_akhir_t" class="form-label">Keadaan Barang/Bangunan Akhir Tahun</label>
                    </div>
                    <div class="col-9">
                      <input autocomplete="off" required placeholder="Masukan Keadaan Barang/Bangunan Akhir Tahun " type="text" name="keadan_bb_Akhir_t" id="keadan_bb_Akhir_t" class="form-control form-control-sm">
                    </div>
                  </div>
                  <!-- keterangan -->
                  <div class="row mb-2">
                    <div class="col-3">
                      <label for="keterangan" class="form-label">Keterangan</label>
                    </div>
                    <div class="col-9">
                      <div class="mb-3">
                        <textarea autocomplete="off" required placeholder="Masukan Keterangan" class="form-control form-control-sm" id="keterangan" name="keterangan" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                  <!-- end kode -->
                </div>
              </div>
            </div>
        </div>
        <div class="card-footer py-3">
          <div class="row">
            <div class="offset-6 col-3 d-grid">
              <button type="reset" class="btn btn-warning btn-sm">Ulangi</button>
            </div>
            <div class="col-3 d-grid">
              <button type="submit" name="submit" class="btn btn-success btn-sm">Simpan</button>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('#example').DataTable();

      $(":button[name='delete-inventaris']").click(function() {
        var key = $(this).val();
        Swal.fire({
          title: "Anda yakin, ingin menghapus data inventaris ?",
          icon: "warning",
          showDenyButton: true,
          confirmButtonText: "Ya",
          denyButtonText: "Tidak",
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            window.location.href = "index.php?pages=deleteInventaris&key=" + key;
          } else if (result.isDenied) {}
        });
      });

    });
  </script>
</div>