<?php 
	if ( ! function_exists('pregimage'))
	{
		function pregimage($kategori)
		{
			$cek=strpos($kategori,",");
			if ($cek!=null) {
				 $explode=explode(",", $kategori);
				 return str_replace(" ",'',$explode[0]);		
			}
			else
			{
				$explode=explode(" ", $kategori);
				return str_replace(" ",'',$explode[0]);		
			}
			
		}
	}


 		