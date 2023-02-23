<aside class="main-sidebar sidebar-light-green elevation-4">
  <!-- Brand Logo -->
  <a href="/index3.html" class="brand-link bg-success">
    <img src="assets/dist/img/logo-desa.png" alt="AdminLTE Logo" class="brand-image img-fluid img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">KondangJaya</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="assets/dist/img/admin.jpg" class="img-circle elevation-2 " alt="User Image">
      </div>
      <div class="info">
        <a data-bs-toggle="modal" data-bs-target="#profile" class="d-block text-uppercase"><?= $_SESSION["nama"]; ?><span class="ms-1"></span></a>
        <!-- Button trigger modal -->
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="index.php" class="nav-link <?= empty($pages) ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item <?= $pages == 'skDesa' || $pages == 'sktmSekolah' || $pages == 'sktmRs' || $pages == 'skUsaha' || $pages == 'skKeramaian' || $pages == 'skKematian' ? 'menu-open' : ''; ?>">
          <a class="nav-link <?= $pages == 'skDesa' || $pages == 'sktmSekolah' || $pages == 'sktmRs' || $pages == 'skUsaha' || $pages == 'skKeramaian' || $pages == 'skKematian' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Daftar Surat
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?pages=skDesa" class="nav-link <?= $pages == 'skDesa' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p class="fs-7">sk desa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?pages=sktmSekolah" class="nav-link <?= $pages == 'sktmSekolah' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p class="fs-7">sktm sekolah</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?pages=skUsaha" class="nav-link <?= $pages == 'skUsaha' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p class="fs-7">sk usaha</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?pages=skKematian" class="nav-link <?= $pages == 'skKematian' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p class="fs-7">sk kematian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?pages=skKeramaian" class="nav-link <?= $pages == 'skKeramaian' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p class="fs-7">sk keramaian</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="index.php?pages=permohonanSurat" class="nav-link <?= $pages == 'permohonanSurat' || $pages == 'prosesSurat' ? 'active' : ''; ?>">
            <i class="nav-icon fa-solid fa-envelope"></i>
            <p>
              Permohonan Surat
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?pages=pengiriman" class="nav-link <?= $pages == 'pengiriman' ? 'active' : ''; ?>">
            <i class="nav-icon fa-solid fa-share-from-square"></i>
            <p>
              Pengiriman
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?pages=inventaris" class="nav-link <?= $pages == 'inventaris' || $pages == 'updateInventaris' ? 'active' : ''; ?>">
            <i class="fa-sharp nav-icon fa-solid fa-file"></i>
            <p>
              Inventaris
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a id="logout" class="nav-link">
            <i class="nav-icon fa-solid fa-arrow-right-from-bracket"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<!-- Modal -->
<div class="modal fade" id="profile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="profileLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="profileLabel">Profile Saya</h5>
        </div>
        <div class="modal-body">
          <div class="d-flex">
            <button value="update-profile" id="profile-admin" type="button" class="btn btn-sm btn-success">Profile</button>
            <button value="update-password" id="password-admin" type="button" class="btn btn-sm btn-secondary mx-2">Password</button>
          </div>
          <input id="aksi" value="update-profile" type="hidden" value="">
          <hr>
          <div id="form-updateProfile">
            <?php
            $admin = getAdmin();
            ?>
            <input id="id-admin" value="<?= $admin["id"]; ?>" type="hidden">
            <div class="row mb-1">
              <div class="col-12">
                <label for="exampleFormControlInput1" class="fw-normal">Nama Admin</label>
                <input autocomplete="off" id="nama-admin" type="text" class="form-control form-control-sm" value="<?= $admin['nama']; ?>">
              </div>
            </div>
            <div class="row mb-1">
              <div class="col-12">
                <label for="exampleFormControlInput1" class="fw-normal">Username</label>
                <input autocomplete="off" id="username" type="text" class="form-control form-control-sm" value="<?= $admin['username']; ?>">
              </div>
            </div>
          </div>
          <div id="form-updatePassword">
            <div class="row mb-1">
              <div class="col-12">
                <label for="exampleFormControlInput1" class="fw-normal">Password Lama</label>
                <input autocomplete="off" id="passwordl" type="password" class="form-control form-control-sm" name="" placeholder="Masukan Password Lama">
                <input id="passworda" type="hidden" value="<?= $admin['password']; ?>">
              </div>
            </div>
            <div class="row mb-1">
              <div class="col-12">
                <label for="exampleFormControlInput1" class="fw-normal">Password Baru</label>
                <input autocomplete="off" id="passwordb" type="password" class="form-control form-control-sm" name="passwordb" placeholder="Masukan Password Baru">
              </div>
            </div>
            <div class="row mb-1">
              <div class="col-12">
                <label for="exampleFormControlInput1" class="fw-normal">Ulangi Password Baru</label>
                <input autocomplete="off" id="password" type="password" class="form-control form-control-sm" placeholder="Masukan Kembali Password Baru">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="close-update" type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Tutup</button>
          <button id="update" type="button" class="btn btn-success">Update</button>
        </div>
      </div>
    </form>

  </div>
</div>

<script>
  $(document).ready(function() {
    $("#profile #form-updatePassword").hide();
    // 
    $("#profile-admin").click(function() {
      $("#aksi").val($("#profile-admin").val());
      $("#profile #form-updateProfile").show();
      $("#profile #form-updatePassword").hide();
      $(this).removeClass('btn-secondary');
      $(this).addClass('btn-success');
      $("#passwordl").val("");
      $("#passworda").val("");
      $("#passwordb").val("");
      $("#password").val("");
      // 
      $("#password-admin").removeClass('btn-success');
      $("#password-admin").addClass('btn-secondary');
    });
    $("#password-admin").click(function() {
      $("#aksi").val($("#password-admin").val());
      $("#profile #form-updatePassword").show();
      $("#profile #form-updateProfile").hide();
      $(this).removeClass('btn-secondary');
      $(this).addClass('btn-success');
      $("#profile-admin").removeClass('btn-success');
      $("#profile-admin").addClass('btn-secondary');
    });
    // 
    $("#update").click(function() {
      var aksi = $("#aksi").val();
      var idadmin = $("#id-admin").val();
      var nama = $("#nama-admin").val();
      var username = $("#username").val();
      var passwordl = $("#passwordl").val();
      var passworda = $("#passworda").val();
      var passwordb = $("#passwordb").val();
      var password = $("#password").val();
      // 
      $.ajax({
        type: "POST",
        url: "assets/dist/php/updateAdmin.php",
        data: {
          aksi: aksi,
          idadmin: idadmin,
          nama: nama,
          username: username,
          passwordl: passwordl,
          passworda: passworda,
          passwordb: passwordb,
          password: password
        },
        success: function(response) {
          var arr = JSON.parse(response);
          if (arr.sukses == 1) {
            $('#close-update').trigger('click');
            Swal.fire({
              title: arr.pesan,
              icon: "success",
              showDenyButton: true,
              confirmButtonText: "Ya",
              denyButtonText: "Tidak",
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                window.location.href = "logout.php";
              } else if (result.isDenied) {
                window.location.href = "index.php";
              }
            });
          } else {
            Swal.fire({
              icon: 'info',
              title: 'Mohon Maaf',
              text: arr.pesan
            })
          }
        }
      });
    });
    // 
    $("#logout").click(function() {
      Swal.fire({
        title: "Anda yakin, ingin logout ?",
        icon: "question",
        showDenyButton: true,
        confirmButtonText: "Ya",
        denyButtonText: "Tidak",
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          window.location.href = "logout.php";
        } else if (result.isDenied) {}
      });
    });
  });
</script>