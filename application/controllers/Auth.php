<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_DB_query_builder $db
 * @property CI_Session $session
 * @property Auth_model $auth
 * @property form_validation $form_validation
 * @property input $input
 */

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Auth_model', 'auth');
  }
  public function index()
  {
    //cek jika sudah ada login session pada user
    if ($this->session->userdata('email')) {
      redirect('user');
    }
    //form validasi
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    //jika validasi gagal kembalikn ke halaman login
    if ($this->form_validation->run() == false) {
      $data['judul'] = 'Sistem Pakar Metode Naive Bayes';
      $this->load->view('auth/login', $data);
      //jika validasi sukses menuju ke method _login
    } else {
      $this->_login();
    }
  }
  private function _login()
  {
    //mendapatkan inputan user dari form login
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    //query ke tbl user utk mendapatkn semua data hanya satu user
    $auth = $this->auth->getUser($email);
    // cek jika user dgn email yg diinputkn ada apa tdk di tbl user
    if ($auth) {
      // cek jika usernya aktif atau sudah verifikasi apa belum
      if ($auth['is_active'] == 1) {
        // cek password yang di inputkan user dgn tbl user
        if (password_verify($password, $auth['password'])) {
          $data = [
            'email' => $auth['email'],
            'role_id' => $auth['role_id']
          ];
          //membuat session
          $this->session->set_userdata($data);
          //login berhasil alihkan ke halaman masing-masing rolenya
          if ($auth['role_id'] == 1) {
            redirect('admin');
          } else {
            redirect('home');
          }
          //password salah
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
          redirect('auth');
        }
        //Email belum diverifikasi
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum diverifiaksi!</div>');
        redirect('auth');
      }
      //email tidak terdaftar
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');
      redirect('auth');
    }
  }
  public function registrasi()
  {
      if ($this->session->userdata('email')) {
          redirect('user');
      }
  
      // Form validasi
      $this->form_validation->set_rules('name', 'Nama', 'required|trim');
      $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
          'is_unique' => 'Email ini sudah terdaftar!'
      ]);
      $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
          'matches' => 'Password tidak cocok!',
          'min_length' => 'Password terlalu pendek!'
      ]);
      $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|matches[password1]');
      $this->form_validation->set_rules('berat_badan', 'Berat Badan', 'required|numeric', [
          'numeric' => 'Harus berupa angka!'
      ]);
      $this->form_validation->set_rules('tinggi_badan', 'Tinggi Badan', 'required|numeric', [
          'numeric' => 'Harus berupa angka!'
      ]);
      $this->form_validation->set_rules('lingkar_kepala', 'Lingkar Kepala', 'required|numeric', [
          'numeric' => 'Harus berupa angka!'
      ]);
      $this->form_validation->set_rules('lingkar_lengan_atas', 'Lingkar Lengan Atas', 'required|numeric', [
          'numeric' => 'Harus berupa angka!'
      ]);
  
      if ($this->form_validation->run() == false) {
          $data['judul'] = 'Sistem Pakar Metode Naive Bayes';
          $this->load->view('auth/registrasi', $data);
      } else {
          $this->load->model('Auth_model');
          if ($this->Auth_model->daftar()) {
              $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Kamu sudah terdaftar. Silakan login.</div>');
              redirect('auth');
          } else {
              $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email sudah digunakan, coba gunakan email lain.</div>');
              redirect('auth/registrasi');
          }
      }
  }
  
  public function logout()
  {
    //hapus session email
    $this->session->unset_userdata('email');
    //hapus session role_id
    $this->session->unset_userdata('role_id');
    //pesan flashdata telah berhasil logout
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil logout!</div>');
    redirect('home');
  }
  
  public function block()
  {
    $data['judul'] = 'Akses Tidak Diizinkan!';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('auth/blocked', $data);
  }
}