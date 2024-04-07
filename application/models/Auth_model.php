<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function cek_username($username)
    {
        $query = $this->db->get_where('tb_user', ['u_uname' => $username]);
        return $query->num_rows();
    }

    public function get_password($username)
    {
        $data = $this->db->get_where('tb_user', ['u_uname' => $username])->row_array();
        return $data['u_pass'];
    }

    public function userdata($username)
    {
        return $this->db->get_where('tb_user', ['u_uname' => $username])->row_array();
    }
}
