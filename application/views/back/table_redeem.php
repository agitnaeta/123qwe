<table class="table table-striped table-bordered" id="tableRedeem">
	<thead class="bg-primary">
		<th>Member ID</th>
		<th>Nominal</th>
		<th>Tanggal Rendeem</th>
		<th>Nomor Rekening</th>
		<th>Nama Rekening</th>
		<th class="text-center">Action</th>
	</thead>
	<tbody>
	<?php  foreach ($redeem->result() as $row):?>
		<tr>
			<td><?=$row->memberid;?></td>
			<td><?=rupiah($row->nominal);?></td>
			<td><?=dateindo($row->tanggal_redeem);?></td>
			<td><?=$row->no_rekening;?></td>
			<td><?=$row->nama_rekening;?></td>
			<td class="text-center">
				
				<a data-id='<?=$row->idredeem;?>' href="#" class="acc btn btn-default">
					<i class='fa fa-check'></i>
				</a>
				<a data-id='<?=$row->idredeem;?>' class="remove btn btn-danger" href="#">
					<i class='fa fa-remove'></i>
				</a>
			</td>
		</tr>
	<?php endforeach;?>	
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function  () {

		  	$('#tableRedeem').DataTable( {
		        "scrollY":        "500px",
		        "scrollCollapse": true,
		        "paging":         false
		    } );

		$('.remove').click(function  () {
			var idredeem=$(this).attr('data-id');
			if (confirm("Apakah Anda Yakin Ingin Menghapus Data Ini?")) {
				$.post('<?php echo base_url("pxadmin/delete_redeem");?>',{idredeem:idredeem},function  (data) {
					$('.pesans').html(data);
					$('.pesans').addClass('alert alert-success text-center');
				})
			}
			else
			{
					return false
			};
		})
		$('.acc').click(function  () {
			var idredeem=$(this).attr('data-id');
			if (confirm("Apakah Anda Yakin Ingin Acc Data Ini?")) {
				$.post('<?php echo base_url("pxadmin/acc_redeem");?>',{idredeem:idredeem},function  (data) {
					$('.pesans').html(data);
					$('.pesans').addClass('alert alert-success text-center');
				})
			}
			else
			{
					return false
			};
		})
	})
</script>