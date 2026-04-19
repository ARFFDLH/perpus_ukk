<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_buku'); // Pastikan Anda punya model untuk buku
    }

    public function index() {
        $data['buku'] = $this->M_buku->get_all_buku();
        $this->load->view('v_katalog', $data);
    }
}