<?php
session_start();

define('WEBROOT', str_replace("index.php", "", $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace("index.php", "", $_SERVER['SCRIPT_FILENAME']));

define('DB_DNS', 'localhost');
define('DB_NAME', 'site_ejs');
define('DB_LOGIN', 'admin_ejs');
define('DB_PSW', 'aJJ5dH3V49SXMmfd');


require("./core/model.php");
require("./core/controller.php");
require("./core/connection.php");
require("./core/datachecker.php");

$connection = new Connection(DB_DNS, DB_NAME, DB_LOGIN, DB_PSW, false);
$connection->connect();

$param = explode("/", $_GET["param"], 3);

if(file_exists(ROOT."controllers/".$param[0].".php")){
	$controller = $param[0];
	$action = count($param) > 1 ? $param[1] : 'bonjour';
}else{
	$controller = "accueil";
	$action = "bonjour";
}

require("./controllers/$controller.php");

$controller = new $controller($connection);

if(method_exists($controller, $action)){
	
	if(count($param) > 2){
		$controller->$action($param[2]);
	}else{
		$controller->$action();
	}
	
}else{
	echo "oups... 404!";
}