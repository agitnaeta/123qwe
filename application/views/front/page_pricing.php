<title>Pixtox | Pricing</title>
 <link rel="icon" type="image/png" href="<?=base_url();?>assets/img/ico.png"/>
 <style type="text/css">
.container
{
	padding-top: 100px;
}
 </style>

<?php include 'navbar.php';?>
<div class="container">
<h1 class="text-center">Best Price</h1>
<br>
<?php foreach ($paket->result() as $row):?>
<div class="col-md-3">
	<div class="panel panel-primary">
	<div class="panel-heading">
		<h2 class="text-center"><?=$row->nama_paket;?></h2>
	</div>
	<div class="panel-body">
		<img class="img img-responsive" src="<?php echo base_url("assets/img/paket/$row->gambar");?>">
		<h4 class="text-center">IDR <?=$row->harga;?></h4>
	</div>
	<div class="panel-footer">
	<a href="<?=base_url('login');?>" class="btn btn-warning btn-block"><i class="fa fa-shopping-cart"></i>Login To Buy</a>
	</div>
	</div>
</div>
<?php endforeach;?>
</div>