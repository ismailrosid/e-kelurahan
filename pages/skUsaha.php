<?php
$isi_surat = getSkUsaha("");
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
          <th>Nama Pemohon</th>
          <th>No. NIK</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($isi_surat as $key) { ?>
          <tr>
            <td><?= $no; ?></td>
            <td class="text-capitalize"><?= $key['id_surat']; ?></td>
            <td class="text-capitalize"><?= $key['nama_pemohon']; ?></td>
            <td><?= $key['no_nik']; ?></td>
            <!-- Untuk melihat surat -->
            <td> <button value="<?= $key['id_surat']; ?>" name="show-skUsaha" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button>
              <!-- Untuk mengupdate -->
              <button value="<?= $key['id_surat'] ?>" name="update-skUsaha" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
              <!-- Untuk mengapus -->
              <button value="<?= $key['id_surat']; ?>" name="delete-skUsaha" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
            </td>
          </tr>
        <?php $no++;
        } ?>
      </tbody>
    </table>
  </div>
  <!-- sktm Sekolah -->
  <button id="show-suratRead" type="button" class="btn btn-success d-none" data-bs-toggle="modal" data-bs-target="#model-skUsahaRead">none</button>
  <div id="model-skUsahaRead" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      $(":button[name='show-skUsaha']").click(function() {
        var key = $(this).val();
        showSurat(key, "skUsaha")
      });
      $(":button[name='delete-skUsaha']").click(function() {
        var key = $(this).val();
        deleteSurat(key, "tb_sk_usaha");
      });
    });
  </script>
  <!-- End SKtm sekolah -->
  <!-- jangan lupa menambahkan script js sweet alert di bawah ini  -->
