<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	 function __construct()
	{
		parent::__construct();
		$this->load->model('paket');
		$this->load->model('datastatus');
		$this->load->model('datanilai');
		$this->load->model('datapage');
		$this->load->model('datamember');
		$this->load->model('datacontributor');
		$this->load->model('datakategori');
		$this->load->model('dataimage');
		$this->load->model('user');
		$this->load->helper('kosong');
		$this->load->helper('download');
                $this->load->helper('pregimage');
$this->load->model('databg');

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
        public function gambarBG()
		{
			$bg=array();
			$data=$this->databg->getActive();
			foreach ($data->result() as $row)
			{
				$img=$row->nama_image;
				array_push($bg,$img);
			}
				return $image=json_encode($bg);
		}
	public function index()
	{
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
		

		$data['status']=$this->datastatus->all();
		$data['vektor']=$this->image_vektor();
		$data['photo']=$this->image_photo();
		$data['kategori_photo']=$this->kategori_photo();
		$data['kategori_vektor']=$this->kategori_vektor();

		$jumlah=$this->jumlahAdmin();
		$data['free']=$this->dataimage->freeImage($jumlah);
		
		$story=$this->datapage->story();
		foreach ($story->result() as $row)
		$data['story']=$row->isi;
                $data['bg']=$this->gambarBG();
		$this->load->view('style');
		$this->load->view('css');
		$this->load->view('landing_page',$data);
	}
	
	public function jumlahAdmin()
	{
		$data=$this->user->all();
		return count($data->result());
	}
	public function image_vektor()
	{
			$image=$this->dataimage->allvektorImage();
			return $image;
	}
	public function image_photo()
	{
			$image=$this->dataimage->allphotoImage();
			return $image;
	}
	public function kategori_photo()
	{
		$kategori=$this->datakategori->selectType($type='photo');
		return $kategori;
	}
	public function kategori_vektor()
	{
		$kategori=$this->datakategori->selectType($type='vektor');
		return $kategori;
	}
	public function getFreeImage()
	{
			$data['free']=$this->dataimage->freeImage();
			$this->load->view('back/tabel_freeImage',$data);
	}
	public function downloadFree($big)
	{
		$member=$this->session->userdata('member');
		$contributor=$this->session->userdata('contributor');
		if (empty($member) && empty($contributor)) {
			redirect('login');
		}
		else
		{
			$data = file_get_contents("./upload/big/$big"); // Read the file's contents
			$name = $big;
			force_download($name, $data);
		}
		
	}
	

}
