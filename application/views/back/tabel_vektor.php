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


<table border="1" class="table table-responsive">
	<thead>
		<th>ID REQ</th>
		<th>Name</th>
		<th>Category</th>
		<th>Text</th>
		<th>Tagline</th>
		<th>Color</th>
		<th>Industry</th>
		<th>Detail</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Deadline</th>
	</thead>
	<tbody>
	<?php foreach($vektor->result() as $row):?>
		<tr>
			<td><?=$idreq;?></td>
			<td><?=$name;?></td>
			<td><?=$category;?></td>
			<td><?=$text;?></td>
			<td><?=$tagline;?></td>
			<td><?=$color;?></td>
			<td><?=$industry;?></td>
			<td><?=$detail;?></td>
			<td><?=$phone;?></td>
			<td><?=$email;?></td>
			<td><?=dateindo($deadline,"table");?></td>
		</tr>
	<?php endforeach;?>	
	</tbody>
</table>