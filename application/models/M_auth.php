<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    public function cek_login($username, $password)
    {
        $user = $this->db->get_where('tb_users', [
            'username' => $username,
        ])->row_array();
        $verify = password_verify($password, $user['password']);
        if ($verify) {
            return $user;
        } else {
            return false;
        }
    }
}
