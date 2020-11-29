<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cek_login();
    $this->load->model('Admin_M');
    $this->load->model('Menu_M');
    $this->load->model('Laporan_M');
  }

  public function index()
  {
    $data['judul'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer', $data);
  }

  public function role()
  {
    $data['judul'] = 'Kelola Pengguna';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['role'] = $this->Admin_M->getAllPengguna();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/role', $data);
    $this->load->view('templates/footer', $data);
  }

  public function role_access($role_id)
  {
    $data['judul'] = 'Kelola Pengguna';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['role'] = $this->Admin_M->getPengguna($role_id);
    $this->db->where('id !=', 1);
    $data['menu'] = $this->Menu_M->getAllMenu();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/role-access', $data);
    $this->load->view('templates/footer');
  }

  public function ubah_akses()
  {
    $this->Admin_M->ubahAkses();
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Akses Menu berhasil Diubah !
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>'
    );
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

  public function cetakLaporan()
  {
    $data['judul'] = 'Cetak Laporan';
    $data['rank'] = $this->Laporan_M->Final();

    $this->load->view('admin/cetakLaporan', $data);
  }
}
