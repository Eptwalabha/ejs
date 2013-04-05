<select id="cb_kno">
<?php
	foreach ($kno as $k){
?>
		<option value="<?php echo $k['kno_id']; ?>"><?php echo $k['kno_name'];?></option>
<?php
	}
?>
</select>
