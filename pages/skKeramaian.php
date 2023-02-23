<?php
// Mamanggil function surat untuk mendapatkan surat2 dalam db
$skKeramaian = getSkKeramaian("");
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
          <th>No. NIK</th>
          <th>Nama Pemohon</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($skKeramaian as $key) { ?>
          <tr>
            <td><?= $no; ?></td>
            <td><?= $key['id_surat']; ?></td>
            <td><?= $key['no_nik']; ?></td>
            <td class="text-capitalize"><?= $key['nama_pemohon']; ?></td>
            <!-- Untuk melihat surat -->
            <td> <button value="<?= $key['id_surat']; ?>" name="show-skKeramaian" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button>
              <!-- Untuk mengupdate -->
              <button value="<?= $key['id_surat'] ?>" name="update-skKeramaian" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
              <!-- Untuk mengapus -->
              <button value="<?= $key['id_surat']; ?>" name="delete-skKeramaian" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
            </td>
          </tr>
        <?php $no++;
        } ?>
      </tbody>
    </table>
  </div>
  <!-- Sktm Sekolah -->
  <button id="show-suratRead" type="button" class="btn btn-success d-none" data-bs-toggle="modal" data-bs-target="#model-skKeramaianRead">none</button>
  <div id="model-skKeramaianRead" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
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
      $(":button[name='show-skKeramaian']").click(function() {
        var key = $(this).val();
        showSurat(key, "skKeramaian");
      });
      $(":button[name='delete-skKeramaian']").click(function() {
        var key = $(this).val();
        deleteSurat(key, "tb_sk_keramaian");
      });
    });
  </script>
  <!-- End SKtm sekolah -->
  <!-- jangan lupa menambahkan script js sweet alert di bawah ini  -->
