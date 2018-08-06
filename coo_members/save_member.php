<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/kiza/auth.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/class_loader.php';

if(isset($_POST['names']) && isset($_POST['id_no']) && isset($_POST['phone']) &&isset($_POST['dob']) && isset($_POST['gender']) && isset($_POST['cooperative'])){

	//sanitize inputs
	$name=$function->sanitize($_POST['names']);
	$id_no=$function->sanitize($_POST['id_no']);
	$phone=$function->sanitize($_POST['phone']);
	$dob=$function->sanitize($_POST['dob']);
	$gender=$function->sanitize($_POST['gender']);
	$cooperativeId=$function->sanitize($_POST['cooperative']);
	//check if cooperative is registered
	$isValidCooperative=$cooperative->checkCooperativeId($cooperativeId);
	if($isValidCooperative){

		$save_status=$cooperative->saveCooperativeMember($cooperativeId,$name,$id_no,$phone,$dob,$gender);

		if($save_status){
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
?>