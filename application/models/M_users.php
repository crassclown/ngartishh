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

	//Get flag lelang
	public function get_onlelang($id)
	{
		$now = date('Y-m-d');
		$result = $this->db->where('owner_id', $id)->where('end_date >=', $now)->get('lelang');

		return $result->result();
	}

	public function get_topfive()
	{
		$result = $this->db->select('Id, title, photos, total_like, user_id');
		$result = $this->db->from('content');
		$result = $this->db->order_by('total_like','DESC');
		$result = $this->db->limit(5);
		$result = $this->db->get();

		return $result->result();
	}

	//User Content on Profile Page
	public function get_usercontent($id)
	{
		$result = $this->db->where('user_id', $id);
		$result = $this->db->order_by('created_at', 'DESC');
		$result = $this->db->get('content')->result();
		return $result;
	}

	// public function notifFollow($data)
	// {
	// 	$this->db->insert('notifications', $data);
	// }

	//check registered email
	public function m_getregistered($varEmail)
	{
		$result = $this->db->where('email', $varEmail)->get('users')->result();
		return $result;
	}

	//activate user account
	public function m_activateusers($email)
	{
		$checkupdate = false;
		$data = array(
			'status' => '1'
		);

		try{
			$this->db->where('md5(email)',$email);
			$this->db->update('users',$data);
			$checkupdate = true;
		}catch (Exception $ex) {
			
			$checkupdate = false;
		}
		return $checkupdate; 
	}

	//Function to reset password
	public function do_resetpassword($varEmail, $varNewpassword)
	{
		$checkupdate = false;
		$data = array(
			'password' => $varNewpassword
		);

		try{
			$this->db->where('md5(email)',$varEmail);
			$this->db->update('users',$data);
			$checkupdate = true;
		}catch (Exception $ex) {
			
			$checkupdate = false;
		}
		return $checkupdate; 
	}

	public function cekLelang($varOwner, $varContent)
	{
		$result = $this->db->where('owner_id', $varOwner)->where('content_id',$varContent)->limit(1)->get('lelang');
		if($result->num_rows() > 0)
        {
            foreach ($result->result() as $row)
            {
            	$data[] = $row;
			}
            return $data;
        }
	}

	public function post_lelang($data)
	{
		$this->db->insert('lelang', $data);
	}

	public function get_lelang($id)
	{
		$result = $this->db->where('owner_id', $id)->get('lelang')->result();
		return $result;
	}

	public function get_userlelang($id)
	{
		$result = $this->db->select('lelang.Id as idlela, users.fullname as fullname, lelang.content_id as idcontent, lelang.owner_id as ownerid , content.photos as photos, (end_date - date(now())) as durasi');
		$result = $this->db->from('lelang');
		$result = $this->db->join('content', 'content.Id = lelang.content_id');
		$result = $this->db->join('users', 'users.Id = lelang.owner_id');
		$result = $this->db->where('lelang.owner_id', $id);
		$result = $this->db->get();

		if($result->num_rows() > 0)
        {
            foreach ($result->result() as $row)
            {
            	$data[] = $row;
			}
			
            return $data;
        }
	}

	public function get_likedcontent($id)
	{
		$result = $this->db->select('content.id as idcontent, content.user_id as iduser , content.photos as photos, total_like, total_comment');
		$result = $this->db->from('likes');
		$result = $this->db->join('content', 'content.Id = likes.content_id');
		$result = $this->db->join('users', 'users.Id = likes.user_id');
		$result = $this->db->where('likes.user_id', $id);
		$result = $this->db->get();

		if($result->num_rows() > 0)
        {
            foreach ($result->result() as $row)
            {
            	$data[] = $row;
			}
			
            return $data;
        }
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
		if($result->num_rows() > 0)
        {
            foreach ($result->result() as $row)
            {
            	$data[] = $row;
			}
            return $data;
        }
	}

	//Cek Follow Status
	public function isFollowing($userid, $followedid)
	{
		$result = $this->db->where('user_id', $userid)->where('followed_id',$followedid)->limit(1)->get('following');
		if($result->num_rows() > 0)
        {
            foreach ($result->result() as $row)
            {
            	$data[] = $row;
			}
			
            return $data;
        }
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
	public function get_userfollowing($id)
	{
		$result = $this->db->select('users.Id as userId, fullname, phone, fotoprofil');
		$result = $this->db->from('users');
		$result = $this->db->join('following', 'following.followed_id = users.Id');
		$result = $this->db->where('following.user_id', $id);
		$result = $this->db->get();

		if($result->num_rows() > 0)
        {
            foreach ($result->result() as $row)
            {
            	$data[] = $row;
			}
			
            return $data;
        }
	}

	public function get_userfollower($id)
	{
		$result = $this->db->select('users.Id as userId, fullname, phone, fotoprofil');
		$result = $this->db->from('users');
		$result = $this->db->join('following', 'following.user_id = users.Id');
		$result = $this->db->where('following.followed_id', $id);
		$result = $this->db->get();
		
		if($result->num_rows() > 0)
        {
            foreach ($result->result() as $row)
            {
            	$data[] = $row;
			}
			
            return $data;
        }
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
	
	function m_getRecordsUser($id){
        //Select content records
        $q = $this->db->query("SELECT *, users.fullname as namalengkap, content.Id as idcontent, content.user_id as iduser, content.created_at as tgl_posting FROM content LEFT JOIN users ON users.Id = content.user_id where content.user_id='$id'");
        
        
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

	//Menampilkan Table Category
	public function m_categoriesmenu() {
        //Select content records
		$q = $this->db->query("SELECT *, category.Id as idCat, category.name as namaCat, category.desc as desccat FROM category ORDER BY Id ASC LIMIT 5");
       
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
            	$data[] = $row;
			}
			
            return $data;
        }
	}

	//Insert Postingan
	public function insert($data)
    {
    	$this->db->insert($this->table_content, $data);


    	return $this->db->insert_id();
	}

	public function m_send_email(){
		//Select content records
		$q = $this->db->query("SELECT winner_id, lelang.Id as idlelang, winner_price, email_status, email, fullname, phone, users.Id as iduser, lelang.owner_id as pemilikkaryaid, (end_date - date(now())) as durasi FROM users, lelang WHERE users.Id = lelang.owner_id AND (end_date - date(now())) = 0 AND email_status = '0'");
       
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
            	$data[] = $row;
			}
			
            return $data;
        }
	}

	function sendemailstatus($pemilikid,$idlelang){
		$this->db->query("UPDATE lelang SET email_status = '1' WHERE owner_id = '$pemilikid' AND Id = '$idlelang'");
	}

	public function m_email_pemenang($idlelang,$winner_id){
		//Select content records
		$q = $this->db->query("SELECT fullname as namapemenang, users.Id as useridpemenang, email as emailpemenang, phone as notlppemenang FROM users, lelang WHERE users.Id = lelang.winner_id AND lelang.Id = '$idlelang' AND winner_id = '$winner_id'");
       
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
            	$data[] = $row;
			}
			
            return $data;
        }
	}

	public function m_notifikasilikes($ids){
		$result = $this->db->query("select notifications.notified_id as yglike, content.Id as contentId, fullname, title, users.Id as usersId, concat('L',likes.Id) as likeId FROM notifications, likes, users, content WHERE notifications.notif_id = likes.Id AND notifications.notifier_id = users.Id AND content.Id = likes.content_id AND notifications.notified_id = '$ids' AND notifications.status = '0' ORDER BY notifications.Id DESC");
		
		if($result->num_rows() > 0)
        {
            foreach ($result->result() as $row)
            {
            	$data[] = $row;
			}
			
            return $data;
        }
	}

	public function m_notifikasifollower($ids){
		$result = $this->db->query("select notifications.notifier_id as ygfollow, fullname, users.Id as usersId, concat('F',following.Id) as followId FROM notifications, following, users WHERE notifications.notif_id = following.Id AND notifications.notifier_id = users.Id AND notifications.notified_id = following.followed_id AND notifications.notified_id = '$ids' AND notifications.status = '0' ORDER BY notifications.Id DESC");
		
		if($result->num_rows() > 0)
        {
            foreach ($result->result() as $row)
            {
            	$data[] = $row;
			}
			
            return $data;
        }
	}

	public function m_selectlikes($ids){
		$result = $this->db->query("SELECT *, content.user_id as usercontent FROM users, likes, content WHERE users.Id = content.user_id AND likes.content_id = content.Id AND likes.user_id = users.Id AND content.Id = '$ids'");
		
		if($result->num_rows() > 0)
        {
            foreach ($result->result() as $row)
            {
            	$data[] = $row;
			}
			
            return $data;
        }
	}

	// public function m_notifikasicomments($ids){
	// 	$result = $this->db->query("select fullname, users.Id as usersId, concat('F',following.Id) as followId FROM notifications, following, users WHERE notifications.notif_id = following.Id AND notifications.notifier_id = users.Id AND notifications.notified_id = following.followed_id AND notifications.notified_id = '$ids' AND notifications.status = '0' ORDER BY notifications.Id DESC LIMIT 1");
		
	// 	if($result->num_rows() > 0)
    //     {
    //         foreach ($result->result() as $row)
    //         {
    //         	$data[] = $row;
	// 		}
			
    //         return $data;
    //     }
	// }
}
