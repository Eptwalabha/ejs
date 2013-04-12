<div class="row-fluid">
	<div class="span12">
		<h1>Forum</h1>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		&gt; <a href="<?php echo WEBROOT; ?>accueil/bonjour">Accueil</a> &gt; Forum
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="subBody">
			<div class="subBodyTitle">
				<h2>Rechercher</h2>
			</div>
			<div id="recherche_forum" class="subBodyContent">
				La recherche directe
			</div>
		</div>
		<div class="subBody">
			<div class="subBodyTitle">
				<h2>Liste des thèmes</h2>
			</div>
			<div class="subBodyContent">
			
				<table>
					<thead>
						<tr class="line_header">
							<th>Title</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
				<?php
					$count = 0;
					
					if(isset($themes)){
						foreach ($themes as $t){
							$title_url = rawurlencode($t->getTitle());
				?>
						<tr class="line_<?php echo ($count % 2); ?>">
							<td><a href="<?php echo WEBROOT."forum/accueil/$title_url"; ?>"><?php echo $t->getTitle(); ?></a></td>
							<td><?php echo $t->getDescription(); ?></td>
						</tr>
				<?php
							$count++;
						}
					}
				?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>