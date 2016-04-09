<div class="container">
<div class="col-md-12">
<h2>Tabel Kategory</h2>
<hr>
</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading"> Kategory Form</div>
			<form method="post" action="#" id="f_kategori">
			<div class="panel-body">
				<label>Kategori</label>
				<input class="form-control" name="f_nama" id="f_nama">
				<input type="hidden" class="form-control" name="f_id" id="f_id">
				<label>Jenis</label>
				<select class="form-control" name="f_type" id="f_type">
					<option value="vektor"> Vektor</option>
					<option value="photo"> Photo</option>
				</select>
			</div>
			<div class="panel-body">
			<br>
				<a id="save" href="#" class="save btn btn-block btn-default">
					<i class="fa fa-save"></i> Add
				</a>
				<a href="#" class="update btn btn-block btn-default">
					<i class="fa fa-save"></i> Update
				</a>
			</div>
			</form>
		</div>
	</div>
	<div class="col-md-8">
	<div class="panel-body bg-info">
		Jumlah Kategory : <?=count($jumlah->result());?>
	</div>
	<div class="alert alert-info">
		<div class="input-group">
			<input id="search" class="form-control" name="search" placeholde='Search for...'>
			<div class="input-group-btn">
				<button class="btn btn-primary">
					<i class="fa fa-search"></i> Search
				</button>
			</div>
		</div>
	</div>
		<div class="table table-resposive" id="table"></div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function  () {
		var kosong='';
		$('#table').load('<?php echo base_url("pxadmin/tabel_kategori"); ?>');
		$('.update').hide()

		$('.save').click(function  () {
			$.post('<?php echo base_url("pxadmin/add_kategori");?>',$('#f_kategori').serialize(),function  (data) {
				$('#pesan').html(data);
				$('#pesan').addClass('alert alert-success text-center');
				$('#pesan').show().delay(5000).fadeOut('slow');
				$('.form-control').val(kosong);
				$('#table').load('<?php echo base_url("pxadmin/tabel_kategori"); ?>');


			})
		});

		$('.update').click(function  () {
			$.post('<?php echo base_url("pxadmin/update_kategori") ?>',
					$('#f_kategori').serialize(),
					function  (data) {
							$('#pesan').html(data);
							$('#pesan').addClass('alert alert-success text-center');
							$('#pesan').show().delay(5000).fadeOut('slow');
							$('.form-control').val(kosong);
							$('#table').load('<?php echo base_url("pxadmin/tabel_kategori"); ?>');
					})
			$('#save').show(); 
		$('.update').hide(); 
		})

		$('#search').keyup(function  () {
					var search=$(this).val();
					if(search.length>0)
					{
						$.post('<?php echo base_url("pxadmin/search_kategori");?>',{search:search},function  (data) {
							$('#table').html(data);
						})
					}
					else
					{
						$('#table').load('<?php echo base_url("pxadmin/tabel_kategori"); ?>')
					}
		})

				$('#btn_search').keyup(function  () {
					var search=$('#search').val();
					$.post('<?php echo base_url("pxadmin/search_kategori");?>',{search:search},function  (data) {
							$('#table').html(data);
					})
		})

	})
</script>













