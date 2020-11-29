<!-- Modal -->
<?php foreach ($alternatif as $a) : ?>
  <div class="modal fade ubahAlternatif<?= $a['id_alternatif']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel2">Ubah Data Kriteria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?= form_open_multipart('alternatif/ubah'); ?>
          <input type="hidden" name="id" value="<?= $a['id_alternatif']; ?>">
          <div class="form-group">
            <label for="kode">Kode Alternatif</label>
            <input type="text" class="form-control" id="kode" name="kode" value="<?= $a['kode_alternatif']; ?>" readonly>
          </div>
          <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" value="<?= $a['nim']; ?>">
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $a['nama']; ?>">
          </div>
          <div class="form-group">
            <?php if ($a['jenkel'] == "Laki-laki") : ?>
              <label for="jenkel">Jenis Kelamin</label>
              <select name="jenkel" id="jenkel">
                <option value="">-- Pilih --</option>
                <option value="Laki-laki" selected> Laki-Laki</option>
                <option value="Perempuan"> Perempuan</option>
              </select>
            <?php else : ?>
              <label for="jenkel">Jenis Kelamin</label>
              <select name="jenkel" id="jenkel">
                <option value="">-- Pilih --</option>
                <option value="Laki-laki"> Laki-Laki</option>
                <option value="Perempuan" selected> Perempuan</option>
              </select>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="prodi">Prodi</label>
            <?php if ($a['prodi'] == "Sistem Informasi") : ?>
              <div class="icheck-primary d-inline ml-2">
                <input type="radio" id="radio1" name="prodi" value="Sistem Informasi" checked>
                <label for="radio1">
                  Sistem Informasi
                </label>
              </div>
              <div class="icheck-primary d-inline ml-2">
                <input type="radio" id="radio2" name="prodi" value="Manajemen Informatika">
                <label for="radio2">
                  Manajemen Informatika
                </label>
              </div>
            <?php else : ?>
              <div class="icheck-primary d-inline ml-2">
                <input type="radio" id="radio1" name="prodi" value="Sistem Informasi">
                <label for="radio1">
                  Sistem Informasi
                </label>
              </div>
              <div class="icheck-primary d-inline ml-2">
                <input type="radio" id="radio2" name="prodi" value="Manajemen Informatika" checked>
                <label for="radio2">
                  Manajemen Informatika
                </label>
              </div>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="email">Email <small>(Gunakan Email Amikom)</small></label>
            <input type="text" class="form-control" id="email" name="email" value="<?= $a['email']; ?>">
          </div>
          <div class="form-group">
            <label for="gambar">Upload Foto</label>
            <div class="col-sm-3">
              <img src="<?= base_url('assets/dist/img/profile_alternatif/') . $a['foto']; ?>" class="img-thumbnail">
            </div>
            <div class="col-sm-9">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                <label class="custom-file-label" for="gambar">Pilih Gambar</label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<script>
  $('.custom-file-input').on('change', function() {
    let filename = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(filename);
  });
</script>