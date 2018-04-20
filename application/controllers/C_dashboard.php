<<<<<<< HEAD
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
    
    // Memanggil halaman index
	public function index()
	{   
        $data['categoriesmenu'] = $this->m_users->m_categoriesmenu();
		$data['categories'] = $this->m_users->m_categories();
		$ids = $this->session->userdata('Id');
		$data['foto'] = $this->m_users->get_users($ids);
		$this->load->view('users/layout/header', $data);
		$this->load->view('users/dashboard/index', $data);
		$this->load->view('users/layout/footer');
    }
    
    //Search Box by User and Content
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
            echo "<div class='list-suggestion-search'>No Data Found</div>";
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
        $ids = $this->session->userdata('Id');
		$data['foto'] = $this->m_users->get_users($ids);
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

	// Memanggil semua content yang ada di table content
	public function m_getContents(){
		// get data
        $data = $this->m_dashboard->m_getRecords();

        echo json_encode($data);
    }

    // Memanggil jumlah like yang berada di detail content berdasarkan content_id sama user_id
    public function m_getDetailContentLike(){
        // get data
        $content_id = $this->input->post('content_id');
        $user_id    = $this->input->post('user_id');
        $data = $this->m_dashboard->m_getRecordsAjaxLike($content_id,$user_id);
        echo json_encode($data);
    }

    // Memanggil comment yang berada di detail content
    public function m_getDetailContentComment(){
        // get data
        $data = $this->m_dashboard->m_getDetailContentComment();

        echo json_encode($data);
    }

    // Memanggil detail content yang ada di table content berdasarkan content_id sama user_id
	public function m_detailContent($content_id,$user_id){
		$where = array(
            'Id' => $content_id,
            'user_id' => $user_id
		);
		$id = $this->session->userdata('Id');
		$data['profile'] = $this->m_users->get_users($id);
        $data['categoriesmenu'] = $this->m_users->m_categoriesmenu();
        $data['varambilusers'] = $this->m_dashboard->m_detailcontent($where,'content')->result();
		$data['varambilnama'] = $this->m_dashboard->m_nameOnContent($content_id,$user_id);
		
		$ids = $this->session->userdata('Id');
		$data['foto'] = $this->m_users->get_users($ids);

		$this->load->view('users/layout/header', $data);
		$this->load->view('users/dashboard/detail_content', $data);
		$this->load->view('users/layout/footer');
	}

    //Memanggil halaman kategori
	public function kategori_Content(){
		$this->load->view('users/layout/header');
		$this->load->view('users/layout/kategori');
		$this->load->view('users/layout/footer');
	}

    //Insert bookmark
	// public function result_Search(){
	// 	$this->load->view('users/layout/header');
	// 	$this->load->view('users/layout/result_search');
	// 	$this->load->view('users/layout/footer');
	// }

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

    //Insert like
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

    //Insert comment
	public function m_added_comments(){
        $data = array(
			'user_id' => $this->input->post('user_id'),
			'content_id' => $this->input->post('content_id'),
            'desc' => $this->input->post('desc'),
            'created_at'=> date('Y-m-d H:i:s')
        );
        $this->m_users->m_added_comments($data);
	}
    
    // Memanggil comment berdasarkan content_id
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
                $time = strtotime($records->tgl_comments);

                $time = time() - $time; // to get the time since that moment

                $tokens = array (
                    31536000 => 'year',
                    2592000 => 'month',
                    604800 => 'week',
                    86400 => 'day',
                    3600 => 'hour',
                    60 => 'minute',
                    1 => 'second'
                );

                $result = '';
                $counter = 1;
                foreach ($tokens as $unit => $text) {
                    if ($time < $unit) continue;
                    if ($counter > 2) break;

                    $numberOfUnits = floor($time / $unit);
                    $result .= "$numberOfUnits $text ";
                    $time -= $numberOfUnits * $unit;
                    ++$counter;
                }

                echo '<div class="colom-komentar">
                    <div class="wrap-komentar">
                        <div class="wrap-nama-orang-komentar">
                            <a href="'.base_url('c_profile/m_users/'.$records->userid).'" class="nama-orang-komentar">
                                <b>'.$records->namaygcomment.'</b>
                            </a>
                        </div>
                        <div class="isi-komentar">
                        <p>'.$records->komentarusers.'</p>
                            
                        </div>
                    </div>
                    <div class="wrap-waktu-komentar">
                        '."{$result}ago".'
                            
                    </div>
                </div>';
                
                // echo $indate.' - '.$explode[1];
                // echo "Nama :".$records->name."<br/>";
                // echo $records->komentarusers."<hr/>";
            }
        }
    }

    // Insert posting ke table content
    public function do_upload()
    {
        $config['upload_path']   = './assets/images/content/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 20000;
        $config['max_width']     = 2000;
        $config['max_height']    = 2000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileElem')) {
            // $error = $this->upload->display_errors();
            // echo json_encode(array('status' => false));
            // redirect(base_url("c_dashboard/"));
            echo "<script>window.history.go(-1);</script>";
            $this->session->set_flashdata('bigger_file','Your image is so large, maximum is just 2 MB');
        } else {
            if($this->input->post('txttitle') == NULL || $this->input->post('txttitle') == ''){
                redirect(base_url("c_dashboard/"));
                $this->session->set_flashdata('titlereq','The title is required');
            }
            else if($this->input->post('txtdesc') == NULL || $this->input->post('txtdesc') == ''){
                redirect(base_url("c_dashboard/"));
                $this->session->set_flashdata('descreq','The description is required');
            }
            else{
                $this->load->model('m_users');
                $upload = $this->upload->data();
                $varTL  = '0';
                $varTC  = '0';
                // $datas = array(
                //     'name'          => $this->input->post('txtdesc'),
                //     'user_id'       => $this->input->post('txtsession')
                // );
                $data = array(
                    'total_like'    => $varTL,
                    'total_comment' => $varTC,
                    'title'         => $this->input->post('txttitle'),
                    'desc'          => $this->input->post('txtdesc'),
                    'user_id'       => $this->input->post('txtsession'),
                    'photos'        => $upload['file_name'],
                    'created_at'    => date("Y-m-d H:i:s"),
                    'category_id'   => $this->input->post('txtcategories'),
                );

                $id = $this->m_users->insert($data);
                // $datacategory = $this->m_users->insert($datas);
                redirect(base_url("c_dashboard/"));
            }
        }
    }

    // Lempar kehalaman kategori dengan melempar Id dari table categori
    public function m_searchcategory($id){
        $data['categoriesmenu'] = $this->m_users->m_categoriesmenu();
        $data['pencariankategori'] = $this->m_dashboard->m_searchCategory($id);
		$ids = $this->session->userdata('Id');
		$data['foto'] = $this->m_users->get_users($ids);
		$datak = $data['pencariankategori'];
        if(is_array($datak) || is_object($datak)){
            $this->load->view('users/layout/header', $data);
            $this->load->view('users/layout/result_category', $data);
            $this->load->view('users/layout/footer');
        }else{
            $this->session->set_flashdata('no_data','The word you are looking for is not found');
            $this->load->view('users/layout/header', $data);
            $this->load->view('users/layout/result_category', $datak);
            $this->load->view('users/layout/footer');
        }
    }

    // Lempar seluruh kategori ke halaman kategori
    public function m_searchallcategory(){
		$ids = $this->session->userdata('Id');
		$data['foto'] = $this->m_users->get_users($ids);
        $data['categoriesmenu'] = $this->m_users->m_categoriesmenu();
        $data['categories'] = $this->m_users->m_categories();
        $this->load->view('users/layout/header', $data);
		$this->load->view('users/category/all_category', $data);
		$this->load->view('users/layout/footer');
    }
}
=======
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
    
    // Memanggil halaman index
	public function index()
	{   
        $data['categoriesmenu'] = $this->m_users->m_categoriesmenu();
		$data['categories'] = $this->m_users->m_categories();
		$ids = $this->session->userdata('Id');
		$data['foto'] = $this->m_users->get_users($ids);
		$this->load->view('users/layout/header', $data);
		$this->load->view('users/dashboard/index', $data);
		$this->load->view('users/layout/footer');
    }
    
    //Search Box by User and Content
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
            echo "No Data Found";
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
			$ids = $this->session->userdata('Id');
			$data['foto'] = $this->m_users->get_users($ids);
            $this->load->view('users/layout/header', $data);
            $this->load->view('users/layout/result_search', $data);
            $this->load->view('users/layout/footer');
        }else if(is_array($datauser) || is_object($datauser)){
			$ids = $this->session->userdata('Id');
			$data['foto'] = $this->m_users->get_users($ids);
            $this->load->view('users/layout/header', $data);
            $this->load->view('users/layout/result_search', $datas);
            $this->load->view('users/layout/footer');
        }else{
			$this->session->set_flashdata('no_data','The word you are looking for is not found');
			$ids = $this->session->userdata('Id');
			$data['foto'] = $this->m_users->get_users($ids);
            $this->load->view('users/layout/header', $data);
            $this->load->view('users/layout/result_search', $datas);
            $this->load->view('users/layout/footer');
        }
    }

	// Memanggil semua content yang ada di table content
	public function m_getContents(){
		// get data
        $data = $this->m_dashboard->m_getRecords();

        echo json_encode($data);
    }

    // Memanggil jumlah like yang berada di detail content berdasarkan content_id sama user_id
    public function m_getDetailContentLike(){
        // get data
        $content_id = $this->input->post('content_id');
        $user_id    = $this->input->post('user_id');
        $data = $this->m_dashboard->m_getRecordsAjaxLike($content_id,$user_id);
        echo json_encode($data);
    }

    // Memanggil comment yang berada di detail content
    public function m_getDetailContentComment(){
        // get data
        $data = $this->m_dashboard->m_getDetailContentComment();

        echo json_encode($data);
    }

    // Memanggil detail content yang ada di table content berdasarkan content_id sama user_id
	public function m_detailContent($content_id,$user_id){
		$where = array(
            'Id' => $content_id,
            'user_id' => $user_id
		);
		$id = $this->session->userdata('Id');
		$data['profile'] = $this->m_users->get_users($id);
        $data['categoriesmenu'] = $this->m_users->m_categoriesmenu();
        $data['varambilusers'] = $this->m_dashboard->m_detailcontent($where,'content')->result();
		$data['varambilnama'] = $this->m_dashboard->m_nameOnContent($content_id,$user_id);
		
		$ids = $this->session->userdata('Id');
		$data['foto'] = $this->m_users->get_users($ids);

		$this->load->view('users/layout/header', $data);
		$this->load->view('users/dashboard/detail_content', $data);
		$this->load->view('users/layout/footer');
	}

    //Memanggil halaman kategori
	public function kategori_Content(){
		$this->load->view('users/layout/header');
		$this->load->view('users/layout/kategori');
		$this->load->view('users/layout/footer');
	}

    //Insert bookmark
	// public function result_Search(){
	// 	$this->load->view('users/layout/header');
	// 	$this->load->view('users/layout/result_search');
	// 	$this->load->view('users/layout/footer');
	// }

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

    //Insert like
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

    //Insert comment
	public function m_added_comments(){
        $data = array(
			'user_id' => $this->input->post('user_id'),
			'content_id' => $this->input->post('content_id'),
            'desc' => $this->input->post('desc'),
            'created_at'=> date('Y-m-d H:i:s')
        );
        $this->m_users->m_added_comments($data);
	}
    
    // Memanggil comment berdasarkan content_id
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
                $time = strtotime($records->tgl_comments);

                $time = time() - $time; // to get the time since that moment

                $tokens = array (
                    31536000 => 'year',
                    2592000 => 'month',
                    604800 => 'week',
                    86400 => 'day',
                    3600 => 'hour',
                    60 => 'minute',
                    1 => 'second'
                );

                $result = '';
                $counter = 1;
                foreach ($tokens as $unit => $text) {
                    if ($time < $unit) continue;
                    if ($counter > 2) break;

                    $numberOfUnits = floor($time / $unit);
                    $result .= "$numberOfUnits $text ";
                    $time -= $numberOfUnits * $unit;
                    ++$counter;
                }

                echo '<div class="colom-komentar">
                    <div class="wrap-komentar">
                        <div class="wrap-nama-orang-komentar">
                            <a href="'.base_url('c_profile/m_users/'.$records->userid).'" class="nama-orang-komentar">
                                <b>'.$records->namaygcomment.'</b>
                            </a>
                        </div>
                        <div class="isi-komentar">
                        <p>'.$records->komentarusers.'</p>
                            
                        </div>
                    </div>
                    <div class="wrap-waktu-komentar">
                        '."{$result}ago".'
                            
                    </div>
                </div>';
                
                // echo $indate.' - '.$explode[1];
                // echo "Nama :".$records->name."<br/>";
                // echo $records->komentarusers."<hr/>";
            }
        }
    }

    // Insert posting ke table content
    public function do_upload()
    {
        $config['upload_path']   = './assets/images/content/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 20000;
        $config['max_width']     = 2000;
        $config['max_height']    = 2000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileElem')) {
            // $error = $this->upload->display_errors();
            // echo json_encode(array('status' => false));
            // redirect(base_url("c_dashboard/"));
            echo "<script>window.history.go(-1);</script>";
            $this->session->set_flashdata('bigger_file','Your image is so large, maximum is just 2 MB');
        } else {
            if($this->input->post('txttitle') == NULL || $this->input->post('txttitle') == ''){
                redirect(base_url("c_dashboard/"));
                $this->session->set_flashdata('titlereq','The title is required');
            }
            else if($this->input->post('txtdesc') == NULL || $this->input->post('txtdesc') == ''){
                redirect(base_url("c_dashboard/"));
                $this->session->set_flashdata('descreq','The description is required');
            }
            else{
                $this->load->model('m_users');
                $upload = $this->upload->data();
                $varTL  = '0';
                $varTC  = '0';
                // $datas = array(
                //     'name'          => $this->input->post('txtdesc'),
                //     'user_id'       => $this->input->post('txtsession')
                // );
                $data = array(
                    'total_like'    => $varTL,
                    'total_comment' => $varTC,
                    'title'         => $this->input->post('txttitle'),
                    'desc'          => $this->input->post('txtdesc'),
                    'user_id'       => $this->input->post('txtsession'),
                    'photos'        => $upload['file_name'],
                    'created_at'    => date("Y-m-d H:i:s"),
                    'category_id'   => $this->input->post('txtcategories'),
                );

                $id = $this->m_users->insert($data);
                // $datacategory = $this->m_users->insert($datas);
                redirect(base_url("c_dashboard/"));
            }
        }
    }

    // Lempar kehalaman kategori dengan melempar Id dari table categori
    public function m_searchcategory($id){
        $data['categoriesmenu'] = $this->m_users->m_categoriesmenu();
        $data['pencariankategori'] = $this->m_dashboard->m_searchCategory($id);
		$ids = $this->session->userdata('Id');
		$data['foto'] = $this->m_users->get_users($ids);
		$datak = $data['pencariankategori'];
        if(is_array($datak) || is_object($datak)){
            $this->load->view('users/layout/header', $data);
            $this->load->view('users/layout/result_category', $data);
            $this->load->view('users/layout/footer');
        }else{
            $this->session->set_flashdata('no_data','The word you are looking for is not found');
            $this->load->view('users/layout/header', $data);
            $this->load->view('users/layout/result_category', $datak);
            $this->load->view('users/layout/footer');
        }
    }

    // Lempar seluruh kategori ke halaman kategori
    public function m_searchallcategory(){
		$ids = $this->session->userdata('Id');
		$data['foto'] = $this->m_users->get_users($ids);
        $data['categoriesmenu'] = $this->m_users->m_categoriesmenu();
        $data['categories'] = $this->m_users->m_categories();
        $this->load->view('users/layout/header', $data);
		$this->load->view('users/category/all_category', $data);
		$this->load->view('users/layout/footer');
    }
}
>>>>>>> pandhu
