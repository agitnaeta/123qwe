
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Data Konfirmasi (<span id='jml_konfirmasi'></span>)</h3>
			<hr>
		</div>
		<div class="container">
			<div class="col-md-3"></div>
			<div class="col-md-3">
				<select id="status" class="form-control">
					<option value="">-Status-</option>
					<option value="1"> Accept</option>
					<option value="0"> Waiting</option>
				</select>
			</div>
			<div class="col-md-3">
				<div class="input-group">
			      <input id="count" type="number" min='1' type="text" class="form-control" placeholder="Show Count">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button">
			        	<i class='fa fa-search'></i>&nbsp;
			        </button>
			      </span>
			    </div>
			</div>
			<div class="col-md-3">
				<div class="input-group">
			      <input id="search" type="text" class="form-control" placeholder="Search no invoice">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button">
			        	<i class='fa fa-search'></i>&nbsp;
			        </button>
			      </span>
			    </div>
			</div>
		</div>
		<br>
		<div class="col-md-12">
			<div class="panel panel-default">
			<div class="panel-heading"></div>
			<div class="panel-body">
			<div id="pesan" class="pesan"></div>
			<div id="table" class="table table-responsive">
			</div>
			</div>
			</div>
		</div>
		
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function  () {
		$('#table').load('<?php echo base_url("pxadmin/table_konfirmasi"); ?>');
		$('#jml_konfirmasi').load('<?php echo base_url("pxadmin/jml_konfirmasi");?>');

		$('.det').click(function  () {
			$('body').css('padding-right','');
			$('.skin-blue').css('padding-right','');
			$('.sidebar-mini').css('padding-right','');
			$('.sidebar-collapse').css('padding-right','');
			$('.modal-open').css('padding-right','');	
		})
		$('.link').click(function  () {
			$('body').css('padding-right','');
			$('.skin-blue').css('padding-right','');
			$('.sidebar-mini').css('padding-right','');
			$('.sidebar-collapse').css('padding-right','');
			$('.modal-open').css('padding-right','');	
		})

		$('#count').change(function  () {
			var display=$(this).val();
			$.post('<?php echo base_url("pxadmin/table_konfirmasi");?>',{display:display},function  (data) {
				$('#table').html(data);	
			})
		})

		$('#search').keyup(function  () {
			var search=$(this).val();
			if (search.length<1) {
				$('#table').load('<?php echo base_url("pxadmin/table_konfirmasi"); ?>');
			}else
			{
					$.post('<?php echo base_url("pxadmin/search_konfirmasi");?>',{search:search}, function  (data) {
					$('#table').html(data);	
					})
			};
		})

		$('#status').change(function  () {
			var status=$(this).val();
			if (status.length<1) {
				$('#table').load('<?php echo base_url("pxadmin/table_konfirmasi"); ?>');
			}
			else
			{
				$.post('<?php echo base_url("pxadmin/status_konfirmasi");?>',{status:status},function  (data) {
				$('#table').html(data);	
				})
			};
		})


	})
</script>