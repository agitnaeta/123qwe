<link rel="stylesheet" type="text/css" href="<?=base_url("assets/owl/owl.carousel.css");?>">

<link rel="stylesheet" type="text/css" href="<?=base_url("assets/owl/owl.theme2.css");?>">

<script type="text/javascript" src="<?=base_url("assets/owl/owl.carousel.min.js");?>"></script>



<style type="text/css">

	.owl-demo .item{
	    padding: 0px 0px;

	    margin: 5px;

	    color: #FFF;

	    -webkit-border-radius: 3px;

	    -moz-border-radius: 3px;

	    border-radius: 3px;

	    text-align: center;

	}

	img

	{

	    display: block;

	    margin-left: auto;

	    margin-right: auto;

	}
</style>

			<div class="panel panel-default">

			<div class="panel-heading">

			

			<h3>My Image (<?=count($temp_image->result());?>)</h3> <span id="confirm"><span></div>

			<div id="" class="owl-carousel owl-theme owl-demo">

			<?php foreach ($temp_image->result() as $row):?>

				 <a data-id="<?=$row->id_foto;?>" href="#modal-container" role="button" class="detail_img" data-toggle="modal">

					<div  class="item panel panel-default">

					<div class="panel-body">

						<img class="img" height="150" width="150" src="<?=base_url("upload/mini/$row->mini");?>">

					</div>

					<div class="panel-heading"><?=$row->judul;?></div>

					</div>

				</a>

				

			<?php endforeach;?>

			</div>

			</div>



		

			<div class="modal fade" id="modal-container" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

				<div class="modal-dialog modal-lg">

					<div class="modal-content">

						

						<div class="modal-body">
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
							<div class="text-right">

								<button type="button" class="btn btn-default" data-dismiss="modal">

									Close

								</button>

								<a  class="delete btn btn-danger"  data-dismiss="modal">

									<i class='fa fa-remove'></i> Remove

								</a> 

								<a target="blank"  class="download btn btn-primary">

									<i class='fa fa-download'></i>Download

								</a>

							</div>

						</div>

						

					</div>

					

				</div>

				

			</div>

		

<script type="text/javascript">

	$(document).ready(function() {
	   $(".owl-demo").owlCarousel({
        items : 5,
        navigation:true,
        lazyLoad : true,
      navigationText: [
      "<i class='fa fa-backward'></i>",
      "<i class='fa fa-forward'></i>"
      ],
        
      });

	});

</script>

<script type="text/javascript">

	$(document).ready(function(){

		



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
					$('.delete').attr( "id", obj.id_foto);
					$('.download').attr( "href", "download_self/"+obj.big+"");
				});
			});

		$('.delete').click(function  () {

			var id_foto=$(this).attr('id');

			if(confirm("Apakah Anda Yakin ?"))

			{

				$.post('<?php echo base_url("contributor/deleteImage");?>',{id_foto,id_foto}, function  (data) 

				{

					$('#confirm').html(data);

					

				});

				$('.modal-backdrop').hide();

				$('#list').load('<?php echo base_url("contributor/getImageList") ;?>');

				window.reload();

				return false;

			}

			else

			{

				return false;

			}

		})

	})

</script>



