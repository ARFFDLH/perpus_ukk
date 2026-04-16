<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->_check_login();
        $this->load->model('Peminjaman_model');
    }

    private function _check_login() {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth');
        }
    }

    public function index() {
        $data['title'] = 'Laporan Peminjaman';
        
        // Ambil input dari filter cepat atau input manual date
        $filter_tipe = $this->input->get('filter_tipe'); 
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');
        $today = date('Y-m-d');

        // Logika Filter Cepat (Tanpa menghapus input manual)
        if ($filter_tipe == 'harian') {
            $start_date = $today;
            $end_date = $today;
        } elseif ($filter_tipe == 'mingguan') {
            $start_date = date('Y-m-d', strtotime('-7 days'));
            $end_date = $today;
        } elseif ($filter_tipe == 'bulanan') {
            $start_date = date('Y-m-01'); // Awal bulan ini
            $end_date = date('Y-m-t');  // Akhir bulan ini
        }

        $filters = [
            'start_date' => $start_date,
            'end_date'   => $end_date
        ];

        // Ambil data berdasarkan filter yang sudah diolah
        $data['laporan'] = $this->Peminjaman_model->get_report($filters);
        
        $data['start_date'] = $start_date;
        $data['end_date']   = $end_date;
        $data['filter_tipe'] = $filter_tipe; // Kirim ke view untuk status 'active' tombol

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/laporan/index', $data);
        $this->load->view('templates/footer');
    }

    public function cetak() {
        $data['title'] = 'Cetak Laporan Peminjaman';
        $filter_tipe = $this->input->get('filter_tipe');
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');
        $today = date('Y-m-d');

        // Logika yang sama untuk fungsi cetak agar sinkron
        if ($filter_tipe == 'harian') {
            $start_date = $today; $end_date = $today;
        } elseif ($filter_tipe == 'mingguan') {
            $start_date = date('Y-m-d', strtotime('-7 days')); $end_date = $today;
        } elseif ($filter_tipe == 'bulanan') {
            $start_date = date('Y-m-01'); $end_date = date('Y-m-t');
        }

        $filters = [
            'start_date' => $start_date,
            'end_date'   => $end_date
        ];

        $data['laporan'] = $this->Peminjaman_model->get_report($filters);
        $data['start_date'] = $start_date;
        $data['end_date']   = $end_date;

        $this->load->view('admin/laporan/cetak', $data);
    }
}