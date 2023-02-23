//
function showTableSurats() {
  $("#table-surats").show();
  $("#form-inputs").hide();
}
//
function showFormInputs() {
  $("#form-inputs").show();
  $("#table-surats").hide();
}
// Update
function updateSurat(key, jenisSk) {
  $.ajax({
    type: "POST",
    url: "assets/dist/php/getSuratUpdate.php",
    data: {
      key: key,
      jenisSk: jenisSk,
    },
    success: function (response) {
      var arr = JSON.parse(response);
      switch (arr.jenis_sk) {
        case "sk desa":
          updateSkDesa(arr);
          break;
        case "sktm sekolah":
          updateSktmSekolah(arr);
          break;
        case "sk usaha":
          updateSkUsaha(arr);
          break;
        case "sk kematian":
          updateSkKematian(arr);
          break;
        case "sk keramaian":
          updateSkKeramaian(arr);
          break;
        default:
      }
    },
  });
}
// 
function updateSkUsaha(data) {
  $("#form-inputs #aksi-surat").val("update");
  $("#form-inputs #id-surat").val(data.id_surat);
  $("#form-inputs #no-surat").val(data.no_surat);
  $("#reset-formSurat").val(data.id_surat);
  // ==================================================================
  $("#form-inputs #nama-pemohon div:eq(1) input").val(data.nama_pemohon);
  $("#form-inputs #no-nik div:eq(1) input").val(data.no_nik);
  $("#form-inputs #no-nik div:eq(1) input").attr("readonly", true);
  document.getElementById("select-jenisKelamin").value = data.jenis_kelamin;
  $("#form-inputs #tempat-tglLahir div:eq(1) input:eq(0)").val(
    data.tempat_lahir
  );
  $("#form-inputs #tempat-tglLahir div:eq(1) input:eq(1)").val(
    data.tanggal_lahir
  );
  document.getElementById("select-agama").value = data.agama;
  $("#form-inputs #pekerjaan div:eq(1) input").val(data.pekerjaan);
  $("#form-inputs #alamat textarea").val(data.alamat);
  $('#keterangan').text($('#form-inputs #keterangan textarea').val(data.keterangan));
  showFormInputs();
}
// 
function updateSkDesa(data) {
  $("#form-inputs #aksi-surat").val("update");
  $("#form-inputs #id-surat").val(data.id_surat);
  $("#form-inputs #no-surat").val(data.no_surat);
  $("#reset-formSurat").val(data.id_surat);
  // ==================================================================
  document.getElementById("select-namaPejabat").value = data.id_pejabat;
  $("#form-inputs #jabatan input").val(data.jabatan);
  $("#form-inputs #nama-pemohon div:eq(1) input").val(data.nama_pemohon);
  $("#form-inputs #no-nik div:eq(1) input").val(data.no_nik);
  $("#form-inputs #no-nik div:eq(1) input").attr("readonly", true);
  $("#form-inputs #tempat-tglLahir div:eq(1) input:eq(0)").val(
    data.tempat_lahir
  );
  $("#form-inputs #tempat-tglLahir div:eq(1) input:eq(1)").val(
    data.tanggal_lahir
  );
  document.getElementById("select-jenisKelamain").value = data.jenis_kelamin;
  document.getElementById("select-agama").value = data.agama;
  $("#form-inputs #pekerjaan div:eq(1) input").val(data.pekerjaan);
  $("#form-inputs #alamat textarea").val(data.alamat);
  if (
    data.jenis_sk_desa == "skd mailing kades" ||
    data.jenis_sk_desa == "skd mailing sekdes"
  ) {
    data.jenis_sk_desa = "SKD MAILING";
  } else if (
    data.jenis_sk_desa == "form skd kades" ||
    data.jenis_sk_desa == "form skd sekdes"
  ) {
    data.jenis_sk_desa = "FORM SKD";
  } else {
    data.jenis_sk_desa = "SKD DOMISILI MAILING";
  }
  document.getElementById("select-jenisSkd").value = data.jenis_sk_desa;
  selectJenisSkdesa(data.keterangan, "form-inputs");
  showFormInputs();
}

