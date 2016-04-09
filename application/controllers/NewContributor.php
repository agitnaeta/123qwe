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
				$this->load->model('dataimage');
				 $this->load->library('image_lib');
				 $this->load->library('ftp');
				
			}
			else
			{
				redirect('login');
			}

		}
		public function index()
		{
			$session=$this->session->userdata('contributor');
			$memberid=$session['memberid'];
			$data['contributor']=$this->datacontributor->one($memberid);
			$data['file']=$this->datafile->active();
			$this->load->view('css');
			$this->load->view('contributor/nav',$data);
			$this->load->view('contributor/panel',$data);
			
		}
		public function profil()
		{
			$session=$this->session->userdata('contributor');
			$memberid=$session['memberid'];
			$data['contributor']=$this->datacontributor->one($memberid);
			$this->load->view('contributor/form_profil',$data);
		}
		public function update()
		{
			$config['upload_path'] = './upload/user';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '4000';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				//$error = array('error' => $this->upload->display_errors());

				echo  $err=$this->upload->display_errors();
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());

				$foto=$data['upload_data']['file_name'];
				$this->datacontributor->update($foto);
				echo "<div class='alert alert-success text-center'> Berhasil Disimpan</div>";

			}	
		}
		public function detail()
		{
			$session=$this->session->userdata('contributor');
			$memberid=$session['memberid'];
			$data['contributor']=$this->datacontributor->one($memberid);
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
		public function uploadImage()
		{
			//memberid
			$session=$this->session->userdata('contributor');
			$id_contributor=$session['memberid'];
			//cek status
			$app_status=$this->app_status();
			if ($app_status!=1) 
			{
				$table_name='temp_accept';
				$status='0';
			}
			else
			{
				$table_name='foto';
				$status='1';
			}
			//upload
			
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '4096';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
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
				
				

				$this->datacontributor->upload($id_contributor,$foto,$table_name,$status,$mini_name);
				$this->send_mailAdmin($foto);
				echo "<br>Success";
			}
			
		}
		public function send_mailAdmin($foto)
		{
			$session=$this->session->userdata('contributor');
			$memberid=$session['memberid'];
			$datauser=$this->datacontributor->one($memberid);


			foreach ($datauser->result() as $row)
			$nama_contributor=$row->username;
			$image=$foto;

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
		                $this->email->to($list); 
		                

		                $this->email->subject("Confirm Image");
		                $this->email->message("
		                $nama_contributor has been send image to Pixtox
		                You need accept or reject this image,
		                Please Follow This Link:
		                http://pixtox.com/upload/big/$foto
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
		        $config['image_library']    = 'GD2';
		        $config['source_image']     = "./upload/$foto";
		        $config['wm_type']          = 'overlay';
		        $config['wm_overlay_path']  = './upload/watermark.png'; //the overlay image
		        $config['wm_opacity']       = 20;
		        $config['wm_vrt_alignment'] = 'middle';
		        $config['wm_hor_alignment'] = 'center';
		        
		        

		        
		        $this->image_lib->initialize($config);
		        
		        if (!$this->image_lib->watermark()) {
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


		        $config['image_library'] = 'GD2';
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
		 public function move_mini($mini_name)
		 {
		 	$config['hostname'] = 'ftp.pixtox.com';
			$config['username'] = 'pixtoxco';
			$config['password'] = '014CzY5lwj';
			$config['debug']= TRUE;
			$this->ftp->connect($config);

			$this->ftp->move("./upload/$mini_name","./upload/mini/$mini_name");

			$this->ftp->close();
		 }

		 public function move_watermark($foto)
		 {
		 	$config['hostname'] = 'ftp.pixtox.com';
			$config['username'] = 'pixtoxco';
			$config['password'] = '014CzY5lwj';
			$config['debug']= TRUE;
			$this->ftp->connect($config);

			$this->ftp->move("./upload/$foto","./upload/watermark/$foto");

			$this->ftp->close();
		 }

		 public function move_big($foto)
		 {
		        	$config['hostname'] = 'ftp.pixtox.com';
			$config['username'] = 'pixtoxco';
			$config['password'] = '014CzY5lwj';
			$config['debug']= TRUE;
			$this->ftp->connect($config);

			$this->ftp->move("./upload/$foto","./upload/big/$foto");

			$this->ftp->close();
		 }
		 public function getSize()
		 {
		 	 $size = getimagesize("https://www.google.co.id/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png");
		 	 //print_r($size);
		 	 echo $size[0] * 30/100;
		 }
		 public function getImageTemp()
		 {
		 	$session=$this->session->userdata('contributor');
		 	$id_contributor=$session['memberid'];
		 	$tabel="temp_accept";
		 	$data['temp_image']=$this->dataimage->all_contributor($id_contributor,$tabel);
		 	//$this->load->view('css');
		 	$this->load->view('contributor/list_foto',$data);

		 }
		 public function getImageSearch()
		 {
		 	$session=$this->session->userdata('contributor');
		 	$id_contributor=$session['memberid'];
		 	$data['temp_image']=$this->dataimage->search($id_contributor);
		 	
		 	$this->load->view('contributor/list_foto',$data);
		 }
	}