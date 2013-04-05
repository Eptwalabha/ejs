<div class="row-fluid">
	<div class="span12">
		<h1>Toutes les news</h1>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		&gt; <a href="<?php echo WEBROOT; ?>accueil/bonjour">Accueil</a> &gt; <a href="<?php echo WEBROOT; ?>accueil/archive_news">Recherche</a> &gt; <?php if(isset($news['title'])){ echo $news['title']; }else{ echo "???"; } ?>
	</div>
</div>
<div class="row-fluid">
	<div class="span3">
		<?php 
			include("./views/accueil/menu.php");
		?>
	</div>
	<div class="span9">
		<div class="subBody">
			<div class="subBodyTitle">
				<h2>News!</h2>
			</div>
			<div class="news">
				<div class="title"><h3><?php echo stripslashes($news['title']); ?></h3></div>
				<div class="text"><?php echo stripslashes($news['text']); ?></div>
				<div class="info"><?php echo "par ".$news['author']." le ".$news['date']; ?></div>
			</div>
		</div>
	</div>
</div>
