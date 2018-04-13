<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    function m_getRecords(){
        //Select content records
        $q = $this->db->query("SELECT *, users.fullname as namalengkap, content.Id as idcontent, content.user_id as iduser, content.created_at as tgl_posting FROM content LEFT JOIN users ON users.Id = content.user_id");
        
        
        if($q->num_rows() > 0)
        {
            // we will store the results in the form of class methods by using $q->result()
            // if you want to store them as an array you can use $q->result_array()
            foreach ($q->result() as $row)
            {
            $data[] = $row;
            }
            return $data;
        }
    }

    function m_detailcontent($where,$table){		
        return $this->db->get_where($table,$where);
    }

    function m_nameOnContent($content_id,$user_id){
        //Select content records
        $q = $this->db->query("SELECT *, users.fullname as namalengkap, users.fullname as namalengkap FROM content LEFT JOIN users ON users.Id = content.user_id WHERE content.Id='$content_id' AND content.user_id='$user_id'");
        
        
        if($q->num_rows() > 0)
        {
            // we will store the results in the form of class methods by using $q->result()
            // if you want to store them as an array you can use $q->result_array()
            foreach ($q->result() as $row)
            {
            $data[] = $row;
            }
            return $data;
        }
    }
}
