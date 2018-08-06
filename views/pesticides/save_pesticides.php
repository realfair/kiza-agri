<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/class_loader.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
	$data=$_POST['info'];
	if(is_array($data)){
		//grab action
		$action=$function->sanitize($data[0]);
		if($action=="save_pesticide"){
			//grab other data
			$fertilizer=$function->sanitize($data[1]);
			$quantity=$function->sanitize($data[2]);
			$cooperativeId=$function->sanitize($data[3]);
			$check_pesticide=$cooperative->checkCooperativePesticide($fertilizer,$cooperativeId);
			if(!$check_pesticide){
			$save_status=$cooperative->saveCooperativePesticide($cooperativeId,$fertilizer,$quantity);
				if($save_status){
					echo $errors->successState();
				}else{
					echo $errors->systemError();
				}
			}else{
				echo "Uwo muti usanzwe urimo";
			}
		}
	}else{
		echo $errors->forbiddenError();
	}
}else{
	echo $errors->forbiddenError();
}
?>