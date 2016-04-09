<div class="col-md-3"></div>
<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			<i class='fa fa-key'> Change Password</i>
		</div>
		<div class="panel-body">
		<div id="pesan"></div>
		<form method="post" id="form_password" action="/">
			<label>New Password</label>
			<div id="st-password" class="">
			<input type="password" id='new' name="password" class="form-control">
			</div>
			<br>
			
			<div id="st-confirm" class="">
			<label>Confirm Password</label>
			<input type="password" id='confirm' class="form-control">
			</div>
			<br>
			<div class="text-right">
				<button class="btn btn-warning" id="submit"><i class='fa fa-update'></i> Update</button>
			</div>
		</form>
	</div>
	</div>
</div>
<div class="col-md-3"></div>
<script type="text/javascript">
	$(document).ready(function  () {
			$('#new').keyup(function  () {
				var isi=$(this).val()
				if (isi.length>6) 
				{
					$('#st-password').removeClass('has-error');					
					$("p").remove();	
					$('#st-password').addClass('has-success');
				}
				else if(isi.length<6 && isi.length>0)
				{
					$('#st-password').removeClass('has-error');					
					$("p").remove();	
					$('#st-password').addClass('has-error').after("<p id='pesan' class='text-danger pesan pull-right'>Masukan Lebih dari 6 Karakter</p>");
				}
				else if (isi.length<1) 
				{
					$('#st-password').addClass('has-default');
				};			
			})
			$('#new').blur(function  () {
				var isi=$(this).val()
				if (isi.length>6) 
				{
					$('#st-password').removeClass('has-error');					
					$("p").remove();	
					$('#st-password').addClass('has-success');
				}
				else if(isi.length<6 && isi.length>0)
				{
					$('#st-password').removeClass('has-error');					
					$("p").remove();	
					$('#st-password').addClass('has-error').after("<p id='pesan' class='text-danger pesan pull-right'>Masukan Lebih dari 6 Karakter</p>");
				}
				else if (isi.length<1) 
				{
					$('#st-password').addClass('has-default');
				};			
			})

			$('#confirm').keyup(function  () {
				var isi=$(this).val()
				var newp=$('#new').val()
				if (isi!=newp) {
					$('#st-confirm').removeClass('has-error');
					$("p").remove();	
					$('#st-confirm').addClass('has-error').after("<p id='pesan' class='text-danger pesan pull-right'>Password Tidak Sama</p>");
				}
				else
				{
					$('#st-confirm').removeClass('has-error');					
					$("p").remove();	
					$('#st-confirm').addClass('has-success');
				}
			})
			$('#confirm').blur(function  () {
				var isi=$(this).val()
				var newp=$('#new').val()
				if (isi!=newp) {
					$('#st-confirm').removeClass('has-error');
					$("p").remove();	
					$('#st-confirm').addClass('has-error').after("<p id='pesan' class='text-danger pesan pull-right'>Password Tidak Sama</p>");
				}
				else
				{
					$('#st-confirm').removeClass('has-error');					
					$("p").remove();	
					$('#st-confirm').addClass('has-success');
				}
			})
	})
</script>
<script type="text/javascript">
	$(document).ready(function  () {
		
		$('#submit').click(function  () {
			$.post('<?=base_url("contributor/updatePassword");?>',$("#form_password" ).serialize(),function  (data) {
				$('#pesan').html(data);
				$('#pesan').show(300).delay(1000).fadeOut('slow');
			})
			return false;
		})
	})
</script>