<!DOCTYPE html>
<html>
<head>
	<title>Contributor Dashboard</title>
	<link rel="icon" type="image/png" href="<?=base_url();?>assets/img/ico.png"/>
	<style type="text/css">
		.content{
			padding-top: 3%;
			background-image: url("<?=base_url();?>assets/img/icoopa.png");
			background-repeat: no-repeat;
			background-position: right;
			background-position: 
		}
		body{
			background-color: #333;
			
		}
		.radius
		{
			border-radius: 10px;
			
		}
		.panel-heading
		{
			background-color: #333;
		}
		.upload
		{
			border-style: dashed;

		}
		/* layout.css Style */
		.upload-drop-zone {
		  height: 200px;
		  border-width: 2px;
		  margin-bottom: 20px;
		}

		/* skin.css Style*/
		.upload-drop-zone {
		  color: #ccc;
		  border-style: dashed;
		  border-color: #ccc;
		  line-height: 200px;
		  text-align: center
		}
		.upload-drop-zone.drop {
		  color: #222;
		  border-color: #222;
		}
		#prog
		{
			padding: 5px;
		}
		label
		{
			padding-top: 2px;
		}
.kanan{

}
	</style>

</head>
<body>
<div class="container-fluid content">
	<div class="row">
		<div class="col-md-3">

		<div class="panel panel-default fix ">
			<div class="panel-heading head ">
			        <?php if ($foto=='') {$foto='user.png';};?>
				<img width="100px" src="<?=base_url("upload/user/$foto");?>" class="img img-circle">
				<div class="pull-left">
<br>
					<?=$username;?>
				</div>
				<div class="text-right">
                                        <?=$trusted;?>
				</div>
<br>
			</div>	
			<div class="panel-body">
				<ul class="nav">
					<li>
						<a class="link" href="<?=base_url('contributor');?>"><i class='fa fa-home'></i> Contributor Panel</a>
					</li>
						<li>
						<a href="#" class="link" id="<?php echo base_url("contributor/page_paket")?>">
							<i class='fa fa-shopping-cart'></i> Beli
						</a>
					</li>
					<li>
						<a href="#" class="link" id="<?php echo base_url("contributor/page_konfirmasi")?>">
							<i class='fa fa-check-square'></i> Konfirmasi
						</a>
					</li>
					<li>
						<a href="#" class="link" id="<?php echo base_url("contributor/page_redeem")?>">
							<i class='fa fa-money'></i> Redeem
						</a>
					</li>
					</li>
						<li>
						<a href="https://www.facebook.com/Pixtoxcom-1495871197396392" class="link" target="__blank">
							<i class='fa fa-facebook-square'></i> Merchandise
						</a>
					</li>
					<li>
						<a class="link" id="<?=base_url("contributor/profil");?>" href="#"><i class='fa fa-user'></i> Profil</a>
					</li>
					<li>
						<a class="link" id='<?=base_url("contributor/detail");?>' href="#"><i class='fa fa-pencil'></i> Detail Anda</a>
					</li>
					<li>
						<a class="link" id='<?=base_url("contributor/changePassword");?>' href="#"><i class='fa fa-key'></i> Change Password</a>
					</li>
					<li>
						<a target="__blank" class="link"  href="<?php echo base_url("document/$file"); ?>"><i class="fa fa-book"></i> Model Release</a>
					</li>
				
					<li>
						<a href="<?=base_url('logout');?>"><i class='fa fa-sign-out'></i> Logout</a>
					</li>
					<li>
						<a href="">
					</li>
				</ul>

			</div>
			<div class="panel-footer">
				<h4>Image Stock</h4>
			</div>
			<div class="panel-body">
				<ul class="nav">
					<li>
						<a class="link" id="<?php echo base_url("contributor/getImageType/vektor");?>" href="#"><i class='fa fa-image'></i> Vektor</a>
					</li>
					<li>
						<a class="link" id="<?php echo base_url("contributor/getImageType/photo");?>" href="#"><i class='fa fa-image'></i> Photo</a>
					</li>	
				</ul>
			</div>		
		</div>
		</div>

		<div class="col-md-9" id="konten">
				
			<div id="uploader" class="col-md-8 ">
			
				<form class="real_form" id="upload" action="<?=base_url("contributor/uploadImage");?>" method="post" enctype="multipart/form-data">
				<div class="panel panel-default">
			       	<div class="panel-heading"><strong>Upload Image</strong> <div class="text-right" id="persen"></div></div>
			        	<div class="panel-body">
			          	<div class="col-md-12">
			          	<center>
			          			<div id="pesan"><?=$this->session->flashdata('pesan');?></div>			          
			          			 <progress  id='prog' max='100' min='0' style='display:none ; width=100%';></progress>
			          	</center>
					            <div class="form-group">
					              <div class="form-group">
					              	<label>Deskripsi</label>
					              	<input tabindex="1" type="text" name="judul" class="form-control">
					              	<label>Foto</label>
					                <input tabindex="2" class="form-control" type="file" name="image" id="image" >
					               
					                <label>Keywords</label>
									<input tabindex="3" id="tag" name="tag" class="form-control" placeholder="Ex: Ocean, Vektor">
									<label>Kategory</label>
									<select class="form-control" name="f_type" id="f_type">
										<option value="">-Pilih-</option>
										<option value="vektor">Vektor</option>
										<option value="photo">Photo</option>
									</select>
								    <div id="select_kategory">								    	
								    </div>
								    <label class="model">Model Release</label>
									<input tabindex="2" class=" model form-control" type="file" name="pdf" id="pdf" >
								    <br>
								  	<input name="model_release" id='lock_model' type="checkbox"> Saya menggunakan Model Release<br>
								    <input name="image_week" value="1" type="checkbox"> Anda setuju jika foto yang di tolak akan dijadikan promosi free photo of the week<br>
					              </div>					              	
					            </div>
			          </div>
			          <div class="col-md-12 text-right">			          	
					       <button  tabindex="5" type="submit" class="btn btn-warning" id="js-upload-submit">Upload </button>
			          </div>
			        </div>
			      </div>
			      </form>
			    
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
				<div class="panel-heading">
					<i class='fa fa-search'></i> Search 
				</div>
					<div class="panel-body">
					<div class="input-group">
						<input type="text" name="search" id="search" class="form-control">
						<span class='input-group-btn'>
							<button class="btn"> Cari</button>
							<button class="btn btn-warning btn_uploader"><i class='fa fa-upload'></i> Upload</button>
							

						</span>

					</div>
					</div>
				</div>
			</div>
			
			<div id="list" class="col-md-12">
			
			</div>

		</div>
	</div>
