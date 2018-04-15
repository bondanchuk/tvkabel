<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/15/2018
 * Time: 10:04 AM
 */

class M_Status extends CI_Model{


    var $table = 'tmst_pelanggan';
    var $column = array('no_registrasi', 'nama_lengkap', 'alamat', 'no_rumah', 'blok', 'no_hp');
    var $order = array('no_registrasi' => 'asc');

    private function _get_datatables_query()
    {
        $this->db->select('tmst_pelanggan.nama_lengkap, tmst_pelanggan.alamat, tmst_pelanggan.blok, tmst_pelanggan.no_rumah, tmst_pelanggan.gang, min(tanggal_daftar) as tanggal_pasang, tmst_pelanggan.jenis_pelanggan, tmst_pelanggan.status');
        $this->db->from($this->table);
        $this->db->join('tran_pelanggan', 'tran_pelanggan.no_registrasi=tmst_pelanggan.no_registrasi');


        $i = 0;


    }


    function get_data($id)
    {
        $this->_get_datatables_query();
        $this->db->where('tmst_pelanggan.no_registrasi', $id);

        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
    }

    function count_filtered()
    {

        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function status_tambah($data, $tmst, $noreg)
    {
        $this->db->insert('tran_status', $data);

        $this->db->where('no_registrasi', $noreg);
        $this->db->update('tmst_pelanggan', $tmst);

    }
}