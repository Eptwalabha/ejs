<?php

if(!isset($post[])){
	
	foreach ($post as $p){
		
		?>
		
<div class="row-fluid">
	<div class="span4">les infos utilisateurs (image, pseudo, nbr de post).</div>
	<div class="span8">
		<div class="row-fluid"><div class="span12">les infos du post</div></div>
		<div class="row-fluid"><div class="span12">le titre du post</div></div>
		<div class="row-fluid"><div class="span12">le texte du post</div></div>
		<div class="row-fluid"><div class="span12">les infos en plus (répondre, like, ...)</div></div>
	</div>
</div>
		
		<?php 
		
		
	}
	
}