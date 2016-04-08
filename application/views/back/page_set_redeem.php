<div class="container">
	<h3>
		Setting Redeem
	</h3>
	<hr>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				Set Redeem
			</div>
			<form id="form_redeem" method="post">
			<div class="panel-body">
				<div class="pesan"></div>
				<div class="row">
					<div class="col-md-4">
						<label>Minimal Redeem</label>
					</div>
					<div class="col-md-8">
						<input class="form-control" type="hidden" name="id" id="id">
						<input min='0' class="form-control" type="number" name="minimal" id="minimal">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<label>Pendapatan / Gambar</label>
					</div>
					<div class="col-md-8">
						<input min='0' class="form-control" type="number" name="penghasilan" id="penghasilan">
					</div>
				</div>
			</div>
			</form>
			<div class="panel-footer">
				<a class="btn save btn-warning btn-block">
					<i class='fa fa-sign-in'></i> Set Redeem
				</a>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default panel-body">
			<h4>
				<i class="fa fa-info-circle"></i> Info Setting Redeem
			</h4>
			<blockquote>
				Setting redeem digunakan untuk melakukan set pada :
				<ol>
					<li>
						Minimal Redeem
					</li>
					<li>
						Pendapatan Contributor/Gambar
					</li>
				</ol>
			</blockquote>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function  () {
		$.post('<?php echo base_url("pxadmin/getSetRedeem");?>',{},function  (data) {
			var obj=JSON.parse(data);
			$('#minimal').val(obj[0].minimal)
			$('#id').val(obj[0].id)
			$('#penghasilan').val(obj[0].penghasilan)
		})



		$('.save').click(function  () {
			var minimal=$('#minimal').val()
			var penghasilan=$('#penghasilan').val()
			if (parseInt(minimal)<=0 || parseInt(penghasilan)<=0) {
				$('.pesan').html("Silahkan Isi Setting Dengan Benar")
				$('.pesan').removeClass("alert alert-success text-center")
				$('.pesan').addClass("alert alert-danger text-center")
				$('.pesan').show().delay(1000).fadeOut('slow')
			}
			else
			{
				$.post('<?php echo base_url("pxadmin/updateSetRedeem");?>',$('#form_redeem').serialize(), function  (data) {
					$('.pesan').html("Berhasil Di Seting")
					$('.pesan').removeClass("alert alert-danger text-center")
					$('.pesan').addClass("alert alert-success text-center")
					$('.pesan').show().delay(1000).fadeOut('slow')
				})
			}	
		})
	})
</script>