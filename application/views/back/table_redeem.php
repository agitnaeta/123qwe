<table class="table table-striped table-bordered" id="tableRedeem">
	<thead class="bg-primary">
		<th>Member ID</th>
		<th>Nominal</th>
		<th>Tanggal Rendeem</th>
		<th>Nomor Rekening</th>
		<th>Nama Rekening</th>
		<th>Status Redeem</th>
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
			<td><?=yesno($row->status,"<span class='text-success'>Accept</span>","<span class='text-danger'>Accept</span>");?></td>
			<td class="text-center">
				<a id="<?=$row->memberid;?>" title="Lihat User" href="#" class="detail btn btn-default" data-toggle="modal" data-target="#myModal">
				<i class='fa fa-user'></i>
			</a>
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

		  	$('#tableRedeem').DataTable( {
		        "scrollY":        "500px",
		        "scrollCollapse": true,
		        "paging":         false
		    } );



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