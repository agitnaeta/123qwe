<style type="text/css">
	.padd{
		padding-top:10%;
		padding-bottom: 5%;
		padding-left: 5%;
		padding-right: 5%;
	}
</style>
<div class="pemesanan panel panel-default">
	<div class="panel-body ">
	<div class="text-center">
		<h3><u>Pilih Paket</u></h3>
		<hr>
	</div>
	<?php foreach ($paket->result() as $row):?>
		<div class="col-md-3">
		<a href="#" id="<?=$row->kode_paket;?>" class='paket'>
			<div class="panel panel-default">
				<div class="panel-heading ">

					<img width="100px" height="100px"  src="<?php echo  base_url("assets/img/paket/$row->gambar");?>"/>
				</div>
				<div class="panel-footer">
					<h3 class="text-center"><?=$row->nama_paket;?></h3>
				</div>
			</div>
		</a>	
		</div>
	<?php endforeach;?>	
	</div>

	<div class="panel-footer">
	<table class="table">
		<tr><td width="30%">Nama Paket </td><td width="1%">:</td><td><p id='nama_paket'></p></td></tr>
		<tr><td>Lama Hari </td><td>:</td><td><p id='lama_hari'></p></td></tr>
		<tr><td>Harga </td><td>:</td><td><span id='harga'></span></td></tr>
		<tr><td>Kapasitas Download </td><td>:</td><td><p id='kapasitas_download'></p></td></tr>
	</table>
		<div class="pesan"></div>
		<div class="text-right">
			<button id="kode_paket" data-id=""  class="btn btn-warning">
				<i class='fa fa-check'></i>Beli <span class='nama_paket'></span>
			</button>
			<input readonly type="hidden" class="kode_paket"  name="kode_paket">
		</div>

	</div>
</div>
<script type="text/javascript">
	$(document).ready(function  () {
		$('.paket').click(function  () {
			var kode_paket=$(this).attr('id');
			$.post('<?php echo base_url("contributor/getDataPaket");?>',{kode_paket:kode_paket},function  (data) {
				var obj=JSON.parse(data);
				$('#nama_paket').html(obj.nama_paket)
				$('#lama_hari').html(obj.lama_hari)
				$('#harga').html(obj.harga)
				$('.nama_paket').html(obj.nama_paket)
				$('.kode_paket').val(obj.kode_paket)
				$('#kapasitas_download').html(obj.kapasitas_download)
			})
			return false;
		})

		$('#kode_paket').click(function  () {
			var kode_paket=$('.kode_paket').val()
			if (kode_paket.length<1) {
				alert("Silahkan Pilih Paket Dahulu")
			}
			else
			{
				if (confirm("Apakah Anda yakin ingin membeli paket ini?")) {
					$.post('<?php echo base_url("contributor/beli_paket");?>',{kode_paket,kode_paket},function  (data) {
					$('.pemesanan').html(data)
					$('.pemesanan').addClass('padd');

					})
				}else{return false};
			}
		})


	})
</script>