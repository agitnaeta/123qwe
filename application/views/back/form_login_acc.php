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
	 	padding-top: 8%;
	 	background-color: #333;
	 	padding-bottom: 12.3%;
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
	 body
	 {
	 	background-color: #333;
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
		<div id="pesan">
			<?=$this->session->flashdata('pesan');?>
		</div>
		<form method="post" id="form_login" action="<?=base_url('login/atuhadmin_acc');?>">
			<div class="panel">
				<div class="panel-heading"><h4 class="text-center"> <i class='fa fa-leaf'></i> Login </h4></div>
				
				<div class="panel-body">
					
					<div class="input-group">
						<span class="input-group-addon"><i class='fa fa-user'></i></span>
					         <input name="username" id="username" type="text" class="form-control" placeholder='Username'>
					    
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon"><i class='fa fa-lock'></i></span>
					         <input name="password" id="password" type="password" class="form-control" placeholder='Password'>
					</div>
					
					<br>
					
					<br>
					<br>
					<button type="submit" class="btn btn-block btn-warning">
						<i class='fa fa-sign-in'></i> Login
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

                      
