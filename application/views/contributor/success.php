<title>Success | Pixtox</title>
<link rel="icon" type="image/png" href="<?=base_url();?>assets/img/ico.png"/>
<style type="text/css">
	.col-md-12
	{
		padding-top: 80;
	}
</style>
<div class="col-md-12">
	<div class="text-center">
		<h1>You Has Been Upload 10 Photos</br>
			<small>Please wait until our admin accept your photo</small>
		</h1>
		<br>
		<h1 id="proses" class="text-center">
			
		</h1>
		<h5><a href="<?=base_url("logout");?>">Logout</a>|<a href="<?=base_url("page/faq");?>">FAQ</a></h5>
	</div>
</div>
<script src="<?=base_url();?>assets/js/jquery.min.js"></script>
<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/scripts.js"></script>
<script type="text/javascript">
	$(document).ready(function  () {
		$('#proses').load('<?php echo base_url("contributor/change_app");?>');
	})
</script>