<style type="text/css">
	*, *:before, *:after {box-sizing:  border-box !important;}

.img
{
	border-radius: 5px;
}
.rowx {
 -moz-column-width: 17em;
 -webkit-column-width: 17em;
 -moz-column-gap: -1em;
 -webkit-column-gap: -1em; 
  
}

.menu-category {
 display: inline-block;
 margin:  0.25rem;
 padding:  1rem;
 width:  100%; 
}
</style>	
<div class='container'>
<div class='col-md-10'>
<div class="menu rowx">
<?php if($image->result()==null){ echo "<h3 class='text-center text-muted'>Oops.. No Image Display :)</h3>";};?>
	<?php foreach ($image->result() as $row):?>
		
		<div class="menu-category list-group">
		<a class="detail_img" id="modal-detail" data-id='<?=$row->id_foto;?>' href="#modal-container-detail" role="button" class="btn" data-toggle="modal">
			
			<img class="img img-responsive" src="<?=base_url("upload/mini/$row->mini");?>">
		</a>
		</div>
	<?php endforeach;?>
</div>
</div>
</div>	
		<div class="modal fade" id="modal-container-detail" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								×
							</button>
							<h4 class="modal-title" id="judul">
								
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
							<button data-dismiss="modal" id="<?=$row->id_foto;?>" type="button" class="beli btn btn-warning">
								<i class='fa fa-shopping-cart'></i> Beli Paket
							</button>
						</div>
					</div>
					
				</div>
				
			</div>
	<script type="text/javascript">
		$(document).ready(function  () {

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
						$('.modal-body').html('Sisa download anda habis, silahkan beli paket terlebih dahulu')
						$('.download').remove()
						$('.beli').show()
					}
				})
			})

			$('.beli').click(function  () {
				$('#konten').load('<?php echo base_url("member/page_paket");?>')
			})
		})
	</script>