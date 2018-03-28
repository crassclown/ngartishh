<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model
{

    public function __construct(){
		parent::__construct();
	}
	var $table = 'users';

	public function m_registerusers($data)
	{
		$this->db->insert('users', $data);
	}

	function cek_login($table,$where)
	{		
		return $this->db->get_where($table,$where);
	}
	
	public function getAllusers()
	{
		$result = $this->db->get('users');
		return $result->result();
	}

	public function get_users($id)
	{
		$result = $this->db->where('id', $id)->get('users')->result();
		return $result;
	}

	public function get_usercontent($id)
	{
		$result = $this->db->where('user_id', $id)->get('content')->result();
		return $result;
	}

	public function UpdateUsers($id,$data){
		$checkupdate = false;
		
		try{
			$this->db->where('Id',$id);
			$this->db->update('users',$data);
			$checkupdate = true;
		}catch (Exception $ex) {
			
			$checkupdate = false;
		}
		
		return $checkupdate; 
		
	}
	
	public function DeleteUsers($id){
		$checkupdate = false;
		
		try{
			$this->db->where('Id',$id);
			$this->db->delete('users');
			$checkupdate = true;
		}catch (Exception $ex) {
			
			$checkupdate = false;
		}
		
		return $checkupdate; 
		
	}
}
