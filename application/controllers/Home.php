<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_DB_query_builder $db
 * @property CI_Session $session
 * @property Auth_model $auth
 * @property Admin_model $admin
 */

class Home extends CI_Controller
{
  public function index()
{
    $data['grafik'] = $this->db->get('grafik')->result_array();
    $this->load->view('home/index', $data);
}
  
  public function hasil_diagnosa()
  {
    $this->load->view('home/hasil_diagnosa');
  }
  

  public function diagnosa()
  {
    if (!$this->session->userdata('email')) {
      redirect('auth');
    }
    $this->session->set_flashdata('hasil');
    $data['gejala'] = $this->db->get('gejala')->result_array();
    $this->load->view('home/diagnosa', $data);
  }
}