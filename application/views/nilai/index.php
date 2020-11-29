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

        <?= $this->session->flashdata('message'); ?>

        <table id="tabelKriteria" class="table table-bordered  table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Alternatif</th>
              <th>Nama Alternatif</th>
              <?php foreach ($kriteria as $k) : ?>
                <th><?= $k['nama_kriteria']; ?></th>
              <?php endforeach; ?>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($penilaian as $n) : ?>
              <tr>
                <td><?= $i; ?></td>
                <td><?= $n['kode_alternatif']; ?></td>
                <td><?= $n['nama']; ?></td>
                <td><?= $n['C1']; ?></td>
                <td><?= $n['C2']; ?></td>
                <td><?= $n['C3']; ?></td>
                <td><?= $n['C4']; ?></td>
                <td><?= $n['C5']; ?></td>
                <td>
                  <a href="" data-toggle="modal" data-target=".Penilaian<?= $n['id_nilai']; ?>" class="badge badge-success"><i class="fas fa-fw fa-edit"></i> Penilaian</a>
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