<?php
	/**
	* 
	*/
	class Datafile extends CI_Model
	{
		
		public function all()
		{
			$this->db->order_by('id','DESC');
			$query=$this->db->get('file');
			return $query;
		}
		public function update()
		{	
			$this->db->where('id',$id);
			$data = array(
				'file_url' => $this->input->post('file_url'),
				'name' => $this->input->post('name'),
			 );
			$query=$this->db->get('file');
			return $query;
		}
		public function one($file)
		{
			$this->db->where('id',$file);
			$query=$this->db->get('file');
			return $query;
		}
		public function insert($file)
		{
			$data = array(
				'file_url' => $file,
				'name' => $this->input->post('name'),
			 );
			$this->db->insert('file',$data);	
		}
		public function delete()
		{ 
			$file=$this->input->post('file');
			$this->db->where('id',$file);
			$this->db->delete('file');
		}
		public function search()
		{
			$name=$this->input->post('search');
			$this->db->like('name',$name);
			$query=$this->db->get('file');
			return $query;
		}
		public function set($file)
		{
			$query=$this->db->query("UPDATE file SET active= CASE WHEN active = 0 THEN 1 ELSE 0 end and id='$file'");
			return $query;
		}
		public function active()
		{
			$this->db->where('active',1);
			$query=$this->db->get('file');
			return $query;
		}
		
	}