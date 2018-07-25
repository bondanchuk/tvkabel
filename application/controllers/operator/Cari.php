<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 7/25/2018
 * Time: 8:08 PM
 */

class Cari extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('operator/M_Cari');
    }

    function index()
    {
        $this->load->view('operator/v_header');
        $this->load->view('operator/v_cari');
    }

    public function ajax_list()
    {
        $no=0;
        $list = $this->M_Cari->get_data();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pelanggan) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $pelanggan->nama_lengkap;
            $row[] = $pelanggan->alamat;
            $row[] = $pelanggan->no_hp;

            $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)"  onclick="setID('."'".$pelanggan->no_registrasi."',"."'".$pelanggan->nama_lengkap."',"."'".$pelanggan->alamat."',"."'".$pelanggan->alamat2."',"."'".$pelanggan->no_hp."',"."'".$pelanggan->kolektor."',"."'".$pelanggan->status."',"."'".$pelanggan->jenis_pelanggan."',"."'".$pelanggan->iuran."'".')">'.$pelanggan->no_registrasi.'</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Cari->count_all(),
            "recordsFiltered" => $this->M_Cari->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}