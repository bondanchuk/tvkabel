<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 3/3/2018
 * Time: 10:03 PM
 */

class M_Tunggakan extends CI_Model{
    var $table = 'tran_pembayaran';
    var $column = array('tran_pembayaran.no_registrasi', 'nama_lengkap', 'alamat', 'alamat2', 'no_hp');
    var $order = array('tran_pembayaran.no_registrasi' => 'asc');


    private function _get_datatables_query()
    {
        $this->db->select('tran_pembayaran.no_registrasi, no_ktp, nama_lengkap, alamat, alamat2, no_rumah, keterangan_rumah, keterangan_bangunan, blok, gang, rt, rw, kelurahan, kecamatan, keterangan_alamat, telp_rumah, no_hp, type_bangunan, status, tmst_pelanggan.jenis_pelanggan, tmst_pembayaran.iuran, substring_index(max(tran_pembayaran.bayar_bulan),"|",1) tg_terakhir, tmst_pembayaran.keterangan, max(bayar_bulan) as akhir_bayar, PERIOD_DIFF(LEFT(REPLACE(curdate(), "-", ""),6), LEFT(REPLACE(MAX(tran_pembayaran.bayar_bulan), "-",""),6)) AS jml_tunggakan', FALSE);
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


    function get_data($nama, $noreg, $alamat, $tunggakan, $tglbayar, $status, $prm_tunggakan)
    {
        $this->_get_datatables_query();
        $this->db->like('nama_lengkap', $nama);
        $this->db->like('tran_pembayaran.no_registrasi', $noreg);
        $this->db->like('alamat', $alamat);
        $this->db->like('tanggal_bayar', $tglbayar);
        $this->db->like('status', $status);
        if ($tunggakan=='') {

        }else{
            if($prm_tunggakan=='>'){
                $this->db->having('jml_tunggakan >', $tunggakan);
            }elseif ($prm_tunggakan=='<'){
                $this->db->having('jml_tunggakan <', $tunggakan );
            }elseif ($prm_tunggakan=='='){
                $this->db->having('jml_tunggakan =', $tunggakan);
            }
        }




        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
    }

    function count_filtered($nama, $noreg, $alamat, $tunggakan, $tglbayar, $status, $prm_tunggakan)
    {

        $this->_get_datatables_query();
        $this->db->like('nama_lengkap', $nama);
        $this->db->like('tran_pembayaran.no_registrasi', $noreg);
        $this->db->like('alamat', $alamat);
        $this->db->like('tanggal_bayar', $tglbayar);
        $this->db->like('status', $status);
        if ($tunggakan=='') {

        }else{
            if($prm_tunggakan=='>'){
                $this->db->having('jml_tunggakan >', $tunggakan);
            }elseif ($prm_tunggakan=='<'){
                $this->db->having('jml_tunggakan <', $tunggakan );
            }elseif ($prm_tunggakan=='='){
                $this->db->having('jml_tunggakan =', $tunggakan);
            }
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($nama, $noreg, $alamat, $tunggakan, $tglbayar, $status, $prm_tunggakan)
    {
        $this->db->select('tran_pembayaran.no_registrasi, no_ktp, nama_lengkap, alamat, alamat2, no_rumah, keterangan_rumah, keterangan_bangunan, blok, gang, rt, rw, kelurahan, kecamatan, keterangan_alamat, telp_rumah, no_hp, type_bangunan, status, tmst_pelanggan.jenis_pelanggan, tmst_pembayaran.iuran, substring_index(max(tran_pembayaran.bayar_bulan),"|",1) tg_terakhir, tmst_pembayaran.keterangan, max(bayar_bulan) as akhir_bayar, PERIOD_DIFF(LEFT(REPLACE(curdate(), "-", ""),6), LEFT(REPLACE(MAX(tran_pembayaran.bayar_bulan), "-",""),6)) AS jml_tunggakan', FALSE);

        $this->db->from($this->table);
        $this->db->join('tmst_pelanggan', 'tmst_pelanggan.no_registrasi=tran_pembayaran.no_registrasi');
        $this->db->join('tmst_pembayaran', 'tmst_pembayaran.jenis_pelanggan=tmst_pelanggan.jenis_pelanggan');
        $this->db->group_by('tran_pembayaran.no_registrasi');
        $this->db->like('nama_lengkap', $nama);
        $this->db->like('tran_pembayaran.no_registrasi', $noreg);
        $this->db->like('alamat', $alamat);
        $this->db->like('tanggal_bayar', $tglbayar);
        $this->db->like('status', $status);
        if ($tunggakan=='') {

        }else{
            if($prm_tunggakan=='>'){
                $this->db->having('jml_tunggakan >', $tunggakan);
            }elseif ($prm_tunggakan=='<'){
                $this->db->having('jml_tunggakan <', $tunggakan );
            }elseif ($prm_tunggakan=='='){
                $this->db->having('jml_tunggakan =', $tunggakan);
            }
        }
        return $this->db->count_all_results();
    }
}