<?php
$isi_surat = getSkDesa("");
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
          <th>id Surat</th>
          <th>Nama Pemohon</th>
          <th>Jenis Surat</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($isi_surat as $key) { ?>
          <tr>
            <td><?= $no; ?></td>
            <td><?= $key['id_surat']; ?></td>
            <td class="text-capitalize"><?= $key['nama_pemohon']; ?></td>
            <td class="text-capitalize"><?= $key['jenis_sk_desa']; ?></td>
            <!-- Untuk melihat surat -->
            <td> <button value="<?= $key['id_surat'] . ',' . $key['jenis_sk_desa']; ?>" name="show-skDesa" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button>
              <!-- Untuk mengupdate -->
              <button value="<?= $key['id_surat'] ?>" name="update-skDesa" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
              <!-- Untuk mengapus -->
              <button value="<?= $key['id_surat'] ?>" name="delete-skDesa" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
            </td>
          </tr>
        <?php $no++;
        } ?>
      </tbody>
    </table>
  </div>
  <!-- sktm Sekolah -->
  <button id="show-suratRead" type="button" class="btn btn-success d-none" data-bs-toggle="modal" data-bs-target="#model-skDesaRead">none</button>
  <div id="model-skDesaRead" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cetak Surat</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- ISI -->
        <div id="content">
        </div>
        <!-- END -->
      </div>
      </form>
    </div>
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
      $(":button[name='show-skDesa']").click(function() {
        var key = $(this).val();
        showSurat(key, "skDesa");
      });
      // =========================================================================
      // Update
      // =========================================================================
      // Delete
      $(":button[name='delete-skDesa']").click(function() {
        var key = $(this).val();
        deleteSurat(key, "tb_sk_desa")
      });
    });
  </script>
  <!-- jangan lupa menambahkan script js sweet alert di bawah ini  -->
