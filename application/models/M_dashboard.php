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

    function m_getlelang(){
        //Select content records
        $result = $this->db->select('users.Id as userId, lelang.Id as idlela, lelang.content_id as idcontent, fullname, phone, photos, fotoprofil, (end_date - date(now())) as durasi');
		$result = $this->db->from('lelang');
        $result = $this->db->join('content', 'content.Id = lelang.content_id');
        $result = $this->db->join('users', 'users.Id = lelang.owner_id');
        $result = $this->db->order_by('lelang.Id','desc');
		$result = $this->db->get();
		
		if($result->num_rows() > 0)
        {
            foreach ($result->result() as $row)
            {
            	$data[] = $row;
			}
			
            return $data;
        }
    }

    function m_detailcontentlela($where,$table){
        return $this->db->get_where($table,$where);
    }

    function m_nameOnContentlela($content_id,$user_id,$lela_id){
        //Select content records
        $q = $this->db->query("SELECT *,(end_date - date(now())) as durasi, starting_price, winner_price, content.photos as photocontent, lelang.Id as lelaid, lelang.content_id as contentid, users.fullname as namalengkap, users.Id as Iduser,  lelang.start_date as tgl_lelang, lelang.end_date as tgl_selesai, content.title as judulcontent FROM lelang LEFT JOIN users ON users.Id = lelang.owner_id LEFT JOIN content ON lelang.content_id = content.Id WHERE lelang.content_id='$content_id' AND lelang.owner_id='$user_id' AND lelang.Id='$lela_id'");
        
        
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

    function m_added_lelang($winner_price,$winner_id,$Idlela){
        //Select content records
		$q = $this->db->query("UPDATE lelang SET winner_id = '$winner_id', winner_price='$winner_price' WHERE Id='$Idlela'");
    }

    function m_load_lelang($kode){
        //Select content records
		$q = $this->db->query("SELECT DISTINCT users.fullname as namaygcomment, winner_lelang.winner_price as hargatawar, users.Id as userid FROM lelang, winner_lelang, users WHERE lelang.Id = winner_lelang.lelang_id AND users.Id = winner_lelang.winner_id AND lelang.Id='$kode' ORDER BY winner_lelang.winner_price DESC ");
       
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
            	$data[] = $row;
			}
			
            return $data;
        }
    }
    
    function m_lelang_harga($kode){
        //Select content records
		$q = $this->db->query("SELECT DISTINCT winner_price, starting_price FROM lelang WHERE lelang.Id='$kode'");
       
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
            	$data[] = $row;
			}
			
            return $data;
        }
	}
}
