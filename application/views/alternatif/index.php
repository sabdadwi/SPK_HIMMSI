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
      <div class="col lg-10">

        <a href="" class="btn btn-primary " data-toggle="modal" data-target="#Alternatifbaru">
          <i class="fas fa-plus"></i> Tambah Alternatif Baru</a>

        <?= $this->session->flashdata('message'); ?>
        <?= form_error('nim', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= form_error('nama', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <table id="tabelAlternatif" class="table table-bordered table-hover">
          <thead style="text-align: center">
            <tr class="table-primary">
              <th>No</th>
              <th style="width: 10px">Kode Alternatif</th>
              <th>Foto</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Prodi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($alternatif as $a) : ?>
              <tr>
                <td><?= $i; ?></td>
                <td><?= $a['kode_alternatif']; ?></td>
                <td>
                  <img width="75px" src="<?= base_url('assets/dist/img/profile_alternatif/') . $a['foto'] ?>" alt="<?= $a['foto']; ?>">
                </td>
                <td><?= $a['nim']; ?></td>
                <td><?= $a['nama']; ?></td>
                <td><?= $a['email']; ?></td>
                <td><?= $a['prodi']; ?></td>
                <td>
                  <!-- Detail -->
                  <a href="<?= base_url('alternatif/detail/') . $a['id_alternatif']; ?>" class="badge badge-info"><i class="fas fa-fw fa-info"></i> Detail</a>
                  <!-- Ubah -->
                  <a href="" data-toggle="modal" data-target=".ubahAlternatif<?= $a['id_alternatif']; ?>" class="badge badge-success"><i class="fas fa-fw fa-edit"></i> Ubah</a>
                  <!-- Hapus -->
                  <a href="<?= base_url('alternatif/hapus/') . $a['id_alternatif']; ?>" onclick="return confirm('Data Alternatif Akan Dihapus');" class="badge badge-danger"><i class="fas fa-fw fa-trash-alt"></i> Hapus</a>
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
<div class=" modal fade" id="Alternatifbaru" tabindex="-1" role="dialog" aria-labelledby="AlternatifbaruLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AlternatifbaruLabel">Tambahkan Alternatif Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('alternatif/tambah'); ?>
      <div class="modal-body">
        <div class="form-group">
          <label for="kode">Kode Alternatif</label>
          <input type="text" class="form-control" id="kode" name="kode" value="<?= $kode; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="nim">NIM <small>(ex:19.12.1234)</small></label>
          <input type="text" class="form-control" id="nim" name="nim">
        </div>
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="form-group">
          <label for="jenkel">Jenis Kelamin</label>
          <select name="jenkel" id="jenkel">
            <option value="">-- Pilih --</option>
            <option value="Laki-laki"> Laki-Laki</option>
            <option value="Perempuan"> Perempuan</option>
          </select>
        </div>
        <div class="form-group">
          <label>Prodi : </label>
          <div class="icheck-primary d-inline ml-2">
            <input type="radio" id="radioPrimary3" name="prodi" value="Sistem Informasi">
            <label for="radioPrimary3">
              Sistem Informasi
            </label>
          </div>
          <div class="icheck-primary d-inline ml-2">
            <input type="radio" id="radioPrimary2" name="prodi" value="Manajemen Informatika">
            <label for="radioPrimary2">
              Manajemen Informatika
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="email">Email <small>(Gunakan Email Amikom)</small></label>
          <input type="text" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
          <label for="gambar">Upload Foto</label>
          <div class="col-sm-9">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="gambar" name="gambar">
              <label class="custom-file-label" for="gambar">Pilih Gambar</label>
            </div>
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