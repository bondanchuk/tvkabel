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
        $pdf = new FPDF('l','mm',array(253 ,80));

        /*
        $this->db->select('*');
        $this->db->from('tmst_pelanggans');
        $this->db->set('where no_registrasis in("'.$id.'")', FALSE);
        */

        $mahasiswa = $this->M_Cetak->getCetak($id);

        foreach ($mahasiswa as $row){

            // membuat halaman baru
            $pdf->AddPage();
            // setting jenis font yang akan digunakan
            $pdf->SetFont('Arial','B',16);
            // mencetak string
            $pdf->Cell(190,7,'KWITANSI',0,1,'C');
            $pdf->SetFont('Arial','B',12);
            // Memberikan space kebawah agar tidak terlalu rapat
            $pdf->Cell(10,7,'',0,1);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(20,6,'No Reg',1,0);
            $pdf->Cell(85,6,'NAMA Lengkap',1,0);
            $pdf->Cell(27,6,'Alamat',1,0);
            $pdf->Cell(25,6,'Alamat Mutasi',1,1);
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(20,6,$row->no_registrasi,1,0);
            $pdf->Cell(85,6,$row->nama_lengkap,1,0);
            $pdf->Cell(27,6,$row->alamat,1,0);
            $pdf->Cell(25,6,$row->alamat2,1,1);
        }

        $filename= date("Y-m-d h:i:sa").'.pdf';
        $dir = "D:/"; // full path like C:/xampp/htdocs/file/file/
        $pdf->Output($dir.$filename, 'D');

        //$pdf->Output();

    }

}