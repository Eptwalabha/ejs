<?php

define('DB_DNS', 'localhost');
define('DB_NAME', 'site_ejs');
define('DB_LOGIN', 'admin_ejs');
define('DB_PSW', 'aJJ5dH3V49SXMmfd');
define('WEBROOT', str_replace("test.php", "", $_SERVER['SCRIPT_NAME']));

require("./models/datachecker.php");
require("./core/connection.php");

$connection = new Connection(DB_DNS, DB_NAME, DB_LOGIN, DB_PSW, false);
$connection->connect();

?>

<!doctype html>
<html>
	<head>
		<title>EJS</title>
		<meta charset="utf-8" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" ></script>
		<script type="text/javascript" src="<?php echo WEBROOT; ?>js/tinymce/jscripts/tiny_mce/jquery.tinymce.js" ></script>

		</head>
	<body>
<?php

	$data = "jesuis";
	
	$res = DataChecker::getInstance()->isAValidPassWord($data);
	
	if($res){
		echo "ok";
	}else{
		echo "nope";
	}
	
?>		
		<div class="combo">niveau</div>
		<div class="combo">niveau</div>
		<div class="combo">niveau</div>
		<div class="combo">niveau</div>
		<div class="combo">niveau</div>
		<div class="combo">niveau</div>
		<div class="combo">niveau</div>
		<div class="combo">niveau</div>
		
	</body>

	<script>

		$(".combo").on("dblclick", showCombo);
		
		function showCombo(){

			$(this).off("dblclick");
			$(this).load("./test2.php").ajaxSuccess(function(event, request, settings){
				$(this).find("p").on("click", hideForm);
			});
		/*	$(this).html("<form action=\"#\"><fieldset>	<label>test</label><input type=\"text\" /><br/>						<select name=\"lvl_id\">							<option value=\"7\">D&eacutebutant</option>							<option value=\"8\">El&eacutementaire</option>							<option value=\"9\">Interm&eacutediaire</option>							<option value=\"10\">Interm&eacutediaire sup</option>							<option value=\"11\">Avanc&eacute</option>							<option value=\"12\">Avanc&eacute sup</option>						</select>					</fieldset>					<p>toto</p>				</form>");
				
			$(this).find("p").on("click", hideForm);
			*/
		}

		function hideForm(){

			$(this).off("click");
			parent = $(this).parent().parent();

			parent.html("test ok").css("background", "red");
			parent.dblclick(showCombo);
		}
	
	</script>
	
</html>
