<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model
{

    public function __construct(){
		parent::__construct();
	}
	var $table = 'users';
	var $table_bookmark = 'bookmark';
	protected $table_content = 'content';
	//Regristration
	public function m_registerusers($data)
	{
		$this->db->insert('users', $data);
	}

	//Cek Login
	function cek_login($table,$where)
	{		
		return $this->db->get_where($table,$where);
	}
	
	//Menampilkan Semua Users
	public function getAllusers()
	{
		$result = $this->db->get('users');
		return $result->result();
	}

	//User's
	public function get_users($id)
	{
		$result = $this->db->where('id', $id)->get('users')->result();
		return $result;
	}

	//User Content on Profile Page
	public function get_usercontent($id)
	{
		$result = $this->db->where('user_id', $id)->get('content')->result();
		return $result;
	}

	//Update User's Bio
	public function UpdateUsers($id,$data){
		$checkupdate = false;
		
		try{
			$this->db->where('Id',$id);
			$this->db->update('users',$data);
			$checkupdate = true;
		}catch (Exception $ex) {
			
			$checkupdate = false;
		}
		
		return $checkupdate; 
		
	}

	//Cek Follow Button
	public function cekFollowing($userid, $followedid)
	{
		$result = $this->db->where('user_id', $userid)->where('followed_id',$followedid)->limit(1)->get('following');
		return $result->row();
	}
	
	//User Follow
	public function userFollow($userid, $followedid)
	{
		$data = array(
			'Id' => null,
			'user_id' => $userid,
			'followed_id' => $followedid
		);
		$this->db->insert('following', $data);
	}

	//User Unfollow
	public function userUnfollow($userid, $followedid)
	{
		$this->db->where('user_id', $userid)->where('followed_id', $followedid);
		$this->db->delete('following');
	}

	//Delete Users on Profile Page
	public function DeleteUsers($id){
		$checkupdate = false;
		
		try{
			$this->db->where('Id',$id);
			$this->db->delete('users');
			$checkupdate = true;
		}catch (Exception $ex) {
			
			$checkupdate = false;
		}
		
		return $checkupdate; 
	}
	
	//Bookmark
	public function m_bookmark($data){
		
		$this->db->insert('bookmark', $data);
	}

	//Cek Like?
	public function cekLiked($userid, $contentid){
		$result = $this->db->where('user_id', $userid)->where('content_id',$contentid)->limit(1)->get('likes');
		return $result->row();
	}

	//User Likes
	public function userLikes($userid, $contentid){
		$data = array(
			'Id' => null,
			'user_id' => $userid,
			'content_id' => $contentid
		);
		$this->db->insert('likes', $data);
	}

	//User Unlikes
	public function userUnlikes($userid, $contentid)
	{
		$this->db->where('user_id', $userid)->where('content_id', $contentid);
		$this->db->delete('likes');
	}

	//Menambahkan Comments on Detail Page
	public function m_added_comments($data){
		$this->db->insert('comments',$data);
	}

	//Load Comments on Detail Page
	public function m_load_comments($kode){
		//Select content records
		$q = $this->db->query("SELECT users.Id as userid, users.fullname as namaygcomment, comments.content_id as idcontentcomment, comments.user_id as idusercomment, comments.created_at as tgl_comments, comments.Id as idcomments, comments.desc as komentarusers FROM comments, users, content WHERE comments.content_id = content.Id AND comments.user_id = users.Id AND content.Id='".$kode."' ORDER BY comments.Id DESC");
       
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
            	$data[] = $row;
			}
			
            return $data;
        }
	}

	//Validasi Check Email
	public function m_check_email($email){
		//Select content records
		$q = $this->db->query("SELECT email FROM users WHERE email='".$email."'");
       
        if($q->num_rows() > 0)
        {
			return true;
        }else{
			return false;
		}

	}

	//Menampilkan Table Category
	public function m_categories() {
        $query = $this->db->get( 'category' );
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
	}

	//Insert Postingan
	public function insert($data)
    {
    	$this->db->insert($this->table_content, $data);


    	return $this->db->insert_id();
    }

}
