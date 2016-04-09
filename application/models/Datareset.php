<?php 
	/**
	* 
	*/
	class Datareset extends CI_model
	{
		
		public function insert($data)
		{
			$this->db->insert('reset',$data);
		}
		public function update($dataf,$datar)
		{
			$this->db->where('memberid',$dataf['memberid']);
			$this->db->update('firstlogin',$dataf);

			$this->db->where('memberid',$datar['memberid']);
			$this->db->update('reset',$datar);
		}
		public function updateMember($data)
		{
			$this->db->where('memberid',$data['memberid']);
			$this->db->update('member',$data);
		}
		public function updateContributor($data)
		{
			$this->db->where('memberid',$data['memberid']);
			$this->db->update('contributor',$data);
		}
		public function one($token)
		{
			$this->db->where('token',$token);
			return $this->db->get('reset');
		}
	}