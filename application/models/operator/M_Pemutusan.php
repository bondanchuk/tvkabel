<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/26/2017
 * Time: 1:20 PM
 */

class M_Pemutusan extends CI_Model{

    var $table = 'tmst_pelanggan';
    var $column = array('no_registrasi', 'nama_lengkap', 'alamat', 'no_hp');
    var $order = array('no_registrasi' => 'asc');

    private function _get_datatables_query()
    {
        $this->db->select('tmst_pelanggan.no_registrasi, no_ktp, nama_lengkap, alamat, alamat2, no_hp, status, tmst_pelanggan.jenis_pelanggan, tmst_pembayaran.keterangan, iuran');
        $this->db->from($this->table);
        $this->db->join('tmst_pembayaran', 'tmst_pelanggan.jenis_pelanggan=tmst_pembayaran.jenis_pelanggan');


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


    function get_data()
    {
        $this->_get_datatables_query();
        $data = array(
          'aktif',
          'putus sementara'
        );
        $this->db->where_in('tmst_pelanggan.status', $data);

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

    public function pemutusan_tambah1($data_pemutusan, $data_update, $noreg)
    {
        $this->db->insert('tran_pemutusan', $data_pemutusan);

        $this->db->set('jenis_pelanggan', 'jenis_pelanggan-1', FALSE);
        $this->db->where('no_registrasi', $noreg);
        $this->db->update('tmst_pelanggan');

        $this->db->where('jenis_pemasangan', 'paralel');
        $this->db->where('no_registrasi', $noreg);
        $this->db->limit(1);
        $this->db->delete('tran_pelanggan');
    }

    public function pemutusan_tambah2($data_pemutusan, $data_update, $noreg)
    {
        $this->db->select('no_registrasi');
        $this->db->where_not_in('jenis_pemutusan', 'Putus Paralel');
        $query = $this->db->get('tran_pemutusan');
        if ($query->num_rows() > 0){
            $this->db->where_not_in('jenis_pemutusan', 'Putus Paralel');
            $this->db->where('no_registrasi', $noreg);
            $this->db->delete('tran_pemutusan');

            $this->db->insert('tran_pemutusan', $data_pemutusan);
        }else{
            $this->db->insert('tran_pemutusan', $data_pemutusan);
        }



        $this->db->where('no_registrasi', $noreg);
        $this->db->update('tmst_pelanggan', $data_update);
    }
}