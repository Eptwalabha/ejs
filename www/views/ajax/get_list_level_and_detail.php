<label for="cb_lvl">Niveau:</label>
<select id="cb_lvl" name="lvl_id">
<?php
foreach ($level as $lvl){
?>
	<option value="<?php echo $lvl['lvl_id']; ?>" <?php if($data['lvl_id']==$lvl['lvl_id']) echo "selected"; ?>><?php echo $lvl['lvl_label'];?></option>
<?php
}
?>
</select><br />
<label for="ta_detail">D�tails:</label>
<textarea id="ta_detail" name="detail" placeholder="D�crivez bri�vement votre exp�rience dans ce domaine"><?php echo stripslashes($data['detail']); ?></textarea><br />