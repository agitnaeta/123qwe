<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Stock Photos and Vectors | Pixtox</title>
    <link rel="icon" type="image/png" href="<?=base_url();?>assets/img/ico.png"/>
   	<meta name="description" content="Million Image From The World">
    <meta name="author" content="Pixtox.Com">
    <link rel="stylesheet" href="<?=base_url();?>assets/fa/css/font-awesome.min.css">
    <link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/testimonial.css" rel="stylesheet">

    <!--owl-->
    <link rel="stylesheet" type="text/css" href="<?=base_url("assets/owl/owl.carousel.css");?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url("assets/owl/owl.theme.css");?>">

    <style type="text/css">

    </style>
	<style type="text/css">
	html {
	  overflow: hidden;
	  height: 100%;
	}
	body {
	  overflow: auto;
	  height: 100%;
	}

	/* unset bs3 setting */
	.modal-open {
	 overflow: auto; 
	}
	.head
	{
		background-color: #1C1817;
		padding-top: 50px;
		padding-bottom: 10%;
	}
	.padlef
	{
		padding-right: 60px;
	}
	.padrig{
		padding-left: 50px;
		padding-top: 10px;
	}
	.a
	{
		background-color: #1C1817;
		color: #fff;
	}
	.white
	{
		color:#fff;
	}
	.intro
	{
        zoom:115%;
		padding-top:160px;
		background-color: #222;
		/*background-image: url('<?=base_url();?>assets/img/kota8.jpg');*/
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		padding-bottom: 25%;


	}
	.shaddow
	{
		box-shadow: inset 0 30px 30px -30px rgba(0, 0, 0, 0.5);
	}
	.content
	{
		padding-top: 100px;
		background-color: #fff;
		padding-bottom: 100px;
	}
	.pricing
	{
		background-color: #222;
		padding-left: 300px;
		padding-top: 20px;
		color: #dddddd;
		padding-bottom: 30px;
	}
	.form{
		padding-top: 100px;
			}
	.form-color{
		padding: 20px;
		color: #fff;
	}
	.join{
		background-color: #333;
		padding-bottom: 100px;
		padding-top: 50px;
		background-image:url('<?=base_url();?>assets/img/icoopa.png'); 
		background-repeat: no-repeat;
		position: top;
		background opacity: 0.5;
	}
	.round
	{
	border-raduis:50px;

	}
	.hover:focus
	{
		background-color: #FF8700;
	}

	body { font-family: 'FuturaBT-Medium' !important; }
	h1, h2, h3, h4 { font-weight: normal; }
	</style>
 </head>