</div>
<div id="form-inputs">
  <?php
  $pejabat = getPejabat();
  include "surat/skUsaha/surat.php";
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
          <textarea autocomplete="off" id="keterangan-skUsaha" rows="4" placeholder="Masukan Alamat" class="form-control" aria-label="With textarea">Bahwa nama tersebut di atas menurut keterangan Ketua  «Ket_RTRW» Desa Kondangjaya benar beralamat tersebut diatas dan yang besangkutan mempunyai  usaha “ «Usaha»“ di «Alamat_Usaha» dimulai dari «Dari_Tahun» sampai tahun sekarang</textarea>
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
  <input id="aksi-surat" type="hidden">
  <input id="id-surat" type="hidden">
  <input id="no-surat" type="hidden">
  <!-- -->
  <script>
    // Jquery untuk membuat surat keterangan desa
    $(document).ready(function() {
      $(":button[name='update-skUsaha']").click(function() {
        var key = $(this).val();
        // alert(key);
        updateSurat(key, "skUsaha");
      });

      $('#reset-formSurat').click(function() {
        var key = $(this).val();
        resetForm(key, "skUsaha")
      });

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


      // 
      // menampilkan surat
      $('#create-skUsaha').click(function() {
        var inputs = [
          $('#form-inputs #nama-pejabat div:eq(1) input').val(),
          $('#form-inputs #jabatan input').val(),
          $('#form-inputs #nama-pemohon div:eq(1) input').val(),
          $('#form-inputs #no-nik div:eq(1) input').val(),
          $('#form-inputs #tempat-tglLahir div:eq(1) input:eq(0)').val(),
          $('#form-inputs #tempat-tglLahir div:eq(1) input:eq(1)').val(),
          $('#form-inputs #jenis-kelamin select').val(),
          $('#form-inputs #agama select').val(),
          $('#form-inputs #pekerjaan div:eq(1) input').val(),
          $('#form-inputs #alamat textarea').val(),
          $('#form-inputs #keterangan textarea').val()
        ];
        var array = [];
        for (let index = 0; index < inputs.length; index++) {
          if (inputs[index] != "" && inputs[index] != null) {
            array.push(inputs[index]);
          }
        }
        // Bikin 11
        if (array.length < 11) {
          notComplete();
        } else {
          var jenis = $('#form-inputs #jenis-skd option:selected').text();
          if ($("#reset-formSurat").val() == "") {
            $.ajax({
              type: "POST",
              url: "assets/dist/php/validation.php",
              data: {
                type: "1",
                tableDb: "tb_sk_usaha",
                field1: "no_nik",
                value1: $('#form-inputs #no-nik div:eq(1) input').val(),
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
          $('#panandatangan #nama td:eq(2)').text($('#form-inputs #nama-pejabat option:selected').text());
          $('#panandatangan #nama td:eq(3) input').val($('#form-inputs #nama-pejabat option:selected').text());
          // =====================================
          $('#hide-idPejabat').val($('#form-inputs #jabatan div:eq(1) input:eq(1)').val());
          // Jabatan
          $('#panandatangan #jabatan td:eq(2)').text($('#form-inputs #jabatan div:eq(1) input').val());
          $('#panandatangan #jabatan td:eq(3) input').val($('#form-inputs #jabatan div:eq(1) input').val());
          // Nama Pemohon
          $('#content-skUsaha #nama-pemohon td:eq(2)').text($('#form-inputs #nama-pemohon div:eq(1) input').val());
          $('#content-skUsaha #nama-pemohon td:eq(3) input').val($('#form-inputs #nama-pemohon div:eq(1) input').val());
          // Nik 
          $('#content-skUsaha #no-nik td:eq(2)').text($('#form-inputs #no-nik div:eq(1) input').val());
          $('#content-skUsaha #no-nik td:eq(3) input').val($('#form-inputs #no-nik div:eq(1) input').val());
          // Ttl 
          $('#content-skUsaha #tempat-tglLahir td:eq(2)').text($('#form-inputs #tempat-tglLahir div:eq(1) input:eq(0)').val() + ', ' + $('#form-inputs #tempat-tglLahir div:eq(1) input:eq(1)').val());
          $('#content-skUsaha #tempat-tglLahir td:eq(3) input').val($('#form-inputs #tempat-tglLahir div:eq(1) input:eq(0)').val() + ', ' + $('#form-inputs #tempat-tglLahir div:eq(1) input:eq(1)').val());
          //  Jenis Kelamin 
          $('#content-skUsaha #jenis-kelamin td:eq(2)').text($('#form-inputs #jenis-kelamin select').val());
          $('#content-skUsaha #jenis-kelamin td:eq(3) input').val($('#form-inputs #jenis-kelamin select').val());
          // Agama
          $('#content-skUsaha #agama td:eq(2)').text($('#form-inputs #agama select').val());
          $('#content-skUsaha #agama td:eq(3) input').val($('#form-inputs #agama select').val());
          // Pekerjaan 
          $('#content-skUsaha #pekerjaan td:eq(2)').text($('#form-inputs #pekerjaan div:eq(1) input').val());
          $('#content-skUsaha #pekerjaan td:eq(3) input').val($('#form-inputs #pekerjaan div:eq(1) input').val());
          // Alamat
          $('#content-skUsaha #alamat td:eq(2)').text($('#form-inputs #alamat textarea').val());
          $('#content-skUsaha #alamat td:eq(3) input').val($('#form-inputs #alamat textarea').val());
          // Keterangan
          $('#keterangan').text($('#form-inputs #keterangan textarea').val());
          // hide
          $('#keterangan-hide').val($('#form-inputs #keterangan textarea').val());
          // ttd
          $('#ttd div:eq(1)').text($('#form-inputs #jabatan div:eq(1) input:eq(0)').val());
          $('#ttd div:eq(2) span').text($('#form-inputs #nama-pejabat div:eq(1) input').val());
          // Kusus update
          $("#hide-aksiSurat").val($("#form-inputs #aksi-surat").val());
          $("#hide-idSurat").val($("#form-inputs #id-surat").val());
          $("#hide-noSurat").val($("#form-inputs #no-surat").val());
        }
      });
    });
  </script>
</div>