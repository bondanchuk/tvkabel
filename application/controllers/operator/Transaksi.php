<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2/4/2018
 * Time: 2:21 PM
 */
class Transaksi extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('operator/M_Registrasi');
        $this->load->model('operator/M_Transaksi');
    }

    function index()
    {
        $data['kolektor'] = $this->M_Registrasi->get_kolektor();
        $this->load->view('operator/v_header');
        $this->load->view('operator/v_transaksi', $data);
    }

    public function ajax_list()
    {
        $tanggal1 = $this->input->post('tgl1');
        $tanggal2 = $this->input->post('tgl2');
        $marketing = $this->input->post('mkt');

        $no=0;
        $list = $this->M_Transaksi->get_data($tanggal1, $tanggal2, $marketing);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pelanggan) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $pelanggan->no_registrasi;
            $row[] = $pelanggan->nama_lengkap;
            $row[] = $pelanggan->alamat;
            $row[] = $pelanggan->alamat2;
            $row[] = $pelanggan->keterangan;
            $row[] = $pelanggan->tanggal_bayar;
            $row[] = $pelanggan->iuran;

            $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)"  onclick="setID('."'".$pelanggan->no_registrasi."'".')">'.$pelanggan->no_registrasi.'</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Transaksi->count_all($tanggal1, $tanggal2, $marketing),
            "recordsFiltered" => $this->M_Transaksi->count_filtered($tanggal1, $tanggal2, $marketing),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}