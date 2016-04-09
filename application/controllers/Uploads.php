<?php 
	/**
	* 
	*/
	class Uploads extends Ci_controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('upload');

		}
		public function index()
		{	

			$fieild_1='image';
			$fieild_2='pdf';
			
			// Config Gambar
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '10000';
			$config['max_width'] = '1024';
			$config['max_height'] = '768';
			$this->upload->initialize($config); 
			if (!$this->upload->do_upload($fieild_1))
			{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('upload_form', $error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());

				// Config PDF
				$config['upload_path'] = './upload/';
				$config['allowed_types'] = 'pdf';
				$config['max_size'] = '10000';
				
				$this->upload->initialize($config); 
				if (!$this->upload->do_upload($fieild_2))
				{
					echo $foto=$data['upload_data']['file_name'];
				}
				else
				{
					$pdf = array('upload_data' => $this->upload->data());

					echo $foto=$data['upload_data']['file_name']."<br>";
					echo $file=$pdf['upload_data']['file_name'];
				}
			}
		}
		public function do_upload()
		{
			
			
		}

	}