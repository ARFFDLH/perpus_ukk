<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function login($username, $password) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        
        if ($query->num_rows() == 1) {
            $user = $query->row_array();
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }

    public function register_anggota($data) {
        $this->db->insert('anggota', $data);
        return $this->db->insert_id();
    }

    public function register_user($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function get_user_by_id($id) {
        $this->db->where('id', $id);
        return $this->db->get('users')->row_array();
    }

    public function get_anggota_by_id($id) {
        $this->db->where('id', $id);
        return $this->db->get('anggota')->row_array();
    }
}