<body>
	<section class='intro'>
		<div class="container">
				<div class="row">
					<div class="col-md-12">
						
						<?php include 'navbar.php';?>
					</div>
				</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<form method="post" action="<?php echo base_url("image/search");?>">
					<div class="input-group">
				      <input name="search" type="text" class="form-control input-lg" placeholder="Search for...">
				      <span class="input-group-btn">
				        <button class="btn btn-warning input-lg" type="submit"><i class='fa fa-search'></i> Cari </button>
				      </span>
				    </div>
				    </form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</section>
	<section id='promotion'>
		<div class="container">
			<div class="row">
				<h2 class="text-center">Info</h2>
				<hr>
				<div class="col-md-6">
					<div class="text-justify">
						<div class="img img-repsonsive">
							<a href="">
							<img width="600" class="img img-responsive" src="<?php echo base_url("upload/promote/promotion.jpg"); ?>">
							</a>
						</div>
						<br>
					</div>
				</div>
				<div class="col-md-6">
					<div class="text-justify">
						<div class="img img-repsonsive">
						<a href="">
							<img width="600" class="img img-responsive" src="<?php echo base_url("upload/promote/promotion.jpg"); ?>">
						</a>
						</div>
						<br>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class='shaddow'>
		<div class="container">
				<div class="row">
				<div class="col-md-12">
				<h1 class="text-center">Million Image From The World</h1>
					<div class="tabbable" id="tabs-486289">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#panel-818320" data-toggle="tab">Stock Photo</a>
							</li>
							<li>
								<a href="#panel-327968" data-toggle="tab">Vectors | Pixtox</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="panel-818320">
								<div id="demo">
						        <div class="container">
						          <div class="row">
						            <div class="span12">
						            <?php kosong($photo->result());?>
						              <div id="owl-demo" class="owl-carousel">
						              	
						             	<?php foreach ($photo->result() as $row):?>
						             	<div class="panel panel-body">
						             		<a class="detail_img" id="modal-detail" data-id='<?=$row->id_foto;?>' href="#modal-container-detail" role="button" class="btn" data-toggle="modal">
							                <div class="item">
							                	<img class="lazyOwl" data-src="<?=base_url("upload/mini/$row->mini");?>" alt="Pixtox Image">
							                </div>
							                </a>
						             	</div>
						                <?php endforeach;?>
						              </div>
						            </div>
						          </div>
						        </div>
				   			 </div>
				   			<div class="col-md-4"></div>
							<div class="col-md-8">
								<h1 class="text-muted">Photo Category</h1>
								<div class="panel text-muted">
									<div class="panel-body">
										<div class="col-md-12">
											<ul class="list-inline">
												<?php kosong($kategori_photo->result());?>
												<?php foreach ($kategori_photo->result() as $row):?>
												<li>#<a href="<?=base_url("image/category/".str_replace('/','_',$row->nama)."");?>"><?=$row->nama;?> </a></li>
												<?php endforeach;?>
											</ul>
										</div>
									</div>
								</div>
							</div>
							</div>

							<div class="tab-pane" id="panel-327968">
								<div id="demo">
						        <div class="container">
						          <div class="row">
						            <div class="span12">
						            	<?php kosong($vektor->result());?>
						              	<div id="owl-demo2" class="owl-carousel">						              	
						             	<?php foreach ($vektor->result() as $row):?>
						             		<div class="panel panel-body">
						             			<a class="detail_img" id="modal-detail" data-id='<?=$row->id_foto;?>' href="#modal-container-detail" role="button" class="btn" data-toggle="modal">
								                <div class="item">
								                	<img class="lazyOwl" data-src="<?=base_url("upload/mini/$row->mini");?>" alt="Pixtox Image">
								                </div>
								                </a>		
						             		</div>				              	 
						                <?php endforeach;?> 
						                </div>      
						            </div>
						          </div>
						        </div>
						    </div>
						    <div class="col-md-4"></div>
							<div class="col-md-8">
								<h1 class="text-muted">Vektor Category</h1>
								<div class="panel text-muted">
									<div class="panel-body">
										<ul class="list-inline">
												<?php kosong($kategori_vektor->result());?>
												<?php foreach ($kategori_vektor->result() as $row):?>
												<li>#<a href="<?=base_url("image/category/".str_replace('/','_',$row->nama)."");?>"><?=$row->nama;?> </a></li>
												<?php endforeach;?>
											</ul>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
		</div>
		</div>
	</section>
	<section class="shaddow">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center"> Free Image Of The Weeks</h2>
				<hr>
				<center>
					<?php echo kosong($free->result());?>
				</center>
				<div id="owl-demo3" class="owl-carousel">						              	
				<?php foreach ($free->result() as $row):?>
			    <div class="item">
			    	<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
						<?=$row->judul;?>
						</div>
						<div class="panel-body">
							<img class="img img-responsive" src="<?=base_url("upload/mini/$row->mini");?>">
						</div>
						<div class="panel-footer">
							<a class="btn btn-block " href="<?=base_url("welcome/downloadFree/$row->big");?>">
								<i class='fa fa-download'></i>
							</a>
						</div>
					</div>
					</div>
			    </div>						              	 
					<?php endforeach;?> 
				</div>  
				
				
			</div>
		</div>
	</section>
	<section class='join'>
		<div class="container">
			<div class="col-md-8">
				<h1 class="white">Pixtox.com <br> <small>Story</small></h1>
				
				<div class="text-justify white">
					<?=$story;?>
				</div>
			</div>
			<form method="post" action="<?=base_url('daftar/create_account');?>">
			<div class="col-md-4">
				<div class=" white">
					<div class="">
						<h3><i class='fa fa-pencil'></i> Daftar</h3>
						<?=$this->session->flashdata('pesan');?>
					</div>
					<div class="">
						
						<label class="white">Username</label>
						
						<div id="st-username" class="input-group">
						<span class="input-group-addon"><i class='fa fa-user'></i></span>
					    <input required name="username" value="" id="username" type="text" class="form-control" type="text" placeholder='Username'>    
						<p id='span'></p>
						</div>

						<br>
						<label class="white">Email</label>
							<div id="st-email" class="input-group">
							<span class="input-group-addon"><i class='fa fa-envelope'></i></span>
						    <input required name="email" value="" id="email" type="email" class="form-control" type="text" placeholder='Email'>    
							</div>
							<br>
							<input type="hidden" name="status" value="M">
							<input required type="checkbox"> Dengan ini menyetujui <a class="white" href="<?=base_url("term");?>"> Syarat & Ketentuan</a> Pixtox.com
							<br>
							<div class="pull-right">
							<button class="btn btn-warning">
								<i class='fa fa-pencil'></i> Daftar
							</button>
						</div> 
					</div>
				</div>
			</div>
			</form>
		</div>
	</section>
	