</div>

<div class="java">
	<script type="text/javascript" src="<?=base_url('assets/js/js.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/form.js');?>"></script>
	<script type="text/javascript">
		$(document).ready(function  () {
			$('ul li a').click(function() {
			    $('ul li.active').removeClass('active');
			    $(this).closest('li').addClass('active');
			});
		})
	</script>
	<script type="text/javascript">
		$(document).ready(function  () {
			 
	 		$('.model').hide();
	 		$('.btn_uploader').hide();
	 		$('.btn_uploader').click(function  () {
	 			$('#uploader').show();
	 			$('.btn_uploader').hide();
	 		})
				

			    $('#lock_model').change(function() {
			        if($(this).is(":checked")) {
			           $('.model').show();
			        }
			        else{
			        	$('.model').hide();
			        }
			             
			    });

			$('.link').click(function  () {
				var link=$(this).attr('id');

				$('#konten').load(link);
			})

			


			$('#list').load('<?php echo base_url("contributor/getImageList") ;?>');

			$('#tag').focus(function  () {
				$(this).after('<p class="text-right" id="tag-wp">Ex: Vektor , World, Ocean (Min 5 Keywords)</p>');
			})
			$('#tag').blur(function  () {
				$('#tag-wp').remove();
			})

			$('#image').focus(function  () {
				$(this).after('<p class="text-right" id="image-wp">Format foto harus JPEG, format vector harus EPS. Resolusi minimum 4MP </p>');
			})
			$('#image').blur(function  () {
				$('#image-wp').remove();
			})

			$('#pdf').focus(function  () {
				$(this).after('<p class="text-right" id="pdf-wp">Format Gambar Harus .pdf</p>');
			})
			$('#pdf').blur(function  () {
				$('#pdf-wp').remove();
			})

		})
	</script>
	<script type="text/javascript">
		var main =function  () {
			$('#upload').on('submit',function  (e) 
			{

				var isi=$('.form-control').val();

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
						$('#js-upload-submit').hide()
						
						if (percentComplete==100) {
							$('#pesan').html("Please Wait...");
						};

					},
					success:function(data) 
					{
						if (data==1) 
						{
							$('#pesan').html('Success');
							$('#pesan').removeClass('text-center alert alert-danger');
							$('#pesan').addClass('text-center alert alert-success');
							$('#prog').hide();
							$('.form-control').val(kosong)
							$('#list').load('<?php echo base_url("contributor/getImageList") ;?>');
							 setTimeout(function reload () {
				  				window.location.replace('<?php echo base_url("contributor/newUpload");?>')
				  			},300);
							return false;
						}
						else
						{
							$('#pesan').html(data);
							$('#pesan').removeClass('text-center alert alert-success');
							$('#pesan').addClass('text-center alert alert-danger');
							$('#prog').hide();
							$('.form-control').val(kosong)
							$('#js-upload-submit').show()
							return false;
						};
					}

				});
				
			})

			
		};
		$(document).ready(main);
	</script>
	<script type="text/javascript">
		$('#search').keyup(function  () {
			var search=$(this).val()
			$.post('<?php echo base_url("contributor/getImageSearch"); ?>',{search:search},function  (data) 
			{
				$('#uploader').hide();
				$('.btn_uploader').show();
				$('#list').html(data);
				return false;
			});
		});
		/*
		
		*/	
	</script>
	<script type="text/javascript">
	$('#f_type').change(function  () {
				var type=$(this).val()
				
				$.post('<?php echo base_url("contributor/load_kategori");?>',{type:type},function  (data) {
					$('#select_kategory').html(data)
				})
			});
	</script>
<script language=JavaScript>

var message="Function Disabled!";

///////////////////////////////////
function clickIE4(){
if (event.button==2){
alert(message);
return false;
}
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}

document.oncontextmenu=new Function("return false")

// --> 
</script>

</body>
</html>



