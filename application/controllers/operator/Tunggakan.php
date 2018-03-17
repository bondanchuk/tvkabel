<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 3/2/2018
 * Time: 9:38 PM
 */
class Tunggakan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('operator/M_Tunggakan');
    }

    function index()
    {
        $this->load->view('operator/v_header');
        $this->load->view('operator/v_tunggakan');
    }

    public function ajax_list()
    {
        $periode = $this->input->post('prd');
        $tahun = $this->input->post('thn');
        $nama = $this->input->post('nm');
        $kolektor = $this->input->post('klt');

        $no=0;
        $list = $this->M_Tunggakan->get_data($periode, $tahun, $nama, $kolektor);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pelanggan) {
            $no++;
            $row = array();
            $row[] = '<input type="checkbox" name="noreg[]" id="noreg" class="form-control checkbox" value="'.$pelanggan->no_registrasi.'" onchange="CekKwitansi('."'".$pelanggan->no_registrasi."'".')">';

            $row[] = $no;
            $row[] = $pelanggan->no_registrasi;
            $row[] = $pelanggan->nama_lengkap;
            $row[] = $pelanggan->alamat;
            $row[] = $pelanggan->alamat2;
            $row[] = $pelanggan->no_hp;
            $row[] = $pelanggan->keterangan;
            $row[] = $pelanggan->iuran;
            $row[] = $pelanggan->tg_terakhir;


            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Tunggakan->count_all($periode, $tahun, $nama, $kolektor),
            "recordsFiltered" => $this->M_Tunggakan->count_filtered($periode, $tahun, $nama, $kolektor),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}