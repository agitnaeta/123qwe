<?php 
	/**
	* 
	*/
	class Contributor extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			ini_set('memory_limit', "1024M");
			$session=$this->session->userdata('contributor');
			if (!empty($session)) {
				$this->load->model('datacontributor');
				$this->load->model('user');
				$this->load->model('datafile');
				$this->load->model('databank');
           $this->load->model('datanilai');
				$this->load->model('dataimage');
				$this->load->model('datakonfirmasi');
				$this->load->model('datainvoice');
				$this->load->model('datapaket');
				$this->load->model('datadeposit');
				$this->load->model('datakategori');
				$this->load->model('dataredeem');
				$this->load->model('datadownload');
				$this->load->library('image_lib');
				$this->load->library('ftp');
				$this->load->helper('download');
				$this->load->library('upload');
				$this->load->helper('dateindo');
				$this->load->helper('yesno');
				$this->load->helper('rupiah');
				$this->load->helper(array('form','url','html','file'));
				
			}
			else
			{
				redirect('login');
			}
		}
		public function index()
		{
			
			$session=$this->session->userdata('contributor');
			// print_r($session);
			$memberid=$session['memberid'];
			$app_status=$session['app_status'];
			$foto=$session['foto'];
				if ($app_status==0) 
				{
					$this->firts_upload();
				}
				elseif($app_status==1)
				{
					$this->waiting_list();
				}
				elseif($app_status==2)
				{


					$contributor=$this->datacontributor->one(trim($memberid));
					foreach ($contributor->result()as $row)
					$data['foto']=$row->foto;
					$data['kategori']=$this->datakategori->all();
					$trusted=$row->trusted;
					$file=$this->datafile->active();
					foreach ($file->result() as $row)
					$data['file']=$row->file_url;
					$this->load->view('css');
					$data['username']=$session['username'];
					
					if ($trusted==0) 
					{
						$data['trusted']="";
					}
					else
					{
						$data['trusted']='<img align="right" width="50px" height="50px" src="'.base_url("upload/promote/1.png").'"><br>';
					}
					$this->load->view('contributor/nav',$data);
					$this->load->view('contributor/newPanel',$data);

				}
				else
				{
					redirect('welcome');
				}
			
			
		}
		public function newUpload()
		{
			
			$session=$this->session->userdata('contributor');
			// print_r($session);
			$memberid=$session['memberid'];
			$app_status=$session['app_status'];
			$foto=$session['foto'];
				if ($app_status==0) 
				{
					$this->firts_upload();
				}
				elseif($app_status==1)
				{
					$this->waiting_list();
				}
				elseif($app_status==2)
				{


					$contributor=$this->datacontributor->one(trim($memberid));
					foreach ($contributor->result()as $row)
					$data['foto']=$row->foto;
					$data['kategori']=$this->datakategori->all();
					$trusted=$row->trusted;
					$file=$this->datafile->active();
					foreach ($file->result() as $row)
					$data['file']=$row->file_url;
					$this->load->view('css');
					$pesan="<div class='alert alert-success text-center'> 
					Terima kasih telah meng-upload foto/vector di pixtox.com, saat ini foto anda akan melalui proses penilaian oleh admin paling lambat 7x24 jam.
					</div>";
					$this->session->set_flashdata('pesan',$pesan);
					
					$data['username']=$session['username'];

					if ($trusted==0) 
					{
						$data['trusted']="";
					}
					else
					{
						$data['trusted']='<img width="50px" height="50px" src="'.base_url("upload/promote/1.png").'">';
					}
					
					$this->load->view('contributor/nav',$data);
					$this->load->view('contributor/newPanel',$data);
                                        $this->session->unset_userdata('pesan');

				}
				else
				{
					redirect('welcome');
				}
			
			
		}
		public function getUsername()
		{
			$session=$this->session->userdata('contributor');
			$memberid=$session['memberid'];
			$contributor=$this->datacontributor->one($memberid);
			foreach ($contributor->result() as $row)
			{
				$username=$row->username;
				return $username;
			}
		}
