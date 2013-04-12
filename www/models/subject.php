<?php
class Subject {
	
	private $table = "subject";
	
	// -----------------------------------------------------
	//   MUTATEURS
	// -----------------------------------------------------
	
	public function setId($id) {
		$this->sub_id = $id;
	}
	
	public function setThemeId($th_id) {
		$this->sub_th_id = $id;
	}

	public function setTitle($title) {
		$this->sub_title = $title;
	}
	
	public function setDescription($description) {
		$this->sub_description = $description;
	}
		
	// -----------------------------------------------------
	//   ASSESSEURS
	// -----------------------------------------------------
	
	public function getUserField($field){
		return $this->$field;
	}
	
	public function getId() {
		return $this->sub_id;
	}
	
	public function setThemeId() {
		return $this->sub_th_id;
	}
	
	public function getTitle() {
		return $this->sub_title;
	}
	
	public function getDescription() {
		return $this->sub_description;
	}
		
	// -----------------------------------------------------
	//   METHODES
	// -----------------------------------------------------
	
	public function readFromId($id, $connection) {
	
		$result = $connection->select("*", $this->table, "sub_id=".$id);
		while ($tuple = $result->fetch()){
			$this->readFromArray($tuple);
			return true;
		}
		return false;
	}
	
	public function readFromTitle($title, $connection) {
	
		$result = $connection->select("*", $this->table, "sub_title='".$title."'");
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
	
		$champs = "sub_th_id, sub_title, th_description";
		$values = "'$this->sub_th_id', '$this->sub_title', '$this->th_description'";
	
		$connexion->insert($this->table, $champs, $values);
	
		$this->sub_id = $connexion->lastInsertID();
	
	}
	
	public function update($connexion) {
	
		$set = 	"sub_th_id = $this->sub_th_id , sub_title = '$this->sub_title', ".
				"sub_description = '$this->sub_description'";
		$where = "sub_id = $this->sub_id";
	
		$connexion->update($this->table, $set, $where);
			
	}
	
	public function delete($connexion) {
	
		$where = "sub_id = ".$this->sub_id;
	
		$connexion->delete($this->table, $where);
	
	}
	
	public function listAllSubjectFromThemeTitle($th_title, $connexion){
	
		$result = $connexion->select(	"sub_id, sub_th_id, sub_title, sub_description",
										"$this->table, theme",
										"sub_th_id = th_id and th_title = '$th_title'");

		$list = array();
		
		while ($tuple = $result->fetch()){
		
			$subject = new Subject();
			$subject->readFromArray($tuple);
			$list[] = $subject;
		}
		
		return $list;
		
	}
	
	public function listAllSubjectFromThemeId($th_id, $connexion){
		
		$result = $connexion->select(	"*",
										$this->table,
										"sub_th_id = $th_id");
		
		$list = array();
		
		while ($tuple = $result->fetch()){
		
			$subject = new Subject();
			$subject->readFromArray($tuple);
			$list[] = $subject;
		}
		
		return $list;
		
	}
	
}