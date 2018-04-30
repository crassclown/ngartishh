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
		$email 		= strtolower(trim($this->input->post('txtemail')));
        $password 	= $this->input->post('txtpassword');
        $where      = array(
            'email'     => $email,
			'password'  => md5(trim($password)),
			'status' => '1'
        );
        $cek        = $this->m_users->cek_login("users",$where)->num_rows();
        
        if($cek > 0){
            $query          = $this->db->query("SELECT Id, fullname FROM users WHERE email='".$email."' LIMIT 1");
            foreach($query->result_array() as $sqlnih){
                $iduser         = $sqlnih['Id'];
                $fullname       = $sqlnih['fullname'];
                $data_session   = array(
                    'email'     => $email,
                    'name'      => $fullname,
                    'Id'        => $iduser,
                    'status'    => "login"
                );
        
                $session_save   = $this->session->set_userdata($data_session);
                
                // $sess_name      = $this->session->set_userdata($fullname);
                redirect(base_url("c_dashboard/"));
            }
        }else{
            $this->session->set_flashdata('error','Your email or password is wrong');
            redirect(base_url("c_loginusers/"));
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

	public function m_lupapassword()
	{
		$this->load->view('users/login/v_lupapassword');
    }
    
    public function m_lupapassword_gantipassword($encrypted_email)
	{
		$this->load->view('users/login/v_lupapassword_gantipassword');
	}

	public function m_resetverification()
	{
		$varEmail = $this->input->post('email');
		$varRegisteredEmail = $this->m_users->m_getregistered($varEmail);

		// $data = array(
		// 	'email' => $varEmail
		// );
		$encrypted_email = md5($varEmail);

		if(isset($varEmail)){
			$config = array();
			$config['charset'] = 'utf-8';
			$config['useragent'] = 'Codeigniter';
			$config['protocol']= "smtp";
			$config['mailtype']= "html";
			$config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
			$config['smtp_port']= "465";
			$config['smtp_timeout']= "400";
			$config['smtp_user']= "adm.ngartish@gmail.com"; // isi dengan email kamu
			$config['smtp_pass']= "ngartish3220"; // isi dengan password kamu
			$config['crlf']="\r\n"; 
			$config['newline']="\r\n"; 
			$config['wordwrap'] = TRUE;
			//memanggil library email dan set konfigurasi untuk pengiriman email
		
			$this->email->initialize($config);
			//konfigurasi pengiriman
			$this->email->from($config['smtp_user']);
			$this->email->to($varEmail);
			$this->email->subject("Reset Password");

			$this->email->message(
					"untuk mengganti password anda, silahkan klik tautan dibawah ini<br><br>".
					base_url("c_loginusers/m_lupapassword_gantipassword/$encrypted_email")
			);

			if($this->email->send())
			{	
				$this->session->set_flashdata('success','Silahkan periksa email anda untuk ganti password');
			}else
			{
				echo "Email tidak terkirim";
			}
		}else{
			return false;
		}
	}

	//reset password goes here
	public function m_resetpassword()
	{
		$varEmail = $this->input->post('email');
		$varNewpassword = md5($this->input->post('password'));

		$this->m_users->do_resetpassword($varEmail, $varNewpassword);
	}

}
