<?php
	/**
	* 
	*/
	class Dataadmin extends CI_Model
	{
		public function login()
		{
			$username=$this->input->post('username');
			$pass=$this->input->post('password');
			$password=md5($pass);
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			$query=$this->db->get('user');
			if ($query) {
				return $query;
			}
			else
			{
				return null;
			}
		}
		public function all()
		{
			$this->db->order_by('userID','DESC');
			$query=$this->db->get('user');
			return$query;
		}
		public function max()
		{
			$query=$this->db->query("Select max(userID) as max from user");
			return $query;
		}
		public function saveUser($userid)
		{

			$data = array(
				'username' =>$this->input->post('username'),
				'password' =>md5($this->input->post('password')),
				'email' =>$this->input->post('email'),
				'status' =>$this->input->post('status'),
				'userID' =>$userid,
				);
			$this->db->insert('user',$data);
		}
		public function cekUsername()
		{
			$username=$this->input->post('username');
			$this->db->where('username',$username);
			$query=$this->db->get('user');
			if ($query) {
				return $query;
			}
			else
			{
				return null;
			}
		}
		public function deleteUser()
		{
			$id=$this->input->post('id');
			$this->db->where('userID',$id);
			$this->db->delete('user');
		}
		public function one($id)
		{
			$this->db->where('userID',$id);
			$query=$this->db->get('user');
			return$query;
		}
		public function updateUser()
		{
			$password=$this->input->post('password');
			if ($password==null) {
				$data = array(
				'username' =>$this->input->post('username'),
				'status' =>$this->input->post('status'),
				'email' =>$this->input->post('email'),
				);
			}
			else
			{
				$data = array(
				'username' =>$this->input->post('username'),
				'email' =>$this->input->post('email'),
				'password' =>md5($this->input->post('password')),
				'status' =>$this->input->post('status'),
				);
			}

			$id=$this->input->post('userid');
			//print_r($data);
			$this->db->where('userID',$id);
			$this->db->update('user',$data);
		}
		public function cariUser()
		{
			$cari=$this->input->post('cari');
			$this->db->like('username',$cari);
			$this->db->or_like('userID',$cari);
			$query=$this->db->get('user');
			if ($query) {
				return $query;
			}
			else
			{
				return null;
			}
		}
		
	}