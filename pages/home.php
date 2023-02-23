 <?php if (isset($_POST["submit"])) {
    switch ($_POST['jenis']) {
      case 'sk desa':
        $file_type1 = $_FILES['ktp']['type'];
        $file_type2 = $_FILES['s-pengantar']['type'];
        if ($file_type1 == "application/pdf" && $file_type2 == "application/pdf") {
          savePermohonanSkdesa($_POST, $_FILES);
          session_start();
          $_SESSION['info-sukses'] = "Permohonan terkirim, informasi selanjutnya akan dikirim by wa";
          header("location:index.php");
        } else {
          session_start();
          $_SESSION['gagal'] = "File Bukan .Pdf";
          header("location:index.php");
        }
        break;
      case 'sktm sekolah':
        $file_type1 = $_FILES['ktp']['type'];
        $file_type2 = $_FILES['kk']['type'];
        $file_type3 = $_FILES['s-pengantar']['type'];
        if ($file_type1 == "application/pdf" && $file_type2 == "application/pdf" && $file_type3 == "application/pdf") {
          savePermohonanSktmSekolah($_POST, $_FILES);
          session_start();
          $_SESSION['info-sukses'] = "Permohonan terkirim, informasi selanjutnya akan dikirim by wa";
          header("location:index.php");
        } else {
          session_start();
          $_SESSION['gagal'] = "File Bukan .Pdf";
          header("location:index.php");
        }
        break;
      case 'sk usaha':
        $file_type1 = $_FILES['ktp']['type'];
        $file_type2 = $_FILES['s-pengantar']['type'];
        if ($file_type1 == "application/pdf" && $file_type2 == "application/pdf") {
          savePermohonanSkUsaha($_POST, $_FILES);
          session_start();
          $_SESSION['info-sukses'] = "Permohonan terkirim, informasi selanjutnya akan dikirim by wa";
          header("location:index.php");
        } else {
          session_start();
          $_SESSION['gagal'] = "File Bukan .Pdf";
          header("location:index.php");
        }
        break;
      case 'sk kematian':
        $file_type1 = $_FILES['ktp-alm']['type'];
        $file_type2 = $_FILES['ktp-saksi-1']['type'];
        $file_type3 = $_FILES['ktp-saksi-2']['type'];
        $file_type4 = $_FILES['sk-rs']['type'];
        $file_type5 = $_FILES['s-pengantar']['type'];
        if ($file_type1 == "application/pdf" && $file_type2 == "application/pdf" && $file_type3 == "application/pdf" && $file_type4 == "application/pdf" && $file_type5 == "application/pdf") {
          savePermohonanSkKematian($_POST, $_FILES);
          session_start();
          $_SESSION['info-sukses'] = "Permohonan terkirim, informasi selanjutnya akan dikirim by wa";
          header("location:index.php");
        } else {
          session_start();
          $_SESSION['gagal'] = "File Bukan .Pdf";
          header("location:index.php");
        }
        break;
      case 'sk keramaian':
        $file_type1 = $_FILES['ktp']['type'];
        $file_type2 = $_FILES['kk']['type'];
        $file_type3 = $_FILES['s-pengantar']['type'];
        if ($file_type1 == "application/pdf" && $file_type2 == "application/pdf" && $file_type3 == "application/pdf") {
          savePermohonanSkKeramaian($_POST, $_FILES);
          session_start();
          $_SESSION['info-sukses'] = "Permohonan terkirim, informasi selanjutnya akan dikirim by wa";
          header("location:index.php");
        } else {
          session_start();
          $_SESSION['gagal'] = "File Bukan .Pdf";
          header("location:index.php");
        }
        break;
      default:
        # code...
        break;
    }
  }
  ?>
 <!-- ======= Top Bar ======= -->
 <section id="topbar" class="d-flex align-items-center">
   <div class="container d-flex justify-content-center justify-content-md-between">
     <div class="contact-info d-flex align-items-center">
       <i class="bi bi-envelope-fill"></i><a href="">kondangjaya@gmail.com</a>
       <i class="bi bi-phone-fill phone-icon"></i>08991132047
     </div>
   </div>
 </section>
 <!-- ======= Header ======= -->
 <header style="background-color: #ECEFF1;" id="header" class="d-flex align-items-center border-bottom">
   <div class="container d-flex align-items-center">
     <h2 class="logo me-auto"><a href="index.php">Kondangjaya</a></h2>
     <nav id="navbar" class="navbar">
       <ul>
         <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
         <li><a class="nav-link scrollto" href="#profile">Profile</a></li>
         <li><a class="nav-link scrollto" href="#services">Pemerintahan</a></li>
         <li><a class="nav-link scrollto" href="#pelayanan">Pelayanan</a></li>
         <li><a class="nav-link scrollto" href="#inventaris">Inventaris</a></li>
         <li><a class="nav-link scrollto" href="#kontak">Kontak</a></li>
         <li><a class="getstarted scrollto" href="index.php?home=login">Login</a></li>
       </ul>
       <!-- <i class="bi bi-list mobile-nav-toggle"></i> -->
     </nav><!-- .navbar -->
   </div>
 </header><!-- End Header -->
 <!-- ======= Home Section ======= -->
 <section id="hero">
   <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

     <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

     <div class="carousel-inner" role="listbox">

       <!-- Slide 1 -->
       <div class="carousel-item active" style="background-image: url(public/front/img/slide/1.png)">
         <div class="carousel-container">
           <div class="container">
             <h2 class="animate__animated animate__fadeInDown">Selamat Datang !</h2>
             <p class="animate__animated animate__fadeInUp">Website resmi Kelurahan Desa Kondangjaya</p>
           </div>
         </div>
       </div>

       <!-- Slide 2 -->
       <div class="carousel-item" style="background-image: url(public/front/img/slide/2.png)">
         <div class="carousel-container">
           <div class="container">
             <h2 class="animate__animated animate__fadeInDown">Kondangjaya Bersahaja.</h2>
             <p class="animate__animated animate__fadeInUp">
             <h2></h2>
             </p>
           </div>
         </div>
       </div>

       <!-- Slide 3 -->
       <div class="carousel-item" style="background-image: url(public/front/img/slide/3.png)">
         <div class="carousel-container">
           <div class="container">
             <h2 class="animate__animated animate__fadeInDown">Kondangjaya</h2>
             <p class="animate__animated animate__fadeInUp">....</p>
           </div>
         </div>
       </div>

     </div>

     <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
       <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
     </a>

     <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
       <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
     </a>

   </div>
 </section><!-- End Home -->

 <main id="main">
   <!-- ======= Profile section ======= -->
   <section id="profile" class="profile h-100">
     <div class="container">
       <div class="section-title">
         <h2>Profile Desa</h2>
       </div>
       <div class="row">
         <div class="col-lg-16 pt-6 pt-lg-0 order-2 order-lg-1 content">
           <p style="text-indent: 45px;" class="bi bi-check-circled text-justify">
             Desa Kondangjaya berada pada daerah perkotaan dengan topografi secara umum berupa dataran rendah dengan
             ketinggian 10 – 20 meter dari permukaan laut. Kondisi iklimnya tropis dengan suhu rata-rata 34,50 celcius dengan tekanan udara 0,01 milibar.
             yang hampir separuh penduduknya adalah pendatang.
             Fenomena ini terjadi hampir sepuluh tahun belakangan ini. Perubahan drastis terutama dari sektor
             properti dan ekonomi begitu terasa. Alih fungsi lahan pertanian menjadi pemukiman baru tak bisa dipungkiri.
             Pasar Kaget, Pasar Tradisional, Bank, Minimarket, pertokoan bahkan Mall sekalipun sudah berdiri tegak di wilayah desa ini.
             Kalau dulu yang namanya jalan citra kebun mas bisa dikatakan sepi dan belum seramai sekarang. Kini jalan citra kebun mas
             menjadi penopang utama menuju sekian banyak perumahan di wilayah kondangjaya dan sekitarnya.
           </p>
           <p style="text-indent: 45px;" class="bi bi-check-circled text-justify">Fasilitas Pendidikan sudah cukup memadai. PAUD, TK/RA, SD dan SMK Negeri sudah tesedia. Fasilitas kesehatanpun demikian.
             Praktek dokter/bidan, Rumah Sakit bersalin bahkan Klinik sekelas rumah sakitpun sudah tersedia.
             Masyarakat tak perlu bersusah payah mencari makanan/kuliner atau sekedar teman nasi.
             Berjenis makanan sudah tersedia disepanjang jalan citra kebunmas mulai dari perempatan
             jalan utama sampai perumahan citra kebun mas. Mulai dari makanan khas pribumi sampai
             berjenis makanan luar daerah. Karena sebagian besar pedagang yang berjualan di wilayah ini
             adalah pendatang terutama dari jawa dimana mereka memperkenalkan makanan khas dari daerahnya masing-masing.
           </p>
         </div>
       </div>

     </div>
   </section><!-- End About Us Section -->

   <!-- ======= Pemerintahan Section ======= -->
   <section style="background-color: whitesmoke;" id="services" class="services h-100">
     <div class="container">
       <div class="section-title">
         <h2>Pemerintahan</h2>
       </div>
       <div class="row d-flex justify-content-center">
         <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
           <div class="icon-box w-100 iconbox-blue">
             <div class="icon">
               <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
               </svg>
               <img src="assets/front/img/kp.png" class="img-thumbnail" alt="...">

             </div>
             <h4><a href="">ANJA SUGIANA, SE</a></h4>
             <p>Kepala Desa Kondangjaya</p>
           </div>
         </div>
         <!--  -->
         <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
           <div class="icon-box w-100 iconbox-blue">
             <div class="icon">
               <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
               </svg>
               <img src="assets/front/img/kp.png" class="img-thumbnail" alt="...">

             </div>
             <h4><a href="">H. SARNO SUKARDI</a></h4>
             <p>Sekretaris Desa Kondangjaya</p>
           </div>
         </div>
       </div>
     </div>
   </section><!-- End Pemerintahan Section -->

   <section id="pelayanan" class="services h-100">
     <div class="container">
       <div class="section-title">
         <h2>Pelayanan</h2>
       </div>
       <div class="row d-flex justify-content-center">
         <!--  -->
         <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
           <div class="icon-box w-100">
             <div class="icon">
               <img class="img-fluid" src="assets/dist/icon/upload.png" alt="">
             </div>
             <a href="" class="text-dark" data-bs-toggle="modal" data-bs-target="#skDesaModal">
               <div class="h6">Surat Keterangan Desa</div>
             </a>
           </div>
         </div>
         <!--  -->
         <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
           <div class="icon-box w-100">
             <div class="icon">
               <img class="img-fluid" src="assets/dist/icon/upload.png" alt="">
             </div>
             <a href="" class="text-dark" data-bs-toggle="modal" data-bs-target="#sktmModal">
               <div class="h6">Surat Keterangan Tidak Mampu Sekolah</div>
             </a>
           </div>
         </div>
         <!--  -->
         <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
           <div class="icon-box w-100">
             <div class="icon">
               <img class="img-fluid" src="assets/dist/icon/upload.png" alt="">
             </div>
             <a href="" class="text-dark" data-bs-toggle="modal" data-bs-target="#modalSkUsaha">
               <div class="h6">Surat Keterangan Usaha</div>
             </a>
           </div>
         </div>
         <!--  -->
         <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
           <div class="icon-box w-100">
             <div class="icon">
               <img class="img-fluid" src="assets/dist/icon/upload.png" alt="">
             </div>
             <a href="" class="text-dark" data-bs-toggle="modal" data-bs-target="#skKematian">
               <div class="h6">Surat Keterangan Kematian</div>
             </a>
           </div>
         </div>
         <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
           <div class="icon-box w-100">
             <div class="icon">
               <img class="img-fluid" src="assets/dist/icon/upload.png" alt="">
             </div>
             <a href="" class="text-dark" data-bs-toggle="modal" data-bs-target="#skKeramaian">
               <div class="h6">Surat Keterangan Keramaian</div>
             </a>
           </div>
         </div>
       </div>
   </section>
   <section style="background-color: whitesmoke;" id="inventaris" class="contact h-100">
     <div class="container">
       <div class="section-title">
         <h2>Inventaris</h2>
       </div>
       <?php $inventaris = getInventaris("") ?>
       <div class="row">
         <div class="col-lg-12 d-flex align-items-stretch">
           <div class="info">
             <div class="table-responsive">
               <table id="example" class="display table-bordered table-sm my-5 text-center" style="width:100%">
                 <thead>
                   <tr>
                     <td class="text-center">No</td>
                     <td class="text-center">Jenis Barang Bangunan</td>
                     <td class="text-center">Asal Barang/Bangunan</td>
                     <td class="text-center">Keadaan Barang/Bangunan Awal Tahun</td>
                     <td class="text-center">Tanggal Pengesahan</td>
                     <td class="text-center">Keadaan Barang/Bangunan Akhir Tahun </td>
                     <td class="text-center">Keterangan</td>
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                    $no = 1;
                    foreach ($inventaris as $key) { ?>
                     <tr>
                       <td><?= $no; ?></td>
                       <td><?= $key["jenis_bb"]; ?></td>
                       <td><?= $key["asal_bb"]; ?></td>
                       <td><?= $key["keadaan_bb_awal_t"]; ?></td>
                       <td><?= tglIndo($key["tgl_pengesahan"]); ?></td>
                       <td><?= $key["keadaan_bb_akhir_t"]; ?></td>
                       <td><?= $key["keterangan"]; ?></td>
                     </tr>
                   <?php $no++;
                    } ?>
                 </tbody>
               </table>
             </div>
           </div>
         </div>
       </div>
     </div>
   </section>
   <section id="kontak" class="contact h-100">
     <div class="container">
       <div class="section-title">
         <h2>Kontak</h2>
       </div>
       <div class="row">
         <div class="col-lg-12 d-flex align-items-stretch">
           <div class="info">
             <div class="address">
               <i class="bi bi-geo-alt"></i>
               <h4>Lokasi:</h4>
               <p>Desa Kondangjaya Kec.Karawang Timur Kab.Karawang Jawa Barat</p>
             </div>

             <div class="phone">
               <i class="bi bi-phone"></i>
               <h4>Call:</h4>
               <p>+1 5589 55488 55s</p>
             </div>
             <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31723.83773717917!2d107.32284531817275!3d-6.331839756730454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6976f83488349f%3A0x3afca5ffa86507eb!2sKondangjaya%2C%20Kec.%20Karawang%20Tim.%2C%20Karawang%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1667141966972!5m2!1sid!2sid" width="400" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>"
           </div>
         </div>
       </div>

     </div>
   </section>
 </main>
 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
 <!-- modal -->
 <!-- Modal sk desa -->
 <div class="modal fade" id="skDesaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <div class="h5">Form Surat Keterangan Desa</div>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <form action="" method="POST" enctype="multipart/form-data">
         <div class="modal-body">
           <div class="row mb-1">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">No NIK</label>
               <input required autocomplete="off" type="number" min="16" class="form-control form-control-sm" name="no-nik" placeholder="Masukan NIK">
             </div>
           </div>
           <div class="row mb-1">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Nama pemohon</label>
               <input required autocomplete="off" type="text" class="form-control form-control-sm" name="nama" placeholder="Masukan Nama ">
             </div>
           </div>
           <div class="row mb-2">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal d-flex align-content-center">
                 <!-- Copy  -->
                 <div class="fs-6 text-danger">*</div>
                 <div class="ms-1">No Whatsapp</div>
                 <!--  -->
               </label>
               <div class="input-group input-group-sm">
                 <span class="input-group-text" id="inputGroup-sizing-sm">+62</span>
                 <input required autocomplete="off" type="number" class="form-control form-control-sm" name="wa" placeholder="Masukan No Whatsapp ">
               </div>
             </div>
           </div>
           <div class="row mb-2">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Tujuan</label>
               <input required autocomplete="off" type="text" class="form-control form-control-sm" name="tujuan" placeholder="Masukan Tujuan ">
             </div>
           </div>
           <hr>
           <div class="row">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">
                 Upload KTP
               </label>
               <div class="input-group mb-3">
                 <input required autocomplete="off" type="file" class="form-control form-control-sm" name="ktp">
               </div>
             </div>
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Upload Surat Pengantar rt/rw</label>
               <div class="input-group mb-3">
                 <input required autocomplete="off" type="file" class="form-control form-control-sm" name="s-pengantar">
               </div>
             </div>
           </div>
         </div>
         <div class="card-footer py-3">
           <div class="row">
             <div class="offset-6 col-3 d-grid">
               <button type="reset" class="btn btn-warning btn-sm">Ulangi</button>
             </div>
             <div class="col-3 d-grid">
               <input type="hidden" name="jenis" value="sk desa">
               <button type="submit" name="submit" class="btn btn-success btn-sm">Simpan</button>
             </div>
           </div>
         </div>
       </form>
     </div>
   </div>
 </div>
 <!-- Modal sktm sekolah -->
 <div class="modal fade" id="sktmModal" tabindex="-1" aria-labelledby="sktmModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <div class="h5">Form Surat Keterangan Tidak Mampu</div>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <form action="" method="POST" enctype="multipart/form-data">
         <div class="modal-body">
           <div class="row mb-1">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">No NIK</label>
               <input required autocomplete="off" type="number" min="16" class="form-control form-control-sm" name="no-nik" placeholder="Masukan NIK ">
             </div>
           </div>
           <div class="row mb-1">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Nama pemohon</label>
               <input required autocomplete="off" type="text" class="form-control form-control-sm" name="nama" placeholder="Masukan Nama ">
             </div>
           </div>
           <div class="row mb-1">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal d-flex align-content-center">
                 <div class="fs-6 text-danger">*</div>
                 <div class="ms-1">No Whatsapp</div>
               </label>
               <div class="input-group input-group-sm">
                 <span class="input-group-text" id="inputGroup-sizing-sm">+62</span>
                 <input required autocomplete="off" type="number" class="form-control form-control-sm" name="wa" placeholder="Masukan No Whatsapp ">
               </div>
             </div>
           </div>
           <div class="row mb-1">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Tujuan</label>
               <input required autocomplete="off" type="text" class="form-control form-control-sm" name="tujuan" placeholder="Masukan Tujuan ">
             </div>
           </div>
           <hr>
           <div class="row">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Upload KK</label>
               <div class="input-group mb-3">
                 <input required autocomplete="off" type="file" class="form-control form-control-sm" name="kk">
               </div>
             </div>
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Upload KTP</label>
               <div class="input-group mb-3">
                 <input required autocomplete="off" type="file" class="form-control form-control-sm" name="ktp">
               </div>
             </div>
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Upload Surat Pengantar RT/RW</label>
               <div class="input-group mb-3">
                 <input required autocomplete="off" type="file" class="form-control form-control-sm" name="s-pengantar">
               </div>
             </div>
           </div>
         </div>
         <div class="card-footer py-3">
           <div class="row">
             <div class="offset-6 col-3 d-grid">
               <button type="reset" class="btn btn-warning btn-sm">Ulangi</button>
             </div>
             <div class="col-3 d-grid">
               <input type="hidden" name="jenis" value="sktm sekolah">
               <button type="submit" name="submit" class="btn btn-success btn-sm">Simpan</button>
             </div>
           </div>
         </div>
       </form>
     </div>
   </div>
 </div>
 <!-- Modal Sk Usaha -->
 <div class="modal fade" id="modalSkUsaha" tabindex="-1" aria-labelledby="modalSkUsahaLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <div class="h5">Form Surat Keterangan Usaha</div>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <form action="" method="POST" enctype="multipart/form-data">
         <div class="modal-body">
           <div class="row mb-1">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">No NIK</label>
               <input required autocomplete="off" type="number" min="16" class="form-control form-control-sm" name="no-nik" placeholder="Masukan NIK ">
             </div>
           </div>
           <div class="row mb-1">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Nama pemohon</label>
               <input required autocomplete="off" type="text" class="form-control form-control-sm" name="nama" placeholder="Masukan Nama ">
             </div>
           </div>
           <div class="row mb-1">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal d-flex align-content-center">
                 <div class="fs-6 text-danger">*</div>
                 <div class="ms-1">No Whatsapp</div>
               </label>
               <div class="input-group input-group-sm">
                 <span class="input-group-text" id="inputGroup-sizing-sm">+62</span>
                 <input required autocomplete="off" type="number" class="form-control form-control-sm" name="wa" placeholder="Masukan No Whatsapp ">
               </div>
             </div>
           </div>
           <div class="row mb-1">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Tujuan</label>
               <input required autocomplete="off" type="text" class="form-control form-control-sm" name="tujuan" placeholder="Masukan Tujuan ">
             </div>
           </div>
           <hr>
           <div class="row">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Upload KTP</label>
               <div class="input-group mb-3">
                 <input required autocomplete="off" type="file" class="form-control form-control-sm" name="ktp">
               </div>
             </div>
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Upload Surat Pengantar RT/RW</label>
               <div class="input-group mb-3">
                 <input required autocomplete="off" type="file" class="form-control form-control-sm" name="s-pengantar">
               </div>
             </div>
           </div>
         </div>
         <div class="card-footer py-3">
           <div class="row">
             <div class="offset-6 col-3 d-grid">
               <button type="reset" class="btn btn-warning btn-sm">Ulangi</button>
             </div>
             <div class="col-3 d-grid">
               <input type="hidden" name="jenis" value="sk usaha">
               <button type="submit" name="submit" class="btn btn-success btn-sm">Simpan</button>
             </div>
           </div>
         </div>
       </form>
     </div>
   </div>
 </div>
 <!-- Modal Sk Kematian -->
 <div class="modal fade" id="skKematian" tabindex="-1" aria-labelledby="skKematianLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <div class="h5">Form Surat Keterangan Kematian</div>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <form action="" method="POST" enctype="multipart/form-data">
         <div class="modal-body">
           <div class="row mb-1">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">No NIK</label>
               <input required autocomplete="off" type="number" min="16" class="form-control form-control-sm" name="no-nik" placeholder="Masukan NIK ">
             </div>
           </div>
           <div class="row mb-1">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Nama pemohon</label>
               <input required autocomplete="off" type="text" class="form-control form-control-sm" name="nama" placeholder="Masukan Nama ">
             </div>
           </div>
           <div class="row mb-1">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal d-flex align-content-center">

                 <div class="fs-6 text-danger">*</div>
                 <div class="ms-1">No Whatsapp</div>

               </label>
               <div class="input-group input-group-sm">
                 <span class="input-group-text" id="inputGroup-sizing-sm">+62</span>
                 <input required autocomplete="off" type="number" class="form-control form-control-sm" name="wa" placeholder="Masukan No Whatsapp ">
               </div>
             </div>
           </div>
           <div class="row mb-1">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Tujuan</label>
               <input required autocomplete="off" type="text" class="form-control form-control-sm" name="tujuan" placeholder="Masukan Tujuan ">
             </div>
           </div>
           <hr>
           <div class="row">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Upload KTP Alm</label>
               <div class="input-group mb-3">
                 <input required autocomplete="off" type="file" class="form-control form-control-sm" name="ktp-alm">
               </div>
             </div>
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Upload KTP Saksi 1</label>
               <div class="input-group mb-3">
                 <input required autocomplete="off" type="file" class="form-control form-control-sm" name="ktp-saksi-1">
               </div>
             </div>
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Upload KTP Saksi 2</label>
               <div class="input-group mb-3">
                 <input required autocomplete="off" type="file" class="form-control form-control-sm" name="ktp-saksi-2">
               </div>
             </div>
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Upload Surat Keterangan RS</label>
               <div class="input-group mb-3">
                 <input required autocomplete="off" type="file" class="form-control form-control-sm" name="sk-rs">
               </div>
             </div>
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Upload Surat Pengantar RT/RW</label>
               <div class="input-group mb-3">
                 <input required autocomplete="off" type="file" class="form-control form-control-sm" name="s-pengantar">
               </div>
             </div>
           </div>
         </div>
         <div class="card-footer py-3">
           <div class="row">
             <div class="offset-6 col-3 d-grid">
               <button type="reset" class="btn btn-warning btn-sm">Ulangi</button>
             </div>
             <div class="col-3 d-grid">
               <input type="hidden" name="jenis" value="sk kematian">
               <button type="submit" name="submit" class="btn btn-success btn-sm">Simpan</button>
             </div>
           </div>
         </div>
       </form>
     </div>
   </div>
 </div>
 <!--  -->
 <!-- Sk Keramaian -->
 <div class="modal fade" id="skKeramaian" tabindex="-1" aria-labelledby="skKeramaianLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <div class="h5">Form Surat Keterangan Keramaian</div>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <form action="" method="POST" enctype="multipart/form-data">
         <div class="modal-body">
           <div class="row mb-1">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">No NIK</label>
               <input required autocomplete="off" type="number" min="16" class="form-control form-control-sm" name="no-nik" placeholder="Masukan NIK ">
             </div>
           </div>
           <div class="row mb-1">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Nama pemohon</label>
               <input required autocomplete="off" type="text" class="form-control form-control-sm" name="nama" placeholder="Masukan Nama ">
             </div>
           </div>
           <div class="row mb-1">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal d-flex align-content-center">

                 <div class="fs-6 text-danger">*</div>
                 <div class="ms-1">No Whatsapp</div>
               </label>
               <div class="input-group input-group-sm">
                 <span class="input-group-text" id="inputGroup-sizing-sm">+62</span>
                 <input required autocomplete="off" type="text" class="form-control form-control-sm" name="wa" placeholder="Masukan No Whatsapp ">
               </div>
             </div>
           </div>
           <div class="row mb-1">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Tujuan</label>
               <input required type="text" class="form-control form-control-sm" name="tujuan" placeholder="Masukan Tujuan ">
             </div>
           </div>
           <hr>
           <div class="row">
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Upload KTP</label>
               <div class="input-group mb-3">
                 <input required autocomplete="off" type="file" class="form-control form-control-sm" name="ktp">
               </div>
             </div>
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Upload KK</label>
               <div class="input-group mb-3">
                 <input required autocomplete="off" type="file" class="form-control form-control-sm" name="kk">
               </div>
             </div>
             <div class="col-12">
               <label for="exampleFormControlInput1" class="fw-normal">Upload Surat Pengantar RT/RW</label>
               <div class="input-group mb-3">
                 <input required autocomplete="off" type="file" class="form-control form-control-sm" name="s-pengantar">
               </div>
             </div>
           </div>
         </div>
         <div class="card-footer py-3">
           <div class="row">
             <div class="offset-6 col-3 d-grid">
               <button type="reset" class="btn btn-warning btn-sm">Ulangi</button>
             </div>
             <div class="col-3 d-grid">
               <input type="hidden" name="jenis" value="sk keramaian">
               <button type="submit" name="submit" class="btn btn-success btn-sm">Simpan</button>
             </div>
           </div>
         </div>
       </form>
     </div>
   </div>
 </div>
 <!--  -->
 </div>
 </div>
 <script>
   $(document).ready(function() {
     $('#example').DataTable();
   });
 </script>