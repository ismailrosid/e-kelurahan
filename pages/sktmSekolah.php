<?php
// Mamanggil function surat untuk mendapatkan surat2 dalam db
$sktmSekolah = getSktmSekolah("");
?>
<div id="table-surats">
  <div class="card-body">
    <div class="d-flex mt-2 mb-4">
      <!-- <div class="h4">Surat Keterangan Desa</div> -->
      <button type="button" id="show-formInputs" class="btn btn-success d-flex justify-content-around align-items-center">
        <i class="fa-solid fa-circle-plus"></i>
        <div class="ms-2">Buat Surat</div>
      </button>
    </div>
    <table id="example" class="display table-bordered table-sm my-5" style="width:100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Id Surat</th>
          <th>No. NIK pemohon</th>
          <th>Nama Pemohon</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($sktmSekolah as $key) { ?>
          <tr>
            <td><?= $no; ?></td>
            <td><?= $key['id_surat']; ?></td>
            <td><?= $key['no_nik_pemohon']; ?></td>
            <td class="text-capitalize"><?= $key['nama_pemohon']; ?></td>
            <!-- Untuk melihat surat -->
            <td>
              <button value="<?= $key['id_surat'] ?>" name="show-sktmSekolah" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button>
              <!-- Untuk mengupdate -->
              <button value="<?= $key['id_surat'] ?>" name="update-sktmSekolah" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
              <!-- Untuk mengapus -->
              <button value="<?= $key['id_surat'] ?>" name="delete-sktmSekolah" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
            </td>
          </tr>
        <?php $no++;
        } ?>
      </tbody>
    </table>
  </div>
  <!-- Sktm Sekolah -->
  <button id="show-suratRead" type="button" class="btn btn-success d-none" data-bs-toggle="modal" data-bs-target="#model-sktmSekolahRead">none</button>
  <div id="model-sktmSekolahRead" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
      <form action="" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cetak Surat</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <!-- ISI -->
          <div id="content"></div>
          <!-- END -->
        </div>
    </div>
    </form>
  </div>
  <?php if (@$_SESSION['sukses']) { ?>
    <script>
      doneDeleteSurat();
    </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
  <?php unset($_SESSION['sukses']);
  } ?>
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
      // Lihat
      $(":button[name='show-sktmSekolah']").click(function() {
        var key = $(this).val();
        showSurat(key, "sktmSekolah");
      });
      $(":button[name='delete-sktmSekolah']").click(function() {
        var key = $(this).val();
        deleteSurat(key, "tb_sktm_sekolah");
      });
    });
  </script>
  <!-- End SKtm sekolah -->
  <!-- jangan lupa menambahkan script js sweet alert di bawah ini  -->
