<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/2/2017
 * Time: 10:10 AM
 */
class M_login extends CI_Model{

    function auth($data)
    {
        return $this->db->get_where('tbl_user', $data);
    }
}