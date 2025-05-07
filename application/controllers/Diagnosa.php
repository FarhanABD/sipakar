<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/mpdf-6.1.4/mpdf.php';
/**
 * @property CI_DB_query_builder $db
 * @property CI_Session $session
 * @property Auth_model $auth
 * @property Diagnosa_model $diagnosa
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
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

    // Cek apakah semua gejala dipilih
    $total_gejala = $this->db->count_all('gejala'); // Jumlah total gejala di tabel
    if (count($gejala) == $total_gejala) {
        $data['hasilMax'] = [['nama_penyakit' => 'Gangguan Gizi Buruk Kronis', 'informasi' => 'Kondisi ini terjadi akibat kekurangan nutrisi dalam jangka waktu lama.', 'saran' => 'Segera konsultasikan dengan tenaga medis untuk penanganan lebih lanjut.']];
        $data['hasil'] = [];
        $this->load->view('home/hasil_diagnosa', $data);
        return;
    }

    // Proses perhitungan probabilitas seperti biasa
    $temp = $this->diagnosa->insertTempFinal();
    if (!empty($temp)) {
        $this->db->insert_batch('temporary_final', $temp);
    }

    // Ambil probabilitas setiap penyakit
    $probKwarshiorkor = $this->diagnosa->getProbPenyakit(1);
    $probMarasmus = $this->diagnosa->getProbPenyakit(3);
    $probMarasmusKwarshiokor = $this->diagnosa->getProbPenyakit(4);
    $probBeriBeri = $this->diagnosa->getProbPenyakit(5);
    $probSkorbut = $this->diagnosa->getProbPenyakit(6);

    $data = [
        'kwarshiorkor' => $probKwarshiorkor,
        'marasmus' => $probMarasmus,
        'marasmus_kwarshiorkor' => $probMarasmusKwarshiokor,
        'beri_beri' => $probBeriBeri,
        'skorbut' => $probSkorbut
    ];

    $jmlProb = array_sum($data);

    // $kwarshiorkor = ($jmlProb > 0) ? ($probKwarshiorkor / $jmlProb) : 0;
    // $marasmus = ($jmlProb > 0) ? ($probMarasmus / $jmlProb) : 0;
    // $marasmus_kwarshiorkor = ($jmlProb > 0) ? ($probMarasmusKwarshiokor / $jmlProb) : 0;
    // $beri_beri = ($jmlProb > 0) ? ($probBeriBeri / $jmlProb) : 0;
    // $skorbut = ($jmlProb > 0) ? ($probSkorbut / $jmlProb) : 0;
    $kwarshiorkor = @($probKwarshiorkor / $jmlProb);
    $marasmus = @($probMarasmus / $jmlProb);
    $marasmus_kwarshiorkor = @($probMarasmusKwarshiokor / $jmlProb);
    $beri_beri = @($probBeriBeri / $jmlProb);
    $skorbut = @($probSkorbut / $jmlProb);

    // Simpan hasil ke database
    $this->diagnosa->hasilProbKwarshiorkor($kwarshiorkor);
    $this->diagnosa->hasilProbMarasmus($marasmus);
    $this->diagnosa->hasilProbMarasmusKwarshiorkor($marasmus_kwarshiorkor);
    $this->diagnosa->hasilBeriBeri($beri_beri);
    $this->diagnosa->hasilProbSkorbut($skorbut);

    // Ambil hasil diagnosa berdasarkan probabilitas terbesar
    $data['hasil'] = $this->diagnosa->diagnosis();
    $data['hasilMax'] = $this->diagnosa->diagnosisMax();

    // Simpan daftar konsultasi user
    $this->diagnosa->insertDaftarKonsult();
    
    if (!empty($gejala)) {
      $this->diagnosa->insertRiwayatKonsult($gejala);
  }

    // Load tampilan hasil diagnosa
    $this->load->view('home/hasil_diagnosa', $data);
}

public function export_pdf()
    {
        $this->load->model('Diagnosa_model');
        $data['riwayat_gejala'] = $this->diagnosa->getAllRiwayat();

        $mpdf = new mPDF('utf-8', 'A4');
        $html = '<h3>Laporan Konsultasi</h3><table border="1" cellpadding="4">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id User</th>
                            <th>Tanggal</th>
                            <th>gejala</th>
                            <th>diagnosis</th>
                            <th>pengobatan</th>
                        </tr>
                    </thead>
                    <tbody>';
        $i = 1;
        foreach ($data['riwayat_gejala'] as $konsul) {
            $html .= '<tr>
                        <td>' . $i . '</td>
                        <td>' . $konsul['id_user'] . '</td>
                        <td>' . $konsul['tanggal'] . '</td>
                        <td>' . $konsul['gejala'] . '</td>
                        <td>' . $konsul['diagnosis'] . '</td>
                        <td>' . $konsul['pengobatan'] . '%</td>
                      </tr>';
            $i++;
        }
        $html .= '</tbody></table>';

        $mpdf->WriteHTML($html);
        $mpdf->Output('laporan_konsultasi.pdf', 'D');
    }

}