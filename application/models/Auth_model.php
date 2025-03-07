<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth_model extends CI_Model
{
    public function getUser($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    public function daftar()
    {
        $email = $this->input->post('email', true);

        // Cek apakah email sudah terdaftar
        $existingUser = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($existingUser) {
            return false;
        }

        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'image' => 'user.png',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 1,
            'berat_badan' => $this->input->post('berat_badan'),
            'tinggi_badan' => $this->input->post('tinggi_badan'),
            'lingkar_kepala' => $this->input->post('lingkar_kepala'),
            'lingkar_lengan_atas' => $this->input->post('lingkar_lengan_atas'),
            'date_created' => date('Y-m-d')
        ];

        return $this->db->insert('user', $data);
    }
}