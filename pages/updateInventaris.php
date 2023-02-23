<?php
$key = $_GET['key'];
$data = getInventaris($key);
if (isset($_POST['submit'])) {
  if (updateInventaris($_POST) > 0) {
    $_SESSION["sukses"] = "Data Berhasil Di Update";
    echo  "<script>
        window.location = 'index.php?pages=inventaris';
        </script>";
  }
}
?>
<form action="" method="POST">
  <div class="card-body">
    <table class="table border-top mb-4">
      <tr>
        <td>UPDATE INVENTARIS</td>
      </tr>
    </table>
    <!--  -->
    <div class="row align-items-center mb-2">
      <div class="col-12 col-sm-4 col-md-3 col-xl-2">
        <label class="form-label fs-7">Jenis Barang Bangunan</label>
      </div>
      <div class="col-12 col-sm-8 col-md-9 col-xl-10">
        <input name="jenis_bb" type="text" class="form-control form-control-sm" value="<?= $data['jenis_bb']; ?>">
      </div>
    </div>
    <!-- asal bb -->
    <div class="row align-items-center mb-2">
      <div class="col-12 col-sm-4 col-md-3 col-xl-2">
        <label class="form-label fs-7">Asal Barang Bangunan</label>
      </div>
      <div class="col-12 col-sm-8 col-md-9 col-xl-10">
        <input name="asal_bb" type="text" class="form-control form-control-sm" value="<?= $data['asal_bb']; ?>">
      </div>
    </div>
    <!--  -->
    <!-- asal bb -->
    <div class="row align-items-center mb-2">
      <div class="col-12 col-sm-4 col-md-3 col-xl-2">
        <label class="form-label fs-7">Keadaan Barang Bangunan Awal Tahun</label>
      </div>
      <div class="col-12 col-sm-8 col-md-9 col-xl-10">
        <input name="keadaan_bb_awal_t" type="text" class="form-control form-control-sm" value="<?= $data['keadaan_bb_awal_t']; ?>">
      </div>
    </div>
    <div class="row align-items-center mb-2">
      <div class="col-12 col-sm-4 col-md-3 col-xl-2">
        <label class="form-label fs-7">Tanggal Pengesahan</label>
      </div>
      <div class="col-12 col-sm-8 col-md-9 col-xl-10">
        <input name="tgl_pengesahan" type="date" class="form-control form-control-sm" value="<?= $data['tgl_pengesahan']; ?>">
      </div>
    </div>
    <div class="row align-items-center mb-2">
      <div class="col-12 col-sm-4 col-md-3 col-xl-2">
        <label class="form-label fs-7">Keadaan Barang Bangunan Akhir Tahun</label>
      </div>
      <div class="col-12 col-sm-8 col-md-9 col-xl-10">
        <input name="keadan_bb_Akhir_t" type="text" class="form-control form-control-sm" value="<?= $data['keadaan_bb_akhir_t']; ?>">
      </div>
    </div>
    <div class="row align-items-center mb-2">
      <div class="col-12 col-sm-4 col-md-3 col-xl-2">
        <label class="form-label fs-7">Keterangan</label>
      </div>
      <div class="col-12 col-sm-6 col-md-7 col-xl-10">
        <textarea required placeholder="Masukan Keterangan" class="form-control form-control-sm" name="keterangan" rows="3"><?= $data['keterangan']; ?></textarea>
      </div>
    </div>
  </div>
  <!--  -->
  <!--  -->
  <div class="card-footer py-3">
    <div class="row">
      <div class="offset-8 col-2 d-grid">
        <button type="reset" class="btn btn-warning">Ulangi</button>
      </div>
      <div class="col-2 d-grid">
        <button type="submit" name="submit" class="btn btn-success">Update</button>
      </div>
    </div>
  </div>
</form>