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
        $this->load->library("PHPExcel");
    }

    function index()
    {
        $this->load->view('operator/v_header');
        $this->load->view('operator/v_tunggakan');
    }

    public function ajax_list()
    {
        $nama = $this->input->post('nama');
        $noreg = $this->input->post('almt');
        $alamat = $this->input->post('nm');
        $tunggakan = $this->input->post('tgkn');
        $prm_tunggakan = $this->input->post('parm');
        $tglbayar = $this->input->post('tglbyr');
        $status = $this->input->post('stts');

        $no=0;
        $list = $this->M_Tunggakan->get_data($nama, $noreg, $alamat, $tunggakan, $tglbayar, $status, $prm_tunggakan);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pelanggan) {
            $tanggal = $pelanggan->akhir_bayar;
            $tanggal = new DateTime($tanggal);
            $sekarang = new DateTime();

            $perbedaan = $tanggal->diff($sekarang);
            $months = $perbedaan->y * 12 + $perbedaan->m + $perbedaan->d / 30;


            $no++;
            $row = array();
            $row[] = '<input type="checkbox" name="noreg[]" id="noreg" class="form-control checkbox" value="'.$pelanggan->no_registrasi.'" onchange="CekKwitansi('."'".$pelanggan->no_registrasi."'".')">';

            $row[] = $no;
            $row[] = $pelanggan->no_registrasi;
            $row[] = $pelanggan->nama_lengkap;
            $row[] = $pelanggan->alamat;
            $row[] = $pelanggan->no_hp;
            $row[] = $pelanggan->status;
            $row[] = $pelanggan->tg_terakhir;
            $row[] = $pelanggan->jml_tunggakan;
            $row[] = $pelanggan->iuran;
            $row[] = $pelanggan->no_hp;


            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Tunggakan->count_all($nama, $noreg, $alamat, $tunggakan, $tglbayar, $status, $prm_tunggakan),
            "recordsFiltered" => $this->M_Tunggakan->count_filtered($nama, $noreg, $alamat, $tunggakan, $tglbayar, $status, $prm_tunggakan),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function Cetak($id)
    {
        $objPHPExcel = new PHPExcel();

        $data = $this->db->get("tran_pembayaran");

        // Nama Field Baris Pertama
        $fields = $data->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }

        // Mengambil Data
        $row = 2;
        foreach($data->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }

            $row++;
        }
        $objPHPExcel->setActiveSheetIndex(0);

        //Set Title
        $objPHPExcel->getActiveSheet()->setTitle('Data Absen');

        //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        //Header
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        //Nama File
        header('Content-Disposition: attachment;filename="absen.xlsx"');

        //Download
        $objWriter->save("php://output");
    }
}