<?php 
include_once 'Query.php';
class System extends Query{
	private $result=array();
	public $allowedTables=array("users","coo_crops","coo_members","coo_pricing","coo_fertilizers","coo_pestcides","system_crops","cropsgrade","cropsvariety","system_fertilizers","system_pesticides","admin_users","coo_communication","cooperatives");
	public $allowedFields=array("cellId","cooperativeId","cropid","fertilizerId","memberId","priceId","cropid","name","grade","cropId","id","userId","userName","messageId","adminId","president");
	################### SYSTEM LOCATIONS ############################
	//function to get system provinces
	public function get_provinces(){
		$query="SELECT DISTINCT * FROM provinces
				ORDER BY name ASC";

		$result=$this->select($query);

		return $result;
	}

	//function to get province districts
	public function get_province_districts($provinceId){
		$query="SELECT DISTINCT * FROM districts
				WHERE provinceId=\"$provinceId\"
				ORDER BY name ASC";

		$result=$this->select($query);

		return $result;
	}
	//function to get district sectors
	public function district_sectors($districtId){
		$query="SELECT DISTINCT * FROM sectors
				WHERE districtId=\"$districtId\"
				ORDER BY name ASC";

		$result=$this->select($query);

		return $result;
	}
	################### END OF SYSTEM LOCATIONS ###########################
	################## SYSTEM TABLE ROW COUNTING ##########################
	public function rowCounter($table,$id_field){
		$query="SELECT ".$id_field." FROM ".$table;
		$numRows=$this->rows($query);
		return $numRows;
	}
	################## END OF SYSTEM TABLE ROW COUNTING #################
	################# GET SYSTEM CROPS #################################
	public function getSystemCrops(){
		$query="SELECT DISTINCT * FROM system_crops 
				ORDER BY name ASC";
		$result=$this->select($query);
		return $result;
	}
	public function crops_with_grades(){
		$query="SELECT system_crops.*,cropsgrade.* FROM system_crops JOIN cropsgrade ON system_crops.cropid=cropsgrade.cropId";
		$result=$this->select($query);
		return $result;
	}
	//get crop grades
	public function getSystemCropGrades($cropId){
		$query="SELECT * FROM cropsgrade
				WHERE cropId=\"$cropId\"";
		$result=$this->select($query);
		return $result;
	}

	//get crop name
	################# END OF GET SYSTEM CROPS ############################
	################# SYSTEM TABLE ID SECTION ############################
	//function to create id for system tables
	public function createId($table,$id_field){
		$output="";
		$allowed=array("coo_crops","coo_members","coo_pricing","coo_fertilizers","coo_pestcides","cellId","cooperativeId","cropid","fertilizerId","memberId","priceId","cropid");
		if(in_array($table,$allowed)){
			if(in_array($id_field,$allowed)){
				$query="SELECT ".$id_field." FROM ".$table."
				ORDER BY ".$id_field." DESC LIMIT 1";
				$result=$this->select($query);
				foreach ($result as $key => $value) {
					$output=$value[$id_field];
				}
				$output=$output+1;
			}else{
				$output="Invalid id field";
			}
		}else{
			$output="Invalid table";
		}

		return $output;
	}
	################# END OF SYSTEM TABLE ID SECTION #####################

	################# SYSTEM TABLE SELECT 1 FIELD DATA ###################
	public function selectTableField($table,$field_name,$id_field,$id_value){
		$output="";
		if(in_array($table,$this->allowedTables)){
			if(in_array($field_name,$this->allowedFields)){
				$query="SELECT ".$field_name." FROM ".$table
						." WHERE ".$id_field."=".$id_value." LIMIT 1";
				$result=$this->select($query);
				foreach ($result as $key => $value) {
					$output=$value[$field_name];
				}
			}else{
				$output="Invalid fieldname";
			}
		}else{
			$output="Invalid table";
		}

		return $output;
	}

	//function to desactivate one field data
	public function deleteRecord($table,$id_field,$value){
		$output=false;
		if(in_array($table,$this->allowedTables)){
			if(in_array($id_field,$this->allowedFields)){
				$query="UPDATE ".$table." SET status='DELETED'
						WHERE ".$id_field."=".$value." LIMIT 1";
				$output=$this->update($query);
			}else{
				$output=false;
			}
		}else{
			$output=false;
		}

		return $output;
	}

	//function to show json result
	public function showJsonResult($output){
		header('Content-Type: application/json');
		return  json_encode($output);
	}
	public function convertJson($result){
		$response=array('status'=>true, 'data'=>$result);
		return $response;
	}
	public function webJson($result){
		$result;
	}
	public function errorJson($result){
		$response=array('status'=>false, 'msg'=>$result);	
		return $response;
	}
	public function successJson($result){
		$response=array('status'=>true, 'msg'=>$result);	
		return $response;
	}
}
$system=new System();
?>