<?php 
if(isset($_POST['cooperative']) && isset($_POST['seller']) && isset($_POST['variety']) && isset($_POST['last_quantity']) && isset($_POST['quantity'])){
	include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/class_loader.php';

	$cooperative=$function->sanitize($_POST['cooperative']);
	$seller=$function->sanitize($_POST['seller']);
	$variety=$function->sanitize($_POST['variety']);
	$last_quantity=$function->sanitize($_POST['last_quantity']);
	$quantity=$function->sanitize($_POST['quantity']);

	//sell now
	
}else{
	echo "500";
}
?>