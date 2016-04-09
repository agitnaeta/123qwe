<style type="text/css">
	.modal-lg
	{
		width: 90%;
	}
</style>
<div id="pesan_reject"></div>
<form method="post" id="form_reject">
<input type="hidden" class="form-control" id="id_foto" value="<?=$id_foto;?>" name="id_foto">
<label>Subject</label>
<input class="form-control" name="f_subject" id="f_subject">
<label>Message</label>
<textarea class="form-control" name="f_msg" id="f_msg">
	
</textarea>
<br>
<a class="btn btn-warning" href="#" id="reject_msg" data-dismiss="modal">
	<i class='fa fa-envelope'></i> Send Message
</a>
</form>


<script type="text/javascript">
	$(document).ready(function  () {
		$('#reject_msg').click(function  () {
			var id_foto=$('#id_foto').val()
			var subject=$('#f_subject').val()
			var msg=$('#f_msg').val()
			var x=''
			$.post('<?php echo base_url("pxadmin/send_reject_msg");?>',
			{
				id_foto:id_foto,
				subject:subject,
				msg:msg
			},
			function  (data) {
				$('.form-control').val(x)
				$('#pesan').html(data);
				$('#pesan').addClass('text-center alert alert-success');
				// $('#pesan').show().delay(5000).fadeOut('slow');
			})
		})
	})
</script>