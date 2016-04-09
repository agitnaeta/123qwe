<?php
	/**
	* 
	*/
	class Datapaket extends Ci_Model
	{
		
		public function all()
		{
			$this->db->order_by('kode_paket','DESC');
			$q=$this->db->get('paket');
			return $q;
		}
		public function one()
		{	$kode_paket=$this->input->post('kode_paket');	
			$this->db->where('kode_paket',$kode_paket);
			$q=$this->db->get('paket');
			return $q;
		}
		public function oneDel()
		{	$kode_paket=$this->input->post('f_kode_paket');	
			$this->db->where('kode_paket',$kode_paket);
			$q=$this->db->get('paket');
			return $q;
		}
		public function delete()
		{	
			$kode_paket=$this->input->post('kode_paket');	
			$this->db->where('kode_paket',$kode_paket);
			$q=$this->db->delete('paket');
		}
		public function insert($gambar,$kode_paket)
		{
			$data = array(
				'kode_paket' => $kode_paket,
				'nama_paket' => $this->input->post('f_nama_paket'),
				'lama_hari' => $this->input->post('f_lama_hari'),
				'harga' => $this->input->post('f_harga'),
				'kapasitas_download'=>$this->input->post('f_kapasitas_download'),
				'gambar' => $gambar
			 );
			$this->db->insert('paket',$data);
		}
		public function update($gambar,$kode_paket)
		{
		
			if ($gambar=='') 
			{
				$data = array(
				'kode_paket' => $kode_paket,
				'nama_paket' => $this->input->post('f_nama_paket'),
				'lama_hari' => $this->input->post('f_lama_hari'),
				'harga' => $this->input->post('f_harga'),
				'kapasitas_download'=>$this->input->post('f_kapasitas_download')
				 );
			}
			else
			{
				$data = array(
				'kode_paket' =>$kode_paket,
				'nama_paket' => $this->input->post('f_nama_paket'),
				'lama_hari' => $this->input->post('f_lama_hari'),
				'harga' => $this->input->post('f_harga'),
				'kapasitas_download'=>$this->input->post('f_kapasitas_download'),
				'gambar' => $gambar
				 );
			}
			$this->db->where('kode_paket',$kode_paket);
			$this->db->update('paket',$data);
		}
		public function max()
		{
			$q=$this->db->query("select max(kode_paket) as max from paket");
			return $q;
		}
		public function sort()
		{
			$sort=$this->input->post('sort');
			$this->db->order_by($sort,'asc');
			$q=$this->db->get('paket');
			return $q;	
		}
		public function search()
		{
			$cari=$this->input->post('cari');
			$this->db->like('nama_paket',$cari);
			$q=$this->db->get('paket');
			return $q;
		}
	}
