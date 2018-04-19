<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    function m_getRecords(){
        //Select content records
        $q = $this->db->query("SELECT *, users.fullname as namalengkap, content.Id as idcontent, content.user_id as iduser, content.created_at as tgl_posting FROM content LEFT JOIN users ON users.Id = content.user_id ORDER BY content.Id DESC");
        
        
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

    function m_getRecordsAjaxLike($content_id,$user_id){
        //Select content records
        $q = $this->db->query("SELECT *, users.fullname as namalengkap, content.Id as idcontent, content.user_id as iduser, content.created_at as tgl_posting FROM content LEFT JOIN users ON users.Id = content.user_id WHERE content.Id='$content_id' AND content.user_id='$user_id' LIMIT 1");
        
        
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

    function m_getDetailContentComment(){
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
        $q = $this->db->query("SELECT *, category.name as namakat, category.desc as desckat, users.fullname as namalengkap, users.fullname as namalengkap, users.Id as Iduser,  content.created_at as tgl_publish FROM content LEFT JOIN users ON users.Id = content.user_id LEFT JOIN category ON content.category_id = category.Id WHERE content.Id='$content_id' AND content.user_id='$user_id'");
        
        
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

    function m_searchCategory($id){
        //Select content records
        $q = $this->db->query("SELECT *, content.title as judulcontent, category.name as namakat, category.desc as desckat, users.fullname as namalengkap, users.Id as Iduser, content.desc as desccontent, content.Id as Idcontent FROM content LEFT JOIN users ON users.Id = content.user_id LEFT JOIN category ON content.category_id = category.Id WHERE content.category_id='$id' OR content.category_id LIKE '%$id%'");
        
        
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

    function m_searchbar($key){
        //Select content records
        $q = $this->db->query("SELECT DISTINCT *, content.title as judulcontent, category.name as namakat, category.desc as desckat, users.fullname as namalengkap, users.Id as Iduser, content.desc as desccontent, content.Id as Idcontent FROM content LEFT JOIN users ON users.Id = content.user_id LEFT JOIN category ON content.category_id = category.Id WHERE content.title LIKE '%$key%' OR content.title LIKE '%$key' OR content.title LIKE '$key%' LIMIT 5");        
        
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

    function m_searchbarusers($key){
        //Select content records
        $q = $this->db->query("SELECT DISTINCT *, users.bio as biousers, users.fullname as namalengkap, users.Id as userId FROM users WHERE users.fullname LIKE '%$key%' OR users.fullname LIKE '$key%' OR users.fullname LIKE '%$key' LIMIT 5");        
        
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
