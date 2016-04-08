<?php 
	/**
	* 
	*/
	class Reset extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('datamember');
			$this->load->model('datacontributor');
			$this->load->model('datafirstlogin');
			$this->load->model('datareset');
		}
		public function index()
		{
			$this->load->view('style');
			$this->load->view('front/reset');
		}

		public function auth()
		{
			$email=$this->input->post('email');
			$cek_c=$this->datacontributor->byEmail($email);
			if ($cek_c->result()==null) {
				$cek_m=$this->datamember->byEmail($email);
				if ($cek_m->result()==null) {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger text-center"> Email Salah</div>');
					redirect('reset');
				}
				else
				{
					$this->send_email($email);	
				}
			}
			else
			{
				$this->send_email($email);
			}

		}
		public function send_email($email)
		{
			$link=$this->generateLink($email);
			$config=array(
		                    'protocol'=>"smtp",
		                    'smtp_host'=>'mail.pixtox.com',
		                    'smtp_port'=>25,
		                    'smtp_user'=>'admin@pixtox.com',
		                    'smtp_pass'=>'pix29815',
			);
			$this->load->library('email',$config);
			$this->email->from('admin@pixtox.com', 'Admin Pixtox');
			$this->email->to($email); 
			$this->email->subject('Reset Password');
			$this->email->message("
			Please Follow This Link For Reset Your Password<br>
        $link
			");	
			$this->email->set_mailtype("html");
			$this->email->send();
			$this->session->set_flashdata('pesan','<div class="alert alert-success text-center"> Silahkan Cek Email</div>');
			redirect('reset');
			echo $this->email->print_debugger();
		}
		public function generateLink($email)
		{
			$token=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',15)),0,15);
			$link=base_url("reset/change/$token");
			$data = array(
				'email' => $email,
				'token' => $token,
				'status' => 0,
				'memberid' => $this->memberid($email),
			);
			$this->datareset->insert($data);
			return $link;
		}
		public function memberid($email)
		{

			$cek_c=$this->datacontributor->byEmail($email);
			if ($cek_c->result()==null) {
				$cek_m=$this->datamember->byEmail($email);
				if ($cek_m->result()==null) {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger text-center"> Email Salah</div>');
					redirect('reset');
				}
				else
				{
					foreach ($cek_m->result() as $row){
						return $row->memberid;
					}
				}
			}
			else
			{
				foreach ($cek_c->result() as $row){
						return $row->memberid;
					}
			}
		}

		// Form Reset
		public function change($token)
		{
			if (empty($token)) {
				redirect('reset');
			}
			else
			{
				$cek=$this->datareset->one($token);
					if ($cek->result()!=null) {
						foreach ($cek->result() as $row)
						{

							$data['member'] = array(
																					'memberid' =>  $row->memberid, 
																					'email' =>  $row->email, 
																					'token' =>  $row->token, 
																					'status' =>  $row->status, 
																		);
	
						}
						$this->load->view('style');
						$this->load->view('front/form_reset',$data);
					}
			}
		}
		public function doReset()
		{
			$datar = array(
				'memberid' => $this->input->post('memberid'),
				'email' => $this->input->post('email'),
				'token' => $this->input->post('token'),
				'status' => 1,
			 );
			

			$dataf = array(
				'password' =>md5( $this->input->post('password')),
				'memberid' => $this->input->post('memberid'),
				'token' => $this->input->post('token'),
				'status' => 1,
			 );


			$this->datareset->update($dataf,$datar);
			switch (substr($dataf['memberid'],0,1)) {
				case 'M':
						$data = array(
							'memberid' => $dataf['memberid'], 
							'password' => $dataf['password'], 
						);
						$this->datareset->updateMember($data);
						$this->session->set_flashdata('pesan','<div class="alert alert-success text-center"> Reset Success</div>');
						redirect('login');
					break;

				case 'C':
						$data = array(
							'memberid' => $dataf['memberid'], 
							'password' => $dataf['password'], 
						);
						$this->datareset->updateContributor($data);
						$this->session->set_flashdata('pesan','<div class="alert alert-success text-center"> Reset Success</div>');
						redirect('login');
					break;
				
				default:
					$this->session->set_flashdata('pesan','<div class="alert alert-success text-center"> Reset Gagal</div>');
					redirect('login');
					break;
			}
		}
	}