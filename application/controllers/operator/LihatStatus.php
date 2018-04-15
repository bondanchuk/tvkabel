<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/15/2018
 * Time: 11:39 AM
 */
class LihatStatus extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view('operator/v_header');
        $this->load->view('operator/view/v_lihatstatus');
    }
}