<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/class_loader.php';
	if(isset($_GET['grade'])){
		$grade=$function->sanitize($_GET['grade']);
		$grade_variety=array();
		$grade_variety=$cooperative->getCooperativeCropGradeVareity($grade);
		echo json_encode($grade_variety);
	}else{
		echo "string";
	}
?>