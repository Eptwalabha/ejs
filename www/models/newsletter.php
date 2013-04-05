<?php
class NewsLetter{
	
	private $table = "newsletter";
	private $ab_table = "nl";
	
	// -----------------------------------------------------
	//   MUTATEURS
	// -----------------------------------------------------
	
	public function setNewsLetterTitle($title){
		$this->nl_title = $title;
	}
	public function setNewsLetterText($text){
		$this->nl_text = $text;
	}
	public function setNewsLetterDate($date){
		$this->nl_date = $date;
	}
	public function setNewsLetterAuthor($author){
		$this->nl_us_id = $author;
	}
	
	// -----------------------------------------------------
	//   ASSESSEURS
	// -----------------------------------------------------
	
	public function getNewsLetterId(){
		return $this->nl_id;
	}
	public function getNewsLetterTitle(){
		return $this->nl_title;
	}
	public function getNewsLetterText(){
		return $this->nl_text;
	}
	public function getNewsLetterDate(){
		return $this->nl_date;
	}
	public function getNewsLetterAuthorId(){
		return $this->nl_us_id;
	}
	
	// -----------------------------------------------------
	//   MéTHODES
	// -----------------------------------------------------
	
	public function read($nl_id) {
	
		$result = $connection->select("*", $this->table, "nl_id = $nl_id");
		while ($tuple = $result->fetch()){
			$this->data = $tuple;
			$this->readFromArray($tuple);
			return true;
		}
		return false;
	
	}
	
	/**
	 * Cette m�thode permet de r�cup�rer les valeurs de tous les champs.
	 * Et de renseigner l'instance de l'objet.
	 */
	public function readFromArray($array) {
	
		$this->nl_id = $array['nl_id'];
		$this->nl_title = $array['nl_title'];
		$this->nl_text = $array['nl_text'];
		$this->nl_date = $array['nl_date'];
		$this->nl_us_id = $array['nl_us_id'];
	
	}
	
	public function insert($connection) {
	
		date_default_timezone_set("Europe/Paris");
		$this->nl_date = date('Y-m-d H:i:s', time());
		
		$champs = "nl_title, nl_text, nl_date, nl_us_id";
		$values = "'$this->nl_title', '$this->nl_text', '$this->nl_date', $this->nl_us_id";
		$connection->insert($this->table, $champs, $values);
	
	}
	
	public function update() {
	
		$set = 	"nl_title='$this->nl_title', nl_text='$this->nl_text'";
		$where = "nl_id = $this->nl_id";
		
		$connection->update($this->table, $set, $where);
		
		include_once './modules/database/update.php';
		$up = new Update($_SESSION['user_id'], $this->nl_id);
		$up->insert($connection);
		
	}
	
	public function delete() {
	
		$where = "nl_id = ".$this->nl_id;
	
		$connection->delete($this->table, $where);
	
	}
		
	public function getLast($nbr = 3, $connection){
		
		$request = 	"select n.nl_title, n.nl_text, n.nl_date, u.us_pseudo, u.us_id ".
					"from newsletter as n inner join user as u on n.nl_us_id = u.us_id ".
					"group by nl_date ".
					"order by nl_date desc ".
					"limit ".$nbr;

		$result = $connection->directSelect($request);
		
		$data = array();
		date_default_timezone_set("Europe/Paris");
		
		while ($tuple = $result->fetch()){
			
			
			$raw_date = date($tuple['nl_date']);
			
			$date_elem = explode(" ", $raw_date);
			$date = explode("-", $date_elem[0]);
			$time = explode(":", $date_elem[1]);
			
			$date = "le ".$date[2]."/".$date[1]."/".$date[0]." à ".$time[0]."h".$time[1];
			
			$data[] = array(
					'title' => $tuple['nl_title'],
					'text' => $tuple['nl_text'],
					'date' => $date,
					'author' => $tuple['us_pseudo'],
					'user_id' => $tuple['us_id'],
			);
		}
				
		return $data;
	}
	
