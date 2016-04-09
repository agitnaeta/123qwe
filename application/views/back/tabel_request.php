<style type="text/css">
	table
	{
		zoom:80%;
	}
	dialog
	{
		width: 1000px;
		height: 500px;
		border-color: transparent;
		background-color: transparent;
	}
	body
	{
		padding-right: 0px;
	}
</style>


<table class="table table-striped">
		<thead>
			<th class="bg-primary"  colspan="12">
				Show  : <?=count($req->result());?> Data
			</th>
		</thead>
		<thead>
		
			<th><a class="sort" href="#" id="idreq"> Request ID</a></th>
			<th><a class="sort" href="#" id="name"> Name</a></th>
			<th><a class="sort" href="#" id="theme"> Theme</a></th>
			<th><a class="sort" href="#" id="object"> Object </a></th>
			<th><a class="sort" href="#" id="location"> Location </a></th>
			<th><a class="sort" href="#" id="model"> Model </a></th>
			<th><a class="sort" href="#" id="deadline"> Deadline </a></th>
			<th><a class="sort" href="#" id="email"> Email </a></th>
			<th><a class="sort" href="#" id="phone"> Phone </a></th>
			<th><a class="sort" href="#" id="budget"> Budget </a></th>
			<th><a class="sort" href="#" id="status"> Status </a></th>
			
			<th width="10%" class="text-center"><a href="#" id="action"> Action </a></th>
		</thead>
		<form  id="form_update" method="post" action="/" >
		<thead class="bg-success" id="field_update">
			
			<th><input readonly name="idreq" id="input_idreq" class="form-control"></th>
			<th><input name="name" id="input_name" class="form-control"></th>
			<th><input name="theme" id="input_theme" class="form-control"></th>
			<th><input name="object" id="input_object" class="form-control"></th>
			<th>
				<select class="form-control" name="status" id="input_location">
					<option value="1"> Indoor</option>
					<option value="0"> Outdoor</option>
				</select>
			</th>
			<th><input name="model" id="input_model" class="form-control"></th>
			<th><input name="deadline" id="input_deadline" class="form-control"></th>
			<th><input name="email" id="input_email" class="form-control"></th>
			<th><input name="phone" id="input_phone" class="form-control"></th>
			<th>
				<select class="form-control" name="status" id="input_status">
					<option value="1"> Deal</option>
					<option value="0"> Pending</option>
				</select>
			</th>
			
			<th class="text-center">
				<a id="update" href="#" class="btn btn-primary btn-block"><i class='fa fa-upload'></i> Update</a>
			</th>
		</thead>
		
		</form>
	<tbody>
	<?php foreach ($req->result() as $row):?>
		<tr title="<?=$row->name;?>"  class="dedit" id="<?=$row->idreq;?>">
			<td><?=$row->idreq;?></td>
			<td><?=$row->name;?></td>
			<td><?=$row->theme;?></td>
			<td><?=$row->object;?></td>
			<td><?php if($row->location!=1){echo "Outdoor";}else{echo "Indoor";};?> </td>
			<td><?=$row->model;?></td>
			<td><?=$row->deadline;?></td>
			<td><?=$row->email;?></td>
			<td><?=$row->phone;?></td>
			<td><?=rupiah($row->budget);?></td>
			<td><?php if($row->status!=1){echo "Pending";}else{echo "Deal";};?> </td>
			
			<td class="text-center" width="15%">
				
				 <a id="modal-<?=str_replace('.','',$row->idreq);?>" href="#modal-container-<?=str_replace('.','',$row->idreq);?>" role="button" class="btn btn-default det" data-toggle="modal">
				 <i class="fa fa-search"></i>
				 </a>
				
				<a title="Edit" href="#" id="<?=$row->idreq;?>" class="edit btn btn-default"><i class='fa fa-edit'></i> </a>
				<a title="Delete" href="#" id="<?=$row->idreq;?>" class="delete btn btn-default"><i class='fa fa-remove'></i> </a>
			</td>

		</tr>
		<tr>
			<td colspan="12">
					<div class="modal fade" id="modal-container-<?=str_replace('.','',$row->idreq);?>" role="" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									 
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										×
									</button>
									<h4 class="modal-title" id="myModalLabel">
										Detail req (<?=$row->idreq;?>)
									</h4>
								</div>
								<div class="modal-body">
									
									<div class="col-md-6">
									<br>
									<br>
										<label>Name</label><br>
										<?=$row->name;?><br>
										<label>Theme</label><br>
										<?=$row->theme;?><br>
										<label>Phone</label><br>
										<?=$row->phone;?><br>
										<label>Status</label><br>
										<?php if($row->status!=1){echo "Pending";}else{echo "Deal";};?><br>
										<label>Model</label><br>
										<?=$row->model;?><br>
									</div>
									<div class="col-md-6">
									<br>
									<br>
										<label>Deadline</label><br>
										<?=$row->deadline;?><br>
											<label>Budget</label><br>
										<?=rupiah($row->budget);?><br>
										<label>Email</label><br>
										<?=$row->email;?><br>
										<label>Object</label><br>
										<?=$row->object;?><br>
										<label>Location</label><br>
										<?php if($row->location!=1){echo "Outdoor";}else{echo "Indoor";};?><br>
										<label>Detail</label><br>
										<?=$row->detail;?><br>
									</div>
								</div>
								<div class="modal-footer">
									 
									<button id="<?=str_replace('.','',$row->idreq);?>" type="button" class="btn btn-default det" data-dismiss="modal">
										Close
									</button> 
									
								</div>
							</div>
							
						</div>
						
				</div>
			</td>
		</tr>
		
	<?php endforeach ;?>	
	</tbody>