function getSession(){
$session=$this->session->userdata('contributor');
return $session;
}
		public function getMemberid()
		{
			$session=$this->session->userdata('contributor');
		 	return $id_contributor=$session['memberid'];
		}
		public function cekStatus()
		{
			//memberid
			$session=$this->session->userdata('contributor');
			$memberid=$session['memberid'];
			//cek status
			$contributor=$this->datacontributor->one($memberid);
			foreach ($contributor->result() as $row)
			$status=$row->app_status;
			return $status;

		}
		public function cekTabel()
		{
			//memberid
			$session=$this->session->userdata('contributor');
			$id_contributor=$session['memberid'];
			//cek status
			$app_status=$this->app_status();
			if ($app_status!=1) 
			{
				
				return $status='temp_accept';
			}
			else
			{
				
				return $status='foto';
			}
		}
		public function profil()
		{
			$session=$this->session->userdata('contributor');
			$memberid=trim($session['memberid']);
			$data['contributor']=$this->datacontributor->one($memberid);
			$this->load->view('contributor/form_profil',$data);
		}
		public function update()
		{
			$config['upload_path'] = './upload/user';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '999999';
			$config['max_width']  = '999999';
			$config['max_height']  = '999999';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);

			$this->upload->initialize($config);
			if (!$this->upload->do_upload())
			{
				$foto='';
				$session=$this->session->userdata('contributor');
				$memberid=$session['memberid'];
				$this->datacontributor->updateProfil($memberid,$foto);
				
				redirect('contributor');
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$foto=$data['upload_data']['file_name'];
				$session=$this->session->userdata('contributor');
				$memberid=$session['memberid'];
				$this->datacontributor->updateProfil($memberid,$foto);
				redirect('contributor');
			}

		}
		public function detail()
		{
			$session=$this->session->userdata('contributor');
			$memberid=substr($session['memberid'],0,6);
			$data['contributor']=$this->datacontributor->one($memberid);
			$data['invoice']=$this->datainvoice->myInvoice($memberid);
			
			$this->load->view('contributor/detail',$data);
		}

		public function changePassword()
		{
			$this->load->view('contributor/form_changePassword');

		}
		public function updatePassword()
		{
			$session=$this->session->userdata('contributor');
			$memberid=$session['memberid'];
			$this->datacontributor->updatePassword($memberid);
			echo "<div class='alert alert-success text-center'> Berhasil Disimpan</div>";
		}
		public function app_status()
		{
			$session=$this->session->userdata('contributor');
			$memberid=$session['memberid'];

			$app=$this->datacontributor->one($memberid);
			foreach ($app->result() as $row)
			{
				$app_status=$row->app_status;
				return $app_status;
			}
		}


		public function sessionImage($id_contributor,$foto,$mini_name,$kategori,$pdf_file)
		{
			$tanggal_upload=date('Y-m-d');
			$time=date("H:i:s");
			$cleanDate=str_replace('-', '', $tanggal_upload);
			$cleanTime=str_replace(':','', $time);
			$tags=$this->input->post('tag');
			$tag=str_replace(' ','', $tags);
			$id_foto="$cleanDate$cleanTime";
                        $isi=$this->input->post('image_week');
                        if($isi!=1){
			$image_week=0;
			}
			else
			{
				$image_week=1;
			}
			$dataImage = array(
				'id_contributor' => $id_contributor, 
				'id_foto' => $id_foto, 
				'status' => 0, 
				'type' => $this->input->post('f_type'), 
				'image_week' => $image_week, 
				'kategori' => $kategori, 
				'model_realise' => $pdf_file, 
				'big' => $foto, 
				'mini' => $mini_name, 
				'watermark' => $mini_name, 
				'tanggal_upload' => $tanggal_upload, 
				'judul' => $this->input->post('judul'), 
				'tag' => $tag, 
				'temp_path' => $foto, 
			);
			$this->datacontributor->upload($dataImage);
                        $this->addPerhitungan($dataImage);
			$this->send_mailAdmin($id_contributor);
			$data_array=$this->session->set_userdata('image',$dataImage);
			echo "1";
		}
		public function imageses()
		{
			$data_array=$this->session->userdata('image');
			
			print_r($data_array);
		}
                public function addPerhitungan($dataImage)
		{
			$data = array(
				'idnilai'=>$this->datanilai->no_nilai(),
				'id_foto' =>$dataImage['id_foto'], 
				'memberid' => $dataImage['id_contributor'], 
				'subject' =>"", 
				'message' => "", 
				'userid' => "px", 
				'email' => "", 
				'nilai' => 0, 
				);
			$this->datanilai->add($data);
		}
		public function uploadImage()
		{
			$eps='eps';
			$type=$this->input->post('f_type');
			if (empty($type)) {
				echo "Silahkan Pilih Type";
			}
			else
			{
				if (strtolower($type)==strtolower("vektor")) 
				{
						$setting=$this->dataimage->getUploadSet();
						foreach ($setting->result() as $con)
						$config['upload_path'] = './upload/';
						$config['allowed_types'] = 'eps';
						$config['encrypt_name'] = TRUE;
						$config['max_size']	= $con->max_size;
						$config['min_size']=$con->min_size;
						$this->upload->initialize($config); 
						if ( ! $this->upload->do_upload($eps))
						{
							$error = array('error' => $this->upload->display_errors());
							echo $error['error'];
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$big=$data['upload_data']['file_name'];
							$this->uploadPhoto($big);
						}
				}
				else
				{
					$big='';
					$this->uploadPhoto($big);
				}
			}
		}
