<div class="container-fluid">
	<div class="row">
		<div class="col-md-12"><h3>FREE IMAGE LIST</h3><hr></div>

		
		<div class="col-md-4">
			<form method="post" action="<?php echo base_url("pxadmin/uploadFree");?>">
			<div class="panel panel-default">
				<div class="panel-heading">
					Upload  Free Image
				</div>
				<div class="panel-body">
					<label>Title</label>
					<input  type="text" name="title" id="title" class="form-control">
				
					<label>Foto</label>
					<input  type="file" name="usefile" id="userfile" class="form-control">
					<br>
					<button class="btn btn-prymary"><i class="fa fa-upload"></i> Upload</button>
				</div>
			</div>
			</form>
		</div>
		<div id="table" class="col-md-8">
			
		</div>
	</div>
</div>	
<script type="text/javascript" src="<?=base_url('assets/js/js.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/form.js');?>"></script>
<script type="text/javascript">
		$(document).ready(function  () {
			$('#table').load('<?php echo base_url("pxadmin/table_freeImage");?>');
			return false;
		})
</script>

