<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

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
        $data['title'] = 'Katalog Buku';
        $data['buku'] = $this->Buku_model->get_available(); // Ambil semua buku yang tersedia untuk filter client-side
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_siswa', $data);
        $this->load->view('siswa/pinjam', $data);
        $this->load->view('templates/footer');
    }

    public function pinjam($id_buku) {
        $id_anggota = $this->session->userdata('id_anggota');
        
        // Cek apakah sudah punya pinjaman aktif untuk buku ini
        $existing = $this->Peminjaman_model->check_existing($id_anggota, $id_buku);
        if ($existing) {
            $this->session->set_flashdata('error', 'Anda sudah meminjam buku ini dan belum dikembalikan!');
            redirect('peminjaman');
        }

        // Cek stok buku
        $buku = $this->Buku_model->get_by_id($id_buku);
        if (!$buku || $buku['stok'] < 1) {
            $this->session->set_flashdata('error', 'Stok buku tidak tersedia!');
            redirect('peminjaman');
        }

        // Proses peminjaman
        $data = array(
            'id_anggota' => $id_anggota,
            'id_buku' => $id_buku,
            'tanggal_pinjam' => date('Y-m-d'),
            'tanggal_kembali' => date('Y-m-d', strtotime('+7 days')),
            'status' => 'dipinjam'
        );

        $this->Peminjaman_model->insert($data);
        
        // Kurangi stok buku
        $this->Buku_model->update($id_buku, array('stok' => $buku['stok'] - 1));

        $this->session->set_flashdata('success', 'Buku berhasil dipinjam! Batas pengembalian: ' . date('d/m/Y', strtotime('+1 days')));
        redirect('peminjaman/riwayat');
    }

    public function riwayat() {
        $id_anggota = $this->session->userdata('id_anggota');
        
        $data['title'] = 'Riwayat Peminjaman';
        $data['riwayat'] = $this->Peminjaman_model->get_by_anggota_with_detail($id_anggota);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_siswa', $data);
        $this->load->view('siswa/riwayat', $data);
        $this->load->view('templates/footer');
    }

    public function kembali($id) {
        $id_anggota = $this->session->userdata('id_anggota');
        
        // Cek apakah transaksi milik user ini
        $transaksi = $this->Peminjaman_model->get_by_id($id);
        
        if (!$transaksi || $transaksi['id_anggota'] != $id_anggota) {
            $this->session->set_flashdata('error', 'Transaksi tidak ditemukan!');
            redirect('peminjaman/riwayat');
        }

        if ($transaksi['status'] != 'dipinjam') {
            $this->session->set_flashdata('error', 'Buku sudah dikembalikan!');
            redirect('peminjaman/riwayat');
        }

        // Hitung denda jika terlambat
        $today = date('Y-m-d');
        $denda = 0;

        if (strtotime($today) > strtotime($transaksi['tanggal_kembali'])) {
            $diff = (strtotime($today) - strtotime($transaksi['tanggal_kembali'])) / (60 * 60 * 24);
            $denda = $diff * 1000;
        }

        // Update status
        $update_data = array(
            'status' => 'dikembalikan',
            'tanggal_dikembalikan' => $today,
            'denda' => $denda
        );

        $this->Peminjaman_model->update($id, $update_data);

        // Tambah stok buku
        $buku = $this->Buku_model->get_by_id($transaksi['id_buku']);
        $this->Buku_model->update($transaksi['id_buku'], array('stok' => $buku['stok'] + 1));

        $this->session->set_flashdata('success', 'Buku berhasil dikembalikan!' . ($denda > 0 ? ' Denda: Rp ' . number_format($denda, 0, ',', '.') : ''));
        redirect('peminjaman/riwayat');
    }
}
