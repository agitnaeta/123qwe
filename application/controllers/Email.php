<?php 	
	/**
	* 
	*/
	class Email extends CI_Controller
	{
		
		function __construct()
		{
				parent::__construct();
				$this->load->model('dataemail');
				$this->load->helper('file');
		}
		public function page_settingMail()
		{
			$this->load->view('modul/css');
			$this->load->view('modul/js');
			$this->load->view('back/page_setting_email');
		}
		public function getSetting()
		{
			$data=$this->dataemail->getSetting();
			echo  json_encode($data->result());
		}
		public function updateSetting()
		{
			$data = array(
				'id' => $this->input->post('id'), 
				'host' => $this->input->post('host'), 
				'username' => $this->input->post('username'), 
				'password' => $this->input->post('password'), 
				'port' => $this->input->post('port'), 
				);
			$this->dataemail->updateSetting($data);
			echo 1;
		}
		public function page_templateEmail()
		{
			$this->load->view('modul/css');
			$this->load->view('modul/js');
			$this->load->view('modul/ckeditor');
		   $data['type']=$this->dataemail->getAllTemplate();
			$this->load->view('back/page_template_email',$data);
		}
		public function getTemplate($id='')
		{
			if (empty($id)) {
				$data= array(
					'id' =>null, 
					'nama' => null, 
					'isi' =>0, 
					);
				echo json_encode($data);
			}
			else{
				$data=$this->dataemail->getTemplate($id);
				foreach ($data->result() as $row)
				{
					$data= array(
					'id' => $row->id, 
					'nama' =>$row->nama, 
					'isi' =>$row->isi, 
					);
					echo json_encode($data);
				}
			}
		}
		public function updateTemplate()
		{
			$data = array(
				'id' => $this->input->post('id'),
				'nama' => $this->input->post('nama'),
				'isi' => $this->input->post('isi'),
			);
			$this->updateFile($data);
			$this->dataemail->updateTemplate($data);
			echo 1;
		}
		public function updateFile($data)
		{
			write_file('./application/views/template/email/'.$data['nama'].'.php',$data['isi']);
		}
	}