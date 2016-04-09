 <link rel="icon" type="image/png" href="<?=base_url();?>assets/img/ico.png"/>
 <title>Member</title>
<style type="text/css">
	.img
	{
		padding: 5px;
		padding-left: 10px;
	}
	.head
	{
		background-color: #333;
		color:#fff;
	}
	.pull-right
	{
		padding: 10px;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-default navbar-fixed-top navbar-inverse " role="navigation">
					<div class="navbar-header">
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <a class="" href="<?php echo base_url(); ?>">
						<img class="img" width="100px" src="<?=base_url();?>assets/img/pixtox-png.png">
					</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					
					
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#">
								Hello, <?php foreach ($member->result() as $row) { echo $row->username;}?> 
							</a>
						</li>
						<li>
							<a href=""></a>
						</li>
					</ul>
				</div>
				
			</nav>
		</div>
	</div>
</div>