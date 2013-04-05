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
					<textarea name="news_text" id="id_news_text"><?php
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
<script src="<?php echo WEBROOT; ?>js/tinymce/jscripts/tiny_mce/jquery.tinymce.js" type="text/javascript"></script>
<script>

	$(function() {

		$('#id_news_text').tinymce({

			script_url : '<?php echo WEBROOT; ?>js/tinymce/jscripts/tiny_mce/tiny_mce.js',

            theme : "advanced",          
            plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

            // Theme options
            theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,|,outdent,indent,blockquote",
            theme_advanced_buttons2 : "undo,redo,|,link,unlink,image,cleanup,|,sub,sup,|,emotions,|,print,|,ltr,rtl",
           	theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",

            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "lists/template_list.js",
            external_link_list_url : "lists/link_list.js",
            external_image_list_url : "lists/image_list.js",
            media_external_list_url : "lists/media_list.js",
            
		});
	})
</script>