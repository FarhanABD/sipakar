<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_DB_query_builder $db
 * @property CI_Session $session
 * @property Auth_model $auth
 * @property form_validation $form_validation
 * @property input $input
 * @property Admin_model $admin
 */

class Gejala extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model', 'admin');
    if (!$this->session->userdata('email')) {
      // tendang ke auth/login page
      redirect('auth');
    }
  }
  public function tambahGejala()
  {
    $this->admin->tambahGejala();
    $this->session->set_flashdata('flash', 'Ditambahkan');
    redirect('admin/gejala');
  }

  public function editGejala()
  {
    $this->admin->editGejala();
    $this->session->set_flashdata('flash', 'Diubah');
    redirect('admin/gejala');
  }

  public function hapusGejala($id)
  {
    $this->admin->hapusGejala($id);
    $this->session->set_flashdata('flash', 'Dihapus');
    redirect('admin/gejala');
  }

  
}