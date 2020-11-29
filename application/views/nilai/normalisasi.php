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

        <table id="tabelNormalisasi" class="table table-bordered  table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Alternatif</th>
              <th>Nama Alternatif</th>
              <th>C1</th>
              <th>C2</th>
              <th>C3</th>
              <th>C4</th>
              <th>C5</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($kecocokan as $k) : ?>
              <tr>
                <td><?= $i; ?></td>
                <td><?= $k['kode_alternatif']; ?></td>
                <td><?= $k['nama']; ?></td>
                <!-- Pakai round biar ada 2 angka dibelakang koma. -->
                <td><?= round($k['C1'] / $maxC1['C1'], 2); ?></td>
                <td><?= round($minC2['C2'] / $k['C2'], 2); ?></td>
                <td><?= round($k['C3'] / $maxC3['C3'], 2); ?></td>
                <td><?= round($k['C4'] / $maxC4['C4'], 2); ?></td>
                <td><?= round($k['C5'] / $maxC5['C5'], 2); ?></td>
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