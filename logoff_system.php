<?php 
session_start();
if(!isset($_SESSION['user_id']) && !isset($_SESSION['names']) && !isset($_SESSION['user_type'])){
	header("Location: login");
}else{
	require 'class_loader.php';
	$isOnline=$cooperative->isUserOnline($_SESSION['user_id'],false);
	if($isOnline){
		unset($_SESSION['user_id']);
		unset($_SESSION['names']);
		unset($_SESSION['user_type']);

		session_destroy();
		header("Location: login");
	}
}
?>