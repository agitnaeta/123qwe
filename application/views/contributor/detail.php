<div class="panel panel-default">

	<div class="panel-body">

		<div class="col-md-6">

			<h2><i class='fa fa-camera'></i> Your Photo</h2>

			<hr>

			<table width="100%" class="table-striped table">

				<tr><td>All</td><td><p class="jumlah"></p></td></tr>

				<tr><td>Vektor</td><td><span id="vektor"></span></td></tr>

				<tr><td>Photo</td><td><span id="photo"></span></td></tr>

			</table>

			

		</div>

		<div class="col-md-6">

			<h2><i class='fa fa-money'></i> Earning</h2>

			<hr>

			<table width="100%" class="table-striped table">

				<tr><td>Upload</td><td><span class='jumlah'></span></td></tr>

				<tr><td>Download</td><td><span id='download'></span></td></tr>

				<tr><td>Total Earning</td><td><span id='earning'></span></td></tr>

				<tr>

					

					<td colspan="2">

						<small class="text-justify">

							<i>* Penarikan saldo contributor (redeem) minimal 1 Minggu setelah penagihan, maximal 2 Minggu</i>

						</small>						

					</td>

				</tr>



			</table>

		</div>

		<div class="col-md-6">

			<h2><i class='fa fa-money'></i> Deposit</h2>

			<hr>

			<table width="100%" class="table-striped table">

				<tr><td>Sisa Download</td><td><span id='sisa_download'></span></td></tr>

				<tr><td>Sisa Deposit</td><td><span id='sisa_deposit'></span></td></tr>

				<tr><td>Tanggal Expired</td><td><span id='tanggal_expired'></span>(<span id='status'></span>)</td></tr>

				<tr>

					<td colspan="2">

						<button id="beli_paket" class="btn btn-warning">

							<i class=' fa fa-shopping-cart'></i> Beli Paket

						</button>						

					</td>

				</tr>



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

	<div class="panel-footer">

		<div class="text-bold"><b> Your Keyword</b></div>

			<p id="tags"  class="text-responsive"></p>

	</div>

</div>

<script type="text/javascript">

	$(document).ready(function  () {

		$('.jumlah').load('<?php echo base_url("contributor/getCountImage");?>');

		$('#tags').load('<?php echo base_url("contributor/getTag");?>');

		$('#vektor').load('<?php echo base_url("contributor/getVektor");?>');

		$('#photo').load('<?php echo base_url("contributor/getPhoto");?>');

		

		



		// Earning 

		$.post('<?php echo base_url("contributor/getEarning");?>',{},function  (data) {

			

			var obj=JSON.parse(data);

			

			$('.jumlah').html(obj.jumlah);

			$('#download').html(obj.download);

			$('#earning').html(obj.earning);

			

		})

		// Deposit

		$.post('<?php echo base_url("contributor/getDataDeposit");?>',{},function  (data) {

			$('#paket').html(data)

			var obj=JSON.parse(data);

			

			$('#sisa_hari').html(obj.sisa_hari);

			$('#sisa_download').html(obj.sisa_download);

			$('#sisa_deposit').html(obj.sisa_deposit);

			$('#tanggal_expired').html(obj.tanggal_expired);

			$('#status').html(obj.status);

		})



		$('#beli_paket').click(function  () {

			$('#konten').load('<?php echo base_url("contributor/page_paket")?>')

		})





		$('#no_invoice').change(function  () {

			var no_invoice=$(this).val()

			

			$.post('<?php echo base_url("contributor/detail_invoice");?>',{no_invoice:no_invoice},function  (data) {

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