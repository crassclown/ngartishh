<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    function m_getRecords(){
        //Select content records
        $this->db->select('*');
        $q = $this->db->get('content');
        $results = $q->result_array();

        return $results;
    }
}
