<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/26/2017
 * Time: 9:24 PM
 */

class Mutasi extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('operator/M_Mutasi');
    }

    function index()
    {
        $this->load->model('operator/M_Registrasi');
        $data['teknisi'] = $this->M_Registrasi->get_teknisi();
        $this->load->view('operator/v_header');
        $this->load->view('operator/v_mutasi', $data);
        $this->load->view('operator/v_footer');
    }

    function mutasi_pelanggan()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('set_Noreg', 'no_registrasi', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', 'Data Berhasil Disimpan!');
            redirect('operator/Mutasi');
        }
        else
        {

            $data_mutasi = array(
                'no_registrasi' => $this->input->post('set_Noreg'),
                'tanggal_mutasi' => $this->input->post('tanggal_mutasi'),
                'alamat_mutasi' => $this->input->post('alamat2'),
                'id_teknisi' => $this->input->post('teknisi')
            );

            $noreg = $this->input->post('set_Noreg');
            $alamat2 = array(
                'alamat2' => $this->input->post('alamat2')
            );

            if($this->M_Mutasi->set_mutasi($data_mutasi, $noreg, $alamat2))
            {
                $this->session->set_flashdata('error', 'Data Berhasil Disimpan!');
                redirect('operator/Mutasi');
            }
            else
            {
                $this->session->set_flashdata('success', 'Gagal!');
                redirect('operator/Mutasi');
            }
        }
    }


}