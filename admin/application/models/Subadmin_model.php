<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subadmin_model extends CI_Model
{
    public function getlogindata($username, $password)
    {
        $data = $this->db->where('email', $username)->where('opassword', $password)->get('sub_admins')->num_rows();
        return $data;
    }

    public function getsuperadmin($username, $password)
    {
        $data = $this->db->where('email', $username)->where('opassword', $password)->get('sub_admins')->row_array();
        return $data;
    }
}