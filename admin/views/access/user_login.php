<?php
$root_url=$_SERVER['DOCUMENT_ROOT'].'/kiza/admin/';
$class_loader_url=$root_url.'class_loader.php';
require $class_loader_url;
if(isset($_POST['email']) && isset($_POST['password'])){
	$email=$function->sanitize($_POST['email']);
	$password=$function->sanitize($_POST['password']);
	//validate user
	$isValid=$admin->validateCredentials($email,$password);
	if($isValid){
		//create user session
		$session_data=array();
		$session_data=$admin->sessionData($email,$password);
		//start session
		session_start();
		foreach ($session_data as $key => $value) {
			$_SESSION['userId']=$value['userId'];
			$_SESSION['userName']=$value['userName'];
			$_SESSION['userType']=$value['type'];
			$_SESSION['email']=$value['email'];
		}
		echo "200";
	}else{
		echo "500";
	}
}else{
	echo '500';
}
?>