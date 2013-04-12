<?php
class Administration extends Controller{
	
	public function travaux(){
		
		$this->render("travaux");
		
	}

	public function accueil(){
		
		if($this->isAdmin()){
							
			$this->render("accueil");
			
		}else{
			$this->render("redirect");
		}
		
	}
	
	public function ecrire_news(){
		
		if($this->isAdmin()){
			$this->render("new_news");
		}else{
			$this->render("redirect");
		}
		
	}
	
	public function liste($type){
		
		if($this->isAdmin()){
			
			$var = array();
			$this->loadModel("User");
			$page = "liste_utilisateurs";
			
			if($type == "professionnels"){
				$var['client'] = $this->User->getClientList($this->connection);
				$page = "liste_entreprises";
			}
			if($type == "etudiants"){
				$var['student'] = $this->User->getStudentList($this->connection);
				$page = "liste_etudiants";
			}
			if($type == "utilisateurs"){
				$var['user'] = $this->User->getUserList($this->connection);
			}
			
			$this->setData($var);
			$this->render($page);
			
		}else{
			$this->render("redirect");
		}
		
	}
	
	public function isAdmin(){
		
		if(isset($_SESSION['user_mode'])){
			if($_SESSION['user_mode'] == 1){
				return true;
			}
		}
		return false;
	}
	
	public function nouvelle_news(){
		
		if(isset($_POST['news_title']) && isset($_POST['news_text'])){
			
			$this->loadModel("NewsLetter");
			
			$title = addslashes($_POST['news_title']);
			$text = addslashes($_POST['news_text']);
			
			$this->NewsLetter->setNewsLetterTitle($title);
			$this->NewsLetter->setNewsLetterText($text);
			$this->NewsLetter->setNewsLetterAuthor($_SESSION['user_id']);
			$this->NewsLetter->insert($this->connection);
// 			$this->render("ok");
			
		}else{
			$this->render("redirect");
		}
		
		$this->render("accueil");
	}
	
}