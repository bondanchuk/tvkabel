<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2/14/2018
 * Time: 9:00 AM
 */
class CetakKwitansi extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('operator/M_Registrasi');
        $this->load->model('operator/M_Cetak');
        $this->load->library('pdf');


    }

    function index()
    {
        $data['kolektor'] = $this->M_Registrasi->get_kolektor();
        $this->load->view('operator/v_header', $data);
        $this->load->view('operator/v_cetak');
    }

    public function ajax_list()
    {
        $periode = $this->input->post('prd');
        $tahun = $this->input->post('thn');
        $nama = $this->input->post('nm');
        $kolektor = $this->input->post('klt');

        $no=0;
        $list = $this->M_Cetak->get_data($periode, $tahun, $nama, $kolektor);
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
            "recordsTotal" => $this->M_Cetak->count_all($periode, $tahun, $nama, $kolektor),
            "recordsFiltered" => $this->M_Cetak->count_filtered($periode, $tahun, $nama, $kolektor),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    function Cetak($id)
    {
        $pdf = new FPDF('l','mm',array(217 ,69.9));

        $mahasiswa = $this->M_Cetak->getCetak($id);

        foreach ($mahasiswa as $row){

            $pdf->AddPage();
            $pdf->SetAutoPageBreak(off);

            $pdf->SetFont('Courier','',10);
            //nopel
            $pdf->Cell(177,6, '',0,0);
            $pdf->Cell(30,10,$row->no_registrasi,0,0);
            //nama
            $pdf->Cell(-168,6, '',0,0);
            $pdf->Cell(30,30,$row->nama_lengkap,0,0);
            //alamat
            $pdf->Cell(-30,6, '',0,0);
            $pdf->Cell(30,39,$row->alamat,0,0);
            //jumlah tv
            $pdf->Cell(107,6, '',0,0);
            $pdf->Cell(30,38,$row->keterangan,0,0);
            //iuran
            $pdf->Cell(0,6, '',0,0);
            $pdf->Cell(30,59,$row->iuran,0,0);



        }

        $filename= date("Y-m-d h:i:sa").'.pdf';
        $dir = "D:/"; // full path like C:/xampp/htdocs/file/file/
        $pdf->Output($dir.$filename, 'D');

        //$pdf->Output();

    }

}