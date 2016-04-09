<?php 
	/**
	* 
	*/
	class Faq extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('datapage');
		}
		public function index()
		{
			$data['page']=$this->datapage->faq();	
			$this->load->view('css');
			$this->load->view('front/page',$data);
		}
		public function curl()
		{   
		       $ch = curl_init("www.portal.qwords.com/orderdomain.php?action=showDomainsFromCategory&catid=5");
		        curl_setopt($ch, CURLOPT_HEADER, 0);
		        curl_setopt($ch, CURLOPT_POST, 1);
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		        $output = curl_exec($ch);       
		        curl_close($ch);
		        echo $output;
		}
	}