<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('m_dashboard');
        if($this->session->userdata('status') != "login"){
			redirect(base_url("c_loginusers/"));
		}
	}
	
	public function index()
	{
		$this->load->view('users/dashboard/index');
	}

	// Call this method from AngularJS $http request
	public function m_getContents(){
		// get data
		$data = $this->m_dashboard->m_getRecords();
		echo json_encode($data);
	}
}
