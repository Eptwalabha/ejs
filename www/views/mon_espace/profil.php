<div class="row-fluid">
	<div class="span12">
		<h1>Mon Profil</h1>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		&gt; <a href="<?php echo WEBROOT; ?>mon_espace/accueil" >Mon espace</a> &gt; Mon profil
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
			<div class="subBodyTitle">
				<h2>Mon profil</h2>
			</div>
			<div class="row-fluid">
				<div class="span4">
					<div>
						<img alt="image de pseudo" src="<?php echo $user->getUserPictureUrl(); ?>" />
					</div>
					<div>
						<?php
							echo $user->getUserField('us_pseudo');
						?>
					</div>
				</div>
				<div class="span8">
					<p>
						nom : <?php echo $user->getUserField('us_first_name');?><br />
						prénom : <?php echo $user->getUserField('us_last_name');?><br />
						mail : <?php echo $user->getUserField('us_mail');?><br />
						tel : <?php echo $user->getUserField('us_phone');?><br />
					</p>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<p>
						Description Description Description Description Description Description Description Description Description Description Description Description Description Description
						Description Description Description Description Description Description Description Description Description Description Description Description Description Description
						Description Description Description Description Description Description Description Description Description Description Description Description Description Description
					</p>
				</div>
			</div>
		</div>
	</div>
</div>