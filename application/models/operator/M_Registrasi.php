<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/24/2017
 * Time: 8:30 PM
 */

class M_Registrasi extends CI_Model{

    public function get_id()
    {
        $this->db->select('RIGHT(no_registrasi, 6) as noreg', FALSE);
        $this->db->order_by('no_registrasi', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('tmst_pelanggan');

        if($query->num_rows() <> 0)
        {
            $data = $query->row();
            $kode = intval($data->noreg)+1;
        }
        else
        {
            $kode = 1;
        }

        $kode_max = str_pad($kode, 6, "0", STR_PAD_LEFT);
        $noreg_res = "ID".$kode_max;
        return $noreg_res;

    }

    public function pelanggan_tambah($data_master, $data_tran)
    {
        $this->db->insert('tmst_pelanggan', $data_master);
        $this->db->insert('tran_pelanggan', $data_tran);
    }

    public function get_kolektor()
    {
        $this->db->select('*');
        $this->db->from('tmst_kolektor');
        $query = $this->db->get();
        if($query->num_rows()){
            return $query->result_array();
        }else{
            return false;
        }
    }

    public function get_teknisi()
    {
        $this->db->select('*');
        $this->db->from('tmst_teknisi');
        $query = $this->db->get();
        if($query->num_rows()){
            return $query->result_array();
        }else{
            return false;
        }
    }

    public function get_marketing()
    {
        $this->db->select('*');
        $this->db->from('tmst_marketing');
        $query = $this->db->get();
        if($query->num_rows()){
            return $query->result_array();
        }else{
            return false;
        }
    }

}