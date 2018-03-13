<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // $this->load->model('m_login');
        if($this->session->userdata('status') != "login"){
			redirect(base_url("c_loginusers/"));
		}
	}
	
	public function index()
	{
		$this->load->view('users/dashboard/index');
	}
}