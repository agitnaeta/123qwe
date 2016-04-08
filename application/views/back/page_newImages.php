<style type="text/css">
	.modal-lg
	{
		width: 90%;
	}
</style>
<br>
<div class="container">
	<div class="row- clearfix">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3><i class='fa fa-image'></i> New Upload Form Contributor <span class='badge'><?php echo count($image->result() );?></span></h3>
			</div>
			<div class="panel-body">
			<div id="pesan"></div>
			<div id="" class="owl-demo owl-carousel owl-theme">
			<?php foreach ($image->result() as $row):?>
					 <a id="modal-<?=$row->id_foto;?>" href="#modal-container-<?=$row->id_foto;?>" role="button" class="btn det" data-toggle="modal">
						<div  class="item">
							<img class="  img img-responsive"  src="<?=base_url("upload/mini/$row->mini");?>">
						</div>
						
					</a>

			<?php endforeach;?>
			</div>
			</div>
		</div>
	</div>
</div>
<?php foreach ($image->result() as $row):?>
<div class="modal fade" id="modal-container-<?=$row->id_foto;?>" role="dialog" aria-labelledby="<?=$row->id_foto;?>" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										×
									</button>
									<h4 class="modal-title" id="<?=$row->id_foto;?>">
										Image #<?=$row->id_foto;?> 
									</h4>
								</div>
								<div class="modal-footer">
									<div class="btn-group">
										<button type="button" class="btn det btn-default" data-dismiss="modal">
										Close
										</button> 
										<button data-dismiss="modal" type="button" class="btn_acc btn det btn-success" data-id="<?=$row->id_foto;?>">
											<i class='fa fa-check'></i> Approve
										</button>
										<button class="btn_reject btn btn-danger" data-id="<?=$row->id_foto;?>" >
											<i class='fa fa-remove'></i> Reject
										</button>
									</div>
								</div>
								<div class="modal-body">
									<div class="container">
										<div class="row">
										<div class="col-md-6">
											<img class="img img-responsive" src="<?php echo base_url("upload/watermark/$row->watermark")?>">
										</div>
										<div class="col-md-6">
												<?php
												$img =getimagesize(base_url("upload/watermark/$row->watermark"));
												// print_r($img);
												?>
												<label>Deskripsi</label>
												<p><?=$row->judul;?></p>
												<label>Kategori</label>
												<p><?=$row->type;?></p>
												<label>Tanggal Upload</label>
												<p><?=dateindo($row->tanggal_upload);?></p>
												<label>Approve Image Of The Week</label>
												<p><?=yesno($row->image_week,"YES","NO");?></p>
												<label>Tag</label>
												<p><?=$row->tag;?></p>
												<label>Kategori</label>
												<p><?=$row->kategori;?></p>
												<label>Image Size</label>
												<p><?php echo "Width: ".$img[0]."px | Height: ".$img[1]."px";?></p>
												
												<label>Model Release</label>
												<p><a target="__blank" href="<?=base_url("upload/mr/$row->model_realise");?>"> Download </a></p>
												
												<div id="form_reject<?=$row->id_foto;?>"></div>						
										</div>

										</div>
									</div>
								</div>
								
							</div>
							
						</div>
						
					</div>
<?php endforeach;?>
<script type="text/javascript">
	$(document).ready(function() {
	  var owl = $(".owl-demo");
	 
	  owl.owlCarousel({
	      navigation : true
	 
	  });


	  $('.ok').click(function  () {
	  	var  id_foto=$(this).attr('id')
	  	$.post('<?php echo base_url("pxadmin/vote_new"); ?>',{id_foto:id_foto},function  (data) {
	  		$('#pesan').html(data)
	  	})
	  })



	  	$('.det').click(function  () {
			$('body').css('padding-right','');
			$('.skin-blue').css('padding-right','');
			$('.sidebar-mini').css('padding-right','');
			$('.sidebar-collapse').css('padding-right','');
			$('.modal-open').css('padding-right','');	
		})
		$('.link').click(function  () {
			$('body').css('padding-right','');
			$('.skin-blue').css('padding-right','');
			$('.sidebar-mini').css('padding-right','');
			$('.sidebar-collapse').css('padding-right','');
			$('.modal-open').css('padding-right','');	
		})


		$('.btn_reject').click(function  () {
			var id_foto=$(this).attr('data-id');
			
			$.post('<?php echo base_url("pxadmin/form_reject");?>',{id_foto:id_foto},function  (data) {
				$('#form_reject'+id_foto+'').html(data)
			})
		})
	 	
	 	$('.btn_acc').click(function  () {
			var id_foto=$(this).attr('data-id');
			
			$.post('<?php echo base_url("pxadmin/send_acc_msg");?>',{id_foto:id_foto},function  (data) {
				$('#pesan').html(data);
				$('#pesan').addClass('text-center alert alert-success');
				// $('#pesan').show().delay(5000).fadeOut('slow');
			})
		})
	});
</script>
