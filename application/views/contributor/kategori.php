<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/chosen.css");?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/prism.css");?>">
<div class="selek">
	<label> Kategori </label>
	<select id="choosen" class="chosen-select form-control" multiple="multiple" name="kategori[]">
		<?php foreach($kategori->result() as $row):?>
			<option value="<?=$row->nama;?>"> <?=$row->nama;?></option>
		<?php endforeach;?>	
	</select>
</div>

	<script type="text/javascript" src="<?=base_url('assets/js/prism.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/chosen.jquery.js');?>"></script>
	  <script type="text/javascript">

	    var config = {
	      '.chosen-select'           : {},
	      '.chosen-select'			 : {max_selected_options: 7},
	      '.chosen-select-deselect'  : {allow_single_deselect:true},
	      '.chosen-select-no-single' : {disable_search_threshold:10},
	      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
	      '.chosen-select-width'     : {width:"95%"}
	    }
	    for (var selector in config) 
	    {
	      $(selector).chosen(config[selector]);

	    }
	  </script>
	