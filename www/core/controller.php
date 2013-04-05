<?php
class Controller {
	
	private $vars = array();
	private $layout = "basic";
	public $connection;
	
	public function __construct($connection){
		$this->connection = $connection;
	}
	
	public function setData($data = array()){
		$this->vars = array_merge($this->vars, $data);
	}
	
	public function setLayout($layout = "basic"){
		$this->layout = $layout;
	}
	
	public function render($file_name){
		
		extract($this->vars);
		ob_start();
		require(ROOT."views/".strtolower(get_class($this))."/".strtolower($file_name).".php");
		$layout_content = ob_get_clean();
		if($this->layout == false){
			echo $layout_content;
		}else{
			require(ROOT."views/layouts/".$this->layout.".php");
		}
	}
	
	public function error($file_name){
	
		extract($this->vars);
		ob_start();
		require(ROOT."views/erreurs/".strtolower($file_name).".php");
		$layout_content = ob_get_clean();
		if($this->layout == false){
			echo $layout_content;
		}else{
			require(ROOT."views/layouts/".$this->layout.".php");
		}
	}
	
	public function loadModel($model){

		require_once(ROOT."models/".strtolower($model).".php");
		$this->$model = new $model();
		
	}
	
	
}