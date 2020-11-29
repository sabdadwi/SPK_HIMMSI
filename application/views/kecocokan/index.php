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
        <table id="tabelKecocokan" class="table table-bordered  table-hover">
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
                <td><?= $k['C1']; ?></td>
                <td><?= $k['C2']; ?></td>
                <td><?= $k['C3']; ?></td>
                <td><?= $k['C4']; ?></td>
                <td><?= $k['C5']; ?></td>
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