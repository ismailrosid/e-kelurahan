<?php
$jenis = $_GET["jns"];
?>
<?php if ($jenis == "skdesa") { ?>
  <div id="form-inputSkDesa">
    <?php
    $pejabat = getPejabat();
    include "surat/skDesa/surat.php";
    ?>
    <div class="card-body">
      <div class="d-flex mt-2 mb-4">
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
                <input type="text" class="form-control form-control-sm" placeholder="Masukan Tempat lahir">
              </div>
              <div class="col-5 col-sm-5 col-md-4 col-lg-3">
                <input autocomplete="off" type="date" class="form-control form-control-sm">
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
    <!-- Input kusus online -->
    <?php
    $id = $_GET['idp'];
    $pemohon = getPermohonan($id);
    ?>
    <input id="id-permohonan" type="hidden" value="<?= $pemohon['id_permohonan']; ?>">
    <input id="no-whatsapp" type="hidden" value="<?= $pemohon['no_whatsaap']; ?>">
    <!--  -->
    <!-- -->
    <!-- ktp -->
    <!-- surat-pengantar-rt-/-rw -->
    <script>
      // Jquery untuk membuat surat keterangan desa
      $(document).ready(function() {
        // ===============================
        $('#reset-formSurat').click(function() {
          var key = $(this).val();
          resetForm(key);
        });
        $('#berlaku-skDesa').hide();
        // 
        // Meyebunyikan catatan surat keterangan domisili
        $('#title-catatanSkDesa').hide();
        $('#catatan-skDesa').hide();
        // 
        // Penadatanganan . . .
        $('#form-inputSkDesa #nama-pejabat select').change(function() {

          var idJabatan = $(this).val();
          // Mengisi id pejabat
          getPejabatSelect(idJabatan, "form-inputSkDesa");
        });
        // kirim nilai secara asynchronous atau secara tidak langsung untuk menentukan jenis surat
        $('#jenis-skd select').change(function() {
          // mendapatkan jenis surat
          var jenisVal = $(this).val();
          selectJenisSkdesa(jenisVal, "form-inputSkDesa");;
        });
        // 
        // menampilkan surat
        $('#create-skDesa').click(function() {
          var inputs = [
            $('#form-inputSkDesa #nama-pejabat select').val(),
            $('#form-inputSkDesa #jabatan input').val(),
            $('#form-inputSkDesa #nama-pemohon div:eq(1) input').val(),
            $('#form-inputSkDesa #no-nik div:eq(1) input').val(),
            $('#form-inputSkDesa #tempat-tglLahir div:eq(1) input:eq(0)').val(),
            $('#form-inputSkDesa #tempat-tglLahir div:eq(1) input:eq(1)').val(),
            $('#form-inputSkDesa #jenis-kelamin select').val(),
            $('#form-inputSkDesa #agama select').val(),
            $('#form-inputSkDesa #pekerjaan div:eq(1) input').val(),
            $('#form-inputSkDesa #alamat textarea').val(),
            $('#form-inputSkDesa #jenis-skd select').val(),
            $('#form-inputSkDesa #keterangan textarea').val()
          ];
          var array = [];
          for (let index = 0; index < inputs.length; index++) {
            if (inputs[index] != "" && inputs[index] != null) {
              array.push(inputs[index]);
            }
          }
          // Bikin 12
          if (array.length < 12) {
            notComplete();
          } else {
            var jenis = $('#form-inputSkDesa #jenis-skd option:selected').text();
            if ($("#reset-formSurat").val() == "") {
              // Cek apakah data tersebut sudah ada dalam database
              $.ajax({
                type: "POST",
                url: "assets/dist/php/validation.php",
                data: {
                  type: "3",
                  value: $("#form-inputSkDesa #no-nik div:eq(1) input").val(),
                  jenisSkDesa: jenis + "," + $("#form-inputSkDesa #jabatan div:eq(1) input").val(),
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
              $("#form-inputSkDesa #nama-pejabat option:selected").text()
            );
            $("#panandatangan #nama td:eq(3) input").val(
              $("#form-inputSkDesa #nama-pejabat option:selected").text()
            );
            // =====================================
            $("#hide-idPejabat").val($("#form-inputSkDesa #nama-pejabat select").val());
            // Jabatan
            $("#panandatangan #jabatan td:eq(2)").text(
              $("#form-inputSkDesa #jabatan div:eq(1) input").val()
            );
            $("#panandatangan #jabatan td:eq(3) input").val(
              $("#form-inputSkDesa #jabatan div:eq(1) input").val()
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
              $("#form-inputSkDesa #nama-pemohon div:eq(1) input").val()
            );
            $("#content-skDesa #nama-pemohon td:eq(3) input").val(
              $("#form-inputSkDesa #nama-pemohon div:eq(1) input").val()
            );
            // Nik
            $("#content-skDesa #no-nik td:eq(2)").text(
              $("#form-inputSkDesa #no-nik div:eq(1) input").val()
            );
            $("#content-skDesa #no-nik td:eq(3) input").val(
              $("#form-inputSkDesa #no-nik div:eq(1)  input").val()
            );
            // Ttl
            $("#content-skDesa #tempat-tglLahir td:eq(2)").text(
              $("#form-inputSkDesa #tempat-tglLahir div:eq(1) input:eq(0)").val() +
              ", " +
              $("#form-inputSkDesa #tempat-tglLahir div:eq(1) input:eq(1)").val()
            );
            $("#content-skDesa #tempat-tglLahir td:eq(3) input").val(
              $("#form-inputSkDesa #tempat-tglLahir div:eq(1) input:eq(0)").val() +
              ", " +
              $("#form-inputSkDesa #tempat-tglLahir div:eq(1) input:eq(1)").val()
            );
            //  Jenis Kelamin
            $("#content-skDesa #jenis-kelamin td:eq(2)").text(
              $("#form-inputSkDesa #jenis-kelamin select").val()
            );
            $("#content-skDesa #jenis-kelamin td:eq(3) input").val(
              $("#form-inputSkDesa #jenis-kelamin select").val()
            );
            // Agama
            $("#content-skDesa #agama td:eq(2)").text(
              $("#form-inputSkDesa #agama select").val()
            );
            $("#content-skDesa #agama td:eq(3) input").val(
              $("#form-inputSkDesa #agama select").val()
            );
            // Pekerjaan
            $("#content-skDesa #pekerjaan td:eq(2)").text(
              $("#form-inputSkDesa #pekerjaan div:eq(1) input").val()
            );
            $("#content-skDesa #pekerjaan td:eq(3) input").val(
              $("#form-inputSkDesa #pekerjaan div:eq(1) input").val()
            );
            // Alamat
            $("#content-skDesa #alamat td:eq(2)").text(
              $("#form-inputSkDesa #alamat textarea").val()
            );
            $("#content-skDesa #alamat td:eq(3) input").val(
              $("#form-inputSkDesa #alamat textarea").val()
            );
            // Keterangan
            $("#content-skDesa #keterangan td:eq(2)").text(
              $("#form-inputSkDesa #keterangan textarea").val()
            );
            $("#content-skDesa #keterangan td:eq(3) input").val(
              $("#form-inputSkDesa #keterangan textarea").val()
            );
            // ttd
            $("#ttd div:eq(1)").text(
              "An, " + $("#form-inputSkDesa #jabatan div:eq(1) input").val()
            );
            $("#ttd div:eq(2) span").text(
              $("#form-inputSkDesa #nama-pejabat option:selected").text()
            );
            $("#hide-jenisSurat").val(
              jenis + "," + $("#form-inputSkDesa #jabatan div:eq(1) input").val()
            );
            // Kusus pembuatan online
            $("#hide-idPermohonan").val($("#id-permohonan").val());
            $("#hide-noWhatsapp").val($("#no-whatsapp").val());

          }
        });
      });
    </script>
  </div>
<?php } elseif ($jenis == "sktmsekolah") { ?>
  <div id="form-inputSktmSekolah">
    <?php
    $pejabat = getPejabat();
    include "surat/sktmSekolah/surat.php";
    ?>
    <div class="card-body">
      <div class="d-flex mt-2 mb-4">
        <!-- <button id="show-surats" class="btn btn-success d-flex justify-content-around align-items-center">
          <i class="fa-solid fa-circle-plus"></i>
          <div class="ms-2">LIHAT SURAT</div>
        </button> -->
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
    <!-- Input kusus pembuatan online -->
    <?php
    $id = $_GET['idp'];
    $pemohon = getPermohonan($id);
    ?>
    <input id="id-permohonan" type="hidden" value="<?= $pemohon['id_permohonan']; ?>">
    <input id="no-whatsapp" type="hidden" value="<?= $pemohon['no_whatsaap']; ?>">
    <!--  -->
    <!-- -->
    <script>
      // Jquery untuk membuat surat keterangan tidak mampu
      $(document).ready(function() {
        $('#reset-formSurat').click(function() {
          var key = $(this).val();
          resetForm(key, "sktmSekolah")
        });
        // 
        // Membuat surat sktm sekolah
        $('#create-sktmSekolah').click(function() {
          var inputs = [
            $('#form-inputSktmSekolah #nama-pejabat div:eq(1) input').val(),
            $('#form-inputSktmSekolah #jabatan input').val(),
            // 
            $('#form-inputSktmSekolah #nama-lengkapOrtu input').val(),
            $('#form-inputSktmSekolah #no-nikOrtu input').val(),
            $('#form-inputSktmSekolah #tempat-tglLahirOrtu input:eq(0)').val(),
            $('#form-inputSktmSekolah #tempat-tglLahirOrtu input:eq(1)').val(),
            $('#form-inputSktmSekolah #jenis-kelaminOrtu select').val(),
            $('#form-inputSktmSekolah #bangsa-agamaOrtu select:eq(0)').val(),
            $('#form-inputSktmSekolah #bangsa-agamaOrtu select:eq(1)').val(),
            $('#form-inputSktmSekolah #pekerjaan-ortu input').val(),
            $('#form-inputSktmSekolah #tempat-tinggalOrtu input').val(),
            // 
            $('#form-inputSktmSekolah #nama-lengkapPemohon input').val(),
            $('#form-inputSktmSekolah #no-nikPemohon input').val(),
            $('#form-inputSktmSekolah #tempat-tglLahirPemohon input:eq(0)').val(),
            $('#form-inputSktmSekolah #tempat-tglLahirPemohon input:eq(1)').val(),
            $('#form-inputSktmSekolah #jenis-kelaminPemohon select').val(),
            $('#form-inputSktmSekolah #bangsa-agamaPemohon select:eq(0)').val(),
            $('#form-inputSktmSekolah #bangsa-agamaPemohon select:eq(1)').val(),
            $('#form-inputSktmSekolah #pekerjaan-pemohon input').val(),
            $('#form-inputSktmSekolah #tempat-tinggalPemohon input').val()
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
                  value1: $('#form-inputSktmSekolah #no-nikPemohon input').val(),
                  field2: "no_nik_ortu",
                  value2: $('#form-inputSktmSekolah #no-nikOrtu input').val()
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
            $('#content-sktm-sklhA #nama-lengkap td:eq(2)').text($('#form-inputSktmSekolah #nama-lengkapOrtu div:eq(1) input').val());
            $('#content-sktm-sklhA #nama-lengkap td:eq(3) input').val($('#form-inputSktmSekolah #nama-lengkapOrtu div:eq(1) input').val());
            // 
            // mengisi nik ortu
            $('#content-sktm-sklhA #no-nik td:eq(2)').text($('#form-inputSktmSekolah #no-nikOrtu div:eq(1) input').val());
            $('#content-sktm-sklhA #no-nik td:eq(3) input').val($('#form-inputSktmSekolah #no-nikOrtu div:eq(1) input').val());
            // 
            // mengisi tempat tanggal lahir ortu
            $('#content-sktm-sklhA #tempat-tglLahir td:eq(2)').text($('#form-inputSktmSekolah #tempat-tglLahirOrtu div:eq(1) input:eq(0)').val() + ', ' + $('#form-inputSktmSekolah #tempat-tglLahirOrtu div:eq(1) input:eq(1)').val());
            $('#content-sktm-sklhA #tempat-tglLahir td:eq(3) input').val($('#form-inputSktmSekolah #tempat-tglLahirOrtu div:eq(1) input:eq(0)').val() + ', ' + $('#form-inputSktmSekolah #tempat-tglLahirOrtu div:eq(1) input:eq(1)').val());
            // 
            //  mengisi jenis kelamin ortu
            $('#content-sktm-sklhA #jenis-kelamin td:eq(2)').text($('#form-inputSktmSekolah #jenis-kelaminOrtu div:eq(1) select:eq(0)').val());
            $('#content-sktm-sklhA #jenis-kelamin td:eq(3) input').val($('#form-inputSktmSekolah #jenis-kelaminOrtu div:eq(1) select:eq(0)').val());
            // 
            // mengisi bangsa agama ortu
            $('#content-sktm-sklhA #bangsa-agama td:eq(2)').text($('#form-inputSktmSekolah #bangsa-agamaOrtu div:eq(1) select:eq(0)').val() + ", " + $('#form-inputSktmSekolah #bangsa-agamaOrtu div:eq(1) select:eq(1)').val());
            $('#content-sktm-sklhA #bangsa-agama td:eq(3) input').val($('#form-inputSktmSekolah #bangsa-agamaOrtu div:eq(1) select:eq(0)').val() + ", " + $('#form-inputSktmSekolah #bangsa-agamaOrtu div:eq(1) select:eq(1)').val());
            // mengisi pekerjaan ortu
            $('#content-sktm-sklhA #pekerjaan td:eq(2)').text($('#form-inputSktmSekolah #pekerjaan-ortu div:eq(1) input').val());
            $('#content-sktm-sklhA #pekerjaan td:eq(3) input').val($('#form-inputSktmSekolah #pekerjaan-ortu div:eq(1) input').val());
            // 
            // mengisi tempat tinggal ortu
            $('#content-sktm-sklhA #tempat-tinggal td:eq(2)').text($('#form-inputSktmSekolah #tempat-tinggalOrtu div:eq(1) input').val());
            $('#content-sktm-sklhA #tempat-tinggal td:eq(3) input').val($('#form-inputSktmSekolah #tempat-tinggalOrtu div:eq(1) input').val());
            // 
            // ----------------------------------------------------------------------------------------
            // Mengisi content sktm sekolah b untuk data pemohon
            // ----------------------------------------------------------------------------------------
            // mengisi nama lengkap pemohon
            // ----------------------------------------------------------------------------------------
            // mengisi nama lengkap ortu
            $('#content-sktmSklhPemohon #nama-lengkap td:eq(2)').text($('#form-inputSktmSekolah #nama-lengkapPemohon div:eq(1) input').val());
            $('#content-sktmSklhPemohon #nama-lengkap td:eq(3) input').val($('#form-inputSktmSekolah #nama-lengkapPemohon div:eq(1) input').val());
            // 
            // mengisi nik Pemohon
            $('#content-sktmSklhPemohon #no-nik td:eq(2)').text($('#form-inputSktmSekolah #no-nikPemohon div:eq(1) input').val());
            $('#content-sktmSklhPemohon #no-nik td:eq(3) input').val($('#form-inputSktmSekolah #no-nikPemohon div:eq(1) input').val());
            // 
            // mengisi tempat tanggal lahir Pemohon
            $('#content-sktmSklhPemohon #tempat-tglLahir td:eq(2)').text($('#form-inputSktmSekolah #tempat-tglLahirPemohon div:eq(1) input:eq(0)').val() + ', ' + $('#form-inputSktmSekolah #tempat-tglLahirPemohon div:eq(1) input:eq(1)').val());
            $('#content-sktmSklhPemohon #tempat-tglLahir td:eq(3) input').val($('#form-inputSktmSekolah #tempat-tglLahirPemohon div:eq(1) input:eq(0)').val() + ', ' + $('#form-inputSktmSekolah #tempat-tglLahirPemohon div:eq(1) input:eq(1)').val());
            // 
            //  mengisi jenis kelamin Pemohon
            $('#content-sktmSklhPemohon #jenis-kelamin td:eq(2)').text($('#form-inputSktmSekolah #jenis-kelaminPemohon div:eq(1) select:eq(0)').val());
            $('#content-sktmSklhPemohon #jenis-kelamin td:eq(3) input').val($('#form-inputSktmSekolah #jenis-kelaminPemohon div:eq(1) select:eq(0)').val());
            // 
            // mengisi bangsa agama Pemohon
            $('#content-sktmSklhPemohon #bangsa-agama td:eq(2)').text($('#form-inputSktmSekolah #bangsa-agamaPemohon div:eq(1) select:eq(0)').val() + ", " + $('#form-inputSktmSekolah #bangsa-agamaPemohon div:eq(1) select:eq(1)').val());
            $('#content-sktmSklhPemohon #bangsa-agama td:eq(3) input').val($('#form-inputSktmSekolah #bangsa-agamaPemohon div:eq(1) select:eq(0)').val() + ", " + $('#form-inputSktmSekolah #bangsa-agamaPemohon div:eq(1) select:eq(1)').val());
            // mengisi pekerjaan Pemohon
            $('#content-sktmSklhPemohon #pekerjaan td:eq(2)').text($('#form-inputSktmSekolah #pekerjaan-pemohon div:eq(1) input').val());
            $('#content-sktmSklhPemohon #pekerjaan td:eq(3) input').val($('#form-inputSktmSekolah #pekerjaan-pemohon div:eq(1) input').val());
            // 
            // mengisi tempat tinggal Pemohon
            $('#content-sktmSklhPemohon #tempat-tinggal td:eq(2)').text($('#form-inputSktmSekolah #tempat-tinggalPemohon div:eq(1) input').val());
            $('#content-sktmSklhPemohon #tempat-tinggal td:eq(3) input').val($('#form-inputSktmSekolah #tempat-tinggalPemohon div:eq(1) input').val());
            // 
            // ----------------------------------------------------------------------------------------
            // Mengisi penandatangan
            // ----------------------------------------------------------------------------------------
            // mengisi jabatan
            $('#ttd div:eq(1)').text('An, ' + $('#form-inputSktmSekolah #jabatan div:eq(1) input:eq(0)').val());
            // mengisi nama pejabat
            $('#ttd div:eq(2) span').text($('#form-inputSktmSekolah #nama-pejabat div:eq(1) input').val());
            // 
            // Mengisi id pejabat
            $('#hide-idPejabat').val($('#form-inputSktmSekolah #jabatan div:eq(1) input:eq(1)').val());
            // 
            // Kusus update
            // $("#hide-aksiSurat").val($("#form-inputSktmSekolah #aksi-surat").val());
            // $("#hide-idSurat").val($("#form-inputSktmSekolah #id-surat").val());
            // $("#hide-noSurat").val($("#form-inputSktmSekolah #no-surat").val());
            // Kusus pembuatan online
            $("#hide-idPermohonan").val($("#id-permohonan").val());
            $("#hide-noWhatsapp").val($("#no-whatsapp").val());
          }
        });
      });
    </script>
  </div>
<?php } elseif ($jenis == "skusaha") { ?>
  <div id="form-inputSkUsaha">
    <?php
    $pejabat = getPejabat();
    include "surat/skUsaha/surat.php";
    ?>
    <div class="card-body">
      <!-- pembatas -->
      <form id="forms">
        <table class="table border-top mb-4">
          <tr>
            <td>ATAS PERSETUJUAN</td>
          </tr>
        </table>
        <!-- end -->
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
        <!--  -->
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
                <select id="select-jenisKelamin" class="form-select form-select-sm" aria-label="Default select example">
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
        <!-- Keterangan -->
        <div id="keterangan" class="row align-items-center mb-2">
          <div class="col-12 col-sm-4 col-md-3 col-xl-2">
            <label class="form-label fs-7">Keterangan</label>
          </div>
          <div class="col-12 col-sm-8 col-md-9 col-xl-10">
            <textarea autocomplete="off" rows="4" placeholder="Masukan Alamat" class="form-control" aria-label="With textarea">Bahwa nama tersebut di atas menurut keterangan Ketua  «Ket_RTRW» Desa Kondangjaya benar beralamat tersebut diatas dan yang besangkutan mempunyai  usaha “ «Usaha»“ di «Alamat_Usaha» dimulai dari «Dari_Tahun» sampai tahun sekarang</textarea>
          </div>
        </div>
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
          <button id="create-skUsaha" type="button" class="btn btn-success">Buat</button>
          <button id="show-skUsahaCreate" type="button" class="btn btn-success d-none" data-bs-toggle="modal" data-bs-target="#modal-skUsahaCreate">d-none</button>
        </div>
      </div>
    </div>
    </form>
    <!-- Untuk pembuatan surat online -->
    <?php
    $id = $_GET['idp'];
    $pemohon = getPermohonan($id);
    ?>
    <input id="id-permohonan" type="hidden" value="<?= $pemohon['id_permohonan']; ?>">
    <input id="no-whatsapp" type="hidden" value="<?= $pemohon['no_whatsaap']; ?>">
    <!-- -->
    <script>
      // Jquery untuk membuat surat keterangan desa
      $(document).ready(function() {
        $('#reset-formSurat').click(function() {
          var key = $(this).val();
          resetForm(key, "skUsaha")
        });

        $('#form-inputSkUsaha #nama-pejabat select').change(function() {
          // Mendapatkan id pejabat
          var idJabatan = $(this).val();
          // Mengisi id pejabat
          // 
          // kirim nilai secara asynchronous atau secara tidak langsung untuk mendapakan jabatan
          $.ajax({
            type: "POST",
            url: "assets/dist/php/penadatangan.php",
            data: {
              id: idJabatan
            },
            // 
            // menampilkan hasil yang di dapat yaitu jabatan
            success: function(response) {
              $('#form-inputSkUsaha #jabatan input').val(response);
            }
          });
        });
        // kirim nilai secara asynchronous atau secara tidak langsung untuk menentukan jenis surat
        // 
        // menampilkan surat
        $('#create-skUsaha').click(function() {
          var inputs = [
            $('#form-inputSkUsaha #nama-pejabat div:eq(1) input').val(),
            $('#form-inputSkUsaha #jabatan input').val(),
            $('#form-inputSkUsaha #nama-pemohon div:eq(1) input').val(),
            $('#form-inputSkUsaha #no-nik div:eq(1) input').val(),
            $('#form-inputSkUsaha #tempat-tglLahir div:eq(1) input:eq(0)').val(),
            $('#form-inputSkUsaha #tempat-tglLahir div:eq(1) input:eq(1)').val(),
            $('#form-inputSkUsaha #jenis-kelamin select').val(),
            $('#form-inputSkUsaha #agama select').val(),
            $('#form-inputSkUsaha #pekerjaan div:eq(1) input').val(),
            $('#form-inputSkUsaha #alamat textarea').val(),
            $('#form-inputSkUsaha #keterangan textarea').val()
          ];
          var array = [];
          for (let index = 0; index < inputs.length; index++) {
            if (inputs[index] != "" && inputs[index] != null) {
              array.push(inputs[index]);
            }
          }
          // Bikin 12
          if (array.length < 11) {
            notComplete();
          } else {
            var jenis = $('#form-inputSkUsaha #jenis-skd option:selected').text();
            if ($("#reset-formSurat").val() == "") {
              $.ajax({
                type: "POST",
                url: "assets/dist/php/validation.php",
                data: {
                  type: "1",
                  tableDb: "tb_sk_usaha",
                  field1: "no_nik",
                  value1: $('#form-inputSkUsaha #no-nik div:eq(1) input').val(),
                },
                success: function(response) {
                  console.log(response);
                  if (response == 1) {
                    Swal.fire({
                      icon: 'info',
                      title: 'Gagal !!',
                      text: 'Data pemohon, Terdeteksi. Sudah pernah digunakan untuk membuat surat tersebut..',
                      footer: '<a href="">Beralih Ke daftar surat ?</a>'
                    })
                  } else {
                    $('#show-skUsahaCreate').trigger('click');
                    inputskUsaha();
                  }
                }

              });
            } else {
              $('#show-skUsahaCreate').trigger('click');
              inputskUsaha();
            }
            // Cek apakah data tersebut sudah ada dalam database
          }

          function inputskUsaha() {
            // Penandatangan
            // Nama penandatangan
            $('#panandatangan #nama td:eq(2)').text($('#form-inputSkUsaha #nama-pejabat option:selected').text());
            $('#panandatangan #nama td:eq(3) input').val($('#form-inputSkUsaha #nama-pejabat option:selected').text());
            // =====================================
            $('#hide-idPejabat').val($('#form-inputSkUsaha #jabatan div:eq(1) input:eq(1)').val());
            // Jabatan
            $('#panandatangan #jabatan td:eq(2)').text($('#form-inputSkUsaha #jabatan div:eq(1) input').val());
            $('#panandatangan #jabatan td:eq(3) input').val($('#form-inputSkUsaha #jabatan div:eq(1) input').val());
            // Nama Pemohon
            $('#content-skUsaha #nama-pemohon td:eq(2)').text($('#form-inputSkUsaha #nama-pemohon div:eq(1) input').val());
            $('#content-skUsaha #nama-pemohon td:eq(3) input').val($('#form-inputSkUsaha #nama-pemohon div:eq(1) input').val());
            // Nik 
            $('#content-skUsaha #no-nik td:eq(2)').text($('#form-inputSkUsaha #no-nik div:eq(1) input').val());
            $('#content-skUsaha #no-nik td:eq(3) input').val($('#form-inputSkUsaha #no-nik div:eq(1) input').val());
            // Ttl 
            $('#content-skUsaha #tempat-tglLahir td:eq(2)').text($('#form-inputSkUsaha #tempat-tglLahir div:eq(1) input:eq(0)').val() + ', ' + $('#form-inputSkUsaha #tempat-tglLahir div:eq(1) input:eq(1)').val());
            $('#content-skUsaha #tempat-tglLahir td:eq(3) input').val($('#form-inputSkUsaha #tempat-tglLahir div:eq(1) input:eq(0)').val() + ', ' + $('#form-inputSkUsaha #tempat-tglLahir div:eq(1) input:eq(1)').val());
            //  Jenis Kelamin 
            $('#content-skUsaha #jenis-kelamin td:eq(2)').text($('#form-inputSkUsaha #jenis-kelamin select').val());
            $('#content-skUsaha #jenis-kelamin td:eq(3) input').val($('#form-inputSkUsaha #jenis-kelamin select').val());
            // Agama
            $('#content-skUsaha #agama td:eq(2)').text($('#form-inputSkUsaha #agama select').val());
            $('#content-skUsaha #agama td:eq(3) input').val($('#form-inputSkUsaha #agama select').val());
            // Pekerjaan 
            $('#content-skUsaha #pekerjaan td:eq(2)').text($('#form-inputSkUsaha #pekerjaan div:eq(1) input').val());
            $('#content-skUsaha #pekerjaan td:eq(3) input').val($('#form-inputSkUsaha #pekerjaan div:eq(1) input').val());
            // Alamat
            $('#content-skUsaha #alamat td:eq(2)').text($('#form-inputSkUsaha #alamat textarea').val());
            $('#content-skUsaha #alamat td:eq(3) input').val($('#form-inputSkUsaha #alamat textarea').val());
            // Keterangan
            $('#keterangan').text($('#form-inputSkUsaha #keterangan textarea').val());
            // hide
            $('#keterangan-hide').val($('#form-inputSkUsaha #keterangan textarea').val());
            // ttd
            $('#ttd div:eq(1)').text($('#form-inputSkUsaha #jabatan div:eq(1) input:eq(0)').val());
            $('#ttd div:eq(2) span').text($('#form-inputSkUsaha #nama-pejabat div:eq(1) input').val());
            // Kusus update
            // $("#hide-aksiSurat").val($("#form-inputSkUsaha #aksi-surat").val());
            // $("#hide-idSurat").val($("#form-inputSkUsaha #id-surat").val());
            // $("#hide-noSurat").val($("#form-inputSkUsaha #no-surat").val());
            $("#hide-idPermohonan").val($("#id-permohonan").val());
            $("#hide-noWhatsapp").val($("#no-whatsapp").val());
          }
        });
      });
    </script>
  </div>
<?php } elseif ($jenis == "skkematian") { ?>
  <div id="form-inputSkKematian">
    <?php
    $pejabat = getPejabat();
    include "surat/skKematian/surat.php";
    ?>
    <div class="card-body">
      <div class="d-flex mt-2 mb-4">
        <!-- <button id="show-surats" class="btn btn-success d-flex justify-content-around align-items-center">
          <i class="fa-solid fa-circle-plus"></i>
          <div class="ms-2">LIHAT SURAT</div>
        </button> -->
      </div>
      <!-- pembatas -->
      <form id="forms">
        <table class="table border-top mb-4">
          <tr>
            <td>ATAS PERSETUJUAN</td>
          </tr>
        </table>
        <!-- end -->
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
                <select id="select-namajabatan" class="form-select form-select-sm" aria-label="Default select example">
                  <option selected disabled>Pilih Nama</option>
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
        <!--  -->
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
            <td>DATA ALM</td>
          </tr>
        </table>
        <!-- Nama Lengkap almarhum/h -->
        <div id="nama-alm" class="row align-items-center mb-2">
          <div class="col-12 col-sm-4 col-md-3 col-xl-2">
            <label class="form-label fs-7">Nama Lengkap</label>
          </div>
          <div class="col-12 col-sm-8 col-md-9 col-xl-10">
            <input autocomplete="off" type="text" class="form-control form-control-sm" placeholder="Masukan Nama Lengkap">
          </div>
        </div>
        <!--  -->
        <!-- no nik ortu -->
        <div id="no-nikAlm" class="row align-items-center mb-2">
          <div class="col-12 col-sm-4 col-md-3 col-xl-2">
            <label class="form-label fs-7">NO. NIK</label>
          </div>
          <div class="col-12 col-sm-8 col-md-9 col-xl-10">
            <input autocomplete="off" type="number" class="form-control form-control-sm" placeholder="Masukan Nomor NIK">
          </div>
        </div>
        <!--  -->
        <!-- tempat tanggal lahir ortu -->
        <div id="tempat-tglLahirUmur" class="row align-items-center mb-2">
          <div class="col-12 col-sm-4 col-md-3 col-xl-2">
            <label class="form-label fs-7">Tempat.Tgl Lahir/Umur</label>
          </div>
          <div class="col-12 col-sm-8 col-md-9 col-xl-10">
            <div class="row g-1">
              <div class="col-6 col-sm-6 col-md-5 col-lg-4">
                <input autocomplete="off" type="text" class="form-control form-control-sm" id="tempat-lahir" placeholder="Masukan Tempat lahir">
              </div>
              <div class="col-4 col-sm-4 col-md-4 col-lg-3">
                <input type="date" class="form-control form-control-sm" id="tempat-lahir">
              </div>
              <div class="col-3 col-sm-3 col-md-3 col-lg-2">
                <input autocomplete="off" type="text" placeholder="Masukan Umur" class="form-control form-control-sm" id="tempat-lahir">
              </div>
            </div>
          </div>
        </div>
        <!--  -->
        <!-- pekerjaan alm -->
        <div id="pekerjaan-alm" class="row align-items-center mb-2">
          <div class="col-12 col-sm-4 col-md-3 col-xl-2">
            <label class="form-label fs-7">Pekerjaan</label>
          </div>
          <div class="col-12 col-sm-8 col-md-9 col-xl-10">
            <input autocomplete="off" type="text" class="form-control form-control-sm" placeholder="Masukan Nama Pekerjaan">
          </div>
        </div>
        <!--  -->
        <!-- alamat -->
        <div id="alamat-alm" class="row align-items-center mb-2">
          <div class="col-12 col-sm-4 col-md-3 col-xl-2">
            <label class="form-label fs-7">Alamat</label>
          </div>
          <div class="col-12 col-sm-8 col-md-9 col-xl-10">
            <textarea autocomplete="off" placeholder="Masukan Alamat" class="form-control form-control-sm" aria-label="With textarea"></textarea>
          </div>
        </div>
        <!-- -->
        <table class="table border-top mb-4">
          <tr>
            <td>WAKTU KEJADIAN</td>
          </tr>
        </table>
        <!--  -->
        <!-- hari -->
        <div id="hari" class="row align-items-center mb-2">
          <div class="col-12 col-sm-4 col-md-3 col-xl-2">
            <label class="form-label fs-7">Hari</label>
          </div>
          <div class="col-12 col-sm-8 col-md-9 col-xl-10">
            <div class="row g-1">
              <div class="col-12 col-sm-6 col-md-5 col-lg-4">
                <select id="select-hari" class="form-select form-select-sm" aria-label="Default select example">
                  <option selected disabled>Pilih Hari</option>
                  <?php
                  for ($i = 0; $i < count($jenisHari); $i++) { ?>
                    <option value="<?= $jenisHari[$i]; ?>"><?= $jenisHari[$i]; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <!--  -->
        <!-- umur -->
        <div id="tanggal" class="row align-items-center mb-2">
          <div class="col-12 col-sm-4 col-md-3 col-xl-2">
            <label class="form-label fs-7">Tanggal</label>
          </div>
          <div class="col-12 col-sm-8 col-md-9 col-xl-10">
            <div class="row g-1">
              <div class="col-12 col-sm-6 col-md-5 col-lg-4">
                <input type="date" class="form-control form-control-sm">
              </div>
            </div>
          </div>
        </div>
        <!--  -->
        <!-- umur -->
        <div id="pukul" class="row align-items-center mb-2">
          <div class="col-12 col-sm-4 col-md-3 col-xl-2">
            <label class="form-label fs-7">Pukul</label>
          </div>
          <div class="col-12 col-sm-8 col-md-9 col-xl-10">
            <div class="row g-1">
              <div class="col-12 col-sm-6 col-md-5 col-lg-4">
                <input type="time" class="form-control form-control-sm" placeholder="Masukan Pekerjaan">
              </div>
            </div>
          </div>
        </div>
        <!--  -->
        <!-- umur -->
        <div id="penyebab-kematian" class="row align-items-center mb-2">
          <div class="col-12 col-sm-4 col-md-3 col-xl-2">
            <label class="form-label fs-7">Penyebab Kematian</label>
          </div>
          <div class="col-12 col-sm-8 col-md-9 col-xl-10">
            <div class="row g-1">
              <div class="col-12 col-sm-6 col-md-5 col-lg-4">
                <textarea autocomplete="off" placeholder="Masukan Penyebab Kematian" class="form-control form-control-sm" aria-label="With textarea"></textarea>
              </div>
            </div>
          </div>
        </div>
        <!--  -->
        <!-- -->
        <table class="table border-top mb-4">
          <tr>
            <td>DATA PELAPOR</td>
          </tr>
        </table>
        <!-- Nama Lengkap pelapor -->
        <div id="nama-pelapor" class="row align-items-center mb-2">
          <div class="col-12 col-sm-4 col-md-3 col-xl-2">
            <label class="form-label fs-7">Nama Lengkap</label>
          </div>
          <div class="col-12 col-sm-8 col-md-9 col-xl-10">
            <input autocomplete="off" type="text" class="form-control form-control-sm" placeholder="Masukan Nama Lengkap">
          </div>
        </div>
        <!--  -->
        <!-- no nik ortu -->
        <div id="no-nikPelapor" class="row align-items-center mb-2">
          <div class="col-12 col-sm-4 col-md-3 col-xl-2">
            <label class="form-label fs-7">NO. NIK</label>
          </div>
          <div class="col-12 col-sm-8 col-md-9 col-xl-10">
            <input autocomplete="off" type="number" class="form-control form-control-sm" placeholder="Masukan Nomor NIK">
          </div>
        </div>
        <!--  -->
        <!-- Nothing gonna change my love for you -->
        <!-- no nik ortu -->
        <div id="umur-pelapor" class="row align-items-center mb-2">
          <div class="col-12 col-sm-4 col-md-3 col-xl-2">
            <label class="form-label fs-7">Umur</label>
          </div>
          <div class="col-12 col-sm-8 col-md-9 col-xl-10">
            <input autocomplete="off" type="text" class="form-control form-control-sm" placeholder="Masukan Umur">
          </div>
        </div>
        <!--  -->
        <!-- pekerjaan ortu -->
        <div id="pekerjaan-pelapor" class="row align-items-center mb-2">
          <div class="col-12 col-sm-4 col-md-3 col-xl-2">
            <label class="form-label fs-7">Pekerjaan</label>
          </div>
          <div class="col-12 col-sm-8 col-md-9 col-xl-10">
            <input autocomplete="off" type="text" class="form-control form-control-sm" placeholder="Masukan Nama Pekerjaan">
          </div>
        </div>
        <!--  -->
        <!-- alamat -->
        <div id="alamat-pelapor" class="row align-items-center mb-2">
          <div class="col-12 col-sm-4 col-md-3 col-xl-2">
            <label class="form-label fs-7">Alamat</label>
          </div>
          <div class="col-12 col-sm-8 col-md-9 col-xl-10">
            <textarea autocomplete="off" placeholder="Masukan Alamat" class="form-control form-control-sm" aria-label="With textarea"></textarea>
          </div>
        </div>
        <!-- -->
        <!-- pekerjaan ortu -->
        <div id="relasi" class="row align-items-center mb-2">
          <div class="col-12 col-sm-4 col-md-3 col-xl-2">
            <label class="form-label fs-7">Hubungan Pelapor - Alm</label>
          </div>
          <div class="col-12 col-sm-8 col-md-9 col-xl-10">
            <input autocomplete="off" type="text" class="form-control form-control-sm" placeholder="Masukan Nama Pekerjaan">
          </div>
        </div>
        <!--  -->
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
          <button id="create-skKematian" type="button" class="btn btn-success">Buat</button>
          <button id="show-skKematianCreate" type="button" class="btn btn-success d-none" data-bs-toggle="modal" data-bs-target="#modal-skKematianCreate">d-none</button>
        </div>
      </div>
    </div>
    </form>
    <!-- <input id="aksi-surat" type="hidden">
    <input id="id-surat" type="hidden">
    <input id="no-surat" type="hidden"> -->
    <?php
    $id = $_GET['idp'];
    $pemohon = getPermohonan($id);
    ?>
    <input id="id-permohonan" type="hidden" value="<?= $pemohon['id_permohonan']; ?>">
    <input id="no-whatsapp" type="hidden" value="<?= $pemohon['no_whatsaap']; ?>">
    <!-- -->
    <script>
      // Jquery untuk membuat surat keterangan desa
      $(document).ready(function() {
        $('#reset-formSurat').click(function() {
          var key = $(this).val();
          resetForm(key, "skKematian");
        });
        // Penadatanganan . . .
        $('#form-inputSkKematian #nama-pejabat select').change(function() {
          // Mendapatkan id pejabat
          var idJabatan = $(this).val();
          getPejabatSelect(idJabatan, "form-inputSkKematian");
        });
        // kirim nilai secara asynchronous atau secara tidak langsung untuk menentukan jenis surat
        $('#reset-formskKematian').click(function() {
          $('#form-inputSkKematian #keterangan div:eq(1)').remove();
          $('#form-skKematian')[0].reset();

          $('#reset-formSurat').click(function(e) {
            var key = $(this).val();
            resetForm(key, "skKematian");

          });
          // Penadatanganan . . .
          $('#form-inputSkKematian #nama-pejabat select').change(function() {
            // Mendapatkan id pejabat
            var idJabatan = $(this).val();
            // Mengisi id pejabat
            // 
            // kirim nilai secara asynchronous atau secara tidak langsung untuk mendapakan jabatan
            $.ajax({
              type: "POST",
              url: "assets/dist/php/penadatangan.php",
              data: {
                id: idJabatan
              },
              // menampilkan hasil yang di dapat yaitu jabatan
              success: function(response) {
                $('#form-inputSkKematian #jabatan input').val(response);
              }
            });
          });
          // kirim nilai secara asynchronous atau secara tidak langsung untuk menentukan jenis surat

          // 
          // menampilkan surat

        });
        $('#create-skKematian').click(function() {
          var inputs = [
            $('#form-inputSkKematian #nama-pejabat select').val(),
            $('#form-inputSkKematian #jabatan input').val(),
            $('#form-inputSkKematian #nama-alm div:eq(1) input').val(),
            $('#form-inputSkKematian #no-nikAlm div:eq(1) input').val(),
            $('#form-inputSkKematian #tempat-tglLahirUmur div:eq(1) input:eq(0)').val(),
            $('#form-inputSkKematian #tempat-tglLahirUmur div:eq(1) input:eq(1)').val(),
            $('#form-inputSkKematian #tempat-tglLahirUmur div:eq(1) input:eq(2)').val(),
            $('#form-inputSkKematian #pekerjaan-alm div:eq(1) input').val(),
            $('#form-inputSkKematian #alamat-alm textarea').val(),
            $('#form-inputSkKematian #hari select').val(),
            $('#form-inputSkKematian #tanggal div:eq(1) input').val(),
            $('#form-inputSkKematian #pukul div:eq(1) input').val(),
            $('#form-inputSkKematian #penyebab-kematian textarea').val(),
            $('#form-inputSkKematian #nama-pelapor div:eq(1) input').val(),
            $('#form-inputSkKematian #no-nikPelapor div:eq(1) input').val(),
            $('#form-inputSkKematian #umur-pelapor div:eq(1) input').val(),
            $('#form-inputSkKematian #pekerjaan-pelapor div:eq(1) input').val(),
            $('#form-inputSkKematian #alamat-pelapor textarea').val(),
            $('#form-inputSkKematian #relasi div:eq(1) input').val(),
          ];
          var array = [];
          for (let index = 0; index < inputs.length; index++) {
            if (inputs[index] != "" && inputs[index] != null) {
              array.push(inputs[index]);
            }
          }
          // Bikin 12
          if (array.length < 19) {
            notComplete();
          } else {
            // Cek apakah data tersebut sudah ada dalam database
            if ($("#reset-formSurat").val() == "") {
              $.ajax({
                type: "POST",
                url: "assets/dist/php/validation.php",
                data: {
                  type: "2",
                  tableDb: "tb_sk_kematian",
                  field1: "no_nik_alm",
                  value1: $("#form-inputSkKematian #no-nikAlm div:eq(1) input").val(),
                  field2: "no_nik_pelapor",
                  value2: $("#form-inputSkKematian #no-nikPelapor div:eq(1) input").val()
                },
                success: function(response) {
                  if (response == 1) {
                    Swal.fire({
                      icon: 'info',
                      title: 'Gagal !!',
                      text: 'Data tersebut, Terdeteksi. Sudah pernah digunakan untuk membuat surat tersebut..',
                      footer: '<a href="">Beralih Ke daftar surat ?</a>'
                    })
                  } else {
                    inputSkKematian()
                    $('#show-skKematianCreate').trigger('click');
                  }
                }
              });
            } else {
              inputSkKematian()
              $('#show-skKematianCreate').trigger('click');
            }
          }

          function inputSkKematian() {
            $('#panandatangan #nama td:eq(2)').text($('#form-inputSkKematian #nama-pejabat option:selected').text());
            $('#panandatangan #nama td:eq(3) input').val($('#form-inputSkKematian #nama-pejabat option:selected').text());
            // =====================================
            $('#hide-idPejabat').val($('#form-inputSkKematian #nama-pejabat select').val());
            // Jabatan
            $('#panandatangan #jabatan td:eq(2)').text($('#form-inputSkKematian #jabatan div:eq(1) input').val());
            $('#panandatangan #jabatan td:eq(3) input').val($('#form-inputSkKematian #jabatan div:eq(1) input').val());
            // Keterangan sesuai jenis surat
            // Nama alm
            $('#content-skKematian table:eq(0) #nama-alm td:eq(2)').text($('#form-inputSkKematian #nama-alm div:eq(1) input').val());
            $('#content-skKematian table:eq(0) #nama-alm td:eq(3) input').val($('#form-inputSkKematian #nama-alm div:eq(1) input').val());
            // Nik alm
            $('#content-skKematian table:eq(0) #no-nikAlm td:eq(2)').text($('#form-inputSkKematian #no-nikAlm div:eq(1) input').val());
            $('#content-skKematian table:eq(0) #no-nikAlm td:eq(3) input').val($('#form-inputSkKematian #no-nikAlm div:eq(1) input').val());
            // Ttl umur alm
            $('#content-skKematian table:eq(0) #tempat-tglLahirUmur td:eq(2)').text($('#form-inputSkKematian #tempat-tglLahirUmur div:eq(1) input:eq(0)').val() + ', ' + $('#form-inputSkKematian #tempat-tglLahirUmur div:eq(1) input:eq(1)').val() + " / " + $('#form-inputSkKematian #tempat-tglLahirUmur div:eq(1) input:eq(2)').val() + " Tahun");
            $('#content-skKematian table:eq(0) #tempat-tglLahirUmur td:eq(3) input').val($('#form-inputSkKematian #tempat-tglLahirUmur div:eq(1) input:eq(0)').val() + ', ' + $('#form-inputSkKematian #tempat-tglLahirUmur div:eq(1) input:eq(1)').val() + " / " + $('#form-inputSkKematian #tempat-tglLahirUmur div:eq(1) input:eq(2)').val() + " Tahun");
            //  Pekerjaan alm
            $('#content-skKematian table:eq(0) #pekerjaan-alm td:eq(2)').text($('#form-inputSkKematian #pekerjaan-alm div:eq(1) input').val());
            $('#content-skKematian table:eq(0) #pekerjaan-alm td:eq(3) input').val($('#form-inputSkKematian #pekerjaan-alm div:eq(1) input').val());
            // Alamat
            $('#content-skKematian table:eq(0) #alamat-alm td:eq(2) div:eq(0)').text($('#form-inputSkKematian #alamat-alm textarea').val());
            $('#content-skKematian table:eq(0) #alamat-alm td:eq(3) input').val($('#form-inputSkKematian #alamat-alm textarea').val());
            //  
            // Hari
            $('#content-skKematian table:eq(1) #hari td:eq(2)').text($('#form-inputSkKematian #hari select').val());
            $('#content-skKematian table:eq(1) #hari td:eq(3) input').val($('#form-inputSkKematian #hari select').val());
            // Tanggal
            $('#content-skKematian table:eq(1) #tanggal td:eq(2)').text($('#form-inputSkKematian #tanggal div:eq(1) input').val());
            $('#content-skKematian table:eq(1) #tanggal td:eq(3) input').val($('#form-inputSkKematian #tanggal div:eq(1) input').val());
            // Pukul
            $('#content-skKematian table:eq(1) #pukul td:eq(2)').text($('#form-inputSkKematian #pukul div:eq(1) input').val() + " Wib");
            $('#content-skKematian table:eq(1) #pukul td:eq(3) input').val($('#form-inputSkKematian #pukul div:eq(1) input').val() + " Wib");
            // Penyebab Kematian
            $('#content-skKematian table:eq(1) #penyebab-kematian td:eq(2)').text($('#form-inputSkKematian #penyebab-kematian textarea').val());
            $('#content-skKematian table:eq(1) #penyebab-kematian td:eq(3) input').val($('#form-inputSkKematian #penyebab-kematian textarea').val());
            // 
            // Nama lengkap palapor
            $('#content-skKematian table:eq(2) #nama-pelapor td:eq(2)').text($('#form-inputSkKematian #nama-pelapor div:eq(1) input').val());
            $('#content-skKematian table:eq(2) #nama-pelapor td:eq(3) input').val($('#form-inputSkKematian #nama-pelapor div:eq(1) input').val());
            // No nik pelapor
            $('#content-skKematian table:eq(2) #no-nikPelapor td:eq(2)').text($('#form-inputSkKematian #no-nikPelapor div:eq(1) input').val());
            $('#content-skKematian table:eq(2) #no-nikPelapor td:eq(3) input').val($('#form-inputSkKematian #no-nikPelapor div:eq(1) input').val());
            // Umur pelapor
            $('#content-skKematian table:eq(2) #umur-pelapor td:eq(2)').text($('#form-inputSkKematian #umur-pelapor div:eq(1) input').val());
            $('#content-skKematian table:eq(2) #umur-pelapor td:eq(3) input').val($('#form-inputSkKematian #umur-pelapor div:eq(1) input').val());
            //  Pekerjaan pelapor
            $('#content-skKematian table:eq(2) #pekerjaan-pelapor td:eq(2)').text($('#form-inputSkKematian #pekerjaan-pelapor div:eq(1) input').val());
            $('#content-skKematian table:eq(2) #pekerjaan-pelapor td:eq(3) input').val($('#form-inputSkKematian #pekerjaan-pelapor div:eq(1) input').val());
            // Alamat pelapor
            $('#content-skKematian table:eq(2) #alamat-pelapor td:eq(2) div:eq(0)').text($('#form-inputSkKematian #alamat-pelapor textarea').val());
            $('#content-skKematian table:eq(2) #alamat-pelapor td:eq(3) input').val($('#form-inputSkKematian #alamat-pelapor textarea').val());
            //  Pekerjaan pelapor
            $('#content-skKematian table:eq(2) #relasi td:eq(2)').text($('#form-inputSkKematian #relasi div:eq(1) input').val());
            $('#content-skKematian table:eq(2) #relasi td:eq(3) input').val($('#form-inputSkKematian #relasi div:eq(1) input').val());
            // ttd
            $('#ttd div:eq(1)').text($('#form-inputSkKematian #jabatan div:eq(1) input').val());
            $('#ttd div:eq(2) span').text($('#form-inputSkKematian #nama-pejabat option:selected').text());
            // Mengisi id pejabat
            $('#hide-idPejabat').val($('#form-inputSkKematian #nama-pejabat option:selected').val());
            // 
            // Kusus update
            // $("#hide-aksiSurat").val($("#form-inputSkKematian #aksi-surat").val());
            // $("#hide-idSurat").val($("#form-inputSkKematian #id-surat").val());
            // $("#hide-noSurat").val($("#form-inputSkKematian #no-surat").val());
            $("#hide-idPermohonan").val($("#id-permohonan").val());
            $("#hide-noWhatsapp").val($("#no-whatsapp").val());
          }
        });
      });
    </script>
  </div>
<?php } elseif ($jenis == "skkeramaian") { ?>
  <div id="form-inputSkKeramaian">
    <?php
    $pejabat = getPejabat();
    include "surat/skKeramaian/surat.php";
    ?>
    <div class="card-body">
      <div class="d-flex mt-2 mb-4">
        <!-- <button id="show-surats" class="btn btn-success d-flex justify-content-around align-items-center">
          <i class="fa-solid fa-circle-plus"></i>
          <div class="ms-2">Lihat Surat</div>
        </button> -->
      </div>
      <form id="forms">
        <!-- pembatas -->
        <table class="table border-top my-3">
          <tr>
            <td>MENGETAHUI</td>
          </tr>
        </table>
        <form id="forms">
          <!-- end -->
          <!------------------------------------------------------------------->
          <!-- DATA PERSETUJAN -->
          <!------------------------------------------------------------------->
          <!-- TKSK KARAWANG TIMUR -->
          <!-- nama pejabat kiri -->
          <div id="nama-pejabatKiri" class="row align-items-center mb-2">
            <div class="col-12 col-sm-4 col-md-3 col-xl-2">
              <label class="form-label fs-7">Nama</label>
            </div>
            <div class="col-12 col-sm-8 col-md-9 col-xl-10">
              <div class="row g-1">
                <div class="col-12 col-sm-6 col-md-5 col-lg-4">
                  <?php
                  foreach ($pejabat as $key) { ?>
                    <?php if ($key['jabatan'] == 'babinsa') { ?>
                      <input readonly value="<?= $key['nama_pejabat']; ?>" type="text" class="form-control form-control-sm">
                    <?php } ?>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <!-- jabatan -->
          <div id="jabatan-kiri" class="row align-items-center mb-2">
            <div class="col-12 col-sm-4 col-md-3 col-xl-2">
              <label class="form-label fs-7">Jabatan</label>
            </div>
            <div class="col-12 col-sm-8 col-md-9 col-xl-10">
              <div class="row g-1">
                <div class="col-12 col-sm-6 col-md-5 col-lg-4">
                  <?php
                  foreach ($pejabat as $key) { ?>
                    <?php if ($key['jabatan'] == 'babinsa') { ?>
                      <input readonly value="<?= cekJabatan($key['jabatan']); ?>" type="text" class="form-control form-control-sm">
                      <input readonly value="<?= $key['id_pejabat']; ?>" type="hidden" class="form-control form-control-sm">
                    <?php } ?>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="my-2 border-bottom border-1"></div>
          <!------------------------------------------------------------------->
          <!-- CAMAT KARAWANG TIMUR -->
          <!------------------------------------------------------------------->
          <!-- nama pejabat -->
          <div id="nama-pejabatTengah" class="row align-items-center mb-2">
            <div class="col-12 col-sm-4 col-md-3 col-xl-2">
              <label class="form-label fs-7">Nama</label>
            </div>
            <div class="col-12 col-sm-8 col-md-9 col-xl-10">
              <div class="row g-1">
                <div class="col-12 col-sm-6 col-md-5 col-lg-4">
                  <?php
                  foreach ($pejabat as $key) { ?>
                    <?php if ($key['jabatan'] == 'babinmas') { ?>
                      <input readonly value="<?= $key['nama_pejabat']; ?>" type="text" class="form-control form-control-sm">
                    <?php } ?>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <!-- jabatan -->
          <div id="jabatan-tengah" class="row align-items-center mb-2">
            <div class="col-12 col-sm-4 col-md-3 col-xl-2">
              <label class="form-label fs-7">Jabatan</label>
            </div>
            <div class="col-12 col-sm-8 col-md-9 col-xl-10">
              <div class="row g-1">
                <div class="col-12 col-sm-6 col-md-5 col-lg-4">
                  <?php
                  foreach ($pejabat as $key) { ?>
                    <?php if ($key['jabatan'] == 'babinmas') { ?>
                      <input readonly value="<?= cekJabatan($key['jabatan']); ?>" type="text" class="form-control form-control-sm">
                      <input readonly value="<?= $key['id_pejabat']; ?>" type="hidden" class="form-control form-control-sm">
                    <?php } ?>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <!-- KEPALA DESA KONDANGJAYA -->
          <!-- nama pejabat -->
          <div id="nama-pejabatKanan" class="row align-items-center mb-2">
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
          <div id="jabatan-kanan" class="row align-items-center mb-2">
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
          <div class="my-2 border-bottom border-1"></div>
          <!------------------------------------------------------------------->
          <!-- AKHIR DATA PERSETUJAN -->
          <!------------------------------------------------------------------->
          <table class="table border-top my-3">
            <tr>
              <td>DATA PEMOHON</td>
            </tr>
          </table>
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
          <!--  -->
          <!-- waktu hari tanggal -->
          <div id="waktu" class="row align-items-center mb-2">
            <div class="col-12 col-sm-4 col-md-3 col-xl-2">
              <label class="form-label fs-7">Waktu</label>
            </div>
            <div class="col-12 col-sm-8 col-md-9 col-xl-10">
              <div id="hari" class="row mb-1">
                <div class="col-lg-1"> <label style="font-size: 0.86rem;" class="form-label fs-8">Hari</label></div>
                <div class="col-lg-3">
                  <select id="select-hari" class="form-select form-select-sm" aria-label="Default select example">
                    <option selected disabled>Pilih Hari</option>
                    <?php
                    for ($i = 0; $i < count($jenisHari); $i++) { ?>
                      <option value="<?= $jenisHari[$i]; ?>"><?= $jenisHari[$i]; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div id="tanggal" class="row">
                <div class="col-lg-1"> <label style="font-size: 0.86rem;" class="form-label">Tanggal</label></div>
                <div class="col-lg-3">
                  <input type="date" class="form-control form-control-sm">
                </div>
              </div>
            </div>
          </div>
          <!--  -->
          <!-- Tempat pelaksanaan -->
          <div id="tempat-pelaksanaan" class="row align-items-center mb-2">
            <div class="col-12 col-sm-4 col-md-3 col-xl-2">
              <label class="form-label fs-7">Tempat Pelaksanaan</label>
            </div>
            <div class="col-12 col-sm-8 col-md-9 col-xl-10">
              <textarea autocomplete="off" placeholder="Masukan Tempat Pelaksanaan" class="form-control form-control-sm" aria-label="Masukan Tempat Pelaksanaan"></textarea>
            </div>
          </div>
          <!-- -->
          <!-- Hiburan -->
          <div id="hiburan" class="row align-items-center mb-2">
            <div class="col-12 col-sm-4 col-md-3 col-xl-2">
              <label class="form-label fs-7">Hiburan</label>
            </div>
            <div class="col-12 col-sm-8 col-md-9 col-xl-10">
              <div class="row g-1">
                <div class="col-12 col-sm-6 col-md-5 col-lg-4">
                  <input autocomplete="off" type="text" class="form-control form-control-sm" placeholder="Masukan Nama Hiburan">
                </div>
              </div>
            </div>
          </div>
          <!-- -->
    </div>
    <!-- footer -->
    <div class="card-footer py-3">
      <div class="row">
        <div class="offset-8 col-2 d-grid">
          <button id="reset-formSurat" type="button" class="btn btn-warning">Ulangi</button>
        </div>
        <div class="col-2 d-grid">
          <button id="create-skKeramaian" type="button" class="btn btn-success">Buat</button>
          <button id="show-skKeramaianCreate" type="button" class="btn btn-success d-none" data-bs-toggle="modal" data-bs-target="#modal-skKeramaianCreate">d-none</button>
        </div>
      </div>
    </div>
    </form>
    <!-- <input id="aksi-surat" type="hidden">
    <input id="id-surat" type="hidden">
    <input id="no-surat" type="hidden"> -->
    <!-- end -->
    <?php
    $id = $_GET['idp'];
    $pemohon = getPermohonan($id);
    ?>
    <input id="id-permohonan" type="hidden" value="<?= $pemohon['id_permohonan']; ?>">
    <input id="no-whatsapp" type="hidden" value="<?= $pemohon['no_whatsaap']; ?>">
    <!--  -->
    <!--  -->
    <script>
      // Jquery untuk membuat surat keterangan desa
      $(document).ready(function() {
        $('#reset-formSurat').click(function() {
          var key = $(this).val();
          resetForm(key, "skKeramaian");
        });
        // Penadatanganan . . .
        // 
        // menampilkan surat
        $('#create-skKeramaian').click(function() {
          var inputs = [
            $('#form-inputSkKeramaian #jabatan-kiri div:eq(1) input:eq(0)').val(),
            $('#form-inputSkKeramaian #nama-pejabatKiri div:eq(1) input').val(),
            $('#form-inputSkKeramaian #jabatan-tengah div:eq(1) input:eq(0)').val(),
            $('#form-inputSkKeramaian #nama-pejabatTengah div:eq(1) input').val(),
            $('#form-inputSkKeramaian #jabatan-kanan div:eq(1) input:eq(0)').val(),
            $('#form-inputSkKeramaian #jabatan-kanan div:eq(1) input:eq(1)').val(),
            // 
            $('#form-inputSkKeramaian #nama-pemohon div:eq(1) input').val(),
            $('#form-inputSkKeramaian #no-nik div:eq(1) input').val(),
            $('#form-inputSkKeramaian #tempat-tglLahir div:eq(1) input:eq(0)').val(),
            $('#form-inputSkKeramaian #tempat-tglLahir div:eq(1) input:eq(1)').val(),
            $('#form-inputSkKeramaian #agama select').val(),
            $('#form-inputSkKeramaian #pekerjaan div:eq(1) input').val(),
            $('#form-inputSkKeramaian #alamat textarea').val(),
            $('#form-inputSkKeramaian #waktu #hari select').val(),
            $('#form-inputSkKeramaian #waktu #tanggal div:eq(1) input').val(),
            $('#form-inputSkKeramaian #tempat-pelaksanaan textarea').val(),
            $('#form-inputSkKeramaian #hiburan div:eq(1) input').val()
          ];
          var array = [];
          for (let index = 0; index < inputs.length; index++) {
            if (inputs[index] != "" && inputs[index] != null) {
              array.push(inputs[index]);
            }
          }
          // Bikin 14
          if (array.length < 17) {
            notComplete();
          } else {
            if ($("#reset-formSurat").val() == "") {
              $.ajax({
                type: "POST",
                url: "assets/dist/php/validation.php",
                data: {
                  type: "1",
                  tableDb: "tb_sk_keramaian",
                  field1: "no_nik",
                  value1: $("#form-inputSkKeramaian #no-nik div:eq(1) input").val(),
                },
                success: function(response) {
                  if (response == 1) {
                    Swal.fire({
                      icon: 'info',
                      title: 'Gagal !!',
                      text: 'Data pemohan, Terdeteksi. Sudah pernah digunakan untuk membuat surat tersebut..',
                      footer: '<a href="">Beralih Ke daftar surat ?</a>'
                    })
                  } else {
                    $('#show-skKeramaianCreate').trigger('click');
                    skKeramaian();
                  }
                }
              });
            } else {
              $('#show-skKeramaianCreate').trigger('click');
              skKeramaian();
            }


            function skKeramaian() {
              // Nama Pemohon
              $('#content-skKeramaian #nama-pemohon td:eq(2)').text($('#form-inputSkKeramaian #nama-pemohon div:eq(1) input').val());
              $('#content-skKeramaian #nama-pemohon td:eq(3) input').val($('#form-inputSkKeramaian #nama-pemohon div:eq(1) input').val());
              // Nik 
              $('#content-skKeramaian #no-nik td:eq(2)').text($('#form-inputSkKeramaian #no-nik div:eq(1) input').val());
              $('#content-skKeramaian #no-nik td:eq(3) input').val($('#form-inputSkKeramaian #no-nik div:eq(1)  input').val());
              // Ttl 
              $('#content-skKeramaian #tempat-tglLahir td:eq(2)').text($('#form-inputSkKeramaian #tempat-tglLahir div:eq(1) input:eq(0)').val() + ', ' + $('#form-inputSkKeramaian #tempat-tglLahir div:eq(1) input:eq(1)').val());
              $('#content-skKeramaian #tempat-tglLahir td:eq(3) input').val($('#form-inputSkKeramaian #tempat-tglLahir div:eq(1) input:eq(0)').val() + ', ' + $('#form-inputSkKeramaian #tempat-tglLahir div:eq(1) input:eq(1)').val());
              // Agama
              $('#content-skKeramaian #agama td:eq(2)').text($('#form-inputSkKeramaian #agama select').val());
              $('#content-skKeramaian #agama td:eq(3) input').val($('#form-inputSkKeramaian #agama select').val());
              // Pekerjaan 
              $('#content-skKeramaian #pekerjaan td:eq(2)').text($('#form-inputSkKeramaian #pekerjaan div:eq(1) input').val());
              $('#content-skKeramaian #pekerjaan td:eq(3) input').val($('#form-inputSkKeramaian #pekerjaan div:eq(1) input').val());
              // Alamat
              $('#content-skKeramaian #alamat td:eq(2)').text($('#form-inputSkKeramaian #alamat textarea').val());
              $('#content-skKeramaian #alamat td:eq(3) input').val($('#form-inputSkKeramaian #alamat textarea').val());
              // Waktu
              // hari
              $('#content-skKeramaian #waktu #hari td:eq(2)').text($('#form-inputSkKeramaian #waktu #hari select').val());
              $('#content-skKeramaian #waktu #hari td:eq(3) input').val($('#form-inputSkKeramaian #waktu #hari select').val());

              // Tanggal
              $('#content-skKeramaian #waktu #tanggal td:eq(2)').text($('#form-inputSkKeramaian #waktu #tanggal div:eq(1) input').val());
              $('#content-skKeramaian #waktu #tanggal td:eq(3) input').val($('#form-inputSkKeramaian #waktu #tanggal div:eq(1) input').val());
              // 
              // Tempat Pelaksanaan
              // 
              $('#content-skKeramaian #tempat-pelaksanaan td:eq(2)').text($('#form-inputSkKeramaian #tempat-pelaksanaan textarea').val());
              $('#content-skKeramaian #tempat-pelaksanaan td:eq(3) input').val($('#form-inputSkKeramaian #tempat-pelaksanaan textarea').val());
              // 
              // Hiburan
              // 
              // Nik
              $('#hideNoNik').val($('#form-inputSkKeramaian #no-nik div:eq(1) input').val());
              // 
              $('#content-skKeramaian #hiburan td:eq(2)').text($('#form-inputSkKeramaian #hiburan div:eq(1) input').val());
              $('#content-skKeramaian #hiburan td:eq(3) input').val($('#form-inputSkKeramaian #hiburan div:eq(1) input').val());
              // ttd
              // ttd kiri
              $('#ttd .kiri div:eq(1)').text($('#form-inputSkKeramaian #jabatan-kiri div:eq(1) input:eq(0)').val());
              $('#ttd .kiri div:eq(2)').text($('#form-inputSkKeramaian #nama-pejabatKiri div:eq(1) input').val());
              $('#hide-idPejabatKiri').val($('#form-inputSkKeramaian #jabatan-kiri div:eq(1) input:eq(1)').val());
              // ttd tengah
              $('#ttd .tengah div:eq(1)').text($('#form-inputSkKeramaian #jabatan-tengah div:eq(1) input:eq(0)').val());
              $('#ttd .tengah div:eq(2)').text($('#form-inputSkKeramaian #nama-pejabatTengah div:eq(1) input').val());
              $('#hide-idPejabatTengah').val($('#form-inputSkKeramaian #jabatan-tengah div:eq(1) input:eq(1)').val());
              // ttd kanan
              $('#ttd .kanan div:eq(1)').text($('#form-inputSkKeramaian #jabatan-kanan div:eq(1) input:eq(0)').val());
              $('#ttd .kanan div:eq(2)').text($('#form-inputSkKeramaian #nama-pejabatKanan div:eq(1) input').val());
              $('#hide-idPejabatKanan').val($('#form-inputSkKeramaian #jabatan-kanan div:eq(1) input:eq(1)').val());

              // Kusus update
              // $("#hide-aksiSurat").val($("#form-inputSkKeramaian #aksi-surat").val());
              // $("#hide-idSurat").val($("#form-inputSkKeramaian #id-surat").val());
              // $("#hide-noSurat").val($("#form-inputSkKeramaian #no-surat").val());
              $("#hide-idPermohonan").val($("#id-permohonan").val());
              $("#hide-noWhatsapp").val($("#no-whatsapp").val());
            }
          }
        });
      });
    </script>

  </div>
<?php } ?>