function updateSktmSekolah(data) {
  $("#form-inputs #aksi-surat").val("update");
  $("#form-inputs #id-surat").val(data.id_surat);
  $("#form-inputs #no-surat").val(data.no_surat);
  $("#reset-formSurat").val(data.id_surat);
  // ==================================================================
  $("#form-inputs #aksi-surat").val("update");
  $("#form-inputs #id-surat").val(data.id_surat);
  $("#form-inputs #no-surat").val(data.no_surat);
  $("#reset-formSurat").val(data.id_surat);
  //
  $("#form-inputs #nama-lengkapOrtu div:eq(1) input").val(data.nama_ortu);
  $("#form-inputs #no-nikOrtu div:eq(1) input").val(data.no_nik_ortu);
  $("#form-inputs #no-nikOrtu div:eq(1) input").attr("readonly", true);
  $("#form-inputs #tempat-tglLahirOrtu div:eq(1) input:eq(0)").val(
    data.tempat_lahir_ortu
  );
  $("#form-inputs #tempat-tglLahirOrtu div:eq(1) input:eq(1)").val(
    data.tanggal_lahir_ortu
  );
  document.getElementById("select-jenisKelaminOrtu").value =
    data.jenis_kelamin_ortu;
  document.getElementById("select-bangsaOrtu").value = data.bangsa_ortu;
  document.getElementById("select-agamaOrtu").value = data.agama_ortu.trim();
  $("#form-inputs #pekerjaan-ortu input").val(data.pekerjaan_ortu);
  $("#form-inputs #tempat-tinggalOrtu input").val(data.tempat_tinggal_ortu);
  // Data pemohon
  $("#form-inputs #nama-lengkapPemohon input").val(data.nama_pemohon);
  $("#form-inputs #no-nikPemohon input").val(data.no_nik_pemohon);
  $("#form-inputs #no-nikPemohon input").attr("readonly", true);
  $("#form-inputs #tempat-tglLahirPemohon input:eq(0)").val(
    data.tempat_lahir_pemohon
  );
  $("#form-inputs #tempat-tglLahirPemohon input:eq(1)").val(
    data.tanggal_lahir_pemohon
  );
  document.getElementById("select-jenisKelaminPemohon").value =
    data.jenis_kelamin_pemohon;
  document.getElementById("select-bangsaPemohon").value = data.bangsa_pemohon;
  document.getElementById("select-agamaPemohon").value =
    data.agama_pemohon.trim();
  $("#form-inputs #pekerjaan-pemohon input").val(data.pekerjaan_pemohon);
  $("#form-inputs #tempat-tinggalPemohon input").val(
    data.tempat_tinggal_pemohon
  );
  showFormInputs();
}
// 
function updateSkKematian(data) {
  $("#form-inputs #aksi-surat").val("update");
  $("#form-inputs #id-surat").val(data.id_surat);
  $("#form-inputs #no-surat").val(data.no_surat);
  $("#reset-formSurat").val(data.id_surat);
  document.getElementById("select-namajabatan").value = data.id_pejabat;
  $("#form-inputs #jabatan input").val(data.jabatan);
  $("#form-inputs #nama-alm div:eq(1) input").val(data.nama_alm);
  $("#form-inputs #no-nikAlm div:eq(1) input").val(data.no_nik_alm);
  $("#form-inputs #no-nikAlm div:eq(1) input").attr("readonly", true);
  $("#form-inputs #tempat-tglLahirUmur div:eq(1) input:eq(0)").val(
    data.tempat_lahir
  );
  $("#form-inputs #tempat-tglLahirUmur div:eq(1) input:eq(1)").val(
    data.tanggal_lahir
  );
  $("#form-inputs #tempat-tglLahirUmur div:eq(1) input:eq(2)").val(
    data.umur_alm
  );
  $("#form-inputs #pekerjaan-alm div:eq(1) input").val(data.pekerjaan_alm);
  $("#form-inputs #alamat-alm textarea").val(data.alamat_alm);
  document.getElementById("select-hari").value = data.hari_kejadian;
  $("#form-inputs #tanggal div:eq(1) input").val(data.tanggal_kejadian);
  $("#form-inputs #pukul div:eq(1) input").val(data.jam_kejadian);
  $("#form-inputs #penyebab-kematian textarea").val(data.penyebab_kematian);
  $("#form-inputs #nama-pelapor div:eq(1) input").val(data.nama_pelapor);
  $("#form-inputs #no-nikPelapor div:eq(1) input").val(data.no_nik_alm);
   $("#form-inputs #no-nikPelapor div:eq(1) input").attr("readonly", true);
  $("#form-inputs #umur-pelapor div:eq(1) input").val(data.umur_pelapor);
  $("#form-inputs #pekerjaan-pelapor div:eq(1) input").val(
    data.pekerjaan_pelapor
  );
  $("#form-inputs #alamat-pelapor textarea").val(data.alamat_pelapor);
  $("#form-inputs #relasi div:eq(1) input").val(data.hubungan_pelapor);
  showFormInputs();
}
// 
function updateSkKeramaian(data) {
  $("#form-inputs #aksi-surat").val("update");
  $("#form-inputs #id-surat").val(data.id_surat);
  $("#form-inputs #no-surat").val(data.no_surat);
  $("#reset-formSurat").val(data.id_surat);
  // ==================================================================
  $("#form-inputs #nama-pemohon div:eq(1) input").val(data.nama_pemohon);
  $("#form-inputs #no-nik div:eq(1) input").val(data.no_nik);
  $("#form-inputs #tempat-tglLahir div:eq(1) input:eq(0)").val(
    data.tempat_lahir
  );
  $("#form-inputs #tempat-tglLahir div:eq(1) input:eq(1)").val(
    data.tanggal_lahir
  );
  document.getElementById("select-agama").value = data.agama.trim();
  $("#form-inputs #pekerjaan div:eq(1) input").val(data.pekerjaan);
  $("#form-inputs #alamat textarea").val(data.alamat);
  document.getElementById("select-hari").value = data.hari.trim();
  $("#form-inputs #waktu #tanggal div:eq(1) input").val(data.tanggal);
  $("#form-inputs #tempat-pelaksanaan textarea").val(data.tempat_pelaksanaan);
  $("#form-inputs #hiburan div:eq(1) input").val(data.hiburan);
  showFormInputs();
}
// 
function selectJenisSkdesa(jenisVal, jnsForm) {
  $.ajax({
    type: "POST",
    url: "assets/dist/php/skDesa/jenisSkd.php",
    data: {
      jenis: jenisVal,
    },
    success: function (response) {
      // menampilkan hasil yang di dapat yaitu jenis surat
      $("#" + jnsForm + " " + "#keterangan div:eq(1)").html(response);
    },
  });
}
//
function showSurat(key, jenisSk) {
  $.ajax({
    type: "POST",
    url: "assets/dist/php/getSurat.php",
    data: {
      key: key,
      jenisSk: jenisSk,
    },
    success: function (response) {
      $("#show-suratRead").trigger("click");
      $("#content").html(response);
    },
  });
}
// 
function deleteSurat(key, table) {
  Swal.fire({
    text: "Anda yakin untuk menghapus surat ?",
    icon: "warning",
    showCancelButton: true,
    cancelButtonColor: "#3085d6",
    cancelButtonText: "Batal",
    confirmButtonColor: "#d33",
    confirmButtonText: "Ya",
  }).then((result) => {
    //jika klik ya maka arahkan ke proses.php
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "assets/dist/php/deleteSurat.php",
        data: {
          key: key,
          tableDb: table,
        },
        success: function (response) {
          var arr = JSON.parse(response);
          if (arr.result == 1) {
            window.location.href = "index.php?pages="+arr.page;
          }
        },
      });
    } else {
      Swal.fire({
        icon: "info",
        text: "Surat batal di hapus",
        showConfirmButton: false,
        timer: 1500,
      });
    }
  });
  return false;
}

