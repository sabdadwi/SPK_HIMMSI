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
              <th>Total Nilai</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($kecocokan as $k) : ?>
              <tr>
                <td><?= $i; ?></td>
                <td><?= $k['kode_alternatif']; ?></td>
                <td><?= $k['nama']; ?></td>
                <!-- Proses Perhitungan tiap kriteria -->
                <?php
                $n1 = round($k['C1'] / $maxC1['C1'], 2) * $bobotC1['bobot'];
                $n2 = round($minC2['C2'] / $k['C2'], 2) * $bobotC2['bobot'];
                $n3 = round($k['C3'] / $maxC3['C3'], 2) * $bobotC3['bobot'];
                $n4 = round($k['C4'] / $maxC4['C4'], 2) * $bobotC4['bobot'];
                $n5 = round($k['C5'] / $maxC5['C5'], 2) * $bobotC5['bobot'];
                ?>
                <?php
                $totalNilai = [$n1, $n2, $n3, $n4, $n5];
                $total = round(array_sum($totalNilai), 1);
                ?>
                <td><?= $total; ?></td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
        <a href="" data-toggle="modal" data-target="#Ranking" class="btn btn-primary mt-3">Tampilkan Ranking</a>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->