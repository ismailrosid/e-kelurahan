<?php
date_default_timezone_set('Asia/Jakarta');
require "assets/dist/php/dataArr.php";
require "assets/dist/php/function.php";
session_start();
if (empty(getAdmin())) {
  createAdmin("admin", "admin", "12345678");
}  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>e-kelurahan</title>
  <link href="assets/front/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/front/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/front/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/front/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/front/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/front/css/style.css" rel="stylesheet">
  <!-- Google Font: poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.css">
  <!-- Bootstap 5 -->
  <link rel="stylesheet" href="assets/plugins/bootstrap-5.0.2/css/bootstrap.css">
  <!------------------------------------------------------------------->
  <!-- My css -->
  <!-- Primary -->
  <link rel="stylesheet" href="assets/dist/css/style.css">
  <!-- Surat -->
  <link rel="stylesheet" href="assets/dist/css/surat.css">
  <!------------------------------------------------------------------->
  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.js"></script>
  <!-- My js -->
  <script src="assets/dist/js/function.js"></script>
  <!-- Data Tables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <!-- Sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
  <!--  -->

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <?php if (isset($_SESSION['info-sukses'])) { ?>
    <script>
      Swal.fire({
        icon: 'info',
        title: 'Selamat',
        text: '<?php echo $_SESSION['info-sukses'] ?>'
      })
    </script>
  <?php
    unset($_SESSION['info-sukses']);
  } elseif (isset($_SESSION['info-gagal'])) { ?>
    <script>
      Swal.fire({
        icon: 'info',
        title: 'Mohon Maaf',
        text: '<?php echo $_SESSION['info-gagal'] ?>'
      })
    </script>
  <?php
    unset($_SESSION['info-gagal']);
  } elseif (isset($_SESSION['sukses'])) { ?>
    <script>
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: '<?php echo $_SESSION['sukses'] ?>',
        showConfirmButton: false,
        timer: 1500
      })
    </script>
  <?php
    unset($_SESSION['sukses']);
  } elseif (isset($_SESSION['gagal'])) { ?>
    <script>
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: '<?php echo $_SESSION['gagal'] ?>',
        showConfirmButton: false,
        timer: 1500
      });
    </script>
  <?php
    unset($_SESSION['gagal']);
  } ?>
  <!-- Site wrapper -->
  <?php if (isset($_SESSION["nama"]) && isset($_SESSION["username"]) && isset($_SESSION["password"])) { ?>
    <div class="wrapper">
      <?php if (isset($_GET["pages"])) {
        $pages = $_GET["pages"];
      }
      ?>
      <!-- Navbar -->
      <?php include "layouts/navbar.php" ?>
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      <?php include "layouts/sidebar.php" ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php include "layouts/header.php" ?>
        <!-- Main content -->
        <section class="content">
          <?php if (!isset($_GET["pages"])) { ?>
            <?php include "pages/dashboard.php" ?>
          <?php } else { ?>
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <!-- Default box -->
                  <div class="card">
                    <!-- isi content -->
                    <?php
                    switch ($pages) {
                      case 'skDesa':
                        include "pages/skDesa.php";
                        break;
                      case 'sktmSekolah':
                        include "pages/sktmSekolah.php";
                        break;
                      case 'sktmRs':
                        include "pages/sktmRs.php";
                        break;
                      case 'skUsaha':
                        include "pages/skUsaha.php";
                        break;
                      case 'skKematian':
                        include "pages/skKematian.php";
                        break;
                      case 'skKeramaian':
                        include "pages/skKeramaian.php";
                        break;
                      case 'permohonanSurat':
                        include "pages/permohonanSurat.php";
                        break;
                      case 'pengiriman':
                        include "pages/pengiriman.php";
                        break;
                      case 'inventaris':
                        include "pages/inventaris.php";
                        break;
                      case 'prosesSurat':
                        include "pages/prosesSurat.php";
                        break;
                      case 'updateInventaris':
                        include "pages/updateInventaris.php";
                        break;
                      case 'deleteInventaris':
                        include "pages/deleteInventaris.php";
                        break;
                      default:
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
      </div>
    <?php } ?>
    </section>
    <!-- /.content -->
    </div>
    <?php include "layouts/footer.php" ?>
    <script src="assets/plugins/bootstrap-5.0.2/js/bootstrap.bundle.js"></script>
    <!-- overlayScrollbars -->
    <script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.js"></script>
    <script src="assets/dist/js/function.js"></script>
    <script>
      $('#form-inputs').hide();

      $(document).ready(function() {
        $('#show-surats').click(function() {
          location.reload();
        });
        $('#show-formInputs').click(function() {
          showFormInputs();
        });

        // Sktm rs
        // $("#tambah-anggota").click(function() {
        //   var html = $("#copy").html();
        //   $(".after-add-more").after(html);
        // });
        // saat tombol remove dklik control group akan dihapus 
        $("body").on("click", "#remove", function() {
          $(this).parents("#control-group").remove();
        });
      });
    </script>
  <?php } else { ?>
    <?php if (isset($_GET["home"])) {
      $pages = $_GET["home"];
      switch ($pages) {
        case 'login':
          include "pages/login.php";
          break;

        default:
          # code...
          break;
      }
    } else {
      include "pages/home.php";
    }
    ?>


    <script src="assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/front/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/front/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/front/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/front/vendor/php-email-form/validate.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/front/js/main.js"></script>
  <?php } ?>
  <!-- /.content-wrapper -->
  <!-- footer -->

  <!-- Data Tables -->
  <!-- Bootstrap 5-->
</body>

</html>