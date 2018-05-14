<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lelang extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('m_users');
		$this->load->model('m_dashboard');
		$this->load->helper('download');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("c_loginusers/"));
		}
    }
	
	public function index()
	{
        $data['categoriesmenu'] = $this->m_users->m_categoriesmenu();
		$data['categories'] = $this->m_users->m_categories();
		$ids = $this->session->userdata('Id');
		$data['notifikasilikes']    = $this->m_users->m_notifikasilikes($ids);
        $data['notifikasifollower'] = $this->m_users->m_notifikasifollower($ids);
		$data['foto'] = $this->m_users->get_users($ids);
		$this->load->view('users/layout/header', $data);
		$this->load->view('users/lelang/index', $data);
		$this->load->view('users/layout/footer');
	}

	// Memanggil semua content yang ada di table lelang
	public function m_getlelang(){
		// get data
		$data = $this->m_dashboard->m_getlelang();
		$datas = $this->m_users->m_send_email();
		
		if(is_array($datas) || is_object($datas)){
			foreach($datas as $sendEmail){
				$email 			= $sendEmail->email;
				$email_status 	= $sendEmail->email_status;
				$pemilikid		= $sendEmail->pemilikkaryaid;
				$idlelang		= $sendEmail->idlelang;
				$fullname		= $sendEmail->fullname;
				$winner_price	= $sendEmail->winner_price;
				$winner_id		= $sendEmail->winner_id;
				$data_pemenang	= $this->m_users->m_email_pemenang($idlelang,$winner_id);
				if(is_array($data_pemenang) || is_object($data_pemenang)){
					foreach($data_pemenang as $dp){
						$email_pemenang	= $dp->emailpemenang;
					}
				}
				if($sendEmail->durasi == 0 && $email_status == '0'){
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
					$this->email->to($email);
					$this->email->subject("Pengumuman waktu berakhirnya Lelang yang telah selesai Anda adakan");

					$this->email->message(
						"<h2>Hai, ".$fullname."</h2>
						<p>Selamat, karya Anda berhasil terjual sebesar : Rp.".number_format($winner_price,2,",",".")."</p>
						<span>Ayo selesaikan segera persyaratan proses pengiriman Anda kepada Pemenang. Alternatif Anda untuk bisa menghubungi pemenang Lelang Anda bisa dengan menghubungi melalui email sebagai berikut : ".$email_pemenang."</span>
						<br />
						<br />
							<a href='https://drive.google.com/file/d/1kACMDcWm9SfavdfsaEPvt_7s0gm4YIG9/view?usp=sharing'>Klik Tautan ini untuk memenuhi syarat terakhir</a>
						<br /><br /><br />
						<label>Regards,</label><br />
						<label>Ngartish</label>
						"
					);

						$this->m_users->sendemailstatus($pemilikid,$idlelang);
						$this->email->send();
				}
			}
		}

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

		$data['notifikasilikes']    = $this->m_users->m_notifikasilikes($ids);
        $data['notifikasifollower'] = $this->m_users->m_notifikasifollower($ids);
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

	public function m_harga_tambah(){
		$kode=$this->input->post('lelang_id');
		$data = $this->m_dashboard->m_lelang_harga($kode);
		if(is_array($data) || is_object($data)){
			foreach($data as $tambahhargalelang){
				$hargaawal 			= $tambahhargalelang->starting_price;
				$finalharga 		= ($hargaawal * 1) / 100;
				$hargasekarang		= $tambahhargalelang->winner_price;
				$totalharga 		= $finalharga + $hargaawal;
				$totalhargasekarang	= $hargasekarang + $finalharga;
					// echo number_format($totalharga,2,",",".");
					if($hargasekarang == 0 || $hargasekarang == ''){
						echo $totalharga;
					}else{
						echo $totalhargasekarang;
					}
			}
		}
	}

	public function m_harga_normal(){
		$kode=$this->input->post('lelang_id');
		$data = $this->m_dashboard->m_lelang_harga($kode);
		if(is_array($data) || is_object($data)){
			foreach($data as $tambahhargalelang){
				// $hargaawal 		= $tambahhargalelang->starting_price;
				// $finalharga 	= ($hargaawal * 1) / 100;
				$hargasekarang	= $tambahhargalelang->winner_price;
				// $totalharga 	= $finalharga + $hargasekarang;
					// echo number_format($totalharga,2,",",".");
				echo $hargasekarang;
			}
		}
	}
}