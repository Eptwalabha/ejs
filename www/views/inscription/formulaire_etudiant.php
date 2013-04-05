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
		<h1>Inscription étudiants</h1>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		&gt; <a href="<?php echo WEBROOT; ?>inscription/accueil">Inscription</a> &gt; étudiant
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="subBody">
			<div class="subBodyTitle" >
				<h2>Insription étudiants</h2>
			</div>
			<div class="subBodyContent" >
				<div>
					<form action="<?php echo WEBROOT; ?>inscription/valid_student" method="post" class="inscription">
						<div class="line_form"><label for="st_login">Pseudo/Login<?php echo getMessage($valide, "login"); ?></label><span class="saisie"><input type="text" name="login" id="st_login" class="textfield" <?php echo getFormValue('login'); ?>required/></span></div>
						<div class="line_form"><label for="st_mail">Mail<?php echo getMessage($valide, "mail"); ?></label><span class="saisie"><input type="email" name="mail" id="st_mail" class="textfield" <?php echo getFormValue('mail'); ?>required/></span></div>
						<div class="line_form"><label for="st_last_name">Nom</label><span class="saisie"><input type="text" name="last_name" id="st_last_name" class="textfield" <?php echo getFormValue('last_name'); ?>required/></span></div>
						<div class="line_form"><label for="st_first_name">Prénom</label><span class="saisie"><input type="text" name="first_name" id="st_first_name" class="textfield" <?php echo getFormValue('first_name'); ?>required/></span></div>
						<div class="line_form"><label for="st_psw1">Mot de passe (6 caractères minimum)<?php echo getMessage($valide, "psw1"); ?></label><span class="saisie"><input type="password" name="psw1" id="st_psw1" class="textfield" required/></span></div>
						<div class="line_form"><label for="st_psw2">Confirmer<?php echo getMessage($valide, "psw2"); ?></label><span class="saisie"><input type="password" name="psw2" id="st_psw2" class="textfield" required/></span></div>
						<input type="submit" value="Je m'inscris!" />
					</form>
				</div>
			</div>
		</div>
	</div>
</div>