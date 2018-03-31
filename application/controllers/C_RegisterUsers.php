<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_registerusers extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('m_users');
    }
	
	public function index()
	{
		$this->load->view('users/register/v_register');
	}

	public function m_register(){
        $email = strtolower(trim($this->input->post('txtemail')));
        $data = array(
            'email' => strtolower(trim($this->input->post('txtemail'))),
            'fullname' => ucwords(trim($this->input->post('txtfullname'))),
            'password' => md5(trim($this->input->post('txtpassword')))
        );
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->session->set_flashdata('email_err','The email format was wrong');
        }else{
            if($this->m_users->m_check_email($email)){
                $this->session->set_flashdata('exists_email','The email was already exists');
            }else{
                if(isset($data)){
                    $insert = $this->m_users->m_registerusers($data);
                    // echo json_encode(array("status" => TRUE));
                    $this->session->set_flashdata('success','You have successfully joined');
                }else{
                    echo "Failed insert into database";
                }
            }
        }
        
	}

}
