<?php

function cek_login()
{
  // Cek apakah sudah Login
  // Buat instansiasi CI untuk menggantikkan $this, Helper tidak mengenal this
  $help = get_instance();
  if (!$help->session->userdata('email')) {
    redirect('auth');
  } else {
    // dapatkan role dari session
    $role_id = $help->session->userdata('role_id');
    // ambil uri urutan ke n
    $menu = $help->uri->segment(1);

    // Query untuk mendapatkan menu dan idnya
    $queryMenu = $help->db->get_where('user_menu', ['menu' => $menu])->row_array();

    // Mendapatkan Idnya
    $menuId = $queryMenu['id'];

    // Query user accessnya
    $queryAcess = $help->db->get_where('user_access_menu', [
      'role_id' => $role_id,
      'menu_id' => $menuId
    ]);

    // Jika tidak ada akses, arahkan ke halaman blocked
    if ($queryAcess->num_rows() < 1) {
      redirect('auth/blocked');
    }
  }
}
