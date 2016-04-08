<?php 
	/**
	* 
	*/
	class Datakonfirmasi extends CI_Model
	{
		
		public function insert($bukti)
		{

			$tanggal=$this->input->post('tanggal');
			$bulan=$this->input->post('bulan');
			$tahun=$this->input->post('tahun');
			$jam=$this->input->post('jam');
			$menit=$this->input->post('menit');

			$tanggal_kirim=$tahun."-".$bulan."-".$tanggal;
			$waktu=$jam.":".$menit."-";
			
			$data = array(
				'idkonfirmasi' => $this->idkonfirmasi(),
				'no_invoice' => $this->input->post('no_invoice'),
				'no_rek_tujuan' => $this->input->post('no_rek_tujuan'),
				'no_pengirim' => $this->input->post('no_pengirim'),
				'nama_pengirim' => $this->input->post('nama_pengirim'),
				'tanggal_kirim' =>$tanggal_kirim,
				'waktu' => $waktu,
				'jumlah_bayar' => $this->input->post('jumlah_bayar'),
				'bukti' => $bukti,
			 );
			$this->db->insert('konfirmasi',$data);
		}
		public function all()
		{
			$q=$this->db->get('konfirmasi');
			return $q;
		}
		public function one($idkonfirmasi)
		{
			$this->db->where('idkonfirmasi',$idkonfirmasi);
			$q=$this->db->get('konfirmasi');
			return $q;
		}
		public function display()
		{
			$display=$this->input->post('display');
			if (empty($display)) {
				$display='30';
			}
			$this->db->order_by('idkonfirmasi','desc');
			$q=$this->db->get('konfirmasi',$display);
			return $q;

		}
		public function idkonfirmasi()
		{
			
			$q=$this->db->query("select max(idkonfirmasi) as max from konfirmasi");
				foreach($q->result() as $row)
				{
					if ($row->max==null) {
								return 	$konfirmasi="K00000001";
					}
					else{
								$sub1=substr($row->max,0,1);
						 		$sub2=sprintf("%'.08d\n",substr($row->max,1,9)+1);
								return $konfirmasi=$sub1."".$sub2;
					}
				}
		}
		public function search()
		{
			$search=$this->input->post('search');
			$this->db->where('no_invoice',$search);
			$q=$this->db->get('konfirmasi');
			return $q;
		}
		public function delete()
		{
			$idkonfirmasi=$this->input->post('idkonfirmasi');
			$this->db->where('idkonfirmasi',$idkonfirmasi);
			$this->db->delete('konfirmasi');
		}
		public function status()
		{
			$status=$this->input->post('status');
			$this->db->where('status',$status);
			$q=$this->db->get('konfirmasi');
			return $q;
		}
		public function acc()
		{
			$idkonfirmasi=$this->input->post('idkonfirmasi');
			$data = array('status' => 1);
			$this->db->where('idkonfirmasi',$idkonfirmasi);
			$q=$this->db->update('konfirmasi',$data);
		}
		
	}