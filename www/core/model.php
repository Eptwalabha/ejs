<?php

class Model{
	
	public $table;
	public $ab_table;
	public $id;
	
	static function load($className){
		require("$className.php");
		return new $className();
	}
	
	public function read($fields = null){
		if($fields == null){
			$fields = "*";
		}
		$sql = "select $fields from $table where ".$this->ab_table."_id=".$this->id;
		$result = $connection->directSelect($sql);
		foreach ($result as $k => $v){
			$this->k = $v;
		}
	}
	
	public function update($data = array()){
		$sql = "update $table set";
		foreach ($data as $k => $v){
			if($k != $this->ab_table."_id"){
				$sql .= " $k = '$v',";
			}
		}
		$sql = substr($sql, 0, -1);
		$sql .= " where ".$this->ab_table."_id=".$data[$this->ab_table."id"];
		$connection->directSelect($sql);
	}
	
	public function delete($id = ""){
		$sql = "delete from $table where ".$this->ab_table."_id=$id;";
		$connection->directSelect($sql);
	}
}