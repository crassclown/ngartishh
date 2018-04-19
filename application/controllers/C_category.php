<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_category extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("c_loginusers/"));
        }
	}
	
	public function index()
	{
        $this->load->view('users/layout/header');
        $this->load->view('users/category/all_category');	
        $this->load->view('users/layout/footer');
	}

	
}
