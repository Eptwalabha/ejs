<div class="row-fluid">
	<div class="span12">
		<h1>Ecrire une news</h1>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		&gt; <a href="<?php echo WEBROOT; ?>administration/accueil">Administration</a> &gt; rédiger une nouvelle news
	</div>
</div>
<div class="row-fluid">
	<div class="span3">
		<?php 
			include("./views/administration/menu.php");
		?>
	</div>
	<div class="span9">
		<div class="subBody">
			<div class="subBodyTitle">
				<h2>Nouvelle news</h2>
			</div>
			<div class="subBodyBody">
				<form action="<?php echo WEBROOT; ?>administration/nouvelle_news" method="post">
					<label for="id_news_title">Titre de la news</label><input type="text" id="id_news_title" name="news_title" placeholder="Le titre de votre news" required/>
					<label for="id_news_text">Votre news</label>
					<textarea class="editor" name="news_text" id="id_news_text" required><?php
										if(isset($news)){
											echo $news['news_text'];
										}
					?></textarea><br />
					<input type="submit" value="publier!">
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo WEBROOT; ?>js/jQuery-TE/jquery-te-1.3.5.min.js" ></script>
<script>

	$(".editor").jqte();
		
</script>