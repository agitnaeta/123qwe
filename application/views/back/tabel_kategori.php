<div id='pesan'></div>
<table class="table table-bordered table-condensed table-striped">
	<thead class="bg-primary">
		<th colspan="4">
			Menampilkan : <?=count($kategori->result());?> Data
		</th>
	</thead>
	<thead class="bg-info">
		<th>No</th>
		<th class="sort" id="type">Type</th>
		<th class="sort" id="name">Kategory Name</th>
		<th class="text-center">Action</th>
	</thead>
	<tbody>
	<?php $no=1; foreach($kategori->result() as $row):?>
		<tr>
			<td><?=$no++;?></td>
			<td><?=$row->type;?></td>
			<td><?=$row->nama;?></td>
			<td class="text-center">
				<a id="<?=$row->id;?>" href="#" class="edit btn btn-default"><i class='fa fa-edit'></i></a>
				<a id="<?=$row->id;?>" href="#" class="delete btn btn-default"><i class='fa fa-remove'></i></a>
			</td>
		</tr>
	<?php endforeach;?>	
	</tbody>
</table>
<script type="text/javascript" src="<?php echo base_url("assets/js/js.js"); ?>"></script>
<script type="text/javascript">
	$('.delete').click(function  () {
			var id=$(this).attr('id');
			if (confirm(" Are You Sure ? ")) 
			{
				$.post('<?php echo base_url("pxadmin/delete_kategori");?>',{id:id},function  (data) {
				$('#pesan').html(data);
				$('#pesan').addClass('alert alert-success text-center');
				$('#pesan').show().delay(1000).fadeOut('slow');
				$('#table').load('<?php echo base_url("pxadmin/tabel_kategori"); ?>');
				})
			}
			else
			{
					return false;
			};
		});
	$('.edit').click(function  () {
		var id=$(this).attr('id');
		$.post('<?php echo base_url("pxadmin/getKategori"); ?>',
				{id:id},
				function  (data) {
					//$('#pesan').html(data);
					
					var obj=JSON.parse(data);
					$('#f_type').val(obj[0].type)
					$('#f_nama').val(obj[0].nama)
					$('#f_id').val(obj[0].id)
				});
		$('#save').hide(); 
		$('.update').show(); 
		
	});


</script>