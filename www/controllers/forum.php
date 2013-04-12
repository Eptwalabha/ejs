<?php
class Forum extends Controller {
	
	/**
	 * 
	 * @param string $theme
	 */
	public function accueil($theme = ""){
		
		$this->loadModel("Theme");
		
		if($theme != ""){
			// affiche la liste des sujets dispos pour le theme, si celui-ci existe.
			$str = explode('/', rawurldecode($theme), 2);
			
			if(count($str) > 1){
				$this->subject($str[1]);
				
			}else{
				echo "liste des sujets pour le th&egrave;me \"".$str[0]."\"<br />";
			}
			
			
		}else{
			// affiche la liste des thèmes.
			$var = array();
			$var['themes'] = $this->Theme->getThemeList($this->connection);
			$this->setData($var);
			$this->render("accueil");
		}
		
		
	}
	
	
	/**
	 * Affiche les sujets et les trois dernières discution.
	 */
	private function subject($subject = ""){
		
		if($subject != ""){
			// affiche la liste des discussions pour le sujet, si celui-ci existe.
			
			$str = explode('/', $subject, 2);
			
			echo "liste des discussions pour le sujet \"".$str[0]."\"<br />";
				
			if(count($str) > 1){
				$this->discussion($str[1]);
			}
				
		}else{
			// 404
			echo "nope 404! (sujet)";
		}
		
	}
	
	
	/**
	 * Affiche la discussion.
	 * @param string $discussion
	 */
	private function discussion($discussion = ""){
		
		if($discussion != ""){
			// affiche la discussion si celle-ci existe.
			echo "discussion \"$discussion\"<br />";
			
		}else{
			// 404
			echo "nope 404! (discussion)";
		}
		
	}
	
	
	
	
}