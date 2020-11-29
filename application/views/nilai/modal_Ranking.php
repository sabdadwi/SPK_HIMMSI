<!-- Modal Tambah Pengguna-->
<?php foreach ($kecocokan as $k) : ?>
  <div class="modal fade" id="Ranking" tabindex="-1" role="dialog" aria-labelledby="forModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" id="myModalLabel2">Perankingan</h5>
        </div>
        <?= form_open_multipart('perhitungan/hasilAkhir'); ?>
        <?php foreach ($kecocokan as $k) : ?>
          <?php
          $k["kode_alternatif"];
          $k["nama"];
          // Proses Perhitungan
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
          <div class="modal-body">
            <div class="form-group">
              <input type="text" class="form-control" id="kode" name="kode[]" value="<?= $k['kode_alternatif']; ?>" required="required" readonly />
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="nama" name="nama[]" value="<?= $k['nama']; ?>" required="required" readonly>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="total" name="total[]" value="<?= $total; ?>" required="required" readonly />
            </div>
          </div>
        <?php endforeach; ?>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-round btn-primary">Rangking</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>