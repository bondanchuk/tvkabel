<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2/14/2018
 * Time: 9:13 AM
 */
class M_Cetak extends CI_Model{
    var $table = 'tran_pembayaran';
    var $column = array('no_registrasi', 'nama_lengkap', 'alamat', 'alamat2', 'no_hp');
    var $order = array('no_registrasi' => 'asc');

    private function _get_datatables_query()
    {
//(SELECT tmst_pelanggan.no_registrasi, nama_lengkap, no_hp, alamat, alamat2, tmst_pelanggan.jenis_pelanggan, tmst_pembayaran.keterangan, tmst_pembayaran.iuran FROM tmst_pelanggan JOIN tmst_pembayaran ON tmst_pembayaran.jenis_pelanggan=tmst_pelanggan.jenis_pelanggan WHERE no_registrasi='ID000001') as Pelanggan, (SELECT tran_pembayaran.tanggal_bayar FROM tran_pembayaran WHERE no_registrasi='ID000001' ORDER BY tanggal_bayar DESC) AS Bayar
        $this->db->select('tran_pembayaran.no_registrasi, no_ktp, nama_lengkap, alamat, alamat2, no_rumah, keterangan_rumah, keterangan_bangunan, blok, gang, rt, rw, kelurahan, kecamatan, keterangan_alamat, telp_rumah, no_hp, type_bangunan, status, tmst_pelanggan.jenis_pelanggan, tmst_pembayaran.iuran, substring_index(max(tran_pembayaran.tanggal_bayar),"|",1) tg_terakhir, tmst_pembayaran.keterangan');
        $this->db->from($this->table);
        $this->db->join('tmst_pelanggan', 'tmst_pelanggan.no_registrasi=tran_pembayaran.no_registrasi');
        $this->db->join('tmst_pembayaran', 'tmst_pembayaran.jenis_pelanggan=tmst_pelanggan.jenis_pelanggan');
        $this->db->group_by('tran_pembayaran.no_registrasi');

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

    /*
     * SELECT * FROM (SELECT * FROM tran_pembayaran ORDER BY tanggal_bayar DESC) AS Bayar GROUP BY no_registrasi
     *
     */


    function get_data($periode, $tahun, $nama, $kolektor)
    {
        $this->_get_datatables_query();

        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
    }

    function count_filtered($periode, $tahun, $nama, $kolektor)
    {

        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($periode, $tahun, $nama, $kolektor)
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function getCetak($id)
    {

        $this->db->select('tmst_pelanggan.no_registrasi, tmst_pelanggan.nama_lengkap, alamat, no_rumah, blok, gang, no_hp, 
        tmst_pelanggan.id_kolektor, tmst_pelanggan.status, tmst_pelanggan.jenis_pelanggan, tmst_pembayaran.iuran, tmst_pembayaran.keterangan');
        $this->db->from('tmst_pelanggan');
        $this->db->join('tmst_pembayaran', 'tmst_pembayaran.jenis_pelanggan=tmst_pelanggan.jenis_pelanggan');
        $this->db->where_in('tmst_pelanggan.no_registrasi', explode(",",$id));
        $query = $this->db->get();
        $res = $query->result();
        return $res;
        
    }
}