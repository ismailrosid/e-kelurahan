<?php
$isi_surat = getSkKematian("");
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
          <th>Nama Alm</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($isi_surat as $key) { ?>
          <tr>
            <td><?= $no; ?></td>
            <td><?= $key['id_surat']; ?></td>
            <td class="text-capitalize"><?= $key['no_nik_alm']; ?></td>
            <td class="text-capitalize"><?= $key['nama_alm']; ?></td>
            <!-- Untuk melihat surat -->
            <td> <button value="<?= $key['id_surat'] ?>" name="show-skKematian" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button>
              <!-- Untuk mengupdate -->
              <button value="<?= $key['id_surat'] ?>" name="update-skKematian" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
              <!-- Untuk mengapus -->
              <button value="<?= $key['id_surat'] ?>" name="delete-skKematian" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
            </td>
          </tr>
        <?php $no++;
        } ?>
      </tbody>
    </table>
  </div>
  <!-- sktm kematian-->
  <button id="show-suratRead" type="button" class="btn btn-success d-none" data-bs-toggle="modal" data-bs-target="#model-skKematianRead">none</button>
  <div id="model-skKematianRead" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
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
      $(":button[name='show-skKematian']").click(function() {
        var key = $(this).val();
        showSurat(key, "skKematian")
      });
      $(":button[name='delete-skKematian']").click(function() {
        var key = $(this).val();
        deleteSurat(key, "tb_sk_kematian");
      });
    });
  </script>
  <!-- End SKtm sekolah -->
  <!-- jangan lupa menambahkan script js sweet alert di bawah ini  -->
