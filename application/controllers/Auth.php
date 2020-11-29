<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Auth_M');
  }

  public function index()
  {
    if ($this->session->userdata('email')) {
      redirect('panitia');
    }
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
      'required' => 'Email Harus Diisi',
      'valid_email' => 'Email Harus Valid'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'trim|required', [
      'required' => 'Password Harus diisi'
    ]);

    if ($this->form_validation->run() == false) {
      # Jika validasi login gagal
      $data['judul'] = 'Halaman Login';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    // usernya ada
    if ($user) {
      // Cek password
      if (password_verify($password, $user['password'])) {
        // Jika Password Benar
        $data = [
          'email' => $user['email'],
          'role_id' => $user['role_id']
        ];
        $this->session->set_userdata($data);
        if ($user['role_id'] == 1) {
          redirect('Admin');
        } else {
          redirect('Panitia');
        }
      } else {
        // Jika Password Salah
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Password Salah !
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div> '
        );
        redirect('auth');
      }
    } else {
      // User tidak ada
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Email tidak terdaftar
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div> '
      );
      redirect('auth');
    }
  }

  public function registration()
  {
    if ($this->session->userdata('email')) {
      redirect('panitia');
    }

    // set rules untuk validasi
    $this->form_validation->set_rules('name', 'Nama', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'Email sudah digunakan'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|matches[password2]', [
      'matches' => 'Password tidak sama',
      'min_length' => 'Password Min 4 karakter'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

    if ($this->form_validation->run() == false) {
      // Jika validasi registrasi gagal
      $data['judul'] = 'Halaman Registrasi';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registration');
      $this->load->view('templates/auth_footer');
    } else {
      # Jika validasi beerhasil
      $this->Auth_M->registrasi();
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Akun berhasil dibuat !, monggo login
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div> 
   '
      );
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-info alert-dismissible fade show" role="alert">
      Anda telah keluar
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div> '
    );
    redirect('auth');
  }

  public function blocked()
  {
    $this->load->view('auth/blocked');
  }
}
