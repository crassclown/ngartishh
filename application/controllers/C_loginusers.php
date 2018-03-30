<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_loginusers extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
		$this->load->model('m_users');
        $this->load->database();		
	}
    
    //Index Login
	public function index()
	{
		$this->load->view('users/login/v_login');
	}

    //Proses Login
	public function m_auth(){
		$email 		= $this->input->post('txtemail');
        $password 	= $this->input->post('txtpassword');
        $where = array(
            'email' => $email,
            'password' => md5($password)
            );
        $cek = $this->m_users->cek_login("users",$where)->num_rows();
        $query = $this->db->query("SELECT Id FROM users WHERE email='".$email."'");
        foreach($query->result_array() as $sqlnih){
            $iduser = $sqlnih['Id'];

            if($cek > 0){
                $data_session = array(
                    'email' => $email,
                    'Id' => $iduser,
                    'status' => "login"
                );
         
                $session_save = $this->session->set_userdata($data_session);
         
                redirect(base_url("c_dashboard/"));
            }else{
                $this->session->set_flashdata('error','Your password is wrong');
                redirect(base_url("c_loginusers/"));
            }
        }
	}

	//Log Out Process
    public function m_logout(){
        $this->session->sess_destroy();
        redirect('c_loginusers/');
    }

	public function m_moveregister(){
		$this->load->view('users/register/v_register');
	}

}
