<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_loginusers extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('m_login');
		$this->load->database();		
	}
	
	public function index()
	{
		$this->load->view('users/login/v_login');
	}

	public function m_auth(){
		$email 		= $this->input->post('txtemail');
        $password 	= $this->input->post('txtpassword');
        $where = array(
            'email' => $email,
            'password' => md5($password)
            );
        $cek = $this->m_login->cek_login("users",$where)->num_rows();
        if($cek > 0){
     
            $data_session = array(
                'email' => $email,
                'status' => "login"
                );
     
            $session_save = $this->session->set_userdata($data_session);
     
			redirect(base_url("c_dashboard/"));
        }else{
            echo "Email or Password is wrong";
        }
	}

	//Log Out Process
    public function m_logout(){
		//$this->session->unset_userdata('email');

        $this->session->sess_destroy();
        redirect('c_loginusers/');
    }

	public function m_moveregister(){
		$this->load->view('users/register/v_register');
	}

}
