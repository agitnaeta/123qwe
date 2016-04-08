<?php
	/**
	* For Maintener its just only me and God know this code 
	*/
	class Daftar extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('user');
			$this->load->model('paket');
			$this->load->model('datastatus');
			$this->load->model('datapaket');
			$this->session->unset_userdata('contributor');
			$this->session->unset_userdata('member');
		}
		public function session()
		{
			if (!empty($this->session->userdata('member'))) {
				return  $member=$this->session->userdata('member');
				echo "<br>";
			}
			elseif(!empty($this->session->userdata('contributor')))
			{
				return $contributor=$this->session->userdata('contributor');
			}
		}
		public function index()
		{
			$this->load->view('css');
			$session=$this->session();
			$memberid=substr($session['memberid'],0,6);
			if ($session==null) 
			{
				$data['link']= '<a href="'.base_url("login").'" ><i class="fa fa-sign-in"></i> Sign In</a>';;
			}
			else
			{
				
				if (substr($session['memberid'],0,1)=='M') 
				{
					$member=$this->datamember->one($memberid);
					foreach ($member->result() as $row) 
					{
						$user=$row->username;
						
						$data['link']='<a href="'.base_url("member").'">('.$user.') Panel</a>';
					}
					
				}
				else
				{
					$contributor=$this->datacontributor->one($memberid);
					foreach ($contributor->result() as $row) 
					{
						$user=$row->username;
						
						$data['link']='<a href="'.base_url("contributor").'">('.$user.') Panel</a>';
						
					}
					
				}
			}
			$data['paket']=$this->datapaket->all();
			$data['status']=$this->datastatus->all();
			$this->load->view('front/navbar',$data);
			$this->load->view('front/form_daftar',$data);
		}
		public function pilih()
		{
			$this->load->view('style');
			$this->load->view('front/pilih');
		}
		public function pesan()
		{
			switch ($isi) {
				case 'daftar':
					$this->session->set_flashdata('pesan','<div class="alert alert-danger"><i class="fa fa-check"></i> Anda Berhasil Daftar Silahkan Cek email Anda!</div>');
					break;
				
				default:
					# code...
					break;
			}
		}
		
		public function max()
		{
			$max=$this->user->max();
			foreach ($max->result() as $row)
			 $id=$row->max;
			 $nextNUmber=sprintf("%'.05d\n", substr($id,1)+1);
			 $maxid="M$nextNUmber";
		}
		public function create_account()
		{
			$status=$this->input->post('status');
			switch ($status) {
				case 'M':
					$max=$this->user->max();
					foreach ($max->result() as $row)
					 $id=$row->max;
					 $nextNUmber=sprintf("%'.05d\n", substr($id,1)+1);
					 $maxid="$status$nextNUmber";

					$regex = "/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/";
					$email=$this->input->post('email');
					$u=$this->input->post('username');
					$p=$this->input->post('password');
					$username=preg_replace('/\s+/','',$u);
					$password=preg_replace('/\s+/','',$p);
	

					if (preg_match($regex, $email)) 
					{
						if (strlen(str_replace(' ','',$username)) <4 || strlen(str_replace(' ','',$username)) >20) {
							
							$this->session->set_flashdata('pesan','<div class="alert alert-danger"><i class="fa fa-remove"></i> Karakter Valid harus diantara 4-20 karakter</div>');
							redirect('daftar');
						}
						else
						{
							$cek=$this->cek_user($username);
								if ($cek==true) 
								{
									$cek_email=$this->cek_email($email);
										if ($cek_email==true) 
										{
											
											$cek_c=$this->cek_userc($username);
											if ($cek_c==true)
											{
												$cek_emailc=$this->cek_emailc($email);
												if($cek_emailc==true)
												{
													$token=$this->token();
													$password=$this->password();
													$this->user->daftar($maxid,$token,$password);
													$this->send_mail($email,$token,$password,$username);
													$this->session->set_flashdata('pesan','<div class="alert alert-success text-center"><i class="fa fa-check"></i> Anda Berhasil Daftar Silahkan Cek email! <br><small>Konfirmasi akan dikirimkan berupa email. Mohon cek ke bagian

“SPAM” jika belum ada terima dalam beberapa saat.</small></div>');
													redirect('daftar');
												}
											}											
										}
								}
						}
					}
					else
					{
						$this->session->set_flashdata('pesan','<div class="alert alert-danger"><i class="fa fa-remove"></i> Format email salah!</div>');
						redirect('daftar');
					}	
					break;
				//Contributor	
				case 'C':
						$max=$this->user->maxc();
						foreach ($max->result() as $row)
						 $id=$row->max;
						 $nextNUmber=sprintf("%'.05d\n", substr($id,1)+1);
						 $maxid="$status$nextNUmber";

						$regex = "/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/";
						$email=$this->input->post('email');
						$username=str_replace(' ','', $this->input->post('username'));
						$password=str_replace(' ','', $this->input->post('password'));

						if (preg_match($regex, $email)) 
						{
							if (strlen(str_replace(' ','',$username)) <4 || strlen(str_replace(' ','',$username)) >20) {
								
								$this->session->set_flashdata('pesan','<div class="alert alert-danger"><i class="fa fa-remove"></i> Karakter Valid harus diantara 4-20 karakter</div>');
								redirect('daftar');
							}
							else
							{
								$cek=$this->cek_userc($username);
									if ($cek==true) {
										$cek_email=$this->cek_emailc($email);
										if ($cek_email==true) {
											$token=$this->token();
											$password=$this->password();
											$this->user->daftarc($maxid,$token,$password);
											$this->send_mail($email,$token,$password,$username);
											$this->session->set_flashdata('pesan','<div class="alert alert-success"><i class="fa fa-check"></i> Anda Berhasil Daftar Silahkan Cek email!</div>');
											redirect('daftar');
										}

									}
							}
						}
						else
						{
							$this->session->set_flashdata('pesan','<div class="alert alert-danger"><i class="fa fa-remove"></i> Format email salah!</div>');
							redirect('daftar');
						}		
					break;	
				
				default:
					# code...
					break;
			}



			
			
		}
		public function cek_user($username)
		{
			
			$data=$this->user->cekUsername($username);
			if ($data->result()!=null) {
				$datac=$this->user->cekUsernamec($username);
				if ($datac!=null) {
					$this->session->set_flashdata('pesan','<div class="alert alert-info text-center"><i class="fa fa-info-circle"></i> Ops, <br> Sayang Sekali  "'.$username.'" sudah digunakan</div>');
					redirect('daftar');
				}
				else
				{
					return true;
				}
			}
			else
			{
				return true;
			}
		}
		public function cek_email($email)
		{
			$data=$this->user->cekEmail($email);
			if ($data->result()!=null) {
				$this->session->set_flashdata('pesan','<div class="alert alert-info text-center"><i class="fa fa-info-circle"></i> Ops,<br>  Sayang Sekali  "'.$email.'" sudah digunakan</div>');
				redirect('daftar');
			}
			else
			{
				return true;
			}
		}

		//contributor
		public function cek_userc($username)
		{
			
			$data=$this->user->cekUsernamec($username);
			if ($data->result()!=null) {
				$this->session->set_flashdata('pesan','<div class="alert alert-info text-center"><i class="fa fa-info-circle"></i> Ops, <br> Sayang Sekali  "'.$username.'" sudah digunakan</div>');
				redirect('daftar');
			}
			else
			{
				return true;
			}
		}
		public function cek_emailc($email)
		{
			$data=$this->user->cekEmailc($email);
			if ($data->result()!=null) {
				$this->session->set_flashdata('pesan','<div class="alert alert-info text-center"><i class="fa fa-info-circle"></i> Ops,<br>  Sayang Sekali  "'.$email.'" sudah digunakan</div>');
				redirect('daftar');
			}
			else
			{
				return true;
			}
		}


		public function send_mail($email,$token,$password,$username)
		{
			 $config=array(
		                    'protocol'=>"smtp",
		                    'smtp_host'=>'mail.pixtox.com',
		                    'smtp_port'=>587,
		                    'smtp_user'=>'admin@pixtox.com',
		                    'smtp_pass'=>'pix29815',
			);
		                $this->load->library('email',$config);
		                $this->email->from('admin@pixtox.com','Pixtox');
		                $this->email->to($email); 
		                

		                $this->email->subject("Konfirmasi Pendaftaran $username");
		                $this->email->message("
		                Terimakasih telah melakukan pendaftaran di <b>Pixtox.com</b>
		                dengan detail:<br>

		                Username : $username<br>
		                
		                Password : $password<br>

		                Untuk aktivasi akun anda bisa melakukan first login pada<br>

		                link di bawah:
		                http://pixtox.com/firstlogin/valid/$token
		                "); 
		                $this->email->set_mailtype("html");

		                $this->email->send();

		                echo $this->email->print_debugger();
		}

		public function token()
		{
			$token=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',15)),0,15);
			return $token;
		}
		public function password()
		{
			$password=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',6)),0,6);
			return $password;
		}
		//create by admin
		///
		public function create_account_by()
		{
			$status=$this->input->post('status');

			switch ($status) {
				case 'M':
					$max=$this->user->max();
					foreach ($max->result() as $row)
					 $id=$row->max;
					 $nextNUmber=sprintf("%'.05d\n", substr($id,1)+1);
					 $maxid="$status$nextNUmber";

					$regex = "/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/";
					$email=$this->input->post('email');
					$username=$this->input->post('username');
					$password=$this->input->post('password');

					if (preg_match($regex, $email)) 
					{
						if (strlen(str_replace(' ','',$username)) <4 || strlen(str_replace(' ','',$username)) >20) {
							
							echo '<div class="alert alert-danger"><i class="fa fa-remove"></i> Karakter Valid harus diantara 4-20 karakter</div>';
							//redirect('daftar');
						}
						else
						{
								$cek=$this->cek_user_by($username);
								if ($cek==true) {
									$cek_email=$this->cek_email_by($email);
									if ($cek_email==true) {
										$token=$this->token();
										$password=$this->password();
										$this->user->daftar($maxid,$token,$password);
										$this->send_mail($email,$token,$password,$username);
										echo '<div class="alert alert-success"><i class="fa fa-check"></i> Anda Berhasil Daftar Silahkan Cek email!</div>';
										//redirect('daftar');
									}

								}
						}
					}
					else
					{
						echo '<div class="alert alert-danger"><i class="fa fa-remove"></i> Format email salah!</div>';
						//redirect('daftar');
					}	
					break;
				//Contributor	
				case 'C':
						$max=$this->user->maxc();
						foreach ($max->result() as $row)
						 $id=$row->max;
						 $nextNUmber=sprintf("%'.05d\n", substr($id,1)+1);
						 $maxid="$status$nextNUmber";

						$regex = "/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/";
						$email=$this->input->post('email');
						$username=$this->input->post('username');
						$password=$this->input->post('password');

						if (preg_match($regex, $email)) 
						{
							if (strlen(str_replace(' ','',$username)) <4 || strlen(str_replace(' ','',$username)) >20) {
								
								echo '<div class="alert alert-danger"><i class="fa fa-remove"></i> Karakter Valid harus diantara 4-20 karakter</div>';
					
							}
							else
							{
									$cek=$this->cek_userc_by($username);
									if ($cek==true) {
										$cek_email=$this->cek_emailc_by($email);
										if ($cek_email==true) {
											$token=$this->token();
											$password=$this->password();
											$this->user->daftarc($maxid,$token,$password);
											$this->send_mail($email,$token,$password,$username);
											echo '<div class="alert alert-success"><i class="fa fa-check"></i> Anda Berhasil Daftar Silahkan Cek email!</div>';
											
										}

									}
							}
						}
						else
						{
							echo '<div class="alert alert-danger"><i class="fa fa-remove"></i> Format email salah!</div>';
							
						}		
					break;	
				
				default:
					# code...
					break;
			}	
		}
		public function cek_user_by($username)
		{
			
			$data=$this->user->cekUsername($username);
			if ($data->result()!=null) {
				$datac=$this->user->cekUsernamec($username);
				if ($datac!=null) {
					echo '<div class="alert alert-info text-center"><i class="fa fa-info-circle"></i> Ops, <br> Sayang Sekali  "'.$username.'" sudah digunakan</div>';
					//redirect('daftar');
				}
				else
				{
					return true;
				}
			}
			else
			{
				return true;
			}
		}
		public function cek_email_by($email)
		{
			$data=$this->user->cekEmail($email);
			if ($data->result()!=null) {
				echo '<div class="alert alert-info text-center"><i class="fa fa-info-circle"></i> Ops,<br>  Sayang Sekali  "'.$email.'" sudah digunakan</div>';
				//redirect('daftar');
			}
			else
			{
				return true;
			}
		}

		//contributor
		public function cek_userc_by($username)
		{
			
			$data=$this->user->cekUsernamec($username);
			if ($data->result()!=null) {
				echo '<div class="alert alert-info text-center"><i class="fa fa-info-circle"></i> Ops, <br> Sayang Sekali  "'.$username.'" sudah digunakan</div>';
				//redirect('daftar');
			}
			else
			{
				return true;
			}
		}
		public function cek_emailc_by($email)
		{
			$data=$this->user->cekEmailc($email);
			if ($data->result()!=null) {
				echo '<div class="alert alert-info text-center"><i class="fa fa-info-circle"></i> Ops,<br>  Sayang Sekali  "'.$email.'" sudah digunakan</div>';
				//redirect('daftar');
			}
			else
			{
				return true;
			}
		}


		public function cekBandlist($username)
		{
			  $banlist = ARRAY (
			                    "insert", "select", "update","where","delete", "distinct", "having", "truncate", "replace",
			                    "handler", "like", " as ", "or ", "procedure", "limit", "order by", "group by", "asc", "desc"
			            );
				if (in_array($username, $banlist))
				{	
					$this->session->set_flashdata('pesan','<div class="alert alert-danger"><i class="fa fa-remove"></i> Ops, Anda Mencoba Akses iIegal DISI</div>');
					redirect ('daftar');
				}
				else
				{
					$regex=$this->regex($username);
					if ($regex==true) {
						return true;
					}
					else
					{
						$this->session->set_flashdata('pesan','<div class="alert alert-danger"><i class="fa fa-remove"></i> Ops, Anda Mencoba Akses iIegal</div>');
						redirect ('daftar');
					}

				}


		}
		public function regex()
		{
			$username='ADR43=';
			$test=preg_match("/[^A-Za-z\d]/", $username);
			if ($test) 
			{
				echo "COEG";//return true;
			}
			else
			{
				echo "coeg";//return false;
			}
		}
	}