<!DOCTYPE html>
<html>
<head>
	<title>Pixtox | Special Request</title>
    <link rel="icon" type="image/png" href="<?=base_url();?>assets/img/ico.png"/>
	<link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
	 <link rel="stylesheet" href="<?=base_url();?>assets/fa/css/font-awesome.min.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
	 <style type="text/css">
	 .login
	 {
	 	padding-top: 7%;
	 	background-color: #333;
	 	padding-bottom: 20%;
	 }
	 img{
	 	padding-bottom: 30px;
	 	display: block;
	 	margin-left: auto;
	 	margin-right: auto;
	 }
	 .daftar
	 {
	 	background-color: #333;
	 	padding-bottom: 8%;
	 }
	 fieldset
	 {
	 	background-color: #fff;
	 }
	 .form-horizontal
	 {
	 	padding-top: 50px;

	 }
	 legend
	 {
	 	padding:20px;
	 	padding-top: 50px;
	 }
	 </style>
	<?php 
	$tgl=date('Y-m-d');
	$deadline = date('Y-m-d', strtotime('+7 days', strtotime($tgl)));
	$ex=explode("-",$deadline);
	$d=$ex[2]+1-1;
	$m=$ex[1]+1-1;
	$Y=$ex[0]+1-1;
    ;?>	 
</head>
<body>
<div class="container">
<div class="row">
	<div class="col-md-12">
		<?php include 'navbar.php';?>
	</div>
</div>
<div class="row ">
	<div class='col-md-12'>

		<legend><i class='fa fa-leaf'></i> Special Request </legend>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<ul id = "myTab" class = "nav nav-tabs">
		   <li class = "active"><a href = "#photo" data-toggle="tab">Photo Request</a></li>
		   <li><a href ="#vektor" data-toggle="tab">Vektor Request</a></li>	
		</ul>
	</div>
</div>
<div class="row">
<div class="col-md-12">
	<div id = "myTabContent" class = "tab-content">

	   <div class = "tab-pane fade in active" id = "photo">
	      <div class=".col-md-6 .col-md-offset-3">	
<div class="alert alert-info">
<h4><i class='fa fa-info-circle'></i> Info : </h4>
<ol>
    <li>
        Setelah pengajuan Special Request (SR) maka anda akan terima email perihal mengenai Project yang diajukan dalam beberapa hari. 
    </li>
    <li>
        Jika Project yang diajukan telah disetujui, maka lakukan pembayaran di bagian Deposit Spc
    </li>
    <li>
        Setelah dilakukan pembayaran dan dikonfirmasi maka Project akan mulai dikerjakan.
    </li>
    <li>
        Setiap perkembangan Project akan difollow up oleh team pixtox secara personal.
    </li>
