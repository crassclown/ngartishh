<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lelang extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // $this->load->model('m_lelang');
    }
	
	public function index()
	{
		$this->load->view('users/layout/header');
		$this->load->view('users/lelang/index');
		$this->load->view('users/layout/footer');

	}
}