<style type="text/css">
	img
	{
		display: block;
		margin-left: 0px;
	}
</style>
<div class="container-fluid">
	<div class="panel panel-defaut">
		<div class="panel-heading">
			<h3>Page Background</h3>
		</div>
	</div>
	<div class="alert alert-success">
		<a href="<?php echo base_url("pxadmin");?>" class=" btn btn-warning"><i class="fa fa-home"></i> Panel</a>
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-upload"></i>Upload</button>
		<a href="" type="button" class="btn btn-success"><i class="fa fa-refresh"></i> Refresh</a>
	</div>
	<div class="panel-body">
		<div class="pesan"></div>
		<div class="table_background">
			<table class="table" id="myTable">
				<thead class="bg-success">
					<th>Nomor</th>
					<th>Image</th>
					<th>Status</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php foreach ($bg->result() as $row):?>
					<tr>
						<td><?=$row->id;?></td>
						<td class="text-left">
							<img src="<?php echo base_url("upload/bg/mini/$row->mini_name");?>">
						</td>
						<td>
							<?=yesno($row->status,"Active","Diactive");?>
						</td>
						<td>
							<a href="#" id="<?=$row->id;?>" class="change btn btn-default"><i class="fa fa-cog"></i> Change Status</a>
							<a href="#" id="<?=$row->id;?>" class="delete btn btn-default"><i class="fa fa-remove"></i> Hapus</a>
						</td>
					</tr>
				<?php endforeach;?>	
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload New Backgroud</h4>
      </div>
      	<div class="panel-body">
      		<div id="pesan"></div>
      	 <progress  id='prog' max='100' min='0' style='display:none ; width=100%';></progress> 
      	</div>
      <form method="post" id="upload" enctype="multipart/form-data" action="<?php echo base_url("bk/upload");?>">
      <div class="modal-body">
	        <label>Foto</label>
	        <input class="form-control" type="file" accept="image/jpeg" name="userfile">
	  			<blockquote>
	  				<p>Gunakan Format Jpg, dengan Ukuran Tidak Lebih Dari 2 Mb</p>
	  			</blockquote>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>
<script type="text/javascript" src="<?=base_url('assets/js/form.js');?>"></script>
<script type="text/javascript">
		var main =function  () {
			$('#upload').on('submit',function  (e) 
			{
				var kosong='';
				e.preventDefault();
				$(this).ajaxSubmit(
				{
					beforeSend:function  ()
					 {
						$('#prog').show();

						$('#prog').attr('value','0');
					},
					uploadProgress:function  (event,position,total,percentComplete) 
					{
						$('#prog').attr('value',percentComplete);
						$('#pesan').html(percentComplete+'%');
					},
					success:function  (data) 
					{
						$('#pesan').addClass("text-center alert alert-success");
						$('#pesan').html(data);
						$('#pesan').show();
						$('#prog').hide();
					}
				});
			})
		};
		$(document).ready(main);
	</script>
<script type="text/javascript">
	$(document).ready(function(){
    $('#myTable').DataTable();

  
    $('.change').click(function () {
    	var id=$(this).attr('id');
    	$.post('<?php echo base_url("bk/set_backgroud");?>',{id:id},function (data) {
    		$('.pesan').addClass('alert-success alert text-center');
    		$('.pesan').html(data);
    		$('#konten').load('<?php echo base_url("bk/page_background");?>');
    	})
    })

    $('.delete').click(function () {
    	var id=$(this).attr('id');
    	if(confirm("Apakah Anda Yakin Akan Menghapus Data ?")){
    		$.post('<?php echo base_url("bk/delete");?>',{id:id},function (data) {
    		$('.pesan').addClass('alert-success alert text-center');
    		$('.pesan').html(data);
    		$('#konten').load('<?php echo base_url("bk/page_background");?>');
    		})
    	}
    })

    $('#refresh').click(function () {
    	$('#konten').load('<?php echo base_url("bk/page_background");?>');
    })

});
</script>