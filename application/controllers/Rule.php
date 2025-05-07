<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_DB_query_builder $db
 * @property CI_Session $session
 * @property Admin_model $admin
 * @property Rule_model $rule
 */

class Rule extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model', 'admin');
    if (!$this->session->userdata('email')) {
      redirect('auth');
    }
  }
  public function kwarshiorkor()
  {
    $data['judul'] = 'Sistem Pakar Metode Naive Bayes';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['subMenu'] = $this->db->get_where('sub_menu_user', ['id' => 6])->row_array();
    $data['rule'] = $this->admin->getRules();
    $this->load->model('Rule_model', 'rule');
    $data['kwarshiorkor'] = $this->rule->getRuleKwarshiorkor();
    $data['penyakit'] = $this->db->get('penyakit')->result_array();
    $data['gejala'] = $this->db->get('gejala')->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/tbl_rule/rule_diare');
    $this->load->view('templates/footer');
    $this->load->view('admin/modals/modal_tambah_rule');
    $this->load->view('admin/modals/modal_edit_rule', $data);
  }

  public function marasmus()
  {
    $data['judul'] = 'Sistem Pakar Metode Naive Bayes';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['subMenu'] = $this->db->get_where('sub_menu_user', ['id' => 6])->row_array();
    $data['rule'] = $this->admin->getRules();
    $this->load->model('Rule_model', 'rule');
    $data['marasmus'] = $this->rule->getRuleMarasmus();
    $data['penyakit'] = $this->db->get('penyakit')->result_array();
    $data['gejala'] = $this->db->get('gejala')->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/tbl_rule/rule_disentri');
    $this->load->view('templates/footer');
    $this->load->view('admin/modals/modal_tambah_rule');
    $this->load->view('admin/modals/modal_edit_rule', $data);
  }
  public function marasmusKwarshiorkor()
  {
    $data['judul'] = 'Sistem Pakar Metode Naive Bayes';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['subMenu'] = $this->db->get_where('sub_menu_user', ['id' => 6])->row_array();
    $data['rule'] = $this->admin->getRules();
    $this->load->model('Rule_model', 'rule');
    $data['marasmus_kwarshiorkor'] = $this->rule->getRuleMarasmusKwarshiorkor();
    $data['penyakit'] = $this->db->get('penyakit')->result_array();
    $data['gejala'] = $this->db->get('gejala')->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/tbl_rule/rule_apendictis');
    $this->load->view('templates/footer');
    $this->load->view('admin/modals/modal_tambah_rule');
    $this->load->view('admin/modals/modal_edit_rule', $data);
  }
  public function beriBeri()
  {
    $data['judul'] = 'Sistem Pakar Metode Naive Bayes';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['subMenu'] = $this->db->get_where('sub_menu_user', ['id' => 6])->row_array();
    $data['rule'] = $this->admin->getRules();
    $this->load->model('Rule_model', 'rule');
    $data['beri_beri'] = $this->rule->getRuleBeriBeri();
    $data['penyakit'] = $this->db->get('penyakit')->result_array();
    $data['gejala'] = $this->db->get('gejala')->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/tbl_rule/rule_maag');
    $this->load->view('templates/footer');
    $this->load->view('admin/modals/modal_tambah_rule');
    $this->load->view('admin/modals/modal_edit_rule', $data);
  }
  public function skorbut()
  {
    $data['judul'] = 'Sistem Pakar Metode Naive Bayes';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['subMenu'] = $this->db->get_where('sub_menu_user', ['id' => 6])->row_array();
    $data['rule'] = $this->admin->getRules();
    $this->load->model('Rule_model', 'rule');
    $data['skorbut'] = $this->rule->getRuleSkorbut();
    $data['penyakit'] = $this->db->get('penyakit')->result_array();
    $data['gejala'] = $this->db->get('gejala')->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/tbl_rule/rule_keracunan');
    $this->load->view('templates/footer');
    $this->load->view('admin/modals/modal_tambah_rule');
    $this->load->view('admin/modals/modal_edit_rule', $data);
  }


  public function tambahRule()
  {
    $this->admin->tambahRule();
    $this->session->set_flashdata('flash', 'Ditambahkan');
    redirect('admin/rule');
  }

  public function editRule()
  {
    $this->admin->editRule();
    $this->session->set_flashdata('flash', 'Diubah');
    redirect('admin/rule');
  }


  public function hapusRule($id)
  {
    $this->admin->hapusRule($id);
    $this->session->set_flashdata('flash', 'Dihapus');
    redirect('admin/rule');
  }
}