<div class="row-fluid">
	<div class="span12">
		<h1>Toutes les news</h1>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		&gt; <a href="<?php echo WEBROOT; ?>accueil/bonjour">Accueil</a> &gt; Toutes les news
	</div>
</div>
<div class="row-fluid">
	<div class="span3">
		<?php 
			include("./views/accueil/menu.php");
		?>
	</div>
	<div class="span9">
		<div class="subBody">
			<div class="subBodyTitle">
				<h2>Filtres de recherche <a href="#" id="b_filtre">show</a></h2>
			</div>
			<div id="div_filtre" class="subBodyContent">
				<form action="<?php echo WEBROOT; ?>accueil/archive_news" method="get">
					<label for="ft_contient">Contient</label>
					<input type="text" id="ft_contient" name="kw" value="<?php if(isset($_GET['kw'])) echo $_GET['kw']; ?>"/><a href="#" class="ui-widget-content ui-corner-all">?</a>
					<label for="fs_annee">Année</label>
					<select id="fs_annee" name="sy">
						<option value="0">toutes</option>
						<?php
						$i = date("Y");
						for($i; $i > 2011; $i--){						
						?>
						<option value="<?php echo $i; ?>" <?php
							if(isset($_GET['sy'])){
								if($i == $_GET['sy']) echo "selected";
							}
						?>><?php echo $i; ?></option>
						<?php
						}
						?>
					</select>
					<label for="fs_mois">Mois</label>
					<select id="fs_mois" name="sm">
						<option value="0">tous</option>
						<?php
						$i = date("Y");
						for($i = 1; $i < 13; $i++){						
						?>
						<option value="<?php echo $i; ?>" <?php
							if(isset($_GET['sm'])){
								if($i == $_GET['sm']) echo "selected";
							}
						?>><?php echo $i; ?></option>
						<?php
						}
						?>
					</select>
					<label for="fs_jour">Jour</label>
					<select id="fs_jour" name="sd">
						<option value="0">tous</option>
						<?php 
						for($i = 1; $i < 32; $i++){
						?>
						<option value="<?php echo $i; ?>" <?php
							if(isset($_GET['sm'])){
								if($i == $_GET['sm']) echo "selected";
							}
						?>><?php echo $i; ?></option>
						<?php
						}
						?>
					</select>
					<label for="fs_auteur">Rédigé par</label>
					<select id="fs_auteur" name="sa">
						<option value="">tous</option>
					</select>
					<input type="submit" value="appliquer le filtre" />
				</form>
			</div>
		</div>
		<div class="subBody">
			<div class="subBodyTitle">
				<h2>Résultat de la recherche</h2>
			</div>
			<div class="subBodyContent">
			
				<?php
				$nav_tab = $data['nav_tab'];
				$news = $data['list'];
				
				if(count($news) > 0){
					include("./views/commun/navigation_tableau.php");
				?>
				<table>
					<tbody>
						<tr class="line_header">
							<th>titre</th><th>date</th><th>auteur</th>
						</tr>
						<?php
							$count = 0;
							foreach ($news as $line){
								$count++;
						?>
							<tr class="line_<?php echo ($count % 2);?>">
								<td><a href="<?php echo WEBROOT; ?>accueil/news/<?php echo $line['news_id'];?>"><?php echo $line['title']; ?></a></td>
								<td><?php echo $line['date']; ?></td>
								<td><?php echo $line['author']; ?></td>
								
							</tr>
						<?php 
							}
						?>
						
					</tbody>
				</table>
				<?php
					include("./views/commun/navigation_tableau.php");
				}else{
				?>
				Désolé, mais votre recherche n'a rien retourné...
				<?php 
				}
				?>
			</div>
		</div>
	</div>
</div>
<script>

$(function() {

	$("#div_filtre").hide();

	function toggleDiv(){
		$("#div_filtre").toggle("Blind");
	};
	
	$("#b_filtre").click(function() {
		toggleDiv();
		return false;
	});
});
  
</script>