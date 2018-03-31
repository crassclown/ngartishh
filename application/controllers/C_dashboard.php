<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('m_dashboard');
		$this->load->model('m_users');
	}
	
	public function index()
	{
		$this->load->view('users/layout/header');
		$this->load->view('users/dashboard/index');
		$this->load->view('users/layout/footer');
	}

	// Call this method from AngularJS $http request
	public function m_getContents(){
		// get data
		$data = $this->m_dashboard->m_getRecords();
		echo json_encode($data);
	}

	public function m_detailContent($content_id, $user_id){
		$where = array(
            'Id' => $content_id,
            'user_id' => $user_id
        );
		$data['varambilusers'] = $this->m_dashboard->m_detailcontent($where,'content')->result();
		$this->load->view('users/dashboard/detail_content',$data);
	}

	public function m_bookmarked(){
		$data = array(
			'content_id' => $this->input->post('content_id'),
			'user_id' => $this->input->post('user_id')
		);
		$insert = $this->m_users->m_bookmark($data);
		echo json_encode(array("status" => TRUE));
		// if(isset($data)){
		// 	$insert = $this->m_users->m_bookmark($data);
		// }else{
		// 	echo json_encode($data);
		// }
	}
}