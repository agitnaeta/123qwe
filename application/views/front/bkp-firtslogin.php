<!DOCTYPE html>
<html>
<head>
	<title>Pixtox</title>
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
	 	margin: auto;
	 }
	 .daftar
	 {
	 	background-color: #333;
	 	padding-bottom: 10%;
	 }
	 
	 </style>
</head>
<body>
<section id='login' class='login'>
	<div class="container">
	<div class="row">
		<div class="col-md-12">
		<div class="col-md-4"></div>
		<div class="col-md-4">
		<div class="text-center">
			<img src="<?=base_url();?>assets/img/pixtox-png.png" width='150px' height='auto'>
		</div>
			<div class="panel">
				<div class="panel-heading"><h4 class="text-center"> <i class='fa fa-leaf'></i> Login </h4></div>
				<form method="post" action="<?=base_url('firstlogin/login');?>">
					<?php foreach ($token->result() as $row):?>
					<div class="panel-body">
						<input value="<?=$row->memberid;?>" type="hidden" type="text" name="memberid">
						
						<input value="<?=$row->token;?>" type="hidden" type="text" name="token">
						<button type="submit" class="btn btn-block btn-warning">
							<i class='fa fa-sign-in'></i> Login
						</button>
					</div>
					<?php endforeach;?>
				</form>
			</div>
		</div>
		<div class="col-md-4"></div>
		</div>
	</div>
</div>
</section>
<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
	$( document ).ready(function() {
    	$('#daftar').hide();
    	$('#btn_daftar').click(function  () {
    		$('#login').toggle();
    		$('#daftar').toggle();
    	})
	});
</script>
<script type="text/javascript">
	$(document).ready(function  () {
		$('#username').keyup(function  () {

			var isi=$(this).val()
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



		
		
	})
</script>
</body>
</html>

                      
