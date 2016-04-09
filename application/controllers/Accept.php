<?php 
	/**
	* 
	*/
	class Accept extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();	
			

		}

		public function index()
		{
			$session=$this->session->userdata('adminpx');
			if (!empty($session)) 
			{
				$this->load->model('dataadmin');
                                $this->load->model('user');
				$this->load->model('databank');
				$this->load->model('datafile');
				$this->load->model('datapage');
				$this->load->model('dataimage');
				$this->load->model('datanilai');
				$this->load->model('datakonfirmasi');
				$this->load->model('datainvoice');
				$this->load->model('datamember');
				$this->load->model('datastatus');
				$this->load->model('dataterm');
				$this->load->model('datapaket');
				$this->load->model('datacontributor');
				$this->load->model('datareq');
				$this->load->model('datakategori');
				$this->load->model('datadeposit');
				$this->load->library('grocery_CRUD');
				$this->load->helper('dateindo');
				$this->load->helper('yesno');
				$this->page_newImage();
			}
			else
			{
				
				$this->load->view('back/form_login_acc');
			}
		}
		public function page_newImage()
		{
			$admin=$this->user->all();
                        $jumlah_admin=count($admin->result());
			$data['image']=$this->dataimage->newFoto($jumlah_admin);
		 	$this->load->view('css');
		 	$this->load->view('back/page_newImage',$data);
		}

	}