public function uploadPhoto($big)
		{
			$image='image';
			$pdf='pdf';
			$session=$this->session->userdata('contributor');
			$id_contributor=$session['memberid'];
			$kat=$this->input->post('kategori');
			if (!empty($kat)) {
				$kategori=implode(',', $kat);
			}
			else
			{
				$kategori="";
			}
			
			// Config Gambar
			$setting=$this->dataimage->getUploadSet();
			foreach ($setting->result() as $con)
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'jpg|eps';
			$config['encrypt_name'] = TRUE;
			$config['max_size']	= $con->max_size;
			$config['max_width']  = $con->max_width;
			$config['max_height']  = $con->max_height;
			$config['min_height']  = $con->min_height;
			$config['min_width']=$con->min_width;
			$config['min_size']=$con->min_size;

			$this->upload->initialize($config); 
			if (!$this->upload->do_upload($image))
			{
				echo $this->upload->display_errors();
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$foto=$data['upload_data']['file_name'];
				
				//mini Move
				$this->resize($foto);
				$rename_mini=explode(".", $foto);
				$thum="_thumb.";
				$thum2="_thumb";
				$mini_name="$rename_mini[0]$thum$rename_mini[1]";
				$this->move_mini($mini_name);
		
				//watermark
				$this->overlayWatermark($foto);
				$this->move_watermark($mini_name);
				
				//big Move
				if ($big!='') {
					$foto=$big;
					$this->move_big($foto);
				}
				else
				{
					$this->move_big($foto);
				}
				
				
				// Config PDF
				$config['upload_path'] = './upload/mr';
				$config['allowed_types'] = 'pdf';
				$config['max_size'] = '10000';
				$config['encrypt_name'] = TRUE;
				$this->upload->initialize($config); 
				if (!$this->upload->do_upload($pdf))
				{
					$pdf_file='';
					$this->session->unset_userdata('image');
					$this->sessionImage($id_contributor,$foto,$mini_name,$kategori,$pdf_file);
				}
				else
				{
					$pdf = array('upload_data' => $this->upload->data());
					$pdf_file=$pdf['upload_data']['file_name'];
					$this->session->unset_userdata('image');
					$this->sessionImage($id_contributor,$foto,$mini_name,$kategori,$pdf_file);
				}
			}
		}
		public function uploadPdf()
		{
			$config['upload_path'] = './upload/model_realise';
			$config['allowed_types'] = 'docx|doc|pdf';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				//echo $this->upload->display_errors();

				$file='';
				$image=$this->session->userdata('image');
				$pdf = array('model_realise' => $file);
				$dataImage=array_merge($image, $pdf);

				//Upload Ke database
				$this->datacontributor->upload($dataImage);
				$this->send_mailAdmin();
				$this->session->unset_userdata($dataImage);
				$this->session->unset_userdata('image');

				echo "Success";
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());

				$file=$data['upload_data']['file_name'];
				
				$image=$this->session->userdata('image');
				$pdf = array('model_realise' => $file);
				$dataImage=array_merge($image, $pdf);

				//Upload Ke database
				$this->datacontributor->upload($dataImage);
				$this->send_mailAdmin($foto=$dataImage['big']);
				$this->session->unset_userdata($dataImage);
				$this->session->unset_userdata('image');
				echo "Success";
			}
		}
		public function send_mailAdmin($id_contributor)
		{
			
			$datauser=$this->datacontributor->one($id_contributor);
		
			foreach ($datauser->result() as $row)
			$nama_contributor=$row->username;
			$config=array(
		                    'protocol'=>"smtp",
		                    'smtp_host'=>'mail.pixtox.com',
		                    'smtp_port'=>25,
		                    'smtp_user'=>'admin@pixtox.com',
		                    'smtp_pass'=>'pix29815',
			);
		                $this->load->library('email',$config);
		                $this->email->from('admin@pixtox.com','Pixtox');
		                $this->email->to('verificator@pixtox.com'); 
		                //$this->email->to('agit.naeta@qwords.co.id'); 
		                $this->email->subject("Confirm Image");
		                $this->email->message("
		                $nama_contributor has been send image to Pixtox
		                You need accept or reject this image,
		                Please Follow This Link:
		                http://pixtox.com/accept
		                "); 
		                $this->email->set_mailtype("html");

		                $this->email->send();

		               $this->email->print_debugger();
		}
		public function implode()
		{

			$email=$this->user->recive();

			foreach ($email->result() as $row)
			$mail_list[]=$row->email;
			print_r($mail_list);

		}
		public function textWatermark($foto)
		{
		        $config['source_image']     = "./upload/$foto"; //The image path,which you would like to watermarking
		        $config['wm_text']          = 'Agit Naeta';
		        $config['wm_type']          = 'text';
		        $config['wm_font_path']     = './assets/fonts/lato/Lato-Regular.ttf';
		        $config['wm_font_size']     = 16;
		        $config['wm_font_color']    = 'ffffff';
		        $config['wm_vrt_alignment'] = 'middle';
		        $config['wm_hor_alignment'] = 'center';
		        $config['wm_padding']       = '20';
		        $this->image_lib->initialize($config);
		        
		        if (!$this->image_lib->watermark()) {
		            echo $this->image_lib->display_errors();
		        }
		        
		}
		
		public function overlayWatermark($foto)
		{
				$fotoSize=getimagesize(base_url("upload/$foto"));
				$lebar=$fotoSize[0];
				$tinggi=$fotoSize[1];
	                        if ($lebar<=$tinggi) {
					$nilai=$tinggi;
				}
				elseif($lebar>=$tinggi)
				{
					$nilai=$lebar;
				}
				elseif($lebar==$tinggi)
				{
					$nilai=$lebar;
				}
				else
				{
					$nilai=$tinggi;
				}

				$this->resizeWatermark($nilai,$nilai);
				$file_watermark="watermark.png";
				$x=explode('.',$file_watermark);
				$t="_thumb.";
				$watermarkFile="$x[0]$t$x[1]";

		        $config['image_library']    = 'gd';
		        $config['source_image']     = "./upload/$foto";
		        $config['wm_type']          = 'overlay';
		        $config['wm_overlay_path']  = "./upload/$watermarkFile"; //the overlay image
		        $config['wm_opacity']       = 40;
		        $config['wm_vrt_alignment'] = 'middle';
		        $config['wm_hor_alignment'] = 'center';       
		        $this->image_lib->initialize($config);
		        
		        if (!$this->image_lib->watermark()) {
		            echo $this->image_lib->display_errors();
		        }
		        $pathFile="upload/$watermarkFile";
		        unlink($pathFile);
		}
		public function resizeWatermark($nilai,$nilai)
		{
			
		        $config['image_library'] = 'gd2';
		        $config['source_image']     = "./upload/watermark.png";
		        $config['create_thumb'] = TRUE;
		        $config['maintain_ratio'] = TRUE;
		        
		        $config['width']    = $nilai;
		        $config['height']    = $nilai;
		        $config['overwrite'] = TRUE;

		        $this->load->library('image_lib',$config); 
		        $this->image_lib->initialize($config);

		        if (!$this->image_lib->resize()) 
		        {
		            echo $this->image_lib->display_errors();

		        }
		}
		public function resize($foto)
		 {
		          
		        $ratio=$this->dataimage->getRatio();
		        foreach($ratio->result() as $row)
		        	$resize=$row->size;
		        $base=base_url("upload"); 
		        $size = getimagesize("$base/$foto");
		        $lebar=$size[0] * $resize/100;
		        $tinggi=$size[1]* $resize/100;


		        $config['image_library'] = 'gd2';
		        $config['source_image']     = "./upload/$foto";
		        $config['create_thumb'] = TRUE;
		        $config['maintain_ratio'] = TRUE;
		        
		        $config['width']    = $lebar;
		        $config['height']    = $tinggi;
		        $config['overwrite'] = TRUE;

		        $this->load->library('image_lib',$config); 
		        $this->image_lib->initialize($config);

		        if (!$this->image_lib->resize()) 
		        {
		            echo $this->image_lib->display_errors();

		        }
		      
		 }
		 public function ftpConfig()
		 {
		 	
                         $config=array(
		 		'hostname'=>'103.28.15.131',
		 		'username'=>'pixtoxco',
		 		'password'=>'pix29815',
		 		'debug'=>TRUE,
		 		);
                         return $config;



		 }
		 public function move_mini($mini_name)
		 {
		 	$config=$this->ftpConfig();
			$this->ftp->connect($config);
			$this->ftp->move("public_html/upload/$mini_name","public_html/upload/mini/$mini_name");
			$this->ftp->close();
		 }

		 public function move_watermark($foto)
		 {
		 	$config=$this->ftpConfig();
			$this->ftp->connect($config);
			$this->ftp->move("public_html/upload/$foto","public_html/upload/watermark/$foto");
			$this->ftp->close();
		 }

		 public function move_big($foto)
		 {
		 	$config=$this->ftpConfig();
			$this->ftp->connect($config);
			$this->ftp->move("public_html/upload/$foto","public_html/upload/big/$foto");
			$this->ftp->close();
		 }
		 public function getImageList()
		 {
		 	$session=$this->session->userdata('contributor');
		 	$id_contributor=$session['memberid'];
		 	$tabel="foto";
		 	$data['temp_image']=$this->dataimage->all_contributor($id_contributor,$tabel);
		 	
		 	$this->load->view('contributor/list_foto',$data);

		 }
		 public function getImageSearch()
		 {
		 	$session=$this->session->userdata('contributor');
		 	$id_contributor=$session['memberid'];
		 	$data['temp_image']=$this->dataimage->search($id_contributor);
		 	
		 	$this->load->view('contributor/list_foto',$data);
		 }
		 public function deleteImage()
		 {
		 	$id_foto=$this->input->post('id_foto');
		 	$this->dataimage->removeImage($id_foto);
		 	echo "Delete Success...";
		 }
		 public function getCountImage()
		 {
		 	$session=$this->session->userdata('contributor');
		 	 $id_contributor=$session['memberid'];
		 	 $tabel=$this->cekTabel();
		 	 $jumlah=$this->dataimage->all_contributor($id_contributor,$tabel);
		 	 echo count($jumlah->result());

		 }
		 public function getTag()
		 {
		 	$tags=array();
		 	$session=$this->session->userdata('contributor');
		 	$id_contributor=$session['memberid'];
		 	$tabel=$this->cekTabel();
		 	$gambar=$this->dataimage->all_contributor($id_contributor,$tabel);
		 	foreach ($gambar->result() as $row)
		 	{

		 		
		 		$tag=explode(',', $row->tag);
		 		foreach ($tag as $isitag)
		 		{

		 			if (!in_array($isitag, $tags)) 
		 			{
		 				array_push($tags,$isitag);
		 			}
		 		}
		 		
		 	}
		 	echo implode(',', $tags);
		 	
		 }
		public function getVektor()
		{
		 	$id_contributor=$this->getMemberid();
		 	$vektor=$this->dataimage->vektor($id_contributor);
		 	echo count($vektor->result());
		}
		public function getPhoto()
		{
		 	$id_contributor=$this->getMemberid();
		 	$Photo=$this->dataimage->photo($id_contributor);
		 	echo count($Photo->result());
		}
		public function firts_upload()
		{

			$this->load->view('back/waiting_list');
		}
		public function uploadMultiple()
		{
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
		//	$config['min_width']  = '2240';
		//	$config['min_height']  = '1680';
			
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());

				echo $error['error'];
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$session=$this->session->userdata('contributor');
				$memberid=$session['memberid'];
				$foto=$data['upload_data']['file_name'];
				//mini Move
				$this->resize($foto);
				$rename_mini=explode(".", $foto);
				$thum="_thumb.";

				$mini_name="$rename_mini[0]$thum$rename_mini[1]";
				
				$this->move_mini($mini_name);
		
				//watermark
				$this->overlayWatermark($foto);
				$this->move_watermark($mini_name);
				
				//big Move
				$this->move_big($foto);


				$this->uploadTest($memberid,$foto,$mini_name);
				echo "Success";
			}
		}
		public function waiting_list()
		{		

				$data['username']=$this->getUsername();
				$this->load->view('css');
				$this->load->view('contributor/nav',$data);
				$this->load->view('contributor/success');
				
		}
		public function change_app()
		{
			$session=$this->session->userdata('contributor');
			$memberid=$session['memberid'];
			$this->datacontributor->changeApp($memberid);
			echo "Success";
		}
		public function load_kategori()
		{
			$data['kategori']=$this->datakategori->load_kategori();
			$this->load->view('contributor/kategori',$data);
		}
		public function download_self($id_foto)
		{
			$data = file_get_contents("./upload/big/$id_foto");
			force_download($id_foto, $data);
	                redirect('contributor');
		}
		public function getEarning()
		{
			$memberid=$this->getMemberid();
			$data=$this->datacontributor->earning($memberid);
			$jumlah=$this->datacontributor->uploadCount($memberid);
			$myEarning=$this->myEarning($memberid);
			$redeemDiambil=$this->dataredeem->diambil($memberid);
			foreach($jumlah->result() as $row)

			$earning = array(
				'upload' =>$row->jumlah, 
				'download' => count($data->result()), 
				'earning' =>rupiah($myEarning-$redeemDiambil), 
				);
			echo json_encode($earning);
		}
		public function myEarning($memberid)
		{
			$data=$this->datadownload->myDownload($memberid);
			foreach ($data->result() as $row)
			{
				return  $row->earning;
			}
		}
		public function getDownload()
		{
			$memberid=$this->getMemberid();
			$data=$this->datacontributor->earning($memberid);
			foreach($data->result() as $row)
			{
				echo $row->max;
			}
		}
		public function getImageType($type)
		{
			$id_contributor=$this->getMemberid();
			$data['image']=$this->dataimage->getType($type,$id_contributor);
                        $data['type']=$type;
			$this->load->view('contributor/catalog',$data);
		}


		#paket
		public function page_paket()
		{
			$data['paket']=$this->datapaket->all();
			$this->load->view('contributor/list_paket',$data);
		}
		public function getDataPaket()
		{
			$no_paket=$this->input->post('no_paket');
			$data=$this->datapaket->one($no_paket);
			foreach ($data->result() as $row)
			$paket = array(
				'nama_paket' => $row->nama_paket, 
				'kode_paket' => $row->kode_paket, 
				'lama_hari' => $row->lama_hari, 
				'harga' => rupiah((($row->harga*10)/100)+$row->harga)." <span class='text-danger'> Sudah Termasuk PPN 10 %</span>",
				'kapasitas_download' => $row->kapasitas_download, 
				);			
			echo json_encode($paket);
		}
		public function getNoInvoice()
		{
			return $this->datainvoice->no_invoice();
		}
		public function detail_invoice()
		{
			$no_invoice=$this->input->post('no_invoice');
			$invoice=$this->datainvoice->one($no_invoice);

			foreach ($invoice->result() as $row)
			{
				$data = array(
					'subject' => $row->subject, 
					'kapasitas_download' => $row->kapasitas_download, 
					'harga' => rupiah($row->harga), 
					'lama_hari' => $row->lama_hari, 
					'status' => yesno($row->status,"Paid","Unpaid"), 
					);
				echo json_encode($data);
			}
			
		}	
		public function beli_paket()
		{
			
			$session=$this->session->userdata('contributor');
			$memberid=$session['memberid'];
			// Cek Kode Paket
			$kode_paket=$this->input->post('kode_paket');
			$paket=$this->datapaket->one($kode_paket);
			foreach ($paket->result() as $row)

			// cek Deposit
			$deposit=$this->datadeposit->myDeposit(trim($memberid));
			foreach ($deposit->result() as $dep)
			$sisa_deposit=$dep->sisa_deposit-$row->harga;
			if ((!empty($deposit->result()) && ($sisa_deposit>-1)))  #Ambil Dari Sisa Deposit
			{
				
				$data = array(
					'no_invoice' => $this->getNoInvoice(),
					'memberid' => $memberid,
					'subject' => "Pembelian ".$row->nama_paket,
					'kode_paket' => $kode_paket,
					'lama_hari' => $row->lama_hari,
					'kapasitas_download' => $row->kapasitas_download,
					'harga' =>$row->harga,
					'status' => 1,
					'tanggal_deposit' => date('Y-m-d'),
				);

				$ex=date_add(date_create($dep->tanggal_expired),date_interval_create_from_date_string("$row->lama_hari days"));
				$tanggal_expired=date_format($ex,'Y-m-d');
				$depositBaru= array(
						'id_deposit' => trim($dep->id_deposit), 
						'kode_paket' => $dep->kode_paket, 
						'sisa_download' => $dep->sisa_download+$row->kapasitas_download, 
						'status' => 1, 
						'sisa_deposit' => $sisa_deposit, 
						'tanggal_expired' => $tanggal_expired, 
						'tanggal_deposit' => date('Y-m-d'), 
						'memberid' => trim($dep->memberid), 
				);

				$this->datainvoice->insert($data);
				$this->datadeposit->autoUpdate($depositBaru,trim($memberid));
				echo "<h4><i class='fa fa-check'></i> Pemesanan Berhasil Silahkan Cek Email Anda Untuk Invoice</h4>";
				$this->createInvoice($data);



			}
			else #bawaan
			{
				
				$data = array(
					'no_invoice' => $this->getNoInvoice(),
					'memberid' => $memberid,
					'subject' => "Pembelian ".$row->nama_paket,
					'kode_paket' => $kode_paket,
					'lama_hari' => $row->lama_hari,
					'kapasitas_download' => $row->kapasitas_download,
					'harga' =>$row->harga,
					'status' => 0,
					'tanggal_deposit' => date('Y-m-d'),
				);
				$this->datainvoice->insert($data);
				echo "<h4><i class='fa fa-check'></i> Pemesanan Berhasil Silahkan Cek Email Anda Untuk Invoice</h4>";
				$this->createInvoice($data);

			}		
			 
		}
		public function createInvoice($data)
		{
				$session=$this->getSession();
				$email=$session['email'];
			 	$dataPemesanan['data']=$data;
				$dataPemesanan['bank']=$this->databank->all();
				$no_invoice=$data['no_invoice'];
				
				$invoice=$this->load->view('contributor/detail_pemesananEmail',$dataPemesanan,TRUE);
				$this->sendMailInvoice($invoice,$email,$no_invoice);
				$this->load->view('contributor/detail_pemesanan',$dataPemesanan);

		}
		public function sendMailInvoice($invoice,$email,$no_invoice)
		{
								$config=array(
							                    'protocol'=>"smtp",
							                    'smtp_host'=>'mail.pixtox.com',
							                    'smtp_port'=>25,
							                    'smtp_user'=>'admin@pixtox.com',
							                    'smtp_pass'=>'pix29815',
								);
		                $this->load->library('email',$config);
		                $this->email->from('admin@pixtox.com','Pixtox'); 
		                $this->email->to($email); 
		                $this->email->subject("Invoice Tagihan #$no_invoice");
		                $this->email->message($invoice); 
		                $this->email->set_mailtype("html");
		                $this->email->send();

		               $this->email->print_debugger();
		}

                public function get_paket($kode_paket)
		{
				$paket=$this->datapaket->one($kode_paket);
				foreach ($paket->result() as $row)
				{
					return $row->nama_paket;
				}
		}
		public function get_invoice()
		{
			$this->load->view('css');
                        $no_invoice=$this->input->post('no_invoice');
			$session=$this->session->userdata('contributor');
			$memberid=$session['memberid'];
			$myInvoice=$this->datainvoice->one($no_invoice);

			if ($myInvoice->result()==null) 
			{
				redirect('contributor');
			}
			else
			{
				foreach ($myInvoice->result() as $row)
				{
					
					if($memberid!=$row->memberid)
					{
						redirect('contributor');
					}
					else
					{
						$data = array(
						'no_invoice' => $no_invoice,
						'memberid' => $memberid,
						'subject' => "Pembelian ".$this->get_paket($row->kode_paket),
						'kode_paket' => $row->kode_paket,
						'lama_hari' => $row->lama_hari,
						'kapasitas_download' => $row->kapasitas_download,
						'harga' =>$row->harga,
						'status' => 0,
						'tanggal_deposit' => date('Y-m-d'),
						);
						$data['data']=$data;
						$data['bank']=$this->databank->all();
						$this->load->view('contributor/detail_pemesanan',$data);
					}	
				}
			}
			
		}


		#konfirmasi
		public function page_konfirmasi()
		{
			$session=$this->session->userdata('contributor');
			$memberid=$session['memberid'];
			$data['invoice']=$this->datainvoice->myInvoice($memberid);
			$data['bank']=$this->databank->all();
			$this->load->view('contributor/page_konfirmasi',$data);
		}
		public function do_konfirmasi()
		{
			$config['upload_path'] = './upload/konfirmasi';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '2048';
			$config['encrypt_name']  = TRUE;

			$this->load->library('upload', $config);
                        $this->upload->initialize($config);
			if ( ! $this->upload->do_upload())
			{
				
				$this->datakonfirmasi->insert($bukti='');
                                echo 1;
				
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$bukti=$data['upload_data']['file_name'];
				$this->datakonfirmasi->insert($bukti);
				echo 1;
			}
		}

		#Deposit
		public function getDataDeposit()
		{
			$session=$this->session->userdata('contributor');
			$memberid=$session['memberid'];
			$data=$this->datadeposit->get($memberid);
			foreach ($data->result() as $row)
			{
				$status=date('Y-m-d');
				if ($status!=$row->tanggal_expired) {
					$status="<span class='text-success'>Active</span>";
				}
				else
				{
					$status="<span class='text-danger'>Expired</span>";
				}
				$x = array(
					'id_deposit' => $row->id_deposit, 
					'memberid' => $row->memberid, 
					'kode_paket' => $row->kode_paket,
					'sisa_download' => $row->sisa_download, 
					'status' => $row->status, 
					'sisa_deposit' => rupiah($row->sisa_deposit), 
					'tanggal_deposit' => dateindo($row->tanggal_deposit),
					'tanggal_expired'=>dateindo($row->tanggal_expired),
					'status'=>$status,
				);
				echo json_encode($x);
			}

		}

		public function page_redeem()
		{
			$memberid=$this->getMemberid();
			$earning=$this->datacontributor->earning($memberid);
			$jumlah=$this->datacontributor->uploadCount($memberid);
			foreach($jumlah->result() as $row)

			$data['earning']= array(
				'upload' =>$row->jumlah, 
				'download' => count($earning->result()), 
				'earning' =>$this->myEarning($memberid) , 
				);
			$this->load->view('contributor/page_redeem',$data);
		}

