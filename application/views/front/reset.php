<!DOCTYPE html>
<html>
<head>
	<title>Pixtox</title>
     <link rel="icon" type="image/png" href="<?=base_url();?>assets/img/ico.png"/>
	<link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
	 <link rel="stylesheet" href="<?=base_url();?>assets/fa/css/font-awesome.min.css">
	 <style type="text/css">
	 body
	 {
	 	padding-top: 7%;
	 	background-color: #333;
	 	
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
		<?=$this->session->flashdata('pesan');?>
		<form method="post" action="<?=base_url('reset/auth');?>">
			<div class="panel">
				<div class="panel-heading"><h4 class="text-center"> <i class='fa fa-leaf'></i> Forget Password</h4></div>
				<div class="panel-body">					
					<div id="st-email" class="input-group">
						<span class="input-group-addon"><i class='fa fa-envelope'></i></span>
						<input id="email" type="email" class="form-control" name="email" placeholder='Email'>
					</div>
					<br>
					<br>
					<button class="btn btn-block btn-warning">
						<i class='fa fa-sign-in'></i> Send
					</button>
				</div>
			</div>
		</form>
		</div>
		<div class="col-md-4"></div>
		</div>
	</div>
</div>
</section>
</body>
</html>

                      
