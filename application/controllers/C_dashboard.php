<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('m_dashboard');
		$this->load->model('m_users');
	}
	
	public function index()
	{
		$this->load->view('users/layout/header');
		$this->load->view('users/dashboard/index');
		$this->load->view('users/layout/footer');
	}

	// Call this method from AngularJS $http request
	public function m_getContents(){
		// get data
		$data = $this->m_dashboard->m_getRecords();
		echo json_encode($data);
	}

	public function m_detailContent(){
		// $where = array(
        //     'Id' => $content_id,
        //     'user_id' => $user_id
        // );
		// $data['varambilusers'] = $this->m_dashboard->m_detailcontent($where,'content')->result();
		$this->load->view('users/layout/header');
		$this->load->view('users/dashboard/detail_content');
		$this->load->view('users/layout/footer');
	}

	public function kategori_Content(){
		$this->load->view('users/layout/header');
		$this->load->view('users/layout/kategori');
		$this->load->view('users/layout/footer');
	}

	public function result_Search(){
		$this->load->view('users/layout/header');
		$this->load->view('users/layout/result_search');
		$this->load->view('users/layout/footer');
	}

	public function m_bookmarked(){
		$data = array(
			'content_id' => $this->input->post('content_id'),
			'user_id' => $this->input->post('user_id')
		);
		$insert = $this->m_users->m_bookmark($data);
		echo json_encode(array("status" => TRUE));
		// if(isset($data)){
		// 	$insert = $this->m_users->m_bookmark($data);
		// }else{
		// 	echo json_encode($data);
		// }
	}

	public function m_searchbox() {

        $search_data    = $_POST['search_data'];

        $query          = $this->m_dashboard->m_searchbar($search_data);
        $datausers      = $this->m_dashboard->m_searchbarusers($search_data);
        
        if(is_array($query) || is_object($query)){
            foreach ($query as $row):
                echo "<div class='list-suggestion-search'><a href='".base_url('c_dashboard/m_detailContent/'.$row->Idcontent.'/'.$row->Iduser)."'>" . ucwords(trim($row->judulcontent)) . "</a></div>";    
            endforeach;
        }else if(is_array($datausers) || is_object($datausers)){
            // echo "No Data Found";
            foreach ($datausers as $rowuser):
                echo "<div class='list-suggestion-search'><a href='".base_url('c_profile/m_users/'.$rowuser->userId)."'>" . ucwords(trim($rowuser->namalengkap)) . "</a></div>";    
            endforeach;
        }else{
            echo "<div class='no-data-found'>No Data Found</div>";
        }
    }

    public function m_searcboxtype(){
        $key = $this->input->post('search_data');
        $data['categories'] = $this->m_users->m_categories();
        $data['categoriesmenu'] = $this->m_users->m_categoriesmenu();
        $data['pencariankategori'] = $this->m_dashboard->m_searchbar($key);
        $datacontent = $data['pencariankategori'];
        $datas['pencarianuser'] = $this->m_dashboard->m_searchbarusers($key);
        $datauser = $datas['pencarianuser'];
        if(is_array($datacontent) || is_object($datacontent)){
            $this->load->view('users/layout/header', $data);
            $this->load->view('users/layout/result_search', $data);
            $this->load->view('users/layout/footer');
        }else if(is_array($datauser) || is_object($datauser)){
            $this->load->view('users/layout/header', $data);
            $this->load->view('users/layout/result_search', $datas);
            $this->load->view('users/layout/footer');
        }else{
            $this->session->set_flashdata('no_data','The word you are looking for is not found');
            $this->load->view('users/layout/header', $data);
            $this->load->view('users/layout/result_search', $datas);
            $this->load->view('users/layout/footer');
        }
    }


}