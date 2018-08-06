<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/kiza/auth.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/class_loader.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$data=$_POST['info'];
	if(is_array($data)){
		//get array index data
		$action=$function->sanitize($data[0]);
		if($action=="save_harvest"){
			$crop=$function->sanitize($data[1]);
			$grade=$function->sanitize($data[2]);
			$variety=$function->sanitize($data[3]);
			$price=$function->sanitize($data[4]);
			$cooperativeId=$function->sanitize($data[5]);
			$memberHarvest=$function->sanitize($data[6]);
			$cooperativeHarvest=$function->sanitize($data[7]);
			$memberId=$function->sanitize($data[8]);

			$save_status=$cooperative->saveCooperativeHarvest($cooperativeId,$memberId,$crop,$grade, $variety,$memberHarvest,$cooperativeHarvest);
			if($save_status){
				echo $errors->successState();
			}else{
				echo $errors->systemError();
			}
		}
	}else{
		echo $errors->forbiddenError();
	}
}else{
	echo $errors->forbiddenError();
}
?>