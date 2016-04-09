<?php 
	/**
	* 
	*/
	class Dataterm extends CI_Model
	{
		public function all()
		{
			$query=$this->db->get('term');
			return $query;
		}
		public function update()
		{
			$this->db->where('id',1);
			$data = array('term' => $this->input->post('data'));
			$this->db->update('term',$data);
		}
	}