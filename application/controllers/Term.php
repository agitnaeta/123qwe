<?php
	/**
	* 
	*/
	class Term extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('dataterm');
$this->load->model('datacontributor');
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
			$data['term']=$this->dataterm->all();
			$data['link']=$this->cekSession();
			$this->load->view('css');
			$this->load->view('front/page_term',$data);
		}
	}