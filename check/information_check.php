<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/kiza/auth.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/class_loader.php';

$user_id=$_SESSION['user_id'];
$names=$_SESSION['names'];
$user_type=$_SESSION['user_type'];
//get user cooperative
$cooperativeId=$cooperative->getUserCooperative($user_id);
//check if cooperative location have been setted
$is_coop_finished_account=$cooperative->checkCoopSetUp($cooperativeId);
if(!$is_coop_finished_account){
	header("Location: finish_setup");
}
//check if user phone have been setted

?>