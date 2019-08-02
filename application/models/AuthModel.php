<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    // public function auth_login($username, $password) {
    //     $query = $this->db->query("SELECT * FROM dosen WHERE username ='$username' AND password ='$password' LIMIT 1");
    //     return query;
    // }
}
