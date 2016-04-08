<?php 
	/**
	* 
	*/
	class Datalog extends CI_Model
	{
		public function add($session)
		{
			$this->db->insert('log',$session);
		}
	}