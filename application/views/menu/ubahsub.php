<?php foreach ($submenu as $sm) : ?>
  <div class="modal fade ubahSubMenu<?= $sm['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel2">Ubah Data Sub Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <form action="<?= base_url('menu/ubahsub'); ?>" method="post">
              <input type="hidden" name="id" value="<?= $sm['id']; ?>">
              <input type="text" class="form-control" id="submenu" name="submenu" value="<?= $sm['sub_menu']; ?>">
          </div>
          <div class="form-group">
            <select name="menu_id" id="menu_id" class="form-control">
              <option value="<?= $sm['menu_id']; ?>"><?= $sm['menu']; ?></option>
              <?php foreach ($menu as $m) : ?>
                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="url" name="url" placeholder="Alamat URL" value="<?= $sm['url']; ?>">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="icon" name="icon" placeholder="Class Icon FA" value="<?= $sm['icon']; ?>">
          </div>
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <?php if ($sm['is_active'] == 1) : ?>
                    <input type="checkbox" aria-label="is_active" name="is_active" id="is_active" value="1" checked>
                  <?php else : ?>
                    <input type="checkbox" aria-label="is_active" name="is_active" id="is_active" value="1">
                  <?php endif; ?>
                </div>
              </div>
              <input type="text" class="form-control" aria-label="is_active" placeholder="Aktif" readonly>
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