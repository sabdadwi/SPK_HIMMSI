<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panitia extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cek_login();
    $this->load->model('Panitia_M');
    $this->load->model('Laporan_M');
  }

  public function index()
  {
    $data['judul'] = 'My Profile';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('panitia/index', $data);
    $this->load->view('templates/footer', $data);
  }

  public function edit()
  {
    $data['judul'] = 'Ubah Profile';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
      'required' => 'Nama Lengkap Harus Diisi'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('panitia/ubah-profile', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $this->Panitia_M->ubahProfil($data);
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Akun berhasil diubah !!!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div> 
   '
      );
      redirect('panitia');
    }
  }

  public function ubahpassword()
  {
    $data['judul'] = 'Ubah Password';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim', [
      'required' => 'Password Harus Diisi'
    ]);
    $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|min_length[4]|matches[password_baru2]', [
      'required' => 'Password Harus Diisi',
      'min_length' => 'Password Min 4 karakter',
      'matches' => 'Password tidak sama'
    ]);
    $this->form_validation->set_rules('password_baru2', 'Konfirmasi Password', 'required|trim|min_length[4]|matches[password_baru]', [
      'matches' => 'Password tidak sama',
      'min_length' => 'Password Min 4 karakter'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('panitia/ubah-password', $data);
      $this->load->view('templates/footer');
    } else {
      $pass_lama = $this->input->post('password_lama');
      $pass_baru = $this->input->post('password_baru');

      if (!password_verify($pass_lama, $data['user']['password'])) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              Password Lama Salah !!!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>'
        );
        redirect('panitia/ubahpassword');
      } else {
        if ($pass_lama == $pass_baru) {
          $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Password baru tidak boleh sama dengan password lama !!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>'
          );
          redirect('panitia/ubahpassword');
        } else {
          // Password sudah lolos
          $acak_pass = password_hash($pass_baru, PASSWORD_DEFAULT);
          $this->Panitia_M->ubahPassword($acak_pass);

          $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Password Berhasil Diubah !!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>'
          );
          redirect('panitia/ubahpassword');
        }
      }
    }
  }

  public function laporan()
  {
    $data['judul'] = 'Laporan Perankingan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['rank'] = $this->Laporan_M->Final();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/laporan', $data);
    $this->load->view('templates/footer');
  }
}
