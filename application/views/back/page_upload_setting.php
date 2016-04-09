<div class="container">
	<div class="row">
		<div class="col-md-6 ">
			<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Upload Setting <span id='pesan'></span></h3>
			</div>
			<?php foreach ($imgset->result() as $row):?>
			<div class="panel-body">
			<form method="post" action="/" id="form_upload">
				<label>Max Size (kb)</label>
				<input class="form-control" type="number" name="max_size" value=<?=$row->max_size;?>>
				<label>Max Width (pixel)</label>
				<input class="form-control" type="number" name="max_width" value=<?=$row->max_width;?>>
				<label>Max Height (pixel)</label>
				<input class="form-control" type="number" name="max_height" value=<?=$row->max_height;?>>
				<label>Min Size (kb)</label>
				<input class="form-control" type="number" name="min_size" value=<?=$row->min_size;?>>
				<label>Min Width (pixel)</label>
				<input class="form-control" type="number" name="min_width" value=<?=$row->min_width;?>>
				<label>Min Height (pixel)</label>
				<input class="form-control" type="number" name="min_height" value=<?=$row->min_height;?>>

			</form>
			</div>
			<div class="panel-footer">
				<button class=" save btn btn-primary"><i class='fa fa-save'></i> Set</button>
			</div>
		<?php endforeach;?>
		</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function  () {
		$('.save').click(function  () {
			$.post('<?php echo base_url("pxadmin/setUploadSetting");?>',$('#form_upload').serialize(),function  (data) {
				$('#pesan').html(data);
				$('#pesan').addClass('bg-success');
				$('#pesan').show().delay(3000).fadeOut('slow');
			})
		})
	})
</script>