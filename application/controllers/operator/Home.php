<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/1/2017
 * Time: 10:40 PM
 */
class Home extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view('operator/v_header');
        $this->load->view('operator/v_dashboard');
        $this->load->view('operator/v_footer');
    }
}