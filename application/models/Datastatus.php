<?php
	/**
	* 
	*/
	class Datastatus extends CI_Model
	{
		
		public function all()
		{
			$this->db->order_by('id','desc');
			$query=$this->db->get('status');
			return $query;
		}
	}