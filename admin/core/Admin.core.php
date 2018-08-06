<?php 
include_once 'Query.php';

class Admin extends Query{
	private $result=array();
	private $deletedStatus='DELETED';
	private $allowedTables=array("coo_land","coo_members","system_fertilizers","coo_communication","cooperatives","admin_users","system_crops","cropsgrade","cropsvariety");
	private $allowedFields=array("land_id","cooperativeId","memberId","coop_land","member_land","status","name","fertilizerId","adminId","messageId","userId","cropid","gradeId","grade","varietyId");
	######################### ONE FIELD DATA RETURNING ###############################
	//function to return one field data
	public function field_data($table,$id_name,$id_field,$fieldname){
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
					$output="Invalid Field";
				}
			}else{
				$output="Invalid ID field";
			}
		}else{
			$output="Invalid Table";
		}

		return $output;
	}

	######################## END OF FIELD DATA RETURNING #############################
	//function to validate user login
	public function validateCredentials($email,$password){
		$isValid=false;
		$query="SELECT * FROM admin_users
				WHERE email=\"$email\"
				AND password=\"$password\"
				AND status!=\"$this->deletedStatus\"
				LIMIT 1";
		$result=$this->select($query);
		if(count($result)>0){
			foreach ($result as $key => $value) {
				if($value['email']==$email && $value['password']==$password){
					$isValid=true;
				}
			}
		}else{
			$isValid=false;
		}

		return $isValid;
	}
	public function sessionData($email,$password){
		$query="SELECT * FROM admin_users
				WHERE email=\"$email\"
				AND password=\"$password\"
				AND status!=\"$this->deletedStatus\"
				LIMIT 1";
		$result=$this->select($query);
		return $result;
	}
	##################### COOPERATIVE DATA SECTION ###########################
	//function to load cooperatives
	public function loadCooperatives(){
		$query="SELECT * FROM cooperatives
				WHERE status!=\"$this->deletedStatus\"
				ORDER BY name ASC";
		$result=$this->select($query);
		return $result;
	}
	//function to get district name
	public function getDistrictName($districtId){
		$query="";
	}
	//function to check if cooperative is valid
	public function checkCooperativeId($cooperativeId){
		$status=false;
		$query="SELECT * FROM cooperatives
				WHERE cooperativeId=\"$cooperativeId\"
				and status!=\"$this->deletedStatus\"
				LIMIT 1";
		$numRows=$this->rows($query);
		if($numRows==1){
			$status=true;
		}else{
			$status=false;
		}
		return $status;
	}

	//function to load cooperative members
	public function loadCooperativeMembers($cooperativeId){
		//check if cooperative is valid
		if($this->checkCooperativeId($cooperativeId)){
			$query="SELECT * FROM coo_members
					WHERE cooperative=\"$cooperativeId\"
					and status!=\"$this->deletedStatus\"
					ORDER BY name ASC";
			$result=$this->select($query);
		}else{
			$result[0]="error";
		}

		return $result;
	}
	//function to load cooperative crops
	public function loadCooperativeCrops($cooperativeId){
		if($this->checkCooperativeId($cooperativeId)){
			$query="SELECT * FROM coo_crops
				WHERE cooperativeId=\"$cooperativeId\"
				AND status!=\"$this->deletedStatus\"";
			$result=$this->select($query);
		}else{
			$result[0]="error";
		}
		return $result;
	}
	//function to load cooperative pricing
	public function loadCooperativePricing($cooperativeId){
		$query="SELECT * FROM coo_pricing
				WHERE cooperativeId=\"$cooperativeId\"
				AND status!=\"$this->deletedStatus\"
				ORDER BY priceId DESC ";
		$result=$this->select($query);
		return $result;
	}
	//function to analyse result of array
	public function analyseResult($result){
		$state=false;
		if(is_array($result)){
			if($result[0]=="error"){
				$state=false;
			}else{
				$state=true;
			}
		}else{
			$state=false;
		}
		return $state;
	}

	######################## SYSTEM CROPS SECTION ############################
	//load system data
	public function loadSystemData($action){
		$query="";
		if($action=="system_pesticides"){
			$query="SELECT * FROM system_pesticides
					WHERE status!='DELETED'
					";
		}
		if($query!=""){
			$result=$this->select($query);
		}else{
			$result[0]="error";
		}
		
		return $result;
	}
	//load system crops
	public function loadSystemCrops(){
		$query="SELECT * FROM system_crops
				WHERE status!=\"$this->deletedStatus\"
				";
		$result=$this->select($query);
		return $result;
	}
	public function crop_data(){
		$query="SELECT system_crops.*,cropsgrade.* FROM system_crops INNER JOIN 
				cropsgrade ON system_crops.cropid=cropsgrade.cropId";
		$result=$this->select($query);
		return $result;
	}
	public function crop_all_data(){
		$query="SELECT cropsgrade.*,cropsvariety.*,system_crops.* FROM system_crops,cropsgrade,cropsvariety
			WHERE system_crops.cropid=cropsgrade.cropId 
			AND cropsgrade.gradeId=cropsvariety.gradeId";
		$result=$this->select($query);
		return $result;
	}
	public function getGradeVarieties($gradeId){
		$query="SELECT * FROM cropsvariety WHERE gradeId=\"$gradeId\"";
		$result=$this->select($query);
		return $result;
	}
	//function to save crop
	public function saveCrop($name){
		$query="INSERT INTO system_crops(name,status)
				VALUES (\"$name\",'ACTIVE')";
		$status=$this->insert($query);
		return $status;
	}
	public function save_variety($gradeId,$name){
		$query="INSERT INTO cropsvariety(gradeId,name,status)
					VALUES (\"$gradeId\",\"$name\",'ACTIVE')";
		$status=$this->insert($query);
		return $status;
	}
	public function saveData($action,$name){
		$query="";
		if($action=="save_fertilizer"){
			$query="INSERT INTO system_fertilizers(name,status)
					VALUES (\"$name\",'ACTIVE')";
		}elseif($action=="save_pesticide"){
			$query="INSERT INTO system_pesticides(name,status)
					VALUES (\"$name\",'ACTIVE')";
		}
		if($query!=""){
			$status=$this->insert($query);
		}else{
			$status=false;
		}
		return $status;
	}
	#################### SYSTEM FERTILIZER #################################
	public function loadSystemFertilizers(){
		$query="SELECT * FROM system_fertilizers
				WHERE status!=\"$this->deletedStatus\"";
		$result=$this->select($query);
		return $result;
	}
	###################### COOPERATIVE COMMUNICATIONS ##############################
	//function to load cooperative comunication
	public function loadCooperativeCommunication($cooperativeId){
		$query="SELECT * FROM coo_communication
				WHERE cooperativeId=\"$cooperativeId\"
				ORDER BY messageId DESC ";
		$result=$this->select($query);
		return $result;
	}
	public function loadCooperativeMessage($messageId){
		$query="SELECT * FROM coo_communication
				WHERE messageId=\"$messageId\"
				";
		$result=$this->select($query);
		return $result;
	}
	//function to get message comments
	public function getMessageComments($messageId){
		$query="SELECT * FROM `message_comments`
				WHERE messageId=\"$messageId\"
				AND status!='DELETED'
				ORDER BY commentId DESC";
		$result=$this->select($query);
		return $result;
	}
	//function to add message comment
	public function saveMessageComment($messageId,$senderId,$receiverId,$comment){
		$query="INSERT INTO message_comments(messageId,senderId,receiverId,comment,status) 		VALUES(\"$messageId\",\"$senderId\",\"$receiverId\",\"$comment\",'UNREAD')";
		$status=$this->insert($query);
		return $status;
	}
	//function to remove message comment
	public function removeComment($commentId){
		$query="UPDATE message_comments SET status='DELETED'
				WHERE commentId=\"$commentId\"
				LIMIT 1";
		$status=$this->update($query);
		return $status;
	}
	//function to check if conversation is saved
	public function checkMessageId($messageId){
		$query="SELECT * FROM `coo_communication`
				WHERE messageId=\"$messageId\"
				LIMIT 1";
		$status=false;
		$numRows=$this->rows($query);
		if($numRows==1){
			$status=true;
		}else{
			$status=false;
		}

		return $status;
	}
	//function to get cooperative from a mess
	//function to save messgae
	public function saveCooperativeMessage($adminId,$cooperativeId,$title,$body,$category){
		$query="INSERT INTO coo_communication(adminId,cooperativeId,title,body,category, status) 
				VALUES (\"$adminId\",\"$cooperativeId\",\"$title\",\"$body\",\"$category\",'UNREAD')";
		$status=$this->insert($query);
		return $status;
	}

	############################### END OF COOPERATIVE ADMIN COMMUNICATION ##########
	################## ADMIN COOPERATIVE ACTIVATTIONS #############################
	//function to activate all cooperatives
	public function activateAllCooperatives(){
		$query="UPDATE cooperatives SET status='ACTIVE'";
		$status=$this->update($query);
		return $status;
	}
	############################ END OF ADMIN COOPERATIVE ACTIONS ################
	########################## ADMIN CROP AND GRADES SECTION ###################
	//function to check crop grade existance
	public function checkCropGradeExistance($grade,$cropId){
		$query="SELECT grade FROM cropsgrade WHERE grade=\"$grade\"
				AND cropId=\"$cropId\"
				LIMIT 1";
		$number=$this->rows($query);
		$status=false;
		if($number>0){
			$status=true;
		}else{
			$status=false;
		}

		return $status;
	}
	//function to save crop grades 
	public function saveCropGrades($cropId,$grade,$status){
		$query="INSERT INTO cropsgrade(cropId,grade,status) 
				VALUES(\"$cropId\",\"$grade\",\"$status\")";
		$status=$this->insert($query);
		return $status;
	}
	######################### SYSTEM USER SECTION #########################
	//function to load system users
	public function load_system_users(){
		$query="SELECT * FROM `admin_users`";
		$result=$this->select($query);
		return $result;
	}
	//function to save a system user
	public function save_system_user($userName,$email,$password){
		$query="INSERT INTO admin_users(userName,email,password,type,status)
		VALUES (\"$userName\",\"$email\",\"$password\",1,'ACTIVE')";
		$status=$this->insert($query);
		return $status;
	}
	###################### END OF SYSTEM USERS ############################

	###################### LOAD COOPERATIVE INFO SUCH AS FERTILIZERS,PESTICIDES,AND HARVEST ###################
	//function to load cooperative land
	public function loadCooperativeLand($cooperativeId){
		$query="SELECT * FROM coo_land
				WHERE cooperativeId=\"$cooperativeId\"";
		$result=$this->select($query);
		return $result;
	}
	//load cooperative harvest
	public function loadCooperativeHarvest($cooperativeId){
		$query="SELECT * FROM coo_harvest
				WHERE cooperativeId=\"$cooperativeId\"
				AND status!='DELETED'";
		$result=$this->select($query);
		return $result;
	}

	//load cooperative fertilizers
	public function loadCooperativeFertilizer($cooperativeId){
		$query="SELECT * FROM coo_fertilizers
				WHERE cooperative=\"$cooperativeId\"
				AND status!='DELETED'";
		$result=$this->select($query);
		return $result;
	}
	//load cooperative pesticide
	public function loadCooperativePesticides($cooperativeId){
		$query="SELECT * FROM coo_pesticides
				WHERE cooperative=\"$cooperativeId\"
				AND status!='DELETED'";
		$result=$this->select($query);
		return $result;
	}
	################### END OF COOPERATIVE LOAD SECTION #######################

	################### COOPERATIVE VARIETY SECTION ###########################
	public function getCropGrades($cropId){
		$query="SELECT * FROM cropsgrade
				WHERE cropId=\"$cropId\"
				AND status!=\"$this->deletedStatus\"";
		$result=$this->select($query);

		return $result;
	}
}
$admin=new Admin();
?>