function doneDeleteSurat() {
  Swal.fire({
    icon: "success",
    title: "Sukses",
    text: "data berhasil dihapus",
    timer: 1500,
    showConfirmButton: false,
  });
}

function resetForm(key, jenisSk) {
  if (key == "") {
    $("#ket").remove();
    $("#forms")[0].reset();
  } else {
    updateSurat(key, jenisSk);
  }
}

function getPejabatSelect(idJabatan, jnsForm) {
  $.ajax({
    type: "POST",
    url: "assets/dist/php/penadatangan.php",
    data: {
      id: idJabatan,
    },
    //
    // menampilkan hasil yang di dapat yaitu jabatan
    success: function (response) {
      $("#" + jnsForm + " " + "#jabatan input").val(response);
    },
  });
}

function saveDone(x, z) {
  Swal.fire({
    title: "Surat berhasil di simpan, cetak ?",
    icon: "success",
    showDenyButton: true,
    confirmButtonText: "Cetak",
    denyButtonText: "Tidak",
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      var y = window.open("surat/cetak.php?surat="+z+"&id=" + x, "_blank ");
      y.focus();
      window.location.href = "index.php?pages=" + z;
    } else if (result.isDenied) {
      window.location.href = "index.php?pages=" + z;
    }
  });
}
function saveDoneA(x, z, surat) {
  Swal.fire({
    title: "Surat berhasil di simpan, cetak ?",
    icon: "success",
    showDenyButton: true,
    confirmButtonText: "Cetak",
    denyButtonText: "Tidak",
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      var y = window.open("surat/cetak.php?surat="+surat+"&id=" + x, "_blank ");
      y.focus();
      window.location.href = "index.php?pages=" + z;
    } else if (result.isDenied) {
      window.location.href = "index.php?pages=" + z;
    }
  });
}


function updateDone(x, z) {
  Swal.fire({
    title: "Surat berhasil di update, cetak ?",
    icon: "success",
    showDenyButton: true,
    confirmButtonText: "Cetak",
    denyButtonText: "Tidak",
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      var y = window.open("surat/cetak.php?surat="+z+"&id=" + x, "_blank ");
      y.focus();
      window.location.href = "index.php?pages=" + z;
    } else if (result.isDenied) {
      window.location.href = "index.php?pages=" + z;
    }
  });
}
function notChange() {
  Swal.fire({
    icon: "info",
    title: "Aksi Gagal",
    text: "Tidak Ada Perubahan Dalam Database",
  });
}

function notComplete() {
  Swal.fire("Error!", "Di mohon untuk melengkapi data", "error");
}
