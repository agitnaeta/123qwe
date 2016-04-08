<br>
<style type="text/css">
	.panel 
	{
		position: fixed;;
	}
</style>
<div class="container-fluid">
	<div class="col-md-4">
		
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4> Dafta Paket (<span id="nomor"></span>)</h4> 
			</div>
			<form id="upload" method="post" action="<?=base_url("pxadmin/tambah_paket");?>">
			<div class="panel-body">
				<label>Nama Paket </label>
				<input class="form-control" name="f_nama_paket" id="f_nama_paket">
				<input type="hidden" class="form-control" name="f_kode_paket" id="f_kode_paket">
				<label>Harga</label>
				<input type="number" class="form-control" name="f_harga" id="f_harga">
				<label>Lama Hari</label>
				<input type="number" class="form-control" name="f_lama_hari" id="f_lama_hari">
				<label>Kapasitas Download</label>
				<input min="0" type="number" class="form-control" name="f_kapasitas_download" id="f_kapasitas_download">
				<label>Gambar</label>
				<input class="form-control" name="userfile" id="gambar" type="file">
				<br>
				<button type="submit" class="btn btn-warning"> Save</button>
				<a onclick="reset()"  class="btn reset btn-default"> Reset</a>
				 <progress  id='prog' max='100' min='0' style='display:none ; width=100%';></progress>
			</div>
			</form>

		</div>
	</div>
	<div class="col-md-8">
		<div class="alert alert-info">
		<div id="pesan"></div>
			<div class="input-group">
				<input class="form-control" name="cari" id="cari" placeholde="Search name..">
				<span class='input-group-btn'>
					<button class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
					<button class="btn hideImage btn-success"><i class="fa fa-eye"></i> Hide Image</button>
					
				</span>
			</div>
		</div>
		<div id="tabel" class="table table-responsive">
			
		</div>
	</div>
</div>
<script type="text/javascript" src="<?=base_url('assets/js/js.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/form.js');?>"></script>
<script type="text/javascript">
	$(document).ready(function  () {
		$('#tabel').load('<?php echo base_url("pxadmin/tabel_paket") ;?>');
		
		$('#cari').keyup(function  () {
			var cari=$(this).val();
			
			$.post('<?php echo base_url("pxadmin/search_paket"); ?>',{cari:cari},function  (data) {
				$('#tabel').html(data);
			});
		});

		function reset() {
			$('#nomor').load('<?php echo base_url("pxadmin/nomorPaket"); ?>');
			var kosong='';
			$('.form-control').val(kosong);
		}
		reset()
		$('.reset').click(function  () {
			reset()
		})
	})
</script>
<script type="text/javascript">
		var main =function  () {
			$('#upload').on('submit',function  (e) 
			{

				var kosong='';
				e.preventDefault();
				$(this).ajaxSubmit(
				{
					beforeSend:function  ()
					 {
						$('#prog').show();
						$('#prog').attr('value','0');
					},
					uploadProgress:function  (event,position,total,percentComplete) 
					{
						$('#prog').attr('value',percentComplete);
						$('#persen').html(percentComplete+'%');

					},
					success:function  (data) 
					{
						$('#pesan').html(data);
						$('#pesan').show().delay(1000).hide();
						$('#prog').hide();
						$('.form-control').val(kosong);
						$('#nomor').load('<?php echo base_url("pxadmin/nomorPaket"); ?>')					
						$('#tabel').load('<?php echo base_url("pxadmin/tabel_paket") ;?>');			
						return false;
					}

				});
				
			})

			
		};
		$(document).ready(main);
	</script>
	

<script type="text/javascript">
	$('.hideImage').click(function  () {
		$('.gambar').toggle();
	})
</script>