<section class='footer' id='footer'>
	<div class="container-fluid">
	<div class="col-md-1"></div>
		<div class="col-md-2">
			<h3>
				Company
			</h3>
			<ul class="nav ">
				<li>PT Gudang Gambar Indonesia</li>
				
			</ul>
			
		</div>
		<div class="col-md-2">
			<h3>
				About Us
			</h3>
			<ul class="nav ">
				<li><a class="white" href="<?php echo base_url("page/story");?>"><i class='fa fa-check'></i> Story</a></li>
				<li><a class="white" href="<?php echo base_url("page/career");?>"><i class='fa fa-check'></i> Career</a></li>
				<li><a class="white" href="<?php echo base_url("page/faq");?>"><i class='fa fa-check'></i> FAQ</a></li>
			</ul>
			
		</div>
		<div class="col-md-2">
			<h3>
				Career
			</h3>
			<ul class="nav">	
				<li>
					<a class="white" href=""><i class='fa fa-envelope'></i> hrd@pixtox.com </a>
				</li>
			</ul>
		</div>
		<div class="col-md-2">
			<h3>
				Event & Promotion
			</h3>
			<ul class="nav">
				<li><a class="white" href="https://www.facebook.com/Pixtoxcom-1495871197396392/?fref=ts"><i class='fa fa-facebook'></i> pixtox.com</a></li>
				
				<li><a class="white" href="http://www.google.com/pixtox"><i class='fa fa-google'></i> +Pixtox</a></li>
				<li><a class="white" href="http://www.instagram.com/pixtox"><i class='fa fa-instagram'></i> @pixtox</a></li>
			</ul>
			
		</div>
		<div class="col-md-2">
			<h3>
				Support
			</h3>
			<ul class="nav">	
				<li>
					<a class="white" href=""><i class='fa fa-envelope'></i> info@pixtox.com </a>
				</li>
			</ul>
		</div>
		<div class="col-md-1">
	</div>	
	</div>
</div>
	</div>
