<?php 
	/**
	* 
	*/
	class Bk extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library('image_lib');
			$this->load->library('ftp');
			$this->load->helper('yesno');
			$this->load->model('databg');
			$this->cekSession();
		}
		public function cekSession()
		{
				$session=$this->session->userdata('adminpx');
				if(!empty($session))
				{
					return true;
				}
				else
				{
					redirect('login/pxadmin');
				}
		}
		public function page_background()
		{
				$this->load->view('css');
				$this->load->view('datatable');
				$data['bg']=$this->databg->all();
				$this->load->view('back/page_background',$data);
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
		 public function resize($foto)
		 {
		          
		        $config['image_library'] = 'gd2';
		        $config['source_image']     = "./upload/bg/$foto";
		        $config['create_thumb'] = TRUE;
		        $config['maintain_ratio'] = TRUE;
		        $config['width']    = 100;
		        $config['height']    = 100;
		        $config['overwrite'] = TRUE;
		        $this->load->library('image_lib',$config); 
		        $this->image_lib->initialize($config);

		        if (!$this->image_lib->resize()) 
		        {
		            echo $this->image_lib->display_errors();

		        }
		        else{
		        	$ex=explode(".",$foto);
		        	$mini_name=$ex[0]."_thumb.".$ex[1];
		        	$this->move_mini($mini_name);
		        	$this->insert($foto,$mini_name);
		        }
		      
		 }
		public function upload()
		{
				$config['upload_path'] = './upload/bg';
				$config['allowed_types'] = 'jpg';
				$config['max_size']	= '2000';
				$config['max_width']  = '4000';
				$config['max_height']  = '4000';
				$config['encrypt_name']  = TRUE;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());

					echo $error['error'];
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					$foto=$data['upload_data']['file_name'];
					$this->resize($foto);
				}
		}
		public function move_mini($mini_name)
		 {
		 	$config=$this->ftpConfig();
			$this->ftp->connect($config);
			$this->ftp->move("public_html/upload/bg/$mini_name","public_html/upload/bg/mini/$mini_name");
			$this->ftp->close();
		 }
		 public function insert($foto,$mini_name)
		 {
		 	$data = array(
		 		'nama_image' =>$foto, 
		 		'mini_name' =>$mini_name, 
		 		'status' =>0, 
		 		);
		 	$this->databg->insert($data);
		 	echo "Berhasil";
		 }
		public function set_backgroud()
		{
			$id=$this->input->post('id');
			$cek=$this->cekStatus($id);
			if ($cek==0) {
				$status=1;
			}
			else{
				$status=0;
			}

			$data = array(
				'id' => $id, 
				'status' => $status, 
			);
			$this->databg->changeStatus($data);
			echo "Succes";
		}
		public function cekStatus($id)
		{
			$data=$this->databg->one($id);
			foreach ($data->result() as $row)
			{
				if ($row->status==1) {
					return 1;
				}
				else
				{
					return 0;
				}
			}
		}
		public function getActive()
		{
			$bg=array();
			$data=$this->databg->getActive();
			foreach ($data->result() as $row)
			{
				$img=$row->nama_image;
				array_push($bg,$img);
			}
			echo json_encode($bg);
		}
		public function delete()
		{
			$id=$this->input->post('id');
			$this->databg->delete($id);
			echo "Succes";
		}
	}