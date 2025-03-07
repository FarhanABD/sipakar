<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_DB_query_builder $db
 * @property CI_Session $session
 * @property Admin_model $admin
 * @property Rule_model $rule
 */

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    sudah_login();
    $this->load->library('form_validation');
    $this->load->model('Admin_model', 'admin');
    $this->load->helper('Admin_helper');
    $this->load->database(); 
    $this->load->library('session');
    $this->load->model('Rule_model', 'rule');
  }

  public function index()
  {
    $data['judul'] = 'Sistem Pakar Metode Naive Bayes';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['jml_user'] = $this->db->get('user')->num_rows();
    $data['jml_rule'] = $this->db->get('rule')->num_rows();
    $data['jml_dftr_konsul'] = $this->db->get('daftar_konsultasi')->num_rows();
    $data['jml_penyakit'] = $this->db->get('penyakit')->num_rows();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');
  }

  public function member()
  {
    $data['judul'] = 'Sistem Pakar Metode Naive Bayes';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['subMenu'] = $this->db->get_where('sub_menu_user', ['id' => 3])->row_array();
    $data['member'] = $this->db->get('user')->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/data_member', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('admin/modals/modal_edit_member', $data);
  }

  public function gejala()
  {
    $data['judul'] = 'Sistem Pakar Metode Naive Bayes';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['subMenu'] = $this->db->get_where('sub_menu_user', ['id' => 4])->row_array();
    $data['gejala'] = $this->db->get('gejala')->result_array();
    $data['kode'] = $this->admin->cekKodeGejala();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/data_gejala', $data);
    $this->load->view('templates/footer');
    $this->load->view('admin/modals/modal_tambah_gejala', $data);
    $this->load->view('admin/modals/modal_edit_gejala', $data);
  }

  public function grafik(){
    $data['judul'] = 'Sistem Pakar Metode Naive Bayes';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['subMenu'] = $this->db->get_where('sub_menu_user', ['id' => 11])->row_array();
    $data['grafik'] = $this->db->get('grafik')->result_array();
    $data['kode'] = $this->admin->cekKodeGrafik();
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/data_grafik', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('admin/modals/modal_tambah_grafik');
    $this->load->view('admin/modals/modal_edit_grafik');
  }

  public function penyakit()
  {
    $data['judul'] = 'Sistem Pakar Metode Naive Bayes';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['subMenu'] = $this->db->get_where('sub_menu_user', ['id' => 5])->row_array();
    $data['penyakit'] = $this->db->get('penyakit')->result_array();
    $data['kode'] = $this->admin->cekKodePenyakit();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/data_penyakit', $data);
    $this->load->view('templates/footer');
    $this->load->view('admin/modals/modal_tambah_penyakit');
    $this->load->view('admin/modals/modal_edit_penyakit', $data);
  }


  public function rule()
  {
    $data['judul'] = 'Sistem Pakar Metode Naive Bayes';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['subMenu'] = $this->db->get_where('sub_menu_user', ['id' => 6])->row_array();
    $data['rule'] = $this->admin->getRules();
    $this->load->model('Rule_model', 'rule');
    $data['kwarshiorkor'] = $this->rule->getRuleKwarshiorkor();
    $data['marasmus'] = $this->rule->getRuleMarasmus();
    $data['marasmus_kwarshiorkor'] = $this->rule->getRuleMarasmusKwarshiorkor();
    $data['beri_beri'] = $this->rule->getRuleBeriBeri();
    $data['skorbut'] = $this->rule->getRuleSkorbut();
    $data['penyakit'] = $this->db->get('penyakit')->result_array();
    $data['gejala'] = $this->db->get('gejala')->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/data_rule', $data);
    $this->load->view('templates/footer');
    $this->load->view('admin/modals/modal_tambah_rule');
    $this->load->view('admin/modals/modal_edit_rule', $data);
  }

  public function konsultasi()
  {
    $data['judul'] = 'Sistem Pakar Metode Naive Bayes';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['subMenu'] = $this->db->get_where('sub_menu_user', ['id' => 7])->row_array();
    $data['dftr_konsul'] = $this->db->get('daftar_konsultasi')->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/daftar_konsultasi', $data);
    $this->load->view('templates/footer');
  }

  
}