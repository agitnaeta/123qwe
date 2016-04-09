<?php 
	/**
	* 
	*/
	class logout extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function index()
		{
			$this->session->unset_userdata('member');
			$this->session->unset_userdata('adminpx');
			$this->session->unset_userdata('contributor');
			redirect(base_url());
		}
	}