<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/1/2018
 * Time: 2:02 PM
 */

class IuranKolektor extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('operator/M_Iuran');
        $this->load->helper('tgl_indonesia');

    }

    function index()
    {
        $this->load->view('operator/v_header');
        $this->load->view('operator/v_iurankolektor');
    }

    public function ajax_list()
    {
        $no=0;
        $list = $this->M_Iuran->get_data();
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

            $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)"  onclick="setID('."'".$pelanggan->no_registrasi."',"."'".$pelanggan->nama_lengkap."',"."'".$pelanggan->alamat."',"."'".$pelanggan->alamat2."',"."'".$pelanggan->no_hp."',"."'".$pelanggan->kolektor."',"."'".$pelanggan->status."',"."'".$pelanggan->jenis_pelanggan."',"."'".$pelanggan->iuran."'".')">'.$pelanggan->no_registrasi.'</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Iuran->count_all(),
            "recordsFiltered" => $this->M_Iuran->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }


    public function ajax_tunggakan($id)
    {

        $no=0;
        $list = $this->M_Iuran->get_tunggakan($id);
        $data = array();
        $no = $_POST['start'];



        foreach ($list as $pelanggan) {
            $start    = (new DateTime($pelanggan->Atanggal_bayar))->modify('first day of this month');
            $end      = (new DateTime(date("Y/m/d")))->modify('first day of next month');
            $interval = DateInterval::createFromDateString('1 month');
            $period   = new DatePeriod($start, $interval, $end);

            foreach ($period as $dt => $v) {

                if ($dt < 1) continue;
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = tgl_indo($v->format("Y-m"));
                $row[] = $pelanggan->iuran;
                $row[] = $pelanggan->kolektor;

                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $_POST['draw'],
            //"recordsTotal" => $this->M_Iuran->count_tunggakan($id),
            //"recordsFiltered" => $this->M_Iuran->tunggakan_filtered($id),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_pembayaran($id)
    {

        $no=0;
        $list = $this->M_Iuran->get_pembayaran($id);
        $data = array();
        $no = $_POST['start'];



        foreach ($list as $pelanggan) {
            $start    = (new DateTime($pelanggan->bayar_bulan))->modify('first day of this month');
            $end      = (new DateTime(date("Y/m/d")))->modify('first day of next month');
            $interval = DateInterval::createFromDateString('1 month');
            $period   = new DatePeriod($start, $interval, $end);

                $no++;
                $row = array();
                $row[] = $no;
                $row[] = tgl_indo($pelanggan->bayar_bulan);
                $row[] = $pelanggan->iuran;
                $row[] = $pelanggan->kolektor;
                $row[] = $pelanggan->tanggal_bayar;

                $data[] = $row;

        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Iuran->count_pembayaran($id),
            "recordsFiltered" => $this->M_Iuran->pembayaran_filtered($id),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function pembayaran()
    {
        $bulan = $this->input->post('bulan');
        $bulanan = $this->input->post('bulanan');
        $noreg = $this->input->post('set_Noreg');
        $tanggal_bayar = $this->input->post('tanggal_bayar');
        $status = $this->input->post('status');

        if($this->M_Iuran->pembayaran_tambah($bulan, $bulanan, $noreg, $tanggal_bayar, $status))
        {
            $this->session->set_flashdata('error', 'Data Berhasil Disimpan!');
            redirect('operator/IuranKolektor');
        }
        else
        {
            $this->session->set_flashdata('success', 'Gagal!');
            redirect('operator/IuranKolektor');
        }

    }
}