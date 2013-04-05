<nav id="main_menu" class="subBody">
	<div class="subBodyTitle">
		<h2>Menu</h2>
	</div>
	<div class="subBodyContent">
		<ul id="menu_principal">
			<li><a href="<?php echo WEBROOT; ?>accueil/bonjour">Accueil</a></li>
<?php
	if(isset($_SESSION['user_id'])){
?>
			<li><a href="<?php echo WEBROOT; ?>mon_espace/message">Mes messages</a></li>
<?php 
		if($_SESSION['user_mode'] != 3){
?>
			<li><a href="<?php echo WEBROOT; ?>mon_espace/cv">Mon CV</a></li>
<?php 
		}
		if($_SESSION['user_mode'] == 1){
?>
			<li><a href="<?php echo WEBROOT; ?>administration/accueil">Administration</a></li>
<?php 
		}
?>
			<li><a href="<?php echo WEBROOT; ?>accueil/deconnexion">Se déconnecter</a></li>
<?php
		
	}else{
?>
			<li><a href="<?php echo WEBROOT; ?>contact/formulaires">Nous contacter</a></li>		
<?php 
	}
?>
		</ul>
	</div>
<?php

	if(!isset($_SESSION['user_id'])){
?>
	<div class="subBodyContent">
		<form id="form_login" action="<?php echo WEBROOT; ?>accueil/connexion_user" method="post">
			<label for="id_login">Login</label><input type="text" id="id_login" name="login" placeholder="Votre pseudo" required/>
			<label for="id_psw">Mot de passe</label><input type="password" id="id_psw" name="psw" placeholder="Mot de passe" required/>
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
	                    $('#main_menu').replaceWith(html);
	                    $('#menu_principal').menu();
		            }
	            });
	        }
	        return false;
	    });
    
    </script>
<?php
	}
?>
	
</nav>
<script type="text/javascript">
	$(function() {
		$( "#menu_principal" ).menu();
	});
</script>

