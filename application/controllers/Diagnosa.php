<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_DB_query_builder $db
 * @property CI_Session $session
 * @property Auth_model $auth
 * @property form_validation $form_validation
 * @property diagnosa $diagnosa
 * @property input $input
 */

class Diagnosa extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Diagnosa_model', 'diagnosa');
    if (!$this->session->userdata('email')) {
      redirect('home');
    }
  }
  
  public function hasil()
  {
    // Kosongkan tabel temporary sebelum diagnosa dimulai
    $this->diagnosa->kosongkanTemp();
    $this->diagnosa->kosongkanTempFinal();

    // Tangkap input checkbox gejala
    $gejala = $this->input->post('gejala');
    if (!empty($gejala)) {
      foreach ($gejala as $g) {
        $data = ['id_gejala' => $g];
        $this->db->insert('temporary', $data);
      }
    }
  
    // Insert ke temporary final dengan id_penyakit & probabilitas
    $temp = $this->diagnosa->insertTempFinal();
    if (!empty($temp)) {
      $this->db->insert_batch('temporary_final', $temp);
    }

    // Ambil probabilitas untuk setiap penyakit
    $probKwarshiorkor = $this->diagnosa->getProbKwarshiorkor();
    $probMarasmus = $this->diagnosa->getProbMarasmus();
    $probMarasmusKwarshiokor = $this->diagnosa->getProbMarasmusKwarshiorkor();
    $probBeriBeri = $this->diagnosa->getProbBeriBeri();
    $probSkorbut = $this->diagnosa->getProbSkorbut();

    // Siapkan array data untuk menjumlahkan probabilitas total
    $data = [
      'kwarshiorkor' => $probKwarshiorkor,
      'marasmus' => $probMarasmus,
      'marasmus_kwarshiorkor' => $probMarasmusKwarshiokor,
      'beri_beri' => $probBeriBeri,
      'skorbut' => $probSkorbut
    ];
    
    $jmlProb = array_sum($data);

    // Hindari pembagian dengan nol
    $kwarshiorkor = ($jmlProb > 0) ? ($probKwarshiorkor / $jmlProb) : 0;
    $marasmus = ($jmlProb > 0) ? ($probMarasmus / $jmlProb) : 0;
    $marasmus_kwarshiorkor = ($jmlProb > 0) ? ($probMarasmusKwarshiokor / $jmlProb) : 0;
    $beri_beri = ($jmlProb > 0) ? ($probBeriBeri / $jmlProb) : 0;
    $skorbut = ($jmlProb > 0) ? ($probSkorbut / $jmlProb) : 0;

    // Simpan hasil probabilitas ke database
    $this->diagnosa->hasilProbKwarshiorkor($kwarshiorkor);
    $this->diagnosa->hasilProbMarasmus($marasmus);
    $this->diagnosa->hasilProbMarasmusKwarshiorkor($marasmus_kwarshiorkor);
    $this->diagnosa->hasilBeriBeri($beri_beri);
    $this->diagnosa->hasilProbSkorbut($skorbut);

    // Ambil hasil diagnosa berdasarkan probabilitas terbesar
    $data['hasil'] = $this->diagnosa->diagnosis();
    $data['hasilMax'] = $this->diagnosa->diagnosisMax();
    $data['penyakit'] = $this->db->get('penyakit')->result_array();

    // Simpan daftar konsultasi user
    $this->diagnosa->insertDaftarKonsult();
    
    // Load tampilan hasil diagnosa
    $this->load->view('home/hasil_diagnosa', $data);
  }
}