</div>
<div id="form-inputs">
  <?php
  $pejabat = getPejabat();
  include "surat/skDesa/surat.php";
  ?>
  <div class="card-body">
    <div class="d-flex mt-2 mb-4">
      <button id="show-surats" class="btn btn-success d-flex justify-content-around align-items-center">
        <i class="fa-solid fa-circle-plus"></i>
        <div class="ms-2">LIHAT SURAT</div>
      </button>
    </div>
    <!-- pembatas -->
    <table class="table border-top mb-4">
      <tr>
        <td>ATAS PERSETUJUAN</td>
      </tr>
    </table>
    <!-- end -->
    <form id="forms">
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
              <select id="select-namaPejabat" class="form-select form-select-sm" aria-label="Default select example">
                <option disabled selected>Pilih Nama</option>
                <?php
                foreach ($pejabat as $key) { ?>
                  <?php if ($key['jabatan'] == "kades" || $key['jabatan'] == "sekdes") { ?>
                    <option value="<?= $key['id_pejabat']; ?>"><?= $key['nama_pejabat']; ?></option>
                  <?php } ?>
                <?php } ?>
              </select>
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
              <input readonly type="text" class="form-control form-control-sm">
            </div>
          </div>
        </div>
      </div>
      <!------------------------------------------------------------------->
      <!-- AKHIR DATA PERSETUJAN -->
      <!------------------------------------------------------------------->
      <!-- pembatas -->
      <table class="table border-top mb-4">
        <tr>
          <td>DATA PEMOHON</td>
        </tr>
      </table>
      <!-- -->
      <!------------------------------------------------------------------->
      <!-- DATA PEMOHON -->
      <!------------------------------------------------------------------->
      <!-- nama lengkap -->
      <div id="nama-pemohon" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Nama</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <input autocomplete="off" type="text" class="form-control form-control-sm" placeholder="Masukan Nama Lengkap">
        </div>
      </div>
      <!-- -->
      <!-- no nik -->
      <div id="no-nik" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">NIK</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <input autocomplete="off" type="number" class="form-control form-control-sm" placeholder="Masukan Nomor NIK">
        </div>
      </div>
      <!-- -->
      <!-- tempat tanggal lahir -->
      <div id="tempat-tglLahir" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Tempat/Tgl Lahir</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <div class="row g-1">
            <div class="col-7 col-sm-6 col-md-5 col-lg-4">
              <input autocomplete="off" type="text" class="form-control form-control-sm" placeholder="Masukan Tempat lahir">
            </div>
            <div class="col-5 col-sm-5 col-md-4 col-lg-3">
              <input type="date" class="form-control form-control-sm">
            </div>
          </div>
        </div>
      </div>
      <!-- -->
      <!-- jenis kelamin -->
      <div id="jenis-kelamin" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Jenis kelamin</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <div class="row g-1">
            <div class="col-12 col-sm-6 col-md-5 col-lg-4">
              <select id="select-jenisKelamain" class="form-select form-select-sm" aria-label="Default select example">
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
      <!-- -->
      <div id="agama" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Agama</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <div class="row g-1">
            <div class="col-12 col-sm-6 col-md-5 col-lg-4">
              <select id="select-agama" class="form-select form-select-sm" aria-label="Default select example">
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
      <!-- pekerjaan -->
      <div id="pekerjaan" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Pekerjaan</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <input autocomplete="off" type="text" class="form-control form-control-sm" placeholder="Masukan Nama Pekerjaan">
        </div>
      </div>
      <!-- -->
      <!-- alamat -->
      <div id="alamat" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Alamat</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <textarea autocomplete="off" placeholder="Masukan Alamat" class="form-control form-control-sm" aria-label="With textarea"></textarea>
        </div>
      </div>
      <!-- -->
      <!-- jenis skd -->
      <div id="jenis-skd" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Jenis Skd</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
          <div class="row g-1">
            <div class="col-12 col-sm-6 col-md-5 col-lg-4">
              <select id="select-jenisSkd" class="form-select form-select-sm" aria-label="Default select example">
                <option selected disabled>Pilih Jenis Skd</option>
                <?php
                for ($i = 0; $i < count($jenisSkd); $i++) { ?>
                  <option value="<?= $jenisSkd[$i]; ?>"><?= $jenisSkd[$i]; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <!-- -->
      <!-- keterangan -->
      <div id="keterangan" class="row align-items-center mb-2">
        <div class="col-12 col-sm-4 col-md-3 col-xl-2">
          <label class="form-label fs-7">Keterangan</label>
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-xl-10">
        </div>
      </div>
      <!-- -->
    </form>
  </div>
  <!------------------------------------------------------------------->
  <!-- AKHIR DATA PEMOHON -->
  <!------------------------------------------------------------------->
  <!--  -->
  <!-- footer -->
  <div class="card-footer py-3">
    <div class="row">
      <div class="offset-8 col-2 d-grid">
        <button id="reset-formSurat" type="button" class="btn btn-warning">Ulangi</button>
      </div>
      <div class="col-2 d-grid">
        <button id="create-skDesa" type="button" class="btn btn-success">Buat</button>
        <button id="show-skDesaCreate" type="button" class="btn btn-success d-none" data-bs-toggle="modal" data-bs-target="#modal-skDesaCreate">d-none</button>
      </div>
    </div>
  </div>
  <!-- Input kusus update -->
  <input id="aksi-surat" type="hidden">
  <input id="id-surat" type="hidden">
  <input id="no-surat" type="hidden">
  <!--  -->
  <!-- -->
  <script>
    // Jquery untuk membuat surat keterangan desa
    $(document).ready(function() {

      $('#reset-formSurat').click(function() {
        // ======================================================================================================================
        var key = $(this).val();
        resetForm(key, "skDesa");
      });
      $(":button[name='update-skDesa']").click(function() {
        var key = $(this).val();
        updateSurat(key, "skDesa");
      });
      // ===============================
      // ======================================================================================================================
      // Meyebunyikan masa berlaku surat keterangan domisili
      $('#berlaku-skDesa').hide();
      // 
      // Meyebunyikan catatan surat keterangan domisili
      $('#title-catatanSkDesa').hide();
      $('#catatan-skDesa').hide();
      // 
      // Penadatanganan . . .
      $('#form-inputs #nama-pejabat select').change(function() {

        var idJabatan = $(this).val();
        // Mengisi id pejabat
        getPejabatSelect(idJabatan, "form-inputs");
      });
      // kirim nilai secara asynchronous atau secara tidak langsung untuk menentukan jenis surat
      $('#jenis-skd select').change(function() {
        // mendapatkan jenis surat
        var jenisVal = $(this).val();
        selectJenisSkdesa(jenisVal, "form-inputs")
      });
      $("#form-inputs #keterangan textarea").val("xxx");
      // 
      // menampilkan surat
      $('#create-skDesa').click(function() {
        var inputs = [
          $('#form-inputs #nama-pejabat select').val(),
          $('#form-inputs #jabatan input').val(),
          $('#form-inputs #nama-pemohon div:eq(1) input').val(),
          $('#form-inputs #no-nik div:eq(1) input').val(),
          $('#form-inputs #tempat-tglLahir div:eq(1) input:eq(0)').val(),
          $('#form-inputs #tempat-tglLahir div:eq(1) input:eq(1)').val(),
          $('#form-inputs #jenis-kelamin select').val(),
          $('#form-inputs #agama select').val(),
          $('#form-inputs #pekerjaan div:eq(1) input').val(),
          $('#form-inputs #alamat textarea').val(),
          $('#form-inputs #jenis-skd select').val(),
          $('#form-inputs #keterangan textarea').val()
        ];
        var array = [];
        for (let index = 0; index < inputs.length; index++) {
          if (inputs[index] != "" && inputs[index] != null) {
            array.push(inputs[index]);
          }
        }

        if (array.length < 12) {
          notComplete();
        } else {
          var jenis = $('#form-inputs #jenis-skd option:selected').text();
          if ($("#reset-formSurat").val() == "") {
            // Cek apakah data tersebut sudah ada dalam database
            $.ajax({
              type: "POST",
              url: "assets/dist/php/validation.php",
              data: {
                type: "3",
                value: $("#form-inputs #no-nik div:eq(1) input").val(),
                jenisSkDesa: jenis + "," + $("#form-inputs #jabatan div:eq(1) input").val(),
              },
              success: function(response) {
                if (response == 1) {
                  Swal.fire({
                    icon: 'info',
                    title: 'Gagal !!',
                    text: 'Data pemohon, Terdeteksi. Sudah pernah digunakan untuk membuat surat tersebut..',
                    footer: '<a href="">Beralih Ke daftar surat ?</a>'
                  })
                } else {
                  $('#show-skDesaCreate').trigger('click');
                  inputSkDesa();
                }
              }
            });
          } else {
            // Untuk update tanpa perlu validation
            $('#show-skDesaCreate').trigger('click');
            inputSkDesa();
          }
        }

        function inputSkDesa() {
          // Penandatangan
          // Nama penandatangan
          $("#panandatangan #nama td:eq(2)").text(
            $("#form-inputs #nama-pejabat option:selected").text()
          );
          $("#panandatangan #nama td:eq(3) input").val(
            $("#form-inputs #nama-pejabat option:selected").text()
          );
          // =====================================
          $("#hide-idPejabat").val($("#form-inputs #nama-pejabat select").val());
          // Jabatan
          $("#panandatangan #jabatan td:eq(2)").text(
            $("#form-inputs #jabatan div:eq(1) input").val()
          );
          $("#panandatangan #jabatan td:eq(3) input").val(
            $("#form-inputs #jabatan div:eq(1) input").val()
          );
          // Keterangan sesuai jenis surat
          if (jenis == "SKD DOMISILI MAILING") {
            $("#berlaku-skDesa").show();
            $("#title-catatanSkDesa").show();
            $("#catatan-skDesa").show();
          } else {
            $("#berlaku-skDesa").hide();
            $("#title-catatanSkDesa").hide();
            $("#catatan-skDesa").hide();
          }
          // Nama Pemohon
          $("#content-skDesa #nama-pemohon td:eq(2)").text(
            $("#form-inputs #nama-pemohon div:eq(1) input").val()
          );
          $("#content-skDesa #nama-pemohon td:eq(3) input").val(
            $("#form-inputs #nama-pemohon div:eq(1) input").val()
          );
          // Nik
          $("#content-skDesa #no-nik td:eq(2)").text(
            $("#form-inputs #no-nik div:eq(1) input").val()
          );
          $("#content-skDesa #no-nik td:eq(3) input").val(
            $("#form-inputs #no-nik div:eq(1)  input").val()
          );
          // Ttl
          $("#content-skDesa #tempat-tglLahir td:eq(2)").text(
            $("#form-inputs #tempat-tglLahir div:eq(1) input:eq(0)").val() +
            ", " +
            $("#form-inputs #tempat-tglLahir div:eq(1) input:eq(1)").val()
          );
          $("#content-skDesa #tempat-tglLahir td:eq(3) input").val(
            $("#form-inputs #tempat-tglLahir div:eq(1) input:eq(0)").val() +
            ", " +
            $("#form-inputs #tempat-tglLahir div:eq(1) input:eq(1)").val()
          );
          //  Jenis Kelamin
          $("#content-skDesa #jenis-kelamin td:eq(2)").text(
            $("#form-inputs #jenis-kelamin select").val()
          );
          $("#content-skDesa #jenis-kelamin td:eq(3) input").val(
            $("#form-inputs #jenis-kelamin select").val()
          );
          // Agama
          $("#content-skDesa #agama td:eq(2)").text(
            $("#form-inputs #agama select").val()
          );
          $("#content-skDesa #agama td:eq(3) input").val(
            $("#form-inputs #agama select").val()
          );
          // Pekerjaan
          $("#content-skDesa #pekerjaan td:eq(2)").text(
            $("#form-inputs #pekerjaan div:eq(1) input").val()
          );
          $("#content-skDesa #pekerjaan td:eq(3) input").val(
            $("#form-inputs #pekerjaan div:eq(1) input").val()
          );
          // Alamat
          $("#content-skDesa #alamat td:eq(2)").text(
            $("#form-inputs #alamat textarea").val()
          );
          $("#content-skDesa #alamat td:eq(3) input").val(
            $("#form-inputs #alamat textarea").val()
          );
          // Keterangan
          $("#content-skDesa #keterangan td:eq(2)").text(
            $("#form-inputs #keterangan textarea").val()
          );
          $("#content-skDesa #keterangan td:eq(3) input").val(
            $("#form-inputs #keterangan textarea").val()
          );
          // ttd
          $("#ttd div:eq(1)").text(
            $("#form-inputs #jabatan div:eq(1) input").val()
          );
          $("#ttd div:eq(2) span").text(
            $("#form-inputs #nama-pejabat option:selected").text()
          );
          $("#hide-jenisSurat").val(
            jenis + "," + $("#form-inputs #jabatan div:eq(1) input").val()
          );
          // Kusus update
          $("#hide-aksiSurat").val($("#form-inputs #aksi-surat").val());
          $("#hide-idSurat").val($("#form-inputs #id-surat").val());
          $("#hide-noSurat").val($("#form-inputs #no-surat").val());
        }
      });
    });
  </script>
</div>