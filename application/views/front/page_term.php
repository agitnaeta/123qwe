<!DOCTYPE html>
<html>
<head>
	<title>Term & Condition</title>
 <link rel="icon" type="image/png" href="http://localhost/px/assets/img/ico.png"/>
	<style type="text/css">
		nav > li >a
		{
			background-color: #333;
			color:#fff;
		}
		body
		{
			background-color: #ddd;
		}
	</style>
	    <script type="text/javascript" src="<?=base_url('assets/js/js.js');?>"></script>
 	    <script type="text/javascript" src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
</head>
<body>
<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php include 'navbar.php'; ?>
					</div>
				</div>
			</div>
<div class="container konten">
	<div class="row">
		<div  class="col-md-12">
		<div class='text-center'>				
		<img class='img round' width="100" height="auto" src="<?=base_url();?>assets/img/pixtox-png.png">
		<br>
		</div>	
			<div class="panel panel-default">
				<div class="panel-body">
					<h1>Term & Condition</h1>
					<div class="text-justyfy">
						<?php  
						foreach ($term->result() as $row) {
							echo $row->term;
						}

						 ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>