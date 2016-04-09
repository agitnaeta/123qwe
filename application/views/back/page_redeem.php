<div class="container">
<div class="col-md-12">
<br>
<br>
<div class="pesans"></div>
</div>
	<div class="panel-body">
		<div class="col-md-6">
			 <div class="input-group">
		      <input id="search" type="text" class="form-control" placeholder="Search for...">
		      <span class="input-group-btn">
		        <button id="btn_search" class="btn btn-default" type="button">Go!</button>
		      </span>
		    </div>
		</div>
		<div class="col-md-3">
			Todal Redem Acc 
			<h3 id="acc"></h3>
		</div>
		<div class="col-md-3">
			Total Redeem Waiting
			<h3 id="wait"></h3>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
		Daftar Redeem
		</div>
		<div class="panel-body">
			<div class="table table-responsive">
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function  () {
		$('.table').load('<?php echo base_url("pxadmin/table_redeem");?>');

		$.post('<?php echo base_url("pxadmin/getDataRedeem");?>',{},function  (data) {
			
			var obj=JSON.parse(data)
			$('#acc').html(obj.acc);
			$('#acc').addClass("text-success");
			$('#wait').html(obj.wait);
			$('#wait').addClass("text-danger");

		})


		$('#btn_search').click(function  () {
			var search=$('#search').val()
			$.post('<?php echo base_url("pxadmin/search_redeem");?>',{search:search},function  (data) {
				$('.table').html(data);
			})
		})

	})
</script>