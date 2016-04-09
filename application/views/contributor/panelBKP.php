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
				<div class="text-right">
					<?=$username;?>
				</div>
			</div>	
			<div class="panel-body">
				<ul class="nav">
					<li>
						<a class="link" href=""><i class='fa fa-home'></i> Contributor Panel</a>
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
			<div class="panel panel-default">
				<div class="panel-body">
					<ul class="nav nav-tabs">
					  <li class="active form_image"><a class="form_image" href="#"><span class="badge"> 1 </span> Upload Image</a></li>
					  <li class="form_pdf"><a class="form_pdf" href="#"><span class="badge"> 2</span> Press Realise</a></li>
					</ul>
				</div>
			</div>
				<form class="real_form" id="upload" action="<?=base_url("contributor/uploadImage");?>" method="post" enctype="multipart/form-data">
				<div class="panel panel-default">
			       	<div class="panel-heading"><strong>Upload Image</strong> <div class="text-right" id="persen"></div></div>
			        	<div class="panel-body">
			          	<div class="col-md-12">
			          	<center>
			          			<div id="pesan"></div>			          
			          			 <progress  id='prog' max='100' min='0' style='display:none ; width=100%';></progress>
			          	</center>
					            <div class="form-group">
					              <div class="form-group">
					              	<label>Deskripsi</label>
					              	<input tabindex="1" type="text" name="judul" class="form-control">
					              	<label>Foto</label>
					                <input tabindex="2" class="form-control" type="file" name="userfile" id="userfile" >
					               
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
								    <label></label>
								    <br>
								    <input name="image_week" value="1" type="checkbox"> Anda setuju jika foto yang di tolak akan dijadikan promosi free photo of the week

					              </div>					              	
					            </div>
			          </div>
			          <div class="col-md-12 text-right">			          	
					       <button  tabindex="5" type="submit" class="btn btn-warning " id="js-upload-submit">Upload </button>
			          </div>
			        </div>
			      </div>
			      </form>
			     <form id="form_upload_pdf" class="form-group real_form" action="<?=base_url("contributor/uploadPdf");?>" method="post" enctype="multipart/form-data">
			       
			       	<div class="panel panel-default">
			       	 <div class="panel-heading"><strong>Upload Model Realise</strong> <div class="text-right" id="persen2"></div></div>			       		 
			       		<div class="panel-body">
			       		<center>
			       		 	<div id="pesan2"></div>			          
			          	 	<progress  id='prog2' max='100' min='0' style='display:none ; width=100%';></progress>
			       		 </center>
			       			<label>Model Realise</label>
							<input tabindex="2" class="form-control" type="file" name="userfile" id="pdf" >
							<br>
							<label><i class='fa fa-info-circle'></i> Info..</label>
							<blockquote>
									<small>
										Model realise adalah form yang berisi perjanjian tentang foto yang di upload, dengan tujuan 
									foto yang di upload tidak menyalahi aturan yang berlaku jika anda menggunakan foto orang/Model.
									</small>
							</blockquote>
			       		</div>
			       		<div class="panel-footer">
			       			<button type="submit" class="btn btn-warning"> Upload</button>
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
			$('.btn_uploader').hide();
			$('.btn_uploader').click(function()
			{
				$('#uploader').show()
				$(this).hide();
			})
			
	 
			$('.link').click(function  () {
				var link=$(this).attr('id');

				$('#konten').load(link);
			})

			$('#form_upload_pdf').hide();

			$('.form_image').click(function() {
				$('#form_pdf').removeClass('active');
				$('#form_upload_pdf').hide();
				$('#upload').show();
			})
			$('.form_pdf').click(function() {
				$('#form_image').removeClass('active');
				$('#upload').hide();
					$('#form_upload_pdf').show();
				
			})


			
			$('#pdf').click(function  () {
				$('#pdf_info').remove();
				$(this).after('<p id="pdf_info" class="text-warning text-right">File Harus Berbentuk Pdf</px>');
			})


			$('#list').load('<?php echo base_url("contributor/getImageList") ;?>');

			$('#tag').focus(function  () {
				$(this).after('<p class="text-right" id="tag-wp">Ex: Vektor , World, Ocean (Min 5 Keywords)</p>');
			})
			$('#tag').blur(function  () {
				$('#tag-wp').remove();
			})

			$('#userfile').focus(function  () {
				$(this).after('<p class="text-right" id="userfile-wp">Format Gambar Harus .jpg, .ips</p>');
			})
			$('#userfile').blur(function  () {
				$('#userfile-wp').remove();
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
						$('#persen').html(percentComplete+'%');

					},
					success:function(data) 
					{
						if (data!='Success') 
						{
							$('#persen').html(data);
							$('#prog').hide();
							$('.selek').remove();
							$('.form-control').val(kosong)
							return false;
						}
						else
						{
							$('#persen').html(data);
							$('#prog').hide();
							$('.selek').remove();
							$('.form-control').val(kosong)
							$('#list').load('<?php echo base_url("contributor/getImageList") ;?>');
							$('#pesan2').html('<p class="text-center">Foto telah tesimpan,1 langkah lagi silahkan upload model realise</p>');
							
							//Step 2 
							$('.form_image').removeClass('active');
							$('.form_pdf').addClass('active');
							$('#upload').hide();
							$('#form_upload_pdf').show();

							return false;
						};
					}

				});
				
			})

			
		};
		$(document).ready(main);
	</script>
	
	<script type="text/javascript">
		var pdf =function  () {
			$('#form_upload_pdf').on('submit',function  (e) 
			{
				var kosong='';
				e.preventDefault();
				$(this).ajaxSubmit(
				{
					beforeSend:function  ()
					 {
						$('#prog2').show();
						$('#pesan2').addClass('text-center');
						$('#prog2').attr('value','0');
					},
					uploadProgress:function  (event,position,total,percentComplete) 
					{
						$('#prog2').attr('value',percentComplete);
						$('#persen2').html(percentComplete+'%');

					},
					success:function(data) 
					{
						if (data!='Success') 
						{
							$('#persen2').html(data);
							$('#pesan').addClass('text-center');
							$('#prog2').hide();
							$('.form-control').val(kosong)
							return false;
						}
						else
						{
							$('#pesan2').html(data);

							$('#pesan2').addClass('text-center');
							$('#prog2').hide();
							$('.form-control').val(kosong)
							$('#list').load('<?php echo base_url("contributor/getImageList") ;?>');
							return false;
						};
					}

				});
				
			})

			
		};
		$(document).ready(pdf);
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

	
</body>
</html>



