<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model
{

    public function __construct(){
		parent::__construct();
	}
	var $table = 'users';
	var $table_bookmark = 'bookmark';
	
	public function m_registerusers($data)
	{
		$this->db->insert('users', $data);
	}

	function cek_login($table,$where)
	{		
		return $this->db->get_where($table,$where);
	}
	
	public function getAllusers()
	{
		$result = $this->db->get('users');
		return $result->result();
	}

	public function get_users($id)
	{
		$result = $this->db->where('id', $id)->get('users')->result();
		return $result;
	}

	public function get_usercontent($id)
	{
		$result = $this->db->where('user_id', $id)->get('content')->result();
		return $result;
	}

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

	public function cekFollowing($userid, $followedid)
	{
		$result = $this->db->where('user_id', $userid)->where('followed_id',$followedid)->limit(1)->get('following');
		return $result->row();
	}
	
	public function userFollow($userid, $followedid)
	{
		$data = array(
			'Id' => null,
			'user_id' => $userid,
			'followed_id' => $followedid
		);
		$this->db->insert('following', $data);
	}

	public function userUnfollow($userid, $followedid)
	{
		$this->db->where('user_id', $userid)->where('followed_id', $followedid);
		$this->db->delete('following');
	}

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
	
	public function m_bookmark($data){
		
		$this->db->insert('bookmark', $data);
	}

	public function m_liked($data)
	{
		$this->db->insert('likes', $data);
	}

	public function m_added_comments($data){
		$this->db->insert('comments',$data);
	}

	public function m_load_comments($kode){
		//Select content records
		$q = $this->db->query("SELECT comments.content_id as idcontentcomment, comments.user_id as idusercomment, comments.created_at as tgl_comments, comments.Id as idcomments, comments.desc as komentarusers FROM comments, users, content WHERE comments.content_id = content.Id AND comments.user_id = users.Id AND content.Id='".$kode."' ORDER BY comments.Id DESC");
       
        if($q->num_rows() > 0)
        {
            // we will store the results in the form of class methods by using $q->result()
            // if you want to store them as an array you can use $q->result_array()
            foreach ($q->result() as $row)
            {
            	$data[] = $row;
			}
			
            return $data;
        }
	}

	public function m_check_email($email){
		//Select content records
		$q = $this->db->query("SELECT email FROM users WHERE email='".$email."'");
       
        if($q->num_rows() > 0)
        {
            // we will store the results in the form of class methods by using $q->result()
            // if you want to store them as an array you can use $q->result_array()
			return true;
        }else{
			return false;
		}

	}
}
