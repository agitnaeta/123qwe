<?php 
	/**
	* 
	*/
	class Dataredeem extends ci_model
	{
		
		public function insert($data)
		{
			$id=array('idredeem'=>$this->getID());
			$newData=array_merge($data,$id);
			$this->db->insert('redeem',$newData);
		}
		public function all()
		{
			return $q=$this->db->get('redeem');
		}
		public function display()
		{
			// $this->db->where('status');
			$q=$this->db->get('redeem');
			return $q;
		}
		public function myRedeem($memberid)
		{
			$this->db->where('memberid',$memberid);
		        $this->db->where('status',0);
			$q=$this->db->get('redeem');
			return $q;
		}
			function cekRedeem($memberid){
			                        $this->db->where('memberid',$memberid);
					        //$this->db->where('status',0);
						$q=$this->db->get('redeem');
						return $q;
			}

                public function myEarning($id_contributor)
		{
			$this->db->where('id_contributor',$id_contributor);
			$q=$this->db->get('earning');
			return $q;
		}
		public function one($idredeem)
		{
			$this->db->where('idredeem',$idredeem);
			
			$q=$this->db->get('redeem');
			return $q;
		}
		public function getID()
		{
			$q=$this->db->query('select max(idredeem) as max from redeem');
			foreach ($q->result() as $row)
			{

				if ($row->max!=null) 
				{
                                        $i=substr($row->max,0,1);
					$ii=sprintf("%'.06d\n",substr($row->max,1,6)+1);
					return $idredeem=trim($i."".$ii);

					
				}
				else
				{
					return $idredeem="R000001";

				}
			}
		}
		public function delete($idredeem)
		{
			$this->db->where('idredeem',$idredeem);
			$this->db->delete('redeem');
		}
		public function data_redeem($idredeem)
		{
			$q=$this->db->query("select nama, c.memberid, email,idredeem, tanggal_redeem,nominal, no_rekening,nama_rekening
								from redeem r,contributor c
								where c.memberid=r.memberid
								and idredeem='$idredeem'");
			return $q;

		}
		public function updateStatus($idredeem)
		{
			$this->db->where('idredeem',$idredeem);
			$data = array('status' => 1);
			$this->db->update('redeem',$data);
		}
		public function diambil($memberid)
		{
			
			$q=$this->db->query("select sum(nominal) as diambil from redeem where memberid='$memberid' and status=1");
			foreach ($q->result() as $row)
			{
				return $diambil=$row->diambil;
			}
		}
		public function acc()
		{
			$q=$this->db->query("select sum(nominal) as acc from redeem where  status=1");
			foreach ($q->result() as $row)
			{
				return $acc=$row->acc;
			}
		}
		public function wait()
		{
			$q=$this->db->query("select sum(nominal) as wait from redeem where  status=0");
			foreach ($q->result() as $row)
			{
				return $wait=$row->wait;
			}
		}
		public function search($search)
		{
			$this->db->like('nama_rekening',$search);
			$this->db->like('no_rekening',$search);
			$q=$this->db->get('redeem');
			return $q;
		}



		#setting Redeem
		public function getSet($id)
		{
			$this->db->where('id',$id);
			return $this->db->get('setting_redeem');
		}
		public function setRedeem($data,$id)
		{
			$this->db->where('id',$id);
			$this->db->update('setting_redeem',$data);
		}
	}