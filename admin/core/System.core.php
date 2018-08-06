<?php 
include_once 'Query.php';
class System extends Query{
	private $result=array();
	private $allowedTables=array("coo_land","coo_members","system_fertilizers","districts","cooperatives","system_crops","cropsgrade","gradeId","cropsvariety","coo_members","coo_fertilizers","system_fertilizers","system_pesticides");
	private $allowedFields=array("land_id","cooperativeId","memberId","coop_land","member_land","status","name","fertilizerId","districtId","cropId","gradeId","grade","cropid","varietyId","fertilizerId","pesticideId");
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

	//function to return one field data
	public function table_field($table,$id_name,$id_field,$fieldname){
		$output="";
		if(in_array($table,$this->allowedTables)){
			if(in_array($id_name,$this->allowedFields)){
				if(in_array($fieldname, $this->allowedFields)){
					$query="SELECT ".$fieldname." FROM ".$table
							." WHERE ".$id_name."=".$id_field;
					$result=$this->select($query);
					foreach ($result as $key => $value) {
						$output=$value[$fieldname];
					}
				}else{
					$output="Invalid Fieldname";
				}
			}else{
				$output="Invalid ID Field";
			}
		}else{
			$output="Invalid Table";
		}

		return $output;
	}
	################## END OF SYSTEM TABLE ROW COUNTING #################
}
$system=new System();
?>