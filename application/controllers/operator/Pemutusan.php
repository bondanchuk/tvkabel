<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/24/2017
 * Time: 10:45 AM
 */

class Pemutusan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('operator/M_Pemutusan');
    }

    function index()
    {
        $this->load->view('operator/v_header');
        $this->load->view('operator/v_pemutusan');
    }

    public function ajax_list()
    {
        $no=0;
        $list = $this->M_Pemutusan->get_data();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pelanggan) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $pelanggan->nama_lengkap;
            $row[] = $pelanggan->alamat;
            $row[] = $pelanggan->no_hp;

            $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)"  onclick="setID2('."'".$pelanggan->no_registrasi."',"."'".$pelanggan->nama_lengkap."',"."'".$pelanggan->keterangan."'".')">'.$pelanggan->no_registrasi.'</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Pemutusan->count_all(),
            "recordsFiltered" => $this->M_Pemutusan->count_filtered(),
            "data" => $data,
        );

        //output to json format
        echo json_encode($output);

    }


    function tambah_pemutusan()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('set_Noreg', 'no_registrasi', 'required');

        $status = $this->input->post('status');

        if($status == "Putus Paralel")
        {
            $data_pemutusan =  array(
                'no_registrasi' => $this->input->post('set_Noreg'),
                'tanggal_putus' => $this->input->post('tanggal_pemutusan'),
                'jenis_pemutusan' => $this->input->post('status'),
                'keterangan' => $this->input->post('keterangan')
            );

            $data_update =  $this->input->post('jenis_pelanggan');

            $noreg = $this->input->post('set_Noreg');

            if($this->M_Pemutusan->pemutusan_tambah1($data_pemutusan, $data_update, $noreg))
            {
                $this->session->set_flashdata('error', 'Data Berhasil Disimpan!');
                redirect('operator/Pemutusan');
            }
            else
            {
                $this->session->set_flashdata('success', 'Gagal!');
                redirect('operator/Pemutusan');
            }

        }else{
            if($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('error', 'Data Berhasil Disimpan!');
                redirect('operator/Pemutusan');
            }
            else
            {
                $data_pemutusan =  array(
                    'no_registrasi' => $this->input->post('set_Noreg'),
                    'tanggal_putus' => $this->input->post('tanggal_pemutusan'),
                    'jenis_pemutusan' => $this->input->post('status'),
                    'keterangan' => $this->input->post('keterangan')
                );

                $data_update =  array(
                    'status' => $this->input->post('status')
                );

                $noreg = $this->input->post('set_Noreg');

                if($this->M_Pemutusan->pemutusan_tambah2($data_pemutusan, $data_update, $noreg))
                {
                    $this->session->set_flashdata('error', 'Data Berhasil Disimpan!');
                    redirect('operator/Pemutusan');
                }
                else
                {
                    $this->session->set_flashdata('success', 'Gagal!');
                    redirect('operator/Pemutusan');
                }

            }
        }


    }
}