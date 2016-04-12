<table class="table table-responsive" id="myTable">
	<thead class="bg-primary">
		<th>ID Foto</th>
		<th>Username</th>
		<th>Jumlah</th>
		<th class="text-center">Image</th>
		<th class="text-center">Detail Download</th>
	</thead>
	<tbody>
	<?php foreach($download->result() as $row):?>
		<tr>
			<td><?=$row->id_foto;?></td>
			<td><?=$row->username;?></td>
			<td><?=$row->jumlah;?></td>
			<td>
				<a target="__blank" href="<?php echo base_url("upload/mini/$row->mini");?>">
					<img class="img-tengah" width="100" height="auto" src="<?php echo base_url("upload/mini/$row->mini");?>">
				</a>
			</td>
			<td class="text-center">
				<button id="<?=$row->id_foto;?>" class="detailDownload btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i> Daftar Download</button>
				<!-- <button  id="<?=$row->id_foto;?>" class="btn btn-default"><i class="fa fa-user"></i> Contributor</button> -->
			</td>
		</tr>
	<?php endforeach;?>	
	</tbody>
</table>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal Detail -->
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail Download #<span id="foto"></span></h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped">
        	<tr class="bg-info"><td  class="bg-info" colspan="2"> Detail Download</td></tr>
        	<tr><td>Jumlah Generate Link</td><td> <span id="jumlah_link"></span> Kali</td></tr>
        	<tr><td>Jumlah Download </td><td> <span id="valid"></span> Kali</td></tr>
        	<tr><td>Jumlah Waiting</td><td> <span id="not_valid"></span> Kali</td></tr>
        	<tr><td>Jumlah Earning</td><td> <span id="earning"></span></td></tr>
        	<tr class="bg-info">
        		<td colspan="2">
        			Contributor ini juga pernah melakukan redeem sebanyak
        		</td>
        	</tr>
        	<tr><td>Jumlah Redeem </td><td> <span id="redeem"></span></td></tr>
        </table>
        <div  id="tblDownload">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		// Table
		$('#myTable').DataTable( {
	        "scrollY":        "500px",
	        "scrollCollapse": true,
	        "paging":         false
	    });

		// Detail Download 
		$('.detailDownload').click(function () {
			var id_foto=$(this).attr('id')
			$.get('<?php echo base_url("pxadmin/detailDownload");?>/'+id_foto+'',function (data) {
				$('#foto').html(id_foto)
				var obj=JSON.parse(data)
				$('#jumlah_link').html(obj.jumlah_link)
				$('#valid').html(obj.valid)
				$('#not_valid').html(obj.not_valid)
				$('#earning').html(obj.earning)
				$('#redeem').html(obj.redeem)

			})
			// $.get('<?php echo base_url("pxadmin/daftarDownload");?>/'+id_foto+'',function (table) {
			// 	$('#tblDownload').html(table)
			// })
		})
		
	})
</script>