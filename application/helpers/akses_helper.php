<?php

// Cek akses pada role access


function cek_akses($role_id, $menu_id)
{
  // instansiasi
  $ci = get_instance();

  $result = $ci->db->get_where('user_access_menu', [
    'role_id' => $role_id,
    'menu_id' => $menu_id
  ]);

  if ($result->num_rows() > 0) {
    return "checked='checked'";
  }
}
