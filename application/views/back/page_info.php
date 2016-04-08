<style type="text/css">
	.row{
		padding: 3%;
		padding-right: 5%;
	}
</style>
<script src="<?=base_url();?>assets/ckeditor/ckeditor.js"></script>
<div class="container">
	<div class="row">
		<div class="col-md-10">
		<h3><?=$judul;?><span id='pesan' class='bg-success'></span></h3>
		
		<div>
	            <form id="form_profile" method="post" action="/">
	            <input id="title" class="form-control" name="name_page" placeholder='Title' value="<?php foreach($page->result() as $row){echo $row->name_page;};?>">
	            <textarea name="isi" id="isi" rows="10" cols="80">
	                <?php foreach($page->result() as $row){echo $row->isi;};?>
	            </textarea>
	            <script>
	                
	                // instance, using default configuration.
	                CKEDITOR.replace( 'isi' );

	            </script>
        </form>
		</div>
	</div>
	<div class="col-md-2">
	<h3>&nbsp;</h3>
		<div class="panel panel-default">
			<div class="panel-heading">
				Action
			</div>
			<div class="panel-body">
				<button id="save" class="btn btn-block btn-warning"> Save</button>
				<a href="" class="btn btn-block btn-default">Cancel</a>
			</div>
		</div>
	</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function  () {
		$('#save').click(function  () {
			var isi = CKEDITOR.instances.isi.getData();
			var name_page=$('#title').val();
			$.post('<?php echo base_url("pxadmin/$link"); ?>',{isi:isi,name_page:name_page},function  (data) {
				$('#pesan').html(data);
				$('#pesan').show().delay(1000).fadeOut('slow');
			})
		})
	})
</script>