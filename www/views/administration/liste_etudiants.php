<div class="row-fluid">
	<div class="span12">
		<h1>Liste des étudiants</h1>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		&gt; <a href="<?php echo WEBROOT; ?>administration/accueil">Administration</a> &gt; liste des entreprises
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
				<h2>Liste</h2>
			</div>
			<div class="subBodyBody">
				<table>
					<tbody>
						<tr class="line_header">
							<th>id</th>
							<th>Pseudo</th>
							<th>Nom</th>
						</tr>
				<?php
					$count = 0;
					foreach ($student as $s){
				?>
						<tr class="line_<?php echo ($count % 2); ?>">
							<td><?php echo $s->getUserId(); ?></td>
							<td><a href="<?php echo WEBROOT."mon_espace/profil/".$s->getUserPseudo(); ?>"><?php echo $s->getUserPseudo(); ?></a></td>
							<td><?php echo $s->getUserField('us_last_name'); ?></td>
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
