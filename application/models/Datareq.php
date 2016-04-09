<?php 
	/**
	* 
	*/
	class Datareq extends Ci_model
	{
		
		public function all()
		{
			$q=$this->db->get('request');
			return $q;
		}
		public function delete()
		{
			$idreq=$this->input->post('idreq');
			foreach ($idreq as $id)
			{
				$this->db->where('idreq',$id);
				$this->db->delete('request');
			}
		}
		public function proses()
		{
			$status=$this->input->post('status');
			$idreq=$this->input->post('idreq');
			$data = array('status' => $status);
			$this->db->where('idreq',$idreq);
			$this->db->update('request',$data);
		}
		public function sort()
		{
			$sort=$this->input->post('sort');
			$this->db->order_by($sort,'ASC');
			$q=$this->db->get('request',10);
			return $q;
		}
		public function search()
		{
			$search=$this->input->post('search');
			$this->db->like('name',$search);
			$this->db->or_like('idreq',$search);
			$q=$this->db->get('request');
			return $q;
		}
		public function one()
		{
			$idreq=$this->input->post('idreq');
			$this->db->where('idreq',$idreq);
			$q=$this->db->get('request');
			return $q;
		}
		public function update()
		{
			$idreq=$this->input->post('idreq');
			$data = array(
				'name' => $this->input->post('name'), 
				'theme' => $this->input->post('theme'), 
				'object' => $this->input->post('object'), 
				'location' => $this->input->post('location'), 
				'model' => $this->input->post('model'), 
				'detail' => $this->input->post('detail'), 
				'deadline' => $this->input->post('deadline'), 
				'phone' => $this->input->post('phone'), 
				'status' => $this->input->post('status'), 
				);
			//print_r($data);
			$this->db->where('idreq',$idreq);
			$this->db->update('request',$data);
		}
		public function limit()
		{
			$limit=$this->input->post('show');
			$this->db->order_by('idreq',"desc");
			$q=$this->db->query("select * from request order by idreq desc");
			return $q;
		}
		public function status()
		{
			$status=$this->input->post('status');
			$this->db->where('status',$status);
			$q=$this->db->get('request');
			return $q;
		}
		public function deleteAll()
		{
			$this->db->truncate('request'); 
		}
		public function getMax()
		{
			$q=$this->db->query('select max(idreq) as max from request');
			return $q;	
		}
		public function insert($data)
		{
			$this->db->insert('request',$data);
		}
		public function insertvektor($data)
		{
			$this->db->insert('reqvektor',$data);
		}




		public function getIDV()
		{
			$q=$this->db->query("select max(idreq) as max from reqvektor ");
			foreach ($q->result() as $row)
			{
				if ($row->max==null) {
					return $idreq="R000001";
				}
				else
				{
					$i=substr($row->max, 0,1);
					$ii=sprintf("%'.05d\n",substr($row->max,1,6)+1);
					return $idreq=$i."".$ii;
				}
			}
		}
		public function all_vektor()
		{
			$q=$this->db->get('reqvektor');
			return $q;
		}
		public function sorting_req_vektor($sorting)
		{
			$this->db->order_by($sorting,"ASC");
			$q=$this->db->get('reqvektor');
			return $q;
		}
		public function show_req_vektor($show)
		{
			$q=$this->db->get('reqvektor',$show);
			return $q;
		}
		public function search_req_vektor($search)
		{
			
			
			$this->db->where('idreq',$search);
			$this->db->or_like('name',$search);
			$q=$this->db->get('reqvektor');
			return $q;
		
		}
		public function status_req_vektor($status)
		{
			$this->db->where('status',$status);
			$q=$this->db->get('reqvektor');
			return $q;
		
		}
		public function delete_req_vektor($idreq)
		{
			$this->db->where('idreq',$idreq);
			$q=$this->db->get('reqvektor');
			return $q;
		}
		public function deleteAll_vektor()
		{
			$this->db->query("truncate reqvektor");
		}
		public function detail($idreq)
		{
			$this->db->where('idreq',$idreq);
			$q=$this->db->get('reqvektor');
			return $q;
		}
	}