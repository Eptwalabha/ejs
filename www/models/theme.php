<?php
class Theme {
	
	private $table = "theme";
	
	// -----------------------------------------------------
	//   MUTATEURS
	// -----------------------------------------------------
	
	public function setId($id) {
		$this->th_id = $id;
	}
	
	public function setTitle($title) {
		$this->th_title = $title;
	}
	
	public function setDescription($description) {
		$this->th_description = $description;
	}
	
	public function setImage($image) {
		$this->th_image = $image;
	}
	
	// -----------------------------------------------------
	//   ASSESSEURS
	// -----------------------------------------------------
	
	public function getUserField($field){
		return $this->$field;
	}
	
	public function getId() {
		return $this->th_id;
	}
	
	public function getTitle() {
		return $this->th_title;
	}
	
	public function getDescription() {
		return $this->th_description;
	}
	
	public function getImage() {
		return $this->th_image;
	}
	
	// -----------------------------------------------------
	//   METHODES
	// -----------------------------------------------------
	
	public function readFromId($id, $connection) {
	
		$result = $connection->select("*", $this->table, "th_id=".$id);
		while ($tuple = $result->fetch()){
			$this->readFromArray($tuple);
			return true;
		}
		return false;
	}
	
	public function readFromTitle($title, $connection) {
	
		$result = $connection->select("*", $this->table, "th_title='".$title."'");
		while ($tuple = $result->fetch()){
			$this->readFromArray($tuple);
			return true;
		}
		return false;
	}
	
	public function readFromArray($array) {
	
		foreach($array as $k => $v){
			$this->$k = $v;
		}
	
	}
	
	public function insert($connexion) {
	
		$champs = "th_title, th_description, th_image";
		$values = "'$this->th_title', '$this->th_description', '$this->th_image'";
	
		$connexion->insert($this->table, $champs, $values);
	
		$this->th_id = $connexion->lastInsertID();
	
	}
	
	public function update($connexion) {
	
		$set = 	"th_title = '$this->th_title', th_description = '$this->th_description', ".
				"th_image = '$this->th_image'";
		$where = "th_id = $this->th_id";
	
		$connexion->update($this->table, $set, $where);
			
	}
	
	public function delete($connexion) {
	
		$where = "th_id = ".$this->th_id;
	
		$connexion->delete($this->table, $where);
	
	}
	
	public function getThemeList($connexion){
		
		$result = $connexion->select("*", $this->table, "");
		
		$list = array();
		
		while ($tuple = $result->fetch()){
			
			$theme = new Theme();
			$theme->readFromArray($tuple);
			$list[] = $theme;
		}
		
		return $list;
		
	}
	
}