<title>Pixtox | Setting Email</title>
<div class="container">
<div class="row">
	<div class="col-md-12">
	<div class="panel panel-default">
			<div class="panel-heading">
			<div class="btn-group">
			  <a href="<?php echo base_url("pxadmin");?>" type="button" class="btn btn-primary"><i class="fa fa-home"></i> Panel</a>
			  <a href="<?php echo base_url("email/page_templateEmail");?>" type="button" class="btn btn-warning"><i class="fa fa-file-o"></i> Template</a>
			  <a href="<?php echo base_url("email/page_settingMail");?>" type="button" class="btn btn-danger"><i class="fa fa-cog"></i> Setting</a>
			</div>
	</div>
	</div>
	</div>
<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			<b>	Konfigurasi Email</b>
		</div>
		<div class="panel-body">
			<form id="form_email" method="post" action="#">
					<div id="pesan"></div>
					<label>Host</label>
					<input id="id" name='id'  type="hidden" class='form-control' placeholder="mail.pixtox.com">
					<input id="host" name='host'  class='form-control' placeholder="mail.pixtox.com">
					<label>Username</label>
					<input  id="username" name='username'  class='form-control' placeholder="Username">
					<label>Password</label>
					<input id="password" name='password'  class='form-control' >
					<label>Port</label>
					<input id="port" name='port'  class='form-control' placeholder="Default : 587">
			</form>
		</div>
	</div>
	<div class="panel panel-footer">
		<a class="btn btn-warning" id="update"><i class="fa fa-save"></i> Update</a>
	</div>
</div>
<div class="col-md-6">
	<div  class="panel panel-default">
		<div class="panel-heading">
		<b>Keterangan</b>
		</div>
		<div class="panel-body">
			<ul>
				<li>Host diisi dengan host email web anda</li>
				<li>Username diisi dengan username email forwarder anda</li>
				<li>Password diisi dengan password email forwarder</li>
				<li>Port diisi dengan port email server anda</li>
			</ul>
		</div>
	</div>
</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {

		// getSetting
		$.get('<?php echo base_url('email/getSetting')?>',function (data) {
			o=JSON.parse(data)
			 $('#host').val(o[0].host)
			 $('#username').val(o[0].username)
			 $('#password').val(o[0].password)
			 $('#port').val(o[0].port)
			 $('#id').val(o[0].id)
		})

		// updateSetting
		$('#update').click(function () {
			$.post('<?php echo base_url("email/updateSetting");?>',$('#form_email').serialize(),function (data) {
				if (data==1) {
					$('#pesan').html('<div class="alert alert-success"> Berhasil</div>').show().delay(500).fadeOut('slow')
				}
				else{
					$('#pesan').html('<div class="alert alert-success"> Gagal  '+data+'</div>').show().delay(500).fadeOut('slow')
				}
			})
		})

		
	})
</script>