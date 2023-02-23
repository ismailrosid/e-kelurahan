<div class="container-fluid">

  <div class="row mb-2">
    <div class="col-sm-6">
      <h3 class="m-0">Dashboard</h3>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <!-- <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Dashboard v1</li>
      </ol> -->
    </div><!-- /.col -->
  </div><!-- /.row -->

  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3><?= getCountPermohonan(); ?></h3>
          <p>Permohonan Surat</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="index.php?pages=permohonanSurat" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
</div>