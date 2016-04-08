<?php
	/**
	* 
	*/
	class Dataemail extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->db->cache_on();
		}
		public function all()
		{
			return $this->db->get('template_email');
		}
		public function one($nama)
		{
			$this->db->where('nama',$nama);
		}
		public function update($data)
		{
			$this->db->where('nama',$data['nama']);
			$this->db->update('template_email',$data);
		}
		public function getSetting()
		{
			return $this->db->get('email_setting');
		}
		public function updateSetting($data)
		{
			$this->db->where('id',$data['id']);
			$this->db->update('email_setting',$data);
		}
		public function getAllTemplate()
		{
			$this->db->select('nama');
			$this->db->select('id');
			return $this->db->get('template_email');
		}
		public function getTemplate($id)
		{
			$this->db->where('id',$id);
			return $this->db->get('template_email');
		}
		public function updateTemplate($data)
		{	
			$this->db->where('id',$data['id']);
			$this->db->update('template_email',$data);
		}
	}