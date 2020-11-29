<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $judul; ?></h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">


    <div class="mb-2" style="max-width: 540px;">
      <?= $this->session->flashdata('message'); ?>
    </div>
    <!-- Default box -->
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="<?= base_url('assets/dist/img/profile/') . $user['foto']; ?>" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?= $user['nama_user']; ?></h5>
            <p class="card-text"><?= $user['email']; ?></p>
            <p class="card-text"><small class="text-muted">Terdaftar Sejak <?= date('d F Y', $user['date_created']) ?></small></p>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->