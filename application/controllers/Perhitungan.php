<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perhitungan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Nilai_M');
    $this->load->model('Kriteria_M');
    $this->load->model('Perhitungan_M');
    $this->load->model('Laporan_M');
  }

  public function kecocokan()
  {
    $data['judul'] = 'Rating Kecocokan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['penilaian'] = $this->Nilai_M->QueryJoinNilaiAlternatif();
    $data['kriteria'] = $this->Kriteria_M->getAllKriteria();
    $data['kecocokan'] = $this->Perhitungan_M->JoinKecocokanAlternatif();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('kecocokan/index', $data);
    $this->load->view('templates/footer');
  }

  public function normalisasi()
  {
    $data['judul'] = 'Normalisasi';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kecocokan'] = $this->Perhitungan_M->JoinKecocokanAlternatif();

    // ? dapatkan nilai terbesar/terkecil tergantung attribut kriterianya 
    $data['maxC1'] = $this->Perhitungan_M->MaxC1();
    $data['minC2'] = $this->Perhitungan_M->MinC2(); // ini min karena dia cost
    $data['maxC3'] = $this->Perhitungan_M->MaxC3();
    $data['maxC4'] = $this->Perhitungan_M->MaxC4();
    $data['maxC5'] = $this->Perhitungan_M->MaxC5();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('nilai/normalisasi', $data);
    $this->load->view('templates/footer');
  }

  public function perankingan()
  {
    $data['judul'] = 'Hasil Perankingan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kecocokan'] = $this->Perhitungan_M->JoinKecocokanAlternatif();

    // ? dapatkan nilai terbesar/terkecil tergantung attribut kriterianya 
    $data['maxC1'] = $this->Perhitungan_M->MaxC1();
    $data['minC2'] = $this->Perhitungan_M->MinC2(); // ini min karena dia cost
    $data['maxC3'] = $this->Perhitungan_M->MaxC3();
    $data['maxC4'] = $this->Perhitungan_M->MaxC4();
    $data['maxC5'] = $this->Perhitungan_M->MaxC5();

    //? Dapatkan bobot masing-masing kriteria untuk melakukan proses perhitungan dan perankingan.
    $data['bobotC1'] = $this->Perhitungan_M->bobotC1();
    $data['bobotC2'] = $this->Perhitungan_M->bobotC2();
    $data['bobotC3'] = $this->Perhitungan_M->bobotC3();
    $data['bobotC4'] = $this->Perhitungan_M->bobotC4();
    $data['bobotC5'] = $this->Perhitungan_M->bobotC5();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('nilai/perankingan', $data);
    $this->load->view('nilai/modal_Ranking', $data);
    $this->load->view('templates/footer');
  }

  public function hasilAkhir()
  {
    $this->Laporan_M->resetRanking();
    $this->Laporan_M->inputRanking();
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Dirangking!</div>');
    redirect('admin/laporan');
  }
}
