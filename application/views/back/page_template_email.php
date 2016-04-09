<title>Pixtox | Setting Template Email</title>
<div class="container">
	<div class="row">
	<div class="col-md-12">
	<div class="panel panel-default">
			<div class="panel-heading">
			<div class="btn-group">
			  <a href="<?php echo base_url("pxadmin");?>" type="button" class="btn btn-primary"><i class="fa fa-home"></i> Panel</a>
			  <a href="<?php echo base_url("email/page_templateEmail");?>" type="button" class="btn btn-warning"><i class="fa fa-file-o"></i> Template</a>
			  <a href="<?php echo base_url("email/page_settingMail");?>" type="button" class="btn btn-danger"><i class="fa fa-cog"></i> Setting</a>
			</div>
	</div>
	</div>
	</div>
	<div class="col-md-12">
		<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Email Template Editor</h3>
		</div>
		<div class="panel-body">
		<div id="pesan"></div>
		<label>Template Email</label>
		<select class="form-control" id="templateName">
				<option value="0">-Pilih Template-</option>
			<?php foreach ($type->result() as $row):?>
				<option value="<?=$row->id;?>"><?=$row->nama;?></option>
			<?php endforeach;?>
		</select>
		<input id="nama" name="nama" type="hidden"></input>
		<textarea id="isi"></textarea> 
		</div>
		<div class="panel-footer">
			<button id="simpan" class="btn btn-warning"> Simpan</button>
		</div>
	</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function (data) {
		$('#isi').hide()
					
		// getTemplate
		$('#templateName').change(function () {
			var id=$(this).val();
			$.get('<?php echo base_url("email/getTemplate");?>/'+id+'',function (data) {
				var o=JSON.parse(data)
				if (o.isi==0) {
					var editor = CKEDITOR.instances['isi'];
					if (editor) {editor.destroy(true); }
						$('#nama').val(o.nama)
						$('#isi').hide()
				}else{
					$('#nama').val(o.nama)
					var editor = CKEDITOR.instances['isi'];
					if (editor) {editor.destroy(true); }
				 	document.getElementById('isi').value = o.isi;
				 	CKEDITOR.replace( 'isi' );
				}	
			})
		})

		// updateTemplate
		$('#simpan').click(function () {
			var  id=$('#templateName').val();
			var  nama=$('#nama').val();
			var  isi=CKEDITOR.instances.isi.getData();
			$.post('<?php echo base_url("email/updateTemplate");?>',{id:id,isi:isi,nama:nama},function (data) {
				if (data==1) {
					$('#pesan').html('<div class="alert alert-success"> Berhasil Di Update</div>').show().delay(3000).fadeOut('slow')
				}
				else{
					$('#pesan').html('<div class="alert alert-danger">Gagal #'+data+'</div>').show().delay(3000).fadeOut('slow')
				}
			})
		})

	})
</script>