	public function getNewsFilter($filtre, $connection){
		
		$where = "where true ";
		
		$nbr_ligne_par_page = 20;
		$page = $filtre['page'];
		$url = "accueil/archive_news?";
		
		if(strlen($filtre["key_word"]) > 0){
			$key_word = explode(", ", $filtre["key_word"]);
			$counter = 0;
			$dernier = count($key_word);
			$url .= "kw=";
			foreach ($key_word as $key){
				$url .= $key;
				if($counter > 0){
					$where .= "or ";
				}else{
					$where .= "and (";
				}
				
				$where .= "nl_title like '%".$key."%' ";
				
				$counter ++;
				if($counter == $dernier){
					$where .=") ";
				}else{
					$url .= "%2C+";
				}
				
			}
		}
		
		if($filtre['year'] > 0){
			$url .= "&sy=".$filtre['year'];
			$where .= "and year(nl_date) = ".$filtre['year']." ";
		}else{
			$url .= "&sy=0";
		}
		
		if($filtre['month'] > 0){
			$url .= "&sm=".$filtre['month'];
			$where .= "and month(nl_date) = ".$filtre['month']." ";
		}else{
			$url .= "&sm=0";
		}
		
		if($filtre['day'] > 0){
			$url .= "&sd=".$filtre['day'];
			$where .= "and dayofmonth(nl_date) = ".$filtre['day']." ";
		}else{
			$url .= "&sd=0";
		}
		
		if(strlen($filtre['author']) > 0){
			$url .= "&sa=".$filtre['author'];
			$where .= "and us_pseudo = '".$filtre['author']."' ";
		}else{
			$url .= "&sa=";
		}
		
		$request = 	"select nl_id, nl_title, nl_date, us_id, us_pseudo ".
					"from newsletter inner join user on nl_us_id = us_id ".
					$where;
		
		$result = $connection->directSelect($request);
		
		$list_news = array();
		date_default_timezone_set("Europe/Paris");
		$counter = 0;
		
		while ($tuple = $result->fetch()){

			if($counter >= ($page * $nbr_ligne_par_page) && $counter < (($page + 1) * $nbr_ligne_par_page)){
				$raw_date = date($tuple['nl_date']);
					
				$date_elem = explode(" ", $raw_date);
				$date = explode("-", $date_elem[0]);
				$time = explode(":", $date_elem[1]);
					
				$date = $date[2]."/".$date[1]."/".$date[0]." à ".$time[0]."h".$time[1];
					
				$list_news[] = array(
						'title' => $tuple['nl_title'],
						'date' => $date,
						'author' => $tuple['us_pseudo'],
						'user_id' => $tuple['us_id'],
						'news_id' => $tuple['nl_id'],
				);
			}
			$counter++;
		}

		$data = array();
		$info = array();
		
		$info['count'] = (int) ($counter / $nbr_ligne_par_page);
		if($counter % $nbr_ligne_par_page > 0) $info['count']++;
		$info['position'] = $page;
		$info['url'] = $url;
		
		$data['list'] = $list_news;
		$data['nav_tab'] = $info;
// 		echo $request."<br />";
// 		echo "<br />taille du tableau de retour:".count($data);
		return $data;
		
	}
	
	public function getNewsFromId($id, $connection){
		
		$request = 	"select n.nl_title, n.nl_text, n.nl_date, u.us_pseudo, u.us_id ".
					"from newsletter as n inner join user as u on n.nl_us_id = u.us_id ".
					"where nl_id = $id;";
		
		$result = $connection->directSelect($request);
		
		$data = array();
		date_default_timezone_set("Europe/Paris");
		$counter = 0;
		
		while ($tuple = $result->fetch()){
			$counter ++;
			$raw_date = date($tuple['nl_date']);
				
			$date_elem = explode(" ", $raw_date);
			$date = explode("-", $date_elem[0]);
			$time = explode(":", $date_elem[1]);
				
			$date = "le ".$date[2]."/".$date[1]."/".$date[0]." à ".$time[0]."h".$time[1];
				
			$data['title'] = $tuple['nl_title'];
			$data['text'] = $tuple['nl_text'];
			$data['date'] = $date;
			$data['author'] = $tuple['us_pseudo'];
			$data['user_id'] = $tuple['us_id'];
			
		}
		
		if($counter == 0){
			$data['title'] = "";
			$data['text'] = "";
			$data['date'] = "";
			$data['author'] = "";
			$data['user_id'] = -1;
		}
		
		return $data;
	}
	
	
}