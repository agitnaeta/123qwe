<!DOCTYPE html>
<html>
<head>
	<title>Pixtox | <?=$name_page;?></title>
	 <link rel="icon" type="image/png" href="http://localhost/px/assets/img/ico.png"/>
	<style type="text/css">
		nav > li >a
		{
			background-color: #333;
			color:#fff;
		}
		body
		{
			background-color: #2B2B2B;
		}
		.konten
		{
			 font-family: 'Arial' !important;
			 background-color: #2B2B2B;
		}
		.row
		{
			padding-top: 30px;
		}
		.panel-body
		{
			padding: 20px;
			background-color: #2B2B2B;
			border-color: transparent;
			color: #fff;
		}
	</style>
</head>
<body>
<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<?php include 'navbar.php'; ?>
					</div>
				</div>
			</div>
<div class="container konten">
	<div class="row">
		<div  class="col-md-12">
		<div class=" ">
			<?php  	foreach ($page->result() as $row) :?>
				<div class="panel-body">
					<u><b><h1 class=""><?=$row->name_page;?></h1></b></u>
					<br>
					<br>
					<div class="text-justyfy">
							<?=$row->isi;?>
					</div>
				</div>
				 <?php endforeach;?>
			</div>
		</div>
	</div>
</div>

</body>
</html>
