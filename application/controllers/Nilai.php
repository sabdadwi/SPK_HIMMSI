<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Nilai_M');
    $this->load->model('Kriteria_M');
  }
  public function index()
  {
    $data['judul'] = 'Nilai Alternatif';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['penilaian'] = $this->Nilai_M->QueryJoinNilaiAlternatif();
    $data['kriteria'] = $this->Kriteria_M->getAllKriteria();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('nilai/index', $data);
    $this->load->view('templates/footer');
    $this->load->view('nilai/penilaian', $data);
  }

  public function penilaianAlternatif()
  {
    $this->Nilai_M->NilaiAternatif();
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Penilaian Alternatif Berhasil!</div>');
    redirect('nilai');
  }
}
