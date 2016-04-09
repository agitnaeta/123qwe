<div class="container">
	<div class="row">
	<div class="col-md-2"></div>
		<div class="col-md-8">
		<div id="pesan"></div>
		<form method="post" id="form_member" action="#">
		<?php foreach ($contributor->result() as $row):?>
			<table class="table">
				<thead>
					<th colspan="2">
						<h4>Detail User</h4>
					</th>
					<th colspan="2">
						<div class="text-center">
							<img src="">
						</div>
					</th>
					<tr><td>Contributor ID</td><td><input name="memberid" class="form-control" value="<?=$row->memberid;?>" readonly></td></tr>
					<tr><td>Username</td><td><input name="username" class="unlock form-control" value="<?=$row->username;?>" readonly></td></tr>
					
					<tr><td>No Identitas</td><td><input name="no_identitas" class="unlock form-control" value="<?=$row->no_identitas;?>" readonly></td></tr>
					<tr><td>Nama</td><td><input name="nama" class="unlock form-control" value="<?=$row->nama;?>" readonly></td></tr>
					<tr><td>Tanggal Lahir</td><td><input name="tanggal_lahir" type="date" class="unlock form-control" value="<?=$row->tanggal_lahir;?>" readonly></td></tr>
					<tr><td>Tanggal Daftar</td><td><input name="" class="lock form-control" value="<?=$row->tanggal_daftar;?>" readonly></td></tr>
					<tr><td>Email</td><td><input name="email" class="unlock form-control" value="<?=$row->email;?>" readonly></td></tr>
				</thead>
			</table>
		</form>	
			<div class="pull-right">
				<button id="back" class="btn btn-info"><i class='fa fa-backward'></i> Back</button>
				
			</div>
		<?php endforeach;?>
		
		</div>
	</div>
</div>
<script type="text/javascript" src=<?=base_url('assets/js/js.js');?>></script>
<script type="text/javascript">
	$(document).ready(function  () {
		$('.unlock').prop( "disabled", true );
		$('.unlock').prop( "disabled", true );

		$('#allow').click(function  () {
			$('.unlock').removeAttr('readonly');
			$('.unlock').prop( "disabled", false );
			
			return false;
		})
		$('#back').click(function  () {
			$('#konten').load('<?php echo base_url("pxadmin/page_contributor");?>');
			return false;
		})
	})
</script>