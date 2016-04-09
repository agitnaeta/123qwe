<table class="table table-responsive" id="myTable">
		<thead class="bg-primary">
				<th><p id="no_invoice" href='#'>#No Invoice</p></th>
				<th><p id="subject" href='#'>Subject</p></th>
				<th><p id="lama_hari" href='#'>Lama Hari</p></th>
				<th><p id="harga" href='#'>Harga</p></th>
				<th><p id="kapasitas_download" href='#'>Kapasitas Download</p></th>
				<th><p id="tanggal_deposit" href='#'>Tanggal Pemesanan</p></th>
				<th><p id="tanggal_deposit" href='#'>Tanggal Pemesanan</p></th>
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
				<td><?=dateindo($row->tanggal_deposit);?></td>
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