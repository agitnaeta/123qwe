<table class=" table table-striped table-responsive" id="tableBank">
	<thead class="bg-primary">
		<th>Nama Bank</th>
		<th>No Rekening</th>
		<th>Nama Pemilik</th>
		<th>
			Action
		</th>
	</thead>
	<tbody>
	<?php foreach ($bank->result() as $row):?>
		<tr id="" title="<?=$row->nama_pemilik;?>">
			<td><?=$row->nama_bank;?></td>
			<td><?=$row->no_rekening;?></td>
			<td><?=$row->nama_pemilik;?></td>
			<td>
				<a id="<?=$row->idbank;?>" href="#" class="edit btn btn-default"><i class='fa fa-edit'></i></a>
				<a id="<?=$row->idbank;?>" href="#" class="delete btn btn-default"><i class='fa fa-remove'></i></a>
			</td>
		</tr>
	<?php endforeach;?>	
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function  () {
		$('#tableBank').DataTable( {
	        "scrollY":        "500px",
	        "scrollCollapse": true,
	        "paging":         false
	    });

		$('.edit').click(function  () {
			var idbank=$(this).attr('id');
			$.post('<?php echo base_url("pxadmin/getDataBank");?>',{idbank:idbank},function  (data) {
				var obj=JSON.parse(data);
				$('#f_nama_bank').val(obj[0].nama_bank)
				$('#f_idbank').val(obj[0].idbank)
				$('#f_no_rekening').val(obj[0].no_rekening)
				$('#f_nama_pemilik').val(obj[0].nama_pemilik)
			})
		})

		$('.delete').click(function  () {
			var idbank=$(this).attr('id');
			if (confirm("Are you sure delete this data?")) {
				$.post('<?php echo base_url("pxadmin/delete_bank");?>',{idbank:idbank},function  (data) {
				$('.pesan').html(data);
				$('.pesan').addClass('alert alert-success text-center');
				$('.pesan').show().delay(5000).fadeOut('slow');
				$('#table').load('<?php echo base_url("pxadmin/table_bank");?>');
				})
			} else {return false;};
		})
	})
</script>