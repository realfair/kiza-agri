<?php 
include_once 'Query.php';

class Cooperative extends Query{
	private $result=array();
	private $deletedStatus='DELETED';

	//function to create new user id
	public function create_cooperative_id(){
		$newId="";
		$query="SELECT cooperativeId FROM cooperatives
				ORDER BY cooperativeId DESC LIMIT 1";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$newId=$value['cooperativeId'];
		}
		$newId=(int)$newId;
		$newId=$newId+1;

		return $newId;
	}
	//function to create cooperative code
	public function create_cooperative_code(){
		$code=mt_rand(10,10000);
		$code=$this->create_cooperative_id().$code;
		return $code;
	}
	//function to save cooperative record
	public function registerCooperative($name,$phone,$location,$TIN,$president,$password){
		$Id=$this->create_cooperative_id();
		$code=$this->create_cooperative_code();
		$username=$this->generateUsername($name,$Id);
		$query="INSERT INTO cooperatives(cooperativeId,cooperativeCode,name,username,phone,location,TIN,category,president,status) 
		VALUES (\"$Id\",\"$code\",\"$name\",\"$username\",\"$phone\",\"$location\",\"$TIN\",'AGRICULTURE',\"$president\",'PENDING')";

		$status=$this->insert($query);
		if($status){
			$query1="INSERT INTO system_users (cooperative,name,username,password,type)
			VALUES 
			(\"$Id\",\"$president\",\"$username\",\"$password\",'PRESIDENT')";
			$status=$this->insert($query1);
		}else{
			$status=false;
		}
		return $status;
	}

	//function generate coop username
	private function generateUsername($name,$code){
		return "coop_".$code;
	}
	######################## COOPERATIVE LOGIN ################################
	public function validateUser($username,$password){
		$status=false;
		$query="SELECT * FROM system_users
				WHERE username=\"$username\"
				AND password=\"$password\"
				LIMIT 1";
		$result=$this->select($query);
		if(count($result)>0){
			foreach ($result as $key => $value) {
				if($value['username']==$username && $value['password']== $password){
					$status=true;
				}
			}
		}else{
			$status=false;
		}

		return $status;
	}
	public function sessionData($username,$password){
		$query="SELECT * FROM system_users
				WHERE username=\"$username\"
				AND password=\"$password\"
				LIMIT 1";
		$result=$this->select($query);
		return $result;
	}
	public function isUserOnline($user_id,$status){
		$query="";
		if($status){
			$query="UPDATE system_users SET isOnline=1
					WHERE user_id=\"$user_id\"
					LIMIT 1";
		}else{
			$query="UPDATE system_users SET isOnline=0
					WHERE user_id=\"$user_id\"
					LIMIT 1";
		}
		$status=$this->update($query);

		return $status;
	}
	######################## END OF COOPERATIVE LOGIN #########################

	######################## COOPERATIVE SET UP ############################
	//function to check if cooperative is finished setup
	public function checkCoopSetUp($cooperativeId){
		$status=false;
		$query="SELECT sector,cell,village FROM cooperatives
				WHERE cooperativeId=\"$cooperativeId\"
				LIMIT 1";
		$result=$this->select($query);
		if(count($result)>0){
			foreach ($result as $key => $value) {
				if($value['sector']>0){
					$status=true;
				}
			}
		}else{
			$status=false;
		}

		return $status;
	}
	####################### END OF COOPERATIVE SETUP ###########
	####################### COOPERATIVE USER SECTION ##########################
	//function to check if id provided is a valid cooperative
	public function checkCooperativeId($cooperativeId){
		$status=false;
		$query="SELECT cooperativeId FROM cooperatives
				WHERE cooperativeId=\"$cooperativeId\"
				LIMIT 1";
		$isValid=$this->rows($query);
		if($isValid==1){
			$status=true;
		}else{
			$status=false;
		}

		return $status;
	}
	public function getUserCooperative($user_id){
		$cooperativeId="";
		$query="SELECT cooperative FROM system_users
				WHERE user_id=\"$user_id\"
				LIMIT 1";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$cooperativeId=$value['cooperative'];
		}

		return $cooperativeId;
	}

	//get user phone
	public function getUserPhone($user_id){
		$query="SELECT phone FROM system_users
				WHERE user_id=\"$user_id\"
				LIMIT 1";

	}

	//function to get system user one field
	public function getUserField($user_id,$field_name){
		$output="";
		$allowed=array("phone","name","type","cooperative","username","password","email","status","isOnline","regDate");
		if(in_array($field_name,$allowed)){
			$query="SELECT ".$field_name." FROM system_users
					WHERE user_id=\"$user_id\"
					LIMIT 1";
			$result=$this->select($query);
			foreach ($result as $key => $value) {
				$output=$value[$field_name];
			}

		}else{
			$output="Invalid input";
		}
		return $output;
	}
	//get cooperative one field data
	public function getCooperativeFieldData($cooperativeId,$field_name){
		$output="";
		$allowed=array("phone","name","type","cooperative","username","password","email","status","location","sector","village","cell","TIN","category","president","profile","cooperativeCode","regDate");
		if(in_array($field_name,$allowed)){
			$query="SELECT ".$field_name." FROM cooperatives
					WHERE cooperativeId=\"$cooperativeId\"
					LIMIT 1";
			$result=$this->select($query);
			foreach ($result as $key => $value) {
				$output=$value[$field_name];
			}

		}else{
			$output="Invalid input";
		}
		return $output;
	}

	//function to update one cooperative field
	public function updateCooperativeField($cooperativeId,$field_name,$value){
		$status=false;
		$allowed=array("phone","name","type","cooperative","username","password","email","status","location","sector","village","cell","TIN","category","president","profile","cooperativeCode","regDate");
		if(in_array($field_name,$allowed)){
			$query="UPDATE cooperatives SET ".$field_name."=".$value."
					WHERE cooperativeId=\"$cooperativeId\"
					LIMIT 1";
			$status=$this->update($query);
		}else{
			$status=false;
		}

		return $status;
	}
	//function to get cooperative member number
	public function getCooperativeMemberNumber($cooperativeId){
		$query="SELECT * FROM coo_members
				WHERE cooperative=\"$cooperativeId\"";
		$numRows=$this->rows($query);
		return $numRows;
	}
	//function to get cooperative male members
	public function getCooperativeMaleMembers($cooperativeId){
		$query="SELECT * FROM coo_members
				WHERE cooperative=\"$cooperativeId\"
				AND gender=0
				AND status!='DELETED'";
		$numRows=$this->rows($query);
		return $numRows;
	}
	//function to get cooperative female members
	public function getCooperativeFemaleMembers($cooperativeId){
		$query="SELECT * FROM coo_members
				WHERE cooperative=\"$cooperativeId\"
				AND gender=1
				AND status!='DELETED'";
		$numRows=$this->rows($query);
		return $numRows;
	}
	###################### END OF COOPERATIVE USER SECTION ###################

	##################### COOPERATIVE MEMBER SECTION ########################
	//function to save new member
	public function saveCooperativeMember($cooperative,$name,$id_no,$phone,$dob,$gender){
		$query="INSERT INTO coo_members(cooperative,name,id_no,phone,dob,gender,status)
		VALUES (\"$cooperative\",\"$name\",\"$id_no\",\"$phone\",\"$dob\",\"$gender\",'ACTIVE')";
		$status=$this->insert($query);
		return $status;
	}

	//function to load cooperative members
	public function loadCooperativeMembers($cooperativeId){

		$query="SELECT * FROM coo_members
				WHERE cooperative=\"$cooperativeId\"
				AND status!=\"$this->deletedStatus\"
				ORDER BY name ASC";
		$result=$this->select($query);
		return $result;
	}
	//function to remove cooperative members
	public function removeCooperativeMember($cooperativeId,$memberId){
		$status=false;
		//check if cooperative is registered
		$coop_status=$this->checkCooperativeId($cooperativeId);
		if($coop_status){
			//check member id and cooperative.
			$member_status=$this->checkCooperativeMemberId($memberId,$cooperativeId);
			if($member_status){
				//now remove members
				$query="UPDATE coo_members SET status='DELETED'
						WHERE cooperative=\"$cooperativeId\"
						AND memberId=\"$memberId\"";
				$status=$this->update($query);
			}else{
				$status=false;
			}
		}else{
			$status=false;
		}

		return $status;
	}
	#################### END OF COOPERATIVE MEMBER SECTION ##################

	################### COOPERATIVE LAND SECTION ########################
	///function to get total land of cooperative
	public function getCooperativeTotalLand($cooperativeId){
		$query="SELECT coop_land,member_land FROM coo_land
				WHERE cooperativeId=\"$cooperativeId\"";
		$cooperativeLand=0;
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$coop_land=(int)$value['coop_land'];
			$member_land=(int)$value['member_land'];
			$total=$coop_land+$member_land;
			$cooperativeLand=$cooperativeLand+$total;
		}

		return $cooperativeLand;
	}
	public function getCooperativeTotalMembersLand($cooperativeId){
		$query="SELECT member_land FROM coo_land
				WHERE cooperativeId=\"$cooperativeId\"
				AND status!=\"$this->deletedStatus\"";
		$cooperativeLand=0;
		$result=$this->select($query);
		foreach ($result as $key => $value) {;
			$member_land=(int)$value['member_land'];
			$cooperativeLand=$cooperativeLand+$member_land;
		}

		return $cooperativeLand;
	}
	public function getCooperativeTotalCooperativeLand($cooperativeId){
		$query="SELECT coop_land FROM coo_land
				WHERE cooperativeId=\"$cooperativeId\"";
		$cooperativeLand=0;
		$result=$this->select($query);
		foreach ($result as $key => $value) {;
			$coop_land=(int)$value['coop_land'];
			$cooperativeLand=$cooperativeLand+$coop_land;
		}

		return $cooperativeLand;
	}
	//function to check if memberid exists.
	public function checkCooperativeMemberId($memberId,$cooperativeId){
		$status=false;
		$query="SELECT * FROM coo_members
				WHERE memberId=\"$memberId\"
				AND cooperative=\"$cooperativeId\"
				AND status!=\"$this->deletedStatus\"";
		$number=$this->rows($query);
		if($number>0){
			$status=true;
		}else{
			$status=false;
		}
		return $status;
	}

	//function to save land
	public function saveCooperativeLand($cooperativeId,$memberId,$coop_land,$member_land){
		$query="INSERT INTO coo_land(cooperativeId,memberId,coop_land,member_land,status)
				VALUES (\"$cooperativeId\",\"$memberId\",\"$coop_land\",\"$member_land\",'ACTIVE')";
		$status=$this->insert($query);

		return $status;
	}

	//function to load cooperative land
	public function loadCooperativeLand($cooperativeId){
		$query="SELECT * FROM coo_land
				WHERE cooperativeId=\"$cooperativeId\"";
		$result=$this->select($query);
		return $result;
	}
	//function to get member land
	public function getTotalMemberLand($memberId){
		$memberLand=0;
		$query="SELECT * FROM coo_land
				WHERE memberId=\"$memberId\"";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$member_land=(int)$value['member_land'];
			$memberLand=$memberLand+$member_land;
		}
		return $memberLand;
	}
	//function to get land member offered in  cooperative
	public function getMemberCooperativeLand($memberId){
		$memberLand=0;
		$query="SELECT * FROM coo_land
				WHERE memberId=\"$memberId\"";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$member_land=(int)$value['coop_land'];
			$memberLand=$memberLand+$member_land;
		}
		return $memberLand;
	}
	######################### END OF COOPERATIVE FERTILIZER #############
	######################## COOPERATIVE FERTILIZER #####################
	//function to load all system fertilizers
	public function loadSystemFertilizers(){
		$query="SELECT DISTINCT * FROM system_fertilizers";
		$result=$this->select($query);
		return $result;
	}

	//function to load all system pesticide
	public function loadSystemPesticides(){
		$query="SELECT DISTINCT * FROM system_pesticides";
		$result=$this->select($query);
		return $result;
	}
	//function save cooperative fertilizers
	public function saveCooperativeFertilizer($cooperativeId,$fertilizer,$quantity){
		$query="INSERT INTO coo_fertilizers(cooperative,fertilizer,quantity,status) 
		VALUES (\"$cooperativeId\",\"$fertilizer\",\"$quantity\",'ACTIVE')";
		$status=$this->insert($query);
		return $status;
	}
	public function checkCooperativePesticide($pesticide,$cooperativeId){
		$query="SELECT * FROM `coo_pesticides`
				WHERE pesticide=\"$pesticide\"
				AND cooperative=\"$cooperativeId\"
				LIMIT 1";
		$number=$this->rows($query);
		$status=false;
		if($number==1){
			$status=true;
		}else{
			$status=false;
		}
		return $status;
	}
	public function saveCooperativePesticide($cooperativeId,$fertilizer,$quantity){
		$query="INSERT INTO coo_pesticides(cooperative,pesticide,quantity,status) 
		VALUES (\"$cooperativeId\",\"$fertilizer\",\"$quantity\",'ACTIVE')";
		$status=$this->insert($query);
		return $status;
	}
	//function to get total fertilizer of cooperative
	public function getTotalCooperativeFertilizer($cooperativeId){
		$output=0;
		$query="SELECT quantity FROM coo_fertilizers
				WHERE cooperative=\"$cooperativeId\"
				AND status!=\"$this->deletedStatus\"";

		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$quantity=(int)$value['quantity'];
			$output=$output+$quantity;
		}
		return $output;
	}
	//function to load cooperative fertilizer
	public function loadCooperativeFertilizer($cooperativeId,$fertilizer){
		$cooperativeFertilizer=0;
		$query="SELECT * FROM coo_fertilizers
				WHERE cooperative=\"$cooperativeId\"
				AND fertilizer=\"$fertilizer\"
				AND status!=\"$this->deletedStatus\"";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$quantity=(int)$value['quantity'];
			$cooperativeFertilizer+=$quantity;
		}

		return $cooperativeFertilizer;
	}
	public function loadCooperativePesticides($cooperativeId,$pesticide){
		$cooperativeFertilizer=0;
		$query="SELECT * FROM coo_pesticides
				WHERE cooperative=\"$cooperativeId\"
				AND pesticide=\"$pesticide\"
				AND status!=\"$this->deletedStatus\"";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$quantity=(int)$value['quantity'];
			$cooperativeFertilizer+=$quantity;
		}

		return $cooperativeFertilizer;
	}
	//function to check if the fertilizer exist in system
	public function checkFertilizer($fertilizerId){
		$status=false;
		$query="SELECT * FROM system_fertilizers
				 WHERE fertilizerId=\"$fertilizerId\"
				 ";
		$number=$this->rows($query);
		if($number>0){
			$status=true;
		}else{
			$status=false;
		}

		return $status;
	}
	public function checkPesticide($fertilizerId){
		$status=false;
		$query="SELECT * FROM system_pesticides
				 WHERE pesticideId=\"$fertilizerId\"
				 ";
		$number=$this->rows($query);
		if($number>0){
			$status=true;
		}else{
			$status=false;
		}

		return $status;
	}
	//function to get all member given fertilizer
	public function getMembersWithFertilizer($fertilizerId,$cooperativeId){
		$query="SELECT DISTINCTROW memberId FROM members_fertilizers
				WHERE cooperativeId=\"$cooperativeId\" 
				AND fertilizerId=\"$fertilizerId\"";

		$number=$this->rows($query);
		return $number;
	}
	//function to get all member withot fertilizer
	public function getMembersWithNoFertilizer($fertilizerId,$cooperativeId){
		$query="SELECT DISTINCTROW memberId FROM members_fertilizers
				WHERE cooperativeId=\"$cooperativeId\" 
				AND fertilizerId=\"$fertilizerId\"";
		$query1="SELECT * FROM coo_members
				WHERE cooperative=\"$cooperativeId\"
				AND status!=\"$this->deletedStatus\"
				ORDER BY name ASC";
		$membersCount=$this->rows($query1);
		$number=$this->rows($query);
		return ($membersCount-$number);
	}
	//get member fertilizer
	public function getMemberFertilizer($memberId,$fertilizerId){
		$memberFertilizers=0;
		$query="SELECT * FROM members_fertilizers
				WHERE memberId=\"$memberId\"
				AND fertilizerId=\"$fertilizerId\"";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$quantity=(int)$value['quantity'];
			$memberFertilizers+=$quantity;
		}

		return $memberFertilizers;
	}
	//function to give fertilizer
	public function giveFertilizerToMember($cooperativeId,$memberId,$fertilizerId, $quantity){
		$query="INSERT INTO members_fertilizers(cooperativeId, memberId,fertilizerId, quantity,status)
			VALUES (\"$cooperativeId\",\"$memberId\",\"$fertilizerId\",\"$quantity\",'ACTIVE')";
		$status=$this->insert($query);
		return $status;
	}
	public function givePesticideToMember($cooperativeId,$memberId,$pesticideId,$quantity){
		$query="INSERT INTO members_pesticide(cooperativeId, memberId,pesticideId, quantity,status)
			VALUES (\"$cooperativeId\",\"$memberId\",\"$pesticideId\",\"$quantity\",'ACTIVE')";
		$status=$this->insert($query);
		return $status;
	}
	######################## END OF FERTLIZERS ######################











#################### COOPERATIVE CROPS SECTION###################
	//function to return number of crops owned by a cooperative
	public function getCooperativeCropsNumber($cooperativeId){
		$query="SELECT * FROM coo_crops
				WHERE cooperativeId=\"$cooperativeId\"
				AND status!=\"$this->deletedStatus\"";
		$cropsCounter=$this->rows($query);
		return $cropsCounter;
	}
	//function to check crop grade
	public function checkCropGradeId($crop,$grade){
		$status=false;
		$query="SELECT * FROM cropsgrade 
				WHERE cropId=\"$crop\"
				AND gradeId=\"$grade\"";
		$number=$this->rows($query);
		if($number==1){
			$status=true;
		}else{
			$status=false;
		}

		return $status;
	}
	//function to remove cooperative crop
	public function removeCooperativeCrop($cooperativeId,$crop){
		//check cooperative is registered
		$status=false;
		$coop_status=$this->checkCooperativeId($cooperativeId);
		if($coop_status){
			//check crop if its registered
			$crop_status=true;
			if($crop_status){
				//now delete cooperative crop
				$query="UPDATE coo_crops SET status='DELETED'
						WHERE cooperativeId=\"$cooperativeId\"
						AND cropid=\"$crop\"";
				$status=$this->update($query);
			}else{
				$status=false;
			}
		}else{
			$status=false;
		}

		return $status;
	}
	//function to save new cooperative crop
	public function saveCooperativeCrop($cooperativeId,$crop,$grade){
		//check cooperative is registered
		$coop_status=$this->checkCooperativeId($cooperativeId);
		if($coop_status){
			//check crop if its registered
			$crop_status=$this->checkCropId($crop);
			if($crop_status){
				//check for crop grade
				$grade_status=$this->checkCropGradeId($crop,$grade);
				if($grade_status){
					//now save crop
						$query="INSERT INTO coo_crops(cooperativeId,crop,grade,status)
								VALUES (\"$cooperativeId\",\"$crop\",\"$grade\",'ACTIVE')";
						$status=$this->insert($query);
				}else{
					$status=false;
				}
			}else{
				$status=false;
			}
		}else{
			$status=false;
		}
		return $status;
	}

	//function to check if crop is not already registered
	public function checkCooperativeCrop($cooperativeId,$crop,$grade){
		$status=false;
		$query="SELECT crop FROM coo_crops
				WHERE cooperativeId=\"$cooperativeId\" 
				AND crop=\"$crop\" AND grade=\"$grade\"
				AND status!=\"$this->deletedStatus\"";
		$numRows=$this->rows($query);
		if($numRows>0){
			$status=true;
		}else{
			$status=false;
		}

		return $status;
	}

	//function to load cooperative crops
	public function loadCooperativeCrops($cooperativeId){
		$query="SELECT DISTINCTROW crop FROM coo_crops
				WHERE cooperativeId=\"$cooperativeId\"
				AND status!=\"$this->deletedStatus\"";
		$result=$this->select($query);
		return $result;
	}
	public function getCooperativeCrops($cooperativeId){
		$query="SELECT DISTINCTROW * FROM coo_crops
				WHERE cooperativeId=\"$cooperativeId\"
				AND status!=\"$this->deletedStatus\"";
		$result=$this->select($query);
		return $result;
	}
	//function get cooperative crop grades
	public function getCooperativeCropGrades($cooperativeId,$cropId){
		$query="SELECT grade FROM coo_crops
				WHERE cooperativeId=\"$cooperativeId\" 
				AND crop=\"$cropId\"
				AND status!=\"$this->deletedStatus\"";
		$result=$this->select($query);
		return $result;
	}
	//function to get cooperative grade vareity
	public function getCooperativeCropGradeVareity($grade){
		$query="SELECT DISTINCT * FROM cropsvariety
				WHERE gradeId=\"$grade\"";
		$result=$this->select($query);
		return $result;
	}
	public function loadCooperativeCropsNoLoop($cooperativeId){
		$query="SELECT DISTINCT * FROM coo_crops
				WHERE cooperativeId=\"$cooperativeId\"
				AND status!=\"$this->deletedStatus\"";
		$result=$this->select($query);
		return $result;
	}
	//function to clear cooperative crops array
	public function clearResult($cooperative_crops){
		for($i=0;$i<count($cooperative_crops);$i++){
			for($j=$i+1;$j<count($cooperative_crops);$j++){
				if($cooperative_crops[$i]['crop']==$cooperative_crops[$j]['crop']){
					unset($cooperative_crops[$i]);
				}
			}
		}
		return $cooperative_crops;
	}

	##################### END OF COOPERATIVE CROPS SECTION #########

	##################### COOPERATIVE PRICING SECTION ###############
	public function getCooperativePriceNumber($cooperativeId){
		$query="SELECT * FROM coo_pricing
				WHERE cooperativeId=\"$cooperativeId\"
				AND status!=\"$this->deletedStatus\"";
		$priceCounter=$this->rows($query);
		return $priceCounter;
	}

	//function to save pricing
	public function saveCooperativePrice($cooperativeId,$crop,$grade,$variety,$price){
		//check cooperative is registered
		$coop_status=$this->checkCooperativeId($cooperativeId);
		if($coop_status){
			//check crop if its registered
			$crop_status=$this->checkCropId($crop);
			if($crop_status){
				//check for crop grade
				$grade_status=$this->checkCropGradeId($crop,$grade);
				if($grade_status){
					//check crop variety
					$variety_status=$this->checkGradeVariety($grade,$variety);
					if($variety_status){
						//now save cooperative pricing
						//update other price to pending
						$update_query="UPDATE coo_pricing SET status='PENDING'
										WHERE cooperativeId=\"$cooperativeId\"
										AND crop=\"$crop\"
										AND grade=\"$grade\" 
										AND variety=\"$variety\"";
						$update_status=$this->update($update_query);
						if($update_status){
							$query="INSERT INTO coo_pricing(cooperativeId,crop,grade,variety,price,status)
							VALUES (\"$cooperativeId\",\"$crop\",\"$grade\",\"$variety\",\"$price\",'ACTIVE')";
							$status=$this->insert($query);
						}else{
							$status=false;
						}
					}else{
						$status=false;
					}
				}else{
					$status=false;
				}
			}else{
				$status=false;
			}
		}else{
			$status=false;
		}

		return $status;
	}
	//function to remove cooperative pricing
	public function removeCooperativePricing($cooperativeId,$priceId){
		//check cooperative pricing
		$status=false;
		$coop_pricing=$this->checkCooperativePricing($cooperativeId,$priceId);
		if($coop_pricing){
			$query="UPDATE coo_pricing SET status='PENDING'
					WHERE cooperativeId=\"$cooperativeId\"
					AND priceId=\"$priceId\"";
			$status=$this->update($query);
		}else{
			$status=false;
		}

		return $status;
	}
	//function to check if cooperative have a certain pricing
	public function checkCooperativePricing($cooperativeId,$priceId){
		$query="SELECT * FROM coo_pricing
				WHERE priceId=\"$priceId\"
				AND cooperativeId=\"$cooperativeId\"";
		$status=false;
		$number=$this->rows($query);
		if($number>0){
			$status=true;
		}else{
			$status=false;
		}

		return $status;
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
	#################### END OF COOPERATIVE PRICING ##################
	################### COOPERATIVE HARVEST #######################
	//function save cooperative harvest
	public function saveCooperativeHarvest($cooperativeId,$memberId,$crop,$grade, $variety,$memberHarvest,$cooperativeHarvest){
		$query="INSERT INTO coo_harvest(cooperativeId,memberId,crop,grade, variety,memberHarvest,cooperativeHarvest,status)
		VALUES (\"$cooperativeId\",\"$memberId\",\"$crop\",\"$grade\",\"$variety\",\"$memberHarvest\",\"$cooperativeHarvest\",'ACTIVE')";
		$status=$this->insert($query);
		return $status;
	}
	//function to get crop all harvest
	public function getCropAllHarvest($cropId,$cooperativeId){
		$query="SELECT memberHarvest,cooperativeHarvest FROM coo_harvest 
			WHERE crop=\"$cropId\"
			AND cooperativeId=\"$cooperativeId\"
			AND status!=\"$this->deletedStatus\"";
		$summation=0;
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$memberHarvest=(int)$value['memberHarvest'];
			$cooperativeHarvest=(int)$value['cooperativeHarvest'];
			$summation+=($cooperativeHarvest+$memberHarvest);
		}

		return $summation;
	}
	########################## END OF COOPERATIVE HARVEST ##############

	########################## GIVE MEMBERS FERTILIZERS ###########################
	//function to get available cooperative fertilizer
	public function getCurrentCooperativeFertilizer($cooperativeId){
		$cooperativeFertilizer=0;
		$query="SELECT * FROM coo_fertilizers  
				WHERE cooperative=\"$cooperativeId\"
				AND status!=\"$this->deletedStatus\"";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$quantity=(int)$value['quantity'];
			$cooperativeFertilizer+=$quantity;
		}

		$query1="SELECT * FROM members_fertilizers
				 WHERE cooperativeId=\"$cooperativeId\"
				 AND status!=\"$this->deletedStatus\"";
		$membersFertilizer=0;
		$new_result=array();
		$new_result=$this->select($query1);
		foreach ($new_result as $key => $value) {
			$new_quantity=(int)$value['quantity'];
			$membersFertilizer+=$new_quantity;
		}

		return ($cooperativeFertilizer - $membersFertilizer);
	}
	//function to get cooperative members fertilizers
	public function getCooperativeMembersFertilizer($cooperativeId){
		$query1="SELECT * FROM members_fertilizers
				 WHERE cooperativeId=\"$cooperativeId\"
				 AND status!=\"$this->deletedStatus\"";
		$membersFertilizer=0;
		$new_result=array();
		$new_result=$this->select($query1);
		foreach ($new_result as $key => $value) {
			$new_quantity=(int)$value['quantity'];
			$membersFertilizer+=$new_quantity;
		}

		return $membersFertilizer;
	}
	//get fertilizer  remaining cooperative value
	public function getFertilizerCooperativeRemaining($fertilizerId,$cooperativeId){
		$output=0;
		$query="SELECT * FROM coo_fertilizers
				WHERE fertilizer=\"$fertilizerId\"
				AND cooperative=\"$cooperativeId\"
				AND status!=\"$this->deletedStatus\"";
		$result=$this->select($query);

		$query1="SELECT * FROM members_fertilizers
				 WHERE cooperativeId=\"$cooperativeId\"
				 AND fertilizerId=\"$fertilizerId\"
				 AND status!=\"$this->deletedStatus\"";
		$new_result=array();
		$new_result=$this->select($query1);
		$output1=0;
		foreach ($new_result as $key => $value) {
			$new_quantity=(int)$value['quantity'];
			$output1+=$new_quantity;
		}
		foreach ($result as $key => $value) {
			$quantity=(int)$value['quantity'];
			$output+=$quantity;
		}

		return ($output - $output1);
	}
	public function getCooperativeRemainingPesticide($fertilizerId,$cooperativeId){
		$output=0;
		$query="SELECT * FROM coo_pesticides
				WHERE pesticide=\"$fertilizerId\"
				AND cooperative=\"$cooperativeId\"
				AND status!=\"$this->deletedStatus\"";
		$result=$this->select($query);

		$query1="SELECT * FROM members_pesticide
				 WHERE cooperative=\"$cooperativeId\"
				 AND pesticideId=\"$fertilizerId\"
				 AND status!=\"$this->deletedStatus\"";
		$new_result=array();
		$new_result=$this->select($query1);
		$output1=0;
		foreach ($new_result as $key => $value) {
			$new_quantity=(int)$value['quantity'];
			$output1+=$new_quantity;
		}
		foreach ($result as $key => $value) {
			$quantity=(int)$value['quantity'];
			$output+=$quantity;
		}

		return ($output - $output1);
	}
	public function getFertilizerMemberRemaining($fertilizerId,$cooperativeId){
		$query1="SELECT * FROM members_fertilizers
				 WHERE cooperativeId=\"$cooperativeId\"
				 AND fertilizerId=\"$fertilizerId\"
				 AND status!=\"$this->deletedStatus\"";
		$new_result=array();
		$new_result=$this->select($query1);
		$output1=0;
		foreach ($new_result as $key => $value) {
			$new_quantity=(int)$value['quantity'];
			$output1+=$new_quantity;
		}

		return $output1;
	}
	public function getMemberRemainingPesticide($pesticideId,$cooperativeId){
		$query1="SELECT * FROM members_pesticide
				 WHERE cooperative=\"$cooperativeId\"
				 AND pesticideId=\"$pesticideId\"
				 AND status!=\"$this->deletedStatus\"";
		$new_result=array();
		$new_result=$this->select($query1);
		$output1=0;
		foreach ($new_result as $key => $value) {
			$new_quantity=(int)$value['quantity'];
			$output1+=$new_quantity;
		}

		return $output1;
	}
	//cooperative remaining fertilizer
	public function getCooperativeRemainingFertilizer($cooperativeId){
		$cooperativeFertilizer=0;
		$query="SELECT * FROM coo_fertilizers  
				WHERE cooperative=\"$cooperativeId\"
				AND status!=\"$this->deletedStatus\"";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$quantity=(int)$value['quantity'];
			$cooperativeFertilizer+=$quantity;
		}

		return $cooperativeFertilizer;
	}
	############################## END OF GIVE MEMBER FERTILIZER ##############################
	############################ VIEW HARVEST GRADE #####################################
	public function checkCropId($cropId){
		$query="SELECT * FROM system_crops
				WHERE cropid=\"$cropId\"
				AND status!='DELETED'
				LIMIT 1";
		$status=false;
		$number=$this->rows($query);
		if($number==1){
			$status=true;
		}else{
			$status=false;
		}

		return $status;
	}
	public function checkGrade($gradeId){
		$query="SELECT * FROM cropsgrade
				WHERE gradeId=\"$gradeId\"
				AND status!=\"$this->deletedStatus\"
				LIMIT 1";

		$status=false;
		$number=$this->rows($query);
		if($number==1){
			$status=true;
		}else{
			$status=false;
		}

		return $status;
	}
	public function checkGradeVariety($gradeId,$variety){
		$query="SELECT * FROM cropsvariety 
				WHERE varietyId=\"$variety\"
				AND gradeId=\"$gradeId\"
				AND status!='DELETED'
				LIMIT 1";
		$status=false;
		$number=$this->rows($query);
		if($number==1){
			$status=true;
		}else{
			$status=false;
		}

		return $status;
	}
	//get crops grades
	public function getCropGrades($cropId){
		$query="SELECT * FROM cropsgrade
				WHERE cropId=\"$cropId\"
				AND status!=\"$this->deletedStatus\"";
		$result=$this->select($query);

		return $result;
	}
	//get crop grade remaining harvest
	public function getCropGradeCooperativeRemainingHarvest($cooperativeId,$cropId,$gradeId){
		$output=0;
		$totalMemberHarvest=0;
		$totalCooperativeHarvest=0;
		$query="SELECT * FROM coo_harvest
				WHERE cooperativeId=\"$cooperativeId\"
				AND crop=\"$cropId\"
				AND grade=\"$gradeId\"
				AND status!=\"$this->deletedStatus\"";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$cooperativeHarvest=(int)$value['cooperativeHarvest'];
			$memberHarvest=(int)$value['memberHarvest'];
			$totalCooperativeHarvest+=$cooperativeHarvest;
			$totalMemberHarvest+=$memberHarvest;
		}
		$output=($totalCooperativeHarvest - $totalMemberHarvest);
		return $output;
	}

	//get cooperative total harvest
	public function getCooperativeTotalHarvest($cooperativeId){
		$query="SELECT * FROM coo_harvest
				WHERE cooperativeId=\"$cooperativeId\"
				AND status!=\"$this->deletedStatus\"";
		$totalHarvest=0;
		$totalCooperativeHarvest=0;
		$totalMemberHarvest=0;
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$cooperativeHarvest=(int)$value['cooperativeHarvest'];
			$memberHarvest=(int)$value['memberHarvest'];
			$totalCooperativeHarvest+=$cooperativeHarvest;
			$totalMemberHarvest+=$memberHarvest;
		}
		$totalHarvest=($totalCooperativeHarvest + $totalMemberHarvest);
		return $totalHarvest;
	}
	//total grade harvest
	public function getCropGradeCooperativeTotalHarvest($cooperativeId,$cropId,$gradeId){
		$output=0;
		$totalMemberHarvest=0;
		$totalCooperativeHarvest=0;
		$query="SELECT * FROM coo_harvest
				WHERE cooperativeId=\"$cooperativeId\"
				AND crop=\"$cropId\"
				AND grade=\"$gradeId\"
				AND status!=\"$this->deletedStatus\"";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$cooperativeHarvest=(int)$value['cooperativeHarvest'];
			$memberHarvest=(int)$value['memberHarvest'];
			$totalCooperativeHarvest+=$cooperativeHarvest;
			$totalMemberHarvest+=$memberHarvest;
		}
		$output=($totalCooperativeHarvest + $totalMemberHarvest);
		return $output;
	}
	//total variety harvest
	public function getVarietyCooperativeTotalHarvest($cooperativeId,$cropId,$gradeId,$varietyId){
		$output=0;
		$totalMemberHarvest=0;
		$totalCooperativeHarvest=0;
		$query="SELECT * FROM coo_harvest
				WHERE cooperativeId=\"$cooperativeId\"
				AND crop=\"$cropId\"
				AND grade=\"$gradeId\"
				AND variety=\"$varietyId\"
				AND status!=\"$this->deletedStatus\"";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$cooperativeHarvest=(int)$value['cooperativeHarvest'];
			$memberHarvest=(int)$value['memberHarvest'];
			$totalCooperativeHarvest+=$cooperativeHarvest;
			$totalMemberHarvest+=$memberHarvest;
		}
		$output=($totalCooperativeHarvest + $totalMemberHarvest);
		return $output;
	}
	//member variety harvest
	public function getVarietyMembersHarvest($cooperativeId,$cropId,$gradeId,$varietyId){
		$totalMemberHarvest=0;
		$totalCooperativeHarvest=0;
		$query="SELECT * FROM coo_harvest
				WHERE cooperativeId=\"$cooperativeId\"
				AND crop=\"$cropId\"
				AND grade=\"$gradeId\"
				AND variety=\"$varietyId\"
				AND status!=\"$this->deletedStatus\"";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$memberHarvest=(int)$value['memberHarvest'];
			$totalMemberHarvest+=$memberHarvest;
		}
		return $totalMemberHarvest;
	}

	//cooperative variety harvest
	public function getVarietyCooperativeHarvest($cooperativeId,$cropId,$gradeId,$varietyId){
		$totalMemberHarvest=0;
		$totalCooperativeHarvest=0;
		$query="SELECT * FROM coo_harvest
				WHERE cooperativeId=\"$cooperativeId\"
				AND crop=\"$cropId\"
				AND grade=\"$gradeId\"
				AND variety=\"$varietyId\"
				AND status!=\"$this->deletedStatus\"";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$cooperativeHarvest=(int)$value['cooperativeHarvest'];
			$totalCooperativeHarvest+=$cooperativeHarvest;
		}
		return $totalCooperativeHarvest;
	}

	public function getCropGradeCooperativeMemberHarvest($cooperativeId,$cropId,$gradeId){
		$output=0;
		$totalMemberHarvest=0;
		$query="SELECT * FROM coo_harvest
				WHERE cooperativeId=\"$cooperativeId\"
				AND crop=\"$cropId\"
				AND grade=\"$gradeId\"
				AND status!=\"$this->deletedStatus\"";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$memberHarvest=(int)$value['memberHarvest'];
			$totalMemberHarvest+=$memberHarvest;
		}
		return $totalMemberHarvest;
	}

	public function getCropGradeCooperativeHarvest($cooperativeId,$cropId,$gradeId){
		$output=0;
		$totalCooperativeHarvest=0;
		$query="SELECT * FROM coo_harvest
				WHERE cooperativeId=\"$cooperativeId\"
				AND crop=\"$cropId\"
				AND grade=\"$gradeId\"
				AND status!=\"$this->deletedStatus\"";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$cooperativeHarvest=(int)$value['cooperativeHarvest'];
			$totalCooperativeHarvest+=$cooperativeHarvest;
		}
		return $totalCooperativeHarvest;
	}
	public function getGradeVarietiesNumber($gradeId){
		$query="SELECT * FROM cropsvariety
				WHERE gradeId=\"$gradeId\"
				AND status!=\"$this->deletedStatus\"";

		$number=$this->rows($query);
		return $number;
	}
	//function to get grade varieties
	public function getGradeVarieties($gradeId){
		$query="SELECT * FROM cropsvariety
				WHERE gradeId=\"$gradeId\"
				AND status!=\"$this->deletedStatus\"";
		$result=$this->select($query);
		return $result;
	}

	############# MEMBER HARVEST ##########################
	//function to get member total harvest
	public function getMemberTotalHarvest($memberId,$cooperativeId){
		$query="SELECT memberHarvest FROM coo_harvest
				WHERE cooperativeId=\"$cooperativeId\"
				AND memberId=\"$memberId\"
				AND status!='DELETED'";
		$memberTotalHarvest=0;
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$harvest=(int)$value['memberHarvest'];
			$memberTotalHarvest+=$harvest;
		}

		return $memberTotalHarvest;
	}
	############################ END OF MEMBER HARVEST #################################
	############################ COOPERATIVE HARVEST ORDERING ##########################
	//function to get all cooperative order
	public function getOrdersNumber($cooperativeId){
		$orders=0;
		$query="SELECT SUM(quantity) FROM harvest_order WHERE cooperativeId=\"$cooperativeId\"";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$orders=(int)$value['SUM(quantity)'];
		}

		return $orders;
	}
	//function to get variety grade
	public function varietyGrade($varietyId){
		$gradeId=0;
		$query="SELECT * FROM cropsvariety 
				WHERE varietyId=\"$varietyId\"";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$gradeId=(int)$value['gradeId'];
		}

		return $gradeId;
	}
	//function to get grade crop
	public function gradeCrop($gradeId){
		$cropId=0;
		$query="SELECT * FROM cropsgrade
				WHERE gradeId=\"$gradeId\"";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$cropId=(int)$value['cropId'];
		}

		return $cropId;
	}
	//function to get cooperative harvest according to variety
	public function getVarietyHarvest($cooperativeId,$varietyId){
		$totalHarvest=0;
		$query="SELECT SUM(memberHarvest+cooperativeHarvest) FROM coo_harvest
				WHERE cooperativeId=\"$cooperativeId\" AND variety=\"$varietyId\"";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$totalHarvest=(int)$value['SUM(memberHarvest+cooperativeHarvest)'];
		}

		return $totalHarvest;
	}
	//function to get all out orders
	public function getOurOrders($cooperativeId){
		$query="SELECT * FROM harvest_order WHERE cooperativeId=\"$cooperativeId\"";
		$result=$this->select($query);

		return $result;
	}

	//function to sell harvest
	############################ END OF COOPERATIVE ORDERING ###########################
	###################### COOPERATIVE PESTICIDES ############################
	//function to get cooperative pesticides
	public function getTotalCooperativePesticide($cooperativeId){
		$output=0;
		$query="SELECT quantity FROM coo_pesticides
				WHERE cooperative=\"$cooperativeId\"
				AND status!=\"$this->deletedStatus\"";

		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$quantity=(int)$value['quantity'];
			$output=$output+$quantity;
		}
		return $output;
	}
	//function to get cooperative remaining pesticide
	public function getCurrentCooperativePesticide($cooperativeId){
		$cooperativeFertilizer=0;
		$query="SELECT * FROM coo_pesticides  
				WHERE cooperative=\"$cooperativeId\"
				AND status!=\"$this->deletedStatus\"";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$quantity=(int)$value['quantity'];
			$cooperativeFertilizer+=$quantity;
		}

		$query1="SELECT * FROM members_pesticide
				 WHERE cooperative=\"$cooperativeId\"
				 AND status!=\"$this->deletedStatus\"";
		$membersFertilizer=0;
		$new_result=array();
		$new_result=$this->select($query1);
		foreach ($new_result as $key => $value) {
			$new_quantity=(int)$value['quantity'];
			$membersFertilizer+=$new_quantity;
		}

		return ($cooperativeFertilizer - $membersFertilizer);
	}
	public function getCooperativeMembersPesticides($cooperativeId){
		$query1="SELECT * FROM members_pesticide
				 WHERE cooperative=\"$cooperativeId\"
				 AND status!=\"$this->deletedStatus\"";
		$membersFertilizer=0;
		$new_result=array();
		$new_result=$this->select($query1);
		foreach ($new_result as $key => $value) {
			$new_quantity=(int)$value['quantity'];
			$membersFertilizer+=$new_quantity;
		}

		return $membersFertilizer;
	}

	//function to get pesticide name
	public function getPesticideName($pesticideId){
		$query="SELECT name FROM system_pesticides WHERE pesticideId=\"$pesticideId\"
				LIMIT 1";
		$result=$this->select($query);
		$name="";
		foreach ($result as $key => $value) {
			$name=$value['name'];
		}
		return $name;
	}
	//get member fertilizer
	public function getMemberPesticides($memberId,$pesticideId){
		$memberFertilizers=0;
		$query="SELECT * FROM members_pesticide
				WHERE memberId=\"$memberId\"
				AND pesticideId=\"$pesticideId\"";
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$quantity=(int)$value['quantity'];
			$memberFertilizers+=$quantity;
		}

		return $memberFertilizers;
	}
	#################### END OF COOPERATIVE PESTICIDES #######################

	#################### HARVEST SELLING #####################################
	//function to check seller id
	public function checkSellerId($seller_id){
		$query="SELECT * FROM users WHERE id=\"$seller_id\"";
		$number=$this->rows($query);
		$status=false;
		if($number>0){
			$status=true;
		}else{
			$status=false;
		}

		return $status;
	}
	################### END OF HARVEST SELLING ##############################

	################### COOPERATIVE INSTITUTIONAL COMMUNICATION #############
	//function to get our message counter
	public function getCooperativeMessagesCounter($cooperativeId){
		$query="SELECT messageId FROM coo_communication 
				WHERE cooperativeId=\"$cooperativeId\"
				AND status='UNREAD'";
		$number=$this->rows($query);
		return $number;
	}
	//load cooperative messages
	public function loadCooperativeMessages($cooperativeId){
		$query="SELECT * FROM coo_communication
				WHERE cooperativeId=\"$cooperativeId\"
				ORDER BY messageId DESC LIMIT 30";
		$result=$this->select($query);
		return $result;
	}
	//function check message id
	public function checkMessageId($messageId){
		$query="SELECT title FROM coo_communication
				WHERE messageId=\"$messageId\"";
		$status=false;
		$number=$this->rows($query);
		if($number>0){
			$status=true;
		}else{
			$status=false;
		}
		return $status;
	}
	//function load messages comments
	public function loadMessageComments($messageId){
		$query="SELECT * FROM message_comments 
				WHERE messageId=\"$messageId\"
				ORDER BY commentId DESC limit 30";
		$result=$this->select($query);
		return $result;
	}
	//function get message receiver
	//function add comment by cooperative
	public function saveMessageComment($messageId,$senderId,$receiverId,$comment){
		$query="INSERT INTO message_comments(messageId,senderId,receiverId,comment,status)VALUES(\"$messageId\",\"$senderId\",\"$receiverId\",\"$comment\",'UNREAD')";
		$status=$this->insert($query);
		return $status;
	}
	#################### END OF COOPERATIVE COMMUNICATION ###################
}
$cooperative=new Cooperative();
?>