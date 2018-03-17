<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/11/2018
 * Time: 10:51 AM
 */
class M_Kolektor extends CI_Model{

    function set_kolektor($data)
    {
        $this->db->insert('tmst_kolektor', $data);
    }
}