<table class="table table-responsive" id="myTable">
	<thead class="bg-primary">
		<th>ID Foto</th>
		<th>Jumlah</th>
		<th>Contributor ID</th>
		<th class="text-center">Image</th>
	</thead>
	<tbody>
	<?php foreach($download->result() as $row):?>
		<tr>
			<td><?=$row->id_foto;?></td>
			<td><?=$row->jumlah;?></td>
			<td><?=$row->id_contributor;?></td>
			<td>
				<a target="__blank" href="<?php echo base_url("upload/watermark/$row->watermark");?>">
					<img width="100" height="auto" src="<?php echo base_url("upload/mini/$row->mini");?>">
				</a>
			</td>
		</tr>
	<?php endforeach;?>	
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function () {
		$('#myTable').DataTable( {
	        "scrollY":        "500px",
	        "scrollCollapse": true,
	        "paging":         false
	    });
	})
</script>