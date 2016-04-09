<?php 
	/**
	* 
	*/
	class Datainvoice extends Ci_Model
	{
		
		public function all()
		{
			$q=$this->db->get('invoice'); return $q;
		}
		public function display()
		{
			$display=$this->input->post('display');
			if (empty($display)) 
			{
				$display=30;
			}
			$q=$this->db->get('invoice',$display);
			return $q;
		}
		public function sort()
		{
			$sort=$this->input->post('sort');
			$display=$this->input->post('display');
			if (empty($display)) 
			{
				$display=30;
			}
			$this->db->order_by($sort,'desc');
			$q=$this->db->get('invoice',$display);
			return $q;
		}
		public function no_invoice()
		{
			$q=$this->db->query("select max(no_invoice) as max from invoice");
				foreach($q->result() as $row)
				{
					if ($row->max==null) {
						return 	$no_invoice="INV000001";
					}
					else{
								$sub1=substr($row->max,0,3);
						 	$sub2=sprintf("%'.06d\n",substr($row->max,3,9)+1);
								return $no_invoice=$sub1."".$sub2;
					}
				}
		}
		public function insert($data)
		{
			$this->db->insert('invoice',$data);
		}
		public function myInvoice($memberid)
		{
			$this->db->where('memberid',$memberid);
			$this->db->order_by('no_invoice',"DESC");
			$q=$this->db->get('invoice'); return $q;
		}
		public function acc($no_invoice)
		{
			$this->db->where('no_invoice',$no_invoice);
			$data = array('status' => 1);
			$this->db->update('invoice',$data);
		}
		public function one($no_invoice)
		{
			$this->db->where('no_invoice',$no_invoice);
			$q=$this->db->get('invoice'); return $q;
		}
		public function getPendapatan()
		{
			$dari=$this->input->post('dari');
			$sampai=$this->input->post('sampai');
			if (empty($dari) or empty($sampai)) {
				
				$q=$this->db->query("select sum(harga) as jumlah from invoice where status=1");return $q;
			}
			else
			{
				$q=$this->db->query("select sum(harga) as jumlah from invoice where status=1 and tanggal_deposit between '$dari' and '$sampai'");
				return $q;
			}
			
			
		}
		public function getTagihan()
		{
			$dari=$this->input->post('dari');
			$sampai=$this->input->post('sampai');
			if (empty($dari) or empty($sampai)) {
				
				$q=$this->db->query("select sum(harga) as jumlah from invoice where status=0");return $q;
			}
			else
			{
				$q=$this->db->query("select sum(harga) as jumlah from invoice where status=0 and tanggal_deposit between '$dari' and '$sampai'");
				return $q;
			}
			
			return $q;
		}
		public function status()
		{
			$status=$this->input->post('status');
			$this->db->where('status',$status);
			$q=$this->db->get('invoice',30);
			return $q;
		}
		public function showDate($dari,$sampai)
		{
				$q=$this->db->query("SELECT * FROM invoice WHERE tanggal_deposit BETWEEN '$dari' AND '$sampai';");
				return $q;
		}
		public function updateMigrasi($memberid,$newMemberId)
		{
			$data = array('memberid' => $newMemberId);
			$this->db->where('memberid',$memberid);
			$this->db->update('invoice',$data);
		}
	}