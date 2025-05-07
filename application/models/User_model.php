<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
  public function editProfil()
  {
      $name = htmlspecialchars($this->input->post('name', true));
      $email = htmlspecialchars($this->input->post('email', true));
      $berat_badan = htmlspecialchars($this->input->post('berat_badan', true));
      $tinggi_badan = htmlspecialchars($this->input->post('tinggi_badan', true));
      $lingkar_kepala = htmlspecialchars($this->input->post('lingkar_kepala', true));
      $lingkar_lengan_atas = htmlspecialchars($this->input->post('lingkar_lengan_atas', true));
  
      // Set data baru ke tabel 'user'
      $this->db->set('name', $name);
      $this->db->set('berat_badan', $berat_badan);
      $this->db->set('tinggi_badan', $tinggi_badan);
      $this->db->set('lingkar_kepala', $lingkar_kepala);
      $this->db->set('lingkar_lengan_atas', $lingkar_lengan_atas);
  
      $this->db->where('email', $email);
      $this->db->update('user');
  }
  

  public function getKonsul()
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('email', $this->session->userdata('email'));
    $data = $this->db->get()->result();
    foreach ($data as $row) {
      $idUser = $row->id;
    }
    $query = "SELECT `daftar_konsultasi`.* FROM `daftar_konsultasi` JOIN `user` ON `daftar_konsultasi`.`id_user` = `user`.`id` WHERE `daftar_konsultasi`.`id_user` = $idUser ORDER BY `daftar_konsultasi`.`id`";
    return $this->db->query($query)->result_array();
  }

  public function getRiwayat()
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('email', $this->session->userdata('email'));
    $data = $this->db->get()->result();
    foreach ($data as $row) {
      $idUser = $row->id;
    }
    $query = "SELECT `riwayat_gejala`.* FROM `riwayat_gejala` JOIN `user` ON `riwayat_gejala`.`id_user` = `user`.`id` WHERE `riwayat_gejala`.`id_user` = $idUser ORDER BY `riwayat_gejala`.`id`";
    return $this->db->query($query)->result_array();
  }
  public function hapusKonsultasi($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('daftar_konsultasi');
  }
}