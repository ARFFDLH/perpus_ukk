<?php
class Laporan_model extends CI_Model {

    public function get_laporan($start_date, $end_date) {
        $this->db->select('transaksi.*, anggota.nama, buku.judul');
        $this->db->from('transaksi');
        $this->db->join('anggota', 'anggota.id_anggota = transaksi.id_anggota');
        $this->db->join('buku', 'buku.id_buku = transaksi.id_buku');
        
        // Filter berdasarkan rentang tanggal
        $this->db->where('tanggal_pinjam >=', $start_date);
        $this->db->where('tanggal_pinjam <=', $end_date);
        
        return $this->db->get()->result_array();
    }
}