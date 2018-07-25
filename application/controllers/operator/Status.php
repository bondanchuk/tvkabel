<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/12/2018
 * Time: 8:46 PM
 */
class Status extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('operator/M_Registrasi');
        $this->load->model('operator/M_Paralel');
        $this->load->model('operator/M_Status');
    }

    function index()
    {
        $data['teknisi'] = $this->M_Registrasi->get_teknisi();
        $this->load->view('operator/v_header');
        $this->load->view('operator/v_status', $data);
    }

    public function ajax_list()
    {
        $no=0;
        $list = $this->M_Paralel->get_data();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pelanggan) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $pelanggan->nama_lengkap;
            $row[] = $pelanggan->alamat;
            $row[] = $pelanggan->no_hp;

            $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)"  onclick="setID('."'".$pelanggan->no_registrasi."',"."'".$pelanggan->nama_lengkap."',"."'".$pelanggan->alamat."',".')">'.$pelanggan->no_registrasi.'</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Paralel->count_all(),
            "recordsFiltered" => $this->M_Paralel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }


    public function ajax_biodata($id)
    {
        $no=0;
        $list = $this->M_Status->get_data($id);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pelanggan) {
            $no++;
            $row = array();
            $row[] = $pelanggan->nama_lengkap;
            $row[] = $pelanggan->alamat;
            $row[] = $pelanggan->tanggal_pasang;
            $row[] = $pelanggan->jenis_pelanggan;
            $row[] = $pelanggan->status;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Status->count_all(),
            "recordsFiltered" => $this->M_Status->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function status_pelanggan()
    {
        $data = array(
            'no_registrasi' => $this->input->post('set_Noreg'),
            'tanggal_status' => $this->input->post('tanggal_status'),
            'status' => $this->input->post('status'),
            'uraian' => $this->input->post('uraian'),
            'id_teknisi' => $this->input->post('teknisi')
        );

        $tmst = array(
            'status' => $this->input->post('status'),
        );
        $noreg = $this->input->post('set_Noreg');

        if($this->M_Status->status_tambah($data, $tmst, $noreg))
        {
            $this->session->set_flashdata('error', 'Data Berhasil Disimpan!');
            redirect('operator/Status');
        }
        else
        {
            $this->session->set_flashdata('success', 'Gagal!');
            redirect('operator/Status');
        }
    }


}