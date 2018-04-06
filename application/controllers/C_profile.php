<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_profile extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('m_users');
    }
	
	public function index()
	{
		$this->load->view('users/layout/header');
		$this->load->view('users/profile/content');
		$this->load->view('users/layout/footer');

	}

	public function m_users($id)
	{
		$data['profile'] = $this->m_users->get_users($id);
		$data['content'] = $this->m_users->get_usercontent($id);
		
		$this->load->view('users/profile/content', $data);
	}

}
