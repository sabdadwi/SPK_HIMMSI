<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kriteria_M');
  }

  public function index()
  {
    $data['judul'] = 'Data Kriteria';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kode'] = $this->Kriteria_M->KodeKriteria();
    $data['jumlah'] = $this->Kriteria_M->sumBobot();
    $data['kriteria'] = $this->Kriteria_M->getAllKriteria();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('kriteria/index', $data);
    $this->load->view('templates/footer');
    $this->load->view('kriteria/ubah', $data);
  }

  public function tambah()
  {
    $this->Kriteria_M->tambahKriteria();
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Data Kriteria berhasil Ditambahkan !
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>'
    );
    redirect('kriteria');
  }

  public function hapus($id)
  {
    $this->Kriteria_M->hapusKriteria($id);
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Data Kriteria berhasil Dihapus !
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>'
    );
    redirect('kriteria');
  }

  public function ubah()
  {
    $this->Kriteria_M->ubahKriteria();
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-info alert-dismissible fade show" role="alert">
    Data Kriteria berhasil Diubah !
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>'
    );
    redirect('kriteria');
  }
}
