<?php
	$nav_page = $nav_tab['position'];
	$nbr_page = $nav_tab['count'];
	$url = $nav_tab['url'];
	if($nbr_page > 1){
?>
<div>
	
<?php 
		if($nav_page > 4){
?>
	<a href="<?php echo WEBROOT.$url; ?>&page=0">&lt;&lt;</a>
<?php
		}
	
		if($nav_page > 5){
?>
	<a href="<?php echo WEBROOT.$url;?>&page=<?php echo $nav_page - 5;?>">&lt;</a>
<?php
		}
		for($i = $nav_page - 4; ($i < $nav_page + 5) && ($i < $nbr_page); $i++){
			
			if($i >= 0){
				
				if($i != $nav_page){
?>
	<a href="<?php echo WEBROOT.$url; ?>&page=<?php echo $i; ?>"><?php echo $i + 1; ?></a>
<?php
				}else{

					echo $i + 1;
				}
			}
		}
		if($nav_page + 5 < $nbr_page){
?>
	<a href="<?php echo WEBROOT.$url; ?>&page=<?php echo $nav_page + 5; ?>">&gt;</a>
<?php
		}
		if($nav_page + 6 < $nbr_page){
?>
	<a href="<?php echo WEBROOT.$url; ?>&page=<?php echo $nbr_page - 1; ?>">&gt;&gt;</a>
<?php
		}
?>

</div>
<?php 
	}
?>