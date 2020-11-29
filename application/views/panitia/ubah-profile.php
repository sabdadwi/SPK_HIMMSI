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
      <div class="col-lg-6">

        <?= form_open_multipart('panitia/edit'); ?>
        <div class="form-group row">
          <label for="email" class="col-sm-4 col-form-label">Email</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama_user']; ?>">
            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-4"><b>Gambar</b></div>
          <div class="col-sm-8">
            <div class="row">
              <div class="col-sm-3">
                <img src="<?= base_url('assets/dist/img/profile/') . $user['foto']; ?>" class="img-thumbnail">
              </div>
              <div class="col-sm-9">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="gambar" name="gambar">
                  <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row justify-content-end">
          <div class="col-sm-10"></div>
          <div class="col-sm-2">
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
        </div>



        </form>
      </div>
    </div>


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->