<?php 
$root_url=$_SERVER['DOCUMENT_ROOT'].'/kiza/admin/';
$database_url=$root_url.'includes/database.inc.php';
require $database_url;
class Query extends Database{

	protected function select($query){
		$result=array();
		$statement=$this->connect()->query($query);
		while ($row=$statement->fetch_assoc()) {
			$result[]=$row;
		}

		return $result;
	}

	//insert function
	protected function insert($query){
		$statement=$this->connect()->query($query);

		return $statement;
	}

	//update function
	protected function update($query){
		$statement=$this->connect()->query($query);

		return $statement;
	}

	//rows counter
	protected function rows($query){
		$statement=$this->connect()->query($query);
		$numRows=$statement->num_rows;

		return $numRows;
	}
}
?>