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

        <table id="tabelLaporan" class="table table-bordered  table-hover">
          <thead>
            <tr>
              <th>Peringkat</th>
              <!-- <th>Kode</th> -->
              <th>Nama</th>
              <th>Total Nilai</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($rank as $r) : ?>
              <tr>
                <td><?= $i; ?></td>
                <!-- <td><?= $r['kode']; ?></td> -->
                <td><?= $r['nama']; ?></td>
                <td><?= $r['total']; ?></td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>

        <div class="col mt-3">
          <a href="<?= base_url('admin/cetakLaporan'); ?>" class="btn btn-default"><i class="fas fa-print"> Cetak Laporan</i></a>
        </div>
      </div>
    </div>


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->