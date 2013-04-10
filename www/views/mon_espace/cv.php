<div class="row-fluid">
	<div class="span12">
		<h1>Liste des compétences</h1>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		&gt; <a href="<?php echo WEBROOT; ?>mon_espace/accueil">Mon espace</a> &gt; Mes compétences
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
		<?php 
		if(!empty($cv['user'])){

			$user = $cv['user'];
		?>
				<div id="my_cv_tabs">
					<ul>
						<li><a href="#tab_cv">Aperçu</a></li>
						<li><a href="#tab_edit">Editer mes compétences</a></li>
					</ul>
					<div id="tab_cv">
						<div class="cv_header">
							<div class="row">
								<div class="span4">
									<div class="cv_user_info">
										<span class="user_last_name" ><?php echo strtoupper($user->getUserField("us_last_name")); ?></span> <?php echo $user->getUserField("us_first_name"); ?><br />
										<a href="mailto:<?php echo $user->getUserField("us_mail"); ?>" ><?php echo $user->getUserField("us_mail"); ?></a><br />
										<?php echo $user->getUserField("us_phone"); ?><br />
									</div>
								</div>
								<div class="offset4 span4">
									<div class="cv_user_picture">
										<img src="<?php echo $user->getUserPictureUrl(); ?>" alt="photo de <?php echo $user->getUserField("us_pseudo"); ?>" />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="span12">
								<div class="cv_title">EPSI BORDEAUX</div>
							</div>
						</div>
						<div class="row">
							<div class="span12" id="cv_fields">
								<div class="cv_body">
						<?php
							foreach ($cv['list_field'] as $field){
						?>
									<div class="field_title">
										<h3><?php echo $field['name']; ?></h3>
									</div>
									<div class="field_comp">
						<?php
								$count = 0;
								foreach ($field['knowledge'] as $knowledge){
									if($knowledge['visible'] == 1){
						?>
										<div class="comp_line_<?php $count++; if($count > 1) $count = 0; echo $count;?>" >
											<div class="row-fluid">
												<div class="span3">
													<div class="comp_title">
														<span class="comp_name"><?php echo stripslashes($knowledge['name']); ?></span><br />
														<span class="comp_level"><?php echo stripslashes($knowledge['level']); ?></span><br />
														<?php 
															if($knowledge['valid'] == "1"){
														?>
														
														<span class="valid_level"><img alt="<?php echo WEBROOT."img/valid.png"; ?>" src="compétence validée" /></span>
														<?php 
															}
														?>
													</div>
												</div>
												<div class="span9">
													<div class="comp_detail">
															<?php echo stripslashes($knowledge['description']); ?>
													</div>
												</div>
											</div>
										</div>
						<?php
									}
								}
						?>
									</div>
						<?php
							}
						?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="span12">
								<div class="cv_footer">
								</div>
							</div>
						</div>
					</div>
					<div id="tab_edit">
						<div class="row-fluid">
							<div class="span12">
								<h3>Ajouter ou modifier une compétence</h3>
								<div>
									<form id="competence_form">
										<label for="cb_cat">Catégorie:</label>
										<select id="cb_cat" name="cat_id">
		<?php
			foreach ($cat as $c){
		?>
				<option value="<?php echo $c['cat_id']; ?>"><?php echo $c['cat_name'];?></option>
		<?php
			}
		?>
										</select>
										<label for="cb_kno">Domaine:</label>
										<select id="cb_kno" name="kno_id">
											<option value="0">---</option>
		<?php
			foreach ($kno as $k){
		?>
				<option value="<?php echo $k['kno_id']; ?>"><?php echo $k['kno_name'];?></option>
		<?php
			}
		?>
										</select>
										<div id="changement">
											<label for="cb_lvl">Niveau:</label>
											<select id="cb_lvl" name="lvl_id">
		<?php
			foreach ($lvl as $l){
		?>
				<option value="<?php echo $l['lvl_id']; ?>"><?php echo $l['lvl_label'];?></option>
		<?php
			}
		?>
											</select><br />
											<label for="ta_detail">Détails:</label>
											<textarea class="editor" id="ta_detail" name="detail" placeholder="Décrivez brièvement votre expérience dans ce domaine"></textarea><br />
										</div>
										<button id="b_add" type="button">Ajouter / Modifer</button><button id="b_supp" type="button">Supprimer</button>
									</form>
									<span class="info">N'oubliez pas de rafraichir la page pour voir les nouveaux ajouts ou modifications effectués!</span>
								</div>					
							</div>
						</div>
					</div>
				</div>
		<?php
			}else{
		?>
			<div class="error">L'utilisateur n'existe pas!</div>
		<?php 
			}
		?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo WEBROOT; ?>js/jQuery-TE/jquery-te-1.3.5.min.js" ></script>
<script>
	$(function() {
		$('#my_cv_tabs').tabs();
		$(".editor").jqte();
		
		$('#cb_cat').on('change', function(){

	        var cat_id = $('#cb_cat').val();
	        
	        $.ajax({
				url: '<?php echo WEBROOT."ajax/get_select_knowledge"; ?>',
				type: 'POST',
				data: $(this).serialize(),
				success: function(html) {
					$('#cb_kno').empty();
					$('#cb_kno').append(html);
				}
			});

			return false;
		});
	    $('#cb_kno').change(function(){

	        var kno_id = $('#cb_kno').val();
	        
	        $.ajax({
				url: '<?php echo WEBROOT."ajax/get_detail_competence"; ?>',
				type: 'POST',
				data: $(this).serialize(),
				success: function(html) {
					$('#changement').empty();
					$('#changement').append(html);
					$('#ta_detail').jqte();
				}
			});
			return false;
		});
		
		$('#b_add').click(function(){

			var $form = $(this).parent("form");

			var $kno_val = $form.children('#cb_kno').val();

			if($kno_val > 0){
				$.ajax({
					url: '<?php echo WEBROOT."ajax/add_new_competence"; ?>',
					type: 'post',
					data: $form.serialize(),
					success: function(html) {
						alert(html);
					}
				});
			}else{
				alert("veuillez sélectionner un domaine");
			}
			return false;
		
		});
		$('#b_supp').click(function(){

			var $form = $(this).parent("form");
			var $kno_val = $form.children('#cb_kno').val();

			if($kno_val > 0){
				$.ajax({
					url: '<?php echo WEBROOT."ajax/delete_competence"; ?>',
					type: 'POST',
					data: $form.serialize(),
					success: function(html) {
						alert(html);
					}
				});
			}else{
				alert("veuillez sélectionner un domaine");
			}
			return false;
						
		});
		
	});
</script>
