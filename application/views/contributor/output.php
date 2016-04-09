<?php
	$ret='';
	if ($result!='') 
	{
		foreach ($result as $row)
		{
			$name=$row['file_name'];
			$size=$row['file_size'];
		
			$ret.='<div class="col-md-3">';
			$ret.='<p class="text-center">'.$name.'</p>';
			$ret.=img(base_url("upload/test/".$name));
			$ret.='</div>';
		}

	}
	echo $ret;
	;?>
</div>