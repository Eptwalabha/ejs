<header id="header_top">
<div class="top_div title start_line">
	EJS
</div>
	<div class="top_div middle_line">
		<ul class="menu_top">
			<li><a href="<?php echo WEBROOT; ?>accueil/bonjour">Accueil</a></li>
			<li><a href="<?php echo WEBROOT; ?>accueil/presentation">L'association</a></li>
		<?php
			if(!isset($_SESSION['user_id'])){
		?>
			<li><a href="<?php echo WEBROOT; ?>inscription/accueil">s'inscrire</a></li>
		<?php
			}else{
		?>
			<li><a href="<?php echo WEBROOT; ?>mon_espace/accueil">Mon espace</a></li>
		<?php
				if($_SESSION['user_mode'] == 1){
				?>
			<li><a href="<?php echo WEBROOT; ?>administration/accueil">MyAdmin</a></li>
		<?php
				} 
			}
		?>
		</ul>
	</div>
	<div class="top_div end_line">
		<?php
			include("./views/commun/login.php"); 
		?>
	</div>
</header>