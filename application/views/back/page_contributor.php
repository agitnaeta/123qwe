<style type="text/css">
	label{
		padding-top: 1%;
	}
	.container-fluid
	{
		padding-top: 2%;
		zoom:90%;
	}
	h4
	{
		padding-left: 2%;
	}

</style>

<div class="container-fluid">
	<div class="row">
	<h4>Contributor</h4>
	<hr>
		<div class="col-md-12">
			<div class="col-md-3" id="panel">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class='fa fa-user'></i> Contributor
				</div>
			<form method="post"  id="form_member">
				<div class="panel-body">
					<label>Username</label>
					<div class="input-group">
						<span class="input-group-addon"><i class='fa fa-user'></i></span>
						<input class="form-control" name="username" id="username">
						<input type="hidden" class="form-control" name="memberid" id="memberid">
					</div>
					<label>Email</label>
					<div class="input-group">
						<span class="input-group-addon"><i class='fa fa-envelope'></i></span>
						<input name="email" class="form-control" id="email">
					</div>
					<label class="daftar">Sign Up As</label>
					<select name="status" class="form-control daftar">
							<?php foreach ($status->result() as $row):?>
							<option value="<?=$row->id;?>"><?=$row->nama;?></option>	
							<?php endforeach;?>	
					</select>	
					<label>Password</label>
					<div class="input-group">
						<span class="input-group-addon"><i class='fa fa-lock'></i></span>
						<input class="form-control lock" name="password" id="password">
					</div>
					<label>No Identitas</label>
					<div class="input-group">
						<span class="input-group-addon"><i class='fa fa-user'></i></span>
						<input class="form-control lock" name="no_identitas" id="no_identitas">
					</div>
					<label>Nama</label>
					<div class="input-group">
						<span class="input-group-addon"><i class='fa fa-tasks'></i></span>
						<input class="form-control lock" name="nama" id="nama">
					</div>
					<label>Tanggal Lahir</label>
					<div class="input-group">
						<span class="input-group-addon"><i class='fa fa-calendar'></i></span>
						<input type="date" class="form-control lock" name="tanggal_lahir" id="tanggal_lahir">
					</div>
					<br>
					<button id="simpan" class="saveMode btn btn-default"> Save</button>
					<button class="saveMode btn "> Reset</button>
					<div class="hideUpdate">
						<button class="btn btn-default" id="update"><i class='fa fa-upload'></i> Update</button>
						<button class="btn btn-default refresh" ><i class='fa fa-check'></i> Selesai</button>
					</div>
				</div>
				</form>
			</div>
		</div>
		<div  class="col-md-9">
			<div class="panel panel-default">
			<div class="panel-heading"><h3>Tabel Contributor</h3></div>
			<div class="panel-body">
				<div id="pesan"></div>
				<div id="tabel"></div>
			</div>
			</div>
		</div>
		</div>
	</div>

</div>
<script type="text/javascript" src=<?=base_url('assets/js/js.js');?>></script>
<script type="text/javascript">

	$(document).ready(function  () {
		$('.lock').prop( "disabled", true );
		$('.hideUpdate').hide();
		$('#tabel').load('<?=base_url("pxadmin/tabel_contributor");?>');
		return false;
	})
</script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('#simpan').click(function  () {
			var kosong='';
			$.post('<?php echo base_url("daftar/create_account_by"); ?>',$('#form_member').serialize(),function  (data) {
				$('#pesan').html(data);
				$('#pesan').show().delay(3000).fadeOut('slow');
				$('#tabel').delay(3000).load('<?=base_url("pxadmin/tabel_contributor");?>');
				$('#username').val(kosong);
				$('#email').val(kosong);
			})
			return false;
		})

		$('#update').click(function  () {
			var kosong='';
			$.post('<?php echo base_url("pxadmin/updateContributor");?>',$('#form_member').serialize(),function  (data) 
			{
				$('#pesan').html(data);
				$('#pesan').show().delay(3000).fadeOut('slow');
				$('#tabel').delay(3000).load('<?=base_url("pxadmin/tabel_contributor");?>');
				$('.form-control').val(kosong);
			})
			return false;
		})


		
	})
</script>
