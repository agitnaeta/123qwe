<style type="text/css">
	.padd{
		padding-top:10%;
		padding-bottom: 5%;
		padding-left: 5%;
		padding-right: 5%;
	}
</style>

<div class="pemesanan panel panel-default">
	<form method="post" action="/" id="form_redeem">
	<div class="panel-body ">
		<h3>Redeem Request</h3>
		<hr>
		<div class="container">
		<div class="col-md-9 pesan" ></div>
			<div class="col-md-6">

				<label>Nominal</label>
				<input class="form-control" name="nominal" id="nominal" min='0' type="number" max='<?=$earning['earning'];?>' value="<?=$earning['earning'];?>">
				<label>Tanggal Redeem</label>
				<div class="form-inline">
						<select class="form-control" name="tanggal">
						<option>-Tanggal-</option>
						<?php for ($i=1; $i <=31 ; $i++):?>
							<option value="<?=$i;?>"><?=$i;?></option>
						<?php endfor;?>
						</select>
						
						<select class="form-control" name="bulan">
						<option>-Bulan-</option>
						<?php for ($i=1; $i <=12 ; $i++):?>
							<option value="<?=$i;?>"><?=$i;?></option>
						<?php endfor;?>
						</select>
						
						<select class="form-control" name="tahun">
						<option>-Tahun-</option>
						<?php for ($i=2015; $i <=2099 ; $i++):?>
							<option value="<?=$i;?>"><?=$i;?></option>
						<?php endfor;?>
						</select>
					</div>
				<label>No Rekening</label>
				<input class="form-control" name="no_rekening" id="no_rekenin"  type="number" min='1' >
				<label>Nama Pemilik Rekening</label>
				<input class="form-control" name="nama_rekening" id="nama_rekening">
				<label>Bank</label>
				<select id="pilih_bank" class="form-control">
					<option value="">-Bank-</option>
					<option value="BRI">BRI</option>
					<option value="BCA">BCA</option>
					<option value="Mandiri">Mandiri</option>
					<option value="BNI">BNI</option>
					<option value="other">Other</option>
				</select>
				<input class="form-control" name="bank" id="bank" placeholder='Silahkan Isi'>
			</div>
			<div class="col-md-6">
				
				<div style="padding-top:20%;" class="col-md-6">
					<div style="color:#fff" class="panel-heading">
						<h3 class='text-center' id='redeem'></h3>
					</div>
					<div class="panel-footer">
						<h4 class="text-center">Status Redeem</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
	<div class="panel-footer">
		<div class="text-right">
		<a class="submit btn btn-primary"> Do Redeem</a>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function  () {
		var nominal=$('#nominal').val()

		$('#bank').hide()

		$('#pilih_bank').change(function  () {
			var bank=$(this).val()
			if (bank=='other') {
				$('#bank').show();
				$('#bank').val("");
			} 
			else
			{
				$('#bank').val(bank);
			}
		})

		$('#nominal').keyup(function  () {
			var newNominal=$('#nominal').val()
			if(parseInt(nominal)<parseInt(newNominal))
			{
				$('#nominal').val(nominal)
			}
		})

		$('.submit').click(function  () {
			$.post('<?php echo base_url("contributor/do_rendeem");?>',$('#form_redeem').serialize(),function  (data) {
				
				if (data!=1) {
					$('.pesan').html(data)
					$('.pesan').removeClass('alert alert-success');
					$('.pesan').addClass('alert alert-danger');
					$('.pesan').addClass('text-center');
				}
				else
				{
					$('.pesan').html("Berhasil")
					$('.pesan').removeClass('alert alert-danger');
					$('.pesan').addClass('alert alert-success');
					$('.pesan').addClass('text-center');
					$('#redeem').load('<?php echo base_url("contributor/status_redeem")?>');
				}

			})
		})

		$('#redeem').load('<?php echo base_url("contributor/status_redeem")?>');
	})
</script>