function cekEarning(){
$session=$this->session->userdata('contributor');
$memberid=$session['memberid'];
$hasil=$this->dataredeem->myEarning($memberid);
if($hasil->result()!=null){
return 1;
}
else
{
return 0;
}
}
		public function do_rendeem()
		{
			$session=$this->session->userdata('contributor');
			$memberid=$session['memberid'];
			

			$myearning=$this->cekEarning();
                        if ($myearning==1){
//Disini
                        $nominal=$this->input->post('nominal');
			$cek=$this->cek_redeem($nominal);
			if ($cek==1) 
			{
				$q=$this->dataredeem->myRedeem($memberid);
				if ($q->result()==null) 
				{


					$tanggal=$this->input->post('tanggal');
					$bulan=$this->input->post('bulan');
					$tahun=$this->input->post('tahun');
					$tanggal_redeem=$tahun."-".$bulan."-".$tanggal;
					$data = array(
					'memberid' => $memberid, 
					'nominal' => $this->input->post('nominal'), 
					'tanggal_redeem' => $tanggal_redeem, 
					'no_rekening' => $this->input->post('no_rekening'), 
					'nama_rekening' => $this->input->post('nama_rekening'), 
					'bank' => $this->input->post('bank'), 
					);
					$this->dataredeem->insert($data);
					echo 1;
				}
				else
				{
					echo "Maaf Silahkan Menunggu Proses Redeem";
				}
			}
			else
			{
				echo "Nominal redeem kurang, minimal redeem yaitu ".rupiah($cek)."";
			}
//end
                     } else{ echo "Anda Tidak Memiliki Earning";}
			
			
		}

		public function cek_redeem($nominal)
		{
			$data=$this->dataredeem->getSet($id=1);
			foreach ($data->result() as $row)
			{
				if ($row->minimal>$nominal) {
					return $row->minimal;
				}
				else
				{
					return 1;
				}
			}

		}
		public function status_redeem()
		{
			$session=$this->session->userdata('contributor');
			$memberid=$session['memberid'];
			$q=$this->dataredeem->cekRedeem($memberid);

			foreach ($q->result() as $row)
			{
				echo yesno($row->status,"Diterima","Menunggu");
			}
		}
	



		#download
		public function cekDeposit($memberid)
		{
			
			$myDeposit=$this->datadeposit->get($memberid);
			foreach ($myDeposit->result() as $row)
			{
				$data = array(
					'sisa_download' => $row->sisa_download, 
					'sisa_deposit' => $row->sisa_deposit, 
					'tanggal_expired' => $row->tanggal_expired, 
					);
				return $data;
			}

		}
		public function download()
		{
			$session=$this->session->userdata('contributor');
			$memberid=$session['memberid'];

			$myDeposit=$this->cekDeposit($memberid);
			if ($myDeposit['sisa_download']==0) 
			{
				echo "0";
			}
			else
			{
				$id_foto=$this->input->post('id_foto');
				$foto=$this->dataimage->one($id_foto);
				foreach($foto->result() as $row)
				$link=str_replace('.','', str_shuffle("$id_foto$row->big"));
				$download = array(
					'id_download' => $this->getIdDownload(), 
					'memberid' => $memberid, 
					'id_foto' => $id_foto, 
					'tanggal_download' => date('Y-m-d'), 
					'link' =>$link, 
					'big' =>$row->big, 
					'mini' =>$row->mini, 
					'status' => 0,
                                        'earning' => $this->earning(),  
					);
				$this->datadownload->insert($download);

				echo "<a class='text-center' target='__blank' href=".base_url("contributor/downloadImage/$link")."> Download </a>";
			}
		}

                public function earning()
		{
			$data=$this->dataredeem->getSet($id=1);
			foreach ($data->result() as $row)
			{
				return $row->penghasilan;
			}
		}
		public function downloadImage($link)
		{
			$download=$this->datadownload->getImage($link);
			foreach ($download->result() as $row)
			
			if ($row->status==0) 
			{
					$id_download=$row->id_download;
					$this->datadownload->updateStatus($id_download);

					$memberid=$row->memberid;
					$this->datadeposit->kurangDownload($memberid);
					
					$databig = file_get_contents("./upload/big/$row->big");  
					$big =$row->big;
					force_download($big, $databig);

					// $datamini = file_get_contents("./upload/mini/$row->mini"); #Read the file's contents
					// $mini =$row->mini;
					// force_download($mini, $datamini);				
					
			}
			else
			{
				echo "Opps Link Download Sudah Digunakan Sebelumnya <a href=".base_url('member')."> << Kembali </a>";
			}
		}
		
		public function getIdDownload()
		{
			return $this->datadownload->getID();
					
		}	

	}