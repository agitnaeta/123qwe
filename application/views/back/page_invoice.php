<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Data Invoice(<span id='jml_invoice'></span>)</h3>
				<hr>
			<div class="col-md-2">
				<select class="form-control" id="status" name="status">
					<option value="">-Status-</option>
					<option value="1">Paid</option>
					<option value="0">Unpaid</option>
				</select>
			</div>
			<div class="col-md-6">
				<!-- <div class="form-inline">
					<label>Dari</label>
					<input class="form-control tanggal" id="dari_tanggal" name="dari_tanggal" >
					<label>Sampai</label>
					<input placeholde='Dari Tanggal' class="form-control tanggal" id="sampai_tanggal" name="samapi_tanggal" >
					<button id="show" class="btn btn-default"> Show</button>
				</div> -->
			</div>
			<div class="col-md-2 text-success">
				<label>Total Income</label>:<br>
					Rp. <span id='total_income' class="text-success"></span>
			</div>
			<div class="col-md-2 text-danger">
				<label>Total Tagihan</label>:<br>
					Rp. <span id='total_tagihan' class="text-danger"></span>
			</div>
		</div>
		<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			</div>
			<div class="panel-body">
				<div id="table" class="table table-responsive"></div>
			</div>
		</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function  () {
		$('#table').load('<?php echo base_url("pxadmin/table_invoice");?>');

		$('#jml_invoice').load('<?php echo base_url("pxadmin/jml_invoice"); ?>');

		$('#total_income').load('<?php echo base_url("pxadmin/pendapatan");?>');

		$('#total_tagihan').load('<?php echo base_url("pxadmin/tagihan");?>');


		$('#status').change(function  () {

			var status= $(this).val();

			if (status=='') {

					$('#table').load('<?php echo base_url("pxadmin/table_invoice");?>');

			}

			else

				{

					$.post('<?php echo base_url("pxadmin/status_invoice");?>',{status:status},function  (data) {

						$('#table').html(data);

					})

				};

		})


		$('#show').click(function  () {

			var dari=$('#dari_tanggal').val()

			var sampai=$('#sampai_tanggal').val()

			if (dari=='' || sampai=='') 

			{

				alert("Data Kosong");

			}

			else

			{

				$.post('<?php echo base_url("pxadmin/show_invoice");?>',{dari:dari,sampai:sampai}, function  (data) {

					$('#table').html(data)

				})


				$.post('<?php echo base_url("pxadmin/show_keuangan");?>',{dari:dari,sampai:sampai}, function  (hasil) {

					// $('#total_income').html(hasil);

					var obj=JSON.parse(hasil);

					$('#total_income').html(obj.pendapatan);

					$('#total_tagihan').html(obj.tagihan);

				})

			};

		})

	})

</script>
