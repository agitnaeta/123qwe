<?php
	/**
	* 
	*/
	class Pxadmin extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$session=$this->session->userdata('adminpx');
			if (empty($session)) {
				redirect('login/pxadmin');
			}
			else
			{
				$this->load->model('dataadmin');
                                $this->load->model('user');
				$this->load->model('databank');
				$this->load->model('datafile');
				$this->load->model('datapage');
				$this->load->model('dataimage');
				$this->load->model('datanilai');
				$this->load->model('datakonfirmasi');
				$this->load->model('datainvoice');
				$this->load->model('datamember');
				$this->load->model('datastatus');
				$this->load->model('dataterm');
				$this->load->model('datapaket');
				$this->load->model('datacontributor');
				$this->load->model('datareq');
				$this->load->model('datakategori');
				$this->load->model('datadeposit');
				$this->load->model('dataredeem');
				$this->load->model('datadownload');
				$this->load->model('datafirstlogin');
				$this->load->library('grocery_CRUD');
				$this->load->helper('dateindo');
				$this->load->helper('yesno');
				$this->load->helper('rupiah');
				
				
			}
		}
		public function index()
		{
			$session=$this->session->userdata('adminpx');
			$data['username']=$session['username'];
			$this->load->view('css');
			$this->load->view('back/panel',$data);
		}
		public function page_user()
		{
			$this->load->view('css');
			$this->load->view('back/page_user');
		}
		public function saveUser()
		{	
			
				$username=$this->input->post('username');
				$password=$this->input->post('password');
				$status=$this->input->post('status');
			
			if ($username=='' xor $password=='' xor $status=='') 
			{
				echo "<div class='alert alert-warning'> Data Kosong </div>";
			}
			else
			{	
				$max=$this->dataadmin->max();
				foreach ($max->result() as $row)
					$nmax=$row->max;
				$pmax=substr($nmax,3);
				$fmax=sprintf("%'.04d\n", $pmax+1);
				$userid="Adm$fmax";
				$user=$this->dataadmin->cekUsername();
				if ($user->result()!=null) {
					echo "<div class='alert alert-warning'> Nama Sudah Digunakan </div>";
				}
				else
				{
					$this->dataadmin->saveUser($userid);
					echo "<div class='alert alert-success'> Berhasil Disimpan</div>";
				}
			}
			
		}
		public function tabel_user()
		{
			$data['user']=$this->dataadmin->all();
			$this->load->view('back/tabel_user',$data);
		}
		public function _example_output($output=null)
		{
			  $this->load->view('our_template.php',$output);    
		}
		public function deleteUser()
		{
				
				$this->dataadmin->deleteUser();
				echo "<div class='alert alert-success'> Berhasil Delete</div>";
		}
		public function editUser()
		{
			$id=$this->input->post('id');
			//echo $id;
			$data=$this->dataadmin->one($id);
			echo json_encode($data->result());
		}
		public function deleteMarkUser()
		{
			$id=$this->input->post('userid');
			print_r($id);
		}
		public function updateUser()
		{
			$this->dataadmin->updateUser();
			echo "<div class='alert alert-success'> Berhasil Di Update</div>";
		}
		public function cariUser()
		{
			$data['user']=$this->dataadmin->cariUser();
			$this->load->view('back/tabel_user',$data);
		}


		/*start Member
			Setting Member Function
		
		*/
		public function searchMember()
		{
			$data['member']=$this->datamember->searchMember();
			$this->load->view('back/tabel_member',$data);
		}
		public function page_member()
		{
			$data['status']=$this->datastatus->all();
			$data['paket']=$this->datapaket->all();
			$this->load->view('css');
			$this->load->view('back/page_member',$data);
		}
		public function tabel_member()
		{
			$data['member']=$this->datamember->all();
			$this->load->view('back/tabel_member',$data);
		}
		public function getMember()
		{
			$memberid=$this->input->post('memberid');
			$data=$this->datamember->one($memberid);
			echo json_encode($data->result());
		}
		public function deleteMember()
		{
			
			$this->datamember->delete();
			echo "<div class='alert alert-success'> Berhasil Delete</div>";
		}
		public function detailMember($memberid)
		{
			$data['member']=$this->datamember->one($memberid);
			//echo json_encode($data['member']->result());
			$this->load->view('back/detail_member',$data);
		}
		public function showCount()
		{
			$data['member']=$this->datamember->showCount();
			$this->load->view('back/tabel_member',$data);

		}
		public function orderMember()
		{
			$data['member']=$this->datamember->orderMember();
			$this->load->view('back/tabel_member',$data);
		}
		public function updateMemberBy()
		{
			$memberid=$this->input->post('memberid');
			$password=md5($this->input->post('password')); 
			$this->datamember->updateMemberBy();
			$this->datafirstlogin->updatePass($memberid,$password);
			echo "<div class='alert alert-success text-center'> Berhasil Diupdate </div>";
		}
		public function updateMember()
		{
			$this->datamember->updateProfil();
			echo "<div class='alert alert-success'> Berhasil Delete</div>";
		}

		//contributor
		public function page_contributor()
		{
			$data['status']=$this->datastatus->all();
			$this->load->view('back/page_contributor',$data);
		}
		public function tabel_contributor()
		{
			$data['contributor']=$this->datacontributor->all();
			//echo json_encode($data['member']->result());
			$this->load->view('back/tabel_contributor',$data);
		}

		public function searchContributor()
		{
			$data['contributor']=$this->datacontributor->search();
			$this->load->view('back/tabel_contributor',$data);

		}
		public function getContributor()
		{
			$memberid=$this->input->post('memberid');
			$data=$this->datacontributor->one($memberid);
			echo json_encode($data->result());
		}
		
		public function updateContributor()
		{
			
			 $memberid=$this->input->post('memberid');
			 $password=md5($this->input->post('password')); 
			 $foto='';
			 $this->datacontributor->update($memberid,$foto);
			 $this->datafirstlogin->updatePass($memberid,$password);
			 echo "<div class='alert alert-success'> Berhasil Update</div>";
		}
		public function orderContributor()
		{
			
			$data['contributor']=$this->datacontributor->order();
			$this->load->view('back/tabel_contributor',$data);
		}
		public function showCountC()
		{
			$data['contributor']=$this->datacontributor->count();
			$this->load->view('back/tabel_contributor',$data);
		}
		public function detailContributor($memberid)
		{
			$data['contributor']=$this->datacontributor->one($memberid);
			//json_encode($data['contributor']->result());
			$this->load->view('back/detail_contributor',$data);
		}
		public function deleteContributor()
		{
			$this->datacontributor->delete();
			echo "<div class='alert alert-success'> Berhasil Delete</div>";
		}
		public function set_best()
		{
			$memberid=$this->input->post('memberid');
			$this->datacontributor->set_best($memberid);
			echo "Success";
		}




		//score
		public function page_score()
		{
			$data['admin']=$this->dataadmin->all();
			$score=$this->datanilai->all();
			foreach ($score->result() as $row)
			$data['nilai']=$row->nilai;
			$this->load->view('css');
			$this->load->view('back/page_score',$data);
		}
		public function setScore()
		{
			$this->datanilai->update();
			echo "<div class='alert alert-success'> Berhasil Di Set </div>";
		}

		//term
		public function page_term()
		{
			$data['term']=$this->dataterm->all();
			$this->load->view('css');
			$this->load->view('back/page_term',$data);
		}
		public function updateTerm()
		{
			$this->dataterm->update();
			echo "Updated!";
		}
		//image setting
		public function page_image()
		{
			$ratio=$this->dataimage->getRatio();
			foreach ($ratio->result() as $row)
			$data['ratio']=$row->size;
			$this->load->view('css');
			$this->load->view('back/page_image',$data);
		}
		public function updateResize()
		{
			$this->dataimage->updateResize();
			echo 'Updated!';
		}

		//image Approve
		public function page_newImage()
		{
                        $admin=$this->user->all();
                        $jumlah_admin=count($admin->result());
			$data['image']=$this->dataimage->newFoto($jumlah_admin);
		 	$this->load->view('css');
		 	$this->load->view('back/page_newImage',$data);
		}
                public function getDataImage($id_foto)
		{
			$data=$this->dataimage->one($id_foto);
			foreach ($data->result() as $row)
			{
				$path=base_url("upload/watermark/$row->watermark");
				$imageSize=getimagesize($path);
				$image = array(
					'image' => "<img class='img img-responsive' src=".base_url("upload/watermark/$row->watermark").">", 
					'id_foto' => $row->id_foto, 
					'judul' => $row->judul, 
					'type'=>$row->type,
					'image_week'=>yesno($row->image_week,"Yes","No"),
					'tanggal_upload'=>dateindo($row->tanggal_upload),
					'tag'=>$row->tag,
					'kategori'=>$row->kategori,
					'lebar'=>$imageSize[0],
					'tinggi'=>$imageSize[1],
					'model_realise'=>"<a target='__blank' href=".base_url("upload/mr/".$row->model_realise."")."> Download </a>"
					);
				echo json_encode($image);
			}
		}
		public function vote_new()
		{
			$session=$this->session->userdata('adminpx');
			$id_admin=$session['userID'];
			$id_foto=$this->input->post('id_foto');
			$tabel="temp_accept";
			$Odlstatus=$this->dataimage->one($id_foto,$tabel);
			foreach ($Odlstatus->result() as $row)
				$status=$row->status +1;

			$this->dataimage->insert_perhitungan($id_foto,$id_admin);
			$this->dataimage->update_temp($id_foto,$status);
			echo "SUKSES";
		}

		// Free Image
		public function getFreeImage()
		{
			$user=$this->user->all();
			$jumlah=count($user->result());
			$data['free']=$this->dataimage->freeImage($jumlah);
			$this->load->view('back/tabel_freeImage',$data);
		}


		//profile
		public function page_profile()
		{
			$data['page']=$this->datapage->profile();
			$data['judul']="Profile Editor";
			$data['link']="updateProfile";
			$this->load->view('css');
			$this->load->view('back/page_info',$data);
		}
		public function updateProfile()
		{
			$this->datapage->updateProfile();
			echo "Updated !";
		}
		//faq
		public function page_faq()
		{
			$data['page']=$this->datapage->faq();
			$data['judul']="FAQ Editor";
			$data['link']="updateFaq";
			$this->load->view('back/page_info',$data);
		}
		public function updateFaq()
		{
			$this->datapage->updateFaq();
			echo "Updated !";
		}
		//story
		public function page_story()
		{
			$data['page']=$this->datapage->story();
			$data['judul']="Story Editor";
			$data['link']="updateStory";
			$this->load->view('back/page_info',$data);
		}
		public function updateStory()
		{
			$this->datapage->updateStory();
			echo "Updated !";
		}
		//story
		public function page_career()
		{
			$data['page']=$this->datapage->career();
			$data['judul']="Career  Editor";
			$data['link']="updateCareer";
			$this->load->view('back/page_info',$data);
		}
		public function updateCareer()
		{
			$this->datapage->updateCareer();
			echo "Updated !";
		}



		///FILE CRUD
		public function page_file()
		{
			$this->load->view('back/page_file');
		}
		public function tabelFile()
		{
			$data['file']=$this->datafile->all();
			$this->load->view('back/tabel_file',$data);
		}
		public function updateFile()
		{
			$this->datafile->upldate();
			echo "Updated";
		}
		public function deleteImage()
		{
			$this->datafile->delete();
			echo "Deleted";
		}
		public function uploadfile()
		{
			$config['upload_path'] = './document/';
			$config['allowed_types'] = 'pdf|zip|rar|doc|docx';
			$config['max_size']	= '25000';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				$error=$this->upload->display_errors();
				print_r($error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$file=$data['upload_data']['file_name'];
				$this->datafile->insert($file);
				echo "Success";

			}
		}
		public function searchFile()
		{
			$data['file']=$this->datafile->search();
			$this->load->view('back/tabel_file',$data);
		}
		public function deletefile()
		{
			$file=$this->input->post('file');
			$datafile=$this->datafile->one($file);
			foreach ($datafile->result() as $row)
			$real_file ="document/$row->file_url";
			if (unlink($real_file)) 
			{
				$this->datafile->delete();
				echo "Deleted";
			}
			else
			{
				echo "Failed";
			}
		
		}
		public function setFile()
		{
			 $file=$this->input->post('id');
			$cek=$this->datafile->one($file);
			
			foreach ($cek->result() as $row)
				$file_name=$row->name;

			$this->datafile->set($file);
			echo "File Set To : $file_name";
		}




		//Request
		public function page_request()
		{
			$data['jumlah']=$this->datareq->all();
			$data['vektor']=$this->datareq->all_vektor();
			$this->load->view('back/page_request',$data);
		}
		public function jumlah_req()
		{
			$jumlah=$this->datareq->all();
			return $jumlah;
		}
		public function tabel_request()
		{
			$data['req']=$this->datareq->limit();
			$this->load->view('back/tabel_request',$data);
		}
		public function limit_req()
		{
			
			$data['req']=$this->datareq->limit();
			$this->load->view('back/tabel_request',$data);
		}
		public function search_req()
		{
			$data['req']=$this->datareq->search();
			$this->load->view('back/tabel_request',$data);
		}
		public function sort_req()
		{
			$data['req']=$this->datareq->sort();
			$this->load->view('back/tabel_request',$data);
		}
		public function status_req()
		{
			$data['req']=$this->datareq->status();
			$this->load->view('back/tabel_request',$data);
		}
		public function edit_req()
		{
			$data=$this->datareq->one();
			echo json_encode($data->result());
		}
		public function update_req()
		{
			$this->datareq->update();
			echo "Data Updated!";
		}
		public function proses_req()
		{
			$this->datareq->proses();
			echo "Request Status Change To Deal !";
		}
		public function delete_faq()
		{
			$this->datareq->delete();
			echo "Success Deleted !";
		}
		public function deleteAll_faq()
		{
			$this->datareq->deleteAll();
			echo "Success Deleted !";
		}







		//pricing Table
		public function getMaxPaket()
		{
			$data=$this->datapaket->max();
			foreach ($data->result() as $row)
			if ($row->max=='') 
			{
				return  $kode_paket="PX.001";
			}
			else
			{
				foreach ($data->result() as $row)
				$max=$row->max;
				$xmax=explode('.', $max);
				$pmax=$xmax[1]+1;
				$nmax=sprintf("%'.03d\n", $pmax);
				return   $kode_paket="$xmax[0].$nmax";

			}

		}
		public function nomorPaket()
		{
			echo $kode_paket=$this->getMaxPaket();
		}
		public function page_paket()
		{
			$data['kode_paket']=$this->getMaxPaket();
			$this->load->view('back/page_paket',$data);
		}
		public function tabel_paket()
		{
			$data['paket']=$this->datapaket->all();
			$this->load->view('back/tabel_paket',$data);
		}
		public function tambah_paket()
		{
			
			$kode_paket=$this->input->post('f_kode_paket');
			if (!empty($kode_paket)) 
			{
				$this->update_paket();
			}
			else
			{

				$kode_paket=$this->getMaxPaket();
				$config['upload_path'] = './assets/img/paket';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '3000';
				$config['max_width']  = '3024';
				$config['max_height']  = '3000';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload())
				{
					
					$gambar="";
					$this->datapaket->insert($gambar,$kode_paket);
					echo "<div class='alert alert-success'><i class='fa fa-check'></i> Success</div>";

				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					$gambar=$data['upload_data']['file_name'];
					$this->datapaket->insert($gambar,$kode_paket);
					echo "<div class='alert alert-success'><i class='fa fa-check'></i> Success</div>";
				}
			}
			
		}
		public function get_paket()
		{
			$data=$this->datapaket->one();
			echo json_encode($data->result());
		}
		public function update_paket()
		{
			echo $kode_paket=$this->input->post('f_kode_paket');
			
			$config['upload_path'] = './assets/img/paket';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '3000';
			$config['max_width']  = '3024';
			$config['max_height']  = '3000';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				
				$gambar="";
				$this->datapaket->update($gambar,$kode_paket);
				echo "<div class='alert alert-success'><i class='fa fa-check'></i> Success</div>";

			}
			else
			{
				$data=$this->datapaket->oneDel();
				foreach ($data->result() as $row)
				{
					$img=$row->gambar;
					$this->datapaket->delete();
					$hapus=unlink('./assets/img/paket/'.$img);
	
				}
				$data = array('upload_data' => $this->upload->data());
				$gambar=$data['upload_data']['file_name'];
				$this->datapaket->update($gambar,$kode_paket);
				echo "<div class='alert alert-success'><i class='fa fa-check'></i> Success</div>";
			}
		}
		public function delete_paket()
		{
			$data=$this->datapaket->one();
			foreach ($data->result() as $row)
			{
				$gambar=$row->gambar;
				$this->datapaket->delete();
				unlink('./assets/img/paket/'.$gambar);
			}
			echo "<div class='alert alert-success'><i class='fa fa-check'></i> Success</div>";
		}
		public function sort_paket()
		{
			$data['paket']=$this->datapaket->sort();
			$this->load->view('back/tabel_paket',$data);
		}
		public function search_paket()
		{
			$data['paket']=$this->datapaket->search();
			$this->load->view('back/tabel_paket',$data);
		}



		//FREE IMAGE
		public function page_freeImage()
		{
			$this->getFreeImage();
		}
		public function table_freeImage()
		{
			
			$data['free_image']=$this->dataimage->allFree();
			$this->load->view('back/tabel_freeImage',$data);
		}
		public function upladoFree()
		{
			# code...
		}



		//VOting Image
		public function voting($kode_voting)
		{
			//$data
			$this->load->view('style');
			$this->load->view('bacl/form_voting');
		}
		public function page_voting()
		{
				$this->load->view('css');
				$this->load->view('back/page_voting');
		}
		public function add_point()
		{
			$nilai=$this->input->post('nilai');
			echo $nilai;
		}


		#KATEGORI SETTUP
		public function page_kategori()
		{
			$data['jumlah']=$this->datakategori->all();
			$this->load->view("back/page_kategori",$data);
		}
		public function tabel_kategori()
		{
			$data['jumlah']=$this->datakategori->all();
			$data['kategori']=$this->datakategori->display();
			$this->load->view("back/tabel_kategori",$data);
		}
		public function add_kategori()
		{
			$this->datakategori->insert();
			echo "Success";
		}
		public function getID()
		{
			echo $this->datakategori->id();
		}
		public function delete_kategori()
		{
			$this->datakategori->delete();
			echo "Success";
		}
		public function getKategori()
		{
			
			$data=$this->datakategori->one();
			echo json_encode($data->result());
		}
		public function update_kategori()
		{
			$this->datakategori->update();
			echo "Success";
		}
		public function search_kategori()
		{
			$data['kategori']=$this->datakategori->search();
			$this->load->view("back/tabel_kategori",$data);
		}
		



		#Penilaian 
		public function form_reject()
		{
			$data['id_foto']=$this->input->post('id_foto');
			echo "<hr>";
			echo "<div class='text-danger'>Please give a reason why you reject this image...</div>";
			$this->load->view('back/form_reject',$data);
		}
		public function send_reject_msg()
		{
			$session=$this->session->userdata('adminpx');
			$admin=$this->dataadmin->one($session['userID']);
			$id_foto=$this->input->post('id_foto');
			$memberid=$this->getMemberFoto($id_foto);
			foreach($admin->result() as $row)

			$data = array(
				'idnilai'=>$this->datanilai->no_nilai(),
				'id_foto' =>$id_foto, 
				'memberid' => $memberid, 
				'subject' => $this->input->post('subject'), 
				'message' => $this->input->post('msg'), 
				'userid' => $session['userID'], 
				'email' => $row->email, 
				'nilai' => 0, 
				);
			// print_r($data);
			 $userid=$session['userID'];
			 $cekNilai=$this->datanilai->cekNilai($id_foto,$userid);
			 if ($cekNilai->result()!=null) 
			 {
			 	echo "Opps.. Maaf Anda telah melakukan voting sebelumnya...";
			 }
			 else
			 {
				
			 	$this->datanilai->add($data);#lakukan Voting
			 	#cari Jumlah admin 
			 	$cekAllvote=$this->datanilai->cekAllvote($id_foto);
			 	if ($cekAllvote==true) 
			 	{
			 		$status=$this->datanilai->getStatus($id_foto); #Jika Jumlahnya sesuai dan Cek hasilnya
			 		if ($status==true) 
			 		{
			 			// 19 Desember upateStatus($id_foto,$status);
			 			$this->dataimage->upateStatus($id_foto);
			 			$this->send_mail_success($id_foto,$memberid);
			 		}
			 		else
			 		{
			 			$this->send_mail_reject($id_foto,$memberid);
			 	 		$foto=$this->dataimage->one($id_foto);
			 	 		 foreach ($foto->result() as $row)
			 	 		 {
			 	 		 	if ($row->image_week==0) {
			 	 		 		$mini="upload/mini/$row->mini";
			 	 		 		$watermark="upload/watermark/$row->watermark";
			 	 		 		$big="upload/big/$row->big";
			 	 		 		unlink($mini);
			 	 		 		unlink($watermark);
			 	 		 		unlink($big);
			 	 		 		if ($row->model_realise!=null) {
			 	 		 			$model_realise="upload/mr/$row->model_realise";
			 	 		 			unlink($model_realise);
			 	 		 		}
			 	 		 	}
			 	 		 }
			 		}
			 	}
			 	
			 	
			 	echo "Success";
			 }

		}
		public function send_acc_msg()
		{
			$session=$this->session->userdata('adminpx');
			$admin=$this->dataadmin->one($session['userID']);
			$id_foto=$this->input->post('id_foto');
			$memberid=$this->getMemberFoto($id_foto);
			foreach($admin->result() as $row)
			$mail_admin=$row->email;
			$data = array(
				'idnilai'=>$this->datanilai->no_nilai(),
				'id_foto' => $this->input->post('id_foto'), 
				'memberid' => $memberid, 
				'subject' =>"OK", 
				'message' => "OK", 
				'userid' => $session['userID'], 
				'email' => $row->email, 
				'nilai' => 1, 
				);
			$userid=$session['userID'];
			$cekNilai=$this->datanilai->cekNilai($id_foto,$userid);
			if ($cekNilai->result()!=null) 
			{
				echo "Opps.. Maaf Anda telah melakukan voting sebelumnya...";
			}
			else
			{
				$this->datanilai->add($data);

				#cari Jumlah admin 
				$cekAllvote=$this->datanilai->cekAllvote($id_foto);
				$allVote=$cekAllvote;
				if ($allVote==true) 
				{
					$status=$this->datanilai->getStatus($id_foto);
					if ($status==true) 
					{
						 $this->dataimage->upateStatus($id_foto);
						 $this->send_mail_success($id_foto,$mail_admin,$memberid);
					}	
					else
					{
						 $this->send_mail_reject($id_foto,$mail_admin,$memberid);
						 $foto=$this->dataimage->one($id_foto);
						 foreach ($foto->result() as $row)
						 {
						 	if ($row->image_week==0) {
						 		$mini="upload/mini/$row->mini";
						 		$watermark="upload/watermark/$row->watermark";
						 		$big="upload/big/$row->big";
// Gak Di Unlink Karena Gambar di bawa ke email
						 		unlink($mini);
						 		unlink($watermark);
						 		unlink($big);
						 		if ($row->model_realise!=null) {
						 			$model_realise="upload/mr/$row->model_realise";
						 			unlink($model_realise);
						 		}
						 	}
						 }
					}
				}


				echo "Success";
			}
		}
		public function getMemberFoto($id_foto)
		{
			$data=$this->dataimage->one($id_foto);
			
			foreach ($data->result() as $row)
			
				return  $memberid=$row->id_contributor;
			
		}
		public function send_mail_success($id_foto,$memberid)
		{
			$c=$this->datacontributor->one($memberid);
			foreach ($c->result() as $row)
			$c_mail=$row->email;
                        $nama_foto=$this->nama_foto($id_foto);
			$config=array(
		                    'protocol'=>"smtp",
		                    'smtp_host'=>'mail.pixtox.com',
		                    'smtp_port'=>25,
		                    'smtp_user'=>'admin@pixtox.com',
		                    'smtp_pass'=>'pix29815',
			 );
						
		                $this->load->library('email',$config);
		                $this->email->from('admin@pixtox.com','Pixtox');
		                $this->email->to($c_mail); #contributor mail
		                

		                $this->email->subject("Image Approve");
		                $this->email->message("
		                Selamat Gambar #$nama_foto anda telah diterbitkan
		                Silahkan login untuk mengetahui detail akun anda.
		                Pixtox.com
		                "); 
		                $this->email->set_mailtype("html");

		                $this->email->send();

		               $this->email->print_debugger();
		}

                public function nama_foto($id_foto)
		{
$nama=$this->dataimage->one($id_foto);
foreach ($nama->result() as $row){
 return $nama_foto=$row->judul;
}

                }
		public function send_mail_reject($id_foto,$memberid)
		{
			$c=$this->datacontributor->one($memberid);
			foreach ($c->result() as $row)
			$c_mail=$row->email;

			$komentar=$this->datanilai->komentar($id_foto);
			foreach ($komentar->result() as $kom)
			 {$komentars="$kom->message<br>";	}
			$foto=$this->dataimage->one($id_foto);
			foreach ($foto->result()as $x)
			 $config=array(
		                     'protocol'=>"smtp",
		                     'smtp_host'=>'mail.pixtox.com',
		                     'smtp_port'=>25,
		                     'smtp_user'=>'admin@pixtox.com',
		                     'smtp_pass'=>'pix29815',
			  );
						
		                 $this->load->library('email',$config);
		                 $this->email->from('admin@pixtox.com','Pixtox');
		                 $this->email->to($c_mail); #contributor mail
		                

		                 $this->email->subject("Image Rejected");
		                 $this->email->message("
<img width='300px' src=".base_url("upload/mini/$x->mini").">

Hi ".$row->nama."

Dengan email ini kami ingin memberitahukan kepada anda bahwa foto anda tersebut belum bisa kami 

terima, karena foto tersebut memiliki satu atau lebih kesalahan dibawah ini :

<b>*Blur atau Out Of Focus</b><br>

 Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk 

mengantisipasi foto blur.<br>

<b>*Over / Under Exposure</b><br>

<b>*Noise atau Pixelation</b><br>

 Pastikan foto anda bebas dari noise pada review 100%<br>

<b>*Effect Problem</b><br>

Penggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.<br>

<b>*Size Problem</b>
<br>
Pastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)<br>

<b>*Model Release</b><br>

 Foto anda membutuhkan model release karena terdapat wajah model pada bagian foto tersebut.<br>
 berikut saran dari para admin:<br>

Sedangkan Untuk Kategori Vektor, terjadi kesalahan sebagai berikut :

<b>*Melanggar hak cipta/ tidak original</b>
Vector yang Anda buat haruslah asli dan original karya Anda. Anda tidak diperbolehkan meniru, menjiplak, atau membuat karya/ vector yang terlihat sama dengan karya/ vector yang sudah pernah dibuat sebelumnya.<br>

<b>*Tidak memiliki kelengkapan File yang dibutuhkan</b>
Karya/ vector Anda harus diupload dalam dua jenis file, yaitu : image file (.JPG) dan vector file (.EPS)<br>

<b>*Mengandung SARA (Suku, Agama, dan Ras) atau Pornografi</b>
Anda tidak diperbolehkan mengupload karya/ vector yang mengandung unsur SARA atau pornografi.<br>

berikut saran dari para admin:<br>
$komentars

Jika ada hal yg tidak jelas, silahkan hubungi kami di <a href='mailto:support@pixtox.com'>support@pixtox.com</a> 
Kami tunggu upload anda yg berikutnya lagi, selamat mencoba. 

Hotmat kami, 
Team Pixtox 
<a href='www.pixtox.com'>www.pixtox.com</a>"); 
		                 $this->email->set_mailtype("html");

		                 $this->email->send();

		                 $this->email->print_debugger();
		}



		#Deposit

		public function page_deposit()
		{
			$data['paket']=$this->datapaket->all();
			$this->load->view('back/page_deposit',$data);
		}
		public function table_deposit()
		{
			$data['deposit']=$this->datadeposit->display();
			$this->load->view('back/tabel_deposit',$data);
		}
		public function add_deposit()
		{
			$this->datadeposit->insert();
			echo "Success";
		}
		public function getIdDeposit()
		{
			echo $this->datadeposit->id_deposit();
		}
		public function getDataDeposit()
		{
			$id_deposit=$this->input->post('id_deposit');
			$data=$this->datadeposit->one($id_deposit);
			echo json_encode($data->result());
		}
		public function getJumlahDeposit()
		{
			$deposit=$this->datadeposit->all();
			echo count($deposit->result());
		}
		public function update_deposit()
		{
			$this->datadeposit->update();
			echo "Success";
		}
		public function delete_deposit()
		{
			$id_deposit=$this->input->post('id_deposit');
			$this->datadeposit->delete($id_deposit);
			echo "Success";
		}
		public function search_deposit()
		{
			$search=$this->input->post('search');
			$data['deposit']=$this->datadeposit->search($search);
			$this->load->view('back/tabel_deposit',$data);
		}
		public function sort_deposit()
		{
			$sort=$this->input->post('sort');
			$data['deposit']=$this->datadeposit->sort($sort);
			$this->load->view('back/tabel_deposit',$data);

		}

		#bank
		public function page_bank()
		{
			
			$this->load->view('back/page_bank');
		}
		public function table_bank()
		{
			$data['bank']=$this->databank->all();
			$this->load->view('back/table_bank',$data);
		}
		public function add_bank()
		{
			$this->databank->insert();
			echo "Success";
		}
		public function update_bank()
		{
			$this->databank->update();
			echo "Success";
		}
		public function delete_bank()
		{
			$this->databank->delete();
			echo "Success";
		}
		public function getDataBank()
		{
			$idbank=$this->input->post('idbank');
			$data=$this->databank->one($idbank);
			echo json_encode($data->result());
		}

		#Invoice
		public function page_invoice()
		{
			$this->load->view('back/page_invoice');
		}
		public function table_invoice()
		{
			$data['invoice']=$this->datainvoice->display();
			$this->load->view('back/table_invoice',$data);
		}
		public function sort_invoice()
		{
			$data['invoice']=$this->datainvoice->sort();
			$this->load->view('back/table_invoice',$data);
		}
		public function jml_invoice()
		{
			$data=$this->datainvoice->all();
			echo count($data->result());
		}
		public function pendapatan()
		{
			$data=$this->datainvoice->getPendapatan();
			foreach ($data->result() as $row)
			{
				 echo number_format($row->jumlah,0,',','.').',-';
			}
		}
		public function tagihan()
		{
			$data=$this->datainvoice->getTagihan();
			foreach ($data->result() as $row)
			{
				 echo number_format($row->jumlah,0,',','.').',-';
			}
		}
		public function status_invoice()
		{
			$data['invoice']=$this->datainvoice->status();
			$this->load->view('back/table_invoice',$data);
		}
		public function show_keuangan()
		{
			$pendapatan=$this->datainvoice->getPendapatan();
			
			foreach ($pendapatan->result() as $row)
			{
				 $angkaPendapatan=number_format($row->jumlah,0,',','.').',-';
				 $tagihan=$this->datainvoice->getTagihan();
				 foreach ($tagihan->result() as $nilai)
				 {
					 $angkaTagihan=number_format($nilai->jumlah,0,',','.').',-';
					 $data = array(
					 	'pendapatan' => $angkaPendapatan, 
					 	'tagihan' => $angkaTagihan, 
					 );
					 echo json_encode($data);
				 }
			}
		}
		public function show_invoice()
		{
			$dari=$this->input->post('dari');
			$sampai=$this->input->post('sampai');
			$data['invoice']=$this->datainvoice->showDate($dari,$sampai);
			$this->load->view('back/table_invoice',$data);
		}

		#konfirmasi
		public function page_konfirmasi()
		{
			$this->load->view('back/page_konfirmasi');
		}
		public function table_konfirmasi()
		{
			$data['konfirmasi']=$this->datakonfirmasi->display();
			$this->load->view('back/table_konfirmasi',$data);
		}
		public function jml_konfirmasi()
		{
			$data=$this->datakonfirmasi->all();
			echo count($data->result());
		}
		public function search_konfirmasi()
		{
			$data['konfirmasi']=$this->datakonfirmasi->search();
			$this->load->view('back/table_konfirmasi',$data);
		}
		public function delete_konfirmasi()
		{
			$this->datakonfirmasi->delete();
			echo "Success";
		}
		public function status_konfirmasi()
		{
			$data['konfirmasi']=$this->datakonfirmasi->status();
			$this->load->view('back/table_konfirmasi',$data);
		}
		public function acc_konfirmasi()
		{
			$idkonfirmasi=$this->input->post('idkonfirmasi');
			$cek=$this->datakonfirmasi->one($idkonfirmasi);
			foreach ($cek->result() as $row)
			{
				if ($row->status==0) 
				{
					$this->datakonfirmasi->acc();
					$this->datainvoice->acc($row->no_invoice);
					$getDataInvoice=$this->datainvoice->one($row->no_invoice);
					foreach ($getDataInvoice->result() as $in)
					{
							$ex=date_add(date_create(date('Y-m-d')),date_interval_create_from_date_string("$in->lama_hari days"));
							$tanggal_expired=date_format($ex,'Y-m-d');
							$memberid=$in->memberid;
								$databaru = array(					
								'memberid' =>$in->memberid,
								'kode_paket' =>$in->kode_paket,
								'tanggal_expired' =>$tanggal_expired,
								'sisa_download' =>$in->kapasitas_download,
								'status' =>1,
								'tanggal_deposit'=>date('Y-m-d'),
								'sisa_deposit'=>((0+$row->jumlah_bayar)-$in->harga)-(10/100*$in->harga),
								);
							$deposit=$this->datadeposit->userCek($memberid);
							if ($deposit->result()==null) 
							{
							
								$this->datadeposit->first_insert($databaru);
								echo "Success";
							}
							else
							{
								foreach($deposit->result() as $dep)
								{
									$ex=date_add(date_create($dep->tanggal_expired),date_interval_create_from_date_string("$in->lama_hari days"));
									$tanggal_expired=date_format($ex,'Y-m-d');
									$databaru = array(
										'id_deposit' => $dep->id_deposit, 
										'memberid' => $dep->memberid, 
										'kode_paket' => $in->kode_paket, 
										'tanggal_expired' => $tanggal_expired,
										'sisa_download'=>$dep->sisa_download+$in->kapasitas_download,
										'status' =>1,
										'tanggal_deposit'=>date('Y-m-d'),
										'sisa_deposit'=>((0+$row->jumlah_bayar)-$in->harga)-(10/100*$in->harga),
										);
									//print_r($databaru);
									$id_deposit=$dep->id_deposit;
									$this->datadeposit->update_deposit($databaru,$id_deposit);
								}
								echo "Success";	
							}
					}
		 		}
			 	else
			 	{
			 			echo "Konfirmasi Telah Dilakukan Sebelumnya";
			 	}
			}
		}

		#redeem
		public function page_redeem()
		{
			$this->load->view('back/page_redeem');
		}
		public function table_redeem()
		{
			$data['redeem']=$this->dataredeem->display();
			$this->load->view('back/table_redeem',$data);
		}
		public function delete_redeem()
		{
			$idredeem=$this->input->post('idredeem');

			$dataredeem=$this->dataredeem->data_redeem($idredeem);
			foreach($dataredeem->result() as $row)
			{
				$data = array(
					'nama' => $row->nama,
					'email' => $row->email,
					'memberid' => $row->memberid,
					'tanggal_redeem' => dateindo($row->tanggal_redeem),
					'nominal' => rupiah($row->nominal),
					'no_rekening' => $row->no_rekening,
					'nama_rekening' => $row->nama_rekening,
					);
					$this->mail_rejectRedeem($data);
			}
			$this->dataredeem->delete($idredeem);
			echo "Berhasil";
		
		}
		public function acc_redeem()
		{
			$idredeem=$this->input->post('idredeem');

			$dataredeem=$this->dataredeem->data_redeem($idredeem);
			foreach($dataredeem->result() as $row)
			{
				$data = array(
					'nama' => $row->nama,
					'email' => $row->email,
					'memberid' => $row->memberid,
					'tanggal_redeem' => dateindo($row->tanggal_redeem),
					'nominal' => rupiah($row->nominal),
					'no_rekening' => $row->no_rekening,
					'nama_rekening' => $row->nama_rekening,
					);
					$this->mail_accRedeem($data);
			}
			$this->dataredeem->updateStatus($idredeem);
			echo "Berhasil";
		
		}
		public function mail_accRedeem($data)
		{
			 $config=array(
		                      'protocol'=>"smtp",
		                      'smtp_host'=>'mail.pixtox.com',
		                      'smtp_port'=>25,
		                      'smtp_user'=>'admin@pixtox.com',
		                      'smtp_pass'=>'pix29815',
			   );
						
		     $this->load->library('email',$config);

			 $this->email->from('admin@pixtox.com', 'Admin');
			 $this->email->to($data['email']); 
			 

			 $this->email->subject('Accept Redeem');
			 $this->email->message('
			 Yth, '.$data["nama"].'<br>
			 Selamat permohonan redeem anda akan segera di prosess.<br>
			 Berikut Data redeem anda :<br>
			 Tanggal Redeem :'.$data["tanggal_redeem"].'<br>
			 Jumlah Redeem :'.$data["nominal"].'<br>
			 Dari No. Rekening :'.$data["no_rekening"].'<br>
			 An :'.$data["nama_rekening"].'<br>
			 <br>
			 Terimakasi Telah Bekerjasama dengan baik.
			 Salam Sukses. Pixtox.com
			 ');	
			 $this->email->set_mailtype("html");
			 $this->email->send();

			 echo $this->email->print_debugger();
		}
		public function mail_rejectRedeem($data)
		{
			// print_r($data);
			 $config=array(
		                      'protocol'=>"smtp",
		                      'smtp_host'=>'mail.pixtox.com',
		                      'smtp_port'=>25,
		                      'smtp_user'=>'admin@pixtox.com',
		                      'smtp_pass'=>'pix29815',
			   );
						
		     $this->load->library('email',$config);

			 $this->email->from('admin@pixtox.com', 'Admin');
			 $this->email->to($data['email']); 
			 

			 $this->email->subject('Reject Redeem');
			 $this->email->message('
			 Yth, '.$data["nama"].'<br>
			 Mohon maaf permintaan redeem anda tidak bisa diproses,
			 hal tersebut karena ada hal yang menyalahi aturan permintaan redeem.<br>
			 Berikut Data redeem anda :<br>
			 Tanggal Redeem :'.$data["tanggal_redeem"].'<br>
			 Jumlah Redeem :'.$data["nominal"].'<br>
			 Dari No. Rekening :'.$data["no_rekening"].'<br>
			 An :'.$data["nama_rekening"].'<br>
			 <br>
			 Silahkan mencoba kembali.
			 ');	
			 $this->email->set_mailtype("html");
			 $this->email->send();

			 echo $this->email->print_debugger();
		}
		public function getDataRedeem()
		{
			$acc=$this->dataredeem->acc();
			$wait=$this->dataredeem->wait();
			$data= array(
				'acc' => rupiah($acc), 
				'wait' => rupiah($wait), 
			);
			echo json_encode($data);
		}
		public function search_redeem()
		{
			$search=$this->input->post('search');
			$data['redeem']=$this->dataredeem->search($search);
			$this->load->view('back/table_redeem',$data);
		}


		#download
		public function jumlah_download()
		{
			echo $this->datadownload->jumlah_download();
		}
		public function page_download()
		{
			$this->load->view('back/page_download');
		}
		public function table_download()
		{
			$data['download']=$this->datadownload->display();
			$this->load->view('back/table_download',$data);
		}







		#Request Vektor
		public function table_vektor()
		{

			$data['vektor']=$this->datareq->all_vektor();
			$this->load->view('back/table_vektor',$data);
		}
		public function sorting_req_vektor()
		{
			$sorting=$this->input->post('sorting');
			$data['vektor']=$this->datareq->sorting_req_vektor($sorting);
			$this->load->view('back/table_vektor',$data);
		}
		public function search_req_vektor()
		{
			$search=$this->input->post('search');
			$data['vektor']=$this->datareq->search_req_vektor($search);
			$this->load->view('back/table_vektor',$data);
		}
		public function limit_req_vektor()
		{
			$show=$this->input->post('show');
			$data['vektor']=$this->datareq->show_req_vektor($show);
			$this->load->view('back/table_vektor',$data);
		}
		public function status_req_vektor()
		{
			$status=$this->input->post('status');
			$data['vektor']=$this->datareq->status_req_vektor($status);
			$this->load->view('back/table_vektor',$data);
		}
		public function deleteAll_req_vektor()
		{
			$this->datareq->deleteAll_vektor();
			echo "Sukses";
		}
		public function delete_req_vektor()
		{
			$idreq=$this->input->post('idreq');
			$data['vektor']=$this->datareq->delete_req_vektor($idreq);
			$this->load->view('back/table_vektor',$data);	
		}
		
		public function detail_req_vektor()
		{
			$idreq=$this->input->post('idreq');
			$data=$this->datareq->detail($idreq);
			foreach ($data->result() as $row)

			$detail = array(
				'nama' => $row->name, 
				'category' => $row->category, 
				'text' => $row->text, 
				'tag_line' => $row->tag_line, 
				
				'industry'=>$row->industry,
				'detail'=>$row->detail,
				'phone'=>$row->phone,
				'email'=>$row->email,
				'deadline'=>dateindo($row->deadline,"table")
				);
			echo json_encode($detail);
		}







		#Upload Seting
		public function page_upload_setting()
		{
			$data['imgset']=$this->dataimage->getUploadSet();
			$this->load->view('back/page_upload_setting',$data);
		}
		public function setUploadSetting()
		{
			$data = array(
				'max_size' => $this->input->post('max_size'), 
				'max_width' => $this->input->post('max_width'), 
				'max_height' => $this->input->post('max_height'), 
				'min_size' => $this->input->post('min_size'), 
				'min_width' => $this->input->post('min_width'), 
				'min_size' => $this->input->post('min_size'), 
				);
			$this->dataimage->setUpload($data);
			echo "Success";
		}
                    #Set Redeem
		public function page_set_redeem()
		{
			$this->load->view('back/page_set_redeem');
		}
		public function getSetRedeem()
		{
			$data=$this->dataredeem->getSet($id=1);
			echo json_encode($data->result());
		}
		public function updateSetRedeem()
		{
			$data = array(
				'id' => $this->input->post('id'),
				'minimal' => $this->input->post('minimal'),
				'penghasilan' => $this->input->post('penghasilan'),
				);
			$id=$this->input->post('id');
			$this->dataredeem->setRedeem($data,$id);
		}
#notification Class
		public function all_notif()
		{
			$this->load->view('back/dashboard');
		}
		function notifDownload()
		{
			$download=$this->datadownload->all();
			$data = array(
				'download' => count($download->result()), 
				'notif'=>0
				);
			$lastData=$this->session->userdata('notifDownload');
			if ($data['download']>$lastData['download'])
			{
				$data['notif']=1;
				$data['jumlah']=$data['download']-$lastData['download'];
			}
			$this->session->unset_userdata('notifDownload');
			$this->session->set_userdata('notifDownload',$data);
			echo json_encode($data);
		}
		function notifRequest()
		{
			$req=$this->datareq->all();
			$reqv=$this->datareq->all_vektor();
			$data = array(
				'req' => count($req->result())+count($reqv->result()), 
				'notif'=>0
				);
			$lastData=$this->session->userdata('notifRequest');
			if ($data['req']>$lastData['req'])
			{
				$data['notif']=1;
				$data['jumlah']=$data['req']-$lastData['req'];
			}
			$this->session->unset_userdata('notifRequest');
			$this->session->set_userdata('notifRequest',$data);
			echo json_encode($data);
		}
		function notifKonfirmasi()
		{
			$konfirmasi=$this->datakonfirmasi->all();
			$data = array(
				'konfirmasi' => count($konfirmasi->result()), 
				'notif'=>0
				);
			$lastData=$this->session->userdata('notifKonfirmasi');
			if ($data['konfirmasi']>$lastData['konfirmasi'])
			{
				$data['notif']=1;
				$data['jumlah']=$data['konfirmasi']-$lastData['konfirmasi'];
			}
			$this->session->unset_userdata('notifKonfirmasi');
			$this->session->set_userdata('notifKonfirmasi',$data);
			echo json_encode($data);
		}
		function notifImage()
		{
			$Image=$this->dataimage->all();
			$data = array(
				'image' => count($Image->result()), 
				'notif'=>0
				);
			$lastData=$this->session->userdata('notifImage');
			if ($data['image']>$lastData['image'])
			{
				$data['notif']=1;
				$data['jumlah']=$data['image']-$lastData['image'];
			}
			$this->session->unset_userdata('notifImage');
			$this->session->set_userdata('notifImage',$data);
			echo json_encode($data);
		}
		function notifredeem()
		{
			$redeem=$this->dataredeem->all();
			$data = array(
				'redeem' => count($redeem->result()), 
				'notif'=>0
				);
			$lastData=$this->session->userdata('notifredeem');
			if ($data['redeem']>$lastData['redeem'])
			{
				$data['notif']=1;
				$data['jumlah']=$data['redeem']-$lastData['redeem'];
			}
			$this->session->unset_userdata('notifredeem');
			$this->session->set_userdata('notifredeem',$data);
			echo json_encode($data);
		}
		public function list_user()
		{
			$data['user']=$this->datamember->lastDaftar();
			$this->load->view('back/list_user',$data);
		}

	}