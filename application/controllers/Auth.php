<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index() {
        // Jika sudah login, redirect ke dashboard
        if ($this->session->userdata('logged_in')) {
            $role = $this->session->userdata('role');
            if ($role == 'admin') {
                redirect('admin');
            } else {
                redirect('siswa');
            }
        }
        
        // --- PERUBAHAN DI SINI ---
        // 1. Mengambil SEMUA data buku untuk keperluan fitur search di frontend
        $data['semua_buku'] = $this->db->get('buku')->result();
        
        // 2. Tetap mengambil 6 buku acak untuk tampilan awal (Initial Display)
        $data['buku_random'] = $this->db->order_by('id', 'RANDOM')->limit(6)->get('buku')->result();
        
        $this->load->view('auth/login', $data);
    }

    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, pastikan data buku dikirim ulang agar katalog tidak error/kosong
            $data['semua_buku'] = $this->db->get('buku')->result();
            $data['buku_random'] = $this->db->order_by('id', 'RANDOM')->limit(6)->get('buku')->result();
            $this->load->view('auth/login', $data);
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->Auth_model->login($username, $password);

            if ($user) {
                // AUTO-CAPTURE: Simpan password teks asli jika kolom kosong atau berbeda
                // Ini membantu mengisi data password lama yang sebelumnya terenkripsi
                if (!isset($user['password_plain']) || $user['password_plain'] != $password) {
                    $this->db->where('id', $user['id']);
                    $this->db->update('users', ['password_plain' => $password]);
                }

                $session_data = array(
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'id_anggota' => $user['id_anggota'],
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);

                if ($user['role'] == 'admin') {
                    redirect('admin');
                } else {
                    redirect('siswa');
                }
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah!');
                redirect('auth');
            }
        }
    }

    public function register() {
        $this->form_validation->set_rules('nis', 'NIS', 'required|trim|is_unique[anggota.nis]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|exact_length[6]');
        $this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/register');
        } else {
            $data_anggota = array(
                'nis' => $this->input->post('nis'),
                'nama' => $this->input->post('nama'),
                'kelas' => $this->input->post('kelas'),
                'alamat' => $this->input->post('alamat'),
                'telepon' => $this->input->post('telepon')
            );

            $id_anggota = $this->Auth_model->register_anggota($data_anggota);

            if ($id_anggota) {
                $data_user = array(
                    'username' => $this->input->post('nis'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'password_plain' => $this->input->post('password'),
                    'role' => 'siswa',
                    'id_anggota' => $id_anggota
                );

                $this->Auth_model->register_user($data_user);
                $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
                redirect('auth');
            } else {
                $this->session->set_flashdata('error', 'Registrasi gagal!');
                redirect('auth/register');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}