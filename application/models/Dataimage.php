 	<?php
	/**
	* 
	*/
	class Dataimage extends Ci_Model
	{
		
		public function all()
		{
			return $this->db->get('foto');
		}
		public function updateResize()
		{
			$data = array('size' => $this->input->post('ratio') );
			$this->db->where('kode','resize');
			$this->db->update('image_prop',$data);

		}
		public function display()
		{
			$this->db->where('status',1);
			$q=$this->db->get('foto',20);
			return $q;

		}
		public function getRatio()
		{
			$this->db->where('kode','resize');
			$query=$this->db->get('image_prop');
			return $query;
		}

		//temp_image
		public function temp_accept()
		{	$this->db->where('status','<7');
			$query=$this->db->get('temp_accept');
			return $query;
		}
		public function newFoto($jumlah_admin)
		{
			// $this->db->where('status',0);
			// $this->db->order_by('tanggal_upload','desc');	
			$query=$this->db->query("select * from voting where vote<'$jumlah_admin'");
			return $query;
		}
		public function insert_perhitungan($id_foto,$id_admin)
		{
			$data = array(
				'id_foto' => $id_foto,
				'id_admin' => $id_admin,
			 );
			$this->db->insert('perhitungan_nilai',$data);
		}
		public function update_temp($id_foto,$status)
		{
			$status = array('status' =>$status);
			$this->db->where('id_foto',$id_foto);
			$this->db->update('temp_accept',$status);
		}
		public function one($id_foto)
		{
			$query=$this->db->query("SELECT *,username FROM foto f,contributor c where c.memberid=f.id_contributor and id_foto='$id_foto'");
			
			return $query;

		}
		public function all_contributor($id_contributor)
		{
			$this->db->where('id_contributor',$id_contributor);
			$this->db->order_by('id_foto','desc');
			$query=$this->db->get('foto');
			return $query;
		}
		public function search($id_contributor)
		{
			$search=$this->input->post('search');
			
			$this->db->where('id_contributor',$id_contributor);
			$this->db->like('judul',$search);
			
			$query=$this->db->get('foto');
			if (!$query) 
			{
				$query=$this->db->get('foto');
				if ($query) 
				{
					return $query;
				}
				else
				{
					return null;
				}
			}
			else
			{
				return $query;
			}
		}
		public function searchDisplay($search)
		{
			
//			$query=$this->db->query("select * from foto where ((judul like'%$search%' and status=1) xor (kategori like '%$search%' and status=1)) xor (tag like '%$search%' and status=1)");

$query=$this->db->query("SELECT * FROM foto where tag like '%$search%' and status=1 or judul like '%$search%' and status=1 or kategori like '%$search%' and status=1;");
				if ($query) 
				{
					return $query;
				}
				else
				{
					return null;
				}
		}
		public function removeImage($id_foto)
		{
			$this->db->where('id_foto',$id_foto);
			$this->db->delete('foto');

		}

		public function allFree()
		{
			$q=$this->db->get('freeImage');
			return $q;
		}
		public function submit_first($data)
		{
			$this->db->insert('temp_accept',$data);
		}
		public function vektor($id_contributor)
		{
			$this->db->where('type','vektor');
			$this->db->where('id_contributor',$id_contributor);	
			$q=$this->db->get('foto');
			return $q;
		}
		public function photo($id_contributor)
		{
			$this->db->where('type','photo');
			$this->db->where('id_contributor',$id_contributor);
			$q=$this->db->get('foto');
			return $q;
		}
		public function getType($type,$id_contributor)
		{
			$this->db->where('type',$type);
			$this->db->where('status',1);
			$q=$this->db->get('foto');
			return $q;
		}
		public function acc()
		{
			$this->db->where('status',1);
			$q=$this->db->get('foto',10);
			return $q;
		}
		public function allvektorImage()
		{
			$this->db->where('type','vektor');
			$this->db->where('status',1);
                        $this->db->order_by('id_foto','DESC');
			$q=$this->db->get('foto',10);
			return $q;
		}
		public function allphotoImage()
		{
			$this->db->where('type','photo');
			$this->db->where('status',1);
                        $this->db->order_by('id_foto','DESC');
			$q=$this->db->get('foto',10);
			return $q;
		}
		public function kategory($kategory)
		{
			$this->db->like('kategori',str_replace('_','/',$kategory));
			$this->db->where('status',1);
			$q=$this->db->get('foto');
			return $q;
		}
		public function tag($tag)
		{
			$this->db->like('tag',str_replace('_','/',$tag));
			$this->db->where('status',1);
			$q=$this->db->get('foto');
			return $q;
		}
		public function freeImage($jumlah)
		{
			$q=$this->db->query("select * from imageweek where vote >='$jumlah' order by id_foto DESC");
			return $q;
		}
		public function upateStatus($id_foto)
		{
			$data = array('status' =>1);
			$this->db->where('id_foto',$id_foto);
			$this->db->update('foto',$data);
		}



		public function getUploadSet()
		{
			$this->db->where('idupload_setting',1);
			return $this->db->get('upload_setting');
		}
		public function setUpload($data)
		{
			$this->db->where('idupload_setting',1);
			$this->db->update('upload_setting',$data);
		}
public function allVektor()
		{
			$this->db->where('type','vektor');
			$this->db->where('status',1);
			$this->db->order_by('id_foto','DESC');
			$q=$this->db->get('foto');
			return $q;
		}
		public function allPhoto()
		{
			$this->db->where('type','photo');
			$this->db->where('status',1);
			$this->db->order_by('id_foto','DESC');
			$q=$this->db->get('foto');
			return $q;
		}
                public function by($username)
		{
			$query=$this->db->query("SELECT *,username FROM foto f,contributor c where c.memberid=f.id_contributor and username='$username' and f.status=1");
			return $query;
		}
	}