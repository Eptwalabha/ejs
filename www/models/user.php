<?php
class User{
	
	public $table = "user";
	public $ab_table = "us";
	
// 	private $us_id;
// 	private $us_pseudo;
// 	private $us_first_name;
// 	private $us_last_name;
// 	private $us_mail;
// 	private $us_phone;
// 	private $us_date;
// 	private $us_ut_id;
// 	private $us_picture;
// 	private $us_active;
	
	// -----------------------------------------------------
	//   MUTATEURS
	// -----------------------------------------------------
	
	public function setUserId($id_user) {
		$this->us_id = $id_user;
	}
	
	public function setUserPseudo($pseudo) {
		$this->us_pseudo = $pseudo;
	}
	
	public function setUserMail($mail) {
		$this->us_mail = $mail;
	}
	
	public function setUserType($ut) {
		$this->us_ut_id = $ut;
	}
	
	public function setUserPasswordId($psw_id) {
		$this->us_psw_id = $psw_id;
	}
	
	// -----------------------------------------------------
	//   ASSESSEURS
	// -----------------------------------------------------
	
	public function getUserField($field){
		return $this->$field;
	}
	
	public function getUserId() {
		return $this->us_id;
	}
	
	public function getUserPseudo() {
		return $this->us_pseudo;
	}
	
	public function getUserMail() {
		return $this->us_mail;
	}
	
	public function getUserDate() {
		return $this->us_date;
	}
	
	public function getUserType() {
		return $this->us_ut_id;
	}
	
	// -----------------------------------------------------
	//   M�THODES
	// -----------------------------------------------------
	
	public function readFromId($id, $connection) {
	
		$result = $connection->select("*", $this->table, "us_id=".$id);
		while ($tuple = $result->fetch()){
			$this->readFromArray($tuple);
			return true;
		}
		return false;
	}
	
	public function readFromLogin($login, $connection) {
	
		$result = $connection->select("*", $this->table, "us_pseudo='".$login."'");
		while ($tuple = $result->fetch()){
			$this->readFromArray($tuple);
			return true;
		}
		return false;
	}
	
	public function getUserIdFromForm($pseudo, $psw, $connexion) {
		
		$sql = 	"select us_id ".
				"from user inner join password on us_psw_id = psw_id ".
				"where us_pseudo like binary '$pseudo' and psw_psw='".md5($psw)."'";
		
		$result = $connexion->directSelect($sql);
		
		while ($tuple = $result->fetch()){
			$this->us_id = $tuple['us_id'];
			return $this->us_id;
		}
		
		return -1;
	}
	
	public function readFromArray($array) {
	
// 		$_SESSION['user_id'] = $array['us_id'];
// 		$_SESSION['user_pseudo'] = $array['us_pseudo'];
// 		$_SESSION['user_mail'] = $array['us_mail'];
// 		$_SESSION['user_phone'] = $array['us_phone'];
// 		$_SESSION['user_mode'] = $array['us_ut_id'];
		
		foreach($array as $k => $v){
			$this->$k = $v;
		}
		
	}
	
	public function insert($connexion) {

		date_default_timezone_set("Europe/Paris");
		$this->us_date = date('Y-m-d H:i:s', time());
	
		$champs = "us_pseudo, us_mail, us_date, us_ut_id, us_psw_id";
		$values = "'$this->us_pseudo', '$this->us_mail', '$this->us_date', $this->us_ut_id, $this->us_psw_id";
	
		$connexion->insert($this->table, $champs, $values);
	
		$this->us_id = $connexion->lastInsertID();
	
	}
	
	public function saveNewEnterprise($connection){

		$psw_id = $this->savePassword($connection);
		
		date_default_timezone_set("Europe/Paris");
		$us_date = date('Y-m-d H:i:s', time());
		
		$login = addslashes($_POST['login']);
		$mail = addslashes($_POST['mail']);
		$phone = addslashes($_POST['phone']);
		
		$table = 	"user";
		$champ = 	"us_pseudo, us_mail, us_phone, ".
					"us_date, us_ut_id, us_psw_id";
		$value = 	"'$login', '$mail', '$phone', ".
					"'$us_date', 3, $psw_id";
		
		$connection->insert($table, $champ, $value);

		$us_id = $connection->lastInsertID();
		$name = addslashes($_POST['name']);
		$siret = addslashes($_POST['siret']);
		$message = addslashes($_POST['message']);
		
		
		$table = 	"enterprise";
		$champ = 	"en_name, en_siret, ".
					"en_message, en_us_id";
		$value = 	"'$name', '$siret', ".
					"'$message', $us_id";
		
		$connection->insert($table, $champ, $value);
		
		$this->setUserAsSession($us_id, $login, $mail, $phone, 3);
		
	}
	
