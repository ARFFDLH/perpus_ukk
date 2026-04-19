<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->_check_login();
        $this->load->model('Anggota_model');
    }

    private function _check_login() {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth');
        }
    }

    public function index() {
        $data['title'] = 'Kelola Data Anggota';
        $data['anggota'] = $this->Anggota_model->get_all(); // Ambil semua data tanpa filter keyword di PHP
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/anggota/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $this->form_validation->set_rules('nis', 'NIS', 'required|trim|is_unique[anggota.nis]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|exact_length[6]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Anggota';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/anggota/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $data_anggota = array(
                'nis' => $this->input->post('nis'),
                'nama' => $this->input->post('nama'),
                'kelas' => $this->input->post('kelas'),
                'alamat' => $this->input->post('alamat'),
                'telepon' => $this->input->post('telepon')
            );

            $id_anggota = $this->Anggota_model->insert($data_anggota);

            $pass_input = $this->input->post('password');
            
            $data_user = array(
                'username' => $this->input->post('nis'),
                'password' => password_hash($pass_input, PASSWORD_DEFAULT),
                'password_plain' => $pass_input,
                'role' => 'siswa',
                'id_anggota' => $id_anggota
            );
            $this->db->insert('users', $data_user);

            $this->session->set_flashdata('success', 'Anggota dan Akun berhasil ditambahkan!');
            redirect('anggota');
        }
    }

    public function edit($id) {
        $data['anggota'] = $this->Anggota_model->get_by_id($id);
        
        if (!$data['anggota']) {
            show_404();
        }

        // Ambil data user untuk mendapatkan password_plain
        $data['user'] = $this->db->get_where('users', ['id_anggota' => $id])->row_array();

        // Simpan NIS lama untuk pengecekan perubahan
        $old_nis = $data['anggota']['nis'];

        $this->form_validation->set_rules('nis', 'NIS', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|exact_length[6]');
        
        // Pengecekan NIS unik jika admin mengubah NIS
        if ($this->input->post('nis') != $old_nis) {
            $this->form_validation->set_rules('nis', 'NIS', 'required|trim|is_unique[anggota.nis]');
        }

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Anggota';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/anggota/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $new_nis = $this->input->post('nis');
            $update_data = array(
                'nis' => $new_nis,
                'nama' => $this->input->post('nama'),
                'kelas' => $this->input->post('kelas'),
                'alamat' => $this->input->post('alamat'),
                'telepon' => $this->input->post('telepon')
            );

            $this->Anggota_model->update($id, $update_data);
            
            // Update table users (username dan password jika perlu)
            $user_update = [];
            
            // Jika NIS berubah, maka username di tabel users juga harus berubah
            if ($new_nis != $old_nis) {
                $user_update['username'] = $new_nis;
            }

            // Update password dan plain text
            $new_password = $this->input->post('password');
            if ($new_password != $data['user']['password_plain']) {
                $user_update['password'] = password_hash($new_password, PASSWORD_DEFAULT);
                $user_update['password_plain'] = $new_password;
            }

            // Jalankan update jika ada yang berubah di tabel users
            if (!empty($user_update)) {
                $this->db->where('id_anggota', $id);
                $this->db->update('users', $user_update);
            }

            $this->session->set_flashdata('success', 'Anggota berhasil diupdate!');
            redirect('anggota');
        }
    }

    /**
     * FUNGSI BARU: GENERATE KARTU ANGGOTA
     */
    public function kartu($id) {
        $data['anggota'] = $this->Anggota_model->get_by_id($id);
        
        if (!$data['anggota']) {
            show_404();
        }

        $data['title'] = 'Cetak Kartu Anggota - ' . $data['anggota']['nama'];
        
        // Memanggil view khusus cetak yang sudah kita buat sebelumnya
        $this->load->view('admin/anggota/kartu_cetak', $data);
    }

    public function reset_password($id) {
        $anggota = $this->Anggota_model->get_by_id($id);
        if (!$anggota) {
            show_404();
        }

        // Reset password ke NIS siswa
        $default_password = password_hash($anggota['nis'], PASSWORD_DEFAULT);
        
        $this->db->where('id_anggota', $id);
        $this->db->update('users', [
            'password' => $default_password,
            'password_plain' => $anggota['nis']
        ]);

        $this->session->set_flashdata('success', 'Password berhasil di-reset ke NIS siswa!');
        redirect('anggota/edit/' . $id);
    }

    public function hapus($id) {
        $anggota = $this->Anggota_model->get_by_id($id);
        
        if (!$anggota) {
            show_404();
        }

        $this->db->where('id_anggota', $id);
        $this->db->delete('users');

        $this->Anggota_model->delete($id);
        $this->session->set_flashdata('success', 'Anggota berhasil dihapus!');
        redirect('anggota');
    }
}