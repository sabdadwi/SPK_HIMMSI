<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cek_login();
    $this->load->model('Menu_M');
  }

  public function index()
  {
    $data['judul'] = 'Pengaturan Menu';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['menu'] = $this->Menu_M->getAllMenu();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('Menu/index', $data);
    $this->load->view('templates/footer');
    $this->load->view('Menu/ubah', $data);
  }

  public function tambah()
  {
    $this->form_validation->set_rules('menu', 'Menu', 'required', [
      'required' => 'Menu Harus Diisi'
    ]);

    if ($this->form_validation->run() == false) {
      $data['judul'] = 'Pengaturan Menu';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $data['menu'] = $this->Menu_M->getAllMenu();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('Menu/index', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Menu_M->tambahMenu();
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Menu berhasil Ditambahkan !
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>'
      );
      redirect('menu');
    }
  }

  public function ubah()
  {
    $this->Menu_M->ubahMenu();
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Menu berhasil Diubah !
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>'
    );
    redirect('menu');
  }

  public function hapus($id)
  {
    $this->Menu_M->hapusMenu($id);
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Menu berhasil Dihapus !
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>'
    );
    redirect('menu');
  }

  // Sub-Menu
  public function submenu()
  {
    $data['judul'] = 'Pengaturan Sub Menu';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['menu'] = $this->Menu_M->getAllMenu();
    $data['submenu'] = $this->Menu_M->getAllsubMenu();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('Menu/submenu', $data);
    $this->load->view('templates/footer');
    $this->load->view('Menu/ubahsub', $data);
  }

  public function tambahsub()
  {
    $this->form_validation->set_rules('submenu', 'Sub Menu', 'required', [
      'required' => 'Sub Menu Harus Diisi'
    ]);
    $this->form_validation->set_rules('menu_id', 'Menu', 'required', [
      'required' => 'Menu Id Harus Diisi'
    ]);
    $this->form_validation->set_rules('url', 'Url', 'required', [
      'required' => 'Alamat URL Harus Diisi'
    ]);
    $this->form_validation->set_rules('icon', 'Icon', 'required', [
      'required' => 'Class icon Harus Diisi'
    ]);

    if ($this->form_validation->run() == false) {
      $data['judul'] = 'Pengaturan Sub Menu';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $data['menu'] = $this->Menu_M->getAllMenu();
      $data['submenu'] = $this->Menu_M->getAllsubMenu();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('Menu/submenu', $data);
      $this->load->view('templates/footer');
      $this->load->view('Menu/ubahsub', $data);
    } else {
      $this->Menu_M->tambahSubMenu();
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Sub Menu berhasil Ditambahkan !
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>'
      );
      redirect('menu/submenu');
    }
  }

  public function ubahsub()
  {
    $this->Menu_M->ubahSubMenu();
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Sub Menu berhasil Diubah !
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>'
    );
    redirect('menu/submenu');
  }

  public function hapusSub($id)
  {
    $this->Menu_M->hapusSubMenu($id);
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Sub Menu berhasil Dihapus !
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>'
    );
    redirect('menu/submenu');
  }
}
