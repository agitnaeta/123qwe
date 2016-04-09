<div class="container">
	<h3>Image This Week</h3>
<hr>
<div class="table table-responsive">
<div class="col-md-12 text-center">
<?php foreach ($free->result() as $row):?>
<div class="col-md-6">

<div class="panel panel-default">
	<div class="panel-heading">
	<?=$row->judul;?>
	</div>
	<div class="panel-body">
		<img class="img img-responsive" src="<?=base_url("upload/mini/$row->mini");?>">
	</div>
	<div class="panel-footer">
		<a class="btn btn-block " href="<?=base_url("welcome/downloadFree/$row->big");?>">
			<i class='fa fa-download'></i>
		</a>
	</div>
</div>
</div>
<?php endforeach;?>
</div>
</div>
</div>