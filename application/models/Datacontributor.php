<?php 
	/**
	* 
	*/
	//session_start();
	class Datacontributor extends CI_Model
	{
		

		public function one($memberid)
		{
			$this->db->where('memberid',$memberid);
			$query=$this->db->get("contributor");
			return $query;
		}
                 public function updateUsername($memberid,$data)
		{
			$this->db->where('memberid',$memberid);
			$this->db->update('contributor',$data);
		}
                 public function byEmail($email)
		{
			$this->db->where('email',$email);
			return $query=$this->db->get("contributor");
			
		}
		public function login()
		{
			$username=$this->input->post('username');
			$pass=$this->input->post('password');
			$password=md5($pass);
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			$query=$this->db->get('contributor');
			if ($query) {
				return $query;
			}
			else
			{
				return null;
			}
		}
		public function update($memberid,$foto)
		{

			$tanggal=$this->input->post('tanggal_lahir');
			if (empty($tanggal)) 
			{
				$ex="0000-00-00";
			}
			else
			{
				$ex=explode("-", $tanggal);
			}
			
			$strip="-";
			$tanggal_lahir="$ex[0]$strip$ex[1]$strip$ex[2]";
			if ($foto=='') 
			{
				$password=$this->input->post('password');
				if (empty($password)) {
					$data = array(
					'nama' => $this->input->post('nama'),
					'username' => $this->input->post('username'),
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
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password')),
					'no_identitas' => $this->input->post('no_identitas'),
					'email' => $this->input->post('email'),
					'alamat' => $this->input->post('alamat'),
					'tanggal_lahir' => $tanggal_lahir,
					);
				}
			}
			else
			{
				$data = array(
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'no_identitas' => $this->input->post('no_identitas'),
				'email' => $this->input->post('email'),
				'alamat' => $this->input->post('alamat'),
				'tanggal_lahir' => $tanggal_lahir,
				'foto' => $foto,
				);
			}
			
			$this->db->where('memberid',$memberid);
			$this->db->update('contributor',$data);
		}
		public function updatePassword($memberid)
		{
			$data = array(
				'password' => md5($this->input->post('password')),
				);
			$this->db->where('memberid',$memberid);
			$this->db->update('contributor',$data);

			
			$this->db->where('memberid',$memberid);
			$this->db->update('firstlogin',$data);
		}
		public function all()
		{	$this->db->order_by('memberid','DESC');
			$query=$this->db->get('contributor',10);
			return $query;
		}
		public function search()
		{
			$cari=$this->input->post('cari');
			$this->db->like('nama',$cari);
			$this->db->or_like('username',$cari);
			$this->db->or_like('email',$cari);
			$this->db->or_like('memberid',$cari);
			$query=$this->db->get('contributor');
			return $query;
		}
		public function order()
		{
			$order=$this->input->post('sort');
			$this->db->order_by($order,'ASC');
			$query=$this->db->get('contributor');
			return $query;
		}
		public function count()
		{
			$count=$this->input->post('count');
			$query=$this->db->get('contributor',$count);
			return $query;
		}

		public function upload($dataImage)
		{
			$this->db->insert('foto',$dataImage);
		}
		public function changeApp($memberid)
		{
			$this->db->where('memberid',$memberid);
			$data = array('app_status' => 1);
			$this->db->update('contributor',$data);
		}
		public function earning($memberid)
		{
			$q=$this->db->query("select foto.id_foto,id_download,memberid from foto,download where id_contributor='$memberid' and foto.id_foto=download.id_foto and download.status=1");
			return $q;
		}
		public function uploadCount($memberid)
		{
			
			$q=$this->db->query("select count(id_foto) as jumlah from foto where id_contributor='$memberid'");
			return $q;
		}
		public function delete()
		{
			$memberid=$this->input->post('memberid');
			$this->db->where('memberid',$memberid);
			$this->db->delete('contributor');

                        $this->db->where('memberid',$memberid);
			$this->db->delete('firstlogin');
		}
		public function maxid()
		{
			$q=$this->db->query("select max(memberid) as max from contributor");
			foreach ($q->result() as $row)
			{
				if ($row->max==null) 
				{
					return $memberid="C00001";
				}
				else
				{
					
					$sub1=substr($row->max,0,1);
					$sub2=sprintf("%'.05d\n",substr($row->max,1,6)+1);
					return $memberid="$sub1$sub2";

				}
			}
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
			$this->db->update('contributor',$data);
		}
		public function set_best($memberid)
		{
			$q=$this->one($memberid);
			foreach ($q->result() as $row)
			{
				$status=$row->trusted;
				if ($status==0) {
					$data = array('trusted' => 1,);
				}
				else
				{
					$data = array('trusted' => 0,);
				}
				$this->db->where('memberid',$memberid);
				$this->db->update('contributor',$data);
			}
		}
	}
