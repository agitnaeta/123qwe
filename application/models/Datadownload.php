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
			$q=$this->db->query("select f.id_foto,count(f.id_foto) as jumlah, id_contributor, memberid, watermark,f.mini
								from download d, foto f
								where d.id_foto=f.id_foto
								order by jumlah desc");
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