<?php

class Menu_M extends CI_model
{
  public function getAllMenu()
  {
    return $this->db->get('user_menu')->result_array();
  }


  public function tambahMenu()
  {
    $data = [
      'menu' => $this->input->post('menu')
    ];
    $this->db->insert('user_menu', $data);
  }

  public function ubahMenu()
  {
    $id = $this->input->post('id');
    $data = ['menu' => $this->input->post('menu')];
    $this->db->where('id', $id);
    $this->db->update('user_menu', $data);
  }

  public function hapusMenu($id)
  {
    $this->db->delete('user_menu', ['id' => $id]);
  }

  // Sub Menu
  public function getAllSubMenu()
  {
    $query = "SELECT `user_sub_menu`.*,`user_menu`.`menu`
             FROM `user_sub_menu` JOIN `user_menu`
             ON `user_sub_menu`.`menu_id`=`user_menu`.`id`
    ";
    return $this->db->query($query)->result_array();
  }

  public function tambahsubmenu()
  {
    $data = [
      'menu_id' => $this->input->post('menu_id'),
      'sub_menu' => $this->input->post('submenu'),
      'url' => $this->input->post('url'),
      'icon' => $this->input->post('icon'),
      'is_active' => $this->input->post('is_active')
    ];
    $this->db->insert('user_sub_menu', $data);
  }

  public function ubahSubMenu()
  {
    $id = $this->input->post('id');
    $data = [
      'menu_id' => $this->input->post('menu_id'),
      'sub_menu' => $this->input->post('submenu'),
      'url' => $this->input->post('url'),
      'icon' => $this->input->post('icon'),
      'is_active' => $this->input->post('is_active')
    ];
    $this->db->where('id', $id);
    $this->db->update('user_sub_menu', $data);
  }

  public function hapusSubMenu($id)
  {
    $this->db->delete('user_sub_menu', ['id' => $id]);
  }
}
