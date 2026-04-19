<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->_check_login();
        $this->load->model('Buku_model');
        $this->load->model('Peminjaman_model');
        $this->load->model('Anggota_model');
    }

    private function _check_login() {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'siswa') {
            redirect('auth');
        }
    }

    public function index() {
        $id_anggota = $this->session->userdata('id_anggota');
        
        $data['title'] = 'Dashboard Siswa';
        $data['anggota'] = $this->Anggota_model->get_by_id($id_anggota);
        $data['total_pinjaman'] = $this->Peminjaman_model->count_by_anggota($id_anggota);
        $data['pinjaman_aktif'] = $this->Peminjaman_model->count_active_by_anggota($id_anggota);
        $data['riwayat_terbaru'] = $this->Peminjaman_model->get_by_anggota_with_detail($id_anggota, 5);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_siswa', $data);
        $this->load->view('siswa/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function profil() {
        $id_anggota = $this->session->userdata('id_anggota');
        $data['title'] = 'Profil Saya';
        $data['anggota'] = $this->Anggota_model->get_by_id($id_anggota);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_siswa', $data);
        $this->load->view('siswa/profil', $data);
        $this->load->view('templates/footer');
    }

    public function update_profil() {
        $id_anggota = $this->session->userdata('id_anggota');
        $user_id = $this->session->userdata('user_id');

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
        
        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password', 'required|trim|exact_length[6]');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->profil();
        } else {
            // Update table anggota
            $data_anggota = [
                'nama' => $this->input->post('nama'),
                'kelas' => $this->input->post('kelas'),
                'alamat' => $this->input->post('alamat'),
                'telepon' => $this->input->post('telepon')
            ];

            $this->Anggota_model->update($id_anggota, $data_anggota);

            // Update user table if password changed
            if ($this->input->post('password')) {
                $data_user = [
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'password_plain' => $this->input->post('password')
                ];
                $this->load->model('Auth_model');
                $this->Auth_model->update_user($user_id, $data_user);
            }

            $this->session->set_flashdata('success', 'Profil berhasil diperbarui!');
            redirect('siswa/profil');
        }
    }

    public function cetak_kartu() {
        $id_anggota = $this->session->userdata('id_anggota');
        $data['anggota'] = $this->Anggota_model->get_by_id($id_anggota);
        $data['title'] = 'Cetak Kartu Siswa - ' . $data['anggota']['nama'];
        
        // Memakai view yang sama dengan admin agar konsisten
        $this->load->view('admin/anggota/kartu_cetak', $data);
    }
}
