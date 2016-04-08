	
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form id="form_image" method="post" action="#">
				<div class="input-group">
				  <input name="search" type="text" class="form-control" aria-label="...">
				  <div class="input-group-btn">
				  
				   <a id="btn_search" class="btn btn-warning"><i class='fa fa-search'></i> Search</a>
				  </div>
				</div>
				</form>
				<br>
			</div>
			<div class="col-md-3"></div>

			<div id="konten-image" class="col-md-12">
				
			</div>
	<script type="text/javascript">
		$('#konten-image').load('<?php echo base_url("member/imageList");?>');
			
		$('#btn_search').click(function  () {

			$.post('<?php echo base_url("member/search_image");?>',$('#form_image').serialize(),function  (data) {
				$('#konten-image').html(data)
			})
		})	
	</script>