<?php 
	/**
	* 
	*/
	class Home extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('dataterm');
		}
		public function term()
		{
			$data['term']=$this->dataterm->all();
			$this->load->view('css');
			$this->load->view('front/page_term',$data);
		}
		
	}