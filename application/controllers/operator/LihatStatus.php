<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/15/2018
 * Time: 11:39 AM
 */
class LihatStatus extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('operator/M_Status');
    }

    function index()
    {
        $this->load->view('operator/v_header');
        $this->load->view('operator/view/v_lihatstatus');
    }

    public function ajax_list()
    {
        $tanggal1 = $this->input->post('tgl1');
        $tanggal2 = $this->input->post('tgl2');
        $no=0;
        $list = $this->M_Status->get_status_tanggal($tanggal1, $tanggal2);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pelanggan) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $pelanggan->no_registrasi;
            $row[] = $pelanggan->nama_lengkap;
            $row[] = $pelanggan->alamat;
            $row[] = $pelanggan->tanggal_status;
            $row[] = $pelanggan->status;
            $row[] = $pelanggan->uraian;

            $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)"  onclick="setID('."'".$pelanggan->no_registrasi."'".')">'.$pelanggan->no_registrasi.'</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Status->tanggal_count_all($tanggal1, $tanggal2),
            "recordsFiltered" => $this->M_Status->tanggal_count_filtered($tanggal1, $tanggal2),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }


    public function ajax_id()
    {
        $like = array(
            'nama_lengkap' => $this->input->post('nama'),
            'tmst_pelanggan.no_registrasi' => $this->input->post('noreg'),
            'alamat' => $this->input->post('alamat'),
            'no_rumah' => $this->input->post('norumah'),
            'no_hp' => $this->input->post('nohp')
        );

        $no=0;
        $list = $this->M_Status->get_status_data($like);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pelanggan) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $pelanggan->no_registrasi;
            $row[] = $pelanggan->nama_lengkap;
            $row[] = $pelanggan->alamat;
            $row[] = $pelanggan->tanggal_status;
            $row[] = $pelanggan->status;
            $row[] = $pelanggan->uraian;

            $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)"  onclick="setAjax('."'".$pelanggan->no_registrasi."'".')">'.$pelanggan->no_registrasi.'</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Status->status_count_id($like),
            "recordsFiltered" => $this->M_Status->status_count_filtered_id($like),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}