<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/1/2017
 * Time: 9:24 AM
 */
class Login extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }

    function index()
    {
        $this->load->view('v_login');
    }

    function authentication()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('v_login');
        }else{
            $data = array(
                'username' => $this->input->post('username'),
                'password' => sha1($this->input->post('password'))
            );

            $validation = $this->M_login->auth($data);
            if($validation->num_rows() > 0)
            {
                foreach ($validation->result() as $item) {
                    $data_session['logged_in'] = 'login';
                    $data_session['id'] =  $item->id;
                    $data_session['username'] =  $item->username;
                    $data_session['level'] =  $item->level;

                    $this->session->set_userdata($data_session);
                }

                if($this->session->userdata('level')=='operator')
                {
                    redirect('operator/Home');
                }
            }else{
                $this->session->set_flashdata('error', 'Data Gagal Diupdate!');
                redirect('Login');
            }

        }
    }

}