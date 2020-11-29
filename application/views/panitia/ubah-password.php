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

    <div class="row">
      <div class="col-lg-6 pl-3">
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('panitia/ubahpassword'); ?>" method="POST">
          <div class="form-group">
            <label for="password_lama">Password Lama</label>
            <input type="password" class="form-control" id="password_lama" name="password_lama">
            <?= form_error('password_lama', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="password_baru">Password Baru</label>
            <input type="password" class="form-control" id="password_baru" name="password_baru">
            <?= form_error('password_baru', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="password_baru2">Ulangi Password</label>
            <input type="password" class="form-control" id="password_baru2" name="password_baru2">
            <?= form_error('password_baru2', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Ubah Password</button>
          </div>
        </form>
      </div>
    </div>


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->