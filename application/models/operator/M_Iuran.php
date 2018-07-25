<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/3/2018
 * Time: 10:54 PM
 */

class M_Iuran extends CI_Model{

    var $table = 'tmst_pelanggan';
    var $column = array('no_registrasi', 'nama_lengkap', 'alamat', 'no_hp');
    var $order = array('no_registrasi' => 'asc');

    private function _get_datatables_query()
    {
        $this->db->select('tmst_pelanggan.no_registrasi, no_ktp, nama_lengkap, alamat, alamat2, no_hp, kolektor, status, tmst_pelanggan.jenis_pelanggan, iuran');
        $this->db->from($this->table);
        $this->db->join('tmst_pembayaran', 'tmst_pelanggan.jenis_pelanggan=tmst_pembayaran.jenis_pelanggan');
        $this->db->join('tmst_kolektor', 'tmst_pelanggan.id_kolektor=tmst_kolektor.id_kolektor');

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




    private function _get_tunggakan_query($id)
    {
        $this->db->select('status');
        $this->db->from('tmst_pelanggan');
        $this->db->where('no_registrasi', $id);
        $querySLQ = $this->db->get();
        $res = $querySLQ->result();

        foreach ($res as $result){
            if($result->status == "aktif" || $result->status == "Aktif"){
                $this->db->select('*');
                $this->db->from('tran_pembayaran');
                $this->db->where('tran_pembayaran.no_registrasi', $id);
                $query = $this->db->get();

                if ($query->num_rows() < 1){
                    $this->db->select('tran_pelanggan.no_registrasi, tanggal_daftar as Atanggal_bayar, tmst_pelanggan.jenis_pelanggan, tmst_pembayaran.iuran, kolektor');
                    $this->db->from('tran_pelanggan');
                    $this->db->join('tmst_pelanggan', 'tmst_pelanggan.no_registrasi=tran_pelanggan.no_registrasi');
                    $this->db->join('tmst_pembayaran', 'tmst_pembayaran.jenis_pelanggan=tmst_pelanggan.jenis_pelanggan');
                    $this->db->join('tmst_kolektor', 'tmst_kolektor.id_kolektor=tmst_pelanggan.id_kolektor');
                    $this->db->where('jenis_pemasangan', 'non-paralel');
                    $this->db->where('tran_pelanggan.no_registrasi', $id);

                }else {

                    $this->db->select('id, tran_pembayaran.no_registrasi, bayar_bulan as Atanggal_bayar, tran_pembayaran.keterangan, tmst_pelanggan.jenis_pelanggan, tmst_pembayaran.iuran, kolektor');
                    $this->db->from('tran_pembayaran');
                    $this->db->join('tmst_pelanggan', 'tmst_pelanggan.no_registrasi=tran_pembayaran.no_registrasi');
                    $this->db->join('tmst_pembayaran', 'tmst_pembayaran.jenis_pelanggan=tmst_pelanggan.jenis_pelanggan');
                    $this->db->join('tmst_kolektor', 'tmst_kolektor.id_kolektor=tmst_pelanggan.id_kolektor');
                    $this->db->where('tran_pembayaran.no_registrasi', $id);

                }
            }else{
                $this->db->select('id, tran_pembayaran.no_registrasi, CURDATE() as Atanggal_bayar, MONTH(bayar_bulan) as bulan, YEAR(bayar_bulan) as tahun, tran_pembayaran.keterangan, tmst_pelanggan.jenis_pelanggan, tmst_pembayaran.iuran');
                $this->db->from('tran_pembayaran');
                $this->db->join('tmst_pelanggan', 'tmst_pelanggan.no_registrasi=tran_pembayaran.no_registrasi');
                $this->db->join('tmst_pembayaran', 'tmst_pembayaran.jenis_pelanggan=tmst_pelanggan.jenis_pelanggan');
                $this->db->where('tran_pembayaran.no_registrasi', $id);
            }
        }



        $i = 0;

            foreach ($this->column as $item) // loop column
            {
                if ($_POST['search']['value']) // if datatable send POST for search
                {

                    if ($i === 0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    } else {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if (count($this->column) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $column[$i] = $item; // set column array variable to order processing
                $i++;
            }

            if (isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } else if (isset($this->order)) {
                $order = $this->order;
                $this->db->order_by(key($order), $order[key($order)]);
            }

    }


    function get_tunggakan($id)
    {
        $this->_get_tunggakan_query($id);
        $this->db->order_by('Atanggal_bayar', 'desc');
        $this->db->limit(1);

        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
    }

    function tunggakan_filtered($id)
    {

        $this->_get_tunggakan_query();
        $this->db->where('tran_pembayaran.no_registrasi', $id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_tunggakan($id)
    {
        $this->db->from('tran_pembayaran');
        $this->db->where('tran_pembayaran.no_registrasi', $id);
        return $this->db->count_all_results();
    }



    private function _get_pembayaran_query()
    {
        $this->db->select('id, tran_pembayaran.no_registrasi, tanggal_bayar, bayar_bulan, tran_pembayaran.keterangan, tmst_pelanggan.jenis_pelanggan, tran_pembayaran.iuran, kolektor');
        $this->db->from('tran_pembayaran');
        $this->db->join('tmst_pelanggan', 'tmst_pelanggan.no_registrasi=tran_pembayaran.no_registrasi');
        $this->db->join('tmst_kolektor', 'tmst_kolektor.id_kolektor=tmst_pelanggan.id_kolektor');


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


    function get_pembayaran($id)
    {
        $this->_get_pembayaran_query();
        $this->db->where('tran_pembayaran.no_registrasi', $id);
        $this->db->order_by('tran_pembayaran.bayar_bulan', 'desc');


        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
    }

    function pembayaran_filtered($id)
    {

        $this->_get_pembayaran_query();
        $this->db->where('tran_pembayaran.no_registrasi', $id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_pembayaran($id)
    {
        $this->db->from('tran_pembayaran');
        $this->db->where('tran_pembayaran.no_registrasi', $id);
        return $this->db->count_all_results();
    }

    public function pembayaran_tambah($bulan, $bulanan, $noreg, $tanggal_bayar, $status)
    {
        if($status=="aktif"){

            $this->db->select('bayar_bulan');
            $this->db->from('tran_pembayaran');
            $this->db->where('no_registrasi', $noreg);
            $query = $this->db->get();
            if ($query->num_rows() < 1){
                $this->db->select('tanggal_daftar');
                $this->db->from('tran_pelanggan');
                $this->db->where('jenis_pemasangan', 'non-paralel');
                $this->db->where('no_registrasi', $noreg);
                $this->db->limit(1);
                $query = $this->db->get();
                $result = $query->result();

                foreach ($result as $tgl){
                    $time = strtotime($tgl->tanggal_daftar);
                    for($i=1; $i<=$bulan; $i++){

                        $this->db->set('no_registrasi', $noreg);
                        $this->db->set('bayar_bulan', date("Y-m-d", strtotime("+$i month", $time)));
                        $this->db->set('tanggal_bayar', $tanggal_bayar);
                        $this->db->set('iuran', $bulanan);
                        $this->db->insert('tran_pembayaran');
                    }
                }
            }else{
                $this->db->select('bayar_bulan');
                $this->db->from('tran_pembayaran');
                $this->db->where('no_registrasi', $noreg);
                $this->db->order_by('bayar_bulan', 'desc');
                $this->db->limit(1);
                $query = $this->db->get();
                $result = $query->result();

                foreach ($result as $jml){
                    $time = strtotime($jml->bayar_bulan);
                    for($i=1; $i<=$bulan; $i++) {
                        $this->db->set('no_registrasi', $noreg);
                        $this->db->set('bayar_bulan', date("Y-m-d", strtotime("+$i month", $time)));
                        $this->db->set('tanggal_bayar', $tanggal_bayar);
                        $this->db->set('iuran', $bulanan);
                        $this->db->insert('tran_pembayaran');
                    }
                }

            }

        }else{
            for($i=0; $i<$bulan; $i++) {
                $this->db->set('no_registrasi', $noreg);
                $this->db->set('bayar_bulan', date("Y/m/d", strtotime("+$i month")));
                $this->db->set('tanggal_bayar', $tanggal_bayar);
                $this->db->set('iuran', $bulanan);
                $this->db->insert('tran_pembayaran');
            }
            $data = array(
                'status' => 'aktif'
            );
            $this->db->where('no_registrasi', $noreg);
            $this->db->update('tmst_pelanggan', $data);
        }



    }


    /*
     $time = strtotime("2010-12-11");
for($i=1; $i<3; $i++){
$final = date("Y-m-d", strtotime("+$i month", $time));
echo $final;
}

     */
}