<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Data Bank</h3>
			<hr>
		</div>
		<div class="col-md-4">
			<form method="post" id="f_bank">
			<div class="panel panel-default">
				<div class="panel-heading">
					Form Bank
				</div>
				<div class="panel-body">
					<label>Nama Bank</label>
					<input name="f_nama_bank" id="f_nama_bank" class="form-control">
					<input type="hidden" readonly name="f_idbank" id="f_idbank" class="form-control">
					<label>No.Rekening Bank</label>
					<input name="f_no_rekening" id="f_no_rekening" class="form-control">
					<label>Nama Pemilik</label>
					<input name="f_nama_pemilik" id="f_nama_pemilik" class="form-control">
				</div>
				<div class="panel-footer">
					<a class="save btn btn-warning">
						Save
					</a>
					<a class="reset btn btn-default">
						Cancel
					</a>
				</div>
			</div>
			</form>
		</div>
		<div class="col-md-8">
			<div class="pesan"></div>
			<div id="table" class="table table-responsive">
				
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function  () {
		$('#table').load('<?php echo base_url("pxadmin/table_bank"); ?>');
		$('.save').click(function  () {	
			var kosong='';
			var idbank=$('#f_idbank').val();
			if (idbank.length<1) {
				$.post('<?php echo base_url("pxadmin/add_bank"); ?>',$('#f_bank').serialize(),function  (data) {
				$('.pesan').html(data);
				$('.pesan').addClass('alert alert-success text-center');
				$('.pesan').show().delay(5000).fadeOut('slow');
				$('#table').load('<?php echo base_url("pxadmin/table_bank"); ?>');
				$('.form-control').val(kosong);
				});
			}
			else
			{
				$.post('<?php echo base_url("pxadmin/update_bank"); ?>',$('#f_bank').serialize(),function  (data) {
				$('.pesan').html(data);
				$('.pesan').addClass('alert alert-success text-center');
				$('.pesan').show().delay(5000).fadeOut('slow');
				$('#table').load('<?php echo base_url("pxadmin/table_bank"); ?>');
				$('.form-control').val(kosong);
				});
			};
		})

		$('.reset').click(function  () {
			$('#konten').load('<?php echo base_url("pxadmin/page_bank");?>');
		})
	})
</script>