</table>


<script type="text/javascript" src="<?=base_url('assets/js/js.js');?>"></script>
<script type="text/javascript">
	$(document).ready(function  () {
		$('#field_update').hide();

	
		$('.detail').click(function  () {
			var id=$(this).attr('id');
		 	document.getElementById("dial-"+id+"").showModal(); 
		})

		$('.close').click(function  () {
			var id=$(this).attr('id');
			document.getElementById("dial-"+id+"").close(); 
		})
				
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
	})
</script>
<script type="text/javascript">
	//default f

		var show=$('#show').val();
		var kosong='';
		$('#form_update').hide();
		function refresh() 
		{
			$.post('<?php echo base_url("pxadmin/limit_req"); ?>',{show:show},function  (data) {
				$('#table').html(data);
			})
			$('.form-control').val(kosong);
			$('#show').val(10);
		}
		
	//sort
		$('.sort').click(function  () {
			var sort=$(this).attr('id');
			$.post('<?php echo base_url("pxadmin/sort_req"); ?>',{sort:sort},function  (data) {
				$('#table').html(data);
				});
				return false;
		})
	//edit
		$('.dedit ').dblclick(function  () {
		    $('#field_update').show('slow');
			var  idreq=$(this).attr('id');
			$.post('<?php echo base_url("pxadmin/edit_req") ?>',{idreq:idreq},function  (data) {
				var obj=JSON.parse(data);
				$('#input_name').val(obj[0].name);
				$('#input_theme').val(obj[0].theme);
				$('#input_idreq').val(obj[0].idreq);
				$('#input_object').val(obj[0].object);
				$('#input_location').val(obj[0].location);
				$('#input_email').val(obj[0].email);
				$('#input_phone').val(obj[0].phone);
				$('#input_model').val(obj[0].model);
				$('#input_deadline').val(obj[0].deadline);
				$('#input_status').val(obj[0].status);
				$('#input_detail').val(obj[0].detail);
			})
		})

		$('.edit ').click(function  () {
		             $('#field_update').show('slow');
			var  idreq=$(this).attr('id');
			$.post('<?php echo base_url("pxadmin/edit_req") ?>',{idreq:idreq},function  (data) {
				var obj=JSON.parse(data);
				$('#input_name').val(obj[0].name);
				$('#input_theme').val(obj[0].theme);
				$('#input_idreq').val(obj[0].idreq);
				$('#input_object').val(obj[0].object);
				$('#input_location').val(obj[0].location);
				$('#input_email').val(obj[0].email);
				$('#input_phone').val(obj[0].phone);
				$('#input_model').val(obj[0].model);
				$('#input_deadline').val(obj[0].deadline);
				$('#input_detail').val(obj[0].detail);
			})
		})


	//update
		$('#update').click(function  () {
			
			$.post('<?php echo base_url("pxadmin/update_req"); ?>',
				{
					name:$('#input_name').val(),
					theme:$('#input_theme').val(),
					idreq:$('#input_idreq').val(),
					object:$('#input_object').val(),
					location:$('#input_location').val(),
					email:$('#input_email').val(),
					phone:$('#input_phone').val(),
					model:$('#input_model').val(),
					deadline:$('#input_deadline').val(),
					status:$('#input_status').val(),
					detail:$('#input_detail').val(),
				},
				function  (data) {
				$('#pesan').html(data);
				$('#pesan').show().delay(3000).fadeOut('slow');
				$('#field_update').hide();
				refresh();

			})
		})
	//proses
		$('.proses').click(function  () {
		 	var status=1;
		 	var idreq=$(this).attr('id');
		 	$.post('<?php echo base_url("pxadmin/proses_req");?>',{status:status,idreq:idreq},function  (data) {
		 		$('#pesan').html(data);
		 		$('#pesan').show().delay(3000).fadeOut('slow');
		 		refresh();
		 	})
		})
	//check
		 $('#all').click(function(event) {  //on click

		        if(this.checked) { // check select status
		            $('.id_media').each(function() { //loop through each checkbox
		                this.checked = true;  //select all checkboxes with class "id_media"               
		            });
		        }else{
		            $('.id_media').each(function() { //loop through each checkbox
		                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
		            });         
		        }
		    });

	//delete
		$('.delete').click(function  () {
			var idreq=$(this).attr('id');
			if (!confirm("Are You Sure?")) 
			{
				return false;
			}
			else
			{
				$.post('<?php echo base_url("pxadmin/delete_faq") ?>',{idreq:idreq},function  (data) {
					$('#pesan').html(data);
				})
				refresh();
			}
		})

		//
</script>
 