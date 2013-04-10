<div class="row-fluid">
	<div class="span12">
		<h1>Espace administration</h1>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		&gt; Administration
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
				<h2>Admistration</h2>
			</div>
			<div class="subBodyContent">
				<div id="admin_tabs">
					<ul>
						<li><a href="#tab_news">Nouvelle news</a></li>
						<li><a href="#tab_enterprise">Entreprises / Clients</a></li>
						<li><a href="#tab_student">Etudiants</a></li>
					</ul>
					<div id="tab_news">
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
					<div id="tab_enterprise">
						<h3>Liste des Entreprises / Clients</h3>
						<table>
							<tbody>
								<tr class="line_header">
									<th>id</th>
									<th>Pseudo</th>
									<th>Nom</th>
								</tr>
					<?php 
					
			$count = 0;
			foreach ($client as $c){
		
				if($count > 1) $count = 0;
		?>
								<tr class="line_<?php echo $count; ?>">
									<td><?php echo $c['en_id']; ?></td>
									<td><?php echo $c['en_pseudo']; ?></td>
									<td><?php echo $c['en_name']; ?></td>
								</tr>
		<?php 
			}
		?>
							</tbody>
						</table>
					</div>
					<div id="tab_student">
						<h3>Liste des étudiants de l'EPSI Bordeaux</h3>
						<table>
							<tbody>
								<tr class="line_header">
									<th>id</th>
									<th>Pseudo</th>
									<th>Nom</th>
									<th>Prénom</th>
									<th>Mode</th>
								</tr>
					<?php 
					
			$count = 0;
			foreach ($student as $s){
				if($count > 1) $count = 0;
		?>
								<tr class="line_<?php echo $count; ?>">
									<td><?php echo $s['user_id']; ?></td>
									<td><a href="<?php echo WEBROOT; ?>mon_espace/cv/<?php echo $s['user_id']; ?>"><?php echo $s['user_pseudo']; ?></a></td>
									<td><?php echo $s['us_name']; ?></td>
									<td><?php echo $s['user_first_name']; ?></td>
									<td><?php echo $s['user_mode']; ?></td>
								</tr>
		<?php 
				$count++;
			}
		?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo WEBROOT; ?>js/jQuery-TE/jquery-te-1.3.5.min.js" ></script>
<script>

	$('#admin_tabs').tabs();
	$('#id_news_text').jqte();
	
</script>
