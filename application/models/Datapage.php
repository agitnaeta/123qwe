<?php 
	/**
	* 
	*/
	class Datapage extends Ci_Model
	{
		
		public function profile()
		{
			$this->db->where('id','1');
			$query=$this->db->get('page');
			return $query;
		}
		public function updateProfile()
		{
			$data = array(
				'name_page' => $this->input->post('name_page'),
				'isi' => $this->input->post('isi'),
				 );
			
			$this->db->where('id','1');
			$this->db->update('page',$data);
		}
		public function faq()
		{
			$this->db->where('id','2');
			$query=$this->db->get('page');
			return $query;
		}
		public function updateFaq()
		{
			$data = array(
				'name_page' => $this->input->post('name_page'),
				'isi' => $this->input->post('isi'),
				 );
			
			$this->db->where('id','2');
			$this->db->update('page',$data);
		}
		public function career()
		{
			$this->db->where('id','3');
			$query=$this->db->get('page');
			return $query;
		}
		public function updateCareer()
		{
			$data = array(
				'name_page' => $this->input->post('name_page'),
				'isi' => $this->input->post('isi'),
				 );
			
			$this->db->where('id','3');
			$this->db->update('page',$data);
		}
		public function story()
		{
			$this->db->where('id','4');
			$query=$this->db->get('page');
			return $query;
		}
		public function updateStory()
		{
			$data = array(
				'name_page' => $this->input->post('name_page'),
				'isi' => $this->input->post('isi'),
				 );
			
			$this->db->where('id','4');
			$this->db->update('page',$data);
		}

	}