<title>Voting Form</title>
<link rel="icon" type="image/png" href="<?=base_url();?>assets/img/ico.png"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url("assets/owl/owl.carousel.css");?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url("assets/owl/owl.theme.css");?>">
<div class="container">
<div class="row">
	<div class="col-md-12">
	<h1>This Image From : </h1>
	<span id="pesan"></span>
	<input id="jumlah" value="1"  type="">
	</div>
	<div class="col-md-12">
		<div id="demo">
		 <div class="container">
				 <div class="row">
						 <div class="span12">
						   <div id="owl-demo2" class="owl-carousel">						           
						     <?php for ($i=1; $i<11 ; $i++) :?>
						     	<div id="b<?=$i;?>" class="item">	
						     		<h2>Gambar <?=$i;?></h2>
						     	<img id="<?php echo $i;?>" width="350px" height="auto" class="lazyOwl" data-src="<?=base_url();?>assets/img/paperfrog.jpg" alt="Pixtox Image">
						     	<div class="panel-body text-center">
						     		<button id="<?php echo $i;?>" class="vote btn btn-warning"><i class="fa fa-check"></i> Vote</button>
						     		<button class="btn btn-danger"><i class="fa fa-remove"></i> Reject</button>
						     	</div>
						    	</div>
						     <?php endfor;?>

						    </div>
						  </div>
						</div>
				</div>
		</div>
	</div>
</div>
</div>
<style> 
    #owl-demo2 .item img{
    padding: 100px;
    display: block;
	width: 100%;
	height: auto;
	-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
	-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
	box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);

    }
    </style>


    <script>
    $(document).ready(function() {

       $("#owl-demo2").owlCarousel({
        items : 3,
        lazyLoad : true,
        navigation:true,
        
      });

    });
    </script>
    <script type="text/javascript">
    	$(document).ready(function  () {  
    		$('.vote').click(function  () {
    			var nilai=$('#jumlah').val();
    			var block=$(this).attr('id');
    			hasil=parseInt(nilai)+1;
    			$('#jumlah').val(hasil);
    			$('#b'+block+'').remove();
    			if (nilai>7) {
    				alert("OK LULUS");
    			};
    		})
    	})
    </script>