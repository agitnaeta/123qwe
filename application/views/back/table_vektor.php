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


<table  class="table table-responsive">
	<thead class="bg-primary">
		<th colspan="12">
			Menampilkan (<?=count($vektor->result());?>)
		</th>
	</thead>
	<thead class="bg-info">
		<th><a class='sorting' href="#" id="idreq">ID REQ</a></th>
		<th><a class='sorting' href="#" id="name">Name</a></th>
		<th><a class='sorting' href="#" id="category">Category</a></th>
		<th><a class='sorting' href="#" id="text">Text</a></th>
		<th><a class='sorting' href="#" id="tag_line">Tagline</a></th>
		<th><a class='' href="#" id="">Color</a></th>
		<th><a class='sorting' href="#" id="industry">Industry</a></th>
		<th><a class='sorting' href="#" id="detail">Detail</a></th>
		<th><a class='sorting' href="#" id="phone">Phone</a></th>
		<th><a class='sorting' href="#" id="email">Email</a></th>
		<th><a class='sorting' href="#" id="deadline">Deadline</a></th>
		<th><a class='sorting' href="#" id="budget">Budget</a></th>
		
	</thead>
	<tbody>
	<?php foreach($vektor->result() as $row):?>
		<tr>
			<td><?=$row->idreq;?></td>
			<td><?=$row->name;?></td>
			<td><?=$row->category;?></td>
			<td><?=$row->text;?></td>
			<td><?=$row->tag_line;?></td>
			<td>
				<span style="background-color:<?=$row->color1;?>;color:#fff;"><?=$row->color1;?></span>
				<span style="background-color:<?=$row->color2;?>;color:#fff;"><?=$row->color2;?></span>
				<span style="background-color:<?=$row->color3;?>;color:#fff;"><?=$row->color3;?></span>
			</td>
			<td><?=$row->industry;?></td>
			<td><?=$row->detail;?></td>
			<td><?=$row->phone;?></td>
			<td><?=$row->email;?></td>
			<td><?=dateindo($row->deadline,"table");?></td>
			<td><?=rupiah($row->budget);?></td>
			
		</tr>
	<?php endforeach;?>	
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function  () {
		$('.sorting').click(function  () {
			var sorting=$(this).attr('id');
			$.post('<?php echo base_url("pxadmin/sorting_req_vektor");?>',{sorting:sorting},function  (data) {
				$('#table_vektor').html(data)
			})
		})
		
		


		$('.delete').click(function  () {
			var idreq=$(this).attr('id');

			if (!confirm("Are You Sure?")) 
			{
				return false;
			}
			else
			{
				$.post('<?php echo base_url("pxadmin/delete_req_vektor");?>',{idreq:idreq},function  (data) {
				$('#table_vektor').html(data)
				})
				
			}
		})
	})
</script>
<script type="text/javascript">
	$('.detail').click(function  () {
		var idreq=$(this).attr('data-id');
		$.post('<?php echo base_url("pxadmin/detail_req_vektor");?>',{idreq:idreq},function  (data) {
			$('.hasil').html(data)
			var obj=JSON.parse(data);
			$('#name').html(obj.name);
			$('#category').html(obj.category);
			$('#text').html(obj.text);
			$('#tagline').html(obj.tagline);
			$('#warna').html(obj.warna);

		})
	})
</script>