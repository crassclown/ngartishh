<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_registerusers extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('m_register');
    }
	
	public function index()
	{
		$this->load->view('users/register/v_register');
	}

	public function m_register(){
        $data = array(
            'email' => $this->input->post('txtemail'),
            'fullname' => $this->input->post('txtfullname'),
            'password' => md5($this->input->post('txtpassword')),
        );
        if(isset($data)){
            $insert = $this->m_register->m_registerusers($data);
            // echo json_encode(array("status" => TRUE));
        }else{
            echo "Failed insert into database";
        }
        
	}

}
