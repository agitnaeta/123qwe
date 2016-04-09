<div class="col-md-12">
	<?php 	$i=count($vektor->result()); 
      		$ii=count($jumlah->result());
      	;?>
	<h3><i class='fa fa-comment'></i> Special Request (<?=$x=$i+$ii;?>)  <span id="pesan" class="bg-success"></span></h3>
<hr>
</div>
<div class="col-md-12">
	<ul id = "myTab" class = "nav nav-tabs">
   <li class = "active">
      <a href = "#photo" data-toggle = "tab">
      	<?php $ii=count($jumlah->result());?>
        Photo Request (<?=$ii;?>)
      </a>
   </li>
   
   <li><a href = "#vektor" data-toggle = "tab">Vektor Request (<?=count($vektor->result());?>)</a></li>	
</ul>

<div id = "myTabContent" class = "tab-content">

   <div class = "tab-pane fade in active" id = "photo">
     <div class="col-md-12">
		<div class="panel-default">
			<div class="panel-heading">
						<div class="row">
							  <div class="col-xs-2">
							  	  <input type="number" min='1' value="10" id="show" class="form-control" placeholder="Tampilkan">
							  </div>
							    <div class="col-xs-2">
							  	<select id="status"  class="form-control">
							  		<option value=""> Show Status</option>
							  		<option value="1"> Deal</option>
							  		<option value="0"> Pending</option>
							  	</select>
							  </div>		
							  <div class="col-xs-8">
							    	<div class="input-group">
									<input  class=' field  form-control' name="search" id="search" placeholder='Search Name...'>
									<span  class='input-group-btn' >
										<button id="btn_search" class="btn btn-primary"><i class='fa fa-search'></i> Cari</button>					
										<button  class="refresh btn btn-success"><i class='fa fa-refresh'></i> Refresh</button>
										<button class="deleteAll btn btn-danger"><i class='fa fa-trash'></i> Delete All</button>
																	
									</span>
								</div>
							  </div>
						</div>
					</div>

			<div class="panel-body">
				<div id="table" class="table table-responsive">
			
				</div>
			</div>
		</div>
		</div>
   </div>
   
   <div class = "tab-pane fade" id = "vektor">
   					<div class="row">
							  <div class="col-xs-2">
							  	  <input type="number" min='1' value="10" id="vshow" class="form-control" placeholder="Tampilkan">
							  </div>
							    <div class="col-xs-2">
							  	<select id="vstatus"  class="form-control">
							  		<option value=""> Show Status</option>
							  		<option value="1"> Deal</option>
							  		<option value="0"> Pending</option>
							  	</select>
							  </div>		
							  <div class="col-xs-8">
							    	<div class="input-group">
									<input  class=' field  form-control' name="vsearch" id="vsearch" placeholder='Search Name...'>
									<span  class='input-group-btn' >
										<button id="vbtn_search" class="btn btn-primary"><i class='fa fa-search'></i> Cari</button>					
										<button  class="vrefresh btn btn-success"><i class='fa fa-refresh'></i> Refresh</button>
										<button class="vdeleteAll btn btn-danger"><i class='fa fa-trash'></i> Delete All</button>
																	
									</span>
								</div>
							  </div>
						</div>
						<br>
						<div class="pesan"></div>
      					<div id="table_vektor"></div>
   </div>
   
   
</div>
</div>

<script type="text/javascript" src="<?=base_url('assets/js/js.js');?>"></script>
<script type="text/javascript">
	$(document).ready(function  () {
		//default f

		
		$('#form_update').hide();
		function refresh() 
		{
			var show=$('#show').val();
			var kosong='';
			$.post('<?php echo base_url("pxadmin/limit_req"); ?>',{show:show},function  (data) {
				$('#table').html(data);
			})
			$('.form-control').val(kosong);
			$('#show').val(10);
		}
		refresh();

		//refresh
		$('.refresh').click(function  () {
			refresh();
		});
		//cari
		$('#search').keyup(function  () {
			var search=$(this).val();
			$.post('<?php echo base_url("pxadmin/search_req"); ?>',{search:search},function  (data) {
				$('#table').html(data);
				});
			return false;
		});
		
		//sort Limit
		$('#show').change(function  () {
			var show=$('#show').val();
			$.post('<?php echo base_url("pxadmin/limit_req"); ?>',{show:show},function  (data) {
				$('#table').html(data);
				return false;
			})
		})

		//sort Status
		$('#status').change(function  () {
			var status=$('#status').val();
			if (status.length>0) {
				$.post('<?php echo base_url("pxadmin/status_req"); ?>',{status:status},function  (data) {
				$('#table').html(data);
				return false;
				})
			}
			else
			{
				refresh();
			};
		})
		//deleteAll
		$('.deleteAll').click(function  () {
			var idreq=$(this).attr('id');
			if (!confirm("Are You Sure Delete All Data?")) 
			{
				return false;
			}
			else
			{
				$.post('<?php echo base_url("pxadmin/deleteAll_faq") ?>',{idreq:idreq},function  (data) {
					$('#pesan').html(data);
					
					
				});
				$('#konten').load('<?php echo base_url("pxadmin/page_request") ?>');
			}
		})

	});
</script>
<script type="text/javascript">
	$(document).ready(function  () {
		$('#table_vektor').load('<?php echo base_url("pxadmin/table_vektor");?>');

		$('#vshow').change(function  () {
			var show=$(this).val();
			$.post('<?php echo base_url("pxadmin/limit_req_vektor"); ?>',{show:show},function  (data) {
				$('#table_vektor').html(data);
				return false;
			})
		})

		$('#vsearch').keyup(function  () {
			var search=$(this).val();
			$.post('<?php echo base_url("pxadmin/search_req_vektor"); ?>',{search:search},function  (data) {
				$('#table_vektor').html(data);
				return false;
			})
		})
		$('#vbtn_search').click(function  () {
			var search=$('#vsearch').val();
			$.post('<?php echo base_url("pxadmin/search_req_vektor"); ?>',{search:search},function  (data) {
				$('#table_vektor').html(data);
				return false;
			})
		})

		$('#vstatus').change(function  () {
			var status=$(this).val();
			if (status.length>0) {
				$.post('<?php echo base_url("pxadmin/status_req_vektor"); ?>',{status:status},function  (data) {
				$('#table_vektor').html(data);
				return false;
				})
			}
			else
			{
				refresh();
			};
		})

		$('.vrefresh').click(function  () {
			$('#table_vektor').load('<?php echo base_url("pxadmin/table_vektor");?>');
		})
		$('.vdeleteAll').click(function  () {
			$('.pesan').load('<?php echo base_url("pxadmin/deleteAll_req_vektor");?>');
		})

		
	})
</script>
