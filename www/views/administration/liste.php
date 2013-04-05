<div class="row-fluid">
	<div class="span12">
		<h1>Liste entreprises</h1>
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
		</div>
	</div>
</div>
