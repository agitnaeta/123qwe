<?php 
	/**
	* 
	*/
	class Datadownload extends CI_Model
	{
		
		public function all()
		{
			$q=$this->db->get('download');
			return $q;
		}
		public function byFoto($id_foto)
		{
			$this->db->where('id_foto',$id_foto);
			return $this->db->get('download');
		}
		public function cekContributor($id_foto)
		{
			return $this->db->query("select distinct(d.id_foto),c.memberid from download d,contributor c,foto f where d.id_foto=f.id_foto and c.memberid=f.id_contributor and d.id_foto='$id_foto'");
		}
		public function valid($param,$id_foto)
		{
			$this->db->where('status',$param);
			$this->db->where('id_foto',$id_foto);
			return $this->db->get('download');
		}
		public function insert($download)
		{
			$this->db->insert('download',$download);
		}
		public function delete($id_download)
		{
			$this->db->where('id_download',$id_download);
			$this->db->delete('download');
		}
		public function updateStatus($id_download)
		{
			$data=array('status'=>1);
			$this->db->where('id_download',$id_download);
			$this->db->update('download',$data);
		}
		public function one($id_download)
		{
			$this->db->where('id_download',$id_download);
			$q=$this->db->get('download');
			return $q;
		}
		public function getID()
		{
			$q=$this->db->query('select max(id_download) as max from download');
			foreach ($q->result() as $row)
			{
				if ($row->max==null) {
					return $id_download="D000000001";
				}
				else
				{
					$sub1=substr($row->max,0,1);
					$sub2=sprintf("%'.09d\n",substr($row->max,1,10)+1);
					return $id_download=$sub1."".$sub2;
				}
			}
		}
		public function getImage($link)
		{
			$this->db->where('link',$link);
			$q=$this->db->get('download');
			return $q;
		}
		public function display()
		{
			$q=$this->db->query("select distinct(d.id_foto),d.mini,count(d.id_foto) as jumlah ,c.username from download d,foto f, contributor c where d.id_foto=f.id_foto and c.memberid=f.id_contributor group by id_foto order by jumlah DESC");
			return $q;
		}
		public function jumlah_download()
		{
			$q=$this->db->get('download');
			return $q->num_rows();
		}
		public function myDownload($memberid)
		{
			$this->db->where('id_contributor',$memberid);
			$this->db->select_sum('earning');
			return $this->db->get('earning');
		}
		public function countDownload($id_foto)
		{
			$this->db->where('id_foto',$id_foto);
			return $this->db->get('download');
		}
	}