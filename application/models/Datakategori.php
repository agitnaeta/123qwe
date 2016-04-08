<?php
	/**
	* 
	*/
	class Datakategori extends CI_Model
	{
		
		public function all()
		{
				$q=$this->db->get('kategori');
				return $q;
		}
		public function display()
		{
			$this->db->order_by('id','DESC');
			$q=$this->db->get('kategori',10);
			return $q;
		}
		public function insert()
		{
			$id=$this->id();
			$data = array(
				'id' => $id, 
				'type' => $this->input->post('f_type'), 
				'nama' => $this->input->post('f_nama'), 
				);
			$this->db->insert('kategori',$data);
		}
		public function one()
		{
			$id=$this->input->post('id');
			$this->db->where('id',$id);
			$q=$this->db->get('kategori');
			return $q;
		}
		public function delete()
		{
			$id=$this->input->post('id');
			$this->db->where('id',$id);
			$this->db->delete('kategori');
		}
		public function update()
		{
			$id=$this->input->post('f_id');
			$data = array(
				'id' => $id, 
				'type' => $this->input->post('f_type'), 
				'nama' => $this->input->post('f_nama'), 
				);
			//print_r($data);
			$this->db->where('id',$id);
			$this->db->update('kategori',$data);
		}
		public function id()
		{
			$q=$this->db->query("select max(id) as max from kategori");
			foreach($q->result() as $row)
			{
				if ($row->max=='') 
				{
					return $id="CAT001";
				}
				else
				{
					
					$sub1=substr($row->max, 0,3);
					$sub2=sprintf("%'.03d\n",substr($row->max, 4,6)+1);
					return $id="$sub1$sub2";
				}
			}
		}
		public function search()
		{
			$search=$this->input->post('search');
			$this->db->like('nama',$search);
			$q=$this->db->get('kategori');
			return $q;
		}
		public function load_kategori()
		{
			$type=$this->input->post('type');
			$this->db->where('type',$type);
			$q=$this->db->get('kategori');
			return $q;
		}
		public function selectType($type)
		{
			$this->db->where('type',$type);
			$q=$this->db->get('kategori');
			return $q;
		}
	}