<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/11/2018
 * Time: 10:51 AM
 */
class M_Teknisi extends CI_Model{

    function set_teknisi($data)
    {
        $this->db->insert('tmst_teknisi', $data);
    }
}