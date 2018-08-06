<?php 
session_start();
if(!isset($_SESSION['userId']) && !isset($_SESSION['userName']) && !isset($_SESSION['userType'])){
	header("Location: login");
}
?>