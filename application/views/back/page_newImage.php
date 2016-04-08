<style type="text/css">
	/*
* 	Owl Carousel Owl Demo Theme 
*	v1.23
*/

.owl-theme .owl-controls{
	margin-top: 10px;
	text-align: center;
}

/* Styling Next and Prev buttons */

.owl-theme .owl-controls .owl-buttons div{
	color: #FFF;
	display: inline-block;
	zoom: 1;
	*display: inline;/*IE7 life-saver */
	margin: 5px;
	padding: 3px 10px;
	font-size: 12px;
	-webkit-border-radius: 30px;
	-moz-border-radius: 30px;
	border-radius: 30px;
	background: #869791;
	filter: Alpha(Opacity=50);/*IE7 fix*/
	opacity: 0.5;
}
/* Clickable class fix problem with hover on touch devices */
/* Use it for non-touch hover action */
.owl-theme .owl-controls.clickable .owl-buttons div:hover{
	filter: Alpha(Opacity=100);/*IE7 fix*/
	opacity: 1;
	text-decoration: none;
}

/* Styling Pagination*/

.owl-theme .owl-controls .owl-page{
	display: inline-block;
	zoom: 1;
	*display: inline;/*IE7 life-saver */
}
.owl-theme .owl-controls .owl-page span{
	display: block;
	width: 12px;
	height: 12px;
	margin: 5px 7px;
	filter: Alpha(Opacity=50);/*IE7 fix*/
	opacity: 0.5;
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;
	background: #869791;
}

.owl-theme .owl-controls .owl-page.active span,
.owl-theme .owl-controls.clickable .owl-page:hover span{
	filter: Alpha(Opacity=100);/*IE7 fix*/
	opacity: 1;
}

/* If PaginationNumbers is true */

.owl-theme .owl-controls .owl-page span.owl-numbers{
	height: auto;
	width: auto;
	color: #FFF;
	padding: 2px 10px;
	font-size: 12px;
	-webkit-border-radius: 30px;
	-moz-border-radius: 30px;
	border-radius: 30px;
}

/* preloading images */
.owl-item.loading{
	min-height: 150px;
	background: url(AjaxLoader.gif) no-repeat center center
}

#owl-demo .owl-item > div img {
    display: block;
    width: 100%;
    height: auto;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    margin-bottom:4px;
}

#owl-demo .owl-item > div{
  background : #42bdc2;
  text-align: center;
  padding:50px 0px;
  margin:3px;
  color: white;
  font-size:32px;
  border:1px white;
}

.wrapper-with-margin{
  margin:0px 50px;
}

 
.owl-theme .owl-controls .owl-buttons div {
  position: absolute;
}
 
.owl-theme .owl-controls .owl-buttons .owl-prev{
  left: -45px;
  top: 55px;
  padding:15px; 
}
 
.owl-theme .owl-controls .owl-buttons .owl-next{
  right: -45px;
  top: 55px;
  padding:15px;
}
.modal-lgx
{
width:90%;
}
</style>

<div class="container">
	<div class="row- clearfix">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3><i class='fa fa-image'></i> New Upload From Contributor <span class='badge'><?php echo count($image->result() );?></span></h3>
			</div>
			<div class="panel-body">
			<div id="pesan"></div>
				<div class="wrapper-with-margin">
				<div id="owl-demo" class="owl-carousel">
				     <?php foreach ($image->result() as $row):?>
					 <a id="<?=$row->id_foto;?>" href="#modal-container" role="button" class="detail_vote btn det" data-toggle="modal">
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
</div>



<div class="modal fade" id="modal-container" role="dialog" aria-labelledby="" aria-hidden="true">
						<div class="modal-dialog modal-lgx">
							<div class="modal-content modal-lgx">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										×
									</button>
									<h4 class="modal-title">
										Image #<span id="idgambar"></span>
									</h4>
								</div>
								<div class="modal-footer">
									<div class="btn-group">
										<button type="button" class="btn det btn-default" data-dismiss="modal">
										Close
										</button> 
										<button data-dismiss="modal" type="button" class="btn_acc btn det btn-success">
											<i class='fa fa-check'></i> Approve
										</button>
										<button class="btn_reject btn btn-danger">
											<i class='fa fa-remove'></i> Reject
										</button>
									</div>
								</div>
								<div class="modal-body">
									<div class="container">
										<div class="row">
										<div id="d_gambar" class="col-md-6">
										</div>
										<div class="col-md-6">
												
												<label>Deskripsi</label>
												<p id="d_judul"></p>
												<label>Kategori</label>
												<p id="d_kategory"></p>
												<label>Tanggal Upload</label>
												<p id="d_tanggal_upload"></p>
												<label>Approve Image Of The Week</label>
												<p id="d_image_aprove"></p>
												<label>Tag</label>
												<p id="d_tag"></p>
												<label>Type</label>
												<p id="type"></p>
												<label>Image Size</label>
												<p id="d_image_size"></p>
												
												<label>Model Release</label>
												<p id="link_download"></p>	

												<div id="form_reject"></div>			
										</div>

										</div>
									</div>
								</div>
								
							</div>
							
						</div>
						
					</div>
<script type="text/javascript">
	$('.detail_vote').click(function  () {
		var id_foto=$(this).attr('id')
		$.get('<?php echo base_url("pxadmin/getDataImage/'+id_foto+'");?>',function  (data) {
			var obj=JSON.parse(data);
			$('#idgambar').html(obj.id_foto)
			$('#d_gambar').html(obj.image)
			$('#d_judul').html(obj.judul)
			$('#d_tag').html(obj.tag)
$('#type').html(obj.type)
			$('#d_kategory').html(obj.kategori)
			$('#d_tanggal_upload').html(obj.tanggal_upload)
			$('#d_image_aprove').html(obj.image_week)
			$('#d_image_size').html(obj.lebar+'px '+'X '+obj.tinggi+'px')
			$('#link_download').html(obj.model_realise)

			$('.btn_reject').attr("data-id",obj.id_foto)
			$('.btn_acc').attr("data-id",obj.id_foto)
		})
	})
</script>




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
			$.post('<?php echo base_url("pxadmin/send_reject_msg");?>',{id_foto:id_foto},function  (data) {
				$('#pesan').html(data);
				$('#pesan').addClass('text-center alert alert-success');
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

<script type="text/javascript">
	$(document).ready(function () {
	    var carousel = $("#owl-demo");
			  carousel.owlCarousel({
			    navigation:true,
			    navigationText: [
			      "<i class='fa fa-backward'></i>",
			      "<i class='fa fa-forward'></i>"
			      ],
			  });

	  
	});
</script>