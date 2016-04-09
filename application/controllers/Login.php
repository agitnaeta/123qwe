<?php
	/**
	* 
	*/
	class Login extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('datamember');
			$this->load->model('datafirstlogin');
			$this->load->model('datacontributor');
			$this->load->model('dataadmin');
			$this->load->model('datalog');

			$member=$this->session->userdata('member');
			$contributor=$this->session->userdata('contributor');
			if (!empty($member)) 
			{
				redirect('member');
			}

			if (!empty($contributor)) 
			{
				redirect('contributor');
			}

		}
		public function index()
		{

			$this->load->view('style');
			$this->load->view('front/login');
		}
		public function get_browser()
		{
			$this->load->library('user_agent');

			if ($this->agent->is_browser())
			{
			    $agent = $this->agent->browser().' '.$this->agent->version();
			}
			elseif ($this->agent->is_robot())
			{
			    $agent = $this->agent->robot();
			}
			elseif ($this->agent->is_mobile())
			{
			    $agent = $this->agent->mobile();
			}
			else
			{
			    $agent = 'Unidentified User Agent';
			}

			$browser = array(
				'agent' => $agent,
				'platform' => $this->agent->platform(),
				);
			return $browser;
		}
		public function auth()
		{
			//browser
			$detect=$this->get_browser();
			$browser=$detect['agent'];
			$platform=$detect['platform'];
			$device="$browser$platform";
			//ip
			$ip=$this->input->ip_address();
			//tanggal
			$tanggal=date('Y-m-d');
			//jam
			$jam=date('H:i:s');


			$cekMember=$this->datamember->login();
			if ($cekMember->result()!=null) 
			{
				foreach ($cekMember->result() as $row)
				{
					$password=$row->password;
					$memberid=$row->memberid;
					$cekFirst=$this->datafirstlogin->cekFirstLogin($password,$memberid);
					if ($cekFirst->result()!=null) 
						{
							foreach ($cekFirst->result() as $row)
							{
							
								$status=$row->status;
								
								$datac=$this->datamember->one($row->memberid);
								foreach ($datac->result() as $row)
								if ($status==1) {
									$session = array(
									'memberid' =>$row->memberid,
                                                                        'email' =>$row->email,																		
									'username' =>$row->username,																																		
									'foto' =>$row->foto,																	
									'tanggal_login' =>$tanggal, 
									'jam_login' =>$jam, 
									'browser' =>$device, 
									'ip' =>$ip, 
									);
								$this->session->set_userdata('member',$session);
								redirect('member');						
								}
								else
								{
									$this->session->set_flashdata('pesan','<div class="alert alert-danger text-center"> Silahkan Aktifkan Akun Anda Melaui Link Email </div>');
									redirect('login');
								}
							}
						}
						else
						{
									$this->session->set_flashdata('pesan','<div class="alert alert-danger text-center"> Ops, anda mencoba akses ilegal </div>');
									redirect('login');
						}
				}
			}
			else
			{
				$cekC=$this->datacontributor->login();
				if ($cekC->result()!=null) 
				{
					foreach ($cekC->result() as $row)
					{
						$password=$row->password;
						$memberid=$row->memberid;
						$cekFirst=$this->datafirstlogin->cekFirstLogin($password,$memberid);
						if ($cekFirst->result()!=null) {
							foreach ($cekFirst->result() as $row)
							{
								$status=$row->status;
								

								$datac=$this->datacontributor->one($row->memberid);
								foreach ($datac->result() as $row)
								if ($status==1) {
									$session = array(
									'memberid' =>$row->memberid,
                                                                        'email' =>$row->email,																		
									'username' =>$row->username,																	
									'app_status' =>$row->app_status,																	
									'foto' =>$row->foto,																	
									'tanggal_login' =>$tanggal, 
									'jam_login' =>$jam, 
									'browser' =>$device, 
									'ip' =>$ip, 
									);
								$this->session->set_userdata('contributor',$session);
								redirect('contributor');
									
								}
								else
								{
									$this->session->set_flashdata('pesan','<div class="alert alert-danger text-center"> Silahkan Aktifkan Akun Anda Melaui Link Email </div>');
									redirect('login');
								}
							}
						}
						else
						{
									$this->session->set_flashdata('pesan','<div class="alert alert-danger text-center"> Ops, anda mencoba akses ilegal </div>');
									redirect('login');
						}
					}
				}
				else
				{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger text-center"> Login Salah! </div>');
					redirect('login');	
				}
			}

		}
		public function pxadmin()
		{
			$this->load->view('style');
			$this->load->view('back/form_login');
		}
		public function atuhadmin()
		{
			
			//browser
			$detect=$this->get_browser();
			$browser=$detect['agent'];
			$platform=$detect['platform'];
			$device="$browser$platform";
			//ip
			$ip=$this->input->ip_address();
			//tanggal
			$tanggal=date('Y-m-d');
			//jam
			$jam=date('H:i:s');

			$cek=$this->dataadmin->login();
			if ($cek->result()!=null) 
			{
				foreach ($cek->result() as $row)
				
				if ($row->status=="1") {
					
					$session=array(
						'userID'=>$row->userID,
						'username'=>$row->username,
						'status'=>$row->status,
						'tanggal_login' =>$tanggal, 
						'jam_login' =>$jam, 
						'browser' =>$device, 
						'ip' =>$ip, 
						);
					$this->datalog->add($session);
					$this->session->set_userdata('adminpx',$session);
					//echo $row->status;
					redirect('pxadmin');
				}
				
				else
				{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger text-center"> Status Admin Anda tidak aktif! </div>');
					redirect('login/pxadmin');	
				}
			}
			else
			{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger text-center"> Login Salah! </div>');
				redirect('login/pxadmin');	
			}
		}

		public function atuhadmin_acc()
		{
			
			//browser
			$detect=$this->get_browser();
			$browser=$detect['agent'];
			$platform=$detect['platform'];
			$device="$browser$platform";
			//ip
			$ip=$this->input->ip_address();
			//tanggal
			$tanggal=date('Y-m-d');
			//jam
			$jam=date('H:i:s');

			$cek=$this->dataadmin->login();
			if ($cek->result()!=null) 
			{
				foreach ($cek->result() as $row)
				
				if ($row->status=="1") {
					
					$session=array(
						'userID'=>$row->userID,
						'username'=>$row->username,
						'status'=>$row->status,
						'tanggal_login' =>$tanggal, 
						'jam_login' =>$jam, 
						'browser' =>$device, 
						'ip' =>$ip, 
						);
					$this->datalog->add($session);
					$this->session->set_userdata('adminpx',$session);
					//echo $row->status;
					redirect('accept');
				}
				
				else
				{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger text-center"> Status Admin Anda tidak aktif! </div>');
					redirect('accept');	
				}
			}
			else
			{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger text-center"> Login Salah! </div>');
				redirect('accept');	
			}
		}
	}