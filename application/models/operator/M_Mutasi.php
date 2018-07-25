<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/26/2017
 * Time: 9:54 PM
 */

class M_Mutasi extends CI_Model{
    var $table = 'tmst_pelanggan';
    var $column = array('no_registrasi', 'nama_lengkap', 'alamat', 'alamat2', 'no_hp');
    var $order = array('no_registrasi' => 'asc');

    function set_mutasi($data_mutasi, $noreg, $alamat2)
    {
        $this->db->insert('tran_mutasi', $data_mutasi);

        $this->db->where('no_registrasi', $noreg);
        $this->db->update('tmst_pelanggan', $alamat2);

    }

    private function _get_datatables_query()
    {
        $this->db->select('tmst_pelanggan.no_registrasi, tanggal_mutasi, no_ktp, nama_lengkap, alamat, alamat2, no_hp, status, tmst_pelanggan.jenis_pelanggan');
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


    function get_data($tanggal1, $tanggal2)
    {
        $this->_get_datatables_query();
        $this->db->where('tanggal_mutasi >=', $tanggal1);
        $this->db->where('tanggal_mutasi >=', $tanggal2);

        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
    }

    function count_filtered($tanggal1, $tanggal2)
    {

        $this->_get_datatables_query();
        $this->db->where('tanggal_mutasi >=', $tanggal1);
        $this->db->where('tanggal_mutasi >=', $tanggal2);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($tanggal1, $tanggal2)
    {
        $this->db->from($this->table);
        $this->db->join('tran_mutasi', 'tmst_pelanggan.no_registrasi=tran_mutasi.no_registrasi');
        $this->db->where('tanggal_mutasi >=', $tanggal1);
        $this->db->where('tanggal_mutasi >=', $tanggal2);
        return $this->db->count_all_results();
    }

    function get_id($where)
    {
        $this->_get_datatables_query();
        $this->db->like($where, 'both');

        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
    }

    function count_filtered_id($where)
    {

        $this->_get_datatables_query();
        $this->db->like($where);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_id($where)
    {
        $this->db->from($this->table);
        $this->db->like($where);
        return $this->db->count_all_results();
    }

    public function get_by_noreg($noreg)
    {
        $this->db->select('no_registrasi, nama_lengkap, no_hp, alamat2');
        $this->db->from('tmst_pelanggan');

        $this->db->where('no_registrasi',$noreg);
        $query = $this->db->get();
        return $query->row();
    }

    public function update_data($noreg, $data_pelanggan, $data_mutasi)
    {
        $this->db->where('no_registrasi', $noreg);
        $this->db->update('tmst_pelanggan', $data_pelanggan);

        $this->db->where('no_registrasi', $noreg);
        $this->db->update('tran_mutasi', $data_mutasi);
    }

    public function hapus_mutasi($noreg)
    {
        $this->db->where('no_registrasi', $noreg);
        $this->db->delete('tran_mutasi');

        $data = array(
            'alamat2' => ''
        );
        $this->db->where('no_registrasi', $noreg);
        $this->db->update('tmst_pelanggan', $data);
    }
}