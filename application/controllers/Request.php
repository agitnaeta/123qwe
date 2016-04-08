<?php 
	/**
	* 
	*/
	class Request extends Ci_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper(array('captcha','url'));
			$this->load->helper('dateindo');
			$this->load->model('datareq');
			$this->load->model('datacontributor');
			$this->load->model('datamember');
		}
		public function cekSession()
		{
			$session=$this->session->userdata('contributor');
			if ($session==null) 
			{
				$data['link']= '<a href="'.base_url("login").'" ><i class="fa fa-sign-in"></i> Sign In</a>';;
			}
			else
			{
				$memberid=$session['memberid'];
				if (substr($session['memberid'],0,1)=='M') 
				{
					$member=$this->datamember->one($memberid);
					foreach ($member->result() as $row) 
					{
						$user=$row->username;
						
						return  $data['link']='<a href="'.base_url("member").'">('.$user.') Panel</a>';
						
					}
					
				}
				else
				{
					$contributor=$this->datacontributor->one($memberid);
					foreach ($contributor->result() as $row) 
					{
						$user=$row->username;
						
						 return $data['link']='<a href="'.base_url("contributor").'">('.$user.') Panel</a>';
						
					}
					
				}
			}
		}
		public function index()
		{
			$data['idreq']=$this->getMax();
			$this->load->view('css');	
			$data['link']=$this->cekSession();				
			$this->load->view('front/form_request',$data);
		}
		public function getMax()
		{
			$q=$this->datareq->getMax();
			foreach($q->result() as $row)
			$max=$row->max;

			if ($max=='')
			{
				return   $idreq="REQ.000001";
			}
			else
			{
				$ex=explode(".", $max);
				$next=$ex[1]+1;
				$kembali=sprintf("%'.06d\n", $next);
				$idreq="$ex[0].$kembali";
				return   $idreq;
			}
			
		}
		public function makeReq()
		{
			$tanggal=$this->input->post('tanggal');
			$bulan=$this->input->post('bulan');
			$tahun=$this->input->post('tahun');
			$newdate=$tahun."-".$bulan."-".$tanggal;
			$regid=trim($this->input->post('idreq')," ");
			$data = array(
				'idreq' => $regid, 
				'name' => $this->input->post('name'), 
				'theme' => $this->input->post('theme'), 
				'object' => $this->input->post('object'), 
				'location' => $this->input->post('location'), 
				'model' => $this->input->post('model'), 
				'detail' => $this->input->post('detail'), 
				'phone' => $this->input->post('phone'), 
				'email' => $this->input->post('email'), 
				'budget' => $this->input->post('budget'), 
				'deadline' => $newdate
				);
			$datas = array(
				'idreq' => $regid, 
				'name' => $this->input->post('name'), 
				'theme' => $this->input->post('theme'), 
				'object' => $this->input->post('object'), 
				'location' => $this->input->post('location'), 
				'model' => $this->input->post('model'), 
				'detail' => $this->input->post('detail'), 
				'phone' => $this->input->post('phone'), 
				'email' => $this->input->post('email'), 
				'budget' => $this->input->post('budget'), 
				'deadline' =>$tanggal."-".$bulan."-".$tahun
				);
			
			$this->datareq->insert($data);
			$this->send_mailReq($datas,$type='P');
			echo "Nomor Requset Anda Adalah $regid, Silahkan Disimpan";
		}
		public function makeReqvektor()
		{
			$tanggal=$this->input->post('tanggal');
			$bulan=$this->input->post('bulan');
			$tahun=$this->input->post('tahun');
			$newdate=$tahun."-".$bulan."-".$tanggal;
			$data = array(
				'idreq' => $this->regidVektor(), 
				'name' => $this->input->post('vname'), 
				'category' => $this->input->post('vcategory'), 
				'text' => $this->input->post('vtext'), 
				'tag_line' => $this->input->post('vtagline'), 
				'style' => $this->input->post('vstyle'), 
				'color1' => $this->input->post('color1'), 
				'color2' => $this->input->post('color2'), 
				'color3' => $this->input->post('color3'), 
				'industry' => $this->input->post('vindustry'), 
				'phone' => $this->input->post('vphone'), 
				'detail' => $this->input->post('vdetail'), 
				'email' => $this->input->post('vemail'), 
				'budget' => $this->input->post('budget'), 
				'deadline' => $newdate
				);
			$datas = array(
				'idreq' => $this->regidVektor(), 
				'name' => $this->input->post('vname'), 
				'category' => $this->input->post('vcategory'), 
				'text' => $this->input->post('vtext'), 
				'tag_line' => $this->input->post('vtagline'), 
				'style' => $this->input->post('vstyle'), 
				'color1' => $this->input->post('color1'), 
				'color2' => $this->input->post('color2'), 
				'color3' => $this->input->post('color3'), 
				'industry' => $this->input->post('vindustry'), 
				'phone' => $this->input->post('vphone'), 
				'detail' => $this->input->post('vdetail'), 
				'email' => $this->input->post('vemail'), 
				'budget' => $this->input->post('budget'), 
				'deadline' =>$tanggal."-".$bulan."-".$tahun
				);
			//print_r($data);
			$this->datareq->insertVektor($data);
			$this->send_mailReq($datas,$type='V');
			echo "Nomor Requset Anda Adalah ".$this->regidVektor()." , Silahkan Disimpan";
		}
		public function regidVektor()
		{
			return  $this->datareq->getIDV();
		}
		public function send_mailReq($datas,$type)
		{
			switch ($type) {
				case 'P':
						
						$config=array(
					                    'protocol'=>"smtp",
					                    'smtp_host'=>'mail.pixtox.com',
					                    'smtp_port'=>25,
					                    'smtp_user'=>'admin@pixtox.com',
					                    'smtp_pass'=>'pix29815',
						);
		                $this->load->library('email',$config);
		                $this->email->from('admin@pixtox.com','Pixtox');
		                $this->email->to('verificator@pixtox.com'); 
		                // $this->email->to('agit.naeta@qwords.co.id'); 
		                $this->email->subject("Special Request");
		                $this->email->message("
		                ".$datas['name']." has been make Special Request to Pixtox
		                You need to see this request,
		                Detail 
		                <hr>
		                <p>Theme 	:".$datas['theme'].";</p>
		                <p>Object 	:".$datas['object'].";</p>
		                <p>Location :".$datas['location'].";</p>
		                <p>Model 	:".$datas['model'].";</p>
		                <p>Detail 	:".$datas['detail'].";</p>
		                <p>Email 	:".$datas['email'].";</p>
		                <p>Deadline :".$datas['deadline'].";</p>
		                <p>Budget : Rp.".$datas['budget'].";</p>
		                <hr>

		                Or login here
		                http://pixtox.com/pxadmin
		                and see Special Request menu.
		                "); 
		                $this->email->set_mailtype("html");

		                $this->email->send();

		               	$this->email->print_debugger();
					break;
				case 'V':
					$config=array(
					                    'protocol'=>"smtp",
					                    'smtp_host'=>'mail.pixtox.com',
					                    'smtp_port'=>25,
					                    'smtp_user'=>'admin@pixtox.com',
					                    'smtp_pass'=>'pix29815',
						);
		                $this->load->library('email',$config);
		                $this->email->from('admin@pixtox.com','Pixtox');
		                $this->email->to('verificator@pixtox.com'); 
		                // $this->email->to('agit.naeta@qwords.co.id'); 
		                $this->email->subject("Special Request");
		                $this->email->message("
		                ".$datas['name']." has been make Special Request to Pixtox
		                You need to see this request,
		                Detail 
		                <hr>
		                <p>Category 	:".$datas['category'].";</p>
		                <p>Text 		:".$datas['text'].";</p>
		                <p>Tag line		:".$datas['tag_line'].";</p>
		                <p>Style 		:".$datas['style'].";</p>
		                <p>Industry 	:".$datas['industry'].";</p>
		                <p>Phone 		:".$datas['phone'].";</p>
		                <p>Email 		:".$datas['email'].";</p>
		                <p>Detail 		:".$datas['detail'].";</p>
		                <p>Deadline	:".$datas['deadline'].";</p>
		                <p>Budget : Rp.".$datas['budget'].";</p>
		                <hr>
		                
		                Or login here
		                http://pixtox.com/pxadmin
		                and see Special Request menu.
		                "); 
		                $this->email->set_mailtype("html");

		                $this->email->send();
		               	$this->email->print_debugger();
					break;
				
				default:
						$config=array(
					                    'protocol'=>"smtp",
					                    'smtp_host'=>'mail.pixtox.com',
					                    'smtp_port'=>25,
					                    'smtp_user'=>'admin@pixtox.com',
					                    'smtp_pass'=>'pix29815',
						);
		                $this->load->library('email',$config);
		                $this->email->from('admin@pixtox.com','Pixtox');
		                $this->email->to('verificator@pixtox.com'); 
		                // $this->email->to('agit.naeta@qwords.co.id'); 
		                $this->email->subject("Special Request");
		                $this->email->message("
		                Someone has been make Special Request to Pixtox
		         		   Please Login:
		                http://pixtox.com/pxadmin
		                and see Special Request menu.
		                "); 
		                $this->email->set_mailtype("html");

		                $this->email->send();
		               	$this->email->print_debugger();
					break;
			}
		}

	}