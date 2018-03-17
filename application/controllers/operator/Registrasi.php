<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/21/2017
 * Time: 8:43 PM
 */

class Registrasi extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('operator/M_Registrasi');
    }

    function index()
    {
        $data['noreg'] = $this->M_Registrasi->get_id();
        $data['kolektor'] = $this->M_Registrasi->get_kolektor();
        $data['teknisi'] = $this->M_Registrasi->get_teknisi();
        $data['marketing'] = $this->M_Registrasi->get_marketing();
        $this->load->view('operator/v_header');
        $this->load->view('operator/v_registrasi', $data);
        $this->load->view('operator/v_footer');
    }

    function tambah_pelanggan()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('no_registrasi', 'no_registrasi', 'required');

        if($this->form_validation->run() == FALSE)
        {
            redirect('operator/Registrasi');
        }
        else
        {
            $data_master = array(
                'no_registrasi' => $this->input->post('no_registrasi'),
                'no_ktp' => $this->input->post('no_ktp'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'alamat' => $this->input->post('alamat'),
                'no_rumah' => $this->input->post('no_rumah'),
                'keterangan_rumah' => $this->input->post('keterangan_rumah'),
                'keterangan_bangunan' => $this->input->post('keterangan_bangunan'),
                'blok' => $this->input->post('blok'),
                'gang' => $this->input->post('gang'),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'kelurahan' => $this->input->post('kelurahan'),
                'kecamatan' => $this->input->post('kecamatan'),
                'keterangan_alamat' => $this->input->post('keterangan_alamat'),
                'telp_rumah' => $this->input->post('telp_rumah'),
                'no_hp' => $this->input->post('no_hp'),
                'type_bangunan' => $this->input->post('keterangan_alamat'),
                'id_kolektor' => $this->input->post('pembayaran'),
                'status' => 'AKTIF',
                'jenis_pelanggan' => '1'
            );

            $data_tran = array(
                'no_registrasi' => $this->input->post('no_registrasi'),
                'tanggal_daftar' => $this->input->post('tanggal_daftar'),
                'id_teknisi' => $this->input->post('teknisi'),
                'id_marketing' => $this->input->post('marketing'),
                'jenis_pemasangan' => 'non-paralel'
            );



            if($this->M_Registrasi->pelanggan_tambah($data_master, $data_tran))
            {
                $this->session->set_flashdata('error', 'Data Berhasil Disimpan!');
                redirect('operator/Registrasi');
            }
            else
            {
                $this->session->set_flashdata('success', 'Gagal!');
                redirect('operator/Registrasi');
            }

        }
    }


}