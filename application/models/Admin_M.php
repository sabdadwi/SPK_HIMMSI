<?php

class Admin_M extends CI_model
{
  public function getAllPengguna()
  {
    return $this->db->get('user_role')->result_array();
  }
  public function getPengguna($role_Id)
  {
    return $this->db->get_where('user_role', ['id' => $role_Id])->row_array();
  }

  public function ubahAkses()
  {
    $menu_id = $this->input->post('menuId');
    $role_id = $this->input->post('roleId');

    $data = [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ];

    $result = $this->db->get_where('user_access_menu', $data);
    if ($result->num_rows() < 1) {
      $this->db->insert('user_access_menu', $data);
    } else {
      $this->db->delete('user_access_menu', $data);
    }
  }
}
