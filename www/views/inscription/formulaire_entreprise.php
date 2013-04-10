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

<script type="text/javascript" src="<?php echo WEBROOT; ?>js/jQuery-TE/jquery-te-1.3.5.min.js" ></script>
<script>

	$('#en_message').jqte();
	
</script>