<style type="text/css">
	.container
	{
		zoom:90%;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					Upload Form
					<div class="pull-right" >
							 <progress  id='prog' max='100' min='0' style='display: ; width=100%';></progress>
							 <span id='persen'></span>
					</div>
				</div>
				<form id="upload" method="post" action="<?=base_url('pxadmin/uploadfile');?>" enctype="multipart/form-data">
					<div class="panel-body">
						<label>File Name</label>
						<input class="form-control" name="name">
						<label>File</label>
						<input class="form-control" name="userfile" type="file">
						<br>
						<button type="submit" class="btn btn-default"> <i class='fa fa-upload'></i> Upload</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-8">
		<div class="alert alert-info">
			<div class="input-group">
				<input class="form-control" type="text" name="search" id="search" placeholder="Search Something...">
				<span class='input-group-btn'>
					<button class="btn btn-primary"> Search</button>
					
					<button id="refresh" class="btn btn-success"> Refresh</button>
				</span>
			</div>
		</div>
			<div id="tabel"></div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?=base_url('assets/js/js.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/form.js');?>"></script>
<script type="text/javascript">
	$(document).ready(function  () {
		var kosong="";
		$('#tabel').load('<?php echo base_url("pxadmin/tabelFile");?>');
		$('#refresh').click(function  () {
			$('.form-control').val(kosong);
			$('#tabel').load('<?php echo base_url("pxadmin/tabelFile");?>');
		})

		


	})
</script>
<script type="text/javascript">
		var main =function  () {
			$('#upload').on('submit',function  (e) 
			{
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
						$('#persen').html(data);
						$('#prog').hide();
						$('.form-control').val('');
						$('#tabel').load('<?php echo base_url("pxadmin/tabelFile") ;?>');
						return false;
					}

				});
				
			})
		};
		$(document).ready(main);
</script>
<script type="text/javascript">
	$('#search').keyup(function  () {
		var search=$(this).val();
		$.post('<?php echo base_url("pxadmin/searchFile");?>',{search:search},function  (data) 
		{
			$('#tabel').html(data);
		})
	})
</script>