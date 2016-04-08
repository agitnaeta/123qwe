<div class='bg-success' id='pesan'></div>
<table class="table table-striped">
	<thead>
		
		<th>File Name</th>
		<th>Url</th>
		<th class="text-center"></th>
	</thead>
	<tbody>
	<?php foreach ($file->result() as $row):?>
		<tr>
			
			<td><?=$row->name;?></td>
			<td><?=base_url("document/$row->file_url");?></td>
			<td width="20%" class="text-right">
				<a href='#'  title="Set File" class="lock btn btn-default" id="<?=$row->id;?>"><i class='fa fa-lock'></i></a>
				<a  title="Download" class="donwload btn btn-default" href="<?php echo base_url("document/$row->file_url");?>"><i class='fa fa-download'></i></a>
				<a href='#'   title="Remove" class="remove btn btn-default" id="<?=$row->id;?>"><i class='fa fa-remove'></i></a>
				
			</td>
		</tr>
	<?php endforeach;?>
	</tbody>
</table>

<script type="text/javascript">

	$('.lock').click(function  () {
		var id= $(this).attr('id');
		$.post('<?php echo base_url("pxadmin/setFile");?>',{id:id},function  (data) {
			$('#pesan').html(data);
			
		})
	})
</script>
<script type="text/javascript">
	//hapus
		$('.remove').click(function  () {
			 if (confirm("Are you sure?")) {
		       	 var file=$(this).attr('id');
				$.post('<?php echo base_url("pxadmin/deletefile") ?>',{file:file},function  (data) {
				$('#persen').html(data);
				$('#tabel').load('<?php echo base_url("pxadmin/tabelFile");?>');
			})

		    }
		    return false;
		})
</script>
