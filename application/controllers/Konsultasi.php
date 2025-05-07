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

class Konsultasi extends CI_Controller
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

  public function tambahSaran()
{
    $id = $this->input->post('id'); // ID dari tabel riwayat_gejala
    $data = [
        'gejala' => $this->input->post('gejala'),
        'diagnosis' => $this->input->post('diagnosis'),
        'pengobatan' => $this->input->post('pengobatan')
    ];

    $this->db->where('id', $id);
    $this->db->update('riwayat_gejala', $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success">Pengobatan berhasil diperbarui!</div>');
    redirect('admin/konsultasi');
}

}