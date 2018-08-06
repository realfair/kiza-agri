<?php 
session_start();
if(!isset($_SESSION['userId']) && !isset($_SESSION['userName']) && !isset($_SESSION['userType'])){
	header("Location: login");
}else{
	unset($_SESSION['userId']);
	unset($_SESSION['userName']);
	unset($_SESSION['userType']);

	session_destroy();

	header("Location: login");
}
?>