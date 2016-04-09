<style type="text/css">
	.zoom
	{
		zoom:80%;
	}
	label
	{
		padding-top: 10px;
	}
	.pad{
		padding-top: 4%;
	}
</style>
<?php foreach ($contributor->result() as $row):?>
<div class="panel panel-default">
	<div class="panel-heading">
		Your Profile (<?php if($row->app_status==0){ echo " Status: Waiting List Contributor";} else {echo "Status: Contributor";};?>)
		<div class="text-right"> <progress  id='prog' max='100' min='0' style='display:none ; width=100%';></progress><div id="persen"></div></div>
	</div>
	<form method="post" type='post' id="form_profil" action="<?php echo base_url("contributor/update")?>" enctype="multipart/form-data">
	<div class="panel-body">
		<div class="form-group">
			<div id="pesan"></div>
			<div class="text-center">
				 <?php 
				 	$foto=$row->foto;
				 	if ($foto=='') {
				 		echo '<img height="100px" class="img-circle" id="blah" src="'.base_url().'assets/img/user.png" alt="your image" />';
				 	}
				 	else
				 	{
				 		echo  '<img height="100px" class="img-circle" id="blah" src="'.base_url("upload/user/$foto").'" alt="your image" />';
				 	}
				 	;?>
			</div>
			<div class="col-md-6">
			<label>Username</label>
				<input class="form-control" name="memberid" id="memberid" value="<?=$row->memberid;?>" type='hidden'>
				<input readonly class="form-control" name="username" id="username" value="<?=$row->username;?>">
				<label>Email</label>
				<input class="form-control" name="email" id="email" value="<?=$row->email;?>">
				<label>Nama</label>
				<input class="form-control" name="nama" id="nama" value="<?=$row->nama;?>">
				<label>Foto</label>
				<input class="form-control" type="file" name="userfile" size="20" id="imgInp" />
			</div>
			<div class="col-md-6">
				<label>Nomor Identitas</label>
				<input class="form-control" name="no_identitas" id="no_identitas" value="<?=$row->no_identitas;?>">
				<label>Tanggal Lahir</label>
				<input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?=$row->tanggal_lahir;?>">
				<label>Alamat</label>
				<input class="form-control" name="alamat" id="alamat" value="<?=$row->alamat;?>">

			</div>
			
			
			
		</div>
		<div class="pull-right pad">
			
			<button type="submit" class="btn btn-sm btn-warning" id="up"><i id='submit'></i> Update Profile</button>
			<a href="<?=base_url('contributor');?>" class="btn btn-default"> Cancel</a>
		</div>
		</form>
		
	</div>
	
	
</div>
<?php endforeach;?>
	<script type="text/javascript">
		function readURL(input) {

			    if (input.files && input.files[0]) {
			        var reader = new FileReader();

			        reader.onload = function (e) {
			            $('#blah').attr('src', e.target.result);
			        }

			        reader.readAsDataURL(input.files[0]);
			    }
			}
			$("#imgInp").change(function(){
			    readURL(this);
			});
	</script>
	

	