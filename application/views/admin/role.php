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
    <div class="row pl-3">
      <div class="col-lg-8">
        <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#penggunabaru"><i class="fas fa-plus"></i> Tambah Pengguna Baru</a>

        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>

        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Pengguna</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($role as $r) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $r['role']; ?></td>
                <td>
                  <a href="<?= base_url('admin/role_access/') . $r['id']; ?>" class="badge badge-info"><i class="fas fa-fw fa-user-check"></i> Akses</a>
                  <a href="" class="badge badge-success" data-toggle="modal" data-target=".ubahRole<?= $r['id']; ?>"><i class="fas fa-fw fa-edit"></i> Ubah</a>
                  <a href="<?= base_url('menu/hapus/') . $r['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin akan menghapus data Pengguna?');"><i class="fas fa-fw fa-trash-alt"></i> Hapus</a>
                </td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modalnya -->


<!-- Modal -->
<div class=" modal fade" id="penggunabaru" tabindex="-1" role="dialog" aria-labelledby="penggunabaruLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="penggunabaruLabel">Tambahkan Pengguna Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/role'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="role" name="role" placeholder="Nama role">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>