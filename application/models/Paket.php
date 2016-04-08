<?php 
	/**
	* 
	*/
	class Paket extends CI_Model
	{
		
		public function all()
		{
			$query=$this->db->get('paket');
			if ($query) {
				return $query;
			}
			else{return null;}
		}
	}