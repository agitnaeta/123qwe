<!DOCTYPE html>
<html>
<head>
	<title>Page Image</title>
	<style type="text/css">
	.container
	{
		padding-top: 3%;
	}
	img
	{
		display: block;
		 margin-left: auto;
		 margin-right: auto
	}
	</style>
<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class='fa fa-image'></i> Setting Mini Image <span id='pesan' class='bg-success'></span>
				</div>
				<div class="panel-body">
					<div class="form-inline">
						<form method="post" action="/" id="image_set">
							<label>Set Rasio Image</label>
							<input value="<?=$ratio;?>" id="ratio" name="ratio" class="form-control" type="number">
							<a id="save" class="btn btn-default"><i class='fa fa-save'></i> Set</a>
						</form>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<i class='fa fa-image'></i> Example
				</div>
				<div class="panel-body">
				<div class="col-md-6">
				<h2 class="text-center"> Sebelum</h2>
				<div class="textt-muted">
					<?php 	
						$image= base_url("upload/contoh.jpg");
						 $size=getimagesize($image);
					;?>
				</div>
				<input type="hidden"  id="width"  value="<?=$size[0];?>">
				<input type="hidden"  id="height" value="<?=$size[1];?>">
					<img class="img img-reponsive" width="100%" height="auto" src="<?php echo base_url("upload/contoh.jpg");?>">
				</div>
				<div class="col-md-6">
				<h2 class="text-center"> Setelah</h2>
					<div class="center">
            						<img class="img img-reponsive" width="100%" height="auto" id="resize" src="<?php echo base_url("upload/contoh.jpg");?>">
                            			</div>
				</div>

				</div>
			</div>
		</div>
	</div>
</div>
<div class="java">
	<script type="text/javascript">
		$(document).ready(function  () {
			$('#ratio').keyup(function  () {
				var isi=$(this).val()
				var  lebar=$('#width').val();
				var hasil=parseInt(isi)*parseInt(lebar)/100
				var ratio = 0; 

				$('#resize').css("width", hasil);
				$('#resize').css("height", height * ratio);	
			})

			$('#save').click(function  () {
				var ratio=$('#ratio').val()

				$.post('<?php echo base_url("pxadmin/updateResize"); ?>',{ratio:ratio},function  (data) {
					$('#pesan').html(data)
					$('#pesan').show().delay(1000).fadeOut('slow');
				})
			})

		})
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
		   		
		   		var isi=$('#ratio').val()
				var  lebar=$('#width').val();
				var hasil=parseInt(isi)*parseInt(lebar)/100
				var ratio = 0; 

				$('#resize').css("width", hasil);
				$('#resize').css("height", height * ratio);	
		});

	</script>
</div>
</body>
</html>