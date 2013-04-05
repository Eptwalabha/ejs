<?php
class Ajax extends Controller{
	
	public function get_select_knowledge(){
		
		if(isset($_POST['cat_id'])){
		
			$this->loadModel("CV");
			$var = array();
			
			$var['kno'] = $this->CV->getKnoList($this->connection, $_POST['cat_id']);
			
			$this->setData($var);
			$this->setLayout(false);
			$this->render("get_list_knowledge");
			
		}
	}
	
	public function add_new_competence(){
		
		if(isset($_SESSION['user_id']) && isset($_POST['kno_id']) && isset($_POST['lvl_id']) && isset($_POST['detail'])){

			$this->loadModel("CV");
			$this->CV->addNewCompetence($this->connection, $_SESSION['user_id'], $_POST['kno_id'], $_POST['lvl_id'], $_POST['detail']);
			
			echo "Votre compétence est enregistrée!";
			
		}
	}
	
	
	public function delete_competence(){
		
		if(isset($_SESSION['user_id']) && isset($_POST['kno_id'])){
		
			$this->loadModel("CV");
			$this->CV->deleteCompetence($this->connection, $_SESSION['user_id'], $_POST['kno_id']);
				
			echo "Cette compétence a été supprimée de votre CV!";
				
		}
	}
	
	public function get_detail_competence(){
		
		if(isset($_SESSION['user_id']) && isset($_POST['kno_id'])){

			$this->loadModel("CV");
			$var['data'] = $this->CV->getLastDetail($this->connection, $_SESSION['user_id'], $_POST['kno_id']);
			$var['level'] = $this->CV->getLvlList($this->connection);
			
			$this->setData($var);
			$this->setLayout(false);
			$this->render("get_list_level_and_detail");
			
		}
		
	}
}