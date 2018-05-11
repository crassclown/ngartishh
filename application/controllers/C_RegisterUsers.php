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
            'email'     => strtolower(trim($this->input->post('txtemail'))),
            'fullname'  => ucwords(trim($this->input->post('txtfullname'))),
            'password'  => md5(trim($this->input->post('txtpassword'))),
            'phone'     => $this->input->post('txtphone'),
			'created_at'=> date('Y-m-d H:i:s'),
			'status' 	=> '1'
		);
		
		// $encrypted_email = md5($email);
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
		
		// $config = array();
		// $config['charset'] = 'utf-8';
		// $config['useragent'] = 'Codeigniter';
		// $config['protocol']= "smtp";
		// $config['mailtype']= "html";
		// $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
		// $config['smtp_port']= "465";
		// $config['smtp_timeout']= "400";
		// $config['smtp_user']= "adm.ngartish@gmail.com"; // isi dengan email kamu
		// $config['smtp_pass']= "ngartish3220"; // isi dengan password kamu
		// $config['crlf']="\r\n"; 
		// $config['newline']="\r\n"; 
		// $config['wordwrap'] = TRUE;
		// //memanggil library email dan set konfigurasi untuk pengiriman email
		
		// $this->email->initialize($config);
		// //konfigurasi pengiriman
		// $this->email->from($config['smtp_user']);
		// $this->email->to($email);
		// $this->email->subject("Aktivasi Akun");
		// $this->email->set_header('Aktivasi Akun', '$encrypted_email');

		// $this->email->message(
		// 	"untuk mengaktifkan akun anda, silahkan klik tautan dibawah ini<br><br>".
		// 	base_url("C_RegisterUsers/m_activation/$encrypted_email")
		// );

		// if($this->email->send())
		// {	
		// 	$this->session->set_flashdata('success','Silahkan periksa email anda untuk aktivasi akun');
		// }else
		// {
		// 	echo "Email tidak terkirim";
		// }
        
	}

	public function m_activation($key)
	{
		$this->m_users->m_activateusers($key);
		$this->session->set_flashdata('success','Aktivasi akun berhasil');
		$this->load->view('users/layout/congratulation');
	}

}
