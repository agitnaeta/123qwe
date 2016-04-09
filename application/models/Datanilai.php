<?php 
	/**
	* 
	*/
	class Datanilai extends CI_Model
	{
		
		public function all()
		{
			$query=$this->db->get('penilaian');
			return $query;
		}
		public function update()
		{	
			$data = array(
				'nilai' => $this->input->post('nilai'), 
				'pembagi' => $this->input->post('pembagi'), 
				);
			$this->db->where('id',1);
			$this->db->update('penilaian',$data);
		}
		
		public function add($data)
		{
			$this->db->insert('perhitungan_nilai',$data);
		}
		public function cekNilai($id_foto,$userid)
		{
			$this->db->where('id_foto',$id_foto);
			$this->db->where('userid',$userid);
			$q=$this->db->get('perhitungan_nilai');
			return $q;
		}
		public function no_nilai()
		{
			$q=$this->db->query('select max(idnilai) as max from perhitungan_nilai');
			foreach ($q->result() as $row)
			{
				if ($row->max=='') {
					return $idnilai='N000001';
				}
				else
				{
					$sub1=substr($row->max, 0,1);
					$sub2=sprintf("%'.06d\n",substr($row->max,1,7)+1);
					return $idnilai="$sub1$sub2";
				}
			}
		}
		public function getBatasNilai()
		{
			$this->db->where('id',1);
			$q=$this->db->get('penilaian');
			foreach($q->result() as $row)
			{
				return $batasNilai=$row->nilai;
			}
		}
		public function getStatus($id_foto)
		{
			$batasNilai=$this->getBatasNilai();
			$q=$this->db->query("select sum(nilai) as total from perhitungan_nilai where id_foto='$id_foto'");
			foreach ($q->result() as $row)
			{
				// return $arrayName = array('nilai' => $row->total,'batasNilai'=>$batasNilai);
				if ($row->total>=$batasNilai) 
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		public function getJumlahAdmin()
		{
			$this->db->where('status',1);
			$q=$this->db->get('user');
			return $admin=count($q->result());
		}
		public function cekAllvote($id_foto)
		{
			$this->db->where('id_foto',$id_foto);
			$q=$this->db->get('perhitungan_nilai');

			$amdin=$this->getJumlahAdmin();
			$vote=count($q->result());
			if ($vote>=$amdin) 
			{
				 return true;

			}
			else
			{
				 return false;
				
			}
		}
		public function komentar($id_foto)
		{
			$this->db->where('id_foto',$id_foto);
			$this->db->where('nilai',0);
			$q=$this->db->get('perhitungan_nilai');
			return $q;
		}
	}