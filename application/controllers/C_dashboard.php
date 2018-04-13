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
        $data['categories'] = $this->m_users->m_categories();
		$this->load->view('users/layout/header');
		$this->load->view('users/dashboard/index', $data);
		$this->load->view('users/layout/footer');
	}

	// Call this method from AngularJS $http request
	public function m_getContents(){
		// get data
		$data = $this->m_dashboard->m_getRecords();

        echo json_encode($data);
	}

	public function m_detailContent($content_id,$user_id){
		$where = array(
            'Id' => $content_id,
            'user_id' => $user_id
        );
		$data['varambilusers'] = $this->m_dashboard->m_detailcontent($where,'content')->result();
		$this->load->view('users/layout/header');
		$this->load->view('users/dashboard/detail_content', $data);
		$this->load->view('users/layout/footer');
	}

	public function kategori_Content(){
		$this->load->view('users/layout/header');
		$this->load->view('users/layout/kategori');
		$this->load->view('users/layout/footer');
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
        $varUserid      = $this->input->post('user_id');
		$varContentid   = $this->input->post('content_id');

		$result = $this->m_users->cekLiked($varUserid, $varContentid);
		if(!isset($result))
		{
			$this->m_users->userLikes($varUserid, $varContentid);
		}else {
			$this->m_users->userUnlikes($varUserid, $varContentid);
		}
        
	}

	public function m_added_comments(){
        $data = array(
			'user_id' => $this->input->post('user_id'),
			'content_id' => $this->input->post('content_id'),
            'desc' => $this->input->post('desc'),
            'created_at'=> date('Y-m-d H:i:s')
        );
        $this->m_users->m_added_comments($data);
	}
	
    public function m_load_comments(){
        $kode=$this->input->post('content_id');
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
        $data = $this->m_users->m_load_comments($kode);
        if(is_array($data)){
            foreach ($data as $records) {
                $explode=explode(" ",$records->tgl_comments);
     
                $d=list($thn,$bln,$tgl)=explode('-',$explode[0]);
                $indate=$tgl.' '.$namabulan[(int)$d[1]].' '.$thn;        
                
                echo '<div class="colom-komentar">
                        <a href="'.base_url('c_profile/m_users/'.$records->userid).'" class="nama-orang-komentar">
                            <label class="label label-primary">'.$records->namaygcomment.'</label>
                        </a>
                        <div class="isi-komentar">
                            &nbsp'.$records->komentarusers.'
                        </div>
                      </div>';
                // echo $indate.' - '.$explode[1]."<br/>";
                // echo "Nama :".$records->name."<br/>";
                // echo $records->komentarusers."<hr/>";
            }
        }
    }

    public function do_upload()
    {
        $config['upload_path']   = './assets/images/content/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 20000;
        $config['max_width']     = 1024;
        $config['max_height']    = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileElem')) {
            $error = $this->upload->display_errors();
            // var_dump($error);
            echo json_encode(array('status' => false, 'error' => $error));
        } else {
            $this->load->model('m_users');
            $upload = $this->upload->data();
            $varTL  = '0';
            $varTC  = '0';
            $datas = array(
                'name'          => $this->input->post('txtdesc'),
                'user_id'       => $this->input->post('txtsession')
            );
            $data = array(
                'total_like'    => $varTL,
                'total_comment' => $varTC,
                'title'         => $this->input->post('txttitle'),
                'desc'          => $this->input->post('txtdesc'),
                'user_id'       => $this->input->post('txtsession'),
                'photos'        => $upload['file_name'],
                'created_at'    => date("Y-m-d H:i:s"),
            );

            $id = $this->m_users->insert($data);
            $datacategory = $this->m_users->insert($datas);
            // header("Refresh:0");
            // redirect(base_url("c_dashboard/"));
        }
    }
}
