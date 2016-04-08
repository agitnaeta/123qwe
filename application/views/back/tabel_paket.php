<table class="table table-responsive">
	<thead class="bg-info">
		<th><a class="sort" href="#" id="kode_paket">Kode Paket</a></th>
		<th><a class="sort" href="#" id="nama_paket">Nama Paket </a></th>
		<th><a class="sort" href="#" id="lama_hari">Lama Hari</a></th>
		<th><a class="sort" href="#" id="kapasitas_download">Kapasitas Download</a></th>
		<th><a class="sort" href="#" id="harga">Harga</a></th>
		<th class="gambar"><a class="sort  " href="#" id="gambar">Gambar</a></th>
		<th><a class="sort" href="#" id="">Action</a></th>
	</thead>
	<tbody>
	<?php foreach ($paket->result() as $row):?>
		<tr id="<?=$row->kode_paket;?>" class="edit">
			<td><?=$row->kode_paket;?></td>
			<td><?=$row->nama_paket;?></td>
			<td><?=$row->lama_hari;?></td>
			<td><?=$row->kapasitas_download;?></td>
			<td><?=$row->harga;?></td>
			<td class="gambar">
				<img  width="100px" width="100" src="<?php echo base_url("assets/img/paket/$row->gambar");?>">
			</td>
			<td >
				<a href="#" id="<?=$row->kode_paket;?>" class="edit btn btn-default"><i  class="fa fa-edit"></i> </a>
				<a href="#" id="<?=$row->kode_paket;?>" class="delete btn btn-default"><i  class="fa fa-remove"></i> </a>
			</td>
		</tr>
	<?php endforeach ;?>
	</tbody>
</table>

<script type="text/javascript">
		$(document).ready(function  () {
			$('.sort').click(function  () {
				var sort=$(this).attr('id')
					$.post('<?php echo base_url("pxadmin/sort_paket");?>',{sort:sort},function  (data) {
						$('#tabel').html(data);
					})
			})
		})
</script>
<script type="text/javascript">
		$('.edit').click(function  () {
				var kode_paket=$(this).attr('id');
				$.post('<?php echo base_url("pxadmin/get_paket") ;?>',{kode_paket:kode_paket},function  (data) {
						var obj=JSON.parse(data);
						$('#f_kode_paket').val(obj[0].kode_paket);
						$('#nomor').html(obj[0].kode_paket);
						$('#f_nama_paket').val(obj[0].nama_paket);
						$('#f_harga').val(obj[0].harga);
						$('#f_lama_hari').val(obj[0].lama_hari);
						$('#f_kapasitas_download').val(obj[0].kapasitas_download);
				})
		})
</script>
<script type="text/javascript">
		$('.delete').click(function  () {
				var kode_paket=$(this).attr('id');
			if (confirm("Are You Sure")) {
				$.post('<?php echo base_url("pxadmin/delete_paket"); ?>',{kode_paket,kode_paket},function  (data) {
					$('#pesan').html(data);
					$('#pesan').show().delay(1000).fadeOut();
					$('#tabel').load('<?php echo base_url("pxadmin/tabel_paket") ;?>');
					$('#nomor').load('<?php echo base_url("pxadmin/nomorPaket"); ?>');
				})
			}
			else
			{
				return false;
			}
		})
</script>