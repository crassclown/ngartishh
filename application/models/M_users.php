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
}
