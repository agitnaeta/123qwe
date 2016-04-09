<?php
	/**
	* 
	*/
	class Databank extends CI_Model
	{
		public function all()
		{
			$this->db->order_by('idbank','desc');
			$query=$this->db->get('bank');
			return $query;
		}
		public function insert()
		{
			$data = array(
				'idbank' => $this->idBank(),
				'nama_bank' => $this->input->post('f_nama_bank'),
				'no_rekening' => $this->input->post('f_no_rekening'),
				'nama_pemilik' => $this->input->post('f_nama_pemilik'),
			 );
			$this->db->insert('bank',$data);

		}
		public function update()
		{
			$idbank=$this->input->post('f_idbank');
			$data = array(
				'nama_bank' => $this->input->post('f_nama_bank'),
				'no_rekening' => $this->input->post('f_no_rekening'),
				'nama_pemilik' => $this->input->post('f_nama_pemilik'),
			 );
			$this->db->where('idbank',$idbank);
			$this->db->update('bank',$data);
		}
		public function delete()
		{
			$idbank=$this->input->post('idbank');
			$this->db->where('idbank',$idbank);
			$this->db->delete('bank');
		}
		public function one($idbank)
		{
			$this->db->where('idbank',$idbank);
			$q=$this->db->get('bank');
			return $q;
		}
		public function idBank()
		{
			$q=$this->db->query("select max(idbank) as max from bank");
			foreach ($q->result() as $row)
			{
				if ($row->max==null) {
					return $idbank="B001";
				}
				else
				{
					
					$i=substr($row->max,0,1);
					$ii=sprintf("%'.03d\n", substr($row->max, 1,4)+1);
					return $idbank=$i."".$ii;
				}
			}

		}
	}