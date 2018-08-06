<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/class_loader.php';
	if(isset($_GET['crop'])){
		$districts=array();
		//get districts
		$crop=$function->sanitize($_GET['crop']);
		$systemCropGrades=array();
		$systemCropGrades=$system->getSystemCropGrades($crop);
		echo json_encode($systemCropGrades);
	}else{
		echo "string";
	}
?>