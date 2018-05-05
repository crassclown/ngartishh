<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lelang extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('m_users');
		$this->load->model('m_dashboard');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("c_loginusers/"));
		}
    }
	
	public function index()
	{
        $data['categoriesmenu'] = $this->m_users->m_categoriesmenu();
		$data['categories'] = $this->m_users->m_categories();
		$ids = $this->session->userdata('Id');
		$data['foto'] = $this->m_users->get_users($ids);
		$this->load->view('users/layout/header', $data);
		$this->load->view('users/lelang/index', $data);
		$this->load->view('users/layout/footer');
	}

	// Memanggil semua content yang ada di table lelang
	public function m_getlelang(){
		// get data
        $data = $this->m_dashboard->m_getlelang();

        echo json_encode($data);
    }

	public function m_detail_lelang($content_id,$user_id,$lela_id)
	{
		$where = array(
            'content_id' 	=> $content_id,
			'owner_id' 		=> $user_id,
			'Id'			=> $lela_id
		);
		$data['varambilusers'] = $this->m_dashboard->m_detailcontentlela($where,'lelang')->result();
		$data['varambilnama'] = $this->m_dashboard->m_nameOnContentlela($content_id,$user_id,$lela_id);
        $data['categoriesmenu'] = $this->m_users->m_categoriesmenu();
		$data['categories'] = $this->m_users->m_categories();
		
		$ids = $this->session->userdata('Id');
		$data['foto'] = $this->m_users->get_users($ids);

		$this->load->view('users/layout/header', $data);
		$this->load->view('users/lelang/detail_lelang', $data);
		$this->load->view('users/layout/footer');
	}

	public function m_added_lelang(){
		$winner_price 	= $this->input->post('winner_price');
		$winner_id 		= $this->input->post('winner_id');
		$Idlela			= $this->input->post('lela_id');	 

		$varVerPrice = $this->m_dashboard->m_lelang_harga($Idlela);
		foreach($varVerPrice as $daftarharga){
			$hargadb 	= $daftarharga->winner_price;
			if($winner_price > $hargadb){
				$this->m_dashboard->m_added_lelang($winner_price,$winner_id,$Idlela);
			}
		}
		// if($winner_price > $varVerPrice){
			// $this->m_dashboard->m_added_lelang($winner_price,$winner_id,$Idlela);
		// }else{
		// 	return FALSE;
		// }
	}

	// public function m_added_btn_lelang(){
	// 	$kelipatan 		= $this->input->post('kelipatan');
	// 	$winner_id 		= $this->input->post('winner_id');
	// 	$Idlela			= $this->input->post('lela_id');	 
	// 	echo json_encode($kelipatan);
	// 	// $hargaskg		= $this->m_dashboard->m_lelang_harga($Idlela);
		
	// 	// $hargafinal		= $kelipatan * $hargaskg;
		
	// 	// $this->m_dashboard->m_added_lelang($hargafinal,$winner_id,$Idlela);
	// }

	// Memanggil comment berdasarkan content_id
    public function m_load_lelang(){
        $kode=$this->input->post('lela_id');
        
        $data = $this->m_dashboard->m_load_lelang($kode);
        if(is_array($data)){
            foreach ($data as $records) {
                
				echo '
					<div class="colom-komentar">
						<div class="wrap-komentar">
							<div class="wrap-nama-orang-komentar">
								<a href="'.base_url('c_profile/m_users/'.$records->userid).'" class="nama-orang-komentar">
									'.$records->namaygcomment.'
								</a>
							</div>
							<div class="isi-komentar">
								Rp.'.number_format($records->hargatawar,2,",",".").'
							</div>
						</div>
					</div>
				';
            }
        }
	}
	
	public function m_harga_lelang(){
		$kode=$this->input->post('lelang_id');
		$data = $this->m_dashboard->m_lelang_harga($kode);
		if(is_array($data) || is_object($data)){
			foreach($data as $datahargalelang){
				$hargasekarang	=	$datahargalelang->winner_price;
				if($hargasekarang == NULL){
					echo 'Rp.'.number_format($datahargalelang->starting_price,2,",",".");
				}else{
					echo 'Rp.'.number_format($datahargalelang->winner_price,2,",",".");
				}
				
			}
		}
	}
}