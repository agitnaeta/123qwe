<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3>Data Deposit (<span id='jumlah_deposit'></span>)</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading"></div>
				<div class="panel-body">
					<form method="post" id="f_deposit">
					<label>Member ID</label>
					<input class="form-control"  name="f_member_id" id="f_member_id">
					<input readonly type="hidden" class="form-control"  name="f_id_deposit" id="f_id_deposit">
					<label>Nama Paket</label>
					<select class="form-control" name="f_kode_paket" id="f_kode_paket">
						<?php foreach($paket->result()as $row):?>
							<option value="<?=$row->kode_paket;?>"><?=$row->nama_paket;?></option>
						<?php endforeach;?>
					</select>
					<label>Sisa Hari</label>
					<input min='0' type="number" class="form-control"  name="f_sisa_hari" id="f_sisa_hari">
					<label>Sisa Download</label>
					<input min='0' type="number" class="form-control"  name="f_sisa_download" id="f_sisa_download">
					<label>Status</label>
					<select class="form-control" name="f_status" id="f_status">
						<option value="1">Active</option>
						<option value="0">Non Active</option>
					</select>
					<br>
					<a class="btn btn-primary save"><i class='fa fa-save'></i> Save</a>
					<a class="btn btn-default refresh"><i class='fa fa-remove'></i> Cancel</a>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Tambel Deposit</h3>
			</div>
			<div class="panel-body">
				<div id="pesan"></div>
				<div id="table"></div>
			</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function  () {
		$('.refresh').click(function  () {
			$('#konten').load('<?php echo base_url("pxadmin/page_deposit"); ?>');
		});
		$('#table').load('<?php echo base_url("pxadmin/table_deposit");?>'); });
		$('#jumlah_deposit').load('<?php echo base_url("pxadmin/getJumlahDeposit");?>')
		$('.save').click(function  () {
					var id_deposit=$('#f_id_deposit').val();
					var kosong='';
					if (id_deposit.length<1) {
							$.post('<?php echo base_url("pxadmin/add_deposit"); ?>',$('#f_deposit').serialize(),function  (data) {
									$('#pesan').html(data);
									$('#pesan').addClass('alert alert-success text-center');
									$('#pesan').show().delay(10000).fadeOut();
										if(data!="Success"){
												return false;
										}
										else{
											$('.form-control').val(kosong);
											$('#konten').load('<?php echo base_url("pxadmin/page_deposit"); ?>');
										}
										
							})
					}
					else{
						$.post('<?php echo base_url("pxadmin/update_deposit");?>',$("#f_deposit").serialize(),function  (data) {
								$('#pesan').html(data);
								$('#pesan').addClass('alert alert-success text-center');
									$('#pesan').show().delay(10000).fadeOut();
										if(data!="Success"){
												return false;
										}
										else{
											$('.form-control').val(kosong);
											$('#konten').load('<?php echo base_url("pxadmin/page_deposit"); ?>');
										}

						})
					};
		})

</script>
<script type="text/javascript">
		$('#search').keyup(function  () {
			var search=$(this).val()
			$.post('<?php echo base_url("pxadmin/search_deposit"); ?>',{search:search},function  (data) {
				$('#table').html(data)
			})
			
		})
</script>