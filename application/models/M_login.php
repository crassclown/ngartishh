<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class M_login extends CI_Model
{
    var $table = 'users';

    public function __construct()
	{
		parent::__construct();
		$this->load->database();
    }
    function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
    }
}