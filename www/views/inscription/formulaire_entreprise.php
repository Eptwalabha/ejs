<?php

if(!isset($valide)) $valide = array();

function getFormValue($name){
	
	if(isset($_POST[$name])) return "value=\"".$_POST[$name]."\" ";
	
}

function getMessage($valide, $name){
	
	if(isset($valide[$name])){
		if(!$valide[$name][0]){
			return " <span class=\"error\">".$valide[$name][1]."</span>";
		}
	}
}

?>
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
					<h4>Tous les champs sont obligatoires</h4>
					<form action="<?php echo WEBROOT; ?>inscription/valid_enterprise" method="post" class="inscription">
						<div class="line_form"><label title="de 4 à 20 caractères alphanumériques" for="en_login">Pseudo/Login (de 4 à 20 caractères alphanumériques)<?php echo getMessage($valide, "login"); ?></label>
						<span class="saisie"><input type="text" name="login" <?php echo getFormValue('login'); ?>id="en_login" class="textfield" required/></span></div>
						<div class="line_form"><label for="en_mail">Mail<?php echo getMessage($valide, "mail"); ?></label>
						<span class="saisie"><input type="email" name="mail" <?php echo getFormValue('mail'); ?>id="en_mail" class="textfield" required/></span></div>
						<div class="line_form"><label for="en_name">Nom Société</label>
						<span class="saisie"><input type="text" name="name" <?php echo getFormValue('name'); ?>id="en_name" class="textfield" /></span></div>
						<div class="line_form"><label for="en_phone">tel</label>
						<span class="saisie"><input type="text" name="phone" <?php echo getFormValue('phone'); ?>id="en_phone" class="textfield" /></span></div>
						<div class="line_form"><label for="en_siret">N° SIRET<?php echo getMessage($valide, "siret"); ?></label>
						<span class="saisie"><input type="text" name="siret" <?php echo getFormValue('siret'); ?>id="en_siret" class="textfield" /></span></div>
						<div class="line_form"><label title="6 caractères minimum" for="en_psw1">Mot de passe (6 caractères minimum)<?php echo getMessage($valide, "psw1"); ?></label>
						<span class="saisie"><input type="password" name="psw1" id="en_psw1" class="textfield" required/></span></div>
						<div class="line_form"><label for="en_psw2">Confirmez le mot de passe<?php echo getMessage($valide, "psw2"); ?></label>
						<span class="saisie"><input type="password" name="psw2" id="en_psw2" class="textfield" required/></span></div>
						<div class="line_form"><label for="en_message">Votre Message</label></div>
						<div class="line_form"><textarea name="message" id="en_message" rows="5" required><?php if(isset($_POST['message'])) echo $_POST['message']; ?></textarea></div>
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
		$('#en_message3').tinymce({

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