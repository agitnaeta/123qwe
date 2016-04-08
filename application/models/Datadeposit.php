<?php 
	/**
	* 
	*/
	class Datadeposit extends CI_Model
	{
		
		public function all()
		{
			$q=$this->db->query('select id_deposit, sisa_deposit, memberid, paket.nama_paket,tanggal_expired,sisa_download,status from deposit,paket where deposit.kode_paket=paket.kode_paket');
			return $q;
		}
		public function display()
		{
			$q=$this->db->query('select id_deposit, sisa_deposit, memberid, paket.nama_paket, tanggal_expired,sisa_download,status from deposit,paket where deposit.kode_paket=paket.kode_paket limit 10');
			return $q;
		}
		public function one($id_deposit)
		{
				$q=$this->db->query("select id_deposit, sisa_deposit, memberid,deposit.kode_paket, paket.nama_paket, tanggal_expired ,sisa_download,status from deposit,paket 
																										where deposit.kode_paket=paket.kode_paket and id_deposit='$id_deposit'");
				return $q;
		}
		public function first_insert($databaru)
		{
			$arrDeposit = array('id_deposit' => $this->id_deposit());
			$data=array_merge($arrDeposit,$databaru);
			$this->db->insert('deposit',$data);
		}
		public function insert()
		{
			$data = array(
				'id_deposit'=>$this->id_deposit(),
				'memberid' =>$this->input->post('f_member_id') , 
				'kode_paket' =>$this->input->post('f_kode_paket') , 
				'sisa_hari' =>$this->input->post('f_sisa_hari') , 
				'sisa_download' =>$this->input->post('f_sisa_download') , 
				'status' =>$this->input->post('f_status') , 
				'tanggal_deposit' =>date('Y-m-d') , 
				);
			$this->db->insert('deposit',$data);
		}
		public function id_deposit()
		{
				$q=$this->db->query("select max(id_deposit) as max from deposit");
				foreach($q->result() as $row)
				{
					if ($row->max==null) {
						return 	$id_deposit="Dep000001";
					}
					else{
							$sub1=substr($row->max,0,3);
						 	$sub2=sprintf("%'.06d\n",substr($row->max,3,9)+1);
							return $id_deposit=$sub1."".$sub2;
					}
				}
		}
		public function update()
		{
			$data = array(
				'id_deposit'=>$this->input->post('f_id_deposit'),
				'memberid' =>$this->input->post('f_member_id') , 
				'kode_paket' =>$this->input->post('f_kode_paket') , 
				'sisa_hari' =>$this->input->post('f_sisa_hari') , 
				'sisa_download' =>$this->input->post('f_sisa_download') , 
				'status' =>$this->input->post('f_status') , 
				);
			$id_deposit=$this->input->post('f_id_deposit');
			$this->db->where('id_deposit',$id_deposit);
			$this->db->update('deposit',$data);
		}
		public function delete($id_deposit)
		{
			$this->db->where('id_deposit',$id_deposit);
			$this->db->delete('deposit');
		}
		public function search($search)
		{
			$q=$this->db->query("select id_deposit, sisa_deposit, memberid,deposit.kode_paket, paket.nama_paket, tanggal_expired,sisa_download,status from deposit,paket 
									where deposit.kode_paket=paket.kode_paket and memberid like'%$search%'");
			return $q;
		}
		public function sort($sort)
		{
			$q=$this->db->query("	select id_deposit, sisa_deposit, memberid, paket.nama_paket, tanggal_expired,sisa_download,status
									from deposit,paket
									where deposit.kode_paket=paket.kode_paket
                 					 order by $sort");
			return $q;
		}
		public function insert_member($data)
		{
			$this->db->insert('deposit',$data);
		}
		public function userCek($memberid)
		{
			$this->db->where('memberid',$memberid);	
			$q=$this->db->get('deposit');
			return $q;
		}
		public function get($memberid)
		{
			$this->db->where('memberid',$memberid);
			$q=$this->db->get('deposit');
			return $q;
		}
		public function update_deposit($databaru,$id_deposit)
		{
			$this->db->where('id_deposit',$id_deposit);
			$this->db->update('deposit',$databaru);
		}
		public function updateMigrasi($memberid,$newMemberId)
		{
			$data = array('memberid' => $newMemberId);
			$this->db->where('memberid',$memberid);
			$this->db->update('deposit',$data);
		}
		public function kurangDownload($memberid)
		{
			$this->db->where('memberid',$memberid);	
			$q=$this->db->get('deposit');
			foreach($q->result() as $row)
			{
				$data = array('sisa_download' =>$row->sisa_download-1);
				$this->db->where('memberid',$memberid);	
				$this->db->update('deposit',$data);
			}
		}
		public function myDeposit($memberid)
		{
			$this->db->where('memberid',$memberid);
			return $this->db->get('deposit');
		}
		public function autoUpdate($depositBaru,$memberid)
		{
			$this->db->where('memberid',$memberid);	
			$this->db->update('deposit',$depositBaru);
		}
	}