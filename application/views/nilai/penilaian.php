<?php foreach ($penilaian as $p) : ?>
  <div class="modal fade Penilaian<?= $p['id_nilai']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel2">Masukkan Penilaian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('nilai/penilaianAlternatif'); ?>" method="post">
            <input type="hidden" name="id_nilai" value="<?= $p['id_nilai']; ?>">
            <input type="hidden" name="id_alternatif" value="<?= $p['id_alternatif']; ?>">
            <div class="form-group">
              <select class="form-control" id="C1" name="C1" value="<?= $a['C1']; ?>">
                <option>-Keaktifan-</option>
                <option>Bagus</option>
                <option>Cukup</option>
                <option>Kurang</option>
              </select>
            </div>
            <div class="form-group">
              <select class="form-control" id="C2" name="C2" value="<?= $a['C2']; ?>">
                <option>-Semester-</option>
                <option>Bagus</option>
                <option>Cukup</option>
                <option>Kurang</option>
              </select>
            </div>
            <div class="form-group">
              <select class="form-control" id="C3" name="C3" value="<?= $a['C3']; ?>">
                <option>-IPK-</option>
                <option>Bagus</option>
                <option>Cukup</option>
                <option>Kurang</option>
              </select>
            </div>
            <div class="form-group">
              <select class="form-control" id="C4" name="C4" value="<?= $a['C4']; ?>">
                <option>-Riwayat Organisasi-</option>
                <option>Bagus</option>
                <option>Cukup</option>
                <option>Kurang</option>
              </select>
            </div>
            <div class="form-group">
              <select class="form-control" id="C5" name="C5" value="<?= $a['C5']; ?>">
                <option>-Prestasi-</option>
                <option>Bagus</option>
                <option>Cukup</option>
                <option>Kurang</option>
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>