</div>
<div id="form-inputs">
  <?php
  $pejabat = getPejabat();
  include "surat/sktmSekolah/surat.php";
  ?>
  <div class="card-body">
    <div class="d-flex mt-2 mb-4">
      <button id="show-surats" class="btn btn-success d-flex justify-content-around align-items-center">
        <i class="fa-solid fa-circle-plus"></i>
        <div class="ms-2">LIHAT SURAT</div>
      </button>
    </div>
    <form id="forms" action="">
      <!-- Pembatas -->
      <table class="table border-top mb-4">
        <tr>
          <td>ATAS PERSETUJUAN</td>
        </tr>
      </table>
      <!-- End -->
      <!------------------------------------------------------------------->
      <!-- DATA PERSETUJAN -->
      <!------------------------------------------------------------------->
      <!-- nama pejabat -->
      <div id="nama-pejabat" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Nama</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <div class="row g-1">
            <div class="col-12 col-sm-6 col-md-5 col-lg-4">
              <?php
              foreach ($pejabat as $key) { ?>
                <?php if ($key['jabatan'] == "kades") { ?>
                  <input readonly value="<?= $key['nama_pejabat']; ?>" type="text" class="form-control form-control-sm">
                <?php } ?>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <!-- jabatan -->
      <div id="jabatan" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Jabatan</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <div class="row g-1">
            <div class="col-12 col-sm-6 col-md-5 col-lg-4">
              <?php
              foreach ($pejabat as $key) { ?>
                <?php if ($key['jabatan'] == "kades") { ?>
                  <input readonly value="<?= cekJabatan($key['jabatan']); ?>" type="text" class="form-control form-control-sm">
                  <input readonly value="<?= $key['id_pejabat']; ?>" type="hidden" class="form-control form-control-sm">
                <?php } ?>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <!--  -->
      <!------------------------------------------------------------------->
      <!-- AKHIR DATA PERSETUJAN -->
      <!------------------------------------------------------------------->
      <!-- Pembatas -->
      <table class="table border-top mb-4">
        <tr>
          <td>DATA ORANG TUA</td>
        </tr>
      </table>
      <!-- end -->
      <!------------------------------------------------------------------->
      <!-- DATA ORANG TUA -->
      <!------------------------------------------------------------------->
      <!-- Nama Lengkap pemohon -->
      <div id="nama-lengkapOrtu" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Nama Lengkap</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <input autocomplete="off" type="text" class="form-control form-control-sm" placeholder="Masukan Nama Lengkap">
        </div>
      </div>
      <!--  -->
      <!-- no nik ortu -->
      <div id="no-nikOrtu" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">NIK</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <input autocomplete="off" type="number" class="form-control form-control-sm" placeholder="Masukan Nomor NIK">
        </div>
      </div>
      <!--  -->
      <!-- tempat tanggal lahir ortu -->
      <div id="tempat-tglLahirOrtu" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Tempat/Tgl Lahir</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <div class="row g-1">
            <div class="col-7 col-sm-6 col-md-5 col-lg-4">
              <input autocomplete="off" type="text" class="form-control form-control-sm" id="tempat-lahir" placeholder="Masukan Tempat lahir">
            </div>
            <div class="col-5 col-sm-5 col-md-4 col-lg-3">
              <input type="date" class="form-control form-control-sm" id="tempat-lahir">
            </div>
          </div>
        </div>
      </div>
      <!--  -->
      <!-- jenis kelamin ortu -->
      <div id="jenis-kelaminOrtu" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Jenis kelamin</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <div class="row g-1">
            <div class="col-12 col-sm-6 col-md-5 col-lg-4">
              <select id="select-jenisKelaminOrtu" class="form-select form-select-sm" aria-label="Default select example">
                <option selected disabled>Pilih Jenis Kelamin</option>
                <?php
                for ($i = 0; $i < count($jenisKelamin); $i++) { ?>
                  <option value="<?= $jenisKelamin[$i]; ?>"><?= $jenisKelamin[$i]; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <!--  -->
      <!-- bangsa agama ortu -->
      <div id="bangsa-agamaOrtu" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Bangsa / Agama</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <div class="row g-1">
            <div class="col-7 col-sm-6 col-md-5 col-lg-4">
              <select id="select-bangsaOrtu" class="form-select form-select-sm" aria-label="Default select example">
                <option selected disabled>Pilih Bangsa</option>
                <?php
                for ($i = 0; $i < count($bangsa); $i++) { ?>
                  <option value="<?= $bangsa[$i]; ?>"><?= $bangsa[$i]; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-5 col-sm-5 col-md-4 col-lg-3">
              <select id="select-agamaOrtu" class="form-select form-select-sm" aria-label="Default select example">
                <option selected disabled>Pilih Agama</option>
                <?php
                for ($i = 0; $i < count($agama); $i++) { ?>
                  <option value="<?= $agama[$i]; ?>"><?= $agama[$i]; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <!--  -->
      <!-- pekerjaan ortu -->
      <div id="pekerjaan-ortu" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Pekerjaan</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <input autocomplete="off" type="text" class="form-control form-control-sm" placeholder="Masukan Nama Pekerjaan">
        </div>
      </div>
      <!--  -->
      <!-- tempat tinggal ortu -->
      <div id="tempat-tinggalOrtu" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Tempat tinggal</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <input autocomplete="off" type="text" class="form-control form-control-sm" placeholder="Masukan Tempat Tinggal">
        </div>
      </div>
      <!--  -->
      <!------------------------------------------------------------------->
      <!-- AKHIR DATA ORANG TUA -->
      <!------------------------------------------------------------------->
      <!-- pembatas -->
      <table class="table border-top my-3">
        <tr>
          <td>DATA PEMOHON</td>
        </tr>
      </table>
      <!--  -->
      <!------------------------------------------------------------------->
      <!-- DATA ORANG PEMOHON -->
      <!------------------------------------------------------------------->
      <!-- Nama Lengkap pemohon -->
      <div id="nama-lengkapPemohon" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Nama Lengkap</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <input autocomplete="off" type="text" class="form-control form-control-sm" placeholder="Masukan Nama Lengkap">
        </div>
      </div>
      <!--  -->
      <!-- no nik pemohon -->
      <div id="no-nikPemohon" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">NIK</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <input autocomplete="off" type="number" class="form-control form-control-sm" placeholder="Masukan Nomor NIK">
        </div>
      </div>
      <!--  -->
      <!-- tempat tanggal lahir pemohon -->
      <div id="tempat-tglLahirPemohon" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Tempat/Tgl Lahir</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <div class="row g-1">
            <div class="col-7 col-sm-6 col-md-5 col-lg-4">
              <input autocomplete="off" type="text" class="form-control form-control-sm" id="tempat-lahir" placeholder="Masukan Tempat lahir">
            </div>
            <div class="col-5 col-sm-5 col-md-4 col-lg-3">
              <input type="date" class="form-control form-control-sm" id="tempat-lahir">
            </div>
          </div>
        </div>
      </div>
      <!--  -->
      <!-- jenis kelamin pemohon -->
      <div id="jenis-kelaminPemohon" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Jenis kelamin</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <div class="row g-1">
            <div class="col-12 col-sm-6 col-md-5 col-lg-4">
              <select id="select-jenisKelaminPemohon" class="form-select form-select-sm" aria-label="Default select example">
                <option selected disabled>Pilih Jenis Kelamin</option>
                <?php
                for ($i = 0; $i < count($jenisKelamin); $i++) { ?>
                  <option value="<?= $jenisKelamin[$i]; ?>"><?= $jenisKelamin[$i]; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <!--  -->
      <!-- bangsa agama pemohon -->
      <div id="bangsa-agamaPemohon" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Bangsa / Agama</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <div class="row g-1">
            <div class="col-7 col-sm-6 col-md-5 col-lg-4">
              <select id="select-bangsaPemohon" class="form-select form-select-sm" aria-label="Default select example">
                <option selected disabled>Pilih Bangsa</option>
                <?php
                for ($i = 0; $i < count($bangsa); $i++) { ?>
                  <option value="<?= $bangsa[$i]; ?>"><?= $bangsa[$i]; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-5 col-sm-5 col-md-4 col-lg-3">
              <select id="select-agamaPemohon" class="form-select form-select-sm" aria-label="Default select example">
                <option selected disabled>Pilih Agama</option>
                <?php
                for ($i = 0; $i < count($agama); $i++) { ?>
                  <option value="<?= $agama[$i]; ?>"><?= $agama[$i]; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <!--  -->
      <!-- pekerjaan pemohon -->
      <div id="pekerjaan-pemohon" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Pekerjaan</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <input autocomplete="off" type="text" class="form-control form-control-sm" placeholder="Masukan Nama Pekerjaan">
        </div>
      </div>
      <!--  -->
      <!-- tempat tinggal pemohon -->
      <div id="tempat-tinggalPemohon" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Tempat tinggal</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <input autocomplete="off" type="text" class="form-control form-control-sm" placeholder="Masukan Tempat Tinggal">
        </div>
      </div>
  </div>
  <!--  -->
  <!------------------------------------------------------------------->
  <!-- AKHIR DATA ORANG PEMOHON -->
  <!------------------------------------------------------------------->
  <!-- footer -->
  <div class="card-footer py-3">
    <div class="row">
      <div class="offset-8 col-2 d-grid">
        <button id="reset-formSurat" type="button" class="btn btn-warning">Ulangi</button>
      </div>
      <div class="col-2 d-grid">
        <button id="create-sktmSekolah" type="button" class="btn btn-success">Buat</button>
        <button id="show-sktmSekolahCreate" type="button" class="btn btn-success d-none" data-bs-toggle="modal" data-bs-target="#modal-sktmSekolahCreate">Simpan</button>
      </div>
    </div>
  </div>
  <!-- End -->
  </form>
  <!-- Input kusus update -->
  <input id="aksi-surat" type="hidden">
  <input id="id-surat" type="hidden">
  <input id="no-surat" type="hidden">
  <!--  -->
  <!-- -->
  <script>
    // Jquery untuk membuat surat keterangan tidak mampu
    $(document).ready(function() {

      $(":button[name='update-sktmSekolah']").click(function() {
        var key = $(this).val();
        updateSurat(key, "sktmSekolah");
      });

      $('#reset-formSurat').click(function() {
        var key = $(this).val();
        resetForm(key, "sktmSekolah")
      });
      // 

      // Membuat surat sktm sekolah
      $('#create-sktmSekolah').click(function() {
        var inputs = [
          $('#form-inputs #nama-pejabat div:eq(1) input').val(),
          $('#form-inputs #jabatan input').val(),
          // 
          $('#form-inputs #nama-lengkapOrtu input').val(),
          $('#form-inputs #no-nikOrtu input').val(),
          $('#form-inputs #tempat-tglLahirOrtu input:eq(0)').val(),
          $('#form-inputs #tempat-tglLahirOrtu input:eq(1)').val(),
          $('#form-inputs #jenis-kelaminOrtu select').val(),
          $('#form-inputs #bangsa-agamaOrtu select:eq(0)').val(),
          $('#form-inputs #bangsa-agamaOrtu select:eq(1)').val(),
          $('#form-inputs #pekerjaan-ortu input').val(),
          $('#form-inputs #tempat-tinggalOrtu input').val(),
          // 
          $('#form-inputs #nama-lengkapPemohon input').val(),
          $('#form-inputs #no-nikPemohon input').val(),
          $('#form-inputs #tempat-tglLahirPemohon input:eq(0)').val(),
          $('#form-inputs #tempat-tglLahirPemohon input:eq(1)').val(),
          $('#form-inputs #jenis-kelaminPemohon select').val(),
          $('#form-inputs #bangsa-agamaPemohon select:eq(0)').val(),
          $('#form-inputs #bangsa-agamaPemohon select:eq(1)').val(),
          $('#form-inputs #pekerjaan-pemohon input').val(),
          $('#form-inputs #tempat-tinggalPemohon input').val()
        ];
        var array = [];
        for (let index = 0; index < inputs.length; index++) {
          if (inputs[index] != "" && inputs[index] != null) {
            array.push(inputs[index]);
          }
        }
        if (array.length < 20) {
          notComplete();
        } else {
          if ($("#reset-formSurat").val() == "") {
            // Cek apakah data tersebut sudah ada dalam database
            $.ajax({
              type: "POST",
              url: "assets/dist/php/validation.php",
              data: {
                type: "2",
                  tableDb: "tb_sktm_sekolah",
                  field1: "no_nik_pemohon",
                  value1: $('#form-inputs #no-nikPemohon input').val(),
                  field2: "no_nik_ortu",
                  value2: $('#form-inputs #no-nikOrtu input').val()
              },
              success: function(response) {
                console.log(response);
                if (response == 1) {
                  Swal.fire({
                    icon: 'info',
                    title: 'Gagal !!',
                    text: 'Data tersebut, Terdeteksi. Sudah pernah digunakan untuk membuat surat tersebut..',
                    footer: '<a href="">Beralih Ke daftar surat ?</a>'
                  })
                } else {
                  $("#show-sktmSekolahCreate").trigger("click");
                  inputSktmSekolah();
                }
              }
            });
          } else {
            $("#show-sktmSekolahCreate").trigger("click");
            inputSktmSekolah();
          }
        }

        function inputSktmSekolah() {
          // ----------------------------------------------------------------------------------------
          // Mengisi content sktm sekolah a untuk data ortu
          // ----------------------------------------------------------------------------------------
          // mengisi nama lengkap ortu
          $('#content-sktm-sklhA #nama-lengkap td:eq(2)').text($('#form-inputs #nama-lengkapOrtu div:eq(1) input').val());
          $('#content-sktm-sklhA #nama-lengkap td:eq(3) input').val($('#form-inputs #nama-lengkapOrtu div:eq(1) input').val());
          // 
          // mengisi nik ortu
          $('#content-sktm-sklhA #no-nik td:eq(2)').text($('#form-inputs #no-nikOrtu div:eq(1) input').val());
          $('#content-sktm-sklhA #no-nik td:eq(3) input').val($('#form-inputs #no-nikOrtu div:eq(1) input').val());
          // 
          // mengisi tempat tanggal lahir ortu
          $('#content-sktm-sklhA #tempat-tglLahir td:eq(2)').text($('#form-inputs #tempat-tglLahirOrtu div:eq(1) input:eq(0)').val() + ', ' + $('#form-inputs #tempat-tglLahirOrtu div:eq(1) input:eq(1)').val());
          $('#content-sktm-sklhA #tempat-tglLahir td:eq(3) input').val($('#form-inputs #tempat-tglLahirOrtu div:eq(1) input:eq(0)').val() + ', ' + $('#form-inputs #tempat-tglLahirOrtu div:eq(1) input:eq(1)').val());
          // 
          //  mengisi jenis kelamin ortu
          $('#content-sktm-sklhA #jenis-kelamin td:eq(2)').text($('#form-inputs #jenis-kelaminOrtu div:eq(1) select:eq(0)').val());
          $('#content-sktm-sklhA #jenis-kelamin td:eq(3) input').val($('#form-inputs #jenis-kelaminOrtu div:eq(1) select:eq(0)').val());
          // 
          // mengisi bangsa agama ortu
          $('#content-sktm-sklhA #bangsa-agama td:eq(2)').text($('#form-inputs #bangsa-agamaOrtu div:eq(1) select:eq(0)').val() + ", " + $('#form-inputs #bangsa-agamaOrtu div:eq(1) select:eq(1)').val());
          $('#content-sktm-sklhA #bangsa-agama td:eq(3) input').val($('#form-inputs #bangsa-agamaOrtu div:eq(1) select:eq(0)').val() + ", " + $('#form-inputs #bangsa-agamaOrtu div:eq(1) select:eq(1)').val());
          // mengisi pekerjaan ortu
          $('#content-sktm-sklhA #pekerjaan td:eq(2)').text($('#form-inputs #pekerjaan-ortu div:eq(1) input').val());
          $('#content-sktm-sklhA #pekerjaan td:eq(3) input').val($('#form-inputs #pekerjaan-ortu div:eq(1) input').val());
          // 
          // mengisi tempat tinggal ortu
          $('#content-sktm-sklhA #tempat-tinggal td:eq(2)').text($('#form-inputs #tempat-tinggalOrtu div:eq(1) input').val());
          $('#content-sktm-sklhA #tempat-tinggal td:eq(3) input').val($('#form-inputs #tempat-tinggalOrtu div:eq(1) input').val());
          // 
          // ----------------------------------------------------------------------------------------
          // Mengisi content sktm sekolah b untuk data pemohon
          // ----------------------------------------------------------------------------------------
          // mengisi nama lengkap pemohon
          // ----------------------------------------------------------------------------------------
          // mengisi nama lengkap ortu
          $('#content-sktmSklhPemohon #nama-lengkap td:eq(2)').text($('#form-inputs #nama-lengkapPemohon div:eq(1) input').val());
          $('#content-sktmSklhPemohon #nama-lengkap td:eq(3) input').val($('#form-inputs #nama-lengkapPemohon div:eq(1) input').val());
          // 
          // mengisi nik Pemohon
          $('#content-sktmSklhPemohon #no-nik td:eq(2)').text($('#form-inputs #no-nikPemohon div:eq(1) input').val());
          $('#content-sktmSklhPemohon #no-nik td:eq(3) input').val($('#form-inputs #no-nikPemohon div:eq(1) input').val());
          // 
          // mengisi tempat tanggal lahir Pemohon
          $('#content-sktmSklhPemohon #tempat-tglLahir td:eq(2)').text($('#form-inputs #tempat-tglLahirPemohon div:eq(1) input:eq(0)').val() + ', ' + $('#form-inputs #tempat-tglLahirPemohon div:eq(1) input:eq(1)').val());
          $('#content-sktmSklhPemohon #tempat-tglLahir td:eq(3) input').val($('#form-inputs #tempat-tglLahirPemohon div:eq(1) input:eq(0)').val() + ', ' + $('#form-inputs #tempat-tglLahirPemohon div:eq(1) input:eq(1)').val());
          // 
          //  mengisi jenis kelamin Pemohon
          $('#content-sktmSklhPemohon #jenis-kelamin td:eq(2)').text($('#form-inputs #jenis-kelaminPemohon div:eq(1) select:eq(0)').val());
          $('#content-sktmSklhPemohon #jenis-kelamin td:eq(3) input').val($('#form-inputs #jenis-kelaminPemohon div:eq(1) select:eq(0)').val());
          // 
          // mengisi bangsa agama Pemohon
          $('#content-sktmSklhPemohon #bangsa-agama td:eq(2)').text($('#form-inputs #bangsa-agamaPemohon div:eq(1) select:eq(0)').val() + ", " + $('#form-inputs #bangsa-agamaPemohon div:eq(1) select:eq(1)').val());
          $('#content-sktmSklhPemohon #bangsa-agama td:eq(3) input').val($('#form-inputs #bangsa-agamaPemohon div:eq(1) select:eq(0)').val() + ", " + $('#form-inputs #bangsa-agamaPemohon div:eq(1) select:eq(1)').val());
          // mengisi pekerjaan Pemohon
          $('#content-sktmSklhPemohon #pekerjaan td:eq(2)').text($('#form-inputs #pekerjaan-pemohon div:eq(1) input').val());
          $('#content-sktmSklhPemohon #pekerjaan td:eq(3) input').val($('#form-inputs #pekerjaan-pemohon div:eq(1) input').val());
          // 
          // mengisi tempat tinggal Pemohon
          $('#content-sktmSklhPemohon #tempat-tinggal td:eq(2)').text($('#form-inputs #tempat-tinggalPemohon div:eq(1) input').val());
          $('#content-sktmSklhPemohon #tempat-tinggal td:eq(3) input').val($('#form-inputs #tempat-tinggalPemohon div:eq(1) input').val());
          // 
          // ----------------------------------------------------------------------------------------
          // Mengisi penandatangan
          // ----------------------------------------------------------------------------------------
          // mengisi jabatan
          $('#ttd div:eq(1)').text($('#form-inputs #jabatan div:eq(1) input:eq(0)').val());
          // mengisi nama pejabat
          $('#ttd div:eq(2) span').text($('#form-inputs #nama-pejabat div:eq(1) input').val());
          // 
          // Mengisi id pejabat
          $('#hide-idPejabat').val($('#form-inputs #jabatan div:eq(1) input:eq(1)').val());
          // 
          // Kusus update
          $("#hide-aksiSurat").val($("#form-inputs #aksi-surat").val());
          $("#hide-idSurat").val($("#form-inputs #id-surat").val());
          $("#hide-noSurat").val($("#form-inputs #no-surat").val());
        }
      });
    });
  </script>

</div>