<?php
class Accueil extends Controller{
	
	public function bonjour(){
		
		$this->loadModel("NewsLetter");
		
		$var = array();
		$var['newsletter'] = $this->NewsLetter->getLast(5, $this->connection);
		$this->setData($var);
		
		$this->render("contenu");
		
	}
	
	public function presentation(){

		$this->render("presentation");
		
	}
	
	public function connexion_user(){
		
		if(isset($_POST['login']) && isset($_POST['psw'])){

			$this->loadModel("User");
			if($this->User->getUserIdFromForm($_POST['login'], $_POST['psw'], $this->connection) > 0){
				session_destroy();
				session_start();
				$this->User->read($this->connection);
			}
			
			include('./views/commun/header.php');
		}
		
	}
	
	public function archive_news(){
		
		$filtre['key_word'] = "";
		$filtre['year'] = 0;
		$filtre['month'] = 0;
		$filtre['day'] = 0;
		$filtre['author'] = "";
		$filtre['page'] = 0;
		$filtre['order'] = 0;
		
		if(isset($_GET) > 0){
			
			if(isset($_GET['page'])){
				$filtre['page'] = $_GET['page'];
			}
			if(isset($_GET['order'])){
				$filtre['order'] = $_GET['order'];
			}
			if(isset($_GET['kw'])){
				$filtre['key_word'] = $_GET['kw'];
			}
			if(isset($_GET['sy'])){
				$filtre['year'] = $_GET['sy'];
			}
			if(isset($_GET['sm'])){
				$filtre['month'] = $_GET['sm'];
			}
			if(isset($_GET['sd'])){
				$filtre['day'] = $_GET['sd'];
			}
			if(isset($_GET['sa'])){
				$filtre['author'] = $_GET['sa'];
			}

		}
		
		$this->loadModel("NewsLetter");
		$data['data'] = $this->NewsLetter->getNewsFilter($filtre, $this->connection);
		$this->setData($data);
		$this->render("archive");
		
	}
	
	public function news($id = 0){
		
		$this->loadModel("NewsLetter");
		$data['news'] = $this->NewsLetter->getNewsFromId($id, $this->connection);
		$this->setData($data);
		$this->render("news");
	}
	
	public function deconnexion(){
		
		session_destroy();
		session_start();
		$this->bonjour();
		
	}
}