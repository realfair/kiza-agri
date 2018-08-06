<?php
//load modules
require_once $_SERVER['DOCUMENT_ROOT'].'/kiza/auth.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/class_loader.php';
if(isset($_POST['sector']) && isset($_POST['cooperative'])){

	$value=$function->sanitize($_POST['sector']);
	$cooperativeId=$function->sanitize($_POST['cooperative']);
	$field_name="sector";
	$update_status=$cooperative->updateCooperativeField($cooperativeId,$field_name,$value);
	if($update_status){
		echo $errors->successState();
	}else{
		echo $errors->systemError();
	}
}else{
	echo $errors->forbiddenError();
}
?>