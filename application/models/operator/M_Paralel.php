<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/25/2017
 * Time: 10:37 PM
 */
class M_Paralel extends CI_Model{


    var $table = 'tmst_pelanggan';
    var $column = array('no_registrasi', 'nama_lengkap', 'alamat', 'no_rumah', 'blok', 'no_hp');
    var $order = array('no_registrasi' => 'asc');

    private function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from($this->table);

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

    public function pelanggan_tambah($data_paralel, $data_update)
    {
        $this->db->insert('tran_pelanggan', $data_paralel);

        $this->db->set('jenis_pelanggan', 'jenis_pelanggan+1', FALSE);
        $this->db->where('no_registrasi', $data_update);
        $this->db->update('tmst_pelanggan');
    }
}