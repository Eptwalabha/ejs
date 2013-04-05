<div class="row-fluid">
	<div class="span12">
		<h1>Inscription entreprises / particuliers</h1>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		&gt; <a href="<?php echo WEBROOT; ?>inscription/accueil">Inscription</a> &gt; entreprises / particuliers
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="subBody">
			<div class="subBodyTitle" >
				<h2>inscription entreprises / particuliers</h2>
			</div>
			<div class="subBodyContent" >
				<div>
					<form action="<?php echo WEBROOT; ?>inscription/valid_enterprise" method="post" class="inscription">
						<div class="line_form"><label for="en_login">Login *</label><span class="saisie"><input type="text" name="login" id="en_login" class="textfield" required/></span></div>
						<div class="line_form"><label for="en_mail">Mail *</label><span class="saisie"><input type="email" name="mail" id="en_mail" class="textfield" required/></span></div>
						<div class="line_form"><label for="en_name">Nom Société</label><span class="saisie"><input type="text" name="name" id="en_name" class="textfield" /></span></div>
						<div class="line_form"><label for="en_phone">tel</label><span class="saisie"><input type="text" name="phone" id="en_phone" class="textfield" /></span></div>
						<div class="line_form"><label for="en_siret">N° SIRET</label><span class="saisie"><input type="text" name="siret" id="en_siret" class="textfield" /></span></div>
						<div class="line_form"><label for="en_psw1">Mot de passe *</label><span class="saisie"><input type="password" name="psw1" id="en_psw1" class="textfield" required/></span></div>
						<div class="line_form"><label for="en_psw2">Vérification *</label><span class="saisie"><input type="password" name="psw2" id="en_psw2" class="textfield" required/></span></div>
						<div class="line_form"><label for="en_message">Votre Message *</label></div>
						<div class="line_form"><textarea name="message" id="en_message" rows="5" required></textarea></div>
						<input type="submit" value="Me contacter!" />
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo WEBROOT; ?>js/tinymce/jscripts/tiny_mce/jquery.tinymce.js" type="text/javascript"></script>
<script>
$(function() {

	$.fn.tinycall = function(){
		$('#en_message').tinymce({

			script_url : '<?php echo WEBROOT; ?>js/tinymce/jscripts/tiny_mce/tiny_mce.js',

            theme : "advanced",
            plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

            // Theme options
            theme_advanced_buttons1 : "bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,|,link,unlink",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",

            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "lists/template_list.js",
            external_link_list_url : "lists/link_list.js",
            external_image_list_url : "lists/image_list.js",
            media_external_list_url : "lists/media_list.js",
            
		});
	};
	
	$('#en_message').tinycall();
});
</script>