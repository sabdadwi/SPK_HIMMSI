<?php
defined('BASEPATH') or exit('No direct script access allowed');
// TODO : Buat Fungsi Update 
class Alternatif extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Alternatif_M');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['judul'] = 'Data Alternatif';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['alternatif'] = $this->Alternatif_M->getAllAlternatif();
    $data['kode'] = $this->Alternatif_M->KodeAlternatif();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('alternatif/index', $data);
    $this->load->view('templates/footer');
    $this->load->view('alternatif/ubah', $data);
  }

  public function detail($id)
  {
    $data['judul'] = 'Data Alternatif';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['alternatif'] = $this->Alternatif_M->getAlternatifId($id);


    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('alternatif/detail', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $this->form_validation->set_rules('nim', 'NIM', 'required|exact_length[10]|is_unique[alternatif.nim]', [
      'is_unique' => 'NIM sudah digunakan untuk data Alternatif yang lain',
      'required' => 'NIM Harus diisi',
      'exact_length' => 'NIM harus 10 digit'
    ]);
    $this->form_validation->set_rules('nama', 'Nama', 'required', [
      'required' => 'Nama Harus diisi'
    ]);
    $this->form_validation->set_rules('email', 'Email', 'required|regex_match[/students.amikom.ac.id/]', [
      'required' => 'Email Harus diisi',
      'regex_match' => 'Gunakan Email Students AMIKOM'
    ]);

    if ($this->form_validation->run() == false) {
      $data['judul'] = 'Data Alternatif';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['alternatif'] = $this->Alternatif_M->getAllAlternatif();
      $data['kode'] = $this->Alternatif_M->KodeAlternatif();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('alternatif/index', $data);
      $this->load->view('templates/footer', $data);
    } else {
      // * Cek Gambar yang akan diupload
      $gambar = $_FILES['gambar']['name'];
      if ($gambar) {
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '4096'; // Max 4MB
        $config['overwrite'] = true; //! Agar file gambar bisa di replace
        $config['upload_path'] = './assets/dist/img/profile_alternatif/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
          $this->Alternatif_M->tambahAlternatif();
          $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Data Alternatif berhasil Ditambahkan !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
          );
          redirect('alternatif');
        } else {
          echo $this->upload->display_errors();
        }
      } else {
        echo $this->upload->display_errors();
      }

      $this->Alternatif_M->tambahAlternatif();
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data Alternatif berhasil Ditambahkan !
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>'
      );
      redirect('alternatif');
    }
  }

  public function ubah()
  {
    // ! Cek Gambar yang akan diupload
    $gambar = $_FILES['gambar']['name'];
    if ($gambar) {
      $config['allowed_types'] = 'jpeg|jpg|png';
      $config['max_size'] = '4096'; // Max 4MB
      $config['upload_path'] = './assets/dist/img/profile_alternatif/';

      $this->load->library('upload', $config);
      if ($this->upload->do_upload('gambar')) {
        $fotobaru = $this->upload->data('file_name');
        $this->db->set('foto', $fotobaru);
      } else {
        echo $this->upload->display_errors();
      }
    }

    $this->Alternatif_M->ubahAlternatif();
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Alternatif berhasil Diubah !
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>'
    );
    redirect('alternatif');
  }

  public function hapus($id)
  {
    $this->Alternatif_M->hapusAlternatif($id);
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Alternatif berhasil Dihapus !
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>'
    );
    redirect('alternatif');
  }
}
