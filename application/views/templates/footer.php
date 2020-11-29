    <!-- Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2020 - <?= date('Y'); ?> <a href="http://osnofla.tech">Osnofla.tech</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url('vendor'); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('vendor'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('vendor'); ?>/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('vendor'); ?>/dist/js/demo.js"></script>

    <!-- Bootstrap4 Duallistbox -->
    <script src="<?= base_url('vendor'); ?>/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url('vendor'); ?>/plugins/select2/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="<?= base_url('vendor'); ?>/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url('vendor'); ?>/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url('vendor'); ?>/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?= base_url('vendor'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <!-- page script -->
    <script>
      $(function() {
        $("#tabelKriteria").DataTable({
          "paging": false,
          // atur banyak data yang ditampilkan
          "pageLength": 10,
          "lengthChange": false,
          "autoWidth": false,
          "ordering": false
        });
        // Tabel Sub Menu
        $("#submenu").DataTable({
          "ordering": false,
          "paging": true,
          "pageLength": 5,
          "lengthChange": false,
        });
        $('#tabelAlternatif').DataTable({
          "paging": true,
          "ordering": false,
          "info": true,
          "autoWidth": true,
        });
        $('#tabelLaporan').DataTable({
          "paging": false,
          "searching": false,
          "ordering": false,
          "info": true,
          "autoWidth": true,
        });
        $('#tabelKecocokan').DataTable({
          "paging": false,
          "searching": false,
          "ordering": false,
          "info": true,
          "autoWidth": true,
        });
        $('#tabelNormalisasi').DataTable({
          "paging": false,
          "searching": false,
          "ordering": false,
          "info": true,
          "autoWidth": true,
        });

      });
    </script>

    <script>
      $('.custom-file-input').on('change', function() {
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(filename);
      });


      $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
          url: "<?= base_url('admin/ubah_akses'); ?>",
          type: 'post',
          data: {
            menuId: menuId,
            roleId: roleId
          },
          success: function() {
            document.location.href = "<?= base_url('admin/role_access/'); ?>" + roleId;
          }
        });
      });
    </script>
    </body>

    </html>
    <!-- /.Footer -->