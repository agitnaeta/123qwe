<?php 
	/**
	* 
	*/
	//session_start();
	class Datamember extends CI_Model
	{
		
		public function all()
		{
			$this->db->order_by('memberid','DESC');
			$query=$this->db->get('member',10);
			return $query;
		}
		public function lastDaftar()
		{
			$this->db->order_by('memberid','DESC');
			$query=$this->db->get('member',8);
			return $query;
		}
                public function byEmail($email)
		{
			$this->db->where('email',$email);
			return $query=$this->db->get("member");
			
		}
		public function one($memberid)
		{
			$this->db->where('memberid',$memberid);
			$query=$this->db->get("member");
			if ($query) {
				return $query;	
				
			}
			else
			{
				return null;
			}
		}
                 public function updateUsername($memberid,$data)
		{
			$this->db->where('memberid',$memberid);
			$this->db->update('member',$data);
		}
		public function login()
		{
			$username=$this->input->post('username');
			$pass=$this->input->post('password');
			$password=md5($pass);
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			$query=$this->db->get('member');
			if ($query) {
				return $query;
			}
			else
			{
				return null;
			}
		}
		public function updateMemberBy()
		{
			$data = array(
				'memberid' => $this->input->post('memberid'),
				'username' => $this->input->post('username'), 
				'email' => $this->input->post('email'), 
				'password' => md5($this->input->post('password')), 
				'no_identitas' => $this->input->post('no_identitas'), 
				'nama' => $this->input->post('nama'), 
				'tanggal_lahir' => $this->input->post('tanggal_lahir'), 
				'paket' => $this->input->post('paket'), 
				);
			$memberid=$this->input->post('memberid');
			$this->db->update('member',$data);
		}
		public function updateProfil($memberid,$foto)
		{
			$password=$this->input->post('password');

				$tanggal=$this->input->post('tanggal_lahir');
				$ex=explode("-", $tanggal);
				$strip="-";
				$tanggal_lahir="$ex[0]$strip$ex[1]$strip$ex[2]";

			if ($foto=='') 
			{
				if ($password=='') 
				{
					$data = array(
						'nama' => $this->input->post('nama'),
						'no_identitas' => $this->input->post('no_identitas'),
						'email' => $this->input->post('email'),
						'alamat' => $this->input->post('alamat'),
						'tanggal_lahir' => $tanggal_lahir,
						);
				}
				else
				{
					$data = array(
						'nama' => $this->input->post('nama'),
						'no_identitas' => $this->input->post('no_identitas'),
						'email' => $this->input->post('email'),
						'password' => $this->input->post('password'),
						'alamat' => $this->input->post('alamat'),
						'tanggal_lahir' => $tanggal_lahir,
						);
				}
			}
			else
			{
				if ($password=='') 
				{
					$data = array(
						'nama' => $this->input->post('nama'),
						'no_identitas' => $this->input->post('no_identitas'),
						'email' => $this->input->post('email'),
						'alamat' => $this->input->post('alamat'),
						'tanggal_lahir' => $tanggal_lahir,
						'foto' => $foto,
						);
				}
				else
				{
					$data = array(
						'nama' => $this->input->post('nama'),
						'no_identitas' => $this->input->post('no_identitas'),
						'email' => $this->input->post('email'),
						'password' => $this->input->post('password'),
						'alamat' => $this->input->post('alamat'),
						'tanggal_lahir' => $tanggal_lahir,
						'foto' => $foto,
						);
				}
			}
			
			$this->db->where('memberid',$memberid);
			$this->db->update('member',$data);
		}
		public function updatePassword($memberid)
		{
			$data = array(
				'password' => md5($this->input->post('password')),
				);
			$this->db->where('memberid',$memberid);
			$this->db->update('member',$data);

			
			$this->db->where('memberid',$memberid);
			$this->db->update('firstlogin',$data);
		}
		public function delete()
		{
			$memberid=$this->input->post('memberid');
			$this->db->where('memberid',$memberid);
			$this->db->delete('member');

			$this->db->where('memberid',$memberid);
			$this->db->delete('firstlogin');
		}
		public function deleteMigrate($memberid)
		{
			$this->db->where('memberid',$memberid);
			$this->db->delete('member');

			$this->db->where('memberid',$memberid);
			$this->db->delete('firstlogin');
		}
		public function searchMember()
		{
			$cari=$this->input->post('cari');
			$this->db->like('username',$cari);
			$this->db->or_like('nama',$cari);
			$this->db->or_like('email',$cari);
			$this->db->or_like('memberid',$cari);
			$query=$this->db->get('member');
			if ($query) {
				return $query;
			}
			else{
				return null;
			}
		}
		public function showCount()
		{
			$jumlah=$this->input->post('jumlah');
			$this->db->order_by('memberid','DESC');
			$query=$this->db->get('member',$jumlah);
			return $query;
		}
		public function orderMember()
		{
			$order=$this->input->post('order');
			$this->db->order_by($order,'ASC');
			$query=$this->db->get('member');
			return $query;
		}
		public function beContributor($data,$dtoken)
		{
			// print_r($data);
			// print_r($dtoken);
			$this->db->insert('contributor',$data);
			$this->db->insert('firstlogin',$dtoken);
		}
	}
