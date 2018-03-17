<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/18/2018
 * Time: 10:15 PM
 */
class Marketing extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('operator/M_Marketing');
    }

    function index()
    {
        $this->load->view('operator/v_header');
        $this->load->view('operator/v_marketing');
        $this->load->view('operator/v_footer');
    }

    function marketing_tambah()
    {
        $data = array(
            'marketing' => $this->input->post('nama')
        );

        if($this->M_Marketing->set_marketing($data))
        {
            $this->session->set_flashdata('error', 'Data Berhasil Disimpan!');
            redirect('operator/Marketing');
        }
        else
        {
            $this->session->set_flashdata('success', 'Gagal!');
            redirect('operator/Marketing');
        }
    }
}