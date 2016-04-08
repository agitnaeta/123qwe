<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h3>Total Download Image <span id='total'> </span> Download</h3>
		</div>
	</div>
	<div class="table table-responsive">
		
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function  () {
		$('.table').load('<?php echo base_url("pxadmin/table_download");?>');
		$('#total').load('<?php echo base_url("pxadmin/jumlah_download");?>');
	})
</script>