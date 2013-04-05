<div class="row-fluid">
	<div class="span12">
		<h1>Message</h1>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		&gt; <a href="<?php echo WEBROOT; ?>mon_espace/accueil">Mon espace</a> &gt; Mes messages
	</div>
</div>
<div class="row-fluid">
	<div class="span3">
		<?php 
			include("./views/mon_espace/menu.php");
		?>
	</div>
	<div class="span9">
		<div class="subBody">
			<div class="subBodyContent">
				<div id="my_message_tabs">
					<ul>
						<li><a href="#tab_message">Boîte de réception</a></li>
						<li><a href="#tab_write">Rédiger un message</a></li>
					</ul>
					<div id="tab_message">
						<h3>Nouveau message</h3>
						<table>
							<tbody>
								<tr>
									<th>Destinataire</th>
									<th>Objet</th>
									<th>Date</th>
									<th></th>
								</tr>
							</tbody>
						</table>
		<?php 
						if(empty($messages)){
		?>
							pas de message non lu...
		<?php
		
						}else{
							var_dump($messages);
						}
		?>
						<h3>Ancien message</h3>
						<table>
							<tbody>
								<tr>
									<th>Destinataire</th>
									<th>Objet</th>
									<th>Date</th>
									<th></th>
								</tr>
							</tbody>
						</table>
		<?php 
					
						
						if(empty($messages)){
		?>
							pas de message...
		<?php
		
						}else{
							var_dump($messages);
						}
					?>
					</div>
					<div id="tab_write">
						<div class="row-fluid">
							<div class="span12">
								<img alt="image travaux" src="<?php echo WEBROOT; ?>img/en_travaux.png">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(function() {
		$('#my_message_tabs').tabs();
	});
</script>
