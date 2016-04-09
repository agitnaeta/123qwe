<title>Waiting List Contributor</title>
 <link rel="icon" type="image/png" href="<?=base_url();?>assets/img/ico.png"/>
<style type="text/css">
label:{padding-top:1px;}

#apa
{
	padding-top: 50px;
}
</style>

<div  class="container">
<div class="row">
<h2 class="text-center"> Your Status Is Waiting List <br><small>Please Upload 10 Photos </small> </h2>
<br>
<?=$error;?>
<div class="col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading">Upload Foto</div>
		<div class="panel-body">
			<?=form_open_multipart('contributor/firts_upload');?>
				<?php for ($i=1; $i < 11; $i++):?>
					<div class="col-xs-6">
						<div class="form_element">
						<label for="photo<?=$i;?>"> File <?=$i;?></label>
							<input id="userfile<?=$i;?>" name="userfile<?=$i;?>"   type='file' class="form-control">
						</div>
					</div>
				<?php endfor;?>
				<label id="apa"></label>
				<input id="submit" type="submit" name="go_upload" value="Upload" class="btn btn-primary btn-sm ">
				<?=form_close();?>
		</div>
	</div>
</div>
<div class="col-md-3">
	<div class="panel panel-default ">
		<div class="panel-body">
			<h4>Condition  & Term</h4>
		<hr>
		
			<ol>
				<li>Minimum Image Size 4MB</li>
				<li>Minimum Width 2240</li>
				<li>Minimum Height 1680</li>
			</ol>
		</div>
	</div>

</div>
<div class="col-md-6">
<?php
	$ret='';
	if ($result!='') 
	{	
		foreach ($result as $row)
		{
			$name=$row['file_name'];
			$size=$row['file_size'];
		
			$ret.='<div class="col-md-3">';
			$ret.='<img src="'.base_url().'/upload/test/'.$name.'" width="100px" height="100px;">';
			$ret.='</div>';
		}

		if (count($result)>=10) 
		{
			$this->session->set_flashdata('akses','1');
			header('location:'.base_url("contributor/waiting_list").'');			
		}
	}
	
	echo $ret;
	;?>
</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function  () {
		$('#submit').click(function  () {
			var isi=$('.form-control').val();

			if (isi='') {
				alert("Harus Upload 10 File");
				return false;
			};

		})
	})
</script>