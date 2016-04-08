<?php 
	/**
	* 
	*/
	class Databg extends CI_Model
	{
		
		public function all()
		{
			return $this->db->get('tbl_bg');
		}
		public function insert($data)
		{
			$this->db->insert('tbl_bg',$data);
		}
		public function changeStatus($data)
		{
			$this->db->where('id',$data['id']);
			$this->db->update('tbl_bg',$data);
		}
		public function one($id)
		{
			$this->db->where('id',$id);
			return $this->db->get('tbl_bg');
		}
		public function delete($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('tbl_bg');
		}
		public function getActive()
		{
			$this->db->where('status',1);
			return $this->db->get('tbl_bg');
		}
	}