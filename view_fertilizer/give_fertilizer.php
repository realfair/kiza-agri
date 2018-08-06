<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/kiza/auth.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/class_loader.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
	$data=$_POST['info'];
	if(is_array($data)){
		//grab action
		$action=$function->sanitize($data[0]);
		if($action=="give_fertilizer"){
			//grab other data
			$cooperativeId=$function->sanitize($data[4]);
			$memberId=$function->sanitize($data[1]);
			$fertilizerId=$function->sanitize($data[2]);
			$quantity=(int)$function->sanitize($data[3]);
			$remainings=$cooperative->getFertilizerCooperativeRemaining($fertilizerId,$cooperativeId);
			if($quantity<=$remainings){
				$save_status=$cooperative->giveFertilizerToMember($cooperativeId,$memberId,$fertilizerId,$quantity);
				if($save_status){
					echo $errors->successState();
				}else{
					echo $errors->systemError();
				}
			}else{
				echo "Nta fumbire ihagije mufite";
			}
		}
	}else{
		echo $errors->forbiddenError();
	}
}else{
	echo $errors->forbiddenError();
}
?>