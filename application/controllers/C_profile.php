<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_profile extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('m_users');
    }
	
	public function index()
	{
		$data['users'] = $this->m_users->getAllusers();
		$this->load->view('users/profile/content', $data);
	}

	public function m_users($id)
	{
		$data['profile'] = $this->m_users->get_users($id);
		$data['content'] = $this->m_users->get_usercontent($id);
		
		$this->load->view('users/profile/content', $data);
	}

	public function m_editusers()
	{
		$varNama = $this->input->post('nama');
		$varPhone = $this->input->post('phone');
		$varBio = $this->input->post('bio');
		$id = $this->input->post('id');

		$data = array(
			'fullname'=>$varNama,
			'phone'=>$varPhone,
			'bio'=>$varBio
		);

		$result = $this->m_users->UpdateUsers($id,$data);

		if ($result){
			redirect('C_profile/m_users/'.$id.'');
		}else{
			redirect('C_profile/m_users/'.$id.'');
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
	}
}
