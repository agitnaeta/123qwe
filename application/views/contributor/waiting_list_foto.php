<link rel="stylesheet" type="text/css" href="<?=base_url("assets/owl/owl.carousel.css");?>">
<link rel="stylesheet" type="text/css" href="<?=base_url("assets/owl/owl.theme.css");?>">
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
			<div class="panel-heading"><h3>My Image (<?=count($temp_image->result());?>)</h3> <span id="confirm"><span></div>
			<div id="" class="owl-carousel owl-theme owl-demo">
			<?php foreach ($temp_image->result() as $row):?>
				
					<div  class="item panel panel-default">
					<div class="panel-heading"><?=$row->judul;?></div>
					<div class="panel-body">
						<img class="img" height="150" width="150" src="<?=base_url("upload/mini/$row->mini");?>">
					</div>
					<div class="panel-footer text-center">
						<a href="#" id="<?=$row->id_foto;?>" title="Accept" class="ok btn btn-success"><i class='fa fa-eye'></i> </a>
						<a href="#" id="<?=$row->id_foto;?>"  title="Delete" class="delete btn btn-danger"><i class='fa fa-remove'></i> </a>
					</div>
					</div>
				
			<?php endforeach;?>
			</div>
			</div>

<script type="text/javascript">
	$(document).ready(function() {
 	
	  var owl = $(".owl-demo");
	 
	    owl.owlCarousel({
	      navigation : true
	 
	  });
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.delete').click(function  () {
			var id_foto=$(this).attr('id');
			if(confirm("Apakah Anda Yakin ?"))
			{
				$.post('<?php echo base_url("contributor/deleteImage");?>',{id_foto,id_foto}, function  (data) 
				{
					$('#confirm').html(data);
					
				});
				$('#list').load('<?php echo base_url("contributor/getImageTemp") ;?>');
				return false;
			}
			else
			{
				return false;
			}
		})
	})
</script>