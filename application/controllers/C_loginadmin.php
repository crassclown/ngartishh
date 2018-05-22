<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_loginadmin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('m_admin');
        $this->load->database();
    }

    //Index Login
	public function index()
	{
		$this->load->view('admin/index');
    }

    //Proses Login
	public function m_auth(){
		$username 		= strtolower(trim($this->input->post('txtusername')));
        $password 	    = $this->input->post('txtpassword');
        $where          = array(
            'username'     => $username,
			'password'  => md5(trim($password))
        );
        $cek        = $this->m_admin->cek_login("admin",$where)->num_rows();
        
        if($cek > 0){
            $query          = $this->db->query("SELECT Id, nama FROM admin WHERE username='".$username."' LIMIT 1");
            foreach($query->result_array() as $sqlnih){
                $iduser         = $sqlnih['Id'];
                $nama           = $sqlnih['nama'];
                $data_session   = array(
                    'username'      => $username,
                    'nama'          => $nama,
                    'Id'            => $iduser,
                    'status'        => "login"
                );
        
                $session_save   = $this->session->set_userdata($data_session);
                
                // $sess_name      = $this->session->set_userdata($fullname);
                redirect(base_url("c_admin/"));
            }
        }else{
            $this->session->set_flashdata('error','Your email or password is wrong');
            redirect(base_url("c_loginusers/"));
        }
	}
    
    //Log Out Process
    public function m_logout(){
        $this->session->sess_destroy();
        redirect('c_loginadmin/');
    }
}