</section>
<section id="Detail_Gambar">
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			
			
			<div class="modal fade" id="modal-container-detail" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								×
							</button>
							<h4 class="modal-title" id="myModalLabel">
								
							</h4>
						</div>
						<div id="modal-body" class="modal-body">
							
						</div>
						<div id="modal-footer" class="modal-footer">
							 
							<button type="button" class="btn btn-default" data-dismiss="modal">
								Close
							</button> 
							<a type="button"  class="download btn btn-warning">
								Generate Link Donwload
							</a>
						</div>
					</div>
					
				</div>
				
			</div>
			
		</div>
	</div>
</div>
</section>
</section>
    <script src="<?=base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/js/scripts.js"></script>
    <!--owl-->

<script type="text/javascript" src="<?=base_url("assets/owl/owl.carousel.min.js");?>"></script>
<script type="text/javascript">
	$('.detail_img').click(function  () {
			$('.download').show()
			var id_foto=$(this).attr('data-id');
				$.post('<?php echo base_url("image/one");?>',{id_foto:id_foto},function  (data) {
					var obj=JSON.parse(data)
					$('#myModalLabel').html(obj.judul);
					$('#modal-body').html(obj.image);
					$('.download').attr( "id", obj.id_foto);
				});
			});

	$('.download').click(function  () {
		$(this).hide();
		var id_foto=$(this).attr('id_foto');
		$.post('<?php echo base_url("image/cek_session");?>',{id_foto:id_foto},function  (data) {
			// member 1 contributor 2 other 0
			if (data==1) {
				$('.beli').hide()
				$('.download').click(function  () {
					var id_foto=$(this).attr('id');
					$.post('<?php echo base_url("member/download");?>',{id_foto:id_foto},function  (data) {
						if(data!=0)
						{
							$('.modal-body').html(data);
						}
						else
						{
							$('.modal-body').addClass('text-center')
							$('.modal-body').html('Sisa download anda habis, silahkan beli paket terlebih dahulu <br> <a href="pricing" class="btn btn-warning"><i class="fa fa-shopping-cart"></i> Beli Sekarang</a>')
							$('.download').remove()
							$('.beli').show()
						}
					})
				})

				$('.beli').click(function  () {
					$('#konten').load('<?php echo base_url("member/page_paket");?>')
				})

			}
			else if (data==2) {
				$('.beli').hide()
				$('.download').click(function  () {
					var id_foto=$(this).attr('id');
					$.post('<?php echo base_url("contributor/download");?>',{id_foto:id_foto},function  (data) {
						if(data!=0)
						{
							$('.modal-body').html(data);
							$('.modal-body').addClass('text-center');
						}
						else
						{
							$('.modal-body').addClass('text-center')
							$('.modal-body').html('Sisa download anda habis, silahkan beli paket terlebih dahulu <br> <a href="pricing" class="btn btn-warning"><i class="fa fa-shopping-cart"></i> Beli Sekarang</a>')
							$('.download').remove()
							$('.beli').show()
						}
					})
				})

				$('.beli').click(function  () {
					$('#konten').load('<?php echo base_url("contributor/page_paket");?>')
				})
			}
			else if (data==0)
			{
				$('#modal-body').html('<p class="text-center">Silahkan Login terlebih dahulu <br> <a href="contributor" class="btn btn-warning"><i class="fa fa-key"></i> Login</a></p>');
			}
		})
	})

</script>

   <style>
    #owl-demo .item{
        margin: 3px;
    }
    #owl-demo .item img{
        display: inline-tab;
        width: 100%;
        height: auto;
    }
  
    #owl-demo2 .item img{
      	display: block;
	  width: 100%;
	  height: auto;

    }
     #owl-demo3 .item img{
      	display: block;
	  width: 100%;
	  height: auto;

    }
    </style>


    <script>
    $(document).ready(function() {

      $("#owl-demo").owlCarousel({
        items : 3,
        navigation:true,
        lazyLoad : true,
      navigationText: [
      "<i class='fa fa-backward'></i>",
      "<i class='fa fa-forward'></i>"
      ],
        
      });
       $("#owl-demo2").owlCarousel({
        items : 3, navigation:true,
        lazyLoad : true,
        navigationText: [
      "<i class='fa fa-backward'></i>",
      "<i class='fa fa-forward'></i>"
      ],
        
      });
       $("#owl-demo3").owlCarousel({
        items : 3, navigation:true,
        lazyLoad : true,
        navigationText: [
      "<i class='fa fa-backward'></i>",
      "<i class='fa fa-forward'></i>"
      ],
        
      });

    });
    </script>
