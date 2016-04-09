<table class="table table-responsive" id="tableInvoice">
		<thead class="bg-primary">
				<th><p id="no_invoice" href='#'>#No Invoice</p></th>
				<th><p id="subject" href='#'>Subject</p></th>
				<th><p id="lama_hari" href='#'>Lama Hari</p></th>
				<th><p id="harga" href='#'>Harga</p></th>
				<th><p id="kapasitas_download" href='#'>Kapasitas Download</p></th>
				<th><p id="tanggal_deposit" href='#'>Tanggal Pemesanan</p></th>
				<th><p id="detail" href='#'>Detail Akun</p></th>
		</thead>
		<tbody>
		<?php foreach($invoice->result() as $row):?>
			<tr>
				<td><?=$row->no_invoice;?></td>
				<td><?=$row->subject;?></td>
				<td><?=$row->lama_hari;?></td>
				<td><?=$row->harga;?></td>
				<td><?=$row->kapasitas_download;?></td>
				<td><?=dateindo($row->tanggal_deposit);?></td>
				<td>
					<a id="<?=$row->memberid;?>" title="Lihat User" href="#" class="detail btn btn-default" data-toggle="modal" data-target="#myModal">
						<i class='fa fa-user'></i> LIhat Detail 
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
		
		$('#tableInvoice').DataTable( {
	        "scrollY":        "500px",
	        "scrollCollapse": true,
	        "paging":         false
	    });
		
		$('.sort').click(function  () {
			var sort=$(this).attr('id');
			$.post('<?php echo base_url("pxadmin/sort_invoice");?>',{sort:sort}, function  (data) {
				$('#table').html(data);
			})
		})
		$('#reload').click(function  () {
			$('#konten').load('<?php echo base_url("pxadmin/page_invoice");?>');
		})
	})
</script>