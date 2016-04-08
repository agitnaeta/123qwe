<div class="panel panel-default">

	<div class="panel-heading"><h4><i class='fa fa-pencil'></i> Detail</h4></div>

	<div class="panel-body">

		<div class="pesan"></div>

		<div class="col-md-6">

		     <h3><i class='fa fa-user'></i> Deposit</h3>

		     <hr>

          	<table class="table table-striped">

          	



				<tr><td>Sisa Download</td><td id="sisa_download">:</td></tr>

          		<tr><td>Sisa Deposit</td><td id='sisa_deposit'>:</td></tr>

          		<tr><td>Tanggal Deposit</td><td id='tanggal_deposit'>:</td></tr>

				<tr><td>Expired Tanggal</td><td id="expired">:</td></tr>          		

				<tr><td>Status</td><td id="status">:</td></tr>          		

          	</table>

		</div>

		<div class="col-md-6">

			 <h3><i class='fa fa-file'></i> Invoice</h3>

			<hr>

			<table class="table table-striped">

				<tr><td>No Invoice</td><td>

							<form target="__blank" class="form-group" method="post" action="<?php echo base_url("contributor/get_invoice");?>">
							<div class="form-inline">
								<div class="form-group">
									<select id="no_invoice" name="no_invoice" class="input-sm">

									<?php print_r($invoice->result());?>

									<option value="">-Choose-</option>

										<?php foreach($invoice->result() as $row):?>

									<option value="<?=$row->no_invoice;?>"><?=$row->no_invoice."(".($row->subject).")";?></option>

										<?php endforeach;?>
									</select>
									<button type="submit" class="btn btn-warning">
									<i class='fa fa-print'></i> 
									</button>
								</div>
							</div></form>

				</td></tr>

				<tr><td>Subject</td><td id="subject"></td></tr>

				<tr><td>Kapasitas Download</td><td id="kapasitas_download"></td></tr>

				<tr><td>Harga</td><td id="harga"></td></tr>

				<tr><td>Lama Hari</td><td id="lama_hari"></td></tr>

				<tr><td>Status</td><td id="status_invoice"></td></tr>

			</table>

		</div>

		

	</div>

</div>							



<script type="text/javascript">

	$(document).ready(function  () {



		$.post('<?php echo base_url("member/getDataDeposit");?>',{},function  (data) {

			$('#sisa_download').html(data)

			var obj=JSON.parse(data);

			$('#status').html(obj.status);

			$('#sisa_download').html(obj.sisa_download);

			$('#sisa_deposit').html(obj.sisa_deposit);

			$('#expired').html(obj.tanggal_expired);

			$('#tanggal_deposit').html(obj.tanggal_deposit);

			$('#status').html(obj.status);

		})





		$('#no_invoice').change(function  () {

			var no_invoice=$(this).val()

			$.post('<?php echo base_url("member/detail_invoice");?>',{no_invoice:no_invoice},function  (data) {

				$

				var obj=JSON.parse(data)

				$('#subject').html(obj.subject);

				$('#kapasitas_download').html(obj.kapasitas_download);

				$('#harga').html(obj.harga);

				$('#lama_hari').html(obj.lama_hari);

				$('#status_invoice').html(obj.status);

			})

		})



	})

</script>