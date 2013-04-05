<?php
class Message{
	
	public function getMessages($connection, $read = 0){
		
		$sql = 	"select mes_src_us_id, s.us_pseudo as src_pseudo, mes_title, mes_text, mes_date ".
				"from message inner join user as s on mes_src_us_id=s.us_id ".
				"inner join user as d on mes_dest_us_id=d.us_id ".
				"where d.us_id=".$_SESSION['user_id']." and mes_open=".$read." ".
				"group by mes_src_us_id, src_pseudo, mes_title, mes_text, mes_date ".
				"order by mes_date desc";
		
		$result = $connection->directSelect($sql);
		
		$messages = array();
		
		while ($tuple = $result->fetch()){
			
			$text = stripslashes($tuple['mes_text']);
			$title = stripslashes($tuple['mes_title']);
			$login = stripslashes($tuple['src_pseudo']);
				
			$messages[] = array(
					'src_id' => $tuple['mes_src_us_id'],
					'src_login' => $login,
					'title' => $title,
					'message' => $text,
					'date' => $tuple['mes_date'],
					);
			
		}
		
		return $messages;
		
	}
	
	public function read($num){
		
		echo "marche";
		
	}
	
	
}