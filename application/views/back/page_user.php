<style type="text/css">
	label{
		padding-top: 1%;
	}
	.container-fluid
	{
		padding-top: 2%;
		
	}
	h4
	{
		padding-left: 1%;
	}
</style>
<div class="container-fluid">
	<div class="row">
	<h4>Admin Setting</h4>
	<hr>
		<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel panel-heading">
			Form User
		</div>
		<div class="panel-body">
		<div id="pesan"></div>
			<form method="post" id="form">
				<div class="hiddenid">
				<label>UserID</label>
				<input readonly name="userid" id="userid" class="form-control">
				</div>
				<label>Username</label>
				<input name="username" id="username" class="form-control">

				<label>Password</label>
				<input name="password" id="password" class="form-control">
				<label>E-Mail</label>
				<input name="email" id="email" class="form-control">

				<label>Status</label>
				<select name="status" id="status" class="form-control">
					<option value="1"> Active </option>
					<option value="0"> Diactive </option>
				</select>

				<br>
					<button id="submit" class="btn btn-default"><i class='fa fa-save'></i> Save</button>
				<div class="hiddenid">
					<button id="update" class="btn btn-default"><i class='fa fa-upload'></i> Update</button>	
					<a href="#"  class="refresh btn btn-default"><i class='fa fa-check'></i> Selesai</a href="#">
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
				<h3>Table Admin</h3>
				</div>

				<div class="panel-body">
				<div class="text-center">
					<div id="pesan"></div>
				</div>
					<div id="tabel"></div>
				</div>
			</div>
		</div>
<script type="text/javascript" src=<?=base_url('assets/js/js.js');?>></script>
<script type="text/javascript">
	$(document).ready(function  () {
		$('#tabel').load('<?=base_url("pxadmin/tabel_user");?>');
		$('.hiddenid').hide();


		var kosong="";
		$("#submit").click(function  () {
			var kosong="";
			$.post('<?=base_url("pxadmin/saveUser");?>',$('#form').serialize(),function  (data) {
				$("#pesan").html(data)
				$("#pesan").show().delay(700).fadeOut();
				$('#tabel').load('<?=base_url("pxadmin/tabel_user");?>');
				$('.form-control').val(kosong);
			})
			return false;
		})
	})
</script>
	</div>
</div>