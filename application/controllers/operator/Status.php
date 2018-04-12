<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/12/2018
 * Time: 8:46 PM
 */
class Status extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('operator/M_Registrasi');
    }

    function index()
    {
        $data['teknisi'] = $this->M_Registrasi->get_teknisi();
        $this->load->view('operator/v_header');
        $this->load->view('operator/v_status', $data);
        $this->load->view('operator/v_footer');
    }



}