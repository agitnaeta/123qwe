<div class="panel panel-default">
	<div class="panel-heading">
		Konfirmasi
	</div>
	<form id="upload" method="post" action="<?php echo base_url("member/do_konfirmasi");?>">
	<div class="panel-body">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="panel panel-default">
				<center>
					 <progress  id='prog' max='100' min='0' style='display:none ; width=100%';></progress>
					 <div class="pesan"></div>
				</center>
				
				<div class="panel-body">
					<label>No Invoice</label>

					<select name="no_invoice" class="form-control">
							
						<?php foreach($invoice->result() as $row):?>
							<option value="<?=$row->no_invoice;?>"><?=$row->no_invoice."(".($row->subject).")";?></option>
						<?php endforeach;?>
					</select>
					<label>No Rekening Tujuan </label>
					<select name="no_rek_tujuan" id="no_rek_tujuan" class="form-control">
						<?php foreach($bank->result() as $row):?>
							<option value="<?=$row->no_rekening;?>"><?=$row->nama_bank."(".($row->nama_pemilik." | ".$row->no_rekening).")";?></option>
						<?php endforeach;?>
					</select>
					
					<label>No Rekening Pengirim</label>
					<input min='0' type="text" name="no_pengirim" id="no_pengirim" class="form-control">
					<label>Nama (*Sesuai Buku Tabungan)</label>
					<input name="nama_pengirim" id="nama_pengirim" class="form-control">
					<label>Tanggal Kirim</label>
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
					<label>Waktu</label>
					<div class="form-inline">
					<select class="form-control" name="jam">
						<option>-Jam-</option>
						<?php for ($i=0; $i <=23 ; $i++):?>
							<option value="<?=$i;?>"><?=$i;?></option>
						<?php endfor;?>
					</select>
						<select class="form-control" name="menit">
						<option>-menit-</option>
						<?php for ($i=1; $i <=60 ; $i++):?>
							<option value="<?=$i;?>"><?=$i;?></option>
						<?php endfor;?>
					</select>
					</div>
					<label>Jumlah Bayar</label>
					<input min='0' type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control">
					<label>Bukti Bayar</label>
					<input type="file" name="userfile" class="form-control">
					<small>*Max Gambar 2 Mb (gif|jpg|png)</small>
					<br>
					<br>
					<button type="submit" class="btn btn-warning">
						<i class='fa fa-check'></i> Konfirmasi
					</button>
				</div>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
	</form>
</div>
<script type="text/javascript" src="<?=base_url("assets/js/js.js");?>"></script>
<script type="text/javascript" src="<?=base_url("assets/js/form.js");?>"></script>
<script type="text/javascript">
		var main =function  () {
			$('#upload').on('submit',function  (e) 
			{

				var isi=$('.form-control').val();

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
						$('.pesan').html(percentComplete+'%');

					},
					success:function(data) 
					{
						if (data=='Success') 
						{
							$('.pesan').removeClass('alert alert-danger text-center');
							$('.pesan').html('Konfirmasi Sukses Permintaan Anda Segera Di Proses');
							$('.pesan').addClass('alert alert-success text-center');
							$('#prog').hide();
							$('.form-control').val(kosong)
							return false;
						}
						else
						{
							$('.pesan').html(data);
							$('.pesan').removeClass('alert alert-success text-center');
							$('.pesan').addClass('alert alert-danger text-center');
							$('#prog').hide();
							return false;
						};
					}

				});
				
			})

			
		};
		$(document).ready(main);
	</script>