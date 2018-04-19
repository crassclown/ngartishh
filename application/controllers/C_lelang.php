<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lelang extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('m_users');
   
		// $this->load->model('m_lelang');
    }
	
	public function index()
	{
        $data['categoriesmenu'] = $this->m_users->m_categoriesmenu();
		$data['categories'] = $this->m_users->m_categories();
		$ids = $this->session->userdata('Id');
		$data['foto'] = $this->m_users->get_users($ids);
		$this->load->view('users/layout/header', $data);
		$this->load->view('users/lelang/index', $data);
		$this->load->view('users/layout/footer');
	}

	public function m_detail_lelang()
	{
        $data['categoriesmenu'] = $this->m_users->m_categoriesmenu();
		$data['categories'] = $this->m_users->m_categories();
		$ids = $this->session->userdata('Id');
		$data['foto'] = $this->m_users->get_users($ids);
		$this->load->view('users/layout/header', $data);
		$this->load->view('users/lelang/detail_lelang', $data);
		$this->load->view('users/layout/footer');
	}
}