<?php
// PHP/PDO Generator
// 
// Version du module de codage: 1.0.0
// Developpeur du module: Damien GABRIELLE
// mail: damiengabrielle@gmail.com
// date de génération: Sun Jun 10 10:49:34 CEST 2012
// nom de la machine: Benhï-PC

class Connection {
	
	// -----------------------------------------------------
	//   ATTRIBUTS
	// -----------------------------------------------------
	
	private $dns;
	private $nom_bd;
	private $login;
	private $pass;
	private $connexion;
	private $mode_debug;
	
	// -----------------------------------------------------
	//   CONSTRUCTEUR
	// -----------------------------------------------------
	
	public function __construct($dns, $nom_bd, $login, $pass, $debug) {
		
		$this->dns = $dns;
		$this->nom_bd = $nom_bd;
		$this->login = $login;
		$this->pass = $pass;
		$this->mode_debug = $debug;
		
	}
	
	// -----------------------------------------------------
	//   MUTATEURS
	// -----------------------------------------------------
	
	public function setDns($dns) {
		$this->dns = $dns;
	}
	
	public function setNom_bd($nom_bd) {
		$this->nom_bd = $nom_bd;
	}
	
	public function setLogin($login) {
		$this->login = $login;
	}
	
	public function setPass($pass) {
		$this->pass = $pass;
	}
	
	public function setConnexion($connexion) {
		$this->connexion = $connexion;
	}
	
	// -----------------------------------------------------
	//   ASSESSEURS
	// -----------------------------------------------------
	
	public function getDns() {
		return $this->dns;
	}
	
	public function getNom_bd() {
		return $this->nom_bd;
	}
	
	public function getLogin() {
		return $this->login;
	}
	
	public function getPass() {
		return $this->pass;
	}
	
	public function getConnexion() {
		return $this->connexion;
	}
	
	// -----------------------------------------------------
	//   FONCTIONS PDO
	// -----------------------------------------------------
	
	/**
	 * Etablit la connexion avec la base de donnï¿½es.
	 */
	public function connect() {
		
		try {
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$this->connexion = new PDO('mysql:host='.$this->dns.';dbname='.$this->nom_bd, $this->login, $this->pass , $pdo_options);
		} catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	/**
	 * Permet d'exï¿½cuter des requï¿½tes de type INSERT, UPDATE, DELETE
	 */
	private function doExec($query) {
		return $this->connexion->exec($query);
	}
	
	/**
	 * Permet d'exï¿½cuter des requï¿½tes de type SELECT
	 */
	private function doQuery($query) {
		return $this->connexion->query($query);
	}
	
	// -----------------------------------------------------
	//   FONCTIONS SQL
	// -----------------------------------------------------
	
	/**
	 * Permet d'insï¿½rer des donnï¿½es dans la base de donnï¿½es
	 */
	public function insert($table, $champs, $values) {
		
		$q = "insert into $table ($champs) values ($values);";
		if($this->mode_debug) echo $q."\n";
		
		return $this->doExec($q);
		
	}
	
	/**
	 * Permet mettre ï¿½ jour des donnï¿½es dans la base de donnï¿½es
	 */
	public function update($table, $set, $where) {
		
		$q = "update $table set $set where $where;";
		if($this->mode_debug) echo $q."\n";
		return $this->doExec($q);
		
	}
	
	/**
	 * Permet de supprimer des donnï¿½es dans la base de donnï¿½es
	 */
	public function delete($table, $where) {
		
		$q = "delete from $talbe where $where;";
		if($this->mode_debug) echo $q."\n";
		return $this->doExec($q);
		
	}
	
	/**
	 * Permet de sï¿½lectionner des donnï¿½es dans la base de donnï¿½es
	 */
	public function select($select, $from, $where) {
		
		$q = "select $select from $from where $where;";
		if($this->mode_debug) echo $q."\n";
		return $this->doQuery($q);
		
	}
	
	/**
	 * Permet d'effectuer directement une requï¿½te de type select 
	 */
	public function directSelect($q) {
		
		if($this->mode_debug) echo $q."\n";
		return $this->doQuery($q);
		
	}
		
	// -----------------------------------------------------
	//   FONCTIONS AJOUTEES
	// -----------------------------------------------------
	
	public function login($pseudo, $mp){

		try{
			$q = "select * from user where pseudo = ? and password = '".md5($mp)."' and active = 1;";
			$result = $this->connexion->prepare($q);
			$result->execute(array($pseudo));
			return $result;
		}catch(Exception $e){
			echo "erreur: ".$e->getMessage();
			return false;
		}
	}
	
	/**
	 * Cette Mï¿½thode retourne l'id du dernier tuple entrï¿½e dans la base de donnï¿½es.
	 * @return le dernier champs inserï¿½ dans table (Integer)
	 */
	public function lastInsertID(){
		return $this->connexion->lastInsertId();
	}
	
}

