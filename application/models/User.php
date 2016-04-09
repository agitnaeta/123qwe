<?php 
	/**
	* 
	*/
	class User extends CI_Model
	{
		public function all()
		{
			return $this->db->get('user');
		}
		public function daftar($maxid,$token,$password)
		{			
			$date=date('Y-m-d');
			
			$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($password),
				'email' => $this->input->post('email'),
				'status' => $this->input->post('status'),
				'memberID' => $maxid,
				'tanggal_daftar' => $date,
			 );
			$this->db->insert('member',$data);

			$dtoken = array(
				'memberID' => trim($maxid),
				'token' => $token,
				'password' => md5($password),
				);
			$this->db->insert('firstlogin',$dtoken);
		}
		public function max()
		{
			$query=$this->db->query("Select max(memberID) as max from member");
			if ($query) {
				return $query;	
			}
			else
			{
				return null;
			}
		}
		public function cekUsername($username)
		{
			
			$this->db->where('username',$username);
			$query=$this->db->get('member');
			if ($query) {
				return $query;
			}
			else{return null;}
		}
		
		public function cekEmail($email)
		{
			
			$this->db->where('email',$email);
			$query=$this->db->get('member');
			if ($query) {
				return $query;
			}
			else{return null;}
		}


		//contributor
		public function maxc()
		{
			$query=$this->db->query("Select max(memberID) as max from contributor");
			if ($query) {
				return $query;	
			}
			else
			{
				return null;
			}
		}
		public function daftarc($maxid,$token,$password)
		{			
			$date=date('Y-m-d');
			
			$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($password),
				'email' => $this->input->post('email'),
				'status' => $this->input->post('status'),
				'app_status' => 2,
				'memberID' => $maxid,
				'tanggal_daftar' => $date,
			 );
			$this->db->insert('contributor',$data);

			$dtoken = array(
				'memberID' => trim($maxid),
				'token' => $token,
				'password' => md5($password),
				);
			$this->db->insert('firstlogin',$dtoken);
		}
		public function cekUsernamec($username)
		{
			
			$this->db->where('username',$username);
			$query=$this->db->get('contributor');
			if ($query) {
				return $query;
			}
			else{return null;}
		}
		public function cekEmailc($email)
		{
			
			$this->db->where('email',$email);
			$query=$this->db->get('contributor');
			if ($query) {
				return $query;
			}
			else{return null;}
		}
		public function recive()
		{
			$this->db->where('status','1');
			$query=$this->db->get('user');
			if ($query) {
				return $query;
			}
			else{return null;}
		}
	}