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


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    private function _get_status_query()
    {
        $this->db->select('tmst_pelanggan.no_registrasi, tanggal_mutasi, no_ktp, nama_lengkap, alamat, alamat2, no_rumah, keterangan_rumah, keterangan_bangunan, blok, gang, rt, rw, kelurahan, kecamatan, keterangan_alamat, telp_rumah, no_hp, type_bangunan, status, tmst_pelanggan.jenis_pelanggan');
        $this->db->from($this->table);
        $this->db->join('tran_mutasi', 'tmst_pelanggan.no_registrasi=tran_mutasi.no_registrasi');


        $i = 0;

        foreach ($this->column as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }

    }


    function get_tanggal($tanggal1, $tanggal2)
    {
        $this->_get_status_query();
        $this->db->where('tanggal_mutasi >=', $tanggal1);
        $this->db->where('tanggal_mutasi >=', $tanggal2);

        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
    }

    function tanggal_count_filtered($tanggal1, $tanggal2)
    {

        $this->_get_datatables_query();
        $this->db->where('tanggal_mutasi >=', $tanggal1);
        $this->db->where('tanggal_mutasi >=', $tanggal2);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function tanggalcount_all($tanggal1, $tanggal2)
    {
        $this->db->from($this->table);
        $this->db->join('tran_mutasi', 'tmst_pelanggan.no_registrasi=tran_mutasi.no_registrasi');
        $this->db->where('tanggal_mutasi >=', $tanggal1);
        $this->db->where('tanggal_mutasi >=', $tanggal2);
        return $this->db->count_all_results();
    }

    function get_status_data($where)
    {
        $this->_get_status_query();
        $this->db->like($where, 'both');

        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
    }

    function status_count_id($where)
    {

        $this->_get_status_query();
        $this->db->like($where);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function status_count_filtered_id($where)
    {
        $this->db->from($this->table);
        $this->db->like($where);
        return $this->db->count_all_results();
    }
}