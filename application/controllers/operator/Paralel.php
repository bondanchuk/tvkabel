<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/25/2017
 * Time: 9:05 PM
 */

class Paralel extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('operator/M_Paralel');
    }

    function index()
    {
        $this->load->model('operator/M_Registrasi');
        $data['teknisi'] = $this->M_Registrasi->get_teknisi();
        $data['marketing'] = $this->M_Registrasi->get_marketing();
        $this->load->view('operator/v_header');
        $this->load->view('operator/v_paralel', $data);
        $this->load->view('operator/v_footer');
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
            $row[] = $pelanggan->no_rumah;
            $row[] = $pelanggan->blok;
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


    function tambah_pelanggan()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('set_Noreg', 'no_registrasi', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', 'Data Berhasil Disimpan!');
            redirect('operator/Paralel');
        }
        else
        {
            $data_paralel =  array(
                'no_registrasi' => $this->input->post('set_Noreg'),
                'tanggal_daftar' => $this->input->post('tanggal_daftar'),
                'id_teknisi' => $this->input->post('teknisi'),
                'id_marketing' => $this->input->post('marketing'),
                'jenis_pemasangan' => 'paralel'
            );

            $data_update = $this->input->post('set_Noreg');

            if($this->M_Paralel->pelanggan_tambah($data_paralel, $data_update))
            {
                $this->session->set_flashdata('error', 'Data Berhasil Disimpan!');
                redirect('operator/Paralel');
            }
            else
            {
                $this->session->set_flashdata('success', 'Gagal!');
                redirect('operator/Paralel');
            }

        }
    }
}