</ol>
</div>
			<form class="form-horizontal" id="form_req" method="post" action="/">
			<fieldset>

			<!-- Form Name -->
			
			<div class="col-md-3"></div>
			<div class="col-md-6"><div id="pesan" class="text-center alert"></div></div>
			<div class="col-md-3"></div>
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="name">Your Name</label>  
			  <div class="col-md-5">
			  <input id="name" name="name" type="text" placeholder="" class="form-control input-md" required="">
			  <input name="idreq" type="hidden" value=" <?=$idreq;?>">
			  </div>
			</div>
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="theme">Theme</label>  
			  <div class="col-md-5">
			  <input placeholder='ex: Panorama, Colorfull' id="theme" name="theme" type="text" placeholder="" class="form-control input-md" required="">
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="object">Object </label>  
			  <div class="col-md-5">
			  <input id="object" name="object" type="text" placeholder="" class="form-control input-md" required="">
			  </div>
			</div>

			<!-- Select Basic -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="location">Location</label>
			  <div class="col-md-5">
			    <select id="location" name="location" class="form-control">
			      <option value="">Select Location</option>
			      <option value="0">Indoor</option>
			      <option value="1">Outdor</option>
			    </select>
			  </div>
			</div>
			<div id="f_detail" class="form-group">
			  <label class="col-md-4 control-label" for="detail">Detail</label>  
			  <div class="col-md-5">
				<textarea class="form-control" name="detail" id="detail">
					
				</textarea>
			  </div>
			</div>
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="model">Model</label>  
			  <div class="col-md-5">
			  <input id="model" name="model" type="text" placeholder="ex: gender, ras, figur, dll" class="form-control input-md" required="">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="phone">Phone</label>  
			  <div class="col-md-5">
			  <input id="phone" name="phone" type="text" placeholder="" class="form-control input-md" required="">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="email">Email</label>  
			  <div class="col-md-5">
			  <input id="email" name="email" type="email" placeholder="" class="form-control input-md" required="">
			    
			  </div>
			</div>

			<!-- Appended Input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="deadline">Deadline</label>
			  <div class="col-md-5">
			   <div class="form-inline">
			    	<select class="form-control" name="tanggal">
			    	<option selected="<?=$d;?>"><?=$d;?></option>
			    	<?php for ($i=$d+1; $i <=31 ; $i++) :?>
			    		<option value="<?=$i;?>"><?=$i;?></option>
			    	<?php endfor;?>
			    	</select>
			    	<select class="form-control" name="bulan">
			    		<option selected="<?=$m;?>"><?=$m;?></option>
			    		<?php for ($i=$m+1; $i <=12 ; $i++) :?>
			    		<option value="<?=$i;?>"><?=$i;?></option>
			    	<?php endfor;?>
			    	</select>
			    	<select class="form-control" name="tahun">
			    		<option selected="<?=$Y;?>"><?=$Y;?></option>
			    	<?php for ($i=$Y+1; $i <=2099 ; $i++) :?>
			    		<option value="<?=$i;?>"><?=$i;?></option>
			    	<?php endfor;?>
			    	</select>
			    </div>
			  </div>
			</div>
			<div class="form-group">
					  <label class="col-md-4 control-label" for="budget">Budget</label>
					  <label class="col-md-5 " for="budget">
					  		<input maxlength="15" class="form-control" name="budget" id="budget" placeholder="ex: 500000">
					  </label>
			</div>
			<!-- Button (Double) -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="save"></label>
			  <div class="col-md-8 ">
			    <a id="save" name="save" class="save btn btn-warning">Request</a>
			    <a href="<?=base_url();?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
			  </div>
			</div>

			</fieldset>
			</form>

		</div>
	   </div>
	   
	   <div class = "tab-pane fade" id = "vektor">
<div class="alert alert-info">


<h4><i class='fa fa-info-circle'></i> Info : </h4>
<ol>
    <li>
        Setelah pengajuan Special Request (SR) maka anda akan terima email perihal mengenai Project yang diajukan dalam beberapa hari. 
    </li>
    <li>
        Jika Project yang diajukan telah disetujui, maka lakukan pembayaran di bagian Deposit Spc
    </li>
    <li>
        Setelah dilakukan pembayaran dan dikonfirmasi maka Project akan mulai dikerjakan.
    </li>
    <li>
        Setiap perkembangan Project akan difollow up oleh team pixtox secara personal.
    </li>