</div>
<div id="form-inputs">
  <?php
  $pejabat = getPejabat();
  include "surat/skKeramaian/surat.php";
  ?>
  <div class="card-body">
    <div class="d-flex mt-2 mb-4">
      <button id="show-surats" class="btn btn-success d-flex justify-content-around align-items-center">
        <i class="fa-solid fa-circle-plus"></i>
        <div class="ms-2">Lihat Surat</div>
      </button>
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
  <input id="aksi-surat" type="hidden">
  <input id="id-surat" type="hidden">
  <input id="no-surat" type="hidden">
  <!-- end -->

  <script>
    // Jquery untuk membuat surat keterangan desa
    $(document).ready(function() {
      $('#reset-formSurat').click(function() {
        var key = $(this).val();
        resetForm(key, "skKeramaian");
      });
      // Penadatanganan . . .
      $('#form-inputs #nama-pejabat select').change(function() {
        // Mendapatkan id pejabat
        var idJabatan = $(this).val();
        // Mengisi id pejabat
        // 
        // kirim nilai secara asynchronous atau secara tidak langsung untuk mendapakan jabatan
      });
      // kirim nilai secara asynchronous atau secara tidak langsung untuk menentukan jenis surat
      $(":button[name='update-skKeramaian']").click(function() {
        var key = $(this).val();
        updateSurat(key, "skKeramaian");
      });
      // 
      // menampilkan surat
      $('#create-skKeramaian').click(function() {
        var inputs = [
          $('#form-inputs #jabatan-kiri div:eq(1) input:eq(0)').val(),
          $('#form-inputs #jabatan-kiri div:eq(1) input:eq(0)').val(),
          $('#form-inputs #jabatan-tengah div:eq(1) input:eq(0)').val(),
          $('#form-inputs #nama-pejabatTengah div:eq(1) input').val(),
          $('#form-inputs #jabatan-kanan div:eq(1) input:eq(0)').val(),
          $('#form-inputs #jabatan-kanan div:eq(1) input:eq(1)').val(),
          // 
          $('#form-inputs #nama-pemohon div:eq(1) input').val(),
          $('#form-inputs #no-nik div:eq(1) input').val(),
          $('#form-inputs #tempat-tglLahir div:eq(1) input:eq(0)').val(),
          $('#form-inputs #tempat-tglLahir div:eq(1) input:eq(1)').val(),
          $('#form-inputs #agama select').val(),
          $('#form-inputs #pekerjaan div:eq(1) input').val(),
          $('#form-inputs #alamat textarea').val(),
          $('#form-inputs #waktu #hari select').val(),
          $('#form-inputs #waktu #tanggal div:eq(1) input').val(),
          $('#form-inputs #tempat-pelaksanaan textarea').val(),
          $('#form-inputs #hiburan div:eq(1) input').val()
        ];
        var array = [];
        for (let index = 0; index < inputs.length; index++) {
          if (inputs[index] != "" && inputs[index] != null) {
            array.push(inputs[index]);
          }
        }
        // Bikin 14
        console.table(array);
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
                value1: $("#form-inputs #no-nik div:eq(1) input").val(),
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
            $('#content-skKeramaian #nama-pemohon td:eq(2)').text($('#form-inputs #nama-pemohon div:eq(1) input').val());
            $('#content-skKeramaian #nama-pemohon td:eq(3) input').val($('#form-inputs #nama-pemohon div:eq(1) input').val());
            // Nik 
            $('#content-skKeramaian #no-nik td:eq(2)').text($('#form-inputs #no-nik div:eq(1) input').val());
            $('#content-skKeramaian #no-nik td:eq(3) input').val($('#form-inputs #no-nik div:eq(1)  input').val());
            // Ttl 
            $('#content-skKeramaian #tempat-tglLahir td:eq(2)').text($('#form-inputs #tempat-tglLahir div:eq(1) input:eq(0)').val() + ', ' + $('#form-inputs #tempat-tglLahir div:eq(1) input:eq(1)').val());
            $('#content-skKeramaian #tempat-tglLahir td:eq(3) input').val($('#form-inputs #tempat-tglLahir div:eq(1) input:eq(0)').val() + ', ' + $('#form-inputs #tempat-tglLahir div:eq(1) input:eq(1)').val());
            // Agama
            $('#content-skKeramaian #agama td:eq(2)').text($('#form-inputs #agama select').val());
            $('#content-skKeramaian #agama td:eq(3) input').val($('#form-inputs #agama select').val());
            // Pekerjaan 
            $('#content-skKeramaian #pekerjaan td:eq(2)').text($('#form-inputs #pekerjaan div:eq(1) input').val());
            $('#content-skKeramaian #pekerjaan td:eq(3) input').val($('#form-inputs #pekerjaan div:eq(1) input').val());
            // Alamat
            $('#content-skKeramaian #alamat td:eq(2)').text($('#form-inputs #alamat textarea').val());
            $('#content-skKeramaian #alamat td:eq(3) input').val($('#form-inputs #alamat textarea').val());
            // Waktu
            // hari
            $('#content-skKeramaian #waktu #hari td:eq(2)').text($('#form-inputs #waktu #hari select').val());
            $('#content-skKeramaian #waktu #hari td:eq(3) input').val($('#form-inputs #waktu #hari select').val());

            // Tanggal
            $('#content-skKeramaian #waktu #tanggal td:eq(2)').text($('#form-inputs #waktu #tanggal div:eq(1) input').val());
            $('#content-skKeramaian #waktu #tanggal td:eq(3) input').val($('#form-inputs #waktu #tanggal div:eq(1) input').val());
            // 
            // Tempat Pelaksanaan
            // 
            $('#content-skKeramaian #tempat-pelaksanaan td:eq(2)').text($('#form-inputs #tempat-pelaksanaan textarea').val());
            $('#content-skKeramaian #tempat-pelaksanaan td:eq(3) input').val($('#form-inputs #tempat-pelaksanaan textarea').val());
            // 
            // Hiburan
            // 
            // Nik
            $('#hideNoNik').val($('#form-inputs #no-nik div:eq(1) input').val());
            // 
            $('#content-skKeramaian #hiburan td:eq(2)').text($('#form-inputs #hiburan div:eq(1) input').val());
            $('#content-skKeramaian #hiburan td:eq(3) input').val($('#form-inputs #hiburan div:eq(1) input').val());
            // ttd
            // ttd kiri
            $('#ttd .kiri div:eq(1)').text($('#form-inputs #jabatan-kiri div:eq(1) input:eq(0)').val());
            $('#ttd .kiri div:eq(2)').text($('#form-inputs #nama-pejabatKiri div:eq(1) input').val());
            $('#hide-idPejabatKiri').val($('#form-inputs #jabatan-kiri div:eq(1) input:eq(1)').val());
            // ttd tengah
            $('#ttd .tengah div:eq(1)').text($('#form-inputs #jabatan-tengah div:eq(1) input:eq(0)').val());
            $('#ttd .tengah div:eq(2)').text($('#form-inputs #nama-pejabatTengah div:eq(1) input').val());
            $('#hide-idPejabatTengah').val($('#form-inputs #jabatan-tengah div:eq(1) input:eq(1)').val());
            // ttd kanan
            $('#ttd .kanan div:eq(1)').text($('#form-inputs #jabatan-kanan div:eq(1) input:eq(0)').val());
            $('#ttd .kanan div:eq(2)').text($('#form-inputs #nama-pejabatKanan div:eq(1) input').val());
            $('#hide-idPejabatKanan').val($('#form-inputs #jabatan-kanan div:eq(1) input:eq(1)').val());

            // Kusus update
            $("#hide-aksiSurat").val($("#form-inputs #aksi-surat").val());
            $("#hide-idSurat").val($("#form-inputs #id-surat").val());
            $("#hide-noSurat").val($("#form-inputs #no-surat").val());

          }
        }
      });
    });
  </script>

</div>