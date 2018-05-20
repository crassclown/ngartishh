<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('m_admin');
        
        if($this->session->userdata('status') != "login"){
			redirect(base_url("c_loginadmin/"));
        }
    }
    
    public function index(){
        $this->load->view('admin/dashboard/index');
    }

    public function get_data_count_post(){
        $data = $this->m_admin->m_get_count_post();

        //Data to Json
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Topping", 
            "pattern" => "", 
            "type" => "string" 
        ); 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Total", 
            "pattern" => "", 
            "type" => "number" 
        ); 
        foreach($data as $cd) 
            { 
            $responce->rows[]["c"] = array( 
                array( 
                    "v" => "$cd->namacategory", 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd->total_content, 
                    "f" => null 
                ) 
            ); 
            } 
 
        echo json_encode($responce); 
    }

    public function get_data_count_users_post(){
        $data = $this->m_admin->m_get_count_users_post();

        //Data to Json
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Topping", 
            "pattern" => "", 
            "type" => "string" 
        ); 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Total", 
            "pattern" => "", 
            "type" => "number" 
        ); 
        foreach($data as $cd) 
            { 
            $responce->rows[]["c"] = array( 
                array( 
                    "v" => "$cd->namausers", 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd->total_content, 
                    "f" => null 
                ) 
            ); 
            } 
 
        echo json_encode($responce);
    }

    public function get_data_count_likes(){
        $data = $this->m_admin->m_get_count_users_likes();

        //Data to Json
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Topping", 
            "pattern" => "", 
            "type" => "string" 
        ); 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Total", 
            "pattern" => "", 
            "type" => "number" 
        ); 
        foreach($data as $cd) 
            { 
            $responce->rows[]["c"] = array( 
                array( 
                    "v" => "$cd->judulcontent", 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd->total_content, 
                    "f" => null 
                ) 
            ); 
            } 
 
        echo json_encode($responce);
    }

    public function get_data_count_auction(){
        if(!empty($_POST['option'])) {     

            $val = $_POST['option'];            
            $result_new=$this->m_admin->m_get_count_auction($val);
            
            $array = array();
            $cols = array();
            $rows = array();
            $cols[] = array("id"=>"","label"=>" Rating","pattern"=>"","type"=>"string");
            $cols[] = array("id"=>"","label"=>"Count","pattern"=>"","type"=>"number");  
            if(is_object($result_new) || is_array($result_new)){
                foreach ($result_new as $object) {
                    $rows[] = array("c"=>array(array("v"=>(string)$object->namacategory),array("v"=>(int)$object->total_dl)));
                }
                $array = array("cols"=>$cols,"rows"=>$rows);
                echo json_encode($array);
            }else{
                echo json_encode("Tidak ada statistik");
            }
        }
    }

    public function indexreport(){
        $this->load->view('admin/report/v_reportpdf');
    }
}