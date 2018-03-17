<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/26/2018
 * Time: 9:46 AM
 */
class LihatMutasi extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('operator/M_Mutasi');

    }

    function index()
    {
        $this->load->view('operator/v_header');
        $this->load->view('operator/view/v_lihatmutasi');
    }

    public function ajax_list()
    {
        $tanggal1 = $this->input->post('tgl1');
        $tanggal2 = $this->input->post('tgl2');
        $no=0;
        $list = $this->M_Mutasi->get_data($tanggal1, $tanggal2);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pelanggan) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $pelanggan->no_registrasi;
            $row[] = $pelanggan->nama_lengkap;
            $row[] = $pelanggan->alamat;
            $row[] = $pelanggan->alamat2;
            $row[] = $pelanggan->tanggal_mutasi;
            $row[] = $pelanggan->no_hp;

            $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)"  onclick="setID('."'".$pelanggan->no_registrasi."'".')">'.$pelanggan->no_registrasi.'</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Mutasi->count_all($tanggal1, $tanggal2),
            "recordsFiltered" => $this->M_Mutasi->count_filtered($tanggal1, $tanggal2),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }


    public function ajax_id()
    {
        $like = array(
            'nama_lengkap' => $this->input->post('nama'),
            'tmst_pelanggan.no_registrasi' => $this->input->post('noreg'),
            'alamat' => $this->input->post('alamat'),
            'no_rumah' => $this->input->post('norumah'),
            'no_hp' => $this->input->post('nohp')
        );

        $no=0;
        $list = $this->M_Mutasi->get_id($like);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pelanggan) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $pelanggan->no_registrasi;
            $row[] = $pelanggan->nama_lengkap;
            $row[] = $pelanggan->alamat;
            $row[] = $pelanggan->alamat2;
            $row[] = $pelanggan->tanggal_mutasi;
            $row[] = $pelanggan->no_hp;

            $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)"  onclick="setAjax('."'".$pelanggan->no_registrasi."'".')">'.$pelanggan->no_registrasi.'</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Mutasi->count_id($like),
            "recordsFiltered" => $this->M_Mutasi->count_filtered_id($like),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($noreg) {
        $data = $this->M_Mutasi->get_by_noreg($noreg);
        echo json_encode($data);
    }

    public function update_mutasi(){
        $noreg = $this->input->post('set_noregistrasi');
        $data_pelanggan = array(
          'alamat2' => $this->input->post('set_alamat2')
        );
        $data_mutasi = array(
            'alamat_mutasi' => $this->input->post('set_alamat2')
        );

        if (!$this->M_Mutasi->update_data($noreg, $data_pelanggan, $data_mutasi)) {

            redirect('operator/LihatMutasi');
        } else {
            $this->session->set_flashdata("pesan", "<div  class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal</div></div>");
            redirect('operator/LihatMutasi');
        }
    }

    public function hapus_data($noreg) {
        $this->M_Mutasi->hapus_mutasi($noreg);
        echo json_encode(array("status" => TRUE));
    }
}