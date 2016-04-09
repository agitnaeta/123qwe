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
			<a id="<?=$row->memberid;?>" title="Lihat User" href="#" class="detail btn btn-default" data-toggle="modal" data-target="#myModal">
				<i class='fa fa-user'></i>
			</a>
			<a id="<?=$row->id_deposit;?>" title="Hapus" href="#" class="delete btn btn-default"><i class='fa fa-remove'></i></a>
		</td>
	</tr>
<?php endforeach;?>	
</tbody>
</table>

<!-- Modal Detail akun -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail Pemilik Deposit "<span class="username"></span>" </h4>
      </div>
      <div class="modal-body">
        <table class="table tbl-striped tbl-condensed">
        	<tr>
        		<td colspan="2">
        			<img width="300px" height="auto" id="foto" class="img img-responsive img-tengah">
        		</td>
        	</tr>
        	<tr><td>ID</td><td id="det_memberid"></td></tr>
        	<tr><td>username</td><td class="username"></td></tr>
        	<tr><td>no_identitas</td><td id="no_identitas"></td></tr>
        	<tr><td>nama</td><td id="nama"></td></tr>
        	<tr><td>email</td><td id="email"></td></tr>
        	<tr><td>alamat</td><td id="alamat"></td></tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
	$(document).ready(function  () {

		$('#myTable').DataTable( {
	        "scrollY":        "500px",
	        "scrollCollapse": true,
	        "paging":         false
	    });

		// detailMember
		$('.detail').click(function () {
			var memberid=$(this).attr('id');
			$.get('<?php echo base_url("pxadmin/detailAkun");?>/'+memberid+'',function (data) {
				var o=JSON.parse(data)
				$('#foto').attr("src",o.foto);
				$('#det_memberid').html(o.memberid);
				$('.username').html(o.username);
				$('#no_identitas').html(o.no_identitas);
				$('#nama').html(o.nama);
				$('#email').html(o.email);
				$('#alamat').html(o.alamat);
			})
		})

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