<title>Search Image </title>
<style type="text/css">
	.x
	{
		padding-top: 100px;
	}
</style>
<div class="container-fluid x">
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-lg-6">
	<form method="post" action="<?php echo base_url("image/search");?>">
    <div class="input-group">
      <input required name="search" type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-warning" type="submit"><i class='fa fa-search'></i> Cari </button>
      </span>
    </div>
   </form> 
     <div class="col-md-3"></div>
</div>
</div>
<div class="container">
	<?php if($image->result()==null){ echo "<h3 class='text-center text-muted'>Oops.. No Image Display :)</h3>";};?>
	<div class="row">
	<?php foreach ($image->result() as $row):?>
		
		<div class="col-md-3">
		<a class="detail_img" id="modal-detail" data-id='<?=$row->id_foto;?>' href="#modal-container-detail" role="button" class="btn" data-toggle="modal">
				<img class="img img-responsive" src="<?=base_url("upload/mini/$row->mini");?>">
		</a>
		</div>
	<?php endforeach;?>	
</div>
<section id="Detail_Gambar">
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			
			
			<div class="modal fade" id="modal-container-detail" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								×
							</button>
							<h4 class="modal-title judul">
								
							</h4>
						</div>
						<div  class="modal-body">
							<div class="row clearfix">
								<div id="modal-body" class="col-md-8">
									
								</div>
								<div class="col-md-4">
									<label>Deskripsi</label>
									<p class="judul"></p>
									<label>Kategori</label>
									<p class="kategori"></p>
									<label>Tag</label>
									<p class="tag"></p>
									<label>Resolution</label>
									<p class="size"></p>
								</div>
							</div>
						</div>
						<div id="modal-footer" class="modal-footer">
							 
							<button type="button" class="btn btn-default" data-dismiss="modal">
								Close
							</button> 
							<a type="button"  class="download btn btn-warning">
								Generate Link Donwload
							</a>
						</div>
					</div>
					
				</div>
				
			</div>
			
		</div>
	</div>
</div>
</section>
<script type="text/javascript">
	$('.detail_img').click(function  () {
			$('.download').show()
			var id_foto=$(this).attr('data-id');
				$.post('<?php echo base_url("image/one");?>',{id_foto:id_foto},function  (data) {
					var obj=JSON.parse(data)
					
					$('.judul').html(obj.judul);
					$('.kategori').html(obj.kategori);
					$('.tag').html(obj.tag);
					$('.size').html(obj.size);
					$('#modal-body').html(obj.image);
					$('.download').attr( "id", obj.id_foto);
				});
			});

	$('.download').click(function  () {
		$(this).hide();
		var id_foto=$(this).attr('id_foto');
		var member='<?php echo base_url("member");?>';
		var contributor='<?php echo base_url("contributor");?>';
		
		$.post('<?php echo base_url("image/cek_session");?>',{id_foto:id_foto},function  (data) {
			// member 1 contributor 2 other 0
			if (data==1) {
				$('.beli').hide()
				$('.download').click(function  () {
					var id_foto=$(this).attr('id');
					$.post('<?php echo base_url("member/download");?>',{id_foto:id_foto},function  (data) {
						if(data!=0)
						{
							$('.modal-body').html(data);
						}
						else
						{
							$('.modal-body').addClass('text-center')
							$('.modal-body').html('Sisa download anda habis, silahkan beli paket terlebih dahulu <br> <a href='+member+' class="btn btn-warning"><i class="fa fa-shopping-cart"></i> Beli Sekarang</a>')
							$('.download').remove()
							$('.beli').show()
						}
					})
				})

				$('.beli').click(function  () {
					$('#konten').load('<?php echo base_url("member/page_paket");?>')
				})

			}
			else if (data==2) {
				$('.beli').hide()
				$('.download').click(function  () {
					var id_foto=$(this).attr('id');
					$.post('<?php echo base_url("contributor/download");?>',{id_foto:id_foto},function  (data) {
						if(data!=0)
						{
							$('.modal-body').html(data);
							$('.modal-body').addClass('text-center');
						}
						else
						{
							$('.modal-body').addClass('text-center')
							$('.modal-body').html('Sisa download anda habis, silahkan beli paket terlebih dahulu <br> <a href='+contributor+' class="btn btn-warning"><i class="fa fa-shopping-cart"></i> Beli Sekarang</a>')
							$('.download').remove()
							$('.beli').show()
						}
					})
				})

				$('.beli').click(function  () {
					$('#konten').load('<?php echo base_url("contributor/page_paket");?>')
				})
			}
			else if (data==0)
			{
				$('#modal-body').html('<p class="text-center">Silahkan Login terlebih dahulu <br> <a href='+contributor+' class="btn btn-warning"><i class="fa fa-key"></i> Login</a></p>');
			}
		})
	})

</script>
