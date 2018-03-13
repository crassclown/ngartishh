<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class M_register extends CI_Model
{
    var $table = 'users';

    public function __construct()
	{
		parent::__construct();
		$this->load->database();
    }
    
    public function m_registerusers($data)
	{
		$this->db->insert('users', $data);
	}
}