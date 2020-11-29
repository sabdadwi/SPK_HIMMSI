<?php foreach ($menu as $m) : ?>
  <div class="modal fade ubahMenu<?= $m['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel2">Ubah Data Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('menu/ubah'); ?>" method="post">
            <input type="hidden" name="id" value="<?= $m['id']; ?>">
            <div class="form-group">
              <input type="text" class="form-control" id="menu" name="menu" value="<?= $m['menu']; ?>">
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