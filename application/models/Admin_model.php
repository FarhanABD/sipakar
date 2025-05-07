<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
  public function cekKodeGejala()
  {
    $query = $this->db->query("SELECT MAX(kode) as max_id from gejala");
    $rows = $query->row();
    $kode = $rows->max_id;
    $noUurut = (int) substr($kode, 1, 2);
    $noUurut++;
    $char = "G";
    $kode = $char . sprintf("%02s", $noUurut);
    return $kode;
  }

  public function cekKodeGrafik(){
    $query = $this->db->query("SELECT MAX(kode) as max_id from grafik");
    $rows = $query->row();
    $kode = $rows->max_id;
    $noUurut = (int) substr($kode, 1, 2);
    $noUurut++;
    $char = "D";
    $kode = $char . sprintf("%02s", $noUurut);
    return $kode;
  }

  public function cekKodePenyakit()
  {
    $query = $this->db->query("SELECT MAX(kode) as max_id from penyakit");
    $rows = $query->row();
    $kode = $rows->max_id;
    $noUurut = (int) substr($kode, 1, 2);
    $noUurut++;
    $char = "P";
    $kode = $char . sprintf("%02s", $noUurut);
    return $kode;
  }

  public function tambahGrafik()
  {
    $Kode = $this->cekKodeGrafik();
    $data = [
      'kode' => $Kode,
      'jumlah' => $this->input->post('jumlah'),
      'nama_kecamatan' => $this->input->post('nama_kecamatan'),
    ];
    $this->db->insert('grafik', $data);
  }

  public function editGrafik()
  {
    $data = [
      "kode" => $this->input->post('kode', true),
      "jumlah" => $this->input->post('jumlah', true),
      "nama_kecamatan" => $this->input->post('nama_kecamatan', true),
    ];
    $this->db->where('id_grafik', $this->input->post('id'));
    $this->db->update('grafik', $data);
  }

  public function hapusGrafik($id)
  {
    $this->db->where('id_grafik', $id);
    $this->db->delete('grafik');
  }


  // gejala
  public function tambahGejala()
  {
    $Kode = $this->cekKodeGejala();
    $data = [
      'kode' => $Kode,
      'gejala' => $this->input->post('gejala'),
    ];
    $this->db->insert('gejala', $data);
  }

  public function editGejala()
  {
    $data = [
      "kode" => $this->input->post('kode', true),
      "gejala" => $this->input->post('gejala', true)
    ];
    $this->db->where('id_gejala', $this->input->post('id'));
    $this->db->update('gejala', $data);
  }

  public function hapusGejala($id)
  {
    $this->db->where('id_gejala', $id);
    $this->db->delete('gejala');
  }

  public function tambahPenyakit()
  {
    $Kode = $this->cekKodePenyakit();
    $data = [
      'kode' => $Kode,
      'nama_penyakit' => $this->input->post('nama_penyakit'),
      'probabilitas' => $this->input->post('probabilitas'),
      'jumlah_muncul' => $this->input->post('jumlah_muncul'),
      'saran' => $this->input->post('saran'),
      'informasi' => $this->input->post('informasi')
    ];
    $this->db->insert('penyakit', $data);
  }

  public function editPenyakit()
  {
    $data = [
      'kode' => $this->input->post('kode'),
      'nama_penyakit' => $this->input->post('nama_penyakit'),
      'probabilitas' => $this->input->post('probabilitas'),
      'jumlah_muncul' => $this->input->post('jumlah_muncul'),
      'saran' => $this->input->post('saran'),
      'informasi' => $this->input->post('informasi')
    ];
    $this->db->where('id_penyakit', $this->input->post('id'));
    $this->db->update('penyakit', $data);
  }

  public function tambahSaran()
  {
      $data = [
          'pengobatan' => $this->input->post('pengobatan'),
          'gejala'     => $this->input->post('gejala'),
          'diagnosis'  => $this->input->post('diagnosis'),
      ];
  
      $this->db->where('id_user', $this->input->post('id'));
      // $this->db->where('id', $this->input->post('id'));
      $this->db->update('riwayat_gejala', $data);
  }

  public function hapusPenyakit($id)
  {
    $this->db->where('id_penyakit', $id);
    $this->db->delete('penyakit');
  }

  public function getRules()
  {
    $queryRule = "SELECT `rule`.`id`,`penyakit`.`nama_penyakit`,`gejala`.`gejala`,`rule`.`probabilitas`  FROM `penyakit` JOIN `rule` ON `penyakit`.`id_penyakit`=`rule`.`id_penyakit` JOIN `gejala` ON `rule`.`id_gejala`=`gejala`.`id_gejala`
                        ";
    return $this->db->query($queryRule)->result_array();
  }

  // rule
  public function tambahRule()
  {
    $prob = $this->input->post('prob');
    if ($prob == 0) {
      $prob = 0.00001;
    }
    $data = [
      'id_penyakit' => $this->input->post('nama_penyakit'),
      'id_gejala' => $this->input->post('nama_gejala'),
      'probabilitas' => $prob
    ];
    $this->db->insert('rule', $data);
  }

  public function editRule()
  {
    $data = [
      'probabilitas' => $this->input->post('prob')
    ];
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('rule', $data);
  }

  public function hapusRule($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('rule');
  }

  public function editMember()
  {
    $data = [
      "name" => $this->input->post('name', true),
      "is_active" => $this->input->post('is_active', true)
    ];
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('user', $data);
  }
  public function hapusMember($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user');
  }
}