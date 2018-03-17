<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/11/2018
 * Time: 10:44 AM
 */
class Teknisi extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('operator/M_Teknisi');
    }

    function index()
    {
        $this->load->view('operator/v_header');
        $this->load->view('operator/v_teknisi');
        $this->load->view('operator/v_footer');
    }

    function teknisi_tambah()
    {
        $data = array(
            'teknisi' => $this->input->post('nama')
        );

        if($this->M_Teknisi->set_teknisi($data))
        {
            $this->session->set_flashdata('error', 'Data Berhasil Disimpan!');
            redirect('operator/Teknisi');
        }
        else
        {
            $this->session->set_flashdata('success', 'Gagal!');
            redirect('operator/Teknisi');
        }
    }
}