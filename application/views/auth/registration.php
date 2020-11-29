<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="<?= base_url('auth/registration'); ?>"><b>Admin</b>SPK</a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new account</p>

        <form action="<?= base_url('auth/registration'); ?>" method="post">
          <!-- Nama -->
          <!-- jika ada error -->
          <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="<?= set_value('name'); ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>

          <!-- Email -->
          <!-- jika ada error -->
          <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <!-- Password 1 -->
          <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <!-- Password 2 -->
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Ulangi Password" name="password2">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
            </div>
            <!-- /.col -->
            <div class="col-6">
              <button type="submit" class="btn btn-primary btn-block">Daftar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="<?= base_url('auth'); ?>" class="btn btn-block btn-info">
            <i class="fas fa-sign-in-alt"></i>
            Sudah Punya Akun ?
          </a>
        </div>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->