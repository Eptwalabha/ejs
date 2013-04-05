	<option value="0" selected>---</option>
<?php
	foreach ($kno as $k){
?>
		<option value="<?php echo $k['kno_id']; ?>"><?php echo $k['kno_name'];?></option>
<?php
	}
?>
