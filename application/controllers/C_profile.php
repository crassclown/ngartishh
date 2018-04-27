<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_profile extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('m_users');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("c_loginusers/"));
        }
    }
	
	public function index()
	{
		$data['categoriesmenu'] = $this->m_users->m_categoriesmenu();
        $data['categories'] = $this->m_users->m_categories();
		$this->load->view('users/layout/header', $data);
		$this->load->view('users/profile/content', $data);
		$this->load->view('users/layout/footer');

	}

	public function m_resetverification()
	{
		$varEmail = $this->input->post('email');
		$varRegisteredEmail = $this->m_users->m_getregistered($varEmail);

		// $data = array(
		// 	'email' => $varEmail
		// );
		$encrypted_email = md5($varEmail);

		if($varEmail == $varRegisteredEmail){
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
			$this->email->send();

			$this->email->message(
					"terimakasih telah melakuan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>".
		site_url("register/verification/$encrypted_id")
		);
		}else{
			return false;
		}
	}

	public function m_galeri_lelang($id)
	{
		$data['categoriesmenu'] = $this->m_users->m_categoriesmenu();
		$data['profile'] = $this->m_users->get_users($id);
		$data['content'] = $this->m_users->get_usercontent($id);
		$data['totalfollowing'] = count($this->m_users->get_userfollowing($id));
		$data['totalfollower'] = count($this->m_users->get_userfollower($id));
		$data['categories'] = $this->m_users->m_categories();

		$ids = $this->session->userdata('Id');
		$data['foto'] = $this->m_users->get_users($ids);
		
		$this->load->view('users/layout/header', $data);
		$this->load->view('users/profile/galeri_lelang', $data);
		$this->load->view('users/layout/footer');
	}

	public function m_uploadlelang()
	{
		$now = date('Y-m-d');

		$varContent = $this->input->post('txttitle');
		$varStartingprice = $this->input->post('txthargaawal');
		$varOwner = $this->session->userdata('Id');
		$varStartingdate = $now;
		$varEnddate = date('Y-m-d', strtotime($now. ' + 7 days'));

		$data = array(
			'owner_id'=>$varOwner,
			'content_id'=>$varContent,
			'starting_price'=>$varStartingprice,
			'start_date'=>$varStartingdate,
			'end_date'=>$varEnddate
		);

		$result = $this->m_users->cekLelang($varOwner, $varContent);
		if(!isset($result))
		{
			$this->m_users->post_lelang($data);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function m_getLikedContentsUser($id)
	{
		$data = $this->m_users->get_likedcontent($id);

        echo json_encode($data);
	}

	public function m_upvote($id)
	{
		$data['categoriesmenu'] = $this->m_users->m_categoriesmenu();
		$data['profile'] = $this->m_users->get_users($id);
		$data['content'] = $this->m_users->get_lelang($id);
		$data['totalfollowing'] = count($this->m_users->get_userfollowing($id));
		$data['totalfollower'] = count($this->m_users->get_userfollower($id));
		$data['categories'] = $this->m_users->m_categories();

		$ids = $this->session->userdata('Id');
		$data['foto'] = $this->m_users->get_users($ids);
		
		$this->load->view('users/layout/header', $data);
		$this->load->view('users/profile/upvote', $data);
		$this->load->view('users/layout/footer');
	}

	public function m_users($id)
	{
		$data['categoriesmenu'] = $this->m_users->m_categoriesmenu();
		$data['profile'] = $this->m_users->get_users($id);
		$data['content'] = $this->m_users->get_usercontent($id);
		$data['totalfollowing'] = count($this->m_users->get_userfollowing($id));
		$data['totalfollower'] = count($this->m_users->get_userfollower($id));
		$data['categories'] = $this->m_users->m_categories();

		$ids = $this->session->userdata('Id');
		$data['foto'] = $this->m_users->get_users($ids);
		
		$this->load->view('users/layout/header', $data);
		$this->load->view('users/profile/content', $data);
		$this->load->view('users/layout/footer');
	}

	public function m_follower($id)
	{
		$data = $this->m_users->get_userfollower($id);
		echo json_encode($data);
	}

	public function m_following($id)
	{
		$data = $this->m_users->get_userfollowing($id);
		echo json_encode($data);
	}

	public function m_followercounter($id)
	{
		$data = count($this->m_users->get_userfollower($id));
		echo json_encode($data);
	}

	public function m_followingcounter($id)
	{
		$data = count($this->m_users->get_userfollowing($id));
		echo json_encode($data);
	}

	public function m_isfollowing($userid, $followedid)
	{
		$data = $this->m_users->isFollowing($userid, $followedid);
		if(!isset($data)){
			echo 'follow';
		}else {
			echo 'unfollow';
		}
	}

	public function m_cekfollowing($userid, $followedid)
	{
		$data = $this->m_users->isFollowing($userid, $followedid);
		echo json_encode($data);
	}

	public function m_getContentsUser($id){
		// get data
        $data = $this->m_users->m_getRecordsUser($id);

        echo json_encode($data);
    }

	public function m_getLelangUser($id){
		// get data
        $data = $this->m_users->get_userlelang($id);

        echo json_encode($data);
	}
	
	public function m_editusers()
	{
		$config['upload_path']   = './assets/images/profilepicture/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 20000;
		
		$this->load->library('upload', $config);

        if ($this->upload->do_upload('fotoprofil')) {
            $upload = $this->upload->data();
			
			$varUsername = $this->input->post('txtusername');
			$varPhone = $this->input->post('txtnotelp');
			$varBio = $this->input->post('txtbio');
			$id = $this->input->post('txtid');

			$data = array(
				'fotoprofil'=>$upload['file_name'],
				'username'=>$varUsername,
				'phone'=>$varPhone,
				'bio'=>$varBio
			);

			$result = $this->m_users->UpdateUsers($id,$data);
			redirect('c_profile/m_users/'.$id.'');
        } else {
			$error = $this->upload->display_errors();
            // var_dump($error);
            echo json_encode(array('status' => false, 'error' => $error));
		}
	}

	public function m_follows()
	{
		$varUserid = $this->input->post('userid');
		$varFollowedid = $this->input->post('followedid');

		$result = $this->m_users->cekFollowing($varUserid, $varFollowedid);
		if(!isset($result))
		{
			$this->m_users->userFollow($varUserid, $varFollowedid);
			
		}else {
			$this->m_users->userUnfollow($varUserid, $varFollowedid);	
		}
		redirect('c_profile/m_users/'.$varUserid.'');
	}
}
