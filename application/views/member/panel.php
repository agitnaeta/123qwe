<!DOCTYPE html>
<html>
<head>
	<title>Member Dashboard</title>
	<style type="text/css">
		.content{
			
			background-image: url("<?=base_url();?>assets/img/icoopa.png");
			background-repeat: no-repeat;
			background-position: right;
		}
		body{
			background-color: #333;
			
		}
		.radius
		{
			border-radius: 10px;
		}
		.panel-heading
		{
			background-color: #333;
		}
		.modal-body 
		{
		    width:100%;
		    height:500px;
		    overflow-y:scroll;
		}
		.container-fluid
		{
			padding-top: 3%;
		}
	</style>
</head>
<body>
<div class="container-fluid content">
	<div class="row">
		<div class="col-md-3">
		<?php foreach ($member->result() as $row):?>
		<div class="panel panel-default radius">
			<div class="panel-heading head ">
				<?php if($row->foto=='')
				{
					echo '<img width="100px" src="'.base_url("assets/img/user.png").'" class="img img-circle">';
				}
				else
				{
					echo '<img width="100px" src="'.base_url("upload/user/$row->foto").'" class="img img-circle">';
				}
			;?>
				<div class="text-right">
					<?=$row->username;?>
				</div>
			</div>	

			<div class="panel-body">
				<ul class="nav">
					<li>
						<a  href="" ><i class='fa fa-home'></i> Member Panel</a>
					</li>
					<li>
						<a class="link" id="<?php echo base_url("member/page_paket") ?>" href="#"><i class='fa fa-shopping-cart'></i> Beli Paket</a>
					</li>
					<li>
						<a class="link" id="<?php echo base_url("member/page_konfirmasi") ?>" href="#"><i class='fa fa-check-square'></i> Konfirmasi</a>
					</li>
					</li>
						<li>
						<a href="https://www.facebook.com/Pixtoxcom-1495871197396392" class="link" target="__blank">
							<i class='fa fa-facebook-square'></i> Merchandise
						</a>
					</li>
					<li>
						<a class="link" href="#" id="<?php echo base_url("member/profil") ?>"><i class='fa fa-user'></i> Profile</a>
					</li>
					<li>
						<a class="link" id="<?php echo base_url("member/detail") ?>" href="#"><i class='fa fa-pencil'></i> Detail</a>
					</li>
			
					<li>
						<a class="link"id="<?php echo base_url("member/changePassword") ?>" href="#"><i class='fa fa-key'></i> Change Password</a>
					</li>
					<li>
						<a id="modal-beContributor" href="#modal-container-beContributor" role="button" data-toggle="modal"><i class='fa fa-upload'></i> Sign Up As Contributor</a>
					</li>
					<li>
						<a  href="<?=base_url('logout');?>"><i class='fa fa-sign-out'></i> Logout</a>
					</li>
				</ul>

			</div>
			<div class="panel-footer">
				<h4>Image Stock</h4>
			</div>
			<div class="panel-body">
				<ul class="nav">
					<li>
						<a class="link" href="#" id="<?php echo site_url("member/image_vektor");?>"><i class='fa fa-image'></i> Vektor</a>
					</li>
					<li>
						<a class="link" href="#" id="<?php echo site_url("member/image_photo");?>"><i class='fa fa-image'></i> Photo</a>
					</li>
					
				</ul>
				
			</div>		
		</div>

		</div>

			<div class="modal fade" id="modal-container-beContributor" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							 
							
							<h4 class="modal-title" id="myModalLabel">
								Terms & Conditions
							</h4>
						</div>
						<div class="modal-body">
								<div id="term"></div>							
						</div>
						<div class="modal-footer">
							 
							<button type="button" class="btn btn-default" data-dismiss="modal">
								Close
							</button> 
							<a href="<?php echo base_url("member/beContributor");?>" class="btn btn-warning">
								Agree
							</a>
						</div>
					</div>
					
				</div>
				
			</div>



		<?php endforeach;?>
		<div class="col-md-9" id="konten">
		
		</div>
</div>
<div class="java">
<script type="text/javascript" src=<?=base_url('assets/js/js.js');?>></script>
	<script type="text/javascript">
		$(document).ready(function  () {

		$('#konten').load('<?php echo base_url("member/catalog");?>');
		$('.link').click(function  () {
				var link=$(this).attr('id');
				$('#konten').load(link);
				return false;
		})

		$('#modal-beContributor').click(function  () {
			$.post('<?php echo base_url("member/getTerm");?>',{},function  (data) {
				$('#term').html(data)
			})
		})

		$('#beContributor').click(function  () {
			$.post('<?php echo base_url("member/beContributor");?>',{},function  (data) {
				if (data=='Success') 
				{
					 $('.call-back').html(data);
					 $('.call-back').addClass('alert alert-success text-center');
					 
					 setTimeout(function reload () {
		  		 		window.location.replace('<?php echo base_url("contributor");?>')
		  		 	},1);
				}
				else
				{
					 $('#term').html(data);
					 $('.call-back').html("Gagal");
					 return false;
				};
			})
		})
	})
	</script>
<script language=JavaScript>
<!--

//Disable right mouse click Script
//By Maximus (maximus@nsimail.com) w/ mods by DynamicDrive
//For full source code, visit http://www.dynamicdrive.com

var message="Function Disabled!";

///////////////////////////////////
function clickIE4(){
if (event.button==2){
alert(message);
return false;
}
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}

document.oncontextmenu=new Function("return false")

// --> 
</script>
</div>
</body>
</html>