</div>
<div id="form-inputs">
  <?php
  $pejabat = getPejabat();
  include "surat/skKematian/surat.php";
  ?>
  <div class="card-body">
    <div class="d-flex mt-2 mb-4">
      <button id="show-surats" class="btn btn-success d-flex justify-content-around align-items-center">
        <i class="fa-solid fa-circle-plus"></i>
        <div class="ms-2">LIHAT SURAT</div>
      </button>
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
  <input id="aksi-surat" type="hidden">
  <input id="id-surat" type="hidden">
  <input id="no-surat" type="hidden">
  <!-- -->
  <script>
    // Jquery untuk membuat surat keterangan desa
    $(document).ready(function() {
      $('#reset-formSurat').click(function() {
        var key = $(this).val();
        resetForm(key, "skKematian");
      });
      // Penadatanganan . . .
      $('#form-inputs #nama-pejabat select').change(function() {
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
            $('#form-inputs #jabatan input').val(response);
          }
        });
      });
      // kirim nilai secara asynchronous atau secara tidak langsung untuk menentukan jenis surat
      $(":button[name='update-skKematian']").click(function() {
        var key = $(this).val();
        updateSurat(key, "skKematian");
        // alert(key);
      });

      $('#reset-formskKematian').click(function() {
        $('#form-inputs #keterangan div:eq(1)').remove();
        $('#form-skKematian')[0].reset();

        $('#reset-formSurat').click(function(e) {
          var key = $(this).val();
          resetForm(key, "skKematian");

        });
        // Penadatanganan . . .
        $('#form-inputs #nama-pejabat select').change(function() {
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
              $('#form-inputs #jabatan input').val(response);
            }
          });
        });
        // kirim nilai secara asynchronous atau secara tidak langsung untuk menentukan jenis surat

        // 
        // menampilkan surat


      });
      $('#create-skKematian').click(function() {
        var inputs = [
          $('#form-inputs #nama-pejabat select').val(),
          $('#form-inputs #jabatan input').val(),
          $('#form-inputs #nama-alm div:eq(1) input').val(),
          $('#form-inputs #no-nikAlm div:eq(1) input').val(),
          $('#form-inputs #tempat-tglLahirUmur div:eq(1) input:eq(0)').val(),
          $('#form-inputs #tempat-tglLahirUmur div:eq(1) input:eq(1)').val(),
          $('#form-inputs #tempat-tglLahirUmur div:eq(1) input:eq(2)').val(),
          $('#form-inputs #pekerjaan-alm div:eq(1) input').val(),
          $('#form-inputs #alamat-alm textarea').val(),
          $('#form-inputs #hari select').val(),
          $('#form-inputs #tanggal div:eq(1) input').val(),
          $('#form-inputs #pukul div:eq(1) input').val(),
          $('#form-inputs #penyebab-kematian textarea').val(),
          $('#form-inputs #nama-pelapor div:eq(1) input').val(),
          $('#form-inputs #no-nikPelapor div:eq(1) input').val(),
          $('#form-inputs #umur-pelapor div:eq(1) input').val(),
          $('#form-inputs #pekerjaan-pelapor div:eq(1) input').val(),
          $('#form-inputs #alamat-pelapor textarea').val(),
          $('#form-inputs #relasi div:eq(1) input').val(),
        ];
        var array = [];
        for (let index = 0; index < inputs.length; index++) {
          if (inputs[index] != "" && inputs[index] != null) {
            array.push(inputs[index]);
          }
        }

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
                value1: $("#form-inputs #no-nikAlm div:eq(1) input").val(),
                field2: "no_nik_pelapor",
                value2: $("#form-inputs #no-nikPelapor div:eq(1) input").val()
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
                  // Penandatangan
                  // Nama penandatangan
                }
              }
            });
          } else {
            inputSkKematian()
            $('#show-skKematianCreate').trigger('click');
          }
        }

        function inputSkKematian() {
          $('#panandatangan #nama td:eq(2)').text($('#form-inputs #nama-pejabat option:selected').text());
          $('#panandatangan #nama td:eq(3) input').val($('#form-inputs #nama-pejabat option:selected').text());
          // =====================================
          $('#hide-idPejabat').val($('#form-inputs #nama-pejabat select').val());
          // Jabatan
          $('#panandatangan #jabatan td:eq(2)').text($('#form-inputs #jabatan div:eq(1) input').val());
          $('#panandatangan #jabatan td:eq(3) input').val($('#form-inputs #jabatan div:eq(1) input').val());
          // Keterangan sesuai jenis surat
          // Nama alm
          $('#content-skKematian table:eq(0) #nama-alm td:eq(2)').text($('#form-inputs #nama-alm div:eq(1) input').val());
          $('#content-skKematian table:eq(0) #nama-alm td:eq(3) input').val($('#form-inputs #nama-alm div:eq(1) input').val());
          // Nik alm
          $('#content-skKematian table:eq(0) #no-nikAlm td:eq(2)').text($('#form-inputs #no-nikAlm div:eq(1) input').val());
          $('#content-skKematian table:eq(0) #no-nikAlm td:eq(3) input').val($('#form-inputs #no-nikAlm div:eq(1) input').val());
          // Ttl umur alm
          $('#content-skKematian table:eq(0) #tempat-tglLahirUmur td:eq(2)').text($('#form-inputs #tempat-tglLahirUmur div:eq(1) input:eq(0)').val() + ', ' + $('#form-inputs #tempat-tglLahirUmur div:eq(1) input:eq(1)').val() + " / " + $('#form-inputs #tempat-tglLahirUmur div:eq(1) input:eq(2)').val() + " Tahun");
          $('#content-skKematian table:eq(0) #tempat-tglLahirUmur td:eq(3) input').val($('#form-inputs #tempat-tglLahirUmur div:eq(1) input:eq(0)').val() + ', ' + $('#form-inputs #tempat-tglLahirUmur div:eq(1) input:eq(1)').val() + " / " + $('#form-inputs #tempat-tglLahirUmur div:eq(1) input:eq(2)').val() + " Tahun");
          //  Pekerjaan alm
          $('#content-skKematian table:eq(0) #pekerjaan-alm td:eq(2)').text($('#form-inputs #pekerjaan-alm div:eq(1) input').val());
          $('#content-skKematian table:eq(0) #pekerjaan-alm td:eq(3) input').val($('#form-inputs #pekerjaan-alm div:eq(1) input').val());
          // Alamat
          $('#content-skKematian table:eq(0) #alamat-alm td:eq(2) div:eq(0)').text($('#form-inputs #alamat-alm textarea').val());
          $('#content-skKematian table:eq(0) #alamat-alm td:eq(3) input').val($('#form-inputs #alamat-alm textarea').val());
          //  
          // Hari
          $('#content-skKematian table:eq(1) #hari td:eq(2)').text($('#form-inputs #hari select').val());
          $('#content-skKematian table:eq(1) #hari td:eq(3) input').val($('#form-inputs #hari select').val());
          // Tanggal
          $('#content-skKematian table:eq(1) #tanggal td:eq(2)').text($('#form-inputs #tanggal div:eq(1) input').val());
          $('#content-skKematian table:eq(1) #tanggal td:eq(3) input').val($('#form-inputs #tanggal div:eq(1) input').val());
          // Pukul
          $('#content-skKematian table:eq(1) #pukul td:eq(2)').text($('#form-inputs #pukul div:eq(1) input').val() + " Wib");
          $('#content-skKematian table:eq(1) #pukul td:eq(3) input').val($('#form-inputs #pukul div:eq(1) input').val() + " Wib");
          // Penyebab Kematian
          $('#content-skKematian table:eq(1) #penyebab-kematian td:eq(2)').text($('#form-inputs #penyebab-kematian textarea').val());
          $('#content-skKematian table:eq(1) #penyebab-kematian td:eq(3) input').val($('#form-inputs #penyebab-kematian textarea').val());
          // 
          // Nama lengkap palapor
          $('#content-skKematian table:eq(2) #nama-pelapor td:eq(2)').text($('#form-inputs #nama-pelapor div:eq(1) input').val());
          $('#content-skKematian table:eq(2) #nama-pelapor td:eq(3) input').val($('#form-inputs #nama-pelapor div:eq(1) input').val());
          // No nik pelapor
          $('#content-skKematian table:eq(2) #no-nikPelapor td:eq(2)').text($('#form-inputs #no-nikPelapor div:eq(1) input').val());
          $('#content-skKematian table:eq(2) #no-nikPelapor td:eq(3) input').val($('#form-inputs #no-nikPelapor div:eq(1) input').val());
          // Umur pelapor
          $('#content-skKematian table:eq(2) #umur-pelapor td:eq(2)').text($('#form-inputs #umur-pelapor div:eq(1) input').val());
          $('#content-skKematian table:eq(2) #umur-pelapor td:eq(3) input').val($('#form-inputs #umur-pelapor div:eq(1) input').val());
          //  Pekerjaan pelapor
          $('#content-skKematian table:eq(2) #pekerjaan-pelapor td:eq(2)').text($('#form-inputs #pekerjaan-pelapor div:eq(1) input').val());
          $('#content-skKematian table:eq(2) #pekerjaan-pelapor td:eq(3) input').val($('#form-inputs #pekerjaan-pelapor div:eq(1) input').val());
          // Alamat pelapor
          $('#content-skKematian table:eq(2) #alamat-pelapor td:eq(2) div:eq(0)').text($('#form-inputs #alamat-pelapor textarea').val());
          $('#content-skKematian table:eq(2) #alamat-pelapor td:eq(3) input').val($('#form-inputs #alamat-pelapor textarea').val());
          //  Pekerjaan pelapor
          $('#content-skKematian table:eq(2) #relasi td:eq(2)').text($('#form-inputs #relasi div:eq(1) input').val());
          $('#content-skKematian table:eq(2) #relasi td:eq(3) input').val($('#form-inputs #relasi div:eq(1) input').val());
          // ttd
          $('#ttd div:eq(1)').text($('#form-inputs #jabatan div:eq(1) input').val());
          $('#ttd div:eq(2) span').text($('#form-inputs #nama-pejabat option:selected').text());
          // Mengisi id pejabat
          $('#hide-idPejabat').val($('#form-inputs #nama-pejabat option:selected').val());
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