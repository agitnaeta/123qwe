<?php
	/**
	* 
	*/
	class Firstlogin extends CI_controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('datafirstlogin');
			$this->load->model('datamember');
			$this->load->model('datacontributor');

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
		public function valid($token)
		{
		
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
			
			$data['token']=$this->datafirstlogin->get($token);
			if ($data['token']->result()==null) {

				redirect('welcome');
			}
			else
			{
				
				
				foreach ($data['token']->result() as $row)
				{
                                        $update=$this->datafirstlogin->update($row->memberid,$token);				
					$memberid=substr($row->memberid,0,1);
					switch ($memberid) 
					{
						case 'C':
								$this->updateUsername($row->memberid,'C');
								$con=$this->datacontributor->one($row->memberid);
								foreach($con->result() as $row)
								{				
									
									$session = array(
									'memberid' =>trim($row->memberid),																	
									'username' =>$row->username,																	
									'app_status' =>$row->app_status,																	
									'foto' =>$row->foto,																	
									'tanggal_login' =>$tanggal, 
                                                                        'email' =>$row->email,
									'jam_login' =>$jam, 
									'browser' =>$device, 
									'ip' =>$ip, 
									);
									$this->session->set_userdata('contributor',$session);
									$session=$this->session->userdata('contributor');
									
								}
								redirect('contributor');
								
							break;
						case 'M':
								$this->updateUsername($row->memberid,'M');
								$datamember=$this->datamember->one($row->memberid);
							         foreach($datamember->result() as $r)
							          $arrSession=array(
									'memberid'=>$r->memberid,
									'username'=>$r->username,
									'no_identitas'=>$r->no_identitas,
									'nama'=>$r->nama,
									'tanggal_lahir'=>$r->tanggal_lahir,
									'tanggal_daftar'=>$r->tanggal_daftar,
									
									'email'=>$r->email,
									);
								
								$this->session->set_userdata('member',$arrSession);
								redirect('member');
							break;
						default:
								redirect('welcome');
							break;
					}
				}
			}
			
		}
		public function login()
		{
			$memberid=$this->input->post('memberid');
			$token=$this->input->post('token');

			echo $status=substr($memberid, 0,1);

			switch ($status) {
				case 'C':

						$validasi=$this->datafirstlogin->cek($memberid,$token);
						$update=$this->datafirstlogin->update($memberid,$token);
						
						foreach ($validasi->result() as $row) {
							$memberid=$row->memberid;
							$this->updateUsername($memberid,'C');
							$datacontributor=$this->datacontributor->one($memberid);
							foreach($datacontributor->result() as $row)
							$arrSession=array(
									'memberid'=>$row->memberid,
									'username'=>$row->username,
									'no_identitas'=>$row->no_identitas,
                                                                         'email' =>$row->email,
									'nama'=>$row->nama,
									'tanggal_lahir'=>$row->tanggal_lahir,
									'tanggal_daftar'=>$row->tanggal_daftar,
									'paket'=>$row->paket,
									'email'=>$row->email,
									);
								
								$this->session->set_userdata('contributor',$arrSession);
								redirect('contributor');
						}
					break;
				case 'M':
						$validasi=$this->datafirstlogin->cek($memberid,$token);
						$update=$this->datafirstlogin->update($memberid,$token);
						foreach ($validasi->result() as $row) {
							$memberid=$row->memberid;
							$this->updateUsername($memberid,'M');
							$datamember=$this->datamember->one($memberid);
							foreach($datamember->result() as $row)
							$arrSession=array(
									'memberid'=>$row->memberid,
									'username'=>$row->username,
									'no_identitas'=>$row->no_identitas,
									'nama'=>$row->nama,
									'tanggal_lahir'=>$row->tanggal_lahir,
									'tanggal_daftar'=>$row->tanggal_daftar,
									'paket'=>$row->paket,
									'email'=>$row->email,
									);
								
								$this->session->set_userdata('member',$arrSession);
								redirect('member');
						}
					break;	
				
				default:
						$this->session->set_flastdata('pesan','<div class="alert alert-danger"> Anda Mencoba Melakukan Ilegal Login!</div>');
						redirect('login');
					break;
			}
		}
		public function updateUsername($memberid,$status)
		{
			switch ($status) {
				case 'C':
					$data=$this->datacontributor->one($memberid);
					foreach ($data->result() as $row){
						$data = array('username' =>preg_replace('/\s+/', '', $row->username));
						$this->datacontributor->updateUsername($memberid,$data);
					}
					return true;
					break;
				case 'M':
					$data=$this->datamember->one($memberid);
					foreach ($data->result() as $row){
						$data = array('username' =>preg_replace('/\s+/', '', $row->username));
						$this->datamember->updateUsername($memberid,$data);
					}
					return true;
					break;
				default:
					return true;
					break;
			}
		}

	}