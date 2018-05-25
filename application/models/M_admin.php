<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function __construct(){
		parent::__construct();
    }
    
    //Cek Login
	function cek_login($table,$where)
	{		
		return $this->db->get_where($table,$where);
	}

	function m_get_count_post(){
		$q  = $this->db->query("SELECT category.name as namacategory, count(*) as total_content FROM category, content WHERE category.id = content.category_id GROUP BY content.category_id ORDER BY total_content DESC");
		if($q->num_rows() > 0)
		{
				foreach ($q->result() as $row)
				{
						$data[] = $row;
				}
				return $data;
		}
	}

	function m_get_count_users_post(){
		$q  = $this->db->query("SELECT users.fullname as namausers, count(*) as total_content FROM users, content WHERE users.id = content.user_id GROUP BY content.user_id ORDER BY total_content DESC");
		if($q->num_rows() > 0)
		{
				foreach ($q->result() as $row)
				{
						$data[] = $row;
				}
				return $data;
		}
	}

	function m_get_count_users_likes(){
		$q  = $this->db->query("SELECT content.title as judulcontent, count(*) as total_content FROM likes, content WHERE likes.content_id = content.id GROUP BY likes.content_id ORDER BY total_content DESC");
		if($q->num_rows() > 0)
		{
				foreach ($q->result() as $row)
				{
						$data[] = $row;
				}
				return $data;
		}
	}

	//Menampilkan Populer Buku berdasarkan jenis kelamin ke bentuk chart
	function m_get_count_auction($datajk){
		$q  = $this->db->query("SELECT category.name as namacategory, count(*) as total_dl FROM category, content, lelang WHERE category.id = content.category_id AND content.id = lelang.content_id AND end_date = '$datajk' GROUP BY lelang.content_id ORDER BY total_dl DESC");
		if($q->num_rows() > 0)
		{
				foreach ($q->result() as $row)
				{
						$data[] = $row;
				}
				return $data;
		}
	}
	
	function m_get_date($start_date,$end_date){
		$q  = $this->db->query("SELECT * FROM content, users, category WHERE category.id = content.category_id AND users.Id = content.user_id AND (content.created_at BETWEEN '$start_date' AND '$end_date')");
		if($q->num_rows() > 0)
		{
				foreach ($q->result() as $row)
				{
						$data[] = $row;
				}
				return $data;
		}
	}

	function m_category_tampil(){
		return $this->db->get('category');
	}

	function m_get_category($category){
		$q  = $this->db->query("SELECT *, content.desc as deskripsi FROM content, category WHERE category.id = content.category_id AND content.category_id='$category'");
		if($q->num_rows() > 0)
		{
				foreach ($q->result() as $row)
				{
						$data[] = $row;
				}
				return $data;
		}
	}

	
	function cek_category($category){
		$q  = $this->db->query("SELECT * FROM category WHERE Id = '$category'");
		if($q->num_rows() > 0)
		{
				foreach ($q->result() as $row)
				{
						$data[] = $row;
				}
				return $data;
		}
	}

	function m_get_auction($status){
		$q  = $this->db->query("SELECT *, content.desc as deskripsi FROM category, users, content, lelang WHERE category.Id = content.category_id AND users.Id = lelang.owner_id AND content.Id = lelang.content_id AND lelang.email_status='$status'");
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