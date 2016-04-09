<style type="text/css">
	#navicon
	{
		padding-bottom: 10px;

	}
	.navbar-brand
	{
		padding-bottom: 40px;
		padding-left: 50px;
	}
	.nav
	{
		padding-top: 8px;
	}
</style>
<script type="text/javascript" src="<?=base_url('assets/js/js.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

							<div class="navbar-header">
								 
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
								</button> 
								<a class="navbar-brand" href="<?php echo base_url(); ?>">
									<img id="navicon" width="70px" height="auto" src="<?php echo base_url("assets/img/pixtox-png.png");?>">
								</a>
							</div>
							
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								
								
								<ul class="nav navbar-nav navbar-right">
									
									<li class="dropdown">
										 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class='fa fa-camera'></i> About <strong class="caret"></strong></a>
										<ul class="dropdown-menu">
											<li>
												<a href="<?php echo base_url('page/story');?>">Story</a>
											</li>
											<li>
												<a href="<?php echo base_url('page/career');?>">Career</a>
											</li>
											<li>
												<a href="<?php echo base_url('page/faq');?>">FAQ</a>
											</li>										
										</ul>
									</li>
									<li>
										<a class="white" href="<?php echo base_url("pricing");?>"><i class="fa fa-dollar"></i> Pricing</a>
									</li>
									
									<li>
										<a class="white" href="<?php echo base_url("request");?>"><i class='fa fa-comment'></i> Special Request</a>
									</li>
<li>
						<a href="https://www.facebook.com/Pixtoxcom-1495871197396392" class="link" target="__blank">
							<i class='fa fa-facebook-square'></i> Merchandise
						</a>
					</li>
									<li >
										<a href="<?=base_url('daftar');?>"><i class='fa fa-user' ></i> Membership</a>
									</li>
									<li>
										<?=$link;?>
										
									</li>
									<li>
										<a href=""></a>
									</li>
									
								</ul>
							</div>
							
						</nav>
						