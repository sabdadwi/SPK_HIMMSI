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
      <div class="col=lg-10">
        <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#submenubaru">Tambah Sub Menu Baru</a>
        <?php if (validation_errors()) : ?>
          <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
          </div>
        <?php endif; ?>

        <?= $this->session->flashdata('message'); ?>

        <table class="table table-hover table-bordered" id="submenu">
          <thead>
            <tr>
              <th scope="col" style="text-align: center">No</th>
              <th scope="col" style="text-align: center">Sub Menu</th>
              <th scope="col" style="text-align: center">Menu</th>
              <th scope="col" style="text-align: center">Url</th>
              <th scope="col" style="text-align: center">Icon</th>
              <th scope="col" style="text-align: center">Aktif</th>
              <th scope="col" style="text-align: center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($submenu as $sm) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $sm['sub_menu']; ?></td>
                <td><?= $sm['menu']; ?></td>
                <td><?= $sm['url']; ?></td>
                <td><?= $sm['icon']; ?></td>
                <td><?= $sm['is_active']; ?></td>
                <td>
                  <a href="" class="badge badge-success" data-toggle="modal" data-target=".ubahSubMenu<?= $sm['id']; ?>">Ubah</a>
                  <a href="<?= base_url('menu/hapusSub/') . $sm['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin akan menghapus data menu?');">Hapus</a>
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
<div class=" modal fade" id="submenubaru" tabindex="-1" role="dialog" aria-labelledby="submenubaruLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="submenubaruLabel">Tambahkan Sub Menu Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/tambahsub'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="submenu" name="submenu" placeholder="Nama Sub Menu">
          </div>
          <div class="form-group">
            <select name="menu_id" id="menu_id" class="form-control">
              <option value="">-- Pilih Menu --</option>
              <?php foreach ($menu as $m) : ?>
                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="url" name="url" placeholder="Alamat URL">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="icon" name="icon" placeholder="Class Icon FA">
          </div>
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="checkbox" aria-label="is_active" name="is_active" id="is_active" value="1" checked>
                </div>
              </div>
              <input type="text" class="form-control" aria-label="is_active" placeholder="Aktif" readonly>
            </div>
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