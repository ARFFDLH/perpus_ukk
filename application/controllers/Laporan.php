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
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        $filters = [
            'start_date' => $start_date,
            'end_date'   => $end_date
        ];

        // Selalu ambil data (Revert: jangan hilangkan data di bawah filter)
        $data['laporan'] = $this->Peminjaman_model->get_report($filters);
        
        $data['start_date'] = $start_date;
        $data['end_date']   = $end_date;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/laporan/index', $data);
        $this->load->view('templates/footer');
    }

    public function cetak() {
        $data['title'] = 'Cetak Laporan Peminjaman';
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

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
