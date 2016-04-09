<table class="table table-striped table-responsive table-condensed" id="myTable">
	<thead class="bg-primary">
		<th><p id="no_invoice"> No Invoice</th>
		<th><p id="no_rek_tujuan"> No Rekening Tujuan</p></th>
		<th><p id="no_pengirim"> No Rekening Pengirim</p></th>
		<th><p id="nama_pengirim"> Nama Pengirim</p></th>
		<th><p id="tanggal_kirim"> Tanggal Kirim</p></th>
		<th><p id=""> Status</p></th>
		<th><p id="waktu"> Waktu</p></th>
		<th><p> Action</p></th>
	</thead>

	<?php foreach ($konfirmasi->result() as $row): ?>
		<tr>
			<td><?=$row->no_invoice;?></td>
			<td><?=$row->no_rek_tujuan;?></td>
			<td><?=$row->no_pengirim;?></td>
			<td><?=$row->nama_pengirim;?></td>
			<td><?=$row->tanggal_kirim;?></td>
			<td><?=yesno($row->status,"Acc","Waiting");?></td>
			<td><?=$row->waktu;?></td>
			<td>
				 <a id="modal-<?=$row->idkonfirmasi;?>" href="#modal-container-<?=$row->idkonfirmasi;?>" role="button" class="btn detail btn-default" data-toggle="modal"><i class='fa fa-search'></i></a>
				 <a id="<?=$row->memberid;?>" title="Lihat User" href="#" class="detail btn btn-default" data-toggle="modal" data-target="#myModal">
						<i class='fa fa-user'></i>
					</a>
				<a href="#" id="<?=$row->idkonfirmasi;?>" class="acc btn btn-default"><i class='fa fa-check'></i></a>
				<a href="#" id="<?=$row->idkonfirmasi;?>" class="delete btn btn-default"><i class='fa fa-remove'></i></a>
			</td>
		</tr>
	<?php endforeach;?>
</table>
	<?php foreach ($konfirmasi->result() as $row):?>
			<div class="modal fade " id="modal-container-<?=$row->idkonfirmasi;?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								×
							</button>
							<h4 class="modal-title" id="myModalLabel">
								<h3>#<?=$row->idkonfirmasi;?></h3>
							</h4>
						</div>
						<div class="modal-body">
							<div class="row">	
								<div class="pesan"></div>
								<div class="col-md-8">
									<div class="img img-responsive">
										<img class="img img-responsive" src="<?php echo base_url("upload/konfirmasi/$row->bukti");?>">
									</div>
								</div>
								<div class="col-md-4">
									<label>No Invoice</label>
									<p><?=$row->no_invoice;?></p>
									<label>No Rekening Tujuan </label>
									<p><?=$row->no_rek_tujuan;?></p>
									<label>No Pengirim</label>
									<p><?=$row->no_pengirim;?></p>
									<label>Nama Pengirim</label>
									<p><?=$row->nama_pengirim;?></p>
									<label>Tanggal Kirim</label>
									<p><?=$row->tanggal_kirim;?></p>
									<label>Waktu</label>
									<p><?=$row->waktu;?></p>
									<label>Jumlah</label>
									<p>Rp. <?=$row->jumlah_bayar;?></p>
								</div>
							</div>							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default link" data-dismiss="modal">
								Close
							</button> 
							<button id="<?=$row->idkonfirmasi;?>" type="button" class="acc btn btn-primary">
								Accept
							</button>
						</div>
					</div>
				</div>
			</div>
<?php endforeach;?>

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
		 // detailAkun
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

		$('.delete').click(function  () {
			var idkonfirmasi=$(this).attr('id');
			if (confirm("Are you sure?")) {
				$.post('<?php echo base_url("pxadmin/delete_konfirmasi");?>',{idkonfirmasi:idkonfirmasi},function  (data) {
				$('#table').load('<?php echo base_url("pxadmin/table_konfirmasi"); ?>');
				$('#pesan').html(data);
				$('#pesan').addClass('text-center alert');
				$('#pesan').show().delay(5000).fadeOut('slow');
				})
			}
			else
			{
				return false;
			};
		})


		// accept
		$('.acc').click(function  () {
			var idkonfirmasi=$(this).attr('id');
			$.post('<?php echo base_url("pxadmin/acc_konfirmasi");?>',{idkonfirmasi:idkonfirmasi},function  (data) {
				$('.pesan').html(data);
				$('.pesan').addClass('text-center alert');
				// $('.pesan').show().delay(5000).fadeOut('slow');
			})
		})
	})
</script>