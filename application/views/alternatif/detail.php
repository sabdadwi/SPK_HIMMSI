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
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="<?= base_url('assets/dist/img/profile_alternatif/') . $alternatif['foto']; ?>" class="card-img">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Detail Alternatif</h5> <br>
            <table>
              <tr>
                <td><label>Kode</label></td>
                <td>:</td>
                <td><?= $alternatif['kode_alternatif']; ?></td>
              </tr>
              <tr>
                <td><label>Nama</label></td>
                <td>:</td>
                <td><?= $alternatif['nama']; ?></td>
              </tr>
              <tr>
                <td><label>Nim</label></td>
                <td>:</td>
                <td><?= $alternatif['nim']; ?></td>
              </tr>
              <tr>
                <td><label>Prodi</label></td>
                <td>:</td>
                <td><?= $alternatif['prodi']; ?></td>
              </tr>
              <tr>
                <td><label>Jenis Kelamin</label></td>
                <td>:</td>
                <td><?= $alternatif['jenkel']; ?></td>
              </tr>
              <tr>
                <td><label>Email</label></td>
                <td>:</td>
                <td><?= $alternatif['email']; ?></td>
              </tr>
            </table>
            <br>
            <div class="row pl-3">
              <a href="<?= base_url('alternatif'); ?>" class="btn btn-primary">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>



  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->