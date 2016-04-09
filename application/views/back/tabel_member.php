<div class="table-responsive">
	<table class="table table-responsive table-bordered table-condensed" id="myTable">
		<thead class="bg-primary">
				<th class="sort" id="memberid">Member ID</th>
				<th id="username" >Username</th>
				<th id="email">Email</th>
				<th id="no_identitas">No Identitas</th>
				<th id="tanggal_daftar">Tanggal Daftar</th>
				<th id="tanggal_lahir">Nama</th>
				<th>Aksi</th>
			</thead>
			<tbody>
			<?php foreach ($member->result() as $row): ?>
				<tr>
					<td><?=$row->memberid;?></td>
					<td><?=$row->username;?></td>
					<td><?=$row->email;?></td>
					<td><?=$row->no_identitas;?></td>
					<td><?=$row->tanggal_daftar;?></td>
					<td><?=$row->nama;?></td>
					<td>
						<a class="btn btn-default detail" title="Detail" href="#" id="<?=$row->memberid;?>"><i class='fa fa-search'></i></a>
						<a class="btn btn-default edit" title="Edit" href="#" id="<?=$row->memberid;?>"><i class='fa fa-pencil'></i></a>
						<a class="btn btn-default delete" title="Delete" href="#" id="<?=$row->memberid;?>"><i class='fa fa-remove'></i></a>
					</td>
				</tr>
			<?php endforeach ;?>
			</tbody>
	</table>
</div>
<script type="text/javascript">

	$(document).ready(function  () {
		$('#myTable').DataTable( {
	        "scrollY":        "500px",
	        "scrollCollapse": true,
	        "paging":         false
	    });

		$('.edit').click(function  () {
			var memberid=$(this).attr('id');
			$.post('<?php echo base_url("pxadmin/getMember");?>',{memberid:memberid},function  (data) {
				var obj=JSON.parse(data);
				$('#username').val(obj[0].username);
				$('#no_identitas').val(obj[0].no_identitas);
				$('#nama').val(obj[0].nama);
				$('#tanggal_lahir').val(obj[0].tanggal_lahir);
				$('#tanggal_daftar').val(obj[0].tanggal_daftar);
				$('#email').val(obj[0].email);
				$('#memberid').val(obj[0].memberid);
				$('#nama_paket').html(obj[0].nama_paket);
				$('#paket').val(obj[0].paket);
			});
			$('.lock').prop( "disabled", false );

			$('.hideUpdate').show();
			$('.saveMode').hide();
			$('.daftar').hide();
		})


		//hapus
		$('.delete').click(function  () {
			 if (confirm("Are you sure?")) {
		        var memberid=$(this).attr('id');
				$.post('<?php echo base_url("pxadmin/deleteMember") ?>',{memberid:memberid},function  (data) {
					$('#pesan').html(data);
					$('#tabel').load('<?=base_url("pxadmin/tabel_member");?>');
				})

		    }
		    return false;
		})
		$('.detail').click(function  () {
			var memberid=$(this).attr('id');
			$('#panel').hide();
			$('.alert').hide();
			$('#tabel').load('<?=base_url("pxadmin/detailMember/'+memberid+'");?>');
			return false;
			
		})


		//search
		$('#search').keyup(function  () {
			var cari=$('#search').val();
			if (cari.length>3) {
				$.post('<?php echo base_url("pxadmin/searchMember"); ?>',{cari:cari},function  (data) {
				$('#tabel').html(data);
				});
			};
			
		})

		$('#display').change(function  () {
			var jumlah=$(this).val()
				$.post('<?php echo base_url("pxadmin/showCount");?>',{jumlah:jumlah},function  (data) {
				$('#tabel').html(data);
				})
				return false;
		})

		$('.sort').click(function  () {
			var sort=$(this).attr('id');
			$.post('<?php echo base_url("pxadmin/orderMember");?>',{sort:sort},function  (data) {
				$('#tabel').html(data);
				})
			return false;
		})

		$('.refresh').click(function  () {
			$('.lock').prop( "disabled", true );
			$('.hideUpdate').hide();
			$('#tabel').load('<?=base_url("pxadmin/tabel_member");?>');
			return false;
		})

	})
</script>