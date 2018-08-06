<?php
$root_url=$_SERVER['DOCUMENT_ROOT'].'/kiza/';
$class_loader=$root_url.'class_loader.php';
require $class_loader;

$response=array();
$server_request=$_SERVER['REQUEST_METHOD'];
$allowedRequest=array("GET","POST");

//gather all requests together
$request = array_merge($_GET, $_POST);
if(in_array($server_request, $allowedRequest)){
	//getting requested action
	$controller = $request['controller']??"";
	$action = $request['action']??"";
	$cooperativeId=$function->sanitize(($request['cooperative']??""));
	//check if cooperative first is registered
	$coop_status=$cooperative->checkCooperativeId($cooperativeId);
	if($controller=="members"){
		$cooperativeId=$function->sanitize(($request['cooperative']??""));
		//check if cooperative first is registered
		$coop_status=$cooperative->checkCooperativeId($cooperativeId);
		if($coop_status){
			//check actions
			$action = $request['action']??"";
			if($action=="getCooperativeMembers"){
				//get cooperative members.
				$response=$cooperative->loadCooperativeMembers($cooperativeId);
				$response=$system->convertJson($response);
			}elseif($action=="saveCooperativeMember"){
				//grab other user require variables
				$cooperativeId=$function->sanitize(($request['cooperative']??""));
				$name=$function->sanitize(($request['name']??""));
				$id_no=$function->sanitize(($request['id_no']??""));
				$phone=$function->sanitize(($request['phone']??""));
				$dob=$function->sanitize(($request['dob']??""));
				$gender=$function->sanitize(($request['gender']??""));
					//validate inputs
				if(strlen($name)>=3){
					//validate id_no
					if(strlen($id_no)>=5){
						//validate user phone
						if(strlen($phone)>=10){
							//validate date of birth
							if(strlen($dob)>=3){
								//validate gender
								$allowedGender=array(0,1);
								if(in_array($gender, $allowedGender)){
									//save member now
									$save_status=$cooperative->saveCooperativeMember($cooperativeId,$name,$id_no,$phone,$dob,$gender);
									if($save_status){
										$response=$system->successJson($errors->member_save_success());
									}else{
										$response=$system->errorJson($errors->system_error_api());
									}
								}else{
									$response=$system->errorJson($errors->member_gender_error());
								}
							}else{
								$response=$system->errorJson($errors->dob_error());
							}
						}else{
							$response=$system->errorJson($errors->member_phone_error());
						}
					}else{
						$response=$system->errorJson($errors->id_no_error());
					}
				}else{
					$response=$system->errorJson($errors->member_name());
				}
			}elseif($action=="getMembersCounter"){
				//get number of users men,women,all
				$mens=$cooperative->getCooperativeMaleMembers($cooperativeId);
				$women=$cooperative->getCooperativeFemaleMembers($cooperativeId);
				$all=$mens + $women;
				$membersCounter=array("men"=>$mens,"women"=>$women,"all"=>$all);
				$response=$system->convertJson($membersCounter);
			}elseif($action=="removeMember"){

				$memberId=$function->sanitize(($request['memberId']??""));
				$remove_status=$cooperative->removeCooperativeMember($cooperativeId,$memberId);
				if($remove_status){
					$response=$system->successJson($errors->member_removed_success());
				}else{
					$response=$system->errorJson($errors->member_not_registered());
				}
			}
			else{
				$response=$system->errorJson("Specifiy action");
			}
		}else{
			$response=$system->errorJson($errors->cooperative_not_registered());
		}
	}elseif($controller=="crops"){
		$cooperativeId=$function->sanitize(($request['cooperative']??""));
		//check if cooperative first is registered
		$coop_status=$cooperative->checkCooperativeId($cooperativeId);
		if($coop_status){
			//check actions
			$action = $request['action']??"";
			if($action=="getCooperativeCrops"){

				$cooperativeCrops=array();
				$cooperativeCrops=$cooperative->getCooperativeCrops($cooperativeId);
				foreach ($cooperativeCrops as $key => $value) {
					$cropName=$system->selectTableField("system_crops","name","cropid",$value['crop']);
					$gradeName=$system->selectTableField("cropsgrade","grade","gradeId",$value['grade']);
					$result[]=array("cropid"=>$value['cropid'],"cooperativeId"=>$value['cooperativeId'],"crop"=>$value['crop'],"cropName"=>$cropName,"grade"=>$value['grade'],"gradeName"=>$gradeName);
				}

				$response=$system->convertJson($result);
			}elseif($action=="saveCooperativeCrop"){
				//sanitize inputs
				$crop=$function->sanitize(($request['crop']??""));
				$grade=$function->sanitize(($request['grade']??""));
				if(!empty($crop) && !empty($grade)){
					$save_status=$cooperative->saveCooperativeCrop($cooperativeId,$crop,$grade);
					if($save_status){
						$response=$system->successJson($errors->crop_save_success());
					}else{
						$response=$system->errorJson($errors->crop_grade_error_api());
					}
				}else{
					$response=$system->errorJson($errors->crop_grade_empty());
				}
			}elseif($action=="removeCooperativeCrop"){
				$crop=$function->sanitize(($request['crop']??""));
				$remove_status=$cooperative->removeCooperativeCrop($cooperativeId,$crop);
				if($remove_status){
					$response=$system->successJson($errors->crop_removed_success());
				}else{
					$response=$system->errorJson($errors->crop_not_exist());
				}
			}
			else{
				$response=$system->errorJson("Specifiy Action");
			}
		}else{
			$response=$system->errorJson($errors->cooperative_not_registered());
		}
	}elseif($controller=="pricing"){
		//check if cooperative is registered
		if($coop_status){
			//check action submitted
			if($action=="getCooperativePricing"){
				$cooperativePricing=array();
				$cooperativePricing=$cooperative->loadCooperativePricing($cooperativeId);
				foreach ($cooperativePricing as $key => $value) {
					$cropName=$system->selectTableField("system_crops","name","cropid",$value['crop']);
					$gradeName=$system->selectTableField("cropsgrade","grade","gradeId",$value['grade']);
					$result[]=array("priceId"=>$value['priceId'],"crop"=>$value['crop'],"cropName"=>$cropName,"grade"=>$value['grade'],"gradeName"=>$gradeName,"variety"=>$cooperative->getGradeVarieties($value['grade']),"price"=>$value['price'].' RWF');
				}
				$response=$system->convertJson($result);
			}elseif($action=="saveCooperativePricing"){
				$crop=$function->sanitize(($request['crop']??""));
				$grade=$function->sanitize(($request['grade']??""));
				$variety=$function->sanitize(($request['variety']??""));
				$price=$function->sanitize(($request['price']??""));
				if(!empty($crop) && !empty($grade)){
					if(!empty($variety) && !empty($price)){
						//now save pricing
						$save_status=$cooperative->saveCooperativePrice($cooperativeId,$crop,$grade,$variety,$price);
						if($save_status){
							$response=$system->successJson($errors->pricing_saved_success());
						}else{
							$response=$system->errorJson($errors->pricing_error());
						}
					}else{
						$response=$system->errorJson($errors->variety_pricing_error());
					}
				}else{
					$response=$system->errorJson($errors->crop_grade_empty());
				}
			}elseif($action=="removeCooperativePricing"){
				$priceId=$function->sanitize(($request['priceId']??""));
				$remove_status=$cooperative->removeCooperativePricing($cooperativeId,$priceId);
				if($remove_status){
					$response=$system->successJson($errors->pricing_removed());
				}else{
					$response=$system->errorJson($errors->pricing_404());
				}
			}
			else{
				$response=$system->errorJson("Specifiy Action");
			}
		}else{
			$response=$system->errorJson($errors->cooperative_not_registered());
		}
	}elseif($controller=="harvest"){
		//check cooperative
		if($coop_status){
			//check actions
			if($action=="getCooperativeHarvest"){
				$cooperativeCrops=array();
				$cooperativeCrops=$cooperative->loadCooperativeCrops($cooperativeId);
				foreach ($cooperativeCrops as $key => $value) {
					$cropName=$system->selectTableField("system_crops","name","cropid",$value['crop']);
					$harvest=$cooperative->getCropAllHarvest($value['crop'],$cooperativeId);
					$result[]=array("crop"=>$value['crop'],"cropName"=>$cropName,"totalHarvest"=>$harvest.' KG');
				}
				$response=$system->convertJson($result);
			}elseif($action=="harvestCounter"){

			}elseif($action=="harvestCropGrades"){
				$cropId=$function->sanitize(($request['crop']??""));
				if(!empty($cropId)){
					$cropGrades=array();
					$cropGrades=$cooperative->getCropGrades($cropId);
					foreach ($cropGrades as $key => $value) {
						$harvest_grade=$cooperative->getCropGradeCooperativeTotalHarvest($cooperativeId,$cropId,$value['gradeId']);
						$gradeName=$system->selectTableField("cropsgrade","grade","gradeId",$value['gradeId']);
						$result[]=array("gradeId"=>$value['gradeId'],"gradeName"=>$gradeName,"totalHarvest"=>$harvest_grade);
					}
					$response=$system->convertJson($result);
				}else{
					$response=$system->errorJson($errors->crop_empty());
				}
			}elseif($action=="harvestGradeVarieties"){
				$cropId=$function->sanitize(($request['crop']??""));
				$gradeId=$function->sanitize(($request['grade']??""));
				if(!empty($gradeId) && !empty($cropId)){
					$gradeVariety=array();
					$gradeVariety=$cooperative->getGradeVarieties($gradeId);
					foreach ($gradeVariety as $key => $value) {
						$harvest_variety=$cooperative->getVarietyCooperativeTotalHarvest($cooperativeId,$cropId,$gradeId,$value['varietyId']);

						$gradeName=$system->selectTableField("cropsgrade","grade","gradeId",$value['gradeId']);

						$result[]=array("varietyId"=>$value['varietyId'],"varietyName"=>$value['name'],"gradeId"=>$value['gradeId'],"gradeName"=>$gradeName,"totalHarvest"=>$harvest_variety);
					}
					$response=$system->convertJson($result);
				}else{
				    $response=$system->errorJson($errors->grade_empty());
				}
			}
			else{
				$response=$system->errorJson("Specifiy Action");
			}
		}else{
			$response=$system->errorJson($errors->cooperative_not_registered());
		}
	}elseif($controller=="land"){
		//check cooperative status
		if($coop_status){
			//check submitted actions
			if($action=="loadCooperativeTotalLand"){
				$totalLand=$cooperative->getCooperativeTotalLand($cooperativeId);
				$membersLand=$cooperative->getCooperativeTotalMembersLand($cooperativeId);
				$cooperativeLand=$cooperative->getCooperativeTotalCooperativeLand($cooperativeId);
				$result[]=array("totalLand"=>$totalLand,"cooperativeLand"=>$cooperativeLand,"membersLand"=>$membersLand);
				$response=$system->convertJson($result);
			}elseif($action=="loadMembersLand"){
				$coo_members=array();
				$coo_members=$cooperative->loadCooperativeMembers($cooperativeId);
				foreach ($coo_members as $key => $value) {
					$land=$cooperative->getTotalMemberLand($value['memberId']);
					$contributedLand=$cooperative->getMemberCooperativeLand($value['memberId']);
					$result[]=array("member"=>$value['name'],"memberLand"=>$land,"contribution"=>$contributedLand);
				}
				$response=$system->convertJson($result);
			}elseif($action=="saveLand"){
				$memberId=$function->sanitize(($request['memberId']??""));
				$member_land=$function->sanitize(($request['member_land']??""));
				$coop_land=$function->sanitize(($request['coop_land']??""));
				if(!empty($memberId)){
					if(!empty($member_land) && !empty($coop_land)){
						//now save cooperative land
					//check if member id exists in database
						$isMember=$cooperative->checkCooperativeMemberId($memberId,$cooperativeId);
						if($isMember){
							//save land now
							$save_status=$cooperative->saveCooperativeLand($cooperativeId,$memberId,$coop_land,$member_land);
							if($save_status){
								$response=$system->successJson($errors->land_saved_success());
							}else{
								$response=$system->errorJson("Error while registering Land");
							}
						}else{
							$response=$system->errorJson($errors->member_not_registered());
						}
					}else{
						$response=$system->errorJson($errors->coop_member_land());
					}
				}else{
					$response=$system->errorJson($errors->member_cooperative_error());
				}
			}
			else{
				$response=$system->errorJson("Specifiy Action");
			}
		}else{
			$response=$system->errorJson($errors->cooperative_not_registered());
		}
	}elseif($controller=="system"){
		$coop_status=$cooperative->checkCooperativeId($cooperativeId);
		if($coop_status){
			if($action=="getSystemCrops"){
				$systemCrops=$system->getSystemCrops();
				foreach ($systemCrops as $key => $value) {
					$crop_grades=$system->getSystemCropGrades($value['cropid']);
					$crop_data[]=array("cropid"=>$value['cropid'],"name"=>$value['name'],"status"=>$value['status'],"regDate"=>$value['regDate'],"grades"=>$crop_grades);
				}
				$response=$system->convertJson($crop_data);
			}elseif($action=="crops_with_grade"){
				$response=$system->convertJson($system->crops_with_grades());
			}elseif($action=="crop_grades"){
				$cropId=$function->sanitize(($request['crop']??""));
				if(strlen($cropId)>0){
					$grades=$system->getSystemCropGrades($cropId);
					$response=$system->convertJson($grades);
				}else{
					$response=$system->errorJson("Specifiy Crop Id");
				}

			}
			else{
				$response=$system->errorJson("Specifiy Action");
			}
		}else{
			$response=$system->errorJson($errors->cooperative_not_registered());
		}
	}
	else{
		$response=$system->errorJson("Specifiy Controller");
	}
}else{
	$response=array('status'=>false, 'msg'=>"Specifiy action");
}
echo $system->showJsonResult($response);
?> 