<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/11/2018
 * Time: 10:44 AM
 */
class Kolektor extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('operator/M_Kolektor');
    }

    function index()
    {
        $this->load->view('operator/v_header');
        $this->load->view('operator/v_kolektor');
        $this->load->view('operator/v_footer');
    }

    function kolektor_tambah()
    {
        $data = array(
            'kolektor' => $this->input->post('nama')
        );

        if($this->M_Kolektor->set_kolektor($data))
        {
            $this->session->set_flashdata('error', 'Data Berhasil Disimpan!');
            redirect('operator/Kolektor');
        }
        else
        {
            $this->session->set_flashdata('success', 'Gagal!');
            redirect('operator/Kolektor');
        }
    }
}