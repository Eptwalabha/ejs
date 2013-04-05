<?php 
	if(!isset($_SESSION['user_id'])) {
?>
<div id="login_top">
	<form id="form_login" action="<?php echo WEBROOT; ?>accueil/connexion_user" method="post">
		<input type="text" id="id_login" name="login" placeholder="Votre pseudo" required/>
		<input type="password" id="id_psw" name="psw" placeholder="Mot de passe" required/>
<!-- 		<label for="id_chck">rester connecté.</label><input type="checkbox" id="id_chck" name="chck" value="resté connecté"/> -->
		<input type="submit" value="Se connecter" />
	</form>
</div>
<script type="text/javascript">
	$('#form_login').on('submit', function() {
		var login = $('#id_login').val();
		var psw = $('#id_psw').val();
		if(login == '' || psw == '') {
			alert('Les champs doivent êtres remplis');
		} else {
			$.ajax({
				url: $(this).attr('action'),
				type: $(this).attr('method'),
				data: $(this).serialize(),
				success: function(html) {
					$('header').replaceWith(html);
				}
			});
		}
		return false;
	});
</script>
<?php 
	}else{
?>
<div id="login_top">
	Bienvenue! <a href="<?php echo WEBROOT; ?>accueil/deconnexion" >Déconnexion</a>
</div>
<?php 
	}
?>