</ol>
</div>
	    <form class="form-horizontal" id="form_vektor">
			<fieldset>
			<div class="pesan"></div>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="name">Your Name</label>  
			  <div class="col-md-5">
			  <input id="vname" name="vname" type="text" placeholder="" class="form-control input-md">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="category">Category</label>  
			  <div class="col-md-5">
			  <input id="vcategory" name="vcategory" type="text" placeholder="" class="form-control input-md">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="text">Text</label>  
			  <div class="col-md-5">
			  <input id="text" name="vtext" type="vtext" placeholder="" class="form-control input-md">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="tagline">Tag Line</label>  
			  <div class="col-md-5">
			  <input id="vtagline" name="vtagline" type="text" placeholder="" class="form-control input-md">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="style">Style</label>  
			  <div class="col-md-5">
			  <input id="vstyle" name="vstyle" type="text" placeholder=" image+text, image only, text only" class="form-control input-md">
			    
			  </div>
			</div>

			<!-- Appended Input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="appendedtext">Color 1</label>
			  <div class="col-md-5">
			    <div class="input-group">
			      <input id="color1" name="color1" class="form-control" placeholder="" type="color">
			      <span class="input-group-addon">
			      	<i class='fa fa-pie-chart'></i>
			      </span>
			    </div>
			    
			  </div>
			</div>
			<!-- Appended Input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="appendedtext">Color 2</label>
			  <div class="col-md-5">
			    <div class="input-group">
			      <input id="color2" name="color2" class="form-control" placeholder="" type="color">
			      <span class="input-group-addon">
			      	<i class='fa fa-pie-chart'></i>
			      </span>
			    </div>
			    
			  </div>
			</div>
			<!-- Appended Input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="appendedtext">Color 3</label>
			  <div class="col-md-5">
			    <div class="input-group">
			      <input id="color3" name="color3" class="form-control" placeholder="" type="color">
			      <span class="input-group-addon">
			      	<i class='fa fa-pie-chart'></i>
			      </span>
			    </div>
			    
			  </div>
			</div>
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="industry">Industry</label>  
			  <div class="col-md-5">
			  <input id="vindustry" name="vindustry" type="text" placeholder="(ex: food &amp; baverage, services, transportation, etc)" class="form-control input-md">
			    
			  </div>
			</div>

			<!-- Textarea -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="detail">Detail</label>
			  <div class="col-md-5">                     
			    <textarea width='100%' class="form-control" id="vdetail" name="vdetail"></textarea>
			  </div>
			</div>
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="phone">Phone</label>  
			  <div class="col-md-5">
			  <input id="vphone" name="vphone" type="text" placeholder="" class="form-control input-md" required="">
			    
			  </div>
			</div>
<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="email">Email</label>  
			  <div class="col-md-5">
			  <input id="vemail" name="vemail" type="email" placeholder="" class="form-control input-md" required="">
			    
			  </div>
			</div>

			<!-- Appended Input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="deadline">Deadline</label>
			  <div class="col-md-5">
			    <div class="form-inline">
			    	<select class="form-control" name="tanggal">
			    	<option selected="<?=$d;?>"><?=$d;?></option>
			    	<?php for ($i=$d+1; $i <=31 ; $i++) :?>
			    		<option value="<?=$i;?>"><?=$i;?></option>
			    	<?php endfor;?>
			    	</select>
			    	<select class="form-control" name="bulan">
			    		<option selected="<?=$m;?>"><?=$m;?></option>
			    		<?php for ($i=$m+1; $i <=12 ; $i++) :?>
			    		<option value="<?=$i;?>"><?=$i;?></option>
			    	<?php endfor;?>
			    	</select>
			    	<select class="form-control" name="tahun">
			    		<option selected="<?=$Y;?>"><?=$Y;?></option>
			    	<?php for ($i=$Y+1; $i <=2099 ; $i++) :?>
			    		<option value="<?=$i;?>"><?=$i;?></option>
			    	<?php endfor;?>
			    	</select>
			    </div>
			    
			  </div>
			</div>
			<div class="form-group">
					  <label class="col-md-4 control-label" for="budget">Budget</label>
					  <label class="col-md-5 " for="budget">
					  		<input maxlength="15" class="form-control" name="budget" id="budget" placeholder="ex: 500000">
					  </label>
			</div>
			
			

			<!-- Button (Double) -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="save"></label>
			  <div class="col-md-8">
			    <a id="vsave" name="vsave" class="vsave btn btn-warning"> Request</a>
			    <a href="<?php echo base_url();?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
			  </div>
			</div>

			</fieldset>
			</form>


	   </div> 
	</div>
</div>
</div>
</div>
	
