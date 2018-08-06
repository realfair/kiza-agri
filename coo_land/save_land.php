<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/kiza/auth.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/class_loader.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
	$data=$_POST['info'];
	if(is_array($data)){
		//grab action
		$action=$function->sanitize($data[0]);
		if($action=="save_land"){
			//grab other data
			$memberId=$function->sanitize($data[1]);
			$cooperativeId=$function->sanitize($data[2]);
			$member_land=$function->sanitize($data[3]);
			$coop_land=$function->sanitize($data[4]);

			//validate inputs
			//check if member id exists in database
			$isMember=$cooperative->checkCooperativeMemberId($memberId,$cooperativeId);
			if($isMember){
				//save land now
				$save_status=$cooperative->saveCooperativeLand($cooperativeId,$memberId,$coop_land,$member_land);
				if($save_status){
					echo $errors->successState();
				}else{
					echo $errors->systemError();
				}
			}else{
				echo $errors->forbiddenError();
			}
		}
	}else{
		echo $errors->forbiddenError();
	}
}else{
	echo $errors->forbiddenError();
}
?>