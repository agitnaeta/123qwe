<table class="table table-responsive table-bordered" id="myTable">
<thead class="bg-primary">
	<th><p href="#" id="memberid"> Member ID</p> </th>
	<th><p href="#" id="memberid"> Sisa Deposit</p> </th>
	<th><p href="#" id="deposit.kode_paket"> Nama Paket </p> </th>
	<th><p href="#" id="tanggal_expired"> Sisa Hari </p> </th>
	<th><p href="#" id="sisa_download"> Sisa Download</p> </th>
	<th><p href="#" id="status"> Status</p> </th>
	<th><p href="#" id="status"> Aksi</p> </th>
</thead>
<tbody>
<?php foreach ($deposit->result() as $row):?>
	<tr>
		<td><?=$row->memberid;?></td>
		<td><?=rupiah($row->sisa_deposit);?></td>
		<td><?=$row->nama_paket;?></td>
		<td><?=$row->tanggal_expired;?></td>
		<td><?=$row->sisa_download;?></td>
		<td><?=yesno($row->status,"Active","Non Active");?></td>
		<td>
			<a id="<?=$row->id_deposit;?>" title="Edit" href="#" class="edit btn btn-default"><i class='fa fa-edit'></i></a>
			<a id="<?=$row->id_deposit;?>" title="Hapus" href="#" class="delete btn btn-default"><i class='fa fa-remove'></i></a>
		</td>
	</tr>
<?php endforeach;?>	
</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function  () {

		$('#myTable').DataTable( {
	        "scrollY":        "500px",
	        "scrollCollapse": true,
	        "paging":         false
	    });

		$('.edit').click(function  () {
			var id_deposit=$(this).attr('id');
			$.post('<?php echo base_url("pxadmin/getDataDeposit") ?>',{id_deposit:id_deposit},function  (data) {
				// $('#pesan').html(data);
				var obj=JSON.parse(data);
				$('#f_member_id').val(obj[0].memberid);
				$('#f_id_deposit').val(obj[0].id_deposit);
				$('#f_kode_paket').val(obj[0].kode_paket);
				$('#f_tanggal_expired').val(obj[0].tanggal_expired);
				$('#f_sisa_download').val(obj[0].sisa_download);
				$('#f_status').val(obj[0].status);
			})
		})

		$('.delete').click(function  () {
			var id_deposit=$(this).attr('id');
			if (confirm("Are You Sure To Delete Your user deposit?")) {
				$.post('<?php echo base_url("pxadmin/delete_deposit");?>',{id_deposit:id_deposit},function (data) {
					$('#pesan').html(data);
					$('#pesan').addClass('alert alert-success text-center');
					$('#pesan').show().delay(10000).fadeOut();
					$('#table').load('<?php echo base_url("pxadmin/table_deposit");?>'); 
				});
			}
			else{
				return false;
			};
		})
		
		$('.sort').click(function  () {
			var sort=$(this).attr('id');
			$.post('<?php echo base_url("pxadmin/sort_deposit");?>',{sort:sort},function  (data) {
				$('#table').html(data);
			})
		})
	
	})
</script>