<script type="text/javascript">
	$(document).ready(function  () {
		
		$('#username').keyup(function  () {

			var isi=$(this).val()
			var username=$(this).val()
			if (isi.length>4) 
			{
				$('#st-username').removeClass('has-error');
				$("#pesan").remove();	
				$('#st-username').addClass('has-success');
			}
			else if(isi.length<4 && isi.length>0)
			{
				$('#st-username').removeClass('has-error');
				
				$("#pesan").remove();	
				$('#st-username').addClass('has-error').after("<p id='pesan' class='text-danger pesan pull-right'>Masukan Lebih dari 4 Karakter</p>");
			}
			else if (isi.length<1) 
			{
				$('#st-username').addClass('has-default');
			};			
		});

		$('#username').blur(function  () {
			var isi=$(this).val()
			if (isi.length<4) {
				$('#st-username').removeClass('has-error');
				$("#pesan").remove();	
				$('#st-username').addClass('has-error').after("<p id='pesan' class='text-danger pesan pull-right'>Masukan Lebih dari 4 Karakter</p>");
			};
		})

		$('#email').keyup(function  () {
			filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

			if (filter.test($(this).val())) {
				$('#st-email').removeClass('has-error');
				
				$("#pesan").remove();	
				$('#st-email').addClass('has-success');
			}
			else
				{
					$('#st-email').removeClass('has-error');
					$("#pesan").remove();	
					$('#st-email').addClass('has-error').after("<p id='pesan' class='text-danger pesan pull-right'>Email Salah</p>");
				};
		})

		$('#email').blur(function  () {
			filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

			if (filter.test($(this).val())) {
				$('#st-email').removeClass('has-error');
				
				$("#pesan").remove();	
				$('#st-email').addClass('has-success');
			}
			else
				{
					$('#st-email').removeClass('has-error');
					$("#pesan").remove();	
					$('#st-email').addClass('has-error').after("<p id='pesan' class='text-danger pesan pull-right'>Email Salah</p>");
				};
		})

		$('#password').keyup(function  () {

			var isi=$(this).val()
			if (isi.length>6) 
			{
				$('#st-password').removeClass('has-error');
				
				$("#pesan").remove();	
				$('#st-password').addClass('has-success');
			}
			else if(isi.length<6 && isi.length>0)
			{
				$('#st-password').removeClass('has-error');
				
				$("#pesan").remove();	
				$('#st-password').addClass('has-error').after("<p id='pesan' class='text-danger pesan pull-right'>Masukan Lebih dari 6 Karakter</p>");
			}
			else if (isi.length<1) 
			{
				$('#st-password').addClass('has-default');
			};			
		});

		$('#password').blur(function  () {
			var isi=$(this).val()
			if (isi.length<6) {
				$('#st-password').removeClass('has-error');
				$("#pesan").remove();	
				$('#st-password').addClass('has-error').after("<p id='pesan' class='text-danger pesan pull-right'>Masukan Lebih dari 6 Karakter</p>");
			};
		})



		
	})
</script>
<script type="text/javascript">
	$(document).ready(function  () {
		var images = ['ant.jpg', 'bee.jpg', 'caterpilar1.jpg', 'caterpilar2.jpg','cp3.jpg'];
		 $('.intro').css({
		 	'background-image': 'url(<?php echo base_url("assets/img/");?>/' + images[Math.floor(Math.random() *      images.length)] + ')',

		 });
	})
</script>

</body>


