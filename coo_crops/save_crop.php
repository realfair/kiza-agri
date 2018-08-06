<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/kiza/auth.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/class_loader.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//sanitize inputs
	$data=$_POST['info'];
	if(is_array($data)){
		//get array index data
		$action=$function->sanitize($data[0]);
		$crop=$function->sanitize($data[1]);
		$grade=$function->sanitize($data[2]);
		$cooperativeId=$function->sanitize($data[3]);
		if($action=="save_crop"){
			$isValidCooperative=$cooperative->checkCooperativeId($cooperativeId);
			if($isValidCooperative){
				//check for crop and grade if not already registered
				$isCropTaken=$cooperative->checkCooperativeCrop($cooperativeId,$crop,$grade);
				if(!$isCropTaken){
					//save crops
					$save_status=$cooperative->saveCooperativeCrop($cooperativeId,$crop,$grade);
					if($save_status){
						echo $errors->successState();
					}else{
						echo $errors->systemError();
					}
				}else{
					echo $errors->existError();
				}
			}else{
				echo $errors->forbiddenError();
			}
		}elseif($action=="delete_crop"){
			$cropid=$function->sanitize($data[1]);
			//delete crop
			$table="coo_crops";
			$id_field="cropid";
			$value=$cropid;
			$delete_status=$system->deleteRecord($table,$id_field,$value);
			if($delete_status){
				echo $errors->successState();
			}else{
				echo $errors->systemError();
			}
		}else{
			echo $errors->forbiddenError();
		}
	}else{
		echo $errors->forbiddenError();
	}
}else{
	echo $errors->forbiddenError();
}
?>