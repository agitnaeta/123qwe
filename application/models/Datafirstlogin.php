<?php
	/**
	* 
	*/
	class Datafirstlogin extends CI_Model
	{
		
		public function get($token)
		{
			$this->db->where('token',$token);
			$query=$this->db->get('firstlogin');
			return $query;
		}
		public function all()
		{
			$query=$this->db->get('firstlogin');
			return $query;
		}
		public function cek($memberid,$token)
		{
			//echo "Member ID : $memberid";
			$this->db->where('token',$token);
			$this->db->where('memberid',$memberid);
			$query=$this->db->get('firstlogin');
			if ($query) {
				return $query;
			}
			else
			{
				return null;
			}



		}
		public function updatePass($memberid,$password)
		{
			$data = array(
				'password'=>$password
			);
			$this->db->where('memberid',$memberid);
			$this->db->update('firstlogin',$data);
		}
		public function update($memberid,$token)
		{
			$data = array(
				'token' => $token, 
				'memberid' => $memberid, 
				'status' => "1", 
			);
			$this->db->where('token',$token);
			$this->db->where('memberid',$memberid);
			$this->db->update('firstlogin',$data);
		}
		public function cekFirstLogin($password,$memberid)
		{
			$this->db->where('password',$password);
			$this->db->where('memberid',$memberid);
			$query=$this->db->get('firstlogin');
			if ($query) {
				return $query;
			}
			else
			{
				return null;
			}
		}
	}