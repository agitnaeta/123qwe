<?php 
	/**
	* 
	*/
	class Image extends Ci_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('dataimage');
			$this->load->model('datacontributor');
			$this->load->model('datamember');
			$this->load->model('datadownload'); $this->load->helper('form');

			
			
		}
		function cekSession()
		{
			$contributor=$this->session->userdata('contributor');
			$member=$this->session->userdata('member');
			if ($contributor==null) {
				$session=$member;
			}
			else
			{
				$session=$contributor;
			}

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
						
						return   $data['link']='<a href="'.base_url("member").'">('.$user.') Panel</a>';
						
					}
					
				}
				else
				{
					$contributor=$this->datacontributor->one($memberid);
					foreach ($contributor->result() as $row) 
					{
						$user=$row->username;
						
						 return  $data['link']='<a href="'.base_url("contributor").'">('.$user.') Panel</a>';
						
					}
					
				}
			}
		}
		function index()
		{
			$this->load->view('css');

			$data['image']=$this->dataimage->display();
			$data['link']=$this->cekSession();
			$this->load->view('front/navbar',$data);
			$this->load->view('front/image_list',$data);
		}
		function category($kategory)
		{	
			if ($kategory==null) {
				redirect("image");
			}
			else
			{
					$this->load->view('css');

					$data['image']=$this->dataimage->kategory($kategory);
					$data['link']=$this->cekSession();
					
					$this->load->view('front/navbar',$data);
					$this->load->view('front/image_list',$data);
			}
		}
		function tag($tag)
		{	
			$this->load->view('css');

			$data['image']=$this->dataimage->tag($tag);
			$data['link']=$this->cekSession();
			
			$this->load->view('front/navbar',$data);
			$this->load->view('front/image_list',$data);
		}

		function search()
		{	
			$this->load->view('css');
			$search=$this->input->post('search');
			if (!empty($search)) {
				$data['image']=$this->dataimage->searchDisplay($search);
				$data['link']=$this->cekSession();
				$this->load->view('front/navbar',$data);
				$this->load->view('front/image_list',$data);
			}
			else
			{
				redirect('image');
			}
		}
		public function one()
		{
			$id_foto=$this->input->post('id_foto');
			// $id_foto="20151217072907";
			if (!empty($id_foto)) 
			{
				$image=$this->dataimage->one($id_foto);
				foreach($image->result() as $row)
				{
					$kategori=explode(',',$row->kategori);
					foreach ($kategori as $kat)
					{
						$newKategori[]=" #<a href=".base_url("image/category/".str_replace('/','_',$kat)."").">".$kat."</a>";
					}
					$tags=explode(',',$row->tag);
					foreach  ($tags as $tag)
					{
						$newTags[]=" #<a href=".base_url("image/tag/".str_replace('/','_',$tag)."").">".$tag."</a>";
					}

					$img=getimagesize(base_url("upload/watermark/$row->watermark"));
					$size="Width:".$img[0]."px <br> Height:".$img[1]."px";
					 $data = array(
					 	'judul' => $row->judul, 
					 	'id_foto' => $row->id_foto, 
	                                        'username' => "<a href=".base_url("image/by/$row->username").">$row->username</a>", 
					 	'jumlahDownload' => $this->jumlahDownload($row->id_foto), 
					 	'big' => $row->big, 
					 	'kategori' => $newKategori, 
					 	'tag' => $newTags, 
					 	'size' => $size, 
					 	'image' => "<img src=".base_url("upload/watermark/$row->watermark")." class='img img-responsive'>", 
					 );
					 echo json_encode($data);
				}
			}
			else
			{
				redirect('image');
			}
		}
		public function jumlahDownload($id_foto)
		{
			$jumlah=$this->datadownload->countDownload($id_foto);
			return count($jumlah->result());
		}
		public function cek_session()
		{
			$sM=$this->session->userdata('member');
			$sC=$this->session->userdata('contributor');
			if (!empty($sM)) {
				echo "1";
			}
			else
			{
				if (!empty($sC)) {
					echo "2";
				}
				else
				{
					echo "0";
				}
			}

		}
function testImagic()
{
phpinfo();
}

public function testConvert()
		{
			$im= new Imagick(); 
$im->readImage('/home/pixtoxco/public_html/upload/shoe.eps'); 
$im->setImageFormat("png");
header("Content-Type: image/png");
print_r($im);
		}



                public function epsUpload()
		{
			$this->load->view('upload_eps');
		}
		public function do_epsUpload()
		{
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'eps|gif|jpg|png';
			$config['max_size']	= '99999';
			$config['max_width']  = '99999';
			$config['max_height']  = '99999';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());

				print_r($error);
			}
			else
			{
				echo "OK";
			}
		}
	        public function photo()
		{
			$this->load->view('css');
			$data['image']=$this->dataimage->allphoto();
			$data['link']=$this->cekSession();			
			$this->load->view('front/navbar',$data);
			$this->load->view('front/image_list',$data);
		}
			public function vektor()
		{
			$this->load->view('css');
			$data['image']=$this->dataimage->allVektor();
			$data['link']=$this->cekSession();			
			$this->load->view('front/navbar',$data);
			$this->load->view('front/image_list',$data);
		}

                 public function by($username)
		{
			$this->load->view('css');
			$data['image']=$this->dataimage->by($username);
			$data['link']=$this->cekSession();			
			$this->load->view('front/navbar',$data);
			echo "Image by:  $username";
			$this->load->view('front/image_list',$data);
		}
	}