<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2/4/2018
 * Time: 5:28 PM
 */
class M_Transaksi extends CI_Model{
    var $table = 'tran_pembayaran';
    var $column = array('no_registrasi', 'nama_lengkap', 'alamat', 'alamat2', 'no_hp');
    var $order = array('no_registrasi' => 'asc');


    private function _get_datatables_query()
    {
        $this->db->select('tran_pembayaran.no_registrasi, tanggal_bayar, tran_pembayaran.iuran, no_ktp, nama_lengkap, alamat, alamat2, no_rumah, keterangan_rumah, keterangan_bangunan, blok, gang, rt, rw, kelurahan, kecamatan, keterangan_alamat, telp_rumah, no_hp, type_bangunan, status, tmst_pelanggan.jenis_pelanggan, tmst_pembayaran.keterangan');
        $this->db->from($this->table);
        $this->db->join('tmst_pelanggan', 'tmst_pelanggan.no_registrasi=tran_pembayaran.no_registrasi');
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


    function get_data($tanggal1, $tanggal2, $marketing)
    {
        $this->_get_datatables_query();
        $this->db->where('tanggal_bayar >=', $tanggal1);
        $this->db->where('tanggal_bayar <=', $tanggal2);
        $this->db->like('id_kolektor', $marketing);


        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
    }

    function count_filtered($tanggal1, $tanggal2, $marketing)
    {

        $this->_get_datatables_query();
        $this->db->where('tanggal_bayar >=', $tanggal1);
        $this->db->where('tanggal_bayar <=', $tanggal2);
        $this->db->like('id_kolektor', $marketing);

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($tanggal1, $tanggal2, $marketing)
    {
        $this->db->from($this->table);
        $this->db->join('tmst_pelanggan', 'tmst_pelanggan.no_registrasi=tran_pembayaran.no_registrasi');
        $this->db->join('tmst_pembayaran', 'tmst_pelanggan.jenis_pelanggan=tmst_pembayaran.jenis_pelanggan');
        $this->db->where('tanggal_bayar >=', $tanggal1);
        $this->db->where('tanggal_bayar <=', $tanggal2);
        $this->db->like('id_kolektor', $marketing);

        return $this->db->count_all_results();
    }
}