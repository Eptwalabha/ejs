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
				Espace administration.
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo WEBROOT; ?>js/jQuery-TE/jquery-te-1.3.5.min.js" ></script>
<script>

	$('#admin_tabs').tabs();
	$('#id_news_text').jqte();
	
</script>
