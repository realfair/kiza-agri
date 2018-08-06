<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/kiza/auth.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/class_loader.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$data=$_POST['info'];
	if(is_array($data)){
		//get array index data
		$action=$function->sanitize($data[0]);
		if($action=="save_pricing"){
			$crop=$function->sanitize($data[1]);
			$grade=$function->sanitize($data[2]);
			$variety=$function->sanitize($data[3]);
			$price=$function->sanitize($data[4]);
			$cooperativeId=$function->sanitize($data[5]);
			$save_status=$cooperative->saveCooperativePrice($cooperativeId,$crop,$grade,$variety,$price);
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