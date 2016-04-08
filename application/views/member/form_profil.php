<style type="text/css">
	.zoom
	{
		zoom:100%;
	}
	label
	{
		padding-top: 10px;
	}
</style>
<?php foreach ($member->result() as $row):?>
<div class="panel panel-default zoom">
	<div class="panel-heading">
		<h4><i class='fa fa-user'></i> Profil</h4>
	</div>
	<form method="post" type='post' id="form_profil" action="<?php echo base_url("member/updateProfil")?>" enctype="multipart/form-data">
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
				<input class="form-control" type="file" name="userfile" size="20" id="imgInp"/>
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
		<div class="col-md-12">
			<div class="text-right">
			<button id="update" class="btn btn-warning"> Update</button>
			<a href="" class="btn btn-default"> Cancel</a>
			</div>
		</div>
	</div>
	</form>
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
