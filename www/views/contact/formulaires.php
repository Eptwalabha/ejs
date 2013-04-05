<div class="row-fluid">
	<div class="span12">
		<h1>Nous contacter</h1>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="subBody">
			<div class="subBodyTitle" >
				<h2>Nous contacter</h2>
			</div>
			<div class="subBodyContent" >
				<div id="select_form">
					<h3>Vous êtes: une entreprise / un particulier</h3>
					<div>
						<form action="<?php echo WEBROOT; ?>form/enterprise" method="post" class="inscription">
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
					<h3>Vous êtes: un étudiant de l'Epsi Bordeaux</h3>
					<div>
						<form action="<?php echo WEBROOT; ?>form/student" method="post" class="inscription">
							<div class="line_form"><label for="st_login">Login *</label><span class="saisie"><input type="text" name="login" id="st_login" class="textfield" required/></span></div>
							<div class="line_form"><label for="st_mail">Mail *</label><span class="saisie"><input type="email" name="mail" id="st_mail" class="textfield" required/></span></div>
							<div class="line_form"><label for="st_last_name">Nom *</label><span class="saisie"><input type="text" name="last_name" id="st_last_name" class="textfield" required/></span></div>
							<div class="line_form"><label for="st_first_name">Prénom *</label><span class="saisie"><input type="text" name="first_name" id="st_first_name" class="textfield" required/></span></div>
							<div class="line_form"><label for="st_phone">tel</label><span class="saisie"><input type="text" name="phone" id="st_phone" class="textfield" /></span></div>
							<div class="line_form"><label for="st_psw1">Mot de passe *</label><span class="saisie"><input type="password" name="psw1" id="st_psw1" class="textfield" required/></span></div>
							<div class="line_form"><label for="st_psw2">Vérification *</label><span class="saisie"><input type="password" name="psw2" id="st_psw2" class="textfield" required/></span></div>
							<input type="submit" value="Je m'inscris!" />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	 $(function() {
	 $( "#select_form" ).accordion({
			 heightStyle: "content",
			 collapsible: true
		 });
	 });
</script>