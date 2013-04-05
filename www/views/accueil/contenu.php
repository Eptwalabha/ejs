<div class="row-fluid">
	<div class="span12">
		<h1>Bienvenue!</h1>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		&gt; Accueil
	</div>
</div>
<div class="row-fluid">
	<div class="span3">
		<?php 
			include("./views/accueil/menu.php");
		?>
	</div>
	<div class="span9">
		<?php //  
		// 	include('./views/accueil/role_ejs.php');	
		// ?>
		<div class="subBody">
			<div class="subBodyTitle">
				<h2>Les dernières news!</h2>
			</div>
			<?php
				foreach ($newsletter as $news){
			?>
			<div class="news">
				<div class="title"><h3><?php echo stripslashes($news['title']); ?></h3></div>
				<div class="text"><?php echo stripslashes($news['text']); ?></div>
				<div class="info"><?php echo "par ".$news['author']." le ".$news['date']; ?></div>
			</div>	
			<?php		
					
				}
			?>
		</div>
	</div>
</div>