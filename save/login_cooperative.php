<?php
//load modules
require '../class_loader.php';
if(isset($_POST['username']) && isset($_POST['password'])){

	$username=$function->sanitize($_POST['username']);
	$password=$function->sanitize($_POST['password']);
	$session_data=array();
	$isOnline=false;
	//validate username and password
	$validate_user=$cooperative->validateUser($username,$password);
	if($validate_user){
		$session_data=$cooperative->sessionData($username,$password);
		session_start();
		foreach ($session_data as $key => $value) {
			$_SESSION['user_id']=$value['user_id'];
			$_SESSION['names']=$value['name'];
			$_SESSION['user_type']=$value['type'];
			$isOnline=$cooperative->isUserOnline($value['user_id'],true);
		}
		if($isOnline){
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