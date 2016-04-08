<table>
	<tr>
	<?php foreach($token->result() as $row):?>
		<td>
			<a href="<?=base_url("firstlogin/get/$row->token");?>">TOKEN</a>
		</td>
	<?php endforeach;?>
	</tr>
</table>