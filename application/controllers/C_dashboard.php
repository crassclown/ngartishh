<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('m_dashboard');
		$this->load->model('m_users');
        if($this->session->userdata('status') != "login"){
			redirect(base_url("c_loginusers/"));
		}
	}
	
	public function index()
	{
		$this->load->view('users/dashboard/index');
	}

	// Call this method from AngularJS $http request
	public function m_getContents(){
		// get data
		$data = $this->m_dashboard->m_getRecords();
		
		echo json_encode($data);
	}

	public function m_detailContent($content_id, $user_id){
		$where = array(
            'Id' => $content_id,
            'user_id' => $user_id
        );
		$data['varambilusers'] = $this->m_dashboard->m_detailcontent($where,'content')->result();
		$this->load->view('users/dashboard/detail_content',$data);
	}

	public function m_bookmarked(){
		$data = array(
			'content_id' => $this->input->post('content_id'),
			'user_id' => $this->input->post('user_id')
		);
		// $insert = $this->m_users->m_bookmark($data);
		// echo json_encode(array("status" => TRUE));
		if(isset($data)){
			$insert = $this->m_users->m_bookmark($data);
		}else{
			echo "Failed insert into database";
		}
	}

	public function m_like(){
        $data = array(
            'content_id' => $this->input->post('content_id'),
            'user_id' => $this->input->post('user_id')
        );
        if(isset($data)){
            $insert = $this->m_users->m_liked($data);
            // echo json_encode(array("status" => TRUE));
        }else{
            echo "Failed insert into database";
        }
        
	}

	public function m_added_comments(){
        $data = array(
			'user_id' => $_POST['txtuser_id'],
			'content_id' => $_POST['txtcontent_id'],
            'desc' => $_POST['txtcomment'],
            'created_at'=> date('Y-m-d H:i:s')
        );
        $this->m_users->m_added_comments($data);
	}
	
    public function m_load_status(){
        $namabulan = array(
                1=>"Januari",
                2=>"Februari",
                3=>"Maret",
                4=>"April",
                5=>"Mei",
                6=>"Juni",
                7=>"Juli",
                8=>"Agustus",
                9=>"September",
                10=>"Oktober",
                11=>"November",
                12=>"Desember"
            );
        $data = $this->m_users->m_load_status();
        foreach ($data as $records) {
            $explode=explode(" ",$records->date_status);
 
            $d=list($thn,$bln,$tgl)=explode('-',$explode[0]);
            $indate=$tgl.' '.$namabulan[(int)$d[1]].' '.$thn;        
 
            echo $indate.' - '.$explode[1]."<br/>";
            echo "Nama :".$records->name."<br/>";
            echo "Status :".$records->status."<hr/>";
        }
    }
}