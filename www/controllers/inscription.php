<?php
class Inscription extends Controller{

	public function Accueil(){

		$this->render("accueil");

	}

	public function Formulaire($type){
		
		switch ($type){
			case "etudiant":
				$this->render("formulaire_etudiant");
				break;
			case "entreprise":
				$this->render("formulaire_entreprise");
				break;
			default:
				
		}
		
	}
	
	public function valid_student(){
	
		if(isset($_POST)){
				
			$var = array();
			$var['valide'] = array();
				
			$login = $_POST['login'];
			$mail = $_POST['mail'];
			$psw1 = $_POST['psw1'];
			$psw2 = $_POST['psw2'];
				
			if(!DataChecker::getInstance()->isAValidPseudo($login, $this->connection)){
				$var['valide']['login'] = array(false, "Le login est déjà utilisé ou non valide!");
			}else{
				$var['valide']['login'] = array(true, "");
			}
			
			if(!DataChecker::getInstance()->isAValidMail($mail, $this->connection)){
				$var['valide']['mail'] = array(false, "Cette adresse mail est déjà utilisée ou non valide!");
			}else{
				$var['valide']['mail'] = array(true, "");
			}
				
			if(!DataChecker::getInstance()->isAValidPassWord($psw1)){
				$var['valide']['psw1'] = array(false, "Le mot de passe n'est pas valide!");
			}else{
				$var['valide']['psw1'] = array(true, "");
			}
				
			if(!($psw1 == $psw2)){
				$var['valide']['psw2'] = array(false, "Le mot de passe n'est pas identique au premier!");
			}else{
				$var['valide']['psw2'] = array(true, "");
			}
				
			$form_valide = 	$var['valide']['login'][0] && $var['valide']['mail'][0] &&
			$var['valide']['psw1'][0] && $var['valide']['psw2'][0];
				
			if($form_valide){
				$this->loadModel("User");
				$this->User->saveNewStudent($this->connection);
				$this->render("new_contact_ok");
			}else{
				$this->setData($var);
				$this->render("formulaire_etudiant");
			}
				
		}else{
			$this->render("redirect");
		}
	}
	
	
	public function valid_enterprise(){
	
		if(isset($_POST)){
			$this->loadModel("User");
			$this->User->saveNewEnterprise($this->connection);
			$this->render("new_contact_ok");
		}else{
			$this->render("redirect");
		}
	}
	
	
}
