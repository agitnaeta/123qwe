<?php 
	/**
	* 
	*/
	class Contributor extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$session=$this->session->userdata('contributor');
			if (!empty($session)) {
				$this->load->model('datacontributor');
				$this->load->model('user');
				$this->load->model('datafile');
				$this->load->model('databank');
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
					$file=$this->datafile->active();
					foreach ($file->result() as $row)
					$data['file']=$row->file_url;
					$this->load->view('css');
					$data['username']=$session['username'];
					$this->load->view('contributor/nav',$data);
					$this->load->view('contributor/panel',$data);

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

			if (!$this->upload->do_upload())
			{
				
				$foto='';
				$this->datacontributor->update($foto);
				redirect('contributor');
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$foto=$data['upload_data']['file_name'];
				$this->datacontributor->update($foto);
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


		public function sessionImage($id_contributor,$foto,$mini_name,$kategori)
		{
			$tanggal_upload=date('Y-m-d');
			$time=date("H:i:s");
			$cleanDate=str_replace('-', '', $tanggal_upload);
			$cleanTime=str_replace(':','', $time);
			$tags=$this->input->post('tag');
			$tag=str_replace(' ','', $tags);
			$id_foto="$cleanDate$cleanTime";
			$data = array(
				'id_contributor' => $id_contributor, 
				'id_foto' => $id_foto, 
				'status' => 0, 
				'type' => $this->input->post('f_type'), 
				'image_week' => $this->input->post('image_week'), 
				'kategori' => $kategori, 
				//'model_realise' => $file, 
				'big' => $foto, 
				'mini' => $mini_name, 
				'watermark' => $mini_name, 
				'tanggal_upload' => $tanggal_upload, 
				'judul' => $this->input->post('judul'), 
				'tag' => $tag, 
				'temp_path' => $foto, 
			);

			$data_array=$this->session->set_userdata('image',$data);
		}
		public function imageses()
		{
			$data_array=$this->session->userdata('image');
			
			print_r($data_array);
		}
		public function uploadImage()
		{
			//memberid
			$tag=$this->input->post('tag');
			$session=$this->session->userdata('contributor');
			$id_contributor=$session['memberid'];
			//upload
		
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'jpg|ips';
			$config['encrypt_name'] = TRUE;
			$config['max_size']	= '999999';
			$config['max_width']  = '999999';
			$config['max_height']  = '999999';
			//$config['min_height']  = '1680';
			//$config['min_width']='2240';
			//$config['min_size']='4000';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				echo  $this->upload->display_errors();
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
				$this->move_big($foto);
				
				
				$kat=$this->input->post('kategori');
				$kategori=implode(',', $kat);
				$this->session->unset_userdata('image');
				$this->sessionImage($id_contributor,$foto,$mini_name,$kategori);
				echo "Success";
			
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
		public function send_mailAdmin()
		{
			$session=$this->session->userdata('contributor');
			$memberid=$session['memberid'];
			$datauser=$this->datacontributor->one($memberid);
			

			foreach ($datauser->result() as $row)
			$nama_contributor=$row->username;
			

			$config=array(
		                    'protocol'=>"smtp",
		                    'smtp_host'=>'mail.pixtox.com',
		                    'smtp_port'=>587,
		                    'smtp_user'=>'admin@pixtox.com',
		                    'smtp_pass'=>'014CzY5lwj',
			);
			
		    $email=$this->user->recive();

			foreach ($email->result() as $row)
			
				$list[]=$row->email;
				
			
		                $this->load->library('email',$config);
		                $this->email->from('admin@pixtox.com','Pixtox');
		                $this->email->to('verificator@pixtox.com'); 
		                

		                $this->email->subject("Confirm Image");
		                $this->email->message("
		                $nama_contributor has been send image to Pixtox
		                You need accept or reject this image,
		                Please Follow This Link:
		                http://pixtox.com/accept
		                "); 
		                $this->email->set_mailtype("html");

		                $this->email->send();

		                echo $this->email->print_debugger();
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
				$this->resizeWatermark($tinggi,$lebar);
				$file_watermark="watermark.png";
				$x=explode('.',$file_watermark);
				$t="_thumb.";
				$watermarkFile="$x[0]$t$x[1]";

		        $config['image_library']    = 'gd';
		        $config['source_image']     = "./upload/$foto";
		        $config['wm_type']          = 'overlay';
		        $config['wm_overlay_path']  = "./upload/$watermarkFile"; //the overlay image
		        $config['wm_opacity']       = 5;
		        $config['wm_vrt_alignment'] = 'middle';
		        $config['wm_hor_alignment'] = 'center';       
		        $this->image_lib->initialize($config);
		        
		        if (!$this->image_lib->watermark()) {
		            echo $this->image_lib->display_errors();
		        }
		        if (!delete_files(base_url("upload/$watermarkFile"))) 
		        {
		        	delete_files(base_url("upload/$watermarkFile"));
		        }
		}
		public function resizeWatermark($lebar,$tinggi)
		{
			
		        $config['image_library'] = 'gd2';
		        $config['source_image']     = "./upload/watermark.png";
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
		 		'hostname'=>'192.168.20.133',
		 		'username'=>'admin',
		 		'password'=>'masukaja',
		 		'debug'=>TRUE,
		 		);
		 	return $config;
		 }
		 public function move_mini($mini_name)
		 {
		 	$config=$this->ftpConfig();
			$this->ftp->connect($config);
			$this->ftp->move("./upload/$mini_name","./upload/mini/$mini_name");
			$this->ftp->close();
		 }

		 public function move_watermark($foto)
		 {
		 	$config=$this->ftpConfig();
			$this->ftp->connect($config);
			$this->ftp->move("./upload/$foto","./upload/watermark/$foto");
			$this->ftp->close();
		 }

		 public function move_big($foto)
		 {
		 	$config=$this->ftpConfig();
			$this->ftp->connect($config);
			$this->ftp->move("./upload/$foto","./upload/big/$foto");
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
		}
		public function getEarning()
		{
			$memberid=$this->getMemberid();
			$data=$this->datacontributor->earning($memberid);
			$jumlah=$this->datacontributor->uploadCount($memberid);
			$redeemDiambil=$this->dataredeem->diambil($memberid);
			foreach($jumlah->result() as $row)

			$earning = array(
				'upload' =>$row->jumlah, 
				'download' => count($data->result()), 
				'earning' =>rupiah((count($data->result())*25000)-$redeemDiambil), 
				);
			echo json_encode($earning);
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
				'harga' => rupiah($row->harga), 
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
			$kode_paket=$this->input->post('kode_paket');
			$session=$this->session->userdata('contributor');
			$memberid=$session['memberid'];
			$paket=$this->datapaket->one($kode_paket);
			// print_r($paket->result());
			foreach ($paket->result() as $row)
				$data = array(
					'no_invoice' => $this->getNoInvoice(),
					'memberid' => $memberid,
					'subject' => "Pembelian ".$row->nama_paket,
					'kode_paket' => $kode_paket,
					'lama_hari' => $row->lama_hari,
					'kapasitas_download' => $row->kapasitas_download,
					'harga' => rupiah($row->harga),
					'status' => 0,
					'tanggal_deposit' => date('Y-m-d'),
				);
	
			$this->datainvoice->insert($data);
			
			echo "<h4><i class='fa fa-check'></i> Pemesanan Berhasil Silahkan Cek Email Anda Untuk Invoice</h4>";
			$this->sendMailInvoice($data);
		}
		public function sendMailInvoice($data)
		{
			$data['data']=$data;
			$data['bank']=$this->databank->all();
			$this->load->view('contributor/detail_pemesanan',$data);
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

			if ( ! $this->upload->do_upload())
			{
				
				$this->datakonfirmasi->insert($bukti='');
				
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$bukti=$data['upload_data']['file_name'];
				$this->datakonfirmasi->insert($bukti);
				echo "Success";
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
				'earning' =>(count($earning->result())*25000) , 
				);
			$this->load->view('contributor/page_redeem',$data);
		}
		public function do_rendeem()
		{
			$session=$this->session->userdata('contributor');
			$memberid=$session['memberid'];
			$q=$this->dataredeem->myRedeem($memberid);
			if ($q->result()==null) 
			{
				$data = array(
				'memberid' => $memberid, 
				'nominal' => $this->input->post('nominal'), 
				'tanggal_redeem' => $this->input->post('tanggal_redeem'), 
				'no_rekening' => $this->input->post('no_rekening'), 
				'nama_rekening' => $this->input->post('nama_rekening'), 
				'bank' => $this->input->post('bank'), 
				);
				$this->dataredeem->insert($data);
				echo "Berhasil";
			}
			else
			{
				echo "Maaf Silahkan Menunggu Proses Redeem";
			}


			
		}
		public function status_redeem()
		{
			$session=$this->session->userdata('contributor');
			$memberid=$session['memberid'];
			$q=$this->dataredeem->myRedeem($memberid);
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
					);
				$this->datadownload->insert($download);

				echo "<a class='text-center' target='__blank' href=".base_url("contributor/downloadImage/$link")."> Download </a>";
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
