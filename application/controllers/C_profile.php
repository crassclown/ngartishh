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
		$this->load->view('users/layout/header');
		$this->load->view('users/profile/content');
		$this->load->view('users/layout/footer');

	}

	public function m_users($id)
	{
		$data['profile'] = $this->m_users->get_users($id);
		$data['content'] = $this->m_users->get_usercontent($id);
		$data['following'] = $this->m_users->get_userfollowing($id);
		$data['follower'] = $this->m_users->get_userfollower($id);
		$data['totalfollowing'] = count($this->m_users->get_userfollowing($id));
		$data['totalfollower'] = count($this->m_users->get_userfollower($id));
		$data['categories'] = $this->m_users->m_categories();
		
		$this->load->view('users/layout/header');
		$this->load->view('users/profile/content', $data);
		$this->load->view('users/layout/footer');
	}

	public function m_getContentsUser($id){
		// get data
        $data = $this->m_users->m_getRecordsUser($id);

        echo json_encode($data);
    }

	public function m_editusers()
	{
		$config['upload_path']   = './assets/images/profilepicture/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 20000;
		
		$this->load->library('upload', $config);

        if (!$this->upload->do_upload('fotoprofil')) {
            $error = $this->upload->display_errors();
            // var_dump($error);
            echo json_encode(array('status' => false, 'error' => $error));
        } else {

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
		}
	}

	public function m_follows()
	{
		$varUserid = $this->input->post('userid');
		$varFollowedid = $this->input->post('followedid');

		$result = $this->m_users->cekFollowing($varUserid, $varFollowedid);
		if(!isset($result))
		{
			//$data['f'] = "Follow";
			//$this->load->view('users/profile/content', $data);
			$this->m_users->userFollow($varUserid, $varFollowedid);
			
		}else {
			//$data['f'] = "Unfollow";
			//$this->load->view('users/profile/content', $data);
			$this->m_users->userUnfollow($varUserid, $varFollowedid);	
		}
		redirect('c_profile/m_users/'.$varUserid.'');
	}
}
