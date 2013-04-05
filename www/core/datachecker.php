<?php
class DataChecker {
	
	private static $_instance;
	
	private function __construct () {}
	
	private function __clone () {}
	
	public static function getInstance () {
		if (!(self::$_instance instanceof self))
			self::$_instance = new self();
	
		return self::$_instance;
	}
	
	/**
	 * Vérifie que la chaîne est bien un mail, puis vérifie que le mail n'est pas déjà utilisé.
	 * @param unknown $data
	 * @param unknown $connexion
	 * @return boolean
	 */
	public function isAValidMail($data, $connexion){
		
		$res = false;
		
		if(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $data))
			return false;
			
		$sql = 	"select us_id ".
				"from user ".
				"where us_mail=\"$data\";";

		$result = $connexion->directSelect($sql);
		
		while ($tuple = $result->fetch()){
			return false;
		}
		
		return true;
		
	}
	
	
	public function isAValidSiret($data){
			
		if(!preg_match("#[0-9]{14}#", $data)){
			return false;
		}
		
		$tab = str_split($data);
		$check = 0;
		
		for($i = 13; $i >= 0; $i--){
			
			$tab[$i] = intval($tab[$i]) * (2 - $i % 2);
			
			while($tab[$i] >= 10){
				$tab[$i] = $tab[$i] - 10 + 1;
			}
			
			$check += $tab[$i];
		}
		
		return ($check % 10 == 0);
	
	}
	
	public function isAValidPseudo($data, $connexion) {
		
		if(!preg_match("#^[^0-9][a-zA-Z0-9_]{4,20}$#i", $data))
			return false;
		
		$sql = 	"select us_id ".
				"from user ".
				"where us_pseudo=\"$data\"";
		
		$result = $connexion->directSelect($sql);
		
		while ($tuple = $result->fetch()){
			return false;
		}
		
		
		return true;
	}
	
	public function isAValidPassWord($data){

		if(preg_match("#^[a-zA-Z0-9_]{6,}$#", $data))
			return true;
		
		return false;
	}
}