<?php

class Auth_M extends CI_model
{
  // Registrasi
  // role id otomatis jadi panitia
  public function registrasi()
  {
    $data = [
      'nama_user' => htmlspecialchars($this->input->post('name', true)),
      'email' => htmlspecialchars($this->input->post('email', true)),
      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      'foto' => 'default.php',
      'role_id' => 2,
      'date_created' => time()
    ];
    $this->db->insert('user', $data);
  }
}