	public function saveNewStudent($connection){
	
		$psw_id = $this->savePassword($connection);
		
		date_default_timezone_set("Europe/Paris");
		$us_date = date('Y-m-d H:i:s', time());
		
		$login = addslashes($_POST['login']);
		$us_first_name = addslashes($_POST['first_name']);
		$us_last_name = addslashes($_POST['last_name']);
		$mail = addslashes($_POST['mail']);
		
		$phone_num = (isset($_POST['phone'])) ? $_POST['phone'] : "";
		$phone = addslashes($phone_num);
		
		$table = 	"user";
		$champ = 	"us_pseudo, us_first_name, us_last_name, ".
					"us_mail, us_phone, us_date, ".
					"us_ut_id, us_psw_id";
		$value = 	"'$login', '$us_first_name', '$us_last_name', ".
					"'$mail', '$phone', '$us_date', ".
					"5, $psw_id";
		
		$connection->insert($table, $champ, $value);

		$us_id = $connection->lastInsertID();
		
		$this->setUserAsSession($us_id, $login, $mail, $phone, 5);
		
	}
	
	private function savePassword($connection){
		
		$table = "password";
		$champ = "psw_psw";
		$value = "'".md5($_POST['psw1'])."'";
		
		$connection->insert($table, $champ, $value);
		
		return $connection->lastInsertID();
	}
	
	
	
	public function update($connexion) {
	
		$set = 	"us_pseudo='$this->us_pseudo', us_mail='$this->us_mail', ".
				"us_ut_id=$this->us_ut_id, us_psw_id=$this->us_psw_id";
		$where = "us_id = $this->us_id";
	
		$connexion->update($this->table, $set, $where);
	
	}
	
	public function delete($connexion) {
	
		$where = "us_id = ".$this->us_id;
	
		$connexion->delete($this->table, $where);
	
	}
	
	// -----------------------------------------------------
	//   FONCTIONS AJOUTEES
	// -----------------------------------------------------
	
	public function setSessionFromUser(){
	
		$_SESSION['user_id'] = $this->us_id;
		$_SESSION['user_pseudo'] = $this->us_pseudo;
		$_SESSION['user_mail'] = $this->us_mail;
		$_SESSION['user_phone'] = $this->us_phone;
		$_SESSION['user_mode'] = $this->us_ut_id;
	
	}
	
	public function getEnterpriseForm(){
	
		$view = "";
	
		return $view;
	
	}
	
	public function getStudentList($connection){
		
		
		$sql = 	"select us_id, us_last_name, us_first_name, us_pseudo, ut_label ".
				"from user inner join user_type on us_ut_id=ut_id ".
				"where us_ut_id=1 or us_ut_id=2 or us_ut_id=5";
		
		$result = $connection->directSelect($sql);
		
		$list = array();
		
		while($tuple = $result->fetch()){
			
			$list[] = array(
					
					'user_id' => $tuple['us_id'],
					'us_name' => $tuple['us_last_name'],
					'user_first_name' => $tuple['us_first_name'],
					'user_pseudo' => $tuple['us_pseudo'],
					'user_mode' => $tuple['ut_label'],
					); 
			
		}
		
		return $list;
		
		
	}
	
	public function getClientList($connection){
	
	
		$sql = 	"select us_id, en_name, us_pseudo ".
				"from user inner join enterprise on us_id=en_us_id";
	
		$result = $connection->directSelect($sql);
	
		$list = array();
	
		while($tuple = $result->fetch()){
				
			$list[] = array(
					'en_id' => $tuple['us_id'],
					'en_name' => $tuple['en_name'],
					'en_pseudo' => $tuple['us_pseudo'],
			);
				
		}
		
		return $list;
		
	}
	
	
}