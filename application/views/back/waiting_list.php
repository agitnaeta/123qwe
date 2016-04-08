<div class="container">
	<div class="row">
    <?=form_open_multipart('contributor/uploadMultiple', array('id' => 'upload'));;?>
      <input type="file" name="userfile">
      <button type="submit"> Upload</button>
     </form>
     	 <div id="persen"></div>
     	 <progress  id='prog' max='100' min='0' style='display:none ; width=100%';></progress>
	</div>
</div>
<div class="modal"></div>
<script type="text/javascript" src="<?=base_url('assets/js/js.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/form.js');?>"></script>
<script type="text/javascript">
		var main =function  () {
			$('#uplolad').on('submit',function  (e) 
			{
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
					success:function  (data) 
					{
						$('#persen').html(data);
						$('#prog').hide();
						$('.form-control').val(kosong)
						$('#list').load('<?php echo base_url("contributor/getImageTemp") ;?>');
						return false;
					}

				});
				
			})

			
		};
		$(document).ready(main);
	</script>