<style type="text/css">
	.container
	{
		padding: 3%;
		zoom:90%;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Score Setting</h3>
			</div>
			<div id="pesan"></div>
			<div class="panel-body">
				
				<form class="form-inline" role="form" id="form_set">
				  <div class="form-group">
				    <label for="">Pass Score</label>
				    <input value="<?=$nilai;?>" min='1' type="number" class="lock form-control" name="nilai" id="nilai">
				  </div>
				  <div class="form-group">
				    <label for="pwd">Form:</label>
				    <input readonly min='0' type="number" value="<?=count($admin->result());?>" class="form-control" name="pembagi" id="pembagi">
				  </div>
				  <div class="checkbox">
				    
				  </div>
				 	<button id="key" class="btn btn-default"><i class='fa fa-unlock'></i> Edit</button>
				  <button id="set" class="btn btn-default"><i class='fa fa-lock'></i> Set</button>
				</form>

				<br>
				<div class="text-muted">
					* For Edit Admin Please Go To User > Admin
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div id="tabel" class="col-md-12">
			
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.lock').prop( "disabled", true );
	$('#set').hide();

	$(document).ready(function  () {
		$('#key').click(function  () {
			$('.lock').prop( "disabled", false );
			$('.btn').toggle()
			return false;
		})
		$('#set').click(function  () {
			$('.btn').toggle()
			
			$.post('<?=base_url("pxadmin/setScore");?>',$('#form_set').serialize(),function  (data) {
				$('#pesan').html(data);
				$('#pesan').show().delay(1000).fadeOut();
			})
			$('.lock').prop( "disabled", true );
			return false;
		});


	})

</script>