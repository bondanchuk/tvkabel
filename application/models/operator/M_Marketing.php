<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/11/2018
 * Time: 10:51 AM
 */
class M_Marketing extends CI_Model{

    function set_marketing($data)
    {
        $this->db->insert('tmst_marketing', $data);
    }
}