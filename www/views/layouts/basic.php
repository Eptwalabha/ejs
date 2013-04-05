<!doctype html>
<html>
	<head>
		<title>EJS</title>
		<meta charset="utf-8" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" ></script>
	 	<script type="text/javascript" src="<?php echo WEBROOT; ?>js/bootstrap/js/bootstrap.min.js" ></script>
		<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
		<link rel="icon" type="image/png" href="<?php echo WEBROOT; ?>img/en_travaux.png" />
		
		<link type="text/css" rel="Stylesheet" href="<?php echo WEBROOT; ?>js/jquery-ui-1.9.1.custom.css">
		<link type="text/css" rel="Stylesheet" href="<?php echo WEBROOT; ?>js/bootstrap/css/bootstrap.min.css">
		<link type="text/css" rel="Stylesheet" href="<?php echo WEBROOT; ?>css/global.css">
		<link type="text/css" rel="Stylesheet" href="<?php echo WEBROOT; ?>css/subbodyglobal.css">
		<link type="text/css" rel="Stylesheet" href="<?php echo WEBROOT; ?>css/news.css">
		<link type="text/css" rel="Stylesheet" href="<?php echo WEBROOT; ?>css/footer.css">
		<link type="text/css" rel="Stylesheet" href="<?php echo WEBROOT; ?>css/cv.css">
		<link type="text/css" rel="Stylesheet" href="<?php echo WEBROOT; ?>css/table.css">
		<link type="text/css" rel="Stylesheet" href="<?php echo WEBROOT; ?>css/carrousselPresentation.css">
		<link type="text/css" rel="Stylesheet" href="<?php echo WEBROOT; ?>css/header.css">
		
	</head>
	<body>
		<div class="superglobal">
			<?php 
				include("./views/commun/header.php");
			?>
			<div class="container">
				<?php	
					echo $layout_content;
				?>
			</div>
			<footer>
				<?php 
					include("./views/footer/footer.php");
				?>
			</footer>
		</div>	
	</body>
</html>