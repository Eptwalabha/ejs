<?php
class CV {

	public function getCV($connection, $us_id){
		
		$cv = array();

		$cv['list_field'] = array();
		$cv['user'] = array();
		
		$sql = 	"select us_last_name, us_first_name, us_mail, us_phone, us_picture ".
				"from user ".
				"where us_id=$us_id and us_visible=1";
		
		$result_user = $connection->directSelect($sql);
		
		while ($tuple = $result_user->fetch()){
			$cv['user'] = array(
				'last_name' => $tuple['us_last_name'],
				'first_name' => $tuple['us_first_name'],
				'mail' => $tuple['us_mail'],
				'phone' => $tuple['us_phone'],
				'picture' => $tuple['us_picture'],
			);
		}
		
		$sql =	"select cat_name, kno_name, lvl_label, comp_detail, comp_valid, comp_visible ".
				"from competent inner join level l on comp_lvl_id=lvl_id ".
				"inner join knowledge k on kno_id=comp_kno_id ".
				"inner join category c on kno_cat_id=cat_id ".
				"where comp_us_id=$us_id and comp_date=".
				"( ".
					"select max(comp_date) ".
					"from competent inner join knowledge on kno_id=comp_kno_id ".
					"inner join category on kno_cat_id=cat_id ".
					"where cat_id = c.cat_id ".
					"and kno_id = k.kno_id ".
				") ".
				"group by cat_name, kno_name, lvl_label, comp_detail, comp_valid";
		
		$result_field = $connection->directSelect($sql);
		
		$cat = "";
		$field = array();
		$field['knowledge'] = array();
		$first_elem = 1;
		$any_visible = 0;
		
		while ($tuple = $result_field->fetch()){
	
			if(strcmp($cat, $tuple['cat_name']) != 0){

				if($first_elem == 0){ 
					if($any_visible > 0){
						
						$cv['list_field'][] = $field;
						
					}
					
				}else{
					$cat = $tuple['cat_name'];
					$first_elem = 0;
				}
				
				$field = array();
				$field['knowledge'] = array();
				$field['name'] = $tuple['cat_name'];
				$cat = $field['name'];
				$any_visible = 0;
			}

			$valid = ($tuple['comp_valid'] == 1)? "ok" : "";
			$descr = (strlen($tuple['comp_detail']) == 0)? "<p>pas de description</p>" : $tuple['comp_detail'];
						
			$comp = array(
					'name' => stripslashes($tuple['kno_name']),
					'level' => stripslashes($tuple['lvl_label']),
					'description' => $descr,
					'valid' => $valid,
					'visible' => $tuple['comp_visible'],
			);
			
			if($tuple['comp_visible'] == 1){
				$field['knowledge'][] = $comp;
				$any_visible++;
			}
			
		}
		
		if($first_elem == 0 && $any_visible > 0){
			$cv['list_field'][] = $field;
		}
		
		return $cv;
	}
	
	public function getCatList($connection){
		
		$sql = 	"select cat_id, cat_name ".
				"from category";
		
		$result = $connection->directSelect($sql);
		
		$list_cat = array();
		
		while($tuple = $result->fetch()){
		
			$cat = array(
				'cat_id' => $tuple['cat_id'],
				'cat_name' => $tuple['cat_name'],
			);
			
			$list_cat[] = $cat;
		}
		
		return $list_cat;
		
	}

	public function getKnoList($connection, $id){
	
		$sql = 	"select kno_id, kno_name ".
				"from knowledge inner join category on kno_cat_id=cat_id ".
				"where cat_id=$id";
	
		$result = $connection->directSelect($sql);
	
		$list_kno = array();
	
		while($tuple = $result->fetch()){
			$kno = array(
					'kno_id' => $tuple['kno_id'],
					'kno_name' => $tuple['kno_name'],
			);
				
			$list_kno[] = $kno;
		}
		return $list_kno;
	}
	
	public function getLvlList($connection){
	
		$sql = 	"select lvl_id, lvl_label ".
				"from level";
	
		$result = $connection->directSelect($sql);
	
		$list_lvl = array();
	
		while($tuple = $result->fetch()){
	
			$lvl = array(
					'lvl_id' => $tuple['lvl_id'],
					'lvl_label' => $tuple['lvl_label'],
			);
	
			$list_lvl[] = $lvl;
		}
	
		return $list_lvl;
	
	}
	
	public function getLastDetail($connection, $us_id, $kno_id){
		
		$sql = 	"select comp_detail, comp_lvl_id, comp_visible ".
				"from competent c ".
				"where comp_us_id=$us_id and comp_kno_id=$kno_id and comp_date=".
				"( ".
				"select max(comp_date) ".
				"from competent ".
				"where comp_us_id=c.comp_us_id and comp_kno_id=c.comp_kno_id ".
				")";
		
		$result = $connection->directSelect($sql);
		
		$data = array(
				'detail' => '',
				'lvl_id' => '',
		);
		
		while($tuple = $result->fetch()){
			
			$detail = ($tuple['comp_visible'] == 0)? "" : stripslashes($tuple['comp_detail']);
			
			$data = array(
					'detail' => $detail,
					'lvl_id' => $tuple['comp_lvl_id'],
			);
			return $data;
		}

		return $data;
	}
	
	
	public function addNewCompetence($connection, $us_id, $kno_id, $lvl_id, $details){
		
		$details = addslashes($details);
		
		date_default_timezone_set("Europe/Paris");
		$date = date('Y-m-d H:i:s', time());
		
		$table = "competent";
		$champs = "comp_us_id, comp_kno_id, comp_lvl_id, comp_date, comp_detail";
		$values = "$us_id, $kno_id, $lvl_id, '$date', '$details'";
		$connection->insert($table, $champs, $values);
		
	}
	
	public function deleteCompetence($connection, $us_id, $kno_id){
		
		$sql = 	"select comp_date ".
				"from competent ".
				"where comp_us_id=$us_id and comp_kno_id=$kno_id and comp_visible=1";
		
		$result = $connection->directSelect($sql);
		$table = "competent";
		
		while($tuple = $result->fetch()){
			$where = 	"comp_us_id=$us_id and ".
						"comp_kno_id=$kno_id and ".
						"comp_date='".$tuple['comp_date']."'";
			
			$connection->update($table, "comp_visible=0", $where);
		}
		
	}
	
}