<script>
  $(function() {
    $( "#deadline" ).datepicker();
     $( "#vdeadline" ).datepicker();
  });
  </script>
  <script type="text/javascript">
  	$(document).ready(function  () {
  		var kosong="";
  		$('#f_detail').hide();
  		$('#name').blur(function  () {
  			var name=$(this).val();
  			if (name.length<3) {
  				$(this).after("<div id='w-name' class='text-danger text-right'> Please Insert Valid Name</div>");
  				
  			};
  		})
  		$('#name').focus(function  () {
  			$('#w-name').remove();
  			
  		})
  	//theme
  	$('#theme').blur(function  () {
  			var theme=$(this).val();
  			if (theme.length<3) {
  				$(this).after("<div id='w-theme' class='text-danger text-right'> Please Insert Valid Theme</div>");
  				
  			};
  		})
  		$('#theme').focus(function  () {
  			$('#w-theme').remove();
  			
  		})	

  	// Object 
  		$('#object').blur(function  () {
  			var object=$(this).val();
  			if (object.length<3) {
  				$(this).after("<div id='w-object' class='text-danger text-right'> Please Insert Valid Object</div>");
  				
  			};
  		})
  		$('#object').focus(function  () {
  			$('#w-object').remove();
  			
  		})
  	//location
  		$('#location').change(function  () {
  			var location=$(this).val();
  			if (location=='1') {
  				$(this).after("<div id='w-outdor' class='text-danger text-right'>ex: Mountain, Beach </div>");
  				
  				$('#w-indor').remove();
  				$('#f_detail').show();
  				
  			}
  			else if(location=='0')
  			{
  				$(this).after("<div id='w-indor' class='text-danger text-right'>ex: Inside Room</div>");
  				
  				$('#w-outdor').remove();
  				$('#f_detail').show();
  				
  			}
  			else
  			{
  				$('#w-outdor').remove();
  				$('#f_detail').hide();
  				$('#w-indor').remove();
  				
  			};
  			
  		})	
  	// Model 
  		$('#model').blur(function  () {
  			var model=$(this).val();
  			if (model.length<3) {
  				$(this).after("<div id='w-model' class='text-danger text-right'> Please Insert Valid model</div>");
  				
  			};
  		})
  		$('#model').focus(function  () {
  			$('#w-model').remove();
  			
  		})
  	// phone 
  		$("#phone").keydown(function (e) {
		        // Allow: backspace, delete, tab, escape, enter and .
		        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
		             // Allow: Ctrl+A, Command+A
		            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
		             // Allow: home, end, left, right, down, up
		            (e.keyCode >= 35 && e.keyCode <= 40)) {
		                 // let it happen, don't do anything
		                 return;
		        }
		        // Ensure that it is a number and stop the keypress
		        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
		            e.preventDefault();
		        }
		    });

  		$('#phone').blur(function  () {
  			var phone=$(this).val();
  			if (phone.length<9) {
  				$(this).after("<div id='w-phonemin' class='text-danger text-right'> Please Insert Valid phone</div>");
  				
  				$('#w-phonemax').remove();
  				
  			}
  			else if (phone.length>12) {
  				$(this).after("<div id='w-phonemax' class='text-danger text-right'> Please Insert Valid phone</div>");
  				
  				$('#w-phonemin').remove();
  				
  			}
  			else
  			{
  				$('#w-phonemin').remove();
  				
  				$('#w-phonemax').remove();
  				
  			};

  		})
  		$('#phone').focus(function  () {
  			$('#w-phonemin').remove();

  			$('#w-phonemax').remove();
  			
  		})
  	//E-mail
  		$('#email').blur(function  () {
			filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

			if (filter.test($(this).val())) {
				
				$('#w-email').remove();
				 
			}
			else
			{
				$(this).after("<div id='w-email' class='text-danger text-right'> Please Insert Valid Email</div>");
				
			};
		})
		$('#email').focus(function  () {
  			$('#w-email').remove();
  			  			
  		})
  	})
  </script>
  <script type="text/javascript">
  	$(document).ready(function  () {
  		var kosong="";
  		$('#pesan').hide()
  		$('.save').click(function  () {
  			
  			$.post('<?php echo base_url("request/makeReq");?>',$('#form_req').serialize(),function  (data) {  				
  				$('#pesan').addClass('alert-success');
  				$('#pesan').html(data);
  				$('#pesan').show();
  				$('.form-control').val(kosong);

  				return false;
  			})
  			
  			setTimeout(function reload () {
  				location.reload(true)
  			},3500);
  			
  		})

  		$('.vsave').click(function  () {
  			
  			$.post('<?php echo base_url("request/makeReqvektor");?>',$('#form_vektor').serialize(),function  (data) {  				
  				$('.pesan').addClass('alert text-center alert-success');
  				$('.pesan').html(data);
  				$('.pesan').show();
  				$('.form-control').val(kosong);

  				return false;
  			})
  			
  			setTimeout(function reload () {
  				location.reload(true)
  			},3500);
  			
  		})
  	})
  </script>
</body>
</html>