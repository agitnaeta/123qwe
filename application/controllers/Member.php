<?php 
	/**
	* 
	*/
	class Member extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$session=$this->session->userdata('member');
			if (!empty($session)) {
				$this->load->model('datamember');
				$this->load->model('dataterm');
				$this->load->model('datacontributor');
				$this->load->model('datakonfirmasi');
				$this->load->model('datadeposit');
				$this->load->model('databank');
				$this->load->model('dataimage');
				$this->load->model('datapaket');
				$this->load->model('datadownload');
				$this->load->model('datainvoice');
				$this->load->helper('kosong');
				$this->load->helper('dateindo');
				$this->load->helper('yesno');
				$this->load->helper('rupiah');
				$this->load->helper('download');
			}
			else
			{
				redirect('login');
			}

		}
		public function index()
		{
			$session=$this->session->userdata('member');
			$memberid=$session['memberid'];
			$data['member']=$this->datamember->one($memberid);
			$this->load->view('css');
			$this->load->view('member/nav',$data);
			$this->load->view('member/panel',$data);
			
		}

function getSession(){
$session=$this->session->userdata('member');
return $session;
}
		public function profil()
		{
			$session=$this->session->userdata('member');
			$memberid=$session['memberid'];
			$data['member']=$this->datamember->one($memberid);
			
			$this->load->view('member/form_profil',$data);
		}
		
		public function updateProfil()
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
				$session=$this->session->userdata('member');
				$memberid=$session['memberid'];
				$this->datamember->updateProfil($memberid,$foto);
				redirect('member');
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$foto=$data['upload_data']['file_name'];
				$session=$this->session->userdata('member');
				$memberid=$session['memberid'];
				$this->datamember->updateProfil($memberid,$foto);
				redirect('member');
			}

			
		}
		public function changePassword()
		{
			$this->load->view('member/form_changePassword');

		}
		public function updatePassword()
		{
			$session=$this->session->userdata('member');
			$memberid=$session['memberid'];
			$this->datamember->updatePassword($memberid);
			echo "<div class='alert alert-success text-center'> Berhasil Disimpan</div>";
		}
		public function detail()
		{
			$session=$this->session->userdata('member');
			$memberid=$session['memberid'];
			$data['invoice']=$this->datainvoice->myInvoice($memberid);
			$this->load->view('member/detail',$data);
		}
		public function payment()
		{
			$this->load->view('member/page_payment');

		}
		public function konfirmasi()
		{
			$data['bank']=$this->databank->all();
			$this->load->view('member/form_konfirmasi',$data);
		}

		public function imageList()
		{
			$data['image']=$this->dataimage->acc();
			$this->load->view('member/image_list',$data);
		}
		public function beContributor()
		{
			$session=$this->session->userdata('member');
			$memberid=$session['memberid'];
			$member=$this->datamember->one($memberid);
			foreach ($member->result() as $row)
			
				$date=date('Y-m-d');
			
				$data = array(
					'username' =>$row->username,
					'password' =>$row->password,
					'email' =>$row->email,
					'foto' =>$row->foto,
					'tanggal_lahir' =>$row->tanggal_lahir,
					'no_identitas' =>$row->no_identitas,
					'paket' =>$row->paket,
					'alamat' =>$row->alamat,
					'status' =>'C',
					'app_status' =>2,
					'trusted' =>0,
					'memberid' =>trim($this->get_max_contributor()),
					'tanggal_daftar' =>$date,
				 );

				$dtoken = array(
				'memberid' =>trim($this->get_max_contributor()),
				'token' =>$this->token(),
				'password' =>$row->password,
				'status' =>'1',
				);
			
			 $newMemberId=$this->get_max_contributor();
			 $this->session->unset_userdata('contributor');
			 $this->session->unset_userdata('first_login');
			 $this->session->unset_userdata('member');
			 $this->session->set_userdata('contributor',$data);
			 $this->session->set_userdata('first_login',$dtoken);
			 // print_r($this->session->userdata('contributor'));
			 // Deposit Dan Invoice
			 $this->datainvoice->updateMigrasi($memberid,$newMemberId);
			 $this->datadeposit->updateMigrasi($memberid,$newMemberId);
			 

			 $this->datamember->beContributor($data,$dtoken);
			 $this->datamember->deleteMigrate($memberid);
			 redirect('contributor');
		}
		public function image_vektor()
		{
				$data['image']=$this->dataimage->allvektorImage();
				$this->load->view('member/image_list',$data);
		}
		public function image_photo()
		{
				$data['image']=$this->dataimage->allphotoImage();
				$this->load->view('member/image_list',$data);
		}
		public function get_max_contributor()
		{
			return  $max=$this->datacontributor->maxid();
		}
		public function token()
		{
			$token=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',15)),0,15);
			return $token;
		}



		#Paket 
		public function page_paket()
		{
			$data['paket']=$this->datapaket->all();
			$this->load->view('member/page_paket',$data);
		}
		public function getDataPaket()
		{
			
			$data=$this->datapaket->one();
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
		public function beli_paket()
		{
			
			$session=$this->session->userdata('member');
			$memberid=$session['memberid'];
			// Cek Kode Paket
			$kode_paket=$this->input->post('kode_paket');
			$paket=$this->datapaket->one(trim($kode_paket));
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
		public function sendMailInvoices($data)
		{
			$data['data']=$data;
			$data['bank']=$this->databank->all();
			$this->load->view('member/detail_pemesanan',$data);
		}


//ini
public function createInvoice($data)
		{
				$session=$this->getSession();
				$email=$session['email'];
			 	$dataPemesanan['data']=$data;
				$dataPemesanan['bank']=$this->databank->all();
				$no_invoice=$data['no_invoice'];
				$invoice=$this->load->view('member/detail_pemesananEmail',$dataPemesanan,TRUE);
				$this->sendMailInvoice($invoice,$email,$no_invoice);
				$this->load->view('member/detail_pemesanan',$data);

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
//LOL
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
			$session=$this->session->userdata('member');
			$memberid=$session['memberid'];
			$myInvoice=$this->datainvoice->one($no_invoice);

			if ($myInvoice->result()==null) 
			{
				redirect('member');
			}
			else
			{
				foreach ($myInvoice->result() as $row)
				{
					
					if($memberid!=$row->memberid)
					{
						redirect('member');
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
		public function getNoInvoice()
		{
			return $this->datainvoice->no_invoice();
		}

		#konfirmasi
		public function page_konfirmasi()
		{
			$session=$this->session->userdata('member');
			$memberid=$session['memberid'];
			$data['invoice']=$this->datainvoice->myInvoice($memberid);
			$data['bank']=$this->databank->all();
			$this->load->view('member/page_konfirmasi',$data);
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
                                echo "Success";
				
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$bukti=$data['upload_data']['file_name'];
				$this->datakonfirmasi->insert($bukti);
				echo "Success";
			}
		}
		public function getDataDeposit()
		{
			$session=$this->session->userdata('member');
			$memberid=$session['memberid'];
			$member=$this->datadeposit->userCek($memberid);
			
			foreach ($member->result() as $row)
			{
				$status=yesno($row->status,"Aktif","Pasif");
					$data = array(
						'tanggal_expired' => dateindo($row->tanggal_expired), 
						'sisa_download' => ($row->sisa_download), 
						'sisa_deposit' => rupiah($row->sisa_deposit), 
						'tanggal_deposit' => dateindo($row->tanggal_deposit),  
						'status' => $status,  
						);
					echo json_encode($data);
			}
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
			$session=$this->session->userdata('member');
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
                                        'earning' => $this->earning() 
					);
				$this->datadownload->insert($download);

				echo "<a target='__blank' href=".base_url("member/downloadImage/$link")."> Download </a>";
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
		public function getTerm()
		{
			$term=$this->dataterm->all();
			foreach ($term->result() as $row)
			{
				echo $row->term;
			}
		}
		public function search_image()
		{
			$search=$this->input->post('search');
			$data['image']=$this->dataimage->searchDisplay($search);
			$this->load->view('member/image_list',$data);		
		}
		public function catalog()
		{
			$this->load->view('member/catalog');
		}	
	}
