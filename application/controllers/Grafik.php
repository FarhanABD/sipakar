<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_DB_query_builder $db
 * @property CI_Session $session
 * @property Admin_model $admin
 * @property Rule_model $rule
 * @property form_validation $form_validation
 */

class Grafik extends CI_Controller {
    public function __construct() {
    parent::__construct();
    $this->load->model('Admin_model', 'admin');
    if (!$this->session->userdata('email')) {
      redirect('auth');
    }
    }

    public function tambahGrafik()
  {
    $this->admin->tambahGrafik();
    $this->session->set_flashdata('flash', 'Ditambahkan');
    redirect('admin/grafik');
  }

  public function editGrafik()
  {
    $this->admin->editGrafik();
    $this->session->set_flashdata('flash', 'Diubah');
    redirect('admin/grafik');
  }

  public function hapusGrafik($id)
  {
    $this->admin->hapusGrafik($id);
    $this->session->set_flashdata('flash', 'Dihapus');
    redirect('admin/grafik');
  }
}