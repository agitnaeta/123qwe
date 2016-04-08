<!DOCTYPE html>
<html>
<head>
	<title>Pixtox | Daftar</title>
               <link rel="icon" type="image/png" href="<?=base_url();?>assets/img/ico.png"/>
		<link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
	 <link rel="stylesheet" href="<?=base_url();?>assets/fa/css/font-awesome.min.css">
	 <style type="text/css">
	 .login
	 {
	 	padding-top: 7%;
	 	background-color: #333;
	 	padding-bottom: 20%;
	 }
	 img{
	 	padding-bottom: 30px;
	 	display: block;
	 	margin-left: auto;
	 	margin-right: auto;
	 }
	 .daftar
	 {
	 	background-color: #333;
	 	padding-top: 5%;
	 }
	 .row
	 {
	 	padding-top: 10px;
	 }
	 body
	 {
	 	background-color: #333;
	 }
	
	 </style>
</head>
<body>
<section id="daftar" class='daftar'>
	<div class="container login">
		<div class="row">
		<div class="text-center">
			<!-- <div class='text-center'>				
			<img class='img round' width="150" height="auto" src="<?=base_url();?>assets/img/pixtox-png.png">
			<br>
			</div> -->	
			</div>
			<div class="col-md-8">
				<div class="panel">
					
					<div class="panel-body">
					
					<?php foreach ($paket->result() as $row):?>
					<div class="col-md-4">
						<div class="panel panel-primary">
						<div class="panel-heading">
							<h2 class="text-center"><?=$row->nama_paket;?></h2>
						</div>
						<div class="panel-body">
							<img width="50px" class="img img-responsive" src="<?php echo base_url("assets/img/paket/$row->gambar");?>">
							<h4 class="text-center">IDR <?=$row->harga;?></h4>
						</div>
						<div class="panel-footer">
						<a href="<?=base_url('login');?>" class="btn btn-warning btn-block"><i class="fa fa-shopping-cart"></i> Login To Buy</a>
						</div>
						</div>
					</div>
					<?php endforeach;?>
							
					</div>
				</div>
			</div>
			<form id="form_daftar" method="post" action="<?=base_url('daftar/create_account');?>">
			<div class="col-md-4">
				<div class="panel">
					<div class="panel-heading">
						<h3><i class='fa fa-pencil'></i> Daftar</h3>
						<?=$this->session->flashdata('pesan');?>
					</div>
					<div class="panel-body">
						
						<label>Username</label>
						
						<div id="st-username" class="input-group">
						<span class="input-group-addon"><i class='fa fa-user'></i></span>
					    <input required name="username" value="" id="username" type="text" class="form-control" type="text" placeholder='Username'>    
						<p id='span'></p>
						</div>

						<br>
						<label>Email</label>
							<div id="st-email" class="input-group">
							<span class="input-group-addon"><i class='fa fa-envelope'></i></span>
						    <input required name="email" value="" id="email" type="email" class="form-control" type="text" placeholder='Email'>    
							</div>
							<br>
						    <input type="hidden" name="status" value="M"><br>
						<div class="pull-right">
							
							<a  class="btn btn-warning btn-block" data-toggle="modal" data-target="#myModal">
								<i class='fa fa-pencil'></i> Daftar
							</a>
							
							<div id="myModal" class="modal fade" role="dialog">
								  <div class="modal-dialog modal-sm">

								    <!-- Modal content-->
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">Pendaftaran</h4>
								      </div>
								      <div class="modal-body text-center">
								        <p id="syaratKetentuan">
								        	 Dengan daftar anda menyetujui <br><u><a  href="<?=base_url("term");?>">Syarat & Ketentuan</a></u> <br>Pixtox.com
								        </p>
								      </div>
								      <div class="modal-footer">
								      <button type="submit"  class="btn btn-warning">
											<i class='fa fa-pencil'></i> Daftar
										</button>
								        <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
								      </div>
								    </div>

								  </div>
								</div>
						</div> 
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</section>
<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function  () {
	
		$('#myModal').click(function  () {
			$('syaratKetentuan').html(" Dengan daftar anda menyetujui <br><u><a  href="<?=base_url("term");?>">Syarat & Ketentuan</a></u> <br>Pixtox.com")
		})
		
	
		
		$('#username').keyup(function  () {

			var isi=$(this).val()
			var username=$(this).val()
			if (isi.length>4) 
			{
				$('#st-username').removeClass('has-error');
				$("p").remove();	
				$('#st-username').addClass('has-success');
			}
			else if(isi.length<4 && isi.length>0)
			{
				$('#st-username').removeClass('has-error');
				
				$("p").remove();	
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
				$("p").remove();	
				$('#st-username').addClass('has-error').after("<p id='pesan' class='text-danger pesan pull-right'>Masukan Lebih dari 4 Karakter</p>");
			};
		})

		$('#email').keyup(function  () {
			filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

			if (filter.test($(this).val())) {
				$('#st-email').removeClass('has-error');
				
				$("p").remove();	
				$('#st-email').addClass('has-success');
			}
			else
				{
					$('#st-email').removeClass('has-error');
					$("p").remove();	
					$('#st-email').addClass('has-error').after("<p id='pesan' class='text-danger pesan pull-right'>Email Salah</p>");
				};
		})

		$('#email').blur(function  () {
			filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

			if (filter.test($(this).val())) {
				$('#st-email').removeClass('has-error');
				
				$("p").remove();	
				$('#st-email').addClass('has-success');
			}
			else
				{
					$('#st-email').removeClass('has-error');
					$("p").remove();	
					$('#st-email').addClass('has-error').after("<p id='pesan' class='text-danger pesan pull-right'>Email Salah</p>");
				};
		})

		$('#password').keyup(function  () {

			var isi=$(this).val()
			if (isi.length>6) 
			{
				$('#st-password').removeClass('has-error');
				
				$("p").remove();	
				$('#st-password').addClass('has-success');
			}
			else if(isi.length<6 && isi.length>0)
			{
				$('#st-password').removeClass('has-error');
				
				$("p").remove();	
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
				$("p").remove();	
				$('#st-password').addClass('has-error').after("<p id='pesan' class='text-danger pesan pull-right'>Masukan Lebih dari 6 Karakter</p>");
			};
		})
	})
</script>
<script type="text/javascript">
	// $('#username').bind('keypress', function (event) {
	//     var regex = new RegExp("^[a-zA-Z0-9]+$");
	//     var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	//     if (!regex.test(key)) {
	//        event.preventDefault();
	//        return false;
	//     }
	// });

</script>
<script type="text/javascript">
	$(function(){
	    $(document).on("cut copy paste","#username",function(e) {
	        e.preventDefault();
	    });
});
</script>
</body>
</html>

                      
