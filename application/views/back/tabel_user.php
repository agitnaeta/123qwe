<div id="pesanTabel"></div>
	<table class="table table-bordered table-condensed" id="myTable">
	<thead class="bg-primary">
		<th>UserID</th>
		<th>Username</th>
		<th>Status</th>
		<th>Email</th>
		<th>Action</th>
	</thead>
	<tbody >
	<?php foreach ($user->result() as $row):?>
		<tr>
			<td><?=$row->userID;?></td>
			<td id="pesan"><?=$row->username;?></td>
			
			<td><?php if($row->status==1){ echo "Active";}else{echo "Dicative";};?></td>
			<td><?=$row->email;?></td>
			<td width="20%">
				<a  id="<?= $row->userID;?>" class=" btn btn-default edit"  href="#"><i class='fa fa-pencil'></i></a>
				<a   id="<?= $row->userID;?>" class=" btn btn-default delete"  href="#"><i class='fa fa-remove'></i></a>
			</td>
		</tr>
	<?php endforeach;?>	
	</tbody>
	Load Page : {elapsed_time} Second
	</table>

<script type="text/javascript">
	$(document).ready(function  () {
		 
		 $('#myTable').DataTable( {
	        "scrollY":        "300px",
	        "scrollCollapse": true,
	        "paging":         false
	    } );

		$('.delete').click(function  () {

		    if (confirm("Are you sure?")) {
		        var id=$(this).attr('id');
				$.post('<?=base_url("pxadmin/deleteUser");?>',{id:id},function  (data) {
					$('#pesanTabel').html(data);
					$('#tabel').load('<?=base_url("pxadmin/tabel_user");?>');
				})
		    }
		    return false;
		})
		$('.edit').click(function  () {
			var id=$(this).attr('id');
			$.post('<?=base_url("pxadmin/editUser");?>',{id:id},function  (data) {
				var obj = JSON.parse(data);
				$("#username").val(obj[0].username);
				$("#userid").val(obj[0].userID);
				$("#email").val(obj[0].email);
				$("#username").focus();
				$("#submit").hide();
				$('.hiddenid').show();
			})
			return false;
		})
		
		//check all
		    $('#all').click(function(event) {  //on click
	        if(this.checked) { // check select status
	            $('.userid').each(function() { //loop through each checkbox
	                this.checked = true;  //select all checkboxes with class "id_article"               
	            });
	        }else{
	            $('.userid').each(function() { //loop through each checkbox
	                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
	            });         
	        }
	    });


		//delete
		
		$('.refresh').click(function  () {
			var kosong='';
			$('#tabel').load('<?=base_url("pxadmin/tabel_user");?>');
			$('#username').val(kosong);
			$('#search').val(kosong);
			$('#userid').val(kosong);
			$('#email').val(kosong);
			$("#submit").show();
			$('.hiddenid').hide();
		});

		$('#update').click(function  () {
			$.post('<?php echo  base_url("pxadmin/updateUser") ?>',$('#form').serialize(),function  (data) {
				$('#pesan').html(data);
				$("#pesan").show().delay(700).fadeOut();
				$('#tabel').load('<?=base_url("pxadmin/tabel_user");?>');
			
			})
			return false;
		})

		$('#search').keyup(function  () {
			var cari=$('#search').val();
			if (cari.length>3) {
				$.post('<?php echo base_url("pxadmin/cariUser");?>',{cari:cari},function  (data) {
				$('#tabel').html(data);
				return false;
			})
			};
			return false;
		})

	})
</script>

