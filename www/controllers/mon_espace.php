<?php
class Mon_Espace extends Controller{
	
	public function accueil(){
		
		$this->render("accueil");
		
	}
	
	public function profil($user_login = ""){
		
		if(isset($_SESSION['user_id'])){
			
			$this->loadModel("User");
			
			$exists = false;
			
			if($user_login == ""){
				$exists = $this->User->readFromId($_SESSION['user_id'], $this->connection);
			}else{
				$exists = $this->User->readFromLogin($user_login, $this->connection);
			}
			
			$var = array();
			$var['user'] = $this->User;
			$this->setData($var);
			
			if($exists){
				$this->render("profil");
			}else{
				$this->render("inconnu");
			}
			
		}else{
			$this->render("redirect");
		}
	}
	
	public function cv($cv_us_id = 0){

		if(isset($_SESSION['user_mode'])){
			
			if($_SESSION['user_mode'] != 3 && $_SESSION['user_mode'] != 4){
				
				$var = array();
				$this->loadModel("CV");
				
				if($cv_us_id == 0 || $cv_us_id == $_SESSION['user_id']){
					$var['cv'] = $this->CV->getCV($this->connection, $_SESSION['user_id']);
				}else{
					if($_SESSION['user_mode'] == 1 || $_SESSION['user_mode'] == 2){
						$var['cv'] = $this->CV->getCV($this->connection, $cv_us_id);
					}else{
						$var['cv'] = $this->CV->getCV($this->connection, $_SESSION['user_id']);
					}
				}
				
				$var['cat'] = $this->CV->getCatList($this->connection);
				$var['kno'] = $this->CV->getKnoList($this->connection, 1);
				$var['lvl'] = $this->CV->getLvlList($this->connection);
				
				$this->setData($var);
				
				$this->render("cv");
				
			}else{
				$this->render("redirect");
			}
			
		}else{
			$this->render("redirect");
		}
	}
	
	public function message(){
		
		if(isset($_SESSION['user_mode'])){
			
			$var = array();
			$this->loadModel("Message");
			$var['new_messages'] = $this->Message->getMessages($this->connection, 0);
			$var['messages'] = $this->Message->getMessages($this->connection, 1);
			
			$this->setData($var);
			
			$this->render("message");
			
		}else{
			$this->render("